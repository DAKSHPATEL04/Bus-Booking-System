<?php
 include('..\config\dbcon.php');
$sql="select * from ticket";
$res=mysqli_query($con,$sql);
$html='<table ><tr>
<th style="border:1px solid black; border-collapse:collapse;">ID</th>
<th style="border:1px solid black; border-collapse:collapse;">UID</th>
<th style="border:1px solid black; border-collapse:collapse;">Name</th>
<th style="border:1px solid black; border-collapse:collapse;">Bus Number</th>
<th style="border:1px solid black; border-collapse:collapse;">Bus Name</th>
<th style="border:1px solid black; border-collapse:collapse;">Date</th>
<th style="border:1px solid black; border-collapse:collapse;">Departure</th>
<th style="border:1px solid black; border-collapse:collapse;">Arrival</th>
<th style="border:1px solid black; border-collapse:collapse;">Duration</th>
<th style="border:1px solid black; border-collapse:collapse;">Seat Booked</th>
<th style="border:1px solid black; border-collapse:collapse;">Fare</th>
<th style="border:1px solid black; border-collapse:collapse;">Payment</th>
</tr>';
while($row=mysqli_fetch_assoc($res)){
	$html.='<tr>
    <td style="border:1px solid black; border-collapse:collapse;">'.$row['id'].'</td>
	<td style="border:1px solid black; border-collapse:collapse;">'.$row['uid'].'</td>
	<td style="border:1px solid black; border-collapse:collapse;">'.$row['pname'].'</td>
	<td style="border:1px solid black; border-collapse:collapse;">'.$row['busnumber'].'</td>
	<td style="border:1px solid black; border-collapse:collapse;">'.$row['busname'].'</td>
	<td style="border:1px solid black; border-collapse:collapse;">'.$row['date'].'</td>
	<td style="border:1px solid black; border-collapse:collapse;">'.$row['departure'].'</td>
	<td style="border:1px solid black; border-collapse:collapse;">'.$row['duration'].'</td>
	<td style="border:1px solid black; border-collapse:collapse;">'.$row['arrival'].'</td>
    <td style="border:1px solid black; border-collapse:collapse;">'.$row['seat'].'</td>
    <td style="border:1px solid black; border-collapse:collapse;">'.$row['fare'].'</td>
    <td style="border:1px solid black; border-collapse:collapse;">'.$row['pay'].'</td>
	</tr>';
}
$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=ticket.xls');
echo $html;
?>	