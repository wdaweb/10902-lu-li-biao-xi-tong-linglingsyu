<?php

include_once "../base.php";
$db = new DB("resume_link");
// if(!empty($_POST)){
//   print_r($_POST);
// }else{
//   echo 0;
// }
$count = 0 ;
for ($i = 0; $i<(count($_POST["name"])); $i++){
  if(!empty($_POST["name"][$i])){
    $id = empty($_POST["id"][$i]) ?  "" : $_POST["id"][$i]  ;
    $db->save(["id"=>$id,"userid"=>$_POST['userid'],"name"=>$_POST["name"][$i],"link"=>$_POST["link"][$i]]);
    $count++;
  }
}
if($count != 0 ){
  echo $count;
}else{
  echo 0;
}



?>