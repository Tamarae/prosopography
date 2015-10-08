$(document).ready(function(){
//main nav
$(".icn-nav").click(function(){
        $(this).toggleClass("active");
        console.log("clicked");

    if($('#sub-menu').hasClass('collapsed')) {
      $('#sub-menu').addClass('mini').removeClass('collapsed')
      $('.filter-srch').addClass('menu-collapsed')
      //$('nav.sub a h4').fadeOut()
      //$('.sub a').removeClass('active')
    } else {
      $('#sub-menu').addClass('collapsed').removeClass('mini')
      $('.filter-srch').removeClass('menu-collapsed')
      //$('nav.sub a h4').fadeIn('slow')


      setTimeout(function() {
        $('#sub_menu').addClass('mini')
        adjustSize()
      }, 500)
    }
});


// hover factoids
$(".filter-cntnt .h3").click(function(){
  $(this).nextAll(".txt").slideToggle();
  console.log("clicked");
});

//$(this).children('.toggle:first').slideToggle();






}); // end document ready

window.addEventListener('load', function() {
  document.body.className = '';
  adjustSize()
}, false)

window.addEventListener('resize', adjustSize, false)

function adjustSize() {console.log('adjust')
  /*
   * Adjust menu column sizes and body size when menu columns are higher than main content.
   *
   * Fires when window object is fully loaded or resized.
  */

  var bodyHeight = document.body.offsetHeight - 150;
  //var p1 = parseInt($('#main_menu').css('padding-bottom'));
  //var p2 = parseInt($('#sub_menu').css('padding-bottom'));

  var menuHeight = Math.max(document.getElementById('sub-menu').offsetHeight, document.getElementById('filter-srch').offsetHeight) - 150;

  console.log(menuHeight, bodyHeight);
  if(menuHeight > bodyHeight) {
    document.body.style.height = menuHeight + 'px'
  }

  if(document.body.offsetHeight < window.innerHeight) {
    document.body.style.height = window.innerHeight + 'px'
  }
}
