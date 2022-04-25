<?php
   session_start();
   
   switch ($_SESSION["selsize"])
   {
     case "Small (£15.75)" :
                  $price = 15.75;
                  break;
     case "Medium (£16.75)" :
                  $price = 16.75;
                  break;
     case "Large (£17.75)" :
                  $price = 17.75;
                  break;
     case "Extra Large (£18.75)" :
                  $price = 18.75;
                  break;
   }
   $totalPrice = $_SESSION["selqty"] * $price;
   echo "<h2> Your order qty is $_SESSION[selqty], </h2>";
   echo "<h2> and the selected size is $_SESSION[selsize],</h2>";
   echo "<h2> and the selected colour is $_POST[selcolour].</h2>";
   echo "<h2> Your total price is £$totalPrice </h2></br>";
?>