<?php 
ob_start();
require_once '../../database/dbkoneksi.php';
?>

<?php 
   $_tanggal = $_POST['tanggal'];
   $_id_produk = $_POST['produk_id'];
   $_quantity = $_POST['quantity'];

   $_proses = $_POST['proses'];

   // array data
   $ar_data[]=$_tanggal;
   $ar_data[]=$_id_produk;
   $ar_data[]=$_quantity;

   
   if($_proses == "Buy Me"){
    // data baru
    $sql = "INSERT INTO pesanan (tanggal, produk_id, quantity) VALUES (?,?,?)";
   }
   
   if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
   }
   
   header('location:../../backend/pages/orders/list_order.php');
   ob_end_flush();
?>