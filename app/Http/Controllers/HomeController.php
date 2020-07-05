<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Setting;
use App\User;
use App\SocialLink;
use App\Certificate;
use App\Education;
use App\Experience;
use App\Interest;
use App\Language;
use App\Projects;
use App\Skill;

class HomeController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $certificates = Certificate::all();
        $educations = Education::all();
        $experiences = Experience::all();
        $interests = Interest::all();
        $languages = Language::all();
        $projects = Projects::all();
        $skills = Skill::all();
        $user = User::first();
        $socials = SocialLink::where('enabled', true)->get();
        return view('welcome')
        ->with('setting',$setting)
        ->with('certificates',$certificates)
        ->with('educations',$educations)
        ->with('experiences',$experiences)
        ->with('interests',$interests)
        ->with('languages',$languages)
        ->with('projects',$projects)
        ->with('skills',$skills)
        ->with('socials',$socials)
        ->with('user', $user);
    }
}
