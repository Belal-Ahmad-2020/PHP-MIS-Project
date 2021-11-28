    
      <footer class="site-footer">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-4">
              <h3>About Us</h3>
              <p class="mb-4">
                <img src="images/img_1.jpg" alt="Image placeholder" class="img-fluid">
              </p>

              <p>Lorem ipsum dolor sit amet sa ksal sk sa, consectetur adipisicing elit. Ipsa harum inventore reiciendis. <a href="#">Read More</a></p>
            </div>
            <div class="col-md-6 ml-auto">
              <div class="row">
                <div class="col-md-7">
                  <h3>Latest Post</h3>
                  <div class="post-entry-sidebar">
                    <ul>
                    <?php 

                    $popular = "SELECT * FROM product Order By product_id DESC LIMIT 4";
                    $pop_res = $con->query($popular);
                    ?>
                    <?php foreach($pop_res as $p): ?>
                      <li>
                        <a href="blog-single.php?post_id=<?php echo $p['product_id']; ?>">
                          <img src="admin/<?php echo  $p['image']; ?>" alt="Image placeholder" class="mr-4">
                          <div class="text">
                            <h4><?php echo $p['product_name']; ?></h4>
                            <div class="post-meta">
                              <span class="mr-2"><?php echo $p['store_date']; ?> </span>                              
                            </div>
                          </div>
                        </a>
                      </li>
                    <?php endforeach; ?>  
                    </ul>
                  </div>
                </div>
                <div class="col-md-1"></div>
                
                <div class="col-md-4">

                  <div class="mb-5">
                    <h3>Quick Links</h3>
                    <ul class="list-unstyled">
                      <li><a href="index.php">Home</a></li>
                      <li><a href="product.php">Products</a></li>
                      <li><a href="online-order.php">Online Order</a></li>
                      <li><a href="about.php">About</a></li>
                      <li><a href="contact.php">Contact</a></li>
                    </ul>
                  </div>
                  
                  <div class="mb-5">
                    <h3>Social</h3>
                    <ul class="list-unstyled footer-social">                      
                      <li><a href="http://www.facebook.com/kafayatsupermarket" target="_blank"><span class="fa fa-facebook"></span> Facebook</a></li>
                      <li><a href="#"><span class="fa fa-instagram" target="_blank"></span> Instagram</a></li>                      
                      <li><a href="http://wwww.youtube.com/Kafayat Supermarket" target="_blank"><span class="fa fa-youtube-play"></span> Youtube</a></li>                      
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
              <p class="small">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy; <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All Rights Reserved | Developed <i class="fa fa-heart text-danger" aria-hidden="true"></i> by Fifth Group
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>
        </div>
      </footer>
      <!-- END footer -->