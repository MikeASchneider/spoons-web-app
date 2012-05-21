<?php 
	include "include.php";
	$listfilename = "spoonslist.txt";
	$list = fopen($listfilename, "r+");
	
	$spoonslist = fread($list, filesize($listfilename));

	$contestants = explode("\n", $spoonslist);

	makeHeader("Printable Spoons List", true);
?>

	<table>
		<thead>
			<tr>
				<th>Contestant</th>
				<th>Target</th>
			</tr>
		</thead>
		<tbody>
			<?php
			for ($i=0; $i<count($contestants); $i++) {

				echo '<tr><td>' . $contestants[$i] . '</td>';
				if ($i == count($contestants) - 1) {
					echo '<td>' . $contestants[0] . '</td></tr>';
				} else {
					echo '<td>' . $contestants[$i + 1] . '</td></tr>';
				}
			}
			?>
			
		</tbody>
	</table>

	<p><small><em>Printed <?php echo date('l, F jS, Y \a\t g:ia') ?>.</em></small></p>
	
<?php
	makeFooter();
?>