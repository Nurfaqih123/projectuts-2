<?php 
ob_start();
require_once '../../../database/dbkoneksi.php';
?>

<?php 
   $_nama = $_POST['nama'];
   $_stok = $_POST['stok'];
   $_harga = $_POST['harga'];
   $_merk_id = $_POST['merk_id'];
   $_produk_id = $_POST['id'];

   $_proses = $_POST['proses'];

   // array data
   $ar_data[]=$_nama; // ? 1
   $ar_data[]=$_stok; // ? 2
   $ar_data[]=$_harga;// 3
   $ar_data[]=$_merk_id;
   $ar_data[]=$_produk_id;

   
   if($_proses == "Simpan"){
    // data baru
    $sql = "INSERT INTO produk (nama, stok, harga, merk_id, id) VALUES (?,?,?,?,?)";
   }else if($_proses == "Update"){
    $ar_data[]=$_POST['idedit'];// ? 8
    $sql = "UPDATE produk SET nama=?, stok=?, harga=?, merk_id=?, id=? WHERE id=?";
   }
   if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
   }

   header('location:../../pages/products/list_product.php');
   ob_end_flush();
?>