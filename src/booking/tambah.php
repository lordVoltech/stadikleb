<?php
require '../config.php'; // Pastikan path ke config.php sudah benar
check_login(); // Pastikan fungsi check_login() ada di config.php atau di-include terpisah

$email = $_SESSION["email"];
$id_user = $_SESSION["id"]; // Menggunakan $id_user agar tidak bentrok dengan $id booking

// Inisialisasi variabel untuk pesan feedback
$form_message = "";
$message_type = ""; // 'success' atau 'error'

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Generasi ID Booking yang lebih unik
    $booking_id = 'BKG-' . $id_user . "-" . bin2hex(random_bytes(5)); 
    $nama_kendaraan = $conn->real_escape_string($_POST["nama_kendaraan"]);
    $jenis_service = $conn->real_escape_string($_POST["jenis_service"]);
    $tanggal = $conn->real_escape_string($_POST["tanggal"]);
    $status = 'Pending'; // Status awal saat booking

    // Ambil user_id dari session, bukan dari query lagi (karena sudah punya $_SESSION["id"])
    $user_id_from_session = $_SESSION["id"]; 

    $insert_query = "INSERT INTO bookings (id, nama_kendaraan, jenis_service, tanggal, user_id, status) 
                     VALUES ('$booking_id', '$nama_kendaraan', '$jenis_service', '$tanggal', '$user_id_from_session', '$status')";
    
    if ($conn->query($insert_query) === TRUE) {
        $form_message = "Booking berhasil ditambahkan!";
        $message_type = "success";
        // Opsional: Redirect ke halaman index setelah sukses
        header("Location: index.php");
        exit;
    } else {
        $form_message = "Error: " . $insert_query . "<br>" . $conn->error;
        $message_type = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LuxuryAuto User Dashboard - Tambah Booking</title> <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icons.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">

      <?php include '../partials/_sidebar.html'; ?> <div class="container-fluid page-body-wrapper">
        <?php include '../partials/_navbar.html'; ?> <div class="main-panel">
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
                    <h4 class="card-title mb-4">Tambah Booking Service</h4>
                    
                    <?php
                    // Menampilkan pesan form (sukses/gagal)
                    if (!empty($form_message)) {
                        $text_color = ($message_type == "success") ? "text-success" : "text-danger"; // Menggunakan class template
                        echo '<p class="' . $text_color . ' text-center mb-4">' . $form_message . '</p>';
                    }
                    ?>

                    <form method="post">
                        <div class="form-group">
                            <label for="nama_kendaraan">Nama Kendaraan</label>
                            <input type="text" class="form-control" id="nama_kendaraan" name="nama_kendaraan" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_service">Jenis Service</label>
                            <select class="form-control" id="jenis_service" name="jenis_service" required>
                                <option value="">-- Pilih Jenis Service --</option>
                                <option value="Servis Ringan">Servis Ringan</option>
                                <option value="Servis Besar">Servis Besar</option>
                                <option value="Tune Up">Tune Up</option>
                                <option value="Penggantian Suku Cadang">Penggantian Suku Cadang</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Simpan Booking</button>
                        <a href="index.php" class="btn btn-dark">Batal</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>


          </div>
          <?php include '../partials/_footer.html'; ?> </div>
        </div>
      </div>
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assets/vendors/chart.js/chart.umd.js"></script>
    <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <script src="../assets/js/proBanner.js"></script>
    <script src="../assets/js/dashboard.js"></script>
    </body>
</html>