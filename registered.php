<?php require_once 'dataProvider.php'; ?>
<?php require_once 'module/functions.php'; ?>
<?php 
   require_once 'module/Database.php';
      
   $db = new Database();
    
    

    // Connect database
    
    $db = new Database();
	$data = [];
	// Khi duoi sever no xac nhan : Form co phuong thuc la POST
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $loi = []; // Thong bao loi~
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            're_password' => $_POST['re_password']
        ];

        $name = KiemTraPost('name'); // Gan' du~ Lieu trong form
        $email = KiemTraPost('email');//
        $password = KiemTraPost('password');//
        $re_password = KiemTraPost('re_password');//

        if($name == '')
        {
            $error['name'] = "Ban chua nhap day du name";
        }
        
        if($email == '')
        {
            $error['email'] = "Ban chua nhap day du email";
        }
        if($password == '')
        {
            $error['password'] = "Ban chua nhap day du password";
        }
        if($re_password = "")
        {
            $error['re_password'] = "Ban chua nhap day du re_password";
        }
        if($re_password != $password){
            $error['re_password'] = "Password phai giong nhau";
        }
        
        // Neu ma 
        if(empty($loi))
        {
            $id_insert = $db->insertAll('nguoidung',$data);
            if($id_insert > 0)
            {
                $_SESSION['success'] = "Them user thanh cong";
                echo "<script>location.href = 'login.php'</script>";
            }
            else 
            {
                $_SESSION['loi'] = "Them user that bai";
            }
        }



        
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Goggles Ecommerce Category Bootstrap responsive Web Template | Shop :: w3layouts</title>
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

    <link href="css/style7.css" rel='stylesheet' type='text/css' />
    <link href="css/bootstrap1.css" rel='stylesheet' type='text/css' />
    <link href="css/fontawesome1.css" rel='stylesheet' type='text/css' />
    <link href="css/skdslider2.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/shop.css" type="text/css" />
	<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/owl.theme.css" type="text/css" media="all">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
</head>
<body>
    <?php include 'module/header.php' ?>
    <!-- banner -->
		<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">
					<ul class="short">
						<li>
							<a href="index.php">Home</a>
							<i>|</i>
						</li>
						<li>Register</li>
					</ul>
				</div>
			</div>

		</div>
		<!--//banner -->
        <!-- register -->
	<div class="register">
		<div class="container">
            <h2 class = "rh"> Register Here</h2>            
			<div class="login-form-grids">
				<h5>profile information</h5>
				<form action="#" method="post">
					<input type="text" name="name"  placeholder="Full Name..." required=" " >
                    
				<h6>Login information</h6>
					
					<input type="email" name="email" placeholder="Email Address" required=" " >
					<input type="password" name="password" placeholder="Password" required=" " >
					<input type="password" name="re_password" placeholder="Password Confirmation" required=" " >
					
					<input type="submit" value="Register">
				</form>
			</div>
			<div class="register-home">
				<a href="index.php">Home</a>
			</div>
		</div>
	</div>
<!-- //register -->
<?php include 'module/footer.php' ?>	
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
		<!-- price range (top products) -->
		<script src="js/jquery-ui.js"></script>
		<script>
			//<![CDATA[ 
			$(window).load(function () {
				$("#slider-range").slider({
					range: true,
					min: 0,
					max: 9000,
					values: [50, 6000],
					slide: function (event, ui) {
						$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
					}
				});
				$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

			}); //]]>
		</script>
		<!-- //price range (top products) -->

		<script src="js/owl.carousel.js"></script>
		<script>
			$(document).ready(function () {
				$('.owl-carousel').owlCarousel({
					loop: true,
					margin: 10,
					responsiveClass: true,
					responsive: {
						0: {
							items: 1,
							nav: true
						},
						600: {
							items: 2,
							nav: false
						},
						900: {
							items: 3,
							nav: false
						},
						1000: {
							items: 4,
							nav: true,
							loop: false,
							margin: 20
						}
					}
				})
			})
		</script>
		<!-- //end-smooth-scrolling -->

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
            /*
            						var defaults = {
            							  containerID: 'toTop', // fading element id
            							containerHoverID: 'toTopHover', // fading element hover id
            							scrollSpeed: 1200,
            							easingType: 'linear' 
            						 };
            						*/

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