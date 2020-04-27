<?php
if(!isset($_SESSION ['id_spk'])) {
    echo "<script> window.location.assign('../index.php'); </script>";
}

require 'db/database.php';
require 'fungsi.php';
require 'import/excel_reader2.php';
?>

<div class="container">
    <div class="row">
                <!--UPLOAD EXCEL FORM-->
                <form method="post" enctype="multipart/form-data" action="">
                    <div class="form-group">
                        <div class="input-group">
                            <label>Import data from excel</label>
                            <input name="filetraining" type="file" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <input name="submit" type="submit" value="Upload Data" class="btn btn-success">
                        </div>
                    </div>
                </form>

            <?php

        
        $db_object = new database();

        if (isset($_POST['submit'])) {
            // if(!$input_error){

            $target = basename($_FILES['filetraining']['name']) ;
            move_uploaded_file($_FILES['filetraining']['tmp_name'], $target);

            // beri permisi agar file xls dapat di baca
            chmod($_FILES['filetraining']['name'],0777);
            // mengambil isi file xls
            $data = new Spreadsheet_Excel_Reader($_FILES['filetraining']['name'],false);

            $baris = $data->rowcount($sheet_index = 0);
            for ($i=2; $i<=$baris; $i++) {
//               
                if(!empty($data->val($i, 2))){
                    $nama     = $data->val($i, 1);
                    $nim   = $data->val($i, 2);
                    $jurusan  = $data->val($i, 3);
                    $prodi  = $data->val($i, 4);
                    $minat  = $data->val($i, 5);
                    $bakat  = $data->val($i, 6);
                    $hobi  = $data->val($i, 7);
                    $label  = $data->val($i, 8);
                    $sql1="INSERT INTO tb_data_training VALUES ('','$nama','$nim','$jurusan','$prodi','$minat','$bakat','$hobi','$label')";
    $query1 = $db_object->db_query($sql1);
     }
            }
    if ($query1){
        echo "<script>window.location.assign('?page=training&actions=tampil');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
    }
        ?>

       <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-user-plus"></span> Data Training</h3>
                </div>
                <div class="panel-body">
                    <table id="dataTable" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th><th>Nama Lengkap</th><th>NIM</th><th>Jurusan</th><th>Prodi</th><th>Minat</th><th>Bakat</th><th>Hobi</th><th>Label Kelas</th><th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>

                           <?php
                            $sql2 = "SELECT * FROM tb_data_training";
                            $query2 = $db_object->db_query($sql2);

                            $no = 1;
                            while ($row = $db_object->db_fetch_array($query2)) {
                            echo "<tr>";
                            echo "<td>" . $no . "</td>";
                            echo "<td>" . $row['nama'] . "</td>";
                            echo "<td>" . $row['nim'] . "</td>";
                            echo "<td>" . $row['jurusan'] . "</td>";
                            echo "<td>" . $row['prodi'] . "</td>";
                            echo "<td>" . $row['minat'] . "</td>";
                            echo "<td>" . $row['bakat'] . "</td>";
                            echo "<td>" . $row['hobi'] . "</td>";
                            echo "<td>" . $row['label'] . "</td>";
                            echo "<td><a href='?page=training&actions=delete&id=".$row['id']."'>"
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

