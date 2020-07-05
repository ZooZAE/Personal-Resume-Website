<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $tables = 'interests';
    protected $fillable = ['interest'];
}
