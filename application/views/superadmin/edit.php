<?php
// File: application/views/superadmin/edit.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Admin</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>">
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Admin</h2>
        <form action="<?php echo base_url('superadmin/update/'.$admin->admin_id); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $admin->admin_username; ?>" required>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $admin->admin_name; ?>" required>
            </div>
            <div class="form-group">
                <label>Password (leave blank to keep current)</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?php echo base_url('superadmin'); ?>" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
