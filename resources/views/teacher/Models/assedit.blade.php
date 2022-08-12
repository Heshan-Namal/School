
    <form action="{{route('ass.update')}}" method="POST" enctype="multipart/form-data">@method('PUT')
        @csrf

    <div class="form-group row">
        <div class="col-md-3">
            <label for="inputEmail4" class="form-label">Week</label>
            <select name="term" id="term" class="form-control">
                <option value="term1" selected>First Term</option>
                <option value="term2">Second Term</option>
                <option value="term3">Third term</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="inputEmail4" class="form-label">Week</label>
            <input type="text" disabled class="form-control" name="week" id="week">
        </div>
        <div class="col-md-3">
            <label for="inputEmail4" class="form-label">Day</label>
            <input type="text" disabled class="form-control" name="day" id="day">
        </div>
        {{-- <div class="col-3">
        <select name="week" id="week" class="form-control" onchange="getweekselector(this.value);">
              <option value="week1" selected>week 1</option>
              <option value="week2">Week 2</option>
              <option value="week3">Week 3</option>
              <option value="week4">Week 4</option>
              <option value="week5">Week 5</option>
              <option value="week6">Week 6</option>
              <option value="week7">Week 7</option>
              <option value="week8">Week 8</option>
              <option value="week9">Week 9</option>
              <option value="week10">Week 10</option>
              <option value="week11">Week 11</option>
              <option value="week12">Week 12</option>
              <option  value="extra" >Add Extra Week</option>

        </select>
        </div>

        <div class="col-3">
        <select name="day" id="day" class="form-control">
              <option value="monday" selected>Monday</option>
              <option value="tuesday">Tuesday</option>
              <option value="wensday">Wednesday</option>
              <option value="thursday">Thursday</option>
              <option value="friday">Friday</option>


        </select>
        </div> --}}
    </div>
           <div class="form-group mb-2">
               <label for="name">Title</label>
               <input type="text" class="form-control " name="title" id="title" required>
               @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
           </div>
           <div class="form-group mb-2">
            <label for="name">Description</label>
            <textarea class="form-control " name="description" id="description"></textarea>
            @error('description')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
             @enderror
        </div>


           <div class="form-group mb-2">
            <label for="name">Due Date</label>
            <input type="Date" class="form-control @error('due_date') is-invalid @enderror" name="due_date" id="due_date" required>
            @error('due_date')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
             @enderror
        </div>
        <div class="form-group mb-2">
            <label for="name" >Assessment Type</label>
            <select name="type" id="assessment_type" onchange="gettypeselector(this.value);" class="form-control">
                <option value="upload_file">Upload Assignment</option>
                <option value="mcq_quiz">MCQ Quiz</option>
          </select>

        </div>

           <div class="form-group mb-4" id="file">
               <label for="assignments">Upload Assignment</label>
               <input type="file" class="form-control" name="assignments" >
               <input type="text" disabled class="form-control"  id="assessment_file">
               @error('assignments')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
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
