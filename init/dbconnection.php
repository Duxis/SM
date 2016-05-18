
<?php
    $host_name  = "db626510900.db.1and1.com";
    $database   = "db626510900";
    $user_name  = "dbo626510900";
    $passworddb   = "Zebb213972";


    $connect = mysqli_connect($host_name, $user_name, $passworddb, $database);

    if(mysqli_connect_errno())
    {
    echo "<script>console.log('dbconnection.php -> ERROR')</script>";
    }
    else
    {
    echo "<script>console.log('dbconnection.php -> DONE')</script>";
    }
?>
