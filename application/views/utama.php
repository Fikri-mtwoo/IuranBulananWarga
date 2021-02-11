<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Warga</h1>
   
 <!-- Content Row -->
 <div class="row justify-content-md-center">
     <div class="col-md-6 col-md-auto">
            <div class="flashinsertwarga" data-notif="<?=$this->session->userdata('flash')?>"></div>
        <div class="card">
            <div class="card-header">
                Data Warga
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-9">
                        <label for="nik">NIK Warga</label>
                        <input type="text" name="nik" class="form-control" id="nik">
                        <?=form_error('nik')?>
                        </div>
                        <div class="form-group col-md-3">
                        <label for="rumah">No.Rumah</label>
                        <input type="number" name="no_rumah" class="form-control" id="rumah">
                        <?=form_error('no_rumah')?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Warga</label>
                        <input type="text" name="nama" class="form-control" id="nama">
                        <?=form_error('nama')?>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Tambah</button>
                </form>
            </div>
        </div>
     </div>
</div>

</div>
<!-- /.container-fluid -->