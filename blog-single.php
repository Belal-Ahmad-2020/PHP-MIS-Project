
<?php
session_start();
require_once("admin/includes/dbconnection.php");
include('includes/header.php'); 



if (isset($_GET['post_id'])) {
  $id = $_GET['post_id'];
  $sql = "SELECT * FROM product INNER JOIN category 
  ON category.category_id=product.category_id WHERE product_id=$id LIMIT 1";
  $result = $con->query($sql);
  $pro = $result->fetch_assoc();

}






?>

    <section class="site-section py-lg">

      <div class="container">   
 
        <div class="row blog-entries element-animate">
           <?php if(isset($_GET['post_id'])) { ?>  
          <div class="col-md-12 col-lg-8 main-content">
            <div class="pt-5 py-5">
               <h3 class='h3 text-center c '> <?php echo $pro['product_name'] ?>  </h3>
              </div>
              <img src="admin/<?php echo $pro['image']; ?>" alt="Image" class="img-fluid mb-5">
              <div class="post-meta">
                        &bullet;
                        <span class="mr-2"><?php echo $pro['store_date']; ?> </span> &bullet;
                        <span class="ml-2"><span class="fa fa-price"></span> <small>Price:</small>  <?php echo $pro['unitprice'];?> &dollar;</span>
              </div>
              <h1 class="mb-4"><?php echo $pro['product_name']; ?>  &bullet;  <?php echo $pro['unitprice']; ?> &dollar;  </h1>
              <a class="category mb-5" href="blog-single.php?post_id=<?php echo $pro['product_id'] ?>"><?php echo $pro['category_name']; ?></a> 
           
                <div class="post-content-body">
                  <p> &bullet;  <?php echo $pro['product_name'];  ?>   &bullet;</p>
                <div class="row mb-5">
                    <div class="col-md-12 mb-4">
                    <img src="admin/<?php echo $pro['image']; ?>" alt="Image placeholder" class="img-fluid">
                </div>
            </div>

            </div>

            
            <div class="pt-5">
              <p>Category:  <a href="blog-single.php?post_id=<?php echo $pro['product_id'] ?>"><?php echo $pro['category_name'] ?></a> </p>
            </div>

      
          </div>

          <?php } else {
                if (isset($_GET['cat_id'])) {
                  $category_id = $_GET['cat_id'];   
                  $query5 = "SELECT * FROM category INNER JOIN product 
                  ON category.category_id=product.category_id WHERE category.category_id=$category_id";
                  $related_cat = $con->query($query5);   
                }                            
          ?>



              <div class="col-md-12 col-lg-8 main-content">
                <h2 class="mb-3  c text-center py-4 pt-1">Related Category Posts</h2>
              </div>

              <div class="col-md-12 col-lg-8 ">
                <?php  foreach($related_cat as $r): ?>
                <div class="col-md-8 col-lg-6 pull-left">          
                  <?php  $img  =   $r['image']; ?>
                  <a href="blog-single.php?post_id=<?php echo $r['product_id']; ?>" class="a-block sm d-flex align-items-center height-md" style="background-image: url('admin/<?php echo $img;?>')">
                <div class="text">
                  <div class="post-meta">
                    <span class="category"><?php echo $r['product_name']; ?></span> &bullet;&bullet; <br>
                    <span class="category"> <small>Category:</small>  <?php echo $r['category_name']; ?></span>&bullet;&bullet; <br>
                    <span class="mr-2"><?php echo $r['store_date']; ?> </span> &bullet;&bullet; <br>
                    <span class="ml-2"><span class="fa fa-">Price:</span> <?php echo $r['unitprice'];?>&dollar;</span>
                  </div>
                  <h3><?php echo $r['product_name']; ?></h3>
                    </div>
                </a>
              </div>
              <?php endforeach; ?>
            </div>

          <?php } ?>
          <!-- END main-content -->


                <!-- right sidebar -->
                <div class="col-md-12 col-lg-4 sidebar">
 
            <!-- END sidebar-box -->

                <?php  include('includes/sidebar_box.php'); ?>      
              <!-- END sidebar-box -->


          </div>
          <!-- END sidebar -->

        </div>
      </div>
    </section>






<!-- related posts  -->  
    <?php if (!isset($_GET['cat_id'])) {
            $cat_id = $pro['category_id'];
            $query2 = "SELECT * FROM product INNER JOIN category 
            ON category.category_id=product.category_id WHERE category.category_id=$cat_id Order By product.product_id DESC";
            $related = $con->query($query2);        
    ?>
    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="mb-3  c text-center py-4 pt-1">Related Post</h2>
          </div>
        </div>
        <div class="row">
        <?php  foreach($related as $r): ?>
          <div class="col-md-6 col-lg-4">          
          <?php  $img  =   $r['image']; ?>
            <a href="blog-single.php?post_id=<?php echo $r['product_id']; ?>" class="a-block sm d-flex align-items-center height-md" style="background-image: url('admin/<?php echo $img;?>')">
              <div class="text">
                <div class="post-meta">
                <span class="category"><?php echo $r['product_name']; ?></span> &bullet;&bullet; <br>
                  <span class="category"> <small>Category:</small>  <?php echo $r['category_name']; ?></span>&bullet;&bullet; <br>
                  <span class="mr-2"><?php echo $r['store_date']; ?> </span> &bullet;&bullet; <br>
                  <span class="ml-2"><span class="fa fa-">Price:</span> <?php echo $r['unitprice'];?>&dollar;</span>
                </div>
                <h3><?php echo $r['product_name']; ?></h3>
              </div>
            </a>
          </div>
        <?php endforeach; ?>
        </div>
      </div>
    </section>
    <?php } ?>




    <!-- END section -->
  

    <?php include('includes/footer.php');  ?>

    </div>
    
    <?php include('includes/script.php');  ?>
  </body>
</html>