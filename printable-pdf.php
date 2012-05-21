<?php 
	$listfilename = "spoonslist.txt";
	$list = fopen($listfilename, "r+");
	
	$spoonslist = fread($list, filesize($listfilename));

	$contestants = explode("\n", $spoonslist);

	$html = '<div id="container"><h2>Printable Spoons List</h2>
		<table>
			<thead>
				<tr>
					<th>Contestant</th>
					<th>Target</th>
				</tr>
			</thead>
			<tbody>';
			
				for ($i=0; $i<count($contestants); $i++) {
					$html .= '<tr><td>' . $contestants[$i] . '</td>';
					if ($i == count($contestants) - 1) {
						$html .= '<td>' . $contestants[0] . '</td></tr>';
					} else {
						$html .= '<td>' . $contestants[$i + 1] . '</td></tr>';
					}
				}
			
		$html .= '</tbody>
		</table>
		<p><small><em>Printed: ' . date('l, F jS, Y \a\t g:ia') . '.</em></small></p></div>';
	
	include("lib/mpdf/mpdf.php");
	
	$mpdf = new mPDF('c');
	
	$mpdf->SetDisplayMode('fullpage');
	
	// load the stylez
	$stylesheet = file_get_contents('styles.css');
	
	$mpdf->WriteHTML($stylesheet,1); // The parameter 1 tells that this is css/style only and no body/html/text
	$mpdf->WriteHTML($html);
	$mpdf->Output();
	exit;
?>