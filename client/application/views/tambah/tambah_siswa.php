
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $judul_daftar ?></h1>
            
          </div>

          <!-- Content Row -->
        <div class="card shadow  mb-4">
        <form class="user" id="form_tambah_siswa" method="POST" action="<?= base_url(); ?>admin/tambah_siswa" enctype="multipart/form-data">
          <div class="row mb-2 mt-4 ml-2 mr-2">

            <div class="col-lg-8">
                <div class="form-group">
                  <label class="control-label col-md-3" 
                    for="nama_barang">*NIS : </label>
                  <div class="col-md-8">
                    <input type="number" class="form-control reset" autocomplete="off" id="nis_siswa"  
                      name="nis_siswa" placeholder="NIS siswa ..." required value="<?= set_value('nis_siswa'); ?>">
                  </div>
                </div>
  
                <div class="form-group">
                  <label class="control-label col-md-4" 
                    for="harga_barang">*Nama siswa : </label>
                  <div class="col-md-8">
                   <input type="text" class="form-control reset" autocomplete="off"  id="nama_siswa"  
                      name="nama_siswa" placeholder="Nama siswa ..." required value="<?= set_value('nama_siswa'); ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4" 
                    for="harga_barang">*Jenis Kelamin : </label>
                  <div class="col-md-8">
                   <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio1" name="jenis_kelamin" value="L"  <?= set_value('jenis_kelamin') == 'L'? "checked" : ""; ?> class="custom-control-input">
                      <label class="custom-control-label" for="customRadio1">Laki - laki</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio2" name="jenis_kelamin" value="P" <?= set_value('jenis_kelamin') == 'P'? "checked" : ""; ?> class="custom-control-input">
                      <label class="custom-control-label" for="customRadio2">Perempuan</label>
                    </div>
                  </div>
                </div>
             
          

                <div class="form-group">
                  <label class="control-label col-md-4" for="tgl_surat">*Tanggal Lahir :</label>
                  <div class="col-md-8">
                    <input type="date" class="form-control reset" name="tgl_lahir" id="tgl_lahir" required value="<?= set_value('tgl_lahir'); ?>">
                  </div>
                </div>

            </div><!-- end col-md-8 -->


            <div class="col-md-4 mb">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="total" class="besar">*Nomor Telpon :</label>
                    <input type="number" class="form-control reset" 
                    name="nomer_telp" id="nomer_telp" placeholder="No telpon ..." required value="<?= set_value('nomer_telp'); ?>">
                </div>

                <div class="form-group">
                  <label>Foto siswa :</label>
                    <input type="file" class="form-control reset" name="foto_siswa" id="foto_siswa" accept="image/x-png,image/gif,image/jpeg" required value="<?= set_value('foto_siswa'); ?>">
                </div>

                <?= $data_guru ?>

                    <hr>
                    <button type="button" class="btn btn-primary btn-icon-split" id="button_tambah_siswa">
                      <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                      </span>
                      <span class="text" >Tambah Data</span>
                    </button>
                  </form>
                
              </div>
                <br>
                <b><p>Note : Tanda bintang (*) harap diisi! </p></b>
                
            </div>
          </div>
        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->