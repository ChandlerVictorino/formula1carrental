<?php
// File: application/views/superadmin/create_admin.php
?
<!DOCTYPE html>
<html>
<head>
    <title>Create Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Create Admin</h2>
    <form method="post" action="<?= base_url('superadmin/store') ?>">
        <div class="mb-3">
            <label for="admin_name" class="form-label">Name</label>
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
        <button type="submit" class="btn btn-primary">Create Admin</button>
        <a href="<?= base_url('superadmin/dashboard') ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
