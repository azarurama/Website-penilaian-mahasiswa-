<?php
include_once 'koneksi.php';
$edit_nilai= isset($_GET['entri'])?$_GET['entri']:'';
$query = "SELECT b.nama,a.nm_mtk,c.kd_mtk,c.nim,c.nilai FROM tblnilai c,tblmhs b,tblmatkul a 
        WHERE b.nim=c.nim AND a.kd_mtk=c.kd_mtk  ";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_array($result);
$nim = $data['nim'];
$nama = $data['nama'];
$nm_mtk = $data['nm_mtk'];
$kd_matkul = $data['kd_mtk'];
$nilai = $data['nilai'];
?>
<article>
    <h1>Edit Nilai Mahasiswa</h1>
    <form action="" method="post">
        <table widht="100%" border="0">
            <tr>
                <td width="25%" align="right">Nim :</td>
                <td><?=$nim ?>-<?=$nama ?> </td>
            </tr>
            <tr>
                <td align="right">Nama Matakuliah :</td>
                <td><?=$nm_mtk ?>-<?=$kd_matkul ?></td>
            </tr>
            <tr>
		        <td align="right">Nilai :</td>
		        <td><input type="text" name="nilai" placeholder="nilai" size="40" maxlength="40" value='<?=$nilai ?>'/></td>
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
        $nilai = $_POST['nilai'];

        $query = "UPDATE tblnilai SET nilai='$nilai'
        WHERE nim='$nim' AND kd_mtk='$kd_matkul'";

        $exequery = mysqli_query($conn, $query) or die($query);
        if ($exequery) {
            $pesan = "Edit user berhasil";
        } else {
            $pesan = "Edit gagal. periksa kembali data yang diinputkan.";
        }
        echo "<script>
        alert('$pesan');
        document.location='index.php?page=entri';
        </script>";
    }
    ?>
</article>