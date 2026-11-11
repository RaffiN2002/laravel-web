<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;

class skillController extends Controller
{
    public function index(){
        $stored = get_meta_value('language');
        $decoded = json_decode($stored ?: '', true);

        if (is_array($decoded)) {
            $skills = array_map(function ($skill) {
                return [
                    'name' => $skill['name'] ?? $skill['value'] ?? '',
                    'percentage' => (int) ($skill['percentage'] ?? 75),
                ];
            }, $decoded);
        } else {
            $skills = array_map(function ($name) {
                return ['name' => trim($name), 'percentage' => 75];
            }, explode(',', (string) $stored));
        }

        $skills = array_values(array_filter($skills, fn ($skill) => $skill['name'] !== ''));

        return view('dashboard.skill.index', compact('skills'));
    }

    public function update(Request $request){
        if($request->method()=='POST'){
            $request->validate([
                'skills'=>'required|array|min:1',
                'skills.*.name'=>'required|string|max:100',
                'skills.*.percentage'=>'required|integer|min:0|max:100',
                'workflow'=>'required|string'
            ],[
                'skills.required'=>'Add at least one skill',
                'skills.min'=>'Add at least one skill',
                'workflow.required'=>'Workflow cannot be empty',
            ]);

            $skills = collect($request->input('skills'))
                ->map(fn ($skill) => [
                    'name' => trim($skill['name']),
                    'percentage' => (int) $skill['percentage'],
                ])
                ->filter(fn ($skill) => $skill['name'] !== '')
                ->values()
                ->all();

            metadata::updateOrCreate(['metakey'=>'language'],['metavalue'=>json_encode($skills)]);
            metadata::updateOrCreate(['metakey'=>'workflow'],['metavalue'=>$request->workflow]);

            return redirect()->route('skill.index')->with('success','Skill Data Updated');
        }
    }
}
