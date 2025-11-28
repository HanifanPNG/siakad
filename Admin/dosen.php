<?php
require_once "../config.php";

$keyword = $_POST['keyword'] ?? '';
$category = $_POST['category'] ?? '';
$sql = "SELECT * FROM dosen";
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
      } else {
        $prodi = "prodi tidak diketahui";
      }
      $sql = "SELECT * FROM dosen WHERE $category LIKE '%$prodi%'";
    } else {
      $sql = "SELECT * FROM dosen WHERE $category LIKE '%$keyword%'";
    }
  }
}

$data = $db->query($sql);
$jumlah_data = $data->num_rows;

if (isset($_POST["tombol-cari"]) && !empty($keyword)) {
  if ($jumlah_data > 0) {
    $pesan = "<p style='color:green;margin-top:8px;'>✅ Data dengan kata kunci <b>$keyword</b> ditemukan di kategori <b>$category</b></p>";
  } else {
    $pesan = "<p style='color:red;margin-top:8px;'>❌ Data dengan kata kunci <b>$keyword</b> tidak ditemukan di kategori <b>$category</b>.</p>";
  }
}
?>


<main class="app-main">
  <!--begin::App Content Header-->
  <div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row">
        <!--begin::Col-->
        <div class="col-sm-6">
          <h3 class="mb-0">Dashboard Dosen</h3>
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard Dosen</li>
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
              Data Dosen UIN Saizu
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
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="table-responsive">
                    <form action="#" method="post">
                      <table>
                        <tr>
                          <td>
                            <a href="./?p=tambahDosen">
                              <div class="bg-primary d-inline-block p-1 rounded-2 text-white cursor-pointer px-1 py-2">
                                Tambah Dosen
                              </div>
                            </a>
                          </td>
                          <td width="8"></td>
                          <td><input type="text" placeholder="Masukan kata kunci..." class="form-control"
                              name="keyword" value="<?= $keyword ?>"></td>

                          <td>
                            <select name="category" class="form-control">
                              <option value="NIP" <?php if ($category == "NIP") echo "selected" ?>>NIP</option>
                              <option value="nama_dosen" <?php if ($category == "nama_dosen") echo "selected" ?>>Nama</option>
                              <option value="gender" <?php if ($category == "gender") echo "selected" ?>>Jenis Kelamin</option>
                              <option value="prodi" <?php if ($category == "prodi") echo "selected" ?>>Prodi</option>
                            </select>
                          </td>

                          <td><input type="submit" value="cari" name="tombol-cari"
                              class="mx-2 py-1 px-2 rounded-1"></td>
                        </tr>
                      </table>

                      <?= $pesan ?>

                      <table class="table table-striped table-hover mt-2">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIP</th>
                      <th>Nama Dosen</th>
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

                        if ($d['prodi'] == 1) $prodi = "INF";
                        elseif ($d['prodi'] == 2) $prodi = "ARS";
                        elseif ($d['prodi'] == 3) $prodi = "ILK";
                        else $prodi = "Prodi Tidak Diketahui";

                        echo "
                        <tr>
                          <td>$nomor</td>
                          <td>$d[NIP]</td>
                          <td>$d[nama_dosen]</td>
                          <td>$d[gender]</td>
                          <td>$prodi</td>
                          <td>
                            <a href='./?p=detailDosen&id=$d[id]' class='btn btn-xs btn-info'>Detail</a>
                            <a href='./?p=editDosen&id=$d[id]' class='btn btn-xs btn-warning'>Edit</a>
                            <a href='./?p=hapusDosen&id=$d[id]' class='btn btn-xs btn-danger'
                               onclick=\"return confirm('Hapus data ini?')\">Hapus</a>
                          </td>
                        </tr>";
                      }
                    } else {
                      echo "<tr><td colspan='6' style='text-align:center;color:gray;'>Tidak ada data</td></tr>";
                    }
                    ?>

                  </tbody>
                </table>

                    </form>
                  </div>
                </div>
                <!--begin::Col-->

                <!--end::Col-->
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