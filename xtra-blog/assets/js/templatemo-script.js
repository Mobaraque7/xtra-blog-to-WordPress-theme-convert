$(function() {
    $(".navbar-toggler").on("click", function(e) {
        $(".tm-header").toggleClass("show");
        e.stopPropagation();
      });
    
      $("html").click(function(e) {
        var header = document.getElementById("tm-header");
    
        if (!header.contains(e.target)) {
          $(".tm-header").removeClass("show");
        }
      });
    
      $("#tm-nav a").click(function(e) {
        $(".tm-header").removeClass("show");
      });
});

// (function ( $ ) {
 
//   $('ul.tm-paging-item li a').each(function() {
//     var $this = $(this);
//     if ( $this.hasClass('prev') ) $this.parent('li').addClass('prev-list-item');
//     if ( $this.hasClass('next') ) $this.parent('li').addClass('next-list-item');      
//   });
 
// }( jQuery ));

