<?php ?>
<section class="post-content">
   <div class="post-content__sub">
     <h2 class="heading-2"><?php echo $postInfo->full_address;?></h2>
     <h3 class="heading-3"><?php echo $postInfo->post_title;?></h3>
   </div>

   <div class="contact-agent-box">
     <h4 class="contact-agent-box-heading">Open for inspection</h4>
     <p class="contact-agent-box-desc">No inspections are currently scheduled,
       to arrange an apointment<a class="link" href="#">Contact the Agent</a></p> 
       
   </div>

   <div class="post-body__content-desc">
     <p class="body_desc">
       <?php echo $postInfo->post_content; ?>
      </p>
   </div>

   <div class="post-body__content-map">
    
      <input id="address" type="textbox" value="<?php echo $postInfo->full_address;?>" style="width: 100%; border:none; background-color:transparent;">
     <div id="map" class="postmap-map">Map should be here</div>
        <div id="floating-panel" >

<!--            <input type="button" value="Encode" onclick="codeAddress()"> -->
         </div>
   </div>

 </section>
 <!--end of content-->