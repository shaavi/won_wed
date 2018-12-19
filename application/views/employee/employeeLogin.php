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

  <body class="bg-ash">

   
    
    <nav class="navbar navbar-light bg-white nav-shadow">
      <span class="navbar-brand mt-1 mb-1 h1">EMS</span>
    </nav>

    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xlg-4 offset-md-3 offset-lg-4 offset-xlg-3 bg-white px-4 py-4">
        <form method="post" action="<?php echo site_url('employee/employeelogincontroller/login'); ?>" >
        <?php
          $success_msg=$this->session->flashdata('success_msg');
            if($success_msg){
               echo $success_msg;
            }
        ?>
        <?php
          $emsg=$this->session->flashdata('emsg');
            if($emsg){
              echo $emsg;
            }
        ?>
          <h4 class="mb-4">Login</h4>
          <div class="form-group">
            <label for="inputEmail">Email address</label>
            <input type="email" class="form-control" id="inputEmail" name="inputEmail" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="checkRemember">
            <label class="form-check-label" for="checkRemember">Remember me</label>
          </div>
          <button type="submit" class="btn btn-block btn-primary">Login</button>
        </form>
      </div>
    </div>
  </body>

<?php
  $this->load->view('shared/employeeFooter.php');
?>




    