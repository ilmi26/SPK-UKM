<?php
if(!isset($_SESSION ['id_spk'])) {
    echo "<script> window.location.assign('../index.php'); </script>";
}

require 'db/database.php';
?>

<div class="container">
    <div class="row">
         <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-user-plus"></span> Data Mahasiswa</h3>
                </div>
                <div class="panel-body">
                    <table id="dtskripsi" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th><th>Nama Lengkap</th><th>NIM</th><th>Jurusan</th><th>Prodi</th><th>Minat</th><th>Bakat</th><th>Hobi</th><th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            $db_object = new database();
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = "SELECT * FROM tb_data_mhs";
                            $query = $db_object->db_query($sql);

                            $nomor = 0;
                            while ($data = $db_object->db_fetch_array($query)) {
                                $nomor++; //Penambahan satu untuk nilai var nomor
                                ?>
                                <tr>
                                    <td><?= $nomor ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['nim'] ?></td>
                                    <td><?= $data['jurusan'] ?></td>
                                    <td><?= $data['prodi'] ?></td>
                                    <td><?= $data['minat'] ?></td>
                                    <td><?= $data['bakat'] ?></td>
                                    <td><?= $data['hobi'] ?></td>
                                    <td>
                                    
                                        <a href="?page=data_mhs&actions=delete&nim=<?= $data['nim'] ?>" class="btn btn-danger btn-xs">
                                            <span class="fa fa-remove"></span>
                                        </a>
                                    </td>
                                </tr>
                                <!--Tutup Perulangan data-->
                            <?php } ?>
                        </tbody>
                        
                    </table>
                  
                </div>
            </div>

        </div>
    </div>
</div>
