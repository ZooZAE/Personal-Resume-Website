<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Projects;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Projects::paginate(3);
        return view('manage.project.index')->with('projects', $projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $image = $request->image;
        $image_new = time().$image->getClientoriginalName();
        $image->move('/uploads/projects', $image_new);

        $project = Projects::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => '/uploads/projects/'.$image_new,
            'url' => $request->url,
            'from' => $request->from,
            'to' => $request->to,
            ]);

        return redirect()->route('manage.project.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(Projects $projects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(Projects $projects)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projects $project)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
        ]);
        

        if($request->hasfile('image')){
            $this->validate($request,['image'=>'image']);
            $image = $request->image;
            $image_new = time().$image->getClientoriginalName();
            $image->move('/uploads/projects', $image_new);
            $project->image ='/uploads/projects/'.$image_new;
        }

        $project->title = $request->title;
        $project->description = $request->description;
        $project->url = $request->url;
        $project->from = $request->from;
        $project->to = $request->to;
            
        $project->save();
        return redirect()->route('manage.project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projects $project)
    {
        $image = $project->image;
        unlink($image);
        $project->delete();
        return redirect()->route('manage.project.index');
    }
}
