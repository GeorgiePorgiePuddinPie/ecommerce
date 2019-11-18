<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username, $password, Database
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$conn = mysqli_connect('localhost','root','','cs3320');
if (!$conn)
{    
    die('Could not connect: ' . mysql_error());
}





// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = $conn->real_escape_string($username);
$password = $conn->real_escape_string($password);
// Selecting Database
//$db = mysql_select_db("usercredentials", $connection);
// SQL query to fetch information of registerd users and finds user match.
$sql="SELECT * FROM usercredentials WHERE password='$password' AND username='$username';";
//$query = mysql_query("select * from usercredentials where password='$password' AND username='$username'", $connection);
$result = mysqli_query($conn,$sql);
$rows = mysqli_num_rows($result);
echo $rows;
if ($rows == 1) {
    $_SESSION['login_user']=$username; // Initializing Session
    header("location: Main_Page.html"); // Redirecting To Other Page
} else {
    $error = "Username or Password is invalid";
}
mysqli_close($conn); // Closing Connection
}
}
?>