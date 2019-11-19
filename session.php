<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost", "root", "", "cs3320");
// Selecting Database
$db = mysqli_select_db("cs3320", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query("select * from login where username='$user_check'", $connection);
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['userId'];
if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location: Main_Page.html'); // Redirecting To Home Page
}
?>