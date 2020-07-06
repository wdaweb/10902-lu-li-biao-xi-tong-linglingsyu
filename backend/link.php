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
    $row['id'] = "";
    $row['facebook'] = "";
    $row['instagram'] = "";
    $row['github'] = "";
    $row['portfolio'] = "";
  }

  ?>

  <div id="backend_link" class="w-75 ">
    <h3 class="text-center">履歷表管理後台 - 個人連結</h3>
    <div id="link" class="my-2">
    <div class="form-groupk mt-4 ">
      <input type="text" class="mr-3" style="width:18%;" value="連結名稱" disabled>
      <input type="text" class="text-center" style="width:60%"  value="連結位址"  disabled></div>
    </div>
    <input type="hidden" name="userid" id="userid"  value="<?= $userid ?>">
    <div class="form-groupk my-2">
        <input type="text" class="mr-3" name="name[]" id="name" value="facebook" style="width:18%;" readonly>
        <input type="text" name="link[]" class="d-inline-block form-control form-control-sm reset" style="width:60%" value="<?= $row['facebook'] ?>">
      </div>

      <div class="form-group my-2">
        <input type="text" class="mr-3" name="name[]" value="instagram" style="width:18%;" readonly>
        <input type="text" name="link[]" id="ig" class="d-inline-block form-control form-control-sm reset" style="width:60%" value="<?= $row['instagram'] ?>">
      </div>

      <div class="form-group my-2">
        <!-- <input type="hidden" name="id[]"  value="<?= $row['id'] ?>"> -->
        <input type="text" class="mr-3" name="name[]" value="Github" style="width:18%;" readonly>
        <input type="text" name="link[]" id="github" class="d-inline-block form-control form-control-sm reset" style="width:60%" value="<?= $row['github'] ?>">
      </div>

      <div class="form-group my-2">
        <!-- <input type="hidden" name="id[]"  value="<?= $row['id'] ?>"> -->
        <input type="text" class="mr-3" name="name[]" value="Portfolio" style="width:18%;" readonly>
        <input type="text" name="link[]" id="port" class="d-inline-block form-control form-control-sm reset" style="width:60%" value="<?= $row['portfolio'] ?>">
      </div>
  
      
      <div id="addlink"></div>
      <div class="d-flex justify-content-center w-75">
      <button class="btn btn-primary btn-sm m-2" id="adlink">新增連結</button>
        <button  onclick="reset()" class="m-2 btn btn-sm btn-secondary w-25 ml-4">重寫</button>
        <button  onclick="save()"  class="w-25 m-2 btn btn-sm btn-warning">更新</button>
      </div>
    </div>
  </div>

  <script>
    function save() {
      let data = new Object;
      // let arrid = new Array;
      let arrlink = new Array;
      let arrname = new Array;
      let link = $("input[name='link[]']");
      let name = $("input[name='name[]']");
      // let id= $("input[name='id[]']");
      for (let i = 0 ; i < link.length ; i++){
        arrlink.push(link[i].value) ;
      }
      for (let j = 0; j < name.length ; j++){
        arrname.push(name[j].value) ;
      }
      // for (let k = 0; k < id.length ; k++){
      //   arrid.push(name[k].value) ;
      // }
      // data['id'] = arrid;
      // data['userid'] = document.getElementById("userid").value;
      data['name'] = arrname;
      data['link'] = arrlink;
      // console.log(data);
      $.post("api/link.php", data, function(res) {
          console.log(res);
        // if (res >= 1) {
        //   //  console.log(res);
        //   // alert("更新成功!");
        //   // location.reload();
        // } else {
        //   // console.log(res);
        //   alert("更動失敗!");
        // }
      })
    }
    

  
      $("#adlink").on("click",function(){
        let str =  
      `<div class="form-group my-2">
        <input type="text" class="mr-3 rt" name="name[]"  style="width:18%;" >
        <input type="text" name="link[]" class="d-inline-block form-control form-control-sm reset" style="width:60%">
      </div>
      `;
        $("#addlink").prepend(str);
      })

      function reset(){
       $(".reset,.rt").val("");
    }

  </script>
</body>

</html>