<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $tables = 'languages';
    protected $fillable = ['name','level'];
}
