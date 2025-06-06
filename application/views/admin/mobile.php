<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Rental Car Details</h1>
    <a href="<?php echo base_url().'admin/mobile_add'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Add Car Details
    </a>
</div>
    
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Color</th>
                        <th>Production Year</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $no=1;
                foreach($mobile as $m){
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $m->mobile_carname ?></td>
                        <td><?php echo $m->mobile_plate ?></td>
                        <td><?php echo $m->mobile_color ?></td>
                        <td><?php echo $m->mobile_year ?></td>
                        <td>
                        <?php
                        if($m->mobile_status == 1){
                            echo 'Available';
                        } else {
                            echo 'Not Available';
                        }
                        ?>
                        </td>
                        <td>
                            <a class="btn btn-success btn-sm" href="<?php echo base_url().'admin/mobile_edit/'.$m->mobile_id; ?>">
                                <i class="fas fa-edit"></i> 
                            </a>
                            <a class="btn btn-danger btn-sm btn-hapus" href="<?php echo base_url().'admin/mobile_hapus/'.$m->mobile_id; ?>">
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

<!-- JavaScript for Delete Confirmation -->
<script type="text/javascript">
$('.btn-hapus').on("click", function(e) {
  e.preventDefault();
  var url = $(this).attr('href');
  swal({
      title: "Are you sure you want to delete data?",
      text: "Data cannot be recovered after being deleted!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: '#DD6B55',
      confirmButtonText: 'Yes, delete!',
      cancelButtonText: "No, cancel!",
      confirmButtonClass: "btn-danger",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        swal("Deleted!", "Car data has been deleted!", "success");
        setTimeout(function() {
            window.location.href = url;
        }, 2000);
      } else {
        swal("Canceled", "Car data is safe. :)", "error");
      }
    });
});
</script>
