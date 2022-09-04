@extends('layouts.MasterDashboard')

@section('content')
<div class="content">
    <div class="row">
        <header class="mb-3">Teacher List</header>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>dob</th>
                    <th>address</th>
                    <th>guardian_name</th>
                    <th>Grade</th>
                    <th>Class</th>

                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($result as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->full_name }}</td>
                    <td>{{ $item->dob }}</td>
                    <td>{{ $item->guardian_name }}</td>
                    <td>{{ $item->Grade }}</td>
                    <td>{{ $item->Class }}</td>

                    <td>
                        <a href="" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                    <td>
                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection