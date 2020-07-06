<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="#" type="image/x-icon">
  <title>履歷表後台管理</title>
</head>

<body>


  <?php
  include_once "base.php";
  $userid = $_SESSION['userid'];
  $db = new DB("resume_link");
  $row = $db->find($userid);

  if (empty($row)) {
    $row['facebook'] = "";
    $row['instagram'] = "";
    $row['github'] = "";
    $row['portfolio'] = "";
  }

  ?>

  <div id="backend_link" class="w-75 ">
    <h3 class="text-center">履歷表管理後台 - 個人連結</h3>
    <form id="link" class="mt-4">
      <input type="hidden" name="id" id="id" value="<?= $row['id'] ?>">
      <input type="hidden" name="userid" id="userid" value="<?= $userid ?>">
      <div class="form-groupk my-2">
        <input type="text" name="name[]" id="name" value="facebook" style="width:18%;" readonly>
        <input type="text" id="facebook" name="link[]" class="d-inline-block form-control form-control-sm " style="width:60%" value="<?= $row['facebook'] ?>">
      </div>

      <div class="form-group my-2">
        <input type="text" name="name[]" value="instagram" style="width:18%;" readonly>
        <input type="text" id="ig" name="link[]" class="d-inline-block form-control form-control-sm" style="width:60%" value="<?= $row['instagram'] ?>">
      </div>

      <div class="form-group my-2">
        <input type="text" name="name[]" value="Github" style="width:18%;" readonly>
        <input type="text" id="github" name="link[]" class="d-inline-block form-control form-control-sm" style="width:60%" value="<?= $row['github'] ?>">
      </div>

      <div class="form-group my-2">
        <input type="text" name="name[]" value="Portfolio" style="width:18%;" readonly>
        <input type="text" id="portfolio" name="link[]" class="d-inline-block form-control form-control-sm" style="width:60%" value="<?= $row['portfolio'] ?>">
      </div>
      <div class="d-flex justify-content-center w-75">
        <input type="reset" value="重寫" class="m-2 btn btn-sm btn-secondary w-25 ml-4">
        <input type="submit" onclick="save()" value="更新" class="w-25 m-2 btn btn-sm btn-warning">
      </div>
    </form>
  </div>

  <script>
    function save() {
      let data = new Object;
      let link = document.querySelector("#link");
      data['id'] = document.querySelector("#profile_data").querySelector("#id").value;
      data['userid'] = document.querySelector("#profile_data").querySelector("#userid").value;
      data['name'] = document.querySelector("#profile_data").querySelector("#name").value;
      data['enname'] = document.querySelector("#profile_data").querySelector("#enname").value;
      data['tel'] = document.querySelector("#profile_data").querySelector("#tel").value;
      $.post("api/profile.php", data, function(res) {
        if (res >= 1) {
          // console.log(res);
          alert("更新成功!");
          location.reload();
        } else {
          // console.log(res);
          alert("更動失敗!");
        }
      })
    }
  </script>
</body>

</html>