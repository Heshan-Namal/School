<form action="{{route('ass.delete')}}" method="post"> @method('delete')
    @csrf
    <h5>Are you sure you want to delete this assessment? <br> You will lose all records about this assessment!</h5>
    <div class="row d-flex justify-content-end">
        <div class="col-4 ">
            <img
              src="{{asset('assets/front/images/ass/delete.png')}}"
              alt="Trendy Pants and Shoes"
              class="img-fluid rounded-start d-flex "
            />
          </div>
    </div>
    <input type="hidden" id="assid" name="assid" >
    <div class="form-group d-flex justify-content-center">
        <div class="modal-footer">
         <button class="btn btn-danger" type="submit">Yes, Go Ahead</button>
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
       </div>
     </div>

</form>
