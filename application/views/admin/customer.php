<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Customer Details</h1>
    <a href="<?php echo base_url().'admin/customer_add'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Add Customers
    </a>
</div>
    
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Fullname</th>
                        <th>Gender</th>
                        <th>Contact | ID Card</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1;
                foreach($customer as $k){
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $k->customer_name; ?></td>
                        <td><?php echo $k->customer_gender; ?></td>
                        <td>
                            <i class="fas fa-phone-volume"></i> <?php echo $k->customer_hp; ?><br>
                            <i class="fas fa-id-card-alt"></i> <?php echo $k->customer_ktp; ?>
                        </td>
                        <td><?php echo $k->customer_address; ?></td>
                        <td>
                            <a class="btn btn-success btn-sm" href="<?php echo base_url().'admin/customer_edit/'.$k->customer_id; ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm btn-hapus" href="<?php echo base_url().'admin/customer_hapus/'.$k->customer_id; ?>">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Include SweetAlert JS -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- JavaScript for Delete Confirmation -->
<script type="text/javascript">
$('.btn-hapus').on("click", function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    swal({
        title: "Are you sure you want to delete this customer?",
        text: "Data cannot be recovered once deleted!",
        icon: "warning",
        buttons: {
            cancel: {
                text: "No, Cancel",
                visible: true,
                className: "",
                closeModal: true,
            },
            confirm: {
                text: "Yes, Delete",
                className: "btn-danger"
            }
        },
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            swal("Deleted!", "Customer data has been removed.", "success");
            setTimeout(function() {
                window.location.href = url;
            }, 2000);
        } else {
            swal("Cancelled", "The request has been cancelled!", "error");
        }
    });
});
</script>
