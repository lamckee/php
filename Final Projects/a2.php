<?php
include_once 'dbconfig.php';
?>

<?php
 $res=mysql_query($sql) or die(mysql_error());
 while($row=mysql_fetch_array($res))
 $sql="select * from homes where state=".$_GET['state'];
 ?>
<table>
<tr>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['address'];?></td>
<td><?php echo $row['city'];?></td>
<td><?php echo $row['state'];?></td>
<td><?php echo $row['zip'];?></td>
<td><?php echo $row['phone'];?></td>
<td><?php echo $row['email'];?></td>
</table>
 