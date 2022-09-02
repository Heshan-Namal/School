function getselector(select1){
     //alert(select1)
    if(select1=='allt'){
       document.getElementById('day1').hidden = true;
   }else{
    document.getElementById('day1').hidden = false;
   }
}
function gettypeselector(select1){
    //alert(select1);
    if((select1=='reference_link') ||(select1=='class_link')){
       document.getElementById('file').hidden = true;
       document.getElementById('link').hidden = false;
       document.getElementById('period').hidden = false;

   }else{
    document.getElementById('file').hidden = false;
    document.getElementById('link').hidden = true;
    document.getElementById('period').hidden = true;
   }
}

function getweekselector(value){

    if(value=='extra'){
        document.getElementById('extra').hidden = false;
        document.getElementById('extra').disabled = false;
    }else{
     document.getElementById('extra').hidden = true;
     document.getElementById('extra').disabled = true;
    }
}

var resedit=document.getElementById('editresModal')
if(resedit){
    resedit.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        //  console.log("plzz");
          //alert('open');
         var id = button.getAttribute('data-bs-id')
         var chapter = button.getAttribute('data-bs-chapter')
         var topic = button.getAttribute('data-bs-topic')
         var term = button.getAttribute('data-bs-term')
         var week = button.getAttribute('data-bs-week')
         var period = button.getAttribute('data-bs-period')
         var date = button.getAttribute('data-bs-date')
         var day = button.getAttribute('data-bs-day')
         var resource_type = button.getAttribute('data-bs-resource_type')

         var resource_file = button.getAttribute('data-bs-resource_file')
         var i = resedit.querySelector('.modal-body #resid')
         var t = resedit.querySelector('.modal-body #chapter')
         var d = resedit.querySelector('.modal-body #topic')
         var te = resedit.querySelector('.modal-body #term')
         var we = resedit.querySelector('.modal-body #week')
         var pe = resedit.querySelector('.modal-body #period')
         var dat = resedit.querySelector('.modal-body #date')
         var da = resedit.querySelector('.modal-body #day')
         var a_t = resedit.querySelector('.modal-body #resource_type')
         var f = resedit.querySelector('.modal-body #resource_file')
         var l = resedit.querySelector('.modal-body #link')
         i.value = id
         t.value = chapter
         d.value = topic
         te.value = term
         we.value = week
         pe.value=period
         dat.value=date
         da.value = day
         a_t.value = resource_type
         f.value=''
         l.value=''
         if (resource_type == 'note') {
            f.value = resource_file

        }else{
            l.value=resource_file
        }

     })

}
var deleteresModal = document.getElementById('deleteresModal')
if(deleteresModal){
    deleteresModal.addEventListener('show.bs.modal', function (event) {

        var button = event.relatedTarget
        var id = button.getAttribute('data-bs-id')
        var i = deleteresModal.querySelector('.modal-body #resid')
        i.value = id
     })

}

