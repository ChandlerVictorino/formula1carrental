<?php
// File: application/views/superadmin/create.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Admin</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>">
</head>
<body>
    <div class="container mt-4">
        <h2>Create New Admin</h2>
        <form action="<?php echo base_url('superadmin/store'); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="<?php echo base_url('superadmin'); ?>" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
