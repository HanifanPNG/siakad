      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-sm-6"><h3 class="mb-0">Tambah Pegawai</h3></div>
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tambah Pegawai</li>
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
                      <!--begin::Col-->
                     <?php
                      if($_POST['simpan']){
                        $NIP=$_POST['NIP'];
                        $nama_pegawai=$_POST['nama_pegawai'];
                        $jk=$_POST['jk'];
                        $alamat=$_POST['alamat'];

                        require_once "../config.php";
                        $waktu=date("Y-m-d H:i:s");
                        $sql="insert into pegawai set NIP='$NIP', nama_pegawai='$nama_pegawai', gender='$jk', alamat='$alamat', waktu='$waktu'";
                        $a=$db->query($sql);
                        if($a){
                          echo "<div class='alert alert-success'>Data Berhasil Disimpan✅ <br>
                          <a href='./?p=pegawai'>Lihat Data</a></div>";
                        }
                      }
                      ?>

                      <form action="#" method="post">
                        <table>
                          <tr><td>NIP</td><td><input type="number" name="NIP" class="form-control" value="<?=$NIP?>"></td></tr>
                          <tr><td>Nama Pegawai</td><td><input type="text" name="nama_pegawai" class="form-control" value="<?=$nama_pegawai?>"></td></tr>
                          <tr><td>Jenis Kelamin</td><td>
                            <input type="radio" name="jk" value="L" id="jkL"<?php if($jk=="L") echo "checked";?>>
                            <label for="jkL">Laki-laki</label>
                            <input type="radio" name="jk" value="P" id="jkP"<?php if($jk=="P") echo "checked";?>>
                            <label for="jkP">Perempuan</label>    
                          </td></tr>
                          <tr><td>alamat</td><td>
                            <input type="text" name="alamat" class="form-control" value="<?= $alamat?>">
                          </td></tr>
                          <tr><td>
                          </td><td><button type="submit" name="simpan" value="Simpan" class="btn btn-primary mt-2">Simpan</button></td></tr>
                        </table>
                      </form>

                      <!--end::Col-->
                      <!--begin::Col-->
                      <div class="col-md-6"><div id="sidebar-color-code" class="w-100"></div></div>
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