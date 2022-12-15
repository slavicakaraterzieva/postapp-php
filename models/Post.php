<?php
class Post{
private $db;

public function __construct(){
$this ->db = new Database();
}//end of construct

//function getPosts
public function getPosts($user_id){
$this->db->query('SELECT * FROM posts WHERE user_id = :user_id');
$this->db->bind(':user_id',$user_id);
$results = $this->db->resultSet();
return $results;
}//end of getPostss

//function getAllPosts
public function getAllPosts($user_id){
$this->db->query('SELECT DISTINCT * FROM posts WHERE user_id = :user_id ORDER BY post_id DESC');
$this->db->bind(':user_id', $user_id);
$result =$this->db->resultSet();
return $result;
}//end of getAllPosts

//function getPostByPostId
public function getPostByPostId($post_id){
    $this->db->query('SELECT * FROM posts WHERE post_id = :post_id');
    $this->db->bind(':post_id', $post_id);
    $result =$this->db->single();
    return $result;
}//end of getPostByPostId

//function getPostData
public function getPostDate($created_at){
    $date = new DateTime($created_at);
    $date = $date->format('d-m-Y');
    return $date;
}//end of getPostData


//function getUnpaidPosts
public function getUnpaidPosts($user_id,$post_status,$post_type){
    $this->db->query('SELECT * FROM posts WHERE user_id = :user_id AND post_status = :post_status AND post_type <>:post_type
     ORDER BY post_id DESC');
    $this->db->bind(':user_id', $user_id);
    $this->db->bind(':post_status', $post_status);
    $this->db->bind(':post_type', $post_type);
    $result =$this->db->resultSet();
    return $result;  
}
//end of getUnpaidPosts

//function getPostPrice
public function getPostPrice($post_id){
    $this->db->query('SELECT * FROM payment_records WHERE post_id = :post_id');
    $this->db->bind(':post_id', $post_id);
    $result =$this->db->single();
    return $result;  
}
//end of getPostPrice

//function getPostByUserPayment
public function getPostByUserPayment($post_id){
    //$this->db->query('SELECT DISTINCT * FROM payment_records WHERE payment_records.post_id = :post_id');
    $this->db->query('SELECT * FROM `posts`JOIN `payment_records` ON `posts`.`post_id` = `payment_records`.`post_id` WHERE `posts`.`post_id` = :post_id');
    $this->db->bind(':post_id', $post_id);
    $row =$this->db->single();
    return $row;  
}
//end of getPostByUserPayment

// function getPostUserInfo
public function getPostUserInfo($post_id){
    $this->db->query('SELECT * FROM `posts` JOIN `users` ON `posts`.`user_id` = `users`.`user_id` WHERE `posts`.`post_id` = :post_id ORDER BY post_id DESC');
    $this->db->bind(':post_id', $post_id);
    $result =$this->db->single();
    return $result;}
  /*   $this->db->query("SELECT DISTINCT posts.post_id AS postId, users.user_id AS user_id 
    FROM posts INNER JOIN users ON posts.user_id = users.user_id
    WHERE posts.post_id = :post_id ORDER BY postId DESC");
    $this->db->bind(':post_id', $post_id);
    $result =$this->db->single();
    return $result;  */

//end of getPostUserInfo

//postData
/* function postData($user_id){
    $this->db->query("SELECT `post_id`,`post_title` FROM `posts` WHERE `user_id`='".$user_id."' ORDER BY `created_at` DESC ");
    $this->db->bind(':user_id', $user_id); 
    $result =$this->db->resultSet();
     return $result;} */
//end of postData

 }//end of Post
  //SELECT `post_type` FROM `posts` WHERE `post_type`="free 0"; 
?>
