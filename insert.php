
<?php
$conn = mysqli_connect('localhost','root','','cs3320');

if (!$conn)

{
	die('Could not connect: ' .mysqli_error( ));
}
else echo "connected!!!<br>";

$sql="INSERT INTO cs3320.userinformation (fullName, Address1, Address2, city, state, zip, email)

VALUES 

('$_POST[fullName]',' $_POST[Address1]',' $_POST[Address2]','$_POST[city]','$_POST[state]','$_POST[zip]','$_POST[email]')";

echo $sql;

if(!mysqli_query($conn, $sql))
	{
	die('Error: '.mysqli_error($conn));
	}

mysqli_close($conn)

?>

