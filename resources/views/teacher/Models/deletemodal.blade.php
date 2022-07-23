<form action="{{route('ass.delete')}}" method="post"> @method('delete')
    @csrf
    <h5>Are you Shure You want to delete this record</h5>
    <input type="hidden" id="assid" name="assid" >


    <div class="form-group">
        <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
         <button class="btn btn-danger" type="submit">Yes</button>
       </div>
     </div>

</form>
