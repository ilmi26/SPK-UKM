<?php
session_start(); // harus ada di bagian paling atas kode
$path_to_root = "";
include $path_to_root . 'db/database.php';

$db_object = new database();
//ambil data dari form login
$btn=$_POST['login'];
$user=$_POST['user'];
$pwd=$_POST['pwd'];

//Baca data ke database dengan label user
// include 'db/koneksi.php';
$sql="SELECT * FROM tb_user WHERE username='$user' AND password='$pwd'";
$result = $db_object->db_query($sql);
$jumlahdata = $db_object->db_num_rows($result);
if($jumlahdata > 0){
    $data=  $db_object->db_fetch_array($result); //ambil data dan konversi menjadi array
    session_start(); //aktifkan session wajib
    $_SESSION['username']=$user;
    $_SESSION['id_spk']=session_id();
    //pindahkan ke halaman index
    header("location:index_admin.php", true);
}else{
    echo "<script> window.location.assign('index.php?error=yes');</script>";

}
