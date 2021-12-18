<?php include "header.php";
if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    $orderdetail = new Orderdetail();
    $order = new Order();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Order detail</li>
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
          <h2 class="card-title">Order detail</h2>
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
        <section class="panel">
            <?php
                $getOrderByOrderID = $order->getOrderByOrderID($order_id);
                $cus_name = $getOrderByOrderID['cus_name'];
                $cus_address = $getOrderByOrderID['cus_address'];
                $cus_phone = $getOrderByOrderID['cus_phone'];
                $message = $getOrderByOrderID['message'];
                $cus_email = $getOrderByOrderID['cus_email'];
                $created_at = $getOrderByOrderID['created_at'];
                $grand_price = $getOrderByOrderID['grand_price'];
                $status = $getOrderByOrderID['status'];
                $user_name = $getOrderByOrderID['user_name'];
            ?>
                <h6 class="col-md-3">Customer</h6>
                <div class="col-md-10">
                    <table class="table table-bordered table-sm table-responsive" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="width: 15%">Name</th>
                                <th style="width: 35%">Address</th>
                                <th style="width: 20%">Phone</th>
                                <th style="width: 50%">Email</th>
                                <th style="width: 50%">Username</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $cus_name?></td>
                                <td><?php echo $cus_address?></td>
                                <td><?php echo $cus_phone?></td>
                                <td><?php echo $cus_email?></td>
                                <td><?php echo $user_name?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="wrapper-detail" style="padding-left:15px;">
                    <div class="row mb-1">
                        <h6 class="col-md-3">Note</h6>
                        <div class="col-md-9"><h6><?php echo $message?></h6></div>
                    </div>
                    <div class="row mb-1">
                        <h6 class="col-md-3">Order Time</h6>
                        <div class="col-md-9"><h6><?php echo $created_at?></h6></div>
                    </div>
                    <div class="row mb-1">
                        <h6 class="col-md-3">Grand price</h6>
                        <div class="col-md-9"><h6><?php echo number_format($grand_price,0)?></h6></div>
                    </div>
                    <form method="post" action="./edit.php">
                        <div class="row mb-1">
                            <h6 class="col-md-3">Status</h6>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4 col-sm-7">
                                        <select name="select_status" class="form-control mb-1 status-update">
                                            <option value="progress" <?php if($status == 'progress'){ echo 'selected'; } else { echo ''; } ?>>Progress</option>
                                            <option value="delivery" <?php if($status == 'delivery'){ echo 'selected'; } else { echo ''; } ?>>Delivery</option>
                                            <option value="received" <?php if($status == 'received'){ echo 'selected'; } else { echo ''; } ?>>Received</option>
                                        </select>
                                        <input type="hidden" name="order_id" value=<?php echo $order_id?>>
                                        <input type="hidden" name="action" value="status">
                                        <input type="submit" value="save">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--  -->
                    <div class="row">
                        <h6 class="col-md-3">Product List</h6>
                        <div style="max-height: 300px;overflow-y: scroll;margin-bottom:20px;" class="col-md-7">
                            <table class="table table-hover table-sm table-responsive" style="width: 100%">
                                <tbody>
                                    <?php
                                        $getOrderDetail = $orderdetail->getOrderDetail($order_id);
                                        foreach($getOrderDetail as $value){
                                    ?>
                                    <tr>
                                    <td style="text-align: center;">
                                            <img src="../img/<?php echo $value['image']?>" style="width: 70px">
                                        </td>
                                        <td>
                                            <?php echo $value['name']?>
                                            <p><?php echo number_format($value['price'],0)?> x <?php echo $value['quantity']?></p>
                                        </td>
                                        <td>Price
                                            <p>
                                                <b><?php echo number_format($value['total'],0) ."₫"?></b>
                                            </p>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </section>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "footer.html"; }?>