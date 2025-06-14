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
    <form method="post" action="<?= base_url('superadmin/update_admin')?>" class="mt-4" enctype="multipart/form-data">

      <!-- ✅ CSRF Token -->
      <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

      <!-- Hidden Admin ID -->
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
        <label>New Password <small>(leave blank to keep current)</small></label>
        <input type="password" name="admin_password" class="form-control">
      </div>

      <div class="form-group">
        <label>Profile Photo <small>(optional)</small></label><br>
        <?php if (!empty($admin->admin_photo)): ?>
            <img src="<?= base_url('uploads/admins/' . $admin->admin_photo) ?>" width="80" height="80" class="mb-2 rounded">
        <?php endif; ?>
        <input type="file" name="admin_photo" class="form-control-file">
      </div>

      <button type="submit" class="btn btn-primary">Update Admin</button>
      <a href="<?= base_url('superadmin')?>" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</body>
</html>
