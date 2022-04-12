
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $judul_daftar ?></h1>
            
          </div>

          <!-- Content Row -->
        <div class="card shadow  mb-4">
        <form class="user" id="form_edit_aset" method="POST" enctype="multipart/form-data">
          <div class="row mb-2 mt-4 ml-2 mr-2">

            <div class="col-lg-8">
                
  
                <div class="form-group">
                  <label class="control-label col-md-4" 
                    for="harga_barang">*Nama aset : </label>
                  <div class="col-md-8">
                   <input type="text" class="form-control reset" autocomplete="off"  id="nama_aset"  
                      name="nama_aset" placeholder="Nama aset ..." required value="<?=  $data['nama_aset']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" 
                    for="nama_barang">*Kondisi aset : </label>
                  <div class="col-md-8">
                    <input type="text" class="form-control reset" autocomplete="off" id="kondisi_aset"  
                      name="kondisi_aset" placeholder="kondisi aset ..." required value="<?=  $data['kondisi_aset']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" 
                    for="nama_barang">*Banyak aset : </label>
                  <div class="col-md-8">
                    <input type="number" class="form-control reset" autocomplete="off" id="banyak_aset"  
                      name="banyak_aset" placeholder="banyak aset ..." required value="<?=  $data['banyak_aset']; ?>">
                  </div>
                </div>

            </div><!-- end col-md-8 -->


            <div class="col-md-4">
              <div class="col-md-12">
                

                <div class="form-group">
                  <div class="card" style="width: 150px; height:150px; border: none;">
                  <img  src="<?= base_url('assets/penyimpanan_foto/aset/').$data['foto_aset'] ?> " alt="...">
                  </div>
                  <label>Foto aset :</label>
                    <input type="file" class="form-control reset" name="foto_aset" id="foto_aset" accept="image/x-png,image/gif,image/jpeg" required>
                </div>

                    <hr>
                    <button type="button" class="btn btn-primary btn-icon-split" id="button_edit_aset">
                      <span class="icon text-white-50">
                        <i class="fas fa-edit"></i>
                      </span>
                      <span class="text" >Ubah Data</span>
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