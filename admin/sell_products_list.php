<?php require 'd_header.php' ?>

<!-- ########## START: LEFT PANEL ########## -->
<?php require 'd_leftpanel.php' ?>
<!-- ########## END: LEFT PANEL ########## -->

<!-- ########## START: HEAD PANEL ########## -->
<?php require 'd_headpanel.php' ?>
<!-- ########## END: HEAD PANEL ########## -->

<?php require 'calculation.php' ?>


  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item">Online Cash Counter</a>
      <span class="breadcrumb-item active">List of Products</span>
    </nav>

    <div class="sl-pagebody"><!-- MAIN CONTENT -->
      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Product Details</h6>
          

          <div class="table-wrapper">
            <table id="myTable" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-10p">SL</th>
                  <th class="wd-10p">Product ID</th>
                  <th class="wd-10p">Product name</th>
                  <th class="wd-15p">Image</th>
                  <th class="wd-10p">Selling </th>
                  <th class="wd-10p">Available Qty</th>
                  <th class="wd-15p">Unit Type</th>
                  <th class="wd-20p">Choose Qty</th>
                  <th class="wd-10p">Action</th>
                </tr>
              </thead>
              <tbody>
                
                <?php

                    foreach ($product_list as $key => $data) {
                ?>
                    <tr>
                      <td><?php echo $key+1; ?></td>
                      <td><?php echo $data['id']; ?></td>
                      <td><?php echo $data['product_name']; ?></td>
                      <td><img src="<?php echo $data['product_image']; ?>" width=50></td>
                      <td>BDT. <?php echo $data['selling_price']; ?></td>
                      <td><?php echo $data['quantity']; ?></td>
                    

                      <td><?php echo $data['unit_type']; ?></td>
                      <td><input type="number" name="choose_quantity" min="1" max="<?= $data['quantity']; ?>" style="width: 100px;"></td>
                      <td>

                        <a href="" class="btn btn-success">Add to Cart</a>
                        

                      </td>
                    </tr>
                <?php
                    }

                ?>
               
                
               
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div>		

    </div><!-- sl-pagebody --><!-- END MAIN CONTENT -->


  <?php require 'd_footer.php' ?>
  </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

  <?php require 'd_javascript.php' ?>


  <script>
    $('#myTable').DataTable({
    bLengthChange: true,
    searching: true,
    responsive: true
  });
  </script>
  </body>
</html>
