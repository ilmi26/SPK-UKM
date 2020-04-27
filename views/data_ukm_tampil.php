<?php
if(!isset($_SESSION ['id_spk'])) {
    echo "<script> window.location.assign('../index.php'); </script>";
}

require 'db/database.php'; 
require 'import/excel_reader2.php';
?>

<div class="container">
    <div class="row">
                <!--UPLOAD EXCEL FORM-->
                <form method="post" enctype="multipart/form-data" action="">
                    <div class="form-group">
                        <div class="input-group">
                            <label>Import data from excel</label>
                            <input name="DataUKM" type="file" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <input name="submit" type="submit" value="Upload Data" class="btn btn-success">
                    </div>
                </form>

                <?php
        

            $db_object = new database();
       if (isset($_POST['submit'])) {
            // if(!$input_error){

            $target = basename($_FILES['DataUKM']['name']) ;
            move_uploaded_file($_FILES['DataUKM']['tmp_name'], $target);

            // beri permisi agar file xls dapat di baca
            chmod($_FILES['DataUKM']['name'],0777);
            // mengambil isi file xls
            $data = new Spreadsheet_Excel_Reader($_FILES['DataUKM']['name'],false);

            $baris = $data->rowcount($sheet_index = 0);
            for ($i=2; $i<=$baris; $i++) {
//                for($c=1; $c<=$column; $c++){
//                    $value[$c] = $data->val($i, $c);
//                }
                if(!empty($data->val($i, 2))){
                    $nama_ukm = $data->val($i, 1);
                    $about = $data->val($i, 2);
                    $visi   = $data->val($i, 3);
                    $misi  = $data->val($i, 4);
                    $tujuan  = $data->val($i, 5);
                    $proker  = $data->val($i, 6);
                    $struktur_org  = $data->val($i, 7);
                    $kriteria_ang  = $data->val($i, 8);
                    $sistem_rekrut  = $data->val($i, 9);
                    $prestasi  = $data->val($i, 10);
                    $divisi  = $data->val($i, 11);
                    $foto  = $data->val($i, 12);

                    $sql1 = "INSERT INTO tb_data_ukm values('','$nama_ukm','$about','$visi','$misi','$tujuan','$proker','$struktur_org','$kriteria_ang','$sistem_rekrut','$prestasi','$divisi','$foto')";
    $query1 = $db_object->db_query($sql1);
     }
            }
    if ($query){
        echo "<script>window.location.assign('?page=data_ukm&actions=tampil');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
    }
        ?>

        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-file"></span> Data UKM</h3>
                </div>
                <div class="panel-body">
                    <table id="dtskripsi" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th><th>Nama UKM</th><th>Visi</th><th>Misi</th><th>Tujuan</th><th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql2 = "SELECT * FROM tb_data_ukm";
                            $query2 = $db_object->db_query($sql2);

                            $no = 0;
                            while ($data = $db_object->db_fetch_array($query2)) {
                                $no++; //Penambahan satu untuk nilai var nomor
                                ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $data['nama_ukm'] ?></td>
                                    <td><?= $data['visi'] ?></td>
                                    <td><?= $data['misi'] ?></td>
                                    <td><?= $data['tujuan'] ?></td>
                                    <td>
                                        <a href="?page=data_ukm&actions=detail&id=<?= $data['id'] ?>" class="btn btn-info btn-xs">
                                            <span class="fa fa-eye"></span>
                                        </a>
                                        <a href="?page=data_ukm&actions=delete&id=<?= $data['id'] ?>" class="btn btn-danger btn-xs">
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

