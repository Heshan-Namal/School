@extends('layouts.MasterDashboard')

@section('content')
	<div class="content">
		<div class="card wide-card">
			<span class="card-header bg-success text-white">Notes</span>
			<div class="card-body">
				<table class="table table-hover table-striped ">
					<thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Chapter</th>
					      <th scope="col">Topic</th>
					      <th scope="col">Note</th>
					    </tr>
					 </thead>
					 <tbody>
					@foreach($notes as $key => $item)
							<tr>
								<th scope="row">{{$key+1}}</th>
								<td>{{$item->chapter}}</td>
								<td>{{$item->topic}}</td>
								<td><a href="http://127.0.0.1:8000/notes/{{$item->resource_file}}" target="_blank">{{$item->resource_file}}</a></td>
							</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<div class="card wide-card">
			<span class="card-header bg-success text-white">Reference links</span>
			<div class="card-body">
				<table class="table table-hover table-striped ">
					<thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Chapter</th>
					      <th scope="col">Topic</th>
					      <th scope="col">Link</th>
					    </tr>
					 </thead>
					 <tbody>
					@foreach($links as $key => $item)
							<tr>
								<th scope="row">{{$key+1}}</th>
								<td>{{$item->chapter}}</td>
								<td>{{$item->topic}}</td>
								<td><a href="" target="_blank"></a></td>
							</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection