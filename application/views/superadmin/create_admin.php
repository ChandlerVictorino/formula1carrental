<?php
// File: application/views/superadmin/create_admin.php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">

    <h2 class="mb-4">Create New Admin</h2>

    <!-- Flash messages -->
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <!-- Form with file upload support -->
    <form method="post" action="<?php echo base_url('superadmin/store_admin'); ?>" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="admin_name" class="form-label">Admin Name</label>
            <input type="text" class="form-control" id="admin_name" name="admin_name" required>
        </div>
        <div class="mb-3">
            <label for="admin_username" class="form-label">Username</label>
            <input type="text" class="form-control" id="admin_username" name="admin_username" required>
        </div>
        <div class="mb-3">
            <label for="admin_password" class="form-label">Password</label>
            <input type="password" class="form-control" id="admin_password" name="admin_password" required>
        </div>
        <div class="mb-3">
            <label for="admin_image" class="form-label">Profile Image (Optional)</label>
            <input type="file" class="form-control" id="admin_image" name="admin_image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Create Admin</button>
        <a href="<?php echo base_url('superadmin/dashboard'); ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
