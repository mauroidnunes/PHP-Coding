<?php
	$sql = "INSERT INTO test (name,email,phone_number) ";
	$sql = $sql . " values ('$_POST[txtName]','$_POST[txtEmail]','$_POST[txtPhoneNumber]')";

	// Connect to server and select database
    $con = mysqli_connect("localhost", "root", "", "db1_mnunes18");

	// Execute sql statement	
    mysqli_query($con, $sql);	

	$sql = "SELECT * from test";
	
	// Execute sql statement
	$result = mysqli_query($con, $sql);	

	while ($row = mysqli_fetch_assoc($result))
	{
		echo "$row[name]  $row[email]  $row[phone_number] <br/>";
	}
?>