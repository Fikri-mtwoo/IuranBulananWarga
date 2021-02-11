</div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website <?php echo date('Y'); ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">Silahkan klik <b>Logout</b> untuk keluar</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?=base_url('Auth/logout')?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url('asset/')?>vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url('asset/')?>js/jquery-3.5.1.min.js"></script>
  <script src="<?=base_url('asset/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url('asset/')?>vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  
  <!-- Custom scripts for all pages-->
  <script src="<?=base_url('asset/')?>js/sb-admin-2.min.js"></script>
  
  <!-- Page level custom scripts -->
  <script src="<?=base_url('asset/')?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url('asset/')?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?=base_url('asset/')?>js/myscript.js"></script>
</body>

</html>