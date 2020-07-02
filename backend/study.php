

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
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>大學(畢業)</td>
      <td>國立雲林科技大學</td>
      <td>企業管理系</td>
      <td>200706</td>
      <td>201109</td>
      <td>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="id" id="defaultCheck1">
          <label class="form-check-label" for="defaultCheck1"></label>
        </div>
      </td>
    </tr>
    <tr>
      <td>1</td>
      <td>大學(畢業)</td>
      <td>國立雲林科技大學</td>
      <td>企業管理系</td>
      <td>200706</td>
      <td>201109</td>
      <td>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="id" id="defaultCheck">
          <label class="form-check-label" for="defaultCheck"></label>
        </div>
      </td>
    </tr>
    <?php

    ?>
  </tbody>
</table>


<script>
  $('#myModal').on('shown.bs.modal', function() {
    $('#myInput').trigger('focus')
  })
</script>


<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">新增學歷</button>

<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1">
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
<form>
  <div class="input-group input-group-sm  mb-3">
    <label class="w-100" for="edu">教育程度</label>
    <select class="form-control" id="edu" name="edu" >
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
          <input class="form-check-input" id="g1" type="radio" name="telshow" value="1" checked>
          <label class="form-check-label" for="g1">畢業</label>
        </div>
        <div class="form-check ml-1">
          <input class="form-check-input " id="g2" type="radio" name="telshow" value="2">
          <label class="form-check-label" for="g2">肄業</label>
        </div>
        <div class="form-check ml-1">
          <input class="form-check-input " id="g3" type="radio" name="telshow" value="3">
          <label class="form-check-label" for="g3">在學</label>
        </div>
      </div>
    </div>
  </div>

  <div class="form-group">
    <label for="school">學校名稱</label>
    <input type="text" class="form-control" id="text">
  </div>
  <div class="form-group">
    <label for="dept">科系名稱</label>
    <input type="text" class="form-control" id="dept">
  </div>
  <div class="form-group">
    <label for="s_time" class="w-100">入學年月</label>
    <select class="form-control d-inline-block w-25" name="s_year" id="">
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
    <select class="form-control d-inline-block w-25" name="s_month" id="">
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
    <select class="form-control d-inline-block w-25" name="g_year" id="">
      <?php
      for ($j = 50; $j >= 0; $j--) {
        $upY = $year - $j;
        echo "<option value='$upY'>" . $upY . "</option>";
      }
      echo "<option value='$year' selected>" . $year . "</option>";
      ?>
    </select>
    <span>年</span>
    <select class="form-control d-inline-block w-25" name="g_month" id="">
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
</form>
<!-- end -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" onclick="save_study()">新增</button>
      </div>
    </div>
  </div>
</div>

<script>

function save_study(){

}

</script>