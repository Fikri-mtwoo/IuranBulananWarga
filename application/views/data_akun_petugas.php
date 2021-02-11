<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Petugas</h1>
   
 <!-- Content Row -->
 <div class="row justify-content-md-center">
     <div class="col-md-12 col-md-auto">
     <div class="flashpetugas" data-notif="<?=$this->session->userdata('flash')?>"></div>
        <div class="card">
            <div class="card-header">
                Data Petugas
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md">
                  <table class="table table-striped table-bordered" id="tablepetugas">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nomor Induk Keluarga(NIK)</th>
                        <th scope="col">Nama Petugas</th>
                        <th scope="col">Username</th>
                        <th scope="col">Ubah</th>
                        <th scope="col">Hapus</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                  </div>
                </div>
            </div>
        </div>
     </div>
</div>

<!-- modal -->
<div class="modal fade" id="modalEditPetugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Modal title</h5>
        </div>
        <div class="modal-body">
        <form action="<?=base_url('Admin/update_data_petugas')?>" method="post" >
                    <div class="form-row">
                        <div class="form-group col-md-7">
                        <label for="nama_petugas">Nama Petugas</label>
                        <input type="text" name="nama_petugas" class="form-control" id="nama_petugas">
                        <input type="hidden" name="id_petugas">
                        </div>
                        <div class="form-group col-md-5">
                        <label for="nik_petugas">NIK</label>
                        <input type="text" name="nik_petugas" class="form-control" id="nik_petugas">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="password_baru">Password Baru</label>
                        <input type="text" name="password_baru" class="form-control" id="password_baru">
                        <input type="hidden" name="password_lama">
                        </div>
                    </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
