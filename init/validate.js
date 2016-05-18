function validate_profile(cookie) {
  var url = window.location.href
  var page = url.slice(url.length - cookie.length , url.length)

  if (page == cookie){
    return true
  }else{
    return false
  }
  //document.write("<h1>Hello World</h1>") //use document.write ||BEFORE|| page load
                                        // use innerHTML ||AFTER|| page load
}
