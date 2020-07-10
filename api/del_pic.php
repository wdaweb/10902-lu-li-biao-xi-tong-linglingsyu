<?php
include_once "../base.php";

$db = new DB("resume_picture");
$row = $db->find($_POST['p_id']);
unlink("../".$row["path"]);
$res = $db->del($_POST['p_id']);
if($res>=1){
  echo 1;
}else{
  echo 0;
}

?>