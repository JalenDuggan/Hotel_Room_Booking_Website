<?php
if (!empty($_POST)) 
{
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="finalwebprog";

	$connection=mysqli_connect ($dbhost, $dbuser, $dbpass, $dbname);//connects to the databse

//checks to see if theres an error if there is, then it returns an error
	if (mysqli_connect_errno()) 
	{
		die ("Database connection failed: ".mysqli_connect_error()."(".mysqli_connect_errno().")");
	}

	//if the submit bottom in clicked it inserts the user inputs into the database and if it cannot input it displays a error
	if (isset($_POST['submit']))
	{
		$sql = "INSERT INTO users (FirstName, LastName, Username, Password, EmailAddress) VALUES ('{$connection->real_escape_string($_POST['fname'])}', '{$connection->real_escape_string($_POST['lname'])}', '{$connection->real_escape_string($_POST['user'])}', '{$connection->real_escape_string($_POST['pass'])}', '{$connection->real_escape_string($_POST['email'])}')";
		$insert = $connection->query($sql);

		if ($insert == TRUE) {
			echo "<script>alert('Your Account is Successfully Made!'); 
            window.location.href='HotelBooking.html'</script>";
		} else {
			die("Error: {$connection->errno} : {$connection->error}");
		}
	}
	$connection->close();
}
?>