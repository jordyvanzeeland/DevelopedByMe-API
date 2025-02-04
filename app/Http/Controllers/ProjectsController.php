<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function getAllProjects(){
        return Project::get();
    }

    public function getProject(int $projectid){
        return Project::find($projectid);
    }

    public function insertProject(Request $request){
        $current_date = date('Y-m-d H:i:s');

        $newProject = Project::create([
            "name" => $request->name,
            "image" => $request->image,
            "description" => $request->description,
            "git" => $request->git,
            "skills" => $request->skills,
            "public" => $request->public,
            "created_at" => $current_date,
            "updated_at" => $current_date
        ]);

        return response()->json(['message' => 'New project added', 'project' => $newProject], 201);
    }

    public function updateProject(Request $request, int $projectid){
        $currentProject = Project::find($projectid);
        $currentProject->update($request->all());
        return response()->json(['message' => 'Project updated', 'project' => $currentProject], 200);
    }

    public function deleteProject(int $projectid){
        $currentProject = Project::find($projectid);
        $currentProject->delete();
        return response()->json(['message' => 'Project deleted'], 200);
    }
}
