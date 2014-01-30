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

	$name		=		$_POST['name'];

	$course		=		$_POST['course'];
	
	$fee		=		$_POST['fee'];
	
	$add		=		$_POST['add'];
	
	$ph			=		$_POST['ph'];
	
	$fph		=		$_POST['fph'];
	
	$email		=		$_POST['email'];
	
	$doj		=		$_POST['doj'];
	
	$doc		=		$_POST['doc'];
	
	$cc			=		$_POST['cc'];
	
	$ps			=		$_POST['ps'];
	
	$note		=		$_POST['note'];

	
include 'include/data.php';

	$query	=	"insert into register_table (active,name,course,fee,addres,phone,fphone,email,doj,doc,coursecomplete,placedstatus,note,resume,photo) values('$act','$name','$course','$fee','$add','$ph','$fph','$email','$doj','$doc','$cc','$ps','$note','$file_name','$file')";

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
		$( "#doc" ).datepicker();
	});
	</script>





<script type="text/JavaScript">

function cont()
{

a=document.form.act;

if(a[0].checked==false && a[1].checked==false)
{
alert("Please Select the Active Status");
return false;
}

b=document.form.name.value;

if(b=='')
{
alert("Please Enter Name");
return false;
}

c=document.form.course.value;

if(c=='')
{
alert("Please Enter Course");
return false;
}

d=document.form.fee.value;
if(d=='')
{
alert("Please Enter Fee Details");
return false;
}

e=document.form.add.value;
if(e=='')
{
alert("Please Enter Address");
return false;
}


f=document.form.ph.value;
if(f=='')
{
alert('Please Enter Phone Number');
return false;
}
 if(isNaN(f)|| f.indexOf(" ")!=-1){
 alert("Enter numeric value");
 return false; 
 }

g=document.form.fph.value;
if(g=='')
{
alert('Please Enter Phone Number');
return false;
}
 if(isNaN(g)|| g.indexOf(" ")!=-1){
 alert("Enter numeric value");
 return false; 
 }
 
h=document.form.email.value;

if(h=='')
{
alert("Please Enter the E.mail");
return false;
}
if(h.indexOf('@') == -1 || h.indexOf('.') == -1)
{
alert("Please enter valid E.mail");
return false;
}

o=document.form.doj.value;
if(o=='')
{
alert("Please Enter DOJ");
return false;
}


i=document.form.cc.value;
if(i=='')
{
alert("Please Enter Course Complete Status");
return false;
}

j=document.form.ps.value;
if(j=='')
{
alert("Please Enter Placed Status");
return false;
}

k=document.form.note.value;
if(k=='')
{
alert("Please Enter Note");
return false;
}

l=document.form.resume.value;
if(l=='')
{
alert("Please upload Resume");
return false;
}



}

</script>
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
	 <form action="data.php" method="post" onSubmit="return cont();" name="form" enctype="multipart/form-data">
      <tr>
        <td align="left" valign="top" class="lline">&nbsp;</td>
        <td align="right" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20%" height="30" align="left" valign="middle" class="txts">Active : </td>
            <td width="80%" align="left" valign="middle" class="txts">
              <input name="act" type="radio" value="yes">Yes
			  <input name="act" type="radio" value="no"> 
			  No           </td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" class="txts">Name : </td>
            <td align="left" valign="middle"><input type="text" name="name" size="35"></td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" class="txts">Course : </td>
            <td align="left" valign="middle"><input type="text" name="course" size="35"></td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" class="txts">Fee Details : </td>
            <td align="left" valign="middle"><input type="text" name="fee" size="35"></td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" class="txts">Address : </td>
            <td align="left" valign="middle">
              <textarea name="add" cols="27" rows="5"></textarea>           </td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" class="txts">Contact No : </td>
            <td align="left" valign="middle"><input type="text" name="ph" size="35"></td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" class="txts">Father / Guardian No : </td>
            <td align="left" valign="middle"><input type="text" name="fph" size="35"></td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" class="txts">E-Mail : </td>
            <td align="left" valign="middle"><input type="text" name="email" size="35"></td>
          </tr>
		  <tr>
            <td height="30" align="left" valign="middle" class="txts">Date of Joining the Course : </td>
            <td align="left" valign="middle"><input type="text" name="doj" size="35" id="doj"/></td>
          </tr>
		   <tr>
            <td height="30" align="left" valign="middle" class="txts">Date of Completing the course : </td>
            <td align="left" valign="middle"><input type="text" name="doc" size="35" id="doc"/></td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" class="txts">Course Complete : </td>
            <td align="left" valign="middle">
              <select name="cc">
                <option value="">- select -</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                <option value="Discontinued">Discontinued</option>
              </select>           </td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" class="txts">Placed Status : </td>
            <td align="left" valign="middle"><select name="ps">
              <option value="">- select -</option>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
             
            </select></td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" class="txts">Note : </td>
            <td align="left" valign="middle">
              <textarea name="note" cols="40" rows="8"></textarea>            </td>
          </tr>
          <tr>
            <td height="19" align="left" valign="middle" class="txts">Upload Resume </td>
            <td height="40" align="left" valign="middle">
              <input type="file" name="resume"></td>
          </tr>
          <tr>
            <td height="19" align="left" valign="middle" class="txts">Upload Photo </td>
            <td height="40" align="left" valign="middle"><input type="file" name="photo"></td>
          </tr>
          <tr>
            <td height="19" align="left" valign="middle" class="txts">&nbsp;</td>
            <td align="left" valign="middle"></td>
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