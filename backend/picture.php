<h3>履歷表管理後台 - 個人圖片</h3>
<table class="table table-sm text-center table-borderless mt-3">
  <thead>
    <tr class="border-bottom border-dark ">
      <th>#</th>
      <th>圖片</th>
      <th>檔名</th>
      <th>顯示</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php

    $db = new DB("resume_picture");
    $rows = $db->all(["userid" => $userid]);

    foreach ($rows as $key => $row) {
      $chk=($row['sh'])?"checked":'';
      echo "<tr>";
      echo "<td width='5%'  height='150px'>" . ($key + 1) . "</td>";
      echo '<td width="40%" height="150px"  class="pic"><img src="' . $row["path"] . '" class="img-thumbnail "></td>';
      echo '<td width="35%" height="150px"  class="name">' . $row["name"] . '</td>';
      echo '<td width="10%" height="150px"> <div class="form-check"><input class="form-check-input" type="radio" onclick="sh()" name="sh" id="sh' . $row["id"] . '" value="' . $row["id"] . '"'.$chk.'><label class="form-check-label" for="' . 'sh' . $row["id"] . '">顯示</label> </div></td>';
      echo '<td width="10%" height="150px"><button class="btn btn-danger" onclick="del_pic(' . $row["id"] . ')">刪除</button></td>';
      echo '<input type="hidden" name="id[]" value="'. $row['id'] .'">';
      echo "</tr>";
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
  新增圖片
</button>

<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">上傳個人圖片</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleFormControlFile1">請選擇你要上傳的圖片</label>
            <input type="file" class="form-control-file" id="pic">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" onclick="save_pic()">上傳</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById("pic").addEventListener("change", (e) => {
    let userid = '<?= $_SESSION['userid']; ?>';
    let pic = e.target.files;
    fileData = new FormData();
    fileData.append(pic[0].name, pic[0], );
  })

  function save_pic() {
    $.ajax({
      url: "api/save_pic.php",
      type: "POST",
      data: fileData,
      contentType: false,
      cache: false,
      processData: false,
      success: function(res) {
        //console.log(res)  
        location.reload();
      }
    });
  }

  function del_pic(p_id) {
    $.post("api/del_pic.php", {
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

  function sh() {
    let data = {};
    let arrid = new Array;
    let id = $("input[name='id[]']");
    for (let k = 0; k < id.length; k++) {
        arrid.push(id[k].value);
      }
    data['id'] = arrid;
    data['sh'] = $("[name='sh']:checked").val()
    $.post("api/show_pic.php",data, function(res) {
      if (res >= 1) {
        alert("已更新顯示個人圖片");
        location.reload();
      } else {
        alert("顯示更新失敗");
      }
    })
  }
</script>