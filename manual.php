<?php
	$listfilename = "/var/www/html/roflsrules.com/spoons/spoonslist.txt";

	if(isset($_POST['spoonlist'])) {
		file_put_contents($listfilename, $_POST['spoonlist']);
		header('Location: manual.php');
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Manual spooning</title>
	
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<p>On this page, you can manually modify the spoons list. Example uses: Fix a typo, re-add an accidentally eliminated player, etc.</p>
	<form method="post" action="manual.php">
		<textarea name="spoonlist" rows="30" cols="40">
			<?php 
				$spoonslist = file_get_contents($listfilename);
				echo trim(htmlspecialchars($spoonslist));
			?>
		</textarea>
		<button type="submit">Submit</button>
	</form>
</body>
</html>