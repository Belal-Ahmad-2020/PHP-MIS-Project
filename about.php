
<?php 
session_start();
require_once("admin/includes/dbconnection.php");
include('includes/header.php');

?>

    <section class="site-section pt-5">
      <div class="container">
        
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            
            <div class="row">
              <div class="col-md-12">
                <h2 class="mb-4 c"><strong>About Kafayat Supermarket  </strong> 
                </h2>
                <p class="mb-5"><img src="images/img_6.jpg" alt="Image placeholder" class="img-fluid"></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum minima eveniet recusandae suscipit eum laboriosam fugit amet deleniti iste et. Ad dolores, necessitatibus non saepe tenetur impedit commodi quibusdam natus repellat, exercitationem accusantium perferendis officiis. Laboriosam impedit quia minus pariatur!</p>
                <p>Dignissimos iste consectetur, nemo magnam nulla suscipit eius quibusdam, quo aperiam quia quae est explicabo nostrum ab aliquid vitae obcaecati tenetur beatae animi fugiat officia id ipsam sint? Obcaecati ea nisi fugit assumenda error totam molestiae saepe fugiat officiis quam?</p>
                <p>Culpa porro quod doloribus dolore sint. Distinctio facilis ullam voluptas nemo voluptatum saepe repudiandae adipisci officiis, explicabo eaque itaque sed necessitatibus, fuga, ea eius et aliquam dignissimos repellendus impedit pariatur voluptates. Dicta perferendis assumenda, nihil placeat, illum quibusdam. Vel, incidunt?</p>
                <p>Dolorum blanditiis illum quo quaerat, possimus praesentium perferendis! Quod autem optio nobis, placeat officiis dolorem praesentium odit. Vel, cum, a. Adipisci eligendi eaque laudantium dicta tenetur quod, pariatur sunt sed natus officia fuga accusamus reprehenderit ratione, provident possimus ut voluptatum.</p>
              </div>
            </div>



            

          </div>

          <!-- END main-content -->

          <div class="col-md-12 col-lg-4 sidebar">                        
          <br>
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