<?php

	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="finalwebprog";

	$conn = mysqli_connect ($dbhost, $dbuser, $dbpass, $dbname);  //connects to database
	
	//if it cant connect a error message is displayed
	if (mysqli_connect_errno()) 
	{
		die ("Database connection failed: ".mysqli_connect_error()."(".mysqli_connect_errno().")");
	}

	$checkbox = $_POST['date'];//gets the input from the form using POST

	if (isset($_POST["submit"])) {
		//for loop goes through an array of the dates chosen
		for ($i = 0; $i < sizeof($checkbox); $i++) {  

			//checks to see if the date chosen is already inputted in the database
			$dateCheck = "SELECT '$i' FROM dates WHERE dateValue = '$checkbox[$i]'";
			$check = mysqli_query($conn, $dateCheck);
			$row = mysqli_fetch_array($check, MYSQLI_ASSOC);
			$count = mysqli_num_rows($check);

			//displays a message if date is already chosen
			if ($count == 1) {
				echo "<script>alert('This date is already booked, please try again'); 
            window.location.href='Calendar.html'</script>";
				break;
			}
			//if date isnt in database it inserts it
			else {
				$sql="INSERT INTO dates (dateValue) VALUES ('".$checkbox[$i]. "')";
				$insert = $conn->query($sql);
			}
		}
		//displays a message if it has inserted the value properly
		if ($insert == TRUE) {
			echo "<script>alert('Booking Successfully Made!'); 
            window.location.href='paymentinfo.html'</script>";
		} else {
			
		}
	}

	$conn->close(); 

?>