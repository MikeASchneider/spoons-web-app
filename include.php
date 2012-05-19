<?php
	$listfilename = "spoonslist.txt";
	date_default_timezone_set("America/New_York");
	function makeHeader($title, $nohead) {
		?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title ?></title>
	
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Tienne:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="styles.css" type="text/css" />
	<!--<script src="less.js" type="text/javascript"></script>-->
	<meta name="viewport" content="width=device-width">
</head>
<body>
<div id="container">
	<?php
		if(!isset($nohead) || !$nohead) {
	?>
	<h1><a href="index.php">Spoons Web Management</a></h1>
	<div id="nav">
		<a href="input.php">Input</a> |
		<a href="spooned.php">Reporting</a> |
		<a href="manual.php">Manual Editing</a> |
		<a href="receivesms.php">SMS</a>
	</div>
	<?php 
	}
	?>
	<h2><?php echo $title ?></h2>
		<?php
	}
	function makeFooter() {
		?>
</div>
</body>
</html>
		<?php
	}
?>