<?php
class database{
 
	protected $host = "localhost";
	protected $uname = "toor";
	protected $pass = "1";
	protected $db = "crudOOP";
    protected $conn;

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
            echo "<tr><td colspan='5' style='text-align:center;' >Data tidak ditemukan</td></tr>";
        endif;
        
    }

    function insert($username,$pass,$akses){

        $resInsert = mysqli_query($this->conn, "INSERT INTO admin(username,pass,akses_id) VALUES ('$username','$pass','$akses')");
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

    function update($id,$username,$pass,$akses){

        $resUpdate = mysqli_query($this->conn, "UPDATE admin SET username='$username',pass='$pass',akses_id='$akses' WHERE id='$id'");
        return $resUpdate;
    }
} 


