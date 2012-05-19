<?php 
	include "include.php";
	makeHeader("Spooners Input", false);
 ?>
	<?php 
		
		if(isset($_POST['campers']) && isset($_POST['staff'])) {
			//get a list of campers and randomize it
			$campers = explode("\n", $_POST['campers']);
			shuffle($campers);
			
			//get a list of staffers and randomize it
			$staff = explode("\n", $_POST['staff']);
			//shuffle($staff);
			
			$separation = count($campers) / count($staff);
			
			$i = 0;
			
			//Loop through the staffers and place one in at regular and even intervals
			foreach ($staff as $staffer) {
				array_splice($campers, $i * $separation + $i, 0, $staffer);
				$i++;
			}
			
			//Write the list to spoonslist.txt
			$towrite = "";
			foreach ($campers as $camper) {
				echo "$camper<br />";
				$towrite .= $camper . "\n";
			}
			$listfile = fopen($listfilename, 'w+');
			fwrite($listfile, $towrite);
			fclose($listfile);
			echo "<p>Successfully wrote file. View the printable list
				 <a href=\"printable.php\" target=\"_blank\">here</a>.</p>";
		}
	
	?>
	<p>Input the list of campers under "Campers list" and the list of participating staffers under "Staffers list".</p>
	<p>The list of campers will be shuffled. The list of staffers will not be shuffled and the staffers will be placed in the list at regular, even intervals.</p>
	<form method="post" action="input.php">
		<div class="inputarea">
		<h4>Campers list</h4>
		<textarea rows="25" cols="30" name="campers" id="campers"></textarea>
		</div>
		<div class="inputarea">
		<h4>Staffers list</h4>
		<textarea rows="25" cols="30" name="staff" id="staff"></textarea>
		</div>
		<button type="submit">Submit</button>
	</form>
<?php
	makeFooter();
?>