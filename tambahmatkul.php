<article>
    <h1>Input Matakuliah Mahasiswa</h1></br>
    <form action="" method="post">
    <table width="100%" border="0">
	<tr>
		<td width="25%" align="right">Kode Matakuliah :</td>
		<td><input type="text" name="kd_mtk" size="15" maxlength="10"/></td>
	</tr>
	<tr>
		<td align="right">Nama Matakuliah :</td>
		<td><input type="text" name="nm_mtk" size="40" maxlength="40"/></td>
	</tr>
	<tr>
		<td align="right">SKS :</td>
		<td><input type="text" name="sks" size="5" maxlength="2"/></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" name="input" value="input"/>
			<input type="reset" name="reset" value="Reset"/>
		</td>
	</tr>
</table>
    </form>
    <?php 
    if (isset($_POST['input'])) {
        $kd_mtk = $_POST['kd_mtk'];
        $nm_mtk = $_POST['nm_mtk'];
        $sks = $_POST['sks'];

        include_once "koneksi.php";

        $query = "INSERT INTO tblmatkul 
            VALUES ('$kd_mtk', '$nm_mtk', '$sks' ) ";
        
        $exequery = mysqli_query($conn, $query) or die($query);
        if ($exequery) {
            $pesan = "Input matakuliah berhasil";
        } else {
            $pesan = "Input data gagal.";
        }
        echo "<script>
        alert('$pesan');
        document.location='index.php?page=matakuliah';
        </script>";
    }
    ?>
</article>