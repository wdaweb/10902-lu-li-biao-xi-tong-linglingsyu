<?php
include_once "base.php";
$userid = $_SESSION['userid'];
$db = new DB("resume_condition");
$row = $db->find($userid);

if (empty($row)) {
  $row['id'] = "";
  $row['pos'] = "";
  $row['pay'] = "" ;
  $row['status'] =  "" ;
  $row['date'] = "";
  $row['time'] = "" ;
  $row['location'] = "" ;
  


}


?>

<div id="backend_condition">
  <h3>履歷表管理後台 - 求職條件</h3>
    <input type="hidden" name="id" id="id" value="<?= $row['id'] ?>">
    <input type="hidden" name="userid" id="userid" value="<?= $userid ?>">
    <label class="w-100 mt-3" for="pos">希望職務名稱</label>
    <div class="input-group input-group-sm  mb-3">
      <input type="text" id="pos" name="pos" class="form-control " value="<?= $row['pos'] ?>">
    </div>

    <label class="w-100" for="pay">希望待遇</label>
    <div class="input-group input-group-sm  mb-3">
      <input type="text" id="pay" name="pay" class="form-control " value="<?= $row['pay'] ?>">
    </div>

    <label class="w-100" for="status">求職狀態</label>
    <div class="input-group input-group-sm  mb-3">
      <select class="form-control" id="status" name="status" value="<?= $row['status'] ?>">
        <option value="1" <?= $row['status'] == "1" ? " selected " : ""  ?>>積極求職中</option>
        <option value="2" <?= $row['status'] == "2" ? " selected " : ""  ?>>想要了解新的工作機會</option>
        <option value="0" <?= $row['status'] == "0" ? " selected " : ""  ?>>目前沒有求職計畫</option>
      </select>
    </div>

    <label class="w-100" for="date">可上班日期</label>
    <div class="input-group input-group-sm  mb-3">
      <select class="form-control" id="date" name="date" value="<?= $row['date'] ?>">
        <option value="1" <?= $row['date'] == "1" ? " selected " : ""  ?>>隨時可上班</option>
        <option value="2" <?= $row['date'] == "2" ? " selected " : ""  ?>>兩週內</option>
        <option value="0" <?= $row['date'] == "0" ? " selected " : ""  ?>>一個月內</option>
      </select>
    </div>

    <label class="w-100" for="time">可聯絡時間</label>
    <div class="input-group input-group-sm  mb-3">
      <input type="text" id="time" name="time" class="form-control " value="<?= $row['time'] ?>">
    </div>


    <div class="form-group">
      <label class="w-100" for="location">希望工作地點</label>
      <select class="form-control" id="location" name="location" value="<?= $row['location'] ?>">
        <option value="基隆市" <?= $row['location'] == "基隆市" ? " selected " : ""  ?>>基隆市</option>
        <option value="台北市" <?= $row['location'] == "台北市" ? " selected " : ""  ?>>台北市</option>
        <option value="新北市" <?= $row['location'] == "新北市" ? " selected " : ""  ?>>新北市</option>
        <option value="桃園市" <?= $row['location'] == "桃園市" ? " selected " : ""  ?>>桃園市</option>
        <option value="新竹縣市" <?= $row['location'] == "新竹縣市" ? " selected " : ""  ?>>新竹縣市</option>
        <option value="苗栗縣" <?= $row['location'] == "苗栗縣" ? " selected " : ""  ?>>苗栗縣</option>
        <option value="台中市" <?= $row['location'] == "台中市" ? " selected " : ""  ?>>台中市</option>
        <option value="彰化縣" <?= $row['location'] == "彰化縣" ? " selected " : ""  ?>>彰化縣</option>
        <option value="雲林縣" <?= $row['location'] == "雲林縣" ? " selected " : ""  ?>>雲林縣</option>
        <option value="嘉義縣市" <?= $row['location'] == "嘉義縣市" ? " selected " : ""  ?>>嘉義縣市</option>
        <option value="台南市" <?= $row['location'] == "台南市" ? " selected " : ""  ?>>台南市</option>
        <option value="高雄市" <?= $row['location'] == "高雄市" ? " selected " : ""  ?>>高雄市</option>
        <option value="屏東縣" <?= $row['location'] == "屏東縣" ? " selected " : ""  ?>>屏東縣</option>
        <option value="宜蘭縣" <?= $row['location'] == "宜蘭縣" ? " selected " : ""  ?>>宜蘭縣</option>
        <option value="花蓮縣" <?= $row['location'] == "花蓮縣" ? " selected " : ""  ?>>花蓮縣</option>
        <option value="台東縣" <?= $row['location'] == "台東縣" ? " selected " : ""  ?>>台東縣</option>
        <option value="連江縣" <?= $row['location'] == "連江縣" ? " selected " : ""  ?>>連江縣</option>
        <option value="金門縣" <?= $row['location'] == "金門縣" ? " selected " : ""  ?>>金門縣</option>
        <option value="澎湖縣" <?= $row['location'] == "澎湖縣" ? " selected " : ""  ?>>澎湖縣</option>
        <option value="綠島" <?= $row['location'] == "綠島" ? " selected " : ""  ?>>綠島</option>
        <option value="蘭嶼" <?= $row['location'] == "蘭嶼" ? " selected " : ""  ?>>蘭嶼</option>
      </select>
    </div>

    <div class="form-group d-flex justify-content-center align-items-center">
      <input class="mx-2 btn btn-warning " type="reset" value="重寫">
      <input class="mx-2 btn btn-primary " type="submit" onclick="save_condition()" value="更新">
    </div>
</div>

<script>
  function save_condition() {
    let data = new Object;
    data['id'] = document.querySelector("#id").value;
    data['userid'] = document.querySelector("#userid").value;
    data['pos'] = document.querySelector("#pos").value;
    data['pay'] = document.querySelector("#pay").value;
    data['status'] = document.querySelector("#status").value;
    data['date'] = document.querySelector("#date").value;
    data['time'] = document.querySelector("#time").value;
    data['location'] = document.querySelector("#location").value;
    // console.log(data);
    $.post("api/condition.php", data, function(res) {
      // console.log(res);
      if (res >= 1) {
        // console.log(res);
        alert("更新成功!");
        location.reload();
      } else {
        alert("更動失敗!");
      }
    })
  }
</script>