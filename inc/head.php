<?php
include "./models/Post.php";
include "./models/Img.php";
include "./models/User.php";
$post = new Post;
$img = new Img;
$user = new User;

if (isset($_GET['pid'])){
 $get=filter_var_array($_GET, FILTER_SANITIZE_STRING);
 $post_id = $_GET['pid'];

  //echo $post_id;

$postInfo = $post->getPostUserInfo($post_id);
//print_r($postInfo);
$post_featured_image = trim($postInfo->post_featured_img);
$image_num = $img-> getPostImages($post_featured_image);
//echo $image_num;
$post_featured_image_pieces =$img->getAllImages($post_featured_image);}?>

<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA Compatible" content="ie-edge">
    <link rel="stylesheet" type="text/css" href="./sass/vendors/font-awesome/fontawesome-free/css/all.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Nunito:wght@200;300;400&family=Oxygen:wght@300;400&family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/post.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<!--  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhaQL9_N9e8XiytXnyIJ_45VnTRWsbFSc&callback=initMap&libraries=&v=weekly"
      async></script> --> 
    <title>The Post App</title>
</head>
