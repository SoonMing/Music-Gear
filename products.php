<?php
  include_once 'products_crud.php';
  include_once 'auth.php';
?>
 
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>MUSICGEAR : Products</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
  <?php include_once 'nav_bar.php'; ?>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
       
 
  <div class="container-fluid">
    <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Create New Product</h2>
      </div>
    <form action="products.php" method="post" class="form-horizontal">
      <div class="form-group">
          <label for="pid" class="col-sm-3 control-label">Product ID</label>
          <div class="col-sm-9">
          <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_id']; ?>" required >
        </div>
        </div> 

     <div class="form-group">
          <label for="name" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
          <input name="name" type="text" class="form-control" id="name" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>" required>
        </div>
        </div> 

      <div class="form-group">
          <label for="price" class="col-sm-3 control-label">Price</label>
          <div class="col-sm-9">
          <input name="price" type="text" class="form-control" id="price" placeholder="Product Price" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_price']; ?>" required>
        </div>
        </div>

      <div class="form-group">
          <label for="brand" class="col-sm-3 control-label">Brand</label>
          <div class="col-sm-9">
            <select name="brand" class="form-control" id="brand" required>
             <option value="">Please select</option>
             <option value="Fender" <?php if(isset($_GET['edit'])) if($editrow['fld_brand']=="Fender") echo "selected"; ?>>Fender</option>
             <option value="Yamaha" <?php if(isset($_GET['edit'])) if($editrow['fld_brand']=="Yamaha") echo "selected"; ?>>Yamaha</option>
             <option value="Ibanez" <?php if(isset($_GET['edit'])) if($editrow['fld_brand']=="Ibanez") echo "selected"; ?>>Ibanez</option>
             <option value="Stagg" <?php if(isset($_GET['edit'])) if($editrow['fld_brand']=="Stagg") echo "selected"; ?>>Stagg</option>
             <option value="Line 6" <?php if(isset($_GET['edit'])) if($editrow['fld_brand']=="Line 6") echo "selected"; ?>>Line 6</option>
             <option value="Vox" <?php if(isset($_GET['edit'])) if($editrow['fld_brand']=="Vox") echo "selected"; ?>>Vox</option>
             <option value="Epiphone" <?php if(isset($_GET['edit'])) if($editrow['fld_brand']=="Epiphone") echo "selected"; ?>>Epiphone</option>
             <option value="Black Star" <?php if(isset($_GET['edit'])) if($editrow['fld_brand']=="Blakc Star") echo "selected"; ?>>Black Star</option>
            </select>
        </div>
        </div>

      <div class="form-group">
          <label for="manudate" class="col-sm-3 control-label">Manufacture Date</label>
          <div class="col-sm-9">
          <input name="manudate" type="date" class="form-control" id="manudate" placeholder="Manufacture Date" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_manufacture_date']; ?>" required>
        </div>
        </div>

      <div class="form-group">
          <label for="color" class="col-sm-3 control-label">Color</label>
          <div class="col-sm-9">
          <input name="color" type="text" class="form-control" id="color" placeholder="Color" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_color']; ?>" required>
        </div>
        </div>

      <div class="form-group">
          <label for="warranty" class="col-sm-3 control-label">Warranty Length</label>
          <div class="col-sm-9">
          <input name="warranty" type="text" class="form-control" id="warranty" placeholder="Warranty Length" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_warranty_length']; ?>" required>
        </div>
        </div>

      <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
      <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_id']; ?>">
          <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
          <?php } else { ?>
          <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
          <?php } ?>
          <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
      </div>
      </div>
    </form>
      </div>
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
      <img src="products/<?php echo $readrow['fld_product_image'] ?>" class="img-responsive">
      <?php } ?>
      </div>  

     <div class="caption">
        <p><?php echo $readrow['fld_product_name']; ?></p>
        <p>Product ID: <?php echo $readrow['fld_product_id']; ?></p>
        <p>Price: RM<?php echo $readrow['fld_price']; ?></p>
        <p>Brand: <?php echo $readrow['fld_brand']; ?></p>
        <a href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
          <a href="products.php?edit=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="products.php?delete=<?php echo $readrow['fld_product_id']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
      </div>
    
    </div>



    <?php
      }
      $conn = null;
      ?>
  </div>












  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <nav>
          <ul class="pagination">
          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_products_a161017_pt2");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $total_records = count($result);
          }
          catch(PDOException $e){
                echo "Error: " . $e->getMessage();
          }
          $total_pages = ceil($total_records / $per_page);
          ?>
          <?php if ($page==1) { ?>
            <li class="disabled"><span aria-hidden="true">«</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"products.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  </div>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>