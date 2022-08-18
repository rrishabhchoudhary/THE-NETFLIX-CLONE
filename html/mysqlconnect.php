<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'mydb';
$con = mysqli_connect($host, $user, $password, $db); //a reference to the database has to provided in the connection
if (!$con)
    die("connection failed\n" . mysqli_connect_error($con));
else
    echo "connected successfully \n";

// $sql='CREATE database mydb';
// if(mysqli_query($con,$sql))
// echo "database created";
// else
// echo "DB creation failed".mysqli_error($con);
// $sql = 'CREATE table user
// (
// firstname varchar(30),    
// lastname varchar(30),
// emailid varchar(30),
// pass varchar(10),
// DOB Date)';

// if (mysqli_query($con, $sql))
//     echo "table created";
// else
//     echo "table creation failed" . mysqli_error($con);
$a = $_POST["fname"];
$c = $_POST["lname"];
$b = $_POST["email"];
$p = $_POST["password"];
$d = $_POST["DOB"];
$sql = "INSERT into user values('$a','$c','$b','$p','$d')";

if (mysqli_query($con, $sql))
    echo "$a registered successfully";
else
    echo "insertion failed" . mysqli_error($con);
$sql = "select * from user";
$rs = mysqli_query($con, $sql);
echo "<table>"; // start a table tag in the HTML

while ($row = mysqli_fetch_array($rs)) {   //Creates a loop to loop through results
    echo "<tr><td>" . htmlspecialchars($row['firstname']) . "</td><td>" . htmlspecialchars($row['lastname']) . "</td><td>" . htmlspecialchars($row['emailid']) . "</td><td>" . htmlspecialchars($row['pass']) . "</td><td>" . htmlspecialchars($row['DOB']) . "</td></tr>";
}

echo "</table>";

mysqli_close($con);
