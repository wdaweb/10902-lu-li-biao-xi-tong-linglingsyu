<?php
include_once "../base.php";

$db = new DB("resume_work");

$_POST['sh'] = 1 ;
$res= $db->save($_POST);
if($res>= 1){
  echo 1;
}else{
  echo 0;
}

?>