<?php
require_once '../../database/dbkoneksi.php';
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
		<title>ATK Shop| Product Detail</title>
		<!-- Favicon-->
		<link rel="icon" href="../assets/atklogo.jpg" />
		<!-- Bootstrap icons-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
		<!-- Core theme CSS (includes Bootstrap)-->
		<link href="../css/styles.css" rel="stylesheet" />
	</head>
	<body>
		<!-- Navigation-->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container px-lg-0">
				<a class="navbar-brand text-brand" href="../../index.php"><i>ATK<strong>Shop</strong></i></a>
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
						<li class="nav-item"><a class="nav-link" href="../../#home">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="../../#about">About Us</a></li>
						<li class="nav-item"><a class="nav-link" href="../../#shop">Shop</a></li>
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
								<li><a class="dropdown-item" href="../../backend/pages/dashboard/dashboard_admin.php">Admin</a></li>
								<li><a class="dropdown-item" href="#!">Customer</a></li>
								<li><hr class="dropdown-divider" /></li>
								<li><a class="dropdown-item" href="#!">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
        <!-- Product section-->
        <section>
        <?php
            $id = $_GET['id'];
            $sqljenis = "SELECT * FROM produk WHERE id = $id";
            $rsjenis = $dbh->query($sqljenis);
        ?>
            <div class="container px-4 px-lg-5 my-5">
            <h2 class="mt-5 fw-bolder">Product Detail</h2>
                <!-- Breadcrumb -->
				<ol class="breadcrumb mb-5">
					<li class="breadcrumb-item"><a href="../../#shop">Shop</a></li>
					<li class="breadcrumb-item active">Product Detail</li>
				</ol>
                <?php
				foreach($rsjenis as $rowjenis){
				?>
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" 
                    <?php
                    if ($rowjenis['nama'] == "Buku Tulis Isi 58 Lbr") {
                        echo "src='../assets/buku.jpg'";
                    } else if ($rowjenis['nama'] == "Pensil 2B Joyko") {
                        echo "src='../assets/pensil.jpg'";
                    } else {
                        echo "src='../assets/img/unavailable.png'";
                    }
                    ?>
                     alt="<?=$rowjenis['nama']?>" /></div>
                    <div class="col-md-6">
                        <h2 class="fw-bolder"><?=$rowjenis['nama']?></h2>
                        <hr>
                        <p class="mb-2">Stock : <?=$rowjenis['stok']?></p>
						<p>Description Product </br><?=$rowjenis['nama']?> Silahkan di order yaa di jamin berkualitas <br>hanya seharga Rp. 
						<?=number_format($rowjenis['harga']);?>/pcs.<br/>Ayo segera di order jangan sampai ketinggalan!
						</p>
                        <h4 class="mb-3 fw-bolder"><?="Rp. ".number_format($rowjenis['harga'])?></h4>
                        <div class="d-flex">
							<form action="../process/proses.php" method="POST">
								<input type="hidden" name="tanggal" value="<?=date('Y-m-d')?>">
								<input type="hidden" name="produk_id" value="<?=$rowjenis['id']?>">
								<input type="number" name="quantity" class="form-control text-center me-3" value="<=?$rowj?>" min="1" max="<?=$rowjenis['stok']?>" placeholder="1" required=""/>
								<input type="submit" name="proses" class="btn btn-dark" value="Buy Me"
								onclick="if(!confirm('Anda akan membeli produk dengan detail:\n\nNama Barang: <?=$rowjenis['nama']?>\nHarga Barang: <?='Rp. '.number_format($rowjenis['harga'])?>\n\nKlik OK untuk membuat pesanan.\nTerima Kasih.')){return false}">
							</form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </section>
		<!-- Footer-->
		<footer class="py-2 bg-dark mt-auto fixed-bottom">
			<div class="container">
				<div class="d-flex align-items-center justify-content-between small">
					<div class="text-white">Copyright &copy; STT Nurul Fikri ATK Shop 2023</div>
					<div class="text-white">	
						<a href="#!" class="text-white">Privacy </a>
							&middot;
						<a href="#!" class="text-white">Terms &amp; Conditions</a>
					</div>
				</div>
			</div>
		</footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
    </body>
</html>