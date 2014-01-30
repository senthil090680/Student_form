<?php
define('SITE_URL','http://localhost/se');
function redirect($url)
{
	if(!(headers_sent()))
	{
		header('Location:'.$url);
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'window.location.href="'.$url.'";';
		echo '</script>';
	}
}

?>