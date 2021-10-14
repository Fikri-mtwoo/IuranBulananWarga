<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Transaksi</h1>
   
 <!-- Content Row -->
 <div class="row justify-content-md-center">
 <!-- <?php var_dump($warga)?> -->
     <div class="col-md-12 col-md-auto">
     <div class="notif" data-name="<?=$this->session->flashdata('name')?>" data-jenis="<?=$this->session->flashdata('type')?>" data-notif="<?=$this->session->userdata('flash')?>"></div>
        <div class="card">
            <div class="card-header">
              <div class="form-row">
                <div class="col-auto">
                  <a href="<?=base_url('Admin/tambah_transaksi')?>" class="btn btn-success">Tambah data</a>
                </div>
                <div class="col-5">
                  <div class="form-group row">
                    <label for="bulan" class="col-md-2 col-form-label">Bulan</label>
                    <div class="col-md-5">
                      <select class="form-control" name="bulan" id="bulan">
                          <option value="" selected>Pilih Bulan</option>
                        <?php foreach ($bulan as $b) :?>
                          <option value="<?=$b['IdBulanIuran']?>"><?=$b['NamaBulan']?></option>
                        <?php endforeach?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-5">
                  <div class="form-group row">
                    <label for="tahun" class="col-md-2 col-form-label">Tahun</label>
                    <div class="col-md-5">
                      <select class="form-control" name="tahun" id="tahun">
                          <option value="" selected>Pilih Tahun</option>
                        <?php foreach ($tahun as $t) :?>
                          <option value="<?=$t['IdTahunIuran']?>"><?=$t['NamaTahun']?></option>
                        <?php endforeach?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md table-responsive">
                      <table class="table table-striped table-bordered " id="tabletransaksi">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Id Transaksi</th>
                            <th scope="col">Nama Warga</th>
                            <th scope="col">Total Iuran</th>
                            <th scope="col">Bulan / Tahun</th>
                            <th scope="col">Nama Petugas</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Tanggal Bayar</th>
                            <th scope="col">Input Transaksi</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Aksi</th>
                        </thead>
                      </table>
                  </div>
                </div>
            </div>
        </div>
     </div>
     <!-- modal -->
    <!-- <div class="modal fade" id="modalEditKet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTitle">Modal title</h5>
          </div>
          <div class="modal-body">
          <form action="<?=base_url('Dashboard/update_ket_transaksi')?>" method="post" >
                      <input type="hidden" name="id_rumah" id="idrumah">
                      <div class="form-row">
                          <div class="form-group col-md-12">
                              <label for="norumah">NoRumah</label>
                              <input type="text" name="no_rumah" class="form-control" id="norumah">
                          </div>
                      </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
          </div>
          </form>
        </div>
      </div>
    </div> -->
</div>