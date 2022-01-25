<?php include('config/constants.php');
session_start();
$loadFun = "";
if (isset($_SESSION['lat']) && isset($_SESSION['lon'])) {
	}
	else{
		$loadFun='getLocation()';
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GroFood Bae.</title>
	<link rel="shortcut icon" type="image/x-icon" href="css/logo.jpeg"></link>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  	
</head>
<body onload="loader(); <?php echo $loadFun?>">

	<div id="loading"></div>

	<header>
		<a href="<?php echo SITEURL ; ?>" class="logo">GroFood Bae<span>.</span></a>
		<div class="menuToggle" onclick="toggleMenu();"></div>
		<ul class="navigation">
			<li><a href="<?php echo SITEURL ; ?>">Home</a></li>
			<li><a href="<?php echo SITEURL ; ?>shop_category">Restaurants</a></li>
			<li><a href="<?php echo SITEURL ; ?>grocery">Grocery</a></li>
			<li><a href="<?php echo SITEURL ; ?>categories">Categories</a></li>
			<li><a href="<?php echo SITEURL ; ?>myorders">My Orders</a></li>
			<li><a href="<?php echo SITEURL ; ?>cart-page">Cart </a>
				<?php
					if (isset($_SESSION['cart'])) 
					{
						$count = count($_SESSION['cart']);
						echo "<span id='cart_count'> ($count)</span>";
					}
					else
					{
						echo "<span id='cart_count'> (0)</span>";
					}
				?>
			</li>
			<li> </a>
				<?php
				if (isset($_SESSION['user']) || isset($_COOKIE['user']))
				{
					$name = $_COOKIE['user'];

					echo "<span id = 'user_name'>Hi,$name</span>";
				}
				else
				{
					echo "<span id = 'user_name'>  Log In</span>";
				}
				?>
			</li>
		</ul>
	</header>

	<section class="banner" id="banner">
	</section>

	<script type="text/javascript">
		window.addEventListener('scroll', function(){
			const header = document.querySelector('header');
			header.classList.toggle("sticky", window.scrollY > 0);
		});

        function toggleMenu(){
            const menuToggle = document.querySelector('.menuToggle');
            const navigation = document.querySelector('.navigation');
            menuToggle.classList.toggle('active');
            navigation.classList.toggle('active');
        }
	</script>

	<script>
		var preloader = document.getElementById('loading');

		function loader(){
			preloader.style.display = 'none';
		}
	</script>

	<script>
		function error(err){
			//alert(err.message);
		}
		function success(pos){
			var lat = pos.coords.latitude;
			var lon = pos.coords.longitude;
			//console.log(lat);
			//console.log(lon);
			jQuery.ajax({
				url:'setLatLong.php',
				data:'lat='+lat+'&lon='+lon,
				type:'post',
				success:function(result){
					window.location.href=SITEURL
				}
			})
		}
		function getLocation(){
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(success,error);
				//alert('s');
			}
			else{
				alert('4s');

			}
		}
	</script>
