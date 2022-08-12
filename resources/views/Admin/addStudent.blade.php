@extends('layouts.MasterDashboard')

@section('style')
<link rel="stylesheet" href="{{asset('assets/front/css/content.css')}}">
@endsection
@section('content')
<div class="container_AssStudent ">
        <header>Student Registration</header>

        <form class="row g-3">
            <div class="col-md-4">
                <label for="inputEmail4" class="form-label">Admissition Number </label>
                <input type="text" class="form-control" id="inputAddno" name="admission_no">
            </div>
            <div class="col-md-4">
                <label for="inputEmail4" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="inputName" name="Full_name">
            </div>

            <div class="col-md-4">
                <label for="inputPassword4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="Email">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress" name="address">
            </div>
            <div class="col-md-4">
                <label for="inputPassword4" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="inputDob" name="dob">
            </div>
            <div class="col-md-4" class="addgrades">
                <label for="inputState" class="form-label">Grade</label>
                <select id="grade_id" class="form-select mt-0 addgrades" aria-label="Default select example" name="grade_id">
                <option selected>Choose...</option>
                @foreach ($grade as $item)
                    
                    <option value="{{$item->id}}">{{$item->grade_name}}</option>
                @endforeach 
                </select>
                

            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Class</label>
               
                <select class="form-select mt-0 classadd" aria-label="Default select example" name="class_id">

                    <option value="0" disabled="true" selected="true">Choose...</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputPassword4" class="form-label">Guardian Name</label>
                <input type="text" class="form-control" id="inputGurdianName" name="guardian_name">
            </div>
            <div class="col-md-4">
                <label for="inputPassword4" class="form-label">Guardian Email</label>
                <input type="email" class="form-control" id="inputGurdianEmail" name="guardian_email">
            </div>
            <div class="col-md-4">
                <label for="inputPassword4" class="form-label">Guardian Contact Number</label>
                <input type="text" class="form-control" id="inputGurdianNumber" name="guardian_contact_no">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Add Student</button>
            </div>
        </form>
</div>


@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">

$(document).on('change','#grade_id',function () {
			var grade_id=$(this).val();

			var a=$(this).parent();
			console.log(grade_id);
			var op="";
			$.ajax({
				type:'get',
				url:'{!!URL::to('SelectGrade')!!}',
				data:{'id':grade_id},
				dataType:'json',//return data will be json
				success:function(data){
					//console.log('success');

					console.log(data);

					console.log(data.length);
					op+='<option value="0" selected disabled>chose class</option>';
					for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].id+'">'+data[i].class_name+'</option>';
				   }

				   a.find('.productname').html(" ");
				   a.find('.productname').append(op);

				},
				error:function(){

				}
			});


		});


</script>
@endsection
