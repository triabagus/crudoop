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
            <th>Share</th>
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
            <td>
            <div id="fb-root"></div>
                <script async defer src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v3.2"></script>
                <div class="fb-share-button" data-href="http://teknologikopin.blogspot.com/2015/08/apakah-memenuhi-syaratkah-teknologi.html" data-layout="button" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Bagikan</a></div>
                <!-- <span class="facebook-share" data-js="facebook-share">Share on Facebook</span> -->
                <button class="twitter-share" data-js="twitter-share">
                    <i class="fab fa-twitter"></i> Share
                </button>
                <script>
                    var twitterShare = document.querySelector('[data-js="twitter-share"]');

                    twitterShare.onclick = function(e) {
                    e.preventDefault();
                    var twitterWindow = window.open('https://twitter.com/share?url=' + document.URL, 'twitter-popup', 'height=350,width=600');
                    if(twitterWindow.focus) { twitterWindow.focus(); }
                        return false;
                    }

                    // var facebookShare = document.querySelector('[data-js="facebook-share"]');

                    // facebookShare.onclick = function(e) {
                    // e.preventDefault();
                    // var facebookWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + document.URL, 'facebook-popup', 'height=350,width=600');
                    // if(facebookWindow.focus) { facebookWindow.focus(); }
                    //     return false;
                    // }
                </script>
                <!-- 
                    google + share
                    Place this tag in your head or just before your close body tag.
                 -->
                <script src="https://apis.google.com/js/platform.js" async defer>
                {lang: 'id'}
                </script>
                <!-- Place this tag where you want the share button to render. -->
                <div class="g-plus" data-action="share" data-height="24" data-href="http://teknologikopin.blogspot.com/2015/08/apakah-memenuhi-syaratkah-teknologi.html"></div>

                <!-- Place this render call where appropriate. -->
                <script type="text/javascript">gapi.plus.go();</script>

                <div>
                    <script type="IN/Share" data-url="http://teknologikopin.blogspot.com/2015/08/apakah-memenuhi-syaratkah-teknologi.html" data-counter="top" id="linked_url"></script>
                </div>
                <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
            </td>
        </tr>
        <?php 
        }
        ?>
    </table>
</div>