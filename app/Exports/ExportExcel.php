<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class ExportExcel implements FromCollection
{

    public $tableName;

    public function __construct(string $tableName) 
    {
        $this->tableName = $tableName;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return db($this->tableName)->get();
    }
}
