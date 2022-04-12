
<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <img src="<?= base_url('assets/'); ?>penyimpanan_foto/paud.png" style="width: 160px; height: 160px;">
                    <h1 class="h4 text-gray-900 mb-4">SILAHKAN LOGIN</h1>
                  </div>

                  <form method="post" action="<?= base_url('auth/login'); ?>">
                    
                    <div class="form-group">
                       <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">Login Sebagai</label>
                        </div>
                        <select class="custom-select" name="level_user" id="inputGroupSelect01" required="">
                          <option value="1">Admin</option>
                          <option value="2">Guru</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username..." required="">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required="">
                    </div>
                    <button id="button" type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>

                    <a href="<?= base_url(); ?>" class="btn btn-info btn-user btn-block">Landing Page</a>
                  </form>
                  <hr>
                   
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>