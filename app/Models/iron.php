<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class iron extends Model
{
    use HasFactory;
    protected $fillable=[
        'image','Mark','Line','Model','Color','Voltage','Power','Typeofiron','Use','Description','Coment'
    ];
}
