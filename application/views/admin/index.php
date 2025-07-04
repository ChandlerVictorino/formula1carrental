  <!-- Page Heading -->
 
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Jumlah Mobile -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Available Cars</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $this->m_rental->edit_data(array('mobile_status'=>1),'mobile')->num_rows(); ?>/<?php echo $this->m_rental->get_data('mobile')->num_rows(); ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-car fa-2x text-gray-500"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Jumlah customer -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Customers</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $this->m_rental->get_data('customer')->num_rows(); ?></div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-500"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Jumlah Transaction -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Transactions</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">₱.<?php include 'transac-count.php' ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-money-bill-alt fa-2x text-gray-500"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Transaction Selesai -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Completed Rentals</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $this->m_rental->edit_data(array('transaction_status'=>1),'transaction')->num_rows(); ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-check-double fa-2x text-gray-500"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->

  <div class="row">

    
    
    <!-- Status Mobile -->
    <div class="col-6">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-danger">New Cars</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <div class="dropdown-header">Select display:</div>
              <a class="dropdown-item" href="#">Available:</a>
              <a class="dropdown-item" href="#">Dirental</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">All Cars</a>
            </div>
          </div>
        </div>
        <!-- Card Body -->
        <ul class="list-group list-group-flush">
        <?php foreach($mobile as $m){ ?>
            <a href="admin/mobil" class="list-group-item list-group-item-action">
                <i class="fas fa-car"></i> <?php echo $m->mobile_carname; ?>
                <?php 
                    if($m->mobile_status == 1){ 
                        echo '<span class="badge badge-pill badge-success">Available</span>';
                    } else { 
                        echo '<span class="badge badge-pill badge-danger">Not Available</span>'; 
                    } 
                ?>
            </a>
        <?php } ?>
        </ul>
      </div>
    </div>

   
      
    
       <!-- Status customer -->
    <div class="col-6">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-danger">New Customers</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <div class="dropdown-header">Select display:</div>
              <a class="dropdown-item" href="#">Men</a>
              <a class="dropdown-item" href="#">Women</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">All</a>
            </div>
          </div>
        </div>
        <!-- Card Body -->
        
        <ul class="list-group list-group-flush">
        <?php foreach($customer as $k){ ?>
            <a href="admin/customer" class="list-group-item list-group-item-action">
                <i class="fas fa-user-circle"></i> <?php echo $k->customer_name; ?>
                <?php 
                if($k->customer_gender == 'Male'){ 
                    echo ' <span class="badge badge-primary badge-pill"><i class="fas fa-male"></i></span>'; 
                } else { 
                    echo ' <span class="badge badge-danger badge-pill"><i class="fas fa-female"></i></span>'; 
                } 
                ?>
            </a>
        <?php } ?>
        </ul>
        
      </div>
    </div>

        
  </div> <!-- Row ends ---->
  

  <!-- Content Row -->
  <div class="row">
      <div class="col">
      <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-danger">Recent Transactions</h6>
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                  <div class="dropdown-header">Select display:</div>
                  <a class="dropdown-item" href="#">Transaction Completed</a>
                  <a class="dropdown-item" href="#">Maturity Transaction</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">All Transactions</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Transaction Date</th>
                      <th>Customer</th>
                      <th>Car</th>
                      <th>Rent</th>
                      <th>Return</th>
                      <th>Total</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($transaction as $t){ ?>
                      <tr>
                        <td><?php echo date('d/m/Y',strtotime($t->transaction_tgl)); ?></td>
                        <td><?php echo $t->customer_name; ?></td>
                        <td><?php echo $t->mobile_carname; ?></td>
                        <td><?php echo date('d/m/Y',strtotime($t->transaction_tgl_borrow)); ?></td>
                        <td><?php echo date('d/m/Y',strtotime($t->transaction_tgl_return)); ?></td>
                        <td><?php echo '₱. '.number_format($t->transaction_price).'/-'; ?></td>
                        <td class="text-center"><?php echo ($t->transaction_status == 1)?'<i class="fas fa-check-circle" style="color:green;"></i> Finished':'<i class="fas fa-times-circle" style="color:red;"></i> Not Finished'; ?></td>
                      </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
  </div>
  <script src="<?php echo base_url().'assets/'; ?>js/demo/chart-area-demo.js"></script>
  <!-- <script src="<?php echo base_url().'assets/'; ?>js/demo/chart-pie-demo.js"></script> -->