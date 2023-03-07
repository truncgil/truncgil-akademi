<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Schema;

class ExportExcel implements FromCollection, WithHeadings
{

    public $tableName;
    public $columnNames;

    public function __construct(string $tableName) 
    {
        $this->tableName = $tableName;
        $this->columnNames = Schema::getColumnListing($this->tableName);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {   
        return db($this->tableName)->get();
    }
    public function headings(): array
    {
        return $this->columnNames;
    }
}
