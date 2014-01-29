
<?php include 'include/header.php';
?>
 
<script type="text/JavaScript">

function ser1()
{

b=document.ser.ser.value;

if(b=='')
{
alert("Please Enter Name Or Contacts No");
return false;
}
}
</script>

<form name="ser" action="search.php" onSubmit="return ser1();" method="post" >
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="0%">&nbsp;</td>
        <td width="6%" class="txt"><a href="Register.php">Add New</a> </td>
        <td width="5%" class="txt"><a href="#">Delete</a></td>
        <td width="89%" class="txt"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="15%" align="left" valign="top">&nbsp;</td>
              <td width="6%" align="left" valign="middle" class="txt">Search : </td>
              <td width="20%" align="left" valign="middle" class="txt"><input type="text" name="ser" size="35"></td>
              
              <td width="10%" align="left" valign="middle" class="txt"><Select NAME="field">
 <Option VALUE="name" selected>Name</option>
 <Option VALUE="phone">Contact No</option>

              </Select></td>
              <td width="49%" align="left" valign="middle">
			  <input type="image" name='search'img src="images/going.png" width="30" height="27"/></td>
            </tr></form>
        </table></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="topline"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="2%" align="left" valign="top" class="txt"><img src="images/topleft.jpg" width="17" height="57"></td>
        <td width="3%" height="57" align="center" valign="middle" class="txt">ID</td>
        <td width="3%" align="center" valign="middle" class="txt"><input type="checkbox" name="checkbox" value="checkbox"/>        </td>
        <td width="4%" align="center" valign="middle" class="txt"><img src="images/Edit.png" width="25" height="25"></td>
        <td width="5%" align="center" valign="middle" class="txt">Active </td>
        <td width="17%" align="center" valign="middle" class="txt">Name</td>
        <td width="11%" align="center" valign="middle" class="txt">Course</td>
        <td width="14%" align="center" valign="middle" class="txt">Contact No </td>
        <td width="17%" align="center" valign="middle" class="txt">Emai ID </td>
        <td width="9%" align="center" valign="middle" class="txt">Course Complete</td>
        <td width="5%" align="center" valign="middle" class="txt">Placed Status </td>
        <td width="5%" align="center" valign="middle" class="txt">Photo</td>
        <td width="4%" align="right" valign="top" class="txt"><img src="images/righttop.jpg" width="17" height="57"></td>
      </tr>
	  
	<?php 
 //This is only displayed if they have submitted the form 
 
 
 include 'include/data.php';

 // Otherwise we connect to our Database 

 
 // We preform a bit of filtering 
 $find = $_POST['ser'];
 $field = $_POST['field'];
 
 //Now we search for our search term, in the field the user specified 
 $data = mysql_query("SELECT * FROM register_table WHERE $field LIKE'%$find%' "); 
 
 //And we display the results 
 while($c=mysql_fetch_object($data))
	  
	  {
	  $c->ID;
	  $c->active;
	  $c->name;
	  $c->course;
	  $c->phone;
	  $c->email;
	  $c->cc;
	  $c->ps;
	  $c->photo;
	  
?>

      <tr>
        <td align="left" valign="top" class="lline">&nbsp;</td>
        <td height="44" align="center" valign="middle" class="txt"><?php echo $c->ID;?></td>
        <td align="center" valign="middle" class="txts"><input type="checkbox" name="checkbox" value="checkbox"/> </td>
        <td align="center" valign="middle" class="txts"><a href="Edit.php?id=<?php echo "$c->ID";?>" target="_self"><img src="images/Edit.png" width="25" height="25" border="0"></a></td>
        <td align="center" valign="middle" class="txts"><?php echo $c->active;?></td>
        <td align="center" valign="middle" class="txts"><?php echo $c->name;?></td>
        <td align="center" valign="middle" class="txts"><?php echo $c->course;?></td>
        <td align="center" valign="middle" class="txts"><?php echo $c->phone;?></td>
        <td align="center" valign="middle" class="txts"><?php echo $c->email;?></td>
        <td align="center" valign="middle" class="txts"><?php echo $c->coursecomplete;?></td>
        <td align="center" valign="middle" class="txts"><?php echo $c->placedstatus;?></td>
		
		<?php if($c->photo=='')
		{?>
        <td align="center" valign="middle" class="txt"><img src='images/bphoto.jpg' width="50" height="50"/></td>
		<?php } 
		
		else if($c->photo!='')
		
		{ ?>
		  <td align="center" valign="middle" class="txt"><img src="photo/<?php echo $c->photo; ?>" width="50" height="50"/></td>
		 <?php  } ?>
        <td width="1%" align="right" valign="top" class="rline">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top" class="lline">&nbsp;</td>
        <td height="25" align="center" valign="middle" class="txt">&nbsp;</td>
        <td align="center" valign="middle" class="txt">&nbsp;</td>
        <td align="center" valign="middle" class="txt">&nbsp;</td>
        <td align="center" valign="middle" class="txt">&nbsp;</td>
        <td align="center" valign="middle" class="txt">&nbsp;</td>
        <td align="center" valign="middle" class="txt">&nbsp;</td>
        <td align="center" valign="middle" class="txt">&nbsp;</td>
        <td align="center" valign="middle" class="txt">&nbsp;</td>
        <td align="center" valign="middle" class="txt">&nbsp;</td>
        <td align="center" valign="middle" class="txt">&nbsp;</td>
        <td align="center" valign="middle" class="txt">&nbsp;</td>
        <td align="center" valign="middle" class="rline">&nbsp;</td>
        <td align="right" valign="top" class="">&nbsp;</td>
      </tr>
	  <?php } ?>
	  
	  
	  
	    
      <tr>
        <td align="left" valign="top" class="botline"><img src="images/leftbot.jpg" width="17" height="19"></td>
        <td height="19" colspan="11" align="center" valign="middle" class="botline">&nbsp;</td>
        <td align="right" valign="top" class="botline"><img src="images/botright.jpg" width="17" height="19"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>
 <?php
 //This counts the number or results - and if there wasn't any it gives them a little message explaining that 
 
 $anymatches=mysql_num_rows($data); 
 
 if ($anymatches == 0) 
 { 
 
 echo "Sorry, but we can not find an entry to match your query<br><br>"; 
 
 } 
 
 //And we remind them what they searched for 
 
 echo "<b>Searched For:</b> " .$find; 
 

  mysql_close();
 
 ?> 
<?php include 'include/footer.php';
?>
