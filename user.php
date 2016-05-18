<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $user."'s Profile"?></title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="init/logout.js"></script>
    <script src="init/validate.js"></script>
    <script src="init/edit_profile.js"></script>
  </head>

      <?php
      
      function edit_profilee(){
        echo 'hwll';
      }
      $user = $_REQUEST['user'];
      $edit = $_REQUEST['edit'];

      include('init/dbconnection.php');

      $sql = "SELECT * FROM users WHERE username = '$user'";
      $result = mysqli_query($connect, $sql);

      if (mysqli_num_rows($result) == 0) {
          // output data of each row
          echo "<script>console.log('user.php -> check -> ERROR')</script>";
          echo "Sorry. This user does not exist.";

      } else {
          echo "<script>console.log('user.php -> check -> DONE')</script>";
          echo "<p>You are currently on <b>".$user."</b>'s profile page</p>";
      }

      if ($_COOKIE["session"] != "true") {
        echo '<p><a href = "/register.php">Register</a></p>';
              include('login.php');


      } else {
        echo 'You are currently logged in as '.$_COOKIE["user_c"];
        echo '<p><a href="/"onclick="logout()">Logout</a></p>';
        echo '<script>
                      if(validate_profile("'.$_COOKIE["user_c"].'")){
                        document.write("<a href=\"/'.$_COOKIE["user_c"].'&edit=true\">Edit Profile</a>")
                      }
              </script>';

        if($edit == "true"){
          include("edit.php");
        }

      }




      ?>




  <body id="body">
    <?php


    ?>
    <p><a href="/">Home</a></p>
  </body>
</html>
