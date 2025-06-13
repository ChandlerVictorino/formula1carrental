<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
<?php endif; ?>
<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
<?php endif; ?>

<form method="post" action="<?= base_url('superadmin/update_password') ?>">
    <div class="mb-3">
        <label for="old_password" class="form-label">Current Password</label>
        <input type="password" class="form-control" name="old_password" required>
    </div>
    <div class="mb-3">
        <label for="new_password" class="form-label">New Password</label>
        <input type="password" class="form-control" name="new_password" required>
    </div>
    <div class="mb-3">
        <label for="confirm_password" class="form-label">Confirm New Password</label>
        <input type="password" class="form-control" name="confirm_password" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Password</button>
</form>
