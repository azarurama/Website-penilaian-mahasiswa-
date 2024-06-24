<?php
include_once 'koneksi.php';
$delete_mahasiswa = isset($_GET['mahasiswa'])?$_GET['mahasiswa']:'';

$query = "DELETE FROM tblmhs WHERE nim='$delete_mahasiswa'";
$result = mysqli_query($conn,$query);
if ($result) {
    $pesan = "Delete data berhasil";
} else {
    $pesan = "Delete user gagal. periksa kembali data yang diinputkan.";
}
echo "<script>
alert('$pesan');
document.location='index.php?page=mahasiswa';
</script>";

?>