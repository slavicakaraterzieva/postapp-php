<?php
require "../config/config.php";
require "../lib/Database.php";
require "../models/User.php";
require "../helpers/session_helper.php";
require "../helpers/url_redirect.php";

function update_img(){
if(isset($_POST['img_submit'])){
        $user_id= filter_var($_SESSION['user_id'],FILTER_SANITIZE_NUMBER_INT);
         $filename = $_FILES['file']['name'];
        //echo "the size is: ".$filesize = $_FILES['file']['size'];
        $fileTempName = $_FILES['file']['tmp_name'];
        $user = new User;
        $theUser =$user->getUserById($user_id);
        //print_r($theUser);
        $valid_ext =array("png", "jpg", "jpeg");
        $uploadPath = ROOT_PATH."img/users/".$filename;
        $file_extension = pathinfo($uploadPath, PATHINFO_EXTENSION);
         $file_extension = strtolower($file_extension);
 if($filesize<1000000){
            if(in_array($file_extension,$valid_ext)){
                $didupload = move_uploaded_file($fileTempName,$uploadPath);
                if($didupload){
                     //echo "img file uploaded successfully"; 
                    $data = array('user_id'=>$user_id, 'user_image'=>$filename);
                    $updateUserImg = $user->updateUserImg($data);
                  
                      if($updateUserImg){
                        redirect('index.php');
                        flashSuccess('success', 'You have updated the profile photo');
                        
                    } 
                else{
                    redirect('index.php');
                    flashDanger('fail', 'Profile photo was not updated');
                    }//end of photo not updated
                } 
               
            }
            else{redirect('index.php');
                flashDanger('fail', 'Image file has unsuported extension, suported extensions are jpg, jpeg, png');
                  }//end of unsuported extension
        }
        
 }
 else{ redirect('index.php');
    flashDanger('fail', 'Profile photo was to big');
   }//end of photo to big
}

update_img();
?>
  