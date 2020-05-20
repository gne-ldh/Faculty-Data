<?php
//include 'logincheck.php';
if(!session_id()){
    session_start();
}

if((!empty($_SESSION['oauth_status']))&&(!empty($_SESSION['userData'])))
{

unset($_SESSION['oauth_status']);
unset($_SESSION['userData']);
session_destroy();
header("location: index.php");
exit;
}
?>


<?php
// Initialize the session
//session_start();


if((!empty($_SESSION['id']))&&(!empty($_SESSION['username'])))
{
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: index.php");
exit;
}
?>
