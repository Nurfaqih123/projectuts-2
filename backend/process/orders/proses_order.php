<?php 
ob_start();
require_once '../../../database/dbkoneksi.php';
?>

<?php 
   $_tanggal = $_POST['tanggal'];
   $_id_produk = $_POST['produk_id'];
   $_quantity = $_POST['quantity'];
   $_id_pemesanan = $_POST['id'];

   $_proses = $_POST['proses'];

   // array data
   $ar_data[]=$_tanggal;
   $ar_data[]=$_id_produk;
   $ar_data[]=$_quantity;
   $ar_data[]=$_id_pemesanan;

   
   if($_proses == "Simpan"){
    // data baru
    $sql = "INSERT INTO pesanan (tanggal, produk_id, quantity, id) VALUES (?,?,?,?)";
   }else if($_proses == "Update"){
    $ar_data[]=$_POST['idedit'];// ? 8
    $sql = "UPDATE pesanan SET tanggal=?, produk_id=?, quantity=?, id=? WHERE id=?"; 
   }
   
   if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
   }
   
   header('location:../../pages/orders/list_order.php');
   ob_end_flush();
?>