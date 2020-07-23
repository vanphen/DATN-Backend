<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Companie extends Model
{
    protected $table = 'Companies';
    protected $fillable = [
        'name', 'id','address','phone','created_at','updated_at'  //add here
    ];
}
