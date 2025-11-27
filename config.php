<?php
$db = new mysqli("localhost","root","","siakad_db");
if($db){
    //echo "koneksi berhasil";
} else {
    echo "gagal";
}
?>