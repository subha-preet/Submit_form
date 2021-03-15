<?php

print_r($_POST);

$x_host = '127.0.0.1';
$x_user = 'root';
$x_pass = '';
$x_db = 'forms';
$x_connection = new mysqli($x_host, $x_user, $x_pass);
if ($x_connection) {
    if (mysqli_select_db($x_connection, $x_db)) {
        echo "<script>console.log('Database Connected Successfully !')</script>";
    } else {
        echo "<script>console.log('Database not connected !' )</script>";
        die(mysqli_connect_errno());
    }
} else {
    echo "<script>console.log('Connection Failed')</script>";
    die();
}

    
	$fname=$_POST['fname'];
    $lname=$_POST['lname'];
	$email=$_POST['email'];
    $phone=$_POST['phone'];
	$address=$_POST['address'];
	$birthday=$_POST['birthday'];
    $gender=$_POST['gender'];
    $state=$_POST['state'];
    $zip=$_POST['zip'];
    $company=$_POST['company'];

	$sql = "INSERT INTO `test1`( `First_name`, `Last_name`, `Email`, `Phone_number`, `Address`, `Birthday`, `Gender`, `State`, `Zip_code`, `Company_name`) 
	VALUES ('$fname','$lname','$email','$phone','$address','$birthday','$gender','$state','$zip','$company')";
	if (mysqli_query($x_connection, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($x_connection);
?>