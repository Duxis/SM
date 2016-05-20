<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sniddle</title>
    <script src="init/logout.js"></script>
    <link rel='mask-icon' href='img/favicon.svg' color='#077174'>
    <link rel="icon" href="img/favicon-color.ico" sizes="16x16 32x32 64x64 128x128 256x256 512x512 1024x1024 2048x2048" type="image/png"> 
  </head>
  <body>

  </body>
</html>

<?php

function logout() {
  //setcookie("session", "", time() - 3600);
  //setcookie("user", "", time() - 3600);
}

include('navbar.php');
/*if ($_COOKIE["session"] != "true") {
  echo '<p><a href = "/register.php">Register</a></p>';

} else {
  echo 'You are currently logged in as '.$_COOKIE["user_c"];
  echo '<p><a href="/'.$_COOKIE["user_c"].'">My Profile</a></p>
        <p><a href="/"onclick="logout()">Logout</a></p>';

}*/
?>
