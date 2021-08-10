<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Transaksi</h1>
   
 <!-- Content Row -->
 <div class="row justify-content-md-center">
 <!-- <?php var_dump($warga)?> -->
     <div class="col-md-12 col-md-auto">
     <div class="flash" data-notif="<?=$this->session->userdata('flash')?>"></div>
        <div class="card">
            <div class="card-header">
              <div class="form-row">
                <div class="col-auto">
                  <a href="<?=base_url('Admin/tambah')?>" class="btn btn-success">Tambah data</a>
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
                  <div class="col-md">
                  <table class="table table-striped table-bordered" id="tabletransaksi">
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
                    </thead>
                  </table>
                  </div>
                </div>
            </div>
        </div>
     </div>
</div>