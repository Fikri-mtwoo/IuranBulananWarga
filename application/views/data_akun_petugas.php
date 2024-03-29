<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Petugas</h1>
<div class="row">
  <div class="col-md-12">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Petugas</li>
    </ol>
    </nav>
  </div>
</div>
 <!-- Content Row -->
 <div class="row justify-content-md-center">
     <div class="col-md-12 col-md-auto">
     <div class="notif" data-name="<?=$this->session->flashdata('name')?>" data-jenis="<?=$this->session->flashdata('type')?>" data-notif="<?=$this->session->userdata('flash')?>"></div>
        <div class="card">
            <div class="card-header">
                <a href="<?=base_url('Admin/akunpetugas')?>" class="btn btn-success">Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md">
                  <table class="table table-striped table-bordered text-center" id="tablepetugas">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Status Akun</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
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
