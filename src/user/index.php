<?php
require '../../config.php'; // Pastikan path ke config.php sudah benar relatif dari lokasi file ini
check_login(); // Pastikan fungsi check_login() ada di config.php atau di-include terpisah

// Query untuk mengambil semua data pengguna (users)
$result = $conn->query("SELECT * FROM users");   
                        
?>

  <body>
    <div class="container-scroller">

      <!-- partial:_sidebar.html -->
      <?php include '../_sidebar.html'; ?> <!-- Pastikan path ini benar relatif dari lokasi file ini -->

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:_navbar.html -->
        <?php include '../_navbar.html'; ?> <!-- Pastikan path ini benar relatif dari lokasi file ini -->

        
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
          <?php include '../_footer.html'; ?> <!-- Pastikan path ini benar relatif dari lokasi file ini -->
         