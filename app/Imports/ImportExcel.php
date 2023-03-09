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
        
        foreach($otherRow AS $row) {
            $columnKey = 0;
            $refactoringRow = [];
            foreach($firstRow AS $column) {
                if($column!="")  { 
                    $columnType = table_column_type($this->tableName, $column);
                    if($columnType=="date") {
                        $refactoringRow[$column] = Date::excelToDateTimeObject($row[$columnKey]);
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
                ekle2($refactoringRow, $this->tableName);
            } else {
                firstOrUpdate(
                    $refactoringRow, 
                    $this->tableName,
                    [
                        'id' => $refactoringRow['id']
                    ], false
                );
            }
            break;
        }
    }
}
