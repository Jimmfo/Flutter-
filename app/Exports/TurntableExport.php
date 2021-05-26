<?php

namespace App\Exports;

use App\Models\Turntable;
use Maatwebsite\Excel\Concerns\FromCollection;

class TurntableExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Turntable::all();
    }
}
