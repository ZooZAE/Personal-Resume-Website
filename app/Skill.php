<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $tables = 'skills';
    protected $fillable = ['skill','icon'];
}
