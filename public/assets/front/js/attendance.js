var create=document.getElementById('createmodal')
if(create){
    create.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        //  console.log("plzz");
         var subjectid = button.getAttribute('data-bs-subjectid')
         var s = create.querySelector('.modal-body #subjectid')
         s.value = subjectid


     })

}

var edit=document.getElementById('editmodal')
if(edit){
    edit.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        //alert("plzz");

        var subjectid = button.getAttribute('data-bs-subjectid')
        var file = button.getAttribute('data-bs-file')
        var s = edit.querySelector('.modal-body #subjectid')
        var f = edit.querySelector('.modal-body #attendance_file')
        //  var s = create.querySelector('.modal-body #subjectid')
        //  var f = create.querySelector('.modal-body #attendance_file')
         s.value = subjectid
        f.value = file


     })

}
