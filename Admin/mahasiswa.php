<?php
require_once "../config.php";

$keyword = $_POST['keyword'] ?? '';
$category = $_POST['category'] ?? '';
$sql = "select * from mahasiswa";
$pesan = "";

if (isset($_POST["tombol-cari"])) {
  if (!empty($keyword) and !empty($category)) {

    if ($category == "prodi") {
      if ($keyword == "INF") {
        $prodi = 1;
      } elseif ($keyword == "ARS") {
        $prodi = 2;
      } elseif ($keyword == "ILK") {
        $prodi = 3;
      } else{
        $prodi = "prodi tidak diketahui";
      }
      $sql = "select * from mahasiswa where $category like '%$prodi%'";
    } else {
      $sql = "select * from mahasiswa where $category like '%$keyword%'";
    }
  }
}

$data = $db->query($sql);
$jumlah_data = $data->num_rows;

// Tambahkan validasi pesan
if (($_POST["tombol-cari"])) {
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
          <h3 class="mb-0">Dashboard Mahasiswa</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard Mahasiswa</li>
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
                            <a href="./?p=tambahMhs">
                              <div class="bg-primary d-inline-block p-1 rounded-2 text-white cursor-pointer">
                                + Tambah
                              </div>
                            </a>
                          </td>
                          <td width="8"></td>
                          <td><input type="text" placeholder="Masukan kata kunci..." class="form-control w-100" name="keyword" style="width: 200px;" value="<?= $keyword ?>"></td>
                          <td>
                            <select name="category" class="form-control w-100">
                              <option value="NIM" <?php if ($category == "NIM") echo "selected" ?>>NIM</option>
                              <option value="nama" <?php if ($category == "nama") echo "selected" ?>>NAMA</option>
                              <option value="gender" <?php if ($category == "gender") echo "selected" ?>>JENIS KELAMIN</option>
                              <option value="prodi" <?php if ($category == "prodi") echo "selected" ?>>PRODI</option>
                            </select>
                          </td>
                          <td><input type="submit" value="cari" name="tombol-cari"></td>
                        </tr>
                      </table>

                      <!-- pesan hasil pencarian -->
                      <?= $pesan ?>

                      <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Prodi</th>
                            <th>Opsi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $nomor = 0;
                          if ($jumlah_data > 0) {
                            foreach ($data as $d) {
                              $nomor++;
                              if ($d['prodi'] == 1) {
                                $prodi = "INF";
                              } elseif ($d['prodi'] == 2) {
                                $prodi = "ARS";
                              } elseif ($d['prodi'] == 3) {
                                $prodi = "ILK";
                              } else {
                                $prodi = "Prodi Tidak Diketahui";
                              }

                              echo "<tr>
                                      <td>$nomor</td>
                                      <td>$d[NIM]</td>
                                      <td>$d[nama]</td>
                                      <td>$d[gender]</td>
                                      <td>$prodi</td>
                                      <td>
                                        <a href='./?p=detailMahasiswa&id=$d[id]' class='btn btn-xs btn-info'>Detail</a>
                                        <a href='./?p=editMahasiswa&id=$d[id]' class='btn btn-xs btn-warning'>Edit</a>
                                        <a href='./?p=hapusMahasiswa&id=$d[id]' class='btn btn-xs btn-danger' onclick=\"return confirm('apakah data akan dihapus?')\">Hapus</a>
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
