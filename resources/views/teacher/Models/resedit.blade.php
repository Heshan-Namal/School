
    <form action="{{route('res.update')}}" method="POST" enctype="multipart/form-data">@method('PUT')
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
              <option value="wensday">Wednesday</option>
              <option value="thursday">Thursday</option>
              <option value="friday">Friday</option>


        </select>
        </div> --}}
        {{-- <div hidden class="row my-2" id="extra">
            <div class="col-4">
                <p id="p">Add Extra Week </p>
            </div>
            <div class="col-4 text-center ">
            <div class="form-group mb-2">
                <label for="name">Extra Week Name</label>


            </div>
        </div>
            <div class="col-4">
                <input type="text" class="form-control " name="extraweek" id="extra_week">
            </div>


        </div> --}}
    </div>
            <div class="form-group">
                <label for="name">Publish Date</label>
                <input type="date" placeholder="enter the publish date" class="form-control " id="date" name="date">
            </div>

           <div class="form-group mb-2">
               <label for="name">Chapter</label>
               <input type="text" class="form-control " name="chapter" id="chapter">
               @error('chapter')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
           </div>
           <div class="form-group mb-2">
            <label for="name">Topic</label>
            <textarea class="form-control " name="topic" id="topic"></textarea>
            @error('topic')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
             @enderror
        </div>

        <div class="form-group mb-2">
            <label for="name" >Resource Type</label>
            <select name="type" id="resource_type" name="resource_type" onchange="gettypeselector(this.value);" class="form-control">
                <option value="note" >Note</option>
                <option value="reference_link">Reference Link</option>
                <option value="class_link">Class Link</option>
          </select>
        </div>

        <div class="form-group" id="period">
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

        <div class="form-group mb-4" id="file">
            <label for="name" id="file">Upload the Note</label>
            <input type="file" class="form-control" name="file">
            <input type="text" disabled class="form-control" id="resource_file">
            @error('file')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
             @enderror
        </div>
        <div  class="form-group mb-4">
            <label for="name" id="file">Upload the Link</label>
            <input type="text" class="form-control" name="link" id="link">
            @error('assignments')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
             @enderror
        </div>

           <div class="form-group mb-4">
            <!-- <label for="name">Quiz_id</label> -->
            <input type="hidden" class="form-control " name="resid" id="resid">

        </div>
        <div class="form-group">
           <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit">Save</button>
          </div>
        </div>

</form>
