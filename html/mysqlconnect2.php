<?php
//include("mysqlconnect.php");
$host = 'localhost';
$user = 'root';
$password = '';
$con= mysqli_connect($host, $user, $password, 'mydb'); //a reference to the database has to provided in the connection
if (!$con)
    die("connection failed\n" . mysqli_connect_error($con));
else
    echo "connected successfully \n";

$e = $_POST["email"];
$p = $_POST["password"];
$sql = "select * from user where emailid='$e'";
$rs=mysqli_query($con,$sql);
$row = mysqli_fetch_array($rs);

if ($row['emailid']==NULL){
    echo "user doesnt exist";
}
else if ($row['pass']!=$p){
    echo "recheck your password";
}
else
    echo "user logged in successfully";


mysqli_close($con);
