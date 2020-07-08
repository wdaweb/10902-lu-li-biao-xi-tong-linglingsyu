<h3>履歷表管理後台 - 作品集管理</h3>
<table class="table table-sm text-center table-borderless mt-3">
  <thead>
    <tr class="border-bottom border-dark ">
      <th>#</th>
      <th>名稱</th>
      <th>縮圖(寬250px)</th>
      <th>網址</th>
      <th>說明</th>
      <th>顯示</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php

    $db = new DB("resume_prot");
    $rows = $db->all(["userid" => $userid]);

if(!empty($rows)){
    foreach ($rows as $key => $row) {
      $chk = ($row['sh']) ? "checked" : '';
      echo "<tr>";
      echo "<td width='5%'  height='150px'>" . ($key + 1) . "</td>";
      echo '<td width="10%" height="150px"  class="name">' . $row["name"] . '</td>';
      echo '<td width="30%" height="150px"  class="pic"><img src="' . $row["pic"] . ' " class="w-75"></td>';
      echo '<td width="8%"><a href="' . $row["link"] . '" target="_blank">' . $row["name"] . '</a></td>';
      echo '<td width="20%">'.$row["legend"].'</td>';
      echo '<td width="7%" height="150px"> <div class="form-check"><input class="form-check-input" type="checkbox" onclick="sh()" name="sh[]" id="sh' . $row["id"] . '" value="' . $row["id"] . '"' . $chk . '><label class="form-check-label" for="' . 'sh' . $row["id"] . '"></label> </div></td>';
      echo '<td width="20%" height="150px"><button class="btn btn-warning ubtn">更新</button><button class="ml-1 btn btn-danger" onclick="del_prot(' . $row["id"] . ')">刪除</button></td>';
      echo '<input type="hidden" id='.$row['id'].' name="id[]" value="' . $row['id'] . '">';
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">說明(100字)</span>
            </div>
            <textarea class="form-control form-control-sm" id="legend" placeholder="請簡單介紹你的作品集..."></textarea>
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
  document.getElementById("pic").addEventListener("change", (e) => {
    let pic = e.target.files;
    fileData = new FormData();
    fileData.append(pic[0].name, pic[0], );

  })

  function save_prot(e){
      let prot = document.getElementById("prot");
      let prot2 = document.getElementById("prot2");
      if(e == undefined){
        fileData.append("name",  $("#name").val() );
        fileData.append("link",  $("#link").val() );
        fileData.append("legend",  $("#legend").val() );
      }else{
        fileData.append("id",e);
        fileData.append("name",  $("#name2").val() );
        fileData.append("link",  $("#link2").val() );
        fileData.append("legend",  $("#legend2").val() );
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
    $.get("../api/read_prot.php", {
      id
    }, function(res) {
      let result = JSON.parse(res);
      console.log(result);
      document.querySelector("#backend2").innerHTML = `
      
      <div class="form-group">
            <label for="pic">請選擇你要上傳的圖片</label>
            <input type="file" class="form-control-file" id="pic2">
          </div>
          <div class="input-group input-group-sm  mb-3">
            <label class="w-100" for="name2">名稱</label>
            <input type="text" id="name" name="name" class="form-control form-control-sm " placeholder="作品集名稱" value=${result['name']}>
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
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" onclick="save_prot(${result['id']}">更新</button>
      </div>
      `;
    })
  })

  function sh() {
    let data = {};
    let arrid = new Array;
    let id = $("input[name='id[]']");
    for (let k = 0; k < id.length; k++) {
      arrid.push(id[k].value);
    }
    data['id'] = arrid;
    data['sh'] = $("[name='sh']:checked").val()
    $.post("api/show_pic.php", data, function(res) {
      if (res >= 1) {
        alert("已更新顯示個人圖片");
        location.reload();
      } else {
        alert("顯示更新失敗");
      }
    })
  }
</script>

<!-- Modal update-->
<div class="modal fade " id="exampleModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">新增作品集</h5>
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