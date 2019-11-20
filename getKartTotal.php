<?php
session_start();
$userId = $_SESSION["userId"];

$conn = mysqli_connect('localhost','root','','cs3320');
if (!$conn)
{    
    die('Could not connect: ' . mysql_error());
}
$sql="SELECT SUM(`totalPrice`) AS Total FROM cs3320.orders WHERE `userId` ='".$userId."'";


$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$sum = $row['Total'];
$returnTotal = "[{totalKart: \"" . $sum . "\"}]";
echo $returnTotal;

mysqli_close($conn);
?>