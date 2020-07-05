<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();
        return view('manage.setting.index')->with('setting', $setting);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $setting = Setting::first();
        $this->validate($request,[
            'preloader' => 'required',
            'font' => 'required',
            'lightbox' => 'required',
        ]);

        if($request->hasfile('icon')){
            $this->validate($request,['icon'=>'image']);
            $oldImage = $setting->icon;
            unlink($oldImage);
            $image = $request->icon;
            $image_new = time().$image->getClientoriginalName();
            $image->move('/uploads/settings', $image_new);
            $setting->icon ='/uploads/settings/'.$image_new;
        }

        if($request->hasfile('background')){
            $this->validate($request,['background'=>'image']);
            $image = $request->background;
            $image_new = time().$image->getClientoriginalName();
            $image->move('/uploads/settings', $image_new);
            $setting->background ='/uploads/settings/'.$image_new;
        }

        $setting->preloader = $request->preloader;
        $setting->font = $request->font;
        $setting->lightbox = $request->lightbox;
        $setting->save();
        return redirect()->route('manage.setting.index');
    }
}
