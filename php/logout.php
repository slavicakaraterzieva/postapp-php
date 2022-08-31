<?php
require "../config/config.php";
require "../lib/Database.php";
//require "../models/User.php";
//require "../helpers/session_helper.php"; 
require "../helpers/url_redirect.php";
error_reporting(E_ALL);
ini_set('display_errors', 1); 
?>
<?php
session_start();

function logout(){
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    unset($_SESSION['user_role']);
    session_destroy();
  /*   redirect('index.php');  */
}

logout();
?>