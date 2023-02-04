<?php
include('../../connectDB.php');

session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PIS | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page" style="background-color: #003467;">
  <div class="login-box">
    <div class="card">
      <div class="card-body login-card-body">
        <div class="my-3 text-center">
            <h2>Login</h2>
            <p>Pencatatan Percetakan</p>
        </div>
        <form action='' method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-center">
            <!-- /.col -->
            <div class="col-4">
              <input type="submit" name="login" class="btn btn-primary btn-block" value="Masuk" />
            </div>
            <!-- /.col -->
          </div>
        </form>

        <p class="mt-5 mb-0 text-center">
          Tidak punya akses? <a href="../register/register.php" class="text-center">Daftar</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>

</body>

</html>

<?php
if(isset($_SESSION['session'])){
?>
<script type="text/javascript">
        window.location.href = "../../index.php";
    </script>
<?php
}

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? md5($_POST['password']) : '';
$login = isset($_POST['login']) ? $_POST['login'] : '';

if ($login) {
  $sql = mysqli_query($connect, "SELECT * FROM pengguna WHERE username='$username' AND password='$password'");
  $cek = mysqli_num_rows($sql);
  if ($cek > 0) {
    $row = mysqli_fetch_array($sql);
    $_SESSION['session'] = $row['id'];
    ?>
    <script type="text/javascript">
      alert("Login Berhasil");
      window.location.href = "../../index.php";
    </script>
  <?php
    exit();
  } else {
    ?>
    <script type="text/javascript">
      alert("Login Gagal");
    </script>
  <?php
  }
}
?>