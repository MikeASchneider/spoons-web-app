<?php 
	include "include.php";
	makeHeader("Spooners Input");
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
			echo "Successfully wrote file.";
		}
	
	?>
	<form method="post" action="input.php">
		<textarea rows="25" cols="30" name="campers" id="campers">Campers list</textarea>
		<textarea rows="15" cols="30" name="staff" id="staff">Staffers list</textarea>
		<button type="submit">Submit</button>
	</form>
<?php
	makeFooter();
?>