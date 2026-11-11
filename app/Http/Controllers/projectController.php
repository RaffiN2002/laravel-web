<?php

namespace App\Http\Controllers;

use App\Models\background;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class projectController extends Controller
{
    function __construct(){
        $this->_type = 'project';
    }

    public function index()
    {
        $data = background::where('type', $this->_type)->orderBy('end', 'desc')->get();
        return view('dashboard.project.index')->with('data', $data);
    }

    public function create()
    {
        return view('dashboard.project.create');
    }

    public function store(Request $request)
    {
        Session::flash('title', $request->title);
        Session::flash('info1', $request->info1);
        Session::flash('info2', $request->info2);
        Session::flash('start', $request->start);
        Session::flash('end', $request->end);
        Session::flash('content', $request->content);

        $request->validate(
            [
                'title'   => 'required',
                'content' => 'required',
            ],
            [
                'title.required'   => 'Project name cannot be empty',
                'content.required' => 'Project description cannot be empty',
            ]
        );

        $data = [
            'title'   => $request->title,
            'info1'   => $request->info1 ?: null,
            'info2'   => $request->info2 ?: null,
            'type'    => $this->_type,
            'start'   => $request->start ?: null,
            'end'     => $request->end ?: null,
            'content' => $request->content,
        ];
        background::create($data);

        return redirect()->route('project.index')->with('success', 'Project saved successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = background::where('id', $id)->where('type', $this->_type)->first();
        return view('dashboard.project.edit')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title'   => 'required',
                'content' => 'required',
            ],
            [
                'title.required'   => 'Project name cannot be empty',
                'content.required' => 'Project description cannot be empty',
            ]
        );

        $data = [
            'title'   => $request->title,
            'info1'   => $request->info1 ?: null,
            'info2'   => $request->info2 ?: null,
            'type'    => $this->_type,
            'start'   => $request->start ?: null,
            'end'     => $request->end ?: null,
            'content' => $request->content,
        ];
        background::where('id', $id)->where('type', $this->_type)->update($data);

        return redirect()->route('project.index')->with('success', 'Project updated successfully');
    }

    public function destroy($id)
    {
        background::where('id', $id)->where('type', $this->_type)->delete();
        return redirect()->route('project.index')->with('success', 'Project deleted successfully');
    }
}

