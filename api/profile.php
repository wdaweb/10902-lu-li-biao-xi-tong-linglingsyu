<?php

include_once "../base.php";
$db = new DB("resume_profile");
// if(!empty($_POST)){
//   print_r($_POST);
// }else{
//   echo 0;
// }
// error_log(print_r($_POST,true));
if(!empty($_POST)){
  echo $db->save($_POST);
}


?>