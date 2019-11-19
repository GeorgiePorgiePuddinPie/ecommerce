<html>
<body>
<?php
    session_start();
    $errors = [];
    $product = $Units = $TotalPrice = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userId = $_SESSION["userId"];

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
    $conn = mysqli_connect('localhost','root','','cs3320');
    if (!$conn){    
        die('Could not connect: ' . mysql_error());
    }

    $result = mysqli_query($conn,"SELECT * FROM cs3320.orders WHERE userId ='".$userId."' AND orderNumber ='".$orderNumber."' AND productID ='".$product."'");

    foreach($errors as $msg) {
        echo "$msg <br>";
    }
    if (mysqli_num_rows($result)==0) {
        // execute insert
        $sql = "INSERT INTO cs3320.orders (userId, ordernumber, productID, Quantity, totalPrice)
        VALUES ('".$userId."', '".$orderNumber."', '".$product."', '".$Units."', '".$TotalPrice."')";
        mysqli_query($conn,$sql);
    }
    else {
        if($Units == 0){
            $sqlDelete = "DELETE FROM cs3320.orders WHERE userId ='".$userId."' AND orderNumber ='".$orderNumber."' AND productID ='".$product."'";
            mysqli_query($conn,$sqlDelete);
        }
        else {
            // execute update
            $sql2 = "Update cs3320.orders SET Quantity ='".$Units."', totalPrice = '".$TotalPrice."' WHERE userId ='".$userId."' AND orderNumber = '".$orderNumber."' AND productID = '".$product."'";
            mysqli_query($conn,$sql2);
        }
    }
    $result2 = mysqli_query($conn,"SELECT * FROM cs3320.orders WHERE userId ='".$userId."' AND orderNumber ='".$orderNumber."'");    
    while($row = mysqli_fetch_assoc($result2)) {
        $Prod = $row["productID"];
        switch($Prod) {
            case "2":
                $Prod = "Apple";
                break;
            case "3":
                $Prod = "Banana";
                break;    
            case "4":
                $Prod= "Cantalope";
                break;
            case "5":
                $Prod = "Dates";
                break;
        }
        echo "<br>" .$Prod. " " .$row["Quantity"]. " Pieces, for a total of " .$row["totalPrice"]. ".";
    }

    
mysqli_close($conn);
?>

</body>

</html>