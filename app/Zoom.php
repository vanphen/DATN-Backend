<?php

namespace App;
use App;
use Illuminate\Database\Eloquent\Model;

class Zoom extends Model
{
    protected $table = 'zooms';
    protected $fillable = ['id', 'name'];
    public $incrementing = false;
    
    public function message()
    {
        return $this->hasMany('App\Message');
    }

}
