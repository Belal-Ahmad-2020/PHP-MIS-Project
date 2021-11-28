
<?php
session_start();
require_once("admin/includes/dbconnection.php");
include('includes/header.php'); ?>
<?php 

// when we have search
if (isset($_POST['search_btn'])) {
  $like =  $_POST['search'];
  $sql = "SELECT * FROM product INNER JOIN category ON category.category_id=product.category_id WHERE product_name LIKE '%$like%' ";
  $result = $con->query($sql);
  if ($result->num_rows>0) {
    $_SESSION['msg'] = "You Searched  '$like'";
    $_SESSION['type'] = "text-primary";        
  }
  else {
    $_SESSION['msg'] = "$like Not Found!";
    $_SESSION['type'] = "text-danger";        
  }
}
else if(isset($_GET['page'])) {  // when we use pagination 
   $page = $_GET['page'];
  if ($page == 0 || $page < 1) {
    $proPerPage = "0";
  }
  else {
    $proPerPage = ($page*5)-5;  
  }  
  $sql = "SELECT * FROM product INNER JOIN category ON category.category_id=product.category_id Order By store_date DESC LIMIT $proPerPage,5";
  $result = $con->query($sql);  
}
else {  // we we don't have search btn
  $sql = "SELECT * FROM product INNER JOIN category ON category.category_id=product.category_id Order By store_date DESC LIMIT 5";
  $result = $con->query($sql);  
}

?>


      <!-- carousel -->
      <?php include('includes/slideshow.php'); ?>
      <!-- end carousel -->

      <?php include('includes/msg.php'); ?>

      <section class="site-section py-sm">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2 class="mb-4 c"> <strong> <?php if(isset($flag)) { include('includes/msg.php'); } else { echo " Latest Products ";}  ?>   </strong> </h2>
            </div>
          </div>
          <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
              <div class="row">

              <?php foreach($result as $p): ?>
                <div class="col-md-6">              
                  <a href="blog-single.php?post_id=<?php echo $p['product_id']; ?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <img src="<?php echo 'admin/'. $p['image']; ?>" alt="Image placeholder">
                    <div class="blog-content-body">
                      <div class="post-meta">                        
                        <span class="mr-2"><?php echo $p['store_date']; ?> </span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> Category: <?php echo $p['category_name']; ?> </span>
                        
                      </div>
                      <h2>
                        <?php echo $p['product_name']; ?> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> Price: <strong><?php  echo $p['unitprice'];?> </strong> AF </span>  
                        &bullet;
                      </h2>
                    </div>
                  </a>
                </div>
                <?php endforeach; ?>  
              </div>

<?php 
// calculate products
if (!isset($page)) {
  $page = 1;
}
$pag = "SELECT COUNT(product_id) AS totalPro FROM product";
$pag_res = $con->query($pag);
$res = $pag_res->fetch_assoc();
$total = $res['totalPro'];
$productPerPage = $total/5;
$p = ceil($productPerPage);


?>
              <div class="row mt-5">
                <div class="col-md-12 text-center">
                  <nav aria-label="Page navigation" class="text-center">
                    <ul class="pagination">
                    <?php   if(isset($page)&&  $page > 1): ?>
                    <li class="page-item ">
                      <a class="page-link" href="index.php?page=<?php echo $page-1; ?>">
                        &lt;
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php 
                      for($i=1; $i<=$p; $i++) {
                        if (isset($page)) {                                                
                          if ($i == $page) {
                    ?>
                      <li class="page-item active">
                        <a class="page-link" href="index.php?page=<?php echo $i; ?>">                                                                
                          <?php echo $i; ?>
                        </a>
                      </li>    
                      <?php } else{ ?>
                        <li class="page-item ">
                          <a class="page-link" href="index.php?page=<?php echo $i; ?>">                                                                      
                            <?php echo $i; ?>
                          </a>
                        </li>
                      <?php } 
                        }
                      }  
                      ?>            
                  <?php   if(isset($page) &&  $page+1<= $p): ?>
                    <li class="page-item ">
                      <a class="page-link" href="index.php?page=<?php echo $page+1; ?>">
                        &gt;
                      </a>
                    </li>
                    <?php endif; ?>
                      
                    </ul>
                  </nav>
                </div>
              </div>              

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

        <!-- footer -->
        <?php include("includes/footer.php"); ?>

    </div>


<?php include('includes/script.php');  ?>


  </body>
</html>