<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>
    </div>
    <!-- content -->
    <div class="row justify-content-md-center">
     <div class="col-md-12 col-md-auto">
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