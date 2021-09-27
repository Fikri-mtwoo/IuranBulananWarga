<!-- <?php var_dump($warga)?> -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Rumah Kontrak</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="<?=base_url('Kontrak')?>">Rumah Kontrak</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Data Rumah Kontark</li>
                </ol>
            </nav>  
        </div>
    </div>
    <div class="row justify-content-md-center">
     <div class="col-md-6 col-md-auto">
     <!-- <div class="flashinsertpetugas" data-notif="<?=$this->session->userdata('flash')?>"></div> -->
        <div class="card">
            <div class="card-header">
                Data Rumah Kontrak
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="norumah">Nama Warga</label>
                        <select name="id_warga" class="form-control">
                            <option value="">Pilih</option>
                            <?php foreach ($warga as $wr) : ?>
                                <option value="<?=$wr['IdWarga']?>"><?=$wr['Nama']?></option>
                                <?php endforeach?>
                            </select>
                            <?=form_error('id_warga')?>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="norumah">No Rumah</label>
                            <select name="id_rumah" class="form-control">
                                <option value="">Pilih</option>
                                <?php foreach ($rumah as $rm) : ?>
                                    <option value="<?=$rm['IdRumah']?>"><?=$rm['NoRumah']?></option>
                                <?php endforeach?>
                            </select>
                            <?=form_error('id_rumah')?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="jmlbulan">Jumlah Bulan</label>
                            <input type="number" class="form-control" id="jmlbulan" name="jml_bulan">
                            <?=form_error('jml_bulan')?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Tambah</button>
                </form>
            </div>
        </div>
     </div>
    </div>
</div>