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
          <button type="button" class="btn" onclick="location.href='?do=condition'">求職條件管理</button>
          <button type="button" class="btn" onclick="location.href='?do=picture'">個人圖片管理</button>
          <button type="button" class="btn" onclick="location.href='?do=link'">個人連結管理</button>
          <button type="button" class="btn" onclick="location.href='?do=study'">個人學歷管理</button>
          <button type="button" class="btn" onclick="location.href='?do=work'">工作經歷管理</button>
          <div class="btn-group dropright">
            <button id="btnGroupVerticalDrop2" type="button" class="btn dropdown-toggle" data-toggle="dropdown">工作技能管理</button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="?do=skill_front">前端技能</a>
              <a class="dropdown-item" href="?do=skill_backend">後端技能</a>
              <a class="dropdown-item" href="?do=skill_software">應用軟體</a>
              <a class="dropdown-item" href="?do=skill_lan">語言能力</a>
              <a class="dropdown-item" href="?do=skill_cert">專業證照</a>
            </div>
          </div>
          <button type="button" class="btn" onclick="location.href='?do=self'">自傳管理</button>
          <button type="button" class="btn" onclick="location.href='?do=prot'">作品集管理</button>
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
    function save_study(e) {
      let study = document.getElementById("study");
      let study2 = document.getElementById("study2");
      let data = new Object;
      if (e == undefined) {
      data['userid'] = <?= $_SESSION['userid'] ?>;
      data['edu'] = study.edu.value;
      data['status'] = study.status.value;
      data['school'] = study.school.value;
      data['dept'] = study.dept.value;
      data['s_year'] = study.s_year.value;
      data['s_month'] = study.s_month.value;
      data['g_year'] = study.g_year.value;
      data['g_month'] = study.g_month.value;
    }else{
      data['id'] = e;
      data['userid'] = <?= $_SESSION['userid'] ?>;
      data['edu'] = study2.edu.value;
      data['status'] = study2.status.value;
      data['school'] = study2.school.value;
      data['dept'] = study2.dept.value;
      data['s_year'] = study2.s_year.value;
      data['s_month'] = study2.s_month.value;
      data['g_year'] = study2.g_year.value;
      data['g_month'] = study2.g_month.value;
    }
      $.post("api/save_study.php",data,function(res){
        if(res >= 1){
          alert("更新成功!");
          location.reload();
        }else{
          alert("GG更新失敗!!");
        }
      })
    }

    function save_work(e) {
      let work = document.getElementById("work");
      let work2 = document.getElementById("work2");
      let inwork = (document.getElementById("inwork").checked)?1:0;
      let inwork2 = (document.getElementById("inwork2").checked)?1:0;
      let data = new Object;
      if (e == undefined) {
      data['userid'] = <?= $_SESSION['userid'] ?>;
      data['com'] = work.com.value;
      data['pos'] = work.pos.value;
      data['job'] = work.job.value;
      data['s_year'] = work.s_year.value;
      data['s_month'] = work.s_month.value;
      data['e_year'] = work.e_year.value;
      data['e_month'] = work.e_month.value;
      data['inwork'] = document.getElementById("inwork").checked;
    }else{
      data['id'] = e;
      data['userid'] = <?= $_SESSION['userid'] ?>;
      data['com'] = work2.com.value;
      data['pos'] = work2.pos.value;
      data['job'] = work2.job.value;
      data['s_year'] = work2.s_year.value;
      data['s_month'] = work2.s_month.value;
      data['e_year'] = work2.e_year.value;
      data['e_month'] = work2.e_month.value;
      data['inwork'] = document.getElementById("inwork2").checked;
    }
      $.post("api/save_work.php",data,function(res){
        if(res >= 1){
          alert("更新成功!");
          location.reload();
        }else{
          alert("GG更新失敗!!");
        }
      })
    }

    function save_front(e) {
      let front = document.getElementById("front");
      let front2 = document.getElementById("front2");
      let data = new Object;
      if (e == undefined) {
      data['userid'] = <?= $_SESSION['userid'] ?>;
      data['name'] = front.name.value;
      data['level'] = front.level.value;
    }else{
      data['id'] = e;
      data['userid'] = <?= $_SESSION['userid'] ?>;
      data['name'] = front2.name.value;
      data['level'] = front2.level.value;
    }
      $.post("api/save_front.php",data,function(res){
        if(res >= 1){
          alert("更新成功!");
          location.reload();
        }else{
          alert("GG更新失敗!!");
        }
      })
    }

    function save_backend(e) {
      let backend = document.getElementById("backend");
      let backend2 = document.getElementById("backend2");
      let data = new Object;
      if (e == undefined) {
      data['userid'] = <?= $_SESSION['userid'] ?>;
      data['name'] = backend.name.value;
      data['level'] = backend.level.value;
    }else{
      data['id'] = e;
      data['userid'] = <?= $_SESSION['userid'] ?>;
      data['name'] = backend2.name.value;
      data['level'] = backend2.level.value;
    }
      $.post("api/save_backend.php",data,function(res){
        if(res >= 1){
          alert("更新成功!");
          location.reload();
        }else{
          alert("GG更新失敗!!");
        }
      })
    }

    
    function save_software(e) {
      let software = document.getElementById("software");
      let software2 = document.getElementById("software2");
      let data = new Object;
      if (e == undefined) {
      data['userid'] = <?= $_SESSION['userid'] ?>;
      data['name'] = software.name.value;
      data['level'] = software.level.value;
    }else{
      data['id'] = e;
      data['userid'] = <?= $_SESSION['userid'] ?>;
      data['name'] = software2.name.value;
      data['level'] = software2.level.value;
    }
      $.post("api/save_software.php",data,function(res){
        if(res >= 1){
          alert("更新成功!");
          location.reload();
        }else{
          alert("GG更新失敗!!");
        }
      })
    }

    function save_lan(e) {
      let lan = document.getElementById("lan");
      let lan2 = document.getElementById("lan2");
      let data = new Object;
      if (e == undefined) {
      data['userid'] = <?= $_SESSION['userid'] ?>;
      data['name'] = lan.name.value;
      data['level'] = lan.level.value;
    }else{
      data['id'] = e;
      data['userid'] = <?= $_SESSION['userid'] ?>;
      data['name'] = lan2.name.value;
      data['level'] = lan2.level.value;
    }
      $.post("api/save_lan.php",data,function(res){
        if(res >= 1){
          alert("更新成功!");
          location.reload();
        }else{
          alert("GG更新失敗!!");
        }
      })
    }

    function save_cert(e) {
      let cert = document.getElementById("cert");
      let cert2 = document.getElementById("cert2");
      let data = new Object;
      if (e == undefined) {
      data['userid'] = <?= $_SESSION['userid'] ?>;
      data['name'] = cert.name.value;
      data['level'] = cert.level.value;
    }else{
      data['id'] = e;
      data['userid'] = <?= $_SESSION['userid'] ?>;
      data['name'] = cert2.name.value;
      data['level'] = cert2.level.value;
    }
      $.post("api/save_cert.php",data,function(res){
        if(res >= 1){
          alert("更新成功!");
          location.reload();
        }else{
          alert("GG更新失敗!!");
        }
      })
    }


    function save_self(e) {
      let self = document.getElementById("self");
      let self2 = document.getElementById("self2");
      let data = new Object;
      if (e == undefined) {
      data['userid'] = <?= $_SESSION['userid'] ?>;
      data['name'] = self.name.value;
      data['text'] = self.content.value;
    }else{
      data['id'] = e;
      data['userid'] = <?= $_SESSION['userid'] ?>;
      data['name'] = self2.name.value;
      data['text'] = self2.content.value;
    }
      $.post("api/save_self.php",data,function(res){
        if(res >= 1){
          alert("更新成功!");
          location.reload();
        }else{
          alert("GG更新失敗!!");
        }
      })
    }
  </script>

</body>


</html>