<?php
 include('..\config\dbcon.php');
$sql="select * from users";
$res=mysqli_query($con,$sql);
$html='<table ><tr>
<th style="border:1px solid black; border-collapse:collapse;">ID
<th style="border:1px solid black; border-collapse:collapse;">Name</th>
<th style="border:1px solid black; border-collapse:collapse;">Phone no</th>
<th style="border:1px solid black; border-collapse:collapse;">Username</th>
<th style="border:1px solid black; border-collapse:collapse;">Password</th>
</tr>';
while($row=mysqli_fetch_assoc($res)){
	$html.='<tr>
	<td style="border:1px solid black; border-collapse:collapse;">'.$row['id'].'</td>
	<td style="border:1px solid black; border-collapse:collapse;">'.$row['name'].'</td>
	<td style="border:1px solid black; border-collapse:collapse;">'.$row['phone'].'</td>
	<td style="border:1px solid black; border-collapse:collapse;">'.$row['username'].'</td>
	<td style="border:1px solid black; border-collapse:collapse;">'.$row['password'].'</td>
	</tr>';
}
$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=admin.xls');
echo $html;
?>	