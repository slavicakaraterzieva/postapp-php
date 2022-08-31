<?php 
require "../config/config.php";
require "../lib/Database.php";
require "../models/User.php";
require "../helpers/session_helper.php";
require "../helpers/url_redirect.php";

$user = new User();
//echo "Ajax call";
//$user_email = $_POST['email_check'];
$user_email = filter_var(($_POST['email_check']),FILTER_SANITIZE_EMAIL);
//echo "My email is ".$user_email;

$result = $user ->check_my_email($user_email);
if ($result){
//echo "email already exists! >".$result->user_email."< choose another one";
echo json_encode(array('response'=>'email_success','message'=>$result->user_email));
}
else{
//echo "email available";
echo json_encode(array('response'=>'email_fail','message'=>"email available"));
}
?>
