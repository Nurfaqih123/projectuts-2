<?php
require_once '../../../database/dbkoneksi.php';

$id = $_GET['iddel'];
$sql = "DELETE FROM produk WHERE id = ?";
$statement = $dbh->prepare($sql);
$statement->execute([$id]);

header ('location:../../pages/products/list_product.php');
?>  