<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Halaman Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?=base_url('asset/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url('asset/')?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5" >
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <?php if($this->session->flashdata('pesan')) :?>
                    <div class="pesan" data-pesan="<?=$this->session->flashdata('pesan')?>"></div>
                  <?php endif; ?>
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                  </div>
                  <form class="user" action="" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" aria-describedby="emailHelp" placeholder="Masukan Username..." value="<?=set_value('username')?>">
                      <?php echo form_error('username')?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                      <?php echo form_error('password')?>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Masuk</button>
                    <hr>
                      <a href="<?=base_url('Auth/pengguna')?>" class="btn btn-google btn-user btn-block">
                        <!-- <i class="fab fa-google fa-fw"></i> Login with Google -->
                        Masuk Sebagai Pengguna
                      </a>
                      <a href="<?=base_url('Auth')?>" class="btn btn-facebook btn-user btn-block">
                        <!-- <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook -->
                        Masuk Sebagai Petugas
                      </a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url('asset/')?>vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url('asset/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url('asset/')?>vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url('asset/')?>js/sb-admin-2.min.js"></script>
  <script src="<?=base_url('asset/')?>js/myscript.js"></script>

</body>

</html>
