<h3>履歷表管理後台 - 學歷管理</h3>
<table class="table table-sm text-center table-borderless mt-3">
  <thead>
    <tr class="border-bottom border-dark ">
      <th>#</th>
      <th>教育程度</th>
      <th>學校名稱</th>
      <th>科系</th>
      <th>入學年月</th>
      <th>畢業年月</th>
      <th>顯示</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
      $db = new DB("resume_study");
      $rows = $db->all(["userid" => $userid]);
      // echo "<pre>";
      // print_r($rows);
      // echo "</pre>";
      foreach ($rows as $key => $row) {
        $s_month = ($row['s_month'] < 10) ? ("0" . $row['s_month']) : $row['s_month'];
        $g_month = ($row['g_month'] < 10) ? ("0" . $row['g_month']) : $row['s_month'];
        $chk = ($row['sh'] == 1) ? "checked" : "";
        echo "<td>" . ($key + 1) . "</td>";
        echo "<td>" . $row['edu'] . $row['status'] . "</td>";
        echo "<td>" . $row['school'] . "</td>";
        echo "<td>" . $row['dept'] . "</td>";
        echo "<td>" . $row['s_year'] . $s_month . "</td>";
        echo "<td>" . $row['g_year'] . $g_month . "</td>";
      ?>
        <td>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" <?= $chk ?>>
            <label class="form-check-label" for="defaultCheck1"></label>
          </div>
        </td>
        <td>
          <button class="btn btn-warning btn-sm mr-1 ubtn" data-toggle="modal" data-target="#Modal2" id="<?= $row['id'] ?>">更新
          </button><button class="btn btn-danger btn-sm ml-1" onclick="del_study(<?= $row['id'] ?>)">刪除</button>
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


<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal1">新增學歷</button>
<!-- Modal -->
<div class="modal fade " id="Modal1" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">新增學歷</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- 內容 -->
        <form id="study">
          <div class="input-group input-group-sm  mb-3">
            <label class="w-100" for="edu">教育程度</label>
            <select class="form-control" id="edu" class="edu" name="edu">
              <option value="國小/國中">國小/國中</option>
              <option value="高中">高中</option>
              <option value="高職">高職</option>
              <option value="專科">專科</option>
              <option value="大學" selected>大學</option>
              <option value="碩士">碩士</option>
              <option value="博士">博士</option>
            </select>
            <div class="input-group-prepend">
              <div class="input-group-text inline-block" id="telshow">
                <div class="form-check">
                  <input class="form-check-input" id="g1" type="radio" class="status" name="status" value="畢業" checked>
                  <label class="form-check-label" for="g1">畢業</label>
                </div>
                <div class="form-check ml-1">
                  <input class="form-check-input " id="g2" type="radio" class="status" name="status" value="肄業">
                  <label class="form-check-label" for="g2">肄業</label>
                </div>
                <div class="form-check ml-1">
                  <input class="form-check-input " id="g3" type="radio" class="status" name="status" value="在學">
                  <label class="form-check-label" for="g3">在學</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="school">學校名稱</label>
            <input type="text" class="form-control" class="school" id="school">
          </div>
          <div class="form-group">
            <label for="dept">科系名稱</label>
            <input type="text" class="form-control" class="dept" id="dept">
          </div>
          <div class="form-group">
            <label for="s_time" class="w-100">入學年月</label>
            <select class="form-control d-inline-block w-25" class="s_year" name="s_year">
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
            <select class="form-control d-inline-block w-25" name="s_month">
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
            <label for="g_time" class="w-100">畢業年月</label>
            <select class="form-control d-inline-block w-25" name="g_year">
              <?php
              for ($j = 50; $j >= 0; $j--) {
                $upY = $year - $j;
                echo "<option value='$upY'>" . $upY . "</option>";
              }
              echo "<option value='$year' selected>" . $year . "</option>";
              ?>
            </select>
            <span>年</span>
            <select class="form-control d-inline-block w-25" name="g_month">
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
          <!-- end -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" onclick="save_study()">新增</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script>
  $(".ubtn").on("click", function() {
    const id = $(this).attr("id");
    $.get("../api/read_study.php", {
      id
    }, function(res) {
      let result = JSON.parse(res);
      let time = new Date();
      let year = time.getFullYear;
      let month = time.getMonth;
      // console.log(result);
      document.querySelector("#study2").innerHTML = `
          <div class="input-group input-group-sm  mb-3">
            <label class="w-100" for="edu">教育程度</label>
            <select class="form-control" id="edu" class="edu" name="edu">
              <option value="國小/國中" ${ (result["edu"] == "國小/國中") ? "selected" : ""} >國小/國中</option>
              <option value="高中" ${ (result["edu"] == "高中") ? "selected" : ""}>高中</option>
              <option value="高職" ${ (result["edu"] == "高職") ? "selected" : ""}>高職</option>
              <option value="專科" ${ (result["edu"] == "專科") ? "selected" : ""}>專科</option>
              <option value="大學" ${ (result["edu"] == "大學") ? "selected" : ""}>大學</option>
              <option value="碩士" ${ (result["edu"] == "碩士") ? "selected" : ""}>碩士</option>
              <option value="博士" ${ (result["edu"] == "博士") ? "selected" : ""}>博士</option>
            </select>
            <div class="input-group-prepend">
              <div class="input-group-text inline-block" id="telshow">
                <div class="form-check">
                  <input class="form-check-input" id="g1" type="radio" class="status" name="status" value="畢業" ${ (result["status"] == "畢業") ? "checked" : ""}>
                  <label class="form-check-label" for="g1">畢業</label>
                </div>
                <div class="form-check ml-1">
                  <input class="form-check-input " id="g2" type="radio" class="status" name="status" value="肄業" ${ (result["status"] == "肄業") ? "checked" : ""}>
                  <label class="form-check-label" for="g2">肄業</label>
                </div>
                <div class="form-check ml-1">
                  <input class="form-check-input " id="g3" type="radio" class="status" name="status" value="在學" ${ (result["status"] == "在學") ? "checked" : ""}>
                  <label class="form-check-label" for="g3">在學</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="school">學校名稱</label>
            <input type="text" class="form-control" class="school" id="school" value="${result["school"]}">
          </div>
          <div class="form-group">
            <label for="dept">科系名稱</label>
            <input type="text" class="form-control" class="dept" id="dept" value="${result["dept"]}">
          </div>
          <div class="form-group">
            <label for="s_time" class="w-100">入學年月</label>
            <select class="form-control d-inline-block w-25" id="s_year">
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
            <select class="form-control d-inline-block w-25" id="s_month">
              <?php
              for ($j = 1; $j <= 12; $j++) {
                echo "<option value='$j'> " . $j . "</option>";
              }
              ?>
            </select>
            <span>月</span>
          </div>
          <div class="form-group">
            <label for="g_time" class="w-100">畢業年月</label>
            <select class="form-control d-inline-block w-25" id="g_year">
              <?php
              for ($j = 50; $j >= 0; $j--) {
                $y = $year - $j;
                echo "<option value='$y'>" . $y . "</option>";
              }
              ?>
            </select>
            <span>年</span>
            <select class="form-control d-inline-block w-25" id="g_month">
              <?php
              for ($j = 1; $j <= 12; $j++) {
                echo "<option value='$j' $chk > " . $j . "</option>";
              }
              ?>
            </select>
            <span>月</span>
          </div>
          <!-- end -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" onclick="save_study(${result['id']})">更新</button>
      </div>
    `;
      document.getElementById("s_year").value = result["s_year"];
      document.getElementById("s_month").value = result["s_month"];
      document.getElementById("g_year").value = result["g_year"];
      document.getElementById("g_month").value = result["g_month"];
    })
  })

  function del_study(e){
    
  }
</script>

<!-- Modal update-->
<div class="modal fade " id="Modal2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">更新學歷</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- 內容 -->
        <form id="study2">
        </form>
      </div>
    </div>
  </div>