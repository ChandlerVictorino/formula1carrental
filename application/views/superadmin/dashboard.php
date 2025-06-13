<?php
// File: application/views/superadmin/dashboard.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Super Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
        }
        .sidebar {
            width: 180px;
            background: linear-gradient(to bottom, #300000, #800000);
            height: 100vh;
            color: white;
            position: fixed;
        }
        .sidebar h4 {
            padding: 20px;
            font-weight: bold;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
        }
        .sidebar a:hover {
            background-color: #a00000;
        }
        .main {
            margin-left: 180px;
            padding: 20px;
        }
        .logout-btn {
            float: right;
            margin-top: -40px;
        }
        .table thead {
            background-color: #343a40;
            color: white;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4><img src="https://upload.wikimedia.org/wikipedia/commons/3/33/F1.svg" width="25"> FORMULA 1</h4>
        <a href="<?= base_url('superadmin/dashboard') ?>">Dashboard</a>
    </div>

    <div class="main">
        <h2>Welcome Super Admin</h2>
        <a href="<?= base_url('welcome/logout') ?>" class="btn btn-dark logout-btn">LOG OUT</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($admin)): ?>
                <?php foreach ($admin as $a): ?>
                    <tr>
                        <td><?= $a->admin_id; ?></td>
                        <td><?= $a->admin_name; ?></td>
                        <td><?= $a->admin_username; ?></td>
                        <td>
                            <a href="<?= base_url('superadmin/edit/' . $a->admin_id); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="setDeleteId(<?= $a->admin_id; ?>)">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">No admin accounts found.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>

        <a href="<?= base_url('superadmin/create') ?>" class="btn btn-success mt-3">+ Add Admin</a>

        <footer class="text-center mt-5">
            <small>© FORMULA1 2025 - Car Rental System</small>
        </footer>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form method="post" action="<?= base_url('superadmin/delete') ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="admin_id" id="delete_admin_id">
                    <p>Please enter your Super Admin password to confirm:</p>
                    <input type="password" class="form-control" name="superadmin_password" required placeholder="Enter password">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Confirm Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
      </div>
    </div>

    <script>
        function setDeleteId(id) {
            document.getElementById('delete_admin_id').value = id;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

