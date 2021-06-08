<?php
require 'db/database.php';
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
           <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Data Testing</h3>
                </div>
                <div class="panel-body">
             
                <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="ruang_arsip" class="col-sm-3 control-label">Jurusan</label>
                               <div class="col-sm-5 col-xs-9">
                                <select name="jurusan" class="form-control selBox" required="required">
                                    <p class="col-md-6"><option value="" disabled selected>-- Pilih --</option></p>
                                    <p class="col-md-6"><option value="Administrasi Niaga">Administrasi Niaga</option></p>
                                    <p class="col-md-6"><option value="Akuntansi">Akuntansi</option></p>
                                    <p class="col-md-6"><option value="Teknik Elektro">Teknik Elektro</option></p>
                                    <p class="col-md-6"><option value="Teknik Kimia">Teknik Kimia</option></p>
                                    <p class="col-md-6"><option value="Teknik Mesin">Teknik Mesin</option></p>
                                    <p class="col-md-6"><option value="Teknik Sipil">Teknik Sipil</option></p>
                                </select> 
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="ruang_arsip" class="col-sm-3 control-label">Program Studi</label>
                               <div class="col-sm-5 col-xs-9">
                                <select name="prodi" class="form-control selBox" required="required">
                                    <p class="col-md-6"><option value="" disabled selected>-- Pilih --</option></p>
                                    <p class="col-md-6"><option value="Administrasi Bisnis">Administrasi Bisnis</option></p>
                                    <p class="col-md-6"><option value="Akuntansi">Akuntansi</option></p>
                                    <p class="col-md-6"><option value="Analisis Kimia">Analisis Kimia</option></p>
                                    <p class="col-md-6"><option value="Teknik Elektronika">Teknik Elektronika</option></p>
                                    <p class="col-md-6"><option value="Teknik Kimia">Teknik Kimia</option></p>
                                    <p class="col-md-6"><option value="Teknik Kimia Mineral">Teknik Kimia Mineral</option></p>
                                    <p class="col-md-6"><option value="Teknik Konstruksi">Teknik Konstruksi</option></p>
                                    <p class="col-md-6"><option value="Teknik Konstruksi Gedung">Teknik Konstruksi Gedung</option></p>
                                    <p class="col-md-6"><option value="Teknik Konstruksi Jalan dan Jembatan">Teknik Konstruksi Jalan dan Jembatan</option></p>
                                    <p class="col-md-6"><option value="Teknik Konversi Energi">Teknik Konversi Energi</option></p>
                                    <p class="col-md-6"><option value="Teknik Listrik">Teknik Listrik</option></p>
                                    <p class="col-md-6"><option value="Teknik Mekatronika">Teknik Mekatronika</option></p>
                                    <p class="col-md-6"><option value="Teknik Mesin">Teknik Mesin</option></p>
                                    <p class="col-md-6"><option value="Teknik Otomotif">Teknik Otomotif</option></p>
                                    <p class="col-md-6"><option value="Teknik Perawatan Alat Berat">Teknik Perawatan Alat Berat</option></p>
                                    <p class="col-md-6"><option value="Teknik Sipil">Teknik Sipil</option></p>
                                    <p class="col-md-6"><option value="Teknik Telekomunikasi">Teknik Telekomunikasi</option></p>
                                    <p class="col-md-6"><option value="Akuntansi Manajerial">Akuntansi Manajerial</option></p>
                                    <p class="col-md-6"><option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option></p>
                                    <p class="col-md-6"><option value="Teknik Manufaktur">Teknik Manufaktur</option></p>
                                    <p class="col-md-6"><option value="Teknik Multimedia dan Jaringan">Teknik Multimedia dan Jaringan</option></p>
                                    <p class="col-md-6"><option value="Teknik Pembangkit Energi">Teknik Pembangkit Energi</option></p>
                                    <p class="col-md-6"><option value="Teknologi Kimia Industri">Teknologi Kimia Industri</option></p>
                                </select> 
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="ruang_arsip" class="col-sm-3 control-label">Minat</label>
                               <div class="col-sm-5 col-xs-9">
                                <select name="minat" class="form-control selBox" required="required">
                                    <p class="col-md-6"><option value="" disabled selected>-- Pilih --</option></p>
                                    <p class="col-md-6"><option value="Seni">Seni</option></p>
                                    <p class="col-md-6"><option value="Olahraga">Olahraga</option></p>
                                    <p class="col-md-6"><option value="Pecinta Alam">Pecinta Alam</option></p>
                                    <p class="col-md-6"><option value="Bela Diri">Bela Diri</option></p>
                                    <p class="col-md-6"><option value="Jurnalistik">Jurnalistik</option></p>
                                    <p class="col-md-6"><option value="Kesehatan">Kesehatan</option></p>
                                    <p class="col-md-6"><option value="Wirausaha">Wirausaha</option></p>
                                    <p class="col-md-6"><option value="Bahasa">Bahasa</option></p>
                                    <p class="col-md-6"><option value="Kemanusiaan">Kemanusiaan</option></p>
                                    <p class="col-md-6"><option value="Pramuka">Pramuka</option></p>
                                </select> 
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="ruang_arsip" class="col-sm-3 control-label">Bakat</label>
                               <div class="col-sm-5 col-xs-9">
                                <select name="bakat" class="form-control selBox" required="required">
                                    <p class="col-md-6"><option value="" disabled selected>-- Pilih --</option></p>
                                    <p class="col-md-6"><option value="Seni">Seni</option></p>
                                    <p class="col-md-6"><option value="Bahasa">Bahasa</option></p>
                                    <p class="col-md-6"><option value="Olahraga">Olahraga</option></p>
                                    <p class="col-md-6"><option value="Lainnya">Lainnya</option></p>
                                </select> 
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="ruang_arsip" class="col-sm-3 control-label">Hobi</label>
                               <div class="col-sm-5 col-xs-9">
                                <select name="hobi" class="form-control selBox" required="required">
                                    <p class="col-md-6"><option value="" />-- Pilih --</p>
                                    <p class="col-md-6"><option value="Menari" /> Menari</p>
                                    <p class="col-md-6"><option value="Menyanyi" /> Menyanyi</p>
                                    <p class="col-md-6"><option value="Menulis" /> Menulis</p>
                                    <p class="col-md-6"><option value="Menggambar" /> Menggambar</p>
                                    <p class="col-md-6"><option value="Memasak" /> Memasak</p>
                                    <p class="col-md-6"><option value="Fotografi" /> Fotografi</p>
                                    <p class="col-md-6"><option value="Sepak Bola" /> Sepak Bola</p>
                                    <p class="col-md-6"><option value="Bulu Tangkis" /> Bulu Tangkis</p>
                                    <p class="col-md-6"><option value="Basket" /> Basket</p>
                                    <p class="col-md-6"><option value="Futsal" /> Futsal</p>
                                    <p class="col-md-6"><option value="Volly" /> Volly</p>
                                    <p class="col-md-6"><option value="Belajar Matematika" /> Belajar Matematika</p>
                                    <p class="col-md-6"><option value="Olahraga" /> Olahraga</p>
                                    <p class="col-md-6"><option value="Membaca" /> Membaca</p>
                                    <p class="col-md-6"><option value="Bermain Musik" /> Bermain Musik</p>
                                    <p class="col-md-6"><option value="Mendengar Musik" /> Mendengar Musik</p>
                                    <p class="col-md-6"><option value="Nonton" /> Nonton</p>
                                    <p class="col-md-6"><option value="Main Game" /> Main Game</p>
                                    <p class="col-md-6"><option value="Jalan-Jalan" /> Jalan-Jalan</p>
                                    <p class="col-md-6"><option value="Belajar bahasa asing baru" /> Belajar bahasa asing baru</p>
                                    <p class="col-md-6"><option value="Melukis" /> Melukis</p>
                                    <p class="col-md-6"><option value="Berenang" /> Berenang</p>
                                    <p class="col-md-6"><option value="Naik Gunung" /> Naik Gunung</p>
                                    <p class="col-md-6"><option value="Travelling" /> Travelling</p>
                                    <p class="col-md-6"><option value="Desain grafis" /> Desain grafis</p>
                                </select>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="label" class="col-sm-3 control-label">Kelas Asli</label>
                            <div class="col-sm-5">
                                <input type="text" name="label" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-4">
                                <button type="submit" name="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Data</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=testing&actions=tampil" class="btn btn-primary btn-sm">
                        Kembali
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
<?php
$db_object = new database();
 if(isset($_POST['submit'])){
  echo '<marquee scrolldelay="100" style="font-family:arial; font-size:20px; color:#000000;" bgcolor="CFD8DC"><b>Hasil Perhitungan Klasifikasi</marquee> ';


echo '<table align="left" style="background-color:#FAFAFA;">
  <tr>
  </tr>
    <tr>
      <td style="color:#000000;">';

 $jurusan = $_POST['jurusan'];
 $prodi = $_POST['prodi'];
 $minat = $_POST['minat'];
 $bakat = $_POST['bakat'];
 $hobi = $_POST['hobi'];
 $label = $_POST['label'];

// // label
 
 $total1 = "SELECT sum(total) as jumlah FROM (SELECT COUNT(id) AS total from tb_data_training) t";
 $query = $db_object->db_query($total1);
 while ($row = $db_object->db_fetch_array($query)) {
 $total = $row['jumlah'];} 

 // label ukm
 $sqlBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label = 'Bahasa'";
 $queryBahasa = $db_object->db_query($sqlBahasa);
 while ($row = $db_object->db_fetch_array($queryBahasa)) {
 $dataBahasa = $row['total'];}

 $sqlKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label = 'Kemanusiaan (ksr, humaniora)'";
 $queryKemanusiaan = $db_object->db_query($sqlKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryKemanusiaan)) {
 $dataKemanusiaan = $row['total'];}

 $sqlMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label = 'Pecinta Alam (MAPALA)'";
 $queryMapala = $db_object->db_query($sqlMapala);
 while ($row = $db_object->db_fetch_array($queryMapala)) {
 $dataMapala = $row['total'];}

 $sqlPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label = 'Persma'";
 $queryPersma = $db_object->db_query($sqlPersma);
 while ($row = $db_object->db_fetch_array($queryPersma)) {
 $dataPersma = $row['total'];}

 $sqlPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label = 'Pramuka'";
 $queryPramuka = $db_object->db_query($sqlPramuka);
 while ($row = $db_object->db_fetch_array($queryPramuka)) {
 $dataPramuka = $row['total'];}

 $sqlSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label = 'SENIOR (senior, bola, karate, taekwondo)'";
 $querySenior = $db_object->db_query($sqlSenior);
 while ($row = $db_object->db_fetch_array($querySenior)) {
 $dataSenior = $row['total'];}

 $sqlWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label = 'Wirausaha'";
 $queryWirausaha = $db_object->db_query($sqlWirausaha);
 while ($row = $db_object->db_fetch_array($queryWirausaha)) {
 $dataWirausaha = $row['total'];}
                      
// JURUSAN ADMINISTRASI NIAGA 
 $sqlANBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && jurusan='Administrasi Niaga'";
 $queryANBahasa = $db_object->db_query($sqlANBahasa);
 while ($row = $db_object->db_fetch_array($queryANBahasa)) {
 $dataANBahasa = $row['total'];}

 $sqlANKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && jurusan='Administrasi Niaga'";
 $queryANKemanusiaan = $db_object->db_query($sqlANKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryANKemanusiaan)) {
 $dataANKemanusiaan = $row['total'];}

 $sqlANMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && jurusan='Administrasi Niaga'";
 $queryANMapala = $db_object->db_query($sqlANMapala);
 while ($row = $db_object->db_fetch_array($queryANMapala)) {
 $dataANMapala = $row['total'];}

 $sqlANPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && jurusan='Administrasi Niaga'";
 $queryANPersma = $db_object->db_query($sqlANPersma);
 while ($row = $db_object->db_fetch_array($queryANPersma)) {
 $dataANPersma = $row['total'];}

 $sqlANPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && jurusan='Administrasi Niaga'";
 $queryANPramuka = $db_object->db_query($sqlANPramuka);
 while ($row = $db_object->db_fetch_array($queryANPramuka)) {
 $dataANPramuka = $row['total'];}

 $sqlANSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && jurusan='Administrasi Niaga'";
 $queryANSenior = $db_object->db_query($sqlANSenior);
 while ($row = $db_object->db_fetch_array($queryANSenior)) {
 $dataANSenior = $row['total'];}

 $sqlANWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && jurusan='Administrasi Niaga'";
 $queryANWirausaha = $db_object->db_query($sqlANWirausaha);
 while ($row = $db_object->db_fetch_array($queryANWirausaha)) {
 $dataANWirausaha = $row['total'];}

// JURUSAN AKUNTANSI 

 $sqlAKBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && jurusan='Akuntansi'";
 $queryAKBahasa = $db_object->db_query($sqlAKBahasa);
 while ($row = $db_object->db_fetch_array($queryAKBahasa)) {
 $dataAKBahasa = $row['total'];}

 $sqlAKKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && jurusan='Akuntansi'";
 $queryAKKemanusiaan = $db_object->db_query($sqlAKKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryAKKemanusiaan)) {
 $dataAKKemanusiaan = $row['total'];}

 $sqlAKMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && jurusan='Akuntansi'";
 $queryAKMapala = $db_object->db_query($sqlAKMapala);
 while ($row = $db_object->db_fetch_array($queryAKMapala)) {
 $dataAKMapala = $row['total'];}

 $sqlAKPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && jurusan='Akuntansi'";
 $queryAKPersma = $db_object->db_query($sqlAKPersma);
 while ($row = $db_object->db_fetch_array($queryAKPersma)) {
 $dataAKPersma = $row['total'];}

 $sqlAKPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && jurusan='Akuntansi'";
 $queryAKPramuka = $db_object->db_query($sqlAKPramuka);
 while ($row = $db_object->db_fetch_array($queryAKPramuka)) {
 $dataAKPramuka = $row['total'];}

 $sqlAKSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && jurusan='Akuntansi'";
 $queryAKSenior = $db_object->db_query($sqlAKSenior);
 while ($row = $db_object->db_fetch_array($queryAKSenior)) {
 $dataAKSenior = $row['total'];}

 $sqlAKWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && jurusan='Akuntansi'";
 $queryAKWirausaha = $db_object->db_query($sqlAKWirausaha);
 while ($row = $db_object->db_fetch_array($queryAKWirausaha)) {
 $dataAKWirausaha = $row['total'];}

// JURUSAN TEKNIK ELEKTRO

 $sqlTEBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && jurusan='Teknik Elektro'";
 $queryTEBahasa = $db_object->db_query($sqlTEBahasa);
 while ($row = $db_object->db_fetch_array($queryTEBahasa)) {
 $dataTEBahasa = $row['total'];}

 $sqlTEKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && jurusan='Teknik Elektro'";
 $queryTEKemanusiaan = $db_object->db_query($sqlTEKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryTEKemanusiaan)) {
 $dataTEKemanusiaan = $row['total'];}

 $sqlTEMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && jurusan='Teknik Elektro'";
 $queryTEMapala = $db_object->db_query($sqlTEMapala);
 while ($row = $db_object->db_fetch_array($queryTEMapala)) {
 $dataTEMapala = $row['total'];}

 $sqlTEPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && jurusan='Teknik Elektro'";
 $queryTEPersma = $db_object->db_query($sqlTEPersma);
 while ($row = $db_object->db_fetch_array($queryTEPersma)) {
 $dataTEPersma = $row['total'];}

 $sqlTEPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && jurusan='Teknik Elektro'";
 $queryTEPramuka = $db_object->db_query($sqlTEPramuka);
 while ($row = $db_object->db_fetch_array($queryTEPramuka)) {
 $dataTEPramuka = $row['total'];}

 $sqlTESenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && jurusan='Teknik Elektro'";
 $queryTESenior = $db_object->db_query($sqlTESenior);
 while ($row = $db_object->db_fetch_array($queryTESenior)) {
 $dataTESenior = $row['total'];}

 $sqlTEWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && jurusan='Teknik Elektro'";
 $queryTEWirausaha = $db_object->db_query($sqlTEWirausaha);
 while ($row = $db_object->db_fetch_array($queryTEWirausaha)) {
 $dataTEWirausaha = $row['total'];}

// JURUSAN TEKNIK KIMIA

 $sqlTKBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && jurusan='Teknik Kimia'";
 $queryTKBahasa = $db_object->db_query($sqlTKBahasa);
 while ($row = $db_object->db_fetch_array($queryTKBahasa)) {
 $dataTKBahasa = $row['total'];}

 $sqlTKKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && jurusan='Teknik Kimia'";
 $queryTKKemanusiaan = $db_object->db_query($sqlTKKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryTKKemanusiaan)) {
 $dataTKKemanusiaan = $row['total'];}

 $sqlTKMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && jurusan='Teknik Kimia'";
 $queryTKMapala = $db_object->db_query($sqlTKMapala);
 while ($row = $db_object->db_fetch_array($queryTKMapala)) {
 $dataTKMapala = $row['total'];}

 $sqlTKPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && jurusan='Teknik Kimia'";
 $queryTKPersma = $db_object->db_query($sqlTKPersma);
 while ($row = $db_object->db_fetch_array($queryTKPersma)) {
 $dataTKPersma = $row['total'];}

 $sqlTKPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && jurusan='Teknik Kimia'";
 $queryTKPramuka = $db_object->db_query($sqlTKPramuka);
 while ($row = $db_object->db_fetch_array($queryTKPramuka)) {
 $dataTKPramuka = $row['total'];}

 $sqlTKSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && jurusan='Teknik Kimia'";
 $queryTKSenior = $db_object->db_query($sqlTKSenior);
 while ($row = $db_object->db_fetch_array($queryTKSenior)) {
 $dataTKSenior = $row['total'];}

 $sqlTKWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && jurusan='Teknik Kimia'";
 $queryTKWirausaha = $db_object->db_query($sqlTKWirausaha);
 while ($row = $db_object->db_fetch_array($queryTKWirausaha)) {
 $dataTKWirausaha = $row['total'];}

// JURUSAN TEKNIK MESIN

 $sqlTMBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && jurusan='Teknik Mesin'";
 $queryTMBahasa = $db_object->db_query($sqlTMBahasa);
 while ($row = $db_object->db_fetch_array($queryTMBahasa)) {
 $dataTMBahasa = $row['total'];}

 $sqlTMKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && jurusan='Teknik Mesin'";
 $queryTMKemanusiaan = $db_object->db_query($sqlTMKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryTMKemanusiaan)) {
 $dataTMKemanusiaan = $row['total'];}

 $sqlTMMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && jurusan='Teknik Mesin'";
 $queryTMMapala = $db_object->db_query($sqlTMMapala);
 while ($row = $db_object->db_fetch_array($queryTMMapala)) {
 $dataTMMapala = $row['total'];}

 $sqlTMPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && jurusan='Teknik Mesin'";
 $queryTMPersma = $db_object->db_query($sqlTMPersma);
 while ($row = $db_object->db_fetch_array($queryTMPersma)) {
 $dataTMPersma = $row['total'];}

 $sqlTMPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && jurusan='Teknik Mesin'";
 $queryTMPramuka = $db_object->db_query($sqlTMPramuka);
 while ($row = $db_object->db_fetch_array($queryTMPramuka)) {
 $dataTMPramuka = $row['total'];}

 $sqlTMSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && jurusan='Teknik Mesin'";
 $queryTMSenior = $db_object->db_query($sqlTMSenior);
 while ($row = $db_object->db_fetch_array($queryTMSenior)) {
 $dataTMSenior = $row['total'];}

 $sqlTMWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && jurusan='Teknik Mesin'";
 $queryTMWirausaha = $db_object->db_query($sqlTMWirausaha);
 while ($row = $db_object->db_fetch_array($queryTMWirausaha)) {
 $dataTMWirausaha = $row['total'];}

// JURUSAN TEKNIK SIPIL

 $sqlTSBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && jurusan='Teknik Sipil'";
 $queryTSBahasa = $db_object->db_query($sqlTSBahasa);
 while ($row = $db_object->db_fetch_array($queryTSBahasa)) {
 $dataTSBahasa = $row['total'];}

 $sqlTSKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && jurusan='Teknik Sipil'";
 $queryTSKemanusiaan = $db_object->db_query($sqlTSKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryTSKemanusiaan)) {
 $dataTSKemanusiaan = $row['total'];}

 $sqlTSMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && jurusan='Teknik Sipil'";
 $queryTSMapala = $db_object->db_query($sqlTSMapala);
 while ($row = $db_object->db_fetch_array($queryTSMapala)) {
 $dataTSMapala = $row['total'];}

 $sqlTSPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && jurusan='Teknik Sipil'";
 $queryTSPersma = $db_object->db_query($sqlTSPersma);
 while ($row = $db_object->db_fetch_array($queryTSPersma)) {
 $dataTSPersma = $row['total'];}

 $sqlTSPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && jurusan='Teknik Sipil'";
 $queryTSPramuka = $db_object->db_query($sqlTSPramuka);
 while ($row = $db_object->db_fetch_array($queryTSPramuka)) {
 $dataTSPramuka = $row['total'];}

 $sqlTSSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && jurusan='Teknik Sipil'";
 $queryTSSenior = $db_object->db_query($sqlTSSenior);
 while ($row = $db_object->db_fetch_array($queryTSSenior)) {
 $dataTSSenior = $row['total'];}

 $sqlTSWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && jurusan='Teknik Sipil'";
 $queryTSWirausaha = $db_object->db_query($sqlTSWirausaha);
 while ($row = $db_object->db_fetch_array($queryTSWirausaha)) {
 $dataTSWirausaha = $row['total'];}

 // PRODI ADMINISTRASI BISNIS

 $sqlABBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && prodi='Administrasi Bisnis'";
 $queryABBahasa = $db_object->db_query($sqlABBahasa);
 while ($row = $db_object->db_fetch_array($queryABBahasa)) {
 $dataABBahasa = $row['total'];}

 $sqlABKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && prodi='Administrasi Bisnis'";
 $queryABKemanusiaan = $db_object->db_query($sqlABKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryABKemanusiaan)) {
 $dataABKemanusiaan = $row['total'];}

 $sqlABMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && prodi ='Administrasi Bisnis'";
 $queryABMapala = $db_object->db_query($sqlABMapala);
 while ($row = $db_object->db_fetch_array($queryABMapala)) {
 $dataABMapala = $row['total'];}

 $sqlABPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && prodi='Administrasi Bisnis'";
 $queryABPersma = $db_object->db_query($sqlABPersma);
 while ($row = $db_object->db_fetch_array($queryABPersma)) {
 $dataABPersma = $row['total'];}

 $sqlABPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && prodi='Administrasi Bisnis'";
 $queryABPramuka = $db_object->db_query($sqlABPramuka);
 while ($row = $db_object->db_fetch_array($queryABPramuka)) {
 $dataABPramuka = $row['total'];}

 $sqlABSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && prodi='Administrasi Bisnis'";
 $queryABSenior = $db_object->db_query($sqlABSenior);
 while ($row = $db_object->db_fetch_array($queryABSenior)) {
 $dataABSenior = $row['total'];}

 $sqlABWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && prodi='Administrasi Bisnis'";
 $queryABWirausaha = $db_object->db_query($sqlABWirausaha);
 while ($row = $db_object->db_fetch_array($queryABWirausaha)) {
 $dataABWirausaha = $row['total'];}

 // PRODI AKUNTANSI

 $sqlAK1Bahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && prodi='Akuntansi'";
 $queryAK1Bahasa = $db_object->db_query($sqlAK1Bahasa);
 while ($row = $db_object->db_fetch_array($queryAK1Bahasa)) {
 $dataAK1Bahasa = $row['total'];}

 $sqlAK1Kemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && prodi='Akuntansi'";
 $queryAK1Kemanusiaan = $db_object->db_query($sqlAK1Kemanusiaan);
 while ($row = $db_object->db_fetch_array($queryAK1Kemanusiaan)) {
 $dataAK1Kemanusiaan = $row['total'];}

 $sqlAK1Mapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && prodi ='Akuntansi'";
 $queryAK1Mapala = $db_object->db_query($sqlAK1Mapala);
 while ($row = $db_object->db_fetch_array($queryAK1Mapala)) {
 $dataAK1Mapala = $row['total'];}

 $sqlAK1Persma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && prodi='Akuntansi'";
 $queryAK1Persma = $db_object->db_query($sqlAK1Persma);
 while ($row = $db_object->db_fetch_array($queryAK1Persma)) {
 $dataAK1Persma = $row['total'];}

 $sqlAK1Pramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && prodi='Akuntansi'";
 $queryAK1Pramuka = $db_object->db_query($sqlAK1Pramuka);
 while ($row = $db_object->db_fetch_array($queryAK1Pramuka)) {
 $dataAK1Pramuka = $row['total'];}

 $sqlAK1Senior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && prodi='Akuntansi'";
 $queryAK1Senior = $db_object->db_query($sqlAK1Senior);
 while ($row = $db_object->db_fetch_array($queryAK1Senior)) {
 $dataAK1Senior = $row['total'];}

 $sqlAK1Wirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && prodi='Akuntansi'";
 $queryAK1Wirausaha = $db_object->db_query($sqlAK1Wirausaha);
 while ($row = $db_object->db_fetch_array($queryAK1Wirausaha)) {
 $dataAK1Wirausaha = $row['total'];}

 // PRODI ANALISIS KIMIA

 $sqlANKBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && prodi='Analisis Kimia'";
 $queryANKBahasa = $db_object->db_query($sqlANKBahasa);
 while ($row = $db_object->db_fetch_array($queryANKBahasa)) {
 $dataANKBahasa = $row['total'];}

 $sqlANKKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && prodi='Analisis Kimia'";
 $queryANKKemanusiaan = $db_object->db_query($sqlANKKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryANKKemanusiaan)) {
 $dataANKKemanusiaan = $row['total'];}

 $sqlANKMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && prodi ='Analisis Kimia'";
 $queryANKMapala = $db_object->db_query($sqlANKMapala);
 while ($row = $db_object->db_fetch_array($queryANKMapala)) {
 $dataANKMapala = $row['total'];}

 $sqlANKPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && prodi='Analisis Kimia'";
 $queryANKPersma = $db_object->db_query($sqlANKPersma);
 while ($row = $db_object->db_fetch_array($queryANKPersma)) {
 $dataANKPersma = $row['total'];}

 $sqlANKPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && prodi='Analisis Kimia'";
 $queryANKPramuka = $db_object->db_query($sqlANKPramuka);
 while ($row = $db_object->db_fetch_array($queryANKPramuka)) {
 $dataANKPramuka = $row['total'];}

 $sqlANKSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && prodi='Analisis Kimia'";
 $queryANKSenior = $db_object->db_query($sqlANKSenior);
 while ($row = $db_object->db_fetch_array($queryANKSenior)) {
 $dataANKSenior = $row['total'];}

 $sqlANKWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && prodi='Analisis Kimia'";
 $queryANKWirausaha = $db_object->db_query($sqlANKWirausaha);
 while ($row = $db_object->db_fetch_array($queryANKWirausaha)) {
 $dataANKWirausaha = $row['total'];}

 // PRODI TEKNIK ELEKTRONIKA

 $sqlTELBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && prodi='Teknik Elektronika'";
 $queryTELBahasa = $db_object->db_query($sqlTELBahasa);
 while ($row = $db_object->db_fetch_array($queryTELBahasa)) {
 $dataTELBahasa = $row['total'];}

 $sqlTELKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && prodi='Teknik Elektronika'";
 $queryTELKemanusiaan = $db_object->db_query($sqlTELKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryTELKemanusiaan)) {
 $dataTELKemanusiaan = $row['total'];}

 $sqlTELMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && prodi ='Teknik Elektronika'";
 $queryTELMapala = $db_object->db_query($sqlTELMapala);
 while ($row = $db_object->db_fetch_array($queryTELMapala)) {
 $dataTELMapala = $row['total'];}

 $sqlTELPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && prodi='Teknik Elektronika'";
 $queryTELPersma = $db_object->db_query($sqlTELPersma);
 while ($row = $db_object->db_fetch_array($queryTELPersma)) {
 $dataTELPersma = $row['total'];}

 $sqlTELPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && prodi='Teknik Elektronika'";
 $queryTELPramuka = $db_object->db_query($sqlTELPramuka);
 while ($row = $db_object->db_fetch_array($queryTELPramuka)) {
 $dataTELPramuka = $row['total'];}

 $sqlTELSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && prodi='Teknik Elektronika'";
 $queryTELSenior = $db_object->db_query($sqlTELSenior);
 while ($row = $db_object->db_fetch_array($queryTELSenior)) {
 $dataTELSenior = $row['total'];}

 $sqlTELWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && prodi='Teknik Elektronika'";
 $queryTELWirausaha = $db_object->db_query($sqlTELWirausaha);
 while ($row = $db_object->db_fetch_array($queryTELWirausaha)) {
 $dataTELWirausaha = $row['total'];}


 // PRODI TEKNIK KIMIA

 $sqlTK1Bahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && prodi='Teknik Kimia'";
 $queryTK1Bahasa = $db_object->db_query($sqlTK1Bahasa);
 while ($row = $db_object->db_fetch_array($queryTK1Bahasa)) {
 $dataTK1Bahasa = $row['total'];}

 $sqlTK1Kemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && prodi='Teknik Kimia'";
 $queryTK1Kemanusiaan = $db_object->db_query($sqlTK1Kemanusiaan);
 while ($row = $db_object->db_fetch_array($queryTK1Kemanusiaan)) {
 $dataTK1Kemanusiaan = $row['total'];}

 $sqlTK1Mapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && prodi ='Teknik Kimia'";
 $queryTK1Mapala = $db_object->db_query($sqlTK1Mapala);
 while ($row = $db_object->db_fetch_array($queryTK1Mapala)) {
 $dataTK1Mapala = $row['total'];}

 $sqlTK1Persma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && prodi='Teknik Kimia'";
 $queryTK1Persma = $db_object->db_query($sqlTK1Persma);
 while ($row = $db_object->db_fetch_array($queryTK1Persma)) {
 $dataTK1Persma = $row['total'];}

 $sqlTK1Pramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && prodi='Teknik Kimia'";
 $queryTK1Pramuka = $db_object->db_query($sqlTK1Pramuka);
 while ($row = $db_object->db_fetch_array($queryTK1Pramuka)) {
 $dataTK1Pramuka = $row['total'];}

 $sqlTK1Senior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && prodi='Teknik Kimia'";
 $queryTK1Senior = $db_object->db_query($sqlTK1Senior);
 while ($row = $db_object->db_fetch_array($queryTK1Senior)) {
 $dataTK1Senior = $row['total'];}

 $sqlTK1Wirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && prodi='Teknik Kimia'";
 $queryTK1Wirausaha = $db_object->db_query($sqlTK1Wirausaha);
 while ($row = $db_object->db_fetch_array($queryTK1Wirausaha)) {
 $dataTK1Wirausaha = $row['total'];} 

// PRODI TEKNIK KIMIA MINERAL

 $sqlTKMBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && prodi='Teknik Kimia Mineral'";
 $queryTKMBahasa = $db_object->db_query($sqlTKMBahasa);
 while ($row = $db_object->db_fetch_array($queryTKMBahasa)) {
 $dataTKMBahasa = $row['total'];}

 $sqlTKMKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && prodi='Teknik Kimia Mineral'";
 $queryTKMKemanusiaan = $db_object->db_query($sqlTKMKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryTKMKemanusiaan)) {
 $dataTKMKemanusiaan = $row['total'];}

 $sqlTKMMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && prodi ='Teknik Kimia Mineral'";
 $queryTKMMapala = $db_object->db_query($sqlTKMMapala);
 while ($row = $db_object->db_fetch_array($queryTKMMapala)) {
 $dataTKMMapala = $row['total'];}

 $sqlTKMPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && prodi='Teknik Kimia Mineral'";
 $queryTKMPersma = $db_object->db_query($sqlTKMPersma);
 while ($row = $db_object->db_fetch_array($queryTKMPersma)) {
 $dataTKMPersma = $row['total'];}

 $sqlTKMPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && prodi='Teknik Kimia Mineral'";
 $queryTKMPramuka = $db_object->db_query($sqlTKMPramuka);
 while ($row = $db_object->db_fetch_array($queryTKMPramuka)) {
 $dataTKMPramuka = $row['total'];}

 $sqlTKMSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && prodi='Teknik Kimia Mineral'";
 $queryTKMSenior = $db_object->db_query($sqlTKMSenior);
 while ($row = $db_object->db_fetch_array($queryTKMSenior)) {
 $dataTKMSenior = $row['total'];}

 $sqlTKMWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && prodi='Teknik Kimia Mineral'";
 $queryTKMWirausaha = $db_object->db_query($sqlTKMWirausaha);
 while ($row = $db_object->db_fetch_array($queryTKMWirausaha)) {
 $dataTKMWirausaha = $row['total'];}

 // PRODI TEKNIK KONSTRUKSI

 $sqlTKSBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && prodi='Teknik Konstruksi'";
 $queryTKSBahasa = $db_object->db_query($sqlTKSBahasa);
 while ($row = $db_object->db_fetch_array($queryTKSBahasa)) {
 $dataTKSBahasa = $row['total'];}

 $sqlTKSKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && prodi='Teknik Konstruksi'";
 $queryTKSKemanusiaan = $db_object->db_query($sqlTKSKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryTKSKemanusiaan)) {
 $dataTKSKemanusiaan = $row['total'];}

 $sqlTKSMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && prodi ='Teknik Konstruksi'";
 $queryTKSMapala = $db_object->db_query($sqlTKSMapala);
 while ($row = $db_object->db_fetch_array($queryTKSMapala)) {
 $dataTKSMapala = $row['total'];}

 $sqlTKSPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && prodi='Teknik Konstruksi'";
 $queryTKSPersma = $db_object->db_query($sqlTKSPersma);
 while ($row = $db_object->db_fetch_array($queryTKSPersma)) {
 $dataTKSPersma = $row['total'];}

 $sqlTKSPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && prodi='Teknik Konstruksi'";
 $queryTKSPramuka = $db_object->db_query($sqlTKSPramuka);
 while ($row = $db_object->db_fetch_array($queryTKSPramuka)) {
 $dataTKSPramuka = $row['total'];}

 $sqlTKSSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && prodi='Teknik Konstruksi'";
 $queryTKSSenior = $db_object->db_query($sqlTKSSenior);
 while ($row = $db_object->db_fetch_array($queryTKSSenior)) {
 $dataTKSSenior = $row['total'];}

 $sqlTKSWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && prodi='Teknik Konstruksi'";
 $queryTKSWirausaha = $db_object->db_query($sqlTKSWirausaha);
 while ($row = $db_object->db_fetch_array($queryTKSWirausaha)) {
 $dataTKSWirausaha = $row['total'];}

 // PRODI TEKNIK KONSTRUKSI GEDUNG

 $sqlTKGBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && prodi='Teknik Konstruksi Gedung'";
 $queryTKGBahasa = $db_object->db_query($sqlTKGBahasa);
 while ($row = $db_object->db_fetch_array($queryTKGBahasa)) {
 $dataTKGBahasa = $row['total'];}

 $sqlTKGKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && prodi='Teknik Konstruksi Gedung'";
 $queryTKGKemanusiaan = $db_object->db_query($sqlTKGKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryTKGKemanusiaan)) {
 $dataTKGKemanusiaan = $row['total'];}

 $sqlTKGMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && prodi ='Teknik Konstruksi Gedung'";
 $queryTKGMapala = $db_object->db_query($sqlTKGMapala);
 while ($row = $db_object->db_fetch_array($queryTKGMapala)) {
 $dataTKGMapala = $row['total'];}

 $sqlTKGPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && prodi='Teknik Konstruksi Gedung'";
 $queryTKGPersma = $db_object->db_query($sqlTKGPersma);
 while ($row = $db_object->db_fetch_array($queryTKGPersma)) {
 $dataTKGPersma = $row['total'];}

 $sqlTKGPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && prodi='Teknik Konstruksi Gedung'";
 $queryTKGPramuka = $db_object->db_query($sqlTKGPramuka);
 while ($row = $db_object->db_fetch_array($queryTKGPramuka)) {
 $dataTKGPramuka = $row['total'];}

 $sqlTKGSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && prodi='Teknik Konstruksi Gedung'";
 $queryTKGSenior = $db_object->db_query($sqlTKGSenior);
 while ($row = $db_object->db_fetch_array($queryTKGSenior)) {
 $dataTKGSenior = $row['total'];}

 $sqlTKGWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && prodi='Teknik Konstruksi Gedung'";
 $queryTKGWirausaha = $db_object->db_query($sqlTKGWirausaha);
 while ($row = $db_object->db_fetch_array($queryTKGWirausaha)) {
 $dataTKGWirausaha = $row['total'];}

 // PRODI TEKNIK KONSTRUKSI JALAN DAN JEMBATAN

 $sqlTKJJBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && prodi='Teknik Konstruksi Jalan dan Jembatan'";
 $queryTKJJBahasa = $db_object->db_query($sqlTKJJBahasa);
 while ($row = $db_object->db_fetch_array($queryTKJJBahasa)) {
 $dataTKJJBahasa = $row['total'];}

 $sqlTKJJKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && prodi='Teknik Konstruksi Jalan dan Jembatan'";
 $queryTKJJKemanusiaan = $db_object->db_query($sqlTKJJKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryTKJJKemanusiaan)) {
 $dataTKJJKemanusiaan = $row['total'];}

 $sqlTKJJMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && prodi ='Teknik Konstruksi Jalan dan Jembatan'";
 $queryTKJJMapala = $db_object->db_query($sqlTKJJMapala);
 while ($row = $db_object->db_fetch_array($queryTKJJMapala)) {
 $dataTKJJMapala = $row['total'];}

 $sqlTKJJPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && prodi='Teknik Konstruksi Jalan dan Jembatan'";
 $queryTKJJPersma = $db_object->db_query($sqlTKJJPersma);
 while ($row = $db_object->db_fetch_array($queryTKJJPersma)) {
 $dataTKJJPersma = $row['total'];}

 $sqlTKJJPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && prodi='Teknik Konstruksi Jalan dan Jembatan'";
 $queryTKJJPramuka = $db_object->db_query($sqlTKJJPramuka);
 while ($row = $db_object->db_fetch_array($queryTKJJPramuka)) {
 $dataTKJJPramuka = $row['total'];}

 $sqlTKJJSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && prodi='Teknik Konstruksi Jalan dan Jembatan'";
 $queryTKJJSenior = $db_object->db_query($sqlTKJJSenior);
 while ($row = $db_object->db_fetch_array($queryTKJJSenior)) {
 $dataTKJJSenior = $row['total'];}

 $sqlTKJJWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && prodi='Teknik Konstruksi Jalan dan Jembatan'";
 $queryTKJJWirausaha = $db_object->db_query($sqlTKJJWirausaha);
 while ($row = $db_object->db_fetch_array($queryTKJJWirausaha)) {
 $dataTKJJWirausaha = $row['total'];} 

 // PRODI TEKNIK KONVERSI ENERGI

 $sqlTKEBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && prodi='Teknik Konversi Energi'";
 $queryTKEBahasa = $db_object->db_query($sqlTKEBahasa);
 while ($row = $db_object->db_fetch_array($queryTKEBahasa)) {
 $dataTKEBahasa = $row['total'];}

 $sqlTKEKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && prodi='Teknik Konversi Energi'";
 $queryTKEKemanusiaan = $db_object->db_query($sqlTKEKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryTKEKemanusiaan)) {
 $dataTKEKemanusiaan = $row['total'];}

 $sqlTKEMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && prodi ='Teknik Konversi Energi'";
 $queryTKEMapala = $db_object->db_query($sqlTKEMapala);
 while ($row = $db_object->db_fetch_array($queryTKEMapala)) {
 $dataTKEMapala = $row['total'];}

 $sqlTKEPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && prodi='Teknik Konversi Energi'";
 $queryTKEPersma = $db_object->db_query($sqlTKEPersma);
 while ($row = $db_object->db_fetch_array($queryTKEPersma)) {
 $dataTKEPersma = $row['total'];}

 $sqlTKEPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && prodi='Teknik Konversi Energi'";
 $queryTKEPramuka = $db_object->db_query($sqlTKEPramuka);
 while ($row = $db_object->db_fetch_array($queryTKEPramuka)) {
 $dataTKEPramuka = $row['total'];}

 $sqlTKESenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && prodi='Teknik Konversi Energi'";
 $queryTKESenior = $db_object->db_query($sqlTKESenior);
 while ($row = $db_object->db_fetch_array($queryTKESenior)) {
 $dataTKESenior = $row['total'];}

 $sqlTKEWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && prodi='Teknik Konversi Energi'";
 $queryTKEWirausaha = $db_object->db_query($sqlTKEWirausaha);
 while ($row = $db_object->db_fetch_array($queryTKEWirausaha)) {
 $dataTKEWirausaha = $row['total'];} 

 // PRODI TEKNIK LISTRIK

 $sqlTLBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && prodi='Teknik Listrik'";
 $queryTLBahasa = $db_object->db_query($sqlTLBahasa);
 while ($row = $db_object->db_fetch_array($queryTLBahasa)) {
 $dataTLBahasa = $row['total'];}

 $sqlTLKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && prodi='Teknik Listrik'";
 $queryTLKemanusiaan = $db_object->db_query($sqlTLKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryTLKemanusiaan)) {
 $dataTLKemanusiaan = $row['total'];}

 $sqlTLMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && prodi ='Teknik Listrik'";
 $queryTLMapala = $db_object->db_query($sqlTLMapala);
 while ($row = $db_object->db_fetch_array($queryTLMapala)) {
 $dataTLMapala = $row['total'];}

 $sqlTLPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && prodi='Teknik Listrik'";
 $queryTLPersma = $db_object->db_query($sqlTLPersma);
 while ($row = $db_object->db_fetch_array($queryTLPersma)) {
 $dataTLPersma = $row['total'];}

 $sqlTLPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && prodi='Teknik Listrik'";
 $queryTLPramuka = $db_object->db_query($sqlTLPramuka);
 while ($row = $db_object->db_fetch_array($queryTLPramuka)) {
 $dataTLPramuka = $row['total'];}

 $sqlTLSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && prodi='Teknik Listrik'";
 $queryTLSenior = $db_object->db_query($sqlTLSenior);
 while ($row = $db_object->db_fetch_array($queryTLSenior)) {
 $dataTLSenior = $row['total'];}

 $sqlTLWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && prodi='Teknik Listrik'";
 $queryTLWirausaha = $db_object->db_query($sqlTLWirausaha);
 while ($row = $db_object->db_fetch_array($queryTLWirausaha)) {
 $dataTLWirausaha = $row['total'];}

 // PRODI TEKNIK MEKATRONIKA

 $sqlTMKBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && prodi='Teknik Mekatronika'";
 $queryTMKBahasa = $db_object->db_query($sqlTMKBahasa);
 while ($row = $db_object->db_fetch_array($queryTMKBahasa)) {
 $dataTMKBahasa = $row['total'];}

 $sqlTMKKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && prodi='Teknik Mekatronika'";
 $queryTMKKemanusiaan = $db_object->db_query($sqlTMKKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryTMKKemanusiaan)) {
 $dataTMKKemanusiaan = $row['total'];}

 $sqlTMKMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && prodi ='Teknik Mekatronika'";
 $queryTMKMapala = $db_object->db_query($sqlTMKMapala);
 while ($row = $db_object->db_fetch_array($queryTMKMapala)) {
 $dataTMKMapala = $row['total'];}

 $sqlTMKPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && prodi='Teknik Mekatronika'";
 $queryTMKPersma = $db_object->db_query($sqlTMKPersma);
 while ($row = $db_object->db_fetch_array($queryTMKPersma)) {
 $dataTMKPersma = $row['total'];}

 $sqlTMKPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && prodi='Teknik Mekatronika'";
 $queryTMKPramuka = $db_object->db_query($sqlTMKPramuka);
 while ($row = $db_object->db_fetch_array($queryTMKPramuka)) {
 $dataTMKPramuka = $row['total'];}

 $sqlTMKSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && prodi='Teknik Mekatronika'";
 $queryTMKSenior = $db_object->db_query($sqlTMKSenior);
 while ($row = $db_object->db_fetch_array($queryTMKSenior)) {
 $dataTMKSenior = $row['total'];}

 $sqlTMKWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && prodi='Teknik Mekatronika'";
 $queryTMKWirausaha = $db_object->db_query($sqlTMKWirausaha);
 while ($row = $db_object->db_fetch_array($queryTMKWirausaha)) {
 $dataTMKWirausaha = $row['total'];}

 // PRODI TEKNIK MESIN

 $sqlTM1Bahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && prodi='Teknik Mesin'";
 $queryTM1Bahasa = $db_object->db_query($sqlTM1Bahasa);
 while ($row = $db_object->db_fetch_array($queryTM1Bahasa)) {
 $dataTM1Bahasa = $row['total'];}

 $sqlTM1Kemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && prodi='Teknik Mesin'";
 $queryTM1Kemanusiaan = $db_object->db_query($sqlTM1Kemanusiaan);
 while ($row = $db_object->db_fetch_array($queryTM1Kemanusiaan)) {
 $dataTM1Kemanusiaan = $row['total'];}

 $sqlTM1Mapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && prodi ='Teknik Mesin'";
 $queryTM1Mapala = $db_object->db_query($sqlTM1Mapala);
 while ($row = $db_object->db_fetch_array($queryTM1Mapala)) {
 $dataTM1Mapala = $row['total'];}

 $sqlTM1Persma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && prodi='Teknik Mesin'";
 $queryTM1Persma = $db_object->db_query($sqlTM1Persma);
 while ($row = $db_object->db_fetch_array($queryTM1Persma)) {
 $dataTM1Persma = $row['total'];}

 $sqlTM1Pramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && prodi='Teknik Mesin'";
 $queryTM1Pramuka = $db_object->db_query($sqlTM1Pramuka);
 while ($row = $db_object->db_fetch_array($queryTM1Pramuka)) {
 $dataTM1Pramuka = $row['total'];}

 $sqlTM1Senior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && prodi='Teknik Mesin'";
 $queryTM1Senior = $db_object->db_query($sqlTM1Senior);
 while ($row = $db_object->db_fetch_array($queryTM1Senior)) {
 $dataTM1Senior = $row['total'];}

 $sqlTM1Wirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && prodi='Teknik Mesin'";
 $queryTM1Wirausaha = $db_object->db_query($sqlTM1Wirausaha);
 while ($row = $db_object->db_fetch_array($queryTM1Wirausaha)) {
 $dataTM1Wirausaha = $row['total'];}

 // PRODI TEKNIK OTOMOTIF

 $sqlTOBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && prodi='Teknik Otomotif'";
 $queryTOBahasa = $db_object->db_query($sqlTOBahasa);
 while ($row = $db_object->db_fetch_array($queryTOBahasa)) {
 $dataTOBahasa = $row['total'];}

 $sqlTOKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && prodi='Teknik Otomotif'";
 $queryTOKemanusiaan = $db_object->db_query($sqlTOKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryTOKemanusiaan)) {
 $dataTOKemanusiaan = $row['total'];}

 $sqlTOMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && prodi ='Teknik Otomotif'";
 $queryTOMapala = $db_object->db_query($sqlTOMapala);
 while ($row = $db_object->db_fetch_array($queryTOMapala)) {
 $dataTOMapala = $row['total'];}

 $sqlTOPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && prodi='Teknik Otomotif'";
 $queryTOPersma = $db_object->db_query($sqlTOPersma);
 while ($row = $db_object->db_fetch_array($queryTOPersma)) {
 $dataTOPersma = $row['total'];}

 $sqlTOPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && prodi='Teknik Otomotif'";
 $queryTOPramuka = $db_object->db_query($sqlTOPramuka);
 while ($row = $db_object->db_fetch_array($queryTOPramuka)) {
 $dataTOPramuka = $row['total'];}

 $sqlTOSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && prodi='Teknik Otomotif'";
 $queryTOSenior = $db_object->db_query($sqlTOSenior);
 while ($row = $db_object->db_fetch_array($queryTOSenior)) {
 $dataTOSenior = $row['total'];}

 $sqlTOWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && prodi='Teknik Otomotif'";
 $queryTOWirausaha = $db_object->db_query($sqlTOWirausaha);
 while ($row = $db_object->db_fetch_array($queryTOWirausaha)) {
 $dataTOWirausaha = $row['total'];} 

 // PRODI TEKNIK PERAWATAN ALAT BERAT

 $sqlTPABBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && prodi='Teknik Perawatan Alat Berat'";
 $queryTPABBahasa = $db_object->db_query($sqlTPABBahasa);
 while ($row = $db_object->db_fetch_array($queryTPABBahasa)) {
 $dataTPABBahasa = $row['total'];}

 $sqlTPABKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && prodi='Teknik Perawatan Alat Berat'";
 $queryTPABKemanusiaan = $db_object->db_query($sqlTPABKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryTPABKemanusiaan)) {
 $dataTPABKemanusiaan = $row['total'];}

 $sqlTPABMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && prodi ='Teknik Perawatan Alat Berat'";
 $queryTPABMapala = $db_object->db_query($sqlTPABMapala);
 while ($row = $db_object->db_fetch_array($queryTPABMapala)) {
 $dataTPABMapala = $row['total'];}

 $sqlTPABPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && prodi='Teknik Perawatan Alat Berat'";
 $queryTPABPersma = $db_object->db_query($sqlTPABPersma);
 while ($row = $db_object->db_fetch_array($queryTPABPersma)) {
 $dataTPABPersma = $row['total'];}

 $sqlTPABPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && prodi='Teknik Perawatan Alat Berat'";
 $queryTPABPramuka = $db_object->db_query($sqlTPABPramuka);
 while ($row = $db_object->db_fetch_array($queryTPABPramuka)) {
 $dataTPABPramuka = $row['total'];}

 $sqlTPABSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && prodi='Teknik Perawatan Alat Berat'";
 $queryTPABSenior = $db_object->db_query($sqlTPABSenior);
 while ($row = $db_object->db_fetch_array($queryTPABSenior)) {
 $dataTPABSenior = $row['total'];}

 $sqlTPABWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && prodi='Teknik Perawatan Alat Berat'";
 $queryTPABWirausaha = $db_object->db_query($sqlTPABWirausaha);
 while ($row = $db_object->db_fetch_array($queryTPABWirausaha)) {
 $dataTPABWirausaha = $row['total'];} 

 // PRODI TEKNIK SIPIL

 $sqlTS1Bahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && prodi='Teknik Sipil'";
 $queryTS1Bahasa = $db_object->db_query($sqlTS1Bahasa);
 while ($row = $db_object->db_fetch_array($queryTS1Bahasa)) {
 $dataTS1Bahasa = $row['total'];}

 $sqlTS1Kemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && prodi='Teknik Sipil'";
 $queryTS1Kemanusiaan = $db_object->db_query($sqlTS1Kemanusiaan);
 while ($row = $db_object->db_fetch_array($queryTS1Kemanusiaan)) {
 $dataTS1Kemanusiaan = $row['total'];}

 $sqlTS1Mapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && prodi ='Teknik Sipil'";
 $queryTS1Mapala = $db_object->db_query($sqlTS1Mapala);
 while ($row = $db_object->db_fetch_array($queryTS1Mapala)) {
 $dataTS1Mapala = $row['total'];}

 $sqlTS1Persma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && prodi='Teknik Sipil'";
 $queryTS1Persma = $db_object->db_query($sqlTS1Persma);
 while ($row = $db_object->db_fetch_array($queryTS1Persma)) {
 $dataTS1Persma = $row['total'];}

 $sqlTS1Pramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && prodi='Teknik Sipil'";
 $queryTS1Pramuka = $db_object->db_query($sqlTS1Pramuka);
 while ($row = $db_object->db_fetch_array($queryTS1Pramuka)) {
 $dataTS1Pramuka = $row['total'];}

 $sqlTS1Senior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && prodi='Teknik Sipil'";
 $queryTS1Senior = $db_object->db_query($sqlTS1Senior);
 while ($row = $db_object->db_fetch_array($queryTS1Senior)) {
 $dataTS1Senior = $row['total'];}

 $sqlTS1Wirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && prodi='Teknik Sipil'";
 $queryTS1Wirausaha = $db_object->db_query($sqlTS1Wirausaha);
 while ($row = $db_object->db_fetch_array($queryTS1Wirausaha)) {
 $dataTS1Wirausaha = $row['total'];}

 // PRODI TEKNIK TELEKOMUNIKASI

 $sqlTTLBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && prodi='Teknik Telekomunikasi'";
 $queryTTLBahasa = $db_object->db_query($sqlTTLBahasa);
 while ($row = $db_object->db_fetch_array($queryTTLBahasa)) {
 $dataTTLBahasa = $row['total'];}

 $sqlTTLKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && prodi='Teknik Telekomunikasi'";
 $queryTTLKemanusiaan = $db_object->db_query($sqlTTLKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryTTLKemanusiaan)) {
 $dataTTLKemanusiaan = $row['total'];}

 $sqlTTLMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && prodi ='Teknik Telekomunikasi'";
 $queryTTLMapala = $db_object->db_query($sqlTTLMapala);
 while ($row = $db_object->db_fetch_array($queryTTLMapala)) {
 $dataTTLMapala = $row['total'];}

 $sqlTTLPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && prodi='Teknik Telekomunikasi'";
 $queryTTLPersma = $db_object->db_query($sqlTTLPersma);
 while ($row = $db_object->db_fetch_array($queryTTLPersma)) {
 $dataTTLPersma = $row['total'];}

 $sqlTTLPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && prodi='Teknik Telekomunikasi'";
 $queryTTLPramuka = $db_object->db_query($sqlTTLPramuka);
 while ($row = $db_object->db_fetch_array($queryTTLPramuka)) {
 $dataTTLPramuka = $row['total'];}

 $sqlTTLSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && prodi='Teknik Telekomunikasi'";
 $queryTTLSenior = $db_object->db_query($sqlTTLSenior);
 while ($row = $db_object->db_fetch_array($queryTTLSenior)) {
 $dataTTLSenior = $row['total'];}

 $sqlTTLWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && prodi='Teknik Telekomunikasi'";
 $queryTTLWirausaha = $db_object->db_query($sqlTTLWirausaha);
 while ($row = $db_object->db_fetch_array($queryTTLWirausaha)) {
 $dataTTLWirausaha = $row['total'];}

 // PRODI AKUNTANSI MANAJERIAL 

 $sqlAKMBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && prodi='Akuntansi Manajerial'";
 $queryAKMBahasa = $db_object->db_query($sqlAKMBahasa);
 while ($row = $db_object->db_fetch_array($queryAKMBahasa)) {
 $dataAKMBahasa = $row['total'];}

 $sqlAKMKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && prodi='Akuntansi Manajerial'";
 $queryAKMKemanusiaan = $db_object->db_query($sqlAKMKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryAKMKemanusiaan)) {
 $dataAKMKemanusiaan = $row['total'];}

 $sqlAKMMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && prodi ='Akuntansi Manajerial'";
 $queryAKMMapala = $db_object->db_query($sqlAKMMapala);
 while ($row = $db_object->db_fetch_array($queryAKMMapala)) {
 $dataAKMMapala = $row['total'];}

 $sqlAKMPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && prodi='Akuntansi Manajerial'";
 $queryAKMPersma = $db_object->db_query($sqlAKMPersma);
 while ($row = $db_object->db_fetch_array($queryAKMPersma)) {
 $dataAKMPersma = $row['total'];}

 $sqlAKMPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && prodi='Akuntansi Manajerial'";
 $queryAKMPramuka = $db_object->db_query($sqlAKMPramuka);
 while ($row = $db_object->db_fetch_array($queryAKMPramuka)) {
 $dataAKMPramuka = $row['total'];}

 $sqlAKMSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && prodi='Akuntansi Manajerial'";
 $queryAKMSenior = $db_object->db_query($sqlAKMSenior);
 while ($row = $db_object->db_fetch_array($queryAKMSenior)) {
 $dataAKMSenior = $row['total'];}

 $sqlAKMWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && prodi='Akuntansi Manajerial'";
 $queryAKMWirausaha = $db_object->db_query($sqlAKMWirausaha);
 while ($row = $db_object->db_fetch_array($queryAKMWirausaha)) {
 $dataAKMWirausaha = $row['total'];} 

 // PRODI TEKNIK KOMPUTER DAN JARINGAN 

 $sqlTKJBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && prodi='Teknik Komputer dan Jaringan'";
 $queryTKJBahasa = $db_object->db_query($sqlTKJBahasa);
 while ($row = $db_object->db_fetch_array($queryTKJBahasa)) {
 $dataTKJBahasa = $row['total'];}

 $sqlTKJKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && prodi='Teknik Komputer dan Jaringan'";
 $queryTKJKemanusiaan = $db_object->db_query($sqlTKJKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryTKJKemanusiaan)) {
 $dataTKJKemanusiaan = $row['total'];}

 $sqlTKJMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && prodi ='Teknik Komputer dan Jaringan'";
 $queryTKJMapala = $db_object->db_query($sqlTKJMapala);
 while ($row = $db_object->db_fetch_array($queryTKJMapala)) {
 $dataTKJMapala = $row['total'];}

 $sqlTKJPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && prodi='Teknik Komputer dan Jaringan'";
 $queryTKJPersma = $db_object->db_query($sqlTKJPersma);
 while ($row = $db_object->db_fetch_array($queryTKJPersma)) {
 $dataTKJPersma = $row['total'];}

 $sqlTKJPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && prodi='Teknik Komputer dan Jaringan'";
 $queryTKJPramuka = $db_object->db_query($sqlTKJPramuka);
 while ($row = $db_object->db_fetch_array($queryTKJPramuka)) {
 $dataTKJPramuka = $row['total'];}

 $sqlTKJSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && prodi='Teknik Komputer dan Jaringan'";
 $queryTKJSenior = $db_object->db_query($sqlTKJSenior);
 while ($row = $db_object->db_fetch_array($queryTKJSenior)) {
 $dataTKJSenior = $row['total'];}

 $sqlTKJWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && prodi='Teknik Komputer dan Jaringan'";
 $queryTKJWirausaha = $db_object->db_query($sqlTKJWirausaha);
 while ($row = $db_object->db_fetch_array($queryTKJWirausaha)) {
 $dataTKJWirausaha = $row['total'];} 

 // PRODI TEKNIK MANUFAKTUR 

 $sqlTMFBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && prodi='Teknik Manufaktur'";
 $queryTMFBahasa = $db_object->db_query($sqlTMFBahasa);
 while ($row = $db_object->db_fetch_array($queryTMFBahasa)) {
 $dataTMFBahasa = $row['total'];}

 $sqlTMFKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && prodi='Teknik Manufaktur'";
 $queryTMFKemanusiaan = $db_object->db_query($sqlTMFKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryTMFKemanusiaan)) {
 $dataTMFKemanusiaan = $row['total'];}

 $sqlTMFMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && prodi ='Teknik Manufaktur'";
 $queryTMFMapala = $db_object->db_query($sqlTMFMapala);
 while ($row = $db_object->db_fetch_array($queryTMFMapala)) {
 $dataTMFMapala = $row['total'];}

 $sqlTMFPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && prodi='Teknik Manufaktur'";
 $queryTMFPersma = $db_object->db_query($sqlTMFPersma);
 while ($row = $db_object->db_fetch_array($queryTMFPersma)) {
 $dataTMFPersma = $row['total'];}

 $sqlTMFPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && prodi='Teknik Manufaktur'";
 $queryTMFPramuka = $db_object->db_query($sqlTMFPramuka);
 while ($row = $db_object->db_fetch_array($queryTMFPramuka)) {
 $dataTMFPramuka = $row['total'];}

 $sqlTMFSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && prodi='Teknik Manufaktur'";
 $queryTMFSenior = $db_object->db_query($sqlTMFSenior);
 while ($row = $db_object->db_fetch_array($queryTMFSenior)) {
 $dataTMFSenior = $row['total'];}

 $sqlTMFWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && prodi='Teknik Manufaktur'";
 $queryTMFWirausaha = $db_object->db_query($sqlTMFWirausaha);
 while ($row = $db_object->db_fetch_array($queryTMFWirausaha)) {
 $dataTMFWirausaha = $row['total'];}

 // PRODI TEKNIK MULTIMEDIA DAN JARINGAN 

 $sqlTMJBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && prodi='Teknik Multimedia dan Jaringan'";
 $queryTMJBahasa = $db_object->db_query($sqlTMJBahasa);
 while ($row = $db_object->db_fetch_array($queryTMJBahasa)) {
 $dataTMJBahasa = $row['total'];}

 $sqlTMJKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && prodi='Teknik Multimedia dan Jaringan'";
 $queryTMJKemanusiaan = $db_object->db_query($sqlTMJKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryTMJKemanusiaan)) {
 $dataTMJKemanusiaan = $row['total'];}

 $sqlTMJMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && prodi ='Teknik Multimedia dan Jaringan'";
 $queryTMJMapala = $db_object->db_query($sqlTMJMapala);
 while ($row = $db_object->db_fetch_array($queryTMJMapala)) {
 $dataTMJMapala = $row['total'];}

 $sqlTMJPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && prodi='Teknik Multimedia dan Jaringan'";
 $queryTMJPersma = $db_object->db_query($sqlTMJPersma);
 while ($row = $db_object->db_fetch_array($queryTMJPersma)) {
 $dataTMJPersma = $row['total'];}

 $sqlTMJPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && prodi='Teknik Multimedia dan Jaringan'";
 $queryTMJPramuka = $db_object->db_query($sqlTMJPramuka);
 while ($row = $db_object->db_fetch_array($queryTMJPramuka)) {
 $dataTMJPramuka = $row['total'];}

 $sqlTMJSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && prodi='Teknik Multimedia dan Jaringan'";
 $queryTMJSenior = $db_object->db_query($sqlTMJSenior);
 while ($row = $db_object->db_fetch_array($queryTMJSenior)) {
 $dataTMJSenior = $row['total'];}

 $sqlTMJWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && prodi='Teknik Multimedia dan Jaringan'";
 $queryTMJWirausaha = $db_object->db_query($sqlTMJWirausaha);
 while ($row = $db_object->db_fetch_array($queryTMJWirausaha)) {
 $dataTMJWirausaha = $row['total'];}

 // PRODI TEKNIK PEMBANGKIT ENERGI 

 $sqlTPEBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && prodi='Teknik Pembangkit Energi'";
 $queryTPEBahasa = $db_object->db_query($sqlTPEBahasa);
 while ($row = $db_object->db_fetch_array($queryTPEBahasa)) {
 $dataTPEBahasa = $row['total'];}

 $sqlTPEKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && prodi='Teknik Pembangkit Energi'";
 $queryTPEKemanusiaan = $db_object->db_query($sqlTPEKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryTPEKemanusiaan)) {
 $dataTPEKemanusiaan = $row['total'];}

 $sqlTPEMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && prodi ='Teknik Pembangkit Energi'";
 $queryTPEMapala = $db_object->db_query($sqlTPEMapala);
 while ($row = $db_object->db_fetch_array($queryTPEMapala)) {
 $dataTPEMapala = $row['total'];}

 $sqlTPEPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && prodi='Teknik Pembangkit Energi'";
 $queryTPEPersma = $db_object->db_query($sqlTPEPersma);
 while ($row = $db_object->db_fetch_array($queryTPEPersma)) {
 $dataTPEPersma = $row['total'];}

 $sqlTPEPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && prodi='Teknik Pembangkit Energi'";
 $queryTPEPramuka = $db_object->db_query($sqlTPEPramuka);
 while ($row = $db_object->db_fetch_array($queryTPEPramuka)) {
 $dataTPEPramuka = $row['total'];}

 $sqlTPESenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && prodi='Teknik Pembangkit Energi'";
 $queryTPESenior = $db_object->db_query($sqlTPESenior);
 while ($row = $db_object->db_fetch_array($queryTPESenior)) {
 $dataTPESenior = $row['total'];}

 $sqlTPEWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && prodi='Teknik Pembangkit Energi'";
 $queryTPEWirausaha = $db_object->db_query($sqlTPEWirausaha);
 while ($row = $db_object->db_fetch_array($queryTPEWirausaha)) {
 $dataTPEWirausaha = $row['total'];}

 // PRODI TEKNOLOGI KIMIA INDUSTRI 

 $sqlTKIBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && prodi='Teknologi Kimia Industri'";
 $queryTKIBahasa = $db_object->db_query($sqlTKIBahasa);
 while ($row = $db_object->db_fetch_array($queryTKIBahasa)) {
 $dataTKIBahasa = $row['total'];}

 $sqlTKIKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && prodi='Teknologi Kimia Industri'";
 $queryTKIKemanusiaan = $db_object->db_query($sqlTKIKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryTKIKemanusiaan)) {
 $dataTKIKemanusiaan = $row['total'];}

 $sqlTKIMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && prodi ='Teknologi Kimia Industri'";
 $queryTKIMapala = $db_object->db_query($sqlTKIMapala);
 while ($row = $db_object->db_fetch_array($queryTKIMapala)) {
 $dataTKIMapala = $row['total'];}

 $sqlTKIPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && prodi='Teknologi Kimia Industri'";
 $queryTKIPersma = $db_object->db_query($sqlTKIPersma);
 while ($row = $db_object->db_fetch_array($queryTKIPersma)) {
 $dataTKIPersma = $row['total'];}

 $sqlTKIPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && prodi='Teknologi Kimia Industri'";
 $queryTKIPramuka = $db_object->db_query($sqlTKIPramuka);
 while ($row = $db_object->db_fetch_array($queryTKIPramuka)) {
 $dataTKIPramuka = $row['total'];}

 $sqlTKISenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && prodi='Teknologi Kimia Industri'";
 $queryTKISenior = $db_object->db_query($sqlTKISenior);
 while ($row = $db_object->db_fetch_array($queryTKISenior)) {
 $dataTKISenior = $row['total'];}

 $sqlTKIWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && prodi='Teknologi Kimia Industri'";
 $queryTKIWirausaha = $db_object->db_query($sqlTKIWirausaha);
 while ($row = $db_object->db_fetch_array($queryTKIWirausaha)) {
 $dataTKIWirausaha = $row['total'];}  

 // MINAT BAHASA

 $sqlBBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && minat='Bahasa'";
 $queryBBahasa = $db_object->db_query($sqlBBahasa);
 while ($row = $db_object->db_fetch_array($queryBBahasa)) {
 $dataBBahasa = $row['total'];}

 $sqlBKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && minat='Bahasa'";
 $queryBKemanusiaan = $db_object->db_query($sqlBKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryBKemanusiaan)) {
 $dataBKemanusiaan = $row['total'];}

 $sqlBMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && minat ='Bahasa'";
 $queryBMapala = $db_object->db_query($sqlBMapala);
 while ($row = $db_object->db_fetch_array($queryBMapala)) {
 $dataBMapala = $row['total'];}

 $sqlBPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && minat='Bahasa'";
 $queryBPersma = $db_object->db_query($sqlBPersma);
 while ($row = $db_object->db_fetch_array($queryBPersma)) {
 $dataBPersma = $row['total'];}

 $sqlBPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && minat='Bahasa'";
 $queryBPramuka = $db_object->db_query($sqlBPramuka);
 while ($row = $db_object->db_fetch_array($queryBPramuka)) {
 $dataBPramuka = $row['total'];}

 $sqlBSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && minat='Bahasa'";
 $queryBSenior = $db_object->db_query($sqlBSenior);
 while ($row = $db_object->db_fetch_array($queryBSenior)) {
 $dataBSenior = $row['total'];}

 $sqlBWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && minat='Bahasa'";
 $queryBWirausaha = $db_object->db_query($sqlBWirausaha);
 while ($row = $db_object->db_fetch_array($queryBWirausaha)) {
 $dataBWirausaha = $row['total'];}

 // MINAT BELA DIRI

 $sqlBDBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && minat='Bela Diri'";
 $queryBDBahasa = $db_object->db_query($sqlBDBahasa);
 while ($row = $db_object->db_fetch_array($queryBDBahasa)) {
 $dataBDBahasa = $row['total'];}

 $sqlBDKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && minat='Bela Diri'";
 $queryBDKemanusiaan = $db_object->db_query($sqlBDKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryBDKemanusiaan)) {
 $dataBDKemanusiaan = $row['total'];}

 $sqlBDMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && minat ='Bela Diri'";
 $queryBDMapala = $db_object->db_query($sqlBDMapala);
 while ($row = $db_object->db_fetch_array($queryBDMapala)) {
 $dataBDMapala = $row['total'];}

 $sqlBDPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && minat='Bela Diri'";
 $queryBDPersma = $db_object->db_query($sqlBDPersma);
 while ($row = $db_object->db_fetch_array($queryBDPersma)) {
 $dataBDPersma = $row['total'];}

 $sqlBDPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && minat='Bela Diri'";
 $queryBDPramuka = $db_object->db_query($sqlBDPramuka);
 while ($row = $db_object->db_fetch_array($queryBDPramuka)) {
 $dataBDPramuka = $row['total'];}

 $sqlBDSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && minat='Bela Diri'";
 $queryBDSenior = $db_object->db_query($sqlBDSenior);
 while ($row = $db_object->db_fetch_array($queryBDSenior)) {
 $dataBDSenior = $row['total'];}

 $sqlBDWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && minat='Bela Diri'";
 $queryBDWirausaha = $db_object->db_query($sqlBDWirausaha);
 while ($row = $db_object->db_fetch_array($queryBDWirausaha)) {
 $dataBDWirausaha = $row['total'];}

 // MINAT JURNALISTIK

 $sqlJBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && minat='Jurnalistik'";
 $queryJBahasa = $db_object->db_query($sqlJBahasa);
 while ($row = $db_object->db_fetch_array($queryJBahasa)) {
 $dataJBahasa = $row['total'];}

 $sqlJKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && minat='Jurnalistik'";
 $queryJKemanusiaan = $db_object->db_query($sqlJKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryJKemanusiaan)) {
 $dataJKemanusiaan = $row['total'];}

 $sqlJMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && minat ='Jurnalistik'";
 $queryJMapala = $db_object->db_query($sqlJMapala);
 while ($row = $db_object->db_fetch_array($queryJMapala)) {
 $dataJMapala = $row['total'];}

 $sqlJPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && minat='Jurnalistik'";
 $queryJPersma = $db_object->db_query($sqlJPersma);
 while ($row = $db_object->db_fetch_array($queryJPersma)) {
 $dataJPersma = $row['total'];}

 $sqlJPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && minat='Jurnalistik'";
 $queryJPramuka = $db_object->db_query($sqlJPramuka);
 while ($row = $db_object->db_fetch_array($queryJPramuka)) {
 $dataJPramuka = $row['total'];}

 $sqlJSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && minat='Jurnalistik'";
 $queryJSenior = $db_object->db_query($sqlJSenior);
 while ($row = $db_object->db_fetch_array($queryJSenior)) {
 $dataJSenior = $row['total'];}

 $sqlJWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && minat='Jurnalistik'";
 $queryJWirausaha = $db_object->db_query($sqlJWirausaha);
 while ($row = $db_object->db_fetch_array($queryJWirausaha)) {
 $dataJWirausaha = $row['total'];}

 // MINAT KEMANUSIAAN

 $sqlKMBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && minat='Kemanusiaan'";
 $queryKMBahasa = $db_object->db_query($sqlKMBahasa);
 while ($row = $db_object->db_fetch_array($queryKMBahasa)) {
 $dataKMBahasa = $row['total'];}

 $sqlKMKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && minat='Kemanusiaan'";
 $queryKMKemanusiaan = $db_object->db_query($sqlKMKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryKMKemanusiaan)) {
 $dataKMKemanusiaan = $row['total'];}

 $sqlKMMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && minat ='Kemanusiaan'";
 $queryKMMapala = $db_object->db_query($sqlKMMapala);
 while ($row = $db_object->db_fetch_array($queryKMMapala)) {
 $dataKMMapala = $row['total'];}

 $sqlKMPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && minat='Kemanusiaan'";
 $queryKMPersma = $db_object->db_query($sqlKMPersma);
 while ($row = $db_object->db_fetch_array($queryKMPersma)) {
 $dataKMPersma = $row['total'];}

 $sqlKMPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && minat='Kemanusiaan'";
 $queryKMPramuka = $db_object->db_query($sqlKMPramuka);
 while ($row = $db_object->db_fetch_array($queryKMPramuka)) {
 $dataKMPramuka = $row['total'];}

 $sqlKMSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && minat='Kemanusiaan'";
 $queryKMSenior = $db_object->db_query($sqlKMSenior);
 while ($row = $db_object->db_fetch_array($queryKMSenior)) {
 $dataKMSenior = $row['total'];}

 $sqlKMWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && minat='Kemanusiaan'";
 $queryKMWirausaha = $db_object->db_query($sqlKMWirausaha);
 while ($row = $db_object->db_fetch_array($queryKMWirausaha)) {
 $dataKMWirausaha = $row['total'];}

 // MINAT KESEHATAN

 $sqlKSBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && minat='Kesehatan'";
 $queryKSBahasa = $db_object->db_query($sqlKSBahasa);
 while ($row = $db_object->db_fetch_array($queryKSBahasa)) {
 $dataKSBahasa = $row['total'];}

 $sqlKSKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && minat='Kesehatan'";
 $queryKSKemanusiaan = $db_object->db_query($sqlKSKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryKSKemanusiaan)) {
 $dataKSKemanusiaan = $row['total'];}

 $sqlKSMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && minat ='Kesehatan'";
 $queryKSMapala = $db_object->db_query($sqlKSMapala);
 while ($row = $db_object->db_fetch_array($queryKSMapala)) {
 $dataKSMapala = $row['total'];}

 $sqlKSPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && minat='Kesehatan'";
 $queryKSPersma = $db_object->db_query($sqlKSPersma);
 while ($row = $db_object->db_fetch_array($queryKSPersma)) {
 $dataKSPersma = $row['total'];}

 $sqlKSPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && minat='Kesehatan'";
 $queryKSPramuka = $db_object->db_query($sqlKSPramuka);
 while ($row = $db_object->db_fetch_array($queryKSPramuka)) {
 $dataKSPramuka = $row['total'];}

 $sqlKSSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && minat='Kesehatan'";
 $queryKSSenior = $db_object->db_query($sqlKSSenior);
 while ($row = $db_object->db_fetch_array($queryKSSenior)) {
 $dataKSSenior = $row['total'];}

 $sqlKSWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && minat='Kesehatan'";
 $queryKSWirausaha = $db_object->db_query($sqlKSWirausaha);
 while ($row = $db_object->db_fetch_array($queryKSWirausaha)) {
 $dataKSWirausaha = $row['total'];}

 // MINAT OLAHRAGA

 $sqlOBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && minat='Olahraga'";
 $queryOBahasa = $db_object->db_query($sqlOBahasa);
 while ($row = $db_object->db_fetch_array($queryOBahasa)) {
 $dataOBahasa = $row['total'];}

 $sqlOKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && minat='Olahraga'";
 $queryOKemanusiaan = $db_object->db_query($sqlOKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryOKemanusiaan)) {
 $dataOKemanusiaan = $row['total'];}

 $sqlOMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && minat ='Olahraga'";
 $queryOMapala = $db_object->db_query($sqlOMapala);
 while ($row = $db_object->db_fetch_array($queryOMapala)) {
 $dataOMapala = $row['total'];}

 $sqlOPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && minat='Olahraga'";
 $queryOPersma = $db_object->db_query($sqlOPersma);
 while ($row = $db_object->db_fetch_array($queryOPersma)) {
 $dataOPersma = $row['total'];}

 $sqlOPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && minat='Olahraga'";
 $queryOPramuka = $db_object->db_query($sqlOPramuka);
 while ($row = $db_object->db_fetch_array($queryOPramuka)) {
 $dataOPramuka = $row['total'];}

 $sqlOSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && minat='Olahraga'";
 $queryOSenior = $db_object->db_query($sqlOSenior);
 while ($row = $db_object->db_fetch_array($queryOSenior)) {
 $dataOSenior = $row['total'];}

 $sqlOWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && minat='Olahraga'";
 $queryOWirausaha = $db_object->db_query($sqlOWirausaha);
 while ($row = $db_object->db_fetch_array($queryOWirausaha)) {
 $dataOWirausaha = $row['total'];}

 // MINAT PECINTA ALAM

 $sqlPABahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && minat='Pecinta Alam'";
 $queryPABahasa = $db_object->db_query($sqlPABahasa);
 while ($row = $db_object->db_fetch_array($queryPABahasa)) {
 $dataPABahasa = $row['total'];}

 $sqlPAKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && minat='Pecinta Alam'";
 $queryPAKemanusiaan = $db_object->db_query($sqlPAKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryPAKemanusiaan)) {
 $dataPAKemanusiaan = $row['total'];}

 $sqlPAMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && minat ='Pecinta Alam'";
 $queryPAMapala = $db_object->db_query($sqlPAMapala);
 while ($row = $db_object->db_fetch_array($queryPAMapala)) {
 $dataPAMapala = $row['total'];}

 $sqlPAPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && minat='Pecinta Alam'";
 $queryPAPersma = $db_object->db_query($sqlPAPersma);
 while ($row = $db_object->db_fetch_array($queryPAPersma)) {
 $dataPAPersma = $row['total'];}

 $sqlPAPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && minat='Pecinta Alam'";
 $queryPAPramuka = $db_object->db_query($sqlPAPramuka);
 while ($row = $db_object->db_fetch_array($queryPAPramuka)) {
 $dataPAPramuka = $row['total'];}

 $sqlPASenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && minat='Pecinta Alam'";
 $queryPASenior = $db_object->db_query($sqlPASenior);
 while ($row = $db_object->db_fetch_array($queryPASenior)) {
 $dataPASenior = $row['total'];}

 $sqlPAWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && minat='Pecinta Alam'";
 $queryPAWirausaha = $db_object->db_query($sqlPAWirausaha);
 while ($row = $db_object->db_fetch_array($queryPAWirausaha)) {
 $dataPAWirausaha = $row['total'];}

 // MINAT PRAMUKA

 $sqlPBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && minat='Pramuka'";
 $queryPBahasa = $db_object->db_query($sqlPBahasa);
 while ($row = $db_object->db_fetch_array($queryPBahasa)) {
 $dataPBahasa = $row['total'];}

 $sqlPKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && minat='Pramuka'";
 $queryPKemanusiaan = $db_object->db_query($sqlPKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryPKemanusiaan)) {
 $dataPKemanusiaan = $row['total'];}

 $sqlPMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && minat ='Pramuka'";
 $queryPMapala = $db_object->db_query($sqlPMapala);
 while ($row = $db_object->db_fetch_array($queryPMapala)) {
 $dataPMapala = $row['total'];}

 $sqlPPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && minat='Pramuka'";
 $queryPPersma = $db_object->db_query($sqlPPersma);
 while ($row = $db_object->db_fetch_array($queryPPersma)) {
 $dataPPersma = $row['total'];}

 $sqlPPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && minat='Pramuka'";
 $queryPPramuka = $db_object->db_query($sqlPPramuka);
 while ($row = $db_object->db_fetch_array($queryPPramuka)) {
 $dataPPramuka = $row['total'];}

 $sqlPSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && minat='Pramuka'";
 $queryPSenior = $db_object->db_query($sqlPSenior);
 while ($row = $db_object->db_fetch_array($queryPSenior)) {
 $dataPSenior = $row['total'];}

 $sqlPWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && minat='Pramuka'";
 $queryPWirausaha = $db_object->db_query($sqlPWirausaha);
 while ($row = $db_object->db_fetch_array($queryPWirausaha)) {
 $dataPWirausaha = $row['total'];}

 // MINAT SENI

 $sqlSBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && minat='Seni'";
 $querySBahasa = $db_object->db_query($sqlSBahasa);
 while ($row = $db_object->db_fetch_array($querySBahasa)) {
 $dataSBahasa = $row['total'];}

 $sqlSKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && minat='Seni'";
 $querySKemanusiaan = $db_object->db_query($sqlSKemanusiaan);
 while ($row = $db_object->db_fetch_array($querySKemanusiaan)) {
 $dataSKemanusiaan = $row['total'];}

 $sqlSMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && minat ='Seni'";
 $querySMapala = $db_object->db_query($sqlSMapala);
 while ($row = $db_object->db_fetch_array($querySMapala)) {
 $dataSMapala = $row['total'];}

 $sqlSPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && minat='Seni'";
 $querySPersma = $db_object->db_query($sqlSPersma);
 while ($row = $db_object->db_fetch_array($querySPersma)) {
 $dataSPersma = $row['total'];}

 $sqlSPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && minat='Seni'";
 $querySPramuka = $db_object->db_query($sqlSPramuka);
 while ($row = $db_object->db_fetch_array($querySPramuka)) {
 $dataSPramuka = $row['total'];}

 $sqlSSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && minat='Seni'";
 $querySSenior = $db_object->db_query($sqlSSenior);
 while ($row = $db_object->db_fetch_array($querySSenior)) {
 $dataSSenior = $row['total'];}

 $sqlSWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && minat='Seni'";
 $querySWirausaha = $db_object->db_query($sqlSWirausaha);
 while ($row = $db_object->db_fetch_array($querySWirausaha)) {
 $dataSWirausaha = $row['total'];}

 // MINAT WIRAUSAHA

 $sqlWBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && minat='Wirausaha'";
 $queryWBahasa = $db_object->db_query($sqlWBahasa);
 while ($row = $db_object->db_fetch_array($queryWBahasa)) {
 $dataWBahasa = $row['total'];}

 $sqlWKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && minat='Wirausaha'";
 $queryWKemanusiaan = $db_object->db_query($sqlWKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryWKemanusiaan)) {
 $dataWKemanusiaan = $row['total'];}

 $sqlWMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && minat ='Wirausaha'";
 $queryWMapala = $db_object->db_query($sqlWMapala);
 while ($row = $db_object->db_fetch_array($queryWMapala)) {
 $dataWMapala = $row['total'];}

 $sqlWPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && minat='Wirausaha'";
 $queryWPersma = $db_object->db_query($sqlWPersma);
 while ($row = $db_object->db_fetch_array($queryWPersma)) {
 $dataWPersma = $row['total'];}

 $sqlWPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && minat='Wirausaha'";
 $queryWPramuka = $db_object->db_query($sqlWPramuka);
 while ($row = $db_object->db_fetch_array($queryWPramuka)) {
 $dataWPramuka = $row['total'];}

 $sqlWSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && minat='Wirausaha'";
 $queryWSenior = $db_object->db_query($sqlWSenior);
 while ($row = $db_object->db_fetch_array($queryWSenior)) {
 $dataWSenior = $row['total'];}

 $sqlWWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && minat='Wirausaha'";
 $queryWWirausaha = $db_object->db_query($sqlWWirausaha);
 while ($row = $db_object->db_fetch_array($queryWWirausaha)) {
 $dataWWirausaha = $row['total'];}

 // BAKAT BAHASA

 $sqlB2Bahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && bakat='Bahasa'";
 $queryB2Bahasa = $db_object->db_query($sqlB2Bahasa);
 while ($row = $db_object->db_fetch_array($queryB2Bahasa)) {
 $dataB2Bahasa = $row['total'];}

 $sqlB2Kemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && bakat='Bahasa'";
 $queryB2Kemanusiaan = $db_object->db_query($sqlB2Kemanusiaan);
 while ($row = $db_object->db_fetch_array($queryB2Kemanusiaan)) {
 $dataB2Kemanusiaan = $row['total'];}

 $sqlB2Mapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && bakat ='Bahasa'";
 $queryB2Mapala = $db_object->db_query($sqlB2Mapala);
 while ($row = $db_object->db_fetch_array($queryB2Mapala)) {
 $dataB2Mapala = $row['total'];}

 $sqlB2Persma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && bakat='Bahasa'";
 $queryB2Persma = $db_object->db_query($sqlB2Persma);
 while ($row = $db_object->db_fetch_array($queryB2Persma)) {
 $dataB2Persma = $row['total'];}

 $sqlB2Pramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && bakat='Bahasa'";
 $queryB2Pramuka = $db_object->db_query($sqlB2Pramuka);
 while ($row = $db_object->db_fetch_array($queryB2Pramuka)) {
 $dataB2Pramuka = $row['total'];}

 $sqlB2Senior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && bakat='Bahasa'";
 $queryB2Senior = $db_object->db_query($sqlB2Senior);
 while ($row = $db_object->db_fetch_array($queryB2Senior)) {
 $dataB2Senior = $row['total'];}

 $sqlB2Wirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && bakat='Bahasa'";
 $queryB2Wirausaha = $db_object->db_query($sqlB2Wirausaha);
 while ($row = $db_object->db_fetch_array($queryB2Wirausaha)) {
 $dataB2Wirausaha = $row['total'];}

 // BAKAT LAINNYA

 $sqlLBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && bakat='Lainnya'";
 $queryLBahasa = $db_object->db_query($sqlLBahasa);
 while ($row = $db_object->db_fetch_array($queryLBahasa)) {
 $dataLBahasa = $row['total'];}

 $sqlLKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && bakat='Lainnya'";
 $queryLKemanusiaan = $db_object->db_query($sqlLKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryLKemanusiaan)) {
 $dataLKemanusiaan = $row['total'];}

 $sqlLMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && bakat ='Lainnya'";
 $queryLMapala = $db_object->db_query($sqlLMapala);
 while ($row = $db_object->db_fetch_array($queryLMapala)) {
 $dataLMapala = $row['total'];}

 $sqlLPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && bakat='Lainnya'";
 $queryLPersma = $db_object->db_query($sqlLPersma);
 while ($row = $db_object->db_fetch_array($queryLPersma)) {
 $dataLPersma = $row['total'];}

 $sqlLPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && bakat='Lainnya'";
 $queryLPramuka = $db_object->db_query($sqlLPramuka);
 while ($row = $db_object->db_fetch_array($queryLPramuka)) {
 $dataLPramuka = $row['total'];}

 $sqlLSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && bakat='Lainnya'";
 $queryLSenior = $db_object->db_query($sqlLSenior);
 while ($row = $db_object->db_fetch_array($queryLSenior)) {
 $dataLSenior = $row['total'];}

 $sqlLWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && bakat='Lainnya'";
 $queryLWirausaha = $db_object->db_query($sqlLWirausaha);
 while ($row = $db_object->db_fetch_array($queryLWirausaha)) {
 $dataLWirausaha = $row['total'];}

 // BAKAT OLAHRAGA

 $sqlO2Bahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && bakat='Olahraga'";
 $queryO2Bahasa = $db_object->db_query($sqlO2Bahasa);
 while ($row = $db_object->db_fetch_array($queryO2Bahasa)) {
 $dataO2Bahasa = $row['total'];}

 $sqlO2Kemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && bakat='Olahraga'";
 $queryO2Kemanusiaan = $db_object->db_query($sqlO2Kemanusiaan);
 while ($row = $db_object->db_fetch_array($queryO2Kemanusiaan)) {
 $dataO2Kemanusiaan = $row['total'];}

 $sqlO2Mapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && bakat ='Olahraga'";
 $queryO2Mapala = $db_object->db_query($sqlO2Mapala);
 while ($row = $db_object->db_fetch_array($queryO2Mapala)) {
 $dataO2Mapala = $row['total'];}

 $sqlO2Persma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && bakat='Olahraga'";
 $queryO2Persma = $db_object->db_query($sqlO2Persma);
 while ($row = $db_object->db_fetch_array($queryO2Persma)) {
 $dataO2Persma = $row['total'];}

 $sqlO2Pramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && bakat='Olahraga'";
 $queryO2Pramuka = $db_object->db_query($sqlO2Pramuka);
 while ($row = $db_object->db_fetch_array($queryO2Pramuka)) {
 $dataO2Pramuka = $row['total'];}

 $sqlO2Senior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && bakat='Olahraga'";
 $queryO2Senior = $db_object->db_query($sqlO2Senior);
 while ($row = $db_object->db_fetch_array($queryO2Senior)) {
 $dataO2Senior = $row['total'];}

 $sqlO2Wirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && bakat='Olahraga'";
 $queryO2Wirausaha = $db_object->db_query($sqlO2Wirausaha);
 while ($row = $db_object->db_fetch_array($queryO2Wirausaha)) {
 $dataO2Wirausaha = $row['total'];}

 // BAKAT SENI

 $sqlS2Bahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && bakat='Seni'";
 $queryS2Bahasa = $db_object->db_query($sqlS2Bahasa);
 while ($row = $db_object->db_fetch_array($queryS2Bahasa)) {
 $dataS2Bahasa = $row['total'];}

 $sqlS2Kemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && bakat='Seni'";
 $queryS2Kemanusiaan = $db_object->db_query($sqlS2Kemanusiaan);
 while ($row = $db_object->db_fetch_array($queryS2Kemanusiaan)) {
 $dataS2Kemanusiaan = $row['total'];}

 $sqlS2Mapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && bakat ='Seni'";
 $queryS2Mapala = $db_object->db_query($sqlS2Mapala);
 while ($row = $db_object->db_fetch_array($queryS2Mapala)) {
 $dataS2Mapala = $row['total'];}

 $sqlS2Persma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && bakat='Seni'";
 $queryS2Persma = $db_object->db_query($sqlS2Persma);
 while ($row = $db_object->db_fetch_array($queryS2Persma)) {
 $dataS2Persma = $row['total'];}

 $sqlS2Pramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && bakat='Seni'";
 $queryS2Pramuka = $db_object->db_query($sqlS2Pramuka);
 while ($row = $db_object->db_fetch_array($queryS2Pramuka)) {
 $dataS2Pramuka = $row['total'];}

 $sqlS2Senior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && bakat='Seni'";
 $queryS2Senior = $db_object->db_query($sqlS2Senior);
 while ($row = $db_object->db_fetch_array($queryS2Senior)) {
 $dataS2Senior = $row['total'];}

 $sqlS2Wirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && bakat='Seni'";
 $queryS2Wirausaha = $db_object->db_query($sqlS2Wirausaha);
 while ($row = $db_object->db_fetch_array($queryS2Wirausaha)) {
 $dataS2Wirausaha = $row['total'];}

 // HOBI MENARI

 $sqlMNBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && hobi='Menari'";
 $queryMNBahasa = $db_object->db_query($sqlMNBahasa);
 while ($row = $db_object->db_fetch_array($queryMNBahasa)) {
 $dataMNBahasa = $row['total'];}

 $sqlMNKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && hobi='Menari'";
 $queryMNKemanusiaan = $db_object->db_query($sqlMNKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryMNKemanusiaan)) {
 $dataMNKemanusiaan = $row['total'];}

 $sqlMNMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && hobi ='Menari'";
 $queryMNMapala = $db_object->db_query($sqlMNMapala);
 while ($row = $db_object->db_fetch_array($queryMNMapala)) {
 $dataMNMapala = $row['total'];}

 $sqlMNPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && hobi='Menari'";
 $queryMNPersma = $db_object->db_query($sqlMNPersma);
 while ($row = $db_object->db_fetch_array($queryMNPersma)) {
 $dataMNPersma = $row['total'];}

 $sqlMNPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && hobi='Menari'";
 $queryMNPramuka = $db_object->db_query($sqlMNPramuka);
 while ($row = $db_object->db_fetch_array($queryMNPramuka)) {
 $dataMNPramuka = $row['total'];}

 $sqlMNSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && hobi='Menari'";
 $queryMNSenior = $db_object->db_query($sqlMNSenior);
 while ($row = $db_object->db_fetch_array($queryMNSenior)) {
 $dataMNSenior = $row['total'];}

 $sqlMNWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && hobi='Menari'";
 $queryMNWirausaha = $db_object->db_query($sqlMNWirausaha);
 while ($row = $db_object->db_fetch_array($queryMNWirausaha)) {
 $dataMNWirausaha = $row['total'];}

 // HOBI MENYANYI

 $sqlMNYBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && hobi='Menyanyi'";
 $queryMNYBahasa = $db_object->db_query($sqlMNYBahasa);
 while ($row = $db_object->db_fetch_array($queryMNYBahasa)) {
 $dataMNYBahasa = $row['total'];}

 $sqlMNYKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && hobi='Menyanyi'";
 $queryMNYKemanusiaan = $db_object->db_query($sqlMNYKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryMNYKemanusiaan)) {
 $dataMNYKemanusiaan = $row['total'];}

 $sqlMNYMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && hobi ='Menyanyi'";
 $queryMNYMapala = $db_object->db_query($sqlMNYMapala);
 while ($row = $db_object->db_fetch_array($queryMNYMapala)) {
 $dataMNYMapala = $row['total'];}

 $sqlMNYPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && hobi='Menyanyi'";
 $queryMNYPersma = $db_object->db_query($sqlMNYPersma);
 while ($row = $db_object->db_fetch_array($queryMNYPersma)) {
 $dataMNYPersma = $row['total'];}

 $sqlMNYPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && hobi='Menyanyi'";
 $queryMNYPramuka = $db_object->db_query($sqlMNYPramuka);
 while ($row = $db_object->db_fetch_array($queryMNYPramuka)) {
 $dataMNYPramuka = $row['total'];}

 $sqlMNYSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && hobi='Menyanyi'";
 $queryMNYSenior = $db_object->db_query($sqlMNYSenior);
 while ($row = $db_object->db_fetch_array($queryMNYSenior)) {
 $dataMNYSenior = $row['total'];}

 $sqlMNYWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && hobi='Menyanyi'";
 $queryMNYWirausaha = $db_object->db_query($sqlMNYWirausaha);
 while ($row = $db_object->db_fetch_array($queryMNYWirausaha)) {
 $dataMNYWirausaha = $row['total'];}

 // HOBI MENULIS

 $sqlMNLSBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && hobi='Menulis'";
 $queryMNLSBahasa = $db_object->db_query($sqlMNLSBahasa);
 while ($row = $db_object->db_fetch_array($queryMNLSBahasa)) {
 $dataMNLSBahasa = $row['total'];}

 $sqlMNLSKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && hobi='Menulis'";
 $queryMNLSKemanusiaan = $db_object->db_query($sqlMNLSKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryMNLSKemanusiaan)) {
 $dataMNLSKemanusiaan = $row['total'];}

 $sqlMNLSMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && hobi ='Menulis'";
 $queryMNLSMapala = $db_object->db_query($sqlMNLSMapala);
 while ($row = $db_object->db_fetch_array($queryMNLSMapala)) {
 $dataMNLSMapala = $row['total'];}

 $sqlMNLSPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && hobi='Menulis'";
 $queryMNLSPersma = $db_object->db_query($sqlMNLSPersma);
 while ($row = $db_object->db_fetch_array($queryMNLSPersma)) {
 $dataMNLSPersma = $row['total'];}

 $sqlMNLSPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && hobi='Menulis'";
 $queryMNLSPramuka = $db_object->db_query($sqlMNLSPramuka);
 while ($row = $db_object->db_fetch_array($queryMNLSPramuka)) {
 $dataMNLSPramuka = $row['total'];}

 $sqlMNLSSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && hobi='Menulis'";
 $queryMNLSSenior = $db_object->db_query($sqlMNLSSenior);
 while ($row = $db_object->db_fetch_array($queryMNLSSenior)) {
 $dataMNLSSenior = $row['total'];}

 $sqlMNLSWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && hobi='Menulis'";
 $queryMNLSWirausaha = $db_object->db_query($sqlMNLSWirausaha);
 while ($row = $db_object->db_fetch_array($queryMNLSWirausaha)) {
 $dataMNLSWirausaha = $row['total'];}

 // HOBI MENGGAMBAR

 $sqlMGBBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && hobi='Menggambar'";
 $queryMGBBahasa = $db_object->db_query($sqlMGBBahasa);
 while ($row = $db_object->db_fetch_array($queryMGBBahasa)) {
 $dataMGBBahasa = $row['total'];}

 $sqlMGBKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && hobi='Menggambar'";
 $queryMGBKemanusiaan = $db_object->db_query($sqlMGBKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryMGBKemanusiaan)) {
 $dataMGBKemanusiaan = $row['total'];}

 $sqlMGBMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && hobi ='Menggambar'";
 $queryMGBMapala = $db_object->db_query($sqlMGBMapala);
 while ($row = $db_object->db_fetch_array($queryMGBMapala)) {
 $dataMGBMapala = $row['total'];}

 $sqlMGBPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && hobi='Menggambar'";
 $queryMGBPersma = $db_object->db_query($sqlMGBPersma);
 while ($row = $db_object->db_fetch_array($queryMGBPersma)) {
 $dataMGBPersma = $row['total'];}

 $sqlMGBPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && hobi='Menggambar'";
 $queryMGBPramuka = $db_object->db_query($sqlMGBPramuka);
 while ($row = $db_object->db_fetch_array($queryMGBPramuka)) {
 $dataMGBPramuka = $row['total'];}

 $sqlMGBSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && hobi='Menggambar'";
 $queryMGBSenior = $db_object->db_query($sqlMGBSenior);
 while ($row = $db_object->db_fetch_array($queryMGBSenior)) {
 $dataMGBSenior = $row['total'];}

 $sqlMGBWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && hobi='Menggambar'";
 $queryMGBWirausaha = $db_object->db_query($sqlMGBWirausaha);
 while ($row = $db_object->db_fetch_array($queryMGBWirausaha)) {
 $dataMGBWirausaha = $row['total'];}

 // HOBI MEMASAK

 $sqlMSKBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && hobi='Memasak'";
 $queryMSKBahasa = $db_object->db_query($sqlMSKBahasa);
 while ($row = $db_object->db_fetch_array($queryMSKBahasa)) {
 $dataMSKBahasa = $row['total'];}

 $sqlMSKKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && hobi='Memasak'";
 $queryMSKKemanusiaan = $db_object->db_query($sqlMSKKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryMSKKemanusiaan)) {
 $dataMSKKemanusiaan = $row['total'];}

 $sqlMSKMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && hobi ='Memasak'";
 $queryMSKMapala = $db_object->db_query($sqlMSKMapala);
 while ($row = $db_object->db_fetch_array($queryMSKMapala)) {
 $dataMSKMapala = $row['total'];}

 $sqlMSKPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && hobi='Memasak'";
 $queryMSKPersma = $db_object->db_query($sqlMSKPersma);
 while ($row = $db_object->db_fetch_array($queryMSKPersma)) {
 $dataMSKPersma = $row['total'];}

 $sqlMSKPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && hobi='Memasak'";
 $queryMSKPramuka = $db_object->db_query($sqlMSKPramuka);
 while ($row = $db_object->db_fetch_array($queryMSKPramuka)) {
 $dataMSKPramuka = $row['total'];}

 $sqlMSKSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && hobi='Memasak'";
 $queryMSKSenior = $db_object->db_query($sqlMSKSenior);
 while ($row = $db_object->db_fetch_array($queryMSKSenior)) {
 $dataMSKSenior = $row['total'];}

 $sqlMSKWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && hobi='Memasak'";
 $queryMSKWirausaha = $db_object->db_query($sqlMSKWirausaha);
 while ($row = $db_object->db_fetch_array($queryMSKWirausaha)) {
 $dataMSKWirausaha = $row['total'];}

 // HOBI FOTOGRAFI

 $sqlFTBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && hobi='Fotografi'";
 $queryFTBahasa = $db_object->db_query($sqlFTBahasa);
 while ($row = $db_object->db_fetch_array($queryFTBahasa)) {
 $dataFTBahasa = $row['total'];}

 $sqlFTKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && hobi='Fotografi'";
 $queryFTKemanusiaan = $db_object->db_query($sqlFTKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryFTKemanusiaan)) {
 $dataFTKemanusiaan = $row['total'];}

 $sqlFTMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && hobi ='Fotografi'";
 $queryFTMapala = $db_object->db_query($sqlFTMapala);
 while ($row = $db_object->db_fetch_array($queryFTMapala)) {
 $dataFTMapala = $row['total'];}

 $sqlFTPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && hobi='Fotografi'";
 $queryFTPersma = $db_object->db_query($sqlFTPersma);
 while ($row = $db_object->db_fetch_array($queryFTPersma)) {
 $dataFTPersma = $row['total'];}

 $sqlFTPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && hobi='Fotografi'";
 $queryFTPramuka = $db_object->db_query($sqlFTPramuka);
 while ($row = $db_object->db_fetch_array($queryFTPramuka)) {
 $dataFTPramuka = $row['total'];}

 $sqlFTSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && hobi='Fotografi'";
 $queryFTSenior = $db_object->db_query($sqlFTSenior);
 while ($row = $db_object->db_fetch_array($queryFTSenior)) {
 $dataFTSenior = $row['total'];}

 $sqlFTWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && hobi='Fotografi'";
 $queryFTWirausaha = $db_object->db_query($sqlFTWirausaha);
 while ($row = $db_object->db_fetch_array($queryFTWirausaha)) {
 $dataFTWirausaha = $row['total'];}

 // HOBI SEPAK BOLA

 $sqlSBBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && hobi='Sepak Bola'";
 $querySBBahasa = $db_object->db_query($sqlSBBahasa);
 while ($row = $db_object->db_fetch_array($querySBBahasa)) {
 $dataSBBahasa = $row['total'];}

 $sqlSBKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && hobi='Sepak Bola'";
 $querySBKemanusiaan = $db_object->db_query($sqlSBKemanusiaan);
 while ($row = $db_object->db_fetch_array($querySBKemanusiaan)) {
 $dataSBKemanusiaan = $row['total'];}

 $sqlSBMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && hobi ='Sepak Bola'";
 $querySBMapala = $db_object->db_query($sqlSBMapala);
 while ($row = $db_object->db_fetch_array($querySBMapala)) {
 $dataSBMapala = $row['total'];}

 $sqlSBPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && hobi='Sepak Bola'";
 $querySBPersma = $db_object->db_query($sqlSBPersma);
 while ($row = $db_object->db_fetch_array($querySBPersma)) {
 $dataSBPersma = $row['total'];}

 $sqlSBPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && hobi='Sepak Bola'";
 $querySBPramuka = $db_object->db_query($sqlSBPramuka);
 while ($row = $db_object->db_fetch_array($querySBPramuka)) {
 $dataSBPramuka = $row['total'];}

 $sqlSBSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && hobi='Sepak Bola'";
 $querySBSenior = $db_object->db_query($sqlSBSenior);
 while ($row = $db_object->db_fetch_array($querySBSenior)) {
 $dataSBSenior = $row['total'];}

 $sqlSBWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && hobi='Sepak Bola'";
 $querySBWirausaha = $db_object->db_query($sqlSBWirausaha);
 while ($row = $db_object->db_fetch_array($querySBWirausaha)) {
 $dataSBWirausaha = $row['total'];}

 // HOBI BULU TANGKIS

 $sqlBTBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && hobi='Bulu Tangkis'";
 $queryBTBahasa = $db_object->db_query($sqlBTBahasa);
 while ($row = $db_object->db_fetch_array($queryBTBahasa)) {
 $dataBTBahasa = $row['total'];}

 $sqlBTKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && hobi='Bulu Tangkis'";
 $queryBTKemanusiaan = $db_object->db_query($sqlBTKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryBTKemanusiaan)) {
 $dataBTKemanusiaan = $row['total'];}

 $sqlBTMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && hobi ='Bulu Tangkis'";
 $queryBTMapala = $db_object->db_query($sqlBTMapala);
 while ($row = $db_object->db_fetch_array($queryBTMapala)) {
 $dataBTMapala = $row['total'];}

 $sqlBTPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && hobi='Bulu Tangkis'";
 $queryBTPersma = $db_object->db_query($sqlBTPersma);
 while ($row = $db_object->db_fetch_array($queryBTPersma)) {
 $dataBTPersma = $row['total'];}

 $sqlBTPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && hobi='Bulu Tangkis'";
 $queryBTPramuka = $db_object->db_query($sqlBTPramuka);
 while ($row = $db_object->db_fetch_array($queryBTPramuka)) {
 $dataBTPramuka = $row['total'];}

 $sqlBTSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && hobi='Bulu Tangkis'";
 $queryBTSenior = $db_object->db_query($sqlBTSenior);
 while ($row = $db_object->db_fetch_array($queryBTSenior)) {
 $dataBTSenior = $row['total'];}

 $sqlBTWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && hobi='Bulu Tangkis'";
 $queryBTWirausaha = $db_object->db_query($sqlBTWirausaha);
 while ($row = $db_object->db_fetch_array($queryBTWirausaha)) {
 $dataBTWirausaha = $row['total'];}

 // HOBI BASKET

 $sqlBSBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && hobi='Basket'";
 $queryBSBahasa = $db_object->db_query($sqlBSBahasa);
 while ($row = $db_object->db_fetch_array($queryBSBahasa)) {
 $dataBSBahasa = $row['total'];}

 $sqlBSKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && hobi='Basket'";
 $queryBSKemanusiaan = $db_object->db_query($sqlBSKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryBSKemanusiaan)) {
 $dataBSKemanusiaan = $row['total'];}

 $sqlBSMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && hobi ='Basket'";
 $queryBSMapala = $db_object->db_query($sqlBSMapala);
 while ($row = $db_object->db_fetch_array($queryBSMapala)) {
 $dataBSMapala = $row['total'];}

 $sqlBSPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && hobi='Basket'";
 $queryBSPersma = $db_object->db_query($sqlBSPersma);
 while ($row = $db_object->db_fetch_array($queryBSPersma)) {
 $dataBSPersma = $row['total'];}

 $sqlBSPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && hobi='Basket'";
 $queryBSPramuka = $db_object->db_query($sqlBSPramuka);
 while ($row = $db_object->db_fetch_array($queryBSPramuka)) {
 $dataBSPramuka = $row['total'];}

 $sqlBSSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && hobi='Basket'";
 $queryBSSenior = $db_object->db_query($sqlBSSenior);
 while ($row = $db_object->db_fetch_array($queryBSSenior)) {
 $dataBSSenior = $row['total'];}

 $sqlBSWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && hobi='Basket'";
 $queryBSWirausaha = $db_object->db_query($sqlBSWirausaha);
 while ($row = $db_object->db_fetch_array($queryBSWirausaha)) {
 $dataBSWirausaha = $row['total'];}

 // HOBI FUTSAL

 $sqlFSBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && hobi='Basket'";
 $queryFSBahasa = $db_object->db_query($sqlFSBahasa);
 while ($row = $db_object->db_fetch_array($queryFSBahasa)) {
 $dataFSBahasa = $row['total'];}

 $sqlFSKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && hobi='Basket'";
 $queryFSKemanusiaan = $db_object->db_query($sqlFSKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryFSKemanusiaan)) {
 $dataFSKemanusiaan = $row['total'];}

 $sqlFSMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && hobi ='Basket'";
 $queryFSMapala = $db_object->db_query($sqlFSMapala);
 while ($row = $db_object->db_fetch_array($queryFSMapala)) {
 $dataFSMapala = $row['total'];}

 $sqlFSPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && hobi='Basket'";
 $queryFSPersma = $db_object->db_query($sqlFSPersma);
 while ($row = $db_object->db_fetch_array($queryFSPersma)) {
 $dataFSPersma = $row['total'];}

 $sqlFSPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && hobi='Basket'";
 $queryFSPramuka = $db_object->db_query($sqlFSPramuka);
 while ($row = $db_object->db_fetch_array($queryFSPramuka)) {
 $dataFSPramuka = $row['total'];}

 $sqlFSSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && hobi='Basket'";
 $queryFSSenior = $db_object->db_query($sqlFSSenior);
 while ($row = $db_object->db_fetch_array($queryFSSenior)) {
 $dataFSSenior = $row['total'];}

 $sqlFSWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && hobi='Basket'";
 $queryFSWirausaha = $db_object->db_query($sqlFSWirausaha);
 while ($row = $db_object->db_fetch_array($queryFSWirausaha)) {
 $dataFSWirausaha = $row['total'];}

 // HOBI VOLLY

 $sqlVLBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && hobi='Volly'";
 $queryVLBahasa = $db_object->db_query($sqlVLBahasa);
 while ($row = $db_object->db_fetch_array($queryVLBahasa)) {
 $dataVLBahasa = $row['total'];}

 $sqlVLKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && hobi='Volly'";
 $queryVLKemanusiaan = $db_object->db_query($sqlVLKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryVLKemanusiaan)) {
 $dataVLKemanusiaan = $row['total'];}

 $sqlVLMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && hobi ='Volly'";
 $queryVLMapala = $db_object->db_query($sqlVLMapala);
 while ($row = $db_object->db_fetch_array($queryVLMapala)) {
 $dataVLMapala = $row['total'];}

 $sqlVLPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && hobi='Volly'";
 $queryVLPersma = $db_object->db_query($sqlVLPersma);
 while ($row = $db_object->db_fetch_array($queryVLPersma)) {
 $dataVLPersma = $row['total'];}

 $sqlVLPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && hobi='Volly'";
 $queryVLPramuka = $db_object->db_query($sqlVLPramuka);
 while ($row = $db_object->db_fetch_array($queryVLPramuka)) {
 $dataVLPramuka = $row['total'];}

 $sqlVLSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && hobi='Volly'";
 $queryVLSenior = $db_object->db_query($sqlVLSenior);
 while ($row = $db_object->db_fetch_array($queryVLSenior)) {
 $dataVLSenior = $row['total'];}

 $sqlVLWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && hobi='Volly'";
 $queryVLWirausaha = $db_object->db_query($sqlVLWirausaha);
 while ($row = $db_object->db_fetch_array($queryVLWirausaha)) {
 $dataVLWirausaha = $row['total'];}

 // HOBI BELAJAR MATEMATIKA

 $sqlBMBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && hobi='Belajar Matematika'";
 $queryBMBahasa = $db_object->db_query($sqlBMBahasa);
 while ($row = $db_object->db_fetch_array($queryBMBahasa)) {
 $dataBMBahasa = $row['total'];}

 $sqlBMKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && hobi='Belajar Matematika'";
 $queryBMKemanusiaan = $db_object->db_query($sqlBMKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryBMKemanusiaan)) {
 $dataBMKemanusiaan = $row['total'];}

 $sqlBMMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && hobi ='Belajar Matematika'";
 $queryBMMapala = $db_object->db_query($sqlBMMapala);
 while ($row = $db_object->db_fetch_array($queryBMMapala)) {
 $dataBMMapala = $row['total'];}

 $sqlBMPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && hobi='Belajar Matematika'";
 $queryBMPersma = $db_object->db_query($sqlBMPersma);
 while ($row = $db_object->db_fetch_array($queryBMPersma)) {
 $dataBMPersma = $row['total'];}

 $sqlBMPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && hobi='Belajar Matematika'";
 $queryBMPramuka = $db_object->db_query($sqlBMPramuka);
 while ($row = $db_object->db_fetch_array($queryBMPramuka)) {
 $dataBMPramuka = $row['total'];}

 $sqlBMSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && hobi='Belajar Matematika'";
 $queryBMSenior = $db_object->db_query($sqlBMSenior);
 while ($row = $db_object->db_fetch_array($queryBMSenior)) {
 $dataBMSenior = $row['total'];}

 $sqlBMWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && hobi='Belajar Matematika'";
 $queryBMWirausaha = $db_object->db_query($sqlBMWirausaha);
 while ($row = $db_object->db_fetch_array($queryBMWirausaha)) {
 $dataBMWirausaha = $row['total'];}

 // HOBI OLAHRAGA

 $sqlO3Bahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && hobi='Olahraga'";
 $queryO3Bahasa = $db_object->db_query($sqlO3Bahasa);
 while ($row = $db_object->db_fetch_array($queryO3Bahasa)) {
 $dataO3Bahasa = $row['total'];}

 $sqlO3Kemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && hobi='Olahraga'";
 $queryO3Kemanusiaan = $db_object->db_query($sqlO3Kemanusiaan);
 while ($row = $db_object->db_fetch_array($queryO3Kemanusiaan)) {
 $dataO3Kemanusiaan = $row['total'];}

 $sqlO3Mapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && hobi ='Olahraga'";
 $queryO3Mapala = $db_object->db_query($sqlO3Mapala);
 while ($row = $db_object->db_fetch_array($queryO3Mapala)) {
 $dataO3Mapala = $row['total'];}

 $sqlO3Persma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && hobi='Olahraga'";
 $queryO3Persma = $db_object->db_query($sqlO3Persma);
 while ($row = $db_object->db_fetch_array($queryO3Persma)) {
 $dataO3Persma = $row['total'];}

 $sqlO3Pramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && hobi='Olahraga'";
 $queryO3Pramuka = $db_object->db_query($sqlO3Pramuka);
 while ($row = $db_object->db_fetch_array($queryO3Pramuka)) {
 $dataO3Pramuka = $row['total'];}

 $sqlO3Senior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && hobi='Olahraga'";
 $queryO3Senior = $db_object->db_query($sqlO3Senior);
 while ($row = $db_object->db_fetch_array($queryO3Senior)) {
 $dataO3Senior = $row['total'];}

 $sqlO3Wirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && hobi='Olahraga'";
 $queryO3Wirausaha = $db_object->db_query($sqlO3Wirausaha);
 while ($row = $db_object->db_fetch_array($queryO3Wirausaha)) {
 $dataO3Wirausaha = $row['total'];}

 // HOBI MEMBACA
 $sqlMBCBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && hobi='Membaca'";
 $queryMBCBahasa = $db_object->db_query($sqlMBCBahasa);
 while ($row = $db_object->db_fetch_array($queryMBCBahasa)) {
 $dataMBCBahasa = $row['total'];}

 $sqlMBCKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && hobi='Membaca'";
 $queryMBCKemanusiaan = $db_object->db_query($sqlMBCKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryMBCKemanusiaan)) {
 $dataMBCKemanusiaan = $row['total'];}

 $sqlMBCMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && hobi ='Membaca'";
 $queryMBCMapala = $db_object->db_query($sqlMBCMapala);
 while ($row = $db_object->db_fetch_array($queryMBCMapala)) {
 $dataMBCMapala = $row['total'];}

 $sqlMBCPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && hobi='Membaca'";
 $queryMBCPersma = $db_object->db_query($sqlMBCPersma);
 while ($row = $db_object->db_fetch_array($queryMBCPersma)) {
 $dataMBCPersma = $row['total'];}

 $sqlMBCPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && hobi='Membaca'";
 $queryMBCPramuka = $db_object->db_query($sqlMBCPramuka);
 while ($row = $db_object->db_fetch_array($queryMBCPramuka)) {
 $dataMBCPramuka = $row['total'];}

 $sqlMBCSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && hobi='Membaca'";
 $queryMBCSenior = $db_object->db_query($sqlMBCSenior);
 while ($row = $db_object->db_fetch_array($queryMBCSenior)) {
 $dataMBCSenior = $row['total'];}

 $sqlMBCWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && hobi='Membaca'";
 $queryMBCWirausaha = $db_object->db_query($sqlMBCWirausaha);
 while ($row = $db_object->db_fetch_array($queryMBCWirausaha)) {
 $dataMBCWirausaha = $row['total'];}

 // HOBI BERMAIN MUSIK

 $sqlBRMBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && hobi='Bermain Musik'";
 $queryBRMBahasa = $db_object->db_query($sqlBRMBahasa);
 while ($row = $db_object->db_fetch_array($queryBRMBahasa)) {
 $dataBRMBahasa = $row['total'];}

 $sqlBRMKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && hobi='Bermain Musik'";
 $queryBRMKemanusiaan = $db_object->db_query($sqlBRMKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryBRMKemanusiaan)) {
 $dataBRMKemanusiaan = $row['total'];}

 $sqlBRMMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && hobi ='Bermain Musik'";
 $queryBRMMapala = $db_object->db_query($sqlBRMMapala);
 while ($row = $db_object->db_fetch_array($queryBRMMapala)) {
 $dataBRMMapala = $row['total'];}

 $sqlBRMPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && hobi='Bermain Musik'";
 $queryBRMPersma = $db_object->db_query($sqlBRMPersma);
 while ($row = $db_object->db_fetch_array($queryBRMPersma)) {
 $dataBRMPersma = $row['total'];}

 $sqlBRMPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && hobi='Bermain Musik'";
 $queryBRMPramuka = $db_object->db_query($sqlBRMPramuka);
 while ($row = $db_object->db_fetch_array($queryBRMPramuka)) {
 $dataBRMPramuka = $row['total'];}

 $sqlBRMSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && hobi='Bermain Musik'";
 $queryBRMSenior = $db_object->db_query($sqlBRMSenior);
 while ($row = $db_object->db_fetch_array($queryBRMSenior)) {
 $dataBRMSenior = $row['total'];}

 $sqlBRMWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && hobi='Bermain Musik'";
 $queryBRMWirausaha = $db_object->db_query($sqlBRMWirausaha);
 while ($row = $db_object->db_fetch_array($queryBRMWirausaha)) {
 $dataBRMWirausaha = $row['total'];}

 // HOBI MENDENGAR MUSIK

 $sqlDMBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && hobi='Mendengar Musik'";
 $queryDMBahasa = $db_object->db_query($sqlDMBahasa);
 while ($row = $db_object->db_fetch_array($queryDMBahasa)) {
 $dataDMBahasa = $row['total'];}

 $sqlDMKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && hobi='Mendengar Musik'";
 $queryDMKemanusiaan = $db_object->db_query($sqlDMKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryDMKemanusiaan)) {
 $dataDMKemanusiaan = $row['total'];}

 $sqlDMMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && hobi ='Mendengar Musik'";
 $queryDMMapala = $db_object->db_query($sqlDMMapala);
 while ($row = $db_object->db_fetch_array($queryDMMapala)) {
 $dataDMMapala = $row['total'];}

 $sqlDMPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && hobi='Mendengar Musik'";
 $queryDMPersma = $db_object->db_query($sqlDMPersma);
 while ($row = $db_object->db_fetch_array($queryDMPersma)) {
 $dataDMPersma = $row['total'];}

 $sqlDMPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && hobi='Mendengar Musik'";
 $queryDMPramuka = $db_object->db_query($sqlDMPramuka);
 while ($row = $db_object->db_fetch_array($queryDMPramuka)) {
 $dataDMPramuka = $row['total'];}

 $sqlDMSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && hobi='Mendengar Musik'";
 $queryDMSenior = $db_object->db_query($sqlDMSenior);
 while ($row = $db_object->db_fetch_array($queryDMSenior)) {
 $dataDMSenior = $row['total'];}

 $sqlDMWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && hobi='Mendengar Musik'";
 $queryDMWirausaha = $db_object->db_query($sqlDMWirausaha);
 while ($row = $db_object->db_fetch_array($queryDMWirausaha)) {
 $dataDMWirausaha = $row['total'];}

 // HOBI NONTON

 $sqlNBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && hobi='Nonton'";
 $queryNBahasa = $db_object->db_query($sqlNBahasa);
 while ($row = $db_object->db_fetch_array($queryNBahasa)) {
 $dataNBahasa = $row['total'];}

 $sqlNKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && hobi='Nonton'";
 $queryNKemanusiaan = $db_object->db_query($sqlNKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryNKemanusiaan)) {
 $dataNKemanusiaan = $row['total'];}

 $sqlNMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && hobi ='Nonton'";
 $queryNMapala = $db_object->db_query($sqlNMapala);
 while ($row = $db_object->db_fetch_array($queryNMapala)) {
 $dataNMapala = $row['total'];}

 $sqlNPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && hobi='Nonton'";
 $queryNPersma = $db_object->db_query($sqlNPersma);
 while ($row = $db_object->db_fetch_array($queryNPersma)) {
 $dataNPersma = $row['total'];}

 $sqlNPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && hobi='Nonton'";
 $queryNPramuka = $db_object->db_query($sqlNPramuka);
 while ($row = $db_object->db_fetch_array($queryNPramuka)) {
 $dataNPramuka = $row['total'];}

 $sqlNSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && hobi='Nonton'";
 $queryNSenior = $db_object->db_query($sqlNSenior);
 while ($row = $db_object->db_fetch_array($queryNSenior)) {
 $dataNSenior = $row['total'];}

 $sqlNWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && hobi='Nonton'";
 $queryNWirausaha = $db_object->db_query($sqlNWirausaha);
 while ($row = $db_object->db_fetch_array($queryNWirausaha)) {
 $dataNWirausaha = $row['total'];}

 // HOBI MAIN GAME

 $sqlMGBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && hobi='Main Game'";
 $queryMGBahasa = $db_object->db_query($sqlMGBahasa);
 while ($row = $db_object->db_fetch_array($queryMGBahasa)) {
 $dataMGBahasa = $row['total'];}

 $sqlMGKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && hobi='Main Game'";
 $queryMGKemanusiaan = $db_object->db_query($sqlMGKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryMGKemanusiaan)) {
 $dataMGKemanusiaan = $row['total'];}

 $sqlMGMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && hobi ='Main Game'";
 $queryMGMapala = $db_object->db_query($sqlMGMapala);
 while ($row = $db_object->db_fetch_array($queryMGMapala)) {
 $dataMGMapala = $row['total'];}

 $sqlMGPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && hobi='Main Game'";
 $queryMGPersma = $db_object->db_query($sqlMGPersma);
 while ($row = $db_object->db_fetch_array($queryMGPersma)) {
 $dataMGPersma = $row['total'];}

 $sqlMGPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && hobi='Main Game'";
 $queryMGPramuka = $db_object->db_query($sqlMGPramuka);
 while ($row = $db_object->db_fetch_array($queryMGPramuka)) {
 $dataMGPramuka = $row['total'];}

 $sqlMGSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && hobi='Main Game'";
 $queryMGSenior = $db_object->db_query($sqlMGSenior);
 while ($row = $db_object->db_fetch_array($queryMGSenior)) {
 $dataMGSenior = $row['total'];}

 $sqlMGWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && hobi='Main Game'";
 $queryMGWirausaha = $db_object->db_query($sqlMGWirausaha);
 while ($row = $db_object->db_fetch_array($queryMGWirausaha)) {
 $dataMGWirausaha = $row['total'];}

 // HOBI JALAN JALAN

 $sqlJJBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && hobi='Jalan-Jalan'";
 $queryJJBahasa = $db_object->db_query($sqlJJBahasa);
 while ($row = $db_object->db_fetch_array($queryJJBahasa)) {
 $dataJJBahasa = $row['total'];}

 $sqlJJKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && hobi='Jalan-Jalan'";
 $queryJJKemanusiaan = $db_object->db_query($sqlJJKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryJJKemanusiaan)) {
 $dataJJKemanusiaan = $row['total'];}

 $sqlJJMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && hobi ='Jalan-Jalan'";
 $queryJJMapala = $db_object->db_query($sqlJJMapala);
 while ($row = $db_object->db_fetch_array($queryJJMapala)) {
 $dataJJMapala = $row['total'];}

 $sqlJJPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && hobi='Jalan-Jalan'";
 $queryJJPersma = $db_object->db_query($sqlJJPersma);
 while ($row = $db_object->db_fetch_array($queryJJPersma)) {
 $dataJJPersma = $row['total'];}

 $sqlJJPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && hobi='Jalan-Jalan'";
 $queryJJPramuka = $db_object->db_query($sqlJJPramuka);
 while ($row = $db_object->db_fetch_array($queryJJPramuka)) {
 $dataJJPramuka = $row['total'];}

 $sqlJJSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && hobi='Jalan-Jalan'";
 $queryJJSenior = $db_object->db_query($sqlJJSenior);
 while ($row = $db_object->db_fetch_array($queryJJSenior)) {
 $dataJJSenior = $row['total'];}

 $sqlJJWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && hobi='Jalan-Jalan'";
 $queryJJWirausaha = $db_object->db_query($sqlJJWirausaha);
 while ($row = $db_object->db_fetch_array($queryJJWirausaha)) {
 $dataJJWirausaha = $row['total'];}

 // HOBI BELAJAR BAHASA ASING BARU

 $sqlBBABBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && hobi='Belajar Bahasa Asing Baru '";
 $queryBBABBahasa = $db_object->db_query($sqlBBABBahasa);
 while ($row = $db_object->db_fetch_array($queryBBABBahasa)) {
 $dataBBABBahasa = $row['total'];}

 $sqlBBABKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && hobi='Belajar Bahasa Asing Baru'";
 $queryBBABKemanusiaan = $db_object->db_query($sqlBBABKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryBBABKemanusiaan)) {
 $dataBBABKemanusiaan = $row['total'];}

 $sqlBBABMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && hobi ='Belajar Bahasa Asing Baru'";
 $queryBBABMapala = $db_object->db_query($sqlBBABMapala);
 while ($row = $db_object->db_fetch_array($queryBBABMapala)) {
 $dataBBABMapala = $row['total'];}

 $sqlBBABPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && hobi='Belajar Bahasa Asing Baru'";
 $queryBBABPersma = $db_object->db_query($sqlBBABPersma);
 while ($row = $db_object->db_fetch_array($queryBBABPersma)) {
 $dataBBABPersma = $row['total'];}

 $sqlBBABPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && hobi='Belajar Bahasa Asing Baru'";
 $queryBBABPramuka = $db_object->db_query($sqlBBABPramuka);
 while ($row = $db_object->db_fetch_array($queryBBABPramuka)) {
 $dataBBABPramuka = $row['total'];}

 $sqlBBABSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && hobi='Belajar Bahasa Asing Baru'";
 $queryBBABSenior = $db_object->db_query($sqlBBABSenior);
 while ($row = $db_object->db_fetch_array($queryBBABSenior)) {
 $dataBBABSenior = $row['total'];}

 $sqlBBABWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && hobi='Belajar Bahasa Asing Baru'";
 $queryBBABWirausaha = $db_object->db_query($sqlBBABWirausaha);
 while ($row = $db_object->db_fetch_array($queryBBABWirausaha)) {
 $dataBBABWirausaha = $row['total'];}

 // HOBI MELUKIS

 $sqlMLSBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && hobi='Melukis'";
 $queryMLSBahasa = $db_object->db_query($sqlMLSBahasa);
 while ($row = $db_object->db_fetch_array($queryMLSBahasa)) {
 $dataMLSBahasa = $row['total'];}

 $sqlMLSKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && hobi='Melukis'";
 $queryMLSKemanusiaan = $db_object->db_query($sqlMLSKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryMLSKemanusiaan)) {
 $dataMLSKemanusiaan = $row['total'];}

 $sqlMLSMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && hobi ='Melukis'";
 $queryMLSMapala = $db_object->db_query($sqlMLSMapala);
 while ($row = $db_object->db_fetch_array($queryMLSMapala)) {
 $dataMLSMapala = $row['total'];}

 $sqlMLSPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && hobi='Melukis'";
 $queryMLSPersma = $db_object->db_query($sqlMLSPersma);
 while ($row = $db_object->db_fetch_array($queryMLSPersma)) {
 $dataMLSPersma = $row['total'];}

 $sqlMLSPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && hobi='Melukis'";
 $queryMLSPramuka = $db_object->db_query($sqlMLSPramuka);
 while ($row = $db_object->db_fetch_array($queryMLSPramuka)) {
 $dataMLSPramuka = $row['total'];}

 $sqlMLSSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && hobi='Melukis'";
 $queryMLSSenior = $db_object->db_query($sqlMLSSenior);
 while ($row = $db_object->db_fetch_array($queryMLSSenior)) {
 $dataMLSSenior = $row['total'];}

 $sqlMLSWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && hobi='Melukis'";
 $queryMLSWirausaha = $db_object->db_query($sqlMLSWirausaha);
 while ($row = $db_object->db_fetch_array($queryMLSWirausaha)) {
 $dataMLSWirausaha = $row['total'];}

 // HOBI BERENANG

 $sqlBRNBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && hobi='Berenang'";
 $queryBRNBahasa = $db_object->db_query($sqlBRNBahasa);
 while ($row = $db_object->db_fetch_array($queryBRNBahasa)) {
 $dataBRNBahasa = $row['total'];}

 $sqlBRNKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && hobi='Berenang'";
 $queryBRNKemanusiaan = $db_object->db_query($sqlBRNKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryBRNKemanusiaan)) {
 $dataBRNKemanusiaan = $row['total'];}

 $sqlBRNMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && hobi ='Berenang'";
 $queryBRNMapala = $db_object->db_query($sqlBRNMapala);
 while ($row = $db_object->db_fetch_array($queryBRNMapala)) {
 $dataBRNMapala = $row['total'];}

 $sqlBRNPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && hobi='Berenang'";
 $queryBRNPersma = $db_object->db_query($sqlBRNPersma);
 while ($row = $db_object->db_fetch_array($queryBRNPersma)) {
 $dataBRNPersma = $row['total'];}

 $sqlBRNPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && hobi='Berenang'";
 $queryBRNPramuka = $db_object->db_query($sqlBRNPramuka);
 while ($row = $db_object->db_fetch_array($queryBRNPramuka)) {
 $dataBRNPramuka = $row['total'];}

 $sqlBRNSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && hobi='Berenang'";
 $queryBRNSenior = $db_object->db_query($sqlBRNSenior);
 while ($row = $db_object->db_fetch_array($queryBRNSenior)) {
 $dataBRNSenior = $row['total'];}

 $sqlBRNWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && hobi='Berenang'";
 $queryBRNWirausaha = $db_object->db_query($sqlBRNWirausaha);
 while ($row = $db_object->db_fetch_array($queryBRNWirausaha)) {
 $dataBRNWirausaha = $row['total'];}

 // HOBI NAIK GUNUNG

 $sqlNGBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && hobi='Naik Gunung'";
 $queryNGBahasa = $db_object->db_query($sqlNGBahasa);
 while ($row = $db_object->db_fetch_array($queryNGBahasa)) {
 $dataNGBahasa = $row['total'];}

 $sqlNGKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && hobi='Naik Gunung'";
 $queryNGKemanusiaan = $db_object->db_query($sqlNGKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryNGKemanusiaan)) {
 $dataNGKemanusiaan = $row['total'];}

 $sqlNGMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && hobi ='Naik Gunung'";
 $queryNGMapala = $db_object->db_query($sqlNGMapala);
 while ($row = $db_object->db_fetch_array($queryNGMapala)) {
 $dataNGMapala = $row['total'];}

 $sqlNGPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && hobi='Naik Gunung'";
 $queryNGPersma = $db_object->db_query($sqlNGPersma);
 while ($row = $db_object->db_fetch_array($queryNGPersma)) {
 $dataNGPersma = $row['total'];}

 $sqlNGPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && hobi='Naik Gunung'";
 $queryNGPramuka = $db_object->db_query($sqlNGPramuka);
 while ($row = $db_object->db_fetch_array($queryNGPramuka)) {
 $dataNGPramuka = $row['total'];}

 $sqlNGSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && hobi='Naik Gunung'";
 $queryNGSenior = $db_object->db_query($sqlNGSenior);
 while ($row = $db_object->db_fetch_array($queryNGSenior)) {
 $dataNGSenior = $row['total'];}

 $sqlNGWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && hobi='Naik Gunung'";
 $queryNGWirausaha = $db_object->db_query($sqlNGWirausaha);
 while ($row = $db_object->db_fetch_array($queryNGWirausaha)) {
 $dataNGWirausaha = $row['total'];}

 // HOBI TRAVELLING

 $sqlTRBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && hobi='Travelling'";
 $queryTRBahasa = $db_object->db_query($sqlTRBahasa);
 while ($row = $db_object->db_fetch_array($queryTRBahasa)) {
 $dataTRBahasa = $row['total'];}

 $sqlTRKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && hobi='Travelling'";
 $queryTRKemanusiaan = $db_object->db_query($sqlTRKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryTRKemanusiaan)) {
 $dataTRKemanusiaan = $row['total'];}

 $sqlTRMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && hobi ='Travelling'";
 $queryTRMapala = $db_object->db_query($sqlTRMapala);
 while ($row = $db_object->db_fetch_array($queryTRMapala)) {
 $dataTRMapala = $row['total'];}

 $sqlTRPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && hobi='Travelling'";
 $queryTRPersma = $db_object->db_query($sqlTRPersma);
 while ($row = $db_object->db_fetch_array($queryTRPersma)) {
 $dataTRPersma = $row['total'];}

 $sqlTRPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && hobi='Travelling'";
 $queryTRPramuka = $db_object->db_query($sqlTRPramuka);
 while ($row = $db_object->db_fetch_array($queryTRPramuka)) {
 $dataTRPramuka = $row['total'];}

 $sqlTRSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && hobi='Travelling'";
 $queryTRSenior = $db_object->db_query($sqlTRSenior);
 while ($row = $db_object->db_fetch_array($queryTRSenior)) {
 $dataTRSenior = $row['total'];}

 $sqlTRWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && hobi='Travelling'";
 $queryTRWirausaha = $db_object->db_query($sqlTRWirausaha);
 while ($row = $db_object->db_fetch_array($queryTRWirausaha)) {
 $dataTRWirausaha = $row['total'];}

 // HOBI DESAIN GRAFIS

 $sqlDGBahasa = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Bahasa' && hobi='Desain Grafis'";
 $queryDGBahasa = $db_object->db_query($sqlDGBahasa);
 while ($row = $db_object->db_fetch_array($queryDGBahasa)) {
 $dataDGBahasa = $row['total'];}

 $sqlDGKemanusiaan = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Kemanusiaan (ksr, humaniora)' && hobi='Desain Grafis'";
 $queryDGKemanusiaan = $db_object->db_query($sqlDGKemanusiaan);
 while ($row = $db_object->db_fetch_array($queryDGKemanusiaan)) {
 $dataDGKemanusiaan = $row['total'];}

 $sqlDGMapala = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pecinta Alam (MAPALA)' && hobi ='Desain Grafis'";
 $queryDGMapala = $db_object->db_query($sqlDGMapala);
 while ($row = $db_object->db_fetch_array($queryDGMapala)) {
 $dataDGMapala = $row['total'];}

 $sqlDGPersma = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Persma' && hobi='Desain Grafis'";
 $queryDGPersma = $db_object->db_query($sqlDGPersma);
 while ($row = $db_object->db_fetch_array($queryDGPersma)) {
 $dataDGPersma = $row['total'];}

 $sqlDGPramuka = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Pramuka' && hobi='Desain Grafis'";
 $queryDGPramuka = $db_object->db_query($sqlDGPramuka);
 while ($row = $db_object->db_fetch_array($queryDGPramuka)) {
 $dataDGPramuka = $row['total'];}

 $sqlDGSenior = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='SENIOR (senior, bola, karate, taekwondo)' && hobi='Desain Grafis'";
 $queryDGSenior = $db_object->db_query($sqlDGSenior);
 while ($row = $db_object->db_fetch_array($queryDGSenior)) {
 $dataDGSenior = $row['total'];}

 $sqlDGWirausaha = "SELECT label, count(id) AS total FROM tb_data_training WHERE label='Wirausaha' && hobi='Desain Grafis'";
 $queryDGWirausaha = $db_object->db_query($sqlDGWirausaha);
 while ($row = $db_object->db_fetch_array($queryDGWirausaha)) {
 $dataDGWirausaha = $row['total'];}   


  $prob_bahasa = $dataBahasa / $total;
  $prob_kemanusiaan = $dataKemanusiaan / $total;
  $prob_mapala = $dataMapala / $total;
  $prob_persma = $dataPersma / $total;
  $prob_pramuka = $dataPramuka / $total;
  $prob_senior = $dataSenior / $total;
  $prob_wirausaha = $dataWirausaha / $total;

  #===========Jurusan==============
  $anb = $dataANBahasa/$dataBahasa;
  $ank = $dataANKemanusiaan/$dataKemanusiaan;
  $anm = $dataANMapala/$dataMapala;
  $anp = $dataANPersma/$dataPersma;
  $anpr = $dataANPramuka/$dataPramuka;
  $ans = $dataANSenior/$dataSenior;
  $anw = $dataANWirausaha/$dataWirausaha;

  $akb = $dataAKBahasa/$dataBahasa;
  $akk = $dataAKKemanusiaan/$dataKemanusiaan;
  $akm = $dataAKMapala/$dataMapala;
  $akp = $dataAKPersma/$dataPersma;
  $akpr = $dataAKPramuka/$dataPramuka;
  $aks = $dataAKSenior/$dataSenior;
  $akw = $dataAKWirausaha/$dataWirausaha;

  $teb = $dataTEBahasa/$dataBahasa;
  $tek = $dataTEKemanusiaan/$dataKemanusiaan;
  $tem = $dataTEMapala/$dataMapala;
  $tep = $dataTEPersma/$dataPersma;
  $tepr = $dataTEPramuka/$dataPramuka;
  $tes = $dataTESenior/$dataSenior;
  $tew = $dataTEWirausaha/$dataWirausaha;

  $tkb = $dataTKBahasa/$dataBahasa;
  $tkk = $dataTKKemanusiaan/$dataKemanusiaan;
  $tkm = $dataTKMapala/$dataMapala;
  $tkp = $dataTKPersma/$dataPersma;
  $tkpr = $dataTKPramuka/$dataPramuka;
  $tks = $dataTKSenior/$dataSenior;
  $tkw = $dataTKWirausaha/$dataWirausaha;

  $tmb = $dataTMBahasa/$dataBahasa;
  $tmk = $dataTMKemanusiaan/$dataKemanusiaan;
  $tmm = $dataTMMapala/$dataMapala;
  $tmp = $dataTMPersma/$dataPersma;
  $tmpr = $dataTMPramuka/$dataPramuka;
  $tms = $dataTMSenior/$dataSenior;
  $tmw = $dataTMWirausaha/$dataWirausaha;

  $tsb = $dataTSBahasa/$dataBahasa;
  $tsk = $dataTSKemanusiaan/$dataKemanusiaan;
  $tsm = $dataTSMapala/$dataMapala;
  $tsp = $dataTSPersma/$dataPersma;
  $tspr = $dataTSPramuka/$dataPramuka;
  $tss = $dataTSSenior/$dataSenior;
  $tsw = $dataTSWirausaha/$dataWirausaha;

  #=============Prodi=================

  $abb = $dataABBahasa/$dataBahasa;
  $abk = $dataABKemanusiaan/$dataKemanusiaan;
  $abm = $dataABMapala/$dataMapala;
  $abp = $dataABPersma/$dataPersma;
  $abpr = $dataABPramuka/$dataPramuka;
  $abs = $dataABSenior/$dataSenior;
  $abw = $dataABWirausaha/$dataWirausaha;

  $ak1b = $dataAK1Bahasa/$dataBahasa;
  $ak1k = $dataAK1Kemanusiaan/$dataKemanusiaan;
  $ak1m = $dataAK1Mapala/$dataMapala;
  $ak1p = $dataAK1Persma/$dataPersma;
  $ak1pr = $dataAK1Pramuka/$dataPramuka;
  $ak1s = $dataAK1Senior/$dataSenior;
  $ak1w = $dataAK1Wirausaha/$dataWirausaha;

  $ankb = $dataANKBahasa/$dataBahasa;
  $ankk = $dataANKKemanusiaan/$dataKemanusiaan;
  $ankm = $dataANKMapala/$dataMapala;
  $ankp = $dataANKPersma/$dataPersma;
  $ankpr = $dataANKPramuka/$dataPramuka;
  $anks = $dataANKSenior/$dataSenior;
  $ankw = $dataANKWirausaha/$dataWirausaha;

  $telb = $dataTELBahasa/$dataBahasa;
  $telk = $dataTELKemanusiaan/$dataKemanusiaan;
  $telm = $dataTELMapala/$dataMapala;
  $telp = $dataTELPersma/$dataPersma;
  $telpr = $dataTELPramuka/$dataPramuka;
  $tels = $dataTELSenior/$dataSenior;
  $telw = $dataTELWirausaha/$dataWirausaha;

  $tk1b = $dataTK1Bahasa/$dataBahasa;
  $tk1k = $dataTK1Kemanusiaan/$dataKemanusiaan;
  $tk1m = $dataTK1Mapala/$dataMapala;
  $tk1p = $dataTK1Persma/$dataPersma;
  $tk1pr = $dataTK1Pramuka/$dataPramuka;
  $tk1s = $dataTK1Senior/$dataSenior;
  $tk1w = $dataTK1Wirausaha/$dataWirausaha;

  $tkmb = $dataTKMBahasa/$dataBahasa;
  $tkmk = $dataTKMKemanusiaan/$dataKemanusiaan;
  $tkmm = $dataTKMMapala/$dataMapala;
  $tkmp = $dataTKMPersma/$dataPersma;
  $tkmpr = $dataTKMPramuka/$dataPramuka;
  $tkms = $dataTKMSenior/$dataSenior;
  $tkmw = $dataTKMWirausaha/$dataWirausaha;

  $tksb = $dataTKSBahasa/$dataBahasa;
  $tksk = $dataTKSKemanusiaan/$dataKemanusiaan;
  $tksm = $dataTKSMapala/$dataMapala;
  $tksp = $dataTKSPersma/$dataPersma;
  $tkspr = $dataTKSPramuka/$dataPramuka;
  $tkss = $dataTKSSenior/$dataSenior;
  $tksw = $dataTKSWirausaha/$dataWirausaha;

  $tkgb = $dataTKGBahasa/$dataBahasa;
  $tkgk = $dataTKGKemanusiaan/$dataKemanusiaan;
  $tkgm = $dataTKGMapala/$dataMapala;
  $tkgp = $dataTKGPersma/$dataPersma;
  $tkgpr = $dataTKGPramuka/$dataPramuka;
  $tkgs = $dataTKGSenior/$dataSenior;
  $tkgw = $dataTKGWirausaha/$dataWirausaha;

  $tkjjb = $dataTKJJBahasa/$dataBahasa;
  $tkjjk = $dataTKJJKemanusiaan/$dataKemanusiaan;
  $tkjjm = $dataTKJJMapala/$dataMapala;
  $tkjjp = $dataTKJJPersma/$dataPersma;
  $tkjjpr = $dataTKJJPramuka/$dataPramuka;
  $tkjjs = $dataTKJJSenior/$dataSenior;
  $tkjjw = $dataTKJJWirausaha/$dataWirausaha;

  $tkeb = $dataTKEBahasa/$dataBahasa;
  $tkek = $dataTKEKemanusiaan/$dataKemanusiaan;
  $tkem = $dataTKEMapala/$dataMapala;
  $tkep = $dataTKEPersma/$dataPersma;
  $tkepr = $dataTKEPramuka/$dataPramuka;
  $tkes = $dataTKESenior/$dataSenior;
  $tkew = $dataTKEWirausaha/$dataWirausaha;

  $tlb = $dataTLBahasa/$dataBahasa;
  $tlk = $dataTLKemanusiaan/$dataKemanusiaan;
  $tlm = $dataTLMapala/$dataMapala;
  $tlp = $dataTLPersma/$dataPersma;
  $tlpr = $dataTLPramuka/$dataPramuka;
  $tls = $dataTLSenior/$dataSenior;
  $tlw = $dataTLWirausaha/$dataWirausaha;

  $tmkb = $dataTMKBahasa/$dataBahasa;
  $tmkk = $dataTMKKemanusiaan/$dataKemanusiaan;
  $tmkm = $dataTMKMapala/$dataMapala;
  $tmkp = $dataTMKPersma/$dataPersma;
  $tmkpr = $dataTMKPramuka/$dataPramuka;
  $tmks = $dataTMKSenior/$dataSenior;
  $tmkw = $dataTMKWirausaha/$dataWirausaha;

  $tm1b = $dataTM1Bahasa/$dataBahasa;
  $tm1k = $dataTM1Kemanusiaan/$dataKemanusiaan;
  $tm1m = $dataTM1Mapala/$dataMapala;
  $tm1p = $dataTM1Persma/$dataPersma;
  $tm1pr = $dataTM1Pramuka/$dataPramuka;
  $tm1s = $dataTM1Senior/$dataSenior;
  $tm1w = $dataTM1Wirausaha/$dataWirausaha;

  $tob = $dataTOBahasa/$dataBahasa;
  $tok = $dataTOKemanusiaan/$dataKemanusiaan;
  $tom = $dataTOMapala/$dataMapala;
  $top = $dataTOPersma/$dataPersma;
  $topr = $dataTOPramuka/$dataPramuka;
  $tos = $dataTOSenior/$dataSenior;
  $tow = $dataTOWirausaha/$dataWirausaha;

  $tpabb = $dataTPABBahasa/$dataBahasa;
  $tpabk = $dataTPABKemanusiaan/$dataKemanusiaan;
  $tpabm = $dataTPABMapala/$dataMapala;
  $tpabp = $dataTPABPersma/$dataPersma;
  $tpabpr = $dataTPABPramuka/$dataPramuka;
  $tpabs = $dataTPABSenior/$dataSenior;
  $tpabw = $dataTPABWirausaha/$dataWirausaha;

  $ts1b = $dataTS1Bahasa/$dataBahasa;
  $ts1k = $dataTS1Kemanusiaan/$dataKemanusiaan;
  $ts1m = $dataTS1Mapala/$dataMapala;
  $ts1p = $dataTS1Persma/$dataPersma;
  $ts1pr = $dataTS1Pramuka/$dataPramuka;
  $ts1s = $dataTS1Senior/$dataSenior;
  $ts1w = $dataTS1Wirausaha/$dataWirausaha;

  $ttlb = $dataTTLBahasa/$dataBahasa;
  $ttlk = $dataTTLKemanusiaan/$dataKemanusiaan;
  $ttlm = $dataTTLMapala/$dataMapala;
  $ttlp = $dataTTLPersma/$dataPersma;
  $ttlpr = $dataTTLPramuka/$dataPramuka;
  $ttls = $dataTTLSenior/$dataSenior;
  $ttlw = $dataTTLWirausaha/$dataWirausaha;

  $akmb = $dataAKMBahasa/$dataBahasa;
  $akmk = $dataAKMKemanusiaan/$dataKemanusiaan;
  $akmm = $dataAKMMapala/$dataMapala;
  $akmp = $dataAKMPersma/$dataPersma;
  $akmpr = $dataAKMPramuka/$dataPramuka;
  $akms = $dataAKMSenior/$dataSenior;
  $akmw = $dataAKMWirausaha/$dataWirausaha;

  $tkjb = $dataTKJBahasa/$dataBahasa;
  $tkjk = $dataTKJKemanusiaan/$dataKemanusiaan;
  $tkjm = $dataTKJMapala/$dataMapala;
  $tkjp = $dataTKJPersma/$dataPersma;
  $tkjpr = $dataTKJPramuka/$dataPramuka;
  $tkjs = $dataTKJBahasa/$dataSenior;
  $tkjw = $dataTKJWirausaha/$dataWirausaha;

  $tmfb = $dataTMFBahasa/$dataBahasa;
  $tmfk = $dataTMFKemanusiaan/$dataKemanusiaan;
  $tmfm = $dataTMFMapala/$dataMapala;
  $tmfp = $dataTMFPersma/$dataPersma;
  $tmfpr = $dataTMFPramuka/$dataPramuka;
  $tmfs = $dataTMFSenior/$dataSenior;
  $tmfw = $dataTMFWirausaha/$dataWirausaha;

  $tmjb = $dataTMJBahasa/$dataBahasa;
  $tmjk = $dataTMJKemanusiaan/$dataKemanusiaan;
  $tmjm = $dataTMJMapala/$dataMapala;
  $tmjp = $dataTMJPersma/$dataPersma;
  $tmjpr = $dataTMJPramuka/$dataPramuka;
  $tmjs = $dataTMJSenior/$dataSenior;
  $tmjw = $dataTMJWirausaha/$dataWirausaha;

  $tpeb = $dataTPEBahasa/$dataBahasa;
  $tpek = $dataTPEKemanusiaan/$dataKemanusiaan;
  $tpem = $dataTPEMapala/$dataMapala;
  $tpep = $dataTPEPersma/$dataPersma;
  $tpepr = $dataTPEPramuka/$dataPramuka;
  $tpes = $dataTPESenior/$dataSenior;
  $tpew = $dataTPEWirausaha/$dataWirausaha;

  $tkib = $dataTKIBahasa/$dataBahasa;
  $tkik = $dataTKIKemanusiaan/$dataKemanusiaan;
  $tkim = $dataTKIMapala/$dataMapala;
  $tkip = $dataTKIPersma/$dataPersma;
  $tkipr = $dataTKIPramuka/$dataPramuka;
  $tkis = $dataTKISenior/$dataSenior;
  $tkiw = $dataTKIWirausaha/$dataWirausaha;

  #===========Minat================
  $bb = $dataBBahasa/$dataBahasa;
  $bk = $dataBKemanusiaan/$dataKemanusiaan;
  $bm = $dataBMapala/$dataMapala;
  $bp = $dataBPersma/$dataPersma;
  $bpr = $dataBPramuka/$dataPramuka;
  $bs = $dataBSenior/$dataSenior;
  $bw = $dataBWirausaha/$dataWirausaha;

  $bdb = $dataBDBahasa/$dataBahasa;
  $bdk = $dataBDKemanusiaan/$dataKemanusiaan;
  $bdm = $dataBDMapala/$dataMapala;
  $bdp = $dataBDPersma/$dataPersma;
  $bdpr = $dataBDPramuka/$dataPramuka;
  $bds = $dataBDSenior/$dataSenior;
  $bdw = $dataBDWirausaha/$dataWirausaha;

  $jb = $dataJBahasa/$dataBahasa;
  $jk = $dataJKemanusiaan/$dataKemanusiaan;
  $jm = $dataJMapala/$dataMapala;
  $jp = $dataJPersma/$dataPersma;
  $jpr = $dataJPramuka/$dataPramuka;
  $js = $dataJSenior/$dataSenior;
  $jw = $dataJWirausaha/$dataWirausaha;

  $kmb = $dataKMBahasa/$dataBahasa;
  $kmk = $dataKMKemanusiaan/$dataKemanusiaan;
  $kmm = $dataKMMapala/$dataMapala;
  $kmp = $dataKMPersma/$dataPersma;
  $kmpr = $dataKMPramuka/$dataPramuka;
  $kms = $dataKMSenior/$dataSenior;
  $kmw = $dataKMWirausaha/$dataWirausaha;

  $ksb = $dataKSBahasa/$dataBahasa;
  $ksk = $dataKSKemanusiaan/$dataKemanusiaan;
  $ksm = $dataKSMapala/$dataMapala;
  $ksp = $dataKSPersma/$dataPersma;
  $kspr = $dataKSPramuka/$dataPramuka;
  $kss = $dataKSSenior/$dataSenior;
  $ksw = $dataKSWirausaha/$dataWirausaha;

  $ob = $dataOBahasa/$dataBahasa;
  $ok = $dataOKemanusiaan/$dataKemanusiaan;
  $om = $dataOMapala/$dataMapala;
  $op = $dataOPersma/$dataPersma;
  $opr = $dataOPramuka/$dataPramuka;
  $os = $dataOSenior/$dataSenior;
  $ow = $dataOWirausaha/$dataWirausaha;

  $pab = $dataPABahasa/$dataBahasa;
  $pak = $dataPAKemanusiaan/$dataKemanusiaan;
  $pam = $dataPAMapala/$dataMapala;
  $pap = $dataPAPersma/$dataPersma;
  $papr = $dataPAPramuka/$dataPramuka;
  $pas = $dataPASenior/$dataSenior;
  $paw = $dataPAWirausaha/$dataWirausaha;

  $pb = $dataPBahasa/$dataBahasa;
  $pk = $dataPKemanusiaan/$dataKemanusiaan;
  $pm = $dataPMapala/$dataMapala;
  $pp = $dataPPersma/$dataPersma;
  $ppr = $dataPPramuka/$dataPramuka;
  $ps = $dataPSenior/$dataSenior;
  $pw = $dataPWirausaha/$dataWirausaha;

  $sb = $dataSBahasa/$dataBahasa;
  $sk = $dataSKemanusiaan/$dataKemanusiaan;
  $sm = $dataSMapala/$dataMapala;
  $sp = $dataSPersma/$dataPersma;
  $spr = $dataSPramuka/$dataPramuka;
  $ss = $dataSSenior/$dataSenior;
  $sw = $dataSWirausaha/$dataWirausaha;

  $wb = $dataWBahasa/$dataBahasa;
  $wk = $dataWKemanusiaan/$dataKemanusiaan;
  $wm = $dataWMapala/$dataMapala;
  $wp = $dataWPersma/$dataPersma;
  $wpr = $dataWPramuka/$dataPramuka;
  $ws = $dataWSenior/$dataSenior;
  $ww = $dataWWirausaha/$dataWirausaha;

  #===========Bakat================
  $b2b = $dataB2Bahasa/$dataBahasa;
  $b2k = $dataB2Kemanusiaan/$dataKemanusiaan;
  $b2m = $dataB2Mapala/$dataMapala;
  $b2p = $dataB2Persma/$dataPersma;
  $b2pr = $dataB2Pramuka/$dataPramuka;
  $b2s = $dataB2Senior/$dataSenior;
  $b2w = $dataB2Wirausaha/$dataWirausaha;

  $lb = $dataLBahasa/$dataBahasa;
  $lk = $dataLKemanusiaan/$dataKemanusiaan;
  $lm = $dataLMapala/$dataMapala;
  $lp = $dataLPersma/$dataPersma;
  $lpr = $dataLPramuka/$dataPramuka;
  $ls = $dataLSenior/$dataSenior;
  $lw = $dataLWirausaha/$dataWirausaha;

  $o2b = $dataO2Bahasa/$dataBahasa;
  $o2k = $dataO2Kemanusiaan/$dataKemanusiaan;
  $o2m = $dataO2Mapala/$dataMapala;
  $o2p = $dataO2Persma/$dataPersma;
  $o2pr = $dataO2Pramuka/$dataPramuka;
  $o2s = $dataO2Senior/$dataSenior;
  $o2w = $dataO2Wirausaha/$dataWirausaha;

  $s2b = $dataS2Bahasa/$dataBahasa;
  $s2k = $dataS2Kemanusiaan/$dataKemanusiaan;
  $s2m = $dataS2Mapala/$dataMapala;
  $s2p = $dataS2Persma/$dataPersma;
  $s2pr = $dataS2Pramuka/$dataPramuka;
  $s2s = $dataS2Senior/$dataSenior;
  $s2w = $dataS2Wirausaha/$dataWirausaha;

  #===========Hobi================
  $mnb = $dataMNBahasa/$dataBahasa;
  $mnk = $dataMNKemanusiaan/$dataKemanusiaan;
  $mnm = $dataMNMapala/$dataMapala;
  $mnp = $dataMNPersma/$dataPersma;
  $mnpr = $dataMNPramuka/$dataPramuka;
  $mns = $dataMNSenior/$dataSenior;
  $mnw = $dataMNWirausaha/$dataWirausaha;

  $mnyb = $dataMNYBahasa/$dataBahasa;
  $mnyk = $dataMNYKemanusiaan/$dataKemanusiaan;
  $mnym = $dataMNYMapala/$dataMapala;
  $mnyp = $dataMNYPersma/$dataPersma;
  $mnypr = $dataMNYPramuka/$dataPramuka;
  $mnys = $dataMNYSenior/$dataSenior;
  $mnyw = $dataMNYWirausaha/$dataWirausaha;

  $mnlsb = $dataMNLSBahasa/$dataBahasa;
  $mnlsk = $dataMNLSKemanusiaan/$dataKemanusiaan;
  $mnlsm = $dataMNLSMapala/$dataMapala;
  $mnlsp = $dataMNLSPersma/$dataPersma;
  $mnlspr = $dataMNLSPramuka/$dataPramuka;
  $mnlss = $dataMNLSSenior/$dataSenior;
  $mnlsw = $dataMNLSWirausaha/$dataWirausaha;

  $mgbb = $dataMGBBahasa/$dataBahasa;
  $mgbk = $dataMGBKemanusiaan/$dataKemanusiaan;
  $mgbm = $dataMGBMapala/$dataMapala;
  $mgbp = $dataMGBPersma/$dataPersma;
  $mgbpr = $dataMGBPramuka/$dataPramuka;
  $mgbs = $dataMGBSenior/$dataSenior;
  $mgbw = $dataMGBWirausaha/$dataWirausaha;

  $mskb = $dataMSKBahasa/$dataBahasa;
  $mskk = $dataMSKKemanusiaan/$dataKemanusiaan;
  $mskm = $dataMSKMapala/$dataMapala;
  $mskp = $dataMSKPersma/$dataPersma;
  $mskpr = $dataMSKPramuka/$dataPramuka;
  $msks = $dataMSKSenior/$dataSenior;
  $mskw = $dataMSKWirausaha/$dataWirausaha;

  $ftb = $dataFTBahasa/$dataBahasa;
  $ftk = $dataFTKemanusiaan/$dataKemanusiaan;
  $ftm = $dataFTMapala/$dataMapala;
  $ftp = $dataFTPersma/$dataPersma;
  $ftpr = $dataFTPramuka/$dataPramuka;
  $fts = $dataFTSenior/$dataSenior;
  $ftw = $dataFTWirausaha/$dataWirausaha;

  $sbb = $dataSBBahasa/$dataBahasa;
  $sbk = $dataSBKemanusiaan/$dataKemanusiaan;
  $sbm = $dataSBMapala/$dataMapala;
  $sbp = $dataSBPersma/$dataPersma;
  $sbpr = $dataSBPramuka/$dataPramuka;
  $sbs = $dataSBSenior/$dataSenior;
  $sbw = $dataSBWirausaha/$dataWirausaha;

  $btb = $dataBTBahasa/$dataBahasa;
  $btk = $dataBTKemanusiaan/$dataKemanusiaan;
  $btm = $dataBTMapala/$dataMapala;
  $btp = $dataBTPersma/$dataPersma;
  $btpr = $dataBTPramuka/$dataPramuka;
  $bts = $dataBTSenior/$dataSenior;
  $btw = $dataBTWirausaha/$dataWirausaha;

  $bsb = $dataBSBahasa/$dataBahasa;
  $bsk = $dataBSKemanusiaan/$dataKemanusiaan;
  $bsm = $dataBSMapala/$dataMapala;
  $bsp = $dataBSPersma/$dataPersma;
  $bspr = $dataBSPramuka/$dataPramuka;
  $bss = $dataBSSenior/$dataSenior;
  $bsw = $dataBSWirausaha/$dataWirausaha;

  $fsb = $dataFSBahasa/$dataBahasa;
  $fsk = $dataFSKemanusiaan/$dataKemanusiaan;
  $fsm = $dataFSMapala/$dataMapala;
  $fsp = $dataFSPersma/$dataPersma;
  $fspr = $dataFSPramuka/$dataPramuka;
  $fss = $dataFSSenior/$dataSenior;
  $fsw = $dataFSWirausaha/$dataWirausaha;

  $vlb = $dataVLBahasa/$dataBahasa;
  $vlk = $dataVLKemanusiaan/$dataKemanusiaan;
  $vlm = $dataVLMapala/$dataMapala;
  $vlp = $dataVLPersma/$dataPersma;
  $vlpr = $dataVLPramuka/$dataPramuka;
  $vls = $dataVLSenior/$dataSenior;
  $vlw = $dataVLWirausaha/$dataWirausaha;

  $bmb = $dataBMBahasa/$dataBahasa;
  $bmk = $dataBMKemanusiaan/$dataKemanusiaan;
  $bmm = $dataBMMapala/$dataMapala;
  $bmp = $dataBMPersma/$dataPersma;
  $bmpr = $dataBMPramuka/$dataPramuka;
  $bms = $dataBMSenior/$dataSenior;
  $bmw = $dataBMWirausaha/$dataWirausaha;

  $o3b = $dataO3Bahasa/$dataBahasa;
  $o3k = $dataO3Kemanusiaan/$dataKemanusiaan;
  $o3m = $dataO3Mapala/$dataMapala;
  $o3p = $dataO3Persma/$dataPersma;
  $o3pr = $dataO3Pramuka/$dataPramuka;
  $o3s = $dataO3Senior/$dataSenior;
  $o3w = $dataO3Wirausaha/$dataWirausaha;

  $mbcb = $dataMBCBahasa/$dataBahasa;
  $mbck = $dataMBCKemanusiaan/$dataKemanusiaan;
  $mbcm = $dataMBCMapala/$dataMapala;
  $mbcp = $dataMBCPersma/$dataPersma;
  $mbcpr = $dataMBCPramuka/$dataPramuka;
  $mbcs = $dataMBCSenior/$dataSenior;
  $mbcw = $dataMBCWirausaha/$dataWirausaha;

  $brmb = $dataBRMBahasa/$dataBahasa;
  $brmk = $dataBRMKemanusiaan/$dataKemanusiaan;
  $brmm = $dataBRMMapala/$dataMapala;
  $brmp = $dataBRMPersma/$dataPersma;
  $brmpr = $dataBRMPramuka/$dataPramuka;
  $brms = $dataBRMSenior/$dataSenior;
  $brmw = $dataBRMWirausaha/$dataWirausaha;

  $dmb = $dataDMBahasa/$dataBahasa;
  $dmk = $dataDMKemanusiaan/$dataKemanusiaan;
  $dmm = $dataDMMapala/$dataMapala;
  $dmp = $dataDMPersma/$dataPersma;
  $dmpr = $dataDMPramuka/$dataPramuka;
  $dms = $dataDMSenior/$dataSenior;
  $dmw = $dataDMWirausaha/$dataWirausaha;

  $nb = $dataNBahasa/$dataBahasa;
  $nk = $dataNKemanusiaan/$dataKemanusiaan;
  $nm = $dataNMapala/$dataMapala;
  $np = $dataNPersma/$dataPersma;
  $npr = $dataNPramuka/$dataPramuka;
  $ns = $dataNSenior/$dataSenior;
  $nw = $dataNWirausaha/$dataWirausaha;

  $mgb = $dataMGBahasa/$dataBahasa;
  $mgk = $dataMGKemanusiaan/$dataKemanusiaan;
  $mgm = $dataMGMapala/$dataMapala;
  $mgp = $dataMGPersma/$dataPersma;
  $mgpr = $dataMGPramuka/$dataPramuka;
  $mgs = $dataMGSenior/$dataSenior;
  $mgw = $dataMGWirausaha/$dataWirausaha;

  $jjb = $dataJJBahasa/$dataBahasa;
  $jjk = $dataJJKemanusiaan/$dataKemanusiaan;
  $jjm = $dataJJMapala/$dataMapala;
  $jjp = $dataJJPersma/$dataPersma;
  $jjpr = $dataJJPramuka/$dataPramuka;
  $jjs = $dataJJSenior/$dataSenior;
  $jjw = $dataJJWirausaha/$dataWirausaha;

  $bbabb = $dataBBABBahasa/$dataBahasa;
  $bbabk = $dataBBABKemanusiaan/$dataKemanusiaan;
  $bbabm = $dataBBABMapala/$dataMapala;
  $bbabp = $dataBBABPersma/$dataPersma;
  $bbabpr = $dataBBABPramuka/$dataPramuka;
  $bbabs = $dataBBABSenior/$dataSenior;
  $bbabw = $dataBBABWirausaha/$dataWirausaha;

  $mlsb = $dataMLSBahasa/$dataBahasa;
  $mlsk = $dataMLSKemanusiaan/$dataKemanusiaan;
  $mlsm = $dataMLSMapala/$dataMapala;
  $mlsp = $dataMLSPersma/$dataPersma;
  $mlspr = $dataMLSPramuka/$dataPramuka;
  $mlss = $dataMLSSenior/$dataSenior;
  $mlsw = $dataMLSWirausaha/$dataWirausaha;

  $brnb = $dataBRNBahasa/$dataBahasa;
  $brnk = $dataBRNKemanusiaan/$dataKemanusiaan;
  $brnm = $dataBRNMapala/$dataMapala;
  $brnp = $dataBRNPersma/$dataPersma;
  $brnpr = $dataBRNPramuka/$dataPramuka;
  $brns = $dataBRNSenior/$dataSenior;
  $brnw = $dataBRNWirausaha/$dataWirausaha;

  $ngb = $dataNGBahasa/$dataBahasa;
  $ngk = $dataNGKemanusiaan/$dataKemanusiaan;
  $ngm = $dataNGMapala/$dataMapala;
  $ngp = $dataNGPersma/$dataPersma;
  $ngpr = $dataNGPramuka/$dataPramuka;
  $ngs = $dataNGSenior/$dataSenior;
  $ngw = $dataNGWirausaha/$dataWirausaha;

  $trb = $dataTRBahasa/$dataBahasa;
  $trk = $dataTRKemanusiaan/$dataKemanusiaan;
  $trm = $dataTRMapala/$dataMapala;
  $trp = $dataTRPersma/$dataPersma;
  $trpr = $dataTRPramuka/$dataPramuka;
  $trs = $dataTRSenior/$dataSenior;
  $trw = $dataTRWirausaha/$dataWirausaha;

  $dgb = $dataDGBahasa/$dataBahasa;
  $dgk = $dataDGKemanusiaan/$dataKemanusiaan;
  $dgm = $dataDGMapala/$dataMapala;
  $dgp = $dataDGPersma/$dataPersma;
  $dgpr = $dataDGPramuka/$dataPramuka;
  $dgs = $dataDGSenior/$dataSenior;
  $dgw = $dataDGWirausaha/$dataWirausaha;



  #===============================
if ($jurusan == 'Administrasi Niaga'){
  $temp1 = $jurusan;
  $bahasa1 = $anb;
  $kemanusiaan1 = $ank;
  $mapala1 = $anm;
  $persma1 = $anp;
  $pramuka1 = $anpr;
  $senior1 = $ans;
  $wirausaha1 = $anw;
}

if ($jurusan == 'Akuntansi'){
  $temp1 = $jurusan;
  $bahasa1 = $ak1b;
  $kemanusiaan1 = $ak1k;
  $mapala1 = $ak1m;
  $persma1 = $ak1p;
  $pramuka1 = $ak1pr;
  $senior1 = $ak1s;
  $wirausaha1 = $ak1w;
}

if ($jurusan == 'Teknik Elektro'){
  $temp1 = $jurusan;
  $bahasa1 = $teb;
  $kemanusiaan1 = $tek;
  $mapala1 = $tem;
  $persma1 = $tep;
  $pramuka1 = $tepr;
  $senior1 = $tes;
  $wirausaha1 = $tew;
}

if ($jurusan == 'Teknik Kimia'){
  $temp1 = $jurusan;
  $bahasa1 = $tkb;
  $kemanusiaan1 = $tkk;
  $mapala1 = $tkm;
  $persma1 = $tkp;
  $pramuka1 = $tkpr;
  $senior1 = $tks;
  $wirausaha1 = $tkw;
}

if ($jurusan == 'Teknik Mesin'){
  $temp1 = $jurusan;
  $bahasa1 = $tmb;
  $kemanusiaan1 = $tmk;
  $mapala1 = $tmm;
  $persma1 = $tmp;
  $pramuka1 = $tmpr;
  $senior1 = $tms;
  $wirausaha1 = $tmw;
}

if ($jurusan == 'Teknik Sipil'){
  $temp1 = $jurusan;
  $bahasa1 = $tsb;
  $kemanusiaan1 = $tsk;
  $mapala1 = $tsm;
  $persma1 = $tsp;
  $pramuka1 = $tspr;
  $senior1 = $tss;
  $wirausaha1 = $tsw;
}

  #===============================
if ($prodi == 'Administrasi Bisnis'){
  $temp2 = $prodi;
  $bahasa2 = $abb;
  $kemanusiaan2 = $abk;
  $mapala2 = $abm;
  $persma2 = $abp;
  $pramuka2 = $abpr;
  $senior2 = $abs;
  $wirausaha2 = $abw;
}

if ($prodi == 'Akuntansi'){
  $temp2 = $prodi;
  $bahasa2 = $ak1b;
  $kemanusiaan2 = $ak1k;
  $mapala2 = $ak1m;
  $persma2 = $ak1p;
  $pramuka2 = $ak1pr;
  $senior2 = $ak1s;
  $wirausaha2 = $ak1w;
}

if ($prodi == 'Analisis Kimia'){
  $temp2 = $prodi;
  $bahasa2 = $ankb;
  $kemanusiaan2 = $ankk;
  $mapala2 = $ankm;
  $persma2 = $ankp;
  $pramuka2 = $ankpr;
  $senior2 = $anks;
  $wirausaha2 = $ankw;
}

if ($prodi == 'Teknik Elektronika'){
  $temp2 = $prodi;
  $bahasa2 = $telb;
  $kemanusiaan2 = $telk;
  $mapala2 = $telm;
  $persma2 = $telp;
  $pramuka2 = $telpr;
  $senior2 = $tels;
  $wirausaha2 = $telw;
}

if ($prodi == 'Teknik Kimia'){
  $temp2 = $prodi;
  $bahasa2 = $tkb;
  $kemanusiaan2 = $tkk;
  $mapala2 = $tkm;
  $persma2 = $tkp;
  $pramuka2 = $tkpr;
  $senior2 = $tks;
  $wirausaha2 = $tkw;
}

if ($prodi == 'Teknik Kimia Mineral'){
  $temp2 = $prodi;
  $bahasa2 = $tkmb;
  $kemanusiaan2 = $tkmk;
  $mapala2 = $tkmm;
  $persma2 = $tkmp;
  $pramuka2 = $tkmpr;
  $senior2 = $tkms;
  $wirausaha2 = $tkmw;
}

if ($prodi == 'Teknik Konstruksi'){
  $temp2 = $prodi;
  $bahasa2 = $tksb;
  $kemanusiaan2 = $tksk;
  $mapala2 = $tksm;
  $persma2 = $tksp;
  $pramuka2 = $tkspr;
  $senior2 = $tkss;
  $wirausaha2 = $tksw;
}

if ($prodi == 'Teknik Konstruksi Gedung'){
  $temp2 = $prodi;
  $bahasa2 = $tkgb;
  $kemanusiaan2 = $tkgk;
  $mapala2 = $tkgm;
  $persma2 = $tkgp;
  $pramuka2 = $tkgpr;
  $senior2 = $tkgs;
  $wirausaha2 = $tkgw;
}

if ($prodi == 'Teknik Konstruksi Jalan dan Jembatan'){
  $temp2 = $prodi;
  $bahasa2 = $tkjjb;
  $kemanusiaan2 = $tkjjk;
  $mapala2 = $tkjjm;
  $persma2 = $tkjjp;
  $pramuka2 = $tkjjpr;
  $senior2 = $tkjjs;
  $wirausaha2 = $tkjjw;
}

if ($prodi == 'Teknik Konversi Energi'){
  $temp2 = $prodi;
  $bahasa2 = $tkeb;
  $kemanusiaan2 = $tkek;
  $mapala2 = $tkem;
  $persma2 = $tkep;
  $pramuka2 = $tkepr;
  $senior2 = $tkes;
  $wirausaha2 = $tkew;
}

if ($prodi == 'Teknik Listrik'){
  $temp2 = $prodi;
  $bahasa2 = $tlb;
  $kemanusiaan2 = $tlk;
  $mapala2 = $tlm;
  $persma2 = $tlp;
  $pramuka2 = $tlpr;
  $senior2 = $tls;
  $wirausaha2 = $tlw;
}

if ($prodi == 'Teknik Mekatronika'){
  $temp2 = $prodi;
  $bahasa2 = $tmkb;
  $kemanusiaan2 = $tmkk;
  $mapala2 = $tmkm;
  $persma2 = $tmkp;
  $pramuka2 = $tmkpr;
  $senior2 = $tmks;
  $wirausaha2 = $tmkw;
}

if ($prodi == 'Teknik Mesin'){
  $temp2 = $prodi;
  $bahasa2 = $tmb;
  $kemanusiaan2 = $tmk;
  $mapala2 = $tmm;
  $persma2 = $tmp;
  $pramuka2 = $tmpr;
  $senior2 = $tms;
  $wirausaha2 = $tmw;
}

if ($prodi == 'Teknik Otomotif'){
  $temp2 = $prodi;
  $bahasa2 = $tob;
  $kemanusiaan2 = $tok;
  $mapala2 = $tom;
  $persma2 = $top;
  $pramuka2 = $topr;
  $senior2 = $tos;
  $wirausaha2 = $tow;
}

if ($prodi == 'Teknik Perawatan Alat Berat'){
  $temp2 = $prodi;
  $bahasa2 = $tpabb;
  $kemanusiaan2 = $tpabk;
  $mapala2 = $tpabm;
  $persma2 = $tpabp;
  $pramuka2 = $tpabpr;
  $senior2 = $tpabs;
  $wirausaha2 = $tpabw;
}

if ($prodi == 'Teknik Sipil'){
  $temp2 = $prodi;
  $bahasa2 = $ts1b;
  $kemanusiaan2 = $ts1k;
  $mapala2 = $ts1m;
  $persma2 = $ts1p;
  $pramuka2 = $ts1pr;
  $senior2 = $ts1s;
  $wirausaha2 = $ts1w;
}

if ($prodi == 'Teknik Telekomunikasi'){
  $temp2 = $prodi;
  $bahasa2 = $ttlb;
  $kemanusiaan2 = $ttlk;
  $mapala2 = $ttlm;
  $persma2 = $ttlp;
  $pramuka2 = $ttlpr;
  $senior2 = $ttls;
  $wirausaha2 = $ttlw;
}

if ($prodi == 'Akuntansi Manajerial'){
  $temp2 = $prodi;
  $bahasa2 = $akmb;
  $kemanusiaan2 = $akmk;
  $mapala2 = $akmm;
  $persma2 = $akmp;
  $pramuka2 = $akmpr;
  $senior2 = $akms;
  $wirausaha2 = $akmw;
}

if ($prodi == 'Teknik Komputer dan Jaringan'){
  $temp2 = $prodi;
  $bahasa2 = $tkjb;
  $kemanusiaan2 = $tkjk;
  $mapala2 = $tkjm;
  $persma2 = $tkjp;
  $pramuka2 = $tkjpr;
  $senior2 = $tkjs;
  $wirausaha2 = $tkjw;
}

if ($prodi == 'Teknik Manufaktur'){
  $temp2 = $prodi;
  $bahasa2 = $tmfb;
  $kemanusiaan2 = $tmfk;
  $mapala2 = $tmfm;
  $persma2 = $tmfp;
  $pramuka2 = $tmfpr;
  $senior2 = $tmfs;
  $wirausaha2 = $tmfw;
}

if ($prodi == 'Teknik Multimedia dan Jaringan'){
  $temp2 = $prodi;
  $bahasa2 = $tmjb;
  $kemanusiaan2 = $tmjk;
  $mapala2 = $tmjm;
  $persma2 = $tmjp;
  $pramuka2 = $tmjpr;
  $senior2 = $tmjs;
  $wirausaha2 = $tmjw;
}

if ($prodi == 'Teknik Pembangkit Energi'){
  $temp2 = $prodi;
  $bahasa2 = $tpeb;
  $kemanusiaan2 = $tpek;
  $mapala2 = $tpem;
  $persma2 = $tpep;
  $pramuka2 = $tpepr;
  $senior2 = $tpes;
  $wirausaha2 = $tpew;
}

if ($prodi == 'Teknologi Kimia Industri'){
  $temp2 = $prodi;
  $bahasa2 = $tkib;
  $kemanusiaan2 = $tkik;
  $mapala2 = $tkim;
  $persma2 = $tkip;
  $pramuka2 = $tkipr;
  $senior2 = $tkis;
  $wirausaha2 = $tkiw;
}

  #===============================
if ($minat == 'Seni'){
  $temp3 = $minat;
  $bahasa3 = $bb;
  $kemanusiaan3 = $bk;
  $mapala3 = $bm;
  $persma3 = $bp;
  $pramuka3 = $bpr;
  $senior3 = $bs;
  $wirausaha3 = $bw;
}

if ($minat == 'Olahraga'){
  $temp3 = $minat;
  $bahasa3 = $bdb;
  $kemanusiaan3 = $bdk;
  $mapala3 = $bdm;
  $persma3 = $bdp;
  $pramuka3 = $bdpr;
  $senior3 = $bds;
  $wirausaha3 = $bdw;
}

if ($minat == 'Pecinta Alam'){
  $temp3 = $minat;
  $bahasa3 = $jb;
  $kemanusiaan3 = $jk;
  $mapala3 = $jm;
  $persma3 = $jp;
  $pramuka3 = $jpr;
  $senior3 = $js;
  $wirausaha3 = $jw;
}

if ($minat == 'Bela Diri'){
  $temp3 = $minat;
  $bahasa3 = $kmb;
  $kemanusiaan3 = $kmk;
  $mapala3 = $kmm;
  $persma3 = $kmp;
  $pramuka3 = $kmpr;
  $senior3 = $kms;
  $wirausaha3 = $kmw;
}

if ($minat == 'Jurnalistik'){
  $temp3 = $minat;
  $bahasa3 = $ksb;
  $kemanusiaan3 = $ksk;
  $mapala3 = $ksm;
  $persma3 = $ksp;
  $pramuka3 = $kspr;
  $senior3 = $kss;
  $wirausaha3 = $ksw;
}

if ($minat == 'Kesehatan'){
  $temp3 = $minat;
  $bahasa3 = $ob;
  $kemanusiaan3 = $ok;
  $mapala3 = $om;
  $persma3 = $op;
  $pramuka3 = $opr;
  $senior3 = $os;
  $wirausaha3 = $ow;
}

if ($minat == 'Wirausaha'){
  $temp3 = $minat;
  $bahasa3 = $pab;
  $kemanusiaan3 = $pak;
  $mapala3 = $pam;
  $persma3 = $pap;
  $pramuka3 = $papr;
  $senior3 = $pas;
  $wirausaha3 = $paw;
}

if ($minat == 'Bahasa'){
  $temp3 = $minat;
  $bahasa3 = $pb;
  $kemanusiaan3 = $pk;
  $mapala3 = $pm;
  $persma3 = $pp;
  $pramuka3 = $ppr;
  $senior3 = $ps;
  $wirausaha3 = $pw;
}

if ($minat == 'Kemanusiaan'){
  $temp3 = $minat;
  $bahasa3 = $sb;
  $kemanusiaan3 = $sk;
  $mapala3 = $sm;
  $persma3 = $sp;
  $pramuka3 = $spr;
  $senior3 = $ss;
  $wirausaha3 = $sw;
}

if ($minat == 'Pramuka'){
  $temp3 = $minat;
  $bahasa3 = $wb;
  $kemanusiaan3 = $wk;
  $mapala3 = $wm;
  $persma3 = $wp;
  $pramuka3 = $wpr;
  $senior3 = $ws;
  $wirausaha3 = $ww;
}

  #===============================
if ($bakat == 'Seni'){
  $temp4 = $bakat;
  $bahasa4 = $b2b;
  $kemanusiaan4 = $b2k;
  $mapala4 = $b2m;
  $persma4 = $b2p;
  $pramuka4 = $b2pr;
  $senior4 = $b2s;
  $wirausaha4 = $b2w;
}

if ($bakat == 'Bahasa'){
  $temp4 = $bakat;
  $bahasa4 = $lb;
  $kemanusiaan4 = $lk;
  $mapala4 = $lm;
  $persma4 = $lp;
  $pramuka4 = $lpr;
  $senior4 = $ls;
  $wirausaha4 = $lw;
}

if ($bakat == 'Olahraga'){
  $temp4 = $bakat;
  $bahasa4 = $o2b;
  $kemanusiaan4 = $o2k;
  $mapala4 = $o2m;
  $persma4 = $o2p;
  $pramuka4 = $o2pr;
  $senior4 = $o2s;
  $wirausaha4 = $o2w;
}

if ($bakat == 'Lainnya'){
  $temp4 = $bakat;
  $bahasa4 = $s2b;
  $kemanusiaan4 = $s2k;
  $mapala4 = $s2m;
  $persma4 = $s2p;
  $pramuka4 = $s2pr;
  $senior4 = $s2s;
  $wirausaha4 = $s2w;
}

  #===============================
if ($hobi == 'Menari'){
  $temp5 = $hobi;
  $bahasa5 = $mnb;
  $kemanusiaan5 = $mnk;
  $mapala5 = $mnm;
  $persma5 = $mnp;
  $pramuka5 = $mnpr;
  $senior5 = $mns;
  $wirausaha5 = $mnw;
}

if ($hobi == 'Menyanyi'){
  $temp5 = $hobi;
  $bahasa5 = $mnyb;
  $kemanusiaan5 = $mnyk;
  $mapala5 = $mnym;
  $persma5 = $mnyp;
  $pramuka5 = $mnypr;
  $senior5 = $mnys;
  $wirausaha5 = $mnyw;
}

if ($hobi == 'Menulis'){
  $temp5 = $hobi;
  $bahasa5 = $mnlsb;
  $kemanusiaan5 = $mnlsk;
  $mapala5 = $mnlsm;
  $persma5 = $mnlsp;
  $pramuka5 = $mnlspr;
  $senior5 = $mnlss;
  $wirausaha5 = $mnlsw;
}

if ($hobi == 'Menggambar'){
  $temp5 = $hobi;
  $bahasa5 = $mgbb;
  $kemanusiaan5 = $mgbk;
  $mapala5 = $mgbm;
  $persma5 = $mgbp;
  $pramuka5 = $mgbpr;
  $senior5 = $mgbs;
  $wirausaha5 = $mgbw;
}

if ($hobi == 'Memasak'){
  $temp5 = $hobi;
  $bahasa5 = $mskb;
  $kemanusiaan5 = $mskk;
  $mapala5 = $mskm;
  $persma5 = $mskp;
  $pramuka5 = $mskpr;
  $senior5 = $msks;
  $wirausaha5 = $mskw;
}

if ($hobi == 'Fotografi'){
  $temp5 = $hobi;
  $bahasa5 = $ftb;
  $kemanusiaan5 = $ftk;
  $mapala5 = $ftm;
  $persma5 = $ftp;
  $pramuka5 = $ftpr;
  $senior5 = $fts;
  $wirausaha5 = $ftw;
}

if ($hobi == 'Sepak Bola'){
  $temp5 = $hobi;
  $bahasa5 = $sbb;
  $kemanusiaan5 = $sbk;
  $mapala5 = $sbm;
  $persma5 = $sbp;
  $pramuka5 = $sbpr;
  $senior5 = $sbs;
  $wirausaha5 = $sbw;
}

if ($hobi == 'Bulu Tangkis'){
  $temp5 = $hobi;
  $bahasa5 = $btb;
  $kemanusiaan5 = $btk;
  $mapala5 = $btm;
  $persma5 = $btp;
  $pramuka5 = $btpr;
  $senior5 = $bts;
  $wirausaha5 = $btw;
}

if ($hobi == 'Basket'){
  $temp5 = $hobi;
  $bahasa5 = $bsb;
  $kemanusiaan5 = $bsk;
  $mapala5 = $bsm;
  $persma5 = $bsp;
  $pramuka5 = $bspr;
  $senior5 = $bss;
  $wirausaha5 = $bsw;
}

if ($hobi == 'Futsal'){
  $temp5 = $hobi;
  $bahasa5 = $fsb;
  $kemanusiaan5 = $fsk;
  $mapala5 = $fsm;
  $persma5 = $fsp;
  $pramuka5 = $fspr;
  $senior5 = $fss;
  $wirausaha5 = $fsw;
}

if ($hobi == 'Volly'){
  $temp5 = $hobi;
  $bahasa5 = $vlb;
  $kemanusiaan5 = $vlk;
  $mapala5 = $vlm;
  $persma5 = $vlp;
  $pramuka5 = $vlpr;
  $senior5 = $vls;
  $wirausaha5 = $vlw;
}

if ($hobi == 'Belajar Matematika'){
  $temp5 = $hobi;
  $bahasa5 = $bmb;
  $kemanusiaan5 = $bmk;
  $mapala5 = $bmm;
  $persma5 = $bmp;
  $pramuka5 = $bmpr;
  $senior5 = $bms;
  $wirausaha5 = $bmw;
}

if ($hobi == 'Olahraga'){
  $temp5 = $hobi;
  $bahasa5 = $o3b;
  $kemanusiaan5 = $o3k;
  $mapala5 = $o3m;
  $persma5 = $o3p;
  $pramuka5 = $o3pr;
  $senior5 = $o3s;
  $wirausaha5 = $o3w;
}

if ($hobi == 'Membaca'){
  $temp5 = $hobi;
  $bahasa5 = $mbcb;
  $kemanusiaan5 = $mbck;
  $mapala5 = $mbcm;
  $persma5 = $mbcp;
  $pramuka5 = $mbcpr;
  $senior5 = $mbcs;
  $wirausaha5 = $mbcw;
}

if ($hobi == 'Bermain Musik'){
  $temp5 = $hobi;
  $bahasa5 = $brmb;
  $kemanusiaan5 = $brmk;
  $mapala5 = $brmm;
  $persma5 = $brmp;
  $pramuka5 = $brmpr;
  $senior5 = $brms;
  $wirausaha5 = $brmw;
}

if ($hobi == 'Mendengar Musik'){
  $temp5 = $hobi;
  $bahasa5 = $dmb;
  $kemanusiaan5 = $dmk;
  $mapala5 = $dmm;
  $persma5 = $dmp;
  $pramuka5 = $dmpr;
  $senior5 = $dms;
  $wirausaha5 = $dmw;
}

if ($hobi == 'Nonton'){
  $temp5 = $hobi;
  $bahasa5 = $nb;
  $kemanusiaan5 = $nk;
  $mapala5 = $nm;
  $persma5 = $np;
  $pramuka5 = $npr;
  $senior5 = $ns;
  $wirausaha5 = $nw;
}

if ($hobi == 'Main Game'){
  $temp5 = $hobi;
  $bahasa5 = $mgb;
  $kemanusiaan5 = $mgk;
  $mapala5 = $mgm;
  $persma5 = $mgp;
  $pramuka5 = $mgpr;
  $senior5 = $mgs;
  $wirausaha5 = $mgw;
}

if ($hobi == 'Jalan-Jalan'){
  $temp5 = $hobi;
  $bahasa5 = $jjb;
  $kemanusiaan5 = $jjk;
  $mapala5 = $jjm;
  $persma5 = $jjp;
  $pramuka5 = $jjpr;
  $senior5 = $jjs;
  $wirausaha5 = $jjw;
}

if ($hobi == 'Belajar bahasa asing baru'){
  $temp5 = $hobi;
  $bahasa5 = $bbabb;
  $kemanusiaan5 = $bbabk;
  $mapala5 = $bbabm;
  $persma5 = $bbabp;
  $pramuka5 = $bbabpr;
  $senior5 = $bbabs;
  $wirausaha5 = $bbabw;
}

if ($hobi == 'Melukis'){
  $temp5 = $hobi;
  $bahasa5 = $mlsb;
  $kemanusiaan5 = $mlsk;
  $mapala5 = $mlsm;
  $persma5 = $mlsp;
  $pramuka5 = $mlspr;
  $senior5 = $mlss;
  $wirausaha5 = $mlsw;
}

if ($hobi == 'Berenang'){
  $temp5 = $hobi;
  $bahasa5 = $brnb;
  $kemanusiaan5 = $brnk;
  $mapala5 = $brnm;
  $persma5 = $brnp;
  $pramuka5 = $brnpr;
  $senior5 = $brns;
  $wirausaha5 = $brnw;
}

if ($hobi == 'Naik Gunung'){
  $temp5 = $hobi;
  $bahasa5 = $ngb;
  $kemanusiaan5 = $ngk;
  $mapala5 = $ngm;
  $persma5 = $ngp;
  $pramuka5 = $ngpr;
  $senior5 = $ngs;
  $wirausaha5 = $ngw;
}

if ($hobi == 'Travelling'){
  $temp5 = $hobi;
  $bahasa5 = $trb;
  $kemanusiaan5 = $trk;
  $mapala5 = $trm;
  $persma5 = $trp;
  $pramuka5 = $trpr;
  $senior5 = $trs;
  $wirausaha5 = $trw;
}

if ($hobi == 'Desain grafis'){
  $temp5 = $hobi;
  $bahasa5 = $dgb;
  $kemanusiaan5 = $dgk;
  $mapala5 = $dgm;
  $persma5 = $dgp;
  $pramuka5 = $dgpr;
  $senior5 = $dgs;
  $wirausaha5 = $dgw;
}

$total_bahasa1 = $bahasa1 * $bahasa2 * $bahasa3 * $bahasa4 * $bahasa5 * $prob_bahasa;
$total_kemanusiaan1 = $kemanusiaan1 * $kemanusiaan2 * $kemanusiaan3 * $kemanusiaan4 * $kemanusiaan5 * $prob_kemanusiaan;
$total_mapala1 = $mapala1 * $mapala2 * $mapala3 * $mapala4 * $mapala5 * $prob_mapala;
$total_persma1 = $persma1 * $persma2 * $persma3 * $persma4 * $persma5 * $prob_persma;
$total_pramuka1 = $pramuka1 * $pramuka2 * $pramuka3 * $pramuka4 * $pramuka5 * $prob_pramuka;
$total_senior1 = $senior1 * $senior2 * $senior3 * $senior4 * $senior5 * $prob_senior;
$total_wirausaha1 = $wirausaha1 * $wirausaha2 * $wirausaha3 * $wirausaha4 * $wirausaha5 * $prob_wirausaha;

$total_bahasa = floatval(substr(strval($total_bahasa1), 0, 15));
$total_kemanusiaan = floatval(substr(strval($total_kemanusiaan1), 0, 15));
$total_mapala = floatval(substr(strval($total_mapala1), 0, 15));
$total_persma = floatval(substr(strval($total_persma1), 0, 15));
$total_pramuka = floatval(substr(strval($total_pramuka1), 0, 15));
$total_senior = floatval(substr(strval($total_senior1), 0, 15));
$total_wirausaha = floatval(substr(strval($total_wirausaha1), 0, 15));


echo "Hasil Probabilitas UKM ( P[ Bahasa ] ) : <br>
$bahasa1 * $bahasa2 * $bahasa3 * $bahasa4 * $bahasa5 * $prob_bahasa = $total_bahasa".'<br/>'.'<br/>';

echo "Hasil Probabilitas UKM ( P[ Kemanusiaan (ksr, humaniora) ] ) : <br>
$kemanusiaan1 * $kemanusiaan2 * $kemanusiaan3 * $kemanusiaan4 * $kemanusiaan5 * $prob_kemanusiaan = $total_kemanusiaan".'<br/>'.'<br/>';

echo "Hasil Probabilitas UKM ( P[ Pecinta Alam (MAPALA) ] ) : <br> 
$mapala1 * $mapala2 * $mapala3 * $mapala4 * $mapala5 * $prob_mapala = $total_mapala".'<br/>'.'<br/>';

echo "Hasil Probabilitas UKM ( P[ Persma ] ) : <br> 
$persma1 * $persma2 * $persma3 * $persma4 * $persma5 * $prob_persma = $total_persma".'<br/>'.'<br/>';

echo "Hasil Probabilitas UKM ( P[ Pramuka ] ) : <br> 
$pramuka1 * $pramuka1 * $pramuka2 * $pramuka3 * $pramuka4 * $pramuka5 * $prob_pramuka = $total_pramuka".'<br/>'.'<br/>';

echo "Hasil Probabilitas UKM ( P[ SENIOR (senior, bola, karate, taekwondo) ] ) : <br> 
$senior1 * $senior2 * $senior3 * $senior4 * $senior5 * $prob_senior = $total_senior".'<br/>'.'<br/>';

echo "Hasil Probabilitas UKM ( P[ Wirausaha ] ) : <br> 
$wirausaha1 * $wirausaha2 * $wirausaha3 * $wirausaha4 * $wirausaha5 * $prob_wirausaha = $total_wirausaha".'<br/>'.'<br/>';

if ($total_bahasa > $total_persma && $total_bahasa > $total_wirausaha && $total_bahasa > $total_mapala && $total_bahasa > $total_senior && $total_bahasa > $total_kemanusiaan && $total_bahasa > $total_pramuka) {
  $sql="INSERT INTO tb_data_testing (jurusan, prodi, minat, bakat, hobi, label, kelas_hasil, nilai_wirausaha, nilai_kemanusiaan, nilai_senior, nilai_mapala, nilai_persma, nilai_bahasa, nilai_pramuka) VALUES ('$jurusan','$prodi','$minat','$bakat','$hobi','$label','Bahasa','$total_wirausaha','$total_kemanusiaan','$total_senior','$total_mapala','$total_persma','$total_bahasa','$total_pramuka')";
  $query = $db_object->db_query($sql);
echo "Jadi hasil klasifikasi UKM adalah '.<b><u>Bahasa.'";
}
else if ($total_kemanusiaan > $total_persma && $total_kemanusiaan > $total_wirausaha && $total_kemanusiaan > $total_mapala && $total_kemanusiaan > $total_senior && $total_kemanusiaan > $total_bahasa && $total_kemanusiaan > $total_pramuka) {
  $sql="INSERT INTO tb_data_testing (jurusan, prodi, minat, bakat, hobi, label, kelas_hasil, nilai_wirausaha, nilai_kemanusiaan, nilai_senior, nilai_mapala, nilai_persma, nilai_bahasa, nilai_pramuka) VALUES ('$jurusan','$prodi','$minat','$bakat','$hobi','$label','Kemanusiaan (ksr, humaniora)','$total_wirausaha','$total_kemanusiaan','$total_senior','$total_mapala','$total_persma','$total_bahasa','$total_pramuka')";
  $query = $db_object->db_query($sql);
echo "Jadi hasil klasifikasi UKM adalah '.<b><u>Kemanusiaan (ksr, humaniora).'";
}
else if ($total_mapala > $total_persma && $total_mapala > $total_wirausaha && $total_mapala > $total_kemanusiaan && $total_mapala > $total_senior && $total_mapala > $total_bahasa && $total_mapala > $total_pramuka) {
  $sql="INSERT INTO tb_data_testing (jurusan, prodi, minat, bakat, hobi, label, kelas_hasil, nilai_wirausaha, nilai_kemanusiaan, nilai_senior, nilai_mapala, nilai_persma, nilai_bahasa, nilai_pramuka) VALUES ('$jurusan','$prodi','$minat','$bakat','$hobi','$label','Pecinta Alam (MAPALA)','$total_wirausaha','$total_kemanusiaan','$total_senior','$total_mapala','$total_persma','$total_bahasa','$total_pramuka')";
  $query = $db_object->db_query($sql);
echo "Jadi hasil klasifikasi UKM adalah '.<b><u>Pecinta Alam (MAPALA).'";
}
else if ($total_persma > $total_mapala && $total_persma > $total_wirausaha && $total_persma > $total_kemanusiaan && $total_persma > $total_senior && $total_persma > $total_bahasa && $total_persma > $total_pramuka) {
  $sql="INSERT INTO tb_data_testing (jurusan, prodi, minat, bakat, hobi, label, kelas_hasil, nilai_wirausaha, nilai_kemanusiaan, nilai_senior, nilai_mapala, nilai_persma, nilai_bahasa, nilai_pramuka) VALUES ('$jurusan','$prodi','$minat','$bakat','$hobi','$label','Persma','$total_wirausaha','$total_kemanusiaan','$total_senior','$total_mapala','$total_persma','$total_bahasa','$total_pramuka')";
  $query = $db_object->db_query($sql);
echo "Jadi hasil klasifikasi UKM adalah '.<b><u>Persma.'";
}
else if ($total_pramuka > $total_mapala && $total_pramuka > $total_wirausaha && $total_pramuka > $total_kemanusiaan && $total_pramuka > $total_senior && $total_pramuka > $total_bahasa && $total_pramuka > $total_persma) {
  $sql="INSERT INTO tb_data_testing (jurusan, prodi, minat, bakat, hobi, label, kelas_hasil, nilai_wirausaha, nilai_kemanusiaan, nilai_senior, nilai_mapala, nilai_persma, nilai_bahasa, nilai_pramuka) VALUES ('$jurusan','$prodi','$minat','$bakat','$hobi','$label','Pramuka','$total_wirausaha','$total_kemanusiaan','$total_senior','$total_mapala','$total_persma','$total_bahasa','$total_pramuka')";
  $query = $db_object->db_query($sql);
echo "Jadi hasil klasifikasi UKM adalah '.<b><u>Pramuka.'";
}
elseif ($total_senior > $total_mapala && $total_senior > $total_pramuka && $total_senior > $total_kemanusiaan && $total_senior > $total_wirausaha && $total_senior > $total_bahasa && $total_senior > $total_persma) {
  $sql="INSERT INTO tb_data_testing (jurusan, prodi, minat, bakat, hobi, label, kelas_hasil, nilai_wirausaha, nilai_kemanusiaan, nilai_senior, nilai_mapala, nilai_persma, nilai_bahasa, nilai_pramuka) VALUES ('$jurusan','$prodi','$minat','$bakat','$hobi','$label','SENIOR (senior, bola, karate, taekwondo)','$total_wirausaha','$total_kemanusiaan','$total_senior','$total_mapala','$total_persma','$total_bahasa','$total_pramuka')";
  $query = $db_object->db_query($sql);
echo "Jadi hasil klasifikasi UKM adalah '.<b><u>SENIOR (senior, bola, karate, taekwondo).'";
}
else if ($total_wirausaha > $total_mapala && $total_wirausaha > $total_pramuka && $total_wirausaha > $total_kemanusiaan && $total_wirausaha > $total_senior && $total_wirausaha > $total_bahasa && $total_wirausaha > $total_persma) {
  $sql="INSERT INTO tb_data_testing (jurusan, prodi, minat, bakat, hobi, label, kelas_hasil, nilai_wirausaha, nilai_kemanusiaan, nilai_senior, nilai_mapala, nilai_persma, nilai_bahasa, nilai_pramuka) VALUES ('$jurusan','$prodi','$minat','$bakat','$hobi','$label','Wirausaha','$total_wirausaha','$total_kemanusiaan','$total_senior','$total_mapala','$total_persma','$total_bahasa','$total_pramuka')";
  $query = $db_object->db_query($sql);
echo "Jadi hasil klasifikasi UKM adalah '.<b><u>Wirausaha.'";
}
 }
?>
