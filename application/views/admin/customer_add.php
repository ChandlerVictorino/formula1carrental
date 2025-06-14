<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Customer Details</h1>
</div>
    
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="<?php echo base_url().'admin/customer_add_act' ?>" method="post">
            <!-- CSRF Token -->
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" 
                   value="<?= $this->security->get_csrf_hash(); ?>">

            <!-- Fullname -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Fullname</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="John Doe">
                </div>
                <?php echo form_error('name'); ?>
            </div>

            <!-- Address -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="address" rows="3" placeholder="4189 Nunc Road"></textarea>
                </div>
            </div>

            <!-- Gender -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-10 pt-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="Male">
                        <label class="form-check-label">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="Female">
                        <label class="form-check-label">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="Others">
                        <label class="form-check-label">Others</label>
                    </div>
                </div>
                <?php echo form_error('status'); ?>
            </div>

            <!-- Mobile Number -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mobile Number</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="hp" placeholder="xxxxxxxxxx - 10 Digit Number">
                </div>
            </div>

            <!-- ID Card Number -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID card number</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="ktp" placeholder="xxxxxxxx - 8 Digit Number">
                </div>
                <?php echo form_error('ktp'); ?>
            </div>

            <!-- Submit Button -->
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
