
<?php include 'include/header.php';

$find = $_REQUEST['ser'];
$field = $_REQUEST['field'];
 


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
 <Option VALUE="FName" selected>Name</option>
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
        <td width="1%" align="left" valign="middle"><img src="images/topleft.jpg" width="17" height="57"></td>
        <td width="5%" align="center" valign="middle" class="txt">ID</td>
        <td width="4%" align="center" valign="middle">          <input type="checkbox" name="checkbox" value="checkbox">      </td>
        <td width="4%" align="center" valign="middle"><img src="images/Edit.png" width="25" height="25"></td>
        <td width="5%" align="center" valign="middle" class="txt">Active</td>
        <td width="17%" align="center" valign="middle" class="txt">Name</td>
        <td width="13%" align="center" valign="middle" class="txt">Contact </td>
        <td width="21%" align="center" valign="middle" class="txt">E-Mail</td>
        <td width="18%" align="center" valign="middle" class="txt">Department</td>
        <td width="8%" align="center" valign="middle" class="txt">Photo</td>
        <td width="4%" align="right" valign="top"><img src="images/righttop.jpg" width="17" height="57"></td>
      </tr>
	  
	<?php 

 
 
 include 'include/data.php';
  define('PAGE_PER_COUNT',2);
  ?>
  
  
 

 <script>

function pageactivity(pageno){
        
        var ser = '<?php echo $find; ?>';
        var field = '<?php echo $field; ?>';
        window.location =  "search.php?page="+pageno+"&ser="+ser+"&field="+field;        
}


</script>



<style type="text/css">

/* Pagination starts here */

div.pagination {
    padding: 3px;
    margin: 3px;
    font-size:12px;
	float:right;
}

div.pagination a {
    padding: 2px 5px 2px 5px;
    margin: 2px;
    border: 1px solid #F09640;	
    text-decoration: none; /* no underline */
    color: #F09640;
    cursor: hand;
    cursor: pointer;
}
div.pagination a:hover, div.pagination a:active {
    border: 1px solid #F09640;
    color: #6AABE1;
    cursor: hand;
    cursor: pointer;
}
div.pagination span.current {
    padding: 2px 5px 2px 5px;
    margin: 2px;
    border: 1px solid #F09640;

    font-weight: bold;
    background-color: #F09640;
    color: #FFF;
    cursor: hand;
    cursor: pointer;
}
div.pagination span.disabled {
    padding: 2px 5px 2px 5px;
    margin: 2px;
    border: 1px solid #EEE;
    color: #DDD;
}

/* Pagination ends here */

</style>


<?php




$adjacents                              =               3;

$query                                  =               "SELECT COUNT(*) as totalPages FROM staff WHERE $field LIKE '%$find%'";
$total_pages                            =               mysql_fetch_array(mysql_query($query));
$total_pages                            =               $total_pages[totalPages];

$targetpage                             =               "search.php";  //your file name  (the name of this file)
$limit                                  =               PAGE_PER_COUNT;    //how many items to show per page
$page                                   =               $_GET['page'];
if($page)
    $start                              =               ($page - 1) * $limit; 			//first item to display on this page
else
    $start                              =               0;


$dataquery				=		"SELECT * from staff WHERE $field LIKE '%$find%' order by id asc LIMIT $start, $limit";
$dataresquery                           =		mysql_query($dataquery) or die(mysql_error());
$datanor				=		mysql_num_rows($dataresquery);

if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;
              
$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a onclick=\"pageactivity($prev)\"> Previous</a>";
		else
			$pagination.= "<span class=\"disabled\"> Previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a onclick=\"pageactivity($counter)\" >$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a onclick=\"pageactivity($counter)\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a onclick=\"pageactivity($lpm1)\" >$lpm1</a>";
				$pagination.= "<a onclick=\"pageactivity($lastpage)\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a onclick=\"pageactivity(l)\">1</a>";
				$pagination.= "<a onclick=\"pageactivity(2)\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a onclick=\"pageactivity($counter)\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a onclick=\"pageactivity($lpm1)\">$lpm1</a>";
				$pagination.= "<a onclick=\"pageactivity($lastpage)\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a onclick=\"pageactivity(l)\">1</a>";
				$pagination.= "<a onclick=\"pageactivity(2)\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a onclick=\"pageactivity($counter)\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a onclick=\"pageactivity($next)\">Next </a>";
		else
			$pagination.= "<span class=\"disabled\">Next </span>";
		$pagination.= "</div>\n";		
	}

?>
<?php
 

 
 //$dataresquery = mysql_query("SELECT * FROM staff WHERE $field LIKE'%$find%' "); 


 while($datarow=mysql_fetch_object($dataresquery))
	  
	  
	  
	  {
	  $datarow->id;
	  $datarow->Active;
	  $datarow->FName;
	  $datarow->Contact;
	  $datarow->email;
	  $datarow->Department;
	  $datarow->Photo;
	  

	
	  ?>
      <tr>
        <td align="center" valign="middle" class="lline">&nbsp;</td>
        <td height="65" align="center" valign="middle" class="txts" ><?php echo $datarow->id;?></td>
        <td align="center" valign="middle"><input type="checkbox" name="checkbox" value="checkbox"/></td>
        <td align="center" valign="middle"><a href="Edit.php?id=<?php echo "$datarow->id";?>" target="_self"><img src="images/Edit.png" width="25" height="25" border="0"></a></td>
        <td align="center" valign="middle" class="txts"><?php echo $datarow->Active;?></td>
        <td align="center" valign="middle" class="txts"><?php echo $datarow->FName;?></td>
        <td align="center" valign="middle" class="txts"><?php echo $datarow->Contact;?></td>
        <td align="center" valign="middle" class="txts"><?php echo $datarow->email;?></td>
        <td align="center" valign="middle" class="txts"><?php echo $datarow->Department;?></td>
		<?php if($datarow->Photo=='')
		{?>
        <td align="center" valign="middle" class="txts"><img src='images/bphoto.jpg' width="50" height="50"/></td>
			<?php } 
		
		else if($datarow->Photo!='')
		
		{ ?>
		 <td align="center" valign="middle" class="txts"><img src="photo/<?php echo $datarow->Photo; ?>" width="50" height="50"/></td>
		  <?php  } ?>
        <td width="0%" align="right" valign="top" class="rline">&nbsp;</td>
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
      <tr>
        <td align="left" valign="top" class="botline"><img src="images/leftbot.jpg" width="17" height="19"></td>
        <td colspan="9" align="center" valign="middle" class="botline">&nbsp;</td>
        <td align="right" valign="top" class="botline"><img src="images/botright.jpg" width="17" height="19"></td>
      </tr>
    </table></td>
  </tr>
 
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>

<?php echo $pagination; ?>

 <?php

 
 $anymatches=mysql_num_rows($dataresquery); 
 
 if ($anymatches == 0) 
 { 
 
 echo "Sorry, but we can not find an entry to match your query<br><br>"; 
 
 } 
 

 echo "<b>Searched For:</b> " .$find; 
 

  mysql_close();
 
 ?> 
 
 
 
<?php include 'include/footer.php';
?>
