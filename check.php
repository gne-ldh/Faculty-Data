<?php
if(!session_id()){
    session_start();
}

if((!empty($_SESSION['oauth_status']))||(!empty($_SESSION['userData'])))
{
header("location: apply.php");
}
else
{
	header("location: index.php");
}

?>