<h3>履歷表管理後台 - 工作經驗管理</h3>
<table class="table table-sm text-center table-borderless mt-3" style="font-size:0.8rem;">
  <thead>
    <tr class="border-bottom border-dark ">
      <th>#</th>
      <th>公司名稱</th>
      <th>職稱</th>
      <th>開始時間</th>
      <th>結束時間</th>
      <th width='30%'>工作說明</th>
      <th>顯示</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
      $db = new DB("resume_work");
      $rows = $db->all(["userid" => $userid]);
      foreach ($rows as $key => $row) {
        $s_month = ($row['s_month'] < 10) ? ("0" . $row['s_month']) : $row['s_month'];
        $e_month = ($row['e_month'] < 10) ? ("0" . $row['e_month']) : $row['e_month'];
        $chk = ($row['sh']) ? "checked" : "";
        $str = $row['e_year'] . $e_month;
        $endtime = ($row['inwork'] == "true")? "在職" : $str;
        echo "<td>" . ($key + 1) . "</td>";
        echo "<td class='text-left'>" . $row['com'] . "</td>";
        echo "<td class='text-left'>" . $row['pos'] . "</td>";
        echo "<td>" . $row['s_year'] . $s_month . "</td>";
        echo "<td>" . $endtime . "</td>";
        echo "<td class='text-left'>" . nl2br($row['job']) . "</td>";
      ?>
        <td>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="sh[]" onclick="sh()" value="<?= $row['id'] ?>"  <?= $chk ?>>
            <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
          </div>
        </td>
        <td>
          <button class="btn btn-warning btn-sm  ubtn" data-toggle="modal" data-target="#Modal2" id="<?= $row['id'] ?>">更新
          </button><button class="ml-1 btn btn-danger btn-sm " onclick="del_work(<?= $row['id'] ?>)">刪除</button>
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


<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal1">新增工作經歷</button>
<!-- Modal -->
<div class="modal fade " id="Modal1" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">新增工作經歷</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- 內容 -->
        <form id="work">

          <div class="form-group">
            <label for="com">公司名稱</label>
            <input type="text" class="form-control form-control-sm" class="com" id="com">
          </div>
          <div class="form-group">
            <label for="pos">職稱</label>
            <input type="text" class="form-control form-control-sm" class="pos" id="pos">
          </div>
          <div class="form-group">
            <label for="job">工作說明(50字)</label>
            <textarea class="form-control form-control-sm" id="job" rows="5"></textarea>
          </div>
          <div class="form-group">
            <label for="s_time" class="w-100">開始年月</label>
            <select class="form-control d-inline-block w-25 form-control-sm" class="s_year" name="s_year">
              <?php
              $year = date("Y");
              $month = date("n");
              for ($j = 50; $j >= 0; $j--) {
                $upY = $year - $j;
                echo "<option value='$upY'>" . $upY . "</option>";
              }
              echo "<option value='$year' selected>" . $year . "</option>";
              ?>
            </select>
            <span>年</span>
            <select class="form-control d-inline-block w-25 form-control-sm" name="s_month">
              <?php
              for ($j = 1; $j <= $month - 1; $j++) {
                echo "<option value='$j'>" . $j . "</option>";
              }
              echo "<option value='$month' selected>" . $month . "</option>";
              for ($i = $month + 1; $i < 13; $i++) {
                echo "<option value='$i'>" . $i . "</option>";
              }
              ?>
            </select>
            <span>月</span>
          </div>

          <div class="form-group">
            <label for="g_time" class="w-100">結束年月</label>
            <select class="form-control d-inline-block w-25 form-control-sm" name="e_year">
              <?php
              for ($j = 50; $j >= 0; $j--) {
                $upY = $year - $j;
                echo "<option value='$upY'>" . $upY . "</option>";
              }
              echo "<option value='$year' selected>" . $year . "</option>";
              ?>
            </select>
            <span>年</span>
            <select class="form-control d-inline-block w-25 form-control-sm" name="e_month">
              <?php
              for ($j = 1; $j <= $month - 1; $j++) {
                echo "<option value='$j'>" . $j . "</option>";
              }
              echo "<option value='$month' selected>" . $month . "</option>";
              for ($i = $month + 1; $i < 13; $i++) {
                echo "<option value='$i'>" . $i . "</option>";
              }
              ?>
            </select>
            <span>月</span>
            <div class="form-check d-inline-block ml-2">
              <input class="form-check-input" type="checkbox" value="在職" class="inwork" id="inwork">
              <label class="form-check-label" for="inwork">
                在職
              </label>
            </div>
          </div>
          <!-- end -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" onclick="save_work()">新增</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script>
  $(".ubtn").on("click", function() {
    const id = $(this).attr("id");
    $.get("api/read_work.php", {id}, function(res) {
      let result = JSON.parse(res);
      let chk = (result["inwork"] == "true") ?　"checked" : "" ;
      // let dis = (result["inwork"] == "在職") ?　"disabled='disabled'" : "" ;
      console.log(result);
      document.querySelector("#work2").innerHTML = `
      <div class="form-group">
            <label for="com">公司名稱</label>
            <input type="text" class="form-control form-control-sm" class="com" id="com" value="${result["com"]}">
          </div>
          <div class="form-group">
            <label for="pos">職稱</label>
            <input type="text" class="form-control form-control-sm" class="pos" id="pos" value="${result["pos"]}">
          </div>
          <div class="form-group">
            <label for="job">工作說明(50字)</label>
            <textarea class="form-control form-control-sm" id="job" rows="5">${result["job"]}</textarea>
          </div>
          <div class="form-group">
            <label for="s_time" class="w-100">開始年月</label>
            <select class="form-control d-inline-block w-25 form-control-sm" class="s_year" id="s_year" >
            <?php
              $year = date("Y");
              $month = date("n");
              for ($j = 50; $j >= 0; $j--) {
                $y = $year - $j;
                echo "<option value='$y'>" . $y . "</option>";
              }
              ?>
            </select>
            <span>年</span>
            <select class="form-control d-inline-block w-25 form-control-sm" id="s_month"  >
            <?php
              for ($j = 1; $j <= 12; $j++) {
                echo "<option value='$j'> " . $j . "</option>";
              }
              ?>
            </select>
            <span>月</span>
          </div>

          <div class="form-group">
            <label for="g_time" class="w-100">結束年月</label>
            <select class="form-control d-inline-block w-25 form-control-sm" id="e_year" >
            <?php
              for ($j = 50; $j >= 0; $j--) {
                $y = $year - $j;
                echo "<option value='$y'>" . $y . "</option>";
              }
              ?>
            </select>
            <span>年</span>
            <select class="form-control d-inline-block w-25 form-control-sm" id="e_month" >
            <?php
              for ($j = 1; $j <= 12; $j++) {
                echo "<option value='$j' $chk > " . $j . "</option>";
              }
              ?>
            </select>
            <span>月</span>
            <?php
            $chk = ($row['inwork']) ? "checked" : "";
            ?>
            <div class="form-check d-inline-block ml-2">
              <input class="form-check-input" type="checkbox" class="inwork" id="inwork2" value="1"  ${chk}>
              <label class="form-check-label" for="inwork2">在職</label>
            </div>
          </div>
          <!-- end -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" onclick="save_work(${id})">更新</button>
      </div>
    `;
      document.getElementById("s_year").value = result["s_year"];
      document.getElementById("s_month").value = result["s_month"];
      document.getElementById("e_year").value = result["e_year"];
      document.getElementById("e_month").value = result["e_month"];
      

    })
  })

  function del_work(id) {
    $.post("api/del_work.php", {
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
    let arrsh = new Array;
    let sh = document.getElementsByName("sh[]");
    for (let i = 0; i < sh.length; i++) {
      if(sh[i].checked){
        arrsh.push(sh[i].value);
      }
    }
    for (let k = 0; k < id.length; k++) {
        arrid.push(id[k].value);
      }
    data['id'] = arrid;
    data['sh'] = arrsh;
    // console.log(data);
    $.post("api/show_work.php",data, function(res) {
      console.log(res);
      if (res >= 1) {
        // alert("已更新顯示");
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
        <h5 class="modal-title">更新工作經歷</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- 內容 -->
        <form id="work2">
        </form>
      </div>
    </div>
  </div>