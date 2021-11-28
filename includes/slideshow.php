<?php 
                    $popular = "SELECT * FROM product Order By product_id DESC LIMIT 5";
                    $pop_res = $con->query($popular);

?>


<section class="site-section pt-5 pb-5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <div class="owl-carousel owl-theme home-slider">
              <?php foreach($pop_res as $p): ?>
                <div>
                <?php $img = $p['image']; ?>
                  <a href="blog-single.php?post_id=<?php echo $p['product_id']; ?>" class="a-block d-flex align-items-center height-lg" style="background-image: url('admin/<?php echo $img; ?>'); ">
                    <div class="text half-to-full">
                      <span class="category mb-5"><?php echo $p['product_name']; ?></span>
                      <div class="post-meta">
                        
                        <span class="author mr-2"><img src="admin/<?php echo $img; ?>" alt="Colorlib"> <?php echo $p['product_name']; ?></span>&bullet; <br>
                        &nbsp; &bullet; <span class="mr-2"><?php echo $p['store_date']; ?> </span> &bullet;<br>
                        &nbsp; &bullet; <span class="ml-2"><span class="fa fa"></span> <?php echo $p['unitprice']; ?>&dollar;</span>&nbsp; &bullet;
                        
                      </div>

                    </div>
                  </a>
                </div>
                <?php endforeach; ?>
              </div>
              
            </div>
          </div>
          
        </div>


      </section>
      <!-- END section -->
