@extends('layouts.MasterDashboard')
@section('content')
<link rel="stylesheet" href="{{asset('assets/front/css/Ass.css')}}">
<div class="content">


    <!-- Bio data change -->
    @foreach ($result2 as $item2)
    @foreach($result as $item)
    <div class="row" style="hight:100%">
        <div class="col-lg-4">

            <div class="card">
                <div class="card-body">

                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{asset('assets/front/images/avatars/avatar3.jpeg')}}" alt="Admin"
                            class="rounded-circle p-1 bg-primary" width="110">
                        <div class="mt-3">
                            <h4{>{{$item->full_name}}</h4>


                                <p class="text-secondary mb-1">Grade {{$item->cname}}</p>
                                <br>

                                <!-- <button class="btn btn-outline-primary">Message</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">



            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('Update.Profile') }}">
                        @csrf
                        <fieldset disabled>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{$item->full_name}}" name="name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{$item2->email}}" name="email">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Date of Birth</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="date" class="form-control" value="{{$item->dob}}" name="dob">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">guardian Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{$item->guardian_name}}"
                                        name="gname">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Gurdian Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="email" class="form-control" value="{{$item->guardian_email}}"
                                        name="gemail">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Gurdian Contact no</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{$item->guardian_contact_no}}"
                                        name="gcontact">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{$item->address}}" name="address">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>

            </div>
        </div>

    </div>
    @endforeach
    @endforeach




    <div class="row">
        <div class="col-12">
            <div class="col-6 bg mb-3">
                <div class="timetable text-center mb-4">Attentive Check of All Subjects</div>
                <div id="chart" style="height: 400px;"></div>
            </div>
            <div class="col-6 bg mt-3">
                <div class="timetable text-center mb-4">Assesment marks precentage of All Subjects</div>
                <div id="chart2" style="height: 400px"></div>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/chart.js@^2.9.3/dist/Chart.min.js"></script>
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>

<script>
const chart = new Chartisan({
    el: '#chart',
    url: "@chart('student_attentive_chart')" + "?id={{$id}}",
    hooks: new ChartisanHooks()
        .colors(['#4299E1', '#FE0045', '#C07EF1', '#67C560', '#ECC94B'])
        .datasets([{
            type: 'bar',
            fill: true,
            borderColor: "rgba(75,192,192,1)",
        }]),
});
const chart2 = new Chartisan({
    el: '#chart',
    url: "@chart('student_ass_chart')" + "?id={{$id}}",
    hooks: new ChartisanHooks()
        .colors(['#4299E1', '#FE0045', '#C07EF1', '#67C560', '#ECC94B'])
        .datasets([{
            type: 'bar',
            fill: true,
            borderColor: "rgba(75,192,192,1)",
        }]),
});
</script>
@endsection