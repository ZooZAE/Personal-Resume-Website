<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;
use Auth;
use App\profile;

class ProfileController extends Controller
{

    public function index()
    {
        return view('manage.user.profile')->with('user', Auth::user());
    }

    public function edit(profile $profile)
    {
        //
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email'=> 'required|email',
        ]);

        $user = Auth::user();

        if($request->hasfile('cv')){
            $this->validate($request,['cv'=>'mimes:pdf,doc,docx,zip']);
            $cv = $request->CV;
            $cv_new = time().$cv->getClientoriginalName();
            $cv->move('uploads/profile', $cv);
            $project->CV ='/uploads/profile/'.$cv_new;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->about = $request->about;
        $user->profile->phone = $request->phone;
        $user->profile->DOB = $request->DOB;

        $user->profile->address = $request->address;
            
        $user->profile->save();

            if($request->has('password')){
                $user->password = bcrypt($request->password);
            }

        $user->save();

        Session()->flash('success','Profile Updated!');
        return redirect()->back();
    }

}
