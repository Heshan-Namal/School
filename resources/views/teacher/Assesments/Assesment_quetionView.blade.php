@extends('layouts.MasterDashboard')
@section('content')

<div class="content">
    <div class="row">

<div class="table-card">
    <table class="table table-success table-hover m-0">
  <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Type</th>
        <th scope="col">Allocated Marks</th>
        <th scope="col">Status</th>
        <th scope="col">Due date</th>
        <th scope="col">Num of Questions</th>
        <th scope="col">add question</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>{{$assignment->title}}</td>
      <td>{{$assignment->description}}</></td>
      <td>{{$assignment->assessment_type}}</td>
      <td>{{$assignment->allocated_marks}}</td>
      <td>{{$assignment->status}}</td>
      <td>{{$assignment->due_date}}</td>
      <td>{{$n}}</td>
      <td><button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#qModal" data-bs-id="{{$assignment->id}}">Add Question</td>
    </tr>
  </tbody>
</table>
</div>

</div>

<h2 class="table">View Questions on {{$assignment->title}} </h2>
@if($questions->count() > 0)
<div class="b-card">
<div class="row">
<div class="col-12">

        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
    @foreach($questions as $key=>$q)
    <div class="d-card">
    <div class="card-header"><label>{{$key+1}}.{{$q->question}}</label></div>

    <ol   class="ul-list"  style="list-style-type: lower-alpha;" >
        <li>&nbsp;<input type="radio" {{$q->correct_answer=='answer1' ? 'checked' : ''}}  /> {{$q->option_1}}   </li>
        <li>&nbsp;<input type="radio"  {{$q->correct_answer=='answer2' ? 'checked' : ''}}  /> {{$q->option_2}}   </li>
        <li>&nbsp;<input type="radio"  {{$q->correct_answer=='answer3' ? 'checked' : ''}}  /> {{$q->option_3}}   </li>
        <li>&nbsp;<input type="radio"  {{$q->correct_answer=='answer4' ? 'checked' : ''}}  /> {{$q->option_4}}   </li>

        </ol>
        <div class="card-footer"><label>Correct Answer :- {{$q->correct_answer}}</label>

         <button class="btn btn-primary btn-sm ms-5"  data-bs-toggle="modal"
         data-bs-target="#editModal" data-bs-id="{{$q->id}}" data-bs-question="{{$q->question}}" data-bs-answer1="{{$q->option_1}}"
         data-bs-answer2="{{$q->option_2}}" data-bs-answer3="{{$q->option_3}}" data-bs-answer4="{{$q->option_4}}" data-bs-correct_answer="{{$q->correct_answer}}"><i class="bi bi-pencil-square"></i></button>
         <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash"></i></button>
        </div>
    </div>




    @endforeach
@else
    <p>No question Assign Yet</p>
@endif


</div>
</div>
</div>
</div>
{{-- modal for Question --}}
<div class="modal fade" id="qModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" >Add a Question</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('ass.quiz')}}" method="GET" >@csrf
                   <div class="form-group mb-2">
                       <label for="name">Enter Question</label>
                       <textarea class="form-control @error('question') is-invalid @enderror" name="question" id="question"></textarea>
                       @error('question')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                   </div>
                   <div class="form-group mb-2">
                       <label for="name">Answer 1 :</label>
                       <input type="text" class="form-control @error('answer1') is-invalid @enderror" name="answer1" id="answer1">

                       @error('answer1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                   </div>
                   <div class="form-group mb-2">
                    <label for="name">Answer 2 :</label>
                    <input type="text" class="form-control @error('answer2') is-invalid @enderror" name="answer2" id="answer2">

                       @error('answer2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                   </div>
                   <div class="form-group mb-2">
                        <label for="name">Answer 3 :</label>
                       <input type="text" class="form-control @error('answer3') is-invalid @enderror" name="answer3" id="answer3">

                       @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                   </div>
                   <div class="form-group mb-2">
                        <label for="name">Answer 4 :</label>
                       <input type="text" class="form-control @error('answer4') is-invalid @enderror" name="answer4" id="answer4">

                       @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                   </div>
                   <div class="form-group mb-4">
                   <label for="correct_answer">Select Correct Answer <span class="text-danger">*</span></label>
                        <select name="correct_answer" id="correct_answer" class="form-control" required>
                            <option ></option>
                            <option  value="answer1">Answer 1</option>
                            <option  value="answer2">Answer 2</option>
                            <option  value="answer3">Answer 3</option>
                            <option  value="answer4">Answer 4</option>
                        </select>

                   </div>
                   <div class="form-group mb-4">
                       <!-- <label for="name">Quiz_id</label> -->
                       <input type="hidden" class="form-control " name="assid" id="assid">

                   </div>
                   <div class="form-group">
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                    </div>
        </form>
        </div>

      </div>
    </div>
  </div>

  {{-- Modal for quetion edit --}}
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">Update Question</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('assquestion.update')}}" method="POST" > @method('PUT') @csrf
                   <div class="form-group mb-2">
                       <label for="name">Enter Question</label>
                       <textarea class="form-control @error('question') is-invalid @enderror" name="question" id="question"></textarea>
                       @error('question')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                   </div>
                   <div class="form-group mb-2">
                       <label for="name">Answer 1 :</label>
                       <input type="text" class="form-control @error('answer1') is-invalid @enderror" name="answer1" id="answer1">

                       @error('answer1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                   </div>
                   <div class="form-group mb-2">
                    <label for="name">Answer 2 :</label>
                    <input type="text" class="form-control @error('answer2') is-invalid @enderror" name="answer2" id="answer2">

                       @error('answer2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                   </div>
                   <div class="form-group mb-2">
                        <label for="name">Answer 3 :</label>
                       <input type="text" class="form-control @error('answer3') is-invalid @enderror" name="answer3" id="answer3">

                       @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                   </div>
                   <div class="form-group mb-2">
                        <label for="name">Answer 4 :</label>
                       <input type="text" class="form-control @error('answer4') is-invalid @enderror" name="answer4" id="answer4">

                       @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                   </div>
                   <div class="form-group mb-4">
                   <label for="correct_answer">Select Correct Answer <span class="text-danger">*</span></label>
                        <select name="correct_answer" id="correct_answer" class="form-control" required>
                            <option ></option>
                            <option  value="answer1">Answer 1</option>
                            <option  value="answer2">Answer 2</option>
                            <option  value="answer3">Answer 3</option>
                            <option  value="answer4">Answer 4</option>
                        </select>

                   </div>
                   <div class="form-group mb-4">
                       <!-- <label for="name">Quiz_id</label> -->
                       <input type="hidden" class="form-control " name="id" id="id">

                   </div>

                   <div class="form-group">
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                    </div>
        </form>
        </div>

      </div>
    </div>
  </div>


<script src="{{asset('assets/front/js/optionselector.js')}}"></script>
@endsection
