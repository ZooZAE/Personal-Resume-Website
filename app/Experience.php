<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $tables = 'experiences';
    protected $fillable = ['title','place_name','from','to'];
}
