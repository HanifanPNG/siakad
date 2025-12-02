      <style>
        .hover-scale {
          transition: transform 0.3s ease;
        }

        .hover-scale:hover {
          transform: scale(1.03);
        }
        .bg-biru{
          background: linear-gradient(to right, #09427bff, #0b62ccff);
        }
        .bg-ijo{
          background: linear-gradient(to right, #117032ff, #0c9d3aff);
        }
        .bg-oren{
          background: linear-gradient(to right, #b58706ff, #dfcf1aff);
        }
      </style>

<?php 
require_once "../config.php";
$total_dosen = $db->query("select count(*) as jumlah_dosen from dosen")->fetch_assoc()['jumlah_dosen'];
$total_mhs = $db->query("select count(*) as jumlah_mhs from mahasiswa")->fetch_assoc()['jumlah_mhs'];
$total_pegawai = $db->query("select count(*) as jumlah_pegawai from pegawai")->fetch_assoc()['jumlah_pegawai'];
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
                <h3 class="mb-0">Dashboard Admin</h3>
              </div>
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard Admin</li>
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

                      <!-- Total dosen -->
                      <div class="col-md-4 mb-3">
                        <div class="bg-ijo text-white p-4 rounded hover-scale">
                          <div class="d-flex align-items-center justify-content-between">
                            <div>
                              <h4 class="fw-bold mb-1">Jumlah Data Dosen</h4>
                            </div>
                            <i class="bi bi-clipboard-data fs-1 opacity-75"></i>
                          </div>
                          <div class="justify-content-center align-items-center d-flex">
                            <h2 class="fw-bold mt-3 mb-0 "><?= $total_dosen ?></h2>
                          </div>
                        </div>
                      </div>

                      <!-- Total mhs -->
                      <div class="col-md-4 mb-3">
                        <div class="bg-biru text-white p-4 rounded hover-scale">
                          <div class="d-flex align-items-center justify-content-between">
                            <div>
                              <h4 class="fw-bold mb-1">Jumlah Data Mahasiswa</h4>
                            </div>
                            <i class="bi bi-clipboard-data fs-1 opacity-75"></i>
                          </div>
                          <div class="justify-content-center align-items-center d-flex">
                            <h2 class="fw-bold mt-3 mb-0 "><?= $total_mhs ?></h2>
                          </div>
                        </div>
                      </div>
                      <!-- Total pegawai -->
                      <div class="col-md-4 mb-3">
                        <div class="bg-oren text-white p-4 rounded hover-scale">
                          <div class="d-flex align-items-center justify-content-between">
                            <div>
                              <h4 class="fw-bold mb-1">Jumlah Data Pegawai</h4>
                            </div>
                            <i class="bi bi-clipboard-data fs-1 opacity-75"></i>
                          </div>
                          <div class="justify-content-center align-items-center d-flex">
                            <h2 class="fw-bold mt-3 mb-0 "><?= $total_pegawai ?></h2>
                          </div>
                        </div>
                      </div>


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