<?php
  include_once 'auth.php';
  include_once 'database.php';
?>
 
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title> MUSICGEAR : Products</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
     <style>
.list-group-item {

    padding: 20px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
}
</style>

</head>
<body>
    <?php include_once 'nav_bar.php'; 

if (isset($_GET['order'])) {     // check if sql order
  $order = $_GET['order'];
  }

    if (isset($_GET['search1'])) {  //check if sql search
  $search = true;
  $search1 = $_GET['search1'];
  $input1 = $_GET['input1'];
  $andor1 = $_GET['andor1'];
  $search2 = $_GET['search2'];
  $input2 = $_GET['input2'];
  $andor2 =  $_GET['andor2'];
  $search3 = $_GET['search3'];
  $input3 = $_GET['input3'];
  $andor3 =  $_GET['andor3'];
  } 
  else{
    $search = false;
  } ?>


       <div>
        <p style="text-align:center;"><img src = logo.jpg></p>
      </div>

      <div class="container-fluid">
                  <form action="search.php">
                  <button class="list-group-item" type="submit" name="search0"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>    Search</button>
                  </form>   

    
       <div class="page-header">
        <h2>Search Results</h2>
      </div>

      <div class="row">
        

       <?php
      // Read
       $per_page = 9;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;

      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("select * from tbl_products_a161017_pt2 LIMIT $start_from, $per_page");
        if(!$search)
        {

            if (!isset($_GET["order"]))
            {
               $stmt = $conn->prepare("SELECT * from tbl_products_a161017_pt2  LIMIT $start_from, $per_page");
            }
            if (isset($_GET["order"]))
            {
               if  (($order)== "fld_product_name ASC" )
            {
               $stmt = $conn->prepare("SELECT * from tbl_products_a161017_pt2   ORDER BY fld_product_name ASC LIMIT $start_from, $per_page");
             }
            if (($order)== "fld_product_name DESC" )
             {
              $stmt = $conn->prepare("SELECT * from tbl_products_a161017_pt2   ORDER BY fld_product_name DESC LIMIT $start_from, $per_page");
             }
             if (($order)== "fld_price DESC" )
             {
              $stmt = $conn->prepare("SELECT * from tbl_products_a161017_pt2  ORDER BY  fld_price DESC LIMIT $start_from, $per_page");
             }
              if (($order)== "fld_price ASC" )
             {
              $stmt = $conn->prepare("SELECT * from tbl_products_a161017_pt2   ORDER BY  fld_price ASC LIMIT $start_from, $per_page");
             }
            }
          else
          {
           $stmt = $conn->prepare("SELECT * from tbl_products_a161017_pt2   ORDER BY  fld_brand ASC LIMIT $start_from, $per_page");
          }

}else
{
  $stmt = $conn->prepare("SELECT * 
    from tbl_products_a161017_pt2  
    WHERE $search1 LIKE '%$input1%' 
    $andor1 $search2 LIKE '%$input2%' 
     $andor2 $search3 LIKE '%$input3%' 
    LIMIT $start_from, $per_page");
}
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
       foreach($result as $readrow) {

      ?>  
      <div class="col-xs-12 col-sm-6 col-md-4">
      <div class="thumbnail">
          <?php if ($readrow['fld_product_image'] == "" ) {
        echo "No image";
      }
      else { ?>
      <img src="products/<?php echo $readrow['fld_product_image'] ?>"  class="img-responsive">
      <?php } ?>
      </div>  

     <div class="caption">
        <p><?php echo $readrow['fld_product_name']; ?></p>
        <p>Product ID: <?php echo $readrow['fld_product_id']; ?></p>
        <p>Price: RM<?php echo $readrow['fld_price']; ?></p>
        <p>Brand: <?php echo $readrow['fld_brand']; ?></p>
        <a href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
      </div>
    
    </div>



    <?php
      }
      $conn = null;
      ?>
  </div>

   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <hr></hr>
</body>
</html>