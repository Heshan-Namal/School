<html>
<head>
    <style>
    #main {
        display: flex;
        justify-content: center;
      }
      .form-label{
        margin:0 0 3px 0;
        padding:0px;
        display:block;
        font-weight: bold;
    }
    .form-control{
        padding: 0;
        display: block;
        list-style: none;
        margin: 10px 0 0 0;
    }
      </style>
</head>
<body>
    <div style="text-align: center">
        <h1 class="timetable cd-head text-center mb-2">Term Test Marks</h1>
    </div>
<div id="main" style="justify-content: center">
    <div>
    <div style="display: inline">
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
    <div class="text-end">
        <h4 class="timetable mb-2">Absent subjects {{$count-$data->count()}}</h4>
        <h4 class="timetable mb-2">Cetified By</h4>
    </div>
    </div>


</div>

</body>
</html>
