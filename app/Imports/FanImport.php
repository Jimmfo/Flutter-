<?php

namespace App\Imports;

use App\Models\Fan;
use Maatwebsite\Excel\Concerns\ToModel;

class FanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Fan([
            'Model'      => $row['0'],
            'Mark'       => $row['1'],
            'Price'      => $row['2'],
            'Seller'     => $row['3'],
            'Voltage'    => $row['4'],
            'Fantype'    => $row['5'],
            'Power'      => $row['6'],
            'Speeds'     => $row['7'],
            'RemoteControl'  => $row['8'],
            'Feeding'       => $row['9'],
            'Diameter'      => $row['10'],
        ]);
    }
}