<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
  </head>
  <body>
    <form method="post">
      <input type="text" name="username" placeholder="Username" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="submit" value="Submit">
    </form>
    <p><a href="/">Home</a></p>
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
  $email =  $_POST['email'];
  //echo strlen($password);
  $error = false;
  if (strlen($password) < 8) {
    $error = false;
    echo "Password must be at least 8 characters.";
  }


  $password = hashword($password, $salt);
  $email = hashword($email, $salt);
  //Add data to table
    //mysqli_query($connect, "SELECT * FROM users");
    //mysqli_query($connect, "INSERT INTO users (username, password)
    //VALUES ('$username','$password')");
    include('init/dbconnection.php');

    $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) == 0 && $error == false) {
        // output data of each row
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username','$email','$password')";
            if ($connect->query($sql) === TRUE) {
              echo "<script>console.log('index.php -> login -> DONE')</script>";

              //create cookie for session
              echo '<script type="text/javascript">
                            document.cookie = "session=true";
                    </script>';
              //create cookie for user
              echo '<script type="text/javascript">
                            document.cookie = "user_c='.$username.'";
                    </script>';

              echo '<script type="text/javascript">
                    window.location.href = "/'.$username.'";
                    </script>';
          } else {
              echo "<script>console.log('index.php -> login -> ERROR')</script>";
          }
    } else {
        echo "<script>console.log('user.php -> check -> DONE')</script>";
        echo "Username or email already exsists.";
    }


  //  $strSQL = "INSERT INTO people(firstname, lastname, phone, birthdate) VALUES('$firstname', '$lastname', '$phone', '$birthdate')";
    //mysql_query($strSQL) or die(mysql_error());

  //Close the database connection
    mysql_close();
  }
?>
