<?php ?>
<section class="post-autor">

   <div class="post-autor">

<div class="post-autor-details">

<div class="post-autor_ring">
<img class="post-autor_img" src="../../flexapp/img/users/<?php echo $postInfo->user_image;?>" alt="agent">
</div>

</div>

<div class="post-autor-box">
<a href="#"><h4 class="autor-name"><?php if(isset($postInfo->user_first_name)){echo $postInfo->user_first_name;}?> <?php if(isset($postInfo->user_last_name)){echo $postInfo->user_last_name;}?></h4></a>


<p class="autor-works"> works at <?php if(isset($postInfo->user_work)){echo $postInfo->user_work;}?></p>
</div>

   </div>
 </section>
 <!--end of autor section-->
 <section class="post-image">
  <?php if($userOwner=true):?>
   <!-- <img class="post-image__logo" src="img/universal.jpg" alt="logo"> -->
  <a class="post-image__edit" href="#"><i class="fa fa-edit"></i></a>
  <?php endif; ?>
 </section> 
 <!--end of logo image-->