<?php
include_once "../base.php";

$id = $_POST['p_id'];
$db = new DB("resume_prot");
$row = $db->find($id);
unlink("../".$row["pic"]);
$res = $db->del($id);
if($res>=1){
  echo 1;
}else{
  echo 0;
}

?>