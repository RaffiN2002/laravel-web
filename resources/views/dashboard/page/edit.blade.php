@extends('dashboard.layout')
@section('content')
    <div class="pb-3"> <a href="{{route('page.index')}}" class="btn btn-secondary">
        << Back </a>
    </div>
    <form action="{{route('page.update',$data->id)}}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text"
            class="form-control form-control-sm" name="title" id="title" aria-describedby="helpId" placeholder="Add Title" value="{{$data->title}}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control summernote" rows="5" name="content">{{$data->content}}</textarea>
          </div>
          <button class="btn btn-primary" name="save" type="submit"> Save</button>
    </form>
@endsection