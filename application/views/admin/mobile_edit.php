<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Car Details</h1>
</div>
    
<div class="card shadow mb-4">
    <div class="card-body">
        <?php foreach($mobile as $m){ ?>
        <form action="<?php echo base_url().'admin/mobile_update' ?>" method="post">
            <!-- CSRF Protection -->
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" 
                   value="<?php echo $this->security->get_csrf_hash(); ?>" />
                   
            <input type="hidden" name="id" value="<?php echo $m->mobile_id; ?>">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Select Car</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="carname" value="<?php echo $m->mobile_carname; ?>">
                </div>
                <?php echo form_error('carname'); ?>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Plate Number</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="plate" value="<?php echo $m->mobile_plate; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Car Color</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="color" value="<?php echo $m->mobile_color; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Vehicle Year</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="year" value="<?php echo $m->mobile_year; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select class="form-control" name="status">
                        <option value="1"<?php echo ($m->mobile_status==1)?' selected="selected"':'' ?>>Available</option>
                        <option value="0"<?php echo ($m->mobile_status==1)?'':' selected="selected"' ?>>Not Available</option>
                    </select>
                </div>
                <?php echo form_error('status'); ?>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-secondary">Update Details</button>
                </div>
            </div>
        </form>
        <?php } ?>
    </div>
</div>
