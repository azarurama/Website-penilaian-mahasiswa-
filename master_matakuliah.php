<article>
    <h1> Data Matakuliah</h1>
        <table border="1" width="100%">
        <tr>
            <th>NO</th>
            <th>KODE</th>
            <th>Nama Matakuliah</th>
            <th>SKS</th>
            <th>PROSES</th>
        </tr>
        <?php
        include_once "koneksi.php";
        $query = "SELECT * FROM tblmatkul";
        $result = mysqli_query($conn, $query);
        $no =1;
        while($data = mysqli_fetch_array($result)){
            $kd_mtk = $data['kd_mtk'];
            $nm_mtk = $data['nm_mtk'];
            $sks = $data['sks'];
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $kd_mtk;?></td>
            <td><?php echo $nm_mtk;  ?></td>
            <td><?php echo $sks;  ?></td>
            <td><a href='index.php?page=editmtk&matakuliah=<?=$kd_mtk?>' title='Edit User'>Edit</a> 
                | 
                <a href='index.php?page=delmtk&matakuliah=<?=$kd_mtk?>' title='delete Matakuliah'
                onclick="return confirm('Apakah anda yakin menghapus data ini?')">Delete</a> </td>
        </tr>
        <?php  } ?>
        </table>
        <a href='index.php?page=tambahmatkul&matakuliah=' title='tambah mahasiswa'>Tambah Matakuliah Baru</a>
</article>