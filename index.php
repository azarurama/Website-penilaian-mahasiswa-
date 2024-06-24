<?php
session_start();
include "header.php";
include "nav.php";

///page selector
$page = isset($_GET['page'])? $_GET['page'] : "home";
switch ($page) {
    case 'profil' : include "profil.php"; break;
    case 'mahasiswa' : include "master_mahasiswa.php"; break;
    case 'editmhs'  : include "edit_mahasiswa.php"; break;
    case 'editmtk'  : include "edit_matkul.php"; break;
    case 'editnilai'  : include "edit_nilai.php"; break;
    case 'delmhs'  : include "delete_mahasiswa.php"; break;
    case 'delmtk'  : include "delete_matkul.php"; break;
    case 'delnilai'  : include "delete_nilai.php"; break;
    case 'matakuliah' : include "master_matakuliah.php"; break;
    case 'tambahmhs'  : include "tambahmhs.php"; break;
    case 'tambahmatkul'  : include "tambahmatkul.php"; break;
    case 'nilai'  : include "nilai.php"; break;
    case 'entri'  : include "entrinilai.php"; break;
    case 'logout' : include "logout.php"; break;
    case 'register' : include "register.php"; break;
    case 'userdel' : include "user_delete.php"; break;
    case 'about' : include "about.php"; break;
    case 'home' :
    default     : include "home.php";
}
include "footer.php";
?>