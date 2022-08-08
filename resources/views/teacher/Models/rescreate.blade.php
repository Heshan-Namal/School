        <form action="{{route('res.store',[$classid,$subjectid])}}" method="POST" enctype="multipart/form-data">@csrf
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

                <div class="col-3">
                <select name="day" id="day" class="form-control">
                      <option value="monday" selected>Monday</option>
                      <option value="tuesday">Tuesday</option>
                      <option value="wensday">Wednesday</option>
                      <option value="thursday">Thursday</option>
                      <option value="friday">Friday</option>


                </select>
                </div>
                <div hidden class="row my-2" id="extra">
                    <div class="col-4">
                        <p id="p">Add Extra Week </p>
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
                       <label for="name">Chapter</label>
                       <input type="text" class="form-control " name="title">
                       {{-- @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror --}}
                   </div>
                   <div class="form-group mb-2">
                       <label for="name">Topic</label>
                       <textarea class="form-control " name="description"></textarea>
                       {{-- @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror --}}
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
                    <label for="name" >Resource Type</label>
                    <select name="type" id="type" onchange="gettypeselector(this.value);" class="form-control">
                        <option value="note" selected>Note</option>
                        <option value="reference_link">Reference Link</option>
                        <option value="class_link">Class Link</option>
                  </select>

                </div>
                   <div class="form-group mb-4" id="file">
                       <label for="name" id="file">Upload the Note</label>
                       <input type="file" class="form-control" name="file">
                       @error('assignments')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                   </div>
                   <div hidden class="form-group mb-4" id="link">
                    <label for="name" id="file">Paste the Link</label>
                    <input type="text" class="form-control" name="link">
                    @error('assignments')
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

