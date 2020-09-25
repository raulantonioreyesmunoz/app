      <?php if ($session->isUserLoggedIn(true)): ?>

            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
               © <?php echo date("Y"); ?> Copyright

            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
         </div>
         <!-- ============================================================== -->
         <!-- End Page wrapper  -->
         <!-- ============================================================== -->
      </div>
         <!-- ============================================================== -->
         <!-- End Main wrapper  -->
         <!-- ============================================================== -->


                  <?php
               endif; ?>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
         </div>
         <!-- ============================================================== -->
         <!-- End Main wrapper  -->
         <!-- ============================================================== -->
      </div>

      <script src="libs/plugins/jquery/jquery.min.js"></script>
      <script src="libs/plugins/popper/popper.min.js"></script>
      <script src="libs/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="libs/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
      <script src="libs/js/functions.js"></script>
      <script src="libs/js/jquery.slimscroll.js"></script>
      <!--Wave Effects -->
      <script src="libs/js/waves.js"></script>
      <!--Menu sidebar -->
      <script src="libs/js/sidebarmenu.js"></script>
      <script src="libs/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
      <script src="libs/js/custom.js"></script>
    <!-- Style switcher -->
    <!-- ============================================================== -->
      <script src="libs/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    <!-- Morris JavaScript -->
    <!-- ============================================================== -->
    <script src="libs/plugins/raphael/raphael-min.js"></script>
    <script src="libs/plugins/morrisjs/morris.js"></script>


    <!-- DataTable Bootstrap 4 -->
    <!-- ============================================================== -->
      <script src="libs/plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="libs/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- DataTable Buttons -->
      <script src="libs/plugins/datatables/dataTables.buttons.min.js"></script>
      <script src="libs/plugins/datatables/buttons.bootstrap4.min.js"></script>

      <!-- Flash export buttons -->
      <script src="libs/plugins/datatables/buttons.flash.min.js"></script>
      <!-- HTML5 export buttons -->
      <script src="libs/plugins/datatables/buttons.html5.min.js"></script>
      <!-- EXCEL export buttons -->
      <script src="libs/plugins/datatables/jszip.min.js"></script>
      <!-- PDF export buttons -->
      <script src="libs/plugins/datatables/pdfmake.min.js"></script>      
      <script src="libs/plugins/datatables/vfs_fonts.js"></script>

      <!-- Print button -->
      <script src="libs/plugins/datatables/buttons.print.min.js"></script>
   </body>
</html>

<?php if(isset($db)) { $db->db_disconnect(); } ?>
