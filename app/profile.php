<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $tables = 'profiles';
    protected $fillable = ['user_id','about','address','DOB','phone','CV'];

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
