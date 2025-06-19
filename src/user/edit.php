<?php
// Asumsi file ini ada di namaproject/admin/edit-user.php
require '../../config.php'; // Pastikan path ke config.php sudah benar (dua level ke atas)
check_login(); // Pastikan fungsi check_login() ada di config.php atau di-include terpisah

// Inisialisasi variabel untuk pesan feedback
$form_message = "";
$message_type = ""; // 'success' atau 'error'

// Ambil ID pengguna dari URL
$id = isset($_GET["id"]) ? $conn->real_escape_string($_GET["id"]) : '';
$user_data = null; // Variabel untuk menyimpan data pengguna

if (empty($id)) {
    $form_message = "ID pengguna tidak ditemukan. Tidak dapat mengedit.";
    $message_type = "error";
} else {
    // Ambil data pengguna berdasarkan ID
    $result_user_data = $conn->query("SELECT * FROM users WHERE id=$id");
    if ($result_user_data->num_rows === 1) {
        $user_data = $result_user_data->fetch_assoc();
    } else {
        $form_message = "Data pengguna dengan ID '$id' tidak ditemukan.";
        $message_type = "error";
        $user_data = null; // Pastikan data null jika tidak ditemukan
    }
}

// Logika untuk mengupdate data pengguna
if ($_SERVER["REQUEST_METHOD"] == "POST" && $user_data) { // Pastikan user_data ada sebelum update
    $nama = $conn->real_escape_string($_POST["nama"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $no_telp = $conn->real_escape_string($_POST["no_telp"]);
    $password_input = $_POST["password"]; // Password dari form

    // Cek apakah email atau no_telp sudah ada di user lain
    $check_duplicate_email = $conn->query("SELECT id FROM users WHERE email='$email' AND id != $id");
    $check_duplicate_no_telp = $conn->query("SELECT id FROM users WHERE no_telp='$no_telp' AND id != $id");

    if ($check_duplicate_email->num_rows > 0) {
        $form_message = "Email sudah digunakan oleh pengguna lain!";
        $message_type = "error";
    } elseif ($check_duplicate_no_telp->num_rows > 0) {
        $form_message = "Nomor Telepon sudah digunakan oleh pengguna lain!";
        $message_type = "error";
    } else {
        $update_query = "";
        if (!empty($password_input)) {
            // Jika password diisi, update juga passwordnya
            $password_hashed = password_hash($password_input, PASSWORD_DEFAULT);
            $update_query = "UPDATE users SET nama='$nama', email='$email', no_telp='$no_telp', password='$password_hashed' WHERE id=$id";
        } else {
            // Jika password tidak diisi, jangan update password (biarkan password lama)
            $update_query = "UPDATE users SET nama='$nama', email='$email', no_telp='$no_telp' WHERE id=$id";
        }

        if ($conn->query($update_query) === TRUE) {
            $form_message = "Data pengguna berhasil diperbarui!";
            $message_type = "success";
            // Setelah update, refresh data pengguna untuk menampilkan perubahan terbaru di form
            $result_user_data = $conn->query("SELECT * FROM users WHERE id=$id");
            $user_data = $result_user_data->fetch_assoc();
        } else {
            $form_message = "Error memperbarui data: " . $conn->error;
            $message_type = "error";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LuxuryAuto Admin - Edit User</title> <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
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

      <?php include '../_sidebar.html'; ?> <div class="container-fluid page-body-wrapper">
        <?php include '../_navbar.html'; ?> <div class="main-panel">
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
                    <h4 class="card-title mb-4">Edit Data Pengguna (ID: <?php echo htmlspecialchars($id); ?>)</h4>
                    
                    <?php
                    // Menampilkan pesan form (sukses/gagal)
                    if (!empty($form_message)) {
                        $text_color = ($message_type == "success") ? "text-success" : "text-danger"; // Menggunakan class template
                        echo '<p class="' . $text_color . ' text-center mb-4">' . $form_message . '</p>';
                    }
                    ?>

                    <?php if ($user_data): // Tampilkan form hanya jika data pengguna ditemukan ?>
                    <form method="post">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($user_data['nama']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user_data['email']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">Nomor Telepon</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo htmlspecialchars($user_data['no_telp']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password (Biarkan kosong jika tidak ingin diubah)</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password baru jika ingin mengubah">
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Update Data</button>
                        <a href="booking-admin.php" class="btn btn-dark">Kembali ke Daftar Pengguna</a> </form>
                    <?php else: ?>
                        <p class="text-center text-danger">Tidak dapat menampilkan form edit karena data pengguna tidak ditemukan atau ID tidak valid.</p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>


          </div>
          <?php include '../_footer.html'; ?> </div>
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