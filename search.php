        <table border="1">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Password</th>
            <th>Akses ID</th>
            <th>Jumlah Like</th>
            <th>Opsi</th>
        </tr>
        <?php
        $no = 1;
        foreach($db->search($_POST["search"]) as $x){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $x['username']; ?></td>
            <td><?php echo $x['pass']; ?></td>
            <td><?php 
                    if($x['akses_id']==1):
                        echo "Admin";
                    elseif($x['akses_id']==2):
                        echo "User";
                    else:
                        echo"Tidak mempunyai jabatan";
                    endif;
                ?>
            </td>
            <td><?php echo $x['like'];?></td>
            <td>
                <a href="edit-data.php?id=<?php echo $x['id']; ?>&aksi=update">Edit</a>
                <a href="proses.php?id=<?php echo $x['id']; ?>&aksi=hapus" onclick="return confirm('anda ingin menghapus data , <?php echo $x['username']; ?> ?')">Hapus</a>			
                <a href="proses.php?id=<?php echo $x['id']; ?>&aksi=like">Like</a>
            </td>
        </tr>
        <?php 
        }
        ?>
    </table>
