<html>
<center> <h3>
Sending Email With Multiple Attachment
</h3></center>
<body>
<script>
function add_file_field(){
var container=document.getElementById('file_container');
var file_field=document.createElement('input');
file_field.name='images[]';
file_field.type='file';
container.appendChild(file_field);
var br_field=document.createElement('br');
container.appendChild(br_field);
}
</script>
<form action="verify.php" method="post"  enctype="multipart/form-data">
<table width="70%" border="0" align="center" cellspacing="0" bordercolor="#FF0000">
    <tr>
      <td colspan="2" align="center" bgcolor="#666666"><strong>Send Mail </strong></td>
    </tr>
    <tr>
      <td width="42%" bgcolor="#CCCCCC"><strong>Email Address</strong></td>
      <td width="58%" align="center" bgcolor="#CCCCCC"><label for="textfield"></label>
      <input type="text" name="email" size="35" /></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC"><strong>Subject</strong></td>
      <td align="center" bgcolor="#CCCCCC"><label for="textfield2"></label>
      <input type="text" name="sub" size="35" /></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC"><strong>Message</strong></td>
      <td align="center" bgcolor="#CCCCCC"><label for="textfield2"></label>
      <textarea name="message" cols="40" rows="10">
    </textarea><br /></td>
    </tr>
    <tr><td colspan="2" align="center" bgcolor="#CCCCCC">
      <p>File Upload (Maximum File Size 500,000 KB) <br />
<div id="file_container">
    Upload a list of New Products
    <input name="images[]" type="file"  />
    <br />
  </div>
  <a href="javascript:void(0);" onClick="add_file_field();">Add another</a><br />
	
	<br>
<input type="submit" " value="Send Email" name="submit" 
title="Click here to send email." />
    </td></tr>
      </table>
</form>
</body>
</html>