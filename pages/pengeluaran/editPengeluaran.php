<?php
session_start();
include('../../connectDB.php');

if (empty($_SESSION['session'])) {
    header("location:../login/login.php");
}

if ($_SESSION['session']) {
    $id = $_SESSION['session'];
    $sql = mysqli_query($connect, "SELECT * FROM pengguna WHERE id='$id'");
    $data = mysqli_fetch_assoc($sql);
}

$idDetail = $_GET['id'];
$getData = mysqli_query($connect, "SELECT * FROM pengeluaran WHERE id='$idDetail'");
$detailData = mysqli_fetch_assoc($getData);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Percetakan Informasi Sistem</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4" style="background-color: #003467;">
            <!-- Brand Logo -->
            <a href="../../index.php" class="brand-link text-center text-white">
                <span class="brand-text font-weight-light">Pencatatan Percetakan</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../dist/img/user.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="../profile/profile.php" class="d-block">
                            <?php echo $data['nama_lengkap']; ?>
                        </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="../../index.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Master Data
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../stok/stok.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Stok</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../supplier/supplier.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Supplier</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../pengguna/pengguna.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>pengguna</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="../pemasukan/pemasukan.php" class="nav-link">
                                <i class="nav-icon fas fa-arrow-left"></i>
                                <p>
                                    Pemasukan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pengeluaran.php" class="nav-link active">
                                <i class="nav-icon fas fa-arrow-right"></i>
                                <p>
                                    Pengeluaran
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../login/logout.php" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Edit Pengeluaran</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Pengeluaran</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <!-- /.card-header -->
                                <form role="form" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Stok</label>
                                                    <select name="id_stok" class="form-control" required>
                                                        <option value="">--Pilih Stok--</option>
                                                        <?php
                                                        $stok = mysqli_query($connect, "SELECT * FROM stok");
                                                        while ($dataStok = mysqli_fetch_assoc($stok)) {
                                                            if ($dataStok['id'] == $detailData['id_stok']) {
                                                                $selected = 'selected';
                                                            } else {
                                                                $selected = '';
                                                            }
                                                            $option = '<option value="' . $dataStok['id'] . '"' . $selected . '>' . $dataStok['nama_stok'] . '</option>';
                                                            echo $option;
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Tanggal Keluar</label>
                                                    <input type="date" class="form-control" name="tgl_pengeluaran"
                                                        required placeholder="Tanggal Keluar"
                                                        value="<?php echo $detailData['tgl_pengeluaran'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Kebutuhan</label>
                                                    <textarea name="kebutuhan" id="" cols="30" rows="5" class="form-control"><?php echo $detailData['kebutuhan'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Stok Masuk</label>
                                                    <input type="number" class="form-control" name="stok_pengeluaran"
                                                        required placeholder="Stok Masuk"
                                                        value="<?php echo $detailData['stok_pengeluaran'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <input type="submit" class="btn btn-primary" name="update_pengeluaran"
                                            value="Ubah">
                                        <a href="pengeluaran.php" class="btn btn-danger">Batal</a>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
                  <strong>@Copyright by 20552011281_Adis Shobirin_TIF K 20_UASWEB1</strong>

        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../../dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
</body>

</html>

<?php
if (isset($_POST['update_pengeluaran'])) {
    $stok = $_POST['id_stok'];
    $tglPengeluaran = $_POST['tgl_pengeluaran'];
    $kebutuhan = $_POST['kebutuhan'];
    $stokKeluar = $_POST['stok_pengeluaran'];

    $updateData = mysqli_query($connect, "UPDATE pengeluaran SET id_stok='$stok', tgl_pengeluaran='$tglPengeluaran', kebutuhan='$kebutuhan', stok_pengeluaran='$stokKeluar' WHERE id='$idDetail'");

    if ($updateData) {
        ?>
        <script type="text/javascript">
            alert("Edit data berhasil");
            window.location.href = "./pengeluaran.php";
        </script>
        <?php
    }
}