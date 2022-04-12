
<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pengaturan Akun</h1>
            
          </div>
          <hr>

          <!-- Content Row -->
          <div class="row">

            <div class="col-lg-7">
            
              <form class="user" method="post" id="form_edit_profile">


            <div id="barang">
                <input type="hidden" name="user_id" value="<?= $data['id_user']; ?>">
                <div class="form-group">
                  <label class="control-label col-md-3" 
                    for="nama_barang">Username : </label>
                  <div class="col-md-6">
                    <input type="text" class="form-control reset" 
                      autocomplete="off" id="form1"  
                      name="username" value="<?php echo $data['username'] ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" 
                    for="harga_barang">Password : </label>
                  <div class="col-md-6">
                   <input type="text" class="form-control reset" 
                      autocomplete="off"  id="form2"  
                      name="password" value="<?php echo $data['password'] ?>">
                  </div>
                </div>
                <hr>
                <button type="button" class="btn btn-success btn-icon-split" id="button_edit_profile">
                  <span class="icon text-white-50">
                    <i class="fas fa-edit"></i>
                  </span>
                  <span class="text" >Edit profile</span>
                </button>
              </form>
            
          </div>
            
            
          </div>
        </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->