<?php
if(!isset($_SESSION ['id_spk'])) {
    echo "<script> window.location.assign('../index.php'); </script>";
}

require 'db/database.php';
require 'import/excel_reader2.php';
require 'fungsi.php';
require 'klasifikasi_proses.php';
?>

<div class="container">
    <div class="row">
            <div class="col-md-12">
                <!--UPLOAD EXCEL FORM-->
                <form method="post" enctype="multipart/form-data" action="">
                    <div class="form-group">
                        <div class="input-group">
                            <label>Import data from excel</label>
                            <input name="filetesting" type="file" class="form-control">
                        </div>
                    </div>
                 <div class="col-md-2">
                    <div class="form-group">
                        <input name="submit" type="submit" value="Upload Data" class="btn btn-success">

                        <button name="uji_akurasi" type="submit"  class="btn btn-primary" onclick="">
                            <i class="fa fa-check"></i> Uji Akurasi
                        </button>
                    </div>
                </div>
                </div>
                    
                    </div>
                    
                </form>

                <?php
        
        $db_object = new database();

        if (isset($_POST['submit'])) {

            $target = basename($_FILES['filetesting']['name']) ;
            move_uploaded_file($_FILES['filetesting']['tmp_name'], $target);

            // beri permisi agar file xls dapat di baca
            chmod($_FILES['filetesting']['name'],0777);
            // mengambil isi file xls
            $data = new Spreadsheet_Excel_Reader($_FILES['filetesting']['name'],false);

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
                    $sql1="INSERT INTO tb_data_testing VALUES ('','$nama','$nim','$jurusan','$prodi','$minat','$bakat','$hobi','$label','','','','','','','','')";
     $query1 = $db_object->db_query($sql1);
     }
            }
    if ($query1){
        echo "<script>window.location.assign('?page=testing&actions=tampil');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
    }
        ?>

        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-user-plus"></span> Data Testing</h3>
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
                            $sql2 = "SELECT * FROM tb_data_testing";
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
                            echo "<td><a href='?page=testing&actions=delete&id_testing=".$row['id_testing']."'>"
                                    . "<img src='images/delete.gif'/></a></td>";
                            echo "</tr>";
                            $no++;
                              }
                        ?>
                    </table>
                    <?php
                

                    if(isset($_POST['uji_akurasi'])){
                    //proses menghitung naive bayes
                    $sql_testing = "SELECT * FROM tb_data_testing ";
                    $result = $db_object->db_query($sql_testing);
                    $data=1;
                    while($row = $db_object->db_fetch_array($result)){
                        echo "<center>";
                        echo "<b>Data Uji ke-".$data."</b>";
                        // echo "<br>"
                        // . "<strong>"."Jurusan: "."</strong>".$row['jurusan']." - "
                        //         . "<strong>"."Prodi: "."</strong>".$row['prodi']." - "
                        //         . "<strong>"."Minat: "."</strong>".$row['minat']." - "
                        //         . "<strong>"."Bakat: "."</strong>".$row['bakat']." - "
                        //         . "<strong>"."Hobi: "."</strong>".$row['hobi']." - "
                        //         ;
                        ProsesNaiveBayes($db_object, $row['id'], $row['jurusan'], $row['prodi'], $row['minat'], $row['bakat'], $row['hobi']);
                        $data++;
                        //echo "<br><br>";
                    }
                    
                    //perhitungan akurasi
                    $que = $db_object->db_query("SELECT * FROM tb_data_testing");
                    $jumlah_testing=$db_object->db_num_rows($que);

                    $AB = $BC = $BD = $BE = $BF = $BG = $BH =
                    $BI = $AC = $BJ = $BK = $BL = $BM = $BN =
                    $BO = $BP = $AD = $BQ = $BR = $BS = $BT =
                    $BU = $BV = $BW = $AE = $BX = $BY = $BZ =
                    $CA = $CB = $CC = $CD = $AF = $CE = $CF =
                    $CG = $CH = $CI = $CJ = $CK = $AG = $CL =
                    $CM = $CN = $CO = $CP = $CQ = $CR = $AH = 0;
                    ?>
                    <strong>Hasil Rekomendasi:</strong>
                    <table class='table table-bordered table-striped  table-hover'>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>NIM</th>
                            <th>Jurusan</th>
                            <th>Prodi</th>
                            <th>Minat</th>
                            <th>Bakat</th>
                            <th>Hobi</th>
                            <th>Label Kelas</th>
                            <th>Kelas Hasil</th>
                            <th>Ket</th>
                        </tr>
                    <?php
                    $no = 1;
                    while($row=$db_object->db_fetch_array($que)){
                            $asli=$row['label'];
                            $rekomendasi=$row['kelas_hasil'];
                            if($row['label']==$row['kelas_hasil']){
                $ketepatan="Benar";
                            }else{
                                $ketepatan="Salah";
                            }
                            
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
                            echo "<td>" . $row['kelas_hasil'] . "</td>";
                            echo "<td>" . $ketepatan . "</td>";
                            echo "</tr>";
                            $no++;
                            
                            if($asli=='Wirausaha' & $rekomendasi=='Wirausaha'){
                                    $AB++;
                            }
                             else if($asli=='Wirausaha' & $rekomendasi=='Kemanusiaan (ksr, humaniora)'){
                                    $BC++;
                            }
                             else if($asli=='Wirausaha' & $rekomendasi=='SENIOR (senior, bola, karate, taekwondo)'){
                                    $BD++;
                            }
                             else if($asli=='Wirausaha' & $rekomendasi=='Pecinta Alam (MAPALA)'){
                                    $BE++;
                            }
                             else if($asli=='Wirausaha' & $rekomendasi=='Persma'){
                                    $BF++;
                            }
                             else if($asli=='Wirausaha' & $rekomendasi=='Bahasa'){
                                    $BG++;
                            }
                             else if($asli=='Wirausaha' & $rekomendasi=='Pramuka'){
                                    $BH++;
                            }
                             else if($asli=='Kemanusiaan (ksr, humaniora)' & $rekomendasi=='Wirausaha'){
                                    $BI++;
                            }
                             else if($asli=='Kemanusiaan (ksr, humaniora)' & $rekomendasi=='Kemanusiaan (ksr, humaniora)'){
                                    $AC++;
                            }
                             else if($asli=='Kemanusiaan (ksr, humaniora)' & $rekomendasi=='SENIOR (senior, bola, karate, taekwondo)'){
                                    $BJ++;
                            }
                             else if($asli=='Kemanusiaan (ksr, humaniora)' & $rekomendasi=='Pecinta Alam (MAPALA)'){
                                    $BK++;
                            }
                             else if($asli=='Kemanusiaan (ksr, humaniora)' & $rekomendasi=='Persma'){
                                    $BL++;
                            }
                             else if($asli=='Kemanusiaan (ksr, humaniora)' & $rekomendasi=='Bahasa'){
                                    $BM++;
                            }
                             else if($asli=='Kemanusiaan (ksr, humaniora)' & $rekomendasi=='Pramuka'){
                                    $BN++;
                            }
                             else if($asli=='SENIOR (senior, bola, karate, taekwondo)' & $rekomendasi=='Wirausaha'){
                                    $BO++;
                            }
                             else if($asli=='SENIOR (senior, bola, karate, taekwondo)' & $rekomendasi=='Kemanusiaan (ksr, humaniora)'){
                                    $BP++;
                            }
                             else if($asli=='SENIOR (senior, bola, karate, taekwondo)' & $rekomendasi=='SENIOR (senior, bola, karate, taekwondo) (ksr, humaniora)'){
                                    $AD++;
                            }
                             else if($asli=='SENIOR (senior, bola, karate, taekwondo)' & $rekomendasi=='Pecinta Alam (MAPALA)'){
                                    $BQ++;
                            }
                             else if($asli=='SENIOR (senior, bola, karate, taekwondo)' & $rekomendasi=='Persma'){
                                    $BR++;
                            }
                             else if($asli=='SENIOR (senior, bola, karate, taekwondo)' & $rekomendasi=='Bahasa'){
                                    $BS++;
                            }
                             else if($asli=='SENIOR (senior, bola, karate, taekwondo)' & $rekomendasi=='Pramuka'){
                                    $BT++;
                            }
                            else if($asli=='Pecinta Alam (MAPALA)' & $rekomendasi=='Wirausaha'){
                                    $BU++;
                            }
                             else if($asli=='Pecinta Alam (MAPALA)' & $rekomendasi=='Kemanusiaan (ksr, humaniora)'){
                                    $BV++;
                            }
                             else if($asli=='Pecinta Alam (MAPALA)' & $rekomendasi=='SENIOR (senior, bola, karate, taekwondo)'){
                                    $BW++;
                            }
                             else if($asli=='Pecinta Alam (MAPALA)' & $rekomendasi=='Pecinta Alam (MAPALA)'){
                                    $AE++;
                            }
                             else if($asli=='Pecinta Alam (MAPALA)' & $rekomendasi=='Persma'){
                                    $BX++;
                            }
                             else if($asli=='Pecinta Alam (MAPALA)' & $rekomendasi=='Bahasa'){
                                    $BY++;
                            }
                             else if($asli=='Pecinta Alam (MAPALA)' & $rekomendasi=='Pramuka'){
                                    $BZ++;
                            }
                             else if($asli=='Persma' & $rekomendasi=='Wirausaha'){
                                    $CA++;
                            }
                             else if($asli=='Persma' & $rekomendasi=='Kemanusiaan (ksr, humaniora)'){
                                    $CB++;
                            }
                             else if($asli=='Persma' & $rekomendasi=='SENIOR (senior, bola, karate, taekwondo)'){
                                    $CC++;
                            }
                             else if($asli=='Persma' & $rekomendasi=='Pecinta Alam (MAPALA)'){
                                    $CD++;
                            }
                             else if($asli=='Persma' & $rekomendasi=='Persma'){
                                    $AF++;
                            }
                             else if($asli=='Persma' & $rekomendasi=='Bahasa'){
                                    $CE++;
                            }
                             else if($asli=='Persma' & $rekomendasi=='Pramuka'){
                                    $CF++;
                            }
                             else if($asli=='Bahasa' & $rekomendasi=='Wirausaha'){
                                    $CG++;
                            }
                             else if($asli=='Bahasa' & $rekomendasi=='Kemanusiaan (ksr, humaniora)'){
                                    $CH++;
                            }
                             else if($asli=='Bahasa' & $rekomendasi=='SENIOR (senior, bola, karate, taekwondo)'){
                                    $CI++;
                            }
                             else if($asli=='Bahasa' & $rekomendasi=='Pecinta Alam (MAPALA)'){
                                    $CJ++;
                            }
                             else if($asli=='Bahasa' & $rekomendasi=='Persma'){
                                    $CK++;
                            }
                             else if($asli=='Bahasa' & $rekomendasi=='Bahasa'){
                                    $AG++;
                            }
                             else if($asli=='Bahasa' & $rekomendasi=='Pramuka'){
                                    $CL++;
                            }
                             else if($asli=='Pramuka' & $rekomendasi=='Wirausaha'){
                                    $CM++;
                            }
                             else if($asli=='Pramuka' & $rekomendasi=='Kemanusiaan (ksr, humaniora)'){
                                    $CN++;
                            }
                             else if($asli=='Pramuka' & $rekomendasi=='SENIOR (senior, bola, karate, taekwondo)'){
                                    $CO++;
                            }
                             else if($asli=='Pramuka' & $rekomendasi=='Pecinta Alam (MAPALA)'){
                                    $CP++;
                            }
                             else if($asli=='Pramuka' & $rekomendasi=='Persma'){
                                    $CQ++;
                            }
                             else if($asli=='Pramuka' & $rekomendasi=='Bahasa'){
                                    $CR++;
                            }
                             else if($asli=='Pramuka' & $rekomendasi=='Pramuka'){
                                    $AH++;
                            }
                            else if($rekomendasi==''){
                                    $kosong++;
                            }
                    }
                    ?>
                    </table>
                    <?php
                    $tepat=($AB+$AC+$AD+$AE+$AF+$AG+$AH);
                    $tidak_tepat=($BC+$BD+$BE+$BF+$BG+$BH+$BI+$BJ+$BK+$BL+$BM+$BN+$BO+$BP+$BQ+$BR+$BS+$BT+$BU+$BV+$BW+$BX+$BY+$BZ+$CA+$CB+$CC+$CD+$CE+$CF+$CG+$CH+$CI+$CJ+$CK+$CL+$CM+$CN+$CO+$CP+$CQ+$CR+$kosong);
                    $akurasi=($tepat/$jumlah_testing)*100;
                    $laju_error=($tidak_tepat/$jumlah_testing)*100;

                    $akurasi = round($akurasi,2);   
                    $laju_error = round($laju_error,2);
                    $sensitivitas = round($sensitivitas,2); 
                    $spesifisitas = round($spesifisitas,2); 


                    echo "<br><br>";
                    echo "<center><h4>";
                    echo "Jumlah rekomendasi: $jumlah_testing<br>";
                    echo "Jumlah tepat: $tepat<br>";
                    echo "Jumlah tidak tepat: $tidak_tepat<br>";
                    if($kosong!=0){ echo "Jumlah data yang prediksinya kosong: $kosong<br></h4>"; }
                    echo "<h2>AKURASI = $akurasi %<br>";
                    echo "LAJU ERROR = $laju_error %<br></h2>"; 
                        ?>
                        </tbody>

                        
                    </table>
                  
                </div>
            </div>

        </div>
    </div>
</div>
   <?php }?>

