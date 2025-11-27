      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-sm-6">
                <h3 class="mb-0">Edit Mahasiswa</h3>
              </div>
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Mahasiswa</li>
                </ol>
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-12">
                <!--begin::Card-->
                <div class="card">
                  <!--begin::Card Header-->
                  <div class="card-header">
                    <!--end::Card Title-->
                    <!--begin::Card Toolbar-->
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                      </button>
                    </div>
                    <!--end::Card Toolbar-->
                  </div>
                  <!--end::Card Header-->
                  <!--begin::Card Body-->
                  <div class="card-body">
                    <!--begin::Row-->
                    <div class="row">
                      <!--begin::Col-->
                      <!--end::Col-->
                      <div class="col-lg-6">
                        <form action="#" method="post">
                          <?php
                          $idx = $_GET['id'];
                          require_once "../config.php";

                          $sql = "SELECT * FROM mahasiswa WHERE id='$idx'";
                          $data = $db->query($sql);
                          foreach ($data as $d) {
                            switch ($d['prodi']) {
                              case '1': $prodi="Informatika"; $inf="selected"; break;
                              case '2': $prodi="Arsitektur"; $ars="selected"; break;
                              case '3': $prodi="Ilmu Lingkungan"; $ilk="selected"; break;
                            }
                            if ($d['gender'] == 'L') {
                              $l = "checked";
                              $p = "";
                            } else {
                              $l = "";
                              $p = "checked";
                            }
                          }

                          // Jika tombol simpan ditekan
                          if ($_POST['simpanEdit']) {
                            $nim = $_POST['nim'];
                            $nama = $_POST['nama'];
                            $jk = $_POST['jk'];
                            $prodi = $_POST['prodi'];
                            $alamat = $_POST['alamat'];

                            $sql = "UPDATE mahasiswa SET NIM='$nim', nama='$nama', gender='$jk', prodi='$prodi', alamat='$alamat' WHERE id='$idx'";
                            $hasil = $db->query($sql);
                            if ($hasil) {
                              echo "<script>window.location.href='./?p=mahasiswa';</script>";
                            }
                          }
                          ?>

                          <form action="#" method="post">
                            <table class='table table-striped table-hover'>
                              <tr>
                                <td>NIM</td>
                                <td><input type='number' name='nim' value='<?= $d['NIM'] ?>'></td>
                              </tr>
                              <tr>
                                <td>Nama</td>
                                <td><input type='text' name='nama' value='<?= $d['nama'] ?>'></td>
                              </tr>
                              <tr>
                                <td>Jenis Kelamin</td>
                                <td>
                                  <input type='radio' name='jk' value='L' <?= $l ?>> Laki-laki
                                  <input type='radio' name='jk' value='P' <?= $p ?>> Perempuan
                                </td>
                              </tr>
                              <tr>
                                <td>Prodi</td>
                                <td>
                                  <select name='prodi'>
                                    <option value='1' <?= $inf ?>>Informatika</option>
                                    <option value='2' <?= $ars ?>>Arsitektur</option>
                                    <option value='3' <?= $ilk ?>>Ilmu Lingkungan</option>
                                  </select>
                                </td>
                              </tr>
                              <tr>
                                <td>Alamat</td>
                                <td><textarea name='alamat'><?= $d['alamat'] ?></textarea></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td><input type='submit' name='simpanEdit' value='Simpan Perubahan' class='btn btn-primary'></td>
                              </tr>
                            </table>
                          </form>
                          <a href="./?p=mahasiswa">
                            <input type="submit" class="btn btn-primary" value="kembali">
                          </a>
                        </form>
                      </div>
                      <!--begin::Col-->
                      <div class="col-md-6">
                        <div id="sidebar-color-code" class="w-100"></div>
                      </div>
                      <!--end::Col-->
                    </div>
                    <!--end::Row-->
                  </div>
                  <!--end::Card Body-->
                  <!--begin::Card Footer-->

                  <!--end::Card Footer-->
                </div>
                <!--end::Card-->
                <!--end::Card-->
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>