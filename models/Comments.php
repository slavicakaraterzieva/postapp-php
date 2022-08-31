<?php
class Comments{
    private $db;

public function __construct(){
$this ->db = new Database();}//end of construct

Public function addComment($data){
    $this->db->query('INSERT INTO comments (`parent_comment_id`,`comment_body`,`sender_name`,`user_email`,`owner_email`,`post_id`,`post_owner_id`) 
    VALUES (:parent_comment_id,:comment_body,:sender_name,:user_email,:owner_email,:post_id,:post_owner_id)');
   $this->db->bind(':parent_comment_id', $data['parent_comment_id']); 
   $this->db->bind(':comment_body', $data['comment_body']);
   $this->db->bind('sender_name', $data['sender_name']);
   $this->db->bind(':user_email', $data['user_email']);
   $this->db->bind(':owner_email', $data['owner_email']);
   $this->db->bind(':post_id', $data['post_id']);
   $this->db->bind(':post_owner_id', $data['post_owner_id']);
   $result =$this->db->execute();
   return $result; 
}

public function getComments($parent_comment_id, $post_id){
   //$this->db->query('SELECT * FROM `comments` WHERE `parent_comment_id`=`parent_comment_id` AND `post_id`=`post_id` ORDER BY `comment_id` DESC');
   $this->db->query('SELECT * FROM `comments` WHERE `parent_comment_id`= :parent_comment_id AND `post_id`=:post_id ORDER BY `comment_id` DESC');
   $this->db->bind(':parent_comment_id', $parent_comment_id); 
   $this->db->bind(':post_id', $post_id);
   $row = $this->db->resultSet();
   return $row;
   //print_r($row);
}

public function getCommentCount($parent_comment_id){
    $this->db->query('SELECT * FROM `comments` WHERE `parent_comment_id`=:parent_comment_id');
    $this->db->bind(':parent_comment_id', $parent_comment_id); 
    $row = $this->db->execute();
    if($this->db->rowCount()>0){
        return $this->db->rowCount();
    }
    else{return false;}
}

public function getCommentName($comment_id){
    $this->db->query('SELECT * FROM `comments` WHERE `comment_id`=:parent_comment_id');
    $this->db->bind(':parent_comment_id', $comment_id); 
    $row = $this->db->single();
       return $row;
}

/* public function editComment($comment_id, $edit_comment){
    //$comment_body="comment has been deleted by admin";
    $this->db->query('UPDATE `comments` SET `comment_body`=:comment_body WHERE `comment_id`=:comment_id');
    $this->db->bind(':comment_id', $comment_id); 
    $this->db->bind(':comment_body', $edit_comment); 
    $result =$this->db->execute();
    return $result;
} */

}//end of class Comments

?>