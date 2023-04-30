<?php

namespace App\Http\Controllers;

use App\Models\page;
use App\Models\metadata;
use Illuminate\Http\Request;

class pageSettingsController extends Controller
{
    function index(){
        $pagedata = page::orderBy('title','asc')->get();
        return view("dashboard.pageSettings.index")->with('pagedata',$pagedata);
    }

    function update(Request $request){
        metadata::updateOrCreate(['metakey'=>'page_about'],['metavalue'=>$request->page_about]);
        metadata::updateOrCreate(['metakey'=>'page_interest'],['metavalue'=>$request->page_interest]);
        metadata::updateOrCreate(['metakey'=>'page_award'],['metavalue'=>$request->page_award]);
        return redirect()->route('pageSettings.index')->with('success','Page Settings Data Updated');
    }
}
