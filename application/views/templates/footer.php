<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('assets/') ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url('assets/') ?>js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url('assets/') ?>js/demo/chart-pie-demo.js"></script>

<!-- Datatables -->
<script src="<?php echo base_url() ?>assets/js/jquery-3.3.1.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#mytable').DataTable();
  });
</script>

<script>
  /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
  function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }

  function filterFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdown");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
      txtValue = a[i].textContent || a[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = "";
      } else {
        a[i].style.display = "none";
      }
    }
  }
</script>

</body>

</html>