var recedit=document.getElementById('editrecModal')
if(recedit){
    recedit.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        //  console.log("plzz");
        //  alert('open');
         var period = button.getAttribute('data-bs-period')
         var record = button.getAttribute('data-bs-record')

         var p = recedit.querySelector('.modal-body #period')
         var r = recedit.querySelector('.modal-body #record')

         p.value = period
         r.value = record


     })

}
function changeterm(select1){
    if(select1=='term1'){
       document.getElementById('term1').hidden = false;
       document.getElementById('term2').hidden = true;
       document.getElementById('term3').hidden = true;
   }else if(select1=='term2'){
        document.getElementById('term1').hidden = true;
       document.getElementById('term2').hidden = false;
       document.getElementById('term3').hidden = true;
   }else if(select1=='term3') {
        document.getElementById('term1').hidden = true;
       document.getElementById('term2').hidden = true;
       document.getElementById('term3').hidden = false;
   }

}

function refreshdiv() {
    $('#section2').load(location.href + " #section2");
}
