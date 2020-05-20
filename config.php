<?php
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'fd');//dn name
define('DB_USER_TBL', 'users');

define('LIN_CLIENT_ID', '81ib0swb1wd0pi');
define('LIN_CLIENT_SECRET', 'xCiYWdYx7aO3m6GE');
define('LIN_REDIRECT_URL', 'http://localhost/rem/index.php');
define('LIN_SCOPE', 'r_liteprofile r_emailaddress');
if(!session_id()){
    session_start();
}
require_once 'linkedin-oauth-client-php/http.php';
require_once 'linkedin-oauth-client-php/oauth_client.php';
?>