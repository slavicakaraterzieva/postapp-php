<?php ?>
<section class="post-autor">

   <div class="post-autor">

<div class="post-autor-details">

<div class="post-autor_ring">
<img class="post-autor_img" src="./img/users/<?php echo $postInfo->user_image;?>" alt="agent">
</div>

</div>

<div class="post-autor-box">
<a href="#"><h4 class="autor-name"><?php echo $postInfo->user_first_name;?> <?php echo $postInfo->user_last_name;?></h4></a>

<p class="autor-sold">sold 2 houses</p>
<p class="autor-works"> works at <?php echo $postInfo->user_work;?></p>
</div>

   </div>
 </section>
 <!--end of autor section-->
 <section class="post-image">
   <img class="post-image__logo" src="img/universal.jpg" alt="logo">
  <a class="post-image__edit" href="#"><i class="fa fa-edit"></i></a>
 </section>
 <!--end of logo image-->