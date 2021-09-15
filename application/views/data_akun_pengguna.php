<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Pengguna</h1>
<div class="row">
  <div class="col-md-12">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Pengguna</li>
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
                <a href="<?=base_url('Admin/akunpengguna')?>" class="btn btn-success">Tambah data</a>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md">
                  <table class="table table-striped table-bordered text-center" id="tablepengguna">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Usernmae Pengguna</th>
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
                        <label for="nama">Nama Pengguna</label>
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
                        <input type="hidden" name="password_lama_pengguna">
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