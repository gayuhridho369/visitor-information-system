<footer class="main-footer">
    Copyright &copy; 2020<strong> "Gayuh Ridho"</strong>
    All rights reserved.
</footer>

</div>
<!-- ./wrapper -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

<!-- jQuery -->
<script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets') ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets') ?>/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets') ?>/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<!-- <script src="<?= base_url('assets') ?>/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets') ?>/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets') ?>/plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- <script src="<?= base_url('assets') ?>/datepicker/js/bootstrap-datepicker.js"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets') ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url('assets') ?>/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets') ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets') ?>/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?= base_url('assets') ?>/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets') ?>/dist/js/demo.js"></script>
<!-- SweetAlert -->
<script src="<?= base_url('assets') ?>/sweetalert/sweetalert2.all.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets') ?>/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- My JS -->
<script src="<?= base_url('assets') ?>/js/public_space.js"></script>

<?php if ($this->uri->segment(2) == '') : ?>
    <script src="<?= base_url('assets') ?>/js/dashboard.js"></script>
<?php endif ?>

<script>
    $(function() {
        $('#table').DataTable();
    });

    $('#reservation').daterangepicker({
        timePicker: true,
        timePickerIncrement: 15,
        locale: {
            format: 'DD/MM/YYYY hh:mm A'
        }
    })


    function check_out(id) {
        Swal.fire({
            title: 'Check Out',
            text: "Are you sure to check out this account?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#343a40',
            cancelButtonColor: '#868e96',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('public_space/check_out/') ?>' + id,
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Check Out',
                            text: 'This account has been checked out',
                            showConfirmButton: false,
                            timer: 1500
                        }).then((value) => {
                            window.location.reload()
                        });

                    }
                })
            }
        })
    }
</script>
</body>

</html>