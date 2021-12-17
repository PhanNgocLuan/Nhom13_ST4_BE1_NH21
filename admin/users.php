<?php include "header.php"?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
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
          <h3 class="card-title">Users</h3>

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
                      <th style="width: 20%">User ID</th>
                      <th style="width: 20%">User Name</th>
                      <th style="width: 30%">Password</th>
                      <th style="width: 20%">Role</th>
                  </tr>
              </thead>
              <tbody>
              <?php 
              $user = new User;
              $getAllUserAdmin = $user->getAllUserAdmin();
              foreach($getAllUserAdmin as $value){ ?>
                  <tr>
                      <td><?php echo $value['user_id']?></td>
                      <td><?php echo $value['user_name']?></td>
                      <td><?php echo str_ireplace($value['password'],"***********",$value['password'])?></td>
                      <td><?php echo $value['role_name']?></td>
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