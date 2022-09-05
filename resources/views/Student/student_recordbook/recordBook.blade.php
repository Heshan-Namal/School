@extends('layouts.MasterDashboard')

@section('content')
	<div class="content">
		<div class="card wider-card">
			<span class="card-header bg-info text-white">Records</span>
			<div class="card-body">
				<table class="table table-hover table-striped ">
					<thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Day</th>
					      <th scope="col">Period</th>
					      <th scope="col">Record</th>
					      <th scope="col">Teacher Attendance</th>
					    </tr>
					 </thead>
					 <tbody>
					@foreach($records as $key => $item)
							<tr>
								<th scope="row">{{$key+1}}</th>
								<td>{{$item->day}}</td>
								<td>{{$item->period}}</td>
								<td>{{$item->record}}</td>
                                @if($item->teacher_attendance=='yes')
								<td><ion-icon name="checkmark" style="font-size: 32px;color: limegreen;--ionicon-stroke-width: 64px;"></ion-icon></td>
                                @else
								<td><ion-icon name="close"  style="font-size: 32px;color: red;--ionicon-stroke-width: 64px;"></ion-icon></td>
                                @endif
                            </tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection