$(document).ready(function () {
  
  // sticky-menu
  $(window).scroll(function () {
    if ($(window).scrollTop() > 20) {
      $(".mainmenu").addClass('sticky');
    } else {
      $(".mainmenu").removeClass('sticky');
    }
  });


  
});



