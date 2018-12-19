<?php
  $this->load->view('shared/adminHeader.php');
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
  			$this->load->view('shared/adminNavbar.php');
		?>
		<ul class="nav justify-content-center bg-white nav-shadow pt-2 pb-2">
		  <li class="nav-item">
		    <a class="nav-link active" href="#">Dashboard</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="<?php echo site_url('admin/adminemployeescontroller/index') ?>">Employees</a>
		  </li>
		</ul>

		<div class="tab-pane container active" id="home"><div class="container mt-5"></div>
				<?php if ( $this->session->userdata('annual_left')!=0 && $this->session->userdata('casual_left') != 0 )   { ?>
					<div class="row mb-4">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#applyLeave">Apply Leave</button>
					</div>
				<?php }
				else{ ?>
					<div class="row mb-4">
					<div class="alert alert-warning col-12 col-sm-12" role="alert">
					You have taken all leave. No leave left.
			<?php	} ?>
					</div>
					</div>
		</div>
		
		<div class="container mt-5">
			<h2>My Leave Details:</h2>
				<div class="row">
					<div class="col-12 col-sm-12 col-md-6 col-lg-6 py-3">
						
							<div class="col-12 col-sm-12 col-md-6 col-lg-6 py-3">
									<h4 class="mb-4">Requested Leaves</h4>
									<?php
									arsort($leave);
										foreach ($leave as $row){
											if($row->status!="Approved" && $_SESSION['name']==$row->user_name) {								
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
					
	
	
					<div class="col-12 col-sm-12 col-md-6 col-lg-6 py-3">
						<h4 class="mb-4">Upcoming Leaves</h4>
						<?php
							foreach ($leave as $row){
								if($row->status == "Approved" && $_SESSION['name'] == $row->user_name) {								
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
		
<!-- leave requests of others	 -->
	<div class="container mt-5">
				<h2>Others Leave Details:</h2>
			<div class="row">
				<div class="col-12 col-sm-12 col-md-6 col-lg-6 py-3">
					
				<div id="showleave">
					<h4 class="mb-4">Pending Requests</h4>
					<?php
					foreach ($leave as $row) {
							if($row->status != "Approved" && $_SESSION['name'] != $row->user_name)
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
				</div>
				


				<div class="col-12 col-sm-12 col-md-6 col-lg-6 py-3">
					<h4 class="mb-4">Upcoming Leaves</h4>
					<?php
						foreach ($leave as $row){
							if($row->status=="Approved") {								
								echo '
								<ul class="list-unstyled">
					  				<li class="media border-bottom border-top py-3">
									    <img class="mr-3" src="http://via.placeholder.com/64x64" alt="Generic placeholder image">
									    <div class="media-body">
									      <h5 class="mt-0 mb-1">'.$row->user_name.'</h5>
									      <p class="mb-0 mt-0">'.$row->leave_start.' to '.$row->leave_end.'</p>
									      <p class="mt-0">'.$row->leave_type.'</p>
									      
									      <button type="button" class="detailButton" href="<?php echo $id; ?>" data-id="'.$row->id.'" data-name="'.$row->user_name.'" data-toggle="modal" value="'.$row->id.'">View Request</button>
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
		        <button type="button" id="declinebtn" class="btn btn-secondary" >Decline</button>
		        <button type="button" id="approvebtn" class="btn btn-primary">Approve</button>
		      </div>
		    </div>
		  </div>
		</div>


		<!-- Modal -->
		<div class="modal fade" id="pendingLeaveRequest1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Leave Request</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body" id="leave_details1" >
							<p> </p>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="current_leave_id" id="current_leave_id" value="" />
						</div>
					</div>
				</div>
			</div>
		
		<!-- Modal -->
		<div class="modal fade" id="upcomingLeaves" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Leave Request</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body" id="leave_details">     	
		      	
		      	
		      	</div>
		    </div>
		  </div>
		</div>		

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
						      <option>Annual</option>
						      <option>Casual</option>
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
		        <button id="btnApply" type="button" class="btn btn-primary">Apply</button>
		      </div>
		    </div>
		  </div>
		</div>


	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/js/admin/adminDashboardController.js"></script>
	
<?php
	$this->load->view('shared/adminFooter.php');	
?>
