<?php ?>
<section class="contact-agent">

<div class="contact-agent-company-name">
  <h3><?php echo $postInfo->user_name?></h3>
</div>

<div class="contact-agent-enquire-about"><h4><?php echo $postInfo->user_email?></h4></div>

<div class="contact-agent-retail-profile"> 
<div class="contact-agent-retail-profile-phone"><h4><?php echo $postInfo->user_phone; ?></h4></div>
<div class="contact-agent-retail-profile-link"><a href="#"><h4>view profile link</h4></a></div>
</div>
 <form class="contact-agent-form" action="" method="POST">

   <div class="contact-agent-form-name hidden">
    
     <input type="email" class="form-control input-style"
      name="link" id="link" value="" required readonly>

   </div>

   <div class="contact-agent-form-name">

    <label for="to" class="label-style">To:</label>

    <input type="email" class="form-control input-style"
     name="to_email" id="to_email" value="" required readonly>

  </div>

  <div class="contact-agent-form-email">

    <label for="email" class="label-style">Email:</label>

    <input type="email" class="form-control input-style"
     name="from_user" id="from_user" value="" required readonly>

  </div>

  <div class="contact-agent-form-phone">

    <label for="user_mobile" class="label-style">Your Phone:</label>

    <input type="text" class="form-control input-style"
     name="user_mobile" id="user_mobile" value="" required readonly>

  </div>


<div class="form-group-contact-agent-message_select">
    <label for="email_reason" class="label-style">State Inquiry</label>

   <select id="email_reason" name="email_reason" class="form-control select-style">
     <option value="inquire price">Inquire Price</option>
     <option value="place offer">Place Offer</option>
     <option value="inspection sedule">Schedule Inspection</option>
     <option value="bye">Bye</option>
     <option value="sell">Sell</option>
     <option value="rent">Rent</option>
   </select>

  <div class="contact-agent-form-message">
    <label for="message_body" class="label-style">Your message here:</label> 
    <textarea name="message_body" id="message_body" class="textarea" cols="60" rows="3" required></textarea>
  </div>

   <button type="submit" name="contact-agent" id="submit" class="btn btn-primary form-btn contact-agent">Submit</button>
</div>

 </form>

</section>
<!--end of contact-agent-form-->