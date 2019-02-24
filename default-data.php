<div class="table-responsive">
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Akses ID</th>
            <th>Jumlah Like</th>
            <th>Gambar</th>
            <th>Opsi</th>
        </tr>
    </thead>
        <?php
        foreach($db->tampil_data() as $x){
        ?>
        <tr>
            <td><?php echo $x['id']; ?></td>
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
            <td><i class="fas fa-heart"></i> <?php echo $x['suka'];?></td>
            <td><img src="<?php echo $x['gambar'];?>" width="100px" height="auto"></td>
            <td>
                <a href="edit-data.php?id=<?php echo $x['id']; ?>&aksi=update"><i class="fas fa-edit"></i> Edit</a>
                <a href="proses.php?id=<?php echo $x['id']; ?>&aksi=hapus" onclick="return confirm('anda ingin menghapus data , <?php echo $x['username']; ?> ?')"><i class="fas fa-trash-alt"></i> Hapus</a>			
                <a href="proses.php?id=<?php echo $x['id']; ?>&aksi=like"><i class="fas fa-thumbs-up"></i> Like</a>

                <a href="proses.php?id=<?php echo $x['id']; ?>&aksi=download"><i class="fas fa-file-download"></i> download</a>
            </td>
        </tr>
        <?php 
        }
        ?>
    </table>
</div>