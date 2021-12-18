<?php include "header.php"?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">List orders</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">List orders</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 10%">ID</th>
                      <th style="width: 20%">Order time</th>
                      <th style="width: 20%">Grand price</th>
                      <th style="width: 20%">Note</th>
                      <th style="width: 20%">Status</th>
                      <th style="width: 10%">Detail</th>
                  </tr>
              </thead>
              <tbody>
              <?php 
              $order = new order;
              $getAllOrder = $order->getAllOrder();
              foreach($getAllOrder as $value){ ?>
                  <tr>
                      <td><?php echo $value['code']?></td>
                      <td><?php echo $value['created_at']?></td>
                      <td><?php echo $value['grand_price']?></td>
                      <td><?php echo $value['message']?></td>
                      <td><?php echo $value['status']?></td>
                      <td><a href="orderdetail.php?order_id=<?php echo $value['order_id']?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                  </tr>
              <?php } ?>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "footer.html"?>