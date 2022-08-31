<?php
require "../config/config.php";
require "../lib/Database.php";
require "../models/User.php";
require "../helpers/session_helper.php";
require "../helpers/url_redirect.php";
require "../models/Post.php";
require "../models/Comments.php";
$comment = new Comments;
$parent_comment_id = '0';
$post_id = $_POST['post_id'];
$result = $comment->getComments($parent_comment_id, $post_id);
//print_r($result);

$output = "";
$postid=$_POST['post_id'];
foreach($result as $row){
  if($row->comment_body==="comment has been deleted by admin"){
    $comment_body="<del class='text-danger'>comment has been deleted by admin</del>";
  }
  else{$comment_body=$row->comment_body;}

    $output .= ' <li class="comment-body">
    <div class="comment-body_avatar">
      <img src ="./img/img-button.png" alt ="avatar"/>
    </div> 
    <!--end of image avatar-->
    <div class="comment-body_content">
      <header>
       <a href = "#" class ="comment-body_link" id="a"><b>'.$row->sender_name.'</b></a>
        <span class ="comment-body_date"><i class ="fa fa-circle"></i>posted: '.$row->created_at.'</span>
      </header>
      <p>'.$comment_body.'</p>
        <button type ="button" onclick="clickReply(this.id)" class ="comment-body__reply-button reply" 
        id = "'.$row->comment_id.'">Reply</button>
    </div> 
    <!-- end of comment-body content-->';
    $output .=getReplies($row->comment_id);
}
echo $output;

function getReplies($parent_comment_id='0'){
  $post_id = $_POST['post_id'];
  $comments= new Comments;
  $reply_query = $comments->getComments($parent_comment_id,$post_id);
  $output = "";
  $countReplies = $comments->getCommentCount($parent_comment_id);
  if($countReplies>0){

    foreach($reply_query as $row){
      $theName = $comments->getCommentName($row->parent_comment_id);
      if($theName){
        $theName=$theName->sender_name;
      }
      if($row->comment_body==="comment has been deleted by admin"){
        $comment_body="<del class='text-danger'>comment has been deleted by admin</del>";
      }
      else{$comment_body=$row->comment_body;}
      $output .='<!--ul for replies-->
    <ul class="replies">
     <li class ="comment-body">
         <div class="comment-body_avatar">
           <img src ="./img/img-button.png" alt ="avatar"/>
         </div> 
         <!--end of image avatar-->
          <div class="comment-body_content">
           <header><a href = "" class ="comment-body_link" value="'.$row->sender_name.'"><b>'.$row->sender_name.'</b><i class ="fa fa-reply  fa-flip-horizontal"></i><span class ="replies_to"><b>'.$theName.'</b></span></a>
             <span class ="comment-body_date"><i class ="fa fa-circle"></i>posted: '.$row->created_at.'</span>
           </header>
           <p>'.$comment_body.'</p>
             <button type ="button" onclick="clickReply(this.id)" class ="comment-body__reply-button reply" 
             id = "'.$row->comment_id.'">Reply</button>
         </div>
          </li>';
        $output .=getReplies($row->comment_id);
    }
    
  }
return $output.'</ul></li>';
}

?>

       