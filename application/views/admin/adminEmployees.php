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
		    <a class="nav-link active" href="<?php echo site_url('admin/admindashboardcontroller/index') ?>">Dashboard</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="#">Employees</a>
		  </li>
		</ul>

<!-- email a new employee to join the ems -->
			
		<div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xlg-4 offset-md-3 offset-lg-4 offset-xlg-3 bg-white px-4 py-4">
				<?php
				echo $this->session->flashdata('email_sent');
				echo form_open('admin/adminemployeescontroller/sendMail');
			?>
        <form method="post" >						
					<h4 class="mb-4">Invite an employee</h4>
					<div class="form-group">
                <label for="inputUsername">User name</label>
                <input type="text"  class="form-control" id="inputUsername" name="inputUsername" aria-describedby="emailHelp" placeholder="Enter Nickname">			
						</div>
          <div class="form-group">							
					<label for="inputEmail">Email address</label>
						<input type="email" class="form-control" id="inputEmail" name="inputEmail" aria-describedby="emailHelp" placeholder="Enter email" required>
						<?php
                $success_msg=$this->session->flashdata('success_msg');
                if($success_msg){
                    echo $success_msg;
                }
            ?>
            </div>						
						<div class="form-group">
              <label for="inputCategory">Category</label>										
								<select class="form-control" id="inputCategory" name="inputCategory">
                <option value="intern">Intern</option>
                <option value="probation">Probation</option>
                <option value="permanent">Permanent</option>
                </select>																              
            </div>
						<div class="form-group">
              <label for="inputDesignation">Designation</label>										
								<select class="form-control" id="inputDesignation" name="inputDesignation">
                <option value="Software Engineer">Software Engineer</option>
                <option value="QA Engineer">QA Engineer</option>
                <option value="UI/UX Designer">UI/UX Designer</option>
                <option value="Graphic Designer">Graphic Designer</option>
                <option value="Business Developer">Business Developer</option>
                <option value="Intern">Intern</option>
                </select>																              
            </div>   
            <div class="form-group form-check">        
          </div>
          <button type="submit" class="btn btn-block btn-primary">Send Invitation</button>
				</form>
			</div>
    </div>
		</div>	
		<?php
				echo form_close();
		?>	


		<div class="container mt-5">
		<table class="table table-hover">
			<h4>Active Employee Details</h4>
			  <thead>
			    <tr>
						<th scope="col">E.No</th>
						<th scope="col">Name</th>
			      <th scope="col">Email</th>
			      <th scope="col">Mobile</th>
						<th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>

				<?php
					foreach ($users as $row) {
							if($row->role_id != 1 && $row->login_status == 'active')
							{
								?>									
					<tr>
						<td><?= $row->id ?></td>
						<td><?= $row->name ?></td>
			      <td><?= $row->email ?></td>
			      <td><?= $row->mobile ?></td>
						<td><a href="<?php echo site_url("admin/adminuserhistorycontroller/index/".$row->id); ?>" id="<?= $row->id ?>" type="button" onclick="">View Leave History</a></td>
			    </tr>
									
				<?php
							}
					}
				?>

			  </tbody>
			</table>
			<br> <br>
			<table class="table table-hover">
			<h4>Invite New Employee</h4>
			  <thead>
			    <tr>
						<th scope="col">Username</th>
			      <th scope="col">Email</th>
			      <th scope="col">link</th>
			    </tr>
			  </thead>
			  <tbody>

				<?php
				
					foreach ($users as $row) {
							if(($row->role_id != 1) && ($row->login_status != 'active'))
							{
								?>									
					<tr>
						<td><?= $row->username ?></td>
			      <td><?= $row->email ?></td>
						<td><?php echo site_url("employee/employeeregistercontroller/index/".$row->id); ?></td>
			    </tr>
									
				<?php
							}
					}
				?>

			  </tbody>
			</table>
		</div>
	</body>

<!-- modal -->
	<div class="modal fade" id="createEmployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Employee</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<div class="row">
		      		<div class="col-12">
				      	<div class="form-group">
						    <label for="fullName">Full Name</label>
						    <input type="text" class="form-control" id="fullName" placeholder="John Doe">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="form-group">
						    <label for="name">Name</label>
						    <input type="text" class="form-control" id="name" placeholder="John">
						</div>
					</div>
		      	</div>
		      	<div class="row">
					<div class="col-12">
						<div class="form-group">
						    <label for="eNo">Employee Number</label>
						    <input type="text" class="form-control" id="eNo" placeholder="12345">
						</div>
					</div>
		      	</div>
		      	<div class="row">
					<div class="col-12">
						<div class="form-group">
						    <label for="email">Email</label>
						    <input type="email" class="form-control" id="email" placeholder="John@mail.com">
						</div>
					</div>
		      	</div>
		      	<div class="row">
					<div class="col-12">
						<div class="form-group">
						    <label for="mobile">Mobile</label>
						    <input type="email" class="form-control" id="mobile" placeholder="071-123456">
						</div>
					</div>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Decline</button> -->
		        <button type="button" class="btn btn-primary">Create</button>
		      </div>
		    </div>
		  </div>
		</div>

<?php
  $this->load->view('shared/adminFooter.php');
?>