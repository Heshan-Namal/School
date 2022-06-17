@extends('layouts.MasterDashboard')

@section('content')
	<div class="content">
		<div class="card">
			<span class="card-header bg-success text-white">Recordings List</span>
			<div class="card-body">
				<table class="table table-hover table-striped ">
					<thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Date</th>
					      <th scope="col">Description</th>
					      <th scope="col">Link</th>
					    </tr>
					 </thead>
					 <tbody>
					@foreach($recordings as $key => $item)
						@if($item->status=='published')
							<tr>
								<th scope="row">{{$key+1}}</th>
								<td>{{$item->date}}</td>
								<td>{{$item->description}}</td>
								<td><a href="{{$item->link}}" target="_blank">{{$item->link}}</a></td>
							</tr>
						@endif
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection