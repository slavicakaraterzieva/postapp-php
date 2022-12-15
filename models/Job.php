<?php
class Job{
private $db;

public function __construct(){
$this ->db = new Database();
}//end of construct

 public function insertJobAd($user_id, $post_title, $post_cat_id, $post_content, $content_price, $post_featured_img, $full_address, $post_status, $post_type){
    $this->db->query('INSERT INTO posts(user_id, post_title, post_cat_id, post_content, content_price, post_featured_img, full_address, post_status, post_type ) 
    VALUES(:user_id, :post_title, :post_cat_id, :post_content, :content_price, :post_featured_img, :full_address, :post_status, :post_type)');
//bind params
$this->db->bind(':user_id',$user_id);
$this->db->bind(':post_title',$post_title);
$this->db->bind(':post_cat_id',$post_cat_id);
$this->db->bind(':post_content',$post_content);
$this->db->bind(':content_price',$content_price);
$this->db->bind(':post_featured_img',$post_featured_img);
$this->db->bind(':full_address',$full_address);
$this->db->bind(':post_status',$post_status);
$this->db->bind(':post_type',$post_type);

if($this->db->execute()){
return true;
  }
else{
return false;
  }
 }
//end of function

public function addJob($posts_id, $job_name, $sub_name, $occupation_name, $salary, $hourly_rate, $contact_email, $contact_phone, $application_link, $employment_type){
  $this->db->query('INSERT INTO jobs(posts_id, job_category, job_subcategory, occupation, salary, hourly_rate, contact_email, contact_number, application_link, employment_type) 
  VALUES(:posts_id, :job_category, :job_subcategory, :occupation, :salary, :hourly_rate, :contact_email, :contact_number, :application_link, :employment_type)');
//bind params
$this->db->bind(':posts_id',$posts_id);
$this->db->bind(':job_category',$job_name);
$this->db->bind(':job_subcategory',$sub_name);
$this->db->bind(':occupation',$occupation_name);
$this->db->bind(':salary',$salary);
$this->db->bind(':hourly_rate',$hourly_rate);
$this->db->bind(':contact_email',$contact_email);
$this->db->bind(':contact_number',$contact_phone);
$this->db->bind(':application_link',$application_link);
$this->db->bind(':employment_type',$employment_type);

if($this->db->execute()){
return true;
}
else{
return false;
}
}
//end of function

 public function getAllJobs($parent_id){
  $this->db->query('SELECT * FROM job_category WHERE parent_id=:parent_id');
  //bind params
$this->db->bind(':parent_id',$parent_id);
$row = $this->db->resultSet();
return $row;
} 
//end of function


public function getJobCategory($parent_sub_id){
  $this->db->query('SELECT * FROM specific_sub WHERE parent_sub_id=:parent_sub_id');
  //bind params
$this->db->bind(':parent_sub_id',$parent_sub_id);
$row = $this->db->resultSet();
return $row;
} 
//end of function

public function getJobOccupation($occupation_id){
  $this->db->query('SELECT * FROM occupation WHERE parent_occupation_id=:parent_occupation_id');
  //bind params
  $this->db->bind(':parent_occupation_id',$occupation_id);
$row = $this->db->resultSet();
return $row;
}
//end of function

public function getJobTitle($job_name){
  $this->db->query('SELECT job_category_title FROM job_category WHERE job_category_id =:job_category_id');
  //bind params
  $this->db->bind(':job_category_id',$job_name);
$row = $this->db->single();
return $row;
}
//end of function

public function getSubTitle($sub_name){
  $this->db->query('SELECT specific_sub_title FROM specific_sub WHERE specific_sub_id=:specific_sub_id');
  //bind params
  $this->db->bind(':specific_sub_id',$sub_name);
$row = $this->db->single();
return $row;
} 
//end of function

public function getOccupationTitle($occupation_name){
  $this->db->query('SELECT occupation_title FROM occupation WHERE occupation_id=:occupation_id');
  //bind params
  $this->db->bind(':occupation_id',$occupation_name);
$row = $this->db->single();
return $row;
}
//end of function

//this is for the post page
public function getJobByPostId($post_id){
  $this->db->query('SELECT * FROM jobs WHERE posts_id=:posts_id');
  //bind params
$this->db->bind(':posts_id',$post_id);
$row = $this->db->single();
return $row;
}
//end of function 

}
//end of class Job
//INSERT INTO `specific_sub` (`parent_sub_id`) SELECT parent_id FROM job_category;
?>