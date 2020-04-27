<?php 

require 'db/database.php'; 
require 'fungsi.php';
require 'klasifikasi_proses.php';
?>

<div class="container">

    <div class="row">
        <!--colomn kedua-->
        <div class="col-sm-7 col-xs-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Rekomendasi UKM</h3>
                </div>
                <div class="panel-body">


                <?php
        
        $db_object = new database();

        if (isset($_POST['submit'])) {
           $minat = $_POST["minat"];
           $bakat = $_POST["bakat"];
           $hobi = $_POST["hobi"];
           $nama = $_POST["nama"];
           $nim = $_POST["nim"];
           $jurusan = $_POST["jurusan"];
           $prodi = $_POST["prodi"];
           $minat2 = "";
           $bakat2 = "";
           $hobi2 = "";

           foreach ($minat as $minat1) {
            $minat2= $minat1. " " .$minat2;
        }
         foreach ($bakat as $bakat1) {
            $bakat2= $bakat1. " " .$bakat2;
        }
         foreach ($hobi as $hobi1) {
            $hobi2= $hobi1. " " .$hobi2;
        }
     
        $minat2  = substr($minat2, 0, 100);
        $bakat2  = substr($bakat2, 0, 100);
        $hobi2  = substr($hobi2, 0, 100);
        $sql = "INSERT INTO tb_data_mhs (nama, nim, jurusan, prodi, minat, bakat, hobi) VALUES ('$nama','$nim', '$jurusan', '$prodi', '$minat2', '$bakat2', '$hobi2')";
             $db_object->db_query($sql);
            
             $success = true;
             $lihat_hasil = false;
             $pesan_gagal = $pesan_sukses = "";
             
              if(sudah_klasifikasi($db_object)){
                        $success = false;
                        $lihat_hasil = true;
                        $pesan_gagal = "Anda sudah melakukan klasifikasi";
             }
                    

           
            $mhs = get_data_mhs($db_object);
            $hasil = ProsesNaiveBayes($db_object, $mhs['id'], $mhs['jurusan'], $mhs['prodi'], $mhs['minat'], $mhs['bakat'], $mhs['hobi'],  false);

            $sql_hasil = "INSERT INTO tb_hasil_spk"
                ."(jurusan, prodi, minat, bakat, hobi, kelas_hasil, nilai_wirausaha, nilai_kemanusiaan, nilai_senior, nilai_mapala, nilai_persma, nilai_bahasa, nilai_pramuka)"
                 . " VALUES "
                  . " ('".$mhs['jurusan']."', ".$mhs['prodi'].", '".$mhs['minat']."', '".$mhs['bakat']."', '".$mhs['hobi']."', "
                  . "'".$hasil[0]."', '".$hasil[1]."', '".$hasil[2]."', '".$hasil[3]."', '".$hasil[4]."', '".$hasil[5]."', '".$hasil[6]."', '".$hasil[7]."')";
           $db_object->db_query($sql_hasil);
                        

            $sql_data_testing = "INSERT INTO tb_data_testing"
                . "(nama, nim, jurusan, prodi, minat, bakat, hobi, label)"
                 . " VALUES "
                 . " ($nimMhs, '".$mhs['nama']."', '".$mhs['nim']."', '".$mhs['jurusan']."', ".$mhs['prodi'].", '".$mhs['minat']."', '".$mhs['bakat']."', '".$mhs['hobi']."', "
                  . "'".$hasil[0]."')";
            $db_object->db_query($sql_data_testing);

        }
       


                    if ($success) {
                        echo "Rekomendasi UKM Untuk Anda: ".$hasil[0];
                        echo "<br>";
                        echo "Probabilitas:";
                        echo "<br>";
                        echo "Nilai Wirausaha:".$hasil[1];
                        echo "<br>";
                        echo "Nilai Kemanusiaan (ksr, humaniora):".$hasil[2];
                        echo "<br>";
                        echo "Nilai SENIOR (senior, bola, karate, taekwondo):".$hasil[3];
                        echo "<br>";
                        echo "Nilai Pecinta Alam (MAPALA):".$hasil[4];
                        echo "<br>";
                        echo "Nilai Persma:".$hasil[5];
                        echo "<br>";
                        echo "Nilai Bahasa:".$hasil[6];
                        echo "<br>";
                        echo "Nilai Pramuka:".$hasil[7];
                    } 
                    else {
                        display_error($pesan_gagal);
                        if($lihat_hasil){
                            $hasilMhs = get_hasil_klasifikasi($db_object);
                            echo "Klasifikasi karakteristik kepribadian Anda: ".$hasilMhs['kelas_hasil'];
                            echo "<br>";
                            echo "Probabilitas:";
                            echo "<br>";
                            echo "Nilai Wirausaha:".$hasilMhs['nilai_wirausaha'];
                            echo "<br>";
                            echo "Nilai Kemanusiaan (ksr, humaniora):".$hasilMhs['nilai_kemanusiaan'];
                            echo "<br>";
                            echo "Nilai SENIOR (senior, bola, karate, taekwondo):".$hasilMhs['nilai_senior'];
                            echo "<br>";
                            echo "Nilai Pecinta Alam (MAPALA):".$hasilMhs['nilai_mapala'];
                            echo "<br>";
                            echo "Nilai Persma:".$hasilMhs['nilai_persma'];
                            echo "<br>";
                            echo "Nilai Bahasa:".$hasilMhs['nilai_bahasa'];
                            echo "<br>";
                            echo "Nilai Pramuka:".$hasilMhs['nilai_pramuka'];
                        }
                   }
                    if (!isset($_POST['submit'])) {
                    if(sudah_klasifikasi($db_object)){
                        $hasilMhs = get_hasil_klasifikasi($db_object, $_SESSION['id_spk']);
                            echo "Klasifikasi karakteristik kepribadian Anda: ".$hasilMhs['kelas_hasil'];
                            echo "<br>";
                            echo "Probabilitas:";
                            echo "<br>";
                            echo "Nilai Wirausaha:".$hasilMhs['nilai_wirausaha'];
                            echo "<br>";
                            echo "Nilai Kemanusiaan (ksr, humaniora):".$hasilMhs['nilai_kemanusiaan'];
                            echo "<br>";
                            echo "Nilai SENIOR (senior, bola, karate, taekwondo):".$hasilMhs['nilai_senior'];
                            echo "<br>";
                            echo "Nilai Pecinta Alam (MAPALA):".$hasilMhs['nilai_mapala'];
                            echo "<br>";
                            echo "Nilai Persma:".$hasilMhs['nilai_persma'];
                            echo "<br>";
                            echo "Nilai Bahasa:".$hasilMhs['nilai_bahasa'];
                            echo "<br>";
                            echo "Nilai Pramuka:".$hasilMhs['nilai_pramuka'];
                        }
                    } 



        ?>

       

                <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="input-group" style="width: 70%;">
                                <label><b>NIM : </b></label>
                                <input type="text" class="form-control" name="nim" />
                            </div>
                            <div class="input-group" style="width: 70%;">
                                <label><b>Nama Lengkap :  </b></label>
                                <input type="text" class="form-control" name="nama" />
                            </div>
                            <div class="input-group" style="width: 70%;">
                                <label><b>Program Studi :  </b></label>
                                <input type="text" class="form-control" name="prodi" />
                            </div>
                                <div class="input-group" style="width: 70%;">
                                <label><b>Jurusan :  </b></label>
                                <input type="text" class="form-control" name="jurusan" />
                            </div>
                            <br>
                                <div class="input-group" style="width: 100%;">
                                <label class="col-md-12"><b>Minat :  </b></label>
                                    <p class="col-md-6"><input type="checkbox" name="minat[]" value="Seni" /> Seni</p>
                                    <p class="col-md-6"><input type="checkbox" name="minat[]" value="Olahraga" /> Olahraga</p>
                                    <p class="col-md-6"><input type="checkbox" name="minat[]" value="Pecinta Alam" /> Pecinta Alam</p>
                                    <p class="col-md-6"><input type="checkbox" name="minat[]" value="Bela Diri" /> Bela Diri</p>
                                    <p class="col-md-6"><input type="checkbox" name="minat[]" value="Jurnalistik" /> Jurnalistik</p>
                                    <p class="col-md-6"><input type="checkbox" name="minat[]" value="Kesehatan" /> Kesehatan</p>
                                    <p class="col-md-6"><input type="checkbox" name="minat[]" value="Wirausaha" /> Wirausaha</p>
                                    <p class="col-md-6"><input type="checkbox" name="minat[]" value="Bahasa" /> Bahasa</p>
                                    <p class="col-md-6"><input type="checkbox" name="minat[]" value="Kemanusiaan" /> Kemanusiaan</p>
                                    <p class="col-md-6"><input type="checkbox" name="minat[]" value="Pramuka" /> Pramuka</p>
                                </div>
                                <label class="col-md-12"><b>Bakat :  </b></label>
                                    <p class="col-md-6"><input type="checkbox" name="bakat[]" value="Seni" /> Seni</p>
                                    <p class="col-md-6"><input type="checkbox" name="bakat[]" value="Olahraga" /> Olahraga</p>
                                    <p class="col-md-6"><input type="checkbox" name="bakat[]" value="Bahasa" /> Bahasa</p>
                                    <p class="col-md-6"><input type="checkbox" name="bakat[]" value="Lainnya" /> Lainnya</p>
                                </select>
                                <label class="col-md-12"><b>Hobi :  </b></label>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[]" value="Menari" /> Menari</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[]" value="Menyanyi" /> Menyanyi</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[]" value="Menulis" /> Menulis</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[]" value="Menggambar" /> Menggambar</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[]" value="Memasak" /> Memasak</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[]" value="Fotografi" /> Fotografi</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[]" value="Sepak bola" /> Sepak Bola</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[]" value="Bulu tangkis" /> Bulu Tangkis</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[]" value="Bulu tangkis" /> Basket</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[]" value="Bulu tangkis" /> Futsal</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[]" value="Bulu tangkis" /> Volly</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[]" value="Belajar matematika" /> Belajar Matematika</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[]" value="Olahraga" /> Olahraga</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[]" value="Membaca" /> Membaca</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[]" value="Bermain musik" /> Bermain Musik</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[]" value="Bermain musik" /> Mendengar Musik</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[]" value="Nonton" /> Nonton</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[]" value="Main game" /> Main Game</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[]" value="Jalan-jalan" /> Jalan-Jalan</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[]" value="Belajar bahasa asing baru" />   Belajar bahasa asing baru</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[]" value="Melukis" /> Melukis</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[]" value="Berenang" /> Berenang</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[]" value="Naik gunung" /> Naik Gunung</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[]" value="Naik gunung" /> Travelling</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[]" value="Desain grafis" /> Desain grafis</p>
                             
                                <br>
                                <div class="form-group">
                                    <input name="submit" type="submit" value="Cek rekomendasi" class="btn btn-primary">
                                </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
      
        <div class="col-sm-5 col-xs-12">
                
                    <?php if(isset($_GET['error']) ) {?>
            <div class="alert alert-danger">Maaf! Login Gagal, Coba Lagi..</div>
            <?php }?>

            <?php if (isset($_SESSION['username'])) { ?>
            <div class="alert alert-info">
                <strong>Welcome <?=$_SESSION['nama']?></strong>
            </div>
            <?php
           } else { ?>

          <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Masuk Ke Sistem</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="proses_login.php" method="post">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" name="user" class="form-control input-sm"
                                   placeholder="Username" required="" autocomplete="off"/>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="password" name="pwd" class="form-control input-sm"
                                   placeholder="Password" required="" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" name="login" value="login"
                                        class="btn btn-primary btn-block"><span class="fa fa-unlock-alt"></span>
                                    Login Sistem
                                </button>
                            </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<?php } ?>
        <!--akhir colomn kedua-->
        
    </div>
</div>


