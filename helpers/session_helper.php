<?php
session_start();
 
 function msg($name = '', $message = '', $class = 'alert alert-success'){
if(!empty($name)){
  if(!empty($message) && empty($_SESSION[$name])){
    if(!empty($_SESSION[$name])){
    unset($_SESSION[$name]);
      }

if(!empty($_SESSION[$name.'_class'])){
unset($_SESSION[$name.'_class']);
}

$_SESSION[$name] = $message;
$_SESSION[$name.'_class'] = $class;
    } 

elseif(empty($message) && !empty($_SESSION[$name])){
$class = !empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class'] : '';
//echo'<div class="text-center'.$class.'" id="msg-flash" style="font-size:1rem; padding-left:1rem">'.$_SESSION[$name].'<div>';
echo  "<div class='text-center. $class'  id='msg-flash' style='font-size:1.2rem;'>".$_SESSION[$name]."<div>";
unset($_SESSION[$name]);
unset($_SESSION[$name.'_class']);
}
  }
}  //end of function msg success

function msgdanger($name = '', $message = '', $class = 'alert alert-danger'){
if(!empty($name)){
  if(!empty($message) && empty($_SESSION[$name])){
    if(!empty($_SESSION[$name])){
          unset($_SESSION[$name]);
      }

if(!empty($_SESSION[$name.'_class'])){
unset($_SESSION[$name.'_class']);
}

$_SESSION[$name] = $message;
$_SESSION[$name.'_class'] = $class;
    }

 elseif(empty($message) && !empty($_SESSION[$name])){
$class = !empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class'] : '';
//echo'<div class="text-center'.$class.'" id="msg-flash" style="font-size:1rem; padding-left:1rem">'.$_SESSION[$name].'<div>';
echo  "<div class='text-center. $class'  id='msg-flash' style='font-size:2rem; display:block '>".$_SESSION[$name]."<div>";
unset($_SESSION[$name]);
unset($_SESSION[$name.'_class']);
}
  }
}//end of function msg danger 


// flash success
function flashSuccess($name = '', $message = '', $class = 'display-msg_header'){
  if(!empty($name)){
    if(!empty($message) && empty($_SESSION[$name])){
      if(!empty($_SESSION[$name])){
      unset($_SESSION[$name]);
        }
  
  if(!empty($_SESSION[$name.'_class'])){
  unset($_SESSION[$name.'_class']);
  }
  
  $_SESSION[$name] = $message;
  $_SESSION[$name.'_class'] = $class;
      } 
  
  elseif(empty($message) && !empty($_SESSION[$name])){
  $class = !empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class'] : '';
  echo  "<div class='text-center. $class'  id='msg-flash' style='display:block;
  font-size:1rem; 
  padding-left:1rem; 
  position: absolute;
  width: 100%;
  height: 15rem;
  left: 0;
  top: 0;
  text-align: center;
  text-shadow: 0.5rem 0.5rem #3c664d;
  font-size: 3rem;
  color: #25d366;
  padding: 5rem 2rem;
  z-index: 5;
  background-image: linear-gradient(#25d366, #008b2e, #3c664d);'>".$_SESSION[$name]."<div>";
  unset($_SESSION[$name]);
  unset($_SESSION[$name.'_class']);
  }
    }
  }//end of flash success

  //flashDanger
  function flashDanger($name = '', $message = '', $class = 'display-msg_error'){
    if(!empty($name)){
      if(!empty($message) && empty($_SESSION[$name])){
        if(!empty($_SESSION[$name])){
              unset($_SESSION[$name]);
          }
    
    if(!empty($_SESSION[$name.'_class'])){
    unset($_SESSION[$name.'_class']);
    }
    
    $_SESSION[$name] = $message;
    $_SESSION[$name.'_class'] = $class;
        }
    
     elseif(empty($message) && !empty($_SESSION[$name])){
    $class = !empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class'] : '';
    echo  "<div class='text-center. $class '  id='msg-flash' style='font-size:2rem; 
    padding-left:1rem; 
    display:block; 
    position: absolute;
    width: 100%;
    height: 15rem;
    left: 0;
    top: 0;
    text-align: center;
    text-shadow: 0.5rem 0.5rem #922C40;
    font-size: 3rem;
    color: #DC9750;
    padding: 5rem 2rem;
    z-index: 5;
    background-image: linear-gradient(#DC9750, #922C40, #4F0000);;'>".$_SESSION[$name]."<div>";
    unset($_SESSION[$name]);
    unset($_SESSION[$name.'_class']);
    }
      }
    }//end of flashdanger

/*   function msg($name = "", $message = "", $class = "alert alert-success")
{
if (!empty($name) && !empty($message) && !empty($class)) {
            if (!empty($_SESSION[$name])) {
                unset($_SESSION[$name]);
            }
            if (!empty($_SESSION[$name."_class"])) {
                unset($_SESSION[$name."_class"]);
            }
            $_SESSION[$name] = $message;
            $_SESSION[$name."_class"] = $class;
        }//if ends
elseif (empty($message) && empty($class) && !empty($name) && !empty($_SESSION[$name])) {
//echo  "<div class='text-center. $class' id='msg-flash'>".($_SESSION[$name."_class"])."</div>" ;

echo  "<div class='text-center. $class'  id='msg-flash' style='font-size:2rem; padding-left:1rem'>".$_SESSION[$name]."<div>";
            unset($_SESSION[$name]);
            unset($_SESSION[$name."_class"]);
        }
} */  
?>

