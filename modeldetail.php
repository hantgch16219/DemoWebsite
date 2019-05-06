<!DOCTYPE HTML>
<html>
<head>
  <title>Model Detail</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  	.item{
  	width: 25%;
    float: left;
    padding:7px;
    box-sizing: border-box;
    background-color: #E3E6E7;
    margin: 0.25%
  }
  .iimage img{
  width:100%;
  height: 150PX;
  float: left;
  }
  .khuvuctrungbay{
  	width: 130%;
  	overflow: hidden;
  }
  .Thongtin{
		padding: 5px 10px;
		float: left;
		width: 100%;}
	form.example input[type=text] {
    	padding: 10px;
    	font-size: 17px;
    	border: 1px solid grey;
    	float: left;
    	width: 87%;
    	background: #f1f1f1;
    	height: 20px

	}
	form.example button {
    	float: left;
    	width: 8%;
    	padding: 10px;
    	background: #2196F3;
    	color: white;
    	font-size: 17px;
    	border: 1px solid grey;
    	border-left: none;
    	cursor: pointer;
	}
	.Chitietsanpham{
		position: relative;
		top: 15%;
		padding-ri: 15%;
		width: 50%;
		float: right;
		padding:10px;
		box-sizing: border-box;
	}
	.Chitietsanpham1{
		padding-top: 0%;
		padding-left: 40%;
		width: 100%;
		box-sizing: border-box;
	}

  </style>
</head>
<body>
	<div id="main">
	    <div id="header">
		    <div id="logo">
		        <div id="logo_text">
		          <h1><a href="http://DemoWebsite.herokuapp.com/homepage.php">Ha's Motor</a></h1>
		          <h2>Luxuries Vehicles</h2>
		        </div>
		    </div>
		    <div id="menubar">
		        <ul id="menu">
		          <li class="selected"><a href="homepage.php">Home</a></li>
		          <li><a href="http://DemoWebsite.herokuapp.com/admin.php">Admin</a></li>
		          <li><a href="page.html">Order</a></li>
		          <li><a href="contact.html">About Us</a></li>
		        </ul>
		    </div> 	
	    </div>

    	


	    <div id="content_header"></div>
    	<div id="site_content">
		    <div id="banner" style="background-image:url(<?php echo 'img/banner1.jpg'?>)"></div>

			<div class="Search">
			<div class="Search1">
				<form class="example" action="Search.php" method="get">
		  		<input type="text" placeholder="Search.." name="search">
		  		<button type="submit"><i class="fa fa-search"></i></button>
				</form>
			</div> <br> <br> <br> <br> <br> <br> 
		
		
		 
		
		</div>

			<div id="sidebar_container">

			    <div class="sidebar">
			        <div class="sidebar_top" style="background-image:url(<?php echo 'img/side_top.png'?>)"></div>
			        <div class="sidebar_item" style="background-image:url(<?php echo 'img/side_back.png'?>) ;">

			        <?php 
			 				require_once('./hamotorconnector.php');
							$conn = new hamotorconnector();
							$sql = "Select * from category";
							$rows = $conn -> runQuery($sql);
							foreach($rows as $r)
							{
						?> 
							<li><a style=" font-size: 20px; text-decoration: none;" href="categorydetail.php?Categoryid=<?=$r['CategoryID']?>"><?=$r['CategoryName']?></a></li>
						<?php 
							}
						?>

					</div>
					<div class="sidebar_base" style="background-image:url(<?php echo 'img/side_base.png'?>)"></div>
 
		    </div>
	    </div>  
    	
	    

        <div class="sanphamchitiet">
			<?php

		     include 'hamotorconnector.php';

		    $queryfirst = "SELECT * from toys  where toyid = '$ToyId'";
		    $resultfirst = pg_query($connection,$queryfirst);
		    if (pg_num_rows($resultfirst) > 0) {
		      // output data of each row
		      while($rowfirst = pg_fetch_assoc($resultfirst)) {

		            $ToyId = $rowfirst['toyid'];
		            $ToyName = $rowfirst['toyname'];
		            $Manufacturer = $rowfirst['manufacturer'];
		             $Price = $rowfirst['price'];
		            $Image = $rowfirst['image'];
		             $Stock = $rowfirst['stock'];
		            ?>
				<form action="">
				<div class="Chitietsanpham1">
					<div class="anh"><img src="<?= $Image; ?>" alt="">
					</div>
					<div class="chitiet">	<br>Model: <?= $ToyName; ?> <br> <br>
											Manufacturer: <?= $Manufacturer; ?> <br> <br>
											Cost: <?= $Price; ?> <br> <br>
											Stock:<?= $Stock; ?> <br> <br>
											Amount: <input type="number" style="width: 100px; "> <br> <br> <br>
											<a href=""><input type="button" value="Order" style=" background-color: #8A6E3D; color: #FFFFFF; width:40%; height: 30px; margin: 20px" ></a>
											<a href="homepage.php"><input type="button" value="Back to homepage" style=" background-color: 
											#8A6E3D; color:  #FFFFFF; width:40%; height: 30px; margin: 15px" ></a>
					</div>
				</div>
				</form>
				<?php
			}
			}
			
			?>
			
		</div>
		
		<div id="footer">
	      <p><a href="http://DemoWebsite.herokuapp.com/homepage.php">Home</a> | <a href="admin.php">Admin</a> | <a href="">Order</a> | <a href="">About US</a> 
	      <table style="padding-left: 35%">
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
    </div>
</body>
</html>
