<?php

//echo "ewrwer";

ini_set("display_errors",true);
error_reporting(E_ALL);
if((isset($_POST['uname']) && $_POST['uname'] != '') && (isset($_POST['pword']) && $_POST['pword'] != '')) {
	$uname		=		$_POST['uname'];
	
	$pword		=		$_POST['pword'];
	
	include 'include/data.php';
	
	echo $query	=	"select username,password from login where username='$uname' AND password='$pword'";

	$resultset = mysql_query($query,$con);
	
	$noofrow = mysql_num_rows($resultset);

	if($noofrow > 0) {		
		header("location:data.php");	
	} else {		
		header("location:index.php?err=error");	
	}
	mysql_close();
} else {
	if(isset($_GET['err']) && $_GET['err'] == 'error') {
		echo "<script type='text/javascript'> alert('username password not correct');</script>";
	}
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Smart Entry - Student Form</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">

function test()

{
a=document.login.uname.value;
if(a=='')
{alert("Please Enter the Username");
return false;
}

b=document.login.pword.value;
if(b=='')
{alert("Please Enter the Password");
return false;
}

}
</script>


</head>


<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="768" align="center" valign="middle" class="bg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="36%">&nbsp;</td>
              <td width="8%">&nbsp;</td>
              <td width="56%">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td align="left" valign="middle">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td align="left" valign="middle">&nbsp;</td>
            </tr>
			 <form name="login" action="" method="post" onSubmit="return test();">
            <tr>
              <td>&nbsp;</td>
              <td align="left" valign="middle" class="txt">User Name : </td>
              <td align="left" valign="middle"><input type="text" name="uname" class="intext" autocomplete="off"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td align="left" valign="middle" class="txt">&nbsp;</td>
              <td align="left" valign="middle">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td align="left" valign="middle" class="txt">Password : </td>
              <td align="left" valign="middle"><input type="password" name="pword" class="intext" autocomplete="off"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td align="left" valign="middle">&nbsp;</td>
              <td align="left" valign="middle"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td align="left" valign="middle"><input type="image" name="Submit" value="Login" img src="images/loginbox.png" class="subm"/></form></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
