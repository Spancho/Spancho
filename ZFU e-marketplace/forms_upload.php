<?php
//session_start();
error_reporting(0);
if(!isset($_SESSION['logged'])){
die('<script language=javascript> location=("index.php");</script>');
}
?>
<P align="center"><strong>Add Files For Download</strong></P>
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="93%" border="0" align="center">
    <tr>
      <td width="30%" bgcolor="#80FF80"><strong>Document Description</strong></td>
      <td width="26%" align="center" bgcolor="#80FF80"><label for="nam"></label>
      <input type="text" name="nam" id="nam" /></td>
      <td width="15%" align="center" bgcolor="#80FF80"><strong>Upload File</strong></td>
      <td width="15%" align="center" bgcolor="#80FF80"><label for="textfield2"></label>
      <input type="file" name="fn" id="fn"  /></td>
      <td width="14%" align="center" bgcolor="#80FF80"><input type="submit" name="add" id="add" value="Submit"></td>
    </tr>
  </table>
 &nbsp;
  <table width="93%" border="0" align="center">
  
    <tr>
      <td width="36%" bgcolor="#80FF80">File Description</td>
      <td width="28%" bgcolor="#80FF80">Date Uploaded</td>
      <td width="18%" align="center" bgcolor="#80FF80">Download </td>
      <td width="18%" align="center" bgcolor="#80FF80">Delete</td>
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
      <td align="center"><a href="del_file.php?id=<?php echo $fetch['id'];?>" 
      onclick="return confirm('Are you sure you want to delete')">Delete File</a></td>
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
$tm=date();

if(isset($_POST['add'])){
if(!$nam){
	message("Enter document description ");
}
if(is_numeric($nam)){
	message("Document description cannot be numbers only");
}
if(!$fn){
	message("Select document please.");
}

 
  if(!(
  $type=='application/vnd.openxmlformats-officedocument.wordprocessingml.document' ||
  $type=='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' ||
  $type=='application/vnd.openxmlformats-officedocument.presentationml.presentation' ||
  $type=='application/pdf' ||
  $type=='application/docx' ||
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
 message_goto("Upload successful","admin1.php?page=forms_upload.php"); 
  }
?>
</form>