<<<<<<< HEAD
<?php
$conn = mysqli_connect('localhost','root','','cs3320');
if (!$conn)
{    
    die('Could not connect: ' . mysql_error());
}
$sql="SELECT * FROM products;";

$result = mysqli_query($conn,$sql);
$returnProduct = "[";
while($row = mysqli_fetch_array($result)) {
    $returnProduct = $returnProduct . "{description: \"" . $row['description'] . "\"," . "unitPrice: \"" . $row['unitPrice'] . "\"," . "productId: \"" . $row['productId'] . "\"},";
}
$returnProduct = $returnProduct ."]";
echo $returnProduct;

mysqli_close($conn);
=======
<?php
$conn = mysqli_connect('localhost','root','','cs3320');
if (!$conn)
{    
    die('Could not connect: ' . mysql_error());
}
$sql="SELECT * FROM products;";

$result = mysqli_query($conn,$sql);

    $returnProduct = "[";
    while($row = mysqli_fetch_array($result)) {
        $returnProduct = $returnProduct . "{description: \"" . $row['description'] . "\"," . "unitPrice: \"" . $row['unitPrice'] . "\"},";
    }
    $returnProduct = $returnProduct ."]";
echo $returnProduct;

mysqli_close($conn);
>>>>>>> da6166791a464181af5ac5f8076add3aa66045f9
?>