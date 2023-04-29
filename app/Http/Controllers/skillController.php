<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;

class skillController extends Controller
{
    public function index(){
        $skill_url = public_path('db_admin/devicon.json');
        $skill_data = file_get_contents($skill_url);
        $skill_data = json_decode($skill_data,true);
        $skill = array_column($skill_data,'name');
        $skill = "'" . implode("','", $skill) . "'";
        return view('dashboard.skill.index')->with(['skill'=>$skill]);
    }

    public function update(Request $request){
        if($request->method()=='POST'){
            $request->validate([
                'language'=>'required',
                'workflow'=>'required'
            ],[
                'language.required'=>'Programming Languages & Tools cannot be empty',
                'workflow.required'=>'Workflow cannot be empty',
            ]);

            metadata::updateOrCreate(['metakey'=>'language'],['metavalue'=>$request->language]);
            metadata::updateOrCreate(['metakey'=>'workflow'],['metavalue'=>$request->workflow]);

            return redirect()->route('skill.index')->with('success','Skill Data Updated');
        }
    }
}
