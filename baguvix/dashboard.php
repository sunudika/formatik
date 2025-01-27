<?php
include "config.php";
if (!isset($_SESSION['admin'])) {
  echo "<script>window.location='" . base_url() . "';</script>";
} else {

  $sql_settings = mysqli_query($con, "SELECT * FROM setting");
  while ($settings = mysqli_fetch_array($sql_settings)) {
    $toogle_maintainance = $settings['toogle_maintainance'];
  };

  $sql_total_admin = mysqli_query($con, "SELECT * FROM admin");
  $total_admin = mysqli_num_rows($sql_total_admin);

  $sql_total_user = mysqli_query($con, "SELECT * FROM user");
  $total_user = mysqli_num_rows($sql_total_user);

  $sql_total_kategori = mysqli_query($con, "SELECT * FROM kategori");
  $total_kategori = mysqli_num_rows($sql_total_kategori);
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Fathur">
    <title>Dashboard</title>
    <script src="https://kit.fontawesome.com/659604d02a.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= base_url() ?>/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  </head>

  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <?php include "_include/sidebar.php" ?>
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <?php include "_include/navbar.php" ?>

          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div>

            <!-- Content Row -->
            <div class="row">

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Admin</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_admin ?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total User</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_user ?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Categories</div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $total_kategori ?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Pending Requests Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Maintainance Status</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php if ($toogle_maintainance == 0) {
                                                                                echo "NO!";
                                                                              } else if ($toogle_maintainance == 1) {
                                                                                echo "YES!";
                                                                              }; ?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Id. </th>
                        <th>Images</th>
                        <th>KTM Images</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Id. </th>
                        <th>Images</th>
                        <th>KTM Images</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Edit</th>
                      </tr>
                    </tfoot>
                    <tbody>

                      <?php
                        $sql_mhs = mysqli_query($con, "SELECT * FROM user") or die(mysqli_error($con, ""));
                        if (mysqli_num_rows($sql_mhs) > 0) {
                          while ($data = mysqli_fetch_array($sql_mhs)) { ?>
                          <tr>
                            <td><?= $data['id'] ?></td>
                            <td>
                              <?php if ($data['img_profile'] != null) { ?>
                                <img src="<?= very_base_url() ?>/images/profile/<?= $data['img_profile'] ?>" alt="" height="50">
                              <?php } ?>
                            </td>
                            <td>
                              <?php if ($data['img_verification'] != null) {  ?>
                                <img src="<?= very_base_url() ?>/images/img_verification/<?= $data['img_verification'] ?>" alt="" height="50">
                              <?php } ?>
                            </td>
                            <td><?= $data['username'] ?></td>
                            <td><?= $data['email'] ?></td>
                            <td><?= $data['status'] ?></td>
                            <td class="text-center">
                              <a href="#" onclick="del<?= $data['id'] ?>()" class="btn btn-danger">Delete</a>
                              <script>
                                function del<?= $data['id'] ?>() {
                                  var txt;
                                  if (confirm("Anda yakin ingin mendelete data ini?")) {
                                    window.location = "<?= base_url() ?>/_auth/delete.php?id=<?= $data['id'] ?>";
                                  }
                                }
                              </script>
                            </td>
                          </tr>
                      <?php };
                        } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Footer -->
        <?php include "_include/footer.php" ?>
      </div>
    </div>

    <?php include "_include/addon.php" ?>
    <?php include "js/addjs.php" ?>
  </body>

  </html>
<?php } ?>