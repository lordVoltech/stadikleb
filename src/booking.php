<?php
// Asumsi file ini ada di htdocs/LuxuryAuto/admin/booking.php
require 'config.php'; // Path ini sekarang menjadi 'config.php'
check_login(); // Pastikan fungsi check_login() ada di config.php atau di-include terpisah

// Ambil ID pengguna (user_id) dari URL
$user_id = isset($_GET["id"]) ? $conn->real_escape_string($_GET["id"]) : '';
$user_name = "Pengguna"; // Default name, akan diupdate jika user ditemukan

// Inisialisasi variabel untuk pesan feedback
$form_message = "";
$message_type = ""; // 'success' atau 'error'

// Cek apakah ID pengguna diberikan
if (empty($user_id)) {
    $form_message = "ID Pengguna tidak ditemukan. Tidak dapat menampilkan daftar booking.";
    $message_type = "error";
    $result_bookings = null; // Set result menjadi null agar tabel tidak error
} else {
    // Ambil nama pengguna untuk ditampilkan di judul
    $user_name_result = $conn->query("SELECT nama FROM users WHERE id='$user_id'");
    if ($user_name_result->num_rows > 0) {
        $temp_user = $user_name_result->fetch_assoc();
        $user_name = htmlspecialchars($temp_user['nama']);
    }

    // Query untuk mengambil data booking berdasarkan user_id
    $result_bookings = $conn->query("SELECT b.id, b.nama_kendaraan, b.jenis_service, b.status, b.tanggal 
                                     FROM bookings b 
                                     WHERE b.user_id='$user_id' ORDER BY b.tanggal DESC");
    if (!$result_bookings) {
        $form_message = "Error saat mengambil data booking: " . $conn->error;
        $message_type = "error";
    }
}

// Catatan: Logika POST untuk UPDATE users (nama, email, no_telp, password)
// yang ada di booking.php sebelumnya sudah DIHAPUS karena tidak relevan di halaman ini.
// Halaman ini hanya untuk menampilkan dan mengelola booking.
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LuxuryAuto Admin - Booking <?php echo $user_name; ?></title> <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
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
                      <h4 class="card-title mb-0">Daftar Booking untuk <?php echo $user_name; ?></h4>
                      <h5 class="text-muted mb-0">Admin Panel</h5>
                    </div>
                    
                    <?php
                    // Menampilkan pesan form (sukses/gagal/info)
                    if (!empty($form_message)) {
                        $text_color = ($message_type == "success") ? "text-success" : "text-danger"; 
                        echo '<p class="' . $text_color . ' text-center mb-4">' . $form_message . '</p>';
                    }
                    ?>

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
                          // Pastikan $result_bookings adalah objek mysqli_result yang valid
                          if ($result_bookings && $result_bookings->num_rows > 0) {
                              while ($row = $result_bookings->fetch_assoc()) {
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
                                      case 'Diproses':
                                          $status_class = 'badge badge-primary';
                                          break;
                                      case 'Menunggu Suku Cadang':
                                          $status_class = 'badge badge-info';
                                          break;
                                      default:
                                          $status_class = 'badge badge-secondary'; // Untuk status lain
                                          break;
                                  }
                                  
                                  echo "<tr>";
                                  echo "<td>{$row['id']}</td>";
                                  echo "<td>{$row['nama_kendaraan']}</td>";
                                  echo "<td>{$row['jenis_service']}</td>";
                                  echo "<td>{$row['tanggal']}</td>";
                                  echo "<td><label class='$status_class'>{$row['status']}</label></td>"; 
                                  echo "<td>";
                                  // Link Aksi: Edit dan Hapus Booking
                                  // Asumsi booking-admin-tambah.php sekarang adalah untuk edit status booking
                                  echo "<a href='booking-admin-tambah.php?id={$row['id']}' class='btn btn-warning btn-sm me-2'>Edit Status</a>";  
                                  // Asumsi ada file booking-admin-hapus.php untuk menghapus booking
                                  echo "<a href='booking-admin-hapus.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus booking ini?\")'>Hapus</a>"; 
                                  echo "</td>";
                                  echo "</tr>";
                              }
                          } else {
                              echo "<tr><td colspan='6' class='text-center'>Belum ada booking service untuk pengguna ini.</td></tr>";
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