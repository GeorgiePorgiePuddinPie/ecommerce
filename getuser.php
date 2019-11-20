<?php
session_start();
$userId = $_SESSION["userId"];

$conn = mysqli_connect('localhost','root','','cs3320');
if (!$conn)
{    
    die('Could not connect: ' . mysql_error());
}
$sql="SELECT * FROM userinformation WHERE userId ='".$userId."'";

$result = mysqli_query($conn,$sql);
$returnProduct = "[";
while($row = mysqli_fetch_array($result)) {
    //$returnProduct = $returnProduct . "{fullname: \"" . $row['fullname'] . "\"," . "address1: \"" . $row['address1'] . "\"," . "address2: \"" . $row['address2'] . "\"," . "city: \"" . $row['city'] . "\"},";
     $returnProduct = $returnProduct . "{fullname: \"" . $row['fullname'] . "\"," . "address1: \"" . $row['address1'] . "\"," . "address2: \"" . $row['address2'] . "\"," . "city: \"" . $row['city'] . "\"," . "state: \"" . $row['state'] . "\"," . "zip: \"" . $row['zip'] . "\"," . "phone: \"" . $row['Phone'] . "\"," . "email: \"" . $row['Email'] . "\"},";
}
$returnProduct = $returnProduct ."]";
echo $returnProduct;

mysqli_close($conn);
?>