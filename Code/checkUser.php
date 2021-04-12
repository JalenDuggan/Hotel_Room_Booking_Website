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

	if (isset($_POST["submit"])) 
	{
		//gets the input from the form 
		$user = $_POST["email"];
		$pass = $_POST["pass"];

		//checks to see if th email and pass is already i the database and if not it prints an error if it is then it greets them
		$sql = "SELECT id FROM users WHERE EmailAddress = '$user' and Password = '$pass'";
		$check = mysqli_query($connection, $sql);
		$row = mysqli_fetch_array($check, MYSQLI_ASSOC);
		$count = mysqli_num_rows($check);

		if ($count == 1)
			echo "<script>alert('Welcome $user'); 
            window.location.href='HotelBooking.html'</script>";
		else
			echo "<script>alert('Credentials dont match try again'); 
            window.location.href='loginForm.html'</script>";

	}

	$connection->close();
}
?>