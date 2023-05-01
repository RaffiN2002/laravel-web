<?php

namespace App\Http\Controllers;

use App\Models\page;
use App\Models\background;
use Illuminate\Http\Request;

class frontpageController extends Controller
{
    public function index(){
        $about_id = get_meta_value('page_about');
        $about_data = page::where('id',$about_id)->first();

        $interest_id = get_meta_value('page_interest');
        $interest_data = page::where('id',$interest_id)->first();

        $award_id = get_meta_value('page_award');
        $award_data = page::where('id',$award_id)->first();

        $experience_data = background::where('type', 'experience')->get();
        $education_data = background::where('type', 'education')->get();

        return view('frontpage.index')->with([
            'about'=> $about_data,
            'interest'=> $interest_data,
            'award'=> $award_data,
            'experience'=>$experience_data,
            'education'=>$education_data
        ]);
    }
}
