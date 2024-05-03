<?php
 include('..\config\dbcon.php');
$sql="select * from userss";
$res=mysqli_query($con,$sql);
$html='<table ><tr>
<th style="border:1px solid black; border-collapse:collapse;">ID</th>
<th style="border:1px solid black; border-collapse:collapse;">Name</th>
<th style="border:1px solid black; border-collapse:collapse;">Username</th>
<th style="border:1px solid black; border-collapse:collapse;">Password</th>
<th style="border:1px solid black; border-collapse:collapse;">Birth Daqy</th>
<th style="border:1px solid black; border-collapse:collapse;">Address</th>
<th style="border:1px solid black; border-collapse:collapse;">City</th>
<th style="border:1px solid black; border-collapse:collapse;">State</th>
<th style="border:1px solid black; border-collapse:collapse;">Pincode</th>
</tr>';
while($row=mysqli_fetch_assoc($res)){
	$html.='<tr>
	<td style="border:1px solid black; border-collapse:collapse;">'.$row['id'].'</td>
	<td style="border:1px solid black; border-collapse:collapse;">'.$row['name'].'</td>
	<td style="border:1px solid black; border-collapse:collapse;">'.$row['username'].'</td>
	<td style="border:1px solid black; border-collapse:collapse;">'.$row['password'].'</td>
    <td style="border:1px solid black; border-collapse:collapse;">'.$row['dob'].'</td>
    <td style="border:1px solid black; border-collapse:collapse;">'.$row['address'].'</td>
    <td style="border:1px solid black; border-collapse:collapse;">'.$row['city'].'</td>
    <td style="border:1px solid black; border-collapse:collapse;">'.$row['state'].'</td>
    <td style="border:1px solid black; border-collapse:collapse;">'.$row['pincode'].'</td>
	</tr>';
}
$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=user.xls');
echo $html;
?>	