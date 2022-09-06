<!-- @extends('layouts.MasterDashboard')

@section('style')
<link rel="stylesheet" href="{{asset('assets/front/css/content.css')}}">
@endsection
@section('content')
<div class="container_AssStudent ">
        <header>Add Class </header>

        <form class="row g-3" method = "POST" action = "AddClass">
        @csrf
            <div class="col-md-4">
            <label for="inputPassword4" class="form-label">Select grade</label>
            <select id="inputGrade" class="form-select mt-0" aria-label="Default select example" name="grade_id">
                <option selected>Choose...</option>
                  @foreach($grade as $item3)
                    <option value="{{ $item3->id }}">{{ $item3->grade_name }}</option>
                  @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <label for="inputPassword4" class="form-label">New class name</label>
                <input type="text" class="form-control" id="inputEmail" name="class_name">
            </div>
            <div class="col-md-4">
            <label for="inputPassword4" class="form-label">Select teacher</label>
            <select id="inputGrade" class="form-select mt-0" aria-label="Default select example" name="teacher_id">
                <option selected>Choose...</option>
                  @foreach($teacher as $item4)
                    <option value="{{ $item4->id }}">{{ $item4->full_name }}</option>
                  @endforeach
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Add Class</button>
            </div>
        </form>
    <div class="row">
        <header class ="mb-3">Class List</header>
        @foreach($grade as $item3)
        <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Grade {{ $item3->grade_name }}
            </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
            <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>                                
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classroom as $item)
                            @if($item3->id == $item->id)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->class_name }}</td>
                                
                                
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                                <td>
                                    <a href="" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
            </table>
            </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection -->