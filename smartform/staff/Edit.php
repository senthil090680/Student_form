<?php
include 'include/data.php';
$id=$_GET['id'];
$row=mysql_fetch_object(mysql_query("select * from `staff` where `id`='$id' "));

if(isset($_POST['submit']))
{

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
	
	$resume		=		$_POST['resume'];
	
	$photo		=		$_POST['photo'];
	
	$uname		=		$_POST['uname'];
	
	$pword		=		$_POST['pword'];
	
	$privilege		=		$_POST['privilege'];

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

$a="update staff set Active='$act',FName='$fname',LName='$lname',Gender='$gen',Married='$mrg',Contact='$ph',Paddress='$aph',email='$email',Caddress='$cadd',Paddress='$padd',DOJ='$doj',DOR='$dor',Department='$dep',Reporting='$rep',Resume='$resume'".$photoimage.",username='$uname',password='$pword',privilege='$privilege'where id='$id'";


 $b=mysql_query($a)or die (mysql_error());
 

 if($b)
{
header("location:index.php?id=$id");
}  else
{
header("location:Edit.php?err2");
}

}
?>


<?php include 'include/header.php';
?>


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
	 <?php 
	  include 'include/data.php';
	  $a="select id,Active,FName,LName,Gender,Married,Contact,Acontact,email,Caddress,Paddress,DOJ,DOR,Department,Reporting,Resume,Photo,username,password,privilege from staff where id = '$_GET[id]'";
	  $b=mysql_query($a)or die (mysql_error());
	  $c=mysql_fetch_object($b);
	  
  	  $c->id;
	  $c->Active;
	  $c->FName;
	  $c->LName;
	  $c->Gender;
	  $c->Married;
	  $c->Contact;
	  $c->Acontact;
	  $c->email;
	  $c->Caddress;
	  $c->Paddress;
	  $c->DOJ;
	  $c->DOR;
	  $c->Deportment;
	  $c->Reporting;
	  $c->Resume;
	  $c->Photo;
	  $c->username;
	  $c->password;
	  $c->privilege;
	  ?>
	  
      <tr>
        <td align="left" valign="top" class="lline">&nbsp;</td>
        <td align="left" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="55%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="34%" height="30" align="left" valign="middle" class="txts">Active : </td>
                <td width="66%" align="left" valign="middle" class="txts"><input name="act" type="radio" value="<?php echo $c->Active;?>" <?php if(strtolower($c->Active) == 'yes') { echo "checked"; } ?>>
                  Yes
                  <input name="act" type="radio" value="<?php echo $c->Active;?>" <?php if(strtolower($c->Active) == 'no') { echo "checked"; } ?>>
                  No </td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="txts">First Name : </td>
                <td align="left" valign="middle"><input type="text" name="fname" size="35" value="<?php echo $c->FName;?>"></td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="txts">Last Name : </td>
                <td align="left" valign="middle"><input type="text" name="lname" size="35" value="<?php echo $c->LName;?>"></td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="txts">Gender : </td>
                <td align="left" valign="middle" class="txts"><input name="gen" type="radio" value="<?php echo $c->Gender;?>" <?php if(strtolower($c->Gender) == 'male') { echo "checked"; } ?>>
                  Male
                  <input name="gen" type="radio" value="<?php echo $c->Gender;?>" <?php if(strtolower($c->Gender) == 'female') { echo "checked"; } ?>>
                  Female</td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="txts">Marital Status : </td>
                <td align="left" valign="middle" class="txts"><input name="mrg" type="radio" value="<?php echo $c->Married;?>" <?php if(strtolower($c->Married) == 'Married') { echo "checked"; } ?>>
                  Married
                  <input name="mrg" type="radio" value="<?php echo $c->Married;?>" <?php if(strtolower($c->Married) == 'Unmarried') { echo "checked"; } ?>>
                  Unmarried </td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="txts">Contact No : </td>
                <td align="left" valign="middle"><input type="text" name="ph" size="35" value="<?php echo $c->Contact;?>"></td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="txts">Alternate No : </td>
                <td align="left" valign="middle"><input type="text" name="aph" size="35" value="<?php echo $c->Acontact;?>"></td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="txts">E-Mail : </td>
                <td align="left" valign="middle"><input type="text" name="email" size="35" value="<?php echo $c->email;?>"></td>
              </tr>
              <tr>
                <td height="164" align="left" valign="middle" class="txts">Communication Address : </td>
                <td align="left" valign="middle"><textarea name="cadd" cols="40" rows="8"><?php echo $c->Caddress; ?></textarea></td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="txts">Premenant Address : </td>
                <td align="left" valign="middle"><textarea name="padd" cols="40" rows="8"><?php echo $c->Paddress; ?></textarea></td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="txts">Date OF Joining : </td>
                <td align="left" valign="middle"><input type="text" name="doj" size="35" id="doj" value="<?php echo $c->DOJ;?>"></td>
              </tr>
			  
			   <tr>
                <td height="30" align="left" valign="middle" class="txts">Date OF Reliving : </td>
                <td align="left" valign="middle"><input type="text" name="dor" size="35" id="dor" value="<?php echo $c->DOR;?>"></td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="txts">Department : </td>
                <td align="left" valign="middle"><input type="text" name="dep" size="35" value="<?php echo $c->Department;?>"></td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="txts">Reporting To : </td>
                <td align="left" valign="middle"><input type="text" name="rep" size="35" value="<?php echo $c->Reporting;?>"></td>
              </tr>
              <tr>
                <td height="19" align="left" valign="middle" class="txts">Upload Resume </td>
                <td height="40" align="left" valign="middle"><input type="file" name="resume" value="<?php echo $c->Resume;?>"></td>
              </tr>
              <tr>
                <td height="19" align="left" valign="middle" class="txts">Upload Photo </td>
                <td height="40" align="left" valign="middle"><input type="file" name="photo" value="<?php echo $c->Photo;?>"></td>
              </tr>
              <tr>
                <td height="19" align="left" valign="middle" class="txts">Need Login : </td>
                <td height="40" align="left" valign="middle"><p class="flip">
                    <input type="checkbox" name="cl" id="cl">
                </p></td>
              </tr>
              <tr>
                <td height="19" colspan="2" align="left" valign="middle" class="txts"><div class="panel" >Username : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="text" name="uname" size="35" value="<?php echo $c->username;?>"/>
                        <br/>
                        <br/>
                  Password : 
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <input type="password" name="pword" size="35" value="<?php echo $c->password;?>"/>
                       <br/>
                  <br/>
                  Login Rights : 
                  
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <select name="rig">
                          <option value="<?php echo $c->privilege;?>">- select -</option>
                          <option value="1"<?php if(strtolower($c->privilege) == '1') { echo "selected"; } ?>>Admin</option>
                          <option value="2" <?php if(strtolower($c->privilege) == '2') { echo "selected"; } ?>>Staff</option>
                        </select>
                </div></td>
              </tr>
              <tr>
                <td height="19" colspan="2" align="left" valign="middle" class="txts">&nbsp;</td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="txts">&nbsp;</td>
                <td align="left" valign="middle"><input type="submit" name="submit" value="submit">
                    </form>
                </td>
              </tr>
            </table></td>
            <td width="45%" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top">&nbsp;</td>
                <td align="center" valign="middle" class="txt">&nbsp;</td>
                <td align="left" valign="top">&nbsp;</td>
              </tr>
              <tr>
			  <?php if($c->Photo=='')
		{?>
			  
                <td width="37%" align="left" valign="top"><img src='images/bphoto.jpg' width="150" height="160"/></td>
				<?php } 
		
		else if($c->Photo!='')
		
		{ ?>
		  <td align="center" valign="middle" class="txt"><img src="photo/<?php echo $c->Photo; ?>" width="150" height="160"/></td>
		 <?php  } ?>
				
                <td width="63%" align="left" valign="top">&nbsp;</td>
              </tr>
            </table></td>
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