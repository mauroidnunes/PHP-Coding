<?php
session_start();
$_SESSION["selsize"] = $_POST["selsize"];  // Session Variables Implementation
?>
<html>
  <head><title>Select colour page</title></head>
    <body>
      <form action="confirmation.php"  method="post">
	Select the colour for the <?php echo $_SESSION["selqty"] ?> widgets you are ordering
   	<select name="selcolour">
   	  <option>white</option>
	  <option>red</option>
	  <option>yellow</option>
	  <option>green</option>
	  <option>blue</option>
        </select>
        <br/><br/>	
        <input type="submit" value="Continue"/>
      </form>
   </body>
</html>	