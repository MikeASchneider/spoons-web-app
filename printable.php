<?php 
	include "include.php";
	$listfilename = "/var/www/html/roflsrules.com/spoons/spoonslist.txt";
	$list = fopen($listfilename, "r+");
	
	$spoonslist = fread($list, filesize($listfilename));
	//echo $spoonslist;
	$contestants = explode("\n", $spoonslist);

	makeHeader("Printable Spoons List", true);
?>
	<div class="printleft">
		<?php 
			foreach ($contestants as $contestant) {
				echo "<div class=\"contestant\">$contestant</div>";
			}
		?>
	</div>
	<div class="printright">
		<?php
			array_push($contestants, array_shift($contestants));
			foreach ($contestants as $contestant) {
				echo "<div class=\"contestant\">$contestant</div>";				
			}
		?>
	</div>
	<p><small><em>Printed <?php echo date('l, F jS, Y \a\t g:ia') ?>.</em></small></p>
	
<?php
	makeFooter();
?>