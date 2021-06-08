<?php
    define('HOST','localhost');
    define('USER','root');
    define('PASS','');
    define('DB1', 'spk_ukm');
     
    // Buat Koneksinya
    $db1 = new mysqli(HOST, USER, PASS, DB1);

	$minat = $_POST['minat'];
 
	echo "<option value=''>-- Pilih --</option>";
 
	$query = "SELECT * FROM hobi WHERE id_minat=? ORDER BY nama ASC";
	$dewan1 = $db1->prepare($query);
	$dewan1->bind_param("i", $minat);
	$dewan1->execute();
	$res1 = $dewan1->get_result();
	while ($row = $res1->fetch_assoc()) {
		echo "<option value='" . $row['nama'] . "'>" . $row['nama'] . "</option>";
	}
?>

