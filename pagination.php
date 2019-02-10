
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <?php
        include 'detail-pagination-list.php';
            if($halamanAktif > 1):
        //&laquo;&lt;
    ?>
    <li class="page-item" aria-current="page">
      <a class="page-link" href="?halaman=<?= $halamanAktif - 1?>"" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php
    endif;

    for ($i=1; $i <= $jumlahHalaman; $i++):
        if($i == $halamanAktif):
    ?>
        <li class="page-item active" aria-current="page"><a class="page-link" href="?halaman=<?= $i?>"><?= $i?></a></li>
    <?php
        else:
    ?>
        <li class="page-item"><a class="page-link" href="?halaman=<?= $i?>"><?= $i?></a></li>
    <?php
        endif;
    endfor;
    ?>
    <?php
    if($halamanAktif < $jumlahHalaman):
        //&raquo;&gt;
        ?>
            <li class="page-item">
      <a class="page-link" href="?halaman=<?= $halamanAktif + 1?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
        <?php
    endif;
?>
    
  </ul>
</nav>
    


