<?php

include_once "../base.php";
$db = new DB("profile");
// if(!empty($_POST)){
//   print_r($_POST);
// }else{
//   echo 0;
// }
if(!empty($_POST)){
  echo $db->save($_POST);
}


?>