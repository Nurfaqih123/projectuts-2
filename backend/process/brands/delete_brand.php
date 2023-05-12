<?php
require_once '../../../database/dbkoneksi.php';

$id = $_GET['iddel'];
$sql = "DELETE FROM merk WHERE id = ?";
$statement = $dbh->prepare($sql);
$statement->execute([$id]);

header ('location:../../pages/brands/list_brand.php');
?>  