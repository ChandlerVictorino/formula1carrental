<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rental > Login</title>

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/signin1.css'); ?>" rel="stylesheet">

    <style>
      .input-group-text {
        background-color: #fff;
        border-left: 0;
        padding: 0.3rem 0.6rem;
      }
      .input-group .form-control {
        border-right: 0;
      }
      .input-group-text i {
        font-size: 0.85rem;
        color: #6c757d;
      }
      .form-control, .btn {
        font-size: 0.9rem;
        padding: 0.5rem 0.75rem;
      }
    </style>
  </head>
  <body class="text-center">

    <?= form_open('welcome/login', ['class' => 'form-signin']) ?>
      <div>
        <img src="<?= base_url('assets/img/Formula1.png'); ?>" alt="Logo" style="max-width: 130px;">
      </div>
      <h1 class="h5 mt-2 font-weight-bold">Formula 1</h1>
      <h6 class="mb-3 font-weight-normal">Car Rental System</h6>

      <?php if ($this->input->get('pesan') == "gagal"): ?>
        <div class="alert alert-danger text-left">Login Failed!<br>Invalid Details</div>
      <?php elseif ($this->input->get('pesan') == "logout"): ?>
        <div class="alert alert-success text-left">Logged Out!</div>
      <?php elseif ($this->input->get('pesan') == "belumlogin"): ?>
        <div class="alert alert-warning text-left">Please login to continue</div>
      <?php endif; ?>

      <input type="text" name="username" class="form-control mb-2" placeholder="Username" required value="<?= set_value('username') ?>">
      <?= form_error('username', '<small class="text-danger">', '</small>'); ?>

      <div class="form-group">
        <div class="input-group">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
              <i class="fas fa-eye" id="toggleIcon"></i>
            </span>
          </div>
        </div>
        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
      </div>

      <select name="user_type" class="form-control mb-3" required>
        <option value="" disabled selected>Select Role</option>
        <option value="admin">Admin</option>
        <option value="superadmin">Super Admin</option>
      </select>
      <?= form_error('user_type', '<small class="text-danger">', '</small>'); ?>

      <button class="btn btn-danger btn-block" type="submit">Login</button>
      <p class="mt-4 text-muted">&copy; <?= date("Y") ?> Formula One</p>
    <?= form_close() ?>

    <script>
      const togglePassword = document.getElementById('togglePassword');
      const passwordInput = document.getElementById('password');
      const toggleIcon = document.getElementById('toggleIcon');

      togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        toggleIcon.classList.toggle('fa-eye');
        toggleIcon.classList.toggle('fa-eye-slash');
      });
    </script>
  </body>
</html>
