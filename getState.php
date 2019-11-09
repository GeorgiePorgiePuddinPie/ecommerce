<?php
$conn = mysqli_connect("localhost","root","","cs3320");

if (!$conn)
{
die('Could not connect: ' .mysqli_error());
}

$sql="SELECT * FROM state;";

$result = mysqli_query($conn,$sql);

	$returnState = "[";
	while($row = mysqli_fetch_array($result)) {
		        $returnState = $returnState . "{stateCode: \"" . $row['stateCode'] . "\"," . "stateName: \"" . $row['stateName'] . "\"},";

	}
	$returnState = $returnState."]";
	
echo $returnState;
mysqli_close($conn);
?>