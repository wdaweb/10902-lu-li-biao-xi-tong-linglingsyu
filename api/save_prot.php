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

if($_POST['id']){
  $data = $db->find($_POST['id']);
}else{
  $data = [] ;
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
  if($_POST['id']){
    unlink("../".$row['pic']);
  }
  $filename = date("Yndhis"). $extension;
  move_uploaded_file( $_FILES[$key[0]]['tmp_name'], "../img/" . $filename);
  $data['pic'] =  'img/' . $filename;
}

$data['name'] = $_POST['name'];
$data['userid'] = $_SESSION['userid'];
$data['legend'] = $_POST['legend'];
$data['link'] = $_POST['link'];
$data['type'] = $_POST['type'];


// $data = [
//   'name' => $_POST['name'] ,
//   'pic' => 'img/' . $filename,
//   'userid'=>$_SESSION['userid'],
//   'legend'=>$_POST['legend'],
//   'link'=>$_POST['link'],
//   'type'=>$_POST['type']
// ];

$res = $db->save($data);
if($res>=1){
  echo 1;
}else{
  echo 0;
}
?>