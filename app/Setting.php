<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $tables = 'settings';
    protected $fillable = ['preloader','font','lightbox','icon','background'];
}
