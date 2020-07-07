<?php
include_once "../base.php";
$db = new DB("resume_picture");

$sh = $_POST['sh'];
$count = 0;
foreach($_POST['id'] as $key => $val){
  $row = $db->find($val);
  $row["sh"] =  ($sh==$row['id']) ? 1 : 0;
  $db->save($row);
  $count++;
}

if($count != 0 ){
  echo $count;
}else{
  echo 0;
}



?>