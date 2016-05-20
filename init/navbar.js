function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}


$( document ).ready(function() {
  if (getCookie("popup") == "true") {
    $('.overlay').show();
    $('.login_error').show();
  }else {
    $('.overlay').hide();
    $('.login_error').hide();
  }

});


function navbar_login(){
  $('.overlay').show();
  $('.login_error').show();
  document.cookie = "popup=true"
  //console.log(getCookie("popup"))
}

function overlay_close(){
  $('.overlay').hide();
  $('.login_error').hide();
  document.cookie = "popup=; expires=Thu, 01 Jan 1970 00:00:00 UTC"
}
