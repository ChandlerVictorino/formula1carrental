<?php ?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Edit Admin</h2>
    <form method="post" action="<?php echo base_url('superadmin/update'); ?>">
        <input type="hidden" name="admin_id" value="<?php echo $admin->admin_id; ?>">
        
        <div class="mb-3">
            <label for="admin_name" class="form-label">Admin Name</label>
            <input type="text" class="form-control" id="admin_name" name="admin_name" value="<?php echo $admin->admin_name; ?>" required>
        </div>

        <div class="mb-3">
            <label for="admin_username" class="form-label">Username</label>
            <input type="text" class="form-control" id="admin_username" name="admin_username" value="<?php echo $admin->admin_username; ?>" required>
        </div>

        <div class="mb-3">
            <label for="admin_password" class="form-label">New Password <small>(leave blank to keep current)</small></label>
            <input type="password" class="form-control" id="admin_password" name="admin_password">
        </div>

        <button type="submit" class="btn btn-success">Update Admin</button>
        <a href="<?php echo base_url('superadmin/dashboard'); ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
