<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$CI =& get_instance();
if ($CI->session->userdata('status') === 'login') {
    $role = $CI->session->userdata('role');
    if ($role === 'superadmin') {
        redirect('superadmin/dashboard');
    } elseif ($role === 'admin') {
        redirect('admin/dashboard');
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Rental > Login</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url().'assets/css/sb-admin-2.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/vendor/fontawesome-free/css/all.min.css'; ?>" rel="stylesheet" type="text/css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url().'assets/css/signin1.css'; ?>" rel="stylesheet">
  </head>
  <body class="text-center">
  <form class="form-signin" method="post" action="<?php echo base_url().'welcome/login'; ?>">
    <div>
      <img src="assets/img/Formula1.png" alt="">
    </div>
    <h1 class="h3 mb-3 font-weight-bold">Formula 1</h1>
    <h3 class="h3 mb-3 font-weight-normal">Car Rental System</h3>

    <?php
      if(isset($_GET['pesan'])){
          if($_GET['pesan'] == "gagal"){
              echo '<div class="alert alert-danger text-left" role="alert"><strong>Login Failed!</strong><br>Invalid Details</div>';
          } else if($_GET['pesan'] == "logout"){
              echo '<div class="alert alert-success text-left" role="alert">Logged Out!</div>';
          } else if($_GET['pesan'] == "belumlogin"){
              echo '<div class="alert alert-warning text-left" role="alert">Please login to continue</div>';
          }
      }
    ?>

    <label for="inputUname" class="sr-only">Username</label>
    <input type="text" name="username" id="inputUname" class="form-control" placeholder="Username" required>
    <?php echo form_error('username'); ?>

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <?php echo form_error('password'); ?>

    <!-- New Dropdown for Role Selection -->
    <label for="user_type" class="sr-only">User Type</label>
    <select name="user_type" id="user_type" class="form-control mb-3" required>
      <option value="" disabled selected>Select Role</option>
      <option value="admin">Admin</option>
      <option value="superadmin">Super Admin</option>
    </select>
    <?php echo form_error('user_type'); ?>

    <button class="btn btn-lg btn-danger btn-block" type="submit">Login</button>
    <p class="mt-5 mb-3 text-muted">&copy; <?php echo date("Y"); ?> Formula One</p>
  </form>
  </body>
</html>
