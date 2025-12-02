<?php
require_once "../config.php";

$keyword = $_POST['keyword'] ?? '';
$category = $_POST['category'] ?? '';
$sql = "select * from pegawai";
$pesan = "";

if (isset($_POST["tombol-cari"])) {
  if (!empty($keyword) and !empty($category)) {
      $sql = "select * from pegawai where $category like '%$keyword%'";
    }
  }

$data = $db->query($sql);
$jumlah_data = $data->num_rows;

if (($_POST["tombol-cari"]) && !empty($keyword)) {
  if ($jumlah_data > 0) {
    $pesan = "<p style='color:green;margin-top:8px;'>✅ Data dengan kata kunci <b>$keyword</b> ditemukan di kategori <b>$category</b></p>";
  } else {
    $pesan = "<p style='color:red;margin-top:8px;'>❌ Data dengan kata kunci <b>$keyword</b> tidak ditemukan di kategori <b>$category</b>.</p>";
  }
}
?>

<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Dashboard Pegawai</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard Pegawai</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="app-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
               Data Pegawai UIN Saizu
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                  <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                  <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                </button>
              </div>
            </div>

            <div class="card-body">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="table-responsive">
                    <form action="#" method="post">
                      <table>
                        <tr>
                          <td>
                            <a href="./?p=tambah_pegawai">
                              <div class="bg-primary d-inline-block p-1 rounded-2 text-white cursor-pointer px-1 py-2">
                                 Tambah Pegawai
                              </div>
                            </a>
                          </td>
                          <td width="8"></td>
                          <td><input type="text" placeholder="Masukan kata kunci..." class="form-control w-100" name="keyword" style="width: 200px;" value="<?= $keyword ?>"></td>
                          <td>
                            <select name="category" class="form-control w-100">
                              <option value="NIP" <?php if ($category == "NIP") echo "selected" ?>>NIP</option>
                              <option value="nama_pegawai" <?php if ($category == "nama_pegawai") echo "selected" ?>>NAMA</option>
                              <option value="gender" <?php if ($category == "gender") echo "selected" ?>>JENIS KELAMIN</option>
                            </select>
                          </td>
                          <td><input type="submit" value="cari" name="tombol-cari" class="mx-2 py-1 px-2 rounded-1"></td>
                        </tr>
                      </table>

                      <?= $pesan ?>

                      <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>NIP</th>
                            <th>Nama Pegawai</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Opsi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $nomor = 0;
                          if ($jumlah_data > 0) {
                            foreach ($data as $d) {
                              $nomor++;

                              echo "<tr>
                                      <td>$nomor</td>
                                      <td>$d[NIP]</td>
                                      <td>$d[nama_pegawai]</td>
                                      <td>$d[gender]</td>
                                      <td>$d[alamat]</td>
                                      <td>
                                        <a href='./?p=detail_pegawai&id=$d[id]' class='btn btn-xs btn-info'>Detail</a>
                                        <a href='./?p=edit_pegawai&id=$d[id]' class='btn btn-xs btn-warning'>Edit</a>
                                        <a href='./?p=hapus_pegawai&id=$d[id]' class='btn btn-xs btn-danger' onclick=\"return confirm('apakah data akan dihapus?')\">Hapus</a>
                                      </td>
                                    </tr>";
                            }
                          } else {
                            echo "<tr><td colspan='6' style='text-align:center;color:gray;'>Tidak ada data yang sesuai</td></tr>";
                          }
                          ?>
                        </tbody>
                      </table>

                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</main>
