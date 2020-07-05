<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        $socials = SocialLink::paginate(5);
        return view('manage.social.index')->with('socials', $socials);
    }

    public function enabled(SocialLink $social)
    {
        $social->enabled = 1;
        $social->save();
        return redirect()->back();

    }
    
    public function disabled(SocialLink $social)
    {
        $social->enabled = 0;
        $social->save();
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'icon' => 'required',
            'url' => 'required',
        ]);

        $socialLink = SocialLink::create([
            'title' => $request->title,
            'icon' => $request->icon,
            'url' => $request->url,
        ]);

        return redirect()->back();
    }

    public function update(Request $request, SocialLink $social)
    {
        $this->validate($request,[
            'title' => 'required',
            'icon' => 'required',
            'url' => 'required',
        ]);

        $social->title = $request->title;
        $social->icon = $request->icon;
        $social->url = $request->url;

        $social->save();
        Session()->flash('success','Social Link Updated!');
        return redirect()->back();
    }

    public function destroy(SocialLink $social)
    {
        $social->delete();
        return redirect()->back();
    }
}
