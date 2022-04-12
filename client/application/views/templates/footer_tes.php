
 <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <b>Izki Ardivilaska</b></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="<?= base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>


<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>

</body>

</html>
<?php if($this->session->flashdata('error')){ ?>
  <script>
    swal("<?php echo $this->session->flashdata('error'); ?>", {
        icon : "error",
        buttons: {                  
            confirm: {
                className : 'btn btn-danger'
            }
        },
    });
  </script>
<?php } ?>

<?php if($this->session->flashdata('pesan')){ ?>
  <script>
    swal("<?php echo $this->session->flashdata('pesan'); ?>", {
        icon : "success",
        buttons: {                  
            confirm: {
                className : 'btn btn-success'
            }
        },
    });
  </script>
<?php } ?>

<script >
  $(document).ready(function() {
    $('#example').DataTable();
  });


//PROFILE
$('#button_edit_profile').click(function(e) {
        if ($('#form1').val() == '' || $('#form2').val() == '') 
        {
           swal({
              title: 'Opppss!',
              text: 'Harap isi semua form!',
              icon: 'warning',
              buttons: {                  
                  confirm: {
                      className : 'btn btn-focus'
                  }
              },
            });
        }
        else {
          swal({
            title: 'Simpan Perubahan?',
            icon: 'warning',
            buttons:{
              confirm: {
                text : 'Simpan',
                className : 'btn btn-success'
              },
              cancel: {
                text : 'Tidak',
                visible: true,
                className: 'btn btn-focus'
              }
            }
          }).then((Edit) => {
            if (Edit) {
              document.getElementById("form_edit_profile").submit();
            } else {
              swal.close();
            }
          });
        }
    });

//TAMBAH
$('#button_tambah_guru').click(function(e) {

  var radios = document.getElementsByName('jenis_kelamin');
  var jk ='';
  for (var i = 0, length = radios.length; i < length; i++) {
    if (radios[i].checked) {
      // do whatever you want with the checked radio
      // alert(radios[i].value);
      // console.log(radios[i].value);
      jk = radios[i].value;
      // only one radio can be logically checked, don't check the rest
      break;
    }
  }

  // console.log(jk);

        if ( $('#nip_guru').val() == '' || $('#nama_guru').val() == '' || $('#tgl_lahir').val() == '' || $('#nomer_telp').val() == '' || jk == '')
        {
           swal({
              title: 'Opppss!',
              text: 'Harap isi semua form!',
              icon: 'warning',
              buttons: {                  
                  confirm: {
                      className : 'btn btn-focus'
                  }
              },
          });
        }
        else {
          swal({
            title: 'Yakin ditambah?',
            icon: 'warning',
            buttons:{
              confirm: {
                text : 'Tambah',
                className : 'btn btn-success'
              },
              cancel: {
                text : 'Tidak',
                visible: true,
                className: 'btn btn-focus'
              }
            }
          }).then((Tambah) => {
            if (Tambah) {
              document.getElementById("form_tambah_guru").submit();
            } else {
              swal.close();
            }
          });
        }
    });


    $('#button_tambah_siswa').click(function(e) {

      var radios = document.getElementsByName('jenis_kelamin');
      var jk ='';
      for (var i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
          // do whatever you want with the checked radio
          // alert(radios[i].value);
          // console.log(radios[i].value);
          jk = radios[i].value;
          // only one radio can be logically checked, don't check the rest
          break;
        }
      }

      
      if ( $('#nis_siswa').val() == '' || $('#nama_siswa').val() == '' || $('#tgl_lahir').val() == '' || $('#nomer_telp').val() == '' || $('#foto_siswa').val() == '' || jk == '' || $('#guru_pendamping').val() == '')
      {
         swal({
            title: 'Opppss!',
            text: 'Harap isi semua form!',
            icon: 'warning',
            buttons: {                  
                confirm: {
                    className : 'btn btn-focus'
                }
            },
        });
      }
      else {
        swal({
          title: 'Yakin ditambah?',
          icon: 'warning',
          buttons:{
            confirm: {
              text : 'Tambah',
              className : 'btn btn-success'
            },
            cancel: {
              text : 'Tidak',
              visible: true,
              className: 'btn btn-focus'
            }
          }
        }).then((Tambah) => {
          if (Tambah) {
            document.getElementById("form_tambah_siswa").submit();
          } else {
            swal.close();
          }
        });
      }
  });


  $('#button_tambah_aset').click(function(e) {

if ( $('#nama_aset').val() == '' || $('#kondisi_aset').val() == '' || $('#banyak_aset').val() == '' ||  $('#foto_aset').val() == '')
{
   swal({
      title: 'Opppss!',
      text: 'Harap isi semua form!',
      icon: 'warning',
      buttons: {                  
          confirm: {
              className : 'btn btn-focus'
          }
      },
  });
}
else {
  swal({
    title: 'Yakin ditambah?',
    icon: 'warning',
    buttons:{
      confirm: {
        text : 'Tambah',
        className : 'btn btn-success'
      },
      cancel: {
        text : 'Tidak',
        visible: true,
        className: 'btn btn-focus'
      }
    }
  }).then((Tambah) => {
    if (Tambah) {
      document.getElementById("form_tambah_aset").submit();
    } else {
      swal.close();
    }
  });
}
});


//EDIT
    $('#button_edit_guru').click(function(e) {

      if ($('#nip_guru').val() == '' || $('#nama_guru').val() == '' || $('#tgl_lahir').val() == '' || $('#nomer_telp').val() == '')
      {
         swal({
            title: 'Opppss!',
            text: 'Harap isi semua form!',
            icon: 'warning',
            buttons: {                  
                confirm: {
                    className : 'btn btn-focus'
                }
            },
        });
      }
      else {
        swal({
          title: 'Yakin diubah?',
          icon: 'warning',
          buttons:{
            confirm: {
              text : 'Ubah',
              className : 'btn btn-success'
            },
            cancel: {
              text : 'Tidak',
              visible: true,
              className: 'btn btn-focus'
            }
          }
        }).then((edit) => {
          if (edit) {
            document.getElementById("form_edit_guru").submit();
          } else {
            swal.close();
          }
        });
      }
  });


  $('#button_edit_siswa').click(function(e) {

if ( $('#nis_siswa').val() == '' || $('#nama_siswa').val() == '' || $('#tgl_lahir').val() == '' || $('#nomer_telp').val() == '' || $('#guru_pendamping').val() == '')
{
   swal({
      title: 'Opppss!',
      text: 'Harap isi semua form!',
      icon: 'warning',
      buttons: {                  
          confirm: {
              className : 'btn btn-focus'
          }
      },
  });
}
else {
  swal({
    title: 'Yakin diubah?',
    icon: 'warning',
    buttons:{
      confirm: {
        text : 'Ubah',
        className : 'btn btn-success'
      },
      cancel: {
        text : 'Tidak',
        visible: true,
        className: 'btn btn-focus'
      }
    }
  }).then((edit) => {
    if (edit) {
      document.getElementById("form_edit_siswa").submit();
    } else {
      swal.close();
    }
  });
}
});



$('#button_edit_aset').click(function(e) {

  if ( $('#nama_aset').val() == '' || $('#kondisi_aset').val() == '' || $('#banyak_aset').val() == '')
{
   swal({
      title: 'Opppss!',
      text: 'Harap isi semua form!',
      icon: 'warning',
      buttons: {                  
          confirm: {
              className : 'btn btn-focus'
          }
      },
  });
}
else {
  swal({
    title: 'Yakin diubah?',
    icon: 'warning',
    buttons:{
      confirm: {
        text : 'Ubah',
        className : 'btn btn-success'
      },
      cancel: {
        text : 'Tidak',
        visible: true,
        className: 'btn btn-focus'
      }
    }
  }).then((edit) => {
    if (edit) {
      document.getElementById("form_edit_aset").submit();
    } else {
      swal.close();
    }
  });
}
});


  //HAPUS
  function button_hapus($is,$id) {
    swal({
      title: 'Yakin Hapus Data?',
      text: 'Data yang telah terhapus tidak dapat dipulihkan!',
      icon: 'warning',
      buttons:{
        confirm: {
          text : 'Hapus',
          className : 'btn btn-danger'
        },
        cancel: {
          text : 'Tidak',
          visible: true,
          className: 'btn btn-focus'
        }
      }
    }).then((Hapus) => {
      if (Hapus) {
        
        if ($is == 'guru') {
            document.location.href = "<?php echo base_url('tes/hapus_guru/')?>"+$id;
        }
        else if ($is == 'siswa') {
            document.location.href = "<?php echo base_url('admin/hapus_siswa/')?>"+$id;
        }
        else if ($is == 'aset') {
            document.location.href = "<?php echo base_url('admin/hapus_aset/')?>"+$id;
        }
        

      } else {
        swal.close();
      }
    });
    }



function button_detail(jenis,id) {
  // console.log(jenis,id);
  if (jenis == 'guru') {
    $('#modal_detail_guru').modal('show');
    $.ajax({
      url: "<?php echo base_url(); ?>auth/get_guru_by_id",
      data: {
        id : id
      },
      type: "POST",
      dataType: "json",
      success: function(data) {
          // console.log(data);
          $('#modal_nip_guru').html('NIP.'+data.nip_guru);
          document.getElementById("modal_nama_guru").value =  data.nama_guru;
          document.getElementById("modal_tgl_guru").value =  data.tgl_guru;
          document.getElementById("modal_password_guru").value =  data.password;
          document.getElementById("modal_username_guru").value =  data.username;
          document.getElementById("modal_jk_guru").value =  data.jk_guru;
          document.getElementById("modal_telp_guru").value =  data.telp_guru;
          document.getElementById("modal_foto_guru").src="<?= base_url('assets/penyimpanan_foto/guru/'); ?>"+data.foto_guru;
          
      }
    });
  }
  else if (jenis == 'siswa'){
    $('#modal_detail_siswa').modal('show');
    $.ajax({
      url: "<?php echo base_url(); ?>auth/get_siswa_by_id",
      data: {
        id : id
      },
      type: "POST",
      dataType: "json",
      success: function(data) {
          // console.log(data);
          $('#modal_nip_guru').html('NIP.'+data.no_absen);
          document.getElementById("modal_nama_siswa").value =  data.nama_siswa;
          document.getElementById("modal_tgl_siswa").value =  data.tgl_siswa;
          document.getElementById("modal_jk_siswa").value =  data.jk_siswa;
          document.getElementById("modal_telp_siswa").value =  data.telp_siswa;
          document.getElementById("modal_guru_siswa").value =  data.nama_guru;
          document.getElementById("modal_foto_siswa").src="<?= base_url('assets/penyimpanan_foto/siswa/'); ?>"+data.foto;
          
      }
    });
  }
 
}



</script>



<div class="modal fade" id="modal_detail_guru" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Data Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      
      <div class="card mb-2" style="max-width: 540px; border:none;">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="" id="modal_foto_guru" class="card-img" alt="...">
          </div>
          <div class="col-md-8">

            <div class="card-body">
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-5 col-form-label">Username</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="modal_username_guru" placeholder="col-form-label" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-5 col-form-label">Password</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="modal_password_guru" placeholder="col-form-label" readonly>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-md-4">
             <h2 class="card-title" id="modal_nip_guru"></h2>
          </div>
        </div>
        <div class="form-group row">
          <label for="colFormLabel" class="col-sm-4 col-form-label">Nama Lengkap</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="modal_nama_guru" placeholder="col-form-label" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="colFormLabel" class="col-sm-4 col-form-label">TTL</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="modal_tgl_guru" placeholder="col-form-label" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="colFormLabel" class="col-sm-4 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="modal_jk_guru" placeholder="col-form-label" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="colFormLabel" class="col-sm-4 col-form-label">Kontak</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="modal_telp_guru" placeholder="col-form-label" readonly>
          </div>
        </div>
      </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modal_detail_siswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      
      <div class="card mb-2" style="max-width: 540px; border:none;">
        <div class="d-flex justify-content-center">
          <div >
            <img src="" id="modal_foto_siswa" class="card-img" alt="..." style="width: 10rem;">
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-md-4">
             <h2 class="card-title" id="modal_nip_siswa"></h2>
          </div>
        </div>
        <div class="form-group row">
          <label for="colFormLabel" class="col-sm-4 col-form-label">Nama Lengkap</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="modal_nama_siswa" placeholder="col-form-label" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="colFormLabel" class="col-sm-4 col-form-label">TTL</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="modal_tgl_siswa" placeholder="col-form-label" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="colFormLabel" class="col-sm-4 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="modal_jk_siswa" placeholder="col-form-label" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="colFormLabel" class="col-sm-4 col-form-label">Kontak</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="modal_telp_siswa" placeholder="col-form-label" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="colFormLabel" class="col-sm-4 col-form-label">Guru Pembimbing</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="modal_guru_siswa" placeholder="col-form-label" readonly>
          </div>
        </div>
      </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>