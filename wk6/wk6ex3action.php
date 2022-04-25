<?php	
    session_start();
	// Connect to server and select database
    $con = mysqli_connect("localhost", "root", "", "db1_mnunes18");
	if($_POST["btnsubmit"] == "Update"){
		$sql = "UPDATE test set name = '$_POST[txtname]', email = '$_POST[txtemail]', phone_number = '$_POST[txttelno]' where ID = '$_SESSION[userID]'";
		// Execute query
		mysqli_query($con, $sql);
		$sql = "SELECT * from test where ID = '$_SESSION[userID]' ";
		// Execute query
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
		$html = "
		<h2>Record Updated Successfully</h2>
		Name : $row[name]</br>
		Phone number : $row[phone_number]</br>
		Email : $row[email]</br>
		<button onClick=\"document.location.href='wk6ex2action.php?id=$_SESSION[userID]'\"> Edit</button>
		";
	}
	elseif($_POST["btnsubmit"] == "Delete"){
		$sql = "SELECT * from test where ID = '$_SESSION[userID]' ";
		// Execute query
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
		// Execute query
		$sql = "DELETE from test where ID = '$_SESSION[userID]' ";
		mysqli_query($con, $sql);
		$html = "
		<h2>Record Deleted Successfully</h2>
		Name : $row[name]</br>
		Phone number : $row[phone_number]</br>
		Email : $row[email]</br>
		";
	}
	else{
		$html = "<h2>Post Error</h2>";
	}
	mysqli_close($con);
?>
<html>
<body>
	<button onClick="document.location.href='wk6ex2.php'"> Home</button></br>
	<?php echo $html; ?>
</body>