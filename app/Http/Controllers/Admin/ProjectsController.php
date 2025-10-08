<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $newProject = new Project();

        // - mass assignment
        // # make sure to set the $fillable property in the Model
        // $newProject->fill($data);

        // assignment of single attributes
        $newProject->title = $data['title'];
        $newProject->author = $data['author'];
        $newProject->category = $data['category'];
        $newProject->content = $data['content'];
        // dd($newProject);

        $newProject->save();
        return redirect()->route('projects.show', $newProject->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
        // dd($project);
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
        $data = $request->all();
        // dd($data);
        $project->title = $data['title'];
        $project->author = $data['author'];
        $project->category = $data['category'];
        $project->content = $data['content'];

        // dd($project);

        $project->update();
        return redirect()->route('projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
        $project->delete();
        return redirect()->route('projects.index');
    }
}
