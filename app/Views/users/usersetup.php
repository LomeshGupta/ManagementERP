<style>
  input[type="date"]::-webkit-inner-spin-button,
input[type="date"]::-webkit-calendar-picker-indicator {
  background: transparent;
}
</style>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">User Setup</h4>
          <!-- <a href="/signup" style="text-decoration: none;">
            <p class="card-description">+ Add User</p>
          </a> -->
          <div class="search-field d-none d-md-block">
            <!-- <input type="text" class="form-control bg-transparent border-0" style="width:30%" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"> -->
            <table class="table cell-border compact hover" id="myTable">
              <thead>
                <tr>
                  <th> User Name </th>
                  <th> Allow Posting From </th>
                  <th> Allow Posting to</th>
                  <th> User </th>
                  <th> User Setup </th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($usersetup as $key) {
                ?>
                  <tr>
                    <td class="py" data-row_id="<?php echo $key['username'] ?>">
                      <?php echo $key['username'] ?>
                      <!-- <img src="../../uploads/" alt="image" /> -->
                    </td>
                    <td>
                      <input class="py" style="cursor: pointer; font-family: Helvetica, arial, sans-serif; font-size: 15px; color:inherit" type="date" onfocus="'showPicker' in this && this.showPicker()" value="<?php echo $key['allow_posting_from']; ?>" data-row_id="<?php echo $key['username'] ?>" data-field_name="allow_posting_from">
                    </td>
                    <td>
                      <input class="py" style="cursor: pointer; font-family: Helvetica, arial, sans-serif; font-size: 15px; color:inherit" type="date" onfocus="'showPicker' in this && this.showPicker()" value="<?php echo $key['allow_posting_to']; ?>" data-row_id="<?php echo $key['username'] ?>" data-field_name="allow_posting_to">
                    </td>
                    <td>
                      <select style="background-color: transparent; width:70%; cursor:pointer;" class="py form-select" aria-label="Default select example" type="date" value="<?php echo $key['user']; ?>" data-row_id="<?php echo $key['username'] ?>" data-field_name="user">
                        <option value="" <?php if ($key['user'] == '') echo 'selected="selected"'; ?>></option>
                        <option value="View" <?php if ($key['user'] == 'View') echo 'selected="selected"'; ?>>View</option>
                        <option value="Edit" <?php if ($key['user'] == 'Edit') echo 'selected="selected"'; ?>>Edit</option>
                        <option value="Blocked" <?php if ($key['user'] == 'Blocked') echo 'selected="selected"'; ?>>Blocked</option>
                      </select>
                    </td>
                    <td>
                    <select style="background-color: transparent;width:70%; cursor:pointer;" class="py form-select" aria-label="Default select example" type="date" value="<?php echo $key['user_setup']; ?>" data-row_id="<?php echo $key['username'] ?>" data-field_name="user_setup">
                        <option value="" <?php if ($key['user'] == '') echo 'selected="selected"'; ?>></option>
                        <option value="View" <?php if ($key['user'] == 'View') echo 'selected="selected"'; ?>>View</option>
                        <option value="Edit" <?php if ($key['user'] == 'Edit') echo 'selected="selected"'; ?>>Edit</option>
                        <option value="Blocked" <?php if ($key['user'] == 'Blocked') echo 'selected="selected"'; ?>>Blocked</option>
                      </select>
                    </td>
                  </tr>
                <?php
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  

  <script>

$.noConflict();

$(document).ready(function(){
    $('#myTable').DataTable();
});

    function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }

    $(document).on('change', '.py', function() {
      var id = $(this).data('row_id');
      var name = $(this).data('field_name');
      // if (name == 'user') {
      //   var value = $('#select1').find(":selected").text();
      // } else if (name == 'user_setup') {
      //   var value = $('#select2').find(":selected").text();
      // } else { 
      var value = $(this).val();
      // }
      console.log(value);
      $.ajax({
        url: "<?php echo base_url('update') ?>",
        type: 'post',
        data: {
          id: id,
          value: value,
          name: name
        },
        success: function(response) {
          // alert(response);
          if (response == 1) {
            // alert('ok');
            console.log('Saved successfully');
          } else {
            // alert('no');
            console.log("Not saved.");
          }
        },
        error: function(data) {
          // alert(JSON.stringify(data));
        }

      });
    })
  </script>