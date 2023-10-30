<script>
  function preview() {
    img.src = URL.createObjectURL(event.target.files[0]);
  }
</script>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Users Form</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Forms</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            Form elements
          </li>
        </ol>
      </nav>
    </div>
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">User Information</h4>
          <p class="card-description">
            <?php if (isset($users)) {
              echo $users['name'];
            } ?>
          </p>
          <form enctype="multipart/form-data" action="/postuser" method="post">
            <?= csrf_field() ?>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputName1">User Name</label>
                      <input type="text" style="text-transform:uppercase" name="username" class="form-control" id="exampleInputName1" placeholder="" value="<?php if (isset($users)) {
                                                                                                                                      echo $users['username'];
                                                                                                                                    } ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="" value="<?php if (isset($users)) {
                                                                                                                              echo $users['name'];
                                                                                                                            } ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email address</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword4" placeholder="">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group mb-3" style="text-align:center">
                      <label class="filebutton">
                        <img id="img" style="border-radius: 50%;" src="<?php if (!empty($users['Image'])) {
                                                                          echo base_url('uploads/' . $users['Image']);
                                                                        } else {
                                                                          echo 'https://freesvg.org/img/abstract-user-flat-4.png';
                                                                        } ?>" width="50%" height="40%">
                        <br>
                        <br>
                        <input type="file" name="file" class="form-control" accept="image/*" onchange="preview();"></label>
                    </div>
                    <div class="form-group mb-3">
                      <label>upload profile pic <?php if (isset($validation)) {
                                                  print_r($validation);
                                                } ?></label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleSelectGender">Gender</label>
                      <select class="form-control" name="gender" id="exampleSelectGender">
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="Designation">Designation</label>
                      <input type="text" class="form-control" name= "designation" id="Designation" placeholder="">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputCity1">Phone/Mobile No.</label>
                      <input type="text" class="form-control" name="mobile" id="exampleInputCity1" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectstatus">Status</label>
                      <select class="form-control" name="status" id="exampleSelectstatus">
                        <option>Active</option>
                        <option>Inactive</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div style="text-align:center">
              <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script>
  $(function() {
    $("#file").change(function(event) {
      var x = URL.createObjectURL(event.target.files[0]);
      $("#upload-img").attr("src", x);
      console.log(event);
    });
  });
  var inputBox = document.getElementById('exampleInputName1');

  inputBox.onkeyup = function() {
    document.getElementById('printchatbox').innerHTML = inputBox.value;
  }
</script>