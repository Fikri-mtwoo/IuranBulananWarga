<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Warga</h1>
   
 <!-- Content Row -->
 <div class="row justify-content-md-center">
 <!-- <?php var_dump($warga)?> -->
     <div class="col-md-12 col-md-auto">
     <div class="flash" data-notif="<?=$this->session->userdata('flash')?>"></div>
        <div class="card">
            <div class="card-header">
                Data Warga
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
                        <th scope="col">Nama Bulan</th>
                        <th scope="col">Nama Petugas</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Tanggal Bayar</th>
                    </thead>
                  </table>
                  </div>
                </div>
            </div>
        </div>
     </div>
</div>