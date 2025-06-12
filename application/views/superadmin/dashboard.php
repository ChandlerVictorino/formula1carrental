<?php
// File: application/views/superadmin/dashboard.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>">
</head>
<body>
    <div class="container mt-4">
        <h2>Super Admin Dashboard</h2>
        <a href="<?php echo base_url('superadmin/create'); ?>" class="btn btn-primary mb-3">Create Admin</a>

        <?php if($this->session->flashdata('message')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('message'); ?>
            </div>
        <?php endif; ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($admins as $admin): ?>
                    <tr>
                        <td><?php echo $admin->admin_id; ?></td>
                        <td><?php echo $admin->admin_username; ?></td>
                        <td><?php echo $admin->admin_name; ?></td>
                        <td>
                            <a href="<?php echo base_url('superadmin/edit/'.$admin->admin_id); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?php echo base_url('superadmin/delete/'.$admin->admin_id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
