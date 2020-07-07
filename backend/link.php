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
  $rows = $db->all($userid);

  if (empty($row)) {
    $row['id'] = "";
    $row['name'] = "";
    $row['link'] = "";
  }

  ?>

  <div id="backend_link" class="w-75 ">
    <h3 class="text-center">履歷表管理後台 - 個人連結</h3>
    <div id="link" class="my-2">
      <div class="form-groupk mt-4 ">
        <input type="text" class="mr-3" style="width:18%;" value="連結名稱" disabled>
        <input type="text" class="text-center" style="width:60%" value="連結位址" disabled></div>
    </div>
    <input type="hidden" name="userid" id="userid" value="<?= $userid ?>">
    <div class="form-groupk my-2">
      <input type="hidden" name="id[]" value="<?= $rows[0]['id'] ?>">
      <input type="text" class="mr-3" name="name[]" id="name" value="<?= $rows[0]['name'] ?>" style="width:18%;" readonly>
      <input type="text" name="link[]" class="d-inline-block form-control form-control-sm reset" style="width:60%" value="<?= $rows[0]['link'] ?>">
    </div>

    <div class="form-group my-2">
      <input type="hidden" name="id[]" value="<?= $rows[1]['id'] ?>">
      <input type="text" class="mr-3" name="name[]" value="<?= $rows[1]['name'] ?>" style="width:18%;" readonly>
      <input type="text" name="link[]" id="ig" class="d-inline-block form-control form-control-sm reset" style="width:60%" value="<?= $rows[1]['link'] ?>">
    </div>

    <div class="form-group my-2">
      <input type="hidden" name="id[]" value="<?= $rows[2]['id'] ?>">
      <input type="text" class="mr-3" name="name[]" value="<?= $rows[2]['name'] ?>" style="width:18%;" readonly>
      <input type="text" name="link[]" id="github" class="d-inline-block form-control form-control-sm reset" style="width:60%" value="<?= $rows[2]['link'] ?>">
    </div>

    <div class="form-group my-2">
      <input type="hidden" name="id[]" value="<?= $rows[3]['id'] ?>">
      <input type="text" class="mr-3" name="name[]" value="<?= $rows[3]['name'] ?>" style="width:18%;" readonly>
      <input type="text" name="link[]" id="port" class="d-inline-block form-control form-control-sm reset" style="width:60%" value="<?= $rows[3]['link'] ?> ">
    </div>

    <?php
    for ($i = 4; $i < count($rows); $i++) {
    ?>
      <div class="form-group my-2">
        <input type="hidden" name="id[]" value="<?= $rows[$i]['id'] ?>">
        <input type="text" class="mr-3" name="name[]" value="<?= $rows[$i]['name'] ?>" style="width:18%;" >
        <input type="text" name="link[]" id="port" class="d-inline-block form-control form-control-sm reset" style="width:60%" value="<?= $rows[$i]['link'] ?> ">
        </button><button class="btn btn-danger btn-sm ml-1" onclick="del_link(<?= $rows[$i]['id']?>)">刪除</button>
      </div>
    <?php
    }
    ?>


    <div id="addlink"></div>
    <div class="d-flex justify-content-center w-75">
      <button class="btn btn-primary btn-sm m-2" id="adlink">新增連結</button>
      <button onclick="reset()" class="m-2 btn btn-sm btn-secondary w-25 ml-4">全部清空</button>
      <button onclick="save()" class="w-25 m-2 btn btn-sm btn-warning">更新</button>
    </div>
  </div>
  </div>

  <script>
    function save(e) {
      let data = new Object;
      let arrid = new Array;
      let arrlink = new Array;
      let arrname = new Array;
      let id = $("input[name='id[]']");
      let link = $("input[name='link[]']");
      let name = $("input[name='name[]']");
      for (let i = 0; i < link.length; i++) {
        arrlink.push(link[i].value);
      }
      for (let j = 0; j < name.length; j++) {
        arrname.push(name[j].value);
      }
      for (let k = 0; k < id.length; k++) {
        arrid.push(id[k].value);
      }
      data['userid'] = document.getElementById("userid").value;
      data['id'] = arrid;
      data['name'] = arrname;
      data['link'] = arrlink;
      $.post("api/link.php", data, function(res) {
        // console.log(res);
        if (res >= 1) {
          alert(`你更新了${res}筆資料`);
          location.reload();
        } else {
          alert("更動失敗!");
        }
      })
}


    $("#adlink").on("click", function() {
      let str =
        `<div class="form-group my-2">
        <input type="text" class="mr-3 rt" name="name[]"  style="width:18%;" >
        <input type="text" name="link[]" class="d-inline-block form-control form-control-sm reset" style="width:60%">
      </div>
      `;
      $("#addlink").prepend(str);
    })

    function reset() {
      $(".reset,.rt").val("");
    }

    function del_link(id) {
    $.post("../api/del_link.php", {
      id
    }, function(res) {
      if (res == 1) {
        alert("刪除成功");
        location.reload();
      } else {
        alert("GG刪除失敗惹")
      }
    })
  }
  </script>
</body>

</html>