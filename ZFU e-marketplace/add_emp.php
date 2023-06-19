<script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
</script>
<form action="" method="post" name="form1" onSubmit="MM_validateForm('textfield','','R','textfield2','','R','textfield3','','R','textfield4','','R','textfield5','','R');return document.MM_returnValue" enctype="multipart/form-data">
&nbsp;
  <table width="51%" border="0" align="center">
    <tr>
      <td colspan="2" bgcolor="#999999"><strong><center>
      ADD SYSTEM USER
      </center></strong></td>
    </tr>
    <tr>
      <td width="42%" bgcolor="#CCCCCC">Name</td>
      <td width="58%" bgcolor="#CCCCCC"><label for="textfield"></label>
      <input type="text" name="name" id="textfield"></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC">Surname</td>
      <td bgcolor="#CCCCCC"><input type="text" name="surname" id="textfield2"></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC">Cell</td>
      <td bgcolor="#CCCCCC"><input type="text" name="cell" id="textfield3" placeholder="eg: 0775122374"></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC">Position</td>
      <td bgcolor="#CCCCCC"><label for="select"></label>
        <select name="pos" id="select">
          <option>---Select User---</option>
          <option>Administrator</option>
          <option>Accounts</option>
      </select></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#CCCCCC"><strong><center>Login Details</center></strong></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC">Username</td>
      <td bgcolor="#CCCCCC"><input type="text" name="username" id="textfield4"></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC">Password</td>
      <td bgcolor="#CCCCCC"><input type="text" name="password" id="textfield5"></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#CCCCCC"><center><input type="submit" name="add_emp" id="button" value="Submit"></center></td>
    </tr>
  </table>
&nbsp;
  <?php
  include("connection/db_con.php");
  include("functions.php");
  $nam=$_POST['name'];
  $sur=$_POST['surname'];
  $pos=$_POST['pos'];
  $usr=$_POST['username'];
  $pass=$_POST['password'];
  $dat=date('Y-m-d');
  $cell=$_POST['cell'];
  $cel=trim(str_replace(" ","",$cell));
  if(isset($_POST['add_emp'])){	  
  if($pos=="---Select User---"){
	  message("Select position please");
  }
  if($pos=="Administrator"){ $stat=2;} else {$stat=1;}	  	  
  validate_cell($cel);
  $find=mysql_query("select * from employees where usr='$usr'") or die(mysql_error());
  $cnt=mysql_num_rows($find);
  if($cnt==1){
  message("Username already exists");
  }
  mysql_query("insert into employees(nam,sur,cell,pos,usr,pass,stat)
  values('$nam','$sur','$cel','$pos','$usr','$pass','$stat')") or 
  die(mysql_error());
  message("User details have been captured successfully");
  }
  ?>
</form>