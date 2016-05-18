<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <script src="init/logout.js"></script>
  </head>
  <body>

  </body>
</html>

<?php

function logout() {
  //setcookie("session", "", time() - 3600);
  //setcookie("user", "", time() - 3600);
}


if ($_COOKIE["session"] != "true") {
  echo '<p><a href = "/register.php">Register</a></p>';
        include('login.php');
} else {
  echo 'You are currently logged in as '.$_COOKIE["user_c"];
  echo '<p><a href="/'.$_COOKIE["user_c"].'">My Profile</a></p>
        <p><a href="/"onclick="logout()">Logout</a></p>';

}
?>
