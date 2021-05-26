<?php

namespace App\Exports;

use App\Models\Iron;
use Maatwebsite\Excel\Concerns\FromCollection;

class IronExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Iron::all();
    }
}
