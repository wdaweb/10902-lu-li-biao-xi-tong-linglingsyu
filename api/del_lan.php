<?php 

include_once "../base.php";

$db = new DB("resume_skilllan");
$res = $db->del($_POST['id']);
if($res == 1){
  echo 1;
}else{
  echo 0;
}

?>