<?php ?>
<section class="content-info">

   <div class="general_features">
     <h3 class="cool-heading">General Features</h3>
   <ul class="ul-general-setings">
     <li>Property Type <?php if(isset($realestate->post_property_type)){echo $realestate->post_property_type;} ?></li>
     <li>Floors <?php if(isset($realestate->floor)){echo $realestate->floor;} ?></li>
   </ul>
   </div>

   <div class="indoor_features">
     <h3 class="cool-heading">Indoor Features</h3>
   <ul class="ul-general-setings">
     <li>Bedroom <?php if(isset($realestate->bedroom)){echo $realestate->bedroom;} ?></li>
     <li>Bathroom <?php if(isset($realestate->bath)){echo $realestate->bath;} ?></li>
     <li>Toalet <?php if(isset($realestate->wc)){echo $realestate->wc;} ?></li>
     <li>Kitchen <?php if(isset($realestate->kitchen)){echo $realestate->kitchen;} ?></li>
     <li>Living Room <?php if(isset($realestate->lounge)){echo $realestate->lounge;} ?></li>
   </ul>
   </div>

   <div class="outdoor_features">
     <h3 class="cool-heading">Outdoor Features</h3>
   <ul class="ul-general-setings">
     <li>Outdoor Features <?php if(isset($realestate->outdoor_features)){echo $realestate->outdoor_features;} ?></li>
     <li>Garages <?php if(isset($realestate->parking)){echo $realestate->parking;} ?></li> 
   </ul>
   </div>

   <div class="floorplan_features">
     <h3 class="cool-heading">Floorplan & interactive tours</h3>
   <ul class="ul-general-setings">
     <li><a href="#">See Floor Plan</a></li>
     
   </ul>
   </div>
   
 </section>
 <!--end of content info-->