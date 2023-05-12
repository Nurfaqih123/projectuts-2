<?php 
ob_start();
require_once '../../../database/dbkoneksi.php';
?>

<?php
   $_nama_merk = $_POST['nama_merk'];
   $_id = $_POST['id'];
   $_proses = $_POST['proses'];

   // array data
   $ar_data[] = $_nama_merk;
   $ar_data[] = $_id;

   
   if($_proses == "Simpan"){
    // data baru
    $sql = "INSERT INTO merk (nama_merk, id) VALUES (?,?)";
   }else if($_proses == "Update"){
    $ar_data[]=$_POST['idedit'];
    $sql = "UPDATE merk SET nama_merk=?, id=? WHERE id=?";
   }

   if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
   }

   header('location:../../pages/brands/list_brand.php');
   ob_end_flush();
?>