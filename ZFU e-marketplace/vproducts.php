<?php
//session_start();
error_reporting(0);
if(!isset($_SESSION['logged'])){
die('<script language=javascript> location=("index.php");</script>');
}
?>
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

<style type="text/css">
<!--
.style1 {color: #FFFFFF}
#imagelist{
	border: thin solid silver;
    float:left;
    padding:5px;
    width:auto;
    margin: 0 5px 0 0;
	border-radius:5px;
	}
-->
</style>
<form action="" method="post" name="form1" id="form1">
<h2>PRODUCTS</h2>

<table border="1" cellspacing="50" datapagesize="50">
  <tr>
    <td>
    <div class="imagelist" >
<table width="5" cellpadding="2" cellspacing="2" hspace="3">
  <tr >
 
    
     <?php
  include("connection/db_con.php");
$query=mysql_query("SELECT * FROM products  ORDER BY id") or die(mysql_error());
while($fetch=mysql_fetch_array($query)){
	?>
 <td width="2"><table width="5" cellspacing="2" cellpadding="2" align="left" border="2">
  <tr>
    <td width="15" bgcolor="#333333" style="color:#FFF" align="justify" valign="top"><?php echo $fetch['pname']; ?></b></td>
  </tr>
  <tr align="center">
    <p><td width="5" align="justify" valign="bottom" colspan="4"><p><img src="products/<?php echo $fetch["pic"];?>" width="167" height="152"><br /></b></td></p>
    </tr>
  <tr>
    <td width="15" bgcolor="#CCCCCC"><?php echo $fetch['description']; ?></b></td>
  </tr>
  <tr>
  <td width="15"><a href="farmer.php?page=product.php && id=<?php echo $fetch['id']; ?>"><input name="" type="button" value="Buy" /></a></b></td></b>
  </tr></b>
</table></b>
</td></b>
<?php
}
?></b>
  </tr></b>
</table> 
</div>
    </b>
    </td>
  </tr></b>
</table></b>



</form>
