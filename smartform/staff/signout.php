<?php

session_start();
include("include/data.php");



if($_SESSION['uname']=='' && $_SESSION['pword']=='' && !isset($_SESSION['uname']) && !isset($_SESSION['pword']))
{
include_once "../index.php";
}
else
{
unset($_SESSION['uname']);
unset($_SESSION['pword']);
include_once "../index.php";

}

?>