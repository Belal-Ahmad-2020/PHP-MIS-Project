
<?php
session_start();
require_once("admin/includes/dbconnection.php");

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (empty($email)) {
      $_SESSION['msg'] = "Email is required!";
      $_SESSION['type'] = 'text-danger';
      header('location:online-order.php');
      exit();
  }
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['msg'] = "Enter valid email address!";
    $_SESSION['type'] = 'text-danger';
    header('location:online-order.php');
    exit();
  }
  else if(empty($password)) {
    $_SESSION['msg'] = "Password is required!";
    $_SESSION['type'] = 'text-danger';
    header('location:online-order.php');
    exit();
  }
  else {


    $sql = "SELECT * FROM subscriber WHERE email='$email' AND password='$password' LIMIT 1";
    $result = $con->query($sql);
    
      if ($result->num_rows>0) {  
        $sub = $result->fetch_assoc();          
        $_SESSION['sub_id'] = $sub['subscriber_id'];      
        $sub_id = $_SESSION['sub_id'];
        $query = "INSERT INTO orders VALUES(NULL, $sub_id,  CURDATE()) LIMIT 1";
        $qu_res = $con->query($query);     
        $_SESSION['msg'] = "Order What You Want!";
        $_SESSION['type'] = "text-success";
        header("location:online-order-add.php");
        exit();
      }
      else {
        $_SESSION['msg'] = "Check Your Email And Password!";
        $_SESSION['type'] = "text-danger";
        header("location:online-order.php?login=failed");
        exit();
      }
  }


}






?>



<?php include('includes/header.php');  ?>

    <section class="site-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-6 text-center">
            <h1 class="h1 c"> Login </h1>
          </div>
        </div>
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">

              <?php include('includes/msg.php'); ?>

            <form action="#" method="post" autocomplete="off">
                  <div class="row">
                    <div class="col-md-9 form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" id="email" class="form-control ">
                    </div>
                    <div class="col-md-9 form-group">
                      <label for="phone">Password</label>
                      <input type="password" id="password" name="password" class="form-control ">
                    </div>
                    <div class="col-md-6 form-group">
                      <input type="submit" value="Login" name="submit" class="btn btn-primary btn-lg">
                    </div>

                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12 form-group">                    
                      &nbsp; <a class=""  href="subscriber-add.php">Create new account </a>
                      &nbsp;  &nbsp;
                      <a href="subscriber-add.php">Register</a>
                      
                    </div>
                  </div>

                </form>
            

          </div>

          <!-- END main-content -->

          
            <!-- right sidebar -->
            <div class="col-md-12 col-lg-4 sidebar">
     
              <!-- END sidebar-box -->
              <!-- sidebar box -->
                <?php  include('includes/sidebar_box.php'); ?>      
              <!-- END sidebar-box -->
      
          <!-- END sidebar -->

        </div>
      </div>
    </section>
  
            <!-- footer -->
            <?php include("includes/footer.php"); ?>


    </div>
    <?php include('includes/script.php');  ?>
  </body>
</html>