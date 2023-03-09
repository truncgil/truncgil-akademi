<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

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
        $firstRow = $collection[0];
        $otherRow = $collection;
        unset($otherRow[0]);

        $data = [];

        foreach($otherRow AS $row) {
            $columnKey = 0;
            $refactoringRow = [];

            foreach($firstRow AS $column) {
                if($column!="")  { 
                    $refactoringRow[$column] = $row[$columnKey];
                    $columnKey++; 
                }
            }
            //dd($refactoringRow);
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
            
        }
    }
}
