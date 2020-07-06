<?php
include_once "../base.php";
  unset($_SESSION['username']);
  unset($_SESSION['userid']);
  to("../login.html");
?>