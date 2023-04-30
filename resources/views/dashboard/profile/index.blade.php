@extends('dashboard.layout')
@section('content')

    <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-between">
          <div class="col-5">
            <h3>Profile</h3>
            @if (get_meta_value('photo'))
            <img style="max-width:100px;max-height:100px" src="{{asset('photo')."/".get_meta_value('photo')}}">
            @endif
             <div class="mb-3">
               <label for="photo" class="form-label">Photo</label>
               <input type="file" class="form-control form-control-sm" name="photo" id="photo">
              </div>
          <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control form-control-sm" name="city" id="city" value="{{get_meta_value('city')}}">
          </div>
          <div class="mb-3">
            <label for="province" class="form-label">Province</label>
            <input type="text" class="form-control form-control-sm" name="province" id="province" value="{{get_meta_value('province')}}">
          </div>
          <div class="mb-3">
            <label for="phonenum" class="form-label">Phone Number</label>
            <input type="text" class="form-control form-control-sm" name="phonenum" id="phonenum" value="{{get_meta_value('phonenum')}}">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control form-control-sm" name="email" id="email" value="{{get_meta_value('email')}}">
          </div>
          </div>
          <div class="col-5">
            <h3>Social Media</h3>
            <div class="mb-3">
              <label for="facebook" class="form-label">Facebook</label>
              <input type="text" class="form-control form-control-sm" name="facebook" id="facebook" value="{{get_meta_value('facebook')}}">
            </div>
            <div class="mb-3">
              <label for="twitter" class="form-label">Twitter</label>
              <input type="text" class="form-control form-control-sm" name="twitter" id="twitter" value="{{get_meta_value('twitter')}}">
            </div>
            <div class="mb-3">
              <label for="linkedin" class="form-label">LinkedIn</label>
              <input type="text" class="form-control form-control-sm" name="linkedin" id="linkedin" value="{{get_meta_value('linkedin')}}">
            </div>
            <div class="mb-3">
              <label for="github" class="form-label">GitHub</label>
              <input type="text" class="form-control form-control-sm" name="github" id="github" value="{{get_meta_value('github')}}">
            </div>
          </div>
        </div>
          <button class="btn btn-primary" name="save" type="submit"> Save</button>
    </form>
@endsection