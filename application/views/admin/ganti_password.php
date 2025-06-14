<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Change Password</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?php
        if(isset($_GET['pesan']) && $_GET['pesan'] == 'berhasil'){
            echo '<div class="alert alert-success">Password changed successfully!</div>';
        }
        ?>
        
        <form action="<?php echo base_url().'admin/ganti_password_act'; ?>" method="post">
            <!-- CSRF Token -->
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                   value="<?= $this->security->get_csrf_hash(); ?>">

            <div class="form-group">
                <label>New Password</label>
                <input class="form-control" type="password" name="pass_baru">
                <?php echo form_error('pass_baru'); ?>
            </div>

            <div class="form-group">
                <label>Repeat New Password</label>
                <input class="form-control" type="password" name="ulang_pass">
                <?php echo form_error('ulang_pass'); ?>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
