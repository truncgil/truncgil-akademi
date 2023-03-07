<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Schema;

class ExportExcel implements FromCollection, WithHeadings
{

    public $tableName;
    public $columnNames;
    public $exceptsColumns;

    public function __construct(string $tableName) 
    {
        $this->tableName = $tableName;
        $exceptsColumns = ['created_at', 'updated_at'];
        $this->columnNames = array_diff(Schema::getColumnListing($this->tableName), $exceptsColumns);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {   
        return db($this->tableName)->select($this->columnNames)->get();
    }
    public function headings(): array
    {
        return $this->columnNames;
    }
}
