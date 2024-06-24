<?php
include_once 'koneksi.php';
$edit_matkul= isset($_GET['matakuliah'])?$_GET['matakuliah']:'';
$query = "SELECT * FROM tblmatkul WHERE kd_mtk='$edit_matkul'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_array($result);
$kd_matkul = $data['kd_mtk'];
$nm_mtk = $data['nm_mtk'];
$sks = $data['sks'];
?>
<article>
    <h1>Edit Data Matakuliah</h1>
    <form action="" method="post">
        <table widht="100%" border="0">
            <tr>
                <td width="25%" align="right">Kode Matakuliah :</td>
                <td><input type="text" name="kd_mtk" placeholder="kd_mtk" size="10" maxlength="10" value='<?=$kd_matkul ?>'/></td>
            </tr>
            <tr>
                <td align="right">Nama Matakuliah :</td>
                <td><input type="text" name="nm_mtk" placeholder="nm_mtk" size="20" maxlength="40" value='<?=$nm_mtk ?>'/></td>
            </tr>
            <tr>
		        <td align="right">SKS :</td>
		        <td><input type="text" name="sks" placeholder="sks" size="1" maxlength="1" value='<?=$sks ?>'/></td>
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
        $kd_matkul = $_POST['kd_mtk'];
        $nm_mtk = $_POST['nm_mtk'];
        $sks = $_POST['sks'];

        $query = "UPDATE tblmatkul SET kd_mtk='$kd_matkul',nm_mtk='$nm_mtk',sks='$sks' 
        WHERE kd_mtk='$edit_matkul'";

        $exequery = mysqli_query($conn, $query) or die($query);
        if ($exequery) {
            $pesan = "Edit data matakuliah berhasil";
        } else {
            $pesan = "Edit gagal. periksa kembali data yang diinputkan.";
        }
        echo "<script>
        alert('$pesan');
        document.location='index.php?page=matakuliah';
        </script>";
    }
    ?>
</article>