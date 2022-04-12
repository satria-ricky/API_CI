
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $judul_daftar ?></h1>
            
          </div>

          <!-- Content Row -->
          <div class="card shadow mb-4">
          <h5 class="mt-2 ml-2"> <b><u>Informasi Akun</u></b></h5>
          <div class="row mt-4 ml-2 mr-2">

            <div class="col-lg-10">
            
              <form class="user" id="form_tambah_guru" method="POST" action="<?= base_url(); ?>tes/tambah_guru" enctype="multipart/form-data">
                
               

            </div><!-- end col-md-8 -->

            
          </div>
        </div>


        
        <div class="card shadow">
        <h5 class="mt-2 ml-2"> <b><u>Informasi Detail</u></b></h5>
          <div class="row mb-2 mt-4 ml-2 mr-2">

            <div class="col-lg-8">
              <div class="form-group">
                  <label class="control-label col-md-3" 
                    for="nama_barang">*NIP Guru : </label>
                  <div class="col-md-8">
                    <input type="number" class="form-control reset" autocomplete="off" id="nip_guru"  
                      name="nip_guru" placeholder="NIP Guru ..." required value="<?= set_value('nip_guru'); ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4" 
                    for="harga_barang">*Nama Guru : </label>
                  <div class="col-md-8">
                   <input type="text" class="form-control reset" autocomplete="off"  id="nama_guru"  
                      name="nama_guru" placeholder="Nama Guru ..." required value="<?= set_value('nama_guru'); ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4" 
                    for="harga_barang">*Jenis Kelamin : </label>
                  <div class="col-md-8">
                   <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio1" name="jenis_kelamin" value="L" value="P" <?= set_value('jenis_kelamin') == 'L'? "checked" : ""; ?> class="custom-control-input">
                      <label class="custom-control-label" for="customRadio1">Laki - laki</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio2" name="jenis_kelamin" value="P" value="P" <?= set_value('jenis_kelamin') == 'P'? "checked" : ""; ?> class="custom-control-input">
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
                  <label>Foto Guru :</label>
                    <input type="file" class="form-control reset" name="foto_guru" id="foto_guru" accept="image/x-png,image/gif,image/jpeg" required value="<?= set_value('foto_guru'); ?>">
                </div>

                    <hr>
                    <button type="button" class="btn btn-primary btn-icon-split" id="button_tambah_guru">
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