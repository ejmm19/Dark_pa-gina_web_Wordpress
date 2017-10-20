jQuery(document).ready(function() {
  jQuery("#entrar").click(function(event) {
    enableScroll();
  });
  var keys = {37: 1, 38: 1, 39: 1, 40: 1};

  function preventDefault(e) {
    e = e || window.event;
    if (e.preventDefault)
        e.preventDefault();
    e.returnValue = false;
  }

  function preventDefaultForScrollKeys(e) {
      if (keys[e.keyCode]) {
          preventDefault(e);
          return false;
      }
  }

  function disableScroll() {
    if (window.addEventListener) // older FF
        window.addEventListener('DOMMouseScroll', preventDefault, false);
    window.onwheel = preventDefault; // modern standard
    window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
    window.ontouchmove  = preventDefault; // mobile
    document.onkeydown  = preventDefaultForScrollKeys;
  }

  function enableScroll() {
      if (window.removeEventListener)
          window.removeEventListener('DOMMouseScroll', preventDefault, false);
      window.onmousewheel = document.onmousewheel = null;
      window.onwheel = null;
      window.ontouchmove = null;
      document.onkeydown = null;
  }
  // evento animacion de ancla con  a href
  // evento animacion de ancla con  a href
  jQuery('a[href*=#]').click(function() {

  if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
      && location.hostname == this.hostname) {

          var $target = jQuery(this.hash);

          $target = $target.length && $target || jQuery('[name=' + this.hash.slice(1) +']');

          if ($target.length) {

              var targetOffset = $target.offset().top;

              jQuery('html,body').animate({scrollTop: targetOffset}, 1000);


              return false;

         }

    }


});
// evento animacion de ancla con  a href
// evento animacion de ancla con  a href
// REMOVER EL HOME INICIAL AL DAR CLICK EN SOY MAYOR DE 18
jQuery("#entrar").click(function(event) {
  setTimeout(function(){
    jQuery("#home-1").remove();
    jQuery("#barra-nav-custom-fixed-top").css('display', 'block');
  },3000);
});
// REMOVER EL HOME INICIAL AL DAR CLICK EN SOY MAYOR DE 18
//detectar scroll hacia abajo
var obj = jQuery(document);          //objeto sobre el que quiero detectar scroll
var obj_top = obj.scrollTop()   //scroll vertical inicial del objeto
obj.scroll(function(){
    var obj_act_top = jQuery(this).scrollTop();  //obtener scroll top instantaneo
    if(obj_act_top > obj_top){
      jQuery("#barra-nav-custom-fixed-top").css('margin-top', '-120px');
    }else{
      jQuery("#barra-nav-custom-fixed-top").css('margin-top', '0');
    }
    obj_top = obj_act_top;                  //almacenar scroll top anterior
});
function verificar(){
  jQuery("#barra-nav-custom-fixed-top").css('margin-top', '-120px');
}
setInterval(function(){
  verificar();
},3000);

  // disableScroll();

//eventos wordpress
var cont = 0;
jQuery("#theme-my-login-2>h3").click(function(event) {
  if (cont === 0) {
    jQuery("#theme-my-login1").css('display', 'block');
    cont = 1;
  }else if (cont === 1){
    jQuery("#theme-my-login1").css('display', 'none');
    cont = 0;
  }
});
// jQuery("#theme-my-login-2>h3").hover(function() {
//   jQuery("#theme-my-login1").css('display', 'block');
// }, function() {
//   jQuery("#theme-my-login1").css('display', 'none');
// });
//   var cnt = 0;
// jQuery("#events").click(function(event) {
//   if (cnt==0) {
//       jQuery("#sub-menu-events").css('display', 'block');
//       cnt=1;
//   }else {
//     jQuery("#sub-menu-events").css('display', 'none');
//     cnt=0;
//   }
  jQuery("#events").hover(function() {
    jQuery("#sub-menu-events").css('display', 'block');
  }, function() {
    jQuery("#sub-menu-events").css('display', 'none');
  });

  jQuery("#events-fixed").hover(function() {
    jQuery("#sub-menu-events-fixed").css('display', 'block');
  }, function() {
    jQuery("#sub-menu-events-fixed").css('display', 'none');
  });




});
