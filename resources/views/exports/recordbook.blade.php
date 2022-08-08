
<h1>My {{$term}} Records</h1>
<table border="1">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Period</th>
            <th scope="col">Record</th>
            <th scope="col">Submited Date and Time</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $key=> $d)
        <tr>
            <th>{{$key+1}}</th>
            <td>{{$d->day}}</td>
            <td>{{$d->period}}</td>
            <td>{{$d->record}}</td>
            <td>{{$d->updated_at}}</td>
          </tr>
    @endforeach
    </tbody>
</table>
