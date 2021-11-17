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
                <input type="text" id="inputName" class="form-control">
              </div>
              <div class="form-group">
                <label for="manu_id">Manu_id</label>
                <input type="text" id="manu_id" class="form-control">
              </div>
              <div class="form-group">
                <label for="type_id">Type_id</label>
                <input type="text" id="type_id" class="form-control">
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input type="text" id="price" class="form-control">
              </div>
              <div class="form-group">
                <label for="pro_image">Pro_image</label>
                <input type="text" id="pro_image" class="form-control">
              </div>
              <div class="form-group">
                <label for="description">Product Description</label>
                <textarea id="description" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="feature">Feature</label>
                <input type="text" id="feature" class="form-control">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Create new Porject" class="btn btn-success float-right">
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "footer.html"?>