<?php
class stripeCustomer{
private $db;

public function __construct(){
$this ->db = new Database();
}//end of construct

//addStripeCustomer
public function addStripeCustomer($user_id, $user_name, $data){
    $this->db->query('INSERT INTO stripe_customers (`first_name`,`email`,`amount`,`user_id`) 
    VALUES (:first_name,:email,:amount,:user_id)');
   $this->db->bind(':user_id', $user_id); 
   $this->db->bind(':first_name', $user_name);
   $this->db->bind(':email', $data['email']);
   $this->db->bind(':amount', $data['amount']);
   
   $result =$this->db->execute();
   return $result; 
}
//end ofaddStripeCustomer

//findCustomerById fix this to count all items of the user and get the one with the product id 
function findCustomerById($user_id){
  $this->db->query("SELECT * FROM `stripe_customers` WHERE `user_id`='".$user_id."' ORDER BY `created_at` DESC LIMIT 1");
  $this->db->bind(':user_id', $user_id);
  $result =$this->db->resultSet();
   return $result;
}
//end of findCustomerById- my favorite so far

//retriveStripeData 
function retriveStripeData(){
  $this->db->query('SELECT * FROM `stripe_customers`');
  $result =$this->db->resultSet();
   return $result;
}
//end of retriveStripeData

//update posts table post_status from unpaid to paid
function updatePostsTable($post_status, $user_id, $post_id){
   $this->db->query('UPDATE posts SET post_status=:post_status WHERE user_id=:user_id AND post_id=:post_id');
   $this->db->bind(':post_status', $post_status);
   $this->db->bind(':user_id', $user_id); 
   $this->db->bind(':post_id', $post_id);
   if($this->db->execute()){
      return true;
   }else{return false;}
}
//end of update posts

//updateUserId  no need  but good to know
/*  function updateUserId(){
    $this->db->query('UPDATE `stripe_customers` INNER JOIN `users` 
    ON (`stripe_customers`.`first_name`=`users`.`user_name`) 
    SET `stripe_customers`.`user_id`=`users`.`user_id` WHERE `stripe_customers`.`user_id`=0 ');
     $result =$this->db->single();
     return $result;
} */ 
//end of updateUserId

 }//end of Customer
 //UPDATE `stripe_customers` INNER JOIN `users` ON (`stripe_customers`.`first_name=`users`.`user_name`) SET `stripe_customers`.`user_id`=`users`.`user_id`
 //SELECT * FROM `posts` `user_id`='".$user_id."'  ORDER BY `created_at` DESC LIMIT 1
?>
