<?php

namespace App\Imports;

use App\Models\Turntable;
use Maatwebsite\Excel\Concerns\ToModel;

class TurntableImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Turntable([
            'Mark'    => $row['0'], 
            'Line'    => $row['1'],
            'Model'   => $row['2'],
            'Voltage' => $row['3'],
      'Playbackspeeds'=> $row['4'],
      'Audiooutputs'  => $row['5'],
         'WithUSB'    => $row['6'],
         'Recording'  => $row['7'],
  'TurntableMaterial' => $row['8'],
  'Includescapsule'   => $row['9'],
     'Description'    => $row['10'],
        ]);
    }
}