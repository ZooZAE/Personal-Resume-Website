<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    protected $tables = 'sociallinks';
    protected $fillable = ['title','icon','url', 'enabled'];

}
