<?php
	$listfilename = "spoonslist.txt";

	if(isset($_POST['spoonlist'])) {
		file_put_contents($listfilename, $_POST['spoonlist']);
		header('Location: spooned.php');
	}
	else {
		include "include.php";
		makeHeader("Manual Spooning", false);
	}
 ?>
	<p>On this page, you can manually modify the spoons list. Example uses: Fix a typo, re-add an accidentally eliminated player, etc.</p>
	<form method="post" action="manual.php">
		<textarea name="spoonlist" rows="30" cols="40"><?php 
			$spoonslist = file_get_contents($listfilename);
			echo trim(htmlspecialchars($spoonslist));
		?></textarea>
		<button type="submit">Submit</button>
	</form>
<?php
	makeFooter();
?>