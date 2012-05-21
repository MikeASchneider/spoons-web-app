<?php 
	include "include.php";
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
	else {
		makeHeader("Spoon reporting", false);
	}
	
	
?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(function() {
			$(".reporting a").click(function() {
				return confirm("Are you sure you want to eliminate this player?");
			});
		});
	</script>
	<p>This is the spoon reporting page. Click on someone's name to eliminate them from Spoons.</p>
	<p>
		The printable spoons list is available as a PDF
		<a href="printable-pdf.php" target="_blank">here</a>.
	</p>
	<div class="reporting">
	<?php
		$i = 0;
		foreach ($contestants as $contestant) {
			echo "<a href=\"spooned.php?spooned=$i\">$contestant</a><br />";
			$i++;
		}
		echo "</div>";
		fclose($list);
		makeFooter();
	?>