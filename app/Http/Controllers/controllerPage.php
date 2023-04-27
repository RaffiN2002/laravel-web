<?php

namespace App\Http\Controllers;

use App\Models\page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class controllerPage extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = page::orderBy('title', 'asc')->get();
        return view('dashboard.page/index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.page.create');
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
        Session::flash('content',$request->content);
        $request->validate(
            [
                'title'=>'required',
                'content'=>'required',
            ], 
            [
                'title.required'=> 'Title cannot be empty',
                'content.required'=>'Content cannot be empty',
            ]
            );

            $data = [
                'title'=>$request->title,
                'content'=>$request->content
            ];
            page::create($data);

            return redirect()->route('page.index')->with('success','Data Saved');
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
        $data = page::where('id',$id)->first();
        return view('dashboard.page.edit')->with('data',$data);
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
                'content'=>'required',
            ], 
            [
                'title.required'=> 'Title cannot be empty',
                'content.required'=>'Content cannot be empty',
            ]
            );

            $data = [
                'title'=>$request->title,
                'content'=>$request->content
            ];
            page::where('id',$id)->update($data);

            return redirect()->route('page.index')->with('success','Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        page::where('id',$id)->delete();
        return redirect()->route('page.index')->with('success','Data Deleted');
    }
}
