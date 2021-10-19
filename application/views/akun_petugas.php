<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Akun Petugas</h1>
<div class="row">
  <div class="col-md-12">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="<?=base_url('Admin/dataakunpetugas')?>">Petugas</a></li>
      <li class="breadcrumb-item active" aria-current="page">Akun Petugas</li>
    </ol>
    </nav>
  </div>
</div> 
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
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="nama">Nama Warga</label>
                            <select id="nama" name="nik" class="form-control">
                                <option value="" selected>Choose...</option>
                                <?php foreach ($warga as $w) {
                                    echo "<option value='".$w['IdWarga']."/".$w['Nama']."'>".$w['Nama']."</option>";
                                }?>
                            </select>
                            <?=form_error('nik')?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="role">Role</label>
                            <select id="role" name="role" class="form-control">
                                <option value="" selected>Choose...</option>
                                <?php foreach ($role as $r) {
                                    echo "<option value='".$r['IdRole']."'>".$r['NamaRole']."</option>";
                                }?>
                            </select>
                            <?=form_error('role')?>
                        </div>
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