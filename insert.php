
<?php
$conn = mysqli_connect('localhost','root','','cs3320');

if (!$conn)

{
	die('Could not connect: ' .mysqli_error( ));
}
else echo "connected!!!<br>";

$sql="INSERT INTO cs3320.userinformation (fullname, address1, address2, city, state, zip, phone,email)

VALUES 

('$_POST[fullname]',' $_POST[address1]',' $_POST[address2]','$_POST[city]','$_POST[state]','$_POST[zip]','$_POST[phone]','$_POST[email]')";

echo $sql;

if(!mysqli_query($conn, $sql))
	{
	die('Error: '.mysqli_error($conn));
	}
else {
	echo "1 record added <br>";
	}

mysqli_close($conn)

?>

