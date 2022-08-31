<?php 

require "../config/config.php";
require "../lib/Database.php";
require "../models/User.php";
require "../helpers/session_helper.php";
require "../helpers/url_redirect.php";


//echo "welcome to register";

function registration(){

//create instance of User
$user = new User();

$user_name = filter_var(($_POST['username']),FILTER_SANITIZE_STRING);
$user_email = filter_var(($_POST['email']),FILTER_SANITIZE_EMAIL);
$user_password = filter_var($_POST['password']);
$data =[
'user_name'=>$user_name,
'user_email'=>$user_email,
'user_password'=>$user_password,
'user_role'=>'subscriber'
];

$data['user_password'] = password_hash($data['user_password'], PASSWORD_DEFAULT); 

//print_r($data);
 
$user_registration = $user->register($data);

if($user_registration !==""){
msg('register_success','You are registered, please log in');
redirect('login.php'); 
}


if($user_registration == ""){
msgdanger('register_fail','You are not registered, please try again');

redirect('registration.php');}
//if i change this i get empty rows in database
 
}//end of registration

registration();
?>



