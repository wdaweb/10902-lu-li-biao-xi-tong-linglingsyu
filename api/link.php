<?php

include_once "../base.php";
$db = new DB("resume_link");

if(!empty($_POST)){
  foreach($_POST as $pos){
    print_r($pos);
  }
}else{
  echo 0;
}




?>