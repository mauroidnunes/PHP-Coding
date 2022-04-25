<?php
session_start();
$_SESSION["selqty"] = $_POST["selqty"]; //Session Variables
?>
<html>
  <head><title>Select size page</title></head>
    <body>
      <form action="selectcolour.php"  method="post">
	Select the size for the <?php echo $_POST["selqty"] ?> widgets you are ordering
   	<select name="selsize">
   	  <option>Small (£15.75)</option>
	  <option>Medium (£16.75)</option>
	  <option>Large (£17.75)</option>
	  <option>Extra Large (£18.75)</option>
        </select>
        <br/><br/>	
        <input type="submit" value="Continue"/>
      </form>
   </body>
</html>	