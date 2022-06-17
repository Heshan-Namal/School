<form action="{{route('quiz.store',[$classid,$subjectid])}}" method="POST" enctype="multipart/form-data">@csrf
    <div class="form-group row">
        <div class="col-3">
        <select name="term" id="term" class="form-control">
              <option value="term1" selected>term 1</option>
              <option value="term2">term 2</option>
              <option value="term3">term 3</option>
        </select>
        </div>
        <div class="col-3">
        <select name="week" id="week" class="form-control" onchange="getweekselector(this.value);">
              <option value="week1" selected>week 1</option>
              <option value="week2">week 2</option>
              <option value="week3">week 3</option>
              <option value="week4">week 4</option>
              <option value="week5">week 5</option>
              <option value="week6">week 6</option>
              <option value="week7">week 7</option>
              <option value="week8">week 8</option>
              <option value="week9">week 9</option>
              <option value="week10">week 10</option>
              <option value="week11">week 11</option>
              <option value="week12">week 12</option>
              <option  value="extra" >Add Extra week</option>


              {{-- <div class="col-3"></div> --}}
        </select>
        </div>

        {{-- <div class="col-3">
        <select name="day" id="day" class="form-control">
              <option value="monday" selected>Monday</option>
              <option value="tuesday">Tuesday</option>
              <option value="wensday">Wendsday</option>
              <option value="thursday">Tursday</option>
              <option value="friday">Friday</option>


        </select>
        </div> --}}
        <div hidden class="row my-2" id="extra">
            <div class="col-4">
                <p id="p">Add Extra week </p>
            </div>
            <div class="col-4 text-center ">
            <div class="form-group mb-2">
                <label for="name">Extra week Name</label>

                {{-- @error('title')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                 @enderror --}}
            </div>
        </div>
            <div class="col-4">
                <input type="text" class="form-control " name="extraweek">
            </div>


        </div>
    </div>
           <div class="form-group mb-2">
               <label for="name">Title</label>
               <input type="text" class="form-control " name="title">
               {{-- @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror --}}
           </div>
           <div class="form-group mb-4">
            <label for="name">Assign Date</label>
            <input type="Date" class="form-control " name="date">
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
            <div class="form-group mb-4">
                <label for="name">Num of Questions</label>
                <input type="text" class="form-control " name="questions">
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
            <label for="name">quiz_duration</label>
            <input type="text" class="form-control @error('duration') is-invalid @enderror" name="duration" placeholder="00:00:00">
            @error('a_marks')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
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
