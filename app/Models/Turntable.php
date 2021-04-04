<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turntable extends Model
{
    use HasFactory;
    protected $fillable=[
        'Mark','Line','Model','Voltage','Playbackspeeds','Audiooutputs','WithUSB','Recording','TurntableMaterial','Includescapsule','Description'
    ];
}
