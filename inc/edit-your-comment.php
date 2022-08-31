<?php 
require_once('./models/Comments.php');
$parent_comment_id = '1';
$post_id = $_POST['post_id'];
$comment = new Comments;
$result = $comment->getComments($parent_comment_id, $post_id);
?>
<?php echo $postInfo->post_content; ?>
<section class="comments">
 <h2 class="cool-heading">Edit Your Comment</h2>
<div id ="comment_notification"></div>
<div class="container">

<form action ="" method ="POST" id = "post_comment" class="form-group">

<div class="form-group">
 <label class="" for="comment_name"><?php echo $result=$comment->sender_name ?></label>
 <input type="text" name="comment_name" id="comment_name" class="form-control" required>
</div>

<div class="form-group">
 <label class="" for="comment_email">Enter yor email</label>
 <input type="email" name="comment_email" id="comment_email" class="form-control" required>
</div>

<div class="form-group">
 <label class="" for="comment_body">Enter yor comment</label>
 <textarea type="text" name="comment_body" id="comment_body" class="form-control" rows="10" required></textarea>
</div>

<div class="form-group">
 
 <input type="text" name="comment_id" id="comment_id" class="hidden" value="0">
 <input type="text" name="post_id" id="post_id" class="post-control" value ="<?php echo trim($postInfo->post_id); ?>">
 <input type="email" name="owner_email" id="owner_email" class="form-control hidden" value ="<?php echo trim($postInfo->user_email); ?>">
 <input type="text" name="post_owner_id" id="post_owner_id" class="form-control hidden" value ="<?php echo trim($postInfo->user_id); ?>">
 <button type="submit" name="submit" id ="submit" class="btn btn-success">Submit</button>
</div>
</form>

<span id="comment_message"></span>
<div id="display_comment"></div>
</div>
 </section>
 <!--end of coments-->