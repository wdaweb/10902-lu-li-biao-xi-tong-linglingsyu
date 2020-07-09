<h3>履歷表管理後台 - 作品集管理</h3>
<table class="table table-sm text-center table-borderless mt-3">
  <thead>
    <tr class="border-bottom border-dark ">
      <th>#</th>
      <th>名稱</th>
      <th>縮圖(寬250px)</th>
      <th>網址</th>
      <th>說明</th>
      <th>類別</th>
      <th>顯示</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php

    $db = new DB("resume_prot");
    $rows = $db->all(["userid" => $userid]);

    if (!empty($rows)) {
      foreach ($rows as $key => $row) {
        $chk = ($row['sh']) ? "checked" : '';
        echo "<tr>";
        echo "<td width='5%'  height='150px'>" . ($key + 1) . "</td>";
        echo '<td width="10%" height="150px"  class="name">' . $row["name"] . '</td>';
        echo '<td width="30%" height="150px"  class="pic"><img src="' . $row["pic"] . ' " class="w-75"></td>';
        echo '<td width="5%"><a href="' . $row["link"] . '" target="_blank">' . $row["name"] . '</a></td>';
        echo '<td width="20%">' . $row["legend"] . '</td>';
        echo '<td width="3%">' . $row["type"] . '</td>';
        echo '<td width="7%" height="150px"> <div class="form-check"><input class="form-check-input" type="checkbox" onclick="sh()" name="sh[]" id="sh' . $row["id"] . '" value="' . $row["id"] . '"' . $chk . '><label class="form-check-label" for="' . 'sh' . $row["id"] . '"></label> </div></td>';
        echo '<td width="20%" height="150px"><button class="btn btn-warning ubtn" data-toggle="modal" id="' . $row['id'] . '" data-target="#exampleModa2">更新</button><button class="ml-1 btn btn-danger" onclick="del_prot(' . $row["id"] . ')">刪除</button></td>';
        echo '<input type="hidden" '  . ' name="id[]" value="' . $row['id'] . '">';
        echo "</tr>";
      }
    }
    ?>
  </tbody>
</table>


<script>
  $('#myModal').on('shown.bs.modal', function() {
    $('#myInput').trigger('focus')
  })
</script>


<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  新增作品集
</button>

<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">新增作品集</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" id="prot">
          <div class="form-group">
            <label for="pic">請選擇你要上傳的圖片</label>
            <input type="file" class="form-control-file" id="pic">
          </div>
          <div class="input-group input-group-sm  mb-3">
            <label class="w-100" for="name">名稱</label>
            <input type="text" id="name" name="name" class="form-control form-control-sm " placeholder="作品集名稱">
          </div>
          <div class="input-group input-group-sm  mb-3">
            <label class="w-100" for="link">網址</label>
            <input type="text" id="link" name="link" class="form-control form-control-sm " placeholder="連結網址">
          </div>
          <div class="input-group  mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">說明(100字)</span>
            </div>
            <textarea class="form-control form-control-sm" id="legend" placeholder="請簡單介紹你的作品集..."></textarea>
          </div>
          <div class="form-group  mb-3">
            <label for="type">作品集分類</label>
            <select class="form-control form-control-sm" id="type">
              <option value="1">PHP</option>
              <option value="2">Javascript/jQery</option>
              <option value="3">Bootstrap</option>
              </option>
              <option value="4">AI/PS</option>
              <option value="5">Laravel</option>
              <option value="6">Vue</option>
            </select>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" onclick="save_prot()">上傳</button>
      </div>
    </div>
  </div>
</div>

<script>
  fileData = new FormData();

  document.getElementById("pic").addEventListener("change", (e) => {
    let pic = e.target.files;
    // console.log(pic);
    fileData.append(pic[0].name, pic[0], );
    // console.log(fileData);
  })

  function save_prot(e) {
    let prot = document.getElementById("prot");
    let prot2 = document.getElementById("prot2");
    // console.log(e);
    if (e == undefined) {
      fileData.append("name", $("#name").val());
      fileData.append("link", $("#link").val());
      fileData.append("legend", $("#legend").val());
      fileData.append("type", document.getElementById("type").value);
    } else {
      fileData.append("id",e);
      fileData.append("name", $("#name2").val());
      fileData.append("link", $("#link2").val());
      fileData.append("legend", $("#legend2").val());
      fileData.append("type", document.getElementById("type2").value);

    }
    // console.log(fileData);
    $.ajax({
      url: "api/save_prot.php",
      type: "POST",
      data: fileData,
      contentType: false,
      cache: false,
      processData: false,
      success: function(res) {
        // console.log(res);
        location.reload();
      }
    });
  }

  function del_prot(p_id) {
    $.post("api/del_prot.php", {
      p_id
    }, function(res) {
      if (res = 1) {
        alert('刪除成功');
        location.reload();
      } else {
        alert('刪除失敗');
      }
    });
  }


  $(".ubtn").on("click", function() {
    const id = $(this).attr("id");
    // console.log(id);
    $.get("../api/read_prot.php", {
      id
    }, function(res) {
      let result = JSON.parse(res);
      // console.log(result);
      document.querySelector("#prot2").innerHTML = `
      <div class="form-group">
            <label for="pic">請選擇你要上傳的圖片</label>
            <input type="file" class="form-control-file" id="pic2" onclick="ch()">
          </div>
          <div class="input-group input-group-sm  mb-3">
            <label class="w-100" for="name2">名稱</label>
            <input type="text" id="name2" name="name" class="form-control form-control-sm " placeholder="作品集名稱" value=${result['name']}>
          </div>
          <div class="input-group input-group-sm  mb-3">
            <label class="w-100" for="link2">網址</label>
            <input type="text" id="link2"  class="form-control form-control-sm " placeholder="連結網址" value="${result['link']}">
          </div>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">說明(100字)</span>
            </div>
            <textarea class="form-control form-control-sm" id="legend2" placeholder="請簡單介紹你的作品集...">${result['legend']}</textarea>
          </div>
          <div class="form-group mb-3">
            <label for="type">作品集分類</label>
            <select class="form-control form-control-sm"  id="type2" >
              <option value="1">PHP</option>
              <option value="2">Javascript/jQery</option>
              <option value="3">Bootstrap</option></option>
              <option value="4">AI/PS</option>
              <option value="5">Laravel</option>
              <option value="6">Vue</option>
            </select>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" onclick="save_prot(${result['id']})">更新</button>
      </div>
      `;
      document.getElementById("type2").value = result['type'];
    })
  })

  function ch() {
    document.getElementById("pic2").addEventListener("change", (e) => {
      let pic = e.target.files;
      fileData.append(pic[0].name, pic[0], );
      // console.log(fileData);
    })
  }


  function sh() {
    let data = {};
    let arrid = new Array();
    let arrsh = new Array();
    let sh = $("[name='sh[]']:checked");
    let id = $("input[name='id[]']");
    for (let k = 0; k < id.length; k++) {
      arrid.push(id[k].value);
    }
    for (let i = 0; i < sh.length; i++) {
      arrsh.push(sh[i].value);
    }
    data['id'] = arrid;
    data['sh'] = arrsh;
    console.log(data);
    $.post("api/show_prot.php", data, function(res) {
      // console.log(res);
      if (res >= 1) {
        alert("已更新顯示");
        location.reload();
      } else {
        alert("顯示更新失敗");
      }
    })
  }
</script>

<!-- Modal update-->
<div class="modal fade " id="exampleModa2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">更新作品集</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" id="prot2">


        </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" onclick="save_prot()">上傳</button>
      </div>
    </div> -->
    </div>
  </div>