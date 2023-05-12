<?php
require_once '../../../database/dbkoneksi.php';
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ATK Shop| Create Order</title>
        <link rel="icon" href="../../assets/atklogo.jpg" />
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
        <link href="../../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#!">Admin <i>ATK<strong>Shop</strong></i></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-secondary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <a class="nav-link" href="../../frontend/pages/index.php">
                    <i class="fas fa-user fa-fw"></i>
                </a>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Admin</div>
                            <a class="nav-link" href="../dashboard/dashboard_admin.php">
                            <i class="fa-solid fa-gauge"></i>
                                <div class="sb-nav-link-icon"></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="../products/list_product.php">
                            <i class="fa-solid fa-boxes-stacked"></i>
                                <div class="sb-nav-link-icon"></div>
                                Products
                            </a>
                            <a class="nav-link" href="../brands/list_brand.php">
                                <i class="fa-solid fa-copyright"></i>
                                <div class="sb-nav-link-icon"></div>
                                Brands
                            </a>
                            <a class="nav-link" href="list_order.php">
                            <i class="fa-solid fa-list-check"></i>
                                <div class="sb-nav-link-icon"></div>
                                Orders
                            </a>
                            <a class="nav-link" href="../../../index.php">
                            <i class="fa-solid fa-home"></i>
                                <div class="sb-nav-link-icon"></div>
                                Home Page   
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:<br/>Admin ATK Shop</div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 fw-bold">Create Order</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../dashboard/dashboard_admin.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="list_order.php">Orders</a></li>
                            <li class="breadcrumb-item active">Create Order</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                            <i class="fa-solid fa-pen-to-square me-1"></i>
                                Create New Order
                            </div>
                            <div class="card-body">
                            <form method="POST" action="../../process/orders/proses_order.php">
                                <div class="form-control-sm">
                                    <label for="tanggal" class="col-form-label">Tanggal Pemesanan</label>
                                    <input type="date" name="tanggal" class="form-control" id="tanggal" placeholder="Tanggal Pemesanan" required="">
                                </div>
                                <div class="form-control-sm">
                                    <label for="produk_id" class="col-form-label">ID Produk</label>
                                    <input type="number" name="produk_id" class="form-control" id="produk_id" placeholder="ID Produk Pemesanan" required="">
                                </div>
                                <div class="form-control-sm">
                                    <label for="quantity" class="col-form-label">Quantity</label>
                                    <input type="number" name="quantity"class="form-control" id="quantity" placeholder="Quantity" required="">
                                </div>
                                <div class="form-control-sm mt-3">
                                    <input type="submit" name="proses" class="btn btn-outline-primary btn-sm" value="Simpan" required="">
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-black">Copyright &copy; STT Nurul Fikri ATK Shop 2023</div>
                            <div>
                                <a href="#">Privacy </a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../../js/datatables-simple-demo.js"></script>
    </body>
</html>