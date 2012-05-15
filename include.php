<?php
	$listfilename = "spoonslist.txt";
	function makeHeader($title) {
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
	<link rel="stylesheet/less" href="styles.less" type="text/css" />
	<script src="less.js" type="text/javascript"></script>
</head>
<body>
<div id="container">
	<h1>Spoons Web Management</h1>
	<div id="nav">
		<a href="input.php">Input</a>
		<a href="spooned.php">Reporting</a>
		<a href="manual.php">Manual Editing</a>
	</div>
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