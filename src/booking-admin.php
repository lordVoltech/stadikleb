<?php
// Pastikan sesi sudah dimulai di config.php atau tambahkan session_start() di sini
// session_start(); 
require 'config.php'; // Path disesuaikan menjadi satu level ke atas
// Pastikan fungsi check_login() ada di config.php atau di-include terpisah
check_login();

// Query untuk mengambil data booking user yang sedang login
// Menggunakan u.id untuk JOIN dan b.user_id untuk WHERE agar lebih eksplisit
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : 0; // Pastikan $_SESSION['id'] tersedia
$result = $conn->query("SELECT b.id, b.nama_kendaraan, b.jenis_service, b.status, b.tanggal, u.email 
                        FROM bookings b JOIN users u ON b.user_id = u.id 
                        WHERE b.user_id = '$user_id'");

// Logika untuk membatalkan booking (dari booking-admin.php, jika perlu dipertahankan)
// Jika fungsionalitas ini tidak untuk user biasa, bisa dihapus atau diubah ke Edit/Hapus
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_status"])) {
    $id_to_update = $conn->real_escape_string($_POST["booking_id"]); // Menggunakan nama variabel berbeda
    $status_to_set = 'Dibatalkan';

    $update_query = "UPDATE bookings SET status='$status_to_set' WHERE id='$id_to_update'";
    if ($conn->query($update_query) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Gagal membatalkan booking: " . $conn->error . "');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LuxuryAuto User Dashboard</title> <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icons.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">

      <?php include '_sidebar.html'; ?> <div class="container-fluid page-body-wrapper">
        <?php include '_navbar.html'; ?> <div class="main-panel">
          <div class="content-wrapper">
            
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

            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between align-items-center mb-4">
                      <h4 class="card-title mb-0">Daftar Booking Service</h4>
                      <h5 class="text-muted mb-0">Selamat datang, <?php echo $_SESSION["nama"]; ?>!</h5>
                    </div>
                    <a href='tambah.php' class="btn btn-primary btn-sm mb-3">+ Tambah Booking</a> 
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>ID Booking</th>
                            <th>Nama Kendaraan</th>
                            <th>Jenis Service</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          if ($result->num_rows > 0) {
                              while ($row = $result->fetch_assoc()) {
                                  // Menentukan kelas CSS berdasarkan status
                                  $status_class = '';
                                  switch ($row['status']) {
                                      case 'Pending':
                                          $status_class = 'badge badge-warning';
                                          break;
                                      case 'Dibatalkan':
                                          $status_class = 'badge badge-danger';
                                          break;
                                      case 'Selesai':
                                          $status_class = 'badge badge-success';
                                          break;
                                      default:
                                          $status_class = 'badge badge-info'; // Untuk status lain
                                          break;
                                  }
                                  
                                  echo "<tr>";
                                  echo "<td>{$row['id']}</td>";
                                  echo "<td>{$row['nama_kendaraan']}</td>";
                                  echo "<td>{$row['jenis_service']}</td>";
                                  echo "<td>{$row['tanggal']}</td>";
                                  echo "<td><label class='$status_class'>{$row['status']}</label></td>"; // Menambahkan badge
                                  echo "<td>";
                                  // Menggunakan link Edit dan Hapus sesuai permintaanmu
                                  echo "<a href='booking-admin-edit.php?id={$row['id']}' class='btn btn-info btn-sm me-2'>Edit</a>";  
                                  echo "<a href='booking-admin-hapus.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Hapus data?\")'>Hapus</a>";
                                  echo "</td>";
                                  echo "</tr>";
                              }
                          } else {
                              echo "<tr><td colspan='6' class='text-center'>Belum ada booking service.</td></tr>";
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
          
          <?php include '_footer.html'; ?> </div>
        </div>
      </div>
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/chart.js/chart.umd.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="assets/js/proBanner.js"></script>
    <script src="assets/js/dashboard.js"></script>
    </body>
</html>