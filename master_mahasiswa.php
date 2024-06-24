<article>
    <h1> Data Mahasiswa</h1>
        <table border="1" width="100%">
        <tr>
            <th>NO</th>
            <th>NIM</th>
            <th>NAMA</th>
            <th>TGL LAHIR</th>
            <th>ALAMAT</th>
            <th>PROSES</th>
        </tr>
        <?php
        include_once "koneksi.php";
        $query = "SELECT * FROM tblmhs";
        $result = mysqli_query($conn, $query);
        $no =1;
        while($data = mysqli_fetch_array($result)){
            $nim = $data['nim'];
            $nama = $data['nama'];
            $tgllhr = $data['tgllahir'];
            $alamat = $data['alamat'];
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $nim;?></td>
            <td><?php echo $nama;  ?></td>
            <td><?php echo $tgllhr;  ?></td>
            <td><?php echo $alamat;  ?></td>
            <td><a href='index.php?page=editmhs&mahasiswa=<?=$nim?>' title='Edit User'>Edit</a> 
                | 
                <a href='index.php?page=delmhs&mahasiswa=<?=$nim?>' title='delete User'
                onclick="return confirm('Apakah anda yakin menghapus data ini?')">Delete</a> </td>
        </tr>
        <?php  } ?>
        </table>
        <a href='index.php?page=tambahmhs&mahasiswa=' title='tambah mahasiswa'>Tambah Mahasiswa Baru</a>
</article>