<?php ?>
<section class="post-content">
   <div class="post-content__sub">
    
     <h2 class="heading-3"><?php if(isset($postInfo->post_title)){echo $postInfo->post_title;}?></h2>
   </div>

   <div class="contact-agent-box">
   <?php if($cat_name =="realestate"):?>
     <h4 class="contact-agent-box-heading">Open for inspection</h4>
     <p class="contact-agent-box-desc">No inspections are currently scheduled,
       to arrange an apointment<a class="link" href="#">Contact the Agent</a></p>   
       <?php endif ?>
       
   <?php if(isset($theJob)):?>
  <h4 class="heading-3">Monthly Salary: <?php if(isset($theJob->salary)){echo $theJob->salary;} ?></h4>
  <?php endif ?>

  <?php if(isset($theJob)):?>
  <h4 class="body_desc">Per Hour: <?php if(isset($theJob->hourly_rate)){echo $theJob->hourly_rate;} ?></h4>
  <?php endif ?>

  <?php if(isset($theJob)):?>
  <h4 class="body_desc">Contact Number: <?php if(isset($theJob->contact_number)){echo $theJob->contact_number;} ?></h4>
  <?php endif ?>

  <?php if(isset($theJob)):?>
  <h4 class="body_desc"><a href="<?php if(isset($theJob->application_link)){echo $theJob->application_link;} ?>">Apply Here</a></h4>
  <?php endif ?>
   </div>
  

   <div class="post-body__content-desc" style="padding-left:1rem;">

   <?php if(isset($theJob)):?>
  <p class="body_desc"><?php if(isset($theJob->job_category)){echo $theJob->job_category;} ?></p>
  <?php endif ?>

  <?php if(isset($theJob)):?>
  <p class="body_desc"><?php if(isset($theJob->job_subcategory)){echo $theJob->job_subcategory;} ?></p>
  <?php endif ?>

  <?php if(isset($theJob)):?>
  <p class="body_desc"><?php if(isset($theJob->occupation)){echo $theJob->occupation;} ?></p>
  <?php endif ?>

     <p class="body_desc" >
       <?php if(isset($postInfo->post_content)){echo $postInfo->post_content;} ?>
      </p>
   </div>


   <div class="post-body__content-map">

      <input id="address" type="textbox" value="<?php if(isset($postInfo->full_address)){echo $postInfo->full_address;}?>" style="width:100%; border:none; background-color:transparent; font-size:1.8rem;">
     <div id="map" class="postmap-map">Map should be here</div>
        <div id="floating-panel" >

<!--  <input type="button" value="Encode" onclick="codeAddress()"> -->
         </div>
   </div>
 
 </section>
 <!--end of content-->