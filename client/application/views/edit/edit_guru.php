
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

            <div class="col-lg-9">
            
              <form class="user" id="form_edit_guru" method="POST" enctype="multipart/form-data">
                

            </div><!-- end col-md-8 -->

            <div class="col-md-2 mb-4">
              <div class="card" style="width: 150px; height:150px; border: none;">
              <img  src="<?= base_url('assets/penyimpanan_foto/guru/').$data['foto_guru'] ?> " alt="...">
            </div>
            </div>

            
          </div>
        </div>


        
        <div class="card shadow mb-2">
        <h5 class="mt-2 ml-2"> <b><u>Informasi Detail</u></b></h5>
          <div class="row mb-2 mt-4 ml-2 mr-2">

            <div class="col-lg-8">
              <div class="form-group">
                  <label class="control-label col-md-3" 
                    for="nama_barang">*NIP Guru : </label>
                  <div class="col-md-8">
                    <input type="number" class="form-control reset" autocomplete="off" id="nip_guru"  
                      name="nip_guru" placeholder="NIP Guru ..." required value="<?= $data['nip_guru']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4" 
                    for="harga_barang">*Nama Guru : </label>
                  <div class="col-md-8">
                   <input type="text" class="form-control reset" autocomplete="off"  id="nama_guru"  
                      name="nama_guru" placeholder="Nama Guru ..." required value="<?= $data['nama_guru']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4" 
                    for="harga_barang">*Jenis Kelamin : </label>
                  <div class="col-md-8">
                   <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio1" name="jenis_kelamin" value="L" class="custom-control-input" <?= set_value('jenis_kelamin', $data['jk_guru']) == 'L'? "checked" : ""; ?>>
                      <label class="custom-control-label" for="customRadio1">Laki - laki</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio2" name="jenis_kelamin" value="P" class="custom-control-input" <?= set_value('jenis_kelamin', $data['jk_guru']) == 'P'? "checked" : ""; ?> >
                      <label class="custom-control-label" for="customRadio2">Perempuan</label>
                    </div>
                  </div>
                </div>
             
          

                <div class="form-group">
                  <label class="control-label col-md-4" for="tgl_surat">*Tanggal Lahir :</label>
                  <div class="col-md-8">
                    <input type="date" class="form-control reset" name="tgl_lahir" id="tgl_lahir" required value="<?= $data['tgl_guru']; ?>">
                  </div>
                </div>

            </div><!-- end col-md-8 -->


            <div class="col-md-4 mb">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="total" class="besar">*Nomor Telpon :</label>
                    <input type="number" class="form-control reset" 
                    name="nomer_telp" id="nomer_telp" placeholder="No telpon ..." required value="<?= $data['telp_guru']; ?>">
                </div>

                <div class="form-group">
                  <label>Ubah Foto Guru :</label>
                    <input type="file" class="form-control reset" name="foto_guru" id="foto_guru" accept="image/x-png,image/gif,image/jpeg" required>
                </div>

                    <hr>
                    <button type="button" class="btn btn-primary btn-icon-split" id="button_edit_guru">
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