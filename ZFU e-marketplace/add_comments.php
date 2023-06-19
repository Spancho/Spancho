<script language="javascript" src="jquery-1.9.1.min.js"></script>
<script language="javascript" src="jquery.bvalidator.js"></script> 
<link href="bvalidator.css" rel="stylesheet" type="text/css" /> 
<link href="themes/bvalidator.theme.orange.css" rel="stylesheet" type="text/css" />
<link href="themes/bvalidator.theme.red.css" rel="stylesheet" type="text/css" />
<link href="themes/bvalidator.theme.gray2.css" rel="stylesheet" type="text/css" />
<link  href="themes/bvalidator.theme.postit.css" rel="stylesheet" type="text/css" />
<link href="themes/bvalidator.theme.bootstrap.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript">
        
        var options = {
            singleError: true,
            showCloseIcon: false
        };

        $('#form1').bValidator(options);

    </script>


<script type="text/javascript">            
    
    var optionsPostIt = {
        classNamePrefix:   'bvalidator_postit_',
        offset:               {x:-29, y:-10},
        template:          '<div class="{errMsgClass}">{message}<div class="bvalidator_postit_pointer"><div class="bvalidator_postit_inner_pointer"></div></div></div>'
    };
    
    $(document).ready(function () {
        $('#form1').bValidator(optionsPostIt);
    });


    </script>

<form action="" method="post"  name="form1" id="form1">
  <center>
    <p><strong>Add Post For Rating</strong></p></center>
  <table width="100%" border="0">
    <tr>
      <td width="36%" bgcolor="#999999"><strong>Post Details</strong></td>
      <td width="41%" bgcolor="#999999"><label for="textfield"></label>
      <input name="class_name" type="text" id="class_name" size="40" data-bvalidator="required"></td>
      <td width="23%" bgcolor="#999999"><center><input type="submit" name="add" id="button" value="Add Post"></center></td>
    </tr>
  </table>
  &nbsp;
  <table width="100%" border="0" cellpadding="0" >
    <tr>
      <td width="29%" align="center" bgcolor="#999999">Posts</td>
      <td width="24%" align="center" bgcolor="#999999">Date Posted</td>
      <td width="28%" align="center" bgcolor="#999999">Status</td>
      <td width="19%" align="center" bgcolor="#999999">Action</td>
    </tr>
    <?php
	include("connection/db_con.php");
	$all=mysql_query("select * from comments") or die(mysql_error());
	while($fetch=mysql_fetch_array($all)){
	?>
    <tr>
      <td align="center"><?php echo $fetch['comm']; ?></td>
      <td align="center"><?php echo $fetch['dat']; ?></td>
      <td align="center"><?php if($fetch['stat']==1) { echo "Active";} elseif($fetch['stat']==0){ echo "Inactive"; } else echo "Active";?></td>
      <td align="center"><?php if($fetch['stat']==1) { echo "<a href=deact_comm.php?id=$fetch[id]>Deactivate Posts</a>";} elseif($fetch['stat']==0){ echo "<a href=act_comm.php?id=$fetch[id]>Activate Posts</a>"; } else echo "Error";?></td>
    </tr>
    <?php
	}
	?>
  </table>
  <p>
  <?php
  if(isset($_POST['add'])){
  include("connection/db_con.php");
  include("functions.php");
  $dat=date('Y-m-d');
  $cid = substr(number_format(time() * rand(),0,'',''),0,7);
  $cn=$_POST['class_name'];
  if(!$cn){
  message_goto("Fill posts to add","admin.php?page=add_comments.php");
  }
  $ta=mysql_query("select * from comments where comm='$cn'") or die(mysql_error());
  $ct=mysql_num_rows($ta);
  if($ct==1){
  message_goto("Post already exists","admin.php?page=add_comments.php");
  }
  mysql_query("insert into comments(comm,dat,cid) values('$cn','$dat','$cid')") or die(mysql_error());
  redirectto("admin.php?page=add_comments.php");
  }
  ?>
</p>
</form>