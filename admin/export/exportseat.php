<?php
 include('..\config\dbcon.php');
$sql="select * from ticket";
$res=mysqli_query($con,$sql);
$html='<table ><tr>
<th style="border:1px solid black; border-collapse:collapse;">ID</th>
<th style="border:1px solid black; border-collapse:collapse;">Bus Number</th>
<th style="border:1px solid black; border-collapse:collapse;">Bus Name</th>
<th style="border:1px solid black; border-collapse:collapse;">Seat Booked</th>

</tr>';
while($row=mysqli_fetch_assoc($res)){
	$html.='<tr>
    <td style="border:1px solid black; border-collapse:collapse;">'.$row['id'].'</td>
	<td style="border:1px solid black; border-collapse:collapse;">'.$row['busnumber'].'</td>
	<td style="border:1px solid black; border-collapse:collapse;">'.$row['busname'].'</td>
	<td style="border:1px solid black; border-collapse:collapse;">'.$row['seat'].'</td>
	</tr>';
}
$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=seatbooked.xls');
echo $html;
?>	