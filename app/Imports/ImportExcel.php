<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Carbon\Carbon;
use \PhpOffice\PhpSpreadsheet\Shared\Date;

class ImportExcel implements ToCollection
{
    public $tableName;

    public function __construct(string $tableName) 
    {
        $this->tableName = $tableName;
    }

    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        set_time_limit(0);
        $firstRow = $collection[0];
        $otherRow = $collection;
        unset($otherRow[0]);

        $data = [];
        $insertArray = []; 
        $columnTypes = []; 
        
        foreach($firstRow AS $column) {
            $columnType = table_column_type($this->tableName, $column);
            $columnTypes[$column] = $columnType;
        }

        foreach($otherRow AS $row) {
            $columnKey = 0;
            $refactoringRow = [];
            foreach($firstRow AS $column) {
                if($column!="")  { 
                    $columnType =  $columnTypes[$column];
                    if($columnType=="date") {
                        try {
                            $refactoringRow[$column] = Date::excelToDateTimeObject($row[$columnKey]);
                        } catch (\Throwable $th) {
                            $refactoringRow[$column] = "1970-01-01";
                        }
                        
                    } elseif($columnType=="integer") {
                        $refactoringRow[$column] = (int) $row[$columnKey];
                    } elseif($columnType=="float") {
                        $refactoringRow[$column] =  (float) $row[$columnKey];
                    } else {
                        $refactoringRow[$column] = $row[$columnKey];
                    }
                    
                    $columnKey++; 
                }
            }

            if(!isset($refactoringRow['id'])) {
                $refactoringRow['id']=="";
            }
            if($refactoringRow['id']=="") {
                unset($refactoringRow['id']);
                //ekle2($refactoringRow, $this->tableName);
                $insertArray[] = $refactoringRow;
            } else {
                firstOrUpdate(
                    $refactoringRow, 
                    $this->tableName,
                    [
                        'id' => $refactoringRow['id']
                    ], false
                );
            }
            
        }

        db($this->tableName)->insert($insertArray);
    }
}
