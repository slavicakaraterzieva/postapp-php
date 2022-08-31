<?php

//page redirect
 function logInRedirect($page){
 header('Location:'. BASE_URL .$page); 
}
function redirect($page){
header('Location:'. BASE_FLEX .$page);
}
?>