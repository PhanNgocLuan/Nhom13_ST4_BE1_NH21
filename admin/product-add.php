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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
    <form action="add.php" method="post" enctype="multipart/form-data">
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
                <input name ="name" type="text" id="inputName" class="form-control">
              </div>
              <div class="form-group">
                <label for="manu_id">Manufactures</label>
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
                <label for="type_id">Protype</label>
                <select id="inputType" name="type" class="form-control custom-select">
                  <?php
                  $type = new Protype;
                  $getAllProtype = $type->getAllProtype();
                  foreach($getAllProtype as $value) { ?>
                  <option value=<?php echo $value['type_id'] ?>>
                    <?php echo $value['type_name'] ?>
                  </option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input name="price"  type="text" id="price" class="form-control">
              </div>
              <div class="form-group">
                <label for="description">Product Description</label>
                <textarea name="desc" id="description" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="feature">Feature</label>
                <input name="feature" type="text" id="feature" class="form-control">
              </div>
            </div>
            <div class="form-group">
                <label for="pro_image">Pro_image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      <div class="row">
        <div class="col-12">
          <input name = "submit" type="submit" value="Create new Project" class="btn btn-success float-right">
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "footer.html"?>