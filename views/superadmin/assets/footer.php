<?php
session_start();

if (!isset($_SESSION['superadmin_name'])) {
    header('location:../../login/login_form');
}
?>

<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Ryky Ardiansyah | Skripsi 2023</span>
        </div>
    </div>
</footer>

<!-- Datatables JavaScript-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#buku').DataTable();
    });
</script>