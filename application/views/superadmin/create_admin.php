<?php
// File: application/views/superadmin/create_admin.php
?
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <a href="<?= base_url('superadmin/dashboard') ?>" class="btn btn-secondary mb-3">← Back to Dashboard</a>
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Create Admin Account</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('superadmin/store') ?>">
                    <div class="form-group">
                        <label for="admin_name">Name</label>
                        <input type="text" name="admin_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="admin_username">Username</label>
                        <input type="text" name="admin_username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="admin_password">Password</label>
                        <input type="password" name="admin_password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Create Admin</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
