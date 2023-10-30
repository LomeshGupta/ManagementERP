<script>
  function preview() {
    img.src = URL.createObjectURL(event.target.files[0]);
  }
</script>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Item Form</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/items">Items</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            Add Item
          </li>
        </ol>
      </nav>
    </div>
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Item Information</h4>
          <p class="card-description">
            <?php 
              echo $items[0]['item_no']; ?>
          </p>
          <form enctype="multipart/form-data" action="/updateitem" method="post">
            <?= csrf_field() ?>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputName1">Item No.</label>
                      <input type="text" name="item_no" style="text-transform:uppercase" class="form-control" id="exampleInputName1" placeholder="" value="<?php echo $items[0]['item_no'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Item Name</label>
                      <input type="text" name="item_name" class="form-control" id="exampleInputName1" placeholder="" value="<?php echo $items[0]['item_name'] ?>">
                    </div>
                    <div class="form-group">
                    <label for="exampleSelectGender">Unit of Measure</label>
                      <select class="form-control" name="uom" id="exampleSelectGender" value="<?php echo $items[0]['uom'] ?>">
                        <option></option>
                        <option <?php if ($items[0]['uom'] == 'BOX') echo 'selected="selected"'; ?>>BOX</option>
                        <option <?php if ($items[0]['uom'] == 'PIECES') echo 'selected="selected"'; ?>>PIECES</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Unit Cost</label>
                      <input type="text" name="unit_cost" class="form-control" id="exampleInputPassword4" placeholder="" value ="<?php echo $items[0]['unit_cost'] ?>">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group mb-3" style="text-align:center">
                      <label class="filebutton">
                        <img id="img" style="border-radius: 50%;" src="uploads/<?php echo $items[0]['image'] ?>" width="50%" height="40%">
                        <br>
                        <br>
                        <input type="file" name="file" class="form-control" accept="image/*" onchange="preview();"></label>
                    </div>
                    <div class="form-group mb-3">
                      <label>upload Item Image <?php if (isset($validation)) {
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
                    <label for="unit_price">Unit Price</label>
                      <input type="text" class="form-control" name= "unit_price" id="unit_price" placeholder="" value="<?php echo $items[0]['unit_price'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="inv_posting_group">Inventory Posting Group</label>
                      <input type="text" class="form-control" name= "inv_posting_group" id="inv_posting_group" placeholder="" value="<?php echo $items[0]['inv_posting_group'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="reorder_qty">Reorder Quantity</label>
                      <input type="text" class="form-control" name= "reorder_qty" id="reorder_qty" placeholder="" value="<?php echo $items[0]['reorder_qty'] ?>">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="uom">Replenish Type</label>
                      <select class="form-control" name="replenish_type" id="uom" value="<?php echo $items[0]['replenish_type'] ?>">
                        <option></option>
                        <option>Purchase</option>
                        <option>Production</option>
                      </select>
                    </div>
                    <div class="form-group">
                    <div class="form-group">
                      <label for="costing_method">Costing Method</label>
                      <input type="text" class="form-control" name="costing_method" id="costing_method" placeholder="" value="<?php echo $items[0]['costing_method'] ?>">
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div style="text-align:center">
              <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
              <a class="btn btn-light" href="/items">Cancel</a>
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