<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Akun Petugas</h1>
   
 <!-- Content Row -->
 <div class="row justify-content-md-center">
     <div class="col-md-6 col-md-auto">
     <div class="flashinsertpetugas" data-notif="<?=$this->session->userdata('flash')?>"></div>
        <div class="card">
            <div class="card-header">
                Akun Petugas
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group ">
                        <label for="nama">Nama Warga</label>
                        <select id="nama" name="nik" class="form-control">
                            <option value="" selected>Choose...</option>
                            <?php foreach ($warga as $w) {
                                echo "<option value='".$w['NIK']."/".$w['Nama']."'>".$w['Nama']."</option>";
                            }?>
                        </select>
                        <?=form_error('nik')?>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" value="<?=set_value('username')?>">
                        <?=form_error('username')?>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                        <?=form_error('password')?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Buat Akun</button>
                </form>
            </div>
        </div>
     </div>
</div>

</div>
<!-- /.container-fluid -->