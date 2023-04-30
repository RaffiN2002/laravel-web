<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class profileController extends Controller
{
    function index(){
        return view('dashboard.profile.index');
    }

    function update(Request $request){
        $request->validate([
            'photo'=>'mimes:jpeg,jpg,png,gif',
            'email'=>'required|email'
        ],[
            'photo.mimes'=>'Only jpeg, jpg, png, and gif photos are allowed',
            'email.required'=>'Email cannot be empty',
            'email.email'=>'Invaid email format'
        ]);

        if($request->hasFile('photo')){
            $filePhoto = $request->file('photo');
            $extension = $filePhoto->extension();
            $newPhoto = date('ymdhis').".$extension";
            $filePhoto->move(public_path('photo'), $newPhoto);
            
            //Update Photo
            $oldphoto = get_meta_value('photo');
            File::delete(public_path('photo')."/".$oldphoto);
            metadata::updateOrCreate(['metakey'=>'photo'],['metavalue'=> $newPhoto]);
        }
        metadata::updateOrCreate(['metakey'=>'email'],['metavalue'=> $request->email]);
        metadata::updateOrCreate(['metakey'=>'city'],['metavalue'=> $request->city]);
        metadata::updateOrCreate(['metakey'=>'province'],['metavalue'=> $request->province]);
        metadata::updateOrCreate(['metakey'=>'phonenum'],['metavalue'=> $request->phonenum]);
        metadata::updateOrCreate(['metakey'=>'facebook'],['metavalue'=> $request->facebook]);
        metadata::updateOrCreate(['metakey'=>'twitter'],['metavalue'=> $request->twitter]);
        metadata::updateOrCreate(['metakey'=>'linkedin'],['metavalue'=> $request->linkedin]);
        metadata::updateOrCreate(['metakey'=>'github'],['metavalue'=> $request->github]);
        return redirect()->route('profile.index')->with('success','Profile Data Updated');
    }
}
