$(document).ready(function() {
    
$(".menu_ul>li").hover(function(){
    $s_width=$(this).innerWidth();
    $(".sub-menu>li").innerWidth($s_width);
});
    
    $(".popup_img").magnificPopup({type:"image"});
    
    if ($(window).width()<='992'){
      $(".icon_menu").click(function(){
        $(".menu_nav").slideToggle(300);
        $(".menu-item-has-children>a").removeAttr("href");
    });
        $(".menu_ul li").click(function(){
            $sssd=$(this).children(".sub-menu");
            $($sssd).slideToggle(300);
        });
        $(".sub-menu").mouseleave(function(){
            $(".sub-menu").hide(400);
        });  
    }
    
});
$(window).scroll(function() {
    $('.mov1').each(function(){
      var imagePos = $(this).offset().top;
      var topOfWindow = $(window).scrollTop();
      if (imagePos < topOfWindow+950) {
        $(this).addClass('fadeInUp');
        $(".futures").css("opacity", "1");
      }
    });
  });
$(window).scroll(function() {
    $('.mov').each(function(){
      var imagePos = $(this).offset().top;
      var topOfWindow = $(window).scrollTop();
      if (imagePos < topOfWindow+800) {
        $(this).addClass('animated fadeInUp');
      }
    });
  });