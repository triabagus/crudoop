<?php
    include 'detail-pagination-list.php';

    if($halamanAktif > 1):
        //&laquo;&lt;
    ?>
        <a href="?halaman=<?= $halamanAktif - 1?>">&laquo;</a>
    <?php
    endif;

    for ($i=1; $i <= $jumlahHalaman; $i++):
        if($i == $halamanAktif):
    ?>
            <a href="?halaman=<?= $i?>" style="color:red;"><?= $i?></a>
    <?php
        else:
    ?>
            <a href="?halaman=<?= $i?>"><?= $i?></a>
    <?php
        endif;
    endfor;

    if($halamanAktif < $jumlahHalaman):
        //&raquo;&gt;
        ?>
            <a href="?halaman=<?= $halamanAktif + 1?>">&raquo;</a>
        <?php
    endif;
?>