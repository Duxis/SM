<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

  </head>
  <body>
    <form method="post">
      <p>Login:</p>
      <input type="text" name="username" placeholder="Username/Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="submit" value="Submit">
    </form>
  </body>
</html>

<?php

if (isset($_POST['username'])) {
  //echo "yo!";
  include('init/dbconnection.php');
  include('init/encrypt.php');
  //variables
  $username = $_POST['username'];
  $password = $_POST['password'];
  //$email =  $_POST['email'];


  $password = hashword($password, $salt);

  //Add data to table
    //mysqli_query($connect, "SELECT * FROM users");
    //mysqli_query($connect, "INSERT INTO users (username, password)
    //VALUES ('$username','$password')");
    include('init/dbconnection.php');
    include('init/config.php');

    $sql = "SELECT * FROM users WHERE username = '$username'  AND password = '$password'";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        echo "<script>console.log('user.php -> check -> DONE')</script>";
        echo "user found";


        //create cookie for session
        echo '<script type="text/javascript">
                      document.cookie = "session=true";
              </script>';
        //create cookie for user
        echo '<script type="text/javascript">
                      document.cookie = "user_c='.$username.'";
              </script>';


        echo '<script type="text/javascript">
                      if (window.location == "'.$site.'") {
                        window.location.href = "/'.$username.'";
                      }else {
                        window.location.href = window.location;
                      }
              </script>';



    }else {
        echo "<script>console.log('user.php -> check -> ERROR')</script>";
        echo "Wrong username or password.";
    }


  //  $strSQL = "INSERT INTO people(firstname, lastname, phone, birthdate) VALUES('$firstname', '$lastname', '$phone', '$birthdate')";
    //mysql_query($strSQL) or die(mysql_error());

  //Close the database connection
    mysql_close();
  }
?>
