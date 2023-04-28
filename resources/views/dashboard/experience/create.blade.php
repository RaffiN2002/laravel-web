@extends('dashboard.layout')
@section('content')
    <div class="pb-3"> <a href="{{route('experience.index')}}" class="btn btn-secondary">
        << Back </a>
    </div>
    <form action="{{route('experience.store')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Position</label>
          <input type="text"
            class="form-control form-control-sm" name="title" id="title" aria-describedby="helpId" placeholder="Add Position" value="{{Session::get('title')}}">
        </div>
        <div class="mb-3">
            <label for="info1" class="form-label">Company Name</label>
            <input type="text"
              class="form-control form-control-sm" name="info1" id="info1" aria-describedby="helpId" placeholder="Add Company Name" value="{{Session::get('info1')}}">
          </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-auto">Date Start</div>
                <div class="col-auto"><input type="date" class="form-control form-control-sm" name="start" placeholder="dd/mm/yyy" value="{{Session::get('start')}}"></div>
                <div class="col-auto">Date End</div>
                <div class="col-auto"><input type="date" class="form-control form-control-sm" name="end" placeholder="dd/mm/yyy" {{Session::get('end')}}></div>
            </div>
          </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control summernote" rows="5" name="content">{{Session::get('content')}}</textarea>
          </div>
          <button class="btn btn-primary" name="save" type="submit"> Save</button>
    </form>
@endsection