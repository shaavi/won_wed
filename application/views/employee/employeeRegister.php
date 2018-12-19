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

  <body class="bg-ash">

    <nav class="navbar navbar-light bg-white nav-shadow">
      <span class="navbar-brand mt-1 mb-1 h1">EMS</span>
    </nav>

    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xlg-4 offset-md-3 offset-lg-4 offset-xlg-3 bg-white px-4 py-4">
        <?php foreach ($employee as $emp) : ?>
        <form method="post" action="<?php echo site_url('employee/employeeregistercontroller/empRegister'); ?>" >
        <input type="hidden" name="user_id" value="<?= $emp->id ?>"/>
          <h4 class="mb-4">Employee Register</h4>
          <div class="form-group">
         
            <label for="inputEmail">Email address</label>
            <input type="email" value="<?= $emp->email ?>" class="form-control" id="inputEmail" name="inputEmail" aria-describedby="emailHelp" placeholder="Enter email" required>
            <?php
                $success_msg=$this->session->flashdata('success_msg');
                if($success_msg){
                    echo $success_msg;
                }
            ?>
          </div>          
          <div class="form-group">
                <label for="inputDesignation">Designation</label>
                <input type="text" value="<?= $emp->designation ?>" class="form-control" id="inputDesignation" name="inputDesignation" aria-describedby="emailHelp" >
                <!-- <select class="form-control" id="inputDesignation" value="<?= $emp->designation ?>" name="inputDesignation"> -->
                <!-- <option value="Software Engineer">Software Engineer</option>
                <option value="QA Engineer">QA Engineer</option>
                <option value="UI/UX Designer">UI/UX Designer</option>
                <option value="Graphic Designer">Graphic Designer</option>
                <option value="Business Developer">Business Developer</option>
                <option value="Intern">Intern</option> -->
                </select>
            </div>
            <div class="form-group">
                <label for="inputUsername">User name</label>
                <input type="text" value="<?= $emp->username ?>" class="form-control" id="inputUsername" name="inputUsername" aria-describedby="emailHelp" placeholder="Enter Nickname">
            </div>
            <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" value="<?= $emp->name ?>" class="form-control" id="inputName" name="inputName" aria-describedby="emailHelp" placeholder="Enter name" >
          </div>
          <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" value="<?= $emp->password ?>" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" required minlength="4">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="checkRemember">
            <label class="form-check-label" for="checkRemember">Remember me</label>
          </div>
          <button type="submit" class="btn btn-block btn-primary">Login</button>
        </form>
        <?php endforeach; ?>
      </div>
    </div>
    </div>


    
  </body>

<?php
  $this->load->view('shared/adminFooter.php');
?>




    