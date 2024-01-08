<?php require __DIR__ . '/parts/db_connect.php';
$pageName = 'add';
$title = '新增';

?>

<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>
<div class="container">
  <div class="row">
    <div class="col-6">
      <div class="card">
        <div class="container">
          <div class="card-body">
            <h5 class="card=title">新增資料</h5>
            <form name="form1" method="post" onsubmit="sendForm(event)">
            
            <div class="mb-3">
              <label for="name" class="form-lebel">name</label>
              <input type="text" class="form-control" id="name" name="name">
              <div class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="email" class="form-lebel">email</label>
              <input type="text" class="form-control" id="email" name="email">
              <div class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="mobile" class="form-lebel">mobile</label>
              <input type="text" class="form-control" id="mobile" name="mobile">
              <div class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="birthday" class="form-lebel">birthday</label>
              <input type="date" class="form-control" id="birthday" name="birthday">
              <div class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="address" class="form-lebel">address</label>
              <input type="text" class="form-control" id="address" name="address">
              <div class="form-text"></div>
            </div>
            <button type="submit" class=" btn btn-primary">新增</button>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/parts/scripts.php' ?>
<script>
  const sendForm= e=>{
    e.preventDefault();
  }

  const fd = new FormData(document.form1);
  fetch('add-api.php',{
    method: 'POST',
    body:fd,
  }).then(r=>r.text())
  .then(result=>{

  })
</script>
<?php include __DIR__ . '/parts/html-foot.php' ?>