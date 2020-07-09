<?php
include_once "../base.php";
$db = new DB("resume_prot");

// if(!empty($_POST)){
//   print_r($_POST);
// }else{
//   echo 0;
// }


$count = 0;
foreach($_POST['id'] as $val){
  $row = $db->find($val);
  $row["sh"] = !empty($_POST['sh']) && in_array($val,$_POST['sh']) ? 1 : 0;
  $db->save($row);
  $count++;
}

if($count != 0 ){
  echo $count;
}else{
  echo 0;
}



?>