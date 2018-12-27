<?php require_once 'dataProvider.php'; ?>
<?php require_once 'module/functions.php'; ?>
<?php
							
	if(isset($_POST['payment']) && !empty($_SESSION['cart']) )
	{
		if(isset($_SESSION['user_id']))
		{		
			$user_id = $_POST['user_id'];
			$total_price = $_POST['total_price'];
			$id_hoadon = InsertDonhang($total_price, $user_id);

			$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : "" ;

			 foreach($cart as $key => $value)
			 {
				$product = SelectProductCart($key);

				$so_luong = SelectSoLuongSP($product['id_sp']);
				
				$update_soluong = $so_luong['so_luong'] - $cart[$product['id_sp']];
				UpdateSanPham($update_soluong, $key);

				InsertChiTietDonHang($cart[$product['id_sp']], $product['gia'], $id_hoadon, $key );

				unset($_SESSION['cart']);

				echo '<script> alert("Dat hang thanh cong") </script>';
			 }	
		

		}else{
			header('Location: login.php');
		}

	} 
						
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Goggles Ecommerce Category Bootstrap responsive Web Template | Checkout :: w3layouts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Goggles a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/login_overlay.css" rel='stylesheet' type='text/css' />
	<link href="css/style6.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/shop.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/checkout.css">
	<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
</head>

<body>

     <?php include 'module/header.php'?>   
     <!-- banner -->
		<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">

					<ul class="short">
						<li>
							<a href="index.php">Home</a>
							<i>|</i>
						</li>
						<li>Checkout </li>
					</ul>
				</div>
			</div>

		</div>
		<!--//banner -->
	<!--checkout-->
	<?php 	
	

	?>

	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container">
			<div class="inner-sec-shop px-lg-4 px-3">
				<h3 class="tittle-w3layouts my-lg-4 mt-3">Checkout </h3>


				<div class="checkout-right">
					<h4>Your shopping cart contains:
						<span> </span>
					</h4>

				<?php 					
					$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : "";
				?>
					
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>SL No.</th>
								<th>Product</th>
								<th>Quantity</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody>
							
							<form action="" method="post">
							<?php $stt = 0 ?>
							<?php $total_price = 0; ?>
						<?php if(!empty($cart)): ?>
							<?php foreach($cart as $key => $value):  ?>
									
							   <?php $product = SelectProductCart($key); ?>
								<?php 
									
									
									if(isset($_POST['update-cart']))
									{
										$_SESSION['cart'][$product['id_sp']] = $_POST[$product['id_sp']];
															
									}
								$price = $_SESSION['cart'][$product['id_sp']] * $product['gia'];
								 $total_price = $total_price + $price 
								?>
							  	<?php $stt++ ?>
								<tr class="rem1">
									<td class="invert"><?php echo $stt ?></php></td>
									<td class="invert-image">
										<a href="single.php">
											<img src="<?php echo $product['hinh_anh'] ?>" alt=" " class="img-responsive">
										</a>
									</td>
									<td class="invert">
										<div class="quantity">
											<div class="quantity-select">
												<div class="entry value-minus">&nbsp;</div>
												<div class="entry value">
												 <input name="<?php echo $product['id_sp'] ?>" style="width: 39px; border: none;background: transparent;text-align: center;" 
												 type="number" value="<?php echo $_SESSION['cart'][$product['id_sp']]; ?>"/>
												</div>
												<div class="entry value-plus active">&nbsp;</div>
											</div>
										</div>
									</td>
									<td class="invert"><?php echo $product['ten_sp'] ?> </td>
									<td class="invert"><?php echo number_format($product['gia']  * $_SESSION['cart'][$product['id_sp']]); ?></td>
									<td class="invert">
										<div class="rem">
											<div class="close1"> </div>
										</div>

									</td>
								</tr>
								<?php endforeach ?>
							<?php endif ?>
								<input type="submit" name="update-cart" value="Cap nhat gio hang">

								</form>				
										
						</tbody>
					</table>
				
					
				</div>

				<div class="checkout-left row">
					<div class="col-md-4 checkout-left-basket">
						<h4>Continue to basket</h4>
						<ul>
							
						<li>Total Price
								<i>-</i>
							<span><?php echo number_format($total_price); ?></span>
						</li>
				
						<form action = "checkout.php" method="post">
							<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>" />
							<input type="hidden" name="total_price" value="<?php echo $total_price; ?>" />
							<input type="submit"  name="payment" class="btn btn-sm animated-button gibson-three mt-4" value="Payment"> 			
						</form>
						</ul>
				</div>

					<br>
					<p>
						
					</p>
					</br>
					<div class="clearfix"> </div>

				</div>

			</div>

		</div>
	</section>
	<!--//checkout-->
	<?php include 'module/footer.php'?>   

	<!--jQuery-->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- newsletter modal -->
	<!--search jQuery-->


	<script src="js/modernizr-2.6.2.min.js"></script>
	<script src="js/classie-search.js"></script>
	<script src="js/demo1-search.js"></script>
	<!--//search jQuery-->

	
	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
		googles.render();

		googles.cart.on('googles_checkout', function (evt) {
			var items, len, i;

			if (this.subtotal() > 0) {
				items = this.items();

				for (i = 0, len = items.length; i < len; i++) {}
			}
		});
	</script>
	<!-- //cart-js -->
	<script>
		$(document).ready(function () {
			$(".button-log a").click(function () {
				$(".overlay-login").fadeToggle(200);
				$(this).toggleClass('btn-open').toggleClass('btn-close');
			});
		});
		$('.overlay-close1').on('click', function () {
			$(".overlay-login").fadeToggle(200);
			$(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
			open = false;
		});
	</script>
	<!-- carousel -->
	<!-- easy-responsive-tabs -->
	<script src="js/easy-responsive-tabs.js"></script>
	<script>
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion           
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				closed: 'accordion', // Start closed if in accordion view
				activate: function (event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#tabInfo');
					var $name = $('span', $info);
					$name.text($tab.text());
					$info.show();
				}
			});
			$('#verticalTab').easyResponsiveTabs({
				type: 'vertical',
				width: 'auto',
				fit: true
			});
		});
	</script>
	<!--quantity-->
	<script>
		 $('.value-plus').on('click', function (e) {
		var inputQty = $(this).parent().find('.value').find('input')[0];
			var newVal = parseInt(inputQty.value, 10) + 1;
			inputQty.value = newVal;
		});
		$('.value-minus').on('click', function (e) {
		var inputQty = $(this).parent().find('.value').find('input')[0];
			var newVal = parseInt(inputQty.value, 10) - 1;
			if (newVal >= 1) inputQty.value = newVal;
		});
	</script>
	<!--quantity-->
	<!--close-->
	<script>
		$(document).ready(function (c) {
			$('.close1').on('click', function (c) {
				$('.rem1').fadeOut('slow', function (c) {
					$('.rem1').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function (c) {
			$('.close2').on('click', function (c) {
				$('.rem2').fadeOut('slow', function (c) {
					$('.rem2').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function (c) {
			$('.close3').on('click', function (c) {
				$('.rem3').fadeOut('slow', function (c) {
					$('.rem3').remove();
				});
			});
		});
	</script>
	<!--//close-->

	<!-- dropdown nav -->
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<!-- //dropdown nav -->
	<script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 900);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
          
            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!--// end-smoth-scrolling -->


	<script src="js/bootstrap.js"></script>
	<!-- js file -->


</body>
</html>