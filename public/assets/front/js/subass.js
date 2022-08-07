function editmarks(e){
    var m='marks'+e;
    var w='edit'+e;
    var k='save'+e;

    document.getElementById(m).disabled = false;
    document.getElementById(w).hidden = true;
    document.getElementById(k).hidden =false;
}
function entermarks(e){
    var m='marks'+e;
    var k='save'+e;
    var w='enter'+e;
    document.getElementById(m).hidden = false;
    document.getElementById(k).hidden = false;
    document.getElementById(w).hidden =true;
}
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
