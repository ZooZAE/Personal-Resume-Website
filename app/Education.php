<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $tables = 'educations';
    protected $fillable = ['title','place_name','from','to'];

}
