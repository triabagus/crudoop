<?php
class database{
 
	var $host = "localhost";
	var $uname = "toor";
	var $pass = "1";
	var $db = "crudOOP";
    protected $conn;

    function __construct(){
        $this->conn = mysqli_connect($this->host, $this->uname, $this->pass, $this->db)or die(mysqli_error());
    }

    function tampil_data(){
       
        $data = mysqli_query($this->conn, "SELECT * FROM admin");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
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


