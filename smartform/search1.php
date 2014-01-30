  <?php 
 //This is only displayed if they have submitted the form 
 if ($searching =="yes") 
 { 
 echo "<h2>Results</h2><p>"; 
 
 //If they did not enter a search term we give them an error 
 if ($find == "") 
 { 
 echo "<p>You forgot to enter a search term"; 
 exit; 
 } 
 
 // Otherwise we connect to our Database 
 mysql_connect("mysql.yourhost.com", "user_name", "password") or die(mysql_error()); 
 mysql_select_db("database_name") or die(mysql_error()); 
 
 // We preform a bit of filtering 
 $find = strtoupper($find); 
 $find = strip_tags($find); 
 $find = trim ($find); 
 
 //Now we search for our search term, in the field the user specified 
 $data = mysql_query("SELECT * FROM users WHERE upper($field) LIKE'%$find%'"); 
 
 //And we display the results 
 while($result = mysql_fetch_array( $data )) 
 
 { 
 echo $result['fname']; 
 echo " "; 
 echo $result['lname']; 
 echo "<br>"; 
 echo $result['info']; 
 echo "<br>"; 
 echo "<br>"; 
 } 
 
 //This counts the number or results - and if there wasn't any it gives them a little message explaining that 
 
 $anymatches=mysql_num_rows($data); 
 
 if ($anymatches == 0) 
 { 
 
 echo "Sorry, but we can not find an entry to match your query<br><br>"; 
 
 } 
 
 //And we remind them what they searched for 
 
 echo "<b>Searched For:</b> " .$find; 
 
 } 
 
 ?> 
 
 
 <h2>Search</h2> 
 <form name="search" method="post" action="<?=$PHP_SELF?>">
 Seach for: <input type="text" name="find" /> in 
 <Select NAME="field">
 <Option VALUE="fname">First Name</option>
 <Option VALUE="lname">Last Name</option>
 <Option VALUE="info">Profile</option>
 </Select>
 <input type="hidden" name="searching" value="yes" />
 <input type="submit" name="search" value="Search" />
 </form>




<?php include 'include/header.php';
?>
<body>
<?php 
 //This is only displayed if they have submitted the form 
 
 
 include 'include/data.php';

 // Otherwise we connect to our Database 

 
 // We preform a bit of filtering 
 $find = $_POST['ser'];
 
 //Now we search for our search term, in the field the user specified 
 $data = mysql_query("SELECT * FROM register_table WHERE name LIKE'%$find%'"); 
  
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
	  
 <?php }  ?>
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