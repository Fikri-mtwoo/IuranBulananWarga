<!-- <?php var_dump($warga)?> -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Rumah</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="<?=base_url('Rumah')?>">Rumah</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Rumah</li>
                </ol>
            </nav>  
        </div>
    </div>
    <div class="row justify-content-md-center">
     <div class="col-md-6 col-md-auto">
     <div class="flashinsertpetugas" data-notif="<?=$this->session->userdata('flash')?>"></div>
        <div class="card">
            <div class="card-header">
                Data Rumah
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="norumah">NoRumah</label>
                            <input type="text" name="no_rumah" class="form-control" id="norumah">
                            <?=form_error('no_rumah')?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="status">Status Rumah</label>
                            <select class="form-control" id="status" name="status_rumah">
                                <option value="">Pilih</option>
                                <option value="tetap">Tetap</option>
                                <option value="kontrak">Kontrak</option>
                            </select>
                            <?=form_error('status_rumah')?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Tambah</button>
                </form>
            </div>
        </div>
     </div>
    </div>
</div>