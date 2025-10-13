<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function index() {
        // return "Sei nella index delle api di progetti";

        
        $projects = Project::all();

        // - Cerco di mappare le technologies prima di fornirle alla risposta, ma non funziona perchè è una cllection e non un array
        // foreach($projects as $project) {
        //     $project->technologies = array_map(function($technology) {
        //         return ['name' => $technology['name'], 'color' => $technology['color']];
        //     }, $project->technologies);
        // }

        foreach($projects as $project) {
            // $project->technologies = json_decode($project->technologies);
            $project->technologies = $project->technologies;
        }

        return response()->json([
            'success' => true,
            'message' => 'Projects retrieved successfully',
            'data' => $projects
        ]);
    }
}
