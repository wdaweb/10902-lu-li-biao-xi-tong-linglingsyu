<?php

include_once "../base.php";
  $key = array_keys($_FILES);
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
  $data = [
    'name' => $filename ,
    'path' => 'img/' . $filename,
    'userid'=>$_SESSION['userid'],
  ];
  $db = new DB("resume_picture");
  $res = $db->save($data);
  if($res>=1){
    echo 1;
  }else{
    echo 0;
  }
}

?>