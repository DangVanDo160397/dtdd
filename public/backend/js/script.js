
function strCut (str, strs, stre) {
    var start = str.search(strs)+2;
    var end = str.search(stre);
    if(end!=-1 && stre != '')
        str = str.slice(start, end);
    else
        str = str.slice(start);
    return str;
}

$(function(){
   var url = strCut(window.location+'','l=','&')
    $('#menu > ul > li > a').each(function(){
        if(strCut(this.href,'l=','&') == url){
            $('#menu li a').removeClass("active");
            $(this).addClass('active');
        }
    });
});
$(document).ready(function(){
    var val = 1;
  $(".nav-bar").click(function(){ 
      if (val == 1) {
          $("header nav").animate({
            'left' : '0'
        });
        val = 0;
      }
    return false;
  });
  // submenu
  $('.sub-menu').click(function(){
      $(this).children('.children').slideToggle();
  })
}); 