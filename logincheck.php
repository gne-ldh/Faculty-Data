<?php
  //  session_start();


if(isset($_SESSION["loggedin"]) &&($_SESSION["loggedin"] === true)&&($_SESSION['oauth_status'] !=== 'verified'))
{
	header('location:index.php');
	exit;
}
?>