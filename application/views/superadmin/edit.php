<?php
// File: application/views/superadmin/edit.php
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Edit Admin</title>
  <link href="<?php echo base_url('assets/css/sb-admin-2.min.css')?>" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h2>Edit Admin</h2>
    <form method="post" action="<?= base_url('superadmin/update_admin')?>" class="mt-4">
      <input type="hidden" name="admin_id" value="<?= $admin->admin_id ?>">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="admin_name" class="form-control" required value="<?= $admin->admin_name ?>">
      </div>
      <div class="form-group">
        <label>Username</label>
        <input type="text" name="admin_username" class="form-control" required value="<?= $admin->admin_username ?>">
      </div>
      <div class="form-group">
        <label>New Password (leave blank to keep current)</label>
        <input type="password" name="admin_password" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Update Admin</button>
      <a href="<?= base_url('superadmin')?>" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</body>
</html>
