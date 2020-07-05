<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;
use App\Education;

class EducationController extends Controller
{

    public function index()
    {
        $educations = Education::latest()->paginate(5);
        return view('manage.education.index')->with('educations', $educations);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'place_name'=> 'required',
            'from' => 'required',
            'to' => 'required',
        ]);

        $education = Education::create([
            'title' => $request->title,
            'place_name' => $request->place_name,
            'from' => $request->from,
            'to' => $request->to,
            ]);

        return redirect()->route('manage.education.index');
    }

    public function update(Request $request, Education $education)
    {
        $this->validate($request,[
            'title' => 'required',
            'place_name'=> 'required',
        ]);


        $education->title = $request->title;
        $education->place_name = $request->place_name;
        $education->from = $request->from;
        $education->to = $request->to;
            
        $education->save();
        Session()->flash('success','Education Updated!');
        return redirect()->route('manage.education.index');
    }

    public function destroy(Education $education)
    {
        $education->delete();
        session()->flash('success', 'You successfully deleted.');

        return redirect()->route('manage.education.index');
    }
}
