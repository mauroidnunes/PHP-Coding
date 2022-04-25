<?php
	// Connect to server and select database
    $con = mysqli_connect("localhost", "root", "", "db1_mnunes18");
	$sql = "SELECT * from test";
	// Execute sql statement
    $result = mysqli_query($con, $sql);
?>
<html>
<body>
<button onClick="document.location.href='wk6ex2.php'"> Home</button></br>
<h2>Home</h2>
<?php
    while ($row = mysqli_fetch_assoc($result))
    {
        echo "<a href=\"wk6ex2action.php?id=$row[ID]\">$row[name]</a></br>";  	
    }
    mysqli_close($con);
?>
</body>
</html>