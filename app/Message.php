<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    //
    protected $fillable = ['id', 'content', 'user_id', 'zoom_id'];

}
