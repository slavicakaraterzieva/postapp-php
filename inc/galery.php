<?php ?> 
<body>

 <!-- onload = "initialize(),codeAddress()" this is for the map put it in the body tag -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="./sass/vendors/jquery3.5.0.js"></script>
    <script src="./js/menuClick.js"></script>
    <script src="./js/scroll.js"></script>
    <!-- <script src="./js/response.js"></script>  -->
    <script src="./js/post_map.js"></script> 
    <script src="./js/post_comment.js"></script> 

<div class="post-container">
  <section class="post-galery">

    <div class="sliding-images">
   
     <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
       <!-- Indicators -->
       <ol class="carousel-indicators">
         <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
         <li data-target="#myCarousel" data-slide-to="1"></li>
         <li data-target="#myCarousel" data-slide-to="2"></li>
       </ol>
     
       <!-- Wrapper for slides -->
       <div class="carousel-inner">
        
       <?php
           if($image_num == 0){
            echo '<div class="item active">
                   <img src="./img/posts/kisela_voda.jpg" alt="default">
                 </div>';}
            //end of first if it works
             if($image_num == 1){
              echo '<div class="item active">
                     <img src="../../flexapp/img/posts/'.$post_featured_image_pieces[0].'" alt="first slide">
                   </div>';  
            }//it works
           else{
             if($image_num > 1){
            for($i=1; $i<$image_num; $i++){
              if($i == 1){
                echo '<div class="item active">
                     <img src="../../flexapp/img/posts/'.$post_featured_image_pieces[0].'" alt="second slide">
                   </div>';
              }
              
              echo '<div class="item">
                     <img src="../../flexapp/img/posts/'.$post_featured_image_pieces[$i].'" alt="third slide">
                   </div>';
                   
              } //end of for
            }//end of if before for
          }//end of else
        
         ?>
        
           <div class="galery-description">
             <div class="galery-description-heading">
               Address: <?php if(isset($postInfo->full_address)){echo $postInfo->full_address;}?>
             </div>
            <?php if($cat_name =="realestate"):?>
             <div class="galery-description--icons">
               <i class="fa fa-bed"><span><?php if(isset($realestate->post_property_type)){echo $realestate->post_property_type;} ?></span></i>
             </div>
  
             <div class="galery-description--icons">
              <i class="fa fa-bath"><span><?php if(isset($realestate->bath)){echo $realestate->bath;} ?></span></i>
            </div>
  
            <div class="galery-description--icons">
              <i class="fa fa-car"><span><?php if(isset($realestate->parking)){echo $realestate->parking;} ?></span></i>
            </div>
          <?php endif?>
           </div>

         </div>
       </div>
     
       <!-- Left and right controls -->
       <a class="left carousel-control" href="#myCarousel" data-slide="prev">
         <span class="glyphicon glyphicon-chevron-left"></span>
         <span class="sr-only">Previous</span>
       </a>
       <a class="right carousel-control" href="#myCarousel" data-slide="next">
         <span class="glyphicon glyphicon-chevron-right"></span>
         <span class="sr-only">Next</span>
       </a>
     </div>
      <!--end of carousel-->
    </div>

 </section>
 <!-- end of galery -->