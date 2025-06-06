<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">New Transaction</h1>
</div>
    
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="<?php echo base_url().'admin/transaction_add_act' ?>" method="post">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Customer</label>
                <div class="col-sm-10">
                    <select name="customer" class="form-control">
                        <option value="" disabled selected>Choose Customer</option>
                        <?php foreach($customer as $k){ ?>
                        <option value="<?php echo $k->customer_id ?>"><?php echo $k->customer_name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <?php echo form_error('customer'); ?>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Car</label>
                <div class="col-sm-10">
                    <select name="mobile" class="form-control">
                        <option value="" disabled selected>Choose a Car</option>
                        <?php foreach($mobile as $m){ ?>
                        <option value="<?php echo $m->mobile_id ?>"><?php echo $m->mobile_carname ?></option>
                        <?php } ?>
                    </select>
                </div>
                <?php echo form_error('mobile'); ?>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Borrow Date</label>
                <div class="col-sm-10"><input type="date" class="form-control" name="tgl_borrow"></div>
                <?php echo form_error('tgl_borrow'); ?>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Return Date</label>
                <div class="col-sm-10"><input type="date" class="form-control" name="tgl_return"></div>
                <?php echo form_error('tgl_return'); ?>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Total Price</label>
                <div class="col-sm-10"><input type="number" class="form-control" name="price" placeholder="3000"></div>
                <?php echo form_error('price'); ?>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Fine Per-Day</label>
                <div class="col-sm-10"><input type="number" class="form-control" name="fine" placeholder="500"></div>
                <?php echo form_error('fine'); ?>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>