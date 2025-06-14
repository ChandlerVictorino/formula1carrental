<!DOCTYPE html>
<html>
<head>
    <title>Create Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }
        h2 {
            font-weight: bold;
            margin-bottom: 30px;
        }
        .btn-create {
            background-color: #157347;
            color: white;
        }
        .btn-create:hover {
            background-color: #146c43;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Create New Admin</h2>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

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
            <label for="admin_image" class="form-label">Profile Image (Max 1MB)</label>
            <input type="file" class="form-control" id="admin_image" name="admin_image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-create">Create Admin</button>
        <a href="<?php echo base_url('superadmin/dashboard'); ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>
