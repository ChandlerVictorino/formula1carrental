<?php
// File: application/views/superadmin/create.php
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Create Admin</title>
  <link href="<?php echo base_url('assets/css/sb-admin-2.min.css')?>" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h2>Create New Admin</h2>
    <form method="post" action="<?= base_url('superadmin/store_admin') ?>" class="mt-4">
      <!-- ✅ CSRF Token -->
      <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

      <div class="form-group">
        <label>Name</label>
        <input type="text" name="admin_name" class="form-control" required>
      </div>

      <div class="form-group">
        <label>Username</label>
        <input type="text" name="admin_username" class="form-control" required>
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" name="admin_password" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-success">Save Admin</button>
      <a href="<?= base_url('superadmin') ?>" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</body>
</html>
