<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
<?php endif; ?>
<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(to bottom, #000000, #dc3545);
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .sidebar .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        .sidebar .logo img {
            width: 50px;
            height: 20px;
        }
        .sidebar a.logout {
            color: white;
            text-decoration: none;
            font-weight: bold;
            text-align: center;
        }
        .sidebar a.logout:hover {
            text-decoration: underline;
        }
        .dashboard-container {
            margin-left: 270px;
            max-width: calc(100% - 270px);
            padding: 40px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            min-height: 100vh;
        }
        .table th {
            background-color: #1c1f23;
            color: white;
        }
        .btn-create {
            background-color: #157347;
            color: white;
        }
        .btn-create:hover {
            background-color: #146c43;
        }
        .btn-edit {
            background-color: #0d6efd;
            color: white;
        }
        .btn-edit:hover {
            background-color: #0b5ed7;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        .btn-delete:hover {
            background-color: #bb2d3b;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            padding: 20px 0;
            color: #6c757d;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="<?php echo base_url('assets/img/f1logii.png'); ?>" alt="Logo">
        </div>
        <div>
            <a href="<?php echo base_url('superadmin/change_info_view'); ?>" class="logout">Change Info</a><br>
            <a href="<?php echo base_url('welcome/logout'); ?>" class="logout">Logout</a>
        </div>
    </div>

    <div class="dashboard-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Super Admin Dashboard</h2>
            <a href="<?php echo base_url('superadmin/create_admin'); ?>" class="btn btn-create">+ Create Admin</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Admin Name</th>
                    <th>Username</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($admins)) : ?>
                <?php foreach ($admins as $admin) : ?>
                    <tr>
                        <td><?php echo $admin->admin_id; ?></td>
                        <td><?php echo $admin->admin_name; ?></td>
                        <td><?php echo $admin->admin_username; ?></td>
                        <td>
                            <?php if (!empty($admin->admin_image)) : ?>
                                <img src="<?php echo base_url('uploads/admins/' . $admin->admin_image); ?>" width="50" height="50">
                            <?php else : ?>
                                No Image
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo base_url('superadmin/edit_admin/' . $admin->admin_id); ?>" class="btn btn-edit btn-sm">Edit</a>
                            <a href="<?php echo base_url('superadmin/delete_admin/' . $admin->admin_id); ?>" class="btn btn-delete btn-sm" onclick="return confirm('Are you sure you want to delete this admin?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr><td colspan="5" class="text-center">No admin accounts found.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>

        <footer>
            &copy; FORMULA1 2025 - Car Rental System
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
