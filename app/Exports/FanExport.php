<?php

namespace App\Exports;

use App\Models\Fan;
use Maatwebsite\Excel\Concerns\FromCollection;

class FanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Fan::all();
    }
}
