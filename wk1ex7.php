<html>
<body>
<?php
	$hourlyrate	= 5.75;
	$hoursperweek = 40;
    $taxrate = .22;
	$net = $hourlyrate * $hoursperweek * (1 - $taxrate);
	echo $net;
?>
</body>
</html>