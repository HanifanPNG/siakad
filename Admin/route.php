<?php 

$p=$_GET['p'];

switch ($p) {
    case 'dosen':
        require_once "dosen.php";
        break;
    case 'tambahDosen':
        require_once "tambahDosen.php";
        break;
    case 'detailDosen':
        require_once "detail_dosen.php";
        break;
    case 'editDosen':
        require_once "edit_dosen.php";
        break;
    case 'hapusDosen':
        require_once "hapus_dosen.php";
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
    case 'tambahMhs' :
        require_once "tambahmhs.php";
        break;    

    case 'pegawai' :
        require_once "pegawai.php";
        break;    

    case 'gantiPW' :
        require_once "gantiPW.php";
        break;      
     

    default:
        require_once "dashboard.php";
        break;
    }
?>