function logout(){
  document.cookie = "user=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
  document.cookie = "session=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
  document.write('<?php logout() ?>');
}
