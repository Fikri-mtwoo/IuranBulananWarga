<!-- <?php var_dump($warga)?> -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Keterangan Transaksi</h1>
          </div>

          <div class="row justify-content-md-center">
                <div class="col-xl-6 col-md-auto">
                    <?php if($this->session->flashdata('flash')) : ?>
                      <div class="notif" data-name="<?=$this->session->flashdata('name')?>" data-jenis="<?=$this->session->flashdata('type')?>" data-notif="<?=$this->session->flashdata('flash')?>"></div>
                    <?php endif;?>
                    <div class="card">
                        <div class="card-header">
                            Keterangan Transaksi
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="warga">Nama Warga</label>
                                    <select class="form-control" name="nik" id="warga">
                                        <option value="none">Pilih Nama Warga</option>
                                        <?php
                                    foreach ($warga as $w) {
                                        if($w['Nama'] == $this->session->userdata('Nama')){
                                                echo "<option class='text-primary' value='".$this->encryption->encrypt($w['IdWarga'])."'>".$w['Nama']."</option>";
                                            }else{
                                                echo "<option value='".$this->encryption->encrypt($w['IdWarga'])."'>".$w['Nama']."</option>";    
                                            }
                                      
                                    } ?>
                                    </select>
                                    <?php echo form_error('nik'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="bulan">Bulan</label>
                                    <select class="form-control" name="bulan" id="bulan">
                                        <option value="none">Pilih Bulan</option>
                                    </select>
                                    <?php echo form_error('bulan'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" name="kettrans" class="form-control">
                                    <input type="hidden" name="transaksi" id="transaksi">
                                    <input type="hidden" name="tahun" id="tahun">
                                    <?php echo form_error('kettrans'); ?>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Bayar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
          </div>

          <!-- Content Row -->
          <div class="row">

          </div>

        </div>
        <!-- /.container-fluid -->

    
