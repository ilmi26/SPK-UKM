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
                <form method="post" enctype="multipart/form-data" action="?page=uji&actions=akurasi">
                 <div class="col-md-2">
                    <div class="form-group">
                        <a href="?page=testing&actions=tambah"class="btn btn-success"> Tambah Data Testing</a>    
                        <button type="submit" value="Submit" class="btn btn-primary" onclick="">
                            <i class="fa fa-check"></i> Uji Akurasi
                        </button>
                    </div>
                </div>
                </div>
                    
                    </div>
                    
                </form>


        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-file"></span> Data Testing</h3>
                </div>
                <div class="panel-body">
                    <table id="dataTable" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th><th>Jurusan</th><th>Prodi</th><th>Minat</th><th>Bakat</th><th>Hobi</th><th>Label Kelas</th><th>Kelas Prediksi</th><th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>

                           <?php
                            $db_object = new database();
                            $sql2 = "SELECT * FROM tb_data_testing";
                            $query2 = $db_object->db_query($sql2);

                            $no = 1;
                            while ($row = $db_object->db_fetch_array($query2)) {
                            echo "<tr>";
                            echo "<td>" . $no . "</td>";
                            echo "<td>" . $row['jurusan'] . "</td>";
                            echo "<td>" . $row['prodi'] . "</td>";
                            echo "<td>" . $row['minat'] . "</td>";
                            echo "<td>" . $row['bakat'] . "</td>";
                            echo "<td>" . $row['hobi'] . "</td>";
                            echo "<td>" . $row['label'] . "</td>";
                            echo "<td>" . $row['kelas_hasil'] . "</td>";
                            echo "<td><a href='?page=testing&actions=delete&id=".$row['id']."'>"
                                    . "<img src='images/delete.gif'/></a></td>";
                            echo "</tr>";
                            $no++;
                              }
                        ?>
                    </table>
                  
                </div>
            </div>

        </div>
    </div>
</div>
 
