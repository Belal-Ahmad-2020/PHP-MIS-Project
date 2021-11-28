<?php 
session_start();
require_once("admin/includes/dbconnection.php");
if (isset($_POST['submit'])) {  
$to_email = 'belal.mansoori7@gmail.com';
$subject = $_POST['subject'];
$message  = $_POST['message'];
$from = 'From: '.  $_POST['email'];
$mail = mail($to_email,$subject,$message,$from);

// print_r($mail);
// exit();
if ($mail == true) {
  $_SESSION['msg'] = "Email Sended, We Will Response To You As Soon As Possible!";
  $_SESSION['type'] = 'text-success';
  header('location:contact.php');
     
}
 
}

?>

<?php include("includes/header.php"); ?>

    <section class="site-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-6">
            <h1 class="c"><strong>  Contact US </strong></h1>
          </div>
        </div>
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            <?php include('includes/msg.php'); ?>
            <form action="" method="post"  autocomplete="off">
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Subject</label>
                      <input type="text"  name="subject" id="name" class="form-control " 
                       required="true">
                    </div>
                    <div class="col-md-12 form-group">
                      <label for="email">Email</label>
                      <input type="email" id="email" name="email" class="form-control " title="This Field Can Contains Only Valid Email Address!" required="true">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="message">Write Message</label>
                      <textarea name="message" id="message"  class="form-control " cols="30" rows="8"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="submit"  name="submit" value="Send Message" class="btn btn-primary">
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
              </div>
   <!-- END sidebar -->

        </div>
      </div>
    </section>


  <?php include('includes/footer.php'); ?>
    </div>

    <?php include('includes/script.php'); ?>
  </body>
</html>