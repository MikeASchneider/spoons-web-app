<?php 
	$listfilename = "/var/www/html/roflsrules.com/spoons/spoonslist.txt";
	$list = fopen($listfilename, "r+");
	
	$spoonslist = fread($list, filesize($listfilename));
	//echo $spoonslist;
	$contestants = explode("\n", $spoonslist);
	
	if(isset($_GET['spooned'])) {
		unset($contestants[$_GET['spooned']]);
		$contestants = array_values($contestants);
		$towrite = "";
		foreach ($contestants as $contestant) {
			$towrite .= $contestant . "\n";
		}
		file_put_contents($listfilename, "");
		fwrite($list, $towrite);
		header("Location: spooned.php");
	}
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Input spoons</title>
	
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<p>This is the spoon reporting page. Click on someone's name to eliminate them from Spoons.</p>
	<?php
		$i = 0;
		foreach ($contestants as $contestant) {
			echo "<a href=\"spooned.php?spooned=$i\">$contestant</a><br />";
			$i++;
		}
		fclose($list);
	?>
</body>
</html>