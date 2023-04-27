@extends('dashboard.layout')
@section('content')
    <div class="pb-3"> <a href="{{route('page.index')}}" class="btn btn-secondary">
        << Back </a>
    </div>
    <form action="{{route('page.store')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text"
            class="form-control form-control-sm" name="title" id="title" aria-describedby="helpId" placeholder="Add Title" value="{{Session::get('title')}}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" rows="5" name="content">{{Session::get('content')}}</textarea>
          </div>
          <button class="btn btn-primary" name="save" type="submit"> Save</button>
    </form>
@endsection