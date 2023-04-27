@extends('dashboard.layout')
@section('content')
    <p class="card-title">Admin Page</p>
    <div class="pb-3"><a href="{{route('page.create')}}" class="btn btn-primary"> + Add Page </a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th>Title</th>
                    <th class="col-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1?>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item->title }}</td>
                    <td>
                        <a href='' class="btn btn-sm btn-warning">Edit</a>
                        <a href='' class="btn btn-sm btn-danger">Del</a>
                    </td>
                </tr>
                <?php $i++;?>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
