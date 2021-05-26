<?php

namespace App\Exports;

use App\Models\Camera;
use Maatwebsite\Excel\Concerns\FromCollection;

class CameraExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Camera::all();
    }
}
