<?php

namespace App\Exports;

use App\Models\NaksCertificate;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportNaksCertificate implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return NaksCertificate::get();
    }
}
