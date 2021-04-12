<?php


if(isset($_POST['submit'])){

    //gets input from form using POST
	$inputFname = $_POST['fname'];
    $inputEmail = $_POST['Semail'];
    $inputAdress = $_POST['address'];
    $inputCity = $_POST['city'];
    $inputProvince = $_POST['prov'];
    $inputPostalcode = $_POST['pcode'];
    $inputNameoncard = $_POST['cname'];
    $inputCardNumber = $_POST['cnum'];
    $inputExpMonth = $_POST['emonth'];
    $inputExpYear = $_POST['eyear'];
    $inputCVV = $_POST['cvv'];

	//connecting to database
	define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'finalwebprog');
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


   	//inserting the input from the user into the databse to its respective coloumns
	$sql="INSERT INTO payment (FullName, EmailAddress, Address, City, Province, PostalCode, CardName, CardNum, ExpMonth, ExpYear, CCV) VALUES('$inputFname', '$inputEmail', '$inputAdress' , '$inputCity', '$inputProvince', '$inputPostalcode', '$inputNameoncard', '$inputCardNumber', '$inputExpMonth', 
	'$inputExpYear', '$inputCVV')";
	//printing a message based on is the info is stored
	if($db->query($sql)===TRUE){	
		echo "<script>alert('Your Payment has been successful! please look at your email($inputEmail) for a conformation letter'); 
            window.location.href='HotelBooking.html'</script>";
	}
	else{
		echo "ERROR";
	}
	
}



?>