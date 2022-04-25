<?php	
    session_start();
    $_SESSION["userID"] = $_GET["id"];
	// Connect to server and select database
    $con = mysqli_connect("localhost", "root", "", "db1_mnunes18");
	$sql = "SELECT * from test where ID = '$_GET[id]' ";
	// Execute query
    $result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
    mysqli_close($con);
?>
<html>
<body>
<button onClick="document.location.href='wk6ex2.php'"> Home</button></br>
<h2>Edit Record</h2>
<form action="wk6ex2action2.php" method="post">
	Name :
	<input type="text" name="txtname" value="<?php echo $row["name"] ?>" />
	</br>
	Phone number :
	<input type="text" name="txttelno" value="<?php echo $row["phone_number"] ?>" />
	</br>
	Email :
	<input type="text" name="txtemail" value="<?php echo $row["email"] ?>" />
	</br>
	<input type="submit" name="btnsubmit" value="Update"/>
    <input type="submit" name="btnsubmit" value="Delete"/>
</form>
</body>