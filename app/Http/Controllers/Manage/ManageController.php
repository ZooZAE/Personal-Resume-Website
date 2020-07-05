<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class ManageController extends Controller
{

    public function index(){
        return view('manage.dashboard');
    }

    public function dashboard(){
        return view('manage.dashboard');
    }
}
