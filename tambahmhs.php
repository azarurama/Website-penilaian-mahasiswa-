<article>
    <h1>Input Data Mahasiswa</h1></br>
    <form action="" method="post">
        <table widht="100%" border="0">
            <tr>
                <td width="25" align="right">NIM : </td>
                <td><input type="text" name="nim" placeholder="NIM" size="15" maxlength="10" /></td>
            </tr>
            <tr>
                <td align="right">NAMA : </td>
                <td><input type="text" name="nama" placeholder="Nama" size="40" maxlength="40" /></td>
            </tr>
            <tr>
		        <td align="right">TANGGAL LAHIR :</td>
		        <td><input type="date" name="tgllahir" id="tgllahir"/></td>
            </tr>
            <tr>
		        <td align="right">ALAMAT :</td>
		        <td><textarea name="alamat" rows="3" cols="40"></textarea></td>
	        </tr>
	        <tr>
		        <td>&nbsp;</td>
                <td>
                    <input type="submit" name="input" value="Input" />
                    <input type="submit" name="reset" value="Reset" />
                </td>
            </tr>
        </table>
    </form>
    <?php 
    if (isset($_POST['input'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $tgllahir = $_POST['tgllahir'];
        $alamat = $_POST['alamat'];

        include_once "koneksi.php";

        $query = "INSERT INTO tblmhs 
            VALUES ('$nim', '$nama', '$tgllahir', 
            '$alamat' ) ";
        
        $exequery = mysqli_query($conn, $query) or die($query);
        if ($exequery) {
            $pesan = "Input data berhasil";
        } else {
            $pesan = "Input data gagal.";
        }
        echo "<script>
        alert('$pesan');
        document.location='index.php?page=mahasiswa';
        </script>";
    }
    ?>
</article>