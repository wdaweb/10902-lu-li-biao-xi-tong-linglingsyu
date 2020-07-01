<?php

include_once "../base.php";

$db = new DB("resume_user");

$chk = $db->find(['acc' => $_GET["acc"],'pw'=> $_GET["pw"] ]);

if(empty($chk)){
  echo 0;
}else{
  echo 1;
  $_SESSION['userid'] = $chk['id'];
  $_SESSION['username'] = $chk['acc'];
}







?>