<?php
require 'db/database.php';
?>

	<div class="container">
    <div class="row">
            <div class="col-md-12">
			<form>
                 <div class="col-md-2">
                    <div class="form-group">
                        <a href="?page=testing&actions=tampil"class="btn btn-primary">Kembali</a>
                    </div>
                </div>

            </form>

		<?php         
			$db_object = new database();
                    echo '<marquee scrolldelay="100" style="font-family:arial; font-size:20px; color:#000000;"><b>Hasil Perhitungan Akurasi</marquee>';
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
                    <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-user-plus"></span> Data Testing</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th><th>Jurusan</th><th>Prodi</th><th>Minat</th><th>Bakat</th><th>Hobi</th><th>Label Kelas</th><th>Kelas Prediksi</th><th>Ket</th>
                            </tr>
                        </thead>
                    <?php
                    $no = 1;
                    while($row=$db_object->db_fetch_array($que)){
                            $asli=$row['label'];
                            $hasil=$row['kelas_hasil'];
                            if($row['label']==$row['kelas_hasil']){
                $ketepatan="Tepat";
                            }else{
                                $ketepatan="Tidak Tepat";
                            }
                            
                            echo "<tr>";
                            echo "<td>" . $no . "</td>";
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
                            
                            if($asli=='Wirausaha' & $hasil=='Wirausaha'){
                                    $AB++;
                            }
                             else if($asli=='Wirausaha' & $hasil=='Kemanusiaan (ksr, humaniora)'){
                                    $BC++;
                            }
                             else if($asli=='Wirausaha' & $hasil=='SENIOR (senior, bola, karate, taekwondo)'){
                                    $BD++;
                            }
                             else if($asli=='Wirausaha' & $hasil=='Pecinta Alam (MAPALA)'){
                                    $BE++;
                            }
                             else if($asli=='Wirausaha' & $hasil=='Persma'){
                                    $BF++;
                            }
                             else if($asli=='Wirausaha' & $hasil=='Bahasa'){
                                    $BG++;
                            }
                             else if($asli=='Wirausaha' & $hasil=='Pramuka'){
                                    $BH++;
                            }
                             else if($asli=='Kemanusiaan (ksr, humaniora)' & $hasil=='Wirausaha'){
                                    $BI++;
                            }
                             else if($asli=='Kemanusiaan (ksr, humaniora)' & $hasil=='Kemanusiaan (ksr, humaniora)'){
                                    $AC++;
                            }
                             else if($asli=='Kemanusiaan (ksr, humaniora)' & $hasil=='SENIOR (senior, bola, karate, taekwondo)'){
                                    $BJ++;
                            }
                             else if($asli=='Kemanusiaan (ksr, humaniora)' & $hasil=='Pecinta Alam (MAPALA)'){
                                    $BK++;
                            }
                             else if($asli=='Kemanusiaan (ksr, humaniora)' & $hasil=='Persma'){
                                    $BL++;
                            }
                             else if($asli=='Kemanusiaan (ksr, humaniora)' & $hasil=='Bahasa'){
                                    $BM++;
                            }
                             else if($asli=='Kemanusiaan (ksr, humaniora)' & $hasil=='Pramuka'){
                                    $BN++;
                            }
                             else if($asli=='SENIOR (senior, bola, karate, taekwondo)' & $hasil=='Wirausaha'){
                                    $BO++;
                            }
                             else if($asli=='SENIOR (senior, bola, karate, taekwondo)' & $hasil=='Kemanusiaan (ksr, humaniora)'){
                                    $BP++;
                            }
                             else if($asli=='SENIOR (senior, bola, karate, taekwondo)' & $hasil=='SENIOR (senior, bola, karate, taekwondo)'){
                                    $AD++;
                            }
                             else if($asli=='SENIOR (senior, bola, karate, taekwondo)' & $hasil=='Pecinta Alam (MAPALA)'){
                                    $BQ++;
                            }
                             else if($asli=='SENIOR (senior, bola, karate, taekwondo)' & $hasil=='Persma'){
                                    $BR++;
                            }
                             else if($asli=='SENIOR (senior, bola, karate, taekwondo)' & $hasil=='Bahasa'){
                                    $BS++;
                            }
                             else if($asli=='SENIOR (senior, bola, karate, taekwondo)' & $hasil=='Pramuka'){
                                    $BT++;
                            }
                            else if($asli=='Pecinta Alam (MAPALA)' & $hasil=='Wirausaha'){
                                    $BU++;
                            }
                             else if($asli=='Pecinta Alam (MAPALA)' & $hasil=='Kemanusiaan (ksr, humaniora)'){
                                    $BV++;
                            }
                             else if($asli=='Pecinta Alam (MAPALA)' & $hasil=='SENIOR (senior, bola, karate, taekwondo)'){
                                    $BW++;
                            }
                             else if($asli=='Pecinta Alam (MAPALA)' & $hasil=='Pecinta Alam (MAPALA)'){
                                    $AE++;
                            }
                             else if($asli=='Pecinta Alam (MAPALA)' & $hasil=='Persma'){
                                    $BX++;
                            }
                             else if($asli=='Pecinta Alam (MAPALA)' & $hasil=='Bahasa'){
                                    $BY++;
                            }
                             else if($asli=='Pecinta Alam (MAPALA)' & $hasil=='Pramuka'){
                                    $BZ++;
                            }
                             else if($asli=='Persma' & $hasil=='Wirausaha'){
                                    $CA++;
                            }
                             else if($asli=='Persma' & $hasil=='Kemanusiaan (ksr, humaniora)'){
                                    $CB++;
                            }
                             else if($asli=='Persma' & $hasil=='SENIOR (senior, bola, karate, taekwondo)'){
                                    $CC++;
                            }
                             else if($asli=='Persma' & $hasil=='Pecinta Alam (MAPALA)'){
                                    $CD++;
                            }
                             else if($asli=='Persma' & $hasil=='Persma'){
                                    $AF++;
                            }
                             else if($asli=='Persma' & $hasil=='Bahasa'){
                                    $CE++;
                            }
                             else if($asli=='Persma' & $hasil=='Pramuka'){
                                    $CF++;
                            }
                             else if($asli=='Bahasa' & $hasil=='Wirausaha'){
                                    $CG++;
                            }
                             else if($asli=='Bahasa' & $hasil=='Kemanusiaan (ksr, humaniora)'){
                                    $CH++;
                            }
                             else if($asli=='Bahasa' & $hasil=='SENIOR (senior, bola, karate, taekwondo)'){
                                    $CI++;
                            }
                             else if($asli=='Bahasa' & $hasil=='Pecinta Alam (MAPALA)'){
                                    $CJ++;
                            }
                             else if($asli=='Bahasa' & $hasil=='Persma'){
                                    $CK++;
                            }
                             else if($asli=='Bahasa' & $hasil=='Bahasa'){
                                    $AG++;
                            }
                             else if($asli=='Bahasa' & $hasil=='Pramuka'){
                                    $CL++;
                            }
                             else if($asli=='Pramuka' & $hasil=='Wirausaha'){
                                    $CM++;
                            }
                             else if($asli=='Pramuka' & $hasil=='Kemanusiaan (ksr, humaniora)'){
                                    $CN++;
                            }
                             else if($asli=='Pramuka' & $hasil=='SENIOR (senior, bola, karate, taekwondo)'){
                                    $CO++;
                            }
                             else if($asli=='Pramuka' & $hasil=='Pecinta Alam (MAPALA)'){
                                    $CP++;
                            }
                             else if($asli=='Pramuka' & $hasil=='Persma'){
                                    $CQ++;
                            }
                             else if($asli=='Pramuka' & $hasil=='Bahasa'){
                                    $CR++;
                            }
                             else if($asli=='Pramuka' & $hasil=='Pramuka'){
                                    $AH++;
                            }
                    }
                    ?>
                    </table>
                    <?php
                    $tepat=($AB+$AC+$AD+$AE+$AF+$AG+$AH);
                    $tidak_tepat=($BC+$BD+$BE+$BF+$BG+$BH+$BI+$BJ+$BK+$BL+$BM+$BN+$BO+$BP+$BQ+$BR+$BS+$BT+$BU+$BV+$BW+$BX+$BY+$BZ+$CA+$CB+$CC+$CD+$CE+$CF+$CG+$CH+$CI+$CJ+$CK+$CL+$CM+$CN+$CO+$CP+$CQ+$CR);
                    $akurasi=($tepat/$jumlah_testing)*100;
                    $laju_error=($tidak_tepat/$jumlah_testing)*100;

                    $akurasi = round($akurasi,2);   
                    $laju_error = round($laju_error,2);


                    echo "<br><br>";
                    echo "<center><h4>";
                    echo "Jumlah data: $jumlah_testing<br>";
                    echo "Jumlah tepat: $tepat<br>";
                    echo "Jumlah tidak tepat: $tidak_tepat<br>";
                    echo "<h2>AKURASI = $akurasi %<br>";
                    echo "LAJU ERROR = $laju_error %<br></h2>"; 
                        ?>
                        </tbody>

                        
                    </table>
