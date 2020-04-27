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
           $semua1 = "";
           $semua2 = "";
           $semua3 = "";

           foreach ($_POST["minat"] as $press) {
            $semua1= $semua1. " " .$press;
        }
         foreach ($_POST["bakat"] as $press) {
            $semua2= $semua2. " " .$press;
        }
         foreach ($_POST["hobi"] as $press) {
            $semua3= $semua3. " " .$press;
        }
 ?>
 
 <?php
           
             $success = true;
             $lihat_hasil = false;
             $pesan_gagal = $pesan_sukses = "";
             $nimMhs = $_GET['nim'];
             if($nimMhs <=0){
             $success = false;
             $pesan_gagal = "Gagal melakukan klasifikasi";
           
             }
              if(sudah_klasifikasi($db_object, $nimMhs)){
                        $success = false;
                        $lihat_hasil = true;
                        $pesan_gagal = "Anda sudah melakukan klasifikasi";
             }
                    
            if($nimMhs > 0){

            $sql = "INSERT INTO tb_data_mhs "
                . " (nama, nim, jurusan, prodi, minat, bakat, hobi)"
                . " VALUES "
                . " (\"".$_POST['nama']."\", \"".$_POST['nim']."\", \"".$_POST['jurusan']."\","
                    . " \"".$_POST['prodi']."\",". " \"".$_POST['minat']."\", ". " \"".$_POST['bakat']."\", "
                    . " \"".$_POST['hobi']."\")";
             $db_object->db_query($sql);
            
            $mhs = get_data_mhs($db_object, $nimMhs);
            $hasil = ProsesNaiveBayes($db_object, $mhs['jurusan'], $mhs['prodi'], $mhs['minat'], $mhs['bakat'], $mhs['hobi'],  false);

            $sql_hasil = "INSERT INTO tb_hasil_spk"
                ."(jurusan, prodi, minat, bakat, hobi, kelas_hasil, nilai_wirausaha, nilai_kemanusiaan, nilai_senior, nilai_mapala, nilai_persma, nilai_bahasa, nilai_pramuka)"
                 . " VALUES "
                  . " ($nimMhs, '".$mhs['jurusan']."', ".$mhs['prodi'].", '".$mhs['minat']."', '".$mhs['bakat']."', '".$mhs['hobi']."', "
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
                            $hasilMhs = get_hasil_klasifikasi($db_object, $nimMhs);
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
                    if(sudah_klasifikasi($db_object, $_SESSION['id_spk'])){
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

        <?php } ?>

       

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
                                    <p class="col-md-6"><input type="checkbox" name="minat[0]" value="Seni" /> Seni</p>
                                    <p class="col-md-6"><input type="checkbox" name="minat[1]" value="Olahraga" /> Olahraga</p>
                                    <p class="col-md-6"><input type="checkbox" name="minat[2]" value="Pecinta Alam" /> Pecinta Alam</p>
                                    <p class="col-md-6"><input type="checkbox" name="minat[3]" value="Bela Diri" /> Bela Diri</p>
                                    <p class="col-md-6"><input type="checkbox" name="minat[4]" value="Jurnalistik" /> Jurnalistik</p>
                                    <p class="col-md-6"><input type="checkbox" name="minat[5]" value="Kesehatan" /> Kesehatan</p>
                                    <p class="col-md-6"><input type="checkbox" name="minat[6]" value="Wirausaha" /> Wirausaha</p>
                                    <p class="col-md-6"><input type="checkbox" name="minat[7]" value="Bahasa" /> Bahasa</p>
                                    <p class="col-md-6"><input type="checkbox" name="minat[8]" value="Kemanusiaan" /> Kemanusiaan</p>
                                    <p class="col-md-6"><input type="checkbox" name="minat[9]" value="Pramuka" /> Pramuka</p>
                                </div>
                                <label class="col-md-12"><b>Bakat :  </b></label>
                                    <p class="col-md-6"><input type="checkbox" name="bakat[0]" value="Seni" /> Seni</p>
                                    <p class="col-md-6"><input type="checkbox" name="bakat[1]" value="Olahraga" /> Olahraga</p>
                                    <p class="col-md-6"><input type="checkbox" name="bakat[3]" value="Bahasa" /> Bahasa</p>
                                    <p class="col-md-6"><input type="checkbox" name="bakat[4]" value="Lainnya" /> Lainnya</p>
                                </select>
                                <label class="col-md-12"><b>Hobi :  </b></label>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[0]" value="Menari" /> Menari</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[1]" value="Menyanyi" /> Menyanyi</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[2]" value="Menulis" /> Menulis</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[3]" value="Menggambar" /> Menggambar</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[4]" value="Memasak" /> Memasak</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[5]" value="Fotografi" /> Fotografi</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[6]" value="Sepak bola" /> Sepak Bola</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[7]" value="Bulu tangkis" /> Bulu Tangkis</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[8]" value="Bulu tangkis" /> Basket</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[9]" value="Bulu tangkis" /> Futsal</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[10]" value="Bulu tangkis" /> Volly</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[11]" value="Belajar matematika" /> Belajar Matematika</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[12]" value="Olahraga" /> Olahraga</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[13]" value="Membaca" /> Membaca</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[14]" value="Bermain musik" /> Bermain Musik</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[15]" value="Bermain musik" /> Mendengar Musik</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[16]" value="Nonton" /> Nonton</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[17]" value="Main game" /> Main Game</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[18]" value="Jalan-jalan" /> Jalan-Jalan</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[19]" value="Belajar bahasa asing baru" />   Belajar bahasa asing baru</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[20]" value="Melukis" /> Melukis</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[21]" value="Berenang" /> Berenang</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[22]" value="Naik gunung" /> Naik Gunung</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[23]" value="Naik gunung" /> Travelling</p>
                                    <p class="col-md-6"><input type="checkbox" name="hobi[24]" value="Desain grafis" /> Desain grafis</p>
                             
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


