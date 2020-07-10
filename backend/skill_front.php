<h3>履歷表管理後台 - 技能管理(前端)</h3>
<table class="table table-sm text-center table-borderless mt-3">
  <thead>
    <tr class="border-bottom border-dark ">
      <th>#</th>
      <th>技能名稱</th>
      <th>程度(%)</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
      $db = new DB("resume_skillfront");
      $rows = $db->all(["userid" => $userid]);
      foreach ($rows as $key => $row) {
        echo "<td>" . ($key + 1) . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['level'] . "%" . "</td>";
      ?>
        <td>
          <button class="btn btn-warning btn-sm mr-1 ubtn" data-toggle="modal" data-target="#Modal2" id="<?= $row['id'] ?>">更新
          </button><button class="btn btn-danger btn-sm ml-1" onclick="del_front(<?= $row['id'] ?>)">刪除</button>
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


<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal1">新增前端技能</button>
<!-- Modal -->
<div class="modal fade " id="Modal1" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">新增前端技能</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="front">
          <!-- 內容 -->
          <div class="form-group">
            <label for="name">技能名稱</label>
            <input type="text" class="form-control form-control-sm" class="name" id="name">
          </div>
          <div class="input-group input-group-sm mb-3 ">
            <label for="name" class="w-100">程度(1~100%)</label>
            <input type="number" class="form-control " id="level" min="1" max="100">
            <div class="input-group-append ">
              <span class="input-group-text " id="basic-addon2">%</span>
            </div>
          </div>
      </div>
      <!-- end -->
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" onclick="save_front()">新增</button>
      </div>
    </div>
  </div>
</div>


<script>
  $(".ubtn").on("click", function() {
    const id = $(this).attr("id");
    $.get("api/read_front.php", {
      id
    }, function(res) {
      let result = JSON.parse(res);
      console.log(result);
      document.querySelector("#front2").innerHTML = `
      
      <div class="form-group">
        <label for="name">技能名稱</label>
        <input type="text" class="form-control form-control-sm" class="name" id="name" value="${result['name']}">
      </div>
      <div class="input-group input-group-sm mb-3 ">
        <label for="name" class="w-100">程度(1~100%)</label>
        <input type="number" class="form-control " id="level" min="1" max="100" value="${result['level']}">
        <div class="input-group-append ">
          <span class="input-group-text " id="basic-addon2">%</span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" onclick="save_front(${result['id']})">更新</button>
      </div>

      `;
    })
  })

  function del_front(id) {
    $.post("api/del_front.php", {
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

<!-- Modal update-->
<div class="modal fade " id="Modal2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">更新前端技能</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- 內容 -->
        <form id="front2">
        </form>
      </div>
    </div>
  </div>