<?php 

if (isset($_POST['search_btn'])) {
  $like =  $_GET['search'];
  $sql = "SELECT * FROM product INNER JOIN category ON category.category_id=product.category_id WHERE product_name LIKE '%$like%' ";
  $result = $con->query($sql);
  if ($result) {
    $_SESSION['msg'] = "You Searched For $like";
    $_SESSION['type'] = "text-primary";    
    header("location:index.php?search=$like");
  }
  
}
?>
