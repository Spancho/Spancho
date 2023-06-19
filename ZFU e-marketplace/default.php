<?php
//session_start();
error_reporting(0);
if(!isset($_SESSION['logged'])){
die('<script language=javascript> location=("index.php");</script>');
}
?>
<style type="text/css">
a:link {
	color: #093;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #093;
}
a:hover {
	text-decoration: underline;
	color: #093;
}
a:active {
	text-decoration: none;
	color: #093;
}
</style>
<form name="form1" method="post" action="">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="4" align="center" bgcolor="#004000"><strong><font color=""><marquee scrollamount="10" direction="left" align="middle">
      </marquee></font></strong></td>
    </tr>
    <tr>
      <td width="75%" height="227" rowspan="4" align="center"><img src="images/images2.jpg" width="382" height="233" /></td>
      <td width="1%" height="59" align="center">&nbsp;</td>
      <td width="1%" align="center"><h3>&nbsp;</h3></td>
      <td width="23%" align="center"><img src="images/inde1x.jpg" width="103" height="57" /></td>
    </tr>
    <tr>
      <td colspan="3" align="center"><hr /></td>
    </tr>
    <tr>
      <td colspan="3" align="center">
        <a href="farmer.php?page=downloadfiles.php">View Newsletters</a>
      </center></td>
    </tr>
    <tr>
      <td colspan="3" align="center"></td>
    </tr>
  </table>
</form>
