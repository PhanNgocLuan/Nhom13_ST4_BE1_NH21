<?php include "header.php"?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Product Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <form action="addproduct.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" class="form-control">
              </div>
              <div class="form-group">
                <label for="manu_id">Manufacture</label>
                <select id="inputManu" name="manu" class="form-control custom-select">
                  <?php
                    $manufacture = new Manufacture;
                    $getAllManu = $manufacture->getAllManu();
                    foreach($getAllManu as $value):
                  ?>
                  <option value=<?php echo $value['manu_id']?>>
                    <?php echo $value['manu_name'] ?>
                  </option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group">
                <label for="type_id">ProType</label>
                <select id="inputType" name="type" class="form-control custom-select">
                  <?php
                  $protype = new Protype;
                  $getAllProtype = $protype->getAllProtype();
                  foreach($getAllProtype as $value): ?>
                  <option value=<?php echo $value['type_id'] ?>>
                    <?php echo $value['type_name'] ?>
                  </option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" class="form-control">
              </div>
              <div class="form-group">
                <label for="description">Product Description</label>
                <textarea name="desc" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="feature">Feature</label>
                <input type="text" name="feature" class="form-control">
              </div>
              <div class="form-group">
                <label class="control-label">Choose an image :</label>
                <div class="controls">
                  <input type="file" id='fileUpload' name="fileUpload" class="form-control">       
                  <img src="" id='image' width='100' height='100'>              
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      <div class="row">
        <div class="col-12">
          <input name="submit" type="submit" value="Create new Product" class="btn btn-success float-right">
        </div>
      </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "footer.html"?>