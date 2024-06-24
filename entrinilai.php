<article>
    <h1> Data Nilai Mahasiswa</h1>
    <?php
        include_once "koneksi.php";
    $nim1 = isset($_GET['nim'])?$_GET['nim']:"";
    $kd_mtk1 = isset($_GET['kd_mtk'])?$_GET['kd_mtk']:"";

    if($nim1 == "all"&& $kd_mtk1="all" ){
        $query = "SELECT b.nama,a.nm_mtk,c.kd_mtk,c.nim,c.nilai FROM tblnilai c,tblmhs b,tblmatkul a 
        WHERE b.nim=c.nim AND a.kd_mtk=c.kd_mtk  ";
    }elseif($nim1==''&&$kd_mtk1==''){
        $query = "SELECT b.nama,a.nm_mtk,c.kd_mtk,c.nim,c.nilai FROM tblnilai c,tblmhs b,tblmatkul a 
        WHERE b.nim=c.nim AND a.kd_mtk=c.kd_mtk ";
    }elseif($nim1=='all'){
        $query = "SELECT b.nama,a.nm_mtk,c.kd_mtk,c.nim,c.nilai FROM tblnilai c,tblmhs b,tblmatkul a 
        WHERE b.nim=c.nim AND a.kd_mtk=c.kd_mtk AND c.kd_mtk='$kd_mtk1'  ";
    }elseif($kd_mtk1=='all'){
        $query = "SELECT b.nama,a.nm_mtk,c.kd_mtk,c.nim,c.nilai FROM tblnilai c,tblmhs b,tblmatkul a 
        WHERE b.nim=c.nim AND a.kd_mtk=c.kd_mtk AND c.nim='$nim1' ";
    }else {
        $query = "SELECT b.nama,a.nm_mtk,c.kd_mtk,c.nim,c.nilai FROM tblnilai c,tblmhs b,tblmatkul a 
        WHERE b.nim=c.nim AND a.kd_mtk=c.kd_mtk AND c.kd_mtk='$kd_mtk1' AND c.nim='$nim1'   ";
    }
    ?>
    <form action="index.php?page=entri&nim=<?php isset($_GET['nim'])?$_GET['nim']:''?>
    &kd_mtk=<?php isset($_GET['kd_mtk'])?$_GET['kd_mtk']:'' ?>" method="get" >
        Filter 
        <input type='hidden' name='page' value='entri' >
        <select name="nim" >
            <option value="all">semua</option>
        <?php
        $query1 = "SELECT nim,nama FROM tblmhs ";
        $result1 = mysqli_query($conn, $query1);
            while($data1 = mysqli_fetch_array($result1)){
                $nim = $data1['nim'];
                $nama = $data1['nama'];
            ?>
            <option value=<?=$nim?>><?=$nama?></option>
            <?php
            }
            ?>
            </select>
            <select name="kd_mtk" > 
            <option value="all">semua</option>
            <?php
        $query2 = "SELECT kd_mtk,nm_mtk FROM tblmatkul ";
        $result2 = mysqli_query($conn, $query2);
            while($data2 = mysqli_fetch_array($result2)){
                $kd_matkul = $data2['kd_mtk'];
                $nm_matkul = $data2['nm_mtk'];
            ?>
            <option value=<?=$kd_matkul?>><?=$nm_matkul?></option>
            <?php
            }
            ?>
            </select>
            <input type="submit" name="filter" value="filter" />
        </form>
        <table border="1" width="100%">
        <tr>
            <th>NO</th>
            <th>NIM</th>
            <th>NAMA MAHASISWA</th>
            <th>KODE</th>
            <th>MATAKULIAH</th>
            <th>NILAI</th>
            <th>GRADE</th>
            <th>PROSES</th>
        </tr>
        <?php
        $result = mysqli_query($conn, $query);
        $no =1;
        while($data = mysqli_fetch_array($result)){
            $nim = $data['nim'];
            $nama = $data['nama'];
            $kd_matkul = $data['kd_mtk'];
            $nm_matkul = $data['nm_mtk'];
            $nilai = $data['nilai'];
            if ($nilai>=85 && $nilai<=100){
                $grade='A';
            } else if ($nilai>=70 && $nilai<85){
                $grade='B';
            } else if ($nilai>=55 && $nilai<70){
                $grade='C';
            } else if ($nilai>=45 && $nilai<55){
                $grade='D';
            } else {
                $grade='E';
            }
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $nim;?></td>
            <td><?php echo $nama;  ?></td>
            <td><?php echo $kd_matkul;  ?></td>
            <td><?php echo $nm_matkul;  ?></td>
            <td><?php echo $nilai;  ?></td>
            <td><?php echo $grade;  ?></td>
            <td><a href='index.php?page=editnilai&entri=<?=$nim?>&kd_matkul=<?=$kd_matkul?> title='Edit User'>Edit</a> 
                | 
                <a href="index.php?page=delnilai&entri=<?=$nim?>&kd_matkul=<?=$kd_matkul?>" title='delete User'
                onclick="return confirm('Apakah anda yakin menghapus data ini?')">Delete</a> </td>
        </tr>
        <?php  } ?>
        </table>
        <a href='index.php?page=nilai&entri=' title='entri nilai'>Entry Nilai Mahasiswa</a>
</article>