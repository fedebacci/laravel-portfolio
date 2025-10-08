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

        
        // # Abort if title, author, category or content are null (should be managed in the form with 'required' but if a space is entered it is not detected)
        // - Eventually launch an error message in the view instead of aborting and getting error screen
        // if ($data['title'] == null || $data['author'] == null || $data['category'] == null) {
        //     abort(400);
        // }
        
        
        // assignment of single attributes
        // # Codice per impedire l'invio di un contenuto nullo (se viene inserito uno spazio required non funziona)
        // - Solved using  pattern="\S(.*\S)?" in the form input to avoid spaces only, spaces in front or at the end. Leaving this control for safety
        if ($data['title'] == null) {
            $newProject->title = 'No title';
        } else {
            $newProject->title = $data['title'];
        }
        if ($data['author'] == null) {
            $newProject->author = 'No author';
        } else {
            $newProject->author = $data['author'];
        }
        if ($data['category'] == null) {
            $newProject->category = 'No category';
        } else {
            $newProject->category = $data['category'];
        }
        if ($data['content'] == null) {
            $newProject->content = 'No content';
        } else {
            $newProject->content = $data['content'];
        }
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

        // assignment of single attributes
        // # Codice per impedire l'invio di un contenuto nullo (se viene inserito uno spazio required non funziona)
        // - Solved using  pattern="\S(.*\S)?" in the form input to avoid spaces only, spaces in front or at the end. Leaving this control for safety
        if ($data['title'] == null) {
            $project->title = 'No title';
        } else {
            $project->title = $data['title'];
        }
        if ($data['author'] == null) {
            $project->author = 'No author';
        } else {
            $project->author = $data['author'];
        }
        if ($data['category'] == null) {
            $project->category = 'No category';
        } else {
            $project->category = $data['category'];
        }
        if ($data['content'] == null) {
            $project->content = 'No content';
        } else {
            $project->content = $data['content'];
        }

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
