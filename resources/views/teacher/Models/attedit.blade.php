
    <form action="{{route('att.update')}}" method="POST" enctype="multipart/form-data">@method('PUT')
        @csrf

    <div class="form-group row">
        <div class="col-3">
        <select name="term" id="term" class="form-control">
              <option value="term1" selected>Term 1</option>
              <option value="term2">Term 2</option>
              <option value="term3">Term 3</option>
        </select>
        </div>
        <div class="col-3">
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


              {{-- <div class="col-3"></div> --}}
        </select>
        </div>


        <div hidden class="row my-2" id="extra">
            <div class="col-4">
                <p id="p">Add Extra Week</p>
            </div>
            <div class="col-4 text-center ">
            <div class="form-group mb-2">
                <label for="name">Extra Week Name</label>

                {{-- @error('title')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                 @enderror --}}
            </div>
        </div>
            <div class="col-4">
                <input type="text" class="form-control " name="extraweek" id="extra_week">
            </div>


        </div>
    </div>
           <div class="form-group mb-2">
               <label for="name">Title</label>
               <input type="text" class="form-control " name="title" id="title">
               @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
           </div>


           <div class="form-group mb-2">
            <label for="name">Date</label>
            <input type="Date" class="form-control @error('due_date') is-invalid @enderror" name="date" id="date">
            @error('date')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
             @enderror
        </div>
        <div class="form-group mb-4">
            <label for="name">Period</label>
            <select name="period" id="period" class="form-control">
                <option value="period1" selected>Period 1</option>
                <option value="period2">Period 2</option>
                <option value="period3">Period 3</option>
                <option value="period4">Period 4</option>
                <option value="period5">Period 5</option>
                <option value="period6">Period 6</option>
                <option value="period7">Period 7</option>
                <option value="period8">Period 8</option>
          </select>
        </div>
        <div class="form-group mb-2">
            <label for="name">Quiz Duration</label>
            <input type="text" class="form-control @error('duration') is-invalid @enderror" name="duration" placeholder="00:00:00" id="duration">
            @error('a_marks')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
             @enderror
        </div>


           <div class="form-group mb-4">
            <!-- <label for="name">Quiz_id</label> -->
            <input type="hidden" class="form-control " name="quizid" id="quizid">

        </div>
        <div class="form-group">
           <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit">Save</button>
          </div>
        </div>

</form>
