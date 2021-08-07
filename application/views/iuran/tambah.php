<!-- <?php var_dump($warga)?> -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Iuran</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="<?=base_url('Iuran')?>">Iuran</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Iuran</li>
                </ol>
            </nav>  
        </div>
    </div>
    <div class="row justify-content-md-center">
     <div class="col-md-6 col-md-auto">
     <div class="flashinsertpetugas" data-notif="<?=$this->session->userdata('flash')?>"></div>
        <div class="card">
            <div class="card-header">
                Data Iuran
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="total">Total Iuran</label>
                            <input type="number" name="total" id="total" class="form-control" placeholder="50000">
                            <?=form_error('total')?>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="rincian">Rincian Iuran</label>
                            <textarea name="rincian" id="rincian" cols="30" rows="10" class="form-control"></textarea>
                            <?=form_error('rincian')?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Tambah</button>
                </form>
            </div>
        </div>
     </div>
    </div>
</div>