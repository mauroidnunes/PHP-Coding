<html>
<head>
<link 
rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
crossorigin="anonymous">
<script 
src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
crossorigin="anonymous">
</script>
</head>
<body>
<form enctype="multipart/form-data" action="recursive.php" method="post" style="text-align: center;margin: 20px 0px 20px;">
     <input type="submit" class="btn btn-default" value="Home" />
</form>
<?php
function saveMonster(){ 
  $db = mysqli_connect("localhost", "root", "", "db1_mnunes18");
  // Obtain the file sent to the server within the response.
  $image = $_FILES['monsterimage']['tmp_name']; 
  $audio = $_FILES['monsteraudio']['tmp_name'];
  // Get the file binary data
  $imagedata = addslashes(fread(fopen($image, "r"), filesize($image)));
  $audiodata = addslashes(fread(fopen($audio, "r"), filesize($audio)));
  $sql = "INSERT INTO monster";
  $sql .= "(name, image, audio) ";
  $sql .= "VALUES ('$_POST[txtname]', '$imagedata','$audiodata');";
  $result = mysqli_query($db, $sql); //switched arguments
  mysqli_close($db); // added connect argument
  echo '<h5 style="text-align:center;color:green"><b>Added Monster Successfully!</b></h5>';
}
function displayMonster(){
  $db = mysqli_connect("localhost", "root", "", "db1_mnunes18");
  $sql = "select id,name from monster;";
  $result = mysqli_query($db, $sql);
  echo '<h2 style="text-align: center;">All Monsters</h2>';
  echo "<table align='center' border='1' style='margin-bottom:20px'>";
  echo "<tr><th width='60' align='left'>ID</th><th width='400' align='left'>Name</th><th>Audio</th><th>Image</th></tr>";
  while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td><a href='getwav.php?id=" . $row["id"]. "'>Click to play</a></td>";
    echo "<td><img src='getjpg.php?id=" . $row["id"]. "' height='100' width='100'</td>";
    echo "</tr>";
  }
  echo "</table>";
  mysqli_close($db);
}
if(!isset($_POST["btnsubmit"])){
  $_POST["btnsubmit"] = "none";
}
switch ($_POST["btnsubmit"]){
  case "View Data":
    displayMonster();
    break;
  case "Save":
    if($_POST["txtname"] && $_FILES['monsterimage']['tmp_name'] && $_FILES['monsteraudio']['tmp_name']){
      saveMonster();
      displayMonster();
      break;
    }
    else{echo '<h5 style="text-align:center;color:red"><b>Invalid data inputted!</b></h5>';}
    default:
    echo <<<END
    <h2 style="text-align:center;">Monster Details</h2>
    <div class="container" style="max-width:600px">
    <form enctype="multipart/form-data" action="$_SERVER[PHP_SELF]" method="post">
     Monster name :
     <input type="text" name="txtname" size="15" class="form-control" />
     </br></br>
     Monster image :
     <input  type="file" name="monsterimage" accept="image/jpeg" class="form-control" />
     </br></br>
     Monster Sound :
     <input  type="file" name="monsteraudio" accept="audio/basic" class="form-control"  />
     </br></br>
     <div style="text-align:center;">
     <input type="submit" name="btnsubmit" class="btn btn-default" value="Save" />
     <input type="submit" name="btnsubmit" class="btn btn-default" value="View Data" />
     <div>
    </form>
    </div>
    END;
}
?>
</body>
</html>