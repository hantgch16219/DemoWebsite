<!DOCTYPE HTML>
<html>

<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css" />

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
      <div   style="width:60%; padding-left:40%;" >
        <h1>Update model detail</h1>
      </div>
      <div style="padding-left: 25%">
        <?php 
          require_once('./hamotorconnector.php');
          $conn = new hamotorconnector();
          $sql = "Select * From product where ProductID =".$_GET['id'];
          $rows = $conn->runQuery($sql);
         ?>
         <?php 
         foreach ($rows as $key) 
          { 
            ?>
          <form action="admin.php" method="get">
          <table  cellspacing="40" cellpadding="0" >
            <tr>
              <td>Model ID<SPAN style="color: red">*</SPAN></td>
              <th><input type="text" name="ProductID" value="<?php echo $key['ProductID'] ?>" readonly></th>
              <th></th>
              <td>Model<SPAN style="color: red">*</SPAN></td>
              <th><input type="text" name="ProductName" value="<?php echo $key['ProductName'] ?>" required></th>
            </tr>
            <tr>
              <td>Manufacturer<SPAN style="color: red">*</SPAN></td>
              <th><input type="text" name="Manufacturer" value="<?php echo $key['Manufacturer'] ?>"required></th>
              <th></th>
              <td>Cost<SPAN style="color: red">*</SPAN></td>
              <th><input type="text" name="Unitprice" value="<?php echo $key['Unitprice'] ?>"required></th>
            </tr>
            <tr>
              <td>Image<SPAN style="color: red">*</SPAN></td>
              <th><input type="text" name="Image" value="<?php echo $key['Image'] ?>"required></th>
              <th></th>
              <td>Stock<SPAN style="color: red">*</SPAN></td>
              <th><input type="text" name="Stock" value="<?php echo $key['Stock'] ?>"required></th>
            </tr>
            <tr>
              <td>CategoryID<SPAN style="color: red">*</SPAN></td>
              <th><input type="text" name="CategoryID" value="<?php echo $key['CategoryID'] ?>"required></th>
            </tr>
            <tr>
              <th colspan="3" > <input type="submit" value="Update" style=" background-color: #8A6E3D; color: #FFFFFF; width:25%; height: 30px"></th>
              <th colspan="2" > <a href="http://localhost/admin.php"><input type="button" value="Back" style=" background-color: #8A6E3D; color: #FFFFFF; width:25%; height: 30px"></a></th>
            </tr>
          </table>
        </form>
         <?php 
       } 
       ?>
        
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