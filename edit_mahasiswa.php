<?php
include_once 'koneksi.php';
$edit_mahasiswa= isset($_GET['mahasiswa'])?$_GET['mahasiswa']:'';
$query = "SELECT * FROM tblmhs WHERE nim='$edit_mahasiswa'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_array($result);
$nim = $data['nim'];
$nama = $data['nama'];
$tgllahir = $data['tgllahir'];
$alamat = $data['alamat'];
?>
<article>
    <h1>Edit Data Mahasiswa</h1>
    <form action="" method="post">
        <table widht="100%" border="0">
            <tr>
                <td width="25%" align="right">NIM :</td>
                <td><input type="text" name="nim" placeholder="NIM" size="15" maxlength="10" value='<?=$nim ?>'/></td>
            </tr>
            <tr>
                <td align="right">NAMA :</td>
                <td><input type="text" name="nama" placeholder="Nama" size="40" maxlength="40" value='<?=$nama ?>'/></td>
            </tr>
            <tr>
		        <td align="right">TANGGAL LAHIR :</td>
		        <td><input type="date" name="tgllahir" id="tgllahir" value='<?=$tgllahir ?>'/></td>
            </tr>
            <tr>
		        <td align="right">ALAMAT :</td>
		        <td><textarea name="alamat" rows="3" cols="40" ><?=$alamat ?></textarea></td>
	        </tr>
	        <tr>
		        <td>&nbsp;</td>
                <td>
                    <input type="submit" name="edit" value="Edit" />
                    <input type="submit" name="reset" value="Reset" />
                </td>
            </tr>
        </table>
    </form>
    <?php 
    if (isset($_POST['edit'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $tgllahir = $_POST['tgllahir'];
        $alamat = $_POST['alamat'];

        $query = "UPDATE tblmhs SET nim='$nim',nama='$nama',tgllahir='$tgllahir',alamat='$alamat' 
        WHERE nim='$edit_mahasiswa'";

        $exequery = mysqli_query($conn, $query) or die($query);
        if ($exequery) {
            $pesan = "Edit data mahasiswa berhasil";
        } else {
            $pesan = "Edit gagal. periksa kembali data yang diinputkan.";
        }
        echo "<script>
        alert('$pesan');
        document.location='index.php?page=mahasiswa';
        </script>";
    }
    ?>
</article>