<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $tables = 'certificates';
    protected $fillable = ['title','description','from','to'];
}
