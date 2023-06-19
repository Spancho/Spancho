<?php
	include_once("connection/db_con.php");

	$rs = mysql_query("select * from chat where tym <= ".(time()));

?>

<table width="100%" border="0" cellspacing="0">
<?php while($row = mysql_fetch_array($rs)) {?>
  <tr>
    <td><?php echo date("d M: h:i ",$row['tym']);?><strong><?php echo $row['nam'];?></strong> : <?php echo $row['msg'] ;?><br /> </td>
  </tr>
<?php } ?>  
</table>
