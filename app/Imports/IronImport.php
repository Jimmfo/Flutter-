<?php

namespace App\Imports;

use App\Models\Iron;
use Maatwebsite\Excel\Concerns\ToModel;

class IronImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Iron([
            'Mark'   => $row['0'], 
            'Line'   => $row['1'],
            'Model'  => $row['2'],
            'Color'  => $row['3'],
            'Voltage'=> $row['4'],
            'Power'  => $row['5'],
            'Typeofiron'  => $row['6'],
            'Use'         => $row['7'],
            'Description' => $row['8'],
            'Coment'      => $row['9'],
        ]);
    }
}