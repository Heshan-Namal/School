<form action="{{route('question.store')}}" method="POST" >@csrf
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
        <label for="name">Answer 1:</label>
        <input type="text" class="form-control @error('answer1') is-invalid @enderror" name="answer1" id="answer1">

        @error('answer1')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
         @enderror
    </div>
    <div class="form-group mb-2">
     <label for="name">Answer 2:</label>
     <input type="text" class="form-control @error('answer2') is-invalid @enderror" name="answer2" id="answer2">

        @error('answer2')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
         @enderror
    </div>
    <div class="form-group mb-2">
         <label for="name">Answer 3:</label>
        <input type="text" class="form-control @error('answer3') is-invalid @enderror" name="answer3" id="answer3">

        @error('title')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
         @enderror
    </div>
    <div class="form-group mb-2">
         <label for="name">Answer 4:</label>
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
             <option  value="option_1">Answer 1</option>
             <option  value="option_2">Answer 2</option>
             <option  value="option_3">Answer 3</option>
             <option  value="option_4">Answer 4</option>
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
