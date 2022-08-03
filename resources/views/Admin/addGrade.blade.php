@extends('layouts.MasterDashboard')

@section('content')
<div class="content">
<div class="alert " role="alert">
<span style="color:red">@error('grade_name'){{$message}}@enderror</span>
</div>
<!-- <span style="color:red">@error('grade_name'){{$message}}@enderror</span> -->
<div class="row">
  @foreach($list as $item)
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
      <h2 class="card-title fw-bold text-capitalize">{{$item->grade_name}}</h2>
        <img src="{{asset('assets/front/images/avatars/student.png')}}" class="rounded mx-auto d-block" alt="...">
        <div>
        <span class="card-title fw-bold pe-5 card-span"  data-bs-toggle="modal"><button  class="edit_btn btn btn-link text-decoration-none ">Edit</button></span>
        <span class="card-title fw-bold card-span-rm" data-bs-toggle="modal" data-bs-target="#removeModal" id="{{$item->id}}">Remove</span>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  <div class="col-sm-3">
    <div class="card card-pointer">
      <div class="card-body mt-3" data-bs-toggle="modal" data-bs-target="#AddGradeModal">
        <img src="{{asset('assets/front/images/icons/plus.png')}}" class="rounded mx-auto d-block" alt="...">
        <h5 class="card-title fw-bold mt-3">Add new grade</h5>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Remove Modal -->
<div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">System Ask</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to remove this ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="#"><button type="button" class="btn btn-danger">Remove</button></a>
      </div>
    </div>
  </div>
</div>
<!-- Add Grade model -->
<div class="modal fade" id="AddGradeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new Grade</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="row g-3" method = "POST" action = "AddGrade">
        @csrf
            <div class="col-md-12">
                <label for="inputEmail4" class="form-label">Grade Name</label>
                <input type="text" class="form-control" name="grade_name" required>
                
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create grade</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Grade model -->
<div class="modal fade" id="EditGradeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Grade</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
                <label for="inputEmail4" class="form-label">Change grade name</label>
                <input type="text" class="form-control" id="Grade_name">
        </div>
        <!-- add classes -->
        <form class="row g-3" method = "POST" action = "AddClass">
        
        @csrf
          <div class="col-md-8">
                  <label for="inputEmail4" class="form-label">Add new Class</label>
                  <input type="text" class="form-control" name="Class_name">
          </div>
          <div class="col-md-8">
                  <label for="inputEmail4" class="form-label">Assign a Teacher</label>
                  <input type="text" class="form-control" name="Class_Teacher">
                  <input type="hidden" class="form-control" name="Grade_id" value="$(.edit_btn).val()">
          </div>
          <div class="col-md-4 mt-5">
          
              <button type="submit" class="btn btn-primary">Add</button>
          </div>
          </form>
        <div class="col-md-12">
            <table class="table table-striped table-hover">
            <thead>
					<tr>
                        <th scope="col">#</th>
						<th scope="col">Classes</th>
						<th scope="col">Actions</th>
					</tr>
				</thead>
				<tbody>
        @foreach($list2 as $item2)
        @if(True)
        <tr>
                        <th scope="row">{{$item2->id}}</th>
						<td>{{$item2->class_name}}</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons me-3" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
        @endif
        @endforeach
					   </tbody>
            </table>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
  $(document).ready(function (){
    $(document).on('click','.edit_btn',function(){
      var grade_id = $(this).val();
      $('#EditGradeModal').modal('show');
      $.ajax({
        tye:"GET",
        url:"grade/AddClass"+ grade_id,
        success:function(res){
          $('#Grade_name').val(res.Grade_name);
        }
      })
    });
  });
</script>
@endsection