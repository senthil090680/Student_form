<?php

/*echo "<pre>";
print_r($_REQUEST);
echo "</pre>";*/


if ($_FILES['resume']['name']!='') { 

if($_FILES['resume']['error'] > 0 ){

	die($_FILES['resume']['error']);
}



else {
	$file_name	=	$_FILES['resume']['name'];
	$fsize	=	$_FILES['resume']['size'];
	$ftype	=	$_FILES['resume']['type'];
	$ftmp	=	$_FILES['resume']['tmp_name'];

	$fp		=	fopen($ftmp,"r+");
	$fcon	=	fread($fp,$fsize);
	$fcon	=	addslashes($fcon);
	
	move_uploaded_file($ftmp,"resume/".$file_name);

	}
	}
	
	if($file != '') {
	$resumefile = ",resume='$file'";
} else  {
	$resumefile = "";
}

	

if ($_FILES['photo']['name']!='') { 

if($_FILES['photo']['error'] > 0 ){

	die($_FILES['photo']['error']);
}

else {
	$file	=	$_FILES['photo']['name'];
	$fsize	=	$_FILES['photo']['size'];
	$ftype	=	$_FILES['photo']['type'];
	$ftmp	=	$_FILES['photo']['tmp_name'];

	$fp		=	fopen($ftmp,"r+");
	$fcon	=	fread($fp,$fsize);
	$fcon	=	addslashes($fcon);
	move_uploaded_file($ftmp,"photo/".$file);

	}
	}
	if($file != '') {
	$photoimage = ",photo='$file'";
} else  {
	$photoimage = "";
}

	
if(isset($_POST['submit']) && $_POST['submit'] == 'submit') { 

	$act		=		$_POST['act'];

	$fname		=		$_POST['fname'];

	$lname		=		$_POST['lname'];
	
	$gen		=		$_POST['gen'];
	
	$mrg		=		$_POST['mrg'];
	
	$ph			=		$_POST['ph'];
	
	$aph		=		$_POST['aph'];
	
	$email		=		$_POST['email'];
	
	$cadd		=		$_POST['cadd'];
	
	$padd		=		$_POST['padd'];
	
	$doj		=		$_POST['doj'];
	
	$dor		=		$_POST['dor'];
	
	$dep		=		$_POST['dep'];
	
	$rep		=		$_POST['rep'];
	
	$uname		=		$_POST['uname'];
	
	$pword		=		$_POST['pword'];
	
	$privilege		=		$_POST['privilege'];

	
include 'include/data.php';

	$query	=	"insert into staff (Active,FName,LName,Gender,Married,Contact,Acontact,email,Caddress,Paddress,DOJ, DOR,Department,Reporting,Resume,Photo,username,password,privilege) values('$act','$fname','$lname','$gen','$mrg','$ph','$aph','$email','$cadd','$padd','$doj','$dor','$dep','$rep','$file_name','$file','$uname','$pword','$privilege')";
	


	$resultset = mysql_query($query,$con)or die (mysql_error());
	
	
	if($resultset) {
		header("location:index.php");
	} else {
		mysql_error();
	}

	mysql_close();
}

?>


<?php
if(isset($_POST['submit']) && $_POST['submit'] == 'submit') { 

		
	$uname		=		$_POST['uname'];
	
	$pword		=		$_POST['pword'];
	
	$privilege		=		$_POST['privilege'];

	

		
$query	=	"insert into login (username,password,privilege) values('$uname','$pword','$privilege')";

	$resultset = mysql_query($query,$con)or die (mysql_error());
	
	
	if($resultset) {
		header("location:index.php");
	} else {
		mysql_error();
	}
	

	mysql_close();
}

?>



<?php include 'include/header.php';
?>
<script type="text/JavaScript">

function cont1()
{

a=document.sform.act;

if(a[0].checked==false && a[1].checked==false)
{
alert("Please Select the Active Status");
return false;
}

b=document.sform.fname.value;

if(b=='')
{
alert("Please Enter First Name");
return false;
}

c=document.sform.lname.value;

if(c=='')
{
alert("Please Enter Last Name");
return false;
}


e=document.sform.gen;

if(e[0].checked==false && e[1].checked==false)
{
alert("Please Select Gender");
return false;
}

f=document.sform.mrg;

if(f[0].checked==false && f[1].checked==false)
{
alert("Please Select Married Status");
return false;
}


g=document.sform.ph.value;
if(g=='')
{
alert('Please Enter Contact Number');
return false;
}
 if(isNaN(g)|| g.indexOf(" ")!=-1){
 alert("Enter numeric value");
 return false; 
 }

h=document.sform.aph.value;
if(h=='')
{
alert('Please Enter AlternatePhone Number');
return false;
}
 if(isNaN(h)|| h.indexOf(" ")!=-1){
 alert("Enter numeric value");
 return false; 
 }
 
i=document.sform.email.value;

if(i=='')
{
alert("Please Enter the E.mail");
return false;
}
if(i.indexOf('@') == -1 || i.indexOf('.') == -1)
{
alert("Please enter valid E.mail");
return false;
}

j=document.sform.cadd.value;
if(j=='')
{
alert("Please Enter Communication Address");
return false;
}

k=document.sform.padd.value;
if(k=='')
{
alert("Please Enter Permanant Address");
return false;
}
o=document.sform.doj.value;
if(o=='')
{
alert("Please Enter DOJ");
return false;
}
l=document.sform.dep.value;
if(l=='')
{
alert("Please Enter Department");
return false;
}

m=document.sform.rep.value;
if(m=='')
{
alert("Please Enter Reporting Person");
return false;
}



}

</script>
<script type="text/javascript" src="js/jquery.js"></script>

<script src="js/jquery-1.7.2.js"></script>
	<script src="js/jquery.ui.core.js"></script>
	<script src="js/jquery.ui.widget.js"></script>
	<script src="js/jquery.ui.datepicker.js"></script>
	<link rel="stylesheet" href="css/demos.css">
	<link rel="stylesheet" href="css/jquery.ui.all.css">
<script>
	$(function() {
		$( "#doj" ).datepicker();
	});
	$(function() {
		$( "#dor" ).datepicker();
	});
	</script>

<script type="text/javascript"> 




$(document).ready(function(){
  $("#cl").click(function(){
  
   if(document.getElementById('cl').checked == true) {
  		$(".panel").show();
    } else {
		$(".panel").hide();
	}
  
  });
});
</script>
<style type="text/css"> 
.panel,p.flip
{
margin:0px;
padding:5px;
font:Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
color:#666666;
}
.panel
{
height:90px;
display:none;
}
</style>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top">&nbsp;</td>
        <td align="left" valign="top" class="txt">&nbsp;</td>
        <td align="right" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td width="2%" height="53" align="left" valign="top" class="topline"><img src="images/topleft.jpg" width="17" height="57"></td>
        <td width="96%" align="left" valign="middle" class="topline"><span class="txt">Add New </span></td>
        <td width="2%" align="right" valign="top" class="topline"><img src="images/righttop.jpg" width="17" height="57"></td>
      </tr>
	<form action="" method="post" onSubmit="return cont1();" name="sform" enctype="multipart/form-data">
      <tr>
        <td align="left" valign="top" class="lline">&nbsp;</td>
        <td align="right" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="18%" height="30" align="left" valign="middle" class="txts">Active : </td>
            <td width="82%" align="left" valign="middle" class="txts">
              <input name="act" type="radio" value="yes"/>Yes
			  <input name="act" type="radio" value="no"/> 
			  No           </td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" class="txts">First Name : </td>
            <td align="left" valign="middle"><input type="text" name="fname" size="35"/></td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" class="txts">Last Name : </td>
            <td align="left" valign="middle"><input type="text" name="lname" size="35"/></td>
          </tr>
        
          <tr>
            <td height="30" align="left" valign="middle" class="txts">Gender : </td>
            <td align="left" valign="middle" class="txts"><span class="txts">
              <input name="gen" type="radio" value="male"/>
            </span>Male <span class="txts">
            <input name="gen" type="radio" value="female"/>
            </span>Female</td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" class="txts">Marital Status : </td>
            <td align="left" valign="middle" class="txts"><span class="txts">
              <input name="mrg" type="radio" value="married"/>
            </span>Married <span class="txts">
            <input name="mrg" type="radio" value="unmarried"/>
            </span>Unmarried </td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" class="txts">Contact No : </td>
            <td align="left" valign="middle"><input type="text" name="ph" size="35"/></td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" class="txts">Alternate No : </td>
            <td align="left" valign="middle"><input type="text" name="aph" size="35"/></td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" class="txts">E-Mail : </td>
            <td align="left" valign="middle"><input type="text" name="email" size="35"/></td>
          </tr>
          <tr>
            <td height="164" align="left" valign="middle" class="txts">Communication Address : </td>
            <td align="left" valign="middle"><textarea name="cadd" cols="40" rows="8"/></textarea></td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" class="txts">Premenant Address : </td>
            <td align="left" valign="middle"><textarea name="padd" cols="40" rows="8"/></textarea></td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" class="txts">Date OF Joining : </td>
            <td align="left" valign="middle"><input type="text" name="doj" size="35" id="doj"/></td>
          </tr>
		   <tr>
            <td height="30" align="left" valign="middle" class="txts">Date OF Relieving : </td>
            <td align="left" valign="middle"><input type="text" name="dor" size="35" id="dor"/></td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" class="txts">Department : </td>
            <td align="left" valign="middle"><input type="text" name="dep" size="35"/></td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" class="txts">Reporting To : </td>
            <td align="left" valign="middle"><input type="text" name="rep" size="35"/></td>
          </tr>
          <tr>
            <td height="19" align="left" valign="middle" class="txts">Upload Resume </td>
            <td height="40" align="left" valign="middle">
              <input type="file" name="resume"/></td>
          </tr>
          <tr>
            <td height="19" align="left" valign="middle" class="txts">Upload Photo </td>
            <td height="40" align="left" valign="middle"><input type="file" name="photo"/></td>
          </tr>
          <tr>
            <td height="19" align="left" valign="middle" class="txts">Need Login : </td>
            <td height="40" align="left" valign="middle"><p class="flip">
              
              <input type="checkbox" name="cl" id="cl">
             
            </p></td>
          </tr>
          <tr>
            <td height="19" colspan="2" align="left" valign="middle" class="txts"><div class="panel" >Username : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="uname" size="35"/> <br/>
			<br/>
            Password : 
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="password" name="pword" size="35"/> <br/><br/> Login Rights : 
              
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="privilege">
                  <option value="">- select -</option>
                  <option value="1">Admin</option>
                  <option value="2">Staff</option>
                </select>
                
          </div></td>
            </tr>
          <tr>
            <td height="19" colspan="2" align="left" valign="middle" class="txts">&nbsp;</td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" class="txts">&nbsp;</td>
            <td align="left" valign="middle">

<input type="submit" name="submit" value="submit">

</form> </td>
          </tr>
        </table></td>
        <td align="right" valign="top" class="rline">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top" class="botline"><img src="images/leftbot.jpg" width="17" height="19"></td>
        <td align="left" valign="top" class="botline">&nbsp;</td>
        <td align="right" valign="top" class="botline"><img src="images/botright.jpg" width="17" height="19"></td>
      </tr>
</table></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>

</table>

  <?php include 'include/footer.php';
?>