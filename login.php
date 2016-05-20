<!DOCTYPE html>
<html>
  <head>
    <link href="//fonts.googleapis.com/css?family=Acme&subset=latin" rel="stylesheet" type="text/css">
    <link href="init/form.css" rel="stylesheet" type="text/css">
    <style>
    .overlay {
      background-color: rgba(0,0,0,.7);
      width: 100vw;
      height: 100vh;
      position: absolute;
      -webkit-backdrop-filter: blur(2px);
    }
    .solo {
      background-color: white;
      position: fixed;
      width: 50vw;
      height: 50vh;
      border-radius: 20px;
      left: calc(50% - 25vw);
      top: calc(50% - 25vh);
    }
    .form-wrapper {
      top: 37vh;
      left: calc(50% - 10vw);
      position: fixed;
    }
    .solo > div:first-child{
      border-bottom: 1px solid lightgrey;
      width: 100%;
      height: 50px;
    }
    .solo > div:first-child > p {
      font-family: 'Acme', sans-serif;
      color: grey;
      padding-right: 20px;
      padding-bottom: 10px;

      text-align: right;
      cursor: pointer;
    }.login_error {
      color: red;
      font-size: .8em;
      position: fixed;
      left: 40vw;
      top: 35vh;
    }

    </style>
  </head>
  <body>
    <div class="overlay">
      <div class="solo">
        <div><p onclick="overlay_close()">X</p></div>

        <div class="form-wrapper">
          <form method="post">

            <input type="text" name="username" placeholder="Username/Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Log In">
          </form>
        </div>
      </div>
    </div>
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
                      document.cookie = "popup=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
              </script>';



    }else {
        echo "<script>console.log('user.php -> check -> ERROR')</script>";
        //echo '<script>alert()</script>';
        echo '<p class="login_error">Wrong username or password.</p>';
    }


  //  $strSQL = "INSERT INTO people(firstname, lastname, phone, birthdate) VALUES('$firstname', '$lastname', '$phone', '$birthdate')";
    //mysql_query($strSQL) or die(mysql_error());

  //Close the database connection
    mysql_close();
  }
?>
