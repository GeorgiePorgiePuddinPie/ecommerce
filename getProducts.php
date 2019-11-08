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
?>