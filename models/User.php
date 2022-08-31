<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class User{
private $db;

public function __construct(){
$this ->db = new Database();

  }//end of construct

//register user
public function register($data){
$this->db->query('INSERT INTO users(user_id,user_name, user_email, user_password, user_role) VALUES(:user_name, :user_email, :user_password, :user_role)');
//bind params
$this->db->bind(':user_name',$data['user_name']);
$this->db->bind(':user_email',$data['user_email']);
$this->db->bind(':user_password',$data['user_password']);
$this->db->bind(':user_role',$data['user_role']);
$this->db->bind(':user_id',$data['user_id']);
if($this->db->execute()){
return true;
  }
else{
return false;
  }

}//end of register//

//login
//check if email exists in db
public function check_my_email($user_email){
$this->db->query('SELECT user_email FROM users WHERE user_email = "'.$_POST['email_check'].'" ');
$this->db->bind(':user_email','user_email');
$row = $this->db->single();
return $row;
}//end of check email

//find user by email
public function findUserByEmail($email){
//$this->db->query('SELECT user_email FROM users WHERE user_email = "'.$_POST['login_email'].'" ');
$this->db->query("SELECT * FROM users WHERE user_email ='".$email."'");
$this->db->bind(':user_email','user_email');
$row = $this->db->single();
return $row;

}//find user by email working well, dont tuch it!

//verifyUser
public function verifyUser($db_email, $db_password){
$this->db->query(' SELECT * FROM users  WHERE user_email = :user_email AND user_password = :user_password ');
$this->db->bind(':user_email', $db_email);
$this->db->bind(':user_password', $db_password);
$row=$this->db->single();
if($this->db->rowCount()>0){
return $row;
}
else{return false;}
 }//end of verifyUser

 //get user by id
 public function getUserById($user_id){
  $this->db->query(' SELECT user_id, user_name, user_first_name, user_last_name, user_email, user_phone, user_ocupation, user_image FROM users WHERE user_id = :user_id ');
  $this->db->bind(':user_id', $user_id);
  $row=$this->db->single();
  return $row;
   }//end of get user by id

   //update img
 public function updateUserImg($data){
  $this->db->query(' UPDATE  users SET user_image = :user_image WHERE user_id = :user_id ');
  $this->db->bind(':user_id', $data['user_id']);
  $this->db->bind(':user_image', $data['user_image']);
  if($this->db->execute()){
    return true;
      }
    else{
    return false;
      }
   }//end of update img

  }//end of User


?>