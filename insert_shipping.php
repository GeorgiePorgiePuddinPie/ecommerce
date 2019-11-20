<html>
<body>
<?php
session_start();
    $address1 = $address2 = $city = $state = $zip = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $address1 = $_POST["address1"];
            $address2 = $_POST["address2"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            $zip = $_POST["zip"];
    }
$userId = $_SESSION["userId"];
    
$conn = mysqli_connect('localhost','root','','cs3320');

if (!$conn)

{
	die('Could not connect: ' .mysqli_error( ));
}
else echo "connected!!!<br>";

$result = mysqli_query($conn,"SELECT * FROM cs3320.shippinginformation WHERE userId ='".$userId."'");

if (mysqli_num_rows($result)==0) {
    $sql="INSERT INTO cs3320.shippinginformation (userId, address1, address2, city, state, zip)
    VALUES 
    ('$userId',' $address1',' $address2','$city','$state','$zip')";
    echo $sql;
    mysqli_query($conn, $sql);
    echo "1 record added <br>";
}
else {
    // execute update
    $sql2 = "UPDATE cs3320.shippinginformation SET address1 = '".$address1."', address2 = '".$address2."', city = '".$city."', state = '".$state."', zip = '".$zip."' WHERE userId ='".$userId."'";
    echo $sql2;
    mysqli_query($conn,$sql2);
    echo "1 record updated <br>";
}

 header('location:checkout.html');


mysqli_close($conn)

?>
</body>
</html>