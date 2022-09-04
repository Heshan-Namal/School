function getselector(select1){
    if(select1=='allt'){
       document.getElementById('day1').hidden = true;
//    }else if(select1=='allw'){
//     document.getElementById('day').hidden = true;
//     document.getElementById('week').hidden = false;
   }else {
    document.getElementById('day1').hidden = false;
    // document.getElementById('week').hidden = false;

   }
}

function gettypeselector(select1){
    //alert(select1);
    if(select1=='mcq_quiz'){
       document.getElementById('file').hidden = true;
       document.getElementById('duration').hidden = false;
       document.getElementById('file').required=false;
   }else{
    document.getElementById('file').hidden = false;
    document.getElementById('duration').hidden = true;
    document.getElementById('file').required=true;

   }
}
    var exampleModal = document.getElementById('qModal')
    if(qModal){
        exampleModal.addEventListener('show.bs.modal', function (event) {
            //    console.log("plzz");
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var id = button.getAttribute('data-bs-id')
            var modalBodyInput = exampleModal.querySelector('.modal-body #assid')
            modalBodyInput.value = id
            })
    }

// function getweekselector(value){

//     if(value=='extra'){
//         document.getElementById('extra').hidden = false;
//         document.getElementById('extra').disabled = false;
//     }else{
//      document.getElementById('extra').hidden = true;
//      document.getElementById('extra').disabled = true;
//     }
// }

var editModal = document.getElementById('editModal')
if(editModal){
    editModal.addEventListener ('show.bs.modal', function (event) {

         // Button that triggered the modal
         var button = event.relatedTarget
         // Extract info from data-bs-* attributes
         var id = button.getAttribute('data-bs-id')
         var question = button.getAttribute('data-bs-question')
         var answer1 = button.getAttribute('data-bs-answer1')
         var answer2 = button.getAttribute('data-bs-answer2')
         var answer3 = button.getAttribute('data-bs-answer3')
         var answer4 = button.getAttribute('data-bs-answer4')
         var correct_answer = button.getAttribute('data-bs-correct_answer')
         var i = editModal.querySelector('.modal-body #id')
         var q = editModal.querySelector('.modal-body #question')
         var a1 = editModal.querySelector('.modal-body #answer1')
         var a2 = editModal.querySelector('.modal-body #answer2')
         var a3 = editModal.querySelector('.modal-body #answer3')
         var a4 = editModal.querySelector('.modal-body #answer4')
         var c = editModal.querySelector('.modal-body #correct_answer')

         i.value = id
         q.value = question
         a1.value = answer1
         a2.value = answer2
         a3.value = answer3
         a4.value = answer4
         c.value = correct_answer



     })

}
var assedit=document.getElementById('editassModal')
if(assedit){
    assedit.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        //  console.log("plzz");
        //  alert('open');
         var id = button.getAttribute('data-bs-id')
         var title = button.getAttribute('data-bs-title')
         var description = button.getAttribute('data-bs-description')
         var term = button.getAttribute('data-bs-term')
         var week = button.getAttribute('data-bs-week')
         var day = button.getAttribute('data-bs-day')
         var due_date = button.getAttribute('data-bs-due_date')
         var assessment_type = button.getAttribute('data-bs-assessment_type')
         var assessment_file = button.getAttribute('data-bs-assessment_file')
         var i = assedit.querySelector('.modal-body #assid')
         var t = assedit.querySelector('.modal-body #title')
         var d = assedit.querySelector('.modal-body #description')
         var te = assedit.querySelector('.modal-body #term')
         var we = assedit.querySelector('.modal-body #week')
         var da = assedit.querySelector('.modal-body #day')
         var du = assedit.querySelector('.modal-body #due_date')
         var a_t = assedit.querySelector('.modal-body #type')
         var f = assedit.querySelector('.modal-body #assessment_file')

         i.value = id
         t.value = title
         d.value = description
         te.value = term
         we.value = week
         da.value = day
         du.value = due_date
         a_t.value = assessment_type
         f.value = assessment_file


     })

}
var deleteModal = document.getElementById('deleteModal')
if(deleteModal){
    deleteModal.addEventListener('show.bs.modal', function (event) {

        var button = event.relatedTarget
        var id = button.getAttribute('data-bs-id')
        var i = deleteModal.querySelector('.modal-body #assid')
        i.value = id
     })

}

var deletequeModal = document.getElementById('deletequeModal')
if(deletequeModal){
    deletequeModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        var id = button.getAttribute('data-bs-id')
        var i = deletequeModal.querySelector('.modal-body #assqid')
        i.value = id
     })

}


var deleteattqModal = document.getElementById('deleteattqModal')
if(deleteattqModal){
    deleteattqModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        var id = button.getAttribute('data-bs-id')
        var i = deleteattqModal.querySelector('.modal-body #attqid')
        i.value = id
     })

}


var attedit=document.getElementById('editattModal')
if(attedit){
    attedit.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        //  console.log("plzz");
         //alert('open');
         var id = button.getAttribute('data-bs-id')
         var title = button.getAttribute('data-bs-title')
         var term = button.getAttribute('data-bs-term')
         var week = button.getAttribute('data-bs-week')
         var day = button.getAttribute('data-bs-day')
         var period = button.getAttribute('data-bs-period')
         var duration = button.getAttribute('data-bs-duration')
         var i = attedit.querySelector('.modal-body #quizid')
         var t = attedit.querySelector('.modal-body #title')
         var te = attedit.querySelector('.modal-body #term')
         var we = attedit.querySelector('.modal-body #week')
         var da = attedit.querySelector('.modal-body #date')
         var pe = attedit.querySelector('.modal-body #period')
         var du = attedit.querySelector('.modal-body #duration')


         i.value = id
         t.value = title
         te.value = term
         we.value = week
         da.value = day
         pe.value = period
         du.value = duration



     })

}


var deleteattModal = document.getElementById('deleteattModal')
if(deleteattModal){
    deleteattModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        var id = button.getAttribute('data-bs-id')
        var i = deleteattModal.querySelector('.modal-body #quizid')
        i.value = id
     })

}
