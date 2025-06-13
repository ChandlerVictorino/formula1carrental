<form method="post" action="<?= base_url('superadmin/update_superadmin_info') ?>">
    <?= csrf_field() ?>
    <label>Name:</label>
    <input type="text" name="name" value="<?= $this->session->userdata('name') ?>">
    
    <label>New Password (optional):</label>
    <input type="password" name="new_password">
    
    <button type="submit">Update</button>
</form>
