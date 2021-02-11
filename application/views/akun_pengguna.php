<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Akun Pengguna</h1>
   
 <!-- Content Row -->
 <div class="row justify-content-md-center">
     <div class="col-md-6 col-md-auto">
     <div class="flashinsertpengguna" data-notif="<?=$this->session->userdata('flash')?>"></div>
        <div class="card">
            <div class="card-header">
                Akun Pengguna
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group ">
                        <label for="nama">Nama Warga</label>
                        <select id="nama" name="nik" class="form-control">
                            <option value="" selected>Choose...</option>
                            <?php foreach ($warga as $w) {
                                echo "<option value='".$w['NIK']."'>".$w['Nama']."</option>";
                            }?>
                        </select>
                        <?=form_error('nik')?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                        <?=form_error('password')?>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Buat Akun</button>
                </form>
            </div>
        </div>
     </div>
</div>

</div>
<!-- /.container-fluid -->