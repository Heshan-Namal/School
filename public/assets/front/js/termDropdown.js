/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function dropdownFunction() {
    document.getElementById("termDropdown").classList.toggle("term-show");
  }
  
  // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.term-dropbtn')) {
      var dropdowns = document.getElementsByClassName("term-dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('term-show')) {
          openDropdown.classList.remove('term-show');
        }
      }
    }
  }