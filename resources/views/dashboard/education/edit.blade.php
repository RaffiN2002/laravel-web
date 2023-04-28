@extends('dashboard.layout')
@section('content')
    <div class="pb-3"> <a href="{{route('education.index')}}" class="btn btn-secondary">
        << Back </a>
    </div>
    <form action="{{route('education.update',$data->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="title" class="form-label">University</label>
          <input type="text"
            class="form-control form-control-sm" name="title" id="title" aria-describedby="helpId" placeholder="Add University Name" value="{{$data->title}}">
        </div>
        <div class="mb-3">
            <label for="info1" class="form-label">Faculty Name</label>
            <input type="text"
              class="form-control form-control-sm" name="info1" id="info1" aria-describedby="helpId" placeholder="Add Faculty Name" value="{{$data->info1}}">
          </div>
          <div class="mb-3">
            <label for="info2" class="form-label">Major Name</label>
            <input type="text"
              class="form-control form-control-sm" name="info2" id="info2" aria-describedby="helpId" placeholder="Add Major Name" value="{{$data->info2}}">
          </div>
          <div class="mb-3">
            <label for="info3" class="form-label">GPA</label>
            <input type="text"
              class="form-control form-control-sm" name="info3" id="info3" aria-describedby="helpId" placeholder="Add GPA" value="{{$data->info3}}">
          </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-auto">Date Start</div>
                <div class="col-auto"><input type="date" class="form-control form-control-sm" name="start" placeholder="dd/mm/yyy" value="{{$data->start}}"></div>
                <div class="col-auto">Date End (Graduation)</div>
                <div class="col-auto"><input type="date" class="form-control form-control-sm" name="end" placeholder="dd/mm/yyy" value="{{$data->end}}"></div>
            </div>
          </div>
          <button class="btn btn-primary" name="save" type="submit"> Save</button>
    </form>
@endsection