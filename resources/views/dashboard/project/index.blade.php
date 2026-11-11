@extends('dashboard.layout')
@section('content')
    <p class="card-title">Projects</p>
    <div class="pb-3"><a href="{{ route('project.create') }}" class="btn btn-primary"> + Add Project </a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th>Project Name</th>
                    <th>Tech Stack / Role</th>
                    <th>Year</th>
                    <th class="col-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->info1 }}</td>
                    <td>{{ $item->start ? \Carbon\Carbon::parse($item->start)->format('Y') : '' }}{{ $item->end ? ' – ' . \Carbon\Carbon::parse($item->end)->format('Y') : '' }}</td>
                    <td>
                        <a href="{{ route('project.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form onsubmit="return confirm('Are you sure you want to delete this project?')" action="{{ route('project.destroy', $item->id) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit" name="submit">Del</button>
                        </form>
                    </td>
                </tr>
                <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

