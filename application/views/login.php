<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!doctype html>
<html lang="en">
<head>
  <!-- head meta/css here -->
</head>
<body class="text-center">
<form method="post" action="<?= base_url('welcome/login') ?>">
  <!-- logo/heading -->
  
  <!-- GET messages -->
  <?php if (isset($_GET['pesan'])): ?>
    <?php if ($_GET['pesan']=='gagal'): ?>
      <div class="alert alert-danger">Login failed: invalid details.</div>
    <?php elseif ($_GET['pesan']=='logout'): ?>
      <div class="alert alert-success">Logged out successfully.</div>
    <?php endif; ?>
  <?php endif; ?>

  <!-- validation errors -->
  <?= validation_errors('<div class="alert alert-danger">','</div>') ?>

  <?php if (isset($error)): ?>
    <div class="alert alert-danger"><?= $error ?></div>
  <?php endif; ?>

  <!-- form inputs -->
  <input name="username" placeholder="Username" required>
  <input type="password" name="password" placeholder="Password" required>

  <select name="user_type" required>
    <option disabled selected>Select Role</option>
    <option value="admin">Admin</option>
    <option value="superadmin">Super Admin</option>
  </select>

  <button type="submit">Login</button>
</form>
</body>
</html>
