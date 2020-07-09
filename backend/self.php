<h3>履歷表管理後台 - 自傳管理</h3>
<table class="table table-sm text-center table-borderless mt-3">
  <thead>
    <tr class="border-bottom border-dark ">
      <th>#</th>
      <th>自傳名稱</th>
      <th>顯示</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
      $db = new DB("resume_self");
      $rows = $db->all(["userid" => $userid]);
      foreach ($rows as $key => $row) {
        echo "<td>" . ($key + 1) . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        $chk=($row['sh'])?"checked":'';
      ?>
        <td>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="sh" onclick="sh()" value="<?= $row['id'] ?>" <?= $chk ?> >
            <label class="form-check-label" for="defaultCheck1"></label>
            <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
          </div>
        </td>
        <td>
          <button class="btn btn-warning btn-sm mr-1 ubtn" data-toggle="modal" data-target="#Modal2" id="<?= $row['id'] ?>">更新
          </button><button class="btn btn-danger btn-sm ml-1" onclick="del_self(<?= $row['id'] ?>)">刪除</button>
        </td>
    </tr>
  <?php  }  ?>

  </tbody>
</table>


<script>
  $('#myModal').on('shown.bs.modal', function() {
    $('#myInput').trigger('focus')
  })
</script>


<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal1">新增自傳</button>
<!-- Modal -->
<div class="modal fade " id="Modal1" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">新增自傳</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="self">
          <!-- 內容 -->
          <div class="form-group">
            <label for="name">自傳名稱</label>
            <input type="text" class="form-control form-control-sm" class="name" id="name">
          </div>
          <div class="form-group">
            <label for="content">請輸入您的自傳內容(1000字)</label>
            <textarea class="form-control" id="content" rows="5"></textarea>
          </div>
      </div>
      <!-- end -->
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" onclick="save_self()">新增</button>
      </div>
    </div>
  </div>
</div>


<script>
  $(".ubtn").on("click", function() {
    const id = $(this).attr("id");
    $.get("api/read_self.php", {
      id
    }, function(res) {
      let result = JSON.parse(res);
      // console.log(result);
      document.querySelector("#self2").innerHTML = `
      
      <div class="form-group">
            <label for="name">自傳名稱</label>
            <input type="text" class="form-control form-control-sm" class="name" id="name" value="${result['name']}">
          </div>
          <div class="form-group">
            <label for="content">請輸入您的自傳內容(1000字)</label>
            <textarea class="form-control" id="content" rows="5">${result['text']}</textarea>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" onclick="save_self(${result['id']})">更新</button>
      </div>

      `;
    })
  })

  function del_self(id) {
    $.post("api/del_self.php", {
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

  function sh() {
    let data = {};
    let arrid = new Array;
    let id = $("input[name='id[]']");
    for (let k = 0; k < id.length; k++) {
        arrid.push(id[k].value);
      }
    data['id'] = arrid;
    data['sh'] = $("[name='sh']:checked").val()
    // console.log(data);
    $.post("api/show_self.php",data, function(res) {
      if (res >= 1) {
        alert("已更新顯示的自傳");
        location.reload();
      } else {
        alert("顯示更新失敗");
      }
    })
  }
</script>

<!-- Modal update-->
<div class="modal fade " id="Modal2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">更新自傳</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- 內容 -->
        <form id="self2">
          </form>
          </div>
    </div>
  </div>