<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
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
        return view('technologies.create');
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
        return view('technologies.edit', compact('technology'));
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
