<table class="table table-sm">
  <thead>
    <tr>
      <th>#</th>
      <th>圖片</th>
      <th>路徑</th>
      <th>顯示</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>

      <td scope="row">1</td>
      <td><img src="https://fakeimg.pl/100x100/" class="img-thumbnail"></td>
      <td>/img/123.png</td>
      <td>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sh" id="exampleRadios1" value="1" >
          <label class="form-check-label" for="exampleRadios1">
            顯示
          </label>
        </div>
      </td>
      <td>刪除</td>
    </tr>
    <!-- <tr>
      <td scope="row">2</td>
      <td><img src="https://fakeimg.pl/100x100/" class="img-thumbnail"></td>
      <td>/img/123.png</td>
      <td>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="show[]" id="pic1" value="" >
          <label class="form-check-label" for="pic1">
            顯示
          </label>
        </div>
      <td>刪除</td>
      </td>
    </tr>
    <tr>
      <td scope="row">3</td>
      <td><img src="https://fakeimg.pl/100x100/" class="img-thumbnail"></td>
      <td>/img/123.png</td>
      <td>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="show[]" id="pic2" value="" >
          <label class="form-check-label" for="pic2">
            顯示
          </label>
        </div>
      <td>刪除</td>
      </td>
    </tr> -->
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
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    let pic = e.target.files;
    let userid = '<?= $_SESSION['userid']; ?>';
    fileData = new FormData();
    fileData.append(pic[0].name, pic[0],);
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
        console.log(res);
        location.reload();
      },
      error: function(res) {
        console.log(res);
        console.log("error")
      }
    });
  }
</script>