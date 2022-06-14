const term_display = document.getElementById('term-display');
const term_1= document.getElementById('term-1');
const term_2= document.getElementById('term-2');
const term_3= document.getElementById('term-3');

window.onload=function()
{
    term_display.innerHTML="Term 1";
        term_1.style.display='flex';
        term_2.style.display='none';
        term_3.style.display='none';
}


function changeTerm(termid)
{
    var term = document.getElementById(termid);
    console.log(term.id);

    if(term.id=="term1")
    {
        term_display.innerHTML="Term 1";
        term_1.style.display='flex';
        term_2.style.display='none';
        term_3.style.display='none';
    }
    else if(term.id=="term2")
    {
        term_display.innerHTML="Term 2";
        term_1.style.display='none';
        term_2.style.display='flex';
        term_3.style.display='none';   
    }
    else
    {
        term_display.innerHTML="Term 3";
        term_1.style.display='none';
        term_2.style.display='none';   
        term_3.style.display='flex';   
    }
}