<form action="{{route('rec.update',[$classid,$subjectid])}}" method="POST">@method('PUT')
    @csrf
           <div class="form-group mb-2">
            <label for="name">Enter Record</label>
            <textarea class="form-control " name="record" id="record"></textarea>
            @error('record')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
             @enderror
             <input type="hidden" class="form-control" name="period" id="period">
        </div>
        <div class="form-group">
           <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit">Save</button>
          </div>
        </div>




</form>
