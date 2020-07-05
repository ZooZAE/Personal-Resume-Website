<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Experience;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::latest()->paginate(5);
        return view('manage.experience.index')->with('experiences', $experiences);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'place_name'=> 'required',
            'from' => 'required',
            'to' => 'required',
        ]);

        $experience = Experience::create([
            'title' => $request->title,
            'place_name' => $request->place_name,
            'from' => $request->from,
            'to' => $request->to,
            ]);

        return redirect()->route('manage.experience.index');
    }

    public function update(Request $request, Experience $experience)
    {
        $this->validate($request,[
            'title' => 'required',
            'place_name'=> 'required',
            'icon'=>'required',
        ]);


        $experience->title = $request->title;
        $experience->place_name = $request->place_name;
        $experience->from = $request->from;
        $experience->to = $request->to;
            
        $experience->save();
        return redirect()->route('manage.experience.index');
    }
    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('manage.experience.index');
    }
}
