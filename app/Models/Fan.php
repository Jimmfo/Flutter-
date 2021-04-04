<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fan extends Model
{
    use HasFactory;
    protected $fillable=[
        'Model','Mark','Price','Seller','Voltage','Fantype','Power','Speeds','RemoteControl','Feeding','Diameter'
    ];
        
}