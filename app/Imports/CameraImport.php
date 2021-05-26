<?php

namespace App\Imports;

use App\Models\Camera;
use Maatwebsite\Excel\Concerns\ToModel;

class CameraImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Camera([
            'Price'          => $row['0'],
            'Seller'         => $row['1'], 
            'Color'          => $row['2'],
            'Typecamera'     => $row['3'],
            'Resolution'     => $row['4'],
            'Screensize'     => $row['5'],
            'Connectivity'   => $row['6'],
            'ISOsensitivity' => $row['7'],
            'Description'    => $row['8'],
            'Interfaces'     => $row['9'],
        ]);
    }
}