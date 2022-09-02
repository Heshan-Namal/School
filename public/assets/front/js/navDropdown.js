let Dropdown = document.querySelector('.navDroupdown');
Dropdown.onclick = function(){
    Dropdown.classList.toggle('DropdownActive')
}

window.onclick = function(event) {
    if (!event.target.matches('.navDroupdown')) {
      var dropdowns = document.getElementsByClassName("nav Droupdown");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('DropdownActive')) {
          openDropdown.classList.remove('DropdownActive');
        }
      }
    }
  }