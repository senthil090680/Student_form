<?php
include 'include/data.php';
$ID=$_GET['id'];
$row=mysql_fetch_object(mysql_query("select * from `register_table` where `ID`='$ID' "));

if(isset($_POST['submit']))
{

$act=$_POST['act'];
$name=$_POST['name'];
$fee=$_POST['fee'];
$fph=$_POST['fph'];
$course=$_POST['course'];
$ph=$_POST['ph'];
$email=$_POST['email'];
$cc=$_POST['cc'];
$ps=$_POST['ps'];
$add=$_POST['add'];
$note=$_POST['note'];
$resume=$_POST['resume'];

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

$a="update register_table set active='$act',name='$name',fee='$fee',fphone='$fph',course='$course',phone='$ph',email='$email',coursecomplete='$cc',placedstatus='$ps',addres='$add',note='$note',resume='$resume'".$photoimage."  where ID='$ID'";
 $b=mysql_query($a)or die (mysql_error());
 

 if($b)
{
header("location:data.php?ID=$ID");
}  else
{
header("location:Edit.php?err2");
}

}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Smart Entry - Student Form</title>



<link href="css/style.css" rel="stylesheet" type="text/css" />

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
	 <form action="" method="post" onSubmit="return cont();" name="form" enctype="multipart/form-data">

	 <?php 
	  include 'include/data.php';
	  $a="select ID,active,name,fee,fphone,course,phone,email,coursecomplete,placedstatus,photo,addres,note,resume from register_table where ID = '$_GET[id]'";
	  $b=mysql_query($a)or die (mysql_error());
	  $c=mysql_fetch_object($b);
	  
	  $c->ID;
	  $c->active;
	  $c->name;
	  $c->course;
	  $c->phone;
	  $c->email;
	  $c->coursecomplete;
	  $c->placedstatus;
	  $c->photo;
          $c->addres;
          $c->note;
	  ?>
	  
      <tr>
        <td align="left" valign="top" class="lline">&nbsp;</td>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="48%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="30%" height="30" align="left" valign="middle" class="txts">Active : </td>
                <td width="70%" align="left" valign="middle" class="txts"><input name="act" type="radio" value="<?php echo $c->active;?>" <?php if(strtolower($c->active) == 'yes') { echo "checked"; } ?> >
                  Yes
                  <input name="act" type="radio" value="<?php echo $c->active;?>" <?php if(strtolower($c->active) == 'no') { echo "checked"; } ?>>
                  No </td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="txts">Name : </td>
                <td align="left" valign="middle"><input type="text" name="name" size="35" value="<?php echo $c->name;?>"></td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="txts">Course : </td>
                <td align="left" valign="middle"><input type="text" name="course" size="35" value="<?php echo $c->course;?>"></td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="txts">Fee Details : </td>
                <td align="left" valign="middle"><input type="text" name="fee" size="35" value="<?php echo $c->fee;?>"></td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="txts">Address : </td>
                <td align="left" valign="middle"><textarea name="add" cols="27" rows="5"><?php echo $c->addres; ?></textarea>
                </td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="txts">Contact No : </td>
                <td align="left" valign="middle"><input type="text" name="ph" size="35" value="<?php echo $c->phone;?>"></td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="txts">Father / Guardian No : </td>
                <td align="left" valign="middle"><input type="text" name="fph" size="35" value="<?php echo $c->fphone;?>"></td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="txts">E-Mail : </td>
                <td align="left" valign="middle"><input type="text" name="email" size="35" value="<?php echo $c->email;?>"></td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="txts">Course Complete : </td>
                <td align="left" valign="middle"><select name="cc" >
                    <option value="<?php echo $c->coursecomplete;?>">- select -</option>
                    <option value="Yes" <?php if(strtolower($c->coursecomplete) == 'yes') { echo "selected"; } ?> >Yes</option>
                    <option value="No" <?php if(strtolower($c->coursecomplete) == 'no') { echo "selected"; } ?> >No</option>
                    <option value="Discontinued" <?php if(strtolower($c->coursecomplete) == 'discontinued') { echo "selected"; } ?> >Discontinued</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="txts">Placed Status : </td>
                <td align="left" valign="middle"><select name="ps" >
                    <option value="<?php echo $c->placedstatus;?>">- select -</option>
                    <option value="Yes" <?php if(strtolower($c->placedstatus) == 'yes') { echo "selected"; } ?>>Yes</option>
                    <option value="No" <?php if(strtolower($c->placedstatus) == 'no') { echo "selected"; } ?>>No</option>
                </select></td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="txts">Note : </td>
                <td align="left" valign="middle"><textarea name="note" cols="40" rows="8"><?php echo $c->note; ?></textarea>
                </td>
              </tr>
              <tr>
                <td height="19" align="left" valign="middle" class="txts">Upload Resume </td>
                <td height="40" align="left" valign="middle"><input type="file" name="resume" value="<?php echo $c->resume;?>"></td>
              </tr>
              <tr>
                <td height="19" align="left" valign="middle" class="txts">Upload Photo </td>
                <td height="40" align="left" valign="middle"><input type="file" name="photo" <?php  echo $c->photo;?> /></td>
              </tr>
              <tr>
                <td height="19" align="left" valign="middle" class="txts">&nbsp;</td>
                <td align="left" valign="middle"></td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="txts">&nbsp;</td>
                <td align="left" valign="middle"><input type="submit" name="submit" value="Update">
                    </form>
                </td>
              </tr>
            </table></td>
            <td width="52%" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td width="5%">&nbsp;</td>
                <td width="95%"><?php if($c->photo=='')
		{?>
        <td align="center" valign="middle" class="txt"><img src='images/bphoto.jpg' width="150" height="160"/></td>
		<?php } 
		
		else if($c->photo!='')
		
		{ ?>
		  <td align="center" valign="middle" class="txt"><img src="photo/<?php echo $c->photo; ?>" width="150" height="160"/></td>
		 <?php  } ?></td>
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

  