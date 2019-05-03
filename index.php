<!DOCTYPE HTML>
<html>
<head>
  <title>Home Page</title>
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
  </style>
</head>
<body>
	<div id="main">
	    <div id="header">
		    <div id="logo">
		        <div id="logo_text">
		          <h1><a href="https://DemoWebsite.herokuapp.com/homepage.php">Ha's Motor</a></h1>
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
    	
	    

        <div class="khuvuctrungbay">
        	<h1> <b>Models</b></h1>
			<?php 
			require_once('./hamotorconnector.php');
			$conn = new hamotorconnector();
			$sql = "Select * From product";
			$rows = $conn->runQuery($sql);
			for ($i=0; $i < count($rows) ; $i++) { 
				?>
					<div class="item">
						<a href="modeldetail.php?prid=<?=$rows[$i]['ProductID']?>"><div class="iimage"><img src="<?=$rows[$i]['Image']?>">
						</div></a>
						<div class="Thongtin">	 <?=$rows[$i]['ProductName']?> <br>
												Manufacturer: <?=$rows[$i]['Manufacturer']?> <br>
												Cost: $<?=$rows[$i]['Unitprice']?> <br>
												Stock:<?=$rows[$i]['Stock']?>
						</div>
					</div>
						<?php
		}
			?>
		</div>


		<div id="footer">
	      <p><a href="http://localhost/homepage.php">Home</a> | <a href="admin.php">Admin</a> | <a href="">Order</a> | <a href="aboutus.php">About US</a> 
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
