<?php 
define('SITE_URL','http://localhost/se');
$con = mysql_connect("localhost","root","") or die(mysql_error().' DB NOT CONNECTED, CHECK DATABASE SETTINGS');
mysql_select_db('smartform',$con) or die(mysql_error().' CHECK DATABASE SETTINGS'); ?>