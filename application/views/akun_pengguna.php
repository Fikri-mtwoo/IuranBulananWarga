<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Akun Pengguna</h1>
<div class="row">
  <div class="col-md-12">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="<?=base_url('Admin/dataakunpengguna')?>">Pengguna</a></li>
      <li class="breadcrumb-item active" aria-current="page">AkunPengguna</li>
    </ol>
    </nav>
  </div>
</div>     
 <!-- Content Row -->
 <div class="row justify-content-md-center">
     <div class="col-md-6 col-md-auto">
     <div class="notif" data-name="<?=$this->session->flashdata('name')?>" data-jenis="<?=$this->session->flashdata('type')?>" data-notif="<?=$this->session->userdata('flash')?>"></div>
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
                                <?php if($warga !== null) :?>
                                    <?php foreach ($warga as $w) {
                                        echo "<option value='".$w['NIK']."/".$w['Nama']."'>".$w['Nama']."</option>";
                                    }?>
                                <?php else :?>
                                    <option value="">Data pengguna tidak ada</option>
                                <?php endif?>
                        </select>
                        <?=form_error('nik')?>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                                <?=form_error('password')?>
                            </div>
                        </div>
                        <div class="col-4">
                                <div class="form-group ">
                                <label for="nama">Role</label>
                                <select id="nama" name="role" class="form-control">
                                    <option value="" selected>Choose...</option>
                                        <?php if($role !== null) :?>
                                            <option value="<?=$role->IdRole?>"><?=$role->NamaRole?></option>
                                        <?php else :?>
                                            <option value="">Data pengguna tidak ada</option>
                                        <?php endif?>
                                </select>
                                <?=form_error('role')?>
                            </div>
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