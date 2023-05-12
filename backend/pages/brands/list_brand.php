<?php
require_once '../../../database/dbkoneksi.php';

$sql = "SELECT * FROM merk";
$rs = $dbh->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ATK Shop | List Brand</title>
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
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
                            <a class="nav-link active">
                                <i class="fa-solid fa-copyright"></i>
                                <div class="sb-nav-link-icon"></div>
                                Brands
                            </a>
                            <a class="nav-link" href="../orders/list_order.php">
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
                        <h1 class="mt-4 fw-bold">Brands</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../dashboard/dashboard_admin.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Brands</li>
                        </ol> 
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fa-solid fa-list-ul me-1"></i>
                                    List Brand
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                   <a href="create_brand.php" class="btn btn-outline-secondary btn-sm">
                                        Create New Brand
                                    </a>
                                </div>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Brand</th>
                                            <th>ID Brand</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $nomor=1;
                                        foreach($rs as $row){
                                        ?>
                                        <tr>
                                            <td><?=$nomor?></td>
                                            <td><?=$row['nama_merk']?></td>
                                            <td><?=$row['id']?></td>
                                            <td>
                                                <a class="btn btn-outline-success btn-sm" href="view_brand.php?id=<?=$row['id']?>">View</a>
                                                <a class="btn btn-outline-warning btn-sm" href="edit_brand.php?idedit=<?=$row['id']?>">Edit</a>
                                                <a class="btn btn-outline-danger btn-sm" href="../../process/brands/delete_brand.php?iddel=<?=$row['id']?>"
                                                onclick="if(!confirm('Anda Yakin Ingin Menghapus Brand <?=$row['nama_merk']?>?')) {return false}">Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                        $nomor++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-black">Copyright &copy; STT Nurul Fikri ATK Shop 2023</div>
                            <div>
                                <a href="#">Privacy</a>
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