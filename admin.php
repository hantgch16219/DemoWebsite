<!DOCTYPE HTML>
<html>

<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css" />
<style>
      table
{ margin: 10px 0 30px 0;}

table tr th, table tr td
{ background: #363434;
  color: #FFFFFF;
  padding: 7px 4px;
  text-align: left;}
  
table tr td
{ background: #E5E5DB;
  color: #47433F;
  border-top: 1px solid #FFF;}

</style>
<script>
    function Deleteqry(id)
    { 
      if(confirm("Are you sure you want to delete this product?")==true)
               window.location="admin.php?del="+id;
        return false;
    }
  </script>
</head>
<body>
 <?php 
  if (isset($_GET['ProductName'])) {
    require_once('./hamotorconnector.php');
    $conn = new hamotorconnector();
    $sql = "UPDATE `product` SET `ProductName`='".$_GET['ProductName']."',`Manufacturer`='".$_GET['Manufacturer']."',`Unitprice`='".(int)$_GET['Unitprice']."',`Image`='".$_GET['Image']."',`Stock`='".(int)$_GET['Stock']."',`CategoryID`='".(int)$_GET['CategoryID']."' WHERE ProductID = ".$_GET['ProductID'];
    $conn -> execStatement($sql);
  }
  
 ?>
 <?php 
    
    if(isset($_GET['del']))
     {
      require_once('./hamotorconnector.php');
      $conn = new hamotorconnector();
      $id = $_GET['del'];
      $sql ="DELETE FROM product WHERE ProductID ='". (int)$id ."'";
      $conn->execStatement($sql);
      $message = "Product Deleted!";
    echo "<script type='text/javascript'>alert('$message');</script>";
     }
   ?>
   <?php 
          require_once('./hamotorconnector.php');
          if(isset($_POST['ProductID']))
          {
            $ProductID = $_POST['ProductID'];
            $Image = $_POST['Image'];
            $Manufacturer = $_POST['Manufacturer'];
            $ProductName = $_POST['ProductName'];
            $Stock = $_POST['Stock'];
            $Unitprice = $_POST['Unitprice'];
            $CategoryID = $_POST['CategoryID'];
            $sql = "INSERT INTO product (ProductID, ProductName, Manufacturer, Unitprice, Image, Stock, CategoryID) VALUES (". $ProductID .",'". $ProductName ."','". $Manufacturer ."',". $Unitprice .", '". $Image."',   ". $Stock .", ". $CategoryID ." )";
            $conn = new hamotorconnector();
            $conn -> execStatement($sql);
            $message = "Product added!";
            echo "<script type='text/javascript'>alert('$message');</script>";
          }
           ?>
      


  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <h1><a href="http://localhost/homepage.php">Ha's Motor</a></h1>
          <h2>Luxuries Vehicles</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <li class="selected"><a href="homepage.php">Home</a></li>
          <li><a href="admin.php">Admin</a></li>
          <li><a href="">Order</a></li>
          <li><a href="aboutus.php">About Us</a></li>
        </ul>
      </div>  
    </div>


<div style="margin:50px; padding-left:20%">
      <b><span style="font-size:25px">Model List</span></b>
      <br>
      <form action="">
      <table border="1" cellpadding="1" cellspacing="0"  >
        <tr>
          <th>Productid</th>
          <th>Productname</th>
          <th>Manufacturer</th>
          <th>Unitprice</th>
          <th>Images</th>
          <th>Stock</th>
          <th>Categoryid</th>
          <th >Update</th>
          <th>Delete</th>
        </tr>
        <?php 
          require_once('./hamotorconnector.php');
          $conn = new hamotorconnector();
          $sql = "Select * From product";
          $rows = $conn->runQueryadmin($sql);
          for ($i=0; $i < count($rows) ; $i++) { 
        ?>
          <tr>
            <?php for ($j=0; $j<count($rows[$i]); $j++) { ?>
              <th>
                <?php echo $rows[$i][$j]?>
              </th>
              
            <?php } ?>

              <th style="padding: 10px"><a href="http://localhost/Update.php?id=<?php echo $rows[$i][0] ?>"><input type="button" value="Update" style=" background-color:#8A6E3D; color: #FFFFFF;" ></a> 
              </th>
              <th style="padding: 10px"><a href="admin.php?del=<?php echo $rows[$i][0] ?>"> <input type="button" value="Delete" style=" background-color: #8A6E3D; color: #FFFFFF;" onclick="return Deleteqry(<?php echo $rows[$i][0] ?>);"> </a>
              </th>
          </tr>
        <?php } ?>
      </table>
      <div>
        <b><span style="font-size:20px">Add new model:</span></b>   <a href="http://localhost/add.php"><input type="button" value="Add" style=" background-color:#8A6E3D; color: #FFFFFF; width:25%; height: 30px" ></a> 
      </div>
      </form>
    </div>
  
  <div id="footer">
        <p><a href="http://localhost/homepage.php">Home</a> | <a href="admin.php">Admin</a> | <a href="">Order</a> | <a href="aboutus.php">About US</a> <p><b>Associated with</b><img style="width: 50px; height:50px ;" src="img/lamborghini.png" alt=""> <img style="width: 50px; height:50px ; background-color:#FFFFFF" src="img/maserati.png" alt=""><img style="width: 50px; height:50px ; background-color:#FFFFFF" src="img/koenigsegg.jpg" alt=""></p>
      </div>
        </div>
</body>