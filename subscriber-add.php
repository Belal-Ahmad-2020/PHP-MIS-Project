
<?php
session_start();
require_once("admin/includes/dbconnection.php");



if (isset($_POST['submit'])) {
    $name = $_POST['subscriber_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $dob = $_POST['date'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $cpassword = $_POST['confpassword'];
    
    if ($password == $cpassword) {

      $sql = "INSERT INTO subscriber VALUES(NULL, '$name', $phone, '$email', '$password', '$dob', $gender, '$address')";
      $result = $con->query($sql);
      
        if ($result) {
          $_SESSION['msg']="Your Orders Addedd Successfully!";
          $_SESSION['type']="text-success";
          header("location:online-order-add.php");
          exit();
        }
        else {
          $_SESSION['msg']="Account Does Not Created!";
          $_SESSION['type']="text-danger";
          header("location:subscriber-add.php");
          exit();
        }

    }
    else {
      $_SESSION['msg']="Password Does Not Match";
      $_SESSION['type']="text-danger";
      header("location:subscriber-add.php");
      exit();          
    }
    
}


?>

<?php include('includes/header.php'); ?>

    <section class="site-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-6 text-center">
            <h1 class="h1 c"> Create New Account </h1>
          </div>
        </div>
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
<br>
          <?php include('includes/msg.php'); ?>    
<br>
            <form action="#" method="post" autocomplete="off">
                  <div class="row">
                    <div class="col-md-9 form-group">
                      <label for="name">Name</label>
                      <input type="text"  name="subscriber_name" id="name" class="form-control " required="true">
                    </div>                    
                    <div class="col-md-9 form-group">
                      <label for="email">Email</label>
                      <input type="email"  name="email" id="email" class="form-control " required="true">
                    </div>
                    <div class="col-md-9 form-group">
                      <label for="phone">Phone</label>
                      <input type="text"  name="phone" id="phone" class="form-control " required="true">
                    </div>
                    <div class="col-md-9 form-group">
                      <label for="phone">Gender</label>
                      <select class="form-control" name="gender">
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                      </select>
                    </div>
                    
                    <div class="col-md-9 form-group">
                      <label for="date">Date Of Birth</label>
                      <input type="date"  name="date" id="date" class="form-control " required="true">
                    </div>
                        
                    <div class="col-md-9 form-group">
                      <label for="address">Address</label>
                      <input type="text"  name="address" id="address" class="form-control " required="true">
                    </div>                                        
                    <div class="col-md-9 form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password"  id="password" class="form-control " required="true">
                    </div>
                    
                    <div class="col-md-9 form-group">
                      <label for="conpassword">Confirm Password</label>
                      <input type="password"  name="confpassword" id="confirmpassword" class="form-control " required="true">
                    </div>
                    <div class="col-md-6 form-group">
                      <input type="submit" value="Register" name="submit" class="btn btn-primary btn-lg">
                    </div>

                  </div>
                  <br>

                  <div class="row">

                  </div>

                  <div class="row">
                    <div class="col-md-12 form-group"> 
                      &nbsp; <a class=""  href="online-order.php">Already have an account? </a>
                      &nbsp;  &nbsp;
                      <a href="online-order.php">Login</a>
                      
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