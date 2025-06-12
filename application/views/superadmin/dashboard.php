<?php
// File: application/views/superadmin/dashboard.php
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Super Admin Dashboard</title>
  <link href="<?php echo base_url('assets/css/sb-admin-2.min.css')?>" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">
      <h2>Super Admin Dashboard</h2>
      <a href="<?php echo base_url('welcome/logout')?>" class="btn btn-outline-danger">Logout</a>
    </div>
    <a href="<?php echo base_url('superadmin/create_admin')?>" class="btn btn-primary mb-4">+ Add Admin</a>
    <table class="table table-striped table-bordered">
      <thead class="thead-dark">
        <tr><th>ID</th><th>Name</th><th>Username</th><th>Actions</th></tr>
      </thead>
      <tbody>
      <?php foreach($admins as $admin): ?>
        <tr>
          <td><?= $admin->admin_id ?></td>
          <td><?= $admin->admin_name ?></td>
          <td><?= $admin->admin_username ?></td>
          <td>
            <a href="<?= base_url('superadmin/edit/'.$admin->admin_id)?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="<?= base_url('superadmin/delete/'.$admin->admin_id)?>" class="btn btn-danger btn-sm"
               onclick="return confirm('Delete this admin?')">Delete</a>
          </td>
        </tr>
      <?php endforeach ?>
      </tbody>
    </table>
  </div>
</body>
</html>
