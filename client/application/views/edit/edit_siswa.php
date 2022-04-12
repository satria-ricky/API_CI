
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $judul_daftar ?></h1>
            
          </div>

          <!-- Content Row -->
        <div class="card shadow  mb-4">
        <form class="user" id="form_edit_siswa" method="POST" enctype="multipart/form-data">
          <div class="row mb-2 mt-4 ml-2 mr-2">

            <div class="col-lg-7">
              <input type="hidden" value="<?= $data['id_siswa']; ?>" name="user_id">
                <div class="form-group">
                  <label class="control-label col-md-3" 
                    for="nama_barang">*NIS : </label>
                  <div class="col-md-8">
                    <input type="number" class="form-control reset" autocomplete="off" id="nis_siswa"  
                      name="nis_siswa" placeholder="NIS siswa ..." required value="<?= $data['nis_siswa']; ?>">
                  </div>
                </div>
  
                <div class="form-group">
                  <label class="control-label col-md-4" 
                    for="harga_barang">*Nama siswa : </label>
                  <div class="col-md-8">
                   <input type="text" class="form-control reset" autocomplete="off"  id="nama_siswa"  
                      name="nama_siswa" placeholder="Nama siswa ..." required value="<?= $data['nama_siswa']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4" 
                    for="harga_barang">*Jenis Kelamin : </label>
                  <div class="col-md-8">
                   <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio1" name="jenis_kelamin" value="L"  <?= set_value('jenis_kelamin', $data['jk_siswa']) == 'L'? "checked" : ""; ?> class="custom-control-input">
                      <label class="custom-control-label" for="customRadio1">Laki - laki</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio1" name="jenis_kelamin" value="P"  <?= set_value('jenis_kelamin', $data['jk_siswa']) == 'P'? "checked" : ""; ?> class="custom-control-input">
                      <label class="custom-control-label" for="customRadio1">Prempuan</label>
                    </div>
                  </div>
                </div>
             
          

                <div class="form-group">
                  <label class="control-label col-md-4" for="tgl_surat">*Tanggal Lahir :</label>
                  <div class="col-md-8">
                    <input type="date" class="form-control reset" name="tgl_lahir" id="tgl_lahir" required value="<?= $data['tgl_siswa']; ?>">
                  </div>
                </div>

            </div><!-- end col-md-8 -->


            <div class="col-md-4 mb">
            

              <div class="col-md-12">
                <div class="form-group">
                  <label for="total" class="besar">*Nomor Telpon :</label>
                    <input type="number" class="form-control reset" 
                    name="nomer_telp" id="nomer_telp" placeholder="No telpon ..." required value="<?= $data['telp_siswa']; ?>">
                </div>

                <div class="form-group">
                  <div class="card" style="width: 150px; height:150px; border: none;">
                <img  src="<?= base_url('assets/penyimpanan_foto/siswa/').$data['foto'] ?> " alt="...">
                </div>
                  <label>Foto siswa :</label>
                    <input type="file" class="form-control reset" name="foto_siswa" id="foto_siswa" accept="image/x-png,image/gif,image/jpeg" required value="<?= set_value('foto_siswa'); ?>">
                </div>

                <?= $data_guru ?>

                    <hr>
                    <button type="button" class="btn btn-primary btn-icon-split" id="button_edit_siswa">
                      <span class="icon text-white-50">
                        <i class="fas fa-edit"></i>
                      </span>
                      <span class="text" >Edit Data</span>
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