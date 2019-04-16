<?php

    if(isset($_POST['search'])){

  $search1 = strip_tags($_POST['search1']);
  $input1 = strip_tags($_POST['input1']);
  $andor1 = strip_tags($_POST['andor1']);
  $search2 = strip_tags($_POST['search2']);
  $input2 = strip_tags($_POST['input2']);
  $andor2 = strip_tags($_POST['andor2']);
  $search3 = strip_tags($_POST['search3']);
  $input3 = strip_tags($_POST['input3']);
  $andor3 = strip_tags($_POST['andor3']);

header("Location: results.php?v=30&search1=$search1&input1=$input1&andor1=$andor1&search2=$search2&input2=$input2&andor2=$andor2&search3=$search3&input3=$input3&andor3=$andor3" );
}
?>


<?php
  require_once("auth.php");
?>


<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>MUSICGEAR | Search</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

        <style type="text/css">
   .row {
  width: 100%;
  /*margin: 0 auto;*/
    text-align: center;
}
.block {
  width: 20%;
  /*float: left;*/

    display: inline-block;
    zoom: 1;
}
    </style>

   
</head>
<body>

   <?php include_once 'nav_bar.php'; ?>
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 
      <p class="lead" ><h1 style="margin-left: 30px;">Search product</h1></p>

        <form  method="post">
        <div class="row">
          <div class="block">
            <h3>Type</h3>
          </div>

          <div class="block">
            <h3>Search Value</h3>
          </div>

          <div class="block">
            <h3>Operator</h3>
          </div>
        </div>
        
        <div class="row">
          <center>
 

        <div class="block">
        <select id="search1" name='search1' class="form-control" style="height:50px">
          <option value="fld_product_name">Name</option>
          <option value="fld_brand">Brand</option>
          <option value="fld_price">Price</option>
        </select>
        </div>

        <div class="block">   
        <input type="text" id="input1" name="input1" placeholder="Insert value" style=" width: 90%;height:50px"></div>
       
        <div class="block">   
          <select id="andor1"   name="andor1" class="form-control" style="height:50px">
          <option value="and">AND</option>
          <option value="or">OR</option>
          </select>
        </div>
        </center>
        </div>

        <br>

       <div class="row">
       <center>

        <div class="block">  
        <select id="search2"  name='search2' class="form-control" style="height:50px">
          <option value="fld_product_name">Name</option>
          <option value="fld_brand">Brand</option>
          <option value="fld_price">Price</option>
        </select>
        </div>

        <div class="block">   
        <input type="text" id="input2" name="input2"  placeholder="Insert value" style="width: 90%; height:50px"  />
        </div>

        <div class="block">
          <select id="andor2"   name="andor2" class="form-control" style="height:50px">
          <option value="and">AND</option>
          <option value="or">OR</option>
          </select>
        </div>
        </center>
      </div>

      <br>
 
      <div class="row">
       <center>

        <div class="block">  
        <select id="search3"  name='search3' class="form-control" style="height:50px">
          <option value="fld_product_name">Name</option>
          <option value="fld_brand">Brand</option>
          <option value="fld_price">Price</option>
        </select>
        </div>

        <div class="block">   
        <input type="text" id="input3" name="input3"  placeholder="Insert value" style="width: 90%; height:50px"  />
        </div>

        <div class="block">
          
        </div>
      </center>
      </div>
      <br>
      <center>
        <input type="submit" class="btn btn-info" name="search" value="Begin Search" style="width: 50%;height: 50px" />
      </center>
      </form>
        
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

