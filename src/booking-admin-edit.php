<?php
require 'config.php'; // Pastikan path ke config.php sudah benar
check_login(); // Pastikan fungsi check_login() ada di config.php atau di-include terpisah

// Ambil ID dari URL
$id = isset($_GET["id"]) ? $conn->real_escape_string($_GET["id"]) : '';

// Jika tidak ada ID, redirect atau tampilkan pesan error
if (empty($id)) {
    // header("Location: index.php"); // Atau ke halaman daftar booking
    // exit;
    // Untuk tujuan demo, Ranni akan biarkan pesan error
    $form_message = "ID Booking tidak ditemukan. Tidak dapat mengedit.";
    $message_type = "error";
    $data = null; // Set data menjadi null agar form tidak error
} else {
    // Ambil data booking berdasarkan ID
    $result_data = $conn->query("SELECT * FROM bookings WHERE id='$id'");
    if ($result_data->num_rows > 0) {
        $data = $result_data->fetch_assoc();
    } else {
        $form_message = "Data booking dengan ID '$id' tidak ditemukan.";
        $message_type = "error";
        $data = null; // Set data menjadi null agar form tidak error
    }
}

// Logika untuk mengupdate status booking
$form_message = "";
$message_type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($data) { // Pastikan data booking ditemukan sebelum update
        $status = $conn->real_escape_string($_POST["status"]);
        
        $update_query = "UPDATE bookings SET status='$status' WHERE id='$id'";
        if ($conn->query($update_query) === TRUE) {
            $form_message = "Status booking berhasil diperbarui!";
            $message_type = "success";
            // Refresh data setelah update
            $result_data = $conn->query("SELECT * FROM bookings WHERE id='$id'");
            $data = $result_data->fetch_assoc();
        } else {
            $form_message = "Error memperbarui status: " . $conn->error;
            $message_type = "error";
        }
    } else {
        $form_message = "Tidak dapat memperbarui: Data booking tidak valid.";
        $message_type = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LuxuryAuto Admin - Edit Booking</title> <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
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
                    <h4 class="card-title mb-4">Edit Booking Service (ID: <?php echo htmlspecialchars($id); ?>)</h4> <?php
                    // Menampilkan pesan form (sukses/gagal)
                    if (!empty($form_message)) {
                        $text_color = ($message_type == "success") ? "text-success" : "text-danger"; // Menggunakan class template
                        echo '<p class="' . $text_color . ' text-center mb-4">' . $form_message . '</p>';
                    }
                    ?>

                    <?php if ($data): ?>
                    <form method="post">
                        <div class="form-group">
                            <label for="nama_kendaraan">Nama Kendaraan</label>
                            <input type="text" class="form-control" id="nama_kendaraan" value="<?php echo htmlspecialchars($data['nama_kendaraan']); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jenis_service">Jenis Service</label>
                            <input type="text" class="form-control" id="jenis_service" value="<?php echo htmlspecialchars($data['jenis_service']); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" value="<?php echo htmlspecialchars($data['tanggal']); ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="status">Ubah Status Booking</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="Diproses" <?php if ($data['status'] == 'Diproses') echo 'selected'; ?>>Diproses</option>
                                <option value="Selesai" <?php if ($data['status'] == 'Selesai') echo 'selected'; ?>>Selesai</option>
                                <option value="Menunggu Suku Cadang" <?php if ($data['status'] == 'Menunggu Suku Cadang') echo 'selected'; ?>>Menunggu Suku Cadang</option>
                                <option value="Dibatalkan" <?php if ($data['status'] == 'Dibatalkan') echo 'selected'; ?>>Dibatalkan</option>
                                <option value="Pending" <?php if ($data['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Perbarui Status</button>
                        <a href="index.php" class="btn btn-dark">Kembali ke Daftar Booking</a>
                    </form>
                    <?php else: ?>
                        <p class="text-center text-danger">Tidak dapat menampilkan form edit karena data booking tidak ditemukan atau ID tidak valid.</p>
                    <?php endif; ?>
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