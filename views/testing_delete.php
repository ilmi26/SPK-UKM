<?php

require 'db/database.php';

$db_object = new database();
//membuat query untuk hapus data
$sql="DELETE FROM tb_data_testing WHERE id ='".$_GET['id']."'";
$query=$db_object->db_query($sql);
if($query){
    echo"<script> window.location.assign('?page=testing&actions=tampil');</script>";
}else{
    echo"<script> alert ('Maaf !!! Data Tidak Berhasil Dihapus') window.location.assign('?page=testing&actions=tampil');</scripr>";
}

