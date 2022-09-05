@extends('layouts.MasterDashboard')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/front/css/teacher.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/Ass.css') }}">
@endsection
@section('content')
    <div class="container_AssStudent">
        <div class="row">
            <div class="row col-8">
                <div class="row g-3 mt-3 col-12 ">
                    <div class="col-4">
                        <div class="box-card">
                            <div class="row g-0">
                                <div class="col-md-4 mt-3">
                                    <img src="{{ asset('assets/front/images/ass/ass.png') }}" alt="Trendy Pants and Shoes"
                                        class="img-fluid rounded-start d-flex" />
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <p class="card-text pb-1 mb-1">
                                            All <br>Assessments
                                        </p>
                                        <h2 class="card-title fw-bold d-flex justify-content-end pe-3">{{ $allnum }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-4">
                        <div class="box-card">
                            <div class="row g-0">
                                <div class="col-md-4 mt-3">
                                    <img src="{{ asset('assets/front/images/ass/no_pub.png') }}"
                                        alt="Trendy Pants and Shoes" class="img-fluid rounded-start d-flex mx-2" />
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <p class="card-text pb-1 mb-1">
                                            Unublished Assessments
                                        </p>
                                        <h2 class="card-title fw-bold d-flex justify-content-end pe-3">{{ $pubnum }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-4">
                        <div class="box-card ">
                            <div class="row g-0">
                                <div class="col-md-4 mt-3">
                                    <img src="{{ asset('assets/front/images/ass/expired.png') }}"
                                        alt="Trendy Pants and Shoes" class="img-fluid rounded-start d-flex mx-2" />
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <p class="card-text pb-1 mb-1 ">
                                            Expired Assessments
                                        </p>
                                        <h2 class="card-title fw-bold d-flex justify-content-end pe-3">{{ $exnum }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row g-3 mt-4 col-12 ">

                    <form action="#" method="GET" class="row g-3">@csrf
                        <div class="col-md-5">
                            <label for="inputState" class="form-label">Select Term</label>
                            <select name="term" id="term" onchange="getselector(this.value);"
                                class="form-control mt-3">
                                <option selected>Choose...</option>
                                <option value="allt">All Terms</option>
                                <option value="term1">First Term </option>
                                <option value="term2">Second Term </option>
                                <option value="term3">Third Term</option>
                            </select>
                        </div>
                        <div class="col-md-5" id="day1" hidden>
                            <label for="inputState" class="form-label">Select Date</label>
                            <select name="day" id="day" class="form-control mt-3"
                                aria-label="Default select example">
                                <option selected value="">Choose...</option>
                                <option value="monday">Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wensday">Wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="friday">Friday</option>
                            </select>
                        </div>
                        <div class="col-md-2">

                            <input type="submit" class="btn btn-primary mt-5 " name="submit" value="View">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-4">
                <header class="mb-3">List of Due Assessments</header>
                <table class="table table-success table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Assessment</th>
                            <th>Due Date</th>
                            <th>Notify</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nearex as $key => $n)
                            <tr>
                                <td>{{ $n->title }}</td>
                                <td>{{ $n->due_date }}</td>
                                <td>
                                    <form action="{{ route('ass.notify', [$both_class->classid,$both_class->subjectid,$n->id]) }}" method="POST" class="row g-3">@csrf
                                    <button class="btn btn-warning btn-sm col-6"><i class="bi bi-bell"></i></button></a>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-end mt-3">
                    {!! $nearex->links() !!}
                </div>

            </div>
        </div>


        <header>View All Assessments</header>

        <div class="text-end">
            <button type="submit" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createmodal"
                name="submit"><i class="bi bi-plus mx-1"></i>Add New Assessment</button>
            <a href="{{ route('ass.sumitindex', [$classid, $subjectid]) }}">
                <button type="button" class="btn btn-primary mb-3">View
                    submissions</button>
            </a>
        </div>
        <form action="?" class="col-sm-2 me-auto">
            <div class="col-12">
                <input type="text" name="search" placeholder="Search......." value="{{ request()->search }}"
                    class="form-control">
            </div>
        </form>


        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif


        @if ($assments->count() > 0)
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Term</th>
                        <th>Published Week</th>
                        <th>Published Day</th>
                        <th>Due Date</th>
                        <th>Assessment Type</th>
                        <th>Assessment</th>
                        <th>View</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assments as $key => $ass)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $ass->title }}</td>
                            <td>{{ $ass->term }}</td>
                            <td>{{ $ass->week }}</td>
                            <td>{{ $ass->day }}</td>
                            <td>{{ $ass->due_date }}</td>
                            <td>{{ $ass->assessment_type }}</td>



                            @if ($ass->assessment_type == 'mcq_quiz')
                                @if ($ass->status == 'published')
                                    <td><button class="btn btn-success btn-sm" disabled>Add Question</td>
                                @else
                                    <td><button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#qModal" data-bs-id="{{ $ass->id }}">Add Question</td>
                                @endif

                                <td><a href="{{ route('ass.quizshow', [$ass->id]) }}"><button
                                            class="btn btn-primary btn-sm"><i
                                                class="bi bi-binoculars-fill"></i></button></a> </td>
                            @else
                                <td>{{ $ass->assessment_file }}</a></td>
                                <td><a class="Link"
                                        href="http://127.0.0.1:8000/assignments/{{ $ass->assessment_file }}"><button
                                            class="btn btn-primary btn-sm"><i
                                                class="bi bi-binoculars-fill"></i></button></a> </td>
                            @endif

                            <td>{{ $ass->status }}</td>

                            <td class="btn-toolbar">

                                @if ($ass->status == 'published')
                                    <button class="btn btn-primary btn-sm " disabled><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal" data-bs-id="{{ $ass->id }}"><i
                                            class="bi bi-trash"></i></button>
                                    <button id="published" class="btn btn-success btn-sm" type="submit" name="status"
                                        value="published" disabled><i class="bi bi-upload"></i></button>
                                @else
                                    <button class="btn btn-primary btn-sm " data-bs-toggle="modal"
                                        data-bs-target="#editassModal" data-bs-id="{{ $ass->id }}"
                                        data-bs-title="{{ $ass->title }}"
                                        data-bs-description="{{ $ass->description }}" data-bs-term="{{ $ass->term }}"
                                        data-bs-week="{{ $ass->week }}" data-bs-day="{{ $ass->day }}"
                                        data-bs-due_date="{{ $ass->due_date }}"
                                        data-bs-assessment_type="{{ $ass->assessment_type }}"
                                        data-bs-assessment_file="{{ $ass->assessment_file }}"><i
                                            class="bi bi-pencil-square "></i> </button>

                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal" data-bs-id="{{ $ass->id }}"><i
                                            class="bi bi-trash"></i></button>
                                    <form action="{{ route('ass.status', [$ass->id]) }}" method="POST">@csrf
                                        <button class="btn btn-success btn-sm" type="submit" name="status"
                                            value="published"><i class="bi bi-upload"></i></button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="pagination justify-content-end mt-3">
                {!! $assments->links() !!}
            </div>
        @else
            <div class="d-flex justify-content-center mt-5">
                <div class="search-card">
                    <div class="row">
                        <h4 class="search-font ">Can't find any Records </h4>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-4 mt-3 ">
                            <img src="{{ asset('assets/front/images/ass/rec.png') }}" alt="Trendy Pants and Shoes"
                                class="img-fluid rounded-start d-flex " />
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>


    {{-- modal for create --}}
    <div class="modal fade" id="createmodal" tabindex="-1" aria-labelledby="example1ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title table" id="example1ModalLabel">Add New Assessment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body table">
                    @include('teacher.Models.asscreate')
                </div>
            </div>
        </div>
    </div>

    {{-- modal for Question --}}
    <div class="modal fade" id="qModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title table" id="exampleModalLabel">Add a Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body table">
                    @include('teacher.Models.q_create')
                </div>
            </div>
        </div>
    </div>

    {{-- modal for edit --}}
    <div class="modal fade" id="editassModal" tabindex="-1" aria-labelledby="example1ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title table" id="example1ModalLabel">Edit Assessment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body table">
                    @include('teacher.Models.assedit')
                </div>
            </div>
        </div>
    </div>
    {{-- delete modal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="example1ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title table del text-center" id="example1ModalLabel">Delete Assessment</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body table">
                    @include('teacher.Models.deletemodal')
                </div>
            </div>
        </div>
    </div>







    <script src="{{ asset('assets/front/js/optionselector.js') }}"></script>


@endsection
