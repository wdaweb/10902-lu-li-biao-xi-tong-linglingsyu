
<?php
include_once "../base.php";
$db = new DB('resume_study');
$row = $db->find($_GET['id']);

if(!empty($row)){
  echo json_encode($row);
}else{
  echo 0;
}


?>