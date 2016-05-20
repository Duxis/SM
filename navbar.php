
<!DOCTYPE html>
<html class = "navbar-php">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

    <script src="init/navbar.js"></script>
    <script src="init/logout.js"></script>

    <link href="//fonts.googleapis.com/css?family=Delius Swash Caps&subset=latin" rel="stylesheet" type="text/css">
    <link href="//fonts.googleapis.com/css?family=Actor&subset=latin" rel="stylesheet" type="text/css">


    <style>
      html,body {
        margin: 0;
        padding: 0;
      }
      .nav_div {
        background-color: #077174;
        height: 50px;

      }
      p, a {
        color: white;
        font-family: sans-serif;
        float: right;
      }
      a {
        margin-right: 30px;
        margin-left: 5px;
      }
      h1 {
        color: white;
        float: left;
        margin-top: 5px;
        font-family: 'Delius Swash Caps', sans-serif;
        letter-spacing: 1px;
        padding-left: 40px;
      }h1 a{
        text-decoration: none;
        font-family: inherit;
      }
      button {
       font-family: 'Actor', sans-serif;
       color: white;
       border: 1px solid aquamarine;
       font-size: 1em;
       border-radius: 5px;
       font-weight: 100;
       padding: 8px 16px;
       background-color: transparent;
       float: right;
       margin-top: 6px;
       margin-left: 10px;
       cursor: pointer;
      }
    </style>
  </head>
  <body>
    <div class="nav_div">
      <h1><a href="/">Sniddl</a></h1>
      <?php


      //echo '<script>login_ready("'.$_COOKIE["popup"].'")</script>';



      if ($_COOKIE["session"] != "true") {
        echo '<a href = "/register.php"><button>Sign Up</button></a>';
        echo '<button onclick="navbar_login()">Log In</button>';
        include('login.php');
      } else {

        echo '<p><a href="/"onclick="logout()">Logout</a></p>';
        echo '<p>Hello, <a href="/'.$_COOKIE["user_c"].'">'.$_COOKIE["user_c"].'</a></p>';
        }


        if ($_COOKIE["popup"] == "true") {
          echo '<script>console.log("yo")</script>';
        }else {
          echo `<script></script>`;
        }
      ?>
    </div>
  </body>
</html>
