@extends('layouts.MasterDashboard')

@section('style')
<link rel="stylesheet" href="{{asset('assets/front/css/content.css')}}">
@endsection
@section('content')
<div class="container_AssStudent ">
        <header>Add Facility Fees </header>
        <form action="{{route('store.fee')}}" method="POST" class="row g-3">@csrf
        <div class="row g-3 mt-2 mb-2">
            <div class="col-md-3">
            <label for="inputPassword4" class="form-label">Select grade</label>
            <select id="inputGrade" class="form-select mt-0" aria-label="Default select example" name="grade_id" required>
                <option selected>Choose...</option>
                @foreach($grade as $item3)
                    <option value="{{ $item3->id }}">{{ $item3->grade_name }}</option>
                @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label for="inputPassword4" class="form-label">Enter Amount</label>
                <input type="number" min="00.00" max="100000.00" class="form-control" step="0.01" name="amount" required>
                </div>

            <div class="col-md-4">
                <label for="inputPassword4" class="form-label">Note</label>
                <textarea class="form-control" name="note" required></textarea>
            </div>
            <div class="d-flex justify-content-center col-md-2">
                <button type="submit" class="btn btn-primary">Add Facility Fees</button>
            </div>
        </div>
    </form>
    <div class="row">
        <header class ="mb-3">Class Fees List</header>
        <div class="text-end mb-3"><a href="{{route('submit_std.view')}}"><button class="btn btn-success">View Student Payments</button></a></div>
        <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            View payments
            </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
            <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Note</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fees as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->grade_name }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>{{ $item->note }}</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
            </table>
            </div>
            </div>
        </div>

    </div>
</div>

@endsection



