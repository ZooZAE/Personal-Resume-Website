<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;
use App\Skill;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::paginate(5);
        return view('manage.skill.index')->with('skills', $skills);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'skill' => 'required',
            'icon' => 'required|image',
        ]);

        $image = $request->icon;
        $image_new = time().$image->getClientoriginalName();
        $image->move('/uploads/skills', $image_new);

        $skill = Skill::create([
            'skill' => $request->skill,
            'icon' => '/uploads/skills/'.$image_new,
            ]);

        return redirect()->back();
    }

    public function update(Request $request, Skill $skill)
    {
        $this->validate($request,[
            'skill' => 'required',
            'icon' => 'required|image',
        ]);

        if($request->hasfile('icon')){
            $this->validate($request,['icon'=>'image']);
            $oldImage = $skill->icon;
            unlink($oldImage);
            $image = $request->icon;
            $image_new = time().$image->getClientoriginalName();
            $image->move('/uploads/skills', $image_new);
            $skill->icon ='/uploads/skills/'.$image_new;
        }

        $skill->skill = $request->skill;

        $skill->save();
        Session()->flash('success','Skill Updated!');
        return redirect()->back();
    }

    public function destroy(Skill $skill)
    {
        $image = $skill->icon;
        unlink($image);
        $skill->delete();
        session()->flash('success', 'You successfully deleted.');

        return redirect()->route('manage.skill.index');
    }
}
