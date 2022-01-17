// Script para la barra de busqueda
$('.uxtify-search').on( "focusin", function(){
    $('.uxtify-search-button').addClass("focus-usb");
})
$('.uxtify-search').on( "focusout", function(){
    $('.uxtify-search-button').removeClass("focus-usb");
})



// Script del scroll down en el hero
  $(function() {
    $('a[href^="#"]').on('click', function(e) {
      e.preventDefault();
      $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
    });
  });


// Script para ajuste de tamaño en las featured cards
  if (window.matchMedia("(max-width: 768px)").matches) {
    } else{
        var ufh = $('.ux-featured').height();
        var htotal = $('.vl-content').height();
        $('.ux-featured').height(htotal+50);

    }
  
//Pagination
 $('.page-numbers').addClass("page-link");
 var active = $('.page-numbers.current').parent();
 active.addClass("active");

//Highlight initializer
 hljs.initHighlightingOnLoad();