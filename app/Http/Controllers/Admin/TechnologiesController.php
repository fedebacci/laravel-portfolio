<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;

class TechnologiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $technologies = Technology::all();
        return view('technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $projects = Project::all();
        return view('technologies.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        // dd($data);

        $newTechnology = new Technology();
        if ($data['name'] == null) {
            $newTechnology->name = 'No name';
        } else {
            $newTechnology->name = $data['name'];
        }
        if ($data['color'] == null) {
            $newTechnology->color = '#333333';
        } else {
            $newTechnology->color = $data['color'];
        }

        $newTechnology->save();


        // # If there are projects, attach them to the technology
        if ($request->has('projects')) {
            $newTechnology->projects()->attach($data['projects']);
        }

        return redirect()->route('technologies.show', $newTechnology->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        //
        return view('technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        //
        $projects = Project::all();
        return view('technologies.edit', compact('technology', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {
        //
        $data = $request->all();
        // dd($data);

        if ($data['name'] == null) {
            $technology->name = 'No name';
        } else {
            $technology->name = $data['name'];
        }
        if ($data['color'] == null) {
            $technology->color = '#333333';
        } else {
            $technology->color = $data['color'];
        }

        $technology->update();

        // # If there are projects, sync them to the technology
        if ($request->has('projects')) {
            $technology->projects()->sync($data['projects']);
        } else {
            $technology->projects()->detach();
        }


        return redirect()->route('technologies.show', $technology->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        //
        $technology->projects()->detach();

        $technology->delete();
        return redirect()->route('technologies.index');
    }
}
