<?php
include("../../connectDB.php");

$id = $_GET['id'];
$hapusData = mysqli_query($connect, "DELETE FROM pengguna WHERE id='$id'");
if ($hapusData) {
    ?>
    <script type="text/javascript">
        alert("Hapus data berhasil");
        window.location.href = "./pengguna.php";
    </script>
    <?php
}
?>