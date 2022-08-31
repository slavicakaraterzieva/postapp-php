<?php 

require "../config/config.php";
require "../lib/Database.php";
require "../models/User.php";
require "../helpers/session_helper.php"; 
require "../helpers/url_redirect.php";
error_reporting(E_ALL);
ini_set('display_errors', 1); 

//echo "Ajax call from login-user";

function login(){
$user = new User();

//$email="slavica@gmail.com";
//$password= "1234";

$email= filter_var(($_POST['login_email']), FILTER_SANITIZE_EMAIL);
$password= ($_POST['login_password']);
 
$exists = $user->findUserByEmail($email);
//verifyemail
if($exists){
  $db_email=$exists->user_email;
  $db_password=$exists->user_password;
  $db_role=$exists->user_role;
  $db_name=$exists->user_name;
 //print_r($exists);
 //print_r($db_password);

  if($db_role==="admin"){
   //password veryfy
  if(password_verify($password, $db_password)){
    $login = $user->verifyUser($email, $db_password);

       if($login){
       $logedInUser=createUserSession($login);
       echo json_encode(['msgcode' => 'success', 'msg'=>'redirect admin']);
       }
       else{echo json_encode(['msgcodepass' => 'no_pass', 'msgpass' => 'enter corect password admin']);}//not working

   }//end of password verify it works
  else{echo json_encode(['msgcodepass' => 'no_pass', 'msgpass' => 'enter corect password admin']);}//else of password verify works

}//end of admin
else{
//password veryfy
   if(password_verify($password, $db_password)){
    $login = $user->verifyUser($email, $db_password);

       if($login){
       $logedInUser=createUserSession($login);
       echo json_encode(['msgcode' => 'success', 'msg'=>'../../flexapp/index.html']);
       }
       else{echo json_encode(['msgcodepass' => 'no_pass', 'msgpass' => 'enter corect password']);}//not working

   }//end of password verify it works
  else{echo json_encode(['msgcode' => 'no_email', 'msg' => 'enter corect password']);}
//else of password verify works

 }//else of admin

} //end of if exists 
else{
echo json_encode(['msgcode' => 'no_email', 'msg' => 'enter corect email']);

    //echo json_encode(['msgcodepass' => 'no_pass', 'msgpass' => 'enter corect password']);
}//else for exists

//end of findUserByEmail

}//end of login

login();

function createUserSession($user){
$_SESSION['user_email']=$user->user_email;
$_SESSION['user_role']=$user->user_role;
$_SESSION['user_name']=$user->user_name;
}

//json encoding for password
/* $verify = $user->verifyUser($email,$password);

 if($verify){
    echo json_encode(['msgcodepass' => 'is_pass', 'msgpass' => 'password is'. $password]);
} 
else {
    echo json_encode(['msgcodepass' => 'no_pass', 'msgpass' => 'enter corect password']);
} */  //end of encoding for password


//json encoding for email
/*   $exists = $user->findUserByEmail($email);
//verifyemail
 if($exists){
//findUser by email encoding for email
 echo json_encode(['msgcode' => 'is_email', 'msg' => 'email is ' .$email]);
} 
else{
echo json_encode(['msgcode' => 'no_email', 'msg' => 'enter corect email']);
}  */ //json encoding for email works, dont tuch it!

?>