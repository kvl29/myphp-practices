<?php require __DIR__ . '/parts/db_connect.php';
$pageName = 'add';
$title = '新增';

?>

<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>
<style>
  form .mb-3 .form-text {
    color:red;
  }
</style>
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
                <textarea class="form-control" name="address" id="address" cols="30" rows="10"></textarea>
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
<!-- <script>
  const {
    name: name_f,
    email: email_f,
    mobil: mobile_f
  } = document.form1;
  function validateEmail(email){
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }
  function validateMobile(mobile){
    var re = /^09\d{2}-?\{3}-?\d{3}$/;
    return re.test(mobile);
  }


  const sendForm = e => {
    e.preventDefault();
    name_f.style.border = '1px solid #CCC';
    name_f.nextElementSibling.innerHTML = "";
    email_f.style.border = '1px solid #CCC';
    email_f.nextElementSibling.innerHTML = "";
    mobile_f.style.border = '1px solid #CCC';
    mobile_f.nextElementSibling.innerHTML = "";

  let isPass = true;
  if(name_f.value.length<2){
    // alert("please enter name");
    isPass= false;
    name_f.style.border = '1px solid red';
    name_f.nextElementSibling.innerHTML = "請填入正確姓名";
  }
  if(email_f.value && !validateEmail(email_f.value)){
    
    isPass= false;
    email_f.style.border = '1px solid red';
    email_f.nextElementSibling.innerHTML = "請填入正確email";
  }
  if(mobile.value && !validateMobile(mobile.value)){
    
    isPass= false;
    mobile_f.style.border = '1px solid red';
    mobile_f.nextElementSibling.innerHTML = "請填入正確電話";
  }
  if (isPass) {
    const fd = new FormData(document.form1);
    fetch('add-api.php', {
        method: 'POST',
        body: fd, //content-type:multipart/form-data
      }).then(r => r.json())
      .then(result => {
        console.log({
          result
        });
      })
      .catch(ex => console.log(ex))

  }
  }
</script> -->
<script>
  const {
    name: name_f,
    email: email_f,
    mobile: mobile_f,
  } = document.form1;

  function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }

  function validateMobile(mobile) {
    var re = /^09\d{2}-?\d{3}-?\d{3}$/;
    return re.test(mobile);
  }


  const sendForm = e => {
    e.preventDefault();
    name_f.style.border = '1px solid #CCC';
    name_f.nextElementSibling.innerHTML = "";
    email_f.style.border = '1px solid #CCC';
    email_f.nextElementSibling.innerHTML = "";
    mobile_f.style.border = '1px solid #CCC';
    mobile_f.nextElementSibling.innerHTML = "";


    // TODO: 資料送出之前, 要做檢查 (有沒有填寫, 格式對不對)
    let isPass = true; // 表單有沒有通過檢查

    if (name_f.value.length < 2) {
      // alert("請填寫正確的姓名");
      isPass = false;
      name_f.style.border = '1px solid red';
      name_f.nextElementSibling.innerHTML = "請填寫正確的姓名";
    }

    if (email_f.value && !validateEmail(email_f.value)) {
      isPass = false;
      email_f.style.border = '1px solid red';
      email_f.nextElementSibling.innerHTML = "請填寫正確的 Email";
    }

    if (mobile_f.value && !validateMobile(mobile_f.value)) {
      isPass = false;
      mobile_f.style.border = '1px solid red';
      mobile_f.nextElementSibling.innerHTML = "請填寫正確的手機號碼";
    }


    if (isPass) {
      // "沒有外觀" 的表單
      const fd = new FormData(document.form1);

      fetch('add-api.php', {
          method: 'POST',
          body: fd, // content-type: multipart/form-data
        }).then(r => r.json())
        .then(result => {
          console.log({
            result
          });
        })
        .catch(ex => console.log(ex))
    }


  }
</script>

<?php include __DIR__ . '/parts/html-foot.php' ?>


