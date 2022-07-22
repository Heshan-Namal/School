function getselector(select1){
    if(select1=='allt'){
       document.getElementById('week').hidden = true;
       document.getElementById('day').hidden = true;
   }else if(select1=='allw'){
    document.getElementById('day').hidden = true;
    document.getElementById('week').hidden = false;
   }else {
    document.getElementById('day').hidden = false;
    document.getElementById('week').hidden = false;
       document.getElementById('term').hidden = false;
   }
}
function gettypeselector(select1){
    //alert(select1);
    if((select1=='reference_link') ||(select1=='class_link')){
       document.getElementById('file').hidden = true;
       document.getElementById('link').hidden = false;

   }else{
    document.getElementById('file').hidden = false;
    document.getElementById('link').hidden = true;
   }
}
    // var exampleModal = document.getElementById('qModal')
    //         exampleModal.addEventListener('show.bs.modal', function (event) {
    //         //    console.log("plzz");
    //         // Button that triggered the modal
    //         var button = event.relatedTarget
    //         // Extract info from data-bs-* attributes
    //         var id = button.getAttribute('data-bs-id')
    //         var modalBodyInput = exampleModal.querySelector('.modal-body #assid')
    //         modalBodyInput.value = id


    //         })
function getweekselector(value){

    if(value=='extra'){
        document.getElementById('extra').hidden = false;
        document.getElementById('extra').disabled = false;
    }else{
     document.getElementById('extra').hidden = true;
     document.getElementById('extra').disabled = true;
    }
}

// var editModal = document.getElementById('editModal')
// editModal.addEventListener('show.bs.modal', function (event) {
//     //    console.log("plzz");
//     // Button that triggered the modal
//     var button = event.relatedTarget
//     // Extract info from data-bs-* attributes
//     var id = button.getAttribute('data-bs-id')
//     var question = button.getAttribute('data-bs-question')
//     var answer1 = button.getAttribute('data-bs-answer1')
//     var answer2 = button.getAttribute('data-bs-answer2')
//     var answer3 = button.getAttribute('data-bs-answer3')
//     var answer4 = button.getAttribute('data-bs-answer4')
//     var correct_answer = button.getAttribute('data-bs-correct_answer')
//     var i = editModal.querySelector('.modal-body #id')
//     var q = editModal.querySelector('.modal-body #question')
//     var a1 = editModal.querySelector('.modal-body #answer1')
//     var a2 = editModal.querySelector('.modal-body #answer2')
//     var a3 = editModal.querySelector('.modal-body #answer3')
//     var a4 = editModal.querySelector('.modal-body #answer4')
//     var c = editModal.querySelector('.modal-body #correct_answer')

//     i.value = id
//     q.value = question
//     a1.value = answer1
//     a2.value = answer2
//     a3.value = answer3
//     a4.value = answer4
//     c.value = correct_answer



// })

