<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Customer</h1>
</div>
    
<div class="card shadow mb-4">
    <div class="card-body">
        <?php foreach($customer as $k){ ?>
        <form action="<?php echo base_url().'admin/customer_update' ?>" method="post">
            <!-- CSRF Token -->
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" 
                   value="<?= $this->security->get_csrf_hash(); ?>">

            <input type="hidden" name="id" value="<?php echo $k->customer_id; ?>">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="<?php echo $k->customer_name; ?>">
                </div>
                <?php echo form_error('name'); ?>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="address" rows="3"><?php echo $k->customer_address; ?></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-10 pt-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="Male"
                               <?php echo ($k->customer_gender=='Male') ? 'checked' : ''; ?>>
                        <label class="form-check-label">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="Female"
                               <?php echo ($k->customer_gender=='Female') ? 'checked' : ''; ?>>
                        <label class="form-check-label">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="Others"
                               <?php echo ($k->customer_gender=='Others') ? 'checked' : ''; ?>>
                        <label class="form-check-label">Others</label>
                    </div>
                </div>
                <?php echo form_error('status'); ?>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Phone Number</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="hp" value="<?php echo $k->customer_hp; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID card number</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="ktp" value="<?php echo $k->customer_ktp; ?>">
                </div>
                <?php echo form_error('ktp'); ?>
            </div>

            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-secondary">Save Changes</button>
                </div>
            </div>
        </form>
        <?php } ?>
    </div>
</div>
