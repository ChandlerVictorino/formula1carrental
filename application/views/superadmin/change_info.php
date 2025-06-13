<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Change Super Admin Info</h2>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('superadmin/update_info') ?>">
            <!-- CSRF token for CodeIgniter -->
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

            <div class="mb-3">
                <label for="admin_name" class="form-label">Name</label>
                <input type="text" class="form-control" id="admin_name" name="admin_name" value="<?= $superadmin->admin_name ?>" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Leave blank to keep current password">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?= base_url('superadmin') ?>" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
