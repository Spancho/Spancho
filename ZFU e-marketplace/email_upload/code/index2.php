<html>
<center> <h3>
Sending Email With Multiple Attachment
</h3></center>
<body bgcolor="lightgreen">
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
Email Address No. 1 <input type="text" name="email" size="35" /></br>
Email Address No. 2 <input type="text" name="email2" size="35" /></br>
Subject <input type="text" name="sub" size="35" /></br>
Message <br>
    <textarea name="message" cols="40" rows="10">
    </textarea><br />    
	<input type='hidden' name='MAX_FILE_SIZE' value='500000'>
	<p>File Upload (Maximum File Size 500,000 KB) <br />
<div id="file_container">
    <input name="images[]" type="file"  />
    <br />
  </div>
  <a href="javascript:void(0);" onClick="add_file_field();">Add another</a><br />
	
	<br>
<input type="submit" " value="Send Email" name="submit" 
title="Click here to send email." />
</form>
</body>
</html>