
		<!-- header -->
		<header>
			<div class="row">
				<div class="col-md-3 top-info text-left mt-lg-4">
					<h6>Need Help</h6>
					<ul>
						<li>
							<i class="fas fa-phone"></i> Call</li>
						<li class="number-phone mt-3">078-347-8386</li>
					</ul>
				</div>
				<div class="col-md-6 logo-w3layouts text-center">
					<h1 class="logo-w3layouts">
						<a class="navbar-brand" href="index.php">
							GLASS'Z HOUSE </a>
					</h1>
				</div>

				<div class="col-md-3 top-info-cart text-right mt-lg-4">
					<ul class="cart-inner-info">
						<li><i class="arrow-right" aria-hidden="true"></i>
						<a href="registered.php">Create Account</a></li>
						<?php if(isset($_SESSION['user_id'])) : ?>
						<li class="button-log">
							<a class="btn-open" href="#">
							<li>Xin Chao : <a href="login.php"><?php echo $_SESSION['user_name'] ?></a></li>	
							</a>
							<a href="/../DoAnWeb/customer.php?id=<?php echo $_SESSION['user_id'] ?>">Infomation</a>
							<a href="/../DoAnWeb/logout.php">Log Out</a>
						</li>
						<?php else : ?>
							<li class="button-log">
								<a class="btn-open" href="#">
								<li><a href="login.php">Login</a></li>	
								</a>
							</li>
						<?php endif ; ?>
						<li class="galssescart galssescart2 cart cart box_1">
							<form action="#" method="post" class="last">
								<input type="hidden" name="cmd" value="_cart">
								<input type="hidden" name="display" value="1">
								<button class="top_googles_cart" type="submit" name="submit" value="">
									My Cart
									<i class="fas fa-cart-arrow-down"></i>
									<?php if(isset($_SESSION['cart'])): ?>
									<?php 
										$sum = 0;
		
										foreach ($_SESSION['cart'] as $key => $value) {
											$sum += $value;
										}	
									?>
									<span style="color:red; postion:absolute; top: 5px;"><?php echo  '(' .  $sum . ')';  ?></span>
									
									<?php else: ?>
									<span style="color:red; postion:absolute; top: 5px;"></span>				
									<?php endif ?>								
								
								</button>							
							</form>
						</li>						
																
					</ul>					
					
				</div>				
			</div>		
			
			


			
			<div class="w3l_search"
			>
			<form action="search.php" method="get">
				<input type="search" name="Search" placeholder="Search for a Product..." required="">
				<button type="submit" class="btn btn-default search" aria-label="Left Align">
					<i class="fa fa-search" aria-hidden="true"> </i>
				</button>
				<div class="clearfix"></div>
			</form>
			</div>

			<label class="top-log mx-auto"></label>
			<nav class="navbar navbar-expand-lg navbar-light bg-light top-header mb-2">

				<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						
					</span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav nav-mega mx-auto">
						<li class="nav-item active">
							<a class="nav-link ml-lg-0" href="index.php">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="about.php">About</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
							    aria-expanded="false">
								Producer
							</a>
							<ul class="dropdown-menu mega-menu ">
								<li>
									<div class="row">
										<div class="col-md-4 media-list span4 text-left">
											<h5 class="tittle-w3layouts-sub"> Producer </h5>
											<ul>
												<?php $producer = SelectProducer() ?>
												<?php foreach ($producer as  $value): ?>
												<li>
													<a href="shop.php?id=<?php echo $value['idNSX'] ?>&nsx=<?php echo $value['ten_NSX'] ?>"><?php echo $value['ten_NSX'] ?></a>
												</li>
												<?php endforeach ?>																								
											</ul>
										</div>										
									</div>
									<hr>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true"
							    aria-expanded="false">
								Product
							</a>
							<ul class="dropdown-menu mega-menu ">
								<li>
									<div class="row">
										<?php
										$cate = SelectCategoryProduct();																
										?>
										<?php foreach($cate as $value): ?>
										<?php $productsbycate = SelectProductsByCategory($value['idDanhMuc']); ?>
										<div class="col-md-4 media-list span4 text-left">
											<h5 class="tittle-w3layouts-sub"><?php echo $value['ten_danhmuc'] ?></h5>
											<ul>
												<?php foreach($productsbycate as $product): ?>
												<li class="media-mini mt-3">
													<a href="single.php?id=<?php echo $product['id_sp'] ?>"><?php echo $product['ten_sp'] ?></a>
												</li>
												<?php endforeach ?>
											</ul>
										</div>
										<?php endforeach ?>
									</div>
									<hr>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="shop.php">Shop</a>
						</li>
					</ul>
				</div>
			</nav>
		</header>
 