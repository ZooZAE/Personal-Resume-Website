<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $tables = 'projects';
    protected $fillable = ['title','description','image','url','from', 'to'];
}
