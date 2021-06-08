<?php
if(!isset($_SESSION ['id_spk'])) {
    echo "<script> window.location.assign('../index.php'); </script>";
}

require 'db/database.php';
?>

<div class="container">
    <div class="row">
            <div class="col-md-12">
                <!--UPLOAD EXCEL FORM-->


        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-user-plus"></span> Data Hasil SPK</h3>
                </div>
                <div class="panel-body">
                    <table id="dataTable" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th><th>Jurusan</th><th>Prodi</th><th>Minat</th><th>Bakat</th><th>Hobi</th><th>Hasil Rekomendasi UKM</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            $db_object = new database();
                            $sql2 = "SELECT * FROM tb_hasil_spk";
                            $query2 = $db_object->db_query($sql2);

                            $no = 1;
                            while ($row = $db_object->db_fetch_array($query2)) {
                            echo "<tr>";
                            echo "<td>" . $no . "</td>";
                            echo "<td>" . $row['id_jurusan'] . "</td>";
                            echo "<td>" . $row['prodi'] . "</td>";
                            echo "<td>" . $row['id_minat'] . "</td>";
                            echo "<td>" . $row['bakat'] . "</td>";
                            echo "<td>" . $row['hobi'] . "</td>";
                            echo "<td>" . $row['kelas_hasil'] . "</td>";
                            echo "</tr>";
                            $no++;
                              }
                        ?>
                        </tbody>
                        
                    </table>
                  
                </div>
            </div>

        </div>
    </div>
</div>
