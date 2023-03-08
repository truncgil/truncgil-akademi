<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ExportExcel implements FromCollection, WithHeadings, ShouldAutoSize //, WithEvents
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
    /*
    public function registerEvents(): array
    {
        return [
                AfterSheet::class  => function(AfterSheet $event) 
                {
                    $cellRange = 'A1:G1'; // All headers
                    $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBorder($cellRange, 'thin');
                    $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
                },
            ];
    }
    */
}
