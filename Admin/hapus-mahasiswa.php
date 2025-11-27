<?php
$idx=$_GET['id'];

require_once "../config.php";
$sql = "delete from mahasiswa where id=$idx";
$hasil=$db->query($sql);

if($hasil){
    echo "<script>window.location.href='index.php?p=mahasiswa';</script>";
} else {
    echo "<script>alert('data gagal dihapus');
     window.location.href='index.php?p=mahasiswa';</script>";
}
?>