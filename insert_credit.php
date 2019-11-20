<html>
<body>
<?php
session_start();
    $cardType = $CardNumber = $expDate = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cardType = $_POST["cardType"];
            $CardNumber = $_POST["cardNum"];
            $expDate = $_POST["cardExp"];
    }
$userId = $_SESSION["userId"];
    
$conn = mysqli_connect('localhost','root','','cs3320');

if (!$conn)

{
	die('Could not connect: ' .mysqli_error( ));
}
else echo "connected!!!<br>";

$result = mysqli_query($conn,"SELECT * FROM cs3320.paymentinformation WHERE userId ='".$userId."'");

if (mysqli_num_rows($result)==0) {
    $sql="INSERT INTO cs3320.paymentinformation (userId, cardType, CardNumber, expDate)
    VALUES 
    ('$userId',' $cardType',' $CardNumber','$expDate')";
    echo $sql;
    mysqli_query($conn, $sql);
    echo "1 record added <br>";
}
else {
    // execute update
    $sql2 = "UPDATE cs3320.paymentinformation SET cardType = '".$cardType."', CardNumber = '".$CardNumber."', expDate = '".$expDate."' WHERE userId ='".$userId."'";
    echo $sql2;
    mysqli_query($conn,$sql2);
    echo "1 record updated <br>";
}

 header('location:order_confirmation.html');


mysqli_close($conn)

?>
</body>
</html>