<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Require authentication for all methods in this controller.
     */

    public function __construct(){
        $this->middleware('auth:api');
    }

    /**
     * Retrieve all projects.
     */

    public function getAllProjects(){
        return response()->json(Project::get(), 200);
    }

    /**
    * Retrieve a single project by it's id.
    * If project is not found, then it wil give a 404 response
    */

    public function getProject(int $projectid){
        $project = Project::find($projectid);

        if(!$project){
            return response()->json(['message' => 'Project not found'], 404);
        }
        return response()->json($project, 200);
    }

    /**
    * Create a new project
    */

    public function insertProject(Request $request){
        $newProject = Project::create($request->all());
        return response()->json(['message' => 'New project added', 'project' => $newProject], 201);
    }
    
    /**
    * Update an existing project by it's id.
    * If project is not found, then it wil give a 404 response
    */

    public function updateProject(Request $request, int $projectid){
        $project = Project::find($projectid);
        
        if(!$project){
            return response()->json(['message' => 'Project not found'], 404);
        }
        
        $project->update($request->all());
        return response()->json(['message' => 'Project updated', 'project' => $project], 200);
    }

    /**
    * Delete an existing project by it's id.
    * If project is not found, then it wil give a 404 response
    */

    public function deleteProject(int $projectid){
        $project = Project::find($projectid);

        if(!project){
            return response()->json(['message' => 'Project not found'], 404);
        }

        $project->delete();
        return response()->json(['message' => 'Project deleted'], 200);
    }
}
?>