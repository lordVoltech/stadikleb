<?php
require '../../config.php'; // Pastikan path ke config.php sudah benar relatif dari lokasi file ini
check_login(); // Pastikan fungsi check_login() ada di config.php atau di-include terpisah

// Query untuk mengambil semua data pengguna (users)
$result = $conn->query("SELECT * FROM users");   
                        
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LuxuryAuto Admin Dashboard</title> <!-- Mengubah judul -->
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icons.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:_sidebar.html -->
      <?php include '../partials/_sidebar.html'; ?> <!-- Pastikan path ini benar relatif dari lokasi file ini -->

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:_navbar.html -->
        <?php include '../partials/_navbar.html'; ?> <!-- Pastikan path ini benar relatif dari lokasi file ini -->

        
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            
            <!-- Contoh row dari template, bisa dihapus atau diubah sesuai kebutuhan -->
            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">$12.34</h3>
                          <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Potential growth</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">$17.34</h3>
                          <p class="text-success ms-2 mb-0 font-weight-medium">+11%</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Revenue current</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">$12.34</h3>
                          <p class="text-danger ms-2 mb-0 font-weight-medium">-2.4%</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-danger">
                          <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Daily Income</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">$31.53</h3>
                          <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Expense current</h6>
                  </div>
                </div>
              </div>
            </div>

            <!-- Card Baru untuk Daftar Pengguna (Users) -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between align-items-center mb-4">
                      <h4 class="card-title mb-0">Daftar Pengguna</h4>
                      <h5 class="text-muted mb-0">Selamat datang, Admin!</h5> <!-- Pesan sambutan untuk Admin -->
                    </div>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>ID Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>Nomor Kontak</th>
                            <th>Email</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          if ($result->num_rows > 0) {
                              while ($row = $result->fetch_assoc()) {
                                  echo "<tr>";
                                  echo "<td>{$row['id']}</td>";
                                  echo "<td>{$row['nama']}</td>";
                                  echo "<td>{$row['no_telp']}</td>";
                                  echo "<td>{$row['email']}</td>";
                                  echo "<td>";
                                  echo "<a href='booking.php?id={$row['id']}' class='btn btn-info btn-sm me-2'>Booking</a>"; // Pastikan booking.php ada
                                  echo "<a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm me-2'>Edit</a>"; // Pastikan edit.php ada
                                  echo "<a href='hapus.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>"; // Ganti alert dengan modal kustom jika perlu
                                  echo "</td>";
                                  echo "</tr>";
                              }
                          } else {
                              echo "<tr><td colspan='5' class='text-center'>Belum ada pengguna terdaftar.</td></tr>";
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>
          <!-- content-wrapper ends -->
          <!-- partial:_footer.html -->
          <?php include '../partials/_footer.html'; ?> <!-- Pastikan path ini benar relatif dari lokasi file ini -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/chart.js/chart.umd.js"></script>
    <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assets/js/proBanner.js"></script>
    <script src="../assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>