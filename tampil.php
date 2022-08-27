<style type="text/css">
table{
    border-collapse: collapse;
}
th,td{
    padding: 8px;
}
</style>


<table border="1">
    <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Umur</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>Opsi</th>
    </tr>
    <?php
        include 'koneksi.php';
        $no=1;
        try{
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $tampil = $db->query("select id,nama,tgl_lahir,timestampdiff(year,tgl_lahir,curdate()) as umur,jk, alamat, telp from tbl_anggota");
            while($data = $tampil->fetch(PDO::FETCH_LAZY)){

            
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo ucfirst(strtolower($data->nama));?></td>
                <td><?php echo ucfirst($data->umur)." Tahun";?></td>
                <td><?php echo ucfirst($data->jk);?></td>
                <td><?php echo ucfirst($data->alamat);?></td>
                <td><?php echo $data->telp;?></td>
                <td>
                    <button class="edit" id="<?php echo $data->id ?>">Edit</button>
                    <button class="hapus" id="<?php echo $data->id ?>">Hapus</button>
                </td>
            </tr>

        <?php
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
        ?>
</table>