<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function index() {
        $projects = Project::with('type', 'technologies')->get();

        if ($projects->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No projects found',
            ], 404);
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Projects retrieved successfully',
            'data' => $projects
        ]);
    }


    
    public function show(Project $project) {
        // dd($project);

        $project->load('type', 'technologies');

        if($project) {
            return response()->json([
                'success' => true,
                'message' => 'Project retrieved successfully',
                'data' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Project not found',
            ], 404);
        }
    }
}
