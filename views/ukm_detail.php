<?php 

require 'db/database.php'; 
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi Detail UKM</h3>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail arsip-->
                    <?php
                    $db_object = new database();
                    $sql = "SELECT *FROM tb_data_ukm WHERE id='" . $_GET ['id'] . "'";
                    //proses query ke database
                    $query = $db_object->db_query($sql);
                    //Merubaha data hasil query kedalam bentuk array
                    
                     while ($data = $db_object->db_fetch_array($query)) {
                    ?>   
   

                    <!--dalam tabel--->
                    <table class="table table-bordered table-striped table-hover"> 
                        <tr>
                            <td width="200">Nama UKM</td> <td><?= $data['nama_ukm'] ?></td>
                        </tr>
                        <tr>
                            <td>Visi</td> <td><?= $data['visi'] ?></td>
                        </tr>
                        <tr>
                            <td>Misi</td> <td><?= $data['misi'] ?></td>
                        </tr>
                        <tr>
                            <td>Tujuan</td> <td><?= $data['tujuan'] ?></td>
                        </tr>
                        <tr>
                            <td>Program Kerja</td> <td><?= $data['proker'] ?></td>
                        </tr>
                        <tr>
                            <td>Struktur Organisasi</td> <td><?= $data['struktur_org'] ?></td>
                        </tr>
                        <tr>
                            <td>Kriteria Anggota</td> <td><?= $data['kriteria_ang'] ?></td>
                        </tr>
                        <tr>
                            <td>Sistem Perekrutan</td> <td><?= $data['sistem_rekrut'] ?></td>
                        </tr>
                        <tr>
                            <td>Prestasi</td> <td><?= $data['prestasi'] ?></td>
                        </tr>
                        <tr>
                            <td>Divisi</td> <td><?= $data['divisi'] ?></td>
                        </tr>
                    </table>
        
                </div> <!--end panel-body-->
                <!--panel footer--> 
                <div class="panel-footer">
                    <a href="?page=ukm&actions=tampil" class="btn btn-primary btn-sm">
                        Kembali </a>

                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>
<?php } ?>

