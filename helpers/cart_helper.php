<?php
//echo "we are in the cart helper, ";
//unset($_SESSION['shopping_cart']);
$posts_ids = array();

if(filter_input(INPUT_POST,'add_to_cart')){
   if(isset($_SESSION['shopping_cart'])){
   //echo "The cart is set with session";
   $count = count($_SESSION['shopping_cart']);
   //echo $count;
   $posts_ids = array_column($_SESSION['shopping_cart'],'id');
   //print_r($posts_ids);
   if(!in_array(filter_input(INPUT_GET,'id'),$posts_ids)){
       $_SESSION['shopping_cart'][$count]=array(
           'id' => filter_input(INPUT_GET,'id'),
           'user_id' => filter_input(INPUT_POST,'user_id'),
           'title' => filter_input(INPUT_POST,'title'),
           'price' => filter_input(INPUT_POST,'price'),
           'quantity' => filter_input(INPUT_POST,'quantity')
       );
       redirect('payment');
   }//end of in array
   else{
       for($i=0; $i<count($posts_ids); $i++){
           if($posts_ids[$i]==filter_input(INPUT_GET,'id')){
               $_SESSION['shopping_cart'][$i]['quantity']=filter_input(INPUT_POST,'quantity');
               redirect('payment');
           }//end of if
       }//end of for
   }//end of in aray else
     }
     else{ 
        //echo "The cart session is not set";
          $_SESSION['shopping_cart'][0]=array(
            'id' => filter_input(INPUT_GET,'id'),
            'user_id' => filter_input(INPUT_POST,'user_id'),
            'title' => filter_input(INPUT_POST,'title'),
            'price' => filter_input(INPUT_POST,'price'),
            'quantity' => filter_input(INPUT_POST,'quantity')
        );
        redirect('payment');
      }//end of else session first started prints the main array 0
 }//end of if 
 
 if(filter_input(INPUT_GET,'action')=='delete'){
    foreach($_SESSION['shopping_cart'] as $key=>$post_product){
        if($post_product['id']==filter_input(INPUT_GET,'id')){
            unset($_SESSION['shopping_cart'][$key]);
        }
    }
    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
    redirect('cart');
 }
 //print_r($_SESSION
 /*     pre_r($_SESSION);
     function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>'; 
};  */          
?>
