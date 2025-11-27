<?php 

$p=$_GET['p'];

switch ($p) {
    case 'dosen':
        require_once "dosen.php";
        break;
    case 'mahasiswa':
        require_once "mahasiswa.php";
        break;  
    case 'detailMahasiswa':
        require_once "detail-mahasiswa.php";
        break;  
    case 'editMahasiswa':
        require_once "edit-mahasiswa.php";
        break;  
    case 'hapusMahasiswa':
        require_once "hapus-mahasiswa.php";
        break;  
    case 'gantiPW' :
        require_once "gantiPW.php";
        break;      
    case 'tambahMhs' :
        require_once "tambahmhs.php";
        break;      

    default:
        require_once "dashboard.php";
        break;
    }
?>