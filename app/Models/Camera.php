<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camera extends Model
{
    use HasFactory;
    protected $fillable=[
       'image','Price','Seller','Color','Typecamera','Resolution','Screensize','Connectivity','ISOsensitivity','Description','Interfaces'
    ];
}
