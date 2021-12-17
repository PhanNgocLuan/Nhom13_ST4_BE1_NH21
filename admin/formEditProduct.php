
<?php include "header.php"?>
<?php 
  $product = new Product();
  if(isset($_GET['id']))
    {
      $id = $_GET['id'];
      $prodarr = $product->getProductById($id);
      $name = $prodarr['name'];
      $manu_name = $prodarr['manu_name'];
      $manu_id = $prodarr['manu_id'];
      $type_name = $prodarr['type_name'];
      $type_id = $prodarr['type_id'];
      $pro_image = $prodarr['pro_image'];
      $created_at = $prodarr['created_at'];
      $description = $prodarr['description'];
      $price = $prodarr['price'];
      $feature = $prodarr['feature'];
    } 
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Product Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <form action="./edit.php" method="post" enctype="multipart/form-data">
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
                <input type="text" name="name" value="<?php echo $name?>" class="form-control">
              </div>
              <div class="form-group">
                <label for="manu_id">Manufacture</label>
                <select id="inputManu" name="manu" class="form-control custom-select">
                  <?php
                    $manufacture = new Manufacture;
                    $getAllManu = $manufacture->getAllManu();
                    foreach($getAllManu as $value):
                      if($value['manu_id'] == $manu_id):
                  ?>
                  <option selected value=<?php echo $value['manu_id']?>>
                    <?php echo $value['manu_name'] ?>
                  </option>
                  <?php else: ?>
                    <option value=<?php echo $value['manu_id']?>>
                      <?php echo $value['manu_name'] ?>
                    </option>
                  <?php endif; endforeach ?>
                </select>
              </div>
              <div class="form-group">
                <label for="type_id">ProType</label>
                <select id="inputType" name="type" class="form-control custom-select">
                  <?php
                  $protype = new Protype;
                  $getAllProtype = $protype->getAllProtype();
                  foreach($getAllProtype as $value):
                  if($value['type_id'] == $type_id):
                  ?>
                  <option selected value=<?php echo $value['type_id'] ?>>
                    <?php echo $value['type_name'] ?>
                  </option>
                  <?php else: ?>
                    <option value=<?php echo $value['type_id'] ?>>
                    <?php echo $value['type_name'] ?>
                  </option>
                  <?php endif; endforeach ?>
                </select>
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" value="<?php echo $price ?>" class="form-control">
              </div>
              <div class="form-group">
                <label for="description">Product Description</label>
                <textarea name="desc" class="form-control" rows="4"><?php echo $description ?></textarea>
              </div>
              <div class="form-group">
                <label for="feature">Feature</label>
                <input type="number" name="feature" min="0" max="1" value="<?php echo $feature ?>" class="form-control">
              </div>
              <div class="form-group">
                <label class="control-label">Choose an image :</label>
                <div class="controls">
                  <input type="file" id='fileUpload' name="fileUpload" class="form-control">       
                  <img src="../img/<?php echo $pro_image ?>" id='image' width='100' height='100'>              
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
          <input type="hidden" name="id" value="<?php echo $id?>">
          <input type="hidden" name="action" value="product">
          <input name="submit" type="submit" value="Edit Product" class="btn btn-success float-right">
        </div>
      </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "footer.html"?>