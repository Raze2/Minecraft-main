(function ($) {
  "use strict";

    $(document).scroll(function () {
      var $nav = $(".fixed-top");
      $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });


      $(".see-more").click(function () {
          var $div = $($(this).data('div')); //div to append
          var $link = $(this).data('link'); //current URL
          var $page = $(this).data('page'); //get the next page #
          var $href = $link + $page; //complete URL
          $.get($href, function (response) { //append data
              var $html = $(response).find("#posts").html();
              if($html !== undefined) {
                $div.append($html);
                console.log($html)
              } else {
                $(".see-more").hide();
              }
          });
          $(this).data('page', (parseInt($page) + 1)); //update page #
      }); 


      $('#dismiss, .overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('.overlay').removeClass('active');
    });

    $('.sidebarCollapse').on('click', function () {
        $('#sidebar').addClass('active');
        $('.overlay').addClass('active');
    }); 
  // menu fixed js code
  // $(window).scroll(function () {
  //   var window_top = $(window).scrollTop() + 1;
  //   if (window_top > 50) {
  //     $('.main_menu').addClass('menu_fixed animated fadeInDown');
  //   } else {
  //     $('.main_menu').removeClass('menu_fixed animated fadeInDown');
  //   }
  // });

}(jQuery));