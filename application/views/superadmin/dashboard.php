<?php
// File: application/views/superadmin/dashboard.php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Super Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fc;
        }
        .sidebar {
            background: linear-gradient(to bottom, #2c0101, #8b0000);
            color: white;
            min-height: 100vh;
            padding-top: 20px;
        }
        .sidebar h5 {
            margin-left: 10px;
        }
        .logout-btn {
            background-color: #444;
            color: white;
            border: none;
        }
        .logout-btn:hover {
            background-color: #222;
        }
        .admin-table th {
            background-color: #343a40;
            color: white;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar text-center">
            <h4><b>FORMULA 1</b></h4>
            <div class="mt-4">
                <a href="#" class="text-white">Dashboard</a>
            </div>
        </div>

        <!-- Main content -->
        <div class="col-md-10 p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h2><b>Welcome Super Admin</b></h2>
                <a href="<?= base_url('welcome/logout'); ?>" class="btn logout-btn">LOG OUT</a>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <table class="table admin-table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($admin as $a): ?>
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
                        </tbody>
                    </table>

                    <a href="<?= base_url('superadmin/create'); ?>" class="btn btn-success mt-3">+ Add Admin</a>
                </div>
            </div>

            <footer class="text-center mt-5 text-muted">
                &copy; FORMULA1 2025 - Car Rental System
            </footer>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="<?= base_url('superadmin/delete_confirmed'); ?>">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirm Admin Deletion</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="admin_id" id="delete_admin_id">
          <p>Please enter your Super Admin password to confirm deletion:</p>
          <input type="password" name="superadmin_password" class="form-control" required>
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
