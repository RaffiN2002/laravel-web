@extends('dashboard.layout')
@section('content')

    <form action="{{route('pageSettings.update')}}" method="POST">
        @csrf
        <div class="form-group row">
          <label class="col-sm-2">About</label>
          <div class="col-sm-6">
            <select class="form-control form-control-sm" name="page_about">
              <option value="">-choose-</option>
              @foreach ($pagedata as $item)
              <option value="{{$item->id}}" {{get_meta_value('page_about')==$item->id ?'selected':''}}>{{$item->title}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2">Interest</label>
          <div class="col-sm-6">
            <select class="form-control form-control-sm" name="page_interest">
              <option value="">-choose-</option>
              @foreach ($pagedata as $item)
              <option value="{{$item->id}}" {{get_meta_value('page_interest')==$item->id ?'selected':''}}>{{$item->title}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2">Award</label>
          <div class="col-sm-6">
            <select class="form-control form-control-sm" name="page_award">
              <option value="">-choose-</option>
              @foreach ($pagedata as $item)
              <option value="{{$item->id}}" {{get_meta_value('page_award')==$item->id ?'selected':''}}>{{$item->title}}</option>
              @endforeach
            </select>
          </div>
        </div>
      <button class="btn btn-primary" name="save" type="submit"> Save</button>
    </form>
@endsection