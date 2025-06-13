<?php
// File: application/views/superadmin/dashboard.php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Super Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Super Admin Dashboard</h2>

    <div class="d-flex justify-content-end mb-3">
        <a href="<?= base_url('superadmin/create_admin') ?>" class="btn btn-success">+ Create Admin</a>
    </div>

    <table class="table table-bordered bg-white shadow-sm">
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

