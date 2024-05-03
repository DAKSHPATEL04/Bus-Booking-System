<?php
 include('..\config\dbcon.php');
$sql="select * from route";
$res=mysqli_query($con,$sql);
$html='<table ><tr>
<th style="border:1px solid black; border-collapse:collapse;">Bus Number</th>
<th style="border:1px solid black; border-collapse:collapse;">Bus Name</th>
<th style="border:1px solid black; border-collapse:collapse;">Avialable Seats</th>
</tr>';
while($row=mysqli_fetch_assoc($res)){
	$html.='<tr>
	<td style="border:1px solid black; border-collapse:collapse;">'.$row['busnumber'].'</td>
	<td style="border:1px solid black; border-collapse:collapse;">'.$row['busname'].'</td>
	<td style="border:1px solid black; border-collapse:collapse;">'.$row['aseats'].'</td>
	</tr>';
}
$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=availability.xls');
echo $html;
?>	