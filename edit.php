<?php
  $user = $_REQUEST['user'];
  
  if ($_COOKIE["user_c"] != $user) {
    $user = $_COOKIE["user_c"];
    echo '<script type="text/javascript">
            window.location.href = "/'.$user.'&edit=true";
          </script>';
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href="/<?php echo $_COOKIE["user_c"] ?>">Save</a>
    <form method="post">

      <input type="text" name="color" placeholder="Color ex. #FF0000" required>
      <input type="file" name="picture" placeholder="Avatar" required>
      <input type="submit" value="Submit">
    </form>

  </body>
</html>
