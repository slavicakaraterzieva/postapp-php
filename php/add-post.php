<?php
require "../config/config.php";
require "../lib/Database.php";
require "../models/User.php";
require "../models/Realestate.php";
require "../models/Img.php";
require "../helpers/session_helper.php";
require "../helpers/url_redirect.php";

if(isset($_POST['submit_realestate_post'])){
    $user = new User;
    $real = new Realestate;
    $record = new Realestate;
    $img = new Img; //function works
    echo $user_id = $_SESSION['user_id'];
    echo $post_title = $_POST['post_title'];
    echo $post_cat_id = $_POST['post_cat_id'];
    echo $content_price = $_POST['content_price'];
    echo $post_content = $_POST['post_content'];
    echo $property_type = $_POST['property_type'];
    echo $post_featured_img = $img->uploadImg($_FILES['file']['name']);
    echo $full_address = $_POST['full_address'];
    echo $post_type = $_POST['post_type'];
    echo $setPrice = $_POST["post_type"];
    echo $post_status = "unpaid";

    $allImages = "";
    foreach($_FILES['file']['name'] as $key=>$value){
       $filename = $_FILES['file']['name'][$key];
       $allImages = $allImages.",".$filename;
       $upload_dir = ROOT_PATH."/img/posts/";
       $upload_file = $upload_dir.$_FILES['file']['name'][$key];
       move_uploaded_file($_FILES['file']['tmp_name'][$key],$upload_file);
    }//foreach

    $addRealEstatePost= $real->insertRealEstateAd($user_id, $post_title, $post_cat_id, $post_content, $content_price, $post_featured_img, $full_address, $post_status, $post_type);
    $addPaymentRecord= $record->insertPaymentRecords();
    $addPaymentPrice= $record->postCalculatedPrice();
    // $addPaymentPrice= $record->setPaymentByType($setPrice);
    if($addRealEstatePost){
        flashSuccess('success', 'Estate Post Created');
        redirect('index');
    }
    else{flashDanger('fail', 'Estate Post Not Created');
        redirect('index');
    }; 
}//isset
?>