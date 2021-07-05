<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Data Warga</h1>
</div>
   
 <!-- Content Row -->
 <div class="row justify-content-md-center">
 <!-- <?php var_dump($warga)?> -->
     <div class="col-md-12 col-md-auto">
     <div class="flash" data-notif="<?=$this->session->userdata('flash')?>"></div>
        <div class="card">
            <div class="card-header">
                <a href="<?=base_url('Admin/admin')?>" class="btn btn-success">Tambah Warga</a>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md">
                  <table class="table table-striped table-bordered" id="mytable">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nomor Induk Keluarga(NIK)</th>
                        <th scope="col">Nama Warga</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
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
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Modal title</h5>
        </div>
        <div class="modal-body">
        <form action="<?=base_url('Admin/update_data_warga')?>" method="post" >
                    <input type="hidden" name="idwarga" id="idwarga">
                    <div class="form-group">
                        <label for="nik">NIK Warga</label>
                        <input type="text" name="nik" class="form-control" id="nik">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Warga</label>
                        <input type="text" name="nama" class="form-control" id="nama">
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