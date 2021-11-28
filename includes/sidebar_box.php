            <?php                             
              $ad_query = " SELECT * FROM advertisement WHERE CURRENT_DATE() BETWEEN ads_date AND ads_expire Order By ads_id Desc LIMIT 1";
             
              $ad_res = $con->query($ad_query);
              $ads = $ad_res->fetch_assoc();                   
            ?>                   
            <?php 
            if($ads):
                                                   
            ?>       
            <div class="sidebar-box">
                <div class="bio text-center">
                  <img src="admin/<?php  echo $ads['ads_pic']; ?>" alt="Image Placeholder" class="img-fluid">
                  <div class="bio-body">
                    <h2><?php echo $ads['ads_title']; ?></h2>
                    <p><?php echo ""; ?></p>
                    <p><a href="<?php echo $ads['ads_url']; ?>" class="btn btn-primary btn-sm rounded"><?php echo $ads['ads_url']; ?></a></p>
                    <p class="social">
                      <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                      <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                      <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                      <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                    </p>
                  </div>
                </div>
              </div>     
              <?php else: ?>
                  <br><br>
              <?php endif; ?>                     
              <!-- END sidebar-box -->  



<?php 

$popular = "SELECT * FROM product Order By product_id DESC Limit 5";
$pop_res = $con->query($popular);
// $pop_row = $pop_res->fetch_assoc();

?>


              <div class="sidebar-box">
                <h3 class="heading text-center c" style="color: #6610f2;">New Products</h3>
                <div class="post-entry-sidebar">
                  <ul>
                  <?php while($pop_row = $pop_res->fetch_assoc()): ?>
                    <li>
                      <a href="blog-single.php?post_id=<?php echo $pop_row['product_id']; ?>">
                        <img src="admin/<?php echo $pop_row['image']; ?>" alt="Image placeholder" class="mr-4">
                        <div class="text">
                          <h4><?php echo $pop_row['product_name']; ?></h4>
                          <div class="post-meta">
                            <span class="mr-2"><?php echo $pop_row['store_date']; ?> </span>
                          </div>
                        </div>
                      </a>
                    </li>
                <?php endwhile; ?>
                  </ul>
                </div>
              </div>
              <!-- END sidebar-box -->





<?php

$category2 = "SELECT * FROM category Order By category_id DESC";
$cat = $con->query($category2);


?>


              <div class="sidebar-box">
                <h3 class="heading text-center" style="color: #6610f2;">Categories</h3>
                <ul class="categories">
                  <?php foreach($cat as $c): ?>
                  <li><a href="blog-single.php?cat_id=<?php  echo $c['category_id']; ?>"><?php echo $c['category_name']; ?> </a></li>
                  <?php endforeach; ?>
                </ul>
              </div>