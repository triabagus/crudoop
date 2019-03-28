<?php

class database{
 
	protected $host = "localhost";
	protected $uname = "toor";
	protected $pass = "1";
	protected $db = "crudOOP";
    public $conn;

    function __construct(){
        $this->conn = mysqli_connect($this->host, $this->uname, $this->pass, $this->db)or die(mysqli_error());
        
    }

    function tampil_data(){
        $jumlahDataHalaman= 2;
        $result = mysqli_query($this->conn, "SELECT * FROM admin");
        $jumlahData = mysqli_num_rows($result);
        $jumlahHalaman = ceil($jumlahData / $jumlahDataHalaman);

        // if(isset($_GET['halaman'])){
        //     $halamanAktif=$_GET['halaman'];
        // }else{
        //     $halamanAktif=1;
        // }
        $halamanAktif=(isset($_GET['halaman']) ) ? $_GET['halaman'] : 1;
        $awalData=($jumlahDataHalaman * $halamanAktif) - $jumlahDataHalaman;


        $data = mysqli_query($this->conn, "SELECT * FROM admin LIMIT $awalData, $jumlahDataHalaman");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function search($pencarian){
        $jumlahDataHalaman= 2;
        $result = mysqli_query($this->conn, "SELECT * FROM admin");
        $jumlahData = mysqli_num_rows($result);
        $jumlahHalaman = ceil($jumlahData / $jumlahDataHalaman);

        // if(isset($_GET['halaman'])){
        //     $halamanAktif=$_GET['halaman'];
        // }else{
        //     $halamanAktif=1;
        // }
        $halamanAktif=(isset($_GET['halaman']) ) ? $_GET['halaman'] : 1;
        $awalData=($jumlahDataHalaman * $halamanAktif) - $jumlahDataHalaman;

        $data_cari = mysqli_query($this->conn, "SELECT * FROM admin WHERE id LIKE '%$pencarian%' OR username LIKE '%$pencarian%' LIMIT $awalData, $jumlahDataHalaman");
        $adaTidakData=mysqli_num_rows($data_cari);
        if($adaTidakData !=0):
            while($ds = mysqli_fetch_array($data_cari)){
                $hasils[] = $ds;
            }
            return $hasils;
        else:
            echo "<tr><td colspan='6' style='text-align:center;' >Data tidak ditemukan</td></tr>";
        endif;
    }

    function insert($username,$pass,$akses,$gambar){
        
        $resInsert = mysqli_query($this->conn, "INSERT INTO admin(username,pass,akses_id,suka,gambar) VALUES ('$username','$pass','$akses',0,'$gambar')");
         
        return $resInsert;
                   
    }

    function hapus($id){
        $resDelete = mysqli_query($this->conn, "DELETE FROM admin WHERE id='$id'");
        return $resDelete;
    }

    function edit($id){
       
        $data = mysqli_query($this->conn, "SELECT * FROM admin WHERE id='$id'");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function update($id,$username,$pass,$akses,$gambar){

        $resUpdate = mysqli_query($this->conn, "UPDATE admin SET username='$username',pass='$pass',akses_id='$akses',gambar='$gambar' WHERE id='$id'");
        return $resUpdate;
    }

    function updateNoImage($id,$username,$pass,$akses){

        $resUpdate = mysqli_query($this->conn, "UPDATE admin SET username='$username',pass='$pass',akses_id='$akses' WHERE id='$id'");
        return $resUpdate;
    }

    function like($id){
        $sql     = "UPDATE `admin` SET `suka`= `suka`+1 WHERE id = '$id'";
        $resLike = mysqli_query($this->conn, $sql);
        return $resLike;
    }

    function download($id){
        $sql      = mysqli_query($this->conn,"SELECT * FROM admin WHERE id='$id'");
        while($data = mysqli_fetch_array($sql)){
            $file = $data['gambar'];
                    if (file_exists($file)) {
                        header('Content-Description: File Transfer');
                        header('Content-Type: application/octet-stream');
                        header('Content-Disposition: attachment; filename="'.basename($file).'"');
                        header('Expires: 0');
                        header('Cache-Control: must-revalidate');
                        header('Pragma: public');
                        header('Content-Length: ' . filesize($file));
                        readfile($file);
                        exit;
                    }
        }
    }
} 

class sign extends database{

    // proses registrasi
    public function reg_user($username,$pass){
        $sql="SELECT * FROM admin WHERE username='$username'"; // OR email='$email'
        $cekUser = mysqli_query($this->conn,$sql);
        $countUser  = $cekUser->num_rows;

        if($countUser == 0){
            $sqlReg="INSERT INTO admin(username,pass,akses_id,suka,gambar) VALUES ('$username','$pass',2,0,'')";
            $resSqlReg=mysqli_query($this->conn,$sqlReg);

            return $resSqlReg;
        }else{
            return false;
        }
    }

    // proses login
    public function loginCek_user($username,$password){
        $sqlCekLogin="SELECT id FROM admin WHERE username='$username' AND pass='$password'";
        // cek login
        $resultLogin = mysqli_query($this->conn,$sqlCekLogin);
        $userData    = mysqli_fetch_array($resultLogin);
        $countRow    = $resultLogin->num_rows;

        if($countRow == 1){
            // membuat SESSION
            $_SESSION['login']  = true;
            $_SESSION['id']     = $userData['id'];
            return true;
        }else{
            return false;
        }
    }

    // start SESSION
    public function get_session(){
        return $_SESSION['login'];
    }

    // start Logout
    public function user_logout(){
        $_SESSION['login'] = FALSE;
        session_destroy();
    }
}
////////// function counter visitor

// class hitCuonter{
//     private $expire; // menentukan umur cookies
//     private $file      ='counter.txt'; //file buat menyimpan counter hit visitor

//     public function __construct(){
//         if(!file_exists($this->file)){ // file exists : fungsi php untuk mengetahui apakah ada file tersebut
//             // kondisi apabila file counter.txt belom ada ,buat baru dengan nilai 0
//             $handle    = fopen($this->file,'w');
//             $data      = 0;
//             fwrite($handle,$data);
//         }
//         $this->expire  = 30 * 86400; //usia cookies 1 bulan
//     }

//     public function hitung(){
//         if(!isset($_COOKIE['counter'])){
//             //cookies kosong dan tambahkan jumlah pengunjung
//             $handle     = fopen($this->file,'r');
//             $data       = intval(fread($handle,filesize($this->file)));
//             // mengambil nilai dari counter.txt
//             $nilaiBaru  = $data + 1;// tambahkan nilai 1
//             //simpan nilai baru dengan
//             $handle     =  fopen($this->file,'w');
//             fwrite($handle, $nilaiBaru);
//             setcookie('counter', time(), time() + $this->expire);
//             // tambahkan cookiesdengan nilai tanggal sekarang
//         }
//     }

//     public function tampil(){
//         //mengambil nilai counter.txt
//         $handle     = fopen($this->file,'r');
//         $data       = intval(fread($handle, filesize($this->file)));
//         return $data;
//     }

//     public function waktu(){
//         $history    = null;
//         // menampilakan kapan user visit 
//         if(!empty($_COOKIE['counter'])){
//                 $get        = $_COOKIE['counter'];
//                 $history    = date("d F Y",$get);
//         }
//         return $history;
//     }
// }

class SocialMedia
	{
					# All Social Media Sites
					# -------------------------------------------------
		
				# All Social Media Sites ~ Nice Names
				# -------------------------------------------------
				
		public function GetSocialMediaSites_NiceNames()
		{
			return [
				'add.this'=>'AddThis',
				'blogger'=>'Blogger',
				'buffer'=>'Buffer',
				'diaspora'=>'Diaspora',
				'digg'=>'Digg',
				'douban'=>'Douban',
				'email'=>'EMail',
				'evernote'=>'EverNote',
				'getpocket'=>'Pocket',
				'facebook'=>'FaceBook',
				'flattr'=>'Flattr',
				'flipboard'=>'FlipBoard',
				'google.bookmarks'=>'GoogleBookmarks',
				'instapaper'=>'InstaPaper',
				'line.me'=>'Line.me',
				'linkedin'=>'LinkedIn',
				'livejournal'=>'LiveJournal',
				'gmail'=>'GMail',
				'hacker.news'=>'HackerNews',
				'ok.ru'=>'OK.ru',
				'pinterest.com'=>'Pinterest',
				'qzone'=>'QZone',
				'reddit'=>'Reddit',
				'renren'=>'RenRen',
				'skype'=>'Skype',
				'sms'=>'SMS',
				'surfingbird.ru'=>'SurfingBird.ru',
				'telegram.me'=>'Telegram.me',
				'threema'=>'Threema',
				'tumblr'=>'Tumblr',
				'twitter'=>'Twitter',
				'vk'=>'VK',
				'weibo'=>'Weibo',
				'xing'=>'Xing',
				'yahoo'=>'Yahoo',
			];
		}
		
				# Social Media Sites With Share Links
				# -------------------------------------------------
		
		public function GetSocialMediaSites_WithShareLinks_OrderedByPopularity()
		{
			return [
				'google.bookmarks',
				'facebook',
				'reddit',
				'twitter',
				'linkedin',
				'tumblr',
				'pinterest',
				'blogger',
				'livejournal',
				'evernote',
				'add.this',
				'getpocket',
				'hacker.news',
				'digg',
				'buffer',
				'flipboard',
				'instapaper',
				'surfingbird.ru',
				'flattr',
				'diaspora',
				'qzone',
				'vk',
				'weibo',
				'ok.ru',
				'douban',
				'xing',
				'renren',
				'threema',
				'sms',
				'line.me',
				'skype',
				'telegram.me',
				'email',
				'gmail',
				'yahoo',
			];
		}
		
		public function GetSocialMediaSites_WithShareLinks_OrderedByAlphabet()
		{
			$nice_names = $this->GetSocialMediaSites_NiceNames();
			
			return array_keys($nice_names);
		}
		
				# Social Media Site Links With Share Links
				# -------------------------------------------------
		
		public function GetSocialMediaSiteLinks_WithShareLinks($args)
		{
			$url = urlencode($args['url']);
			$title = urlencode($args['title']);
			$image = urlencode($args['image']);
			$desc = urlencode($args['desc']);
			$app_id = urlencode($args['appid']);
			$redirect_url = urlencode($args['redirecturl']);
			$via = urlencode($args['via']);
			$hash_tags = urlencode($args['hashtags']);
			$provider = urlencode($args['provider']);
			$language = urlencode($args['language']);
			$user_id = urlencode($args['userid']);
			$category = urlencode($args['category']);
			$phone_number = urlencode($args['phonenumber']);
			$email_address = urlencode($args['emailaddress']);
			$cc_email_address = urlencode($args['ccemailaddress']);
			$bcc_email_address = urlencode($args['bccemailaddress']);
			
			$text = $title;
			
			if($desc) {
				$text .= '%20%3A%20';	# This is just this, " : "
				$text .= $desc;
			}
			
				// conditional check before arg appending
			
			return [
				'add.this'=>'http://www.addthis.com/bookmark.php?url=' . $url,
				'blogger'=>'https://www.blogger.com/blog-this.g?u=' . $url . '&n=' . $title . '&t=' . $desc,
				'buffer'=>'https://buffer.com/add?text=' . $text . '&url=' . $url,
				'diaspora'=>'https://share.diasporafoundation.org/?title=' . $title . '&url=' . $url,
				'digg'=>'http://digg.com/submit?url=' . $url . '&title=' . $text,
				'douban'=>'http://www.douban.com/recommend/?url=' . $url . '&title=' . $text,
				'email'=>'mailto:' . $email_address . '?subject=' . $title . '&body=' . $desc,
				'evernote'=>'http://www.evernote.com/clip.action?url=' . $url . '&title=' . $text,
				'getpocket'=>'https://getpocket.com/edit?url=' . $url,
				'facebook'=>'http://www.facebook.com/sharer.php?u=' . $url,
				'flattr'=>'https://flattr.com/submit/auto?user_id=' . $user_id . '&url=' . $url . '&title=' . $title . '&description=' . $text . '&language=' . $language . '&tags=' . $hash_tags . '&hidden=HIDDEN&category=' . $category,
				'flipboard'=>'https://share.flipboard.com/bookmarklet/popout?v=2&title=' . $text . '&url=' . $url, 
				'gmail'=>'https://mail.google.com/mail/?view=cm&to=' . $email_address . '&su=' . $title . '&body=' . $url . '&bcc=' . $bcc_email_address . '&cc=' . $cc_email_address,
				'google.bookmarks'=>'https://www.google.com/bookmarks/mark?op=edit&bkmk=' . $url . '&title=' . $title . '&annotation=' . $text . '&labels=' . $hash_tags . '',
				'instapaper'=>'http://www.instapaper.com/edit?url=' . $url . '&title=' . $title . '&description=' . $desc,
				'line.me'=>'https://lineit.line.me/share/ui?url=' . $url . '&text=' . $text,
				'linkedin'=>'https://www.linkedin.com/shareArticle?mini=true&url=' . $url . '&title=' . $title . '&summary=' . $text . '&source=' . $provider,
				'livejournal'=>'http://www.livejournal.com/update.bml?subject=' . $text . '&event=' . $url,
				'hacker.news'=>'https://news.ycombinator.com/submitlink?u=' . $url . '&t=' . $title,
				'ok.ru'=>'https://connect.ok.ru/dk?st.cmd=WidgetSharePreview&st.shareUrl=' . $url,
				'pinterest'=>'http://pinterest.com/pin/create/button/?url=' . $url ,
				'qzone'=>'http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=' . $url,
				'reddit'=>'https://reddit.com/submit?url=' . $url . '&title=' . $title,
				'renren'=>'http://widget.renren.com/dialog/share?resourceUrl=' . $url . '&srcUrl=' . $url . '&title=' . $text . '&description=' . $desc,
				'skype'=>'https://web.skype.com/share?url=' . $url . '&text=' . $text,
				'sms'=>'sms:' . $phone_number . '?body=' . $text,
				'surfingbird.ru'=>'http://surfingbird.ru/share?url=' . $url . '&description=' . $desc . '&screenshot=' . $image . '&title=' . $title,
				'telegram.me'=>'https://t.me/share/url?url=' . $url . '&text=' . $text . '&to=' . $phone_number,
				'threema'=>'threema://compose?text=' . $text . '&id=' . $user_id,
				'tumblr'=>'https://www.tumblr.com/widgets/share/tool?canonicalUrl=' . $url . '&title=' . $title . '&caption=' . $desc . '&tags=' . $hash_tags,
				'twitter'=>'https://twitter.com/intent/tweet?url=' . $url . '&text=' . $text . '&via=' . $via . '&hashtags=' . $hash_tags,
				'vk'=>'http://vk.com/share.php?url=' . $url . '&title=' . $title . '&comment=' . $desc,
				'weibo'=>'http://service.weibo.com/share/share.php?url=' . $url . '&appkey=&title=' . $title . '&pic=&ralateUid=',
				'xing'=>'https://www.xing.com/spi/shares/new?url=' . $url,
				'yahoo'=>'http://compose.mail.yahoo.com/?to=' . $email_address . '&subject=' . $title . '&body=' . $text,
			];
		}
	}


