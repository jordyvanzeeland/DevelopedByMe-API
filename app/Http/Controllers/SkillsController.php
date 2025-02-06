<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    /**
     * Require authentication for all methods in this controller.
     */

    public function __construct(){
        $this->middleware('auth:api');
    }

    /**
     * Retrieve all skills.
     */

    public function getAllSkills(){
        return response()->json(Skill::get(), 200);
    }

    /**
    * Retrieve a single skill by it's id.
    * If skill is not found, then it wil give a 404 response
    */

    public function getSkill(int $skillid){
        $skill = Skill::find($skillid);

        if(!$skill){
            return response()->json(['message' => 'skill not found'], 404);
        }
        return response()->json($skill, 200);
    }

    /**
    * Create a new skill
    */

    public function insertSkill(Request $request){
        $newSkill = Skill::create($request->all());
        return response()->json(['message' => 'New skill added', 'skill' => $newSkill], 201);
    }

    /**
    * Update an existing skill by it's id.
    * If skill is not found, then it wil give a 404 response
    */

    public function updateSkill(Request $request, int $skillid){
        $skill = Skill::find($skillid);
        
        if(!$skill){
            return response()->json(['message' => 'Skill not found'], 404);
        }
        
        $skill->update($request->all());
        return response()->json(['message' => 'Skill updated', 'skill' => $skill], 200);
    }

    /**
    * Delete an existing skill by it's id.
    * If skill is not found, then it wil give a 404 response
    */

    public function deleteSkill(int $skillid){
        $skill = Skill::find($skillid);

        if(!project){
            return response()->json(['message' => 'Skill not found'], 404);
        }

        $skill->delete();
        return response()->json(['message' => 'Skill deleted'], 200);
    }
}
