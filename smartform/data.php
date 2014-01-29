
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
<body>
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
              <td width="5%" align="left" valign="middle" class="txt">Search : </td>
              <td width="20%" align="left" valign="middle" class="txt"><input type="text" name="ser" size="35"></td>
              
              <td width="10%" align="left" valign="middle" class="txt"><Select NAME="field">
 <Option VALUE="name">Name</option>
 <Option VALUE="phone">Contact No</option>

 </Select></td>
              <td width="50%" align="left" valign="middle">
			  <input type="image" name='search'img src="images/going.png" width="30" height="27"/></td>
            </tr></form>
        </table></td>
      </tr>
	 
      <tr>
        <td>&nbsp;</td>
        <td>  <?php
		
		require "include/data.php";           // All database details will be included here 

$page_name="data.php"; //  If you use this code with a different page ( or file ) name then change this 
$start=$_GET['start'];
if(strlen($start) > 0 and !is_numeric($start)){
echo "Data Error";
exit;
}


$eu = ($start - 0); 
$limit = 2;                                 // No of records to be shown per page.
$this1 = $eu + $limit; 
$back = $eu - $limit; 
$next = $eu + $limit; 

		
/*	  include 'include/data.php';
	  $recs_per_page	=	2;

$page_no		=	1;

if($_GET['p'] != '') {
	$page_no		=	$_GET['p'];
}

$offset			=	($page_no-1)*$recs_per_page;
*/

$a="select * from register_table";

$nume	=	mysql_query($a) or die(mysql_error());
?></td>
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

$a="select * from register_table order by id asc limit $eu,$limit";

$b	=	mysql_query($a) or die(mysql_error());
	 
	  
      while($c=mysql_fetch_object($b))
	  
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
	  
	  
	   <?php }?>
	  
	  
	  
	  
	  <?php
	  
	  if($nume > $limit ){ // Let us display bottom links if sufficient records are there for paging

/////////////// Start the bottom links with Prev and next link with page numbers /////////////////

//// if our variable $back is equal to 0 or more then only we will display the link to move back ////////
if($back >=0) { 
echo "<a href='$page_name?start=$back'><font face='Verdana' size='2'>PREV</font></a>"; 
} 
//////////////// Let us display the page links at  center. We will not display the current page as a link ///////////

$i=0;
$l=1;
for($i=0;$i < $nume;$i=$i+$limit){
if($i <> $eu){
echo " <a href='$page_name?start=$i'><font face='Verdana' size='2'>$l</font></a> ";
}
else { echo "<font face='Verdana' size='4' color=red>$l</font>";}        /// Current page is not displayed as link and given font color red
$l=$l+1;
}



///////////// If we are not in the last page then Next link will be displayed. Here we check that /////
if($this1 < $nume) { 
print "<a href='$page_name?start=$next'><font face='Verdana' size='2'>NEXT</font></a>";} 


}// end of if checking suf
		  
	/*  
	  $total_recs	=	mysql_num_rows($b);

$max_page	=	$total_recs/$recs_per_page;

$max_page	=	ceil($max_page);

for($i=1; $i<= $max_page; $i++) {
	echo "<a href=\"data.php?p=$i\">$i</a>";
	echo " ";
}
	  */
	  
	  
	     ?>
	  
	  
	  
	    
      <tr>
        <td align="left" valign="top" class="botline"><img src="images/leftbot.jpg" width="17" height="19"></td>
        <td height="19" colspan="11" align="center" valign="middle" class="botline">&nbsp;</td>
        <td align="right" valign="top" class="botline"><img src="images/botright.jpg" width="17" height="19"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top"></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>
<?php include 'include/footer.php';
?>
