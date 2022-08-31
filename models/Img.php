<?php
class Img{
    private $db;

public function __construct(){
$this ->db = new Database();}//end of construct

public function uploadImg($allFiles){
 
    $allImages = "";
    foreach($_FILES['file']['name'] as $key=>$value){
        $filename = $_FILES['file']['name'][$key];
        $allImages = $allImages.",".$filename;
        $upload_dir = ROOT_PATH."/img/posts/";
        $upload_file = $upload_dir.$_FILES['file']['name'][$key];
        move_uploaded_file($_FILES['file']['tmp_name'][$key],$upload_file);
    }

    $allImages = substr($allImages, 1);
    return $allImages;
}//end of uploadImg function works

//function getPostImages
public function getPostImages($post_featured_image){
    if($post_featured_image==NULL || $post_featured_image==""){
        $image_num = 0;
        return $image_num;
    }
else{
    $post_featured_image_pieces = array_filter(explode(",",$post_featured_image));
    $image_num = count($post_featured_image_pieces);
    return $image_num;
}
}//end of getPostImages

//function getAllImages
public function getAllImages($post_featured_image){
    $post_featured_image_pieces = array_filter(explode(",",$post_featured_image));
    return $post_featured_image_pieces;
}
//end of getAllImages

}//end of class Img

?>