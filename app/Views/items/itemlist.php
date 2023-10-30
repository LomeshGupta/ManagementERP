<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Items</h4>
                    <a href="/additem" style="text-decoration: none;">
                        <p class="card-description">+ Add Item</p>
                    </a>
                    <div class="search-field d-none d-md-block">
                        <!-- <input type="text" class="form-control bg-transparent border-0" style="width:30%" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"> -->
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th> Item No. </th>
                                    <th> Item Name </th>
                                    <th> Unit of Measure </th>
                                    <th> Unit Cost </th>
                                    <th> Unit Price </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($all as $key) {
                                ?>
                                    <tr>
                                        <td class="py-1">
                                            <form enctype="multipart/form-data" action="<?php echo base_url(); ?>edititem" method="post">
                                                <button type="submit" name="item_no" value="<?php echo $key['item_no'] ?>" style="background-color:transparent; border:0;text-decoration: none; color:black;">
                                                    <?php echo $key['item_no'] ?>
                                                </button>
                                            </form>
                                            <!-- <img src="../../uploads/" alt="image" /> -->
                                        </td>
                                        <td>
                                            <?php echo $key['item_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $key['uom'] ?>
                                            <!-- <div class="progress">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div> -->
                                        </td>
                                        <td> <?php echo $key['unit_cost'] ?> </td>
                                        <td><?php echo $key['unit_price'] ?> </td>
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
    <script type="text/javascript">
        $.noConflict();

        $(document).ready(function() {
            $('#myTable').DataTable({
                select: true,
                pagingType: 'full_numbers'
            });
        });
    </script>
    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
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
            // }
            console.log(value);
            $.ajax({
                url: "<?php echo base_url('edituser') ?>",
                type: 'post',
                data: {
                    id: id
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