<?php
include_once "../base.php";

$db = new DB("resume_picture");
$row = $db->find($_POST['p_id']);
unlink("../".$row["pic"]);
$res = $db->del($id);
if($res>=1){
  echo 1;
}else{
  echo 0;
}

?>