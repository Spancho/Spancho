<P align="center"><strong>Select File  For Download</strong></P>
<form name="form1" method="post" action="" enctype="multipart/form-data">
  &nbsp;
  <table width="93%" border="0" align="center">
  
    <tr>
      <td width="36%" bgcolor="#CCCCCC">File Description</td>
      <td width="28%" bgcolor="#CCCCCC">Date Uploaded</td>
      <td width="18%" align="center" bgcolor="#CCCCCC">Download </td>
    </tr>
    <?php
   include("connection/db_con.php");
 include("functions.php");
 $query=mysql_query("select * from docs");
 while($fetch=mysql_fetch_array($query)){
  ?>
    <tr>
      <td><?php echo $fetch['nam']; ?></td>
      <td><?php echo $fetch['dat']; ?></td>
      <td align="center"><a href="download_file.php?nam=<?php echo $fetch['fn'];?>">Download File</a></td>
    </tr>
    <?php
 }
 ?>
  </table>  
  
<?php
$dat=date('Y-m-d');
$nam=$_POST['nam'];
@$fn = $_FILES['fn']['name'];
@$tmp_name = $_FILES['fn']['tmp_name'];
@$type = $_FILES['fn']['type'];
@$size = $_FILES['fn']['size'];
@$error=$_FILES['fn']['error'];
if(isset($_POST['add'])){
if(!$nam){
	message("Enter document description ");
}
if(is_numeric($nam)){
	message("Document description cannot be numbers only");
}
 
  if(!(
  $type=='application/vnd.openxmlformats-officedocument.wordprocessingml.document' ||
  $type=='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' ||
  $type=='application/vnd.openxmlformats-officedocument.presentationml.presentation' ||
  $type=='application/pdf' ||
  $type=='application/msword' ||
  $type=='application/doc'
  )) {
  alert("Format is not an acceptable document format.");
  }
  else
  if (file_exists("docs/" . $fn))
  {
  alert($fn . " already exists. rename your file");
  }
  else
  if ($error > 0){
  alert("Sorry: ".$error);
  }
  else 
  $add=mysql_query("insert into docs(nam,fn,dat)
  values('$nam','$fn','$dat')") or die(mysql_error());
   move_uploaded_file($tmp_name,
      "docs/" . $fn) or die(mysql_error());
 message_goto("Upload successful","forms_upload.php"); 
  }
?>
</form>