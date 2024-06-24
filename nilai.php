<article>
<h1>Entry Nilai Mahasiswa</h1></br>
    <form action="" method="post">
    <?php
        include_once "koneksi.php";
        $query = "SELECT * FROM tblmhs";
        $result = mysqli_query($conn, $query);
        ?>
        <table widht="100%" border="0">
        Mahasiswa:<select name="mahasiswa" >
        <?php
        while($data = mysqli_fetch_array($result)){
            $nim = $data['nim'];
            $nama = $data['nama'];
        ?>
            <option value="<?php echo $data['nim'] ?>"> <?php
            echo $data['nama']
            ?></option>
            <?php 
        }
        ?>
        </select><br/><br/>
        <?php
        include_once "koneksi.php";
        $query = "SELECT * FROM tblmatkul";
        $result = mysqli_query($conn, $query);
        ?>
        Matakuliah:<select name="matakuliah" >
        <?php
        while($data = mysqli_fetch_array($result)){
            $kd_mtk = $data['kd_mtk'];
            $nm_mtk = $data['nm_mtk'];
        ?>
            <option value="<?php echo $kd_mtk ?>"> <?php
            echo $data['nm_mtk']
            ?></option>
            <?php 
        }
        ?>
        </select><br/><br/>
        Nilai (angka) :<input type="number" name="nilai" size="1" placeholder="nilai" /><br/><br/>
        <input type="submit" name="input" value="Input" />
        <input type="submit" name="reset" value="Reset" />
        </table>
    </form>
    <?php 
    if (isset($_POST['input'])) {
        $nim = $_POST['mahasiswa'];
        $kd_mtk = $_POST['matakuliah'];
        $nilai = $_POST['nilai'];

        include_once "koneksi.php";

        $query = "INSERT INTO tblnilai
            VALUES ( '$nim','$kd_mtk','$nilai' ) ";
        
        $exequery = mysqli_query($conn, $query) or die($query);
        if ($exequery) {
            $pesan = "Input nilai berhasil";
        } else {
            $pesan = "Input data gagal.";
        }
        echo "<script>
        alert('$pesan');
        document.location='index.php?page=entri';
        </script>";
    }
    ?>
</article>

