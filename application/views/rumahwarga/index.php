<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Rumah Warga</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Rumah Warga</li>
                </ol>
            </nav>  
        </div>
    </div>
    <!-- content -->
    <div class="row justify-content-md-center">
     <div class="col-md-12 col-md-auto">
     <div class="notif" data-name="<?=$this->session->flashdata('name')?>" data-jenis="<?=$this->session->flashdata('type')?>" data-notif="<?=$this->session->userdata('flash')?>"></div>
        <div class="card">
            <div class="card-header">
                <a href="<?=base_url('RumahWarga/tambah')?>" class="btn btn-success">Tambah data</a>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md">
                  <table class="table table-striped table-bordered" id="tablerumahwarga">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nomor Induk Keluarga(NIK)</th>
                        <th scope="col">Nama Warga</th>
                        <th scope="col">No Rumah</th>
                        <th scope="col">Edit</th>
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
  <div class="modal fade" id="modalEditRumahWarga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Modal title</h5>
        </div>
        <div class="modal-body">
        <form action="<?=base_url('RumahWarga/update')?>" method="post" >
              <input type="hidden" name="idrw" id="idrw">
              <input type="hidden" name="id_warga_lama">
              <div class="form-row">
                <div class="form-group col-md-8">
                  <label for="norumah">NoRumah</label>
                  <select name="id_warga" class="form-control">
                    <option value="" class="text-primary select">Pilih</option>
                    <?php foreach ($warga as $wr) : ?>
                      <option value="<?=$wr['IdWarga']?>"><?=$wr['Nama']?></option>
                    <?php endforeach?>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="norumah">NoRumah</label>
                  <input type="hidden" name="id_rumah" class="form-control" id="rumah">
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
  </div>
</div>