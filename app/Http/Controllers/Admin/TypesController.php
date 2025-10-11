<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $types = Type::all();
        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $projects = Project::all();
        // return view('types.create', compact('projects'));
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();

        // dd($data);

        $newType = new Type();

        // ! Name check
        if ($data['name'] == null) {
            $newType->name = 'No name';
        } else {
            $newType->name = $data['name'];
        }
        // $newType->name = $data['name'];
        $newType->description = $data['description'];
        
        
        
        $newType->save();
        return redirect()->route('types.show', $newType->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
        return view('types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        //
        return view('types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        //
        $data = $request->all();

        // dd($data);

        // # IMPORTANTE 
        // todo: Intercettare errore nome duplicato in db e gestirlo
        // ! Name check
        if ($data['name'] == null) {
            $type->name = 'No name';
        } else {
            $type->name = $data['name'];
        }
        
        $type->description = $data['description'];


        $type->update();
        return redirect()->route('types.show', $type->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        //
        $type->delete();
        return redirect()->route('types.index');
    }
}
