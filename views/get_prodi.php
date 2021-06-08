<?php
    define('HOST','localhost');
    define('USER','root');
    define('PASS','');
    define('DB1', 'spk_ukm');
     
    // Buat Koneksinya
    $db1 = new mysqli(HOST, USER, PASS, DB1);

	$jurusan = $_POST['jurusan'];
 
	echo "<option value=''>-- Pilih --</option>";
 
	$query = "SELECT * FROM prodi WHERE id_jurusan=? ORDER BY nama ASC";
	$dewan1 = $db1->prepare($query);
	$dewan1->bind_param("i", $jurusan);
	$dewan1->execute();
	$res1 = $dewan1->get_result();
	while ($row = $res1->fetch_assoc()) {
		echo "<option value='" . $row['nama'] . "'>" . $row['nama'] . "</option>";
	}
?>

