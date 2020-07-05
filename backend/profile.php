

    <?php
    include_once "base.php";
    $userid = $_SESSION['userid'];
    $db = new DB("resume_profile");
    $row = $db->find($userid);

    if(empty($row)){
        $row['id']="";
        $row['name']="";
        $row['enname']="";
        $row['tel']="";
        $row['telshow']="0";
        $row['email']="";
        $row['live']="";
        $row['lineid']="";
        $row['lineshow']="0";
        $row['intr']="";
    }

   
    ?>

    <div id="backend_profile">
        <h3>履歷表管理後台 - 個人資料</h3>
        <form id="profile_data">
            <input type="hidden" name="id" id="id" value="<?= $row['id'] ?>">
            <input type="hidden" name="userid" id="userid" value="<?= $userid ?>">
            <label class="w-100" for="name">姓名</label>
            <div class="input-group input-group-sm  mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" id="name" name="name" class="form-control " placeholder="name" value="<?= $row['name'] ?>">
            </div>

            <label class="w-100" for="enname">英文名</label>
            <div class="input-group input-group-sm  mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                </div>
                <input type="text" id="enname" name="enname" class="form-control " placeholder="English name" value="<?= $row['enname'] ?>">
            </div>

            <label class="w-100" for="tel">電話</label>
            <div class="input-group input-group-sm  mb-3">
                <input type="text" id="tel" name="tel" class="form-control " placeholder="0912123456" value="<?= $row['tel'] ?>">
                <div class="input-group-prepend">
                    <div class="input-group-text inline-block" id="telshow">
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="telshow[]"  value="0" >
                            <label class="form-check-label" for="phnshow">不顯示</label>
                        </div>
                        <div class="form-check ml-1">
                            <input class="form-check-input " type="radio" name="telshow[]"  value="1" checked>
                            <label class="form-check-label" for="phshow">顯示</label>
                        </div>
                    </div>
                </div>
            </div>

            <label class="w-100" for="email">電子信箱</label>
            <div class="input-group input-group-sm  mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
                <input type="email" id="email" name="email" class="form-control " placeholder="email@gmail.com" value="<?= $row['email'] ?>">
            </div>

            <div class="input-group input-group-sm  mb-3">
                <label class="w-100" for="lineid">Line id</label>
                <input type="text" id="lineid" name="lineid" class="form-control" value="<?= $row['lineid'] ?>">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="lineshow[]" value="0" checked>
                            <label class="form-check-label" for="enshow">不顯示</label>
                        </div>
                        <div class="form-check ml-1">
                            <input class="form-check-input " type="radio" name="lineshow[]"  value="1">
                            <label class="form-check-label" for="eshow">顯示</label>
                        </div>
                    </span>
                </div>
            </div>

            <div class="form-group">
                <label class="w-100" for="live">現居住地</label>
                <select class="form-control" id="live" name="live" value="<?= $row['live'] ?>">
                    <option value="基隆市" <?= $row['live']=="基隆市" ? " selected " : ""  ?> >基隆市</option>
                    <option value="台北市" <?= $row['live']=="台北市" ? " selected " : ""  ?> >台北市</option>
                    <option value="新北市" <?= $row['live']=="新北市" ? " selected " : ""  ?> >新北市</option>
                    <option value="桃園市" <?= $row['live']=="桃園市" ? " selected " : ""  ?> >桃園市</option>
                    <option value="新竹縣市" <?= $row['live']=="新竹縣市" ? " selected " : ""  ?>>新竹縣市</option>
                    <option value="苗栗縣" <?= $row['live']=="苗栗縣" ? " selected " : ""  ?>>苗栗縣</option>
                    <option value="台中市" <?= $row['live']=="台中市" ? " selected " : ""  ?>>台中市</option>
                    <option value="彰化縣" <?= $row['live']=="彰化縣" ? " selected " : ""  ?>>彰化縣</option>
                    <option value="雲林縣" <?= $row['live']=="雲林縣" ? " selected " : ""  ?>>雲林縣</option>
                    <option value="嘉義縣市" <?= $row['live']=="嘉義縣市" ? " selected " : ""  ?>>嘉義縣市</option>
                    <option value="台南市" <?= $row['live']=="台南市" ? " selected " : ""  ?>>台南市</option>
                    <option value="高雄市" <?= $row['live']=="高雄市" ? " selected " : ""  ?>>高雄市</option>
                    <option value="屏東縣" <?= $row['live']=="屏東縣" ? " selected " : ""  ?>>屏東縣</option>
                    <option value="宜蘭縣" <?= $row['live']=="宜蘭縣" ? " selected " : ""  ?>>宜蘭縣</option>
                    <option value="花蓮縣" <?= $row['live']=="花蓮縣" ? " selected " : ""  ?>>花蓮縣</option>
                    <option value="台東縣" <?= $row['live']=="台東縣" ? " selected " : ""  ?>>台東縣</option>
                    <option value="連江縣" <?= $row['live']=="連江縣" ? " selected " : ""  ?>>連江縣</option>
                    <option value="金門縣" <?= $row['live']=="金門縣" ? " selected " : ""  ?>>金門縣</option>
                    <option value="澎湖縣" <?= $row['live']=="澎湖縣" ? " selected " : ""  ?>>澎湖縣</option>
                    <option value="綠島" <?= $row['live']=="綠島" ? " selected " : ""  ?>>綠島</option>
                    <option value="蘭嶼" <?= $row['live']=="蘭嶼" ? " selected " : ""  ?>>蘭嶼</option>
                </select>
            </div>

            <div class="form-group">
                <label for="intr">簡介(50字)</label>
                <textarea class="form-control" id="intr" name="intr" rows="3" maxlength="100"><?= $row['intr'] ?></textarea>
            </div>
            <div class="form-group">
                <input type="submit" onclick="save()" value="提出">
                <input type="reset"  value="重寫">
            </div>
        </form>
    </div>

<script>


function save(){
    let data = new Object;
    data['id'] = document.querySelector("#profile_data").querySelector("#id").value;
    data['userid'] = document.querySelector("#profile_data").querySelector("#userid").value;
    data['name'] = document.querySelector("#profile_data").querySelector("#name").value;
    data['enname'] = document.querySelector("#profile_data").querySelector("#enname").value;
    data['tel'] = document.querySelector("#profile_data").querySelector("#tel").value;
    // data['telshow'] = document.getElementsByName("telshow");
    data['email'] = document.querySelector("#profile_data").querySelector("#email").value;
    data['lineid'] = document.querySelector("#profile_data").querySelector("#lineid").value;
    data['live'] = document.querySelector("#profile_data").querySelector("#live").value;
    data['intr'] = document.querySelector("#profile_data").querySelector("#intr").value;
    $.post("api/profile.php",data,function(res){
        if(res >= 1){
            // console.log(res);
            alert("更新成功!");
            location.reload();
        }else{
            // console.log(res);
            alert("更動失敗!");
        }
    })
}


</script>

