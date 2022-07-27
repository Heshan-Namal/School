
<h1>My Students</h1>
<table border="1">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Admission Number</th>
            <th scope="col">Student Name</th>
            <th scope="col">Guardian Email</th>
            <th scope="col">Submited Assesment Precentage</th>
            <th scope="col">Assesment Marks Average</th>
        </tr>
    </thead>
    <tbody>
        @foreach($std as $key=> $s)
        <tr>
            <th>{{$key+1}}</th>
            <td>{{$s->admission_no}}</td>
            <td>{{$s->full_name}}</td>
            <td>{{$s->guardian_email}}</td>
            <td>{{$sub[$s->admission_no]}}%</td>
            <td>{{$mark[$s->admission_no]}}</td>
          </tr>
    @endforeach
    </tbody>
</table>
