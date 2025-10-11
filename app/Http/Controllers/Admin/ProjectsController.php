<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
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
        // dd($project->technologies);
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $types = Type::all();
        $technologies = Technology::all();
        return view('projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $newProject = new Project();

        $data['startDate'] = $data['startDate'] . ' 00:00:00';
        $data['endDate'] = $data['endDate'] . ' 00:00:00';


        // dd($data);

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
        // ! Title check
        if ($data['title'] == null) {
            $newProject->title = 'No title';
        } else {
            $newProject->title = $data['title'];
        }
        // ! Client check
        if ($data['client'] == null) {
            $newProject->client = 'No client';
        } else {
            $newProject->client = $data['client'];
        }
        // ! Type check
        if ($data['type_id'] == 'null') {
            $newProject->type_id = null;
        } else {
            $newProject->type_id = $data['type_id'];
        }

        // # IMPORTANTE
        // - Control that endDate is after startDate
        if ($data['startDate'] > $data['endDate']) {
            // ! Redirect back with input and error message
            return redirect()->back()->withInput()->withErrors(['endDate' => 'End date must be after start date']);
        }
        // todo: redirect back mantaining the input data as the last data entered, even if it is not saved because of the error
        // ! https://laravel.com/docs/10.x/validation#redirecting-with-input
        // https://laravel.com/docs/10.x/validation#repopulating-forms



        // ! Start date check
        if ($data['startDate'] == null) {
            $newProject->startDate = 'No startDate';
        } else {
            $newProject->startDate = $data['startDate'];
        }
        // ! End date check
        if ($data['endDate'] == null) {
            $newProject->endDate = 'No endDate';
        } else {
            $newProject->endDate = $data['endDate'];
        }
        // ! Summary check
        if ($data['summary'] == null) {
            $newProject->summary = 'No summary';
        } else {
            $newProject->summary = $data['summary'];
        }
        // dd($newProject);

        $newProject->save();

        // # If there are technologies, attach them to the project
        if ($request->has('technologies')) {
            $newProject->technologies()->attach($data['technologies']);
        }

        return redirect()->route('projects.show', $newProject->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
        // dd($project);
        $types = Type::all();
        $technologies = Technology::all();
        return view('projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
        $data = $request->all();

        $data['startDate'] = $data['startDate'] . ' 00:00:00';
        $data['endDate'] = $data['endDate'] . ' 00:00:00';

        // dd($data);

        // assignment of single attributes
        // # Codice per impedire l'invio di un contenuto nullo (se viene inserito uno spazio required non funziona)
        // - Solved using  pattern="\S(.*\S)?" in the form input to avoid spaces only, spaces in front or at the end. Leaving this control for safety
        // ! Title check
        if ($data['title'] == null) {
            $project->title = 'No title';
        } else {
            $project->title = $data['title'];
        }
        // ! Client check
        if ($data['client'] == null) {
            $project->client = 'No client';
        } else {
            $project->client = $data['client'];
        }
        // ! Type check
        if ($data['type_id'] == 'null') {
            $project->type_id = null;
        } else {
            $project->type_id = $data['type_id'];
        }

        

        // # IMPORTANTE
        // - Control that endDate is after startDate
        if ($data['startDate'] > $data['endDate']) {
            // ! Redirect back with input and error message
            return redirect()->back()->withInput()->withErrors(['endDate' => 'End date must be after start date']);
        }
        // todo: redirect back mantaining the input data as the last data entered, even if it is not saved because of the error
        // ! https://laravel.com/docs/10.x/validation#redirecting-with-input
        // https://laravel.com/docs/10.x/validation#repopulating-forms


        // ! Start date check
        if ($data['startDate'] == null) {
            $project->startDate = 'No startDate';
        } else {
            $project->startDate = $data['startDate'];
        }
        // ! End date check
        if ($data['endDate'] == null) {
            $project->endDate = 'No endDate';
        } else {
            $project->endDate = $data['endDate'];
        }
        // ! Summary check
        if ($data['summary'] == null) {
            $project->summary = 'No summary';
        } else {
            $project->summary = $data['summary'];
        }

        // dd($project);

        $project->update();

        // # If there are technologies, sync them to the project
        if ($request->has('technologies')) {
            // dd($data['technologies']);
            $project->technologies()->sync($data['technologies']);
        } else {
            $project->technologies()->detach();
        }

        return redirect()->route('projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
        $project->technologies()->detach();

        // dd($project);
        // dd($project->technologies);
        $project->delete();
        return redirect()->route('projects.index');
    }
}
