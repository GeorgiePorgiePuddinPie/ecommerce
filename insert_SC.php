<html>
<body>
<?php
    session_start();
    $errors = [];
    $product = $Units = $TotalPrice = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userId = $_SESSION["userId"];
        echo "<br> $userId";
        echo "<br> " . $_SESSION["userId"];
        // $userId = "10";
        $orderNumber = date("Y/m/d");
        if (empty($_POST["Products"])) {
            $product = "missinginput";
        } else {
            $product = test_input($_POST["Products"]);
        }
        if (empty($_POST["Units"])) {
            $Units = "missinginput";
        } else {
            $Units = test_input($_POST["Units"]);
        }
        if (empty($_POST["TotalPrice"])) {
            $TotalPrice = "missinginput";
        } else {
            $TotalPrice = test_input($_POST["TotalPrice"]);
        }
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $sql="INSERT INTO cs3320.orders (userId, ordernumber, productID, Quantity, totalPrice)
    VALUES
    ('$userId', '$orderNumber', '$product', '$Units', '$TotalPrice')";
    echo $sql;
    $conn = mysqli_connect('localhost','root','','cs3320');
    if (!$conn){    
        die('Could not connect: ' . mysql_error());
    }
    echo "Connected successfully";
    foreach($errors as $msg) {
        echo "$msg <br>";
    }
    // execute insert
    if (!mysqli_query($conn,$sql))
    {
        die('Error: ' . mysqli_error($conn));
    }
    else {
        echo "<br>1 record added";
    }
mysqli_close($conn);
?>

</body>

</html>