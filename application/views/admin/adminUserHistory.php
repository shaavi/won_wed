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

		<!-- Tab panes -->

		<div class="tab-content">
			<div class="tab-pane container active" id="home"><div class="container mt-5">
					
				
			<?php foreach ($users1 as $emp) {?>
				<ul style="list-style-type:none">
					<li><h4>Name: <?= $emp->name ?>  </h4></li>
					<li><h4>Email: <?= $emp->email ?>  </h4></li>
					<li><h4>Username: <?= $emp->username ?>  </h4></li>
				</ul>
					<?php  } ?>

				<div class="row">
					<div class="col-12 col-sm-12 col-md-4 py-3">
						<ul class="list-unstyled">
								<li class="media border-bottom border-top py-3">
									<div class="media-body">
										<h5 class="mt-0 mb-1">
										<?php foreach($users1 as $emp){
										$totalannualleaves = $emp->annual_left;
										$totalcasualleaves = $emp->casual_left;
										$annualtaken = $annualTaken->leave_days;	
										$casualtaken = $casualTaken->leave_days;
										$annualleft = $totalannualleaves - $annualtaken;
										$casualleft = $totalcasualleaves - $casualtaken;
										$allleft = $annualleft + $casualleft;
										print ($allleft);
										} ?>
										</h5>
										<p class="mb-0 mt-0">All Leaves</p>									 
									</div>
								</li>
						</ul>
					</div>

					

					<div class="col-12 col-sm-12 col-md-4 py-3">
						<ul class="list-unstyled">
								<li class="media border-bottom border-top py-3">
									<div class="media-body">
										<h5 class="mt-0 mb-1">
										<?php foreach($users1 as $emp){
										$totalleaves = $emp->annual_left;
										$annualtaken = $annualTaken->leave_days;	
										$annualleft = $totalleaves - $annualtaken;
										print ($annualleft);
										} ?>
										</h5>
										<p class="mb-0 mt-0">Annual</p>
									</div>
								</li>
						</ul>
					</div>
	
					<div class="col-12 col-sm-12 col-md-4 py-3">
						<ul class="list-unstyled">
								<li class="media border-bottom border-top py-3">
									<div class="media-body">
										<h5 class="mt-0 mb-1">
										<?php foreach($users1 as $emp){
										$totalleaves = $emp->casual_left;
										$casualtaken = $casualTaken->leave_days;	
										$casualleft = $totalleaves - $casualtaken;
										print ($casualleft);
										} ?>
										</h5>
										<p class="mb-0 mt-0">Casual</p>
									</div>
								</li>
						</ul>
					</div>
					
		<div class="container mt-5">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-6 col-lg-6 py-3">
					<div id="showleave">
					<h4 class="mb-4">Pending Requests</h4>
						<?php
						foreach ($leave1 as $leave) {
							if($leave->status!="Approved")
							{
								?>
									<ul class="list-unstyled">
											<li class="media border-bottom border-top py-3">
													<img class="mr-3" src="http://via.placeholder.com/64x64" alt="Generic placeholder image">
													<div class="media-body">
															<h5 class="mt-0 mb-1"><?= $leave->user_name ?></h5>							
															<p class="mb-0 mt-0"> <?= $leave->leave_start.' to '.$leave->leave_end ?></p>
															<p class="mt-0"><?= $leave->leave_type ?></p>														
													</div>
											</li>
									</ul>	
						<?php	}
						}	?>			
					</div>
				</div>
				


				<div class="col-12 col-sm-12 col-md-6 col-lg-6 py-3">
					<h4 class="mb-4">Upcoming Leaves</h4>
					<?php
						unset($leave);
						foreach ($leave1 as $leave) {
							if($leave->status=="Approved")
							{
								?>					
									<ul class="list-unstyled">
											<li class="media border-bottom border-top py-3">
													<img class="mr-3" src="http://via.placeholder.com/64x64" alt="Generic placeholder image">
													<div class="media-body">
															<h5 class="mt-0 mb-1"><?= $leave->user_name ?></h5>
															<p class="mb-0 mt-0"> <?= $leave->leave_start.' to '.$leave->leave_end ?></p>
															<p class="mt-0"><?= $leave->leave_type ?></p>														
													</div>
											</li>
									</ul>
								<?php
							}
					}
					?>
					
				</div>
			</div>
		</div>
			</div>
					
				</div>
			</div>
		</div>
			<div class="tab-pane  fade" id="menu1">
			<div class="container mt-5">
    </div>
			</div>
				



	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/js/employee/employeeDashboardController.js"></script>

<?php
  $this->load->view('shared/employeeFooter.php');
?>