<form action="{{route('quiz.store',[$classid,$subjectid])}}" method="POST" enctype="multipart/form-data">@csrf
    <div class="form-group row">
        <div class="col-md-4">
            <label for="inputState" class="form-label">Select Term</label>
            <select name="term" id="term" class="form-control" required>
                  <option value="term1" selected>First Term </option>
                  <option value="term2">Second Term</option>
                  <option value="term3">Third Term</option>
            </select>
        </div>
        {{-- <div class="col-3">
        <select name="week" id="week" class="form-control" onchange="getweekselector(this.value);">
              <option value="week1" selected>Week 1</option>
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
        </div> --}}

        {{-- <div class="col-3">
        <select name="day" id="day" class="form-control">
              <option value="monday" selected>Monday</option>
              <option value="tuesday">Tuesday</option>
              <option value="wensday">Wendsday</option>
              <option value="thursday">Tursday</option>
              <option value="friday">Friday</option>


        </select>
        </div> --}}

    </div>
           <div class="form-group mb-2">
               <label for="name">Title</label>
               <input type="text" class="form-control " name="title" required>
               {{-- @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror --}}
           </div>
           <div class="form-group mb-4">
            <label for="name">Publish Date</label>
            <input type="Date" placeholder="enter the publish date " class="form-control " name="date" required>
            </div>

            <div class="form-group mb-4">
                <label for="name">Period</label>
                <select name="period" id="period" class="form-control" required>
                    <option value="period1">Period 1</option>
                    <option value="period2">Period 2</option>
                    <option value="period3">Period 3</option>
                    <option value="period4">Period 4</option>
                    <option value="period5">Period 5</option>
                    <option value="period6">Period 6</option>
                    <option value="period7">Period 7</option>
                    <option value="period8">Period 8</option>
              </select>
            </div>

           <div class="form-group mb-4">
               <!-- <label for="name">Class_id</label> -->
               <input type="hidden" class="form-control " name="class_id" value="{{$classid}}">

           </div>
           <div class="form-group mb-4">
               <!-- <label for="name">Subject_id</label> -->
               <input type="hidden" class="form-control" name="subject_id" value="{{$subjectid}}">

           </div>

        <div class="form-group mb-2">
            <label for="name">Quiz Duration</label>
            <input type="text" class="form-control @error('duration') is-invalid @enderror" name="duration" placeholder="00:00:00">
            @error('duration')
                     <span class="invalid-feedback" role="alert">
                         <strong>example: 00:05:00(five minutes)</strong>
                     </span>
             @enderror
        </div>



        <div class="form-group">
           <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit">Save</button>
          </div>
        </div>

</form>
