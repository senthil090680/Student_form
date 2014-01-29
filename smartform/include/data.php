<?php	$con	=	mysql_connect("localhost","root","");

	if(!$con) {
		print "Connection failed";
	}

	mysql_select_db("smartform",$con);
	?>