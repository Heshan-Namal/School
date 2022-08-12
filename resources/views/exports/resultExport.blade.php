<html>
<head>
<link rel="stylesheet" href="{{asset('assets/front/css/content.css')}}">
<link rel="stylesheet" href="{{asset('assets/front/bootstrap/css/bootstrap.min.css')}}">

</head>
<body>
    <div class="row mb-3 col-6 ">
        <h1 class="timetable cd-head text-center mb-2">Term Test Marks</h1>
    </div>
<div class="container_AssStudent col-6">
    <div>
    <div class="row g-3 ">
        <div class="col-md-3">
            <label for="inputEmail4" class="form-label">Year</label>
            <input type="text" disabled class="form-control" value="{{$lables->year}}">
        </div>
        <div class="col-md-3">
            <label for="inputEmail4" class="form-label">Term</label>
            <input type="text" disabled class="form-control" value="{{$lables->term}}">
        </div>
        <div class="col-md-3">
            <label for="inputEmail4" class="form-label">Admission No:</label>
            <input type="text" disabled class="form-control" value="{{$lables->admission_no}}">
        </div>
        <div class="col-md-3">
            <label for="inputEmail4" class="form-label">Class:</label>
            <input type="text" disabled class="form-control" value="{{$lables->class_name}}">
        </div>
        </form>
    </div>
    <div class="row g-3">
        <div class="col-6">
            <label for="inputEmail4" class="form-label">Student Name:</label>
            <input type="text" disabled class="form-control" value="{{$lables->full_name}}">
        </div>
        <div class="col-3">
            <label for="inputEmail4" class="form-label">Average:</label>
            <input type="text" disabled class="form-control" value="{{$avg}}">
        </div>
        <div class="col-3">
            <label for="inputEmail4" class="form-label">Place:</label>
            <input type="text" disabled class="form-control" value="{{$pos}}">
        </div>
        </form>
    </div>
    @foreach ($data as $key=> $dt)
    <div class="row g-3 mt-3">
        <div class="col-md-4 text-center">
            <label for="inputEmail4" class="form-label">{{$dt->subject_name}}:</label>
        </div>

        <div class="col-md-4">
            <input type="text" disabled class="form-control" value="{{$dt->marks}}">
        </div>
    </div>
    @endforeach
    </div>
    <div class="row mt-5">
        <h4 class="timetable mb-2">Absent subjects {{$count-$data->count()}}</h4>
        <h4 class="timetable mb-2">Cetified By</h4>
    </div>
</div>

<script src="{{asset('assets/front/js/termtest.js')}}"></script>
</body>
</html>
