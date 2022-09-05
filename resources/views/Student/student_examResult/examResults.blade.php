@extends('layouts.MasterDashboard')

@section('content')
    <div class="container-fluid">
        <br>
        <div class="row">
            <span class="h4 col">Name: &nbsp;{{getName()}}</span>
            <span class="h4 col">Class:&nbsp;{{getClassName()}}</span>
        </div>
        <br>
        @if(isset($term1) && !empty($term1))
        <div class="card wider-card">
			<span class="card-header bg-info text-white">Term 1 Results</span>
			<div class="card-body">
				<table class="table table-hover table-striped ">
					<thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Subject</th>
					      <th scope="col">Teacher</th>
					      <th scope="col">Marks</th>
					    </tr>
					 </thead>
					 <tbody>
					@foreach($term1 as $key => $item)
							<tr>
								<th scope="row">{{$key+1}}</th>
								<td>{{$item->subject_name}}</td>
								<td>{{$item->full_name}}</td>
								<td>{{$item->marks}}</td>
							</tr>
					@endforeach
                    @if($term1avg>=50)
                            <tr class="table-success">
								<th scope="row"></th>
                                <td colspan="2" class="table-active h5">Average</td>
                                <td>{{$term1avg}}</td>
                            </tr>
                    @else
                            <tr class="table-danger">
								<th scope="row"></th>
                                <td colspan="2" class="table-active h5">Average</td>
                                <td>{{$term1avg}}</td>
                            </tr>
                    @endif
					</tbody>
				</table>
			</div>
        </div>
        @endif
            

            @if(isset($term2) && !empty($term2))
            <div class="card wider-card">
			<span class="card-header bg-info text-white">Term 2 Results</span>
			<div class="card-body">
				<table class="table table-hover table-striped ">
					<thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Subject</th>
					      <th scope="col">Teacher</th>
					      <th scope="col">Marks</th>
					    </tr>
					 </thead>
					 <tbody>
					@foreach($term2 as $key => $item)
							<tr>
								<th scope="row">{{$key+1}}</th>
								<td>{{$item->subject_name}}</td>
								<td>{{$item->full_name}}</td>
								<td>{{$item->marks}}</td>
							</tr>
					@endforeach
                    @if($term2avg>=50)
                            <tr class="table-success">
								<th scope="row"></th>
                                <td colspan="2" class="table-active h5">Average</td>
                                <td>{{$term2avg}}</td>
                            </tr>
                    @else
                            <tr class="table-danger">
								<th scope="row"></th>
                                <td colspan="2" class="table-active h5">Average</td>
                                <td>{{$term2avg}}</td>
                            </tr>
                    @endif
					</tbody>
				</table>
			</div>
            </div>
            @endif

            @if(isset($term3) && !empty($term3))
            <div class="card wider-card">
			<span class="card-header bg-info text-white">Term 3 Results</span>
			<div class="card-body">
				<table class="table table-hover table-striped ">
					<thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Subject</th>
					      <th scope="col">Teacher</th>
					      <th scope="col">Marks</th>
					    </tr>
					 </thead>
					 <tbody>
					@foreach($term3 as $key => $item)
							<tr>
								<th scope="row">{{$key+1}}</th>
								<td>{{$item->subject_name}}</td>
								<td>{{$item->full_name}}</td>
								<td>{{$item->marks}}</td>
							</tr>
					@endforeach
                    @if($term3avg>=50)
                            <tr class="table-success">
								<th scope="row"></th>
                                <td colspan="2" class="table-active h5">Average</td>
                                <td>{{$term3avg}}</td>
                            </tr>
                    @else
                            <tr class="table-danger">
								<th scope="row"></th>
                                <td colspan="2" class="table-active h5">Average</td>
                                <td>{{$term3avg}}</td>
                            </tr>
                    @endif
					</tbody>
				</table>
			</div>
        </div>
        @endif

        <div class="col">
            <form action="" class="col-sm-3">
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" onchange="this.form.submit()">
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>

            </form>
            <div id="chart" style="height:50vh;max-width: 60%;">

            </div>
        </div>
        
    </div>

    <script src="https://unpkg.com/chart.js@^2.9.3/dist/Chart.min.js"></script>
    <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>

    <script>
    const chart2 = new Chartisan({
      el: '#chart',
      url: "@chart('termtest_marks')",
      hooks: new ChartisanHooks()
        .colors(['#797EF6'])
                .datasets([{ type: 'bar', fill: true,
            borderColor: "rgba(75,192,192,1)",}]),
        });
</script>
@endsection