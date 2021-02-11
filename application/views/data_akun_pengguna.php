<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Pengguna</h1>
   
 <!-- Content Row -->
 <div class="row justify-content-md-center">
     <div class="col-md-12 col-md-auto">
     <div class="flashpengguna" data-notif="<?=$this->session->userdata('flash')?>"></div>
        <div class="card">
            <div class="card-header">
                Data Pengguna
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md">
                  <table class="table table-striped table-bordered" id="tablepengguna">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Usernmae Pengguna</th>
                        <th scope="col">Ubah Password</th>
                      </tr>
                    </thead>
                  </table>
                  </div>
                </div>
            </div>
        </div>
     </div>
  </div>

  <!-- modal edit -->
  <div class="modal fade" id="modalEditPengguna" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Modal title</h5>
        </div>
        <div class="modal-body">
        <form action="<?=base_url('Admin/update_data_pengguna')?>" method="post" >
                    <div class="form-group">
                        <label for="nama">NIK Pengguna</label>
                        <input type="text" class="form-control" id="nik_pengguna">
                        <input type="hidden" name="id_pengguna">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="username_pengguna">Username</label>
                        <input type="text" name="username_pengguna" class="form-control" id="username_pengguna">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="password_baru_pengguna">Password Baru</label>
                        <input type="text" name="password_baru_pengguna" class="form-control" id="password_baru_pengguna">
                        </div>
                    </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-block">Ubah</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- tutup modal edit -->

</div>
<!-- /.container-fluid -->