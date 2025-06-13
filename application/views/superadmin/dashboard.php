<?php
// File: application/views/superadmin/dashboard.php
?>
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
        }
        .dashboard-container {
            max-width: 1000px;
            margin: auto;
            margin-top: 50px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .modal .form-label {
            font-weight: 500;
        }
    </style>
</head>
<body>
<div class="dashboard-container">
    <h2 class="mb-4">Super Admin Dashboard</h2>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('success') ?> </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
    <?php endif; ?>

    <div class="d-flex justify-content-end mb-3">
        <a href="<?= base_url('superadmin/create_admin') ?>" class="btn btn-success">+ Create Admin</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Admin Name</th>
            <th>Username</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($admins)) : ?>
            <?php foreach ($admins as $admin) : ?>
                <tr>
                    <td><?= $admin->admin_id ?></td>
                    <td><?= $admin->admin_name ?></td>
                    <td><?= $admin->admin_username ?></td>
                    <td>
                        <a href="<?= base_url('superadmin/edit_admin/' . $admin->admin_id) ?>" class="btn btn-primary btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $admin->admin_id ?>)">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr><td colspan="4" class="text-center">No admin accounts found.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="<?= base_url('superadmin/delete_confirmed') ?>" id="deleteForm">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="admin_id" id="adminIdToDelete">
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Enter your password to confirm:</label>
                        <input type="password" class="form-control" name="superadmin_password" required>
                    </div>
                    <p class="text-danger">Warning: This action is irreversible.</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Confirm Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function confirmDelete(adminId) {
    document.getElementById('adminIdToDelete').value = adminId;
    new bootstrap.Modal(document.getElementById('confirmDeleteModal')).show();
}
</script>
</body>
</html>
