<?php

namespace App\Http\Controllers;

use App\Models\background;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class experienceController extends Controller
{
    function __construct(){
        $this->_type = 'experience';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = background::where('type',$this->_type)->orderBy('end','desc')->get();
        return view('dashboard.experience.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        Session::flash('title',$request->title);
        Session::flash('info1',$request->info1);
        Session::flash('start',$request->start);
        Session::flash('end',$request->end);
        Session::flash('content',$request->content);
        $request->validate(
            [
                'title'=>'required',
                'info1'=>'required',
                'start'=>'required',
                'content'=>'required',
            ], 
            [
                'title.required'=> 'Title cannot be empty',
                'info1.required'=> 'Company Name cannot be empty',
                'start.required'=> 'Starting Date cannot be empty',
                'content.required'=>'Content cannot be empty',
            ]
            );

            $data = [
                'title'=>$request->title,
                'info1'=>$request->info1,
                'type'=>$this->_type,
                'start'=>$request->start,
                'end'=>$request->end,
                'content'=>$request->content
            ];
            background::create($data);

            return redirect()->route('experience.index')->with('success','Experience Data Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = background::where('id',$id)->where('type',$this->_type)->first();
        return view('dashboard.experience.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title'=>'required',
                'info1'=>'required',
                'start'=>'required',
                'content'=>'required',
            ], 
            [
                'title.required'=> 'Title cannot be empty',
                'info1.required'=> 'Company Name cannot be empty',
                'start.required'=> 'Starting Date cannot be empty',
                'content.required'=>'Content cannot be empty',
            ]
            );

            $data = [
                'title'=>$request->title,
                'info1'=>$request->info1,
                'type'=>$this->_type,
                'start'=>$request->start,
                'end'=>$request->end,
                'content'=>$request->content
            ];
            background::where('id',$id)->where('type',$this->_type)->update($data);

            return redirect()->route('experience.index')->with('success','Experience Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        background::where('id',$id)->where('type',$this->_type)->delete();
        return redirect()->route('experience.index')->with('success','Experience Data Deleted');
    }
}
