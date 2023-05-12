<?php
require_once 'database/dbkoneksi.php';
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, shrink-to-fit=no"
		/>
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title> ATK | Homepage</title>
		<!-- Favicon-->
		<link rel="icon" href="frontend/assets/atklogo.jpg" />
		<!-- Bootstrap icons-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
		<!-- Core theme CSS (includes Bootstrap)-->
		<link href="frontend/css/styles.css" rel="stylesheet" />
	</head>
	<body>
		<!-- Navigation-->
		<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
			<div class="container px-lg-0">
				<a class="navbar-brand text-brand" href="index.php"><i>ATK<strong>Shop</strong></i></a>
				<button
					class="navbar-toggler"
					type="button"
					data-bs-toggle="collapse"
					data-bs-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent"
					aria-expanded="false"
					aria-label="Toggle navigation"
				>
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
						<li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="#about">About Us</a></li>
						<li class="nav-item"><a class="nav-link" href="#shop">Shop</a></li>
					</ul>
					<form class="d-flex">
						<a class="btn btn-outline-dark me-3" type="submit" href="#!">
							<i class="bi-cart-fill me-1"></i>
							Cart
						</a> 
					</form>
					<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="bi-person-fill"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="backend/pages/dashboard/dashboard_admin.php">Admin</a></li>
								<li><a class="dropdown-item" href="#!">Customer</a></li>
								<li><hr class="dropdown-divider" /></li>
								<li><a class="dropdown-item" href="#!">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- Header-->
		<header class="bg-dark py-5" id="home">
			<div class="container px-4 px-lg-5 my-5">
				<div class="text-center text-white">
					<h1 class="display-4 fw-bolder pb-2">Welcome to <i>ATK Shop</i></h1>
					<p class="lead fw-normal text-white-50 mb-0">Find and Buy It Fast with ATK Shop!</p>
					<div class="container pt-5">
						<a href="#about" class="pe-3"><input type="submit" class="btn btn-light btn-lg" value="Learn More"></a>
						<a href="#shop"><input type="submit" class="btn btn-outline-light btn-lg" value="Shop Now"></a>
					</div>
				</div>
			</div>
		</header>
		<!-- Section -->
		<section class="py-4 mt-6 mt-9" id="about">
			<div class="container px-4 px-lg-5 mt-5 ">
				<div class="row align-items-center">
					<div class="col-md-6">	
						<div class="col-12 m-auto">
							<div class="text-black pe-5 pl-3">
								<h2 class="pb-2 fw-bolder">About Us</h2>
								<p>Hai, Welcome to ATK Shop kami menjual alat-alat tulis kantor yang sangat bermanfaat bagi kita semua ada buku tulis, pensil, pulpen, dan masih banyak lagi. </p>

								<p>Langsung Checkout yaa inshaAllah pengiriman cepat dan aman hanya di ATK Shop.</p>
								<h5 class="pt-3">Thank you for choosing ATK Shop!</h5>
							</div>
						</div>
					</div>	
					<div class="col-md-6">
						<div class="col-12">
							<img src="frontend/assets/img.jpeg" alt="About Images" class="img-fluid m-auto" >
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="py-4 mt-6 mt-9">
			<div class="container">
				<div class="text-center text-black">
					<h2 class="fw-bolder"> Products</h2>
				</div>
			</div>
			<?php
				$sqljenis = "SELECT * FROM produk";
				$rsjenis = $dbh->query($sqljenis); 
			?>
			<div class="container px-4 px-lg-5 mt-5 pb-5">
				<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
				<?php
					foreach($rsjenis as $rowjenis){
				?>
					<div class="col mb-5" id="shop">
						<div class="card">
							<!-- Product image-->
							<img
								class="card-img-top"
								<?php
								if ($rowjenis['nama'] == "Buku Tulis Isi 58 Lbr") {
									echo "src='frontend/assets/buku.jpg'";
								} else if ($rowjenis['nama'] == "Pensil 2B Joyko") {
									echo "src='frontend/assets/pensil.jpg'";
								} else {
									echo "src='frontend/assets/img/unavailable.png'";
								}
								?>
								alt="<?=$rowjenis['nama'];?>"
							/>
							<!-- Product details-->
							<div class="card-body ">
								<div class="text-center">
									<!-- Product name-->
									<p class="fw-bolder"><?=$rowjenis['nama']?></p>
									<!-- Product price-->
									Rp. <?=number_format($rowjenis['harga'])?>
								</div>
							</div>
							<div class="card-footer p-4">
								<div class="text-center">
									<a href="frontend/pages/detail.php?id=<?=$rowjenis['id']?>" class="btn btn-dark">Product Detail</a>
								</div>
							</div>
						</div>	
					</div>
					<?php
					}
					?>
				</div>
			</div>
		</section>
		<!-- Footer-->
		<footer class="py-2 bg-dark mt-auto fixed-bottom">
			<div class="container">
				<div class="d-flex align-items-center justify-content-between small">
					<div class="text-white">Copyright &copy; STT Nurul Fikri. ATK Shop 2023</div>
					<div class="text-white">	
						<a href="#!" class="text-white">Privacy</a>
							&middot;
						<a href="#!" class="text-white">Terms &amp; Conditions</a>
					</div>
				</div>
			</div>
		</footer>
		<!-- Bootstrap core JS-->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
		<!-- Core theme JS-->
		<script src="frontend/js/scripts.js"></script>
		<script src="frontend/js/section.js"></script>
		
	</body>
</html>