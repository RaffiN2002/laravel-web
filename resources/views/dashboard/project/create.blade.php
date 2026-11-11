@extends('dashboard.layout')
@section('content')
    <div class="pb-3"><a href="{{ route('project.index') }}" class="btn btn-secondary"><< Back</a></div>
    <form action="{{ route('project.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Project Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control form-control-sm" name="title" id="title"
                placeholder="e.g. E-Commerce Platform" value="{{ Session::get('title') }}">
        </div>
        <div class="mb-3">
            <label for="info1" class="form-label">Tech Stack / Role</label>
            <input type="text" class="form-control form-control-sm" name="info1" id="info1"
                placeholder="e.g. Laravel, Vue.js, MySQL" value="{{ Session::get('info1') }}">
        </div>
        <div class="mb-3">
            <label for="info2" class="form-label">Project Link (optional)</label>
            <input type="text" class="form-control form-control-sm" name="info2" id="info2"
                placeholder="https://github.com/..." value="{{ Session::get('info2') }}">
        </div>
        <div class="mb-3">
            <div class="row align-items-center g-2">
                <div class="col-auto"><label class="col-form-label col-form-label-sm">Start Date</label></div>
                <div class="col-auto"><input type="date" class="form-control form-control-sm" name="start" value="{{ Session::get('start') }}"></div>
                <div class="col-auto"><label class="col-form-label col-form-label-sm">End Date</label></div>
                <div class="col-auto"><input type="date" class="form-control form-control-sm" name="end" value="{{ Session::get('end') }}"></div>
            </div>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Description <span class="text-danger">*</span></label>
            <textarea class="form-control summernote" rows="6" name="content">{{ Session::get('content') }}</textarea>
        </div>
        <button class="btn btn-primary" name="save" type="submit">Save</button>
    </form>
@endsection

