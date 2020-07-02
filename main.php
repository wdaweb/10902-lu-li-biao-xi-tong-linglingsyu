<?php include_once "base.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="#" type="image/x-icon">
  <title>我的電子履歷表</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&family=Roboto&display=swap" rel="stylesheet">
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>

<body>

  <div class="container">
    <div class="row">
      <div id="side" class="col-3 d-flex flex-column justify-content-start align-items-center">
        <h1 class="mb-3 mt-5">歡迎，<?= $_SESSION['username'] ?></h1>
        <div class="btn-group-vertical ">
          <button type="button" class="btn" onclick="location.href='?do=profile'">個人資料管理</button>
          <button type="button" class="btn" onclick="location.href='?do=picture'">個人圖片管理</button>
          <button type="button" class="btn" onclick="location.href='?do=link'">個人連結管理</button>
          <button type="button" class="btn" onclick="location.href='?do=study'">個人學歷管理</button>
          <button type="button" class="btn" onclick="location.href='?do=work'">工作經歷管理</button>
          <div class="btn-group dropright">
            <button id="btnGroupVerticalDrop2" type="button" class="btn dropdown-toggle" data-toggle="dropdown">工作技能管理</button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="?do=front">前端技能</a>
              <a class="dropdown-item" href="?do=backend">後端技能</a>
              <a class="dropdown-item" href="?do=software">應用軟體</a>
              <a class="dropdown-item" href="?do=lan">語言能力</a>
              <a class="dropdown-item" href="?do=Cert">專業證照</a>
            </div>
          </div>
          <button type="button" class="btn">履歷表管理</button>
        </div>
        <button class="btn mt-5" onclick="location.replace('api/logout.php')">登出</button>
      </div>

      <div id="becontent" class="col-9 px-5">
        <div class="container">
          <div class="row justify-content-center align-items-center mt-5">
            <?php
            $userid = $_SESSION['userid'];
            $do = (!empty($_GET['do'])) ? $_GET['do'] : 'profile';
            $file = 'backend/' . $do . ".php";
            if (file_exists($file)) {
              include $file;
            } else {
              include "backend/profile.php";
            }

            ?>
          </div>
        </div>
      </div>
    </div>
  </div>



  <script>


  </script>

</body>


</html>