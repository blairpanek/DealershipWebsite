<?php
  session_start();
  if(isset($_SESSION['username'])){
    //This session already exists, should already contain data
      echo "User name:", $_SESSION['id'], "<br />"
  }
  else{
    //New PHP Session / Should only be run once / rarely / login / logout

    header('Location: login.php');
    $_SESSION['id'] = 444;
  }?>
