<?php include "header.php"?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
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
          <h3 class="card-title">Products</h3>
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
                      <th style="width: 1%">ID</th>
                      <th style="width: 20%">Name</th>
                      <th style="width: 10%">Image</th>
                      <th>Price</th>
                      <th style="width: 8%">Manufacture</th>
                      <th style="width: 8%">Protype</th>
                      <th style="width: 20%">Action</th>
                  </tr>
              </thead>
              <tbody>
              <?php 
              $product = new Product;
              $getAllProducts = $product->getAllProducts();
              foreach($getAllProducts as $value){ ?>
                  <tr>
                      <td><?php echo $value['id']?></td>
                      <td><?php echo $value['name']?></td>
                      <td><img src="../img/<?php echo $value['pro_image']?>" style="width:100px" alt=""></td>
                      <td><?php echo number_format($value['price'])?> VND</td>
                      <td><?php echo $value['manu_name']?></td>
                      <td><?php echo $value['type_name']?></td>
                      <td>
                          <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $value['id']?>">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
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