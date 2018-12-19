<?php
  $this->load->view('shared/employeeHeader.php');
?>
	<style type="text/css">
	    .nav-shadow {
	      box-shadow: 0 1px 1px rgba(0,0,0,.1);
	    }
	    .bg-ash {
	      background: #f9f9f9;
			}			
  	</style>

	<body>


		<?php
  			$this->load->view('shared/employeeNavbar.php');
		?>
		<!-- Nav tabs -->
		<ul class="nav justify-content-center nav-pills mt-3">
			<li class="nav-item tabMenuNav">
				<a class="nav-link active" data-toggle="tab" href="#home">Dashboard</a>
			</li>
			<li class="nav-item tabMenuNav">
				<a class="nav-link" data-toggle="tab" href="#menu1">Profile</a>
			</li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane container active" id="home"><div class="container mt-5">
			<?php foreach($employee as $emp){
										$totalannualleaves = $emp->annual_left;
										$totalcasualleaves = $emp->casual_left;
										$annualtaken = $annualTaken->leave_days;	
										$casualtaken = $casualTaken->leave_days;
										$annualleft = $totalannualleaves - $annualtaken;
										$casualleft = $totalcasualleaves - $casualtaken;
										$allleft = $annualleft + $casualleft;
										if ( ($annualleft <1) && ($casualleft <1) ){ ?>
											<div class="row mb-4">
											<div class="alert alert-warning col-12 col-sm-12" role="alert">
											You have taken all leave. No leave left.
											</div>					
											</div>
										<?php } else { ?>
											<div class="row mb-4">
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#applyLeave">Apply Leave</button>
										</div>
										<?php }
					} ?>
							

				<div class="row">
					<div class="col-12 col-sm-12 col-md-4 py-3">
						<ul class="list-unstyled">
								<li class="media border-bottom border-top py-3">
									<div class="media-body">
										<h5 class="mt-0 mb-1">
										<?php foreach($employee as $emp){
										$totalannualleaves = $emp->annual_left;
										$totalcasualleaves = $emp->casual_left;
										$annualtaken = $annualTaken->leave_days;	
										$casualtaken = $casualTaken->leave_days;
										$annualleft = $totalannualleaves - $annualtaken;
										$casualleft = $totalcasualleaves - $casualtaken;
										$allleft = $annualleft + $casualleft;
										if($allleft>=1){
											print ($allleft);
										}else{
											print ("0");
										}} ?>
										</h5>
										<p class="mb-0 mt-0">All Leaves Remaining</p>
									</div>
								</li>
						</ul>
					</div>
	
					<div class="col-12 col-sm-12 col-md-4 py-3">
						<ul class="list-unstyled">
								<li class="media border-bottom border-top py-3">
									<div class="media-body">
										<h5 class="mt-0 mb-1">
										<?php foreach($employee as $emp){
										$totalleaves = $emp->annual_left;
										$annualtaken = $annualTaken->leave_days;	
										$annualleft = $totalleaves - $annualtaken;
										if($casualleft>=0){
											print ($annualleft);
										}else{
											print ("0");
										}
										} ?>
										</h5>
										<p class="mb-0 mt-0">Annual Remaining</p>										 
									</div>
								</li>
						</ul>
					</div>
	
					<div class="col-12 col-sm-12 col-md-4 py-3">
						<ul class="list-unstyled">
								<li class="media border-bottom border-top py-3">
									<div class="media-body">
										<h5 class="mt-0 mb-1">
										<?php foreach($employee as $emp){
										$totalleaves = $emp->casual_left;
										$casualtaken = $casualTaken->leave_days;	
										$casualleft = $totalleaves - $casualtaken;
										if($casualleft>=0){
											print ($casualleft);
										}else{
											print ("0");
										}
										
										} ?>
										</h5>
										<p class="mb-0 mt-0">Casual Remaining</p>
									</div>
								</li>
						</ul>
					</div>
	
					<div class="col-12 col-sm-12 col-md-6 col-lg-6 py-3">
						<h4 class="mb-4">Pending Leave Requests</h4>
						<?php
						arsort($leave);
						foreach ($leave as $row) {
								if($row->status != "Approved" && $_SESSION['sid']==$row->user_id)
								{
										?>
										<ul class="list-unstyled">
												<li class="media border-bottom border-top py-3">
														<img class="mr-3" src="http://via.placeholder.com/64x64" alt="Generic placeholder image">
														<div class="media-body">
																<h5 class="mt-0 mb-1"><?= $row->user_name ?></h5>
																<p class="mb-0 mt-0"> <?= $row->leave_start.' to '.$row->leave_end ?></p>
																<p class="mt-0"><?= $row->leave_type ?></p>
																<button type="button" class="detailButton" href="<?php echo $row->id; ?>" data-id="<?= $row->id ?>" data-name="<?= $row->user_name ?>" data-toggle="modal" value="<?= $row->id ?>">View Request</button>
														</div>
												</li>
										</ul>
										<?php
								}
						}
						?>
	
					</div>
	
					<div class="col-12 col-sm-12 col-md-6 col-lg-6 py-3">
						<h4 class="mb-4">Approved Leave Requests</h4>
						<?php
							foreach ($leave as $row){
								if($row->status=="Approved" && $_SESSION['sid']==$row->user_id) {								
									echo '
									<ul class="list-unstyled">
											<li class="media border-bottom border-top py-3">
												<img class="mr-3" src="http://via.placeholder.com/64x64" alt="Generic placeholder image">
												<div class="media-body">
													<h5 class="mt-0 mb-1">'.$row->user_name.'</h5>
													<p class="mb-0 mt-0">'.$row->leave_start.' to '.$row->leave_end.'</p>
													<p class="mt-0">'.$row->leave_type.'</p>
													
													<button type="button" class="viewButton" href="<?php echo $id; ?>" data-id="'.$row->id.'" data-name="'.$row->user_name.'" data-toggle="modal" value="'.$row->id.'">View Request</button>
												</div>
											</li> 				
									</ul>
									';
								}
							}
						?>
					</div>	
				</div>
			</div>
		</div>
			<div class="tab-pane  fade" id="menu1">
			<div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xlg-4 offset-md-3 offset-lg-4 offset-xlg-3 bg-white px-4 py-4">

				<?php foreach ($employee as $emp) : ?>
        <form method="post" action="<?php echo site_url('employee/employeedashboardcontroller/editUser'); ?>" >						
          <h4 class="mb-4">Edit Profile</h4>
          <div class="form-group">							
            <label for="inputEmail">Email address</label>            
						<div class="card">
									<div class="card-body">
									<?= $emp->email ?>
									</div>
								</div> 
            </div>
						<div class="form-group">
                <label for="inputDesignation">Designation</label>
								<div class="card">
									<div class="card-body">
									<?= $emp->designation ?>
									</div>
								</div>                
            </div>
          <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" value="<?= $emp->name ?>" class="form-control" id="inputName" name="inputName" aria-describedby="emailHelp" placeholder="Enter name" >
          </div>
            <div class="form-group">
                <label for="inputUsername">User name</label>
                <input type="text" value="<?= $emp->username ?>" class="form-control" id="inputUsername" name="inputUsername" aria-describedby="emailHelp" placeholder="Enter Nickname">
						</div>
						<div class="form-group">
                <label for="inputMobile">Mobile number</label>
                <input type="text" value="<?= $emp->mobile ?>" class="form-control" id="inputMobile" name="inputMobile" aria-describedby="emailHelp" placeholder="Enter Mobile number">
            </div>
          <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" value="<?= $emp->password ?>" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" minlength="6">
          </div>
          <button type="submit" class="btn btn-block btn-primary">Save Changes</button>
				</form>
				<?php endforeach; ?>
      </div>
    </div>
    </div>
			</div>
		</div>		

<!-- apply leave modal -->

		<div class="modal fade" id="applyLeave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Apply Leave</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<form id="myForm" action="" method="post" class="form-horizontal">
		      	<div class="row">
		      		<div class="col-12">
				      	<div class="form-group">
						    <label for="leaveType">Leave Type</label>
						    <select class="form-control" id="leaveType">
								<?php if($casualleft==0 && $annualleft!=0){ ?> 
								<option>Annual</option> 
								<?php	}
								else if($annualleft==0 && $casualleft!=0){
									 ?> <option>Casual</option> <?php }
								else{ ?>
						      <option>Annual</option>
						      <option>Casual</option> <?php } ?>
						    </select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label >From</label>
							<input id="datepickerFrom"/>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label >To</label>
							<input id="datepickerTo"/>
						</div>
					</div>
		      	</div>
		      </form>
		      </div>
		      <div class="modal-footer">
		        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Decline</button> -->
		        <button id="btnApply" type="button" class="btn btn-primary">Apply</button>
		      </div>
		    </div>
		  </div>
		</div>


<!-- Modal -->
<div class="modal fade" id="pendingLeaveRequest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Leave Request</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body" id="leave_details" >
		      	<p> </p>
		      </div>
		      <div class="modal-footer">
		      	<input type="hidden" name="current_leave_id" id="current_leave_id" value="" />		        
		      </div>
		    </div>
		  </div>
		</div>

	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/js/employee/employeeDashboardController.js"></script>

<?php
  $this->load->view('shared/employeeFooter.php');
?>