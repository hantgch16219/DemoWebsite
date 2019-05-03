<!DOCTYPE HTML>
<html>

<head>
  <title>Add</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css" />


</head>
<body>
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
          <li><a href="http://localhost/admin.php">Admin</a></li>
          <li><a href="">Order</a></li>

          <li><a href="aboutus.php">About Us</a></li>
        </ul>
      </div>  
    </div>
  </div>
<div >
      <div   style="width:60%; margin: auto; padding-left:40%" >
        <h1>Add new model to the list</h1>
      </div>
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
      
      <div style="padding-left: 25%">
        <form action="admin.php" method="POST">
          <table  cellspacing="40" cellpadding="0" >
            <tr>
              <td>Model ID<SPAN style="color: red">*</SPAN></td>
              <th><input type="text" name="ProductID" required></th>
              <th></th>
              <td>Model <SPAN style="color: red">*</SPAN></td>
              <th><input type="text" name="ProductName"required></th>
            </tr>
            <tr>
              <td>Manufacturer<SPAN style="color: red">*</SPAN></td>
              <th><input type="text" name="Manufacturer"required></th>
              <th></th>
              <td>Cost <SPAN style="color: red">*</SPAN></td>
              <th><input type="text" name="Unitprice"required></th>
            </tr>
            <tr>
              <td>Image<SPAN style="color: red">*</SPAN></td>
              <th><input type="text" name="Image"required></th>
              <th></th>
              <td>Stock<SPAN style="color: red">*</SPAN></td>
              <th><input type="text" name="Stock"required></th>
            </tr>
            <tr>
              <td>CategoryID<SPAN style="color: red">*</SPAN></td>
              <th><select name="CategoryID" >
                <?php 
                  $conn = new hamotorconnector();
                  $sql = " select * from category";
                  $rows = $conn->runQuery($sql);
                  foreach($rows as $r)
                  {
                    ?>
                    <option value="<?=$r['CategoryID']?>"><?=$r['CategoryName']?></option>
                    <?php  
                  }
                ?>
                </select>
              </th>
            </tr>
            <tr>
              <th colspan="5" > <input type="submit" value="Add" style=" background-color: #8A6E3D; text-decoration-color: #FFFFFF; width:25%; height: 30px" ></th>
            </tr>
          </table>
          </form>
      </div>
    
    </div>


  
<div id="footer" style="overflow: hidden;">
        <p><a href="http://localhost/homepage.php">Home</a> | <a href="admin.php">Admin</a> | <a href="">Order</a> | <a href="aboutus.php">About US</a> 
        <table style="padding-left: 41%">
          <tr>
            <th>Associated with</th>
            <th><img style="width: 50px; height:50px ;" src="img/lamborghini.png" alt=""></th>
            <th><img style="width: 50px; height:50px ; background-color:#FFFFFF" src="img/maserati.png" alt=""></th>
            <th><img style="width: 50px; height:50px ; background-color:#FFFFFF" src="img/koenigsegg.jpg" alt=""></th>
          </tr>
        </table>
        <p>
           
        </p>
      </div>
</body>