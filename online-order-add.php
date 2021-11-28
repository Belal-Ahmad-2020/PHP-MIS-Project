
<?php
session_start();
require_once("admin/includes/dbconnection.php");

if (isset($_GET['more'])) {
  $_SESSION['msg'] = "You Can Order Something Else!";
  $_SESSION['type'] = "success";
}



if (isset($_SESSION['sub_id'])) {
    $sub_id =  $_SESSION['sub_id'];          
}
else {
  $_SESSION['msg'] = "You have to logged in first!";
  $_SESSION['type'] = "text-danger";
    header("location:online-order.php");
  exit();
}

// get last order id 
$query3 = "SELECT * FROM orders ORDER BY order_id DESC";
$ord =  $con->query($query3);
$orders = $ord->fetch_assoc();
$order_id = $orders['order_id'];



// echo $order_id;
// echo  $sub_id;
// exit();

// display a;ll product names
$query2 = "SELECT * FROM product ORDER BY product_id DESC";
$pro = $con->query($query2);




if (isset($_POST['submit'])) {
    $o_id = $_POST['order_id'];
    $p_id = $_POST['product_id'];    
    $quantity = $_POST['quantity'];
    $unitprice = $_POST['unitprice'];
    $totalprice = $_POST['totalprice'];
    $remark = $_POST['remark'];
    // print_r($_POST);    



      $ins_order = "INSERT INTO order_detail(order_id, product_id, quantity, unitprice, totalprice, remark)
       VALUES($o_id, $p_id, '$quantity', '$unitprice', '$totalprice', '$remark')";
      $ind_res = $con->query($ins_order);
      
        if ($ind_res) {        
          $_SESSION['msg']="Order Has Been Added Successfully!";
          $_SESSION['type']="text-success";
          header("location:online-order-add.php?more=add");
          exit();
        }
        else {
          $_SESSION['msg']="Order Does Not Added!";
          $_SESSION['type']="text-danger";
          header("location:online-order-add.php");
          exit();
        }
    
}


?>






<?php include('includes/header.php'); ?>



    <section class="site-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-6 text-center">
            <h1 class="h1 c"> Add Your Order Here </h1>
          </div>
        </div>
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
<br>
          <?php include('includes/msg.php'); ?>    
<br>
            <form action="#" method="post" autocomplete="off">
                  <div class="row">
                    <div class=" col-md-9 form-group">
									    <label>Product Name</label>									
                        <select name="product_id" id="product_id" class="form-control">
                          <option value="0" readonly="readonly">Choosea product</option>
                          <?php foreach($pro as $p): ?>
                              <option value="<?php echo $p['product_id']; ?>"><?php echo $p['product_name']; ?></option>                                        
                          <?php endforeach; ?>
                        </select>
								  </div>             
                  <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">     
                    <div class="col-md-9 form-group">
                      <label for="quantity">Quantity</label>
                      <input type="number"  name="quantity" id="quantity" class="form-control " required="true">
                    </div>
                    <div class="col-md-9 form-group">
                      <label for="unitprice">Unitprice</label>
                      <input type="number"  name="unitprice" id="unitprice" class="form-control " required="true">
                    </div>
                    <div class="col-md-9 form-group">
                      <label for="totalprice">Totalprice</label>
                      <input type="number"  name="totalprice" id="totalprice" class="form-control " required="true" readonly='readonly'>
                    </div>
                    <div class="col-md-9 form-group">
                      <label for="remark">Comment</label>
                     <textarea name="remark" id="remark" placeholder="" cols="30" rows="10" class="form-control">                     
                     </textarea>
                    </div>
                    <div class="col-md-6 form-group">
                      <input type="submit" value="Order" name="submit" class="btn btn-primary btn-lg"> &nbsp;
                      <a href="index.php" class="btn btn-danger btn-lg"> Finish </a>
                    </div>

                  </div>
                  <br>

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