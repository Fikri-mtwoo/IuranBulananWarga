<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Rumah</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Rumah</li>
                </ol>
            </nav>  
        </div>
    </div>
    <div class="row justify-content-md-center">
     <div class="col-md-12 col-md-auto">
     <div class="notif" data-name="<?=$this->session->flashdata('name')?>" data-jenis="<?=$this->session->flashdata('type')?>" data-notif="<?=$this->session->userdata('flash')?>"></div>
        <div class="card">
            <div class="card-header">
                <a href="<?=base_url('Rumah/tambahDataRumah')?>" class="btn btn-success">Tambah data</a>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md">
                  <table class="table table-striped table-bordered" id="tablerumah">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nomor Rumah</th>
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
  <div class="modal fade" id="modalEditRumah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Modal title</h5>
        </div>
        <div class="modal-body">
        <form action="<?=base_url('Rumah/update_data_rumah')?>" method="post" >
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
  </div>
</div>