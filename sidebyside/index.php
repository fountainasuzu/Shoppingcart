<?php
          session_start();
          $error_message="";
          if (isset($_POST["save"]) ){

          $name=$_POST['name'];
          $quantity=$_POST['quantity'];
          $product=$_POST['product'];
          $price=$_POST['price'];
          $total=$_POST['total'];
          //$fileToUpload=$_FILES['fileToUpload'];
          //$new_image = implode($fileToUpload, '=>');
          $file="data/cart.csv";
          // $file2="data/sum.csv";
          define('READ_MODE', "r");
          define('APPEND_MODE', "a");
          $file_handle = fopen($file, READ_MODE);
          $counter=0;

            while(!feof($file_handle)) {//not file end
             $line= fgetcsv($file_handle);
             if($line){
             $counter++;
             }
           }

           $counter++;
           fclose($file_handle);
           $user_id=$counter;
           $ImageName = $_FILES['photo']['name'];
           $fileElementName = 'photo';
           $path = 'uploads/';
           $location = $path . $_FILES['photo']['name'];
           move_uploaded_file($_FILES['photo']['tmp_name'], $location);

          $file_handle = fopen($file, APPEND_MODE);
          $data = [$user_id, $name, $product, $quantity, $price, $total, /*$fileToUpload*/ $location];
          fputcsv($file_handle, $data);
          fclose($file_handle);
          header("Location:index.php");

          //first effort at calculating the total sum
          // $file_handle2 = fopen($file2, READ_MODE);
          // fclose($file_handle2);
          // $file_handle2 = fopen($file, APPEND_MODE);
          // $sum = [$total];
          // $totalitysum = array_sum($sum);
          // fputcsv($file_handle2, $totalitysum);
          // fclose($file_handle2);

          // while (!feof($file_handle)) {
          // $data = fgetcsv($file_handle);
          // for ($i=0; $i < !feof($file_handle); $i++) {
          //     $totalcost+=$total;
          //     echo ($totalcost);
          // }
          // fclose($file_handle);
          // }

          }

          // function display(){
          //     $file="data/cart.csv";
          //     $filehandle = fopen($file, "r");
          //     while(!feof($filehandle))
          //     echo fgets($filehandle)."<br>";
          //     // echo readfile("data/cart.csv");
          // }

          // function displaysum()
          // {
          //    $file2="data/sum.csv";
          //     $filehandle2 = fopen($file2, "r");
          //     while(!feof($filehandle2))
          //     echo fgets($filehandle2)."<br>";
          // }

          //first attempt at uploading
  // $target_dir = "uploads/";
  // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  // $uploadOk = 1;
  // $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  // // Check if image file is a actual image or fake image
  // if(isset($_POST["submit"])) {
  //     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  //     if($check !== false) {
  //         echo "File is an image - " . $check["mime"] . ".";
  //         $uploadOk = 1;
  //     } else {
  //         echo "File is not an image.";
  //         $uploadOk = 0;
  //     }
  // }
  // // Check if file already exists
  // if (file_exists($target_file)) {
  //     echo "Sorry, file already exists.";
  //     $uploadOk = 0;
  // }
  // // Check file size
  // if ($_FILES["fileToUpload"]["size"] > 500000) {
  //     echo "Sorry, your file is too large.";
  //     $uploadOk = 0;
  // }
  // // Allow certain file formats
  // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  // && $imageFileType != "gif" ) {
  //     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  //     $uploadOk = 0;
  // }
  // // Check if $uploadOk is set to 0 by an error
  // if ($uploadOk == 0) {
  //     echo "Sorry, your file was not uploaded.";
  // // if everything is ok, try to upload file
  // } else {
  //     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
  //         echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
  //     } else {
  //         echo "Sorry, there was an error uploading your file.";
  //     }

  ?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>Pyramids</title>

      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">

      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <style>
      .navbar-brand {
        position: absolute;
        width: 100%;
        left: 0;
        top: 0;
        text-align: center;
        margin: auto;
  }
      #lifeincolor{
          background-color: rgb(255, 100, 83);
      }
      #november{
          width:650px;
      }
      #animated{
          text-align: center;
          position: relative;
          -webkit-animation-name: example; /* Chrome, Safari, Opera */
          -webkit-animation-duration: 4s; /* Chrome, Safari, Opera */
          animation-name: example;
          animation-duration: 4s;
          animation-iteration-count: infinite;
      }
      @-webkit-keyframes example {
        0%   {/*left:0px; top:0px;*/ opacity:0;}
        /*25%  {left:0px; top:0px; opacity:25%;}
        50%  {left: 0px; top:10px; opacity:50%;}
        75%  {left:0px; top:10px; opacity:75%;}*/
        100% {/*left:0px; top:0px;*/ opacity:100;}
        }

/* Standard syntax */
     @keyframes example {
        0%   {/*left:0px; top:0px;*/ opacity:0;}
        /*25%  {left:0px; top:0px; opacity:25%;}
        50%  {left: 0px; top:10px; opacity:50%;}
        75%  {left:0px; top:10px; opacity:75%;}*/
        100% {/*left:0px; top:0px;*/ opacity:100;}
        }
      </style>
    </head>
    <body>
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
      <!-- <script type="text/javascript">
          var imgObj = null;

          function init(){
              imgObj = document.getElementById("myImage");
              imgObj.style.position= "relative";
              imgObj.style.left = "630px";
          }

          function moveRight() {
              imgObj.style.left = parseInt(imgObj.style.left) + 10 + "px";
          }

          window.onload = init;
      </script> -->
      <nav class="navbar navbar-default navbar-inverse" id=bs-navbar>
    <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><p>Side by SIde</p></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="checkout.php">Checkout</a></li>
      </ul>
      </nav>
  <div class="container-fluid row col-sm-12 col-md-12 col-lg-12 col-xs-12"><h1 id="animated">Shopping Cart</h1></div>
  <div class="container-fluid">
  <div class="row jumbotron" id="lifeincolor">
  <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">



      <form role="form" action="" method="post" enctype="multipart/form-data">
      <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
      <label for="usr">Name:</label></div>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xs-10">
      <input type="text" name="name" class="form-control" id="name" required>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12"><p style="visibility:hidden;">Grease</p></div>
      <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
      <label for="usr">Product:</label></div>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xs-10">
      <input type="text" name="product" class="form-control" id="product" required>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12"><p style="visibility:hidden;">Grease</p></div>
      <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
      <label for="usr">Price:</label></div>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xs-10">
      <input type="number" name="price" class="form-control" id="price" required>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12"><p style="visibility:hidden;">Grease</p></div>
      <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
      <label for="usr">Quantity:</label></div>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xs-10">
      <input type="number" name="quantity" class="form-control" id="quantity" required>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12"><p style="visibility:hidden;">Grease</p></div>
      <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
      <label for="usr">TOTAL:</label></div>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xs-10">
      <input name="total" class="form-control" id="total" placeholder="N0.00">
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12"><p style="visibility:hidden;">Grease</p></div>
      <div class="col-sm-12 col-md-6 col-lg-6 col-xs-12">
      <label for="usr">Image:</label></div>
      <div class="col-sm-12 col-md-6 col-lg-6 col-xs-12">
      <input type="file" name="photo" accept="image/*" id="photo">
      <!--<input type="submit" value="Upload Image" name="submit">-->
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
      <button type="submit" onclick="calculateThing()" name="save" class="btn btn-primary btn-xs col-sm-2 col-md-2 col-lg-2" id="add">Save</button>
      </div>
      </form>

      </div>
  <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
      <div class="jumbotron" id=november>
      <?php
              echo("<table class='table table-bordered'><tr><th>ID</th><th>NAME</th><th>PRODUCT</th><th>AMOUNT</th><th>QUANTITY</th><th>TOTAL</th>");
              $file="data/cart.csv";
              $file_handle = fopen($file, "r");
              echo("<th>IMAGE</th></tr>");
  //            while(!feof($file_handle)) {
  //            echo fgets($file_handle)."<br>";
  //            }

              while(($fileIn= fgetcsv($file_handle)) !==false){
                  $count=count($fileIn);
                  echo("<tr>");
                //  for($i=0; $i < $count; $i++){
                      if (empty($fileIn)) {
                           $newFile = "&nbsp;";
                          }
                      else {
                            //$newFile = $fileIn[$i];
                            $newFile0 = $fileIn[0];
                            $newFile1 = $fileIn[1];
                            $newFile2 = $fileIn[2];
                            $newFile3 = $fileIn[3];
                            $newFile4 = $fileIn[4];
                            $newFile5 = $fileIn[5];
                            $newFile6 = $fileIn[6];

                            echo("<td>$newFile0</td>");
                            echo("<td>$newFile1</td>");
                            echo("<td>$newFile2</td>");
                            echo("<td>$newFile3</td>");
                            echo("<td>$newFile4</td>");
                            echo("<td>$newFile5</td>");
                            echo("<td><img src='$fileIn[6]' width 110px height = 90px></td>");
                          }
                      //echo("<td>".$newFile."</td>");
                  }
                  echo("</tr>");

              echo("</table>")
          ?>
      <a href="data/cart.csv"><button class="btn btn-primary">Download</button></a>
      </div>
      <div><p> </p><div id="guilty"><?php
             echo("<p>The total is :           ");
              $file="data/cart.csv";
              $file_handle = fopen($file, "r");
              $totals = [];
              while(!feof($file_handle)) {//not file end
                  $line = fgetcsv($file_handle);
                  $pull = $line[4] * $line[3];
                  //fputcsv($totals, $pull);
                  array_push($totals, $pull);
              }
              $sum = array_sum($totals);
              //print_r($totals);

              // $sum = 0;
              // for ($i = 0;$i < sizeof($totals); $i++)
              // {
              // $sum=$sum + $totals[$i];
              // }
              // echo($sum);

              echo("N $sum.00");

              fclose($file_handle);


                  //echo(">");
              echo("</p>");
      ?></div></div>
  </div>

      </div>
      </div>


  <script type="text/javascript">
           'use strict';

           // taking everything
          var product = document.getElementById("product"),
              priceInput = document.getElementById("price"),
              quantityInput = document.getElementById("quantity"),
              cost = document.getElementById("total"),
              exam =  document.getElementById("shop");
              var item = product.value,
                  price = priceInput.value,
                  quantity = quantityInput.value,
                  totalPrice = cost.value; //get total price

           // functions we'll need
          function calculateThing() {
              var item = product.value,
                  price =priceInput.value,
                  quantity = quantityInput.value;
              // console.log(price);
              // console.log(quantity);


              var allofthem = price * quantity;

              //console.log(allofthem);
              cost.value = "N"+ allofthem.toFixed(2);
              }




                  //addTo();
                  // totalsum=[totalPrice];
                  // var justTotal;
                  // for (var x=0; x < totalsum.length; x++){
                  //     justTotal+= totalsum[x];
                  // }
                  //document.getElementById("guilty").innerHMTL = totalsum;
                  // console.log(justTotal);

         //adding event listeners
          document.getElementById("price").addEventListener('input', calculateThing);
          document.getElementById("quantity").addEventListener('input', calculateThing);
          var totalsum = [];

                  function addTo(){
                      totalsum.push(document.getElementById("total").value);
                      alert(totalsum);
                      // var alexis = array_sum(totalsum);
                      // echo("alexis");
                      // return alexis;
                  }

      </script>


  </body>
  </html>
