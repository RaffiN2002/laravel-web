@extends('dashboard.layout')
@section('content')

    <form action="{{route('skill.update')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Programming Languages & Tools</label>
          <input type="text"
            class="form-control form-control-sm skill" name="language" id="title" aria-describedby="helpId" placeholder=" Add Programming Language & Tools" value="{{get_meta_value('language')}}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Workflow</label>
            <textarea class="form-control summernote" rows="5" name="workflow">{{get_meta_value('workflow')}}</textarea>
          </div>
          <button class="btn btn-primary" name="save" type="submit"> Save</button>
    </form>
@endsection