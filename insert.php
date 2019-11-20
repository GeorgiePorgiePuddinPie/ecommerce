<html>
<body>
<?php
session_start();
    $fullname = $address1 = $address2 = $city = $state = $zip = $phone = $email = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fullname = $_POST["fullname"];
            $address1 = $_POST["address1"];
            $address2 = $_POST["address2"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            $zip = $_POST["zip"];
            $phone = $_POST["phone"];
            $email = $_POST["email"];
    }
$userId = $_SESSION["userId"];
    
$conn = mysqli_connect('localhost','root','','cs3320');

if (!$conn)

{
	die('Could not connect: ' .mysqli_error( ));
}
else echo "connected!!!<br>";

$result = mysqli_query($conn,"SELECT * FROM cs3320.userinformation WHERE userId ='".$userId."'");

if (mysqli_num_rows($result)==0) {
    $sql="INSERT INTO cs3320.userinformation (userId, fullname, address1, address2, city, state, zip, phone,email)
    VALUES 
    ('$userId','$fullname',' $address1',' $address2','$city','$state','$zip','$phone','$email')";
    echo $sql;
    mysqli_query($conn, $sql);
    echo "1 record added <br>";
}
else {
    // execute update
    $sql2 = "UPDATE cs3320.userinformation SET fullname='".$fullname."', address1 = '".$address1."', address2 = '".$address2."', city = '".$city."', state = '".$state."', zip = '".$zip."', Phone = '".$phone."', Email = '".$email."' WHERE userId ='".$userId."'";
    echo $sql2;
    mysqli_query($conn,$sql2);
    echo "1 record updated <br>";
}

 header('location:Shopping_Cart.html');


mysqli_close($conn)

?>
</body>
</html>
