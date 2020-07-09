<?php
include_once "../base.php";
// if(!empty($_FILES)){
//   print_r($_FILES);
//   print_r($_POST);
// }else{
//   echo 0;
// }

// if(!empty($_POST)){
//   print_r($_POST);
// }else{
//   echo 0;
// }
$db = new DB("resume_prot");

$key = array_keys($_FILES);
if(!empty($_POST['id'])){
  $sourse = $db->find($_POST['id']);
  if(!empty($sourse['pic'])){
    unlink("../".$sourse['pic']);
  }
}
if (!empty($_FILES[$key[0]]["tmp_name"])) {
  switch ($_FILES[$key[0]]["type"]) {
    case "image/jpeg":
      $extension = ".jpg";
      break;
    case "image/png";
      $extension = ".png";
      break;
    case "image/gif";
      $extension = ".gif";
      break;
  }
  $filename = date("Yndhis"). $extension;
  move_uploaded_file( $_FILES[$key[0]]['tmp_name'], "../img/" . $filename);
  $data['pic'] = "'img/' . $filename";
}

$data = [
  'id' => $_POST['id'],
  'name' => $_POST['name'] ,
  // 'pic' => 'img/' . $filename,
  'userid'=>$_SESSION['userid'],
  'legend'=>$_POST['legend'],
  'link'=>$_POST['link'],
  'type'=>$_POST['type']
];

$res = $db->save($data);
if($res>=1){
  echo 1;
}else{
  echo 0;
}
?>