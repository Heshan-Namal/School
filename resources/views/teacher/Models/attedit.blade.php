
    <form action="{{route('att.update')}}" method="POST" enctype="multipart/form-data">@method('PUT')
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
            @error('duration')
                     <span class="invalid-feedback" role="alert">
                        <strong>example: 00:05:00(five minutes)</strong>
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
