<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Histori Transaksi</h1>
   
 <!-- Content Row -->
 <div class="row justify-content-md-center">

     <div class="col-md-12 col-md-auto">
     <div class="flash" data-notif="<?=$this->session->userdata('flash')?>"></div>
        <div class="card">
            <div class="card-header">
                Data Warga
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md">
                  <table class="table table-striped table-bordered" id="historitransaksi">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Warga</th>
                        <th scope="col">Nama Bulan</th>
                        <th scope="col">Nama Petugas</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Tanggal Bayar</th>
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
                    <div class="form-row">
                        <div class="form-group col-md-9">
                        <label for="nik">NIK Warga</label>
                        <input type="text" name="nik" class="form-control" id="nik">
                        </div>
                        <div class="form-group col-md-3">
                        <label for="rumah">No.Rumah</label>
                        <input type="number" name="no_rumah" class="form-control" id="rumah">
                        </div>
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