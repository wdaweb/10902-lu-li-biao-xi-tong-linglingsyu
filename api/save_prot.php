<?php
include_once "../base.php";
// if(!empty($_FILES)){
//   print_r($_FILES);
//   // print_r($_POST);
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

$data = [] ;
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
  if($_POST['id']){
    $remove = $db->find($_POST['id']);
    unlink("../".$remove['pic']);
  }
  $filename = date("Yndhis"). $extension;
  move_uploaded_file( $_FILES[$key[0]]['tmp_name'], "../img/" . $filename);
}

$data = [
  'id' => $_POST['id'],
  'name' => $_POST['name'] ,
  'pic' => 'img/' . $filename,
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