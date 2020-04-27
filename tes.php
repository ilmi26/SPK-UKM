<?php
function dec(){
    return 4;
}

function jumlah_data_training($db_object, $where=null){
    $sql = "SELECT COUNT(*) FROM tb_data_training ".$where;
    $result = $db_object->db_query($sql);
    $rows = $db_object->db_fetch_array($result);
    return $rows[0];
}

/**
 * 
 * @param type $db_object
 * @param type $id_data_testing
 * @param type $jurusan
 * @param type $prodi
 * @param type $minat
 * @param type $bakat
 * @param type $hobi
 * @return array
 */
function ProsesNaiveBayes($db_object, $id_testing=0, $jurusan, $prodi, $minat, 
        $bakat, $hobi, $show_perhitungan=true){
    
    $jumlah_data = jumlah_data_training($db_object);//jumlah data training
    $jumlah_wirausaha = jumlah_data_training($db_object, " WHERE label='Wirausaha'");//jumlah wirausaha
    $jumlah_kemanusiaan = jumlah_data_training($db_object, " WHERE label='Kemanusiaan (ksr, humaniora)'");//jumlah kemanusiaan
    $jumlah_senior = jumlah_data_training($db_object, " WHERE label='SENIOR (senior, bola, karate, taekwondo)'");//jumlah senior
    $jumlah_mapala = jumlah_data_training($db_object, " WHERE label='Pecinta Alam (MAPALA)'");//jumlah mapala
    $jumlah_persma = jumlah_data_training($db_object, " WHERE label='Persma'");//jumlah persma
    $jumlah_bahasa = jumlah_data_training($db_object, " WHERE label='Bahasa'");//jumlah bahasa
    $jumlah_pramuka = jumlah_data_training($db_object, " WHERE label='Pramuka'");//jumlah pramuka

    $p_wirausaha = $jumlah_wirausaha/$jumlah_data;
    $p_kemanusiaan = $jumlah_kemanusiaan/$jumlah_data;
    $p_senior = $jumlah_senior/$jumlah_data;
    $p_mapala = $jumlah_mapala/$jumlah_data;
    $p_persma = $jumlah_persma/$jumlah_data;
    $p_bahasa = $jumlah_bahasa/$jumlah_data;
    $p_pramuka = $jumlah_pramuka/$jumlah_data;

    //jumlah atribut jurusan
    $jumlah_jurusan_an_wirusaha = jumlah_data_training($db_object, " WHERE jurusan='Administrasi Niaga' AND label='Wirausaha'");
    $jumlah_jurusan_an_kemanusiaan = jumlah_data_training($db_object, " WHERE jurusan='Administrasi Niaga' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_jurusan_an_senior = jumlah_data_training($db_object, " WHERE jurusan='Administrasi Niaga' AND label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_jurusan_an_mapala = jumlah_data_training($db_object, " WHERE jurusan='Administrasi Niaga' AND label='Pecinta Alam (MAPALA)'");
    $jumlah_jurusan_an_persma = jumlah_data_training($db_object, " WHERE jurusan='Administrasi Niaga' AND label='Persma'");
    $jumlah_jurusan_an_bahasa= jumlah_data_training($db_object, " WHERE jurusan='Administrasi Niaga' AND label='Bahasa'");
    $jumlah_jurusan_an_pramuka = jumlah_data_training($db_object, " WHERE jurusan='Administrasi Niaga' AND label='Pramuka'");
        
    $jumlah_jurusan_ak_wirusaha = jumlah_data_training($db_object, " WHERE jurusan='Akuntansi' AND label='Wirausaha'");
    $jumlah_jurusan_ak_kemanusiaan = jumlah_data_training($db_object, " WHERE jurusan='Akuntansi' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_jurusan_ak_senior = jumlah_data_training($db_object, " WHERE jurusan='Akuntansi' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_jurusan_ak_mapala = jumlah_data_training($db_object, " WHERE jurusan='Akuntansi' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_jurusan_ak_persma = jumlah_data_training($db_object, " WHERE jurusan='Akuntansi' AND 
        label='Persma'");
    $jumlah_jurusan_ak_bahasa= jumlah_data_training($db_object, " WHERE jurusan='Akuntansi' AND 
        label='Bahasa'");
    $jumlah_jurusan_ak_pramuka = jumlah_data_training($db_object, " WHERE jurusan='Akuntansi' AND label='Pramuka'");

    $jumlah_jurusan_elektro_wirusaha = jumlah_data_training($db_object, " WHERE jurusan='Teknik Elektro' AND label='Wirausaha'");
    $jumlah_jurusan_elektro_kemanusiaan = jumlah_data_training($db_object, " WHERE jurusan='Teknik Elektro' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_jurusan_elektro_senior = jumlah_data_training($db_object, " WHERE jurusan='Teknik Elektro' AND label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_jurusan_elektro_mapala = jumlah_data_training($db_object, " WHERE jurusan='Teknik Elektro' AND label='Pecinta Alam (MAPALA)'");
    $jumlah_jurusan_elektro_persma = jumlah_data_training($db_object, " WHERE jurusan='Teknik Elektro' AND label='Persma'");
    $jumlah_jurusan_elektro_bahasa= jumlah_data_training($db_object, " WHERE jurusan='Teknik Elektro' AND label='Bahasa'");
    $jumlah_jurusan_elektro_pramuka = jumlah_data_training($db_object, " WHERE jurusan='Teknik Elektro' AND label='Pramuka'");

    $jumlah_jurusan_kimia_wirusaha = jumlah_data_training($db_object, " WHERE jurusan='Teknik Kimia' AND label='Wirausaha'");
    $jumlah_jurusan_kimia_kemanusiaan = jumlah_data_training($db_object, " WHERE jurusan='Teknik Kimia' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_jurusan_kimia_senior = jumlah_data_training($db_object, " WHERE jurusan='Teknik Kimia' AND label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_jurusan_kimia_mapala = jumlah_data_training($db_object, " WHERE jurusan='Teknik Kimia' AND label='Pecinta Alam (MAPALA)'");
    $jumlah_jurusan_kimia_persma = jumlah_data_training($db_object, " WHERE jurusan='Teknik Kimia' AND label='Persma'");
    $jumlah_jurusan_kimia_bahasa= jumlah_data_training($db_object, " WHERE jurusan='Teknik Kimia' AND label='Bahasa'");
    $jumlah_jurusan_kimia_pramuka = jumlah_data_training($db_object, " WHERE jurusan='Teknik Kimia' AND label='Pramuka'");

    $jumlah_jurusan_mesin_wirusaha = jumlah_data_training($db_object, " WHERE jurusan='Teknik Mesin' AND label='Wirausaha'");
    $jumlah_jurusan_mesin_kemanusiaan = jumlah_data_training($db_object, " WHERE jurusan='Teknik Mesin' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_jurusan_mesin_senior = jumlah_data_training($db_object, " WHERE jurusan='Teknik Mesin' AND label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_jurusan_mesin_mapala = jumlah_data_training($db_object, " WHERE jurusan='Teknik Mesin' AND label='Pecinta Alam (MAPALA)'");
    $jumlah_jurusan_mesin_persma = jumlah_data_training($db_object, " WHERE jurusan='Teknik Mesin' AND label='Persma'");
    $jumlah_jurusan_mesin_bahasa= jumlah_data_training($db_object, " WHERE jurusan='Teknik Mesin' AND label='Bahasa'");
    $jumlah_jurusan_mesin_pramuka = jumlah_data_training($db_object, " WHERE jurusan='Teknik Mesin' AND label='Pramuka'");

    $jumlah_jurusan_sipil_wirusaha = jumlah_data_training($db_object, " WHERE jurusan='Teknik Sipil' AND label='Wirausaha'");
    $jumlah_jurusan_sipil_kemanusiaan = jumlah_data_training($db_object, " WHERE jurusan='Teknik Sipil' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_jurusan_sipil_senior = jumlah_data_training($db_object, " WHERE jurusan='Teknik Sipil' AND label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_jurusan_sipil_mapala = jumlah_data_training($db_object, " WHERE jurusan='Teknik Sipil' AND label='Pecinta Alam (MAPALA)'");
    $jumlah_jurusan_sipil_persma = jumlah_data_training($db_object, " WHERE jurusan='Teknik Sipil' AND label='Persma'");
    $jumlah_jurusan_sipil_bahasa= jumlah_data_training($db_object, " WHERE jurusan='Teknik Sipil' AND label='Bahasa'");
    $jumlah_jurusan_sipil_pramuka = jumlah_data_training($db_object, " WHERE jurusan='Teknik Sipil' AND label='Pramuka'");
        
    //probabilitas atribut jurusan
    $p_jurusan_an_wirausaha = $jumlah_jurusan_an_wirusaha/$jumlah_wirausaha;
    $p_jurusan_an_kemanusiaan = $jumlah_jurusan_an_kemanusiaan/$jumlah_kemanusiaan;
    $p_jurusan_an_senior = $jumlah_jurusan_an_senior/$jumlah_senior;
    $p_jurusan_an_mapala = $jumlah_jurusan_an_mapala/$jumlah_mapala;
    $p_jurusan_an_persma = $jumlah_jurusan_an_persma/$jumlah_persma;
    $p_jurusan_an_bahasa = $jumlah_jurusan_an_bahasa/$jumlah_bahasa;
    $p_jurusan_an_pramuka = $jumlah_jurusan_an_pramuka/$jumlah_pramuka;

    $p_jurusan_ak_wirausaha = $jumlah_jurusan_ak_wirusaha/$jumlah_wirausaha;
    $p_jurusan_ak_kemanusiaan = $jumlah_jurusan_ak_kemanusiaan/$jumlah_kemanusiaan;
    $p_jurusan_ak_senior = $jumlah_jurusan_ak_senior/$jumlah_senior;
    $p_jurusan_ak_mapala = $jumlah_jurusan_ak_mapala/$jumlah_mapala;
    $p_jurusan_ak_persma = $jumlah_jurusan_ak_persma/$jumlah_persma;
    $p_jurusan_ak_bahasa = $jumlah_jurusan_ak_bahasa/$jumlah_bahasa;
    $p_jurusan_ak_pramuka = $jumlah_jurusan_ak_pramuka/$jumlah_pramuka;

    $p_jurusan_elektro_wirausaha = $jumlah_jurusan_elektro_wirusaha/$jumlah_wirausaha;
    $p_jurusan_elektro_kemanusiaan = $jumlah_jurusan_elektro_kemanusiaan/$jumlah_kemanusiaan;
    $p_jurusan_elektro_senior = $jumlah_jurusan_elektro_senior/$jumlah_senior;
    $p_jurusan_elektro_mapala = $jumlah_jurusan_elektro_mapala/$jumlah_mapala;
    $p_jurusan_elektro_persma = $jumlah_jurusan_elektro_persma/$jumlah_persma;
    $p_jurusan_elektro_bahasa = $jumlah_jurusan_elektro_bahasa/$jumlah_bahasa;
    $p_jurusan_elektro_pramuka = $jumlah_jurusan_elektro_pramuka/$jumlah_pramuka;

    $p_jurusan_kimia_wirausaha = $jumlah_jurusan_kimia_wirusaha/$jumlah_wirausaha;
    $p_jurusan_kimia_kemanusiaan = $jumlah_jurusan_kimia_kemanusiaan/$jumlah_kemanusiaan;
    $p_jurusan_kimia_senior = $jumlah_jurusan_kimia_senior/$jumlah_senior;
    $p_jurusan_kimia_mapala = $jumlah_jurusan_kimia_mapala/$jumlah_mapala;
    $p_jurusan_kimia_persma = $jumlah_jurusan_kimia_persma/$jumlah_persma;
    $p_jurusan_kimia_bahasa = $jumlah_jurusan_kimia_bahasa/$jumlah_bahasa;
    $p_jurusan_kimia_pramuka = $jumlah_jurusan_kimia_pramuka/$jumlah_pramuka;

    $p_jurusan_mesin_wirausaha = $jumlah_jurusan_mesin_wirusaha/$jumlah_wirausaha;
    $p_jurusan_mesin_kemanusiaan = $jumlah_jurusan_mesin_kemanusiaan/$jumlah_kemanusiaan;
    $p_jurusan_mesin_senior = $jumlah_jurusan_mesin_senior/$jumlah_senior;
    $p_jurusan_mesin_mapala = $jumlah_jurusan_mesin_mapala/$jumlah_mapala;
    $p_jurusan_mesin_persma = $jumlah_jurusan_mesin_persma/$jumlah_persma;
    $p_jurusan_mesin_bahasa = $jumlah_jurusan_mesin_bahasa/$jumlah_bahasa;
    $p_jurusan_mesin_pramuka = $jumlah_jurusan_mesin_pramuka/$jumlah_pramuka;

    $p_jurusan_sipil_wirausaha = $jumlah_jurusan_sipil_wirusaha/$jumlah_wirausaha;
    $p_jurusan_sipil_kemanusiaan = $jumlah_jurusan_sipil_kemanusiaan/$jumlah_kemanusiaan;
    $p_jurusan_sipil_senior = $jumlah_jurusan_sipil_senior/$jumlah_senior;
    $p_jurusan_sipil_mapala = $jumlah_jurusan_sipil_mapala/$jumlah_mapala;
    $p_jurusan_sipil_persma = $jumlah_jurusan_sipil_persma/$jumlah_persma;
    $p_jurusan_sipil_bahasa = $jumlah_jurusan_sipil_bahasa/$jumlah_bahasa;
    $p_jurusan_sipil_pramuka = $jumlah_jurusan_sipil_pramuka/$jumlah_pramuka;
    //display table probabilitas jurusan
        if($show_perhitungan){
    echo "<table class='table table-bordered table-striped  table-hover' style='width:40%'>";
        echo "<tr>";
            echo "<td><b><u>Jurusan:</u></b></td>";
            echo "<td>Wirausaha</td>";
            echo "<td>Kemanusiaan (ksr, humaniora)</td>";
            echo "<td>SENIOR (senior, bola, karate, taekwondo)</td>";
            echo "<td>Pecinta Alam (MAPALA)</td>";
            echo "<td>Persma</td>";
            echo "<td>Bahasa</td>";
            echo "<td>Pramuka</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Administrasi Niaga</td>";
            echo "<td>".number_format($p_jurusan_an_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_jurusan_an_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_jurusan_an_senior, dec())."</td>";
            echo "<td>".number_format($p_jurusan_an_mapala, dec())."</td>";
            echo "<td>".number_format($p_jurusan_an_persma, dec())."</td>";
            echo "<td>".number_format($p_jurusan_an_bahasa, dec())."</td>";
            echo "<td>".number_format($p_jurusan_an_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Akuntansi</td>";
            echo "<td>".number_format($p_jurusan_ak_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_jurusan_ak_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_jurusan_ak_senior, dec())."</td>";
            echo "<td>".number_format($p_jurusan_ak_mapala, dec())."</td>";
            echo "<td>".number_format($p_jurusan_ak_persma, dec())."</td>";
            echo "<td>".number_format($p_jurusan_ak_bahasa, dec())."</td>";
            echo "<td>".number_format($p_jurusan_ak_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Teknik Elektro</td>";
            echo "<td>".number_format($p_jurusan_elektro_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_jurusan_elektro_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_jurusan_elektro_senior, dec())."</td>";
            echo "<td>".number_format($p_jurusan_elektro_mapala, dec())."</td>";
            echo "<td>".number_format($p_jurusan_elektro_persma, dec())."</td>";
            echo "<td>".number_format($p_jurusan_elektro_bahasa, dec())."</td>";
            echo "<td>".number_format($p_jurusan_elektro_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Teknik Kimia</td>";
            echo "<td>".number_format($p_jurusan_kimia_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_jurusan_kimia_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_jurusan_kimia_senior, dec())."</td>";
            echo "<td>".number_format($p_jurusan_kimia_mapala, dec())."</td>";
            echo "<td>".number_format($p_jurusan_kimia_persma, dec())."</td>";
            echo "<td>".number_format($p_jurusan_kimia_bahasa, dec())."</td>";
            echo "<td>".number_format($p_jurusan_kimia_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Teknik Mesin</td>";
            echo "<td>".number_format($p_jurusan_mesin_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_jurusan_mesin_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_jurusan_mesin_senior, dec())."</td>";
            echo "<td>".number_format($p_jurusan_mesin_mapala, dec())."</td>";
            echo "<td>".number_format($p_jurusan_mesin_persma, dec())."</td>";
            echo "<td>".number_format($p_jurusan_mesin_bahasa, dec())."</td>";
            echo "<td>".number_format($p_jurusan_mesin_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Teknik Sipil</td>";
            echo "<td>".number_format($p_jurusan_sipil_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_jurusan_sipil_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_jurusan_sipil_senior, dec())."</td>";
            echo "<td>".number_format($p_jurusan_sipil_mapala, dec())."</td>";
            echo "<td>".number_format($p_jurusan_sipil_persma, dec())."</td>";
            echo "<td>".number_format($p_jurusan_sipil_bahasa, dec())."</td>";
            echo "<td>".number_format($p_jurusan_sipil_pramuka, dec())."</td>";
        echo "</tr>";
    echo "</table>";

    echo "<br>";
        }
    //------------------------------------------------------------------------------
    //jumlah atribut prodi
    $jumlah_prodi_ab3_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D3 Administrasi Bisnis' AND label='Wirausaha'");
    $jumlah_prodi_ab3_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D3 Administrasi Bisnis' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_ab3_senior = jumlah_data_training($db_object, " WHERE prodi='D3 Administrasi Bisnis' AND label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_ab3_mapala = jumlah_data_training($db_object, " WHERE prodi='D3 Administrasi Bisnis' AND label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_ab3_persma = jumlah_data_training($db_object, " WHERE prodi='D3 Administrasi Bisnis' AND label='Persma'");
    $jumlah_prodi_ab3_bahasa = jumlah_data_training($db_object, " WHERE prodi='D3 Administrasi Bisnis' AND label='Bahasa'");
    $jumlah_prodi_ab3_pramuka = jumlah_data_training($db_object, " WHERE prodi='D3 Administrasi Bisnis' AND label='Pramuka'");
        
    $jumlah_prodi_ak3_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D3 Akuntansi' AND label='Wirausaha'");
    $jumlah_prodi_ak3_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D3 Akuntansi' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_ak3_senior = jumlah_data_training($db_object, " WHERE prodi='D3 Akuntansi' AND label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_ak3_mapala = jumlah_data_training($db_object, " WHERE prodi='D3 Akuntansi' AND label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_ak3_persma = jumlah_data_training($db_object, " WHERE prodi='D3 Akuntansi' AND label='Persma'");
    $jumlah_prodi_ak3_bahasa = jumlah_data_training($db_object, " WHERE prodi='D3 Akuntansi' AND label='Bahasa'");
    $jumlah_prodi_ak3_pramuka = jumlah_data_training($db_object, " WHERE prodi='D3 Akuntansi' AND label='Pramuka'");

    $jumlah_prodi_ank_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D3 Analisis Kimia' AND label='Wirausaha'");
    $jumlah_prodi_ank_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D3 Analisis Kimia' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_ank_senior = jumlah_data_training($db_object, " WHERE prodi='D3 Analisis Kimia' AND label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_ank_mapala = jumlah_data_training($db_object, " WHERE prodi='D3 Analisis Kimia' AND label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_ank_persma = jumlah_data_training($db_object, " WHERE prodi='D3 Analisis Kimia' AND label='Persma'");
    $jumlah_prodi_ank_bahasa = jumlah_data_training($db_object, " WHERE prodi='D3 Analisis Kimia' AND label='Bahasa'");
    $jumlah_prodi_ank_pramuka = jumlah_data_training($db_object, " WHERE prodi='D3 Analisis Kimia' AND label='Pramuka'");

    $jumlah_prodi_te_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Elektronika' AND label='Wirausaha'");
    $jumlah_prodi_te_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Elektronika' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_te_senior = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Elektronika' AND label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_te_mapala = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Elektronika' AND label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_te_persma = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Elektronika' AND label='Persma'");
    $jumlah_prodi_te_bahasa = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Elektronika' AND label='Bahasa'");
    $jumlah_prodi_te_pramuka = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Elektronika' AND label='Pramuka'");

    $jumlah_prodi_tk3_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Kimia' AND label='Wirausaha'");
    $jumlah_prodi_tk3_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Kimia' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_tk3_senior = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Kimia' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_tk3_mapala = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Kimia' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_tk3_persma = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Kimia' AND 
        label='Persma'");
    $jumlah_prodi_tk3_bahasa = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Kimia' AND 
        label='Bahasa'");
    $jumlah_prodi_tk3_pramuka = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Kimia' AND 
        label='Pramuka'");

    $jumlah_prodi_tkm_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Kimia Mineral' AND label='Wirausaha'");
    $jumlah_prodi_tkm_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Kimia Mineral' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_tkm_senior = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Kimia Mineral' AND label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_tkm_mapala = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Kimia Mineral' AND label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_tkm_persma = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Kimia Mineral' AND label='Persma'");
    $jumlah_prodi_tkm_bahasa = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Kimia Mineral' AND label='Bahasa'");
    $jumlah_prodi_tkm_pramuka = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Kimia Mineral' AND label='Pramuka'");

    $jumlah_prodi_tks3_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konstruksi' AND label='Wirausaha'");
    $jumlah_prodi_tks3_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konstruksi' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_tks3_senior = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konstruksi' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_tks3_mapala = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konstruksi' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_tks3_persma = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konstruksi' AND 
        label='Persma'");
    $jumlah_prodi_tks3_bahasa = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konstruksi' AND 
        label='Bahasa'");
    $jumlah_prodi_tks3_pramuka = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konstruksi' AND 
        label='Pramuka'");

    $jumlah_prodi_tkg_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konstruksi Gedung' AND label='Wirausaha'");
    $jumlah_prodi_tkg_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konstruksi Gedung' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_tkg_senior = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konstruksi Gedung' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_tkg_mapala = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konstruksi Gedung' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_tkg_persma = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konstruksi Gedung' AND 
        label='Persma'");
    $jumlah_prodi_tkg_bahasa = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konstruksi Gedung' AND 
        label='Bahasa'");
    $jumlah_prodi_tkg_pramuka = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konstruksi Gedung' AND 
        label='Pramuka'");

    $jumlah_prodi_tkjj_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konstruksi Jalan dan Jembatan' AND label='Wirausaha'");
    $jumlah_prodi_tkjj_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konstruksi Jalan dan Jembatan' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_tkjj_senior = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konstruksi Jalan dan Jembatan' AND label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_tkjj_mapala = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konstruksi Jalan dan Jembatan' AND label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_tkjj_persma = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konstruksi Jalan dan Jembatan' AND label='Persma'");
    $jumlah_prodi_tkjj_bahasa = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konstruksi Jalan dan Jembatan' AND label='Bahasa'");
    $jumlah_prodi_tkjj_pramuka = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konstruksi Jalan dan Jembatan' AND label='Pramuka'");

    $jumlah_prodi_tke_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konversi Energi' AND label='Wirausaha'");
    $jumlah_prodi_tke_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konversi Energi' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_tke_senior = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konversi Energi' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_tke_mapala = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konversi Energi' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_tke_persma = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konversi Energi' AND 
        label='Persma'");
    $jumlah_prodi_tke_bahasa = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konversi Energi' AND 
        label='Bahasa'");
    $jumlah_prodi_tke_pramuka = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Konversi Energi' AND 
        label='Pramuka'");

    $jumlah_prodi_tl3_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Listrik' AND label='Wirausaha'");
    $jumlah_prodi_tl3_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Listrik' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_tl3_senior = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Listrik' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_tl3_mapala = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Listrik' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_tl3_persma = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Listrik' AND 
        label='Persma'");
    $jumlah_prodi_tl3_bahasa = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Listrik' AND 
        label='Bahasa'");
    $jumlah_prodi_tl3_pramuka = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Listrik' AND 
        label='Pramuka'");

    $jumlah_prodi_tmk3_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Mekatronika' AND label='Wirausaha'");
    $jumlah_prodi_tmk3_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Mekatronika' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_tmk3_senior = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Mekatronika' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_tmk3_mapala = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Mekatronika' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_tmk3_persma = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Mekatronika' AND 
        label='Persma'");
    $jumlah_prodi_tmk3_bahasa = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Mekatronika' AND 
        label='Bahasa'");
    $jumlah_prodi_tmk3_pramuka = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Mekatronika' AND 
        label='Pramuka'");

    $jumlah_prodi_tm_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Mesin' AND label='Wirausaha'");
    $jumlah_prodi_tk_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Mesin' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_tm_senior = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Mesin' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_tm_mapala = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Mesin' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_tm_persma = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Mesin' AND 
        label='Persma'");
    $jumlah_prodi_tm_bahasa = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Mesin' AND 
        label='Bahasa'");
    $jumlah_prodi_tm_pramuka = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Mesin' AND 
        label='Pramuka'");

    $jumlah_prodi_to_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Otomotif' AND label='Wirausaha'");
    $jumlah_prodi_to_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Otomotif' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_to_senior = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Otomotif' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_to_mapala = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Otomotif' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_to_persma = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Otomotif' AND 
        label='Persma'");
    $jumlah_prodi_to_bahasa = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Otomotif' AND 
        label='Bahasa'");
    $jumlah_prodi_to_pramuka = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Otomotif' AND 
        label='Pramuka'");

    $jumlah_prodi_tpab_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Perawatan Alat Berat' AND label='Wirausaha'");
    $jumlah_prodi_tpab_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Perawatan Alat Berat' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_tpab_senior = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Perawatan Alat Berat' AND label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_tpab_mapala = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Perawatan Alat Berat' AND label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_tpab_persma = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Perawatan Alat Berat' AND label='Persma'");
    $jumlah_prodi_tpab_bahasa = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Perawatan Alat Berat' AND label='Bahasa'");
    $jumlah_prodi_tpab_pramuka = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Perawatan Alat Berat' AND label='Pramuka'");

    $jumlah_prodi_ts_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Sipil' AND label='Wirausaha'");
    $jumlah_prodi_ts_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Sipil' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_ts_senior = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Sipil' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_ts_mapala = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Sipil' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_ts_persma = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Sipil' AND 
        label='Persma'");
    $jumlah_prodi_ts_bahasa = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Sipil' AND 
        label='Bahasa'");
    $jumlah_prodi_ts_pramuka = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Sipil' AND 
        label='Pramuka'");

    $jumlah_prodi_ttl_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Telekomunikasi' AND label='Wirausaha'");
    $jumlah_prodi_ttl_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Telekomunikasi' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_ttl_senior = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Telekomunikasi' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_ttl_mapala = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Telekomunikasi' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_ttl_persma = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Telekomunikasi' AND 
        label='Persma'");
    $jumlah_prodi_ttl_bahasa = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Telekomunikasi' AND 
        label='Bahasa'");
    $jumlah_prodi_ttl_pramuka = jumlah_data_training($db_object, " WHERE prodi='D3 Teknik Telekomunikasi' AND 
        label='Pramuka'");

    $jumlah_prodi_ab4_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D4 Administrasi Bisnis' AND label='Wirausaha'");
    $jumlah_prodi_ab4_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D4 Administrasi Bisnis' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_ab4_senior = jumlah_data_training($db_object, " WHERE prodi='D4 Administrasi Bisnis' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_ab4_mapala = jumlah_data_training($db_object, " WHERE prodi='D4 Administrasi Bisnis' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_ab4_persma = jumlah_data_training($db_object, " WHERE prodi='D4 Administrasi Bisnis' AND 
        label='Persma'");
    $jumlah_prodi_ab4_bahasa = jumlah_data_training($db_object, " WHERE prodi='D4 Administrasi Bisnis' AND 
        label='Bahasa'");
    $jumlah_prodi_ab4_pramuka = jumlah_data_training($db_object, " WHERE prodi='D4 Administrasi Bisnis' AND 
        label='Pramuka'");

    $jumlah_prodi_akm_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D4 Akuntansi Manajerial' AND
        label='Wirausaha'");
    $jumlah_prodi_akm_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D4 Akuntansi Manajerial' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_akm_senior = jumlah_data_training($db_object, " WHERE prodi='D4 Akuntansi Manajerial' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_akm_mapala = jumlah_data_training($db_object, " WHERE prodi='D4 Akuntansi Manajerial' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_akm_persma = jumlah_data_training($db_object, " WHERE prodi='D4 Akuntansi Manajerial' AND 
        label='Persma'");
    $jumlah_prodi_akm_bahasa = jumlah_data_training($db_object, " WHERE prodi='D4 Akuntansi Manajerial' AND 
        label='Bahasa'");
    $jumlah_prodi_akm_pramuka = jumlah_data_training($db_object, " WHERE prodi='D4 Akuntansi Manajerial' AND 
        label='Pramuka'");

    $jumlah_prodi_tk4_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Kimia' AND label='Wirausaha'");
    $jumlah_prodi_tk4_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Kimia' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_tk4_senior = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Kimia' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_tk4_mapala = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Kimia' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_tk4_persma = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Kimia' AND 
        label='Persma'");
    $jumlah_prodi_tk4_bahasa = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Kimia' AND 
        label='Bahasa'");
    $jumlah_prodi_tk4_pramuka = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Kimia' AND 
        label='Pramuka'");

    $jumlah_prodi_tkj_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Komputer dan Jaringan' AND label='Wirausaha'");
    $jumlah_prodi_tkj_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Komputer dan Jaringan' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_tkj_senior = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Komputer dan Jaringan' AND label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_tkj_mapala = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Komputer dan Jaringan' AND label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_tkj_persma = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Komputer dan Jaringan' AND label='Persma'");
    $jumlah_prodi_tkj_bahasa = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Komputer dan Jaringan' AND label='Bahasa'");
    $jumlah_prodi_tkj_pramuka = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Komputer dan Jaringan' AND label='Pramuka'");

    $jumlah_prodi_tks4_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Konstruksi' AND label='Wirausaha'");
    $jumlah_prodi_tks4_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Konstruksi' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_tks4_senior = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Konstruksi' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_tks4_mapala = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Konstruksi' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_tks4_persma = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Konstruksi' AND 
        label='Persma'");
    $jumlah_prodi_tks4_bahasa = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Konstruksi' AND 
        label='Bahasa'");
    $jumlah_prodi_tks4_pramuka = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Konstruksi' AND 
        label='Pramuka'");

    $jumlah_prodi_tl4_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Listrik' AND label='Wirausaha'");
    $jumlah_prodi_tl4_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Listrik' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_tl4_senior = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Listrik' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_tl4_mapala = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Listrik' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_tl4_persma = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Listrik' AND 
        label='Persma'");
    $jumlah_prodi_tl4_bahasa = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Listrik' AND 
        label='Bahasa'");
    $jumlah_prodi_tl4_pramuka = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Listrik' AND 
        label='Pramuka'");

    $jumlah_prodi_tmf4_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Manufaktur' AND label='Wirausaha'");
    $jumlah_prodi_tmf4_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Manufaktur' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_tmf4_senior = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Manufaktur' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_tmf4_mapala = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Manufaktur' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_tmf4_persma = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Manufaktur' AND 
        label='Persma'");
    $jumlah_prodi_tmf4_bahasa = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Manufaktur' AND 
        label='Bahasa'");
    $jumlah_prodi_tmf4_pramuka = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Manufaktur' AND 
        label='Pramuka'");

    $jumlah_prodi_tmk4_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Mekatronika' AND label='Wirausaha'");
    $jumlah_prodi_tmk4_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Mekatronika' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_tmk4_senior = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Mekatronika' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_tmk4_mapala = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Mekatronika' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_tmk4_persma = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Mekatronika' AND 
        label='Persma'");
    $jumlah_prodi_tmk4_bahasa = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Mekatronika' AND 
        label='Bahasa'");
    $jumlah_prodi_tmk4_pramuka = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Mekatronika' AND 
        label='Pramuka'");

    $jumlah_prodi_tmj_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Multimedia dan Jaringan' AND label='Wirausaha'");
    $jumlah_prodi_tmj_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Multimedia dan Jaringan' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_tmj_senior = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Multimedia dan Jaringan' AND label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_tmj_mapala = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Multimedia dan Jaringan' AND label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_tmj_persma = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Multimedia dan Jaringan' AND label='Persma'");
    $jumlah_prodi_tmj_bahasa = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Multimedia dan Jaringan' AND label='Bahasa'");
    $jumlah_prodi_tmj_pramuka = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Multimedia dan Jaringan' AND label='Pramuka'");

    $jumlah_prodi_tpe_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Pembangkit Energi' AND label='Wirausaha'");
    $jumlah_prodi_tpe_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Pembangkit Energi' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_tpe_senior = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Pembangkit Energi' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_tpe_mapala = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Pembangkit Energi' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_tpe_persma = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Pembangkit Energi' AND 
        label='Persma'");
    $jumlah_prodi_tpe_bahasa = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Pembangkit Energi' AND 
        label='Bahasa'");
    $jumlah_prodi_tpe_pramuka = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Pembangkit Energi' AND 
        label='Pramuka'");

    $jumlah_prodi_tki_wirausaha = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Kimia Industri' AND label='Wirausaha'");
    $jumlah_prodi_tki_kemanusiaan = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Kimia Industri' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_prodi_tki_senior = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Kimia Industri' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_prodi_tki_mapala = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Kimia Industri' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_prodi_tki_persma = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Kimia Industri' AND 
        label='Persma'");
    $jumlah_prodi_tki_bahasa = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Kimia Industri' AND 
        label='Bahasa'");
    $jumlah_prodi_tki_pramuka = jumlah_data_training($db_object, " WHERE prodi='D4 Teknik Kimia Industri' AND 
        label='Pramuka'");
    //probabilitas atribut prodi
    $p_prodi_ab3_wirausaha = $jumlah_prodi_ab3_wirusaha/$jumlah_wirausaha;
    $p_prodi_ab3_kemanusiaan = $jumlah_prodi_ab3_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_ab3_senior = $jumlah_prodi_ab3_senior/$jumlah_senior;
    $p_prodi_ab3_mapala = $jumlah_prodi_ab3_mapala/$jumlah_mapala;
    $p_prodi_ab3_persma = $jumlah_prodi_ab3_persma/$jumlah_persma;
    $p_prodi_ab3_bahasa = $jumlah_prodi_ab3_bahasa/$jumlah_bahasa;
    $p_prodi_ab3_pramuka = $jumlah_prodi_ab3_pramuka/$jumlah_pramuka;
        
    $p_prodi_ak3_wirausaha = $jumlah_prodi_ak3_wirusaha/$jumlah_wirausaha;
    $p_prodi_ak3_kemanusiaan = $jumlah_prodi_ak3_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_ak3_senior = $jumlah_prodi_ak3_senior/$jumlah_senior;
    $p_prodi_ak3_mapala = $jumlah_prodi_ak3_mapala/$jumlah_mapala;
    $p_prodi_ak3_persma = $jumlah_prodi_ak3_persma/$jumlah_persma;
    $p_prodi_ak3_bahasa = $jumlah_prodi_ak3_bahasa/$jumlah_bahasa;
    $p_prodi_ak3_pramuka = $jumlah_prodi_ak3_pramuka/$jumlah_pramuka;

    $p_prodi_ank_wirausaha = $jumlah_prodi_ank_wirusaha/$jumlah_wirausaha;
    $p_prodi_ank_kemanusiaan = $jumlah_prodi_ank_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_ank_senior = $jumlah_prodi_ank_senior/$jumlah_senior;
    $p_prodi_ank_mapala = $jumlah_prodi_ank_mapala/$jumlah_mapala;
    $p_prodi_ank_persma = $jumlah_prodi_ank_persma/$jumlah_persma;
    $p_prodi_ank_bahasa = $jumlah_prodi_ank_bahasa/$jumlah_bahasa;
    $p_prodi_ank_pramuka = $jumlah_prodi_ank_pramuka/$jumlah_pramuka;

    $p_prodi_te_wirausaha = $jumlah_prodi_te_wirusaha/$jumlah_wirausaha;
    $p_prodi_te_kemanusiaan = $jumlah_prodi_te_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_te_senior = $jumlah_prodi_te_senior/$jumlah_senior;
    $p_prodi_te_mapala = $jumlah_prodi_te_mapala/$jumlah_mapala;
    $p_prodi_te_persma = $jumlah_prodi_te_persma/$jumlah_persma;
    $p_prodi_te_bahasa = $jumlah_prodi_te_bahasa/$jumlah_bahasa;
    $p_prodi_te_pramuka = $jumlah_prodi_te_pramuka/$jumlah_pramuka;

    $p_prodi_tk3_wirausaha = $jumlah_prodi_tk3_wirusaha/$jumlah_wirausaha;
    $p_prodi_tk3_kemanusiaan = $jumlah_prodi_tk3_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_tk3_senior = $jumlah_prodi_tk3_senior/$jumlah_senior;
    $p_prodi_tk3_mapala = $jumlah_prodi_tk3_mapala/$jumlah_mapala;
    $p_prodi_tk3_persma = $jumlah_prodi_tk3_persma/$jumlah_persma;
    $p_prodi_tk3_bahasa = $jumlah_prodi_tk3_bahasa/$jumlah_bahasa;
    $p_prodi_tk3_pramuka = $jumlah_prodi_tk3_pramuka/$jumlah_pramuka;

    $p_prodi_tkm_wirausaha = $jumlah_prodi_tkm_wirusaha/$jumlah_wirausaha;
    $p_prodi_tkm_kemanusiaan = $jumlah_prodi_tkm_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_tkm_senior = $jumlah_prodi_tkm_senior/$jumlah_senior;
    $p_prodi_tkm_mapala = $jumlah_prodi_tkm_mapala/$jumlah_mapala;
    $p_prodi_tkm_persma = $jumlah_prodi_tkm_persma/$jumlah_persma;
    $p_prodi_tkm_bahasa = $jumlah_prodi_tkm_bahasa/$jumlah_bahasa;
    $p_prodi_tkm_pramuka = $jumlah_prodi_tkm_pramuka/$jumlah_pramuka;

    $p_prodi_tks3_wirausaha = $jumlah_prodi_tks3_wirusaha/$jumlah_wirausaha;
    $p_prodi_tks3_kemanusiaan = $jumlah_prodi_tks3_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_tks3_senior = $jumlah_prodi_tks3_senior/$jumlah_senior;
    $p_prodi_tks3_mapala = $jumlah_prodi_tks3_mapala/$jumlah_mapala;
    $p_prodi_tks3_persma = $jumlah_prodi_tks3_persma/$jumlah_persma;
    $p_prodi_tks3_bahasa = $jumlah_prodi_tks3_bahasa/$jumlah_bahasa;
    $p_prodi_tks3_pramuka = $jumlah_prodi_tks3_pramuka/$jumlah_pramuka;

    $p_prodi_tkg_wirausaha = $jumlah_prodi_tkg_wirusaha/$jumlah_wirausaha;
    $p_prodi_tkg_kemanusiaan = $jumlah_prodi_tkg_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_tkg_senior = $jumlah_prodi_tkg_senior/$jumlah_senior;
    $p_prodi_tkg_mapala = $jumlah_prodi_tkg_mapala/$jumlah_mapala;
    $p_prodi_tkg_persma = $jumlah_prodi_tkg_persma/$jumlah_persma;
    $p_prodi_tkg_bahasa = $jumlah_prodi_tkg_bahasa/$jumlah_bahasa;
    $p_prodi_tkg_pramuka = $jumlah_prodi_tkg_pramuka/$jumlah_pramuka;

    $p_prodi_tkjj_wirausaha = $jumlah_prodi_tkjj_wirusaha/$jumlah_wirausaha;
    $p_prodi_tkjj_kemanusiaan = $jumlah_prodi_tkjj_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_tkjj_senior = $jumlah_prodi_tkjj_senior/$jumlah_senior;
    $p_prodi_tkjj_mapala = $jumlah_prodi_tkjj_mapala/$jumlah_mapala;
    $p_prodi_tkjj_persma = $jumlah_prodi_tkjj_persma/$jumlah_persma;
    $p_prodi_tkjj_bahasa = $jumlah_prodi_tkjj_bahasa/$jumlah_bahasa;
    $p_prodi_tkjj_pramuka = $jumlah_prodi_tkjj_pramuka/$jumlah_pramuka;

    $p_prodi_tke_wirausaha = $jumlah_prodi_tke_wirusaha/$jumlah_wirausaha;
    $p_prodi_tke_kemanusiaan = $jumlah_prodi_tke_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_tke_senior = $jumlah_prodi_tke_senior/$jumlah_senior;
    $p_prodi_tke_mapala = $jumlah_prodi_tke_mapala/$jumlah_mapala;
    $p_prodi_tke_persma = $jumlah_prodi_tke_persma/$jumlah_persma;
    $p_prodi_tke_bahasa = $jumlah_prodi_tke_bahasa/$jumlah_bahasa;
    $p_prodi_tke_pramuka = $jumlah_prodi_tke_pramuka/$jumlah_pramuka;

    $p_prodi_tl3_wirausaha = $jumlah_prodi_tl3_wirusaha/$jumlah_wirausaha;
    $p_prodi_tl3_kemanusiaan = $jumlah_prodi_tl3_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_tl3_senior = $jumlah_prodi_tl3_senior/$jumlah_senior;
    $p_prodi_tl3_mapala = $jumlah_prodi_tl3_mapala/$jumlah_mapala;
    $p_prodi_tl3_persma = $jumlah_prodi_tl3_persma/$jumlah_persma;
    $p_prodi_tl3_bahasa = $jumlah_prodi_tl3_bahasa/$jumlah_bahasa;
    $p_prodi_tl3_pramuka = $jumlah_prodi_tl3_pramuka/$jumlah_pramuka;

    $p_prodi_tmk3_wirausaha = $jumlah_prodi_tmk3_wirusaha/$jumlah_wirausaha;
    $p_prodi_tmk3_kemanusiaan = $jumlah_prodi_tmk3_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_tmk3_senior = $jumlah_prodi_tmk3_senior/$jumlah_senior;
    $p_prodi_tmk3_mapala = $jumlah_prodi_tmk3_mapala/$jumlah_mapala;
    $p_prodi_tmk3_persma = $jumlah_prodi_tmk3_persma/$jumlah_persma;
    $p_prodi_tmk3_bahasa = $jumlah_prodi_tmk3_bahasa/$jumlah_bahasa;
    $p_prodi_tmk3_pramuka = $jumlah_prodi_tmk3_pramuka/$jumlah_pramuka;

    $p_prodi_tm_wirausaha = $jumlah_prodi_tm_wirusaha/$jumlah_wirausaha;
    $p_prodi_tm_kemanusiaan = $jumlah_prodi_tm_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_tm_senior = $jumlah_prodi_tm_senior/$jumlah_senior;
    $p_prodi_tm_mapala = $jumlah_prodi_tm_mapala/$jumlah_mapala;
    $p_prodi_tm_persma = $jumlah_prodi_tm_persma/$jumlah_persma;
    $p_prodi_tm_bahasa = $jumlah_prodi_tm_bahasa/$jumlah_bahasa;
    $p_prodi_tm_pramuka = $jumlah_prodi_tm_pramuka/$jumlah_pramuka;

    $p_prodi_to_wirausaha = $jumlah_prodi_to_wirusaha/$jumlah_wirausaha;
    $p_prodi_to_kemanusiaan = $jumlah_prodi_to_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_to_senior = $jumlah_prodi_to_senior/$jumlah_senior;
    $p_prodi_to_mapala = $jumlah_prodi_to_mapala/$jumlah_mapala;
    $p_prodi_to_persma = $jumlah_prodi_to_persma/$jumlah_persma;
    $p_prodi_to_bahasa = $jumlah_prodi_to_bahasa/$jumlah_bahasa;
    $p_prodi_to_pramuka = $jumlah_prodi_to_pramuka/$jumlah_pramuka;

    $p_prodi_tpab_wirausaha = $jumlah_prodi_tpab_wirusaha/$jumlah_wirausaha;
    $p_prodi_tpab_kemanusiaan = $jumlah_prodi_tpab_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_tpab_senior = $jumlah_prodi_tpab_senior/$jumlah_senior;
    $p_prodi_tpab_mapala = $jumlah_prodi_tpab_mapala/$jumlah_mapala;
    $p_prodi_tpab_persma = $jumlah_prodi_tpab_persma/$jumlah_persma;
    $p_prodi_tpab_bahasa = $jumlah_prodi_tpab_bahasa/$jumlah_bahasa;
    $p_prodi_tpab_pramuka = $jumlah_prodi_tpab_pramuka/$jumlah_pramuka;

    $p_prodi_ts_wirausaha = $jumlah_prodi_ts_wirusaha/$jumlah_wirausaha;
    $p_prodi_ts_kemanusiaan = $jumlah_prodi_ts_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_ts_senior = $jumlah_prodi_ts_senior/$jumlah_senior;
    $p_prodi_ts_mapala = $jumlah_prodi_ts_mapala/$jumlah_mapala;
    $p_prodi_ts_persma = $jumlah_prodi_ts_persma/$jumlah_persma;
    $p_prodi_ts_bahasa = $jumlah_prodi_ts_bahasa/$jumlah_bahasa;
    $p_prodi_ts_pramuka = $jumlah_prodi_ts_pramuka/$jumlah_pramuka;

    $p_prodi_ttl_wirausaha = $jumlah_prodi_ttl_wirusaha/$jumlah_wirausaha;
    $p_prodi_ttl_kemanusiaan = $jumlah_prodi_ttl_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_ttl_senior = $jumlah_prodi_ttl_senior/$jumlah_senior;
    $p_prodi_ttl_mapala = $jumlah_prodi_ttl_mapala/$jumlah_mapala;
    $p_prodi_ttl_persma = $jumlah_prodi_ttl_persma/$jumlah_persma;
    $p_prodi_ttl_bahasa = $jumlah_prodi_ttl_bahasa/$jumlah_bahasa;
    $p_prodi_ttl_pramuka = $jumlah_prodi_ttl_pramuka/$jumlah_pramuka;

    $p_prodi_ab4_wirausaha = $jumlah_prodi_ab4_wirusaha/$jumlah_wirausaha;
    $p_prodi_ab4_kemanusiaan = $jumlah_prodi_ab4_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_ab4_senior = $jumlah_prodi_ab4_senior/$jumlah_senior;
    $p_prodi_ab4_mapala = $jumlah_prodi_ab4_mapala/$jumlah_mapala;
    $p_prodi_ab4_persma = $jumlah_prodi_ab4_persma/$jumlah_persma;
    $p_prodi_ab4_bahasa = $jumlah_prodi_ab4_bahasa/$jumlah_bahasa;
    $p_prodi_ab4_pramuka = $jumlah_prodi_ab4_pramuka/$jumlah_pramuka;

    $p_prodi_akm_wirausaha = $jumlah_prodi_akm_wirusaha/$jumlah_wirausaha;
    $p_prodi_akm_kemanusiaan = $jumlah_prodi_akm_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_akm_senior = $jumlah_prodi_akm_senior/$jumlah_senior;
    $p_prodi_akm_mapala = $jumlah_prodi_akm_mapala/$jumlah_mapala;
    $p_prodi_akm_persma = $jumlah_prodi_akm_persma/$jumlah_persma;
    $p_prodi_akm_bahasa = $jumlah_prodi_akm_bahasa/$jumlah_bahasa;
    $p_prodi_akm_pramuka = $jumlah_prodi_akm_pramuka/$jumlah_pramuka;

    $p_prodi_tk4_wirausaha = $jumlah_prodi_tk4_wirusaha/$jumlah_wirausaha;
    $p_prodi_tk4_kemanusiaan = $jumlah_prodi_tk4_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_tk4_senior = $jumlah_prodi_tk4_senior/$jumlah_senior;
    $p_prodi_tk4_mapala = $jumlah_prodi_tk4_mapala/$jumlah_mapala;
    $p_prodi_tk4_persma = $jumlah_prodi_tk4_persma/$jumlah_persma;
    $p_prodi_tk4_bahasa = $jumlah_prodi_tk4_bahasa/$jumlah_bahasa;
    $p_prodi_tk4_pramuka = $jumlah_prodi_tk4_pramuka/$jumlah_pramuka;

    $p_prodi_tkj_wirausaha = $jumlah_prodi_tkj_wirusaha/$jumlah_wirausaha;
    $p_prodi_tkj_kemanusiaan = $jumlah_prodi_tkj_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_tkj_senior = $jumlah_prodi_tkj_senior/$jumlah_senior;
    $p_prodi_tkj_mapala = $jumlah_prodi_tkj_mapala/$jumlah_mapala;
    $p_prodi_tkj_persma = $jumlah_prodi_tkj_persma/$jumlah_persma;
    $p_prodi_tkj_bahasa = $jumlah_prodi_tkj_bahasa/$jumlah_bahasa;
    $p_prodi_tkj_pramuka = $jumlah_prodi_tkj_pramuka/$jumlah_pramuka;

    $p_prodi_tks4_wirausaha = $jumlah_prodi_tks4_wirusaha/$jumlah_wirausaha;
    $p_prodi_tks4_kemanusiaan = $jumlah_prodi_tks4_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_tks4_senior = $jumlah_prodi_tks4_senior/$jumlah_senior;
    $p_prodi_tks4_mapala = $jumlah_prodi_tks4_mapala/$jumlah_mapala;
    $p_prodi_tks4_persma = $jumlah_prodi_tks4_persma/$jumlah_persma;
    $p_prodi_tks4_bahasa = $jumlah_prodi_tks4_bahasa/$jumlah_bahasa;
    $p_prodi_tks4_pramuka = $jumlah_prodi_tks4_pramuka/$jumlah_pramuka;

    $p_prodi_tl4_wirausaha = $jumlah_prodi_tl4_wirusaha/$jumlah_wirausaha;
    $p_prodi_tl4_kemanusiaan = $jumlah_prodi_tl4_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_tl4_senior = $jumlah_prodi_tl4_senior/$jumlah_senior;
    $p_prodi_tl4_mapala = $jumlah_prodi_tl4_mapala/$jumlah_mapala;
    $p_prodi_tl4_persma = $jumlah_prodi_tl4_persma/$jumlah_persma;
    $p_prodi_tl4_bahasa = $jumlah_prodi_tl4_bahasa/$jumlah_bahasa;
    $p_prodi_tl4_pramuka = $jumlah_prodi_tl4_pramuka/$jumlah_pramuka;

    $p_prodi_tmf4_wirausaha = $jumlah_prodi_tmf4_wirusaha/$jumlah_wirausaha;
    $p_prodi_tmf4_kemanusiaan = $jumlah_prodi_tmf4_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_tmf4_senior = $jumlah_prodi_tmf4_senior/$jumlah_senior;
    $p_prodi_tmf4_mapala = $jumlah_prodi_tmf4_mapala/$jumlah_mapala;
    $p_prodi_tmf4_persma = $jumlah_prodi_tmf4_persma/$jumlah_persma;
    $p_prodi_tmf4_bahasa = $jumlah_prodi_tmf4_bahasa/$jumlah_bahasa;
    $p_prodi_tmf4_pramuka = $jumlah_prodi_tmf4_pramuka/$jumlah_pramuka;

    $p_prodi_tmk4_wirausaha = $jumlah_prodi_tmk4_wirusaha/$jumlah_wirausaha;
    $p_prodi_tmk4_kemanusiaan = $jumlah_prodi_tmk4_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_tmk4_senior = $jumlah_prodi_tmk4_senior/$jumlah_senior;
    $p_prodi_tmk4_mapala = $jumlah_prodi_tmk4_mapala/$jumlah_mapala;
    $p_prodi_tmk4_persma = $jumlah_prodi_tmk4_persma/$jumlah_persma;
    $p_prodi_tmk4_bahasa = $jumlah_prodi_tmk4_bahasa/$jumlah_bahasa;
    $p_prodi_tmk4_pramuka = $jumlah_prodi_tmk4_pramuka/$jumlah_pramuka;

    $p_prodi_tmj_wirausaha = $jumlah_prodi_tmj_wirusaha/$jumlah_wirausaha;
    $p_prodi_tmj_kemanusiaan = $jumlah_prodi_tmj_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_tmj_senior = $jumlah_prodi_tmj_senior/$jumlah_senior;
    $p_prodi_tmj_mapala = $jumlah_prodi_tmj_mapala/$jumlah_mapala;
    $p_prodi_tmj_persma = $jumlah_prodi_tmj_persma/$jumlah_persma;
    $p_prodi_tmj_bahasa = $jumlah_prodi_tmj_bahasa/$jumlah_bahasa;
    $p_prodi_tmj_pramuka = $jumlah_prodi_tmj_pramuka/$jumlah_pramuka;

    $p_prodi_tpe_wirausaha = $jumlah_prodi_tpe_wirusaha/$jumlah_wirausaha;
    $p_prodi_tpe_kemanusiaan = $jumlah_prodi_tpe_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_tpe_senior = $jumlah_prodi_tpe_senior/$jumlah_senior;
    $p_prodi_tpe_mapala = $jumlah_prodi_tpe_mapala/$jumlah_mapala;
    $p_prodi_tpe_persma = $jumlah_prodi_tpe_persma/$jumlah_persma;
    $p_prodi_tpe_bahasa = $jumlah_prodi_tpe_bahasa/$jumlah_bahasa;
    $p_prodi_tpe_pramuka = $jumlah_prodi_tpe_pramuka/$jumlah_pramuka;

    $p_prodi_tki_wirausaha = $jumlah_prodi_tki_wirusaha/$jumlah_wirausaha;
    $p_prodi_tki_kemanusiaan = $jumlah_prodi_tki_kemanusiaan/$jumlah_kemanusiaan;
    $p_prodi_tki_senior = $jumlah_prodi_tki_senior/$jumlah_senior;
    $p_prodi_tki_mapala = $jumlah_prodi_tki_mapala/$jumlah_mapala;
    $p_prodi_tki_persma = $jumlah_prodi_tki_persma/$jumlah_persma;
    $p_prodi_tki_bahasa = $jumlah_prodi_tki_bahasa/$jumlah_bahasa;
    $p_prodi_tki_pramuka = $jumlah_prodi_tki_pramuka/$jumlah_pramuka;
    //display table probabilitas prodi
        if($show_perhitungan){
    echo "<table class='table table-bordered table-striped  table-hover' style='width:40%'>";
        echo "<tr>";
            echo "<td><b><u>Prodi:</u></b></td>";
            echo "<td>Wirausaha</td>";
            echo "<td>Kemanusiaan (ksr, humaniora)</td>";
            echo "<td>SENIOR (senior, bola, karate, taekwondo)</td>";
            echo "<td>Pecinta Alam (MAPALA)</td>";
            echo "<td>Persma</td>";
            echo "<td>Bahasa</td>";
            echo "<td>Pramuka</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D3 Administrasi Bisnis</td>";
            echo "<td>".number_format($p_prodi_ab3_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_ab3_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_ab3_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_ab3_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_ab3_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_ab3_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_ab3_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D3 Akuntansi</td>";
            echo "<td>".number_format($p_prodi_ak3_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_ak3_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_ak3_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_ak3_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_ak3_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_ak3_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_ak3_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D3 Analisis Kimia</td>";
            echo "<td>".number_format($p_prodi_ank_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_ank_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_ank_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_ank_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_ank_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_ank_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_ank_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D3 Teknik Elektronika</td>";
            echo "<td>".number_format($p_prodi_te_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_te_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_te_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_te_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_te_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_te_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_te_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D3 Teknik Kimia</td>";
            echo "<td>".number_format($p_prodi_tk3_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_tk3_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_tk3_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_tk3_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_tk3_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_tk3_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_tk3_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D3 Teknik Kimia Mineral</td>";
            echo "<td>".number_format($p_prodi_tkm_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_tkm_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_tkm_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_tkm_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_tkm_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_tkm_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_tkm_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D3 Teknik Konstruksi</td>";
            echo "<td>".number_format($p_prodi_tks3_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_tks3_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_tks3_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_tks3_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_tks3_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_tks3_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_tks3_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D3 Teknik Konstruksi Gedung</td>";
            echo "<td>".number_format($p_prodi_tkg_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_tkg_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_tkg_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_tkg_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_tkg_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_tkg_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_tkg_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D3 Teknik Konstruksi Jalan dan Jembatan</td>";
            echo "<td>".number_format($p_prodi_tkjj_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_tkjj_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_tkjj_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_tkjj_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_tkjj_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_tkjj_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_tkjj_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D3 Teknik Konversi Energi</td>";
            echo "<td>".number_format($p_prodi_tke_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_tke_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_tke_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_tke_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_tke_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_tke_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_tke_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D3 Teknik Listrik</td>";
            echo "<td>".number_format($p_prodi_tl3_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_tl3_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_tl3_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_tl3_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_tl3_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_tl3_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_tl3_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D3 Teknik Mekatronika</td>";
            echo "<td>".number_format($p_prodi_tmk3_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_tmk3_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_tmk3_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_tmk3_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_tmk3_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_tmk3_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_tmk3_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D3 Teknik Mesin</td>";
            echo "<td>".number_format($p_prodi_tm_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_tm_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_tm_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_tm_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_tm_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_tm_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_tm_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D3 Teknik Otomotif</td>";
            echo "<td>".number_format($p_prodi_to_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_to_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_to_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_to_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_to_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_to_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_to_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D3 Teknik Perawatan Alat Berat</td>";
            echo "<td>".number_format($p_prodi_tpab_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_tpab_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_tpab_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_tpab_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_tpab_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_tpab_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_tpab_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D3 Teknik Sipil</td>";
            echo "<td>".number_format($p_prodi_ts_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_ts_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_ts_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_ts_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_ts_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_ts_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_s_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D3 Teknik Telekomunikasi/td>";
            echo "<td>".number_format($p_prodi_ttl_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_ttl_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_ttl_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_ttl_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_ttl_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_ttl_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_ttl_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D4 Administrasi Bisnis/td>";
            echo "<td>".number_format($p_prodi_ab4_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_ab4_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_ab4_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_ab4_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_ab4_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_ab4_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_ab4_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D4 Akuntansi Manajerial/td>";
            echo "<td>".number_format($p_prodi_akm_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_akm_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_akm_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_akm_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_akm_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_akm_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_akm_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D4 Teknik Kimia/td>";
            echo "<td>".number_format($p_prodi_tk4_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_tk4_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_tk4_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_tk4_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_tk4_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_tk4_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_tk4_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D4 Teknik Komputer dan Jaringan/td>";
            echo "<td>".number_format($p_prodi_tkj_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_tkj_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_tkj_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_tkj_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_tkj_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_tkj_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_tkj_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D4 Teknik Konstruksi/td>";
            echo "<td>".number_format($p_prodi_tks4_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_tks4_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_tks4_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_tks4_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_tks4_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_tks4_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_tks4_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D4 Teknik Listrik/td>";
            echo "<td>".number_format($p_prodi_tl4_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_tl4_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_tl4_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_tl4_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_tl4_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_tl4_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_tl4_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D4 Teknik Manufaktur/td>";
            echo "<td>".number_format($p_prodi_tmf4_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_tmf4_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_tmf4_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_tmf4_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_tmf4_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_tmf4_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_tmf4_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D4 Teknik Mekatronika/td>";
            echo "<td>".number_format($p_prodi_tmk4_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_tmk4_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_tmk4_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_tmk4_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_tmk4_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_tmk4_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_tmk4_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D4 Teknik Multimedia dan Jaringan/td>";
            echo "<td>".number_format($p_prodi_tmj_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_tmj_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_tmj_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_tmj_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_tmj_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_tmj_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_tmj_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D4 Teknik Pembangkit Energi/td>";
            echo "<td>".number_format($p_prodi_tpe_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_tpe_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_tpe_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_tpe_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_tpe_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_tpe_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_tpe_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>D4 Teknik Kimia Industri/td>";
            echo "<td>".number_format($p_prodi_tki_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_prodi_tki_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_prodi_tki_senior, dec())."</td>";
            echo "<td>".number_format($p_prodi_tki_mapala, dec())."</td>";
            echo "<td>".number_format($p_prodi_tki_persma, dec())."</td>";
            echo "<td>".number_format($p_prodi_tki_bahasa, dec())."</td>";
            echo "<td>".number_format($p_prodi_tki_pramuka, dec())."</td>";
        echo "</tr>";
    echo "</table>";
        }

    //------------------------------------------------------------------------------
    //jumlah atribut minat
    $jumlah_minat_seni_wirusaha = jumlah_data_training($db_object, " WHERE minat='Seni' 
        AND label='Wirausaha'");
    $jumlah_minat_seni_kemanusiaan = jumlah_data_training($db_object, " WHERE minat='Seni' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_minat_seni_senior = jumlah_data_training($db_object, " WHERE minat='Seni' AND label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_minat_seni_mapala = jumlah_data_training($db_object, " WHERE minat='Seni' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_minat_seni_persma = jumlah_data_training($db_object, " WHERE minat='Seni' AND label='Persma'");
    $jumlah_minat_seni_bahasa= jumlah_data_training($db_object, " WHERE minat='Seni' AND label='Bahasa'");
    $jumlah_minat_seni_pramuka = jumlah_data_training($db_object, " WHERE minat='Seni' AND label='Pramuka'");
        
    $jumlah_minat_olahraga_wirusaha = jumlah_data_training($db_object, " WHERE minat='Olahraga' AND label='Wirausaha'");
    $jumlah_minat_olahraga_kemanusiaan = jumlah_data_training($db_object, " WHERE minat='Olahraga' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_minat_olahraga_senior = jumlah_data_training($db_object, " WHERE minat='Olahraga' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_minat_olahraga_mapala = jumlah_data_training($db_object, " WHERE minat='Olahraga' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_minat_olahraga_persma = jumlah_data_training($db_object, " WHERE minat='Olahraga' AND 
        label='Persma'");
    $jumlah_minat_olahraga_bahasa= jumlah_data_training($db_object, " WHERE minat='Olahraga' AND 
        label='Bahasa'");
    $jumlah_minat_olahraga_pramuka = jumlah_data_training($db_object, " WHERE minat='Olahraga' AND label='Pramuka'");

    $jumlah_minat_mapala_wirusaha = jumlah_data_training($db_object, " WHERE minat='Pecinta Alam' AND label='Wirausaha'");
    $jumlah_mina_mapala_kemanusiaan = jumlah_data_training($db_object, " WHERE minat='Pecinta Alam' AND  label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_minat_mapala_senior = jumlah_data_training($db_object, " WHERE minat='Pecinta Alam' AND  label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_minat_mapala_mapala = jumlah_data_training($db_object, " WHERE minat='Pecinta Alam' AND  label='Pecinta Alam (MAPALA)'");
    $jumlah_minat_mapala_persma = jumlah_data_training($db_object, " WHERE minat='Pecinta Alam' AND  label='Persma'");
    $jumlah_minat_mapala_bahasa= jumlah_data_training($db_object, " WHERE minat='Pecinta Alam' AND  label='Bahasa'");
    $jumlah_minat_mapala_pramuka = jumlah_data_training($db_object, " WHERE minat='Pecinta Alam' AND  label='Pramuka'");

    $jumlah_minat_beladiri_wirusaha = jumlah_data_training($db_object, " WHERE minat='Bela Diri' AND label='Wirausaha'");
    $jumlah_minat_beladiri_kemanusiaan = jumlah_data_training($db_object, " WHERE minat='Bela Diri' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_minat_beladiri_senior = jumlah_data_training($db_object, " WHERE minat='Bela Diri' AND  label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_minat_beladiri_mapala = jumlah_data_training($db_object, " WHERE minat='Bela Diri' AND  label='Pecinta Alam (MAPALA)'");
    $jumlah_minat_beladiri_persma = jumlah_data_training($db_object, " WHERE minat='Bela Diri' AND  label='Persma'");
    $jumlah_minat_beladiri_bahasa= jumlah_data_training($db_object, " WHERE minat='Bela Diri' AND label='Bahasa'");
    $jumlah_minat_beladiri_pramuka = jumlah_data_training($db_object, " WHERE minat='Bela Diri' AND  label='Pramuka'");

    $jumlah_minat_jurnalistik_wirusaha = jumlah_data_training($db_object, " WHERE minat='Jurnalistik' AND label='Wirausaha'");
    $jumlah_minat_jurnalistik_kemanusiaan = jumlah_data_training($db_object, " WHERE minat='Jurnalistik' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_minat_jurnalistik_senior = jumlah_data_training($db_object, " WHERE minat='Jurnalistik' AND label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_minat_jurnalistik_mapala = jumlah_data_training($db_object, " WHERE minat='Jurnalistik' AND label='Pecinta Alam (MAPALA)'");
    $jumlah_minat_jurnalistik_persma = jumlah_data_training($db_object, " WHERE minat='Jurnalistik' AND label='Persma'");
    $jumlah_minat_jurnalistik_bahasa= jumlah_data_training($db_object, " WHERE minat='Jurnalistik' AND label='Bahasa'");
    $jumlah_minat_jurnalistik_pramuka = jumlah_data_training($db_object, " WHERE minat='Jurnalistik' AND label='Pramuka'");

    $jumlah_minat_kesehatan_wirusaha = jumlah_data_training($db_object, " WHERE minat='Kesehatan' AND label='Wirausaha'");
    $jumlah_minat_kesehatan_kemanusiaan = jumlah_data_training($db_object, " WHERE minat='Kesehatan' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_minat_kesehatan_senior = jumlah_data_training($db_object, " WHERE minat='Kesehatan' AND label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_minat_kesehatan_mapala = jumlah_data_training($db_object, " WHERE minat='Kesehatan' AND label='Pecinta Alam (MAPALA)'");
    $jumlah_minat_kesehatan_persma = jumlah_data_training($db_object, " WHERE minat='Kesehatan' AND label='Persma'");
    $jumlah_minat_kesehatan_bahasa= jumlah_data_training($db_object, " WHERE minat='Kesehatan' AND label='Bahasa'");
    $jumlah_minat_kesehatan_pramuka = jumlah_data_training($db_object, " WHERE minat='Kesehatan' AND label='Pramuka'");

    $jumlah_minat_wirausaha_wirusaha = jumlah_data_training($db_object, " WHERE minat='Wirausaha' AND label='Wirausaha'");
    $jumlah_minat_wirausaha_kemanusiaan = jumlah_data_training($db_object, " WHERE minat='Wirausaha' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_minat_wirausaha_senior = jumlah_data_training($db_object, " WHERE minat='Wirausaha' AND label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_minat_wirausaha_mapala = jumlah_data_training($db_object, " WHERE minat='Wirausaha' AND label='Pecinta Alam (MAPALA)'");
    $jumlah_minat_wirausaha_persma = jumlah_data_training($db_object, " WHERE minat='Wirausaha' AND label='Persma'");
    $jumlah_minat_wirausaha_bahasa= jumlah_data_training($db_object, " WHERE minat='Wirausaha' AND label='Bahasa'");
    $jumlah_minat_wirausaha_pramuka = jumlah_data_training($db_object, " WHERE minat='Wirausaha' AND label='Pramuka'");

    $jumlah_minat_bahasa_wirusaha = jumlah_data_training($db_object, " WHERE minat='Bahasa' AND label='Wirausaha'");
    $jumlah_minat_bahasa_kemanusiaan = jumlah_data_training($db_object, " WHERE minat='Bahasa' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_minat_bahasa_senior = jumlah_data_training($db_object, " WHERE minat='Bahasa' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_minat_bahasa_mapala = jumlah_data_training($db_object, " WHERE minat='Bahasa' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_minat_bahasa_persma = jumlah_data_training($db_object, " WHERE minat='Bahasa' AND 
        label='Persma'");
    $jumlah_minat_bahasa_bahasa= jumlah_data_training($db_object, " WHERE minat='Bahasa' AND 
        label='Bahasa'");
    $jumlah_minat_bahasa_pramuka = jumlah_data_training($db_object, " WHERE minat='Bahasa' AND 
        label='Pramuka'");

    $jumlah_minat_kemanusiaan_wirusaha = jumlah_data_training($db_object, " WHERE minat='Kemanusiaan' AND label='Wirausaha'");
    $jumlah_minat_kemanusiaan_kemanusiaan = jumlah_data_training($db_object, " WHERE minat='Kemanusiaan' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_minat_kemanusiaan_senior = jumlah_data_training($db_object, " WHERE minat='Kemanusiaan' AND label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_minat_kemanusiaan_mapala = jumlah_data_training($db_object, " WHERE minat='Kemanusiaan' AND label='Pecinta Alam (MAPALA)'");
    $jumlah_minat_kemanusiaan_persma = jumlah_data_training($db_object, " WHERE minat='Kemanusiaan' AND label='Persma'");
    $jumlah_minat_kemanusiaan_bahasa= jumlah_data_training($db_object, " WHERE minat='Kemanusiaan' AND label='Bahasa'");
    $jumlah_minat_kemanusiaan_pramuka = jumlah_data_training($db_object, " WHERE minat='Kemanusiaan' AND label='Pramuka'");

    $jumlah_minat_pramuka_wirusaha = jumlah_data_training($db_object, " WHERE minat='Pramuka' AND label='Wirausaha'");
    $jumlah_minat_pramuka_kemanusiaan = jumlah_data_training($db_object, " WHERE minat='Pramuka' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_minat_pramuka_senior = jumlah_data_training($db_object, " WHERE minat='Pramuka' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_minat_pramuka_mapala = jumlah_data_training($db_object, " WHERE minat='Pramuka' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_minat_pramuka_persma = jumlah_data_training($db_object, " WHERE minat='Pramuka' AND 
        \label='Persma'");
    $jumlah_minat_pramuka_bahasa= jumlah_data_training($db_object, " WHERE minat='Pramuka' AND label='Bahasa'");
    $jumlah_minat_pramuka_pramuka = jumlah_data_training($db_object, " WHERE minat='Pramuka' AND label='Pramuka'");

    //probabilitas atribut minat
    $p_minat_seni_wirausaha = $jumlah_minat_seni_wirusaha/$jumlah_wirausaha;
    $p_minat_seni_kemanusiaan = $jumlah_minat_seni_kemanusiaan/$jumlah_kemanusiaan;
    $p_minat_seni_senior = $jumlah_minat_seni_senior/$jumlah_senior;
    $p_minat_seni_mapala = $jumlah_minat_seni_mapala/$jumlah_mapala;
    $p_minat_seni_persma = $jumlah_minat_seni_persma/$jumlah_persma;
    $p_minat_seni_bahasa = $jumlah_minat_seni_bahasa/$jumlah_bahasa;
    $p_minat_seni_pramuka = $jumlah_minat_seni_pramuka/$jumlah_pramuka;

    $p_minat_olahraga_wirausaha = $jumlah_minat_olahraga_wirusaha/$jumlah_wirausaha;
    $p_minat_olahraga_kemanusiaan = $jumlah_minat_olahraga_kemanusiaan/$jumlah_kemanusiaan;
    $p_minat_olahraga_senior = $jumlah_minat_olahraga_senior/$jumlah_senior;
    $p_minat_olahraga_mapala = $jumlah_minat_olahraga_mapala/$jumlah_mapala;
    $p_minat_olahraga_persma = $jumlah_minat_olahraga_persma/$jumlah_persma;
    $p_minat_olahraga_bahasa = $jumlah_minat_olahraga_bahasa/$jumlah_bahasa;
    $p_minat_olahraga_pramuka = $jumlah_minat_olahraga_pramuka/$jumlah_pramuka;

    $p_minat_mapala_wirausaha = $jumlah_minat_mapala_wirusaha/$jumlah_wirausaha;
    $p_minat_mapala_kemanusiaan = $jumlah_minat_mapala_kemanusiaan/$jumlah_kemanusiaan;
    $p_minat_mapala_senior = $jumlah_minat_mapala_senior/$jumlah_senior;
    $p_minat_mapala_mapala = $jumlah_minat_mapala_mapala/$jumlah_mapala;
    $p_minat_mapala_persma = $jumlah_minat_mapala_persma/$jumlah_persma;
    $p_minat_mapala_bahasa = $jumlah_minat_mapala_bahasa/$jumlah_bahasa;
    $p_minat_mapala_pramuka = $jumlah_minat_mapala_pramuka/$jumlah_pramuka;

    $p_minat_beladiri_wirausaha = $jumlah_minat_beladiri_wirusaha/$jumlah_wirausaha;
    $p_minat_beladiri_kemanusiaan = $jumlah_minat_beladiri_kemanusiaan/$jumlah_kemanusiaan;
    $p_minat_beladiri_senior = $jumlah_minat_beladiri_senior/$jumlah_senior;
    $p_minat_beladiri_mapala = $jumlah_minat_beladiri_mapala/$jumlah_mapala;
    $p_minat_beladiri_persma = $jumlah_minat_beladiri_persma/$jumlah_persma;
    $p_minat_beladiri_bahasa = $jumlah_minat_beladiri_bahasa/$jumlah_bahasa;
    $p_minat_beladiri_pramuka = $jumlah_minat_beladiri_pramuka/$jumlah_pramuka;

    $p_minat_jurnalistik_wirausaha = $jumlah_minat_jurnalistik_wirusaha/$jumlah_wirausaha;
    $p_minat_jurnalistik_kemanusiaan = $jumlah_minat_jurnalistik_kemanusiaan/$jumlah_kemanusiaan;
    $p_minat_jurnalistik_senior = $jumlah_minat_jurnalistik_senior/$jumlah_senior;
    $p_minat_jurnalistik_mapala = $jumlah_minat_jurnalistik_mapala/$jumlah_mapala;
    $p_minat_jurnalistik_persma = $jumlah_minat_jurnalistik_persma/$jumlah_persma;
    $p_minat_jurnalistik_bahasa = $jumlah_minat_jurnalistik_bahasa/$jumlah_bahasa;
    $p_minat_jurnalistik_pramuka = $jumlah_minat_jurnalistik_pramuka/$jumlah_pramuka;

    $p_minat_kesehatan_wirausaha = $jumlah_minat_kesehatan_wirusaha/$jumlah_wirausaha;
    $p_minat_kesehatan_kemanusiaan = $jumlah_minat_kesehatan_kemanusiaan/$jumlah_kemanusiaan;
    $p_minat_kesehatan_senior = $jumlah_minat_kesehatan_senior/$jumlah_senior;
    $p_minat_kesehatan_mapala = $jumlah_minat_kesehatan_mapala/$jumlah_mapala;
    $p_minat_kesehatan_persma = $jumlah_minat_kesehatan_persma/$jumlah_persma;
    $p_minat_kesehatan_bahasa = $jumlah_minat_kesehatan_bahasa/$jumlah_bahasa;
    $p_minat_kesehatan_pramuka = $jumlah_minat_kesehatan_pramuka/$jumlah_pramuka;

    $p_minat_wirausaha_wirausaha = $jumlah_minat_wirausaha_wirusaha/$jumlah_wirausaha;
    $p_minat_wirausaha_kemanusiaan = $jumlah_minat_wirausaha_kemanusiaan/$jumlah_kemanusiaan;
    $p_minat_wirausaha_senior = $jumlah_minat_wirausaha_senior/$jumlah_senior;
    $p_minat_wirausaha_mapala = $jumlah_minat_wirausaha_mapala/$jumlah_mapala;
    $p_minat_wirausaha_persma = $jumlah_minat_wirausaha_persma/$jumlah_persma;
    $p_minat_wirausaha_bahasa = $jumlah_minat_wirausaha_bahasa/$jumlah_bahasa;
    $p_minat_wirausaha_pramuka = $jumlah_minat_wirausaha_pramuka/$jumlah_pramuka;   

    $p_minat_bahasa_wirausaha = $jumlah_minat_bahasa_wirusaha/$jumlah_wirausaha;
    $p_minat_bahasa_kemanusiaan = $jumlah_minat_bahasa_kemanusiaan/$jumlah_kemanusiaan;
    $p_minat_bahasa_senior = $jumlah_minat_bahasa_senior/$jumlah_senior;
    $p_minat_bahasa_mapala = $jumlah_minat_bahasa_mapala/$jumlah_mapala;
    $p_minat_bahasa_persma = $jumlah_minat_bahasa_persma/$jumlah_persma;
    $p_minat_bahasa_bahasa = $jumlah_minat_bahasa_bahasa/$jumlah_bahasa;
    $p_minat_bahasa_pramuka = $jumlah_minat_bahasa_pramuka/$jumlah_pramuka;   

    $p_minat_kemanusiaan_wirausaha = $jumlah_minat_kemanusiaan_wirusaha/$jumlah_wirausaha;
    $p_minat_kemanusiaan_kemanusiaan = $jumlah_minat_kemanusiaan_kemanusiaan/$jumlah_kemanusiaan;
    $p_minat_kemanusiaan_senior = $jumlah_minat_kemanusiaan_senior/$jumlah_senior;
    $p_minat_kemanusiaan_mapala = $jumlah_minat_kemanusiaan_mapala/$jumlah_mapala;
    $p_minat_kemanusiaan_persma = $jumlah_minat_kemanusiaan_persma/$jumlah_persma;
    $p_minat_kemanusiaan_bahasa = $jumlah_minat_kemanusiaan_bahasa/$jumlah_bahasa;
    $p_minat_kemanusiaan_pramuka = $jumlah_minat_kemanusiaan_pramuka/$jumlah_pramuka;   

    $p_minat_pramuka_wirausaha = $jumlah_minat_pramuka_wirusaha/$jumlah_wirausaha;
    $p_minat_pramuka_kemanusiaan = $jumlah_minat_pramuka_kemanusiaan/$jumlah_kemanusiaan;
    $p_minat_pramuka_senior = $jumlah_minat_pramuka_senior/$jumlah_senior;
    $p_minat_pramuka_mapala = $jumlah_minat_pramuka_mapala/$jumlah_mapala;
    $p_minat_pramuka_persma = $jumlah_minat_pramuka_persma/$jumlah_persma;
    $p_minat_pramuka_bahasa = $jumlah_minat_pramuka_bahasa/$jumlah_bahasa;
    $p_minat_pramuka_pramuka = $jumlah_minat_pramuka_pramuka/$jumlah_pramuka;   

    //display table probabilitas minat
        if($show_perhitungan){
    echo "<table class='table table-bordered table-striped  table-hover' style='width:40%'>";
        echo "<tr>";
            echo "<td><b><u>Minat:</u></b></td>";
            echo "<td>Wirausaha</td>";
            echo "<td>Kemanusiaan (ksr, humaniora)</td>";
            echo "<td>SENIOR (senior, bola, karate, taekwondo)</td>";
            echo "<td>Pecinta Alam (MAPALA)</td>";
            echo "<td>Persma</td>";
            echo "<td>Bahasa</td>";
            echo "<td>Pramuka</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Seni</td>";
            echo "<td>".number_format($p_minat_seni_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_minat_seni_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_minat_seni_senior, dec())."</td>";
            echo "<td>".number_format($p_minat_seni_mapala, dec())."</td>";
            echo "<td>".number_format($p_minat_seni_persma, dec())."</td>";
            echo "<td>".number_format($p_minat_seni_bahasa, dec())."</td>";
            echo "<td>".number_format($p_minat_seni_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Olahraga</td>";
            echo "<td>".number_format($p_minat_olahraga_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_minat_olahraga_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_minat_olahraga_senior, dec())."</td>";
            echo "<td>".number_format($p_minat_olahraga_mapala, dec())."</td>";
            echo "<td>".number_format($p_minat_olahraga_persma, dec())."</td>";
            echo "<td>".number_format($p_minat_olahraga_bahasa, dec())."</td>";
            echo "<td>".number_format($p_minat_olahraga_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Pecinta Alam</td>";
            echo "<td>".number_format($p_minat_mapala_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_minat_mapala_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_minat_mapala_senior, dec())."</td>";
            echo "<td>".number_format($p_minat_mapala_mapala, dec())."</td>";
            echo "<td>".number_format($p_minat_mapala_persma, dec())."</td>";
            echo "<td>".number_format($p_minat_mapala_bahasa, dec())."</td>";
            echo "<td>".number_format($p_minat_mapala_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Bela Diri</td>";
            echo "<td>".number_format($p_minat_beladiri_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_minat_beladiri_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_minat_beladiri_senior, dec())."</td>";
            echo "<td>".number_format($p_minat_beladiri_mapala, dec())."</td>";
            echo "<td>".number_format($p_minat_beladiri_persma, dec())."</td>";
            echo "<td>".number_format($p_minat_beladiri_bahasa, dec())."</td>";
            echo "<td>".number_format($p_minat_beladiri_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Jurnalistik</td>";
            echo "<td>".number_format($p_minat_jurnalistik_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_minat_jurnalistik_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_minat_jurnalistik_senior, dec())."</td>";
            echo "<td>".number_format($p_minat_jurnalistik_mapala, dec())."</td>";
            echo "<td>".number_format($p_minat_jurnalistik_persma, dec())."</td>";
            echo "<td>".number_format($p_minat_jurnalistik_bahasa, dec())."</td>";
            echo "<td>".number_format($p_minat_jurnalistik_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Kesehatan</td>";
            echo "<td>".number_format($p_minat_kesehatan_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_minat_kesehatan_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_minat_kesehatan_senior, dec())."</td>";
            echo "<td>".number_format($p_minat_kesehatan_mapala, dec())."</td>";
            echo "<td>".number_format($p_minat_kesehatan_persma, dec())."</td>";
            echo "<td>".number_format($p_minat_kesehatan_bahasa, dec())."</td>";
            echo "<td>".number_format($p_minat_kesehatan_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Wirausaha</td>";
            echo "<td>".number_format($p_minat_wirausaha_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_minat_wirausaha_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_minat_wirausaha_senior, dec())."</td>";
            echo "<td>".number_format($p_minat_wirausaha_mapala, dec())."</td>";
            echo "<td>".number_format($p_minat_wirausaha_persma, dec())."</td>";
            echo "<td>".number_format($p_minat_wirausaha_bahasa, dec())."</td>";
            echo "<td>".number_format($p_minat_wirausaha_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Bahasa</td>";
            echo "<td>".number_format($p_minat_bahasa_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_minat_bahasa_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_minat_bahasa_senior, dec())."</td>";
            echo "<td>".number_format($p_minat_bahasa_mapala, dec())."</td>";
            echo "<td>".number_format($p_minat_bahasa_persma, dec())."</td>";
            echo "<td>".number_format($p_minat_bahasa_bahasa, dec())."</td>";
            echo "<td>".number_format($p_minat_bahasa_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Kemanusiaan</td>";
            echo "<td>".number_format($p_minat_kemanusiaan_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_minat_kemanusiaan_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_minat_kemanusiaan_senior, dec())."</td>";
            echo "<td>".number_format($p_minat_kemanusiaan_mapala, dec())."</td>";
            echo "<td>".number_format($p_minat_kemanusiaan_persma, dec())."</td>";
            echo "<td>".number_format($p_minat_kemanusiaan_bahasa, dec())."</td>";
            echo "<td>".number_format($p_minat_kemanusiaan_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Pramuka</td>";
            echo "<td>".number_format($p_minat_pramuka_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_minat_pramuka_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_minat_pramuka_senior, dec())."</td>";
            echo "<td>".number_format($p_minat_pramuka_mapala, dec())."</td>";
            echo "<td>".number_format($p_minat_pramuka_persma, dec())."</td>";
            echo "<td>".number_format($p_minat_pramuka_bahasa, dec())."</td>";
            echo "<td>".number_format($p_minat_pramuka_pramuka, dec())."</td>";
        echo "</tr>";
    echo "</table>";
        }


    //------------------------------------------------------------------------------
    //jumlah atribut bakat
    $jumlah_bakat_seni_wirusaha = jumlah_data_training($db_object, " WHERE bakat='Seni' 
        AND label='Wirausaha'");
    $jumlah_bakat_seni_kemanusiaan = jumlah_data_training($db_object, " WHERE bakat='Seni' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_bakat_seni_senior = jumlah_data_training($db_object, " WHERE bakat='Seni' AND label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_bakat_seni_mapala = jumlah_data_training($db_object, " WHERE bakat='Seni' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_bakat_seni_persma = jumlah_data_training($db_object, " WHERE bakat='Seni' AND label='Persma'");
    $jumlah_bakat_seni_bahasa= jumlah_data_training($db_object, " WHERE bakat='Seni' AND label='Bahasa'");
    $jumlah_bakat_seni_pramuka = jumlah_data_training($db_object, " WHERE bakat='Seni' AND label='Pramuka'");
        
    $jumlah_bakat_olahraga_wirusaha = jumlah_data_training($db_object, " WHERE bakat='Olahraga' AND label='Wirausaha'");
    $jumlah_bakat_olahraga_kemanusiaan = jumlah_data_training($db_object, " WHERE bakat='Olahraga' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_bakat_olahraga_senior = jumlah_data_training($db_object, " WHERE bakat='Olahraga' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_bakat_olahraga_mapala = jumlah_data_training($db_object, " WHERE bakat='Olahraga' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_bakat_olahraga_persma = jumlah_data_training($db_object, " WHERE bakat='Olahraga' AND 
        label='Persma'");
    $jumlah_bakat_olahraga_bahasa= jumlah_data_training($db_object, " WHERE bakat='Olahraga' AND 
        label='Bahasa'");
    $jumlah_bakat_olahraga_pramuka = jumlah_data_training($db_object, " WHERE bakat='Olahraga' AND label='Pramuka'");

    $jumlah_bakat_bahasa_wirusaha = jumlah_data_training($db_object, " WHERE bakat='Bahasa' AND label='Wirausaha'");
    $jumlah_bakat_bahasa_kemanusiaan = jumlah_data_training($db_object, " WHERE bakat='Bahasa' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_bakat_bahasa_senior = jumlah_data_training($db_object, " WHERE bakat='Bahasa' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_bakat_bahasa_mapala = jumlah_data_training($db_object, " WHERE bakat='Bahasa' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_bakat_bahasa_persma = jumlah_data_training($db_object, " WHERE bakat='Bahasa' AND 
        label='Persma'");
    $jumlah_bakat_bahasa_bahasa= jumlah_data_training($db_object, " WHERE bakat='Bahasa' AND 
        label='Bahasa'");
    $jumlah_bakat_bahasa_pramuka = jumlah_data_training($db_object, " WHERE bakat='Bahasa' AND 
        label='Pramuka'");

    $jumlah_bakat_lainnya_wirusaha = jumlah_data_training($db_object, " WHERE bakat='Lainnya' AND label='Wirausaha'");
    $jumlah_bakat_lainnya_kemanusiaan = jumlah_data_training($db_object, " WHERE bakat='Lainnya' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_bakat_lainnya_senior = jumlah_data_training($db_object, " WHERE bakat='Lainnya' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_bakat_lainnya_mapala = jumlah_data_training($db_object, " WHERE bakat='Lainnya' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_bakat_lainnya_persma = jumlah_data_training($db_object, " WHERE bakat='Lainnya' AND 
        label='Persma'");
    $jumlah_bakat_lainnya_bahasa= jumlah_data_training($db_object, " WHERE bakat='Lainnya' AND 
        label='Bahasa'");
    $jumlah_bakat_lainnya_pramuka = jumlah_data_training($db_object, " WHERE bakat='Lainnya' AND 
        label='Pramuka'");

    
    //probabilitas atribut bakat
    $p_bakat_seni_wirausaha = $jumlah_bakat_seni_wirusaha/$jumlah_wirausaha;
    $p_bakat_seni_kemanusiaan = $jumlah_bakat_seni_kemanusiaan/$jumlah_kemanusiaan;
    $p_bakat_seni_senior = $jumlah_bakat_seni_senior/$jumlah_senior;
    $p_bakat_seni_mapala = $jumlah_bakat_seni_mapala/$jumlah_mapala;
    $p_bakat_seni_persma = $jumlah_bakat_seni_persma/$jumlah_persma;
    $p_bakat_seni_bahasa = $jumlah_bakat_seni_bahasa/$jumlah_bahasa;
    $p_bakat_seni_pramuka = $jumlah_bakat_seni_pramuka/$jumlah_pramuka;

    $p_bakat_olahraga_wirausaha = $jumlah_bakat_olahraga_wirusaha/$jumlah_wirausaha;
    $p_bakat_olahraga_kemanusiaan = $jumlah_bakat_olahraga_kemanusiaan/$jumlah_kemanusiaan;
    $p_bakat_olahraga_senior = $jumlah_bakat_olahraga_senior/$jumlah_senior;
    $p_bakat_olahraga_mapala = $jumlah_bakat_olahraga_mapala/$jumlah_mapala;
    $p_bakat_olahraga_persma = $jumlah_bakat_olahraga_persma/$jumlah_persma;
    $p_bakat_olahraga_bahasa = $jumlah_bakat_olahraga_bahasa/$jumlah_bahasa;
    $p_bakat_olahraga_pramuka = $jumlah_bakat_olahraga_pramuka/$jumlah_pramuka;
 
    $p_bakat_bahasa_wirausaha = $jumlah_bakat_bahasa_wirusaha/$jumlah_wirausaha;
    $p_bakat_bahasa_kemanusiaan = $jumlah_bakat_bahasa_kemanusiaan/$jumlah_kemanusiaan;
    $p_bakat_bahasa_senior = $jumlah_bakat_bahasa_senior/$jumlah_senior;
    $p_bakat_bahasa_mapala = $jumlah_bakat_bahasa_mapala/$jumlah_mapala;
    $p_bakat_bahasa_persma = $jumlah_bakat_bahasa_persma/$jumlah_persma;
    $p_bakat_bahasa_bahasa = $jumlah_bakat_bahasa_bahasa/$jumlah_bahasa;
    $p_bakat_bahasa_pramuka = $jumlah_bakat_bahasa_pramuka/$jumlah_pramuka;   

    $p_bakat_lainnya_wirausaha = $jumlah_bakat_lainnya_wirusaha/$jumlah_wirausaha;
    $p_bakat_lainnya_kemanusiaan = $jumlah_bakat_lainnya_kemanusiaan/$jumlah_kemanusiaan;
    $p_bakat_lainnya_senior = $jumlah_bakat_lainnya_senior/$jumlah_senior;
    $p_bakat_lainnya_mapala = $jumlah_bakat_lainnya_mapala/$jumlah_mapala;
    $p_bakat_lainnya_persma = $jumlah_bakat_lainnya_persma/$jumlah_persma;
    $p_bakat_lainnya_bahasa = $jumlah_bakat_lainnya_bahasa/$jumlah_bahasa;
    $p_bakat_lainnya_pramuka = $jumlah_bakat_lainnya_pramuka/$jumlah_pramuka;   


    //display table probabilitas bakat
        if($show_perhitungan){
    echo "<table class='table table-bordered table-striped  table-hover' style='width:40%'>";
        echo "<tr>";
            echo "<td><b><u>Bakat:</u></b></td>";
            echo "<td>Wirausaha</td>";
            echo "<td>Kemanusiaan (ksr, humaniora)</td>";
            echo "<td>SENIOR (senior, bola, karate, taekwondo)</td>";
            echo "<td>Pecinta Alam (MAPALA)</td>";
            echo "<td>Persma</td>";
            echo "<td>Bahasa</td>";
            echo "<td>Pramuka</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Seni</td>";
            echo "<td>".number_format($p_bakat_seni_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_bakat_seni_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_bakat_seni_senior, dec())."</td>";
            echo "<td>".number_format($p_bakat_seni_mapala, dec())."</td>";
            echo "<td>".number_format($p_bakat_seni_persma, dec())."</td>";
            echo "<td>".number_format($p_bakat_seni_bahasa, dec())."</td>";
            echo "<td>".number_format($p_bakat_seni_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Olahraga</td>";
            echo "<td>".number_format($p_bakat_olahraga_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_bakat_olahraga_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_bakat_olahraga_senior, dec())."</td>";
            echo "<td>".number_format($p_bakat_olahraga_mapala, dec())."</td>";
            echo "<td>".number_format($p_bakat_olahraga_persma, dec())."</td>";
            echo "<td>".number_format($p_bakat_olahraga_bahasa, dec())."</td>";
            echo "<td>".number_format($p_bakat_olahraga_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Bahasa</td>";
            echo "<td>".number_format($p_bakat_bahasa_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_bakat_bahasa_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_bakat_bahasa_senior, dec())."</td>";
            echo "<td>".number_format($p_bakat_bahasa_mapala, dec())."</td>";
            echo "<td>".number_format($p_bakat_bahasa_persma, dec())."</td>";
            echo "<td>".number_format($p_bakat_bahasa_bahasa, dec())."</td>";
            echo "<td>".number_format($p_bakat_bahasa_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Lainnya</td>";
            echo "<td>".number_format($p_bakat_lainnya_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_bakat_lainnya_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_bakat_lainnya_senior, dec())."</td>";
            echo "<td>".number_format($p_bakat_lainnya_mapala, dec())."</td>";
            echo "<td>".number_format($p_bakat_lainnya_persma, dec())."</td>";
            echo "<td>".number_format($p_bakat_lainnya_bahasa, dec())."</td>";
            echo "<td>".number_format($p_bakat_lainnya_pramuka, dec())."</td>";
        echo "</tr>";
    echo "</table>";
        }

    //------------------------------------------------------------------------------
    //jumlah atribut hobi
    $jumlah_hobi_menari_wirausaha = jumlah_data_training($db_object, " WHERE hobi='Menari' 
        AND label='Wirausaha'");
    $jumlah_hobi_menari_kemanusiaan = jumlah_data_training($db_object, " WHERE hobi='Menari' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_hobi_menari_senior = jumlah_data_training($db_object, " WHERE hobi='Menari' AND label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_hobi_menari_mapala = jumlah_data_training($db_object, " WHERE hobi='Menari' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_hobi_menari_persma = jumlah_data_training($db_object, " WHERE hobi='Menari' AND label='Persma'");
    $jumlah_hobi_menari_bahasa= jumlah_data_training($db_object, " WHERE hobi='Menari' AND label='Bahasa'");
    $jumlah_hobi_menari_pramuka = jumlah_data_training($db_object, " WHERE hobi='Menari' AND label='Pramuka'");
        
    $jumlah_hobi_menyanyi_wirausaha = jumlah_data_training($db_object, " WHERE hobi='Menyanyi' AND label='Wirausaha'");
    $jumlah_hobi_menyanyi_kemanusiaan = jumlah_data_training($db_object, " WHERE hobi='Menyanyi' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_hobi_menyanyi_senior = jumlah_data_training($db_object, " WHERE hobi='Menyanyi' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_hobi_menyanyi_mapala = jumlah_data_training($db_object, " WHERE hobi='Menyanyi' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_hobi_menyanyi_persma = jumlah_data_training($db_object, " WHERE hobi='Menyanyi' AND 
        label='Persma'");
    $jumlah_hobi_menyanyi_bahasa= jumlah_data_training($db_object, " WHERE hobi='Menyanyi' AND 
        label='Bahasa'");
    $jumlah_hobi_menyanyi_pramuka = jumlah_data_training($db_object, " WHERE hobi='Menyanyi' AND label='Pramuka'");

    $jumlah_hobi_menulis_wirausaha = jumlah_data_training($db_object, " WHERE hobi='Menulis' AND 
        label='Wirausaha'");
    $jumlah_hobi_menulis_kemanusiaan = jumlah_data_training($db_object, " WHERE hobi='Menulis' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_hobi_menulis_senior = jumlah_data_training($db_object, " WHERE hobi='Menulis' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_hobi_menulis_mapala = jumlah_data_training($db_object, " WHERE hobi='Menulis' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_hobi_menulis_persma = jumlah_data_training($db_object, " WHERE hobi='Menulis' AND 
        label='Persma'");
    $jumlah_hobi_menulis_bahasa= jumlah_data_training($db_object, " WHERE hobi='Menulis' AND 
        label='Bahasa'");
    $jumlah_hobi_menulis_pramuka = jumlah_data_training($db_object, " WHERE hobi='Menulis' AND 
        label='Pramuka'");

    $jumlah_hobi_menggambar_wirausaha = jumlah_data_training($db_object, " WHERE hobi='Menggambar' AND label='Wirausaha'");
    $jumlah_hobi_menggambar_kemanusiaan = jumlah_data_training($db_object, " WHERE hobi='Menggambar' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_hobi_menggambar_senior = jumlah_data_training($db_object, " WHERE hobi='Menggambar' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_hobi_menggambar_mapala = jumlah_data_training($db_object, " WHERE hobi='Menggambar' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_hobi_menggambar_persma = jumlah_data_training($db_object, " WHERE hobi='Menggambar' AND 
        label='Persma'");
    $jumlah_hobi_menggambar_bahasa= jumlah_data_training($db_object, " WHERE hobi='Menggambar' AND 
        label='Bahasa'");
    $jumlah_hobi_menggambar_pramuka = jumlah_data_training($db_object, " WHERE hobi='Menggambar' AND 
        label='Pramuka'");

    $jumlah_hobi_memasak_wirausaha = jumlah_data_training($db_object, " WHERE hobi='Memasak' AND 
        label='Wirausaha'");
    $jumlah_hobi_memasak_kemanusiaan = jumlah_data_training($db_object, " WHERE hobi='Memasak' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_hobi_memasak_senior = jumlah_data_training($db_object, " WHERE hobi='Memasak' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_hobi_memasak_mapala = jumlah_data_training($db_object, " WHERE hobi='Memasak' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_hobi_memasak_persma = jumlah_data_training($db_object, " WHERE hobi='Memasak' AND 
        label='Persma'");
    $jumlah_hobi_memasak_bahasa= jumlah_data_training($db_object, " WHERE hobi='Memasak' AND 
        label='Bahasa'");
    $jumlah_hobi_memasak_pramuka = jumlah_data_training($db_object, " WHERE hobi='Memasak' AND 
        label='Pramuka'");

    $jumlah_hobi_fotografi_wirausaha = jumlah_data_training($db_object, " WHERE hobi='Fotografi' AND 
        label='Wirausaha'");
    $jumlah_hobi_fotografi_kemanusiaan = jumlah_data_training($db_object, " WHERE hobi='Fotografi' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_hobi_fotografi_senior = jumlah_data_training($db_object, " WHERE hobi='Fotografi' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_hobi_fotografi_mapala = jumlah_data_training($db_object, " WHERE hobi='Fotografi' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_hobi_fotografi_persma = jumlah_data_training($db_object, " WHERE hobi='Fotografi' AND 
        label='Persma'");
    $jumlah_hobi_fotografi_bahasa= jumlah_data_training($db_object, " WHERE hobi='Fotografi' AND 
        label='Bahasa'");
    $jumlah_hobi_fotografi_pramuka = jumlah_data_training($db_object, " WHERE hobi='Fotografi' AND 
        label='Pramuka'");

    $jumlah_hobi_sepakbola_wirausaha = jumlah_data_training($db_object, " WHERE hobi='Sepak Bola' AND 
        label='Wirausaha'");
    $jumlah_hobi_sepakbola_kemanusiaan = jumlah_data_training($db_object, " WHERE hobi='Sepak Bola' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_hobi_sepakbola_senior = jumlah_data_training($db_object, " WHERE hobi='Sepak Bola' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_hobi_sepakbola_mapala = jumlah_data_training($db_object, " WHERE hobi='Sepak Bola' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_hobi_sepakbola_persma = jumlah_data_training($db_object, " WHERE hobi='Sepak Bola' AND 
        label='Persma'");
    $jumlah_hobi_sepakbola_bahasa= jumlah_data_training($db_object, " WHERE hobi='Sepak Bola' AND 
        label='Bahasa'");
    $jumlah_hobi_sepakbola_pramuka = jumlah_data_training($db_object, " WHERE hobi='Sepak Bola' AND 
        label='Pramuka'");

    $jumlah_hobi_bulutangkis_wirausaha = jumlah_data_training($db_object, " WHERE hobi='Bulu Tangkis' AND 
        label='Wirausaha'");
    $jumlah_hobi_bulutangkis_kemanusiaan = jumlah_data_training($db_object, " WHERE hobi='Bulu Tangkis' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_hobi_bulutangkis_senior = jumlah_data_training($db_object, " WHERE hobi='Bulu Tangkis' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_hobi_bulutangkis_mapala = jumlah_data_training($db_object, " WHERE hobi='Bulu Tangkis' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_hobi_bulutangkis_persma = jumlah_data_training($db_object, " WHERE hobi='Bulu Tangkis' AND 
        label='Persma'");
    $jumlah_hobi_bulutangkis_bahasa= jumlah_data_training($db_object, " WHERE hobi='Bulu Tangkis' AND 
        label='Bahasa'");
    $jumlah_hobi_bulutangkis_pramuka = jumlah_data_training($db_object, " WHERE hobi='Bulu Tangkis' AND 
        label='Pramuka'");

    $jumlah_hobi_basket_wirausaha = jumlah_data_training($db_object, " WHERE hobi='Basket' AND 
        label='Wirausaha'");
    $jumlah_hobi_basket_kemanusiaan = jumlah_data_training($db_object, " WHERE hobi='Basket' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_hobi_basket_senior = jumlah_data_training($db_object, " WHERE hobi='Basket' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_hobi_basket_mapala = jumlah_data_training($db_object, " WHERE hobi='Basket' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_hobi_basket_persma = jumlah_data_training($db_object, " WHERE hobi='Basket' AND 
        label='Persma'");
    $jumlah_hobi_basket_bahasa= jumlah_data_training($db_object, " WHERE hobi='Basket' AND 
        label='Bahasa'");
    $jumlah_hobi_basket_pramuka = jumlah_data_training($db_object, " WHERE hobi='Basket' AND 
        label='Pramuka'");

    $jumlah_hobi_futsal_wirausaha = jumlah_data_training($db_object, " WHERE hobi='Futsal' AND 
        label='Wirausaha'");
    $jumlah_hobi_futsal_kemanusiaan = jumlah_data_training($db_object, " WHERE hobi='Futsal' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_hobi_futsal_senior = jumlah_data_training($db_object, " WHERE hobi='Futsal' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_hobi_futsal_mapala = jumlah_data_training($db_object, " WHERE hobi='Futsal' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_hobi_futsal_persma = jumlah_data_training($db_object, " WHERE hobi='Futsal' AND 
        label='Persma'");
    $jumlah_hobi_futsal_bahasa= jumlah_data_training($db_object, " WHERE hobi='Futsal' AND 
        label='Bahasa'");
    $jumlah_hobi_futsal_pramuka = jumlah_data_training($db_object, " WHERE hobi='Futsal' AND 
        label='Pramuka'");

    $jumlah_hobi_volly_wirausaha = jumlah_data_training($db_object, " WHERE hobi='Volly' AND 
        label='Wirausaha'");
    $jumlah_hobi_volly_kemanusiaan = jumlah_data_training($db_object, " WHERE hobi='Volly' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_hobi_volly_senior = jumlah_data_training($db_object, " WHERE hobi='Volly' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_hobi_volly_mapala = jumlah_data_training($db_object, " WHERE hobi='Volly' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_hobi_volly_persma = jumlah_data_training($db_object, " WHERE hobi='Volly' AND 
        label='Persma'");
    $jumlah_hobi_volly_bahasa= jumlah_data_training($db_object, " WHERE hobi='Volly' AND 
        label='Bahasa'");
    $jumlah_hobi_volly_pramuka = jumlah_data_training($db_object, " WHERE hobi='Volly' AND 
        label='Pramuka'");

    $jumlah_hobi_belajarmtk_wirausaha = jumlah_data_training($db_object, " WHERE hobi='Belajar Matematika' AND 
        label='Wirausaha'");
    $jumlah_hobi_belajarmtk_kemanusiaan = jumlah_data_training($db_object, " WHERE hobi='Belajar Matematika' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_hobi_belajarmtk_senior = jumlah_data_training($db_object, " WHERE hobi='Belajar Matematika' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_hobi_belajarmtk_mapala = jumlah_data_training($db_object, " WHERE hobi='Belajar Matematika' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_hobi_belajarmtk_persma = jumlah_data_training($db_object, " WHERE hobi='Belajar Matematika' AND 
        label='Persma'");
    $jumlah_hobi_belajarmtk_bahasa= jumlah_data_training($db_object, " WHERE hobi='Belajar Matematika' AND 
        label='Bahasa'");
    $jumlah_hobi_belajarmtk_pramuka = jumlah_data_training($db_object, " WHERE hobi='Belajar Matematika' AND 
        label='Pramuka'");

    $jumlah_hobi_olahraga_wirausaha = jumlah_data_training($db_object, " WHERE hobi='Olahraga' AND 
        label='Wirausaha'");
    $jumlah_hobi_olahraga_kemanusiaan = jumlah_data_training($db_object, " WHERE hobi='Olahraga' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_hobi_olahraga_senior = jumlah_data_training($db_object, " WHERE hobi='Olahraga' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_hobi_olahraga_mapala = jumlah_data_training($db_object, " WHERE hobi='Olahraga' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_hobi_olahraga_persma = jumlah_data_training($db_object, " WHERE hobi='Olahraga' AND 
        label='Persma'");
    $jumlah_hobi_olahraga_bahasa= jumlah_data_training($db_object, " WHERE hobi='Olahraga' AND 
        label='Bahasa'");
    $jumlah_hobi_olahraga_pramuka = jumlah_data_training($db_object, " WHERE hobi='Olahraga' AND 
        label='Pramuka'");

    $jumlah_hobi_membaca_wirausaha = jumlah_data_training($db_object, " WHERE hobi='Membaca' AND 
        label='Wirausaha'");
    $jumlah_hobi_membaca_kemanusiaan = jumlah_data_training($db_object, " WHERE hobi='Membaca' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_hobi_membaca_senior = jumlah_data_training($db_object, " WHERE hobi='Membaca' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_hobi_membaca_mapala = jumlah_data_training($db_object, " WHERE hobi='Membaca' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_hobi_membaca_persma = jumlah_data_training($db_object, " WHERE hobi='Membaca' AND 
        label='Persma'");
    $jumlah_hobi_membaca_bahasa= jumlah_data_training($db_object, " WHERE hobi='Membaca' AND 
        label='Bahasa'");
    $jumlah_hobi_membaca_pramuka = jumlah_data_training($db_object, " WHERE hobi='Membaca' AND 
        label='Pramuka'");

    $jumlah_hobi_mainmusik_wirausaha = jumlah_data_training($db_object, " WHERE hobi='Bermain Musik' AND 
        label='Wirausaha'");
    $jumlah_hobi_mainmusik_kemanusiaan = jumlah_data_training($db_object, " WHERE hobi='Bermain Musik' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_hobi_mainmusik_senior = jumlah_data_training($db_object, " WHERE hobi='Bermain Musik' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_hobi_mainmusik_mapala = jumlah_data_training($db_object, " WHERE hobi='Bermain Musik' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_hobi_mainmusik_persma = jumlah_data_training($db_object, " WHERE hobi='Bermain Musik' AND 
        label='Persma'");
    $jumlah_hobi_mainmusik_bahasa= jumlah_data_training($db_object, " WHERE hobi='Bermain Musik' AND 
        label='Bahasa'");
    $jumlah_hobi_mainmusik_pramuka = jumlah_data_training($db_object, " WHERE hobi='Bermain Musik' AND 
        label='Pramuka'");

    $jumlah_hobi_dengarmusik_wirausaha = jumlah_data_training($db_object, " WHERE hobi='Mendengar Musik' AND 
        label='Wirausaha'");
    $jumlah_hobi_dengarmusik_kemanusiaan = jumlah_data_training($db_object, " WHERE hobi='Mendengar Musik' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_hobi_dengarmusik_senior = jumlah_data_training($db_object, " WHERE hobi='Mendengar Musik' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_hobi_dengarmusik_mapala = jumlah_data_training($db_object, " WHERE hobi='Mendengar Musik' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_hobi_dengarmusik_persma = jumlah_data_training($db_object, " WHERE hobi='Mendengar Musik' AND 
        label='Persma'");
    $jumlah_hobi_dengarmusik_bahasa= jumlah_data_training($db_object, " WHERE hobi='Mendengar Musik' AND 
        label='Bahasa'");
    $jumlah_hobi_dengarmusik_pramuka = jumlah_data_training($db_object, " WHERE hobi='Mendengar Musik' AND 
        label='Pramuka'");

    $jumlah_hobi_nonton_wirausaha = jumlah_data_training($db_object, " WHERE hobi='Nonton' AND 
        label='Wirausaha'");
    $jumlah_hobi_nonton_kemanusiaan = jumlah_data_training($db_object, " WHERE hobi='Nonton' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_hobi_nonton_senior = jumlah_data_training($db_object, " WHERE hobi='Nonton' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_hobi_nonton_mapala = jumlah_data_training($db_object, " WHERE hobi='Nonton' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_hobi_nonton_persma = jumlah_data_training($db_object, " WHERE hobi='Nonton' AND 
        label='Persma'");
    $jumlah_hobi_nonton_bahasa= jumlah_data_training($db_object, " WHERE hobi='Nonton' AND 
        label='Bahasa'");
    $jumlah_hobi_nonton_pramuka = jumlah_data_training($db_object, " WHERE hobi='Nonton' AND 
        label='Pramuka'");

    $jumlah_hobi_maingame_wirausaha = jumlah_data_training($db_object, " WHERE hobi='Main Game' AND 
        label='Wirausaha'");
    $jumlah_hobi_maingame_kemanusiaan = jumlah_data_training($db_object, " WHERE hobi='Main Game' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_hobi_maingame_senior = jumlah_data_training($db_object, " WHERE hobi='Main Game' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_hobi_maingame_mapala = jumlah_data_training($db_object, " WHERE hobi='Main Game' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_hobi_maingame_persma = jumlah_data_training($db_object, " WHERE hobi='Main Game' AND 
        label='Persma'");
    $jumlah_hobi_maingame_bahasa= jumlah_data_training($db_object, " WHERE hobi='Main Game' AND 
        label='Bahasa'");
    $jumlah_hobi_maingame_pramuka = jumlah_data_training($db_object, " WHERE hobi='Main Game' AND 
        label='Pramuka'");

    $jumlah_hobi_jalan2_wirausaha = jumlah_data_training($db_object, " WHERE hobi='Jalan-Jalan' AND 
        label='Wirausaha'");
    $jumlah_hobi_jalan2_kemanusiaan = jumlah_data_training($db_object, " WHERE hobi='Jalan-Jalan' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_hobi_jalan2_senior = jumlah_data_training($db_object, " WHERE hobi='Jalan-Jalan' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_hobi_jalan2_mapala = jumlah_data_training($db_object, " WHERE hobi='Jalan-Jalan' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_hobi_jalan2_persma = jumlah_data_training($db_object, " WHERE hobi='Jalan-Jalan' AND 
        label='Persma'");
    $jumlah_hobi_jalan2_bahasa= jumlah_data_training($db_object, " WHERE hobi='Jalan-Jalan' AND 
        label='Bahasa'");
    $jumlah_hobi_jalan2_pramuka = jumlah_data_training($db_object, " WHERE hobi='Jalan-Jalan' AND 
        label='Pramuka'");

    $jumlah_hobi_bhsasing_wirausaha = jumlah_data_training($db_object, " WHERE hobi='Belajar Bahasa Asing Baru' AND label='Wirausaha'");
    $jumlah_hobi_bhsasing_kemanusiaan = jumlah_data_training($db_object, " WHERE hobi='Belajar Bahasa Asing Baru' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_hobi_bhsasing_senior = jumlah_data_training($db_object, " WHERE hobi='Belajar Bahasa Asing Baru' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_hobi_bhsasing_mapala = jumlah_data_training($db_object, " WHERE hobi='Belajar Bahasa Asing Baru' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_hobi_bhsasing_persma = jumlah_data_training($db_object, " WHERE hobi='Belajar Bahasa Asing Baru' AND 
        label='Persma'");
    $jumlah_hobi_bhsasing_bahasa= jumlah_data_training($db_object, " WHERE hobi='Belajar Bahasa Asing Baru' AND 
        label='Bahasa'");
    $jumlah_hobi_bhsasing_pramuka = jumlah_data_training($db_object, " WHERE hobi='Belajar Bahasa Asing Baru' AND 
        label='Pramuka'");

    $jumlah_hobi_melukis_wirausaha = jumlah_data_training($db_object, " WHERE hobi='Melukis' AND label='Wirausaha'");
    $jumlah_hobi_melukis_kemanusiaan = jumlah_data_training($db_object, " WHERE hobi='Melukis' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_hobi_melukis_senior = jumlah_data_training($db_object, " WHERE hobi='Melukis' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_hobi_melukis_mapala = jumlah_data_training($db_object, " WHERE hobi='Melukis' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_hobi_melukis_persma = jumlah_data_training($db_object, " WHERE hobi='Melukis' AND 
        label='Persma'");
    $jumlah_hobi_melukis_bahasa= jumlah_data_training($db_object, " WHERE hobi='Melukis' AND 
        label='Bahasa'");
    $jumlah_hobi_melukis_pramuka = jumlah_data_training($db_object, " WHERE hobi='Melukis' AND 
        label='Pramuka'");

    $jumlah_hobi_berenang_wirausaha = jumlah_data_training($db_object, " WHERE hobi='Berenang' AND label='Wirausaha'");
    $jumlah_hobi_berenang_kemanusiaan = jumlah_data_training($db_object, " WHERE hobi='Berenang' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_hobi_berenang_senior = jumlah_data_training($db_object, " WHERE hobi='Berenang' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_hobi_berenang_mapala = jumlah_data_training($db_object, " WHERE hobi='Berenang' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_hobi_berenang_persma = jumlah_data_training($db_object, " WHERE hobi='Berenang' AND 
        label='Persma'");
    $jumlah_hobi_berenang_bahasa= jumlah_data_training($db_object, " WHERE hobi='Berenang' AND 
        label='Bahasa'");
    $jumlah_hobi_berenang_pramuka = jumlah_data_training($db_object, " WHERE hobi='Berenang' AND 
        label='Pramuka'");

    $jumlah_hobi_naikgunung_wirausaha = jumlah_data_training($db_object, " WHERE hobi='Naik Gunung' AND label='Wirausaha'");
    $jumlah_hobi_naikgunung_kemanusiaan = jumlah_data_training($db_object, " WHERE hobi='Naik Gunung' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_hobi_naikgunung_senior = jumlah_data_training($db_object, " WHERE hobi='Naik Gunung' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_hobi_naikgunung_mapala = jumlah_data_training($db_object, " WHERE hobi='Naik Gunung' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_hobi_naikgunung_persma = jumlah_data_training($db_object, " WHERE hobi='Naik Gunung' AND 
        label='Persma'");
    $jumlah_hobi_naikgunung_bahasa= jumlah_data_training($db_object, " WHERE hobi='Naik Gunung' AND 
        label='Bahasa'");
    $jumlah_hobi_naikgunung_pramuka = jumlah_data_training($db_object, " WHERE hobi='Naik Gunung' AND 
        label='Pramuka'");

    $jumlah_hobi_travelling_wirausaha = jumlah_data_training($db_object, " WHERE hobi='Travelling' AND label='Wirausaha'");
    $jumlah_hobi_travelling_kemanusiaan = jumlah_data_training($db_object, " WHERE hobi='Travelling' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_hobi_travelling_senior = jumlah_data_training($db_object, " WHERE hobi='Travelling' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_hobi_travelling_mapala = jumlah_data_training($db_object, " WHERE hobi='Travelling' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_hobi_travelling_persma = jumlah_data_training($db_object, " WHERE hobi='Travelling' AND 
        label='Persma'");
    $jumlah_hobi_travelling_bahasa= jumlah_data_training($db_object, " WHERE hobi='Travelling' AND 
        label='Bahasa'");
    $jumlah_hobi_travelling_pramuka = jumlah_data_training($db_object, " WHERE hobi='Travelling' AND 
        label='Pramuka'");

    $jumlah_hobi_desaingrafis_wirausaha = jumlah_data_training($db_object, " WHERE hobi='Desain Grafis' AND label='Wirausaha'");
    $jumlah_hobi_desaingrafis_kemanusiaan = jumlah_data_training($db_object, " WHERE hobi='Desain Grafis' AND label='Kemanusiaan (ksr, humaniora)'");
    $jumlah_hobi_desaingrafis_senior = jumlah_data_training($db_object, " WHERE hobi='Desain Grafis' AND 
        label='SENIOR (senior, bola, karate, taekwondo)'");
    $jumlah_hobi_desaingrafis_mapala = jumlah_data_training($db_object, " WHERE hobi='Desain Grafis' AND 
        label='Pecinta Alam (MAPALA)'");
    $jumlah_hobi_desaingrafis_persma = jumlah_data_training($db_object, " WHERE hobi='Desain Grafis' AND 
        label='Persma'");
    $jumlah_hobi_desaingrafis_bahasa= jumlah_data_training($db_object, " WHERE hobi='Desain Grafis' AND 
        label='Bahasa'");
    $jumlah_hobi_desaingrafis_pramuka = jumlah_data_training($db_object, " WHERE hobi='Desain Grafis' AND 
        label='Pramuka'");
    
    //probabilitas atribut hobi
    $p_hobi_menari_wirausaha = $jumlah_hobi_menari_wirusaha/$jumlah_wirausaha;
    $p_hobi_menari_kemanusiaan = $jumlah_hobi_menari_kemanusiaan/$jumlah_kemanusiaan;
    $p_hobi_menari_senior = $jumlah_hobi_menari_senior/$jumlah_senior;
    $p_hobi_menari_mapala = $jumlah_hobi_menari_mapala/$jumlah_mapala;
    $p_hobi_menari_persma = $jumlah_hobi_menari_persma/$jumlah_persma;
    $p_hobi_menari_bahasa = $jumlah_hobi_menari_bahasa/$jumlah_bahasa;
    $p_hobi_menari_pramuka = $jumlah_hobi_menari_pramuka/$jumlah_pramuka;

    $p_hobi_menyanyi_wirausaha = $jumlah_hobi_menyanyi_wirusaha/$jumlah_wirausaha;
    $p_hobi_menyanyi_kemanusiaan = $jumlah_hobi_menyanyi_kemanusiaan/$jumlah_kemanusiaan;
    $p_hobi_menyanyi_senior = $jumlah_hobi_menyanyi_senior/$jumlah_senior;
    $p_hobi_menyanyi_mapala = $jumlah_hobi_menyanyi_mapala/$jumlah_mapala;
    $p_hobi_menyanyi_persma = $jumlah_hobi_menyanyi_persma/$jumlah_persma;
    $p_hobi_menyanyi_bahasa = $jumlah_hobi_menyanyi_bahasa/$jumlah_bahasa;
    $p_hobi_menyanyi_pramuka = $jumlah_hobi_menyanyi_pramuka/$jumlah_pramuka;
 
    $p_hobi_menulis_wirausaha = $jumlah_hobi_menulis_wirusaha/$jumlah_wirausaha;
    $p_hobi_menulis_kemanusiaan = $jumlah_hobi_menulis_kemanusiaan/$jumlah_kemanusiaan;
    $p_hobi_menulis_senior = $jumlah_hobi_menulis_senior/$jumlah_senior;
    $p_hobi_menulis_mapala = $jumlah_hobi_menulis_mapala/$jumlah_mapala;
    $p_hobi_menulis_persma = $jumlah_hobi_menulis_persma/$jumlah_persma;
    $p_hobi_menulis_bahasa = $jumlah_hobi_menulis_bahasa/$jumlah_bahasa;
    $p_hobi_menulis_pramuka = $jumlah_hobi_menulis_pramuka/$jumlah_pramuka;   

    $p_hobi_menggambar_wirausaha = $jumlah_hobi_menggambar_wirusaha/$jumlah_wirausaha;
    $p_hobi_menggambar_kemanusiaan = $jumlah_hobi_menggambar_kemanusiaan/$jumlah_kemanusiaan;
    $p_hobi_menggambar_senior = $jumlah_hobi_menggambar_senior/$jumlah_senior;
    $p_hobi_menggambar_mapala = $jumlah_hobi_menggambar_mapala/$jumlah_mapala;
    $p_hobi_menggambar_persma = $jumlah_hobi_menggambar_persma/$jumlah_persma;
    $p_hobi_menggambar_bahasa = $jumlah_hobi_menggambar_bahasa/$jumlah_bahasa;
    $p_hobi_menggambar_pramuka = $jumlah_hobi_menggambar_pramuka/$jumlah_pramuka;  

    $p_hobi_memasak_wirausaha = $jumlah_hobi_memasak_wirusaha/$jumlah_wirausaha;
    $p_hobi_memasak_kemanusiaan = $jumlah_hobi_memasak_kemanusiaan/$jumlah_kemanusiaan;
    $p_hobi_memasak_senior = $jumlah_hobi_memasak_senior/$jumlah_senior;
    $p_hobi_memasak_mapala = $jumlah_hobi_memasak_mapala/$jumlah_mapala;
    $p_hobi_memasak_persma = $jumlah_hobi_memasak_persma/$jumlah_persma;
    $p_hobi_memasak_bahasa = $jumlah_hobi_memasak_bahasa/$jumlah_bahasa;
    $p_hobi_memasak_pramuka = $jumlah_hobi_memasak_pramuka/$jumlah_pramuka;   

    $p_hobi_fotografi_wirausaha = $jumlah_hobi_fotografi_wirusaha/$jumlah_wirausaha;
    $p_hobi_fotografi_kemanusiaan = $jumlah_hobi_fotografi_kemanusiaan/$jumlah_kemanusiaan;
    $p_hobi_fotografi_senior = $jumlah_hobi_fotografi_senior/$jumlah_senior;
    $p_hobi_fotografi_mapala = $jumlah_hobi_fotografi_mapala/$jumlah_mapala;
    $p_hobi_fotografi_persma = $jumlah_hobi_fotografi_persma/$jumlah_persma;
    $p_hobi_fotografi_bahasa = $jumlah_hobi_fotografi_bahasa/$jumlah_bahasa;
    $p_hobi_fotografi_pramuka = $jumlah_hobi_fotografi_pramuka/$jumlah_pramuka;   

    $p_hobi_sepakbola_wirausaha = $jumlah_hobi_memasak_wirusaha/$jumlah_wirausaha;
    $p_hobi_sepakbola_kemanusiaan = $jumlah_hobi_sepakbola_kemanusiaan/$jumlah_kemanusiaan;
    $p_hobi_sepakbola_senior = $jumlah_hobi_sepakbola_senior/$jumlah_senior;
    $p_hobi_sepakbola_mapala = $jumlah_hobi_sepakbola_mapala/$jumlah_mapala;
    $p_hobi_sepakbola_persma = $jumlah_hobi_sepakbola_persma/$jumlah_persma;
    $p_hobi_sepakbola_bahasa = $jumlah_hobi_sepakbola_bahasa/$jumlah_bahasa;
    $p_hobi_sepakbola_pramuka = $jumlah_hobi_sepakbola_pramuka/$jumlah_pramuka; 

    $p_hobi_bulutangkis_wirausaha = $jumlah_hobi_bulutangkis_wirusaha/$jumlah_wirausaha;
    $p_hobi_bulutangkis_kemanusiaan = $jumlah_hobi_sepakbola_kemanusiaan/$jumlah_kemanusiaan;
    $p_hobi_bulutangkis_senior = $jumlah_hobi_bulutangkis_senior/$jumlah_senior;
    $p_hobi_bulutangkis_mapala = $jumlah_hobi_bulutangkis_mapala/$jumlah_mapala;
    $p_hobi_bulutangkis_persma = $jumlah_hobi_bulutangkis_persma/$jumlah_persma;
    $p_hobi_bulutangkis_bahasa = $jumlah_hobi_bulutangkis_bahasa/$jumlah_bahasa;
    $p_hobi_bulutangkis_pramuka = $jumlah_hobi_bulutangkis_pramuka/$jumlah_pramuka; 

    $p_hobi_basket_wirausaha = $jumlah_hobi_basket_wirusaha/$jumlah_wirausaha;
    $p_hobi_basket_kemanusiaan = $jumlah_hobi_basket_kemanusiaan/$jumlah_kemanusiaan;
    $p_hobi_basket_senior = $jumlah_hobi_sepakbola_senior/$jumlah_senior;
    $p_hobi_basket_mapala = $jumlah_hobi_sepakbola_mapala/$jumlah_mapala;
    $p_hobi_basket_persma = $jumlah_hobi_basket_persma/$jumlah_persma;
    $p_hobi_basket_bahasa = $jumlah_hobi_basket_bahasa/$jumlah_bahasa;
    $p_hobi_basket_pramuka = $jumlah_hobi_basket_pramuka/$jumlah_pramuka; 

    $p_hobi_futsal_wirausaha = $jumlah_hobi_futsal_wirusaha/$jumlah_wirausaha;
    $p_hobi_futsal_kemanusiaan = $jumlah_hobi_futsal_kemanusiaan/$jumlah_kemanusiaan;
    $p_hobi_futsal_senior = $jumlah_hobi_futsal_senior/$jumlah_senior;
    $p_hobi_futsal_mapala = $jumlah_hobi_futsal_mapala/$jumlah_mapala;
    $p_hobi_futsal_persma = $jumlah_hobi_futsal_persma/$jumlah_persma;
    $p_hobi_futsal_bahasa = $jumlah_hobi_futsal_bahasa/$jumlah_bahasa;
    $p_hobi_futsal_pramuka = $jumlah_hobi_futsal_pramuka/$jumlah_pramuka; 

    $p_hobi_volly_wirausaha = $jumlah_hobi_futsal_wirusaha/$jumlah_wirausaha;
    $p_hobi_volly_kemanusiaan = $jumlah_hobi_volly_kemanusiaan/$jumlah_kemanusiaan;
    $p_hobi_volly_senior = $jumlah_hobi_volly_senior/$jumlah_senior;
    $p_hobi_volly_mapala = $jumlah_hobi_volly_mapala/$jumlah_mapala;
    $p_hobi_volly_persma = $jumlah_hobi_volly_persma/$jumlah_persma;
    $p_hobi_volly_bahasa = $jumlah_hobi_volly_bahasa/$jumlah_bahasa;
    $p_hobi_volly_pramuka = $jumlah_hobi_volly_pramuka/$jumlah_pramuka; 

    $p_hobi_belajarmtk_wirausaha = $jumlah_hobi_belajarmtk_wirusaha/$jumlah_wirausaha;
    $p_hobi_belajarmtk_kemanusiaan = $jumlah_hobi_belajarmtk_kemanusiaan/$jumlah_kemanusiaan;
    $p_hobi_belajarmtk_senior = $jumlah_hobi_belajarmtk_senior/$jumlah_senior;
    $p_hobi_belajarmtk_mapala = $jumlah_hobi_belajarmtk_mapala/$jumlah_mapala;
    $p_hobi_belajarmtk_persma = $jumlah_hobi_belajarmtk_persma/$jumlah_persma;
    $p_hobi_belajarmtk_bahasa = $jumlah_hobi_belajarmtk_bahasa/$jumlah_bahasa;
    $p_hobi_belajarmtk_pramuka = $jumlah_hobi_belajarmtk_pramuka/$jumlah_pramuka;

    $p_hobi_olahraga_wirausaha = $jumlah_hobi_olahraga_wirusaha/$jumlah_wirausaha;
    $p_hobi_olahraga_kemanusiaan = $jumlah_hobi_olahraga_kemanusiaan/$jumlah_kemanusiaan;
    $p_hobi_olahraga_senior = $jumlah_hobi_olahraga_senior/$jumlah_senior;
    $p_hobi_olahraga_mapala = $jumlah_hobi_olahraga_mapala/$jumlah_mapala;
    $p_hobi_olahraga_persma = $jumlah_hobi_olahraga_persma/$jumlah_persma;
    $p_hobi_olahraga_bahasa = $jumlah_hobi_olahraga_bahasa/$jumlah_bahasa;
    $p_hobi_olahraga_pramuka = $jumlah_hobi_olahraga_pramuka/$jumlah_pramuka;   

    $p_hobi_membaca_wirausaha = $jumlah_hobi_membaca_wirusaha/$jumlah_wirausaha;
    $p_hobi_membaca_kemanusiaan = $jumlah_hobi_membaca_kemanusiaan/$jumlah_kemanusiaan;
    $p_hobi_membaca_senior = $jumlah_hobi_membaca_senior/$jumlah_senior;
    $p_hobi_membaca_mapala = $jumlah_hobi_membaca_mapala/$jumlah_mapala;
    $p_hobi_membaca_persma = $jumlah_hobi_membaca_persma/$jumlah_persma;
    $p_hobi_membaca_bahasa = $jumlah_hobi_membaca_bahasa/$jumlah_bahasa;
    $p_hobi_membaca_pramuka = $jumlah_hobi_membaca_pramuka/$jumlah_pramuka;   

    $p_hobi_mainmusik_wirausaha = $jumlah_hobi_mainmusik_wirusaha/$jumlah_wirausaha;
    $p_hobi_mainmusik_kemanusiaan = $jumlah_hobi_mainmusik_kemanusiaan/$jumlah_kemanusiaan;
    $p_hobi_mainmusik_senior = $jumlah_hobi_mainmusik_senior/$jumlah_senior;
    $p_hobi_mainmusik_mapala = $jumlah_hobi_mainmusik_mapala/$jumlah_mapala;
    $p_hobi_mainmusik_persma = $jumlah_hobi_mainmusik_persma/$jumlah_persma;
    $p_hobi_mainmusik_bahasa = $jumlah_hobi_mainmusik_bahasa/$jumlah_bahasa;
    $p_hobi_mainmusik_pramuka = $jumlah_hobi_mainmusik_pramuka/$jumlah_pramuka;

    $p_hobi_dengarmusik_wirausaha = $jumlah_hobi_dengarmusik_wirusaha/$jumlah_wirausaha;
    $p_hobi_dengarmusik_kemanusiaan = $jumlah_hobi_dengarmusik_kemanusiaan/$jumlah_kemanusiaan;
    $p_hobi_dengarmusik_senior = $jumlah_hobi_dengarmusik_senior/$jumlah_senior;
    $p_hobi_dengarmusik_mapala = $jumlah_hobi_dengarmusik_mapala/$jumlah_mapala;
    $p_hobi_dengarmusik_persma = $jumlah_hobi_dengarmusik_persma/$jumlah_persma;
    $p_hobi_dengarmusik_bahasa = $jumlah_hobi_dengarmusik_bahasa/$jumlah_bahasa;
    $p_hobi_dengarmusik_pramuka = $jumlah_hobi_dengarmusik_pramuka/$jumlah_pramuka;

    $p_hobi_nonton_wirausaha = $jumlah_hobi_nonton_wirusaha/$jumlah_wirausaha;
    $p_hobi_nonton_kemanusiaan = $jumlah_hobi_nonton_kemanusiaan/$jumlah_kemanusiaan;
    $p_hobi_nonton_senior = $jumlah_hobi_nonton_senior/$jumlah_senior;
    $p_hobi_nonton_mapala = $jumlah_hobi_nonton_mapala/$jumlah_mapala;
    $p_hobi_nonton_persma = $jumlah_hobi_nonton_persma/$jumlah_persma;
    $p_hobi_nonton_bahasa = $jumlah_hobi_nonton_bahasa/$jumlah_bahasa;
    $p_hobi_nonton_pramuka = $jumlah_hobi_nonton_pramuka/$jumlah_pramuka;  

    $p_hobi_maingame_wirausaha = $jumlah_hobi_maingame_wirusaha/$jumlah_wirausaha;
    $p_hobi_maingame_kemanusiaan = $jumlah_hobi_maingame_kemanusiaan/$jumlah_kemanusiaan;
    $p_hobi_maingame_senior = $jumlah_hobi_maingame_senior/$jumlah_senior;
    $p_hobi_maingame_mapala = $jumlah_hobi_maingame_mapala/$jumlah_mapala;
    $p_hobi_maingame_persma = $jumlah_hobi_maingame_persma/$jumlah_persma;
    $p_hobi_maingame_bahasa = $jumlah_hobi_maingame_bahasa/$jumlah_bahasa;
    $p_hobi_maingame_pramuka = $jumlah_hobi_maingame_pramuka/$jumlah_pramuka;  

    $p_hobi_jalan2_wirausaha = $jumlah_hobi_jalan2_wirusaha/$jumlah_wirausaha;
    $p_hobi_jalan2_kemanusiaan = $jumlah_hobi_jalan2_kemanusiaan/$jumlah_kemanusiaan;
    $p_hobi_jalan2_senior = $jumlah_hobi_jalan2_senior/$jumlah_senior;
    $p_hobi_jalan2_mapala = $jumlah_hobi_jalan2_mapala/$jumlah_mapala;
    $p_hobi_jalan2_persma = $jumlah_hobi_jalan2_persma/$jumlah_persma;
    $p_hobi_jalan2_bahasa = $jumlah_hobi_jalan2_bahasa/$jumlah_bahasa;
    $p_hobi_jalan2_pramuka = $jumlah_hobi_jalan2_pramuka/$jumlah_pramuka;

    $p_hobi_bhsasing_wirausaha = $jumlah_hobi_bhsasing_wirusaha/$jumlah_wirausaha;
    $p_hobi_bhsasing_kemanusiaan = $jumlah_hobi_bhsasing_kemanusiaan/$jumlah_kemanusiaan;
    $p_hobi_bhsasing_senior = $jumlah_hobi_bhsasing_senior/$jumlah_senior;
    $p_hobi_bhsasing_mapala = $jumlah_hobi_bhsasing_mapala/$jumlah_mapala;
    $p_hobi_bhsasing_persma = $jumlah_hobi_bhsasing_persma/$jumlah_persma;
    $p_hobi_bhsasing_bahasa = $jumlah_hobi_bhsasing_bahasa/$jumlah_bahasa;
    $p_hobi_bhsasing_pramuka = $jumlah_hobi_bhsasing_pramuka/$jumlah_pramuka;  

    $p_hobi_melukis_wirausaha = $jumlah_hobi_melukis_wirusaha/$jumlah_wirausaha;
    $p_hobi_melukis_kemanusiaan = $jumlah_hobi_melukis_kemanusiaan/$jumlah_kemanusiaan;
    $p_hobi_melukis_senior = $jumlah_hobi_melukis_senior/$jumlah_senior;
    $p_hobi_melukis_mapala = $jumlah_hobi_melukis_mapala/$jumlah_mapala;
    $p_hobi_melukis_persma = $jumlah_hobi_melukis_persma/$jumlah_persma;
    $p_hobi_melukis_bahasa = $jumlah_hobi_melukis_bahasa/$jumlah_bahasa;
    $p_hobi_melukis_pramuka = $jumlah_hobi_melukis_pramuka/$jumlah_pramuka;

    $p_hobi_berenang_wirausaha = $jumlah_hobi_berenang_wirusaha/$jumlah_wirausaha;
    $p_hobi_berenang_kemanusiaan = $jumlah_hobi_berenang_kemanusiaan/$jumlah_kemanusiaan;
    $p_hobi_berenang_senior = $jumlah_hobi_berenang_senior/$jumlah_senior;
    $p_hobi_berenang_mapala = $jumlah_hobi_berenang_mapala/$jumlah_mapala;
    $p_hobi_berenang_persma = $jumlah_hobi_berenang_persma/$jumlah_persma;
    $p_hobi_berenang_bahasa = $jumlah_hobi_berenang_bahasa/$jumlah_bahasa;
    $p_hobi_berenang_pramuka = $jumlah_hobi_berenang_pramuka/$jumlah_pramuka;   

    $p_hobi_naikgunung_wirausaha = $jumlah_hobi_naikgunung_wirusaha/$jumlah_wirausaha;
    $p_hobi_naikgunung_kemanusiaan = $jumlah_hobi_naikgunung_kemanusiaan/$jumlah_kemanusiaan;
    $p_hobi_naikgunung_senior = $jumlah_hobi_naikgunung_senior/$jumlah_senior;
    $p_hobi_naikgunung_mapala = $jumlah_hobi_naikgunung_mapala/$jumlah_mapala;
    $p_hobi_naikgunung_persma = $jumlah_hobi_naikgunung_persma/$jumlah_persma;
    $p_hobi_naikgunung_bahasa = $jumlah_hobi_naikgunung_bahasa/$jumlah_bahasa;
    $p_hobi_naikgunung_pramuka = $jumlah_hobi_naikgunung_pramuka/$jumlah_pramuka;   

    $p_hobi_travelling_wirausaha = $jumlah_hobi_travelling_wirusaha/$jumlah_wirausaha;
    $p_hobi_travelling_kemanusiaan = $jumlah_hobi_travelling_kemanusiaan/$jumlah_kemanusiaan;
    $p_hobi_travelling_senior = $jumlah_hobi_travelling_senior/$jumlah_senior;
    $p_hobi_travelling_mapala = $jumlah_hobi_travelling_mapala/$jumlah_mapala;
    $p_hobi_travelling_persma = $jumlah_hobi_travelling_persma/$jumlah_persma;
    $p_hobi_travelling_bahasa = $jumlah_hobi_travelling_bahasa/$jumlah_bahasa;
    $p_hobi_travelling_pramuka = $jumlah_hobi_travelling_pramuka/$jumlah_pramuka;  

    $p_hobi_desaingrafis_wirausaha = $jumlah_hobi_desaingrafis_wirusaha/$jumlah_wirausaha;
    $p_hobi_desaingrafis_kemanusiaan = $jumlah_hobi_desaingrafis_kemanusiaan/$jumlah_kemanusiaan;
    $p_hobi_desaingrafis_senior = $jumlah_hobi_desaingrafis_senior/$jumlah_senior;
    $p_hobi_desaingrafis_mapala = $jumlah_hobi_desaingrafis_mapala/$jumlah_mapala;
    $p_hobi_desaingrafis_persma = $jumlah_hobi_desaingrafis_persma/$jumlah_persma;
    $p_hobi_desaingrafis_bahasa = $jumlah_hobi_desaingrafis_bahasa/$jumlah_bahasa;
    $p_hobi_desaingrafis_pramuka = $jumlah_hobi_desaingrafis_pramuka/$jumlah_pramuka;


    //display table probabilitas hobi
        if($show_perhitungan){
    echo "<table class='table table-bordered table-striped  table-hover' style='width:40%'>";
        echo "<tr>";
            echo "<td><b><u>Hobi:</u></b></td>";
            echo "<td>Wirausaha</td>";
            echo "<td>Kemanusiaan (ksr, humaniora)</td>";
            echo "<td>SENIOR (senior, bola, karate, taekwondo)</td>";
            echo "<td>Pecinta Alam (MAPALA)</td>";
            echo "<td>Persma</td>";
            echo "<td>Bahasa</td>";
            echo "<td>Pramuka</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Menari</td>";
            echo "<td>".number_format($p_hobi_menari_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_hobi_menari_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_hobi_menari_senior, dec())."</td>";
            echo "<td>".number_format($p_hobi_menari_mapala, dec())."</td>";
            echo "<td>".number_format($p_hobi_menari_persma, dec())."</td>";
            echo "<td>".number_format($p_hobi_menari_bahasa, dec())."</td>";
            echo "<td>".number_format($p_hobi_menari_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Menyanyi</td>";
            echo "<td>".number_format($p_hobi_menyanyi_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_hobi_menyanyi_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_hobi_menyanyi_senior, dec())."</td>";
            echo "<td>".number_format($p_hobi_menyanyi_mapala, dec())."</td>";
            echo "<td>".number_format($p_hobi_menyanyi_persma, dec())."</td>";
            echo "<td>".number_format($p_hobi_menyanyi_bahasa, dec())."</td>";
            echo "<td>".number_format($p_hobi_menyanyi_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Menulis</td>";
            echo "<td>".number_format($p_hobi_menulis_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_hobi_menulis_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_hobi_menulis_senior, dec())."</td>";
            echo "<td>".number_format($p_hobi_menulis_mapala, dec())."</td>";
            echo "<td>".number_format($p_hobi_menulis_persma, dec())."</td>";
            echo "<td>".number_format($p_hobi_menulis_bahasa, dec())."</td>";
            echo "<td>".number_format($p_hobi_menulis_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Menggambar</td>";
            echo "<td>".number_format($p_hobi_menggambar_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_hobi_menggambar_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_hobi_menggambar_senior, dec())."</td>";
            echo "<td>".number_format($p_hobi_menggambar_mapala, dec())."</td>";
            echo "<td>".number_format($p_hobi_menggambar_persma, dec())."</td>";
            echo "<td>".number_format($p_hobi_menggambar_bahasa, dec())."</td>";
            echo "<td>".number_format($p_hobi_menggambar_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Memasak</td>";
            echo "<td>".number_format($p_hobi_memasak_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_hobi_memasak_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_hobi_memasak_senior, dec())."</td>";
            echo "<td>".number_format($p_hobi_memasak_mapala, dec())."</td>";
            echo "<td>".number_format($p_hobi_memasak_persma, dec())."</td>";
            echo "<td>".number_format($p_hobi_memasak_bahasa, dec())."</td>";
            echo "<td>".number_format($p_hobi_memasak_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Fotografi</td>";
            echo "<td>".number_format($p_hobi_fotografi_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_hobi_fotografi_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_hobi_fotografi_senior, dec())."</td>";
            echo "<td>".number_format($p_hobi_fotografi_mapala, dec())."</td>";
            echo "<td>".number_format($p_hobi_fotografi_persma, dec())."</td>";
            echo "<td>".number_format($p_hobi_fotografi_bahasa, dec())."</td>";
            echo "<td>".number_format($p_hobi_fotografi_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Sepak Bola</td>";
            echo "<td>".number_format($p_hobi_sepakbola_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_hobi_sepakbola_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_hobi_sepakbola_senior, dec())."</td>";
            echo "<td>".number_format($p_hobi_sepakbola_mapala, dec())."</td>";
            echo "<td>".number_format($p_hobi_sepakbola_persma, dec())."</td>";
            echo "<td>".number_format($p_hobi_sepakbola_bahasa, dec())."</td>";
            echo "<td>".number_format($p_hobi_sepakbola_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Bulu Tangkis</td>";
            echo "<td>".number_format($p_hobi_bulutangkis_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_hobi_bulutangkis_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_hobi_bulutangkis_senior, dec())."</td>";
            echo "<td>".number_format($p_hobi_bulutangkis_mapala, dec())."</td>";
            echo "<td>".number_format($p_hobi_bulutangkis_persma, dec())."</td>";
            echo "<td>".number_format($p_hobi_bulutangkis_bahasa, dec())."</td>";
            echo "<td>".number_format($p_hobi_bulutangkis_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Basket</td>";
            echo "<td>".number_format($p_hobi_basket_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_hobi_basket_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_hobi_basket_senior, dec())."</td>";
            echo "<td>".number_format($p_hobi_basket_mapala, dec())."</td>";
            echo "<td>".number_format($p_hobi_basket_persma, dec())."</td>";
            echo "<td>".number_format($p_hobi_basket_bahasa, dec())."</td>";
            echo "<td>".number_format($p_hobi_basket_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Futsal</td>";
            echo "<td>".number_format($p_hobi_futsal_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_hobi_futsal_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_hobi_futsal_senior, dec())."</td>";
            echo "<td>".number_format($p_hobi_futsal_mapala, dec())."</td>";
            echo "<td>".number_format($p_hobi_futsal_persma, dec())."</td>";
            echo "<td>".number_format($p_hobi_futsal_bahasa, dec())."</td>";
            echo "<td>".number_format($p_hobi_futsal_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Volly</td>";
            echo "<td>".number_format($p_hobi_volly_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_hobi_volly_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_hobi_volly_senior, dec())."</td>";
            echo "<td>".number_format($p_hobi_volly_mapala, dec())."</td>";
            echo "<td>".number_format($p_hobi_volly_persma, dec())."</td>";
            echo "<td>".number_format($p_hobi_volly_bahasa, dec())."</td>";
            echo "<td>".number_format($p_hobi_volly_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Belajar Matematika</td>";
            echo "<td>".number_format($p_hobi_belajarmtk_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_hobi_belajarmtk_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_hobi_belajarmtk_senior, dec())."</td>";
            echo "<td>".number_format($p_hobi_belajarmtk_mapala, dec())."</td>";
            echo "<td>".number_format($p_hobi_belajarmtk_persma, dec())."</td>";
            echo "<td>".number_format($p_hobi_belajarmtk_bahasa, dec())."</td>";
            echo "<td>".number_format($p_hobi_belajarmtk_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Olahraga</td>";
            echo "<td>".number_format($p_hobi_olahraga_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_hobi_olahraga_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_hobi_olahraga_senior, dec())."</td>";
            echo "<td>".number_format($p_hobi_olahraga_mapala, dec())."</td>";
            echo "<td>".number_format($p_hobi_olahraga_persma, dec())."</td>";
            echo "<td>".number_format($p_hobi_olahraga_bahasa, dec())."</td>";
            echo "<td>".number_format($p_hobi_olahraga_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Membaca</td>";
            echo "<td>".number_format($p_hobi_membaca_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_hobi_membaca_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_hobi_membaca_senior, dec())."</td>";
            echo "<td>".number_format($p_hobi_membaca_mapala, dec())."</td>";
            echo "<td>".number_format($p_hobi_membaca_persma, dec())."</td>";
            echo "<td>".number_format($p_hobi_membaca_bahasa, dec())."</td>";
            echo "<td>".number_format($p_hobi_membaca_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Bermain Musik</td>";
            echo "<td>".number_format($p_hobi_mainmusik_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_hobi_mainmusik_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_hobi_mainmusik_senior, dec())."</td>";
            echo "<td>".number_format($p_hobi_mainmusik_mapala, dec())."</td>";
            echo "<td>".number_format($p_hobi_mainmusik_persma, dec())."</td>";
            echo "<td>".number_format($p_hobi_mainmusik_bahasa, dec())."</td>";
            echo "<td>".number_format($p_hobi_mainmusik_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Mendengar Musik</td>";
            echo "<td>".number_format($p_hobi_dengarmusik_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_hobi_dengarmusik_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_hobi_dengarmusik_senior, dec())."</td>";
            echo "<td>".number_format($p_hobi_dengarmusik_mapala, dec())."</td>";
            echo "<td>".number_format($p_hobi_dengarmusik_persma, dec())."</td>";
            echo "<td>".number_format($p_hobi_dengarmusik_bahasa, dec())."</td>";
            echo "<td>".number_format($p_hobi_dengarmusik_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Nonton</td>";
            echo "<td>".number_format($p_hobi_nonton_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_hobi_nonton_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_hobi_nonton_senior, dec())."</td>";
            echo "<td>".number_format($p_hobi_nonton_mapala, dec())."</td>";
            echo "<td>".number_format($p_hobi_nonton_persma, dec())."</td>";
            echo "<td>".number_format($p_hobi_nonton_bahasa, dec())."</td>";
            echo "<td>".number_format($p_hobi_nonton_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Main Game</td>";
            echo "<td>".number_format($p_hobi_maingame_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_hobi_maingame_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_hobi_maingame_senior, dec())."</td>";
            echo "<td>".number_format($p_hobi_maingame_mapala, dec())."</td>";
            echo "<td>".number_format($p_hobi_maingame_persma, dec())."</td>";
            echo "<td>".number_format($p_hobi_maingame_bahasa, dec())."</td>";
            echo "<td>".number_format($p_hobi_maingame_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Jalan-Jalan</td>";
            echo "<td>".number_format($p_hobi_jalan2_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_hobi_jalan2_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_hobi_jalan2_senior, dec())."</td>";
            echo "<td>".number_format($p_hobi_jalan2_mapala, dec())."</td>";
            echo "<td>".number_format($p_hobi_jalan2_persma, dec())."</td>";
            echo "<td>".number_format($p_hobi_jalan2_bahasa, dec())."</td>";
            echo "<td>".number_format($p_hobi_jalan2_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Belajar Bahasa Asing Baru</td>";
            echo "<td>".number_format($p_hobi_bhsasing_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_hobi_bhsasing_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_hobi_bhsasing_senior, dec())."</td>";
            echo "<td>".number_format($p_hobi_bhsasing_mapala, dec())."</td>";
            echo "<td>".number_format($p_hobi_bhsasing_persma, dec())."</td>";
            echo "<td>".number_format($p_hobi_bhsasing_bahasa, dec())."</td>";
            echo "<td>".number_format($p_hobi_bhsasing_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Melukis</td>";
            echo "<td>".number_format($p_hobi_melukis_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_hobi_melukis_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_hobi_melukis_senior, dec())."</td>";
            echo "<td>".number_format($p_hobi_melukis_mapala, dec())."</td>";
            echo "<td>".number_format($p_hobi_melukis_persma, dec())."</td>";
            echo "<td>".number_format($p_hobi_melukis_bahasa, dec())."</td>";
            echo "<td>".number_format($p_hobi_melukis_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Berenang</td>";
            echo "<td>".number_format($p_hobi_berenang_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_hobi_melukis_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_hobi_berenang_senior, dec())."</td>";
            echo "<td>".number_format($p_hobi_berenang_mapala, dec())."</td>";
            echo "<td>".number_format($p_hobi_berenang_persma, dec())."</td>";
            echo "<td>".number_format($p_hobi_berenang_bahasa, dec())."</td>";
            echo "<td>".number_format($p_hobi_berenang_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Naik Gunung</td>";
            echo "<td>".number_format($p_hobi_naikgunung_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_hobi_naikgunung_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_hobi_naikgunung_senior, dec())."</td>";
            echo "<td>".number_format($p_hobi_naikgunung_mapala, dec())."</td>";
            echo "<td>".number_format($p_hobi_naikgunung_persma, dec())."</td>";
            echo "<td>".number_format($p_hobi_naikgunung_bahasa, dec())."</td>";
            echo "<td>".number_format($p_hobi_naikgunung_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Travelling</td>";
            echo "<td>".number_format($p_hobi_travelling_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_hobi_travelling_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_hobi_travelling_senior, dec())."</td>";
            echo "<td>".number_format($p_hobi_travelling_mapala, dec())."</td>";
            echo "<td>".number_format($p_hobi_travelling_persma, dec())."</td>";
            echo "<td>".number_format($p_hobi_travelling_bahasa, dec())."</td>";
            echo "<td>".number_format($p_hobi_travelling_pramuka, dec())."</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Desain Grafis</td>";
            echo "<td>".number_format($p_hobi_desaingrafis_wirausaha, dec())."</td>";
            echo "<td>".number_format($p_hobi_desaingrafis_kemanusiaan, dec())."</td>";
            echo "<td>".number_format($p_hobi_desaingrafis_senior, dec())."</td>";
            echo "<td>".number_format($p_hobi_desaingrafis_mapala, dec())."</td>";
            echo "<td>".number_format($p_hobi_desaingrafis_persma, dec())."</td>";
            echo "<td>".number_format($p_hobi_desaingrafis_bahasa, dec())."</td>";
            echo "<td>".number_format($p_hobi_desaingrafis_pramuka, dec())."</td>";
        echo "</tr>";
    echo "</table>";
        }
   //   //jurusan
   //  $jumlah_jurusan_an_wirusaha = get_jumlah_sum_atribut($db_object, "jurusan", "Wirausaha");
   //  $x_jurusan_an_wirusaha = $jumlah_jurusan_an_wirusaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_jurusan_an_kemanusiaan = get_jumlah_sum_atribut($db_object, "jurusan", "Kemanusiaan (ksr, humaniora)");
   //  $x_jurusan_an_kemanusiaan = $jumlah_jurusan_an_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_jurusan_an_senior = get_jumlah_sum_atribut($db_object, "jurusan", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_jurusan_an_senior = $jumlah_jurusan_an_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_jurusan_an_mapala = get_jumlah_sum_atribut($db_object, "jurusan", "Pecinta Alam (MAPALA)");
   //  $x_jurusan_an_mapala = $jumlah_jurusan_an_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_jurusan_an_persma = get_jumlah_sum_atribut($db_object, "jurusan", "Persma");
   //  $x_jurusan_an_persma = $jumlah_jurusan_an_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_jurusan_an_bahasa = get_jumlah_sum_atribut($db_object, "jurusan", "Bahasa");
   //  $x_jurusan_an_bahasa = $jumlah_jurusan_an_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_jurusan_an_pramuka = get_jumlah_sum_atribut($db_object, "jurusan", "Pramuka");
   //  $x_jurusan_an_pramuka = $jumlah_jurusan_an_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_jurusan_ak_wirusaha = get_jumlah_sum_atribut($db_object, "jurusan", "Wirausaha");
   //  $x_jurusan_ak_wirusah = $jumlah_jurusan_ak_wirusaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_jurusan_ak_kemanusiaan = get_jumlah_sum_atribut($db_object, "jurusan", "Kemanusiaan (ksr, humaniora)");
   //  $x_jurusan_ak_kemanusiaan = $jumlah_jurusan_ak_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_jurusan_ak_senior = get_jumlah_sum_atribut($db_object, "jurusan", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_jurusan_ak_senior = $jumlah_jurusan_ak_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_jurusan_ak_mapala = get_jumlah_sum_atribut($db_object, "jurusan", "Pecinta Alam (MAPALA)");
   //  $x_jurusan_ak_mapala = $jumlah_jurusan_ak_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_jurusan_ak_persma = get_jumlah_sum_atribut($db_object, "jurusan", "Persma");
   //  $x_jurusan_ak_persma = $jumlah_jurusan_ak_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_jurusan_ak_bahasa = get_jumlah_sum_atribut($db_object, "jurusan", "Bahasa");
   //  $x_jurusan_ak_bahasa = $jumlah_jurusan_ak_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_jurusan_ak_pramuka = get_jumlah_sum_atribut($db_object, "jurusan", "Pramuka");
   //  $x_jurusan_ak_pramuka = $jumlah_jurusan_ak_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_jurusan_elektro_wirusaha = get_jumlah_sum_atribut($db_object, "jurusan", "Wirausaha");
   //  $x_jurusan_elektro_wirusah = $jumlah_jurusan_elektro_wirusaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_jurusan_elektro_kemanusiaan = get_jumlah_sum_atribut($db_object, "jurusan", "Kemanusiaan (ksr, humaniora)");
   //  $x_jurusan_elektro_kemanusiaan = $jumlah_jurusan_elektro_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_jurusan_elektro_senior = get_jumlah_sum_atribut($db_object, "jurusan", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_jurusan_elektro_senior = $jumlah_jurusan_elektro_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_jurusan_elektro_mapala = get_jumlah_sum_atribut($db_object, "jurusan", "Pecinta Alam (MAPALA)");
   //  $x_jurusan_elektro_mapala = $jumlah_jurusan_elektro_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_jurusan_elektro_persma = get_jumlah_sum_atribut($db_object, "jurusan", "Persma");
   //  $x_jurusan_elektro_persma = $jumlah_jurusan_elektro_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_jurusan_elektro_bahasa = get_jumlah_sum_atribut($db_object, "jurusan", "Bahasa");
   //  $x_jurusan_elektro_bahasa = $jumlah_jurusan_elektro_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_jurusan_elektro_pramuka = get_jumlah_sum_atribut($db_object, "jurusan", "Pramuka");
   //  $x_jurusan_elektro_pramuka = $jumlah_jurusan_elektro_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_jurusan_kimia_wirusaha = get_jumlah_sum_atribut($db_object, "jurusan", "Wirausaha");
   //  $x_jurusan_kimia_wirusah = $jumlah_jurusan_kimia_wirusaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_jurusan_kimia_kemanusiaan = get_jumlah_sum_atribut($db_object, "jurusan", "Kemanusiaan (ksr, humaniora)");
   //  $x_jurusan_kimia_kemanusiaan = $jumlah_jurusan_kimia_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_jurusan_kimia_senior = get_jumlah_sum_atribut($db_object, "jurusan", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_jurusan_kimia_senior = $jumlah_jurusan_kimia_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_jurusan_kimia_mapala = get_jumlah_sum_atribut($db_object, "jurusan", "Pecinta Alam (MAPALA)");
   //  $x_jurusan_kimia_mapala = $jumlah_jurusan_kimia_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_jurusan_kimia_persma = get_jumlah_sum_atribut($db_object, "jurusan", "Persma");
   //  $x_jurusan_kimia_persma = $jumlah_jurusan_kimia_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_jurusan_kimia_bahasa = get_jumlah_sum_atribut($db_object, "jurusan", "Bahasa");
   //  $x_jurusan_kimia_bahasa = $jumlah_jurusan_kimia_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_jurusan_kimia_pramuka = get_jumlah_sum_atribut($db_object, "jurusan", "Pramuka");
   //  $x_jurusan_kimia_pramuka = $jumlah_jurusan_kimia_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_jurusan_mesin_wirusaha = get_jumlah_sum_atribut($db_object, "jurusan", "Wirausaha");
   //  $x_jurusan_mesin_wirusah = $jumlah_jurusan_mesin_wirusaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_jurusan_mesin_kemanusiaan = get_jumlah_sum_atribut($db_object, "jurusan", "Kemanusiaan (ksr, humaniora)");
   //  $x_jurusan_mesin_kemanusiaan = $jumlah_jurusan_mesin_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_jurusan_mesin_senior = get_jumlah_sum_atribut($db_object, "jurusan", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_jurusan_mesin_senior = $jumlah_jurusan_mesin_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_jurusan_mesin_mapala = get_jumlah_sum_atribut($db_object, "jurusan", "Pecinta Alam (MAPALA)");
   //  $x_jurusan_mesin_mapala = $jumlah_jurusan_mesin_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_jurusan_mesin_persma = get_jumlah_sum_atribut($db_object, "jurusan", "Persma");
   //  $x_jurusan_mesin_persma = $jumlah_jurusan_mesin_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_jurusan_mesin_bahasa = get_jumlah_sum_atribut($db_object, "jurusan", "Bahasa");
   //  $x_jurusan_mesin_bahasa = $jumlah_jurusan_mesin_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_jurusan_mesin_pramuka = get_jumlah_sum_atribut($db_object, "jurusan", "Pramuka");
   //  $x_jurusan_mesin_pramuka = $jumlah_jurusan_mesin_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_jurusan_sipil_wirusaha = get_jumlah_sum_atribut($db_object, "jurusan", "Wirausaha");
   //  $x_jurusan_sipil_wirusah = $jumlah_jurusan_sipil_wirusaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_jurusan_sipil_kemanusiaan = get_jumlah_sum_atribut($db_object, "jurusan", "Kemanusiaan (ksr, humaniora)");
   //  $x_jurusan_sipil_kemanusiaan = $jumlah_jurusan_sipil_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_jurusan_sipil_senior = get_jumlah_sum_atribut($db_object, "jurusan", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_jurusan_sipil_senior = $jumlah_jurusan_sipil_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_jurusan_sipil_mapala = get_jumlah_sum_atribut($db_object, "jurusan", "Pecinta Alam (MAPALA)");
   //  $x_jurusan_sipil_mapala = $jumlah_jurusan_sipil_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_jurusan_sipil_persma = get_jumlah_sum_atribut($db_object, "jurusan", "Persma");
   //  $x_jurusan_sipil_persma = $jumlah_jurusan_sipil_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_jurusan_sipil_bahasa = get_jumlah_sum_atribut($db_object, "jurusan", "Bahasa");
   //  $x_jurusan_sipil_bahasa = $jumlah_jurusan_sipil_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_jurusan_sipil_pramuka = get_jumlah_sum_atribut($db_object, "jurusan", "Pramuka");
   //  $x_jurusan_sipil_pramuka = $jumlah_jurusan_sipil_pramuka/$jumlah_pramuka;
        
   //      if($show_perhitungan){
   //      echo "<br>";
   //      echo "<strong><u>Atribut Jurusan Administrasi Niaga:<br></u></strong>";
   //  echo "X Jurusan Administrasi Niaga Wirausaha=".number_format($x_jurusan_an_wirusaha, dec())."<br>";
   //  echo "X Jurusan Administrasi Niaga Kemanusiaan=".number_format($x_jurusan_an_kemanusiaan, dec())."<br>";
   //      echo "X Jurusan Administrasi Niaga SENIOR=".number_format($x_jurusan_an_senior, dec())."<br>";
   //      echo "X Jurusan Administrasi Niaga MAPALA=".number_format($x_jurusan_an_mapala, dec())."<br>";
   //      echo "X Jurusan Administrasi Niaga Persma=".number_format($x_jurusan_an_persma, dec())."<br>";
   //      echo "X Jurusan Administrasi Niaga Bahasa=".number_format($x_jurusan_an_bahasa, dec())."<br>";
   //      echo "X Jurusan Administrasi Niaga Pramuka=".number_format($x_jurusan_an_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Jurusan Akuntansi:<br></u></strong>";
   //  echo "X Jurusan Akuntansi Wirausaha=".number_format($x_jurusan_ak_wirusaha, dec())."<br>";
   //  echo "X Jurusan Akuntansi Kemanusiaan=".number_format($x_jurusan_ak_kemanusiaan, dec())."<br>";
   //      echo "X Jurusan Akuntansi SENIOR=".number_format($x_jurusan_ak_senior, dec())."<br>";
   //      echo "X Jurusan Akuntansi MAPALA=".number_format($x_jurusan_ak_mapala, dec())."<br>";
   //      echo "X Jurusan Akuntansi Persma=".number_format($x_jurusan_ak_persma, dec())."<br>";
   //      echo "X Jurusan Akuntansi Bahasa=".number_format($x_jurusan_ak_bahasa, dec())."<br>";
   //      echo "X Jurusan Akuntansi Pramuka=".number_format($x_jurusan_ak_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Jurusan Teknik Elektro:<br></u></strong>";
   //  echo "X Jurusan Teknik Elektro Wirausaha=".number_format($x_jurusan_elektro_wirusaha, dec())."<br>";
   //  echo "X Jurusan Teknik Elektro Kemanusiaan=".number_format($x_jurusan_elektro_kemanusiaan, dec())."<br>";
   //      echo "X Jurusan Teknik Elektro SENIOR=".number_format($x_jurusan_elektro_senior, dec())."<br>";
   //      echo "X Jurusan Teknik Elektro MAPALA=".number_format($x_jurusan_elektro_mapala, dec())."<br>";
   //      echo "X Jurusan Teknik Elektro Persma=".number_format($x_jurusan_elektro_persma, dec())."<br>";
   //      echo "X Jurusan Teknik Elektro Bahasa=".number_format($x_jurusan_elektro_bahasa, dec())."<br>";
   //      echo "X Jurusan Teknik Elektro Pramuka=".number_format($x_jurusan_elektro_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Jurusan Teknik Kimia:<br></u></strong>";
   //   echo "X Jurusan Teknik Kimia Wirausaha=".number_format($x_jurusan_kimia_wirusaha, dec())."<br>";
   //  echo "X Jurusan Teknik Kimia Kemanusiaan=".number_format($x_jurusan_kimia_kemanusiaan, dec())."<br>";
   //      echo "X Jurusan Teknik Kimia SENIOR=".number_format($x_jurusan_kimia_senior, dec())."<br>";
   //      echo "X Jurusan Teknik Kimia MAPALA=".number_format($x_jurusan_kimia_mapala, dec())."<br>";
   //      echo "X Jurusan Teknik Kimia Persma=".number_format($x_jurusan_kimia_persma, dec())."<br>";
   //      echo "X Jurusan Teknik Kimia Bahasa=".number_format($x_jurusan_kimia_bahasa, dec())."<br>";
   //      echo "X Jurusan Teknik Kimia Pramuka=".number_format($x_jurusan_kimia_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Jurusan Teknik Mesin:<br></u></strong>";
   //   echo "X Jurusan Teknik Mesin Wirausaha=".number_format($x_jurusan_mesin_wirusaha, dec())."<br>";
   //  echo "X Jurusan Teknik Mesin Kemanusiaan=".number_format($x_jurusan_mesin_kemanusiaan, dec())."<br>";
   //      echo "X Jurusan Teknik Mesin SENIOR=".number_format($x_jurusan_mesin_senior, dec())."<br>";
   //      echo "X Jurusan Teknik Mesin MAPALA=".number_format($x_jurusan_mesin_mapala, dec())."<br>";
   //      echo "X Jurusan Teknik Mesin Persma=".number_format($x_jurusan_mesin_persma, dec())."<br>";
   //      echo "X Jurusan Teknik Mesin Bahasa=".number_format($x_jurusan_mesin_bahasa, dec())."<br>";
   //      echo "X Jurusan Teknik Mesin Pramuka=".number_format($x_jurusan_mesin_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Jurusan Teknik Sipil:<br></u></strong>";
   //   echo "X Jurusan Teknik Sipil Wirausaha=".number_format($x_jurusan_sipil_wirusaha, dec())."<br>";
   //  echo "X Jurusan Teknik Sipil Kemanusiaan=".number_format($x_jurusan_sipil_kemanusiaan, dec())."<br>";
   //      echo "X Jurusan Teknik Sipil SENIOR=".number_format($x_jurusan_sipil_senior, dec())."<br>";
   //      echo "X Jurusan Teknik Sipil MAPALA=".number_format($x_jurusan_sipil_mapala, dec())."<br>";
   //      echo "X Jurusan Teknik Sipil Persma=".number_format($x_jurusan_sipil_persma, dec())."<br>";
   //      echo "X Jurusan Teknik Sipil Bahasa=".number_format($x_jurusan_sipil_bahasa, dec())."<br>";
   //      echo "X Jurusan Teknik Sipil Pramuka=".number_format($x_jurusan_sipil_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //   //S2usia Sanguin
   //  $s2_jurusan_an_wirusaha = get_s2_populasi($db_object, 'jurusan', 'Wirausaha', $x_jurusan_an_wirusaha, $jumlah_wirausaha);
   //  //S2usia Koleris
   //  $s2_jurusan_an_kemanusiaan = get_s2_populasi($db_object, 'jurusan', 'Kemanusiaan (ksr, humaniora)', $x_jurusan_an_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2usia Melankolis
   //  $s2_jurusan_an_senior = get_s2_populasi($db_object, 'jurusan', 'SENIOR (senior, bola, karate, taekwondo)', $x_jurusan_an_senior, $jumlah_senior);
   //      //S2usia Plegmatis
   //  $s2_jurusan_an_mapala = get_s2_populasi($db_object, 'jurusan', 'Pecinta Alam (MAPALA)', $x_jurusan_an_mapala, $jumlah_mapala);

   //  $s2_jurusan_an_persma = get_s2_populasi($db_object, 'jurusan', 'Persma', $x_jurusan_an_persma, $jumlah_persma);
   //  $s2_jurusan_an_bahasa = get_s2_populasi($db_object, 'jurusan', 'Bahasa', $x_jurusan_an_bahasa, $jumlah_bahasa);
   //  $s2_jurusan_an_pramuka = get_s2_populasi($db_object, 'jurusan', 'Pramuka', $x_jurusan_an_pramuka, $jumlah_pramuka);

   //      if($show_perhitungan){
   //  echo "S2 Jurusan Administrasi Niaga Wirausaha=".number_format($s2_jurusan_an_wirusaha, dec())."<br>";
   //  echo "S2 Jurusan Administrasi Niaga Kemanusiaan=".number_format($s2_jurusan_an_kemanusiaan, dec())."<br>";
   //      echo "S2 Jurusan Administrasi Niaga SENIOR=".number_format($s2_jurusan_an_senior, dec())."<br>";
   //      echo "S2 Jurusan Administrasi Niaga MAPALA=".number_format($s2_jurusan_an_mapala, dec())."<br>";
   //      echo "S2 Jurusan Administrasi Niaga Persma=".number_format($s2_jurusan_an_persma, dec())."<br>";
   //      echo "S2 Jurusan Administrasi Niaga Bahasa=".number_format($s2_jurusan_an_bahasa, dec())."<br>";
   //      echo "S2 Jurusan Administrasi Niaga Pramuka=".number_format($s2_jurusan_an_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }
   //  //S jurusan Sanguin
   //  $s_jurusan_an_wirusaha = sqrt($s2_jurusan_an_wirusaha);
   //  //S usia Koleris
   //  $s_jurusan_an_kemanusiaan = sqrt($s2_jurusan_an_kemanusiaan);
   //      //S usia Melankolis
   //  $s_jurusan_an_senior = sqrt($s2_jurusan_an_senior);
   //      //S usia Plegmatis
   //  $s_jurusan_an_mapala = sqrt($s2_jurusan_an_mapala);
   //    //S usia Plegmatis
   //  $s_jurusan_an_persma = sqrt($s2_jurusan_an_persma);
   //    //S usia Plegmatis
   //  $s_jurusan_an_bahasa = sqrt($s2_jurusan_an_bahasa);
   //    //S usia Plegmatis
   //  $s_jurusan_an_pramuka = sqrt($s2_jurusan_an_pramuka);
        
   //      //s2 ^2 usia sanguin
   //      $s2_pangkat2_jurusan_an_wirusaha = pow($s2_jurusan_an_wirusaha, 2);
   //      //s2 ^2 usia koleris
   //      $s2_pangkat2_jurusan_an_kemanusiaan = pow($s2_jurusan_an_kemanusiaan, 2);
   //      //s2 ^2 usia melankolis
   //      $s2_pangkat2_jurusan_an_senior = pow($s2_jurusan_an_senior, 2);
   //      //s2 ^2 usia plegmatis
   //      $s2_pangkat2_jurusan_an_mapala = pow($s2_jurusan_an_mapala, 2);
   //      //s2 ^2 usia plegmatis
   //      $s2_pangkat2_jurusan_an_persma = pow($s2_jurusan_an_persma, 2);
   //      //s2 ^2 usia plegmatis
   //      $s2_pangkat2_jurusan_an_bahasa = pow($s2_jurusan_an_bahasa, 2);
   //      //s2 ^2 usia plegmatis
   //      $s2_pangkat2_jurusan_an_pramuka = pow($s2_jurusan_an_pramuka, 2);
        
   //      if($show_perhitungan){
   //  echo "S Jurusan Administrasi Niaga Wirausaha=".number_format($s_jurusan_an_wirusaha, dec())."<br>";
   //  echo "S Jurusan Administrasi Niaga Kemanusiaan=".number_format($s_jurusan_an_kemanusiaan, dec())."<br>";
   //      echo "S Jurusan Administrasi Niaga SENIOR=".number_format($s_jurusan_an_senior, dec())."<br>";
   //      echo "S Jurusan Administrasi Niaga MAPALA=".number_format($s_jurusan_an_mapala, dec())."<br>";
   //      echo "S Jurusan Administrasi Niaga Persma=".number_format($s_jurusan_an_persma, dec())."<br>";
   //      echo "S Jurusan Administrasi Niaga Bahasa=".number_format($s_jurusan_an_bahasa, dec())."<br>";
   //      echo "S Jurusan Administrasi Niaga Pramuka=".number_format($s_jurusan_an_pramuka, dec())."<br>";
   //      }

   //  //S2usia Sanguin
   //  $s2_jurusan_ak_wirusaha = get_s2_populasi($db_object, 'jurusan', 'Wirausaha', $x_jurusan_ak_wirusaha, $jumlah_wirausaha);
   //  //S2usia Koleris
   //  $s2_jurusan_ak_kemanusiaan = get_s2_populasi($db_object, 'jurusan', 'Kemanusiaan (ksr, humaniora)', $x_jurusan_ak_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2usia Melankolis
   //  $s2_jurusan_ak_senior = get_s2_populasi($db_object, 'jurusan', 'SENIOR (senior, bola, karate, taekwondo)', $x_jurusan_ak_senior, $jumlah_senior);
   //      //S2usia Plegmatis
   //  $s2_jurusan_ak_mapala = get_s2_populasi($db_object, 'jurusan', 'Pecinta Alam (MAPALA)', $x_jurusan_ak_mapala, $jumlah_mapala);

   //  $s2_jurusan_ak_persma = get_s2_populasi($db_object, 'jurusan', 'Persma', $x_jurusan_ak_persma, $jumlah_persma);
   //  $s2_jurusan_ak_bahasa = get_s2_populasi($db_object, 'jurusan', 'Bahasa', $x_jurusan_ak_bahasa, $jumlah_bahasa);
   //  $s2_jurusan_ak_pramuka = get_s2_populasi($db_object, 'jurusan', 'Pramuka', $x_jurusan_ak_pramuka, $jumlah_pramuka);

   //      if($show_perhitungan){
   //  echo "S2 Jurusan Akuntansi Wirausaha=".number_format($s2_jurusan_ak_wirusaha, dec())."<br>";
   //  echo "S2 Jurusan Akuntansi Kemanusiaan=".number_format($s2_jurusan_ak_kemanusiaan, dec())."<br>";
   //      echo "S2 Jurusan Akuntansi SENIOR=".number_format($s2_jurusan_ak_senior, dec())."<br>";
   //      echo "S2 Jurusan Akuntansi MAPALA=".number_format($s2_jurusan_ak_mapala, dec())."<br>";
   //      echo "S2 Jurusan Akuntansi Persma=".number_format($s2_jurusan_ak_persma, dec())."<br>";
   //      echo "S2 Jurusan Akuntansi Bahasa=".number_format($s2_jurusan_ak_bahasa, dec())."<br>";
   //      echo "S2 Jurusan Akuntansi Pramuka=".number_format($s2_jurusan_ak_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //        //S jurusan Sanguin
   //  $s_jurusan_ak_wirusaha = sqrt($s2_jurusan_ak_wirusaha);
   //  //S usia Koleris
   //  $s_jurusan_ak_kemanusiaan = sqrt($s2_jurusan_ak_kemanusiaan);
   //      //S usia Melankolis
   //  $s_jurusan_ak_senior = sqrt($s2_jurusan_ak_senior);
   //      //S usia Plegmatis
   //  $s_jurusan_ak_mapala = sqrt($s2_jurusan_ak_mapala);
   //    //S usia Plegmatis
   //  $s_jurusan_ak_persma = sqrt($s2_jurusan_ak_persma);
   //    //S usia Plegmatis
   //  $s_jurusan_ak_bahasa = sqrt($s2_jurusan_ak_bahasa);
   //    //S usia Plegmatis
   //  $s_jurusan_ak_pramuka = sqrt($s2_jurusan_ak_pramuka);
        
   //      //s2 ^2 usia sanguin
   //      $s2_pangkat2_jurusan_ak_wirusaha = pow($s2_jurusan_ak_wirusaha, 2);
   //      //s2 ^2 usia koleris
   //      $s2_pangkat2_jurusan_ak_kemanusiaan = pow($s2_jurusan_ak_kemanusiaan, 2);
   //      //s2 ^2 usia melankolis
   //      $s2_pangkat2_jurusan_ak_senior = pow($s2_jurusan_ak_senior, 2);
   //      //s2 ^2 usia plegmatis
   //      $s2_pangkat2_jurusan_ak_mapala = pow($s2_jurusan_ak_mapala, 2);
   //      //s2 ^2 usia plegmatis
   //      $s2_pangkat2_jurusan_ak_persma = pow($s2_jurusan_ak_persma, 2);
   //      //s2 ^2 usia plegmatis
   //      $s2_pangkat2_jurusan_ak_bahasa = pow($s2_jurusan_ak_bahasa, 2);
   //      //s2 ^2 usia plegmatis
   //      $s2_pangkat2_jurusan_ak_pramuka = pow($s2_jurusan_ak_pramuka, 2);
        
   //      if($show_perhitungan){
   //  echo "S Jurusan Akuntansi Wirausaha=".number_format($s_jurusan_ak_wirusaha, dec())."<br>";
   //  echo "S Jurusan Akuntansi Kemanusiaan=".number_format($s_jurusan_ak_kemanusiaan, dec())."<br>";
   //      echo "S Jurusan Akuntansi SENIOR=".number_format($s_jurusan_ak_senior, dec())."<br>";
   //      echo "S Jurusan Akuntansi MAPALA=".number_format($s_jurusan_ak_mapala, dec())."<br>";
   //      echo "S Jurusan Akuntansi Persma=".number_format($s_jurusan_ak_persma, dec())."<br>";
   //      echo "S Jurusan Akuntansi Bahasa=".number_format($s_jurusan_ak_bahasa, dec())."<br>";
   //      echo "S Jurusan Akuntansi Pramuka=".number_format($s_jurusan_ak_pramuka, dec())."<br>";
   //      }

   //      //S2usia Sanguin
   //  $s2_jurusan_elektro_wirusaha = get_s2_populasi($db_object, 'jurusan', 'Wirausaha', $x_jurusan_elektro_wirusaha, $jumlah_wirausaha);
   //  //S2usia Koleris
   //  $s2_jurusan_elektro_kemanusiaan = get_s2_populasi($db_object, 'jurusan', 'Kemanusiaan (ksr, humaniora)', $x_jurusan_elektro_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2usia Melankolis
   //  $s2_jurusan_elektro_senior = get_s2_populasi($db_object, 'jurusan', 'SENIOR (senior, bola, karate, taekwondo)', $x_jurusan_elektro_senior, $jumlah_senior);
   //      //S2usia Plegmatis
   //  $s2_jurusan_elektro_mapala = get_s2_populasi($db_object, 'jurusan', 'Pecinta Alam (MAPALA)', $x_jurusan_elektro_mapala, $jumlah_mapala);

   //  $s2_jurusan_elektro_persma = get_s2_populasi($db_object, 'jurusan', 'Persma', $x_jurusan_elektro_persma, $jumlah_persma);
   //  $s2_jurusan_elektro_bahasa = get_s2_populasi($db_object, 'jurusan', 'Bahasa', $x_jurusan_elektro_bahasa, $jumlah_bahasa);
   //  $s2_jurusan_elektro_pramuka = get_s2_populasi($db_object, 'jurusan', 'Pramuka', $x_jurusan_elektro_pramuka, $jumlah_pramuka);

   //      if($show_perhitungan){
   //  echo "S2 Jurusan Teknik Elektro Wirausaha=".number_format($s2_jurusan_elektro_wirusaha, dec())."<br>";
   //  echo "S2 Jurusan Teknik Elektro Kemanusiaan=".number_format($s2_jurusan_elektro_kemanusiaan, dec())."<br>";
   //      echo "S2 Jurusan Teknik Elektro SENIOR=".number_format($s2_jurusan_elektro_senior, dec())."<br>";
   //      echo "S2 Jurusan Teknik Elektro MAPALA=".number_format($s2_jurusan_elektro_mapala, dec())."<br>";
   //      echo "S2 Jurusan Teknik Elektro Persma=".number_format($s2_jurusan_elektro_persma, dec())."<br>";
   //      echo "S2 Jurusan Teknik Elektro Bahasa=".number_format($s2_jurusan_elektro_bahasa, dec())."<br>";
   //      echo "S2 Jurusan Teknik Elektro Pramuka=".number_format($s2_jurusan_elektro_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //      //S jurusan Sanguin
   //  $s_jurusan_elektro_wirusaha = sqrt($s2_jurusan_elektro_wirusaha);
   //  //S usia Koleris
   //  $s_jurusan_elektro_kemanusiaan = sqrt($s2_jurusan_elektro_kemanusiaan);
   //      //S usia Melankolis
   //  $s_jurusan_elektro_senior = sqrt($s2_jurusan_elektro_senior);
   //      //S usia Plegmatis
   //  $s_jurusan_elektro_mapala = sqrt($s2_jurusan_elektro_mapala);
   //    //S usia Plegmatis
   //  $s_jurusan_elektro_persma = sqrt($s2_jurusan_elektro_persma);
   //    //S usia Plegmatis
   //  $s_jurusan_elektro_bahasa = sqrt($s2_jurusan_elektro_bahasa);
   //    //S usia Plegmatis
   //  $s_jurusan_elektro_pramuka = sqrt($s2_jurusan_elektro_pramuka);
        
   //      //s2 ^2 usia sanguin
   //      $s2_pangkat2_jurusan_elektro_wirusaha = pow($s2_jurusan_elektro_wirusaha, 2);
   //      //s2 ^2 usia koleris
   //      $s2_pangkat2_jurusan_elektro_kemanusiaan = pow($s2_jurusan_elektro_kemanusiaan, 2);
   //      //s2 ^2 usia melankolis
   //      $s2_pangkat2_jurusan_elektro_senior = pow($s2_jurusan_elektro_senior, 2);
   //      //s2 ^2 usia plegmatis
   //      $s2_pangkat2_jurusan_elektro_mapala = pow($s2_jurusan_elektro_mapala, 2);
   //      //s2 ^2 usia plegmatis
   //      $s2_pangkat2_jurusan_elektro_persma = pow($s2_jurusan_elektro_persma, 2);
   //      //s2 ^2 usia plegmatis
   //      $s2_pangkat2_jurusan_elektro_bahasa = pow($s2_jurusan_elektro_bahasa, 2);
   //      //s2 ^2 usia plegmatis
   //      $s2_pangkat2_jurusan_elektro_pramuka = pow($s2_jurusan_elektro_pramuka, 2);
        
   //      if($show_perhitungan){
   //  echo "S Jurusan Teknik Elektro Wirausaha=".number_format($s_jurusan_elektro_wirusaha, dec())."<br>";
   //  echo "S Jurusan Teknik Elektro Kemanusiaan=".number_format($s_jurusan_elektro_kemanusiaan, dec())."<br>";
   //      echo "S Jurusan Teknik Elektro SENIOR=".number_format($s_jurusan_elektro_senior, dec())."<br>";
   //      echo "S Jurusan Teknik Elektro MAPALA=".number_format($s_jurusan_elektro_mapala, dec())."<br>";
   //      echo "S Jurusan Teknik Elektro Persma=".number_format($s_jurusan_elektro_persma, dec())."<br>";
   //      echo "S Jurusan Teknik Elektro Bahasa=".number_format($s_jurusan_elektro_bahasa, dec())."<br>";
   //      echo "S Jurusan Teknik Elektro Pramuka=".number_format($s_jurusan_elektro_pramuka, dec())."<br>";
   //      }

   //         //S2usia Sanguin
   //  $s2_jurusan_kimia_wirusaha = get_s2_populasi($db_object, 'jurusan', 'Wirausaha', $x_jurusan_kimia_wirusaha, $jumlah_wirausaha);
   //  //S2usia Koleris
   //  $s2_jurusan_kimia_kemanusiaan = get_s2_populasi($db_object, 'jurusan', 'Kemanusiaan (ksr, humaniora)', $x_jurusan_kimia_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2usia Melankolis
   //  $s2_jurusan_kimia_senior = get_s2_populasi($db_object, 'jurusan', 'SENIOR (senior, bola, karate, taekwondo)', $x_jurusan_kimia_senior, $jumlah_senior);
   //      //S2usia Plegmatis
   //  $s2_jurusan_kimia_mapala = get_s2_populasi($db_object, 'jurusan', 'Pecinta Alam (MAPALA)', $x_jurusan_kimia_mapala, $jumlah_mapala);

   //  $s2_jurusan_kimia_persma = get_s2_populasi($db_object, 'jurusan', 'Persma', $x_jurusan_kimia_persma, $jumlah_persma);
   //  $s2_jurusan_kimia_bahasa = get_s2_populasi($db_object, 'jurusan', 'Bahasa', $x_jurusan_kimia_bahasa, $jumlah_bahasa);
   //  $s2_jurusan_kimia_pramuka = get_s2_populasi($db_object, 'jurusan', 'Pramuka', $x_jurusan_kimia_pramuka, $jumlah_pramuka);

   //      if($show_perhitungan){
   //  echo "S2 Jurusan Teknik Kimia Wirausaha=".number_format($s2_jurusan_kimia_wirusaha, dec())."<br>";
   //  echo "S2 Jurusan Teknik Kimia Kemanusiaan=".number_format($s2_jurusan_kimia_kemanusiaan, dec())."<br>";
   //      echo "S2 Jurusan Teknik Kimia SENIOR=".number_format($s2_jurusan_kimia_senior, dec())."<br>";
   //      echo "S2 Jurusan Teknik Kimia MAPALA=".number_format($s2_jurusan_kimia_mapala, dec())."<br>";
   //      echo "S2 Jurusan Teknik Kimia Persma=".number_format($s2_jurusan_kimia_persma, dec())."<br>";
   //      echo "S2 Jurusan Teknik Kimia Bahasa=".number_format($s2_jurusan_kimia_bahasa, dec())."<br>";
   //      echo "S2 Jurusan Teknik Kimia Pramuka=".number_format($s2_jurusan_kimia_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //        //S jurusan Sanguin
   //  $s_jurusan_kimia_wirusaha = sqrt($s2_jurusan_kimia_wirusaha);
   //  //S usia Koleris
   //  $s_jurusan_kimia_kemanusiaan = sqrt($s2_jurusan_kimia_kemanusiaan);
   //      //S usia Melankolis
   //  $s_jurusan_kimia_senior = sqrt($s2_jurusan_kimia_senior);
   //      //S usia Plegmatis
   //  $s_jurusan_kimia_mapala = sqrt($s2_jurusan_kimia_mapala);
   //    //S usia Plegmatis
   //  $s_jurusan_kimia_persma = sqrt($s2_jurusan_kimia_persma);
   //    //S usia Plegmatis
   //  $s_jurusan_kimia_bahasa = sqrt($s2_jurusan_kimia_bahasa);
   //    //S usia Plegmatis
   //  $s_jurusan_kimia_pramuka = sqrt($s2_jurusan_kimia_pramuka);
        
   //      //s2 ^2 usia sanguin
   //      $s2_pangkat2_jurusan_kimia_wirusaha = pow($s2_jurusan_kimia_wirusaha, 2);
   //      //s2 ^2 usia koleris
   //      $s2_pangkat2_jurusan_kimia_kemanusiaan = pow($s2_jurusan_kimia_kemanusiaan, 2);
   //      //s2 ^2 usia melankolis
   //      $s2_pangkat2_jurusan_kimia_senior = pow($s2_jurusan_kimia_senior, 2);
   //      //s2 ^2 usia plegmatis
   //      $s2_pangkat2_jurusan_kimia_mapala = pow($s2_jurusan_kimia_mapala, 2);
   //      //s2 ^2 usia plegmatis
   //      $s2_pangkat2_jurusan_kimia_persma = pow($s2_jurusan_kimia_persma, 2);
   //      //s2 ^2 usia plegmatis
   //      $s2_pangkat2_jurusan_kimia_bahasa = pow($s2_jurusan_kimia_bahasa, 2);
   //      //s2 ^2 usia plegmatis
   //      $s2_pangkat2_jurusan_kimia_pramuka = pow($s2_jurusan_kimia_pramuka, 2);
        
   //      if($show_perhitungan){
   //  echo "S Jurusan Teknik Kimia Wirausaha=".number_format($s_jurusan_kimia_wirusaha, dec())."<br>";
   //  echo "S Jurusan Teknik Kimia Kemanusiaan=".number_format($s_jurusan_kimia_kemanusiaan, dec())."<br>";
   //      echo "S Jurusan Teknik Kimia SENIOR=".number_format($s_jurusan_kimia_senior, dec())."<br>";
   //      echo "S Jurusan Teknik Kimia MAPALA=".number_format($s_jurusan_kimia_mapala, dec())."<br>";
   //      echo "S Jurusan Teknik Kimia Persma=".number_format($s_jurusan_kimia_persma, dec())."<br>";
   //      echo "S Jurusan Teknik Kimia Bahasa=".number_format($s_jurusan_kimia_bahasa, dec())."<br>";
   //      echo "S Jurusan Teknik Kimia Pramuka=".number_format($s_jurusan_kimia_pramuka, dec())."<br>";
   //      }

   //           //S2usia Sanguin
   //  $s2_jurusan_mesin_wirusaha = get_s2_populasi($db_object, 'jurusan', 'Wirausaha', $x_jurusan_mesin_wirusaha, $jumlah_wirausaha);
   //  //S2usia Koleris
   //  $s2_jurusan_mesin_kemanusiaan = get_s2_populasi($db_object, 'jurusan', 'Kemanusiaan (ksr, humaniora)', $x_jurusan_mesin_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2usia Melankolis
   //  $s2_jurusan_mesin_senior = get_s2_populasi($db_object, 'jurusan', 'SENIOR (senior, bola, karate, taekwondo)', $x_jurusan_mesin_senior, $jumlah_senior);
   //      //S2usia Plegmatis
   //  $s2_jurusan_mesin_mapala = get_s2_populasi($db_object, 'jurusan', 'Pecinta Alam (MAPALA)', $x_jurusan_mesin_mapala, $jumlah_mapala);

   //  $s2_jurusan_mesin_persma = get_s2_populasi($db_object, 'jurusan', 'Persma', $x_jurusan_mesin_persma, $jumlah_persma);
   //  $s2_jurusan_mesin_bahasa = get_s2_populasi($db_object, 'jurusan', 'Bahasa', $x_jurusan_mesin_bahasa, $jumlah_bahasa);
   //  $s2_jurusan_mesin_pramuka = get_s2_populasi($db_object, 'jurusan', 'Pramuka', $x_jurusan_mesin_pramuka, $jumlah_pramuka);

   //      if($show_perhitungan){
   //  echo "S2 Jurusan Teknik Mesin Wirausaha=".number_format($s2_jurusan_mesin_wirusaha, dec())."<br>";
   //  echo "S2 Jurusan Teknik Mesin Kemanusiaan=".number_format($s2_jurusan_mesin_kemanusiaan, dec())."<br>";
   //      echo "S2 Jurusan Teknik Mesin SENIOR=".number_format($s2_jurusan_mesin_senior, dec())."<br>";
   //      echo "S2 Jurusan Teknik Mesin MAPALA=".number_format($s2_jurusan_mesin_mapala, dec())."<br>";
   //      echo "S2 Jurusan Teknik Mesin Persma=".number_format($s2_jurusan_mesin_persma, dec())."<br>";
   //      echo "S2 Jurusan Teknik Mesin Bahasa=".number_format($s2_jurusan_mesin_bahasa, dec())."<br>";
   //      echo "S2 Jurusan Teknik Mesin Pramuka=".number_format($s2_jurusan_mesin_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //        //S jurusan Sanguin
   //  $s_jurusan_mesin_wirusaha = sqrt($s2_jurusan_mesin_wirusaha);
   //  //S usia Koleris
   //  $s_jurusan_mesin_kemanusiaan = sqrt($s2_jurusan_mesin_kemanusiaan);
   //      //S usia Melankolis
   //  $s_jurusan_mesin_senior = sqrt($s2_jurusan_mesin_senior);
   //      //S usia Plegmatis
   //  $s_jurusan_mesin_mapala = sqrt($s2_jurusan_mesin_mapala);
   //    //S usia Plegmatis
   //  $s_jurusan_mesin_persma = sqrt($s2_jurusan_mesin_persma);
   //    //S usia Plegmatis
   //  $s_jurusan_mesin_bahasa = sqrt($s2_jurusan_mesin_bahasa);
   //    //S usia Plegmatis
   //  $s_jurusan_mesin_pramuka = sqrt($s2_jurusan_mesin_pramuka);
        
   //      //s2 ^2 usia sanguin
   //      $s2_pangkat2_jurusan_mesin_wirusaha = pow($s2_jurusan_mesin_wirusaha, 2);
   //      //s2 ^2 usia koleris
   //      $s2_pangkat2_jurusan_mesin_kemanusiaan = pow($s2_jurusan_mesin_kemanusiaan, 2);
   //      //s2 ^2 usia melankolis
   //      $s2_pangkat2_jurusan_mesin_senior = pow($s2_jurusan_mesin_senior, 2);
   //      //s2 ^2 usia plegmatis
   //      $s2_pangkat2_jurusan_mesin_mapala = pow($s2_jurusan_mesin_mapala, 2);
   //      //s2 ^2 usia plegmatis
   //      $s2_pangkat2_jurusan_mesin_persma = pow($s2_jurusan_mesin_persma, 2);
   //      //s2 ^2 usia plegmatis
   //      $s2_pangkat2_jurusan_mesin_bahasa = pow($s2_jurusan_mesin_bahasa, 2);
   //      //s2 ^2 usia plegmatis
   //      $s2_pangkat2_jurusan_mesin_pramuka = pow($s2_jurusan_mesin_pramuka, 2);
        
   //      if($show_perhitungan){
   //  echo "S Jurusan Teknik Mesin Wirausaha=".number_format($s_jurusan_mesin_wirusaha, dec())."<br>";
   //  echo "S Jurusan Teknik Mesin Kemanusiaan=".number_format($s_jurusan_mesin_kemanusiaan, dec())."<br>";
   //      echo "S Jurusan Teknik Mesin SENIOR=".number_format($s_jurusan_mesin_senior, dec())."<br>";
   //      echo "S Jurusan Teknik Mesin MAPALA=".number_format($s_jurusan_mesin_mapala, dec())."<br>";
   //      echo "S Jurusan Teknik Mesin Persma=".number_format($s_jurusan_mesin_persma, dec())."<br>";
   //      echo "S Jurusan Teknik Mesin Bahasa=".number_format($s_jurusan_mesin_bahasa, dec())."<br>";
   //      echo "S Jurusan Teknik Mesin Pramuka=".number_format($s_jurusan_mesin_pramuka, dec())."<br>";
   //      }

   // $s2_jurusan_sipil_wirusaha = get_s2_populasi($db_object, 'jurusan', 'Wirausaha', $x_jurusan_sipil_wirusaha, $jumlah_wirausaha);
   //  //S2usia Koleris
   //  $s2_jurusan_sipil_kemanusiaan = get_s2_populasi($db_object, 'jurusan', 'Kemanusiaan (ksr, humaniora)', $x_jurusan_sipilkemanusiaan, $jumlah_kemanusiaan);
   //      //S2usia Melankolis
   //  $s2_jurusan_sipil_senior = get_s2_populasi($db_object, 'jurusan', 'SENIOR (senior, bola, karate, taekwondo)', $x_jurusan_sipil_senior, $jumlah_senior);
   //      //S2usia Plegmatis
   //  $s2_jurusan_sipil_mapala = get_s2_populasi($db_object, 'jurusan', 'Pecinta Alam (MAPALA)', $x_jurusan_sipil_mapala, $jumlah_mapala);

   //  $s2_jurusan_sipil_persma = get_s2_populasi($db_object, 'jurusan', 'Persma', $x_jurusan_sipil_persma, $jumlah_persma);
   //  $s2_jurusan_sipil_bahasa = get_s2_populasi($db_object, 'jurusan', 'Bahasa', $x_jurusan_sipil_bahasa, $jumlah_bahasa);
   //  $s2_jurusan_sipil_pramuka = get_s2_populasi($db_object, 'jurusan', 'Pramuka', $x_jurusan_sipil_pramuka, $jumlah_pramuka);

   //      if($show_perhitungan){
   //  echo "S2 Jurusan Teknik Sipil Wirausaha=".number_format($s2_jurusan_sipil_wirusaha, dec())."<br>";
   //  echo "S2 Jurusan Teknik Sipil Kemanusiaan=".number_format($s2_jurusan_sipil_kemanusiaan, dec())."<br>";
   //      echo "S2 Jurusan Teknik Sipil SENIOR=".number_format($s2_jurusan_sipil_senior, dec())."<br>";
   //      echo "S2 Jurusan Teknik Sipil MAPALA=".number_format($s2_jurusan_sipil_mapala, dec())."<br>";
   //      echo "S2 Jurusan Teknik Sipil Persma=".number_format($s2_jurusan_sipil_persma, dec())."<br>";
   //      echo "S2 Jurusan Teknik Sipil Bahasa=".number_format($s2_jurusan_sipil_bahasa, dec())."<br>";
   //      echo "S2 Jurusan Teknik Sipil Pramuka=".number_format($s2_jurusan_sipil_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //       //S jurusan Sanguin
   //  $s_jurusan_sipil_wirusaha = sqrt($s2_jurusan_sipil_wirusaha);
   //  //S usia Koleris
   //  $s_jurusan_sipil_kemanusiaan = sqrt($s2_jurusan_sipil_kemanusiaan);
   //      //S usia Melankolis
   //  $s_jurusan_sipil_senior = sqrt($s2_jurusan_sipil_senior);
   //      //S usia Plegmatis
   //  $s_jurusan_sipil_mapala = sqrt($s2_jurusan_sipil_mapala);
   //    //S usia Plegmatis
   //  $s_jurusan_sipil_persma = sqrt($s2_jurusan_sipil_persma);
   //    //S usia Plegmatis
   //  $s_jurusan_sipil_bahasa = sqrt($s2_jurusan_sipil_bahasa);
   //    //S usia Plegmatis
   //  $s_jurusan_sipil_pramuka = sqrt($s2_jurusan_sipil_pramuka);
        
   //      //s2 ^2 usia sanguin
   //      $s2_pangkat2_jurusan_sipil_wirusaha = pow($s2_jurusan_sipil_wirusaha, 2);
   //      //s2 ^2 usia koleris
   //      $s2_pangkat2_jurusan_sipil_kemanusiaan = pow($s2_jurusan_sipil_kemanusiaan, 2);
   //      //s2 ^2 usia melankolis
   //      $s2_pangkat2_jurusan_sipil_senior = pow($s2_jurusan_sipil_senior, 2);
   //      //s2 ^2 usia plegmatis
   //      $s2_pangkat2_jurusan_sipil_mapala = pow($s2_jurusan_sipil_mapala, 2);
   //      //s2 ^2 usia plegmatis
   //      $s2_pangkat2_jurusan_sipil_persma = pow($s2_jurusan_sipil_persma, 2);
   //      //s2 ^2 usia plegmatis
   //      $s2_pangkat2_jurusan_sipil_bahasa = pow($s2_jurusan_sipil_bahasa, 2);
   //      //s2 ^2 usia plegmatis
   //      $s2_pangkat2_jurusan_sipil_pramuka = pow($s2_jurusan_sipil_pramuka, 2);
        
   //      if($show_perhitungan){
   //  echo "S Jurusan Teknik Sipil Wirausaha=".number_format($s_jurusan_sipil_wirusaha, dec())."<br>";
   //  echo "S Jurusan Teknik Sipil Kemanusiaan=".number_format($s_jurusan_sipil_kemanusiaan, dec())."<br>";
   //      echo "S Jurusan Teknik Sipil SENIOR=".number_format($s_jurusan_sipil_senior, dec())."<br>";
   //      echo "S Jurusan Teknik Sipil MAPALA=".number_format($s_jurusan_sipil_mapala, dec())."<br>";
   //      echo "S Jurusan Teknik Sipil Persma=".number_format($s_jurusan_sipil_persma, dec())."<br>";
   //      echo "S Jurusan Teknik Sipil Bahasa=".number_format($s_jurusan_mesin_bahasa, dec())."<br>";
   //      echo "S Jurusan Teknik Sipil Pramuka=".number_format($s_jurusan_mesin_pramuka, dec())."<br>";
   //      }

   //      //======================================================================
   //     //xprodi
   //  $jumlah_prodi_ab3_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_ab3_wirausaha = $jumlah_prodi_ab3_wirausaha/$jumlah_wirausaha;
   //  //xprodi wirausaha
   //  $jumlah_prodi_ab3_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_ab3_kemanusiaan = $jumlah_prodi_ab3_wirausaha/$jumlah_kemanusiaan;
   //    //xprodi kemanusiaan
   //  $jumlah_prodi_ab3_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_ab3_senior = $jumlah_prodi_ab3_senior/$jumlah_senior;
   //      //xprodi  
   //  $jumlah_prodi_ab3_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_ab3_mapala = $jumlah_prodi_ab3_mapala/$jumlah_mapala;
   //    //xprodi
   //  $jumlah_prodi_ab3_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_ab3_persma = $jumlah_prodi_ab3_persma/$jumlah_persma;
   //   //xprodi
   //  $jumlah_prodi_ab3_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_ab3_bahasa = $jumlah_prodi_ab3_bahasa/$jumlah_bahasa;
   //    //xprodi
   //  $jumlah_prodi_ab3_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_ab3_pramuka = $jumlah_prodi_ab3_pramuka/$jumlah_pramuka;

   // //xprodi
   //  $jumlah_prodi_ak3_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_ak3_wirausaha = $jumlah_prodi_ak3_wirausaha/$jumlah_wirausaha;
   // //xprodi
   //  $jumlah_prodi_ak3_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_ak3_kemanusiaan = $jumlah_prodi_ak3_kemanusiaan/$jumlah_kemanusiaan;
   //      //xprodi
   //  $jumlah_prodi_ak3_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_ak3_senior = $jumlah_prodi_ak3_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_ak3_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_ak3_mapala = $jumlah_prodi_ak3_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_ak3_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_ak3_persma = $jumlah_prodi_ak3_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_ak3_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_ak3_bahasa = $jumlah_prodi_ak3_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_ak3_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_ak3_pramuka = $jumlah_prodi_ak3_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_prodi_ank_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_ank_wirausaha = $jumlah_prodi_ank_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_prodi_ank_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_ank_kemanusiaan = $jumlah_prodi_ank_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_prodi_ank_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_ank_senior = $jumlah_prodi_ank_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_ank_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_ank_mapala = $jumlah_prodi_ank_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_ank_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_ank_persma = $jumlah_prodi_ank_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_ank_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_ank_bahasa = $jumlah_prodi_ank_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_ank_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_ank_pramuka = $jumlah_prodi_ank_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_prodi_te_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_te_wirausaha = $jumlah_prodi_te_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_prodi_te_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_te_kemanusiaan = $jumlah_prodi_te_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_prodi_te_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_te_senior = $jumlah_prodi_te_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_te_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_te_mapala = $jumlah_prodi_te_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_te_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_te_persma = $jumlah_prodi_te_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_te_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_te_bahasa = $jumlah_prodi_te_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_te_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_te_pramuka = $jumlah_prodi_te_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_prodi_tk3_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_tk3_wirausaha = $jumlah_prodi_tk3_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_prodi_tk3_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_tk3_kemanusiaan = $jumlah_prodi_tk3_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_prodi_tk3_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_tk3_senior = $jumlah_prodi_tk3_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_tk3_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_tk3_mapala = $jumlah_prodi_tk3_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tk3_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_tk3_persma = $jumlah_prodi_tk3_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tk3_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_tk3_bahasa = $jumlah_prodi_tk3_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tk3_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_tk3_pramuka = $jumlah_prodi_tk3_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_prodi_tkm_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_tkm_wirausaha = $jumlah_prodi_tkm_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_prodi_tkm_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_tkm_kemanusiaan = $jumlah_prodi_tkm_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_prodi_tkm_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_tkm_senior = $jumlah_prodi_tkm_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_tkm_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_tkm_mapala = $jumlah_prodi_tkm_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tkm_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_tkm_persma = $jumlah_prodi_tkm_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tkm_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_tkm_bahasa = $jumlah_prodi_tkm_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tkm_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_tkm_pramuka = $jumlah_prodi_tkm_pramuka/$jumlah_pramuka;

   //   //xusia sanguin
   //  $jumlah_prodi_tks3_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_tks3_wirausaha = $jumlah_prodi_tks3_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_prodi_tks3_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_tks3_kemanusiaan = $jumlah_prodi_tks3_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_prodi_tks3_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_tks3_senior = $jumlah_prodi_tks3_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_tks3_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_tks3_mapala = $jumlah_prodi_tks3_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tks3_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_tks3_persma = $jumlah_prodi_tks3_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tks3_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_tks3_bahasa = $jumlah_prodi_tks3_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tks3_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_tks3_pramuka = $jumlah_prodi_tks3_pramuka/$jumlah_pramuka;

   //   //xusia sanguin
   //  $jumlah_prodi_tkg_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_tkg_wirausaha = $jumlah_prodi_tkg_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_prodi_tkg_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_tkg_kemanusiaan = $jumlah_prodi_tkg_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_prodi_tkg_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_tkg_senior = $jumlah_prodi_tkg_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_tkg_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_tkg_mapala = $jumlah_prodi_tkg_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tkg_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_tkg_persma = $jumlah_prodi_tkg_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tkg_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_tkg_bahasa = $jumlah_prodi_tkg_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tkg_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_tkg_pramuka = $jumlah_prodi_tkg_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_prodi_tkjj_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_tkjj_wirausaha = $jumlah_prodi_tkjj_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_prodi_tkjj_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_tkjj_kemanusiaan = $jumlah_prodi_tkjj_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_prodi_tkjj_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_tkjj_senior = $jumlah_prodi_tkjj_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_tkjj_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_tkjj_mapala = $jumlah_prodi_tkjj_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tkjj_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_tkjj_persma = $jumlah_prodi_tkjj_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tkjj_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_tkjj_bahasa = $jumlah_prodi_tkjj_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tkjj_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_tkjj_pramuka = $jumlah_prodi_tkjj_pramuka/$jumlah_pramuka;
        
   //  //xusia sanguin
   //  $jumlah_prodi_tke_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_tke_wirausaha = $jumlah_prodi_tke_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_prodi_tke_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_tke_kemanusiaan = $jumlah_prodi_tke_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_prodi_tke_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_tke_senior = $jumlah_prodi_tke_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_tke_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_tke_mapala = $jumlah_prodi_tke_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tke_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_tke_persma = $jumlah_prodi_tke_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tke_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_tke_bahasa = $jumlah_prodi_tke_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tke_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_tke_pramuka = $jumlah_prodi_tke_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_prodi_tl3_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_tl3_wirausaha = $jumlah_prodi_tl3_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_prodi_tl3_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_tl3_kemanusiaan = $jumlah_prodi_tl3_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_prodi_tl3_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_tl3_senior = $jumlah_prodi_tl3_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_tl3_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_tl3_mapala = $jumlah_prodi_tl3_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tl3_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_tl3_persma = $jumlah_prodi_tl3_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tl3_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_tl3_bahasa = $jumlah_prodi_tl3_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tl3_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_tl3_pramuka = $jumlah_prodi_tl3_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_prodi_tmk3_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_tmk3_wirausaha = $jumlah_prodi_tmk3_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_prodi_tmk3_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_tmk3_kemanusiaan = $jumlah_prodi_tmk3_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_prodi_tmk3_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_tmk3_senior = $jumlah_prodi_tmk3_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_tmk3_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_tmk3_mapala = $jumlah_prodi_tmk3_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tmk3_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_tmk3_persma = $jumlah_prodi_tmk3_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tmk3_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_tmk3_bahasa = $jumlah_prodi_tmk3_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tmk3_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_tmk3_pramuka = $jumlah_prodi_tmk3_pramuka/$jumlah_pramuka;

   //   //xusia sanguin
   //  $jumlah_prodi_tm_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_tm_wirausaha = $jumlah_prodi_tm_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_prodi_tm_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_tm_kemanusiaan = $jumlah_prodi_tm_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_prodi_tm_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_tm_senior = $jumlah_prodi_tm_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_tm_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_tm_mapala = $jumlah_prodi_tm_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tm_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_tm_persma = $jumlah_prodi_tm_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tm_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_tm_bahasa = $jumlah_prodi_tm_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tm_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_tm_pramuka = $jumlah_prodi_tm_pramuka/$jumlah_pramuka;
        
   //  //xusia sanguin
   //  $jumlah_prodi_to_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_to_wirausaha = $jumlah_prodi_to_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_prodi_to_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_to_kemanusiaan = $jumlah_prodi_to_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_prodi_to_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_to_senior = $jumlah_prodi_to_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_to_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_to_mapala = $jumlah_prodi_to_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_to_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_to_persma = $jumlah_prodi_to_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_to_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_to_bahasa = $jumlah_prodi_to_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_to_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_to_pramuka = $jumlah_prodi_to_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_prodi_tpab_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_tpab_wirausaha = $jumlah_prodi_tpab_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_prodi_tpab_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_tpab_kemanusiaan = $jumlah_prodi_tpab_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_prodi_tpab_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_tpab_senior = $jumlah_prodi_tpab_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_tpab_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_tpab_mapala = $jumlah_prodi_tpab_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tpab_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_tpab_persma = $jumlah_prodi_tpab_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tpab_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_tpab_bahasa = $jumlah_prodi_tpab_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tpab_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_tpab_pramuka = $jumlah_prodi_tpab_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_prodi_ts_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_ts_wirausaha = $jumlah_prodi_ts_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_prodi_ts_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_ts_kemanusiaan = $jumlah_prodi_ts_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_prodi_ts_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_ts_senior = $jumlah_prodi_ts_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_ts_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_ts_mapala = $jumlah_prodi_ts_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_ts_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_ts_persma = $jumlah_prodi_ts_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_ts_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_ts_bahasa = $jumlah_prodi_ts_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_ts_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_ts_pramuka = $jumlah_prodi_ts_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_prodi_ttl_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_ttl_wirausaha = $jumlah_prodi_ttl_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_prodi_ttl_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_ttl_kemanusiaan = $jumlah_prodi_ttl_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_prodi_ttl_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_ttl_senior = $jumlah_prodi_ttl_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_ttl_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_ttl_mapala = $jumlah_prodi_ttl_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_ttl_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_ttl_persma = $jumlah_prodi_ttl_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_ttl_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_ttl_bahasa = $jumlah_prodi_ttl_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_ttl_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_ttl_pramuka = $jumlah_prodi_ttl_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_prodi_ab4_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_ab4_wirausaha = $jumlah_prodi_ab4_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_prodi_ab4_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_ab4_kemanusiaan = $jumlah_prodi_ab4_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_prodi_ab4_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_ab4_senior = $jumlah_prodi_ab4_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_ab4_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_ab4_mapala = $jumlah_prodi_ab4_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_ab4_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_ab4_persma = $jumlah_prodi_ab4_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_ab4_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_ab4_bahasa = $jumlah_prodi_ab4_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_ab4_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_ab4_pramuka = $jumlah_prodi_ab4_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_prodi_akm_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_akm_wirausaha = $jumlah_prodi_akm_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_prodi_akm_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_akm_kemanusiaan = $jumlah_prodi_akm_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_prodi_akm_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_akm_senior = $jumlah_prodi_akm_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_akm_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_akm_mapala = $jumlah_prodi_akm_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_akm_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_akm_persma = $jumlah_prodi_akm_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_akm_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_akm_bahasa = $jumlah_prodi_akm_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_akm_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_akm_pramuka = $jumlah_prodi_akm_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_prodi_tk4_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_tk4_wirausaha = $jumlah_prodi_tk4_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_prodi_tk4_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_tk4_kemanusiaan = $jumlah_prodi_tk4_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_prodi_tk4_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_tk4_senior = $jumlah_prodi_tk4_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_tk4_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_tk4_mapala = $jumlah_prodi_tk4_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tk4_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_tk4_persma = $jumlah_prodi_tk4_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tk4_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_tk4_bahasa = $jumlah_prodi_tk4_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tk4_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_tk4_pramuka = $jumlah_prodi_tk4_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_prodi_tkj_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_tkj_wirausaha = $jumlah_prodi_tkj_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_prodi_tkj_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_tkj_kemanusiaan = $jumlah_prodi_tkj_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_prodi_tkj_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_tkj_senior = $jumlah_prodi_tkj_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_tkj_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_tkj_mapala = $jumlah_prodi_tkj_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tkj_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_tkj_persma = $jumlah_prodi_tkj_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tkj_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_tkj_bahasa = $jumlah_prodi_tkj_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tkj_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_tkj_pramuka = $jumlah_prodi_tkj_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_prodi_tks4_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_tks4_wirausaha = $jumlah_prodi_tks4_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_prodi_tks4_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_tks4_kemanusiaan = $jumlah_prodi_tks4_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_prodi_tks4_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_tks4_senior = $jumlah_prodi_tks4_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_tks4_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_tks4_mapala = $jumlah_prodi_tks4_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tks4_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_tks4_persma = $jumlah_prodi_tks4_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tks4_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_tks4_bahasa = $jumlah_prodi_tks4_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tks4_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_tks4_pramuka = $jumlah_prodi_tks4_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_prodi_tl4_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_tl4_wirausaha = $jumlah_prodi_tl4_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_prodi_tl4_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_tl4_kemanusiaan = $jumlah_prodi_tl4_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_prodi_tl4_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_tl4_senior = $jumlah_prodi_tl4_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_tl4_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_tl4_mapala = $jumlah_prodi_tl4_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tl4_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_tl4_persma = $jumlah_prodi_tl4_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tl4_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_tl4_bahasa = $jumlah_prodi_tl4_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tl4_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_tl4_pramuka = $jumlah_prodi_tl4_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_prodi_tmf4_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_tmf4_wirausaha = $jumlah_prodi_tmf4_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_prodi_tmf4_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_tmf4_kemanusiaan = $jumlah_prodi_tmf4_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_prodi_tmf4_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_tmf4_senior = $jumlah_prodi_tmf4_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_tmf4_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_tmf4_mapala = $jumlah_prodi_tmf4_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tmf4_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_tmf4_persma = $jumlah_prodi_tmf4_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tmf4_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_tmf4_bahasa = $jumlah_prodi_tmf4_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tmf4_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_tmf4_pramuka = $jumlah_prodi_tmf4_pramuka/$jumlah_pramuka;    

   //  //xusia sanguin
   //  $jumlah_prodi_tmk4_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_tmk4_wirausaha = $jumlah_prodi_tmk4_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_prodi_tmk4_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_tmk4_kemanusiaan = $jumlah_prodi_tmk4_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_prodi_tmk4_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_tmk4_senior = $jumlah_prodi_tmk4_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_tmk4_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_tmk4_mapala = $jumlah_prodi_tmk4_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tmk4_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_tmk4_persma = $jumlah_prodi_tmk4_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tmk4_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_tmk4_bahasa = $jumlah_prodi_tmk4_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tmk4_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_tmk4_pramuka = $jumlah_prodi_tmk4_pramuka/$jumlah_pramuka;  

   //    //xusia sanguin
   //  $jumlah_prodi_tmj_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_tmj_wirausaha = $jumlah_prodi_tmj_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_prodi_tmj_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_tmj_kemanusiaan = $jumlah_prodi_tmj_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_prodi_tmj_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_tmj_senior = $jumlah_prodi_tmj_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_tmj_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_tmj_mapala = $jumlah_prodi_tmj_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tmj_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_tmj_persma = $jumlah_prodi_tmj_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tmj_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_tmj_bahasa = $jumlah_prodi_tmj_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tmj_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_tmj_pramuka = $jumlah_prodi_tmj_pramuka/$jumlah_pramuka;  

   //    //xusia sanguin
   //  $jumlah_prodi_tpe_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_tpe_wirausaha = $jumlah_prodi_tpe_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_prodi_tpe_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_tpe_kemanusiaan = $jumlah_prodi_tpe_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_prodi_tpe_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_tpe_senior = $jumlah_prodi_tpe_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_tpe_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_tpe_mapala = $jumlah_prodi_tpe_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tpe_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_tpe_persma = $jumlah_prodi_tpe_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tpe_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_tpe_bahasa = $jumlah_prodi_tpe_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tpe_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_tpe_pramuka = $jumlah_prodi_tpe_pramuka/$jumlah_pramuka;    

   //   //xusia sanguin
   //  $jumlah_prodi_tki_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
   //  $x_prodi_tki_wirausaha = $jumlah_prodi_tki_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_prodi_tki_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
   //  $x_prodi_tki_kemanusiaan = $jumlah_prodi_tki_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_prodi_tki_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_prodi_tki_senior = $jumlah_prodi_tki_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_prodi_tki_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
   //  $x_prodi_tki_mapala = $jumlah_prodi_tki_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tki_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
   //  $x_prodi_tki_persma = $jumlah_prodi_tki_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tki_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
   //  $x_prodi_tki_bahasa = $jumlah_prodi_tki_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_prodi_tki_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
   //  $x_prodi_tki_pramuka = $jumlah_prodi_tki_pramuka/$jumlah_pramuka;        
        
        
   //      if($show_perhitungan){
   //      echo "<br>";
   //      echo "<strong><u>Atribut Prodi D3 Administrasi Bisnis:<br></u></strong>";
   //  echo "X Prodi D3 Administrasi Bisnis Wirausaha=".number_format($x_prodi_ab3_wirusaha, dec())."<br>";
   //  echo "X Prodi D3 Administrasi Bisnis Kemanusiaan=".number_format($x_prodi_ab3_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D3 Administrasi Bisnis SENIOR=".number_format($x_prodi_ab3_senior, dec())."<br>";
   //      echo "X Prodi D3 Administrasi Bisnis MAPALA=".number_format($x_prodi_ab3_mapala, dec())."<br>";
   //      echo "X Prodi D3 Administrasi Bisnis Persma=".number_format($x_prodi_ab3_persma, dec())."<br>";
   //      echo "X Prodi D3 Administrasi Bisnis Bahasa=".number_format($x_prodi_ab3_bahasa, dec())."<br>";
   //      echo "X Prodi D3 Administrasi Bisnis Pramuka=".number_format($x_prodi_ab3_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Prodi D3 Akuntansi:<br></u></strong>";
   //  echo "X Prodi D3 Akuntansi Wirausaha=".number_format($x_prodi_ak3_wirusaha, dec())."<br>";
   //  echo "X Prodi D3 Akuntansi Kemanusiaan=".number_format($x_prodi_ak3_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D3 Akuntansi SENIOR=".number_format($x_prodi_ak3_senior, dec())."<br>";
   //      echo "X Prodi D3 Akuntansi MAPALA=".number_format($x_prodi_ak3_mapala, dec())."<br>";
   //      echo "X Prodi D3 Akuntansi Persma=".number_format($x_prodi_ak3_persma, dec())."<br>";
   //      echo "X Prodi D3 Akuntansi Bahasa=".number_format($x_prodi_ak3_bahasa, dec())."<br>";
   //      echo "X Prodi D3 Akuntansi Pramuka=".number_format($x_prodi_ak3_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Prodi D3 Analisis Kimia:<br></u></strong>";
   //  echo "X Prodi D3 Analisis Kimia Wirausaha=".number_format($x_prodi_ank_wirusaha, dec())."<br>";
   //  echo "X Prodi D3 Analisis Kimia Kemanusiaan=".number_format($x_prodi_ank_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D3 Analisis Kimia SENIOR=".number_format($x_prodi_ank_senior, dec())."<br>";
   //      echo "X Prodi D3 Analisis Kimia MAPALA=".number_format($x_prodi_ank_mapala, dec())."<br>";
   //      echo "X Prodi D3 Analisis Kimia Persma=".number_format($x_prodi_ank_persma, dec())."<br>";
   //      echo "X Prodi D3 Analisis Kimia Bahasa=".number_format($x_prodi_ank_bahasa, dec())."<br>";
   //      echo "X Prodi D3 Analisis Kimia Pramuka=".number_format($x_prodi_ank_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Prodi D3 Teknik Elektronika:<br></u></strong>";
   //   echo "X Prodi D3 Teknik Elektronika Wirausaha=".number_format($x_prodi_te_wirusaha, dec())."<br>";
   //  echo "X Prodi D3 Teknik Elektronika Kemanusiaan=".number_format($x_prodi_te_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D3 Teknik Elektronika SENIOR=".number_format($x_prodi_te_senior, dec())."<br>";
   //      echo "X Prodi D3 Teknik Elektronika MAPALA=".number_format($x_prodi_te_mapala, dec())."<br>";
   //      echo "X Prodi D3 Teknik Elektronika Persma=".number_format($x_prodi_te_persma, dec())."<br>";
   //      echo "X Prodi D3 Teknik Elektronika Bahasa=".number_format($x_prodi_te_bahasa, dec())."<br>";
   //      echo "X Prodi D3 Teknik Elektronika Pramuka=".number_format($x_prodi_te_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Prodi D3 Teknik Kimia:<br></u></strong>";
   //   echo "X Prodi D3 Teknik Kimia Wirausaha=".number_format($x_prodi_tk3_wirusaha, dec())."<br>";
   //  echo "X Prodi D3 Teknik Kimia Kemanusiaan=".number_format($x_prodi_tk3_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D3 Teknik Kimia SENIOR=".number_format($x_prodi_tk3_senior, dec())."<br>";
   //      echo "X Prodi D3 Teknik Kimia MAPALA=".number_format($x_prodi_tk3_mapala, dec())."<br>";
   //      echo "X Prodi D3 Teknik Kimia Persma=".number_format($x_prodi_tk3_persma, dec())."<br>";
   //      echo "X Prodi D3 Teknik Kimia Bahasa=".number_format($x_prodi_tk3_bahasa, dec())."<br>";
   //      echo "X Prodi D3 Teknik Kimia Pramuka=".number_format($x_prodi_tk3_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Prodi D3 Teknik Kimia Mineral:<br></u></strong>";
   //   echo "X Prodi D3 Teknik Kimia Mineral Wirausaha=".number_format($x_prodi_tkm_wirusaha, dec())."<br>";
   //  echo "X Prodi D3 Teknik Kimia Mineral Kemanusiaan=".number_format($x_prodi_tkm_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D3 Teknik Kimia Mineral SENIOR=".number_format($x_prodi_tkm_senior, dec())."<br>";
   //      echo "X Prodi D3 Teknik Kimia Mineral MAPALA=".number_format($x_prodi_tkm_mapala, dec())."<br>";
   //      echo "X Prodi D3 Teknik Kimia Mineral Persma=".number_format($x_prodi_tkm_persma, dec())."<br>";
   //      echo "X Prodi D3 Teknik Kimia Mineral Bahasa=".number_format($x_prodi_tkm_bahasa, dec())."<br>";
   //      echo "X Prodi D3 Teknik Kimia Mineral Pramuka=".number_format($x_prodi_tkm_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Prodi D3 Teknik Konstruksi:<br></u></strong>";
   //   echo "X Prodi D3 Teknik Konstruksi Wirausaha=".number_format($x_prodi_tks3_wirusaha, dec())."<br>";
   //  echo "X Prodi D3 Teknik Konstruksi Kemanusiaan=".number_format($x_prodi_tks3_sipil_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D3 Teknik Konstruksi SENIOR=".number_format($x_prodi_tks3_senior, dec())."<br>";
   //      echo "X Prodi D3 Teknik Konstruksi MAPALA=".number_format($x_prodi_tks3_mapala, dec())."<br>";
   //      echo "X Prodi D3 Teknik Konstruksi Persma=".number_format($x_prodi_tks3_persma, dec())."<br>";
   //      echo "X Prodi D3 Teknik Konstruksi Bahasa=".number_format($x_prodi_tks3_bahasa, dec())."<br>";
   //      echo "X Prodi D3 Teknik Konstruksi Pramuka=".number_format($x_prodi_tks3_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Prodi D3 Teknik Konstruksi Gedung:<br></u></strong>";
   //   echo "X Prodi D3 Teknik Konstruksi Gedung Wirausaha=".number_format($x_prodi_tkg_wirusaha, dec())."<br>";
   //  echo "X Prodi D3 Teknik Konstruksi Gedung Kemanusiaan=".number_format($x_prodi_tkg_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D3 Teknik Konstruksi Gedung SENIOR=".number_format($x_prodi_tkg_senior, dec())."<br>";
   //      echo "X Prodi D3 Teknik Konstruksi Gedung MAPALA=".number_format($x_prodi_tkg_mapala, dec())."<br>";
   //      echo "X Prodi D3 Teknik Konstruksi Gedung Persma=".number_format($x_prodi_tkg_persma, dec())."<br>";
   //      echo "X Prodi D3 Teknik Konstruksi Gedung Bahasa=".number_format($x_prodi_tkg_bahasa, dec())."<br>";
   //      echo "X Prodi D3 Teknik Konstruksi Gedung Pramuka=".number_format($x_prodi_tkg_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Prodi D3 Teknik Konstruksi Jalan dan Jembatan:<br></u></strong>";
   //   echo "X Prodi D3 Teknik Konstruksi Jalan dan Jembatan Wirausaha=".number_format($x_prodi_tkjj_wirusaha, dec())."<br>";
   //  echo "X Prodi D3 Teknik Konstruksi Jalan dan Jembatan Kemanusiaan=".number_format($x_prodi_tkjj_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D3 Teknik Konstruksi Jalan dan Jembatan SENIOR=".number_format($x_prodi_tkjj_senior, dec())."<br>";
   //      echo "X Prodi D3 Teknik Konstruksi Jalan dan Jembatan MAPALA=".number_format($x_prodi_tkjj_mapala, dec())."<br>";
   //      echo "X Prodi D3 Teknik Konstruksi Jalan dan Jembatan Persma=".number_format($x_prodi_tkjj_persma, dec())."<br>";
   //      echo "X Prodi D3 Teknik Konstruksi Jalan dan Jembatan Bahasa=".number_format($x_prodi_tkjj_bahasa, dec())."<br>";
   //      echo "X Prodi D3 Teknik Konstruksi Jalan dan Jembatan Pramuka=".number_format($x_prodi_tkjj_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Prodi D3 Teknik Konversi Energi:<br></u></strong>";
   //   echo "X Prodi D3 Teknik Konversi Energi Wirausaha=".number_format($x_prodi_tke_wirusaha, dec())."<br>";
   //  echo "X Prodi D3 Teknik Konversi Energi Kemanusiaan=".number_format($x_prodi_tke_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D3 Teknik Konversi Energi SENIOR=".number_format($x_prodi_tke_senior, dec())."<br>";
   //      echo "X Prodi D3 Teknik Konversi Energi MAPALA=".number_format($x_prodi_tke_mapala, dec())."<br>";
   //      echo "X Prodi D3 Teknik Konversi Energi Persma=".number_format($x_prodi_tke_persma, dec())."<br>";
   //      echo "X Prodi D3 Teknik Konversi Energi Bahasa=".number_format($x_prodi_tke_bahasa, dec())."<br>";
   //      echo "X Prodi D3 Teknik Konversi Energi Pramuka=".number_format($x_prodi_tke_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Prodi D3 Teknik Listrik:<br></u></strong>";
   //   echo "X Prodi D3 Teknik Listrik Wirausaha=".number_format($x_prodi_tl3_wirusaha, dec())."<br>";
   //  echo "X Prodi D3 Teknik Listrik Kemanusiaan=".number_format($x_prodi_tl3_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D3 Teknik Listrik SENIOR=".number_format($x_prodi_tl3_senior, dec())."<br>";
   //      echo "X Prodi D3 Teknik Listrik MAPALA=".number_format($x_prodi_tl3_mapala, dec())."<br>";
   //      echo "X Prodi D3 Teknik Listrik Persma=".number_format($x_prodi_tl3_persma, dec())."<br>";
   //      echo "X Prodi D3 Teknik Listrik Bahasa=".number_format($x_prodi_tl3_bahasa, dec())."<br>";
   //      echo "X Prodi D3 Teknik Listrik Pramuka=".number_format($x_prodi_tl3_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Prodi D3 Teknik Mekatronika:<br></u></strong>";
   //   echo "X Prodi D3 Teknik Mekatronika Wirausaha=".number_format($x_prodi_tmk3_wirusaha, dec())."<br>";
   //  echo "X Prodi D3 Teknik Mekatronika Kemanusiaan=".number_format($x_prodi_tmk3_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D3 Teknik Mekatronika SENIOR=".number_format($x_prodi_tmk3_senior, dec())."<br>";
   //      echo "X Prodi D3 Teknik Mekatronika MAPALA=".number_format($x_prodi_tmk3_mapala, dec())."<br>";
   //      echo "X Prodi D3 Teknik Mekatronika Persma=".number_format($x_prodi_tmk3_persma, dec())."<br>";
   //      echo "X Prodi D3 Teknik Mekatronika Bahasa=".number_format($x_prodi_tmk3_bahasa, dec())."<br>";
   //      echo "X Prodi D3 Teknik Mekatronika Pramuka=".number_format($x_prodi_tmk3_pramuka, dec())."<br>";
   //  echo "<br>";
   //   echo "<br>";
   //      echo "<strong><u>Atribut Prodi D3 Teknik Mesin:<br></u></strong>";
   //   echo "X Prodi D3 Teknik Mesin Wirausaha=".number_format($x_prodi_tm_wirusaha, dec())."<br>";
   //  echo "X Prodi D3 Teknik Mesin Kemanusiaan=".number_format($x_prodi_tm_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D3 Teknik Mesin SENIOR=".number_format($x_prodi_tm_senior, dec())."<br>";
   //      echo "X Prodi D3 Teknik Mesin MAPALA=".number_format($x_prodi_tm_mapala, dec())."<br>";
   //      echo "X Prodi D3 Teknik Mesin Persma=".number_format($x_prodi_tm_persma, dec())."<br>";
   //      echo "X Prodi D3 Teknik Mesin Bahasa=".number_format($x_prodi_tm_bahasa, dec())."<br>";
   //      echo "X Prodi D3 Teknik Mesin Pramuka=".number_format($x_prodi_tm_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Prodi D3 Teknik Otomotif:<br></u></strong>";
   //   echo "X Prodi D3 Teknik Otomotif Wirausaha=".number_format($x_prodi_to_wirusaha, dec())."<br>";
   //  echo "X Prodi D3 Teknik Otomotif Kemanusiaan=".number_format($x_prodi_to_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D3 Teknik Otomotif SENIOR=".number_format($x_prodi_to_senior, dec())."<br>";
   //      echo "X Prodi D3 Teknik Otomotif MAPALA=".number_format($x_prodi_to_mapala, dec())."<br>";
   //      echo "X Prodi D3 Teknik Otomotif Persma=".number_format($x_prodi_to_persma, dec())."<br>";
   //      echo "X Prodi D3 Teknik Otomotif Bahasa=".number_format($x_prodi_to_bahasa, dec())."<br>";
   //      echo "X Prodi D3 Teknik Otomotif Pramuka=".number_format($x_prodi_to_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Prodi D3 Teknik Perawatan Alat Berat:<br></u></strong>";
   //   echo "X Prodi D3 Teknik Perawatan Alat Berat Wirausaha=".number_format($x_prodi_tpab_wirusaha, dec())."<br>";
   //  echo "X Prodi D3 Teknik Perawatan Alat Berat Kemanusiaan=".number_format($x_prodi_tpab_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D3 Teknik Perawatan Alat Berat SENIOR=".number_format($x_prodi_tpab_senior, dec())."<br>";
   //      echo "X Prodi D3 Teknik Perawatan Alat Berat MAPALA=".number_format($x_prodi_tpab_mapala, dec())."<br>";
   //      echo "X Prodi D3 Teknik Perawatan Alat Berat Persma=".number_format($x_prodi_tpab_persma, dec())."<br>";
   //      echo "X Prodi D3 Teknik Perawatan Alat Berat Bahasa=".number_format($x_prodi_tpab_bahasa, dec())."<br>";
   //      echo "X Prodi D3 Teknik Perawatan Alat Berat Pramuka=".number_format($x_prodi_tpab_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Prodi D3 Teknik Sipil:<br></u></strong>";
   //   echo "X Prodi D3 Teknik Sipil Wirausaha=".number_format($x_prodi_ts_wirusaha, dec())."<br>";
   //  echo "X Prodi D3 Teknik Sipil Kemanusiaan=".number_format($x_prodi_ts_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D3 Teknik Sipil SENIOR=".number_format($x_prodi_ts_senior, dec())."<br>";
   //      echo "X Prodi D3 Teknik Sipil MAPALA=".number_format($x_prodi_ts_mapala, dec())."<br>";
   //      echo "X Prodi D3 Teknik Sipil Persma=".number_format($x_prodi_ts_persma, dec())."<br>";
   //      echo "X Prodi D3 Teknik Sipil Bahasa=".number_format($x_prodi_ts_bahasa, dec())."<br>";
   //      echo "X Prodi D3 Teknik Sipil Pramuka=".number_format($x_prodi_ts_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Prodi D3 Teknik Telekomunikasi:<br></u></strong>";
   //   echo "X Prodi D3 Teknik Telekomunikasi Wirausaha=".number_format($x_prodi_ttl_wirusaha, dec())."<br>";
   //  echo "X Prodi D3 Teknik Telekomunikasi Kemanusiaan=".number_format($x_prodi_ttl_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D3 Teknik Telekomunikasi SENIOR=".number_format($x_prodi_ttl_senior, dec())."<br>";
   //      echo "X Prodi D3 Teknik Telekomunikasi MAPALA=".number_format($x_prodi_ttl_mapala, dec())."<br>";
   //      echo "X Prodi D3 Teknik Telekomunikasi Persma=".number_format($x_prodi_ttl_persma, dec())."<br>";
   //      echo "X Prodi D3 Teknik Telekomunikasi Bahasa=".number_format($x_prodi_ttl_bahasa, dec())."<br>";
   //      echo "X Prodi D3 Teknik Telekomunikasi Pramuka=".number_format($x_prodi_ttl_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Prodi D4 Administrasi Bisnis:<br></u></strong>";
   //   echo "X Prodi D4 Administrasi Bisnis Wirausaha=".number_format($x_prodi_ab4_wirusaha, dec())."<br>";
   //  echo "X Prodi D4 Administrasi Bisnis Kemanusiaan=".number_format($x_prodi_ab4_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D4 Administrasi Bisnis SENIOR=".number_format($x_prodi_ab4_senior, dec())."<br>";
   //      echo "X Prodi D4 Administrasi Bisnis MAPALA=".number_format($x_prodi_ab4_mapala, dec())."<br>";
   //      echo "X Prodi D4 Administrasi Bisnis Persma=".number_format($x_prodi_ab4_persma, dec())."<br>";
   //      echo "X Prodi D4 Administrasi Bisnis Bahasa=".number_format($x_prodi_ab4_bahasa, dec())."<br>";
   //      echo "X Prodi D4 Administrasi Bisnis Pramuka=".number_format($x_prodi_ab4_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Prodi D4 Akuntansi Manajerial:<br></u></strong>";
   //   echo "X Prodi D4 Akuntansi Manajerial Wirausaha=".number_format($x_prodi_akm_wirusaha, dec())."<br>";
   //  echo "X Prodi D4 Akuntansi Manajerial Kemanusiaan=".number_format($x_prodi_akm_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D4 Akuntansi Manajerial SENIOR=".number_format($x_prodi_akm_senior, dec())."<br>";
   //      echo "X Prodi D4 Akuntansi Manajerial MAPALA=".number_format($x_prodi_akm_mapala, dec())."<br>";
   //      echo "X Prodi D4 Akuntansi Manajerial Persma=".number_format($x_prodi_akm_persma, dec())."<br>";
   //      echo "X Prodi D4 Akuntansi Manajerial Bahasa=".number_format($x_prodi_akm_bahasa, dec())."<br>";
   //      echo "X Prodi D4 Akuntansi Manajerial Pramuka=".number_format($x_prodi_akm_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Prodi D4 Teknik Kimia:<br></u></strong>";
   //   echo "X Prodi D4 Teknik Kimia Wirausaha=".number_format($x_prodi_tk4_wirusaha, dec())."<br>";
   //  echo "X Prodi D4 Teknik Kimia Kemanusiaan=".number_format($x_prodi_tk4_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D4 Teknik Kimia SENIOR=".number_format($x_prodi_tk4_senior, dec())."<br>";
   //      echo "X Prodi D4 Teknik Kimia MAPALA=".number_format($x_prodi_tk4_mapala, dec())."<br>";
   //      echo "X Prodi D4 Teknik Kimia Persma=".number_format($x_prodi_tk4_persma, dec())."<br>";
   //      echo "X Prodi D4 Teknik Kimia Bahasa=".number_format($x_prodi_tk4_bahasa, dec())."<br>";
   //      echo "X Prodi D4 Teknik Kimia Pramuka=".number_format($x_prodi_tk4_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Prodi D4 Teknik Komputer dan Jaringan:<br></u></strong>";
   //   echo "X Prodi D4 Teknik Komputer dan Jaringan Wirausaha=".number_format($x_prodi_tkj_wirusaha, dec())."<br>";
   //  echo "X Prodi D4 Teknik Komputer dan Jaringan Kemanusiaan=".number_format($x_prodi_tkj_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D4 Teknik Komputer dan Jaringan SENIOR=".number_format($x_prodi_tkj_senior, dec())."<br>";
   //      echo "X Prodi D4 Teknik Komputer dan Jaringan MAPALA=".number_format($x_prodi_tkj_mapala, dec())."<br>";
   //      echo "X Prodi D4 Teknik Komputer dan Jaringan Persma=".number_format($x_prodi_tkj_persma, dec())."<br>";
   //      echo "X Prodi D4 Teknik Komputer dan Jaringan Bahasa=".number_format($x_prodi_tkj_bahasa, dec())."<br>";
   //      echo "X Prodi D4 Teknik Komputer dan Jaringan Pramuka=".number_format($x_prodi_tkj_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Prodi D4 Teknik Konstruksi:<br></u></strong>";
   //   echo "X Prodi D4 Teknik Konstruksi Wirausaha=".number_format($x_prodi_tks4_wirusaha, dec())."<br>";
   //  echo "X Prodi D4 Teknik Konstruksi Kemanusiaan=".number_format($x_prodi_tks4_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D4 Teknik Konstruksi SENIOR=".number_format($x_prodi_tks4_senior, dec())."<br>";
   //      echo "X Prodi D4 Teknik Konstruksi MAPALA=".number_format($x_prodi_tks4_mapala, dec())."<br>";
   //      echo "X Prodi D4 Teknik Konstruksi Persma=".number_format($x_prodi_tks4_persma, dec())."<br>";
   //      echo "X Prodi D4 Teknik Konstruksi Bahasa=".number_format($x_prodi_tks4_bahasa, dec())."<br>";
   //      echo "X Prodi D4 Teknik Konstruksi Pramuka=".number_format($x_prodi_tks4_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Prodi D4 Teknik Listrik:<br></u></strong>";
   //   echo "X Prodi D4 Teknik Listrik Wirausaha=".number_format($x_prodi_tl4_wirusaha, dec())."<br>";
   //  echo "X Prodi D4 Teknik Listrik Kemanusiaan=".number_format($x_prodi_tl4_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D4 Teknik Listrik SENIOR=".number_format($x_prodi_tl4_senior, dec())."<br>";
   //      echo "X Prodi D4 Teknik Listrik MAPALA=".number_format($x_prodi_tl4_mapala, dec())."<br>";
   //      echo "X Prodi D4 Teknik Listrik Persma=".number_format($x_prodi_tl4_persma, dec())."<br>";
   //      echo "X Prodi D4 Teknik Listrik Bahasa=".number_format($x_prodi_tl4_bahasa, dec())."<br>";
   //      echo "X Prodi D4 Teknik Listrik Pramuka=".number_format($x_prodi_tl4_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Prodi D4 Teknik Manufaktur:<br></u></strong>";
   //   echo "X Prodi D4 Teknik Manufaktur Wirausaha=".number_format($x_prodi_tmf4_wirusaha, dec())."<br>";
   //  echo "X Prodi D4 Teknik Manufaktur Kemanusiaan=".number_format($x_prodi_tmf4_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D4 Teknik Manufaktur SENIOR=".number_format($x_prodi_tmf4_senior, dec())."<br>";
   //      echo "X Prodi D4 Teknik Manufaktur MAPALA=".number_format($x_prodi_tmf4_mapala, dec())."<br>";
   //      echo "X Prodi D4 Teknik Manufaktur Persma=".number_format($x_prodi_tmf4_persma, dec())."<br>";
   //      echo "X Prodi D4 Teknik Manufaktur Bahasa=".number_format($x_prodi_tmf4_bahasa, dec())."<br>";
   //      echo "X Prodi D4 Teknik Manufaktur Pramuka=".number_format($x_prodi_tmf4_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Prodi D4 Teknik Mekatronika:<br></u></strong>";
   //   echo "X Prodi D4 Teknik Mekatronika Wirausaha=".number_format($x_prodi_tmk4_wirusaha, dec())."<br>";
   //  echo "X Prodi D4 Teknik Mekatronika Kemanusiaan=".number_format($x_prodi_tmk4_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D4 Teknik Mekatronika SENIOR=".number_format($x_prodi_tmk4_senior, dec())."<br>";
   //      echo "X Prodi D4 Teknik Mekatronika MAPALA=".number_format($x_prodi_tmk4_mapala, dec())."<br>";
   //      echo "X Prodi D4 Teknik Mekatronika Persma=".number_format($x_prodi_tmk4_persma, dec())."<br>";
   //      echo "X Prodi D4 Teknik Mekatronika Bahasa=".number_format($x_prodi_tmk4_bahasa, dec())."<br>";
   //      echo "X Prodi D4 Teknik Mekatronika Pramuka=".number_format($x_prodi_tmk4_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Prodi D4 Teknik Multimedia dan Jaringan:<br></u></strong>";
   //   echo "X Prodi D4 Teknik Multimedia dan Jaringan Wirausaha=".number_format($x_prodi_tmj_wirausaha, dec())."<br>";
   //  echo "X Prodi D4 Teknik Multimedia dan Jaringan Kemanusiaan=".number_format($x_prodi_tmj_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D4 Teknik Multimedia dan Jaringan SENIOR=".number_format($x_prodi_tmj_senior, dec())."<br>";
   //      echo "X Prodi D4 Teknik Multimedia dan Jaringan MAPALA=".number_format($x_prodi_tmj_mapala, dec())."<br>";
   //      echo "X Prodi D4 Teknik Multimedia dan Jaringan Persma=".number_format($x_prodi_tmj_persma, dec())."<br>";
   //      echo "X Prodi D4 Teknik Multimedia dan Jaringan Bahasa=".number_format($x_prodi_tmj_bahasa, dec())."<br>";
   //      echo "X Prodi D4 Teknik Multimedia dan Jaringan Pramuka=".number_format($x_prodi_tmj_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Prodi D4 Teknik Pembangkit Energi:<br></u></strong>";
   //   echo "X Prodi D4 Teknik Pembangkit Energi Wirausaha=".number_format($x_prodi_tpe_wirausaha, dec())."<br>";
   //  echo "X Prodi D4 Teknik Pembangkit Energi Kemanusiaan=".number_format($x_prodi_tpe_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D4 Teknik Pembangkit Energi SENIOR=".number_format($x_prodi_tpe_senior, dec())."<br>";
   //      echo "X Prodi D4 Teknik Pembangkit Energi MAPALA=".number_format($x_prodi_tpe_mapala, dec())."<br>";
   //      echo "X Prodi D4 Teknik Pembangkit Energi Persma=".number_format($x_prodi_tpe_persma, dec())."<br>";
   //      echo "X Prodi D4 Teknik Pembangkit Energi Bahasa=".number_format($x_prodi_tpe_bahasa, dec())."<br>";
   //      echo "X Prodi D4 Teknik Pembangkit Energi Pramuka=".number_format($x_prodi_tpe_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Prodi D4 Teknik Kimia Industri:<br></u></strong>";
   //   echo "X Prodi D4 Teknik Kimia Industri Wirausaha=".number_format($x_prodi_tki_wirausaha, dec())."<br>";
   //  echo "X Prodi D4 Teknik Kimia Industri Kemanusiaan=".number_format($x_prodi_tki_kemanusiaan, dec())."<br>";
   //      echo "X Prodi D4 Teknik Kimia Industri SENIOR=".number_format($x_prodi_tki_senior, dec())."<br>";
   //      echo "X Prodi D4 Teknik Kimia Industri MAPALA=".number_format($x_prodi_tki_mapala, dec())."<br>";
   //      echo "X Prodi D4 Teknik Kimia Industri Persma=".number_format($x_prodi_tki_persma, dec())."<br>";
   //      echo "X Prodi D4 Teknik Kimia Industri Bahasa=".number_format($x_prodi_tki_bahasa, dec())."<br>";
   //      echo "X Prodi D4 Teknik Kimia Industri Pramuka=".number_format($x_prodi_tki_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ab3_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_ab3_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_ab3_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_ab3_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ab3_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_ab3_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ab3_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_ab3_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ab3_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_ab3_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ab3_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_ab3_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ab3_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_ab3_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D3 Administrasi Bisnis Wirausaha=".number_format($s2_prodi_ab3_wirausaha, dec())."<br>";
   //  echo "S2 Prodi D3 Administrasi Bisnis Kemanusiaan=".number_format($s2_prodi_ab3_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D3 Administrasi Bisnis SENIOR=".number_format($s2_prodi_ab3_senior, dec())."<br>";
   //      echo "S2 Prodi D3 Administrasi Bisnis MAPALA=".number_format($s2_prodi_ab3_mapala, dec())."<br>";
   //      echo "S2 Prodi D3 Administrasi Bisnis Persma=".number_format($s2_prodi_ab3_persma, dec())."<br>";
   //      echo "S2 Prodi D3 Administrasi Bisnis Bahasa=".number_format($s2_prodi_ab3_bahasa, dec())."<br>";
   //      echo "S2 Prodi D3 Administrasi Bisnis Pramuka=".number_format($s2_prodi_ab3_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //      //S2 jawaban_a Sanguin
   //  $s2_prodi_ak3_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_ak3_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_ak3_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_ak3_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ak3_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_ak3_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ak3_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_ak3_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ak3_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_ak3_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ak3_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_ak3_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ak3_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_ak3_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D3 Akuntansi Wirausaha=".number_format($s2_prodi_ak3_wirausaha, dec())."<br>";
   //  echo "S2 Prodi D3 Akuntansi Kemanusiaan=".number_format($s2_prodi_ak3_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D3 Akuntansi SENIOR=".number_format($s2_prodi_ak3_senior, dec())."<br>";
   //      echo "S2 Prodi D3 Akuntansi MAPALA=".number_format($s2_prodi_ak3_mapala, dec())."<br>";
   //      echo "S2 Prodi D3 Akuntansi Persma=".number_format($s2_prodi_ak3_persma, dec())."<br>";
   //      echo "S2 Prodi D3 Akuntansi Bahasa=".number_format($s2_prodi_ak3_bahasa, dec())."<br>";
   //      echo "S2 Prodi D3 Akuntansi Pramuka=".number_format($s2_prodi_ak3_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //         //S2 jawaban_a Sanguin
   //  $s2_prodi_ank_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_ank_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_ank_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_ank_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ank_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_ank_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ank_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_ank_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ank_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_ank_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ank_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_ank_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ank_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_ank_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D3 Analisis Kimia Wirausaha=".number_format($s2_prodi_ank_wirausaha, dec())."<br>";
   //  echo "S2 Prodi D3 Analisis Kimia Kemanusiaan=".number_format($s2_prodi_ank_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D3 Analisis Kimia SENIOR=".number_format($s2_prodi_ank_senior, dec())."<br>";
   //      echo "S2 Prodi D3 Analisis Kimia MAPALA=".number_format($s2_prodi_ank_mapala, dec())."<br>";
   //      echo "S2 Prodi D3 Analisis Kimia Persma=".number_format($s2_prodi_ank_persma, dec())."<br>";
   //      echo "S2 Prodi D3 Analisis Kimia Bahasa=".number_format($s2_prodi_ank_bahasa, dec())."<br>";
   //      echo "S2 Prodi D3 Analisis Kimia Pramuka=".number_format($s2_prodi_ank_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //            //S2 jawaban_a Sanguin
   //  $s2_prodi_te_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_te_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_te_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_te_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_te_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_te_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_te_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_te_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_te_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_te_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_te_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_te_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_te_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_te_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D3 Teknik Elektronika Wirausaha=".number_format($s2_prodi_te_wirausaha, dec())."<br>";
   //  echo "S2 Prodi D3 Teknik Elektronika Kemanusiaan=".number_format($s2_prodi_te_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Elektronika SENIOR=".number_format($s2_prodi_te_senior, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Elektronika MAPALA=".number_format($s2_prodi_te_mapala, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Elektronika Persma=".number_format($s2_prodi_te_persma, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Elektronika Bahasa=".number_format($s2_prodi_te_bahasa, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Elektronika Pramuka=".number_format($s2_prodi_te_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //            //S2 jawaban_a Sanguin
   //  $s2_prodi_tk3_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_tk3_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_tk3_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_tk3_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tk3_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_tk3_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tk3_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_tk3_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tk3_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_tk3_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tk3_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_tk3_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tk3_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_tk3_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D3 Teknik Kimia Wirausaha=".number_format($s2_prodi_tk3_wirausaha, dec())."<br>";
   //  echo "S2 Prodi D3 Teknik Kimia Kemanusiaan=".number_format($s2_prodi_tk3_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Kimia SENIOR=".number_format($s2_prodi_tk3_senior, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Kimia MAPALA=".number_format($s2_prodi_tk3_mapala, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Kimia Persma=".number_format($s2_prodi_tk3_persma, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Kimia Bahasa=".number_format($s2_prodi_tk3_bahasa, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Kimia Pramuka=".number_format($s2_prodi_tk3_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //               //S2 jawaban_a Sanguin
   //  $s2_prodi_tkm_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_tkm_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_tkm_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_tkm_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tkm_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_tkm_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tkm_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_tkm_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tkm_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_tkm_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tkm_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_tkm_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tkm_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_tkm_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D3 Teknik Kimia Mineral Wirausaha=".number_format($s2_prodi_tkm_wirausaha, dec())."<br>";
   //  echo "S2 Prodi D3 Teknik Kimia Mineral Kemanusiaan=".number_format($s2_prodi_tkm_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Kimia Mineral SENIOR=".number_format($s2_prodi_tkm_senior, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Kimia Mineral MAPALA=".number_format($s2_prodi_tkm_mapala, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Kimia Mineral Persma=".number_format($s2_prodi_tkm_persma, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Kimia Mineral Bahasa=".number_format($s2_prodi_tkm_bahasa, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Kimia Mineral Pramuka=".number_format($s2_prodi_tkm_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //                       //S2 jawaban_a Sanguin
   //  $s2_prodi_tks3_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_tks3_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_tks3_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_tks3_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tks3_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_tks3_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tks3_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_tks3_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tks3_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_tks3_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tks3_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_tks3_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tks3_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_tks3_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D3 Teknik Konstruksi Wirausaha=".number_format($s2_prodi_tks3_wirausaha, dec())."<br>";
   //  echo "S2 Prodi D3 Teknik Konstruksi Kemanusiaan=".number_format($s2_prodi_tks3_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Konstruksi SENIOR=".number_format($s2_prodi_tks3_senior, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Konstruksi MAPALA=".number_format($s2_prodi_tks3_mapala, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Konstruksi Persma=".number_format($s2_prodi_tks3_persma, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Konstruksi Bahasa=".number_format($s2_prodi_tks3_bahasa, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Konstruksi Pramuka=".number_format($s2_prodi_tks3_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tkg_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_tkg_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_tkg_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_tkg_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tkg_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_tkg_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tkg_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_tkg_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tkg_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_tkg_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tkg_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_tkg_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tkg_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_tkg_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D3 Teknik Konstruksi Gedung Wirausaha=".number_format($s2_prodi_tkg_wirausaha, dec())."<br>";
   //  echo "S2 Prodi D3 Teknik Konstruksi Gedung Kemanusiaan=".number_format($s2_prodi_tkg_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Konstruksi Gedung SENIOR=".number_format($s2_prodi_tkg_senior, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Konstruksi Gedung MAPALA=".number_format($s2_prodi_tkg_mapala, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Konstruksi Gedung Persma=".number_format($s2_prodi_tkg_persma, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Konstruksi Gedung Bahasa=".number_format($s2_prodi_tkg_bahasa, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Konstruksi Gedung Pramuka=".number_format($s2_prodi_tkg_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //      //S2 jawaban_a Sanguin
   //  $s2_prodi_tkjj_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_tkjj_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_tkjj_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_tkjj_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tkjj_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_tkjj_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tkjj_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_tkjj_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tkjj_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_tkjj_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tkjj_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_tkjj_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tkjj_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_tkjj_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D3 Teknik Konstruksi Jalan dan Jembatan Wirausaha=".number_format($s2_prodi_tkjj_wirausaha, dec())."<br>";
   //  echo "S2 Prodi D3 Teknik Konstruksi Jalan dan Jembatan Kemanusiaan=".number_format($s2_prodi_tkjj_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Konstruksi Jalan dan Jembatan SENIOR=".number_format($s2_prodi_tkjj_senior, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Konstruksi Jalan dan Jembatan MAPALA=".number_format($s2_prodi_tkjj_mapala, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Konstruksi Jalan dan Jembatan Persma=".number_format($s2_prodi_tkjj_persma, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Konstruksi Jalan dan Jembatan Bahasa=".number_format($s2_prodi_tkjj_bahasa, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Konstruksi Jalan dan Jembatan Pramuka=".number_format($s2_prodi_tkjj_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //         //S2 jawaban_a Sanguin
   //  $s2_prodi_tke_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_tke_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_tke_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_tke_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tke_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_tke_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tke_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_tke_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tke_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_tke_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tke_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_tke_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tke_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_tke_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D3 Teknik Konversi Energi Wirausaha=".number_format($s2_prodi_tke_wirausaha, dec())."<br>";
   //  echo "S2 Prodi D3 Teknik Konversi Energi Kemanusiaan=".number_format($s2_prodi_tke_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Konversi Energi SENIOR=".number_format($s2_prodi_tke_senior, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Konversi Energi MAPALA=".number_format($s2_prodi_tke_mapala, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Konversi Energi Persma=".number_format($s2_prodi_tke_persma, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Konversi Energi Bahasa=".number_format($s2_prodi_tke_bahasa, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Konversi Energi Pramuka=".number_format($s2_prodi_tke_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //           //S2 jawaban_a Sanguin
   //  $s2_prodi_tl3_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_tl3_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_tl3_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_tl3_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tl3_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_tl3_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tl3_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_tl3_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tl3_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_tl3_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tl3_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_tl3_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tl3_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_tl3_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D3 Teknik Listrik Wirausaha=".number_format($s2_prodi_tl3_wirausaha, dec())."<br>";
   //  echo "S2 Prodi D3 Teknik Listrik Kemanusiaan=".number_format($s2_prodi_tl3_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Listrik SENIOR=".number_format($s2_prodi_tl3_senior, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Listrik MAPALA=".number_format($s2_prodi_tl3_mapala, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Listrik Persma=".number_format($s2_prodi_tl3_persma, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Listrik Bahasa=".number_format($s2_prodi_tl3_bahasa, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Listrik Pramuka=".number_format($s2_prodi_tl3_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //   //S2 jawaban_a Sanguin
   //  $s2_prodi_tmk3_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_tmk3_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_tmk3_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_tmk3_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tmk3_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_tmk3_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tmk3_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_tmk3_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tmk3_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_tmk3_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tmk3_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_tmk3_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tmk3_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_tmk3_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D3 Teknik Mekatronika Wirausaha=".number_format($s2_prodi_tmk3_wirausaha, dec())."<br>";
   //  echo "S2 Prodi D3 Teknik Mekatronika Kemanusiaan=".number_format($s2_prodi_tmk3_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Mekatronika SENIOR=".number_format($s2_prodi_tmk3_senior, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Mekatronika MAPALA=".number_format($s2_prodi_tmk3_mapala, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Mekatronika Persma=".number_format($s2_prodi_tmk3_persma, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Mekatronika Bahasa=".number_format($s2_prodi_tmk3_bahasa, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Mekatronika Pramuka=".number_format($s2_prodi_tmk3_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //      //S2 jawaban_a Sanguin
   //  $s2_prodi_tm_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_tm_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_tm_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_tm_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tm_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_tm_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tm_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_tm_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tm_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_tm_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tm_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_tm_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tm_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_tm_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D3 Teknik Mesin Wirausaha=".number_format($s2_prodi_tm_wirausaha, dec())."<br>";
   //  echo "S2 Prodi D3 Teknik Mesin Kemanusiaan=".number_format($s2_prodi_tm_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Mesin SENIOR=".number_format($s2_prodi_tm_senior, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Mesin MAPALA=".number_format($s2_prodi_tm_mapala, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Mesin Persma=".number_format($s2_prodi_tm_persma, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Mesin Bahasa=".number_format($s2_prodi_tm_bahasa, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Mesin Pramuka=".number_format($s2_prodi_tm_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //         //S2 jawaban_a Sanguin
   //  $s2_prodi_to_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_to_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_to_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_to_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_to_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_to_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_to_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_to_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_to_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_to_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_to_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_to_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_to_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_to_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D3 Teknik Otomotif Wirausaha=".number_format($s2_prodi_to_wirausaha, dec())."<br>";
   //  echo "S2 Prodi D3 Teknik Otomotif Kemanusiaan=".number_format($s2_prodi_to_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Otomotif SENIOR=".number_format($s2_prodi_to_senior, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Otomotif MAPALA=".number_format($s2_prodi_to_mapala, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Otomotif Persma=".number_format($s2_prodi_to_persma, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Otomotif Bahasa=".number_format($s2_prodi_to_bahasa, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Otomotif Pramuka=".number_format($s2_prodi_to_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //            //S2 jawaban_a Sanguin
   //  $s2_prodi_tpab_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_tpab_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_tpab_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_tpab_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tpab_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_tpab_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tpab_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_tpab_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tpab_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_tpab_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tpab_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_tpab_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tpab_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_tpab_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D3 Teknik Perawatan Alat Berat Wirausaha=".number_format($s2_prodi_tpab_wirausaha, dec())."<br>";
   //  echo "S2 Prodi D3 Teknik Perawatan Alat Berat Kemanusiaan=".number_format($s2_prodi_tpab_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Perawatan Alat Berat SENIOR=".number_format($s2_prodi_tpab_senior, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Perawatan Alat Berat MAPALA=".number_format($s2_prodi_tpab_mapala, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Perawatan Alat Berat Persma=".number_format($s2_prodi_tpab_persma, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Perawatan Alat Berat Bahasa=".number_format($s2_prodi_tpab_bahasa, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Perawatan Alat Berat Pramuka=".number_format($s2_prodi_tpab_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //    //S2 jawaban_a Sanguin
   //  $s2_prodi_ts_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_ts_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_ts_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_ts_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ts_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_ts_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ts_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_ts_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ts_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_ts_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ts_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_ts_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ts_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_ts_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D3 Teknik Sipil Wirausaha=".number_format($s2_prodi_ts_wirausaha, dec())."<br>";
   //  echo "S2 Prodi D3 Teknik Sipil Kemanusiaan=".number_format($s2_prodi_ts_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Sipil SENIOR=".number_format($s2_prodi_ts_senior, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Sipil MAPALA=".number_format($s2_prodi_ts_mapala, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Sipil Persma=".number_format($s2_prodi_ts_persma, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Sipil Bahasa=".number_format($s2_prodi_ts_bahasa, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Sipil Pramuka=".number_format($s2_prodi_ts_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //      //S2 jawaban_a Sanguin
   //  $s2_prodi_ttl_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_ttl_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_ttl_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_ttl_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ttl_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_ttl_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ttl_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_ttl_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ttl_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_ttl_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ttl_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_ttl_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ttl_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_ttl_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D3 Teknik Telekomunikasi Wirausaha=".number_format($s2_prodi_ttl_wirausaha, dec())."<br>";
   //  echo "S2 Prodi D3 Teknik Telekomunikasi Kemanusiaan=".number_format($s2_prodi_ttl_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Telekomunikasi SENIOR=".number_format($s2_prodi_ttl_senior, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Telekomunikasi MAPALA=".number_format($s2_prodi_ttl_mapala, dec())."<br>";
   //      echo "S2 JProdi D3 Teknik Telekomunikasi Persma=".number_format($s2_prodi_ttl_persma, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Telekomunikasi Bahasa=".number_format($s2_prodi_ttl_bahasa, dec())."<br>";
   //      echo "S2 Prodi D3 Teknik Telekomunikasi Pramuka=".number_format($s2_prodi_ttl_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //      //S2 jawaban_a Sanguin
   //  $s2_prodi_ab4_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_ab4_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_ab4_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_ab4_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ab4_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_ab4_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ab4_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_ab4_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ab4_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_ab4_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ab4_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_ab4_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_ab4_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_ab4_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D4 Administrasi Bisnis Wirausaha=".number_format($s2_prodi_ab4_wirausaha, dec())."<br>";
   //  echo "S2 Prodi D4 Administrasi Bisnis Kemanusiaan=".number_format($s2_prodi_ab4_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D4 Administrasi Bisnis SENIOR=".number_format($s2_prodi_ab4_senior, dec())."<br>";
   //      echo "S2 Prodi D4 Administrasi Bisnis MAPALA=".number_format($s2_prodi_ab4_mapala, dec())."<br>";
   //      echo "S2 Prodi D4 Administrasi Bisnis Persma=".number_format($s2_prodi_ab4_persma, dec())."<br>";
   //      echo "S2 Prodi D4 Administrasi Bisnis Bahasa=".number_format($s2_prodi_ab4_bahasa, dec())."<br>";
   //      echo "S2 Prodi D4 Administrasi Bisnis Pramuka=".number_format($s2_prodi_ab4_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //          //S2 jawaban_a Sanguin
   //  $s2_prodi_akm_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_akm_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_akm_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_akm_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_akm_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_akm_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_akm_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_akm_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_akm_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_akm_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_akm_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_akm_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_akm_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_akm_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D4 Akuntansi Manajerial Wirausaha=".number_format($s2_prodi_akm_wirausaha, dec())."<br>";
   //  echo "S2 Prodi D4 Akuntansi Manajerial Kemanusiaan=".number_format($s2_prodi_akm_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D4 Akuntansi Manajerial SENIOR=".number_format($s2_prodi_akm_senior, dec())."<br>";
   //      echo "S2 Prodi D4 Akuntansi Manajerial MAPALA=".number_format($s2_prodi_akm_mapala, dec())."<br>";
   //      echo "S2 Prodi D4 Akuntansi Manajerial Persma=".number_format($s2_prodi_akm_persma, dec())."<br>";
   //      echo "S2 Prodi D4 Akuntansi Manajerial Bahasa=".number_format($s2_prodi_akm_bahasa, dec())."<br>";
   //      echo "S2 Prodi D4 Akuntansi Manajerial Pramuka=".number_format($s2_prodi_akm_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //   //S2 jawaban_a Sanguin
   //  $s2_prodi_tk4_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_tk4_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_tk4_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_tk4_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tk4_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_tk4_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tk4_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_tk4_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tk4_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_tk4_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tk4_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_tk4_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tk4_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_tk4_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D4 Teknik Kimia Wirausaha=".number_format($s2_prodi_tk4_wirausaha, dec())."<br>";
   //  echo "S2 JProdi D4 Teknik Kimia Kemanusiaan=".number_format($s2_prodi_tk4_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Kimia SENIOR=".number_format($s2_prodi_tk4_senior, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Kimia MAPALA=".number_format($s2_prodi_tk4_mapala, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Kimia Persma=".number_format($s2_prodi_tk4_persma, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Kimia Bahasa=".number_format($s2_prodi_tk4_bahasa, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Kimia Bahasa=".number_format($s2_prodi_tk4_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //      //S2 jawaban_a Sanguin
   //  $s2_prodi_tkj_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_tkj_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_tkj_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_tkj_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tkj_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_tkj_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tkj_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_tkj_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tkj_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_tkj_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tkj_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_tkj_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tkj_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_tkj_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D4 Teknik Komputer dan Jaringan Wirausaha=".number_format($s2_prodi_tkj_wirausaha, dec())."<br>";
   //  echo "S2 Prodi D4 Teknik Komputer dan Jaringan Kemanusiaan=".number_format($s2_prodi_tkj_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Komputer dan Jaringan SENIOR=".number_format($s2_prodi_tkj_senior, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Komputer dan Jaringan MAPALA=".number_format($s2_prodi_tkj_mapala, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Komputer dan Jaringan Persma=".number_format($s2_prodi_tkj_persma, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Komputer dan Jaringan Bahasa=".number_format($s2_prodi_tkj_bahasa, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Komputer dan Jaringan Pramuka=".number_format($s2_prodi_tkj_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tks4_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_tks4_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_tks4_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_tks4_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tks4_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_tks4_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tks4_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_tks4_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tks4_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_tks4_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tks4_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_tks4_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tks4_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_tks4_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D4 Teknik Konstruksi Wirausaha=".number_format($s2_prodi_tks4_wirausaha, dec())."<br>";
   //  echo "S2 Prodi D4 Teknik Konstruksi Kemanusiaan=".number_format($s2_prodi_tks4_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Konstruksi SENIOR=".number_format($s2_prodi_tks4_senior, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Konstruksi MAPALA=".number_format($s2_prodi_tks4_mapala, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Konstruksi Persma=".number_format($s2_prodi_tks4_persma, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Konstruksi Bahasa=".number_format($s2_prodi_tks4_bahasa, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Konstruksi Pramuka=".number_format($s2_prodi_tks4_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tl4_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_tl4_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_tl4_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_tl4_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tl4_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_tl4_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tl4_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_tl4_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tl4_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_tl4_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tl4_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_tl4_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tl4_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_tl4_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D4 Teknik Listrik Wirausaha=".number_format($s2_prodi_tl4_wirausaha, dec())."<br>";
   //  echo "S2 Prodi D4 Teknik Listrik Kemanusiaan=".number_format($s2_prodi_tl4_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Listrik SENIOR==".number_format($s2_prodi_tl4_senior, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Listrik MAPALA=".number_format($s2_prodi_tl4_mapala, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Listrik Persma=".number_format($s2_prodi_tl4_persma, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Listrik Bahasa=".number_format($s2_prodi_tl4_bahasa, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Listrik Pramuka=".number_format($s2_prodi_tl4_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //      //S2 jawaban_a Sanguin
   //  $s2_prodi_tmf4_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_tmf4_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_tmf4_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_tmf4_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tmf4_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_tmf4_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tmf4_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_tmf4_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tmf4_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_tmf4_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tmf4_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_tmf4_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tmf4_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_tmf4_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D4 Teknik Manufaktur Wirausaha=".number_format($s2_prodi_tmf4_wirausaha, dec())."<br>";
   //  echo "S2 Prodi D4 Teknik Manufaktur Kemanusiaan=".number_format($s2_prodi_tmf4_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Manufaktur SENIOR=".number_format($s2_prodi_tmf4_senior, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Manufaktur MAPALA=".number_format($s2_prodi_tmf4_mapala, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Manufaktur Persma=".number_format($s2_prodi_tmf4_persma, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Manufaktur Bahasa=".number_format($s2_prodi_tmf4_bahasa, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Manufaktur Pramuka=".number_format($s2_prodi_tmf4_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //         //S2 jawaban_a Sanguin
   //  $s2_prodi_tmk4_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_tmk4_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_tmk4_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_tmk4_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tmk4_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_tmk4_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tmk4_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_tmk4_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tmk4_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_tmk4_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tmk4_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_tmk4_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tmk4_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_tmk4_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "Prodi D4 Teknik Mekatronika Wirausaha=".number_format($s2_prodi_tmk4_wirausaha, dec())."<br>";
   //  echo "S2 Prodi D4 Teknik Mekatronika Kemanusiaan=".number_format($s2_prodi_tmk4_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Mekatronika SENIOR=".number_format($s2_prodi_tmk4_senior, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Mekatronika MAPALA==".number_format($s2_prodi_tmk4_mapala, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Mekatronika Persma=".number_format($s2_prodi_tmk4_persma, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Mekatronika Bahasa=".number_format($s2_prodi_tmk4_bahasa, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Mekatronika Pramuka=".number_format($s2_prodi_tmk4_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tmj_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_tmj_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_tmj_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_tmk4_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tmj_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_tmj_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tmj_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_tmj_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tmj_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_tmj_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tmj_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_tmj_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tmj_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_tmj_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D4 Teknik Multimedia dan Jaringan Wirausaha=".number_format($s2_prodi_tmj_wirausaha, dec())."<br>";
   //  echo "Prodi D4 Teknik Multimedia dan Jaringan Kemanusiaan=".number_format($s2_prodi_tmj_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Multimedia dan Jaringan SENIOR=".number_format($s2_prodi_tmj_senior, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Multimedia dan Jaringan MAPALA=".number_format($s2_prodi_tmj_mapala, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Multimedia dan Jaringan Persma=".number_format($s2_prodi_tmj_persma, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Multimedia dan Jaringan Bahasa=".number_format($s2_prodi_tmj_bahasa, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Multimedia dan Jaringan Pramuka=".number_format($s2_prodi_tmj_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //      //S2 jawaban_a Sanguin
   //  $s2_prodi_tpe_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_tpe_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_tpe_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_tpe_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tpe_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_tpe_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tpe_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_tpe_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tpe_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_tpe_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tpe_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_tpe_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tpe_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_tpe_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D4 Teknik Pembangkit Energi Wirausaha=".number_format($s2_prodi_tpe_wirausaha, dec())."<br>";
   //  echo "S2 Prodi D4 Teknik Pembangkit Energi Kemanusiaan=".number_format($s2_prodi_tpe_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Pembangkit Energi SENIOR=".number_format($s2_prodi_tpe_senior, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Pembangkit Energi MAPALA=".number_format($s2_prodi_tpe_mapala, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Pembangkit Energi Persma=".number_format($s2_prodi_tpe_persma, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Pembangkit Energi Bahasa=".number_format($s2_prodi_tpe_bahasa, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Pembangkit Energi Pramuka=".number_format($s2_prodi_tpe_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //           //S2 jawaban_a Sanguin
   //  $s2_prodi_tki_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_tki_wirausaha, $jumlah_wirausaha);
   //  ///S2 jawaban_a Sanguin
   //  $s2_prodi_tki_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_tki_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tki_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_tki_senior, $jumlah_senior);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tki_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_tki_mapala, $jumlah_mapala);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tki_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_tki_persma, $jumlah_persma);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tki_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_tki_bahasa, $jumlah_bahasa);
   //  //S2 jawaban_a Sanguin
   //  $s2_prodi_tki_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_tki_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Prodi D4 Teknik Kimia Industri Wirausaha=".number_format($s2_prodi_tki_wirausaha, dec())."<br>";
   //  echo "S2 Prodi D4 Teknik Kimia Industri Kemanusiaan=".number_format($s2_prodi_tki_kemanusiaan, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Kimia Industri SENIOR=".number_format($s2_prodi_tki_senior, dec())."<br>";
   //      echo "S2 rodi D4 Teknik Kimia Industri MAPALA=".number_format($s2_prodi_tki_mapala, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Kimia Industri Persma=".number_format($s2_prodi_tki_persma, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Kimia Industri Bahasa=".number_format($s2_prodi_tki_bahasa, dec())."<br>";
   //      echo "S2 Prodi D4 Teknik Kimia Industri Pramuka=".number_format($s2_prodi_tki_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S jawaban_a Sanguin
   //  $s_prodi_ab3_wirausaha = sqrt($s2_prodi_ab3_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_ab3_kemanusiaan = sqrt($s2_prodi_ab3_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_ab3_senior = sqrt($s2_prodi_ab3_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_ab3_mapala = sqrt($s2_prodi_ab3_mapala);
   //  $s_prodi_ab3_persma = sqrt($s2_prodi_ab3_persma);
   //  $s_prodi_ab3_bahasa = sqrt($s2_prodi_ab3_bahasa);
   //  $s_prodi_ab3_pramuka = sqrt($s2_prodi_ab3_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_ab3_wirausaha = pow($s2_prodi_ab3_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_ab3_kemanusiaan = pow($s2_prodi_ab3_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_ab3_senior = pow($s2_prodi_ab3_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_ab3_mapala = pow($s2_prodi_ab3_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_ab3_persma = pow($s2_prodi_ab3_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_ab3_bahasa = pow($s2_prodi_ab3_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_ab3_pramuka = pow($s2_prodi_ab3_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D3 Administrasi Bisnis Wirausaha=".number_format($s_prodi_ab3_wirausaha, dec())."<br>";
   //  echo "S Prodi D3 Administrasi Bisnis Kemanusiaan=".number_format($s_prodi_ab3_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D3 Administrasi Bisnis SENIOR=".number_format($s_prodi_ab3_senior, dec())."<br>";
   //      echo "S Prodi D3 Administrasi Bisnis MAPALA=".number_format($s_prodi_ab3_mapala, dec())."<br>";
   //      echo "S Prodi D3 Administrasi Bisnis Persma=".number_format($s_prodi_ab3_persma, dec())."<br>";
   //      echo "S Prodi D3 Administrasi Bisnis Bahasa=".number_format($s_prodi_ab3_bahasa, dec())."<br>";
   //      echo "S Prodi D3 Administrasi Bisnis Pramuka=".number_format($s_prodi_ab3_pramuka, dec())."<br>";
   //      }

   //      //S jawaban_a Sanguin
   //  $s_prodi_ak3_wirausaha = sqrt($s2_prodi_ak3_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_ak3_kemanusiaan = sqrt($s2_prodi_ak3_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_ak3_senior = sqrt($s2_prodi_ak3_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_ak3_mapala = sqrt($s2_prodi_ak3_mapala);
   //  $s_prodi_ak3_persma = sqrt($s2_prodi_ak3_persma);
   //  $s_prodi_ak3_bahasa = sqrt($s2_prodi_ak3_bahasa);
   //  $s_prodi_ak3_pramuka = sqrt($s2_prodi_ak3_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_ak3_wirausaha = pow($s2_prodi_ak3_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_ak3_kemanusiaan = pow($s2_prodi_ak3_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_ak3_senior = pow($s2_prodi_ak3_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_ak3_mapala = pow($s2_prodi_ak3_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_ak3_persma = pow($s2_prodi_ak3_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_ak3_bahasa = pow($s2_prodi_ak3_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_ak3_pramuka = pow($s2_prodi_ak3_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D3 Akuntansi Wirausaha=".number_format($s_prodi_ak3_wirausaha, dec())."<br>";
   //  echo "S Prodi D3 Akuntansi Kemanusiaan=".number_format($s_prodi_ak3_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D3 Akuntansi SENIOR=".number_format($s_prodi_ak3_senior, dec())."<br>";
   //      echo "S Prodi D3 Akuntansi MAPALA=".number_format($s_prodi_ak3_mapala, dec())."<br>";
   //      echo "S Prodi D3 Akuntansi Persma=".number_format($s_prodi_ak3_persma, dec())."<br>";
   //      echo "S Prodi D3 Akuntansi Bahasa=".number_format($s_prodi_ak3_bahasa, dec())."<br>";
   //      echo "S Prodi D3 Akuntansi Pramuka=".number_format($s_prodi_ak3_pramuka, dec())."<br>";
   //      }
   //         //S jawaban_a Sanguin
   //  $s_prodi_ank_wirausaha = sqrt($s2_prodi_ank_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_ank_kemanusiaan = sqrt($s2_prodi_ank_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_ank_senior = sqrt($s2_prodi_ank_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_ank_mapala = sqrt($s2_prodi_ank_mapala);
   //  $s_prodi_ank_persma = sqrt($s2_prodi_ank_persma);
   //  $s_prodi_ank_bahasa = sqrt($s2_prodi_ank_bahasa);
   //  $s_prodi_ank_pramuka = sqrt($s2_prodi_ank_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_ank_wirausaha = pow($s2_prodi_ank_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_ank_kemanusiaan = pow($s2_prodi_ank_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_ank_senior = pow($s2_prodi_ank_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_ank_mapala = pow($s2_prodi_ank_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_ank_persma = pow($s2_prodi_ank_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_ank_bahasa = pow($s2_prodi_ank_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_ank_pramuka = pow($s2_prodi_ank_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D3 Analisis Kimia Wirausaha=".number_format($s_prodi_ank_wirausaha, dec())."<br>";
   //  echo "S Prodi D3 Analisis Kimia Kemanusiaan=".number_format($s_prodi_ank_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D3 Analisis Kimia SENIOR=".number_format($s_prodi_ank_senior, dec())."<br>";
   //      echo "S Prodi D3 Analisis Kimia MAPALA=".number_format($s_prodi_ank_mapala, dec())."<br>";
   //      echo "S Prodi D3 Analisis Kimia Persma=".number_format($s_prodi_ank_persma, dec())."<br>";
   //      echo "S Prodi D3 Analisis Kimia Bahasa=".number_format($s_prodi_ank_bahasa, dec())."<br>";
   //      echo "S Prodi D3 Analisis Kimia Pramuka=".number_format($s_prodi_ank_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_a Sanguin
   //  $s_prodi_te_wirausaha = sqrt($s2_prodi_te_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_te_kemanusiaan = sqrt($s2_prodi_te_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_te_senior = sqrt($s2_prodi_te_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_te_mapala = sqrt($s2_prodi_te_mapala);
   //  $s_prodi_te_persma = sqrt($s2_prodi_te_persma);
   //  $s_prodi_te_bahasa = sqrt($s2_prodi_te_bahasa);
   //  $s_prodi_te_pramuka = sqrt($s2_prodi_te_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_te_wirausaha = pow($s2_prodi_te_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_te_kemanusiaan = pow($s2_prodi_te_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_te_senior = pow($s2_prodi_te_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_te_mapala = pow($s2_prodi_te_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_te_persma = pow($s2_prodi_te_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_te_bahasa = pow($s2_prodi_te_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_te_pramuka = pow($s2_prodi_te_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D3 Teknik Elektronika Wirausaha=".number_format($s_prodi_te_wirausaha, dec())."<br>";
   //  echo "S Prodi D3 Teknik Elektronika Kemanusiaan=".number_format($s_prodi_te_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D3 Teknik Elektronika SENIOR=".number_format($s_prodi_te_senior, dec())."<br>";
   //      echo "S Prodi D3 Teknik Elektronika MAPALA=".number_format($s_prodi_te_mapala, dec())."<br>";
   //      echo "S Prodi D3 Teknik Elektronika Persma=".number_format($s_prodi_te_persma, dec())."<br>";
   //      echo "S Prodi D3 Teknik Elektronika Bahasa=".number_format($s_prodi_te_bahasa, dec())."<br>";
   //      echo "S Prodi D3 Teknik Elektronika Pramuka=".number_format($s_prodi_te_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_a Sanguin
   //  $s_prodi_tk3_wirausaha = sqrt($s2_prodi_tk3_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_tk3_kemanusiaan = sqrt($s2_prodi_tk3_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_tk3_senior = sqrt($s2_prodi_tk3_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_tk3_mapala = sqrt($s2_prodi_tk3_mapala);
   //  $s_prodi_tk3_persma = sqrt($s2_prodi_tk3_persma);
   //  $s_prodi_tk3_bahasa = sqrt($s2_prodi_tk3_bahasa);
   //  $s_prodi_tk3_pramuka = sqrt($s2_prodi_tk3_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_tk3_wirausaha = pow($s2_prodi_tk3_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_tk3_kemanusiaan = pow($s2_prodi_tk3_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_tk3_senior = pow($s2_prodi_tk3_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tk3_mapala = pow($s2_prodi_tk3_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tk3_persma = pow($s2_prodi_tk3_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tk3_bahasa = pow($s2_prodi_tk3_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tk3_pramuka = pow($s2_prodi_tk3_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D3 Teknik Kimia Wirausaha=".number_format($s_prodi_tk3_wirausaha, dec())."<br>";
   //  echo "S Prodi D3 Teknik Kimia Kemanusiaan=".number_format($s_prodi_tk3_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D3 Teknik Kimia SENIOR=".number_format($s_prodi_tk3_senior, dec())."<br>";
   //      echo "S Prodi D3 Teknik Kimia MAPALA=".number_format($s_prodi_tk3_mapala, dec())."<br>";
   //      echo "S Prodi D3 Teknik Kimia Persma=".number_format($s_prodi_tk3_persma, dec())."<br>";
   //      echo "S Prodi D3 Teknik Kimia Bahasa=".number_format($s_prodi_tk3_bahasa, dec())."<br>";
   //      echo "S Prodi D3 Teknik Kimia Pramuka=".number_format($s_prodi_tk3_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_a Sanguin
   //  $s_prodi_tkm_wirausaha = sqrt($s2_prodi_tkm_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_tkm_kemanusiaan = sqrt($s2_prodi_tkm_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_tkm_senior = sqrt($s2_prodi_tkm_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_tkm_mapala = sqrt($s2_prodi_tkm_mapala);
   //  $s_prodi_tkm_persma = sqrt($s2_prodi_tkm_persma);
   //  $s_prodi_tkm_bahasa = sqrt($s2_prodi_tkm_bahasa);
   //  $s_prodi_tkm_pramuka = sqrt($s2_prodi_tkm_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_tkm_wirausaha = pow($s2_prodi_tkm_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_tkm_kemanusiaan = pow($s2_prodi_tkm_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_tkm_senior = pow($s2_prodi_tkm_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tkm_mapala = pow($s2_prodi_tkm_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tkm_persma = pow($s2_prodi_tkm_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tkm_bahasa = pow($s2_prodi_tkm_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tkm_pramuka = pow($s2_prodi_tkm_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D3 Teknik Kimia Mineral Wirausaha=".number_format($s_prodi_tkm_wirausaha, dec())."<br>";
   //  echo "S Prodi D3 Teknik Kimia Mineral Kemanusiaan=".number_format($s_prodi_tkm_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D3 Teknik Kimia Mineral SENIOR=".number_format($s_prodi_tkm_senior, dec())."<br>";
   //      echo "S Prodi D3 Teknik Kimia Mineral MAPALA=".number_format($s_prodi_tkm_mapala, dec())."<br>";
   //      echo "S Prodi D3 Teknik Kimia Mineral Persma=".number_format($s_prodi_tkm_persma, dec())."<br>";
   //      echo "S Prodi D3 Teknik Kimia Mineral Bahasa=".number_format($s_prodi_tkm_bahasa, dec())."<br>";
   //      echo "S Prodi D3 Teknik Kimia Mineral Pramuka=".number_format($s_prodi_tkm_pramuka, dec())."<br>";
   //      }
        

   //  //S jawaban_a Sanguin
   //  $s_prodi_tks3_wirausaha = sqrt($s2_prodi_tks3_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_tks3_kemanusiaan = sqrt($s2_prodi_tks3_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_tks3_senior = sqrt($s2_prodi_tks3_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_tks3_mapala = sqrt($s2_prodi_tks3_mapala);
   //  $s_prodi_tks3_persma = sqrt($s2_prodi_tks3_persma);
   //  $s_prodi_tks3_bahasa = sqrt($s2_prodi_tks3_bahasa);
   //  $s_prodi_tks3_pramuka = sqrt($s2_prodi_tks3_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_tks3_wirausaha = pow($s2_prodi_tks3_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_tks3_kemanusiaan = pow($s2_prodi_tks3_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_tks3_senior = pow($s2_prodi_tks3_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tks3_mapala = pow($s2_prodi_tks3_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tks3_persma = pow($s2_prodi_tks3_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tks3_bahasa = pow($s2_prodi_tks3_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tks3_pramuka = pow($s2_prodi_tks3pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D3 Teknik Konstruksi Wirausaha=".number_format($s_prodi_tks3_wirausaha, dec())."<br>";
   //  echo "S Prodi D3 Teknik Konstruksi Kemanusiaan=".number_format($s_prodi_tks3_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D3 Teknik Konstruksi SENIOR=".number_format($s_prodi_tks3_senior, dec())."<br>";
   //      echo "S Prodi D3 Teknik Konstruksi MAPALA=".number_format($s_prodi_tks3_mapala, dec())."<br>";
   //      echo "S Prodi D3 Teknik Konstruksi Persma=".number_format($s_prodi_tks3_persma, dec())."<br>";
   //      echo "S Prodi D3 Teknik Konstruksi Bahasa=".number_format($s_prodi_tks3_bahasa, dec())."<br>";
   //      echo "S Prodi D3 Teknik Konstruksi Pramuka=".number_format($s_prodi_tks3_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_a Sanguin
   //  $s_prodi_tkg_wirausaha = sqrt($s2_prodi_tkg_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_tkg_kemanusiaan = sqrt($s2_prodi_tkg_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_tkg_senior = sqrt($s2_prodi_tkg_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_tkg_mapala = sqrt($s2_prodi_tkg_mapala);
   //  $s_prodi_tkg_persma = sqrt($s2_prodi_tkg_persma);
   //  $s_prodi_tkg_bahasa = sqrt($s2_prodi_tkg_bahasa);
   //  $s_prodi_tkg_pramuka = sqrt($s2_prodi_tkg_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_tkg_wirausaha = pow($s2_prodi_tkg_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_tkg_kemanusiaan = pow($s2_prodi_tkg_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_tkg_senior = pow($s2_prodi_tkg_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tkg_mapala = pow($s2_prodi_tkg_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tkg_persma = pow($s2_prodi_tkg_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tkg_bahasa = pow($s2_prodi_tkg_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tkg_pramuka = pow($s2_prodi_tkg_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D3 Teknik Konstruksi Gedung Wirausaha=".number_format($s_prodi_tkg_wirausaha, dec())."<br>";
   //  echo "S Prodi D3 Teknik Konstruksi Gedung Kemanusiaan=".number_format($s_prodi_tkg_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D3 Teknik Konstruksi Gedung SENIOR=".number_format($s_prodi_tkg_senior, dec())."<br>";
   //      echo "S Prodi D3 Teknik Konstruksi Gedung MAPALA=".number_format($s_prodi_tkg_mapala, dec())."<br>";
   //      echo "S Prodi D3 Teknik Konstruksi Gedung Persma=".number_format($s_prodi_tkg_persma, dec())."<br>";
   //      echo "S Prodi D3 Teknik Konstruksi Gedung Bahasa=".number_format($s_prodi_tkg_bahasa, dec())."<br>";
   //      echo "S Prodi D3 Teknik Konstruksi Gedung Pramuka=".number_format($s_prodi_tkg_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_a Sanguin
   //  $s_prodi_tkjj_wirausaha = sqrt($s2_prodi_tkjj_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_tkjj_kemanusiaan = sqrt($s2_prodi_tkjj_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_tkjj_senior = sqrt($s2_prodi_tkjj_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_tkjj_mapala = sqrt($s2_prodi_tkjj_mapala);
   //  $s_prodi_tkjj_persma = sqrt($s2_prodi_tkjj_persma);
   //  $s_prodi_tkjj_bahasa = sqrt($s2_prodi_tkjj_bahasa);
   //  $s_prodi_tkjj_pramuka = sqrt($s2_prodi_tkjj_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_tkjj_wirausaha = pow($s2_prodi_tkjj_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_tkjj_kemanusiaan = pow($s2_prodi_tkjj_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_tkjj_senior = pow($s2_prodi_tkjj_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tkjj_mapala = pow($s2_prodi_tkjj_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tkjj_persma = pow($s2_prodi_tkjj_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tkjj_bahasa = pow($s2_prodi_tkjj_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tkjj_pramuka = pow($s2_prodi_tkjj_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D3 Teknik Konstruksi Jalan dan Jembatan Wirausaha=".number_format($s_prodi_tkjj_wirausaha, dec())."<br>";
   //  echo "S Prodi D3 Teknik Konstruksi Jalan dan Jembatan Kemanusiaan=".number_format($s_prodi_tkjj_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D3 Teknik Konstruksi Jalan dan Jembatan SENIOR=".number_format($s_prodi_tkjj_senior, dec())."<br>";
   //      echo "S Prodi D3 Teknik Konstruksi Jalan dan Jembatan MAPALA=".number_format($s_prodi_tkjj_mapala, dec())."<br>";
   //      echo "S Prodi D3 Teknik Konstruksi Jalan dan Jembatan Persma=".number_format($s_prodi_tkjj_persma, dec())."<br>";
   //      echo "S Prodi D3 Teknik Konstruksi Jalan dan Jembatan Bahasa=".number_format($s_prodi_tkjj_bahasa, dec())."<br>";
   //      echo "S Prodi D3 Teknik Konstruksi Jalan dan Jembatan Pramuka=".number_format($s_prodi_tkjj_pramuka, dec())."<br>";
   //      }

   //      //S jawaban_a Sanguin
   //  $s_prodi_tke_wirausaha = sqrt($s2_prodi_tke_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_tke_kemanusiaan = sqrt($s2_prodi_tke_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_tke_senior = sqrt($s2_prodi_tke_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_tke_mapala = sqrt($s2_prodi_tke_mapala);
   //  $s_prodi_tke_persma = sqrt($s2_prodi_tke_persma);
   //  $s_prodi_tke_bahasa = sqrt($s2_prodi_tke_bahasa);
   //  $s_prodi_tke_pramuka = sqrt($s2_prodi_tke_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_tke_wirausaha = pow($s2_prodi_tke_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_tke_kemanusiaan = pow($s2_prodi_tke_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_tke_senior = pow($s2_prodi_tke_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tke_mapala = pow($s2_prodi_tke_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tke_persma = pow($s2_prodi_tke_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tke_bahasa = pow($s2_prodi_tke_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tke_pramuka = pow($s2_prodi_tke_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D3 Teknik Konversi Energi Wirausaha=".number_format($s_prodi_tke_wirausaha, dec())."<br>";
   //  echo "S Prodi D3 Teknik Konversi Energi Kemanusiaan=".number_format($s_prodi_tke_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D3 Teknik Konversi Energi SENIOR=".number_format($s_prodi_tke_senior, dec())."<br>";
   //      echo "S Prodi D3 Teknik Konversi Energi MAPALA=".number_format($s_prodi_tke_mapala, dec())."<br>";
   //      echo "S Prodi D3 Teknik Konversi Energi Persma=".number_format($s_prodi_tke_persma, dec())."<br>";
   //      echo "S Prodi D3 Teknik Konversi Energi Bahasa=".number_format($s_prodi_tke_bahasa, dec())."<br>";
   //      echo "S Prodi D3 Teknik Konversi Energi Pramuka=".number_format($s_prodi_tke_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_a Sanguin
   //  $s_prodi_tl3_wirausaha = sqrt($s2_prodi_tl3_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_tl3_kemanusiaan = sqrt($s2_prodi_tl3_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_tl3_senior = sqrt($s2_prodi_tl3_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_tl3_mapala = sqrt($s2_prodi_tl3_mapala);
   //  $s_prodi_tl3_persma = sqrt($s2_prodi_tl3_persma);
   //  $s_prodi_tl3_bahasa = sqrt($s2_prodi_tl3_bahasa);
   //  $s_prodi_tl3_pramuka = sqrt($s2_prodi_tl3_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_tl3_wirausaha = pow($s2_prodi_tl3_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_tl3_kemanusiaan = pow($s2_prodi_tl3_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_tl3_senior = pow($s2_prodi_tl3_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tl3_mapala = pow($s2_prodi_tl3_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tl3_persma = pow($s2_prodi_tl3_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tl3_bahasa = pow($s2_prodi_tl3_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tl3_pramuka = pow($s2_prodi_tl3_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D3 Teknik Listrik Wirausaha=".number_format($s_prodi_tl3_wirausaha, dec())."<br>";
   //  echo "S Prodi D3 Teknik Listrik Kemanusiaan=".number_format($s_prodi_tl3_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D3 Teknik Listrik SENIOR=".number_format($s_prodi_tl3_senior, dec())."<br>";
   //      echo "S Prodi D3 Teknik Listrik MAPALA=".number_format($s_prodi_tl3_mapala, dec())."<br>";
   //      echo "S Prodi D3 Teknik Listrik Persma=".number_format($s_prodi_tl3_persma, dec())."<br>";
   //      echo "S Prodi D3 Teknik Listrik Bahasa=".number_format($s_prodi_tl3_bahasa, dec())."<br>";
   //      echo "S Prodi D3 Teknik Listrik Pramuka=".number_format($s_prodi_tl3_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_a Sanguin
   //  $s_prodi_tmk3_wirausaha = sqrt($s2_prodi_tmk3_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_tmk3_kemanusiaan = sqrt($s2_prodi_tmk3_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_tmk3_senior = sqrt($s2_prodi_tmk3_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_tmk3_mapala = sqrt($s2_prodi_tmk3_mapala);
   //  $s_prodi_tmk3_persma = sqrt($s2_prodi_tmk3_persma);
   //  $s_prodi_tmk3_bahasa = sqrt($s2_prodi_tmk3_bahasa);
   //  $s_prodi_tmk3_pramuka = sqrt($s2_prodi_tmk3_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_tmk3_wirausaha = pow($s2_prodi_tmk3_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_tmk3_kemanusiaan = pow($s2_prodi_tmk3_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_tmk3_senior = pow($s2_prodi_tmk3_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tmk3_mapala = pow($s2_prodi_tmk3_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tmk3_persma = pow($s2_prodi_tmk3_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tmk3_bahasa = pow($s2_prodi_tmk3_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tmk3_pramuka = pow($s2_prodi_tmk3_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D3 Teknik Mekatronika Wirausaha=".number_format($s_prodi_tmk3_wirausaha, dec())."<br>";
   //  echo "S Prodi D3 Teknik Mekatronika Kemanusiaan=".number_format($s_prodi_tmk3_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D3 Teknik Mekatronika SENIOR=".number_format($s_prodi_tmk3_senior, dec())."<br>";
   //      echo "S Prodi D3 Teknik Mekatronika MAPALA=".number_format($s_prodi_tmk3_mapala, dec())."<br>";
   //      echo "S Prodi D3 Teknik Mekatronika Persma=".number_format($s_prodi_tmk3_persma, dec())."<br>";
   //      echo "S Prodi D3 Teknik Mekatronika Bahasa=".number_format($s_prodi_tmk3_bahasa, dec())."<br>";
   //      echo "S Prodi D3 Teknik Mekatronika Pramuka=".number_format($s_prodi_tmk3_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_a Sanguin
   //  $s_prodi_tm_wirausaha = sqrt($s2_prodi_tm_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_tm_kemanusiaan = sqrt($s2_prodi_tm_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_tm_senior = sqrt($s2_prodi_tm_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_tm_mapala = sqrt($s2_prodi_tm_mapala);
   //  $s_prodi_tm_persma = sqrt($s2_prodi_tm_persma);
   //  $s_prodi_tm_bahasa = sqrt($s2_prodi_tm_bahasa);
   //  $s_prodi_tm_pramuka = sqrt($s2_prodi_tm_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_tm_wirausaha = pow($s2_prodi_tm_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_tm_kemanusiaan = pow($s2_prodi_tm_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_tm_senior = pow($s2_prodi_tm_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tm_mapala = pow($s2_prodi_tm_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tm_persma = pow($s2_prodi_tm_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tm_bahasa = pow($s2_prodi_tm_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tm_pramuka = pow($s2_prodi_tm_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D3 Teknik Mesin Wirausaha=".number_format($s_prodi_tm_wirausaha, dec())."<br>";
   //  echo "S Prodi D3 Teknik Mesin Kemanusiaan=".number_format($s_prodi_tm_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D3 Teknik Mesin SENIOR=".number_format($s_prodi_tm_senior, dec())."<br>";
   //      echo "S Prodi D3 Teknik Mesin MAPALA=".number_format($s_prodi_tm_mapala, dec())."<br>";
   //      echo "S Prodi D3 Teknik Mesin Persma=".number_format($s_prodi_tm_persma, dec())."<br>";
   //      echo "S Prodi D3 Teknik Mesin Bahasa=".number_format($s_prodi_tm_bahasa, dec())."<br>";
   //      echo "S Prodi D3 Teknik Mesin Pramuka=".number_format($s_prodi_tm_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_a Sanguin
   //  $s_prodi_to_wirausaha = sqrt($s2_prodi_to_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_to_kemanusiaan = sqrt($s2_prodi_to_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_to_senior = sqrt($s2_prodi_to_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_to_mapala = sqrt($s2_prodi_to_mapala);
   //  $s_prodi_to_persma = sqrt($s2_prodi_to_persma);
   //  $s_prodi_to_bahasa = sqrt($s2_prodi_to_bahasa);
   //  $s_prodi_to_pramuka = sqrt($s2_prodi_to_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_to_wirausaha = pow($s2_prodi_to_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_to_kemanusiaan = pow($s2_prodi_to_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_to_senior = pow($s2_prodi_to_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_to_mapala = pow($s2_prodi_to_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_to_persma = pow($s2_prodi_to_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_to_bahasa = pow($s2_prodi_to_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_to_pramuka = pow($s2_prodi_to_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D3 Teknik Otomotif Wirausaha=".number_format($s_prodi_to_wirausaha, dec())."<br>";
   //  echo "S Prodi D3 Teknik Otomotif Kemanusiaan=".number_format($s_prodi_to_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D3 Teknik Otomotif SENIOR=".number_format($s_prodi_to_senior, dec())."<br>";
   //      echo "S Prodi D3 Teknik Otomotif MAPALA=".number_format($s_prodi_to_mapala, dec())."<br>";
   //      echo "S Prodi D3 Teknik Otomotif Persma=".number_format($s_prodi_to_persma, dec())."<br>";
   //      echo "S Prodi D3 Teknik Otomotif Bahasa=".number_format($s_prodi_to_bahasa, dec())."<br>";
   //      echo "S Prodi D3 Teknik Otomotif Pramuka=".number_format($s_prodi_to_pramuka, dec())."<br>";
   //      }
        

   //  //S jawaban_a Sanguin
   //  $s_prodi_tpab_wirausaha = sqrt($s2_prodi_tpab_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_tpab_kemanusiaan = sqrt($s2_prodi_tpab_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_tpab_senior = sqrt($s2_prodi_tpab_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_tpab_mapala = sqrt($s2_prodi_tpab_mapala);
   //  $s_prodi_tpab_persma = sqrt($s2_prodi_tpab_persma);
   //  $s_prodi_tpab_bahasa = sqrt($s2_prodi_tpab_bahasa);
   //  $s_prodi_tpab_pramuka = sqrt($s2_prodi_tpab_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_tpab_wirausaha = pow($s2_prodi_tpab_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_tpab_kemanusiaan = pow($s2_prodi_tpab_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_tpab_senior = pow($s2_prodi_tpab_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tpab_mapala = pow($s2_prodi_tpab_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tpab_persma = pow($s2_prodi_tpab_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tpab_bahasa = pow($s2_prodi_tpab_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tpab_pramuka = pow($s2_prodi_tpab_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D3 Teknik Perawatan Alat Berat Wirausaha=".number_format($s_prodi_tpab_wirausaha, dec())."<br>";
   //  echo "S Prodi D3 Teknik Perawatan Alat Berat Kemanusiaan=".number_format($s_prodi_tpab_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D3 Teknik Perawatan Alat Berat SENIOR=".number_format($s_prodi_tpab_senior, dec())."<br>";
   //      echo "S Prodi D3 Teknik Perawatan Alat Berat MAPALA=".number_format($s_prodi_tpab_mapala, dec())."<br>";
   //      echo "S Prodi D3 Teknik Perawatan Alat Berat Persma=".number_format($s_prodi_tpab_persma, dec())."<br>";
   //      echo "S Prodi D3 Teknik Perawatan Alat Berat Bahasa=".number_format($s_prodi_tpab_bahasa, dec())."<br>";
   //      echo "S Prodi D3 Teknik Perawatan Alat Berat Pramuka=".number_format($s_prodi_tpab_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_a Sanguin
   //  $s_prodi_ts_wirausaha = sqrt($s2_prodi_ts_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_ts_kemanusiaan = sqrt($s2_prodi_ts_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_ts_senior = sqrt($s2_prodi_ts_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_ts_mapala = sqrt($s2_prodi_ts_mapala);
   //  $s_prodi_ts_persma = sqrt($s2_prodi_ts_persma);
   //  $s_prodi_ts_bahasa = sqrt($s2_prodi_ts_bahasa);
   //  $s_prodi_ts_pramuka = sqrt($s2_prodi_ts_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_ts_wirausaha = pow($s2_prodi_ts_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_ts_kemanusiaan = pow($s2_prodi_ts_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_ts_senior = pow($s2_prodi_ts_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_ts_mapala = pow($s2_prodi_ts_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_ts_persma = pow($s2_prodi_ts_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_ts_bahasa = pow($s2_prodi_ts_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_ts_pramuka = pow($s2_prodi_ts_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D3 Teknik Sipil Wirausaha=".number_format($s_prodi_ts_wirausaha, dec())."<br>";
   //  echo "S Prodi D3 Teknik Sipil Kemanusiaan=".number_format($s_prodi_ts_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D3 Teknik Sipil SENIOR=".number_format($s_prodi_ts_senior, dec())."<br>";
   //      echo "S Prodi D3 Teknik Sipil MAPALA=".number_format($s_prodi_ts_mapala, dec())."<br>";
   //      echo "S Prodi D3 Teknik Sipil Persma=".number_format($s_prodi_ts_persma, dec())."<br>";
   //      echo "S Prodi D3 Teknik Sipil Bahasa=".number_format($s_prodi_ts_bahasa, dec())."<br>";
   //      echo "S Prodi D3 Teknik Sipil Pramuka=".number_format($s_prodi_ts_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_a Sanguin
   //  $s_prodi_ttl_wirausaha = sqrt($s2_prodi_ttl_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_ttl_kemanusiaan = sqrt($s2_prodi_ttl_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_ttl_senior = sqrt($s2_prodi_ttl_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_ttl_mapala = sqrt($s2_prodi_ttl_mapala);
   //  $s_prodi_ttl_persma = sqrt($s2_prodi_ttl_persma);
   //  $s_prodi_ttl_bahasa = sqrt($s2_prodi_ttl_bahasa);
   //  $s_prodi_ttl_pramuka = sqrt($s2_prodi_ttl_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_ttl_wirausaha = pow($s2_prodi_ttl_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_ttl_kemanusiaan = pow($s2_prodi_ttl_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_ttl_senior = pow($s2_prodi_ttl_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_ttl_mapala = pow($s2_prodi_ttl_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_ttl_persma = pow($s2_prodi_ttl_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_ttl_bahasa = pow($s2_prodi_ttl_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_ttl_pramuka = pow($s2_prodi_ttl_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D3 Teknik Telekomunikasi Wirausaha=".number_format($s_prodi_ttl_wirausaha, dec())."<br>";
   //  echo "S Prodi D3 Teknik Telekomunikasi Kemanusiaan=".number_format($s_prodi_ttl_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D3 Teknik Telekomunikasi SENIOR=".number_format($s_prodi_ttl_senior, dec())."<br>";
   //      echo "S Prodi D3 Teknik Telekomunikasi MAPALA=".number_format($s_prodi_ttl_mapala, dec())."<br>";
   //      echo "S Prodi D3 Teknik Telekomunikasi Persma=".number_format($s_prodi_ttl_persma, dec())."<br>";
   //      echo "S Prodi D3 Teknik Telekomunikasi Bahasa=".number_format($s_prodi_ttl_bahasa, dec())."<br>";
   //      echo "S Prodi D3 Teknik Telekomunikasi Pramuka=".number_format($s_prodi_ttl_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_a Sanguin
   //  $s_prodi_ab4_wirausaha = sqrt($s2_prodi_ab4_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_ab4_kemanusiaan = sqrt($s2_prodi_ab4_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_ab4_senior = sqrt($s2_prodi_ab4_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_ab4_mapala = sqrt($s2_prodi_ab4_mapala);
   //  $s_prodi_ab4_persma = sqrt($s2_prodi_ab4_persma);
   //  $s_prodi_ab4_bahasa = sqrt($s2_prodi_ab4_bahasa);
   //  $s_prodi_ab4_pramuka = sqrt($s2_prodi_ab4_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_ab4_wirausaha = pow($s2_prodi_ab4_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_ab4_kemanusiaan = pow($s2_prodi_ab4_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_ab4_senior = pow($s2_prodi_ab4_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_ab4_mapala = pow($s2_prodi_ab4_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_ab4_persma = pow($s2_prodi_ab4_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_ab4_bahasa = pow($s2_prodi_ab4_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_ab4_pramuka = pow($s2_prodi_ab4_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D4 Administrasi Bisnis Wirausaha=".number_format($s_prodi_ab4_wirausaha, dec())."<br>";
   //  echo "S Prodi D4 Administrasi Bisnis Kemanusiaan=".number_format($s_prodi_ab4_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D4 Administrasi Bisnis SENIOR=".number_format($s_prodi_ab4_senior, dec())."<br>";
   //      echo "S Prodi D4 Administrasi Bisnis MAPALA=".number_format($s_prodi_ab4_mapala, dec())."<br>";
   //      echo "S Prodi D4 Administrasi Bisnis Persma=".number_format($s_prodi_ab4_persma, dec())."<br>";
   //      echo "S Prodi D4 Administrasi Bisnis Bahasa=".number_format($s_prodi_ab4_bahasa, dec())."<br>";
   //      echo "S Prodi D4 Administrasi Bisnis Pramuka=".number_format($s_prodi_ab4_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_a Sanguin
   //  $s_prodi_akm_wirausaha = sqrt($s2_prodi_akm_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_akm_kemanusiaan = sqrt($s2_prodi_akm_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_akm_senior = sqrt($s2_prodi_akm_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_akm_mapala = sqrt($s2_prodi_akm_mapala);
   //  $s_prodi_akm_persma = sqrt($s2_prodi_akm_persma);
   //  $s_prodi_akm_bahasa = sqrt($s2_prodi_akm_bahasa);
   //  $s_prodi_akm_pramuka = sqrt($s2_prodi_akm_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_akm_wirausaha = pow($s2_prodi_akm_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_akm_kemanusiaan = pow($s2_prodi_akm_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_akm_senior = pow($s2_prodi_akm_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_akm_mapala = pow($s2_prodi_akm_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_akm_persma = pow($s2_prodi_akm_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_akm_bahasa = pow($s2_prodi_akm_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_akm_pramuka = pow($s2_prodi_akm_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D4 Akuntansi Manajerial Wirausaha=".number_format($s_prodi_akm_wirausaha, dec())."<br>";
   //  echo "S Prodi D4 Akuntansi Manajerial Kemanusiaan=".number_format($s_prodi_akm_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D4 Akuntansi Manajerial SENIOR=".number_format($s_prodi_akm_senior, dec())."<br>";
   //      echo "S Prodi D4 Akuntansi Manajerial MAPALA=".number_format($s_prodi_akm_mapala, dec())."<br>";
   //      echo "S Prodi D4 Akuntansi Manajerial Persma=".number_format($s_prodi_akm_persma, dec())."<br>";
   //      echo "S Prodi D4 Akuntansi Manajerial Bahasa=".number_format($s_prodi_akm_bahasa, dec())."<br>";
   //      echo "S Prodi D4 Akuntansi Manajerial Pramuka=".number_format($s_prodi_akm_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_a Sanguin
   //  $s_prodi_tk4_wirausaha = sqrt($s2_prodi_tk4_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_tk4_kemanusiaan = sqrt($s2_prodi_tk4_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_tk4_senior = sqrt($s2_prodi_tk4_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_tk4_mapala = sqrt($s2_prodi_tk4_mapala);
   //  $s_prodi_tk4_persma = sqrt($s2_prodi_tk4_persma);
   //  $s_prodi_tk4_bahasa = sqrt($s2_prodi_tk4_bahasa);
   //  $s_prodi_tk4_pramuka = sqrt($s2_prodi_tk4_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_tk4_wirausaha = pow($s2_prodi_tk4_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_tk4_kemanusiaan = pow($s2_prodi_tk4_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_tk4_senior = pow($s2_prodi_tk4_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tk4_mapala = pow($s2_prodi_tk4_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tk4_persma = pow($s2_prodi_tk4_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tk4_bahasa = pow($s2_prodi_tk4_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tk4_pramuka = pow($s2_prodi_tk4_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D4 Teknik Kimia Wirausaha=".number_format($s_prodi_tk4_wirausaha, dec())."<br>";
   //  echo "S Prodi D4 Teknik Kimia Kemanusiaan=".number_format($s_prodi_tk4_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D4 Teknik Kimia SENIOR=".number_format($s_prodi_tk4_senior, dec())."<br>";
   //      echo "S Prodi D4 Teknik Kimia MAPALA=".number_format($s_prodi_tk4_mapala, dec())."<br>";
   //      echo "S Prodi D4 Teknik Kimia Persma=".number_format($s_prodi_tk4_persma, dec())."<br>";
   //      echo "S Prodi D4 Teknik Kimia Bahasa=".number_format($s_prodi_tk4_bahasa, dec())."<br>";
   //      echo "S Prodi D4 Teknik Kimia Pramuka=".number_format($s_prodi_tk4_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_a Sanguin
   //  $s_prodi_tkj_wirausaha = sqrt($s2_prodi_tkj_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_tkj_kemanusiaan = sqrt($s2_prodi_tkj_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_tkj_senior = sqrt($s2_prodi_tkj_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_tkj_mapala = sqrt($s2_prodi_tkj_mapala);
   //  $s_prodi_tkj_persma = sqrt($s2_prodi_tkj_persma);
   //  $s_prodi_tkj_bahasa = sqrt($s2_prodi_tkj_bahasa);
   //  $s_prodi_tkj_pramuka = sqrt($s2_prodi_tkj_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_tkj_wirausaha = pow($s2_prodi_tkj_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_tkj_kemanusiaan = pow($s2_prodi_tkj_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_tkj_senior = pow($s2_prodi_tkj_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tkj_mapala = pow($s2_prodi_tkj_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tkj_persma = pow($s2_prodi_tkj_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tkj_bahasa = pow($s2_prodi_tkj_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tkj_pramuka = pow($s2_prodi_tkj_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D4 Teknik Komputer dan Jaringan Wirausaha=".number_format($s_prodi_tkj_wirausaha, dec())."<br>";
   //  echo "S Prodi D4 Teknik Komputer dan Jaringan Kemanusiaan=".number_format($s_prodi_tkj_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D4 Teknik Komputer dan Jaringan SENIOR=".number_format($s_prodi_tkj_senior, dec())."<br>";
   //      echo "S Prodi D4 Teknik Komputer dan Jaringan MAPALA=".number_format($s_prodi_tkj_mapala, dec())."<br>";
   //      echo "S Prodi D4 Teknik Komputer dan Jaringan Persma=".number_format($s_prodi_tkj_persma, dec())."<br>";
   //      echo "S Prodi D4 Teknik Komputer dan Jaringan Bahasa=".number_format($s_prodi_tkj_bahasa, dec())."<br>";
   //      echo "S Prodi D4 Teknik Komputer dan Jaringan Pramuka=".number_format($s_prodi_tkj_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_a Sanguin
   //  $s_prodi_tks4_wirausaha = sqrt($s2_prodi_tks4_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_tks4_kemanusiaan = sqrt($s2_prodi_tks4_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_tks4_senior = sqrt($s2_prodi_tks4_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_tks4_mapala = sqrt($s2_prodi_tks4_mapala);
   //  $s_prodi_tks4_persma = sqrt($s2_prodi_tks4_persma);
   //  $s_prodi_tks4_bahasa = sqrt($s2_prodi_tks4_bahasa);
   //  $s_prodi_tks4_pramuka = sqrt($s2_prodi_tks4_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_tks4_wirausaha = pow($s2_prodi_tks4_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_tks4_kemanusiaan = pow($s2_prodi_tks4_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_tks4_senior = pow($s2_prodi_tks4_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tks4_mapala = pow($s2_prodi_tks4_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tks4_persma = pow($s2_prodi_tks4_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tks4_bahasa = pow($s2_prodi_tks4_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tks4_pramuka = pow($s2_prodi_tks4_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D4 Teknik Konstruksi Wirausaha=".number_format($s_prodi_tks4_wirausaha, dec())."<br>";
   //  echo "S Prodi D4 Teknik Konstruksi Kemanusiaan=".number_format($s_prodi_tks4_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D4 Teknik Konstruksi SENIOR=".number_format($s_prodi_tks4_senior, dec())."<br>";
   //      echo "S Prodi D4 Teknik Konstruksi MAPALA=".number_format($s_prodi_tks4_mapala, dec())."<br>";
   //      echo "S Prodi D4 Teknik Konstruksi Persma=".number_format($s_prodi_tks4_persma, dec())."<br>";
   //      echo "S Prodi D4 Teknik Konstruksi Bahasa=".number_format($s_prodi_tks4_bahasa, dec())."<br>";
   //      echo "S Prodi D4 Teknik Konstruksi Pramuka=".number_format($s_prodi_tks4_pramuka, dec())."<br>";
   //      }

   //   //S jawaban_a Sanguin
   //  $s_prodi_tl4_wirausaha = sqrt($s2_prodi_tl4_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_tl4_kemanusiaan = sqrt($s2_prodi_tl4_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_tl4_senior = sqrt($s2_prodi_tl4_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_tl4_mapala = sqrt($s2_prodi_tl4_mapala);
   //  $s_prodi_tl4_persma = sqrt($s2_prodi_tl4_persma);
   //  $s_prodi_tl4_bahasa = sqrt($s2_prodi_tl4_bahasa);
   //  $s_prodi_tl4_pramuka = sqrt($s2_prodi_tl4_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_tl4_wirausaha = pow($s2_prodi_tl4_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_tl4_kemanusiaan = pow($s2_prodi_tl4_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_tl4_senior = pow($s2_prodi_tl4_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tl4_mapala = pow($s2_prodi_tl4_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tl4_persma = pow($s2_prodi_tl4_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tl4_bahasa = pow($s2_prodi_tl4_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tl4_pramuka = pow($s2_prodi_tl4_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D4 Teknik Listrik Wirausaha=".number_format($s_prodi_tl4_wirausaha, dec())."<br>";
   //  echo "S Prodi D4 Teknik Listrik Kemanusiaan=".number_format($s_prodi_tl4_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D4 Teknik Listrik SENIOR=".number_format($s_prodi_tl4_senior, dec())."<br>";
   //      echo "S Prodi D4 Teknik Listrik MAPALA=".number_format($s_prodi_tl4_mapala, dec())."<br>";
   //      echo "S Prodi D4 Teknik Listrik Persma=".number_format($s_prodi_tl4_persma, dec())."<br>";
   //      echo "S Prodi D4 Teknik Listrik Bahasa=".number_format($s_prodi_tl4_bahasa, dec())."<br>";
   //      echo "S Prodi D4 Teknik Listrik Pramuka=".number_format($s_prodi_tl4_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_a Sanguin
   //  $s_prodi_tmf4_wirausaha = sqrt($s2_prodi_tmf4_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_tmf4_kemanusiaan = sqrt($s2_prodi_tmf4_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_tmf4_senior = sqrt($s2_prodi_tmf4_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_tmf4_mapala = sqrt($s2_prodi_tmf4_mapala);
   //  $s_prodi_tmf4_persma = sqrt($s2_prodi_tmf4_persma);
   //  $s_prodi_tmf4_bahasa = sqrt($s2_prodi_tmf4_bahasa);
   //  $s_prodi_tmf4_pramuka = sqrt($s2_prodi_tmf4_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_tmf4_wirausaha = pow($s2_prodi_tmf4_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_tmf4_kemanusiaan = pow($s2_prodi_tmf4_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_tmf4_senior = pow($s2_prodi_tmf4_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tmf4_mapala = pow($s2_prodi_tmf4_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tmf4_persma = pow($s2_prodi_tmf4_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tmf4_bahasa = pow($s2_prodi_tmf4_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tmf4_pramuka = pow($s2_prodi_tmf4_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D4 Teknik Manufaktur Wirausaha=".number_format($s_prodi_tmf4_wirausaha, dec())."<br>";
   //  echo "S Prodi D4 Teknik Manufaktur Kemanusiaan=".number_format($s_prodi_tmf4_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D4 Teknik Manufaktur SENIOR=".number_format($s_prodi_tmf4_senior, dec())."<br>";
   //      echo "S Prodi D4 Teknik Manufaktur MAPALA=".number_format($s_prodi_tmf4_mapala, dec())."<br>";
   //      echo "S Prodi D4 Teknik Manufaktur Persma=".number_format($s_prodi_tmf4_persma, dec())."<br>";
   //      echo "S Prodi D4 Teknik Manufaktur Bahasa=".number_format($s_prodi_tmf4_bahasa, dec())."<br>";
   //      echo "S Prodi D4 Teknik Manufaktur Pramuka=".number_format($s_prodi_tmf4_pramuka, dec())."<br>";
   //      }
        

   //  //S jawaban_a Sanguin
   //  $s_prodi_tmk4_wirausaha = sqrt($s2_prodi_tmk4_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_tmk4_kemanusiaan = sqrt($s2_prodi_tmk4_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_tmk4_senior = sqrt($s2_prodi_tmk4_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_tmk4_mapala = sqrt($s2_prodi_tmk4_mapala);
   //  $s_prodi_tmk4_persma = sqrt($s2_prodi_tmk4_persma);
   //  $s_prodi_tmk4_bahasa = sqrt($s2_prodi_tmk4_bahasa);
   //  $s_prodi_tmk4_pramuka = sqrt($s2_prodi_tmk4_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_tmk4_wirausaha = pow($s2_prodi_tmk4_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_tmk4_kemanusiaan = pow($s2_prodi_tmk4_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_tmk4_senior = pow($s2_prodi_tmk4_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tmk4_mapala = pow($s2_prodi_tmk4_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tmk4_persma = pow($s2_prodi_tmk4_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tmk4_bahasa = pow($s2_prodi_tmk4_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tmk4_pramuka = pow($s2_prodi_tmk4_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D4 Teknik Mekatronika Wirausaha=".number_format($s_prodi_tmk4_wirausaha, dec())."<br>";
   //  echo "S Prodi D4 Teknik Mekatronika Kemanusiaan=".number_format($s_prodi_tmk4_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D4 Teknik Mekatronika SENIOR=".number_format($s_prodi_tmk4_senior, dec())."<br>";
   //      echo "S Prodi D4 Teknik Mekatronika MAPALA=".number_format($s_prodi_tmk4_mapala, dec())."<br>";
   //      echo "S Prodi D4 Teknik Mekatronika Persma=".number_format($s_prodi_tmk4_persma, dec())."<br>";
   //      echo "S Prodi D4 Teknik Mekatronika Bahasa=".number_format($s_prodi_tmk4_bahasa, dec())."<br>";
   //      echo "S Prodi D4 Teknik Mekatronika Pramuka=".number_format($s_prodi_tmk4_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_a Sanguin
   //  $s_prodi_tmj_wirausaha = sqrt($s2_prodi_tmj_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_tmj_kemanusiaan = sqrt($s2_prodi_tmj_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_tmj_senior = sqrt($s2_prodi_tmj_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_tmj_mapala = sqrt($s2_prodi_tmj_mapala);
   //  $s_prodi_tmj_persma = sqrt($s2_prodi_tmj_persma);
   //  $s_prodi_tmj_bahasa = sqrt($s2_prodi_tmj_bahasa);
   //  $s_prodi_tmj_pramuka = sqrt($s2_prodi_tmj_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_tmj_wirausaha = pow($s2_prodi_tmj_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_tmj_kemanusiaan = pow($s2_prodi_tmj_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_tmj_senior = pow($s2_prodi_tmj_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tmj_mapala = pow($s2_prodi_tmj_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tmj_persma = pow($s2_prodi_tmj_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tmj_bahasa = pow($s2_prodi_tmj_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tmj_pramuka = pow($s2_prodi_tmj_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D4 Teknik Multimedia dan Jaringan Wirausaha=".number_format($s_prodi_tmj_wirausaha, dec())."<br>";
   //  echo "S Prodi D4 Teknik Multimedia dan Jaringan Kemanusiaan=".number_format($s_prodi_tmj_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D4 Teknik Multimedia dan Jaringan SENIOR=".number_format($s_prodi_tmj_senior, dec())."<br>";
   //      echo "S Prodi D4 Teknik Multimedia dan Jaringan MAPALA=".number_format($s_prodi_tmj_mapala, dec())."<br>";
   //      echo "S Prodi D4 Teknik Multimedia dan Jaringan Persma=".number_format($s_prodi_tmj_persma, dec())."<br>";
   //      echo "S Prodi D4 Teknik Multimedia dan Jaringan Bahasa=".number_format($s_prodi_tmj_bahasa, dec())."<br>";
   //      echo "S Prodi D4 Teknik Multimedia dan Jaringan Pramuka=".number_format($s_prodi_tmj_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_a Sanguin
   //  $s_prodi_tpe_wirausaha = sqrt($s2_prodi_tpe_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_tpe_kemanusiaan = sqrt($s2_prodi_tpe_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_tpe_senior = sqrt($s2_prodi_tpe_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_tpe_mapala = sqrt($s2_prodi_tpe_mapala);
   //  $s_prodi_tpe_persma = sqrt($s2_prodi_tpe_persma);
   //  $s_prodi_tpe_bahasa = sqrt($s2_prodi_tpe_bahasa);
   //  $s_prodi_tpe_pramuka = sqrt($s2_prodi_tpe_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_tpe_wirausaha = pow($s2_prodi_tpe_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_tpe_kemanusiaan = pow($s2_prodi_tpe_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_tpe_senior = pow($s2_prodi_tpe_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tpe_mapala = pow($s2_prodi_tpe_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tpe_persma = pow($s2_prodi_tpe_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tpe_bahasa = pow($s2_prodi_tpe_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tpe_pramuka = pow($s2_prodi_tpe_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D4 Teknik Pembangkit Energi Wirausaha=".number_format($s_prodi_tpe_wirausaha, dec())."<br>";
   //  echo "S Prodi D4 Teknik Pembangkit Energi Kemanusiaan=".number_format($s_prodi_tpe_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D4 Teknik Pembangkit Energi SENIOR=".number_format($s_prodi_tpe_senior, dec())."<br>";
   //      echo "S Prodi D4 Teknik Pembangkit Energi MAPALA=".number_format($s_prodi_tpe_mapala, dec())."<br>";
   //      echo "S Prodi D4 Teknik Pembangkit Energi Persma=".number_format($s_prodi_tpe_persma, dec())."<br>";
   //      echo "S Prodi D4 Teknik Pembangkit Energi Bahasa=".number_format($s_prodi_tpe_bahasa, dec())."<br>";
   //      echo "S Prodi D4 Teknik Pembangkit Energi Pramuka=".number_format($s_prodi_tpe_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_a Sanguin
   //  $s_prodi_tki_wirausaha = sqrt($s2_prodi_tki_wirausaha);
   //  //S jawaban_a Koleris
   //  $s_prodi_tki_kemanusiaan = sqrt($s2_prodi_tki_kemanusiaan);
   //      //S jawaban_a Melankolis
   //  $s_prodi_tki_senior = sqrt($s2_prodi_tki_senior);
   //      //S jawaban_a Plegmatis
   //  $s_prodi_tki_mapala = sqrt($s2_prodi_tki_mapala);
   //  $s_prodi_tki_persma = sqrt($s2_prodi_tki_persma);
   //  $s_prodi_tki_bahasa = sqrt($s2_prodi_tki_bahasa);
   //  $s_prodi_tki_pramuka = sqrt($s2_prodi_tki_pramuka);
       
   //      //s2 ^2 jawaban_a sanguin
   //      $s2_pangkat2_prodi_tki_wirausaha = pow($s2_prodi_tki_wirausaha, 2);
   //      //s2 ^2 jawaban_a koleris
   //      $s2_pangkat2_prodi_tki_kemanusiaan = pow($s2_prodi_tki_kemanusiaan, 2);
   //      //s2 ^2 jawaban_a melankolis
   //      $s2_pangkat2_prodi_tki_senior = pow($s2_prodi_tki_senior, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tki_mapala = pow($s2_prodi_tki_mapala, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tki_persma = pow($s2_prodi_tki_persma, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tki_bahasa = pow($s2_prodi_tki_bahasa, 2);
   //      //s2 ^2 jawaban_a plegmatis
   //      $s2_pangkat2_prodi_tki_pramuka = pow($s2_prodi_tki_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Prodi D4 Teknik Kimia Industri Wirausaha=".number_format($s_prodi_tki_wirausaha, dec())."<br>";
   //  echo "S Prodi D4 Teknik Kimia Industri Kemanusiaan=".number_format($s_prodi_tki_kemanusiaan, dec())."<br>";
   //      echo "S Prodi D4 Teknik Kimia Industri SENIOR=".number_format($s_prodi_tki_senior, dec())."<br>";
   //      echo "S Prodi D4 Teknik Kimia Industri MAPALA=".number_format($s_prodi_tki_mapala, dec())."<br>";
   //      echo "S Prodi D4 Teknik Kimia Industri Persma=".number_format($s_prodi_tki_persma, dec())."<br>";
   //      echo "S Prodi D4 Teknik Kimia Industri Bahasa=".number_format($s_prodi_tki_bahasa, dec())."<br>";
   //      echo "S Prodi D4 Teknik Kimia Industri Pramuka=".number_format($s_prodi_tki_pramuka, dec())."<br>";
   //      }


   //      //========================================================
   //       //minat sanguin
   //  $jumlah_minat_seni_wirusaha = get_jumlah_sum_atribut($db_object, "minat", "Wirausaha");
   //  $x_minat_seni_wirusaha = $jumlah_minat_seni_wirusaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_minat_seni_kemanusiaan = get_jumlah_sum_atribut($db_object, "minat", "Kemanusiaan (ksr, humaniora)");
   //  $x_minat_seni_kemanusiaan = $jumlah_minat_seni_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_minat_seni_senior = get_jumlah_sum_atribut($db_object, "minat", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_minat_seni_senior = $jumlah_minat_seni_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_minat_seni_mapala = get_jumlah_sum_atribut($db_object, "minat", "Pecinta Alam (MAPALA)");
   //  $x_minat_seni_mapala = $jumlah_minat_seni_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_minat_seni_persma = get_jumlah_sum_atribut($db_object, "minat", "Persma");
   //  $x_minat_seni_persma = $jumlah_minat_seni_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_minat_seni_bahasa = get_jumlah_sum_atribut($db_object, "minat", "Bahasa");
   //  $x_minat_seni_bahasa = $jumlah_minat_seni_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_minat_seni_pramuka = get_jumlah_sum_atribut($db_object, "minat", "Pramuka");
   //  $x_minat_seni_pramuka = $jumlah_minat_seni_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_minat_olahraga_wirusaha = get_jumlah_sum_atribut($db_object, "minat", "Wirausaha");
   //  $x_minat_olahraga_wirusah = $jumlah_minat_olahraga_wirusaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_minat_olahraga_kemanusiaan = get_jumlah_sum_atribut($db_object, "minat", "Kemanusiaan (ksr, humaniora)");
   //  $x_minat_olahraga_kemanusiaan = $jumlah_minat_olahraga_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_minat_olahraga_senior = get_jumlah_sum_atribut($db_object, "minat", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_minat_olahraga_senior = $jumlah_minat_olahraga_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_minat_olahraga_mapala = get_jumlah_sum_atribut($db_object, "minat", "Pecinta Alam (MAPALA)");
   //  $x_minat_olahraga_mapala = $jumlah_minat_olahraga_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_minat_olahraga_persma = get_jumlah_sum_atribut($db_object, "minat", "Persma");
   //  $x_minat_olahraga_persma = $jumlah_minat_olahraga_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_minat_olahraga_bahasa = get_jumlah_sum_atribut($db_object, "minat", "Bahasa");
   //  $x_minat_olahraga_bahasa = $jumlah_minat_olahraga_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_minat_olahraga_pramuka = get_jumlah_sum_atribut($db_object, "minat", "Pramuka");
   //  $x_minat_olahraga_pramuka = $jumlah_minat_olahraga_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_minat_mapala_wirusaha = get_jumlah_sum_atribut($db_object, "minat", "Wirausaha");
   //  $x_minat_mapala_wirusah = $jumlah_minat_mapala_wirusaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_minat_mapala_kemanusiaan = get_jumlah_sum_atribut($db_object, "minat", "Kemanusiaan (ksr, humaniora)");
   //  $x_minat_mapala_kemanusiaan = $jumlah_minat_mapala_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_minat_mapala_senior = get_jumlah_sum_atribut($db_object, "minat", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_minat_mapala_senior = $jumlah_minat_mapala_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_minat_mapala_mapala = get_jumlah_sum_atribut($db_object, "minat", "Pecinta Alam (MAPALA)");
   //  $x_minat_mapala_mapala = $jumlah_minat_mapala_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_minat_mapala_persma = get_jumlah_sum_atribut($db_object, "minat", "Persma");
   //  $x_minat_mapala_persma = $jumlah_minat_mapala_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_minat_mapala_bahasa = get_jumlah_sum_atribut($db_object, "minat", "Bahasa");
   //  $x_minat_mapala_bahasa = $jumlah_minat_mapala_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_minat_mapala_pramuka = get_jumlah_sum_atribut($db_object, "minat", "Pramuka");
   //  $x_minat_mapala_pramuka = $jumlah_minat_mapala_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_minat_beladiri_wirusaha = get_jumlah_sum_atribut($db_object, "minat", "Wirausaha");
   //  $x_minat_beladiri_wirusaha = $jumlah_minat_beladiri_wirusaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_minat_beladiri_kemanusiaan = get_jumlah_sum_atribut($db_object, "minat", "Kemanusiaan (ksr, humaniora)");
   //  $x_minat_beladiri_kemanusiaan = $jumlah_minat_beladiri_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_minat_beladiri_senior = get_jumlah_sum_atribut($db_object, "minat", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_minat_beladiri_senior = $jumlah_minat_beladiri_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_minat_beladiri_mapala = get_jumlah_sum_atribut($db_object, "minat", "Pecinta Alam (MAPALA)");
   //  $x_minat_beladiri_mapala = $jumlah_minat_beladiri_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_minat_beladiri_persma = get_jumlah_sum_atribut($db_object, "minat", "Persma");
   //  $x_minat_beladiri_persma = $jumlah_jurusan_kimia_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_jurusan_kimia_bahasa = get_jumlah_sum_atribut($db_object, "minat", "Bahasa");
   //  $x_jurusan_kimia_bahasa = $jumlah_minat_beladiri_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_minat_beladiri_pramuka = get_jumlah_sum_atribut($db_object, "minat", "Pramuka");
   //  $x_minat_beladiri_pramuka = $jumlah_minat_beladiri_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_minat_jurnalistik_wirusaha = get_jumlah_sum_atribut($db_object, "minat", "Wirausaha");
   //  $x_minat_jurnalistik_wirusah = $jumlah_minat_jurnalistik_wirusaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_minat_jurnalistik_kemanusiaan = get_jumlah_sum_atribut($db_object, "minat", "Kemanusiaan (ksr, humaniora)");
   //  $x_minat_jurnalistik_kemanusiaan = $jumlah_minat_jurnalistik_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_minat_jurnalistik_senior = get_jumlah_sum_atribut($db_object, "minat", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_minat_jurnalistik_senior = $jumlah_minat_jurnalistik_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_minat_jurnalistik_mapala = get_jumlah_sum_atribut($db_object, "minat", "Pecinta Alam (MAPALA)");
   //  $x_minat_jurnalistik_mapala = $jumlah_minat_jurnalistik_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_minat_jurnalistik_persma = get_jumlah_sum_atribut($db_object, "minat", "Persma");
   //  $x_minat_jurnalistik_persma = $jumlah_minat_jurnalistik_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_minat_jurnalistik_bahasa = get_jumlah_sum_atribut($db_object, "minat", "Bahasa");
   //  $x_minat_jurnalistik_bahasa = $jumlah_minat_jurnalistik_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_minat_jurnalistik_pramuka = get_jumlah_sum_atribut($db_object, "minat", "Pramuka");
   //  $x_minat_jurnalistik_pramuka = $jumlah_minat_jurnalistik_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_minat_kesehatan_wirusaha = get_jumlah_sum_atribut($db_object, "minat", "Wirausaha");
   //  $x_minat_kesehatan_wirusah = $jumlah_minat_kesehatan_wirusaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_minat_kesehatan_kemanusiaan = get_jumlah_sum_atribut($db_object, "minat", "Kemanusiaan (ksr, humaniora)");
   //  $x_minat_kesehatan_kemanusiaan = $jumlah_minat_kesehatan_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_minat_kesehatan_senior = get_jumlah_sum_atribut($db_object, "minat", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_minat_kesehatan_senior = $jumlah_minat_kesehatan_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_minat_kesehatan_mapala = get_jumlah_sum_atribut($db_object, "minat", "Pecinta Alam (MAPALA)");
   //  $x_minat_kesehatan_mapala = $jumlah_minat_kesehatan_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_minat_kesehatan_persma = get_jumlah_sum_atribut($db_object, "minat", "Persma");
   //  $x_minat_kesehatan_persma = $jumlah_minat_kesehatan_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_minat_kesehatan_bahasa = get_jumlah_sum_atribut($db_object, "minat", "Bahasa");
   //  $x_minat_kesehatan_bahasa = $jumlah_minat_kesehatan_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_minat_kesehatan_pramuka = get_jumlah_sum_atribut($db_object, "minat", "Pramuka");
   //  $x_minat_kesehatan_pramuka = $jumlah_minat_kesehatan_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_minat_wirausaha_wirusaha = get_jumlah_sum_atribut($db_object, "minat", "Wirausaha");
   //  $x_minat_wirausaha_wirusaha = $jumlah_minat_wirausaha_wirusaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_minat_wirausaha_kemanusiaan = get_jumlah_sum_atribut($db_object, "minat", "Kemanusiaan (ksr, humaniora)");
   //  $x_minat_wirausaha_kemanusiaan = $jumlah_minat_wirausaha_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_minat_wirausaha_senior = get_jumlah_sum_atribut($db_object, "minat", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_minat_wirausaha_senior = $jumlah_minat_wirausaha_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_minat_wirausaha_mapala = get_jumlah_sum_atribut($db_object, "minat", "Pecinta Alam (MAPALA)");
   //  $x_minat_wirausaha_mapala = $jumlah_minat_wirausaha_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_minat_wirausaha_persma = get_jumlah_sum_atribut($db_object, "minat", "Persma");
   //  $x_minat_wirausaha_persma = $jumlah_minat_wirausaha_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_minat_wirausaha_bahasa = get_jumlah_sum_atribut($db_object, "minat", "Bahasa");
   //  $x_minat_wirausaha_bahasa = $jumlah_minat_wirausaha_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_minat_wirausaha_pramuka = get_jumlah_sum_atribut($db_object, "minat", "Pramuka");
   //  $x_minat_wirausaha_pramuka = $jumlah_minat_wirausaha_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_minat_bahasa_wirusaha = get_jumlah_sum_atribut($db_object, "minat", "Wirausaha");
   //  $x_minat_bahasa_wirusaha = $jumlah_minat_bahasa_wirusaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_minat_bahasa_kemanusiaan = get_jumlah_sum_atribut($db_object, "minat", "Kemanusiaan (ksr, humaniora)");
   //  $x_minat_bahasa_kemanusiaan = $jumlah_minat_bahasa_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_minat_bahasa_senior = get_jumlah_sum_atribut($db_object, "minat", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_minat_bahasa_senior = $jumlah_minat_bahasa_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_minat_bahasa_mapala = get_jumlah_sum_atribut($db_object, "minat", "Pecinta Alam (MAPALA)");
   //  $x_minat_bahasa_mapala = $jumlah_minat_bahasa_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_minat_bahasa_persma = get_jumlah_sum_atribut($db_object, "minat", "Persma");
   //  $x_minat_bahasa_persma = $jumlah_minat_bahasa_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_minat_bahasa_bahasa = get_jumlah_sum_atribut($db_object, "minat", "Bahasa");
   //  $x_minat_bahasa_bahasa = $jumlah_minat_bahasa_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_minat_bahasa_pramuka = get_jumlah_sum_atribut($db_object, "minat", "Pramuka");
   //  $x_minat_bahasa_pramuka = $jumlah_minat_bahasa_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_minat_kemanusiaan_wirusaha = get_jumlah_sum_atribut($db_object, "minat", "Wirausaha");
   //  $x_minat_kemanusiaan_wirusaha = $jumlah_minat_kemanusiaan_wirusaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_minat_kemanusiaan_kemanusiaan = get_jumlah_sum_atribut($db_object, "minat", "Kemanusiaan (ksr, humaniora)");
   //  $x_minat_kemanusiaan_kemanusiaan = $jumlah_minat_kemanusiaan_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_minat_kemanusiaan_senior = get_jumlah_sum_atribut($db_object, "minat", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_minat_kemanusiaan_senior = $jumlah_minat_kemanusiaan_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_minat_kemanusiaan_mapala = get_jumlah_sum_atribut($db_object, "minat", "Pecinta Alam (MAPALA)");
   //  $x_minat_kemanusiaan_mapala = $jumlah_minat_kemanusiaan_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_minat_kemanusiaan_persma = get_jumlah_sum_atribut($db_object, "minat", "Persma");
   //  $x_minat_kemanusiaan_persma = $jumlah_minat_kemanusiaan_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_minat_kemanusiaan_bahasa = get_jumlah_sum_atribut($db_object, "minat", "Bahasa");
   //  $x_minat_kemanusiaan_bahasa = $jumlah_minat_kemanusiaan_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_minat_kemanusiaan_pramuka = get_jumlah_sum_atribut($db_object, "minat", "Pramuka");
   //  $x_minat_kemanusiaan_pramuka = $jumlah_minat_kemanusiaan_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_minat_pramuka_wirusaha = get_jumlah_sum_atribut($db_object, "minat", "Wirausaha");
   //  $x_minat_pramuka_wirusaha = $jumlah_minat_pramuka_wirusaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_minat_pramuka_kemanusiaan = get_jumlah_sum_atribut($db_object, "minat", "Kemanusiaan (ksr, humaniora)");
   //  $x_minat_pramuka_kemanusiaan = $jumlah_minat_pramuka_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_minat_pramuka_senior = get_jumlah_sum_atribut($db_object, "minat", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_minat_pramuka_senior = $jumlah_minat_pramuka_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_minat_pramuka_mapala = get_jumlah_sum_atribut($db_object, "minat", "Pecinta Alam (MAPALA)");
   //  $x_minat_pramuka_mapala = $jumlah_minat_pramuka_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_minat_pramuka_persma = get_jumlah_sum_atribut($db_object, "minat", "Persma");
   //  $x_minat_pramuka_persma = $jumlah_minat_pramuka_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_minat_pramuka_bahasa = get_jumlah_sum_atribut($db_object, "minat", "Bahasa");
   //  $x_minat_pramuka_bahasa = $jumlah_minat_pramuka_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_minat_pramuka_pramuka = get_jumlah_sum_atribut($db_object, "minat", "Pramuka");
   //  $x_minat_pramuka_pramuka = $jumlah_minat_pramuka_pramuka/$jumlah_pramuka;
        
   //      if($show_perhitungan){
   //      echo "<br>";
   //      echo "<strong><u>Atribut Minat Seni:<br></u></strong>";
   //  echo "X Minat Seni Wirausaha=".number_format($x_minat_seni_wirusaha, dec())."<br>";
   //  echo "X Minat Seni Kemanusiaan=".number_format($x_minat_seni_kemanusiaan, dec())."<br>";
   //      echo "X Minat Seni SENIOR=".number_format($x_minat_seni_senior, dec())."<br>";
   //      echo "X Minat Seni MAPALA=".number_format($x_minat_seni_mapala, dec())."<br>";
   //      echo "X Minat Seni Persma=".number_format($x_minat_seni_persma, dec())."<br>";
   //      echo "X Minat Seni Bahasa=".number_format($x_minat_seni_bahasa, dec())."<br>";
   //      echo "X Minat Seni Pramuka=".number_format($x_minat_seni_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Minat Olahraga:<br></u></strong>";
   //  echo "X Minat Olahraga Wirausaha=".number_format($x_minat_olahraga_wirusaha, dec())."<br>";
   //  echo "X Minat Olahraga Kemanusiaan=".number_format($x_minat_olahraga_kemanusiaan, dec())."<br>";
   //      echo "X Minat Olahraga SENIOR=".number_format($x_minat_olahraga_senior, dec())."<br>";
   //      echo "X Minat Olahraga MAPALA=".number_format($x_minat_olahraga_mapala, dec())."<br>";
   //      echo "X Minat Olahraga Persma=".number_format($x_minat_olahraga_persma, dec())."<br>";
   //      echo "X Minat Olahraga Bahasa=".number_format($x_minat_olahraga_bahasa, dec())."<br>";
   //      echo "X Minat Olahraga Pramuka=".number_format($x_minat_olahraga_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Minat MAPALA:<br></u></strong>";
   //   echo "X Minat MAPALA Wirausaha=".number_format($x_minat_mapala_wirusaha, dec())."<br>";
   //  echo "X Minat MAPALA Kemanusiaan=".number_format($x_minat_mapala_kemanusiaan, dec())."<br>";
   //      echo "X Minat MAPALA SENIOR=".number_format($x_minat_mapala_senior, dec())."<br>";
   //      echo "X Minat MAPALA MAPALA=".number_format($x_minat_mapala_mapala, dec())."<br>";
   //      echo "X Minat MAPALA Persma=".number_format($x_minat_mapala_persma, dec())."<br>";
   //      echo "X Minat MAPALA Bahasa=".number_format($x_minat_mapala_bahasa, dec())."<br>";
   //      echo "X Minat MAPALA Pramuka=".number_format($x_minat_mapala_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Minat Bela Diri:<br></u></strong>";
   //   echo "X Minat Bela Diri Wirausaha=".number_format($x_minat_beladiri_wirusaha, dec())."<br>";
   //  echo "X Minat Bela Diri Kemanusiaan=".number_format($x_minat_beladiri_kemanusiaan, dec())."<br>";
   //      echo "X Minat Bela Diri SENIOR=".number_format($x_minat_beladiri_senior, dec())."<br>";
   //      echo "X Minat Bela Diri MAPALA=".number_format($x_minat_beladiri_mapala, dec())."<br>";
   //      echo "X Minat Bela Diri Persma=".number_format($x_minat_beladiri_persma, dec())."<br>";
   //      echo "X Minat Bela Diri Bahasa=".number_format($x_minat_beladiri_bahasa, dec())."<br>";
   //      echo "X Minat Bela Diri Pramuka=".number_format($x_minat_beladiri_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Minat Jurnalistik:<br></u></strong>";
   //   echo "X Minat Jurnalistik Wirausaha=".number_format($x_minat_jurnalistik_wirusaha, dec())."<br>";
   //  echo "X Minat Jurnalistik Kemanusiaan=".number_format($x_minat_jurnalistik_kemanusiaan, dec())."<br>";
   //      echo "X Minat Jurnalistik SENIOR=".number_format($x_minat_jurnalistik_senior, dec())."<br>";
   //      echo "X Minat Jurnalistik MAPALA=".number_format($x_minat_jurnalistik_mapala, dec())."<br>";
   //      echo "X Minat Jurnalistik Persma=".number_format($x_minat_jurnalistik_persma, dec())."<br>";
   //      echo "X Minat jurnalistik Bahasa=".number_format($x_minat_jurnalistik_bahasa, dec())."<br>";
   //      echo "X Minat jurnalistik Pramuka=".number_format($x_minat_jurnalistik_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Minat Kesehatan:<br></u></strong>";
   //    echo "X Minat Kesehatan Wirausaha=".number_format($x_minat_kesehatan_wirusaha, dec())."<br>";
   //  echo "X Minat Kesehatan Kemanusiaan=".number_format($x_minat_kesehatan_kemanusiaan, dec())."<br>";
   //      echo "X Minat Kesehatan SENIOR=".number_format($x_minat_kesehatan_senior, dec())."<br>";
   //      echo "X Minat Kesehatan MAPALA=".number_format($x_minat_kesehatan_mapala, dec())."<br>";
   //      echo "X Minat Kesehatan Persma=".number_format($x_minat_kesehatan_persma, dec())."<br>";
   //      echo "X Minat Kesehatan Bahasa=".number_format($x_minat_kesehatan_bahasa, dec())."<br>";
   //      echo "X Minat Kesehatan Pramuka=".number_format($x_minat_kesehatan_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Minat Wirausaha:<br></u></strong>";
   //    echo "X Minat Wirausaha Wirausaha=".number_format($x_minat_wirausaha_wirusaha, dec())."<br>";
   //  echo "X Minat Wirausaha Kemanusiaan=".number_format($x_minat_wirausaha_kemanusiaan, dec())."<br>";
   //      echo "X Minat Wirausaha SENIOR=".number_format($x_minat_wirausaha_senior, dec())."<br>";
   //      echo "X Minat Wirausaha MAPALA=".number_format($x_minat_wirausaha_mapala, dec())."<br>";
   //      echo "X Minat Wirausaha Persma=".number_format($x_minat_wirausaha_persma, dec())."<br>";
   //      echo "X Minat Wirausaha Bahasa=".number_format($x_minat_wirausaha_bahasa, dec())."<br>";
   //      echo "X Minat Wirausaha Pramuka=".number_format($x_minat_wirausaha_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Minat Bahasa:<br></u></strong>";
   //    echo "X Minat Bahasa Wirausaha=".number_format($x_minat_bahasa_wirusaha, dec())."<br>";
   //  echo "X Minat Bahasa Kemanusiaan=".number_format($x_minat_bahasa_kemanusiaan, dec())."<br>";
   //      echo "X Minat Bahasa SENIOR=".number_format($x_minat_bahasa_senior, dec())."<br>";
   //      echo "X Minat Bahasa MAPALA=".number_format($x_minat_bahasa_mapala, dec())."<br>";
   //      echo "X Minat Bahasa Persma=".number_format($x_minat_bahasa_persma, dec())."<br>";
   //      echo "X Minat Bahasa Bahasa=".number_format($x_minat_bahasa_bahasa, dec())."<br>";
   //      echo "X Minat Bahasa Pramuka=".number_format($x_minat_bahasa_pramuka, dec())."<br>";
   //  echo "<br>";
   //   echo "<br>";
   //      echo "<strong><u>Atribut Minat Kemanusiaan:<br></u></strong>";
   //    echo "X Minat Kemanusiaan Wirausaha=".number_format($x_minat_kemanusiaan_wirusaha, dec())."<br>";
   //  echo "X Minat Kemanusiaan Kemanusiaan=".number_format($x_minat_kemanusiaan_kemanusiaan, dec())."<br>";
   //      echo "X Minat Kemanusiaan SENIOR=".number_format($x_minat_kemanusiaan_senior, dec())."<br>";
   //      echo "X Minat Kemanusiaan MAPALA=".number_format($x_minat_kemanusiaan_mapala, dec())."<br>";
   //      echo "X Minat Kemanusiaan Persma=".number_format($x_minat_kemanusiaan_persma, dec())."<br>";
   //      echo "X Minat Kemanusiaan Bahasa=".number_format($x_minat_kemanusiaan_bahasa, dec())."<br>";
   //      echo "X Minat Kemanusiaan Pramuka=".number_format($x_minat_kemanusiaan_pramuka, dec())."<br>";
   //  echo "<br>";
   //   echo "<br>";
   //      echo "<strong><u>Atribut Minat Pramuka:<br></u></strong>";
   //   echo "X Minat Pramuka Wirausaha=".number_format($x_minat_pramuka_wirusaha, dec())."<br>";
   //  echo "X Minat Pramuka Kemanusiaan=".number_format($x_minat_pramuka_kemanusiaan, dec())."<br>";
   //      echo "X Minat Pramuka SENIOR=".number_format($x_minat_pramuka_senior, dec())."<br>";
   //      echo "X Minat Pramuka MAPALA=".number_format($x_minat_pramuka_mapala, dec())."<br>";
   //      echo "X Minat Pramuka Persma=".number_format($x_minat_pramuka_persma, dec())."<br>";
   //      echo "X Minat Pramuka Bahasa=".number_format($x_minat_pramuka_bahasa, dec())."<br>";
   //      echo "X Minat Pramuka Pramuka=".number_format($x_minat_pramuka_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }
   
   //  //S2 jawaban_b Sanguin
   //  $s2_minat_seni_wirusaha = get_s2_populasi($db_object, 'minat', 'Wirausaha', $x_minat_seni_wirusaha, $jumlah_wirausaha);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_seni_kemanusiaan = get_s2_populasi($db_object, 'minat', 'Kemanusiaan (ksr, humaniora)', $x_minat_seni_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_seni_senior = get_s2_populasi($db_object, 'minat', 'SENIOR (senior, bola, karate, taekwondo)', $x_minat_seni_senior, $jumlah_senior);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_seni_mapala = get_s2_populasi($db_object, 'minat', 'Pecinta Alam (MAPALA)', $x_minat_seni_mapala, $jumlah_mapala);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_seni_persma = get_s2_populasi($db_object, 'minat', 'Persma', $x_minat_seni_persma, $jumlah_persma);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_seni_bahasa = get_s2_populasi($db_object, 'minat', 'Bahasa', $x_minat_seni_bahasa, $jumlah_bahasa);
   //   //S2 jawaban_b Koleris
   //  $s2_minat_seni_pramuka = get_s2_populasi($db_object, 'minat', 'Pramuka', $x_minat_seni_pramuka, $jumlah_pramuka);
    
   //      if($show_perhitungan){
   //  echo "S2 Minat Seni Wirausaha=".number_format($s2_minat_seni_wirusaha, dec())."<br>";
   //  echo "S2 Minat Seni Kemanusiaan=".number_format($s2_minat_seni_kemanusiaan, dec())."<br>";
   //      echo "S2 Minat Seni SENIOR=".number_format($s2_minat_seni_senior, dec())."<br>";
   //      echo "S2 Minat Seni MAPALA=".number_format($s2_minat_seni_mapala, dec())."<br>";
   //      echo "S2 Minat Seni Persma=".number_format($s2_minat_seni_persma, dec())."<br>";
   //      echo "S2 Minat Seni Bahasa=".number_format($s2_minat_seni_bahasa, dec())."<br>";
   //      echo "S2 Minat Seni Pramuka=".number_format($s2_minat_seni_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_b Sanguin
   //  $s2_minat_olahraga_wirusaha = get_s2_populasi($db_object, 'minat', 'Wirausaha', $x_minat_olahraga_wirusaha, $jumlah_wirausaha);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_olahraga_kemanusiaan = get_s2_populasi($db_object, 'minat', 'Kemanusiaan (ksr, humaniora)', $x_minat_olahraga_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_olahraga_senior = get_s2_populasi($db_object, 'minat', 'SENIOR (senior, bola, karate, taekwondo)', $x_minat_olahraga_senior, $jumlah_senior);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_olahraga_mapala = get_s2_populasi($db_object, 'minat', 'Pecinta Alam (MAPALA)', $x_minat_olahraga_mapala, $jumlah_mapala);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_olahraga_persma = get_s2_populasi($db_object, 'minat', 'Persma', $x_minat_olahraga_persma, $jumlah_persma);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_olahraga_bahasa = get_s2_populasi($db_object, 'minat', 'Bahasa', $x_minat_olahraga_bahasa, $jumlah_bahasa);
   //   //S2 jawaban_b Koleris
   //  $s2_minat_olahraga_pramuka = get_s2_populasi($db_object, 'minat', 'Pramuka', $x_minat_olahraga_pramuka, $jumlah_pramuka);
    
   //      if($show_perhitungan){
   //  echo "S2 Minat Olahraga Wirausaha=".number_format($s2_minat_olahraga_wirusaha, dec())."<br>";
   //  echo "S2 Minat Olahraga Kemanusiaan=".number_format($s2_minat_olahraga_kemanusiaan, dec())."<br>";
   //      echo "S2 Minat Olahraga SENIOR=".number_format($s2_minat_olahraga_senior, dec())."<br>";
   //      echo "S2 Minat Olahraga MAPALA=".number_format($s2_minat_olahraga_mapala, dec())."<br>";
   //      echo "S2 Minat Olahraga Persma=".number_format($s2_minat_olahraga_persma, dec())."<br>";
   //      echo "S2 Minat Olahraga Bahasa=".number_format($s2_minat_olahraga_bahasa, dec())."<br>";
   //      echo "S2 Minat Olahraga Pramuka=".number_format($s2_minat_olahraga_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_b Sanguin
   //  $s2_minat_mapala_wirusaha = get_s2_populasi($db_object, 'minat', 'Wirausaha', $x_minat_mapala_wirusaha, $jumlah_wirausaha);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_mapala_kemanusiaan = get_s2_populasi($db_object, 'minat', 'Kemanusiaan (ksr, humaniora)', $x_minat_mapala_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_mapala_senior = get_s2_populasi($db_object, 'minat', 'SENIOR (senior, bola, karate, taekwondo)', $x_minat_mapala_senior, $jumlah_senior);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_mapala_mapala = get_s2_populasi($db_object, 'minat', 'Pecinta Alam (MAPALA)', $x_minat_mapala_mapala, $jumlah_mapala);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_mapala_persma = get_s2_populasi($db_object, 'minat', 'Persma', $x_minat_mapala_persma, $jumlah_persma);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_mapala_bahasa = get_s2_populasi($db_object, 'minat', 'Bahasa', $x_minat_mapala_bahasa, $jumlah_bahasa);
   //   //S2 jawaban_b Koleris
   //  $s2_minat_mapala_pramuka = get_s2_populasi($db_object, 'minat', 'Pramuka', $x_minat_mapala_pramuka, $jumlah_pramuka);
    
   //      if($show_perhitungan){
   //  echo "S2 Minat MAPALA Wirausaha=".number_format($s2_minat_mapala_wirusaha, dec())."<br>";
   //  echo "S2 Minat MAPALA Kemanusiaan=".number_format($s2_minat_mapala_kemanusiaan, dec())."<br>";
   //      echo "S2 Minat MAPALA SENIOR=".number_format($s2_minat_mapala_senior, dec())."<br>";
   //      echo "S2 Minat MAPALA MAPALA=".number_format($s2_minat_mapala_mapala, dec())."<br>";
   //      echo "S2 Minat MAPALA Persma=".number_format($s2_minat_mapala_persma, dec())."<br>";
   //      echo "S2 Minat MAPALA Bahasa=".number_format($s2_minat_mapala_bahasa, dec())."<br>";
   //      echo "S2 Minat MAPALA Pramuka=".number_format($s2_minat_mapala_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_b Sanguin
   //  $s2_minat_beladiri_wirusaha = get_s2_populasi($db_object, 'minat', 'Wirausaha', $x_minat_beladiri_wirusaha, $jumlah_wirausaha);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_beladiri_kemanusiaan = get_s2_populasi($db_object, 'minat', 'Kemanusiaan (ksr, humaniora)', $x_minat_beladiri_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_beladiri_senior = get_s2_populasi($db_object, 'minat', 'SENIOR (senior, bola, karate, taekwondo)', $x_minat_beladiri_senior, $jumlah_senior);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_beladiri_mapala = get_s2_populasi($db_object, 'minat', 'Pecinta Alam (MAPALA)', $x_minat_beladiri_mapala, $jumlah_mapala);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_beladiri_persma = get_s2_populasi($db_object, 'minat', 'Persma', $x_minat_beladiri_persma, $jumlah_persma);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_beladiri_bahasa = get_s2_populasi($db_object, 'minat', 'Bahasa', $x_minat_beladiri_bahasa, $jumlah_bahasa);
   //   //S2 jawaban_b Koleris
   //  $s2_minat_beladiri_pramuka = get_s2_populasi($db_object, 'minat', 'Pramuka', $x_minat_beladiri_pramuka, $jumlah_pramuka);
    
   //      if($show_perhitungan){
   //  echo "S2 Minat Bela Diri Wirausaha=".number_format($s2_minat_beladiri_wirusaha, dec())."<br>";
   //  echo "S2 Minat Bela Diri Kemanusiaan=".number_format($s2_minat_beladiri_kemanusiaan, dec())."<br>";
   //      echo "S2 Minat Bela Diri SENIOR=".number_format($s2_minat_beladiri_senior, dec())."<br>";
   //      echo "S2 Minat Bela Diri MAPALA=".number_format($s2_minat_beladiri_mapala, dec())."<br>";
   //      echo "S2 Minat Bela Diri Persma=".number_format($s2_minat_beladiri_persma, dec())."<br>";
   //      echo "S2 Minat Bela Diri Bahasa=".number_format($s2_minat_beladiri_bahasa, dec())."<br>";
   //      echo "S2 Minat Bela Diri Pramuka=".number_format($s2_minat_beladiri_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_b Sanguin
   //  $s2_minat_jurnalistik_wirusaha = get_s2_populasi($db_object, 'minat', 'Wirausaha', $x_minat_jurnalistik_wirusaha, $jumlah_wirausaha);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_jurnalistik_kemanusiaan = get_s2_populasi($db_object, 'minat', 'Kemanusiaan (ksr, humaniora)', $x_minat_jurnalistik_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_jurnalistik_senior = get_s2_populasi($db_object, 'minat', 'SENIOR (senior, bola, karate, taekwondo)', $x_minat_jurnalistik_senior, $jumlah_senior);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_jurnalistik_mapala = get_s2_populasi($db_object, 'minat', 'Pecinta Alam (MAPALA)', $x_minat_jurnalistik_mapala, $jumlah_mapala);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_jurnalistik_persma = get_s2_populasi($db_object, 'minat', 'Persma', $x_minat_jurnalistik_persma, $jumlah_persma);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_jurnalistik_bahasa = get_s2_populasi($db_object, 'minat', 'Bahasa', $x_minat_jurnalistik_bahasa, $jumlah_bahasa);
   //   //S2 jawaban_b Koleris
   //  $s2_minat_jurnalistik_pramuka = get_s2_populasi($db_object, 'minat', 'Pramuka', $x_minat_jurnalistik_pramuka, $jumlah_pramuka);
    
   //      if($show_perhitungan){
   //  echo "S2 Minat Jurnalistik Wirausaha=".number_format($s2_minat_jurnalistik_wirusaha, dec())."<br>";
   //  echo "S2 Minat Jurnalistik Kemanusiaan=".number_format($s2_minat_jurnalistik_kemanusiaan, dec())."<br>";
   //      echo "S2 Minat Jurnalistik SENIOR=".number_format($s2_minat_jurnalistik_senior, dec())."<br>";
   //      echo "S2 Minat Jurnalistik MAPALA=".number_format($s2_minat_jurnalistik_mapala, dec())."<br>";
   //      echo "S2 Minat Jurnalistik Persma=".number_format($s2_minat_jurnalistik_persma, dec())."<br>";
   //      echo "S2 Minat Jurnalistik Bahasa=".number_format($s2_minat_jurnalistik_bahasa, dec())."<br>";
   //      echo "S2 Minat Jurnalistik Pramuka=".number_format($s2_minat_jurnalistik_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_b Sanguin
   //  $s2_minat_kesehatan_wirusaha = get_s2_populasi($db_object, 'minat', 'Wirausaha', $x_minat_kesehatan_wirusaha, $jumlah_wirausaha);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_kesehatan_kemanusiaan = get_s2_populasi($db_object, 'minat', 'Kemanusiaan (ksr, humaniora)', $x_minat_kesehatan_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_kesehatan_senior = get_s2_populasi($db_object, 'minat', 'SENIOR (senior, bola, karate, taekwondo)', $x_minat_kesehatan_senior, $jumlah_senior);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_kesehatan_mapala = get_s2_populasi($db_object, 'minat', 'Pecinta Alam (MAPALA)', $x_minat_kesehatan_mapala, $jumlah_mapala);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_kesehatan_persma = get_s2_populasi($db_object, 'minat', 'Persma', $x_minat_kesehatan_persma, $jumlah_persma);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_kesehatan_bahasa = get_s2_populasi($db_object, 'minat', 'Bahasa', $x_minat_kesehatan_bahasa, $jumlah_bahasa);
   //   //S2 jawaban_b Koleris
   //  $s2_minat_kesehatan_pramuka = get_s2_populasi($db_object, 'minat', 'Pramuka', $x_minat_kesehatan_pramuka, $jumlah_pramuka);
    
   //      if($show_perhitungan){
   //  echo "S2 Minat Kesehatan Wirausaha=".number_format($s2_minat_kesehatan_wirusaha, dec())."<br>";
   //  echo "S2 Minat Kesehatan Kemanusiaan=".number_format($s2_minat_kesehatan_kemanusiaan, dec())."<br>";
   //      echo "S2 Minat Kesehatan SENIOR=".number_format($s2_minat_kesehatan_senior, dec())."<br>";
   //      echo "S2 Minat Kesehatan MAPALA=".number_format($s2_minat_kesehatan_mapala, dec())."<br>";
   //      echo "S2 Minat Kesehatan Persma=".number_format($s2_minat_kesehatan_persma, dec())."<br>";
   //      echo "S2 Minat Kesehatan Bahasa=".number_format($s2_minat_kesehatan_bahasa, dec())."<br>";
   //      echo "S2 Minat Kesehatan Pramuka=".number_format($s2_minat_kesehatan_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_b Sanguin
   //  $s2_minat_wirausaha_wirusaha = get_s2_populasi($db_object, 'minat', 'Wirausaha', $x_minat_wirausaha_wirusaha, $jumlah_wirausaha);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_wirausaha_kemanusiaan = get_s2_populasi($db_object, 'minat', 'Kemanusiaan (ksr, humaniora)', $x_minat_wirausaha_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_wirausaha_senior = get_s2_populasi($db_object, 'minat', 'SENIOR (senior, bola, karate, taekwondo)', $x_minat_wirausaha_senior, $jumlah_senior);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_wirausaha_mapala = get_s2_populasi($db_object, 'minat', 'Pecinta Alam (MAPALA)', $x_minat_wirausaha_mapala, $jumlah_mapala);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_wirausaha_persma = get_s2_populasi($db_object, 'minat', 'Persma', $x_minat_wirausaha_persma, $jumlah_persma);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_wirausaha_bahasa = get_s2_populasi($db_object, 'minat', 'Bahasa', $x_minat_wirausaha_bahasa, $jumlah_bahasa);
   //   //S2 jawaban_b Koleris
   //  $s2_minat_wirausaha_pramuka = get_s2_populasi($db_object, 'minat', 'Pramuka', $x_minat_wirausaha_pramuka, $jumlah_pramuka);
    
   //      if($show_perhitungan){
   //  echo "S2 Minat Wirausaha Wirausaha=".number_format($s2_minat_wirausaha_wirusaha, dec())."<br>";
   //  echo "S2 Minat Wirausaha Kemanusiaan=".number_format($s2_minat_wirausaha_kemanusiaan, dec())."<br>";
   //      echo "S2 Minat Wirausaha SENIOR=".number_format($s2_minat_wirausaha_senior, dec())."<br>";
   //      echo "S2 Minat Wirausaha MAPALA=".number_format($s2_minat_wirausaha_mapala, dec())."<br>";
   //      echo "S2 Minat Wirausaha Persma=".number_format($s2_minat_wirausaha_persma, dec())."<br>";
   //      echo "S2 Minat Wirausaha Bahasa=".number_format($s2_minat_wirausaha_bahasa, dec())."<br>";
   //      echo "S2 Minat Wirausaha Pramuka=".number_format($s2_minat_wirausaha_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_b Sanguin
   //  $s2_minat_bahasa_wirusaha = get_s2_populasi($db_object, 'minat', 'Wirausaha', $x_minat_bahasa_wirusaha, $jumlah_wirausaha);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_bahasa_kemanusiaan = get_s2_populasi($db_object, 'minat', 'Kemanusiaan (ksr, humaniora)', $x_minat_bahasa_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_bahasa_senior = get_s2_populasi($db_object, 'minat', 'SENIOR (senior, bola, karate, taekwondo)', $x_minat_bahasa_senior, $jumlah_senior);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_bahasa_mapala = get_s2_populasi($db_object, 'minat', 'Pecinta Alam (MAPALA)', $x_minat_bahasa_mapala, $jumlah_mapala);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_bahasa_persma = get_s2_populasi($db_object, 'minat', 'Persma', $x_minat_bahasa_persma, $jumlah_persma);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_bahasa_bahasa = get_s2_populasi($db_object, 'minat', 'Bahasa', $x_minat_bahasa_bahasa, $jumlah_bahasa);
   //   //S2 jawaban_b Koleris
   //  $s2_minat_bahasa_pramuka = get_s2_populasi($db_object, 'minat', 'Pramuka', $x_minat_bahasa_pramuka, $jumlah_pramuka);
    
   //      if($show_perhitungan){
   //  echo "S2 Minat Bahasa Wirausaha=".number_format($s2_minat_bahasa_wirusaha, dec())."<br>";
   //  echo "S2 Minat Bahasa Kemanusiaan=".number_format($s2_minat_bahasa_kemanusiaan, dec())."<br>";
   //      echo "S2 Minat Bahasa SENIOR=".number_format($s2_minat_bahasa_senior, dec())."<br>";
   //      echo "S2 Minat Bahasa MAPALA=".number_format($s2_minat_bahasa_mapala, dec())."<br>";
   //      echo "S2 Minat Bahasa Persma=".number_format($s2_minat_bahasa_persma, dec())."<br>";
   //      echo "S2 Minat Bahasa Bahasa=".number_format($s2_minat_bahasa_bahasa, dec())."<br>";
   //      echo "S2 Minat Bahasa Pramuka=".number_format($s2_minat_bahasa_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_b Sanguin
   //  $s2_minat_kemanusiaan_wirusaha = get_s2_populasi($db_object, 'minat', 'Wirausaha', $x_minat_kemanusiaan_wirusaha, $jumlah_wirausaha);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_kemanusiaan_kemanusiaan = get_s2_populasi($db_object, 'minat', 'Kemanusiaan (ksr, humaniora)', $x_minat_kemanusiaan_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_kemanusiaan_senior = get_s2_populasi($db_object, 'minat', 'SENIOR (senior, bola, karate, taekwondo)', $x_minat_kemanusiaan_senior, $jumlah_senior);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_kemanusiaan_mapala = get_s2_populasi($db_object, 'minat', 'Pecinta Alam (MAPALA)', $x_minat_kemanusiaan_mapala, $jumlah_mapala);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_kemanusiaan_persma = get_s2_populasi($db_object, 'minat', 'Persma', $x_minat_kemanusiaan_persma, $jumlah_persma);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_kemanusiaan_bahasa = get_s2_populasi($db_object, 'minat', 'Bahasa', $x_minat_kemanusiaan_bahasa, $jumlah_bahasa);
   //   //S2 jawaban_b Koleris
   //  $s2_minat_kemanusiaan_pramuka = get_s2_populasi($db_object, 'minat', 'Pramuka', $x_minat_kemanusiaan_pramuka, $jumlah_pramuka);
    
   //      if($show_perhitungan){
   //  echo "S2 Minat Kemanusiaan Wirausaha=".number_format($s2_minat_kemanusiaan_wirusaha, dec())."<br>";
   //  echo "S2 Minat Kemanusiaan Kemanusiaan=".number_format($s2_minat_kemanusiaan_kemanusiaan, dec())."<br>";
   //      echo "S2 Minat Kemanusiaan SENIOR=".number_format($s2_minat_kemanusiaan_senior, dec())."<br>";
   //      echo "S2 Minat Kemanusiaan MAPALA=".number_format($s2_minat_kemanusiaan_mapala, dec())."<br>";
   //      echo "S2 Minat Kemanusiaan Persma=".number_format($s2_minat_kemanusiaan_persma, dec())."<br>";
   //      echo "S2 Minat Kemanusiaan Bahasa=".number_format($s2_minat_kemanusiaan_bahasa, dec())."<br>";
   //      echo "S2 Minat Kemanusiaan Pramuka=".number_format($s2_minat_kemanusiaan_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_b Sanguin
   //  $s2_minat_pramuka_wirusaha = get_s2_populasi($db_object, 'minat', 'Wirausaha', $x_minat_pramuka_wirusaha, $jumlah_wirausaha);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_pramuka_kemanusiaan = get_s2_populasi($db_object, 'minat', 'Kemanusiaan (ksr, humaniora)', $x_minat_pramuka_kemanusiaan, $jumlah_kemanusiaan);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_pramuka_senior = get_s2_populasi($db_object, 'minat', 'SENIOR (senior, bola, karate, taekwondo)', $x_minat_pramuka_senior, $jumlah_senior);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_pramuka_mapala = get_s2_populasi($db_object, 'minat', 'Pecinta Alam (MAPALA)', $x_minat_pramuka_mapala, $jumlah_mapala);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_pramuka_persma = get_s2_populasi($db_object, 'minat', 'Persma', $x_minat_pramuka_persma, $jumlah_persma);
   //  //S2 jawaban_b Koleris
   //  $s2_minat_pramuka_bahasa = get_s2_populasi($db_object, 'minat', 'Bahasa', $x_minat_pramuka_bahasa, $jumlah_bahasa);
   //   //S2 jawaban_b Koleris
   //  $s2_minat_pramuka_pramuka = get_s2_populasi($db_object, 'minat', 'Pramuka', $x_minat_pramuka_pramuka, $jumlah_pramuka);
    
   //      if($show_perhitungan){
   //  echo "S2 Minat Pramuka Wirausaha=".number_format($s2_minat_pramuka_wirusaha, dec())."<br>";
   //  echo "S2 Minat Pramuka Kemanusiaan=".number_format($s2_minat_pramuka_kemanusiaan, dec())."<br>";
   //      echo "S2 Minat Pramuka SENIOR=".number_format($s2_minat_pramuka_senior, dec())."<br>";
   //      echo "S2 Minat Pramuka MAPALA=".number_format($s2_minat_pramuka_mapala, dec())."<br>";
   //      echo "S2 Minat Pramuka Persma=".number_format($s2_minat_pramuka_persma, dec())."<br>";
   //      echo "S2 Minat Pramuka Bahasa=".number_format($s2_minat_pramuka_bahasa, dec())."<br>";
   //      echo "S2 Minat Pramuka Pramuka=".number_format($s2_minat_pramuka_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S jawaban_b Sanguin
   //  $s_minat_seni_wirusaha = sqrt($s2_minat_seni_wirusaha);
   //  //S jawaban_b Koleris
   //  $s_minat_seni_kemanusiaan = sqrt($s2_minat_seni_kemanusiaan);
   //      //S jawaban_b Melankolis
   //  $s_minat_seni_senior = sqrt($s2_minat_seni_senior);
   //      //S jawaban_b Plegmatis
   //  $s_minat_seni_mapala = sqrt($s2_minat_seni_mapala);
   //       //S jawaban_b Plegmatis
   //  $s_minat_seni_persma = sqrt($s2_minat_seni_persma);
   //       //S jawaban_b Plegmatis
   //  $s_minat_seni_bahasa = sqrt($s2_minat_seni_bahasa);
   //       //S jawaban_b Plegmatis
   //  $s_minat_seni_pramuka = sqrt($s2_minat_seni_pramuka);
        
   //      //s2 ^2 jawaban_b sanguin
   //      $s2_pangkat2_minat_seni_wirusaha = pow($s2_minat_seni_wirusaha, 2);
   //      //s2 ^2 jawaban_b koleris
   //      $s2_pangkat2_minat_seni_kemanusiaan = pow($s2_minat_seni_kemanusiaan, 2);
   //      //s2 ^2 jawaban_b melankolis
   //      $s2_pangkat2_minat_seni_senior = pow($s2_minat_seni_senior, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_seni_mapala = pow($s2_minat_seni_mapala, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_seni_persma = pow($s2_minat_seni_persma, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_seni_bahasa = pow($s2_minat_seni_bahasa, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_seni_pramuka = pow($s2_minat_seni_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Minat Seni Wirausaha=".number_format($s_minat_seni_wirusaha, dec())."<br>";
   //  echo "S Minat Seni Kemanusiaan=".number_format($s_minat_seni_kemanusiaan, dec())."<br>";
   //      echo "S Minat Seni SENIOR=".number_format($s_minat_seni_senior, dec())."<br>";
   //      echo "S Minat Seni MAPALA=".number_format($s_minat_seni_mapala, dec())."<br>";
   //      echo "S Minat Seni Persma=".number_format($s_minat_seni_persma, dec())."<br>";
   //      echo "S Minat Seni Bahasa=".number_format($s_minat_seni_bahasa, dec())."<br>";
   //      echo "S Minat Seni Pramuka=".number_format($s_minat_seni_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_b Sanguin
   //  $s_minat_olahraga_wirusaha = sqrt($s2_minat_olahraga_wirusaha);
   //  //S jawaban_b Koleris
   //  $s_minat_olahraga_kemanusiaan = sqrt($s2_minat_olahraga_kemanusiaan);
   //      //S jawaban_b Melankolis
   //  $s_minat_olahraga_senior = sqrt($s2_minat_olahraga_senior);
   //      //S jawaban_b Plegmatis
   //  $s_minat_olahraga_mapala = sqrt($s2_minat_olahraga_mapala);
   //       //S jawaban_b Plegmatis
   //  $s_minat_olahraga_persma = sqrt($s2_minat_olahraga_persma);
   //       //S jawaban_b Plegmatis
   //  $s_minat_olahraga_bahasa = sqrt($s2_minat_olahraga_bahasa);
   //       //S jawaban_b Plegmatis
   //  $s_minat_olahraga_pramuka = sqrt($s2_minat_olahraga_pramuka);
        
   //      //s2 ^2 jawaban_b sanguin
   //      $s2_pangkat2_minat_olahraga_wirusaha = pow($s2_minat_olahraga_wirusaha, 2);
   //      //s2 ^2 jawaban_b koleris
   //      $s2_pangkat2_minat_olahraga_kemanusiaan = pow($s2_minat_olahraga_kemanusiaan, 2);
   //      //s2 ^2 jawaban_b melankolis
   //      $s2_pangkat2_minat_olahraga_senior = pow($s2_minat_olahraga_senior, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_olahraga_mapala = pow($s2_minat_olahraga_mapala, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_olahraga_persma = pow($s2_minat_olahraga_persma, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_olahraga_bahasa = pow($s2_minat_olahraga_bahasa, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_olahraga_pramuka = pow($s2_minat_olahraga_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Minat Olahraga Wirausaha=".number_format($s_minat_olahraga_wirusaha, dec())."<br>";
   //  echo "S Minat Olahraga Kemanusiaan=".number_format($s_minat_olahraga_kemanusiaan, dec())."<br>";
   //      echo "S Minat Olahraga SENIOR=".number_format($s_minat_olahraga_senior, dec())."<br>";
   //      echo "S Minat Olahraga MAPALA=".number_format($s_minat_olahraga_mapala, dec())."<br>";
   //      echo "S Minat Olahraga Persma=".number_format($s_minat_olahraga_persma, dec())."<br>";
   //      echo "S Minat Olahraga Bahasa=".number_format($s_minat_olahraga_bahasa, dec())."<br>";
   //      echo "S Minat Olahraga Pramuka=".number_format($s_minat_olahraga_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_b Sanguin
   //  $s_minat_mapala_wirusaha = sqrt($s2_minat_mapala_wirusaha);
   //  //S jawaban_b Koleris
   //  $s_minat_mapala_kemanusiaan = sqrt($s2_minat_mapala_kemanusiaan);
   //      //S jawaban_b Melankolis
   //  $s_minat_mapala_senior = sqrt($s2_minat_mapala_senior);
   //      //S jawaban_b Plegmatis
   //  $s_minat_mapala_mapala = sqrt($s2_minat_mapala_mapala);
   //       //S jawaban_b Plegmatis
   //  $s_minat_mapala_persma = sqrt($s2_minat_mapala_persma);
   //       //S jawaban_b Plegmatis
   //  $s_minat_mapala_bahasa = sqrt($s2_minat_mapala_bahasa);
   //       //S jawaban_b Plegmatis
   //  $s_minat_mapala_pramuka = sqrt($s2_minat_mapala_pramuka);
        
   //      //s2 ^2 jawaban_b sanguin
   //      $s2_pangkat2_minat_mapala_wirusaha = pow($s2_minat_mapala_wirusaha, 2);
   //      //s2 ^2 jawaban_b koleris
   //      $s2_pangkat2_minat_mapala_kemanusiaan = pow($s2_minat_mapala_kemanusiaan, 2);
   //      //s2 ^2 jawaban_b melankolis
   //      $s2_pangkat2_minat_mapala_senior = pow($s2_minat_mapala_senior, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_mapala_mapala = pow($s2_minat_mapala_mapala, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_mapala_persma = pow($s2_minat_mapala_persma, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_mapala_bahasa = pow($s2_minat_mapala_bahasa, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_mapala_pramuka = pow($s2_minat_mapala_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Minat MAPALA Wirausaha=".number_format($s_minat_mapala_wirusaha, dec())."<br>";
   //  echo "S Minat MAPALA Kemanusiaan=".number_format($s_minat_mapala_kemanusiaan, dec())."<br>";
   //      echo "S Minat MAPALA SENIOR=".number_format($s_minat_mapala_senior, dec())."<br>";
   //      echo "S Minat MAPALA MAPALA=".number_format($s_minat_mapala_mapala, dec())."<br>";
   //      echo "S Minat MAPALA Persma=".number_format($s_minat_mapala_persma, dec())."<br>";
   //      echo "S Minat MAPALA Bahasa=".number_format($s_minat_mapala_bahasa, dec())."<br>";
   //      echo "S Minat MAPALA Pramuka=".number_format($s_minat_mapala_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_b Sanguin
   //  $s_minat_beladiri_wirusaha = sqrt($s2_minat_beladiri_wirusaha);
   //  //S jawaban_b Koleris
   //  $s_minat_beladiri_kemanusiaan = sqrt($s2_minat_beladiri_kemanusiaan);
   //      //S jawaban_b Melankolis
   //  $s_minat_beladiri_senior = sqrt($s2_minat_beladiri_senior);
   //      //S jawaban_b Plegmatis
   //  $s_minat_beladiri_mapala = sqrt($s2_minat_beladiri_mapala);
   //       //S jawaban_b Plegmatis
   //  $s_minat_beladiri_persma = sqrt($s2_minat_beladiri_persma);
   //       //S jawaban_b Plegmatis
   //  $s_minat_beladiri_bahasa = sqrt($s2_minat_beladiri_bahasa);
   //       //S jawaban_b Plegmatis
   //  $s_minat_beladiri_pramuka = sqrt($s2_minat_beladiri_pramuka);
        
   //      //s2 ^2 jawaban_b sanguin
   //      $s2_pangkat2_minat_beladiri_wirusaha = pow($s2_minat_beladiri_wirusaha, 2);
   //      //s2 ^2 jawaban_b koleris
   //      $s2_pangkat2_minat_beladiri_kemanusiaan = pow($s2_minat_beladiri_kemanusiaan, 2);
   //      //s2 ^2 jawaban_b melankolis
   //      $s2_pangkat2_minat_beladiri_senior = pow($s2_minat_beladiri_senior, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_beladiri_mapala = pow($s2_minat_beladiri_mapala, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_beladiri_persma = pow($s2_minat_beladiri_persma, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_beladiri_bahasa = pow($s2_minat_beladiri_bahasa, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_beladiri_pramuka = pow($s2_minat_beladiri_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Minat Bela Diri Wirausaha=".number_format($s_minat_beladiri_wirusaha, dec())."<br>";
   //  echo "S Minat Bela Diri Kemanusiaan=".number_format($s_minat_beladiri_kemanusiaan, dec())."<br>";
   //      echo "S Minat Bela Diri SENIOR=".number_format($s_minat_beladiri_senior, dec())."<br>";
   //      echo "S Minat Bela Diri MAPALA=".number_format($s_minat_beladiri_mapala, dec())."<br>";
   //      echo "S Minat Bela Diri Persma=".number_format($s_minat_beladiri_persma, dec())."<br>";
   //      echo "S Minat Bela Diri Bahasa=".number_format($s_minat_beladiri_bahasa, dec())."<br>";
   //      echo "S Minat Bela Diri Pramuka=".number_format($s_minat_beladiri_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_b Sanguin
   //  $s_minat_jurnalistik_wirusaha = sqrt($s2_minat_jurnalistik_wirusaha);
   //  //S jawaban_b Koleris
   //  $s_minat_jurnalistik_kemanusiaan = sqrt($s2_minat_jurnalistik_kemanusiaan);
   //      //S jawaban_b Melankolis
   //  $s_minat_jurnalistik_senior = sqrt($s2_minat_jurnalistik_senior);
   //      //S jawaban_b Plegmatis
   //  $s_minat_jurnalistik_mapala = sqrt($s2_minat_jurnalistik_mapala);
   //       //S jawaban_b Plegmatis
   //  $s_minat_jurnalistik_persma = sqrt($s2_minat_jurnalistik_persma);
   //       //S jawaban_b Plegmatis
   //  $s_minat_jurnalistik_bahasa = sqrt($s2_minat_jurnalistik_bahasa);
   //       //S jawaban_b Plegmatis
   //  $s_minat_jurnalistik_pramuka = sqrt($s2_minat_jurnalistik_pramuka);
        
   //      //s2 ^2 jawaban_b sanguin
   //      $s2_pangkat2_minat_jurnalistik_wirusaha = pow($s2_minat_jurnalistik_wirusaha, 2);
   //      //s2 ^2 jawaban_b koleris
   //      $s2_pangkat2_minat_jurnalistik_kemanusiaan = pow($s2_minat_jurnalistik_kemanusiaan, 2);
   //      //s2 ^2 jawaban_b melankolis
   //      $s2_pangkat2_minat_jurnalistik_senior = pow($s2_minat_jurnalistik_senior, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_jurnalistik_mapala = pow($s2_minat_jurnalistik_mapala, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_jurnalistik_persma = pow($s2_minat_jurnalistik_persma, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_jurnalistik_bahasa = pow($s2_minat_jurnalistik_bahasa, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_jurnalistik_pramuka = pow($s2_minat_jurnalistik_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Minat Jurnalistik Wirausaha=".number_format($s_minat_jurnalistik_wirusaha, dec())."<br>";
   //  echo "S Minat Jurnalistik Kemanusiaan=".number_format($s_minat_jurnalistik_kemanusiaan, dec())."<br>";
   //      echo "S Minat Jurnalistik SENIOR=".number_format($s_minat_jurnalistik_senior, dec())."<br>";
   //      echo "S Minat Jurnalistik MAPALA=".number_format($s_minat_jurnalistik_mapala, dec())."<br>";
   //      echo "S Minat Jurnalistik Persma=".number_format($s_minat_jurnalistik_persma, dec())."<br>";
   //      echo "S Minat Jurnalistik Bahasa=".number_format($s_minat_jurnalistik_bahasa, dec())."<br>";
   //      echo "S Minat Jurnalistik Pramuka=".number_format($s_minat_jurnalistik_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_b Sanguin
   //  $s_minat_kesehatan_wirusaha = sqrt($s2_minat_kesehatan_wirusaha);
   //  //S jawaban_b Koleris
   //  $s_minat_kesehatan_kemanusiaan = sqrt($s2_minat_kesehatan_kemanusiaan);
   //      //S jawaban_b Melankolis
   //  $s_minat_kesehatan_senior = sqrt($s2_minat_kesehatan_senior);
   //      //S jawaban_b Plegmatis
   //  $s_minat_kesehatan_mapala = sqrt($s2_minat_kesehatan_mapala);
   //       //S jawaban_b Plegmatis
   //  $s_minat_kesehatan_persma = sqrt($s2_minat_kesehatan_persma);
   //       //S jawaban_b Plegmatis
   //  $s_minat_kesehatan_bahasa = sqrt($s2_minat_kesehatan_bahasa);
   //       //S jawaban_b Plegmatis
   //  $s_minat_kesehatan_pramuka = sqrt($s2_minat_kesehatan_pramuka);
        
   //      //s2 ^2 jawaban_b sanguin
   //      $s2_pangkat2_minat_kesehatan_wirusaha = pow($s2_minat_kesehatan_wirusaha, 2);
   //      //s2 ^2 jawaban_b koleris
   //      $s2_pangkat2_minat_kesehatankemanusiaan = pow($s2_minat_kesehatan_kemanusiaan, 2);
   //      //s2 ^2 jawaban_b melankolis
   //      $s2_pangkat2_minat_kesehatan_senior = pow($s2_minat_kesehatan_senior, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_kesehatan_mapala = pow($s2_minat_kesehatan_mapala, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_kesehatan_persma = pow($s2_minat_kesehatan_persma, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_kesehatan_bahasa = pow($s2_minat_kesehatan_bahasa, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_kesehatan_pramuka = pow($s2_minat_kesehatan_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Minat Kesehatan Wirausaha=".number_format($s_minat_kesehatan_wirusaha, dec())."<br>";
   //  echo "S Minat Kesehatan Kemanusiaan=".number_format($s_minat_kesehatan_kemanusiaan, dec())."<br>";
   //      echo "S Minat Kesehatan SENIOR=".number_format($s_minat_kesehatan_senior, dec())."<br>";
   //      echo "S Minat Kesehatan MAPALA=".number_format($s_minat_kesehatan_mapala, dec())."<br>";
   //      echo "S Minat Kesehatan Persma=".number_format($s_minat_kesehatan_persma, dec())."<br>";
   //      echo "S Minat Kesehatan Bahasa=".number_format($s_minat_kesehatan_bahasa, dec())."<br>";
   //      echo "S Minat Kesehatan Pramuka=".number_format($s_minat_kesehatan_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_b Sanguin
   //  $s_minat_wirausaha_wirusaha = sqrt($s2_minat_wirausaha_wirusaha);
   //  //S jawaban_b Koleris
   //  $s_minat_wirausaha_kemanusiaan = sqrt($s2_minat_wirausaha_kemanusiaan);
   //      //S jawaban_b Melankolis
   //  $s_minat_wirausaha_senior = sqrt($s2_minat_wirausaha_senior);
   //      //S jawaban_b Plegmatis
   //  $s_minat_wirausaha_mapala = sqrt($s2_minat_wirausaha_mapala);
   //       //S jawaban_b Plegmatis
   //  $s_minat_wirausaha_persma = sqrt($s2_minat_wirausaha_persma);
   //       //S jawaban_b Plegmatis
   //  $s_minat_wirausaha_bahasa = sqrt($s2_minat_wirausaha_bahasa);
   //       //S jawaban_b Plegmatis
   //  $s_minat_wirausaha_pramuka = sqrt($s2_minat_wirausaha_pramuka);
        
   //      //s2 ^2 jawaban_b sanguin
   //      $s2_pangkat2_minat_wirausaha_wirusaha = pow($s2_minat_wirausaha_wirusaha, 2);
   //      //s2 ^2 jawaban_b koleris
   //      $s2_pangkat2_minat_wirausaha_kemanusiaan = pow($s2_minat_wirausaha_kemanusiaan, 2);
   //      //s2 ^2 jawaban_b melankolis
   //      $s2_pangkat2_minat_wirausaha_senior = pow($s2_minat_wirausaha_senior, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_wirausaha_mapala = pow($s2_minat_wirausaha_mapala, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_wirausaha_persma = pow($s2_minat_wirausaha_persma, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_wirausaha_bahasa = pow($s2_minat_wirausaha_bahasa, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_wirausaha_pramuka = pow($s2_minat_wirausaha_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Minat Wirausaha Wirausaha=".number_format($s_minat_wirausaha_wirusaha, dec())."<br>";
   //  echo "S Minat Wirausaha Kemanusiaan=".number_format($s_minat_wirausaha_kemanusiaan, dec())."<br>";
   //      echo "S Minat Wirausaha SENIOR=".number_format($s_minat_wirausaha_senior, dec())."<br>";
   //      echo "S Minat Wirausaha MAPALA=".number_format($s_minat_wirausaha_mapala, dec())."<br>";
   //      echo "S Minat Wirausaha Persma=".number_format($s_minat_wirausaha_persma, dec())."<br>";
   //      echo "S Minat Wirausaha Bahasa=".number_format($s_minat_wirausaha_bahasa, dec())."<br>";
   //      echo "S Minat Wirausaha Pramuka=".number_format($s_minat_wirausaha_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_b Sanguin
   //  $s_minat_bahasa_wirusaha = sqrt($s2_minat_bahasa_wirusaha);
   //  //S jawaban_b Koleris
   //  $s_minat_bahasa_kemanusiaan = sqrt($s2_minat_bahasa_kemanusiaan);
   //      //S jawaban_b Melankolis
   //  $s_minat_bahasa_senior = sqrt($s2_minat_bahasa_senior);
   //      //S jawaban_b Plegmatis
   //  $s_minat_bahasa_mapala = sqrt($s2_minat_bahasa_mapala);
   //       //S jawaban_b Plegmatis
   //  $s_minat_bahasa_persma = sqrt($s2_minat_bahasa_persma);
   //       //S jawaban_b Plegmatis
   //  $s_minat_bahasa_bahasa = sqrt($s2_minat_bahasa_bahasa);
   //       //S jawaban_b Plegmatis
   //  $s_minat_bahasa_pramuka = sqrt($s2_minat_bahasa_pramuka);
        
   //      //s2 ^2 jawaban_b sanguin
   //      $s2_pangkat2_minat_bahasa_wirusaha = pow($s2_minat_bahasa_wirusaha, 2);
   //      //s2 ^2 jawaban_b koleris
   //      $s2_pangkat2_minat_bahasa_kemanusiaan = pow($s2_minat_bahasa_kemanusiaan, 2);
   //      //s2 ^2 jawaban_b melankolis
   //      $s2_pangkat2_minat_bahasa_senior = pow($s2_minat_bahasa_senior, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_bahasa_mapala = pow($s2_minat_bahasa_mapala, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_bahasa_persma = pow($s2_minat_bahasa_persma, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_bahasa_bahasa = pow($s2_minat_bahasa_bahasa, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_bahasa_pramuka = pow($s2_minat_bahasa_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Minat Bahasa Wirausaha=".number_format($s_minat_bahasa_wirusaha, dec())."<br>";
   //  echo "S Minat Bahasa Kemanusiaan=".number_format($s_minat_bahasa_kemanusiaan, dec())."<br>";
   //      echo "S Minat Bahasa SENIOR=".number_format($s_minat_bahasa_senior, dec())."<br>";
   //      echo "S Minat Bahasa MAPALA=".number_format($s_minat_bahasa_mapala, dec())."<br>";
   //      echo "S Minat Bahasa Persma=".number_format($s_minat_bahasa_persma, dec())."<br>";
   //      echo "S Minat Bahasa Bahasa=".number_format($s_minat_bahasa_bahasa, dec())."<br>";
   //      echo "S Minat Bahasa Pramuka=".number_format($s_minat_bahasa_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_b Sanguin
   //  $s_minat_kemanusiaan_wirusaha = sqrt($s2_minat_kemanusiaan_wirusaha);
   //  //S jawaban_b Koleris
   //  $s_minat_kemanusiaan_kemanusiaan = sqrt($s2_minat_kemanusiaan_kemanusiaan);
   //      //S jawaban_b Melankolis
   //  $s_minat_kemanusiaan_senior = sqrt($s2_minat_kemanusiaan_senior);
   //      //S jawaban_b Plegmatis
   //  $s_minat_kemanusiaan_mapala = sqrt($s2_minat_kemanusiaan_mapala);
   //       //S jawaban_b Plegmatis
   //  $s_minat_kemanusiaan_persma = sqrt($s2_minat_kemanusiaan_persma);
   //       //S jawaban_b Plegmatis
   //  $s_minat_kemanusiaan_bahasa = sqrt($s2_minat_kemanusiaan_bahasa);
   //       //S jawaban_b Plegmatis
   //  $s_minat_kemanusiaan_pramuka = sqrt($s2_minat_kemanusiaan_pramuka);
        
   //      //s2 ^2 jawaban_b sanguin
   //      $s2_pangkat2_minat_kemanusiaan_wirusaha = pow($s2_minat_kemanusiaan_wirusaha, 2);
   //      //s2 ^2 jawaban_b koleris
   //      $s2_pangkat2_minat_kemanusiaan_kemanusiaan = pow($s2_minat_kemanusiaan_kemanusiaan, 2);
   //      //s2 ^2 jawaban_b melankolis
   //      $s2_pangkat2_minat_kemanusiaan_senior = pow($s2_minat_kemanusiaan_senior, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_kemanusiaan_mapala = pow($s2_minat_kemanusiaan_mapala, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_kemanusiaan_persma = pow($s2_minat_kemanusiaan_persma, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_kemanusiaan_bahasa = pow($s2_minat_kemanusiaan_bahasa, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_kemanusiaan_pramuka = pow($s2_minat_kemanusiaan_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Minat Kemanusiaan Wirausaha=".number_format($s_minat_kemanusiaan_wirusaha, dec())."<br>";
   //  echo "S Minat Kemanusiaan Kemanusiaan=".number_format($s_minat_kemanusiaan_kemanusiaan, dec())."<br>";
   //      echo "S Minat Kemanusiaan SENIOR=".number_format($s_minat_kemanusiaan_senior, dec())."<br>";
   //      echo "S Minat Kemanusiaan MAPALA=".number_format($s_minat_kemanusiaan_mapala, dec())."<br>";
   //      echo "S Minat Kemanusiaan Persma=".number_format($s_minat_kemanusiaan_persma, dec())."<br>";
   //      echo "S Minat Kemanusiaan Bahasa=".number_format($s_minat_kemanusiaan_bahasa, dec())."<br>";
   //      echo "S Minat Kemanusiaan Pramuka=".number_format($s_minat_kemanusiaan_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_b Sanguin
   //  $s_minat_pramuka_wirusaha = sqrt($s2_minat_pramuka_wirusaha);
   //  //S jawaban_b Koleris
   //  $s_minat_pramuka_kemanusiaan = sqrt($s2_minat_pramuka_kemanusiaan);
   //      //S jawaban_b Melankolis
   //  $s_minat_pramuka_senior = sqrt($s2_minat_pramuka_senior);
   //      //S jawaban_b Plegmatis
   //  $s_minat_pramuka_mapala = sqrt($s2_minat_pramuka_mapala);
   //       //S jawaban_b Plegmatis
   //  $s_minat_pramuka_persma = sqrt($s2_minat_pramuka_persma);
   //       //S jawaban_b Plegmatis
   //  $s_minat_pramuka_bahasa = sqrt($s2_minat_pramuka_bahasa);
   //       //S jawaban_b Plegmatis
   //  $s_minat_pramuka_pramuka = sqrt($s2_minat_pramuka_pramuka);
        
   //      //s2 ^2 jawaban_b sanguin
   //      $s2_pangkat2_minat_pramuka_wirusaha = pow($s2_minat_pramuka_wirusaha, 2);
   //      //s2 ^2 jawaban_b koleris
   //      $s2_pangkat2_minat_pramuka_kemanusiaan = pow($s2_minat_pramuka_kemanusiaan, 2);
   //      //s2 ^2 jawaban_b melankolis
   //      $s2_pangkat2_minat_pramuka_senior = pow($s2_minat_pramuka_senior, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_pramuka_mapala = pow($s2_minat_pramuka_mapala, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_pramuka_persma = pow($s2_minat_pramuka_persma, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_pramuka_bahasa = pow($s2_minat_pramuka_bahasa, 2);
   //      //s2 ^2 jawaban_b plegmatis
   //      $s2_pangkat2_minat_pramuka_pramuka = pow($s2_minat_pramuka_pramuka, 2);

   //       if($show_perhitungan){
   //  echo "S Minat Pramuka Wirausaha=".number_format($s_minat_pramuka_wirusaha, dec())."<br>";
   //  echo "S Minat Pramuka Kemanusiaan=".number_format($s_minat_pramuka_kemanusiaan, dec())."<br>";
   //      echo "S Minat Pramuka SENIOR=".number_format($s_minat_pramuka_senior, dec())."<br>";
   //      echo "S Minat Pramuka MAPALA=".number_format($s_minat_pramuka_mapala, dec())."<br>";
   //      echo "S Minat Pramuka Persma=".number_format($s_minat_pramuka_persma, dec())."<br>";
   //      echo "S Minat Pramuka Bahasa=".number_format($s_minat_pramuka_bahasa, dec())."<br>";
   //      echo "S Minat Pramuka Pramuka=".number_format($s_minat_pramuka_pramuka, dec())."<br>";
   //      }
      
   //      //jawaban_c
   //      //x jawaban_c sanguin
   //   //bakat sanguin
   //  $jumlah_bakat_seni_wirusaha = get_jumlah_sum_atribut($db_object, "bakat", "Wirausaha");
   //  $x_bakat_seni_wirusaha = $jumlah_bakat_seni_wirusaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_bakat_seni_kemanusiaan = get_jumlah_sum_atribut($db_object, "bakat", "Kemanusiaan (ksr, humaniora)");
   //  $x_bakat_seni_kemanusiaan = $jumlah_bakat_seni_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_bakat_seni_senior = get_jumlah_sum_atribut($db_object, "bakat", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_bakat_seni_senior = $jumlah_bakat_seni_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_bakat_seni_mapala = get_jumlah_sum_atribut($db_object, "bakat", "Pecinta Alam (MAPALA)");
   //  $x_bakat_seni_mapala = $jumlah_bakat_seni_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_bakat_seni_persma = get_jumlah_sum_atribut($db_object, "bakat", "Persma");
   //  $x_bakat_seni_persma = $jumlah_bakat_seni_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_bakat_seni_bahasa = get_jumlah_sum_atribut($db_object, "bakat", "Bahasa");
   //  $x_bakat_seni_bahasa = $jumlah_bakat_seni_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_bakat_seni_pramuka = get_jumlah_sum_atribut($db_object, "bakat", "Pramuka");
   //  $x_bakat_seni_pramuka = $jumlah_bakat_seni_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_bakat_olahraga_wirusaha = get_jumlah_sum_atribut($db_object, "bakat", "Wirausaha");
   //  $x_bakat_olahraga_wirusah = $jumlah_bakat_olahraga_wirusaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_bakat_olahraga_kemanusiaan = get_jumlah_sum_atribut($db_object, "bakat", "Kemanusiaan (ksr, humaniora)");
   //  $x_bakat_olahraga_kemanusiaan = $jumlah_bakat_olahraga_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_bakat_olahraga_senior = get_jumlah_sum_atribut($db_object, "bakat", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_bakat_olahraga_senior = $jumlah_bakat_olahraga_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_bakat_olahraga_mapala = get_jumlah_sum_atribut($db_object, "bakat", "Pecinta Alam (MAPALA)");
   //  $x_bakat_olahraga_mapala = $jumlah_bakat_olahraga_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_bakat_olahraga_persma = get_jumlah_sum_atribut($db_object, "bakat", "Persma");
   //  $x_bakat_olahraga_persma = $jumlah_bakat_olahraga_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_bakat_olahraga_bahasa = get_jumlah_sum_atribut($db_object, "bakat", "Bahasa");
   //  $x_bakat_olahraga_bahasa = $jumlah_bakat_olahraga_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_bakat_olahraga_pramuka = get_jumlah_sum_atribut($db_object, "bakat", "Pramuka");
   //  $x_bakat_olahraga_pramuka = $jumlah_bakat_olahraga_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_bakat_bahasa_wirusaha = get_jumlah_sum_atribut($db_object, "bakat", "Wirausaha");
   //  $x_bakat_bahasa_wirusaha = $jumlah_bakat_bahasa_wirusaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_bakat_bahasa_kemanusiaan = get_jumlah_sum_atribut($db_object, "bakat", "Kemanusiaan (ksr, humaniora)");
   //  $x_bakat_bahasa_kemanusiaan = $jumlah_bakat_bahasa_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_bakat_bahasa_senior = get_jumlah_sum_atribut($db_object, "bakat", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_bakat_bahasa_senior = $jumlah_bakat_bahasa_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_bakat_bahasa_mapala = get_jumlah_sum_atribut($db_object, "bakat", "Pecinta Alam (MAPALA)");
   //  $x_bakat_bahasa_mapala = $jumlah_bakat_bahasa_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_bakat_bahasa_persma = get_jumlah_sum_atribut($db_object, "bakat", "Persma");
   //  $x_bakat_bahasa_persma = $jumlah_bakat_bahasa_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_bakat_bahasa_bahasa = get_jumlah_sum_atribut($db_object, "bakat", "Bahasa");
   //  $x_bakat_bahasa_bahasa = $jumlah_bakat_bahasa_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_bakat_bahasa_pramuka = get_jumlah_sum_atribut($db_object, "bakat", "Pramuka");
   //  $x_bakat_bahasa_pramuka = $jumlah_bakat_bahasa_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_bakat_lainnya_wirusaha = get_jumlah_sum_atribut($db_object, "bakat", "Wirausaha");
   //  $x_bakat_lainnya_wirusaha = $jumlah_bakat_lainnya_wirusaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_bakat_lainnya_kemanusiaan = get_jumlah_sum_atribut($db_object, "bakat", "Kemanusiaan (ksr, humaniora)");
   //  $x_bakat_lainnya_kemanusiaan = $jumlah_bakat_lainnya_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_bakat_lainnya_senior = get_jumlah_sum_atribut($db_object, "bakat", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_bakat_lainnya_senior = $jumlah_bakat_lainnya_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_bakat_lainnya_mapala = get_jumlah_sum_atribut($db_object, "bakat", "Pecinta Alam (MAPALA)");
   //  $x_bakat_lainnya_mapala = $jumlah_bakat_lainnya_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_bakat_lainnya_persma = get_jumlah_sum_atribut($db_object, "bakat", "Persma");
   //  $x_bakat_lainnya_persma = $jumlah_bakat_lainnya_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_bakat_lainnya_bahasa = get_jumlah_sum_atribut($db_object, "bakat", "Bahasa");
   //  $x_bakat_lainnya_bahasa = $jumlah_bakat_lainnya_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_bakat_lainnya_pramuka = get_jumlah_sum_atribut($db_object, "bakat", "Pramuka");
   //  $x_bakat_lainnya_pramuka = $jumlah_bakat_lainnya_pramuka/$jumlah_pramuka;
        
   //      if($show_perhitungan){
   //      echo "<br>";
   //      echo "<strong><u>Atribut Bakat Seni:<br></u></strong>";
   //  echo "X Bakat Seni Wirausaha=".number_format($x_bakat_seni_wirusaha, dec())."<br>";
   //  echo "X Bakat Seni Kemanusiaan=".number_format($x_bakat_seni_kemanusiaan, dec())."<br>";
   //      echo "X Bakat Seni SENIOR=".number_format($x_bakat_seni_senior, dec())."<br>";
   //      echo "X Bakat Seni MAPALA=".number_format($x_bakat_seni_mapala, dec())."<br>";
   //      echo "X Bakat Seni Persma=".number_format($x_bakat_seni_persma, dec())."<br>";
   //      echo "X Bakat Seni Bahasa=".number_format($x_bakat_seni_bahasa, dec())."<br>";
   //      echo "X Bakat Seni Pramuka=".number_format($x_bakat_seni_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Bakat Olahraga:<br></u></strong>";
   //  echo "X Bakat Olahraga Wirausaha=".number_format($x_bakat_olahraga_wirusaha, dec())."<br>";
   //  echo "X Bakat Olahraga Kemanusiaan=".number_format($x_bakat_olahraga_kemanusiaan, dec())."<br>";
   //      echo "X Bakat Olahraga SENIOR=".number_format($x_bakat_olahraga_senior, dec())."<br>";
   //      echo "X Bakat Olahraga MAPALA=".number_format($x_bakat_olahraga_mapala, dec())."<br>";
   //      echo "X Bakat Olahraga Persma=".number_format($x_bakat_olahraga_persma, dec())."<br>";
   //      echo "X Bakat Olahraga Bahasa=".number_format($x_bakat_olahraga_bahasa, dec())."<br>";
   //      echo "X Bakat Olahraga Pramuka=".number_format($x_bakat_olahraga_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Bakat Bahasa:<br></u></strong>";
   //   echo "X Bakat Bahasa Wirausaha=".number_format($x_bakat_bahasa_wirusaha, dec())."<br>";
   //  echo "X Bakat Bahasa Kemanusiaan=".number_format($x_bakat_bahasa_kemanusiaan, dec())."<br>";
   //      echo "X Bakat Bahasa SENIOR=".number_format($x_bakat_bahasa_senior, dec())."<br>";
   //      echo "X Bakat Bahasa MAPALA=".number_format($x_bakat_bahasa_mapala, dec())."<br>";
   //      echo "X Bakat Bahasa Persma=".number_format($x_bakat_bahasa_persma, dec())."<br>";
   //      echo "X Bakat Bahasa Bahasa=".number_format($x_bakat_bahasa_bahasa, dec())."<br>";
   //      echo "X Bakat Bahasa Pramuka=".number_format($x_bakat_bahasa_pramuka, dec())."<br>";
   //  echo "<br>";
   //   echo "<br>";
   //      echo "<strong><u>Atribut Bakat Lainnya:<br></u></strong>";
   //   echo "X Bakat Lainnya Wirausaha=".number_format($x_bakat_lainnya_wirusaha, dec())."<br>";
   //  echo "X Bakat Lainnya Kemanusiaan=".number_format($x_bakat_lainnya_kemanusiaan, dec())."<br>";
   //      echo "X Bakat Lainnya SENIOR=".number_format($x_bakat_lainnya_senior, dec())."<br>";
   //      echo "X Bakat Lainnya MAPALA=".number_format($x_bakat_lainnya_mapala, dec())."<br>";
   //      echo "X Bakat Lainnya Persma=".number_format($x_bakat_lainnya_persma, dec())."<br>";
   //      echo "X Bakat Lainnya Bahasa=".number_format($x_bakat_lainnya_bahasa, dec())."<br>";
   //      echo "X Bakat Lainnya Pramuka=".number_format($x_bakat_lainnya_pramuka, dec())."<br>";
   //  echo "<br>";
     
   //      }

   //  //S2 jawaban_c Sanguin
   //  $s2_bakat_seni_wirusaha = get_s2_populasi($db_object, 'bakat', 'Wirausaha', $x_bakat_seni_wirusaha, $jumlah_wirausaha);
   //  //S2 jawaban_c Koleris
   //  $s2_bakat_seni_kemanusiaan = get_s2_populasi($db_object, 'bakat', 'Kemanusiaan (ksr, humaniora)', $x_bakat_seni_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_c Melankolis
   //  $s2_bakat_seni_senior = get_s2_populasi($db_object, 'bakat', 'SENIOR (senior, bola, karate, taekwondo)', $x_bakat_seni_senior, $jumlah_senior);
   //      //S2 jawaban_c Koleris
   //  $s2_bakat_seni_mapala = get_s2_populasi($db_object, 'bakat', 'Pecinta Alam (MAPALA)', $x_bakat_seni_mapala, $jumlah_mapala);
   //      //S2 jawaban_c Koleris
   //  $s2_bakat_seni_persma = get_s2_populasi($db_object, 'bakat', 'Persma', $x_bakat_seni_persma, $jumlah_persma);
   //      //S2 jawaban_c Koleris
   //  $s2_bakat_seni_bahasa = get_s2_populasi($db_object, 'bakat', 'Bahasa', $x_bakat_seni_bahasa, $jumlah_bahasa);
   //      //S2 jawaban_c Koleris
   //  $s2_bakat_seni_pramuka = get_s2_populasi($db_object, 'bakat', 'Pramuka', $x_bakat_seni_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Bakat Seni Wirausaha=".number_format($s2_bakat_seni_wirusaha, dec())."<br>";
   //  echo "S2 Bakat Seni Kemanusiaan=".number_format($s2_bakat_seni_kemanusiaan, dec())."<br>";
   //      echo "S2 Bakat Seni SENIOR=".number_format($s2_bakat_seni_senior, dec())."<br>";
   //      echo "S2 Bakat Seni MAPALA=".number_format($s2_bakat_seni_mapala, dec())."<br>";
   //      echo "S2 Bakat Seni Persma=".number_format($s2_bakat_seni_persma, dec())."<br>";
   //      echo "S2 Bakat Seni Bahasa=".number_format($s2_bakat_seni_bahasa, dec())."<br>";
   //      echo "S2 Bakat Seni Pramuka=".number_format($s2_bakat_seni_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //      //S2 jawaban_c Sanguin
   //  $s2_bakat_olahraga_wirusaha = get_s2_populasi($db_object, 'bakat', 'Wirausaha', $x_bakat_olahraga_wirusaha, $jumlah_wirausaha);
   //  //S2 jawaban_c Koleris
   //  $s2_bakat_olahraga_kemanusiaan = get_s2_populasi($db_object, 'bakat', 'Kemanusiaan (ksr, humaniora)', $x_bakat_olahraga_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_c Melankolis
   //  $s2_bakat_olahraga_senior = get_s2_populasi($db_object, 'bakat', 'SENIOR (senior, bola, karate, taekwondo)', $x_bakat_olahraga_senior, $jumlah_senior);
   //      //S2 jawaban_c Koleris
   //  $s2_bakat_olahraga_mapala = get_s2_populasi($db_object, 'bakat', 'Pecinta Alam (MAPALA)', $x_bakat_olahraga_mapala, $jumlah_mapala);
   //      //S2 jawaban_c Koleris
   //  $s2_bakat_olahraga_persma = get_s2_populasi($db_object, 'bakat', 'Persma', $x_bakat_olahraga_persma, $jumlah_persma);
   //      //S2 jawaban_c Koleris
   //  $s2_bakat_olahraga_bahasa = get_s2_populasi($db_object, 'bakat', 'Bahasa', $x_bakat_olahraga_bahasa, $jumlah_bahasa);
   //      //S2 jawaban_c Koleris
   //  $s2_bakat_olahraga_pramuka = get_s2_populasi($db_object, 'bakat', 'Pramuka', $x_bakat_olahraga_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Bakat Olahraga Wirausaha=".number_format($s2_bakat_olahraga_wirusaha, dec())."<br>";
   //  echo "S2 Bakat Olahraga Kemanusiaan=".number_format($s2_bakat_olahraga_kemanusiaan, dec())."<br>";
   //      echo "S2 Bakat Olahraga SENIOR=".number_format($s2_bakat_olahraga_senior, dec())."<br>";
   //      echo "S2 Bakat Olahraga MAPALA=".number_format($s2_bakat_olahraga_mapala, dec())."<br>";
   //      echo "S2 Bakat Olahraga Persma=".number_format($s2_bakat_olahraga_persma, dec())."<br>";
   //      echo "S2 Bakat Olahraga Bahasa=".number_format($s2_bakat_olahraga_bahasa, dec())."<br>";
   //      echo "S2 Bakat Olahraga Pramuka=".number_format($s2_bakat_olahraga_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //      //S2 jawaban_c Sanguin
   //  $s2_bakat_bahasa_wirusaha = get_s2_populasi($db_object, 'bakat', 'Wirausaha', $x_bakat_bahasa_wirusaha, $jumlah_wirausaha);
   //  //S2 jawaban_c Koleris
   //  $s2_bakat_bahasa_kemanusiaan = get_s2_populasi($db_object, 'bakat', 'Kemanusiaan (ksr, humaniora)', $x_bakat_bahasa_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_c Melankolis
   //  $s2_bakat_bahasa_senior = get_s2_populasi($db_object, 'bakat', 'SENIOR (senior, bola, karate, taekwondo)', $x_bakat_bahasa_senior, $jumlah_senior);
   //      //S2 jawaban_c Koleris
   //  $s2_bakat_bahasa_mapala = get_s2_populasi($db_object, 'bakat', 'Pecinta Alam (MAPALA)', $x_bakat_bahasa_mapala, $jumlah_mapala);
   //      //S2 jawaban_c Koleris
   //  $s2_bakat_bahasa_persma = get_s2_populasi($db_object, 'bakat', 'Persma', $x_bakat_bahasa_persma, $jumlah_persma);
   //      //S2 jawaban_c Koleris
   //  $s2_bakat_bahasa_bahasa = get_s2_populasi($db_object, 'bakat', 'Bahasa', $x_bakat_bahasa_bahasa, $jumlah_bahasa);
   //      //S2 jawaban_c Koleris
   //  $s2_bakat_bahasa_pramuka = get_s2_populasi($db_object, 'bakat', 'Pramuka', $x_bakat_bahasa_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Bakat Bahasa Wirausaha=".number_format($s2_bakat_bahasa_wirusaha, dec())."<br>";
   //  echo "S2 Bakat Bahasa Kemanusiaan=".number_format($s2_bakat_bahasa_kemanusiaan, dec())."<br>";
   //      echo "S2 Bakat Bahasa SENIOR=".number_format($s2_bakat_bahasa_senior, dec())."<br>";
   //      echo "S2 Bakat Bahasa MAPALA=".number_format($s2_bakat_bahasa_mapala, dec())."<br>";
   //      echo "S2 Bakat Bahasa Persma=".number_format($s2_bakat_bahasa_persma, dec())."<br>";
   //      echo "S2 Bakat Bahasa Bahasa=".number_format($s2_bakat_bahasa_bahasa, dec())."<br>";
   //      echo "S2 Bakat Bahasa Pramuka=".number_format($s2_bakat_bahasa_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //      //S2 jawaban_c Sanguin
   //  $s2_bakat_lainnya_wirusaha = get_s2_populasi($db_object, 'bakat', 'Wirausaha', $x_bakat_lainnya_wirusaha, $jumlah_wirausaha);
   //  //S2 jawaban_c Koleris
   //  $s2_bakat_lainnya_kemanusiaan = get_s2_populasi($db_object, 'bakat', 'Kemanusiaan (ksr, humaniora)', $x_bakat_lainnya_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_c Melankolis
   //  $s2_bakat_lainnya_senior = get_s2_populasi($db_object, 'bakat', 'SENIOR (senior, bola, karate, taekwondo)', $x_bakat_lainnya_senior, $jumlah_senior);
   //      //S2 jawaban_c Koleris
   //  $s2_bakat_lainnya_mapala = get_s2_populasi($db_object, 'bakat', 'Pecinta Alam (MAPALA)', $x_bakat_lainnya_mapala, $jumlah_mapala);
   //      //S2 jawaban_c Koleris
   //  $s2_bakat_lainnya_persma = get_s2_populasi($db_object, 'bakat', 'Persma', $x_bakat_lainnya_persma, $jumlah_persma);
   //      //S2 jawaban_c Koleris
   //  $s2_bakat_lainnya_bahasa = get_s2_populasi($db_object, 'bakat', 'Bahasa', $x_bakat_lainnya_bahasa, $jumlah_bahasa);
   //      //S2 jawaban_c Koleris
   //  $s2_bakat_lainnya_pramuka = get_s2_populasi($db_object, 'bakat', 'Pramuka', $x_bakat_bahasa_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Bakat Lainnya Wirausaha=".number_format($s2_bakat_lainnya_wirusaha, dec())."<br>";
   //  echo "S2 Bakat Lainnya Kemanusiaan=".number_format($s2_bakat_lainnya_kemanusiaan, dec())."<br>";
   //      echo "S2 Bakat Lainnya SENIOR=".number_format($s2_bakat_lainnya_senior, dec())."<br>";
   //      echo "S2 Bakat Lainnya MAPALA=".number_format($s2_bakat_lainnya_mapala, dec())."<br>";
   //      echo "S2 Bakat Lainnya Persma=".number_format($s2_bakat_lainnya_persma, dec())."<br>";
   //      echo "S2 Bakat Lainnya Bahasa=".number_format($s2_bakat_lainnya_bahasa, dec())."<br>";
   //      echo "S2 Bakat Lainnya Pramuka=".number_format($s2_bakat_lainnya_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }
   //  //S jawaban_c Sanguin
   //  $s_bakat_seni_wirusaha = sqrt($s2_bakat_seni_wirusaha);
   //  //S jawaban_c Koleris
   //  $s_bakat_seni_kemanusiaan = sqrt($s2_bakat_seni_kemanusiaan);
   //      //S jawaban_c Melankolis
   //  $s_bakat_seni_senior = sqrt($s2_bakat_seni_senior);
   //      //S jawaban_c Plegmatis
   //  $s_bakat_seni_mapala = sqrt($s2_bakat_seni_mapala);
   //     //S jawaban_c Plegmatis
   //  $s_bakat_seni_persma = sqrt($s2_bakat_seni_persma);
   //     //S jawaban_c Plegmatis
   //  $s_bakat_seni_bahasa = sqrt($s2_bakat_seni_bahasa);
   //     //S jawaban_c Plegmatis
   //  $s_bakat_seni_pramuka = sqrt($s2_bakat_seni_pramuka);
        
   //      //s2 ^2 jawaban_c sanguin
   //      $s2_pangkat2_bakat_seni_wirusaha = pow($s2_bakat_seni_wirusaha, 2);
   //      //s2 ^2 jawaban_c koleris
   //      $s2_pangkat2_bakat_seni_kemanusiaan = pow($s2_bakat_seni_kemanusiaan, 2);
   //      //s2 ^2 jawaban_c melankolis
   //      $s2_pangkat2_bakat_seni_senior = pow($s2_bakat_seni_senior, 2);
   //      //s2 ^2 jawaban_c plegmatis
   //      $s2_pangkat2_bakat_seni_mapala = pow($s2_bakat_seni_mapala, 2);
   //      //s2 ^2 jawaban_c plegmatis
   //      $s2_pangkat2_bakat_seni_persma = pow($s2_bakat_seni_persma, 2);
   //      //s2 ^2 jawaban_c plegmatis
   //      $s2_pangkat2_bakat_seni_bahasa = pow($s2_bakat_seni_bahasa, 2);
   //      //s2 ^2 jawaban_c plegmatis
   //      $s2_pangkat2_bakat_seni_pramuka = pow($s2_bakat_seni_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Bakat Seni Wirausaha=".number_format($s_bakat_seni_wirusaha, dec())."<br>";
   //  echo "S Bakat Seni Kemanusiaan=".number_format($s_bakat_seni_kemanusiaan, dec())."<br>";
   //      echo "S Bakat Seni SENIOR=".number_format($s_bakat_seni_senior, dec())."<br>";
   //      echo "S Bakat Seni MAPALA=".number_format($s_bakat_seni_mapala, dec())."<br>";
   //      echo "S Bakat Seni Persma=".number_format($s_bakat_seni_persma, dec())."<br>";
   //      echo "S Bakat Seni Bahasa=".number_format($s_bakat_seni_bahasa, dec())."<br>";
   //      echo "S Bakat Seni Pramuka=".number_format($s_bakat_seni_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_c Sanguin
   //  $s_bakat_olahraga_wirusaha = sqrt($s2_bakat_olahraga_wirusaha);
   //  //S jawaban_c Koleris
   //  $s_bakat_olahraga_kemanusiaan = sqrt($s2_bakat_olahraga_kemanusiaan);
   //      //S jawaban_c Melankolis
   //  $s_bakat_olahraga_senior = sqrt($s2_bakat_olahraga_senior);
   //      //S jawaban_c Plegmatis
   //  $s_bakat_olahraga_mapala = sqrt($s2_bakat_olahraga_mapala);
   //     //S jawaban_c Plegmatis
   //  $s_bakat_olahraga_persma = sqrt($s2_bakat_olahraga_persma);
   //     //S jawaban_c Plegmatis
   //  $s_bakat_olahraga_bahasa = sqrt($s2_bakat_olahraga_bahasa);
   //     //S jawaban_c Plegmatis
   //  $s_bakat_olahraga_pramuka = sqrt($s2_bakat_olahraga_pramuka);
        
   //      //s2 ^2 jawaban_c sanguin
   //      $s2_pangkat2_bakat_olahraga_wirusaha = pow($s2_bakat_olahraga_wirusaha, 2);
   //      //s2 ^2 jawaban_c koleris
   //      $s2_pangkat2_bakat_olahraga_kemanusiaan = pow($s2_bakat_olahraga_kemanusiaan, 2);
   //      //s2 ^2 jawaban_c melankolis
   //      $s2_pangkat2_bakat_olahraga_senior = pow($s2_bakat_olahraga_senior, 2);
   //      //s2 ^2 jawaban_c plegmatis
   //      $s2_pangkat2_bakat_olahraga_mapala = pow($s2_bakat_olahraga_mapala, 2);
   //      //s2 ^2 jawaban_c plegmatis
   //      $s2_pangkat2_bakat_olahraga_persma = pow($s2_bakat_olahraga_persma, 2);
   //      //s2 ^2 jawaban_c plegmatis
   //      $s2_pangkat2_bakat_olahraga_bahasa = pow($s2_bakat_olahraga_bahasa, 2);
   //      //s2 ^2 jawaban_c plegmatis
   //      $s2_pangkat2_bakat_olahraga_pramuka = pow($s2_bakat_olahraga_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Bakat Olahraga Wirausaha=".number_format($s_bakat_olahraga_wirusaha, dec())."<br>";
   //  echo "S Bakat Olahraga Kemanusiaan=".number_format($s_bakat_olahraga_kemanusiaan, dec())."<br>";
   //      echo "S Bakat Olahraga SENIOR=".number_format($s_bakat_olahraga_senior, dec())."<br>";
   //      echo "S Bakat Olahraga MAPALA=".number_format($s_bakat_olahraga_mapala, dec())."<br>";
   //      echo "S Bakat Olahraga Persma=".number_format($s_bakat_olahraga_persma, dec())."<br>";
   //      echo "S Bakat Olahraga Bahasa=".number_format($s_bakat_olahraga_bahasa, dec())."<br>";
   //      echo "S Bakat Olahraga Pramuka=".number_format($s_bakat_olahraga_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_c Sanguin
   //  $s_bakat_bahasa_wirusaha = sqrt($s2_bakat_bahasa_wirusaha);
   //  //S jawaban_c Koleris
   //  $s_bakat_bahasa_kemanusiaan = sqrt($s2_bakat_bahasa_kemanusiaan);
   //      //S jawaban_c Melankolis
   //  $s_bakat_bahasa_senior = sqrt($s2_bakat_bahasa_senior);
   //      //S jawaban_c Plegmatis
   //  $s_bakat_bahasa_mapala = sqrt($s2_bakat_bahasa_mapala);
   //     //S jawaban_c Plegmatis
   //  $s_bakat_bahasa_persma = sqrt($s2_bakat_bahasa_persma);
   //     //S jawaban_c Plegmatis
   //  $s_bakat_bahasa_bahasa = sqrt($s2_bakat_bahasa_bahasa);
   //     //S jawaban_c Plegmatis
   //  $s_bakat_bahasa_pramuka = sqrt($s2_bakat_bahasa_pramuka);
        
   //      //s2 ^2 jawaban_c sanguin
   //      $s2_pangkat2_bakat_bahasa_wirusaha = pow($s2_bakat_bahasa_wirusaha, 2);
   //      //s2 ^2 jawaban_c koleris
   //      $s2_pangkat2_bakat_bahasa_kemanusiaan = pow($s2_bakat_bahasa_kemanusiaan, 2);
   //      //s2 ^2 jawaban_c melankolis
   //      $s2_pangkat2_bakat_bahasa_senior = pow($s2_bakat_bahasa_senior, 2);
   //      //s2 ^2 jawaban_c plegmatis
   //      $s2_pangkat2_bakat_bahasa_mapala = pow($s2_bakat_bahasa_mapala, 2);
   //      //s2 ^2 jawaban_c plegmatis
   //      $s2_pangkat2_bakat_bahasa_persma = pow($s2_bakat_bahasa_persma, 2);
   //      //s2 ^2 jawaban_c plegmatis
   //      $s2_pangkat2_bakat_bahasa_bahasa = pow($s2_bakat_bahasa_bahasa, 2);
   //      //s2 ^2 jawaban_c plegmatis
   //      $s2_pangkat2_bakat_bahasa_pramuka = pow($s2_bakat_bahasa_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Bakat Bahasa Wirausaha=".number_format($s_bakat_bahasa_wirusaha, dec())."<br>";
   //  echo "S Bakat Bahasa Kemanusiaan=".number_format($s_bakat_bahasa_kemanusiaan, dec())."<br>";
   //      echo "S Bakat Bahasa SENIOR=".number_format($s_bakat_bahasa_senior, dec())."<br>";
   //      echo "S Bakat Bahasa MAPALA=".number_format($s_bakat_bahasa_mapala, dec())."<br>";
   //      echo "S Bakat Bahasa Persma=".number_format($s_bakat_bahasa_persma, dec())."<br>";
   //      echo "S Bakat Bahasa Bahasa=".number_format($s_bakat_bahasa_bahasa, dec())."<br>";
   //      echo "S Bakat Bahasa Pramuka=".number_format($s_bakat_bahasa_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_c Sanguin
   //  $s_bakat_lainnya_wirusaha = sqrt($s2_bakat_lainnya_wirusaha);
   //  //S jawaban_c Koleris
   //  $s_bakat_lainnya_kemanusiaan = sqrt($s2_bakat_lainnya_kemanusiaan);
   //      //S jawaban_c Melankolis
   //  $s_bakat_lainnya_senior = sqrt($s2_bakat_lainnya_senior);
   //      //S jawaban_c Plegmatis
   //  $s_bakat_lainnya_mapala = sqrt($s2_bakat_lainnya_mapala);
   //     //S jawaban_c Plegmatis
   //  $s_bakat_lainnya_persma = sqrt($s2_bakat_lainnya_persma);
   //     //S jawaban_c Plegmatis
   //  $s_bakat_lainnya_bahasa = sqrt($s2_bakat_lainnya_bahasa);
   //     //S jawaban_c Plegmatis
   //  $s_bakat_lainnya_pramuka = sqrt($s2_bakat_lainnya_pramuka);
        
   //      //s2 ^2 jawaban_c sanguin
   //      $s2_pangkat2_bakat_lainnya_wirusaha = pow($s2_bakat_lainnya_wirusaha, 2);
   //      //s2 ^2 jawaban_c koleris
   //      $s2_pangkat2_bakat_lainnya_kemanusiaan = pow($s2_bakat_lainnya_kemanusiaan, 2);
   //      //s2 ^2 jawaban_c melankolis
   //      $s2_pangkat2_bakat_lainnya_senior = pow($s2_bakat_lainnya_senior, 2);
   //      //s2 ^2 jawaban_c plegmatis
   //      $s2_pangkat2_bakat_lainnya_mapala = pow($s2_bakat_lainnya_mapala, 2);
   //      //s2 ^2 jawaban_c plegmatis
   //      $s2_pangkat2_bakat_lainnya_persma = pow($s2_bakat_lainnya_persma, 2);
   //      //s2 ^2 jawaban_c plegmatis
   //      $s2_pangkat2_bakat_lainnya_bahasa = pow($s2_bakat_lainnya_bahasa, 2);
   //      //s2 ^2 jawaban_c plegmatis
   //      $s2_pangkat2_bakat_lainnya_pramuka = pow($s2_bakat_lainnya_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Bakat Lainnya Wirausaha=".number_format($s_bakat_lainnya_wirusaha, dec())."<br>";
   //  echo "S Bakat Lainnya Kemanusiaan=".number_format($s_bakat_lainnya_kemanusiaan, dec())."<br>";
   //      echo "S Bakat Lainnya SENIOR=".number_format($s_bakat_lainnya_senior, dec())."<br>";
   //      echo "S Bakat Lainnya MAPALA=".number_format($s_bakat_lainnya_mapala, dec())."<br>";
   //      echo "S Bakat Lainnya Persma=".number_format($s_bakat_lainnya_persma, dec())."<br>";
   //      echo "S Bakat Lainnya Bahasa=".number_format($s_bakat_lainnya_bahasa, dec())."<br>";
   //      echo "S Bakat Lainnya Pramuka=".number_format($s_bakat_lainnya_pramuka, dec())."<br>";
   //      }
        

   //      //===============================================================

   //  //hobi sanguin
   //  $jumlah_hobi_menari_wirausaha = get_jumlah_sum_atribut($db_object, "hobi", "Wirausaha");
   //  $x_hobi_menari_wirausaha = $jumlah_hobi_menari_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_hobi_menari_kemanusiaan = get_jumlah_sum_atribut($db_object, "hobi", "Kemanusiaan (ksr, humaniora)");
   //  $x_hobi_menari_kemanusiaan = $jumlah_hobi_menari_wirausaha/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_hobi_menari_senior = get_jumlah_sum_atribut($db_object, "hobi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_hobi_menari_senior = $jumlah_hobi_menari_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_hobi_menari_mapala = get_jumlah_sum_atribut($db_object, "hobi", "Pecinta Alam (MAPALA)");
   //  $x_hobi_menari_mapala = $jumlah_hobi_menari_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_hobi_menari_persma = get_jumlah_sum_atribut($db_object, "hobi", "Persma");
   //  $x_hobi_menari_persma = $jumlah_hobi_menari_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_hobi_menari_bahasa = get_jumlah_sum_atribut($db_object, "hobi", "Bahasa");
   //  $x_hobi_menari_bahasa = $jumlah_hobi_menari_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_hobi_menari_pramuka = get_jumlah_sum_atribut($db_object, "hobi", "Pramuka");
   //  $x_hobi_menari_pramuka = $jumlah_hobi_menari_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_hobi_menyanyi_wirausaha = get_jumlah_sum_atribut($db_object, "hobi", "Wirausaha");
   //  $x_hobi_menyanyi_wirausaha = $jumlah_hobi_menyanyi_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_hobi_menyanyi_kemanusiaan = get_jumlah_sum_atribut($db_object, "hobi", "Kemanusiaan (ksr, humaniora)");
   //  $x_hobi_menyanyi_kemanusiaan = $jumlah_hobi_menyanyi_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_hobi_menyanyi_senior = get_jumlah_sum_atribut($db_object, "hobi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_hobi_menyanyi_senior = $jumlah_hobi_menyanyi_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_hobi_menyanyi_mapala = get_jumlah_sum_atribut($db_object, "hobi", "Pecinta Alam (MAPALA)");
   //  $x_hobi_menyanyi_mapala = $jumlah_hobi_menyanyi_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_hobi_menyanyi_persma = get_jumlah_sum_atribut($db_object, "hobi", "Persma");
   //  $x_hobi_menyanyi_persma = $jumlah_hobi_menyanyi_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_hobi_menyanyi_bahasa = get_jumlah_sum_atribut($db_object, "hobi", "Bahasa");
   //  $x_hobi_menyanyi_bahasa = $jumlah_hobi_menyanyi_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_hobi_menyanyi_pramuka = get_jumlah_sum_atribut($db_object, "hobi", "Pramuka");
   //  $x_hobi_menyanyi_pramuka = $jumlah_hobi_menyanyi_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_hobi_menulis_wirausaha = get_jumlah_sum_atribut($db_object, "hobi", "Wirausaha");
   //  $x_hobi_menulis_wirausaha = $jumlah_hobi_menulis_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_hobi_menulis_kemanusiaan = get_jumlah_sum_atribut($db_object, "hobi", "Kemanusiaan (ksr, humaniora)");
   //  $x_hobi_menulis_kemanusiaan = $jumlah_hobi_menulis_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_hobi_menulis_senior = get_jumlah_sum_atribut($db_object, "hobi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_hobi_menulis_senior = $jumlah_hobi_menulis_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_hobi_menulis_mapala = get_jumlah_sum_atribut($db_object, "hobi", "Pecinta Alam (MAPALA)");
   //  $x_hobi_menulis_mapala = $jumlah_hobi_menulis_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_hobi_menulis_persma = get_jumlah_sum_atribut($db_object, "hobi", "Persma");
   //  $x_hobi_menulis_persma = $jumlah_hobi_menulis_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_hobi_menulis_bahasa = get_jumlah_sum_atribut($db_object, "hobi", "Bahasa");
   //  $x_hobi_menulis_bahasa = $jumlah_hobi_menulis_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_hobi_menulis_pramuka = get_jumlah_sum_atribut($db_object, "hobi", "Pramuka");
   //  $x_hobi_menulis_pramuka = $jumlah_hobi_menulis_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_hobi_menggambar_wirausaha = get_jumlah_sum_atribut($db_object, "hobi", "Wirausaha");
   //  $x_hobi_menggambar_wirausaha = $jumlah_hobi_menggambar_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_hobi_menggambar_kemanusiaan = get_jumlah_sum_atribut($db_object, "hobi", "Kemanusiaan (ksr, humaniora)");
   //  $x_hobi_menggambar_kemanusiaan = $jumlah_hobi_menggambar_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_hobi_menggambar_senior = get_jumlah_sum_atribut($db_object, "hobi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_hobi_menggambar_senior = $jumlah_hobi_menggambar_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_hobi_menggambar_mapala = get_jumlah_sum_atribut($db_object, "hobi", "Pecinta Alam (MAPALA)");
   //  $x_hobi_menggambar_mapala = $jumlah_hobi_menggambar_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_hobi_menggambar_persma = get_jumlah_sum_atribut($db_object, "hobi", "Persma");
   //  $x_hobi_menggambar_persma = $jumlah_hobi_menggambar_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_hobi_menggambar_bahasa = get_jumlah_sum_atribut($db_object, "hobi", "Bahasa");
   //  $x_hobi_menggambar_bahasa = $jumlah_hobi_menggambar_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_hobi_menggambar_pramuka = get_jumlah_sum_atribut($db_object, "hobi", "Pramuka");
   //  $x_hobi_menggambar_pramuka = $jumlah_hobi_menggambar_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_hobi_memasak_wirausaha = get_jumlah_sum_atribut($db_object, "hobi", "Wirausaha");
   //  $x_hobi_memasak_wirausaha = $jumlah_hobi_memasak_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_hobi_memasak_kemanusiaan = get_jumlah_sum_atribut($db_object, "hobi", "Kemanusiaan (ksr, humaniora)");
   //  $x_hobi_memasak_kemanusiaan = $jumlah_hobi_memasak_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_hobi_memasak_senior = get_jumlah_sum_atribut($db_object, "hobi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_hobi_memasak_senior = $jumlah_hobi_memasak_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_hobi_memasak_mapala = get_jumlah_sum_atribut($db_object, "hobi", "Pecinta Alam (MAPALA)");
   //  $x_hobi_memasak_mapala = $jumlah_hobi_memasak_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_hobi_memasak_persma = get_jumlah_sum_atribut($db_object, "hobi", "Persma");
   //  $x_hobi_memasak_persma = $jumlah_hobi_memasak_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_hobi_memasak_bahasa = get_jumlah_sum_atribut($db_object, "hobi", "Bahasa");
   //  $x_hobi_memasak_bahasa = $jumlah_hobi_memasak_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_hobi_memasak_pramuka = get_jumlah_sum_atribut($db_object, "hobi", "Pramuka");
   //  $x_hobi_memasak_pramuka = $jumlah_hobi_memasak_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_hobi_fotografi_wirausaha = get_jumlah_sum_atribut($db_object, "hobi", "Wirausaha");
   //  $x_hobi_fotografi_wirausaha = $jumlah_hobi_fotografi_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_hobi_fotografi_kemanusiaan = get_jumlah_sum_atribut($db_object, "hobi", "Kemanusiaan (ksr, humaniora)");
   //  $x_hobi_fotografi_kemanusiaan = $jumlah_hobi_fotografi_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_hobi_fotografi_senior = get_jumlah_sum_atribut($db_object, "hobi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_hobi_fotografi_senior = $jumlah_hobi_fotografi_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_hobi_fotografi_mapala = get_jumlah_sum_atribut($db_object, "hobi", "Pecinta Alam (MAPALA)");
   //  $x_hobi_fotografi_mapala = $jumlah_hobi_fotografi_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_hobi_fotografi_persma = get_jumlah_sum_atribut($db_object, "hobi", "Persma");
   //  $x_hobi_fotografi_persma = $jumlah_hobi_fotografi_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_hobi_fotografi_bahasa = get_jumlah_sum_atribut($db_object, "hobi", "Bahasa");
   //  $x_hobi_fotografi_bahasa = $jumlah_hobi_fotografi_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_hobi_fotografi_pramuka = get_jumlah_sum_atribut($db_object, "hobi", "Pramuka");
   //  $x_hobi_fotografi_pramuka = $jumlah_hobi_fotografi_pramuka/$jumlah_pramuka;

   //   //xusia sanguin
   //  $jumlah_hobi_sepakbola_wirausaha = get_jumlah_sum_atribut($db_object, "hobi", "Wirausaha");
   //  $x_hobi_sepakbola_wirausaha = $jumlah_hobi_sepakbola_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_hobi_sepakbola_kemanusiaan = get_jumlah_sum_atribut($db_object, "hobi", "Kemanusiaan (ksr, humaniora)");
   //  $x_hobi_sepakbola_kemanusiaan = $jumlah_hobi_sepakbola_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_hobi_sepakbola_senior = get_jumlah_sum_atribut($db_object, "hobi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_hobi_sepakbola_senior = $jumlah_hobi_sepakbola_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_hobi_sepakbola_mapala = get_jumlah_sum_atribut($db_object, "hobi", "Pecinta Alam (MAPALA)");
   //  $x_hobi_sepakbola_mapala = $jumlah_hobi_sepakbola_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_hobi_sepakbola_persma = get_jumlah_sum_atribut($db_object, "hobi", "Persma");
   //  $x_hobi_sepakbola_persma = $jumlah_hobi_sepakbola_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_hobi_sepakbola_bahasa = get_jumlah_sum_atribut($db_object, "hobi", "Bahasa");
   //  $x_hobi_sepakbola_bahasa = $jumlah_hobi_sepakbola_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_hobi_sepakbola_pramuka = get_jumlah_sum_atribut($db_object, "hobi", "Pramuka");
   //  $x_hobi_sepakbola_pramuka = $jumlah_hobi_sepakbola_pramuka/$jumlah_pramuka;

   //   //xusia sanguin
   //  $jumlah_hobi_bulutangkis_wirausaha = get_jumlah_sum_atribut($db_object, "hobi", "Wirausaha");
   //  $x_hobi_bulutangkis_wirausaha = $jumlah_hobi_bulutangkis_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_hobi_bulutangkis_kemanusiaan = get_jumlah_sum_atribut($db_object, "hobi", "Kemanusiaan (ksr, humaniora)");
   //  $x_hobi_bulutangkis_kemanusiaan = $jumlah_hobi_bulutangkis_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_hobi_bulutangkis_senior = get_jumlah_sum_atribut($db_object, "hobi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_hobi_bulutangkis_senior = $jumlah_hobi_bulutangkis_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_hobi_bulutangkis_mapala = get_jumlah_sum_atribut($db_object, "hobi", "Pecinta Alam (MAPALA)");
   //  $x_hobi_bulutangkis_mapala = $jumlah_hobi_bulutangkis_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_hobi_bulutangkis_persma = get_jumlah_sum_atribut($db_object, "hobi", "Persma");
   //  $x_hobi_bulutangkis_persma = $jumlah_hobi_bulutangkis_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_hobi_bulutangkis_bahasa = get_jumlah_sum_atribut($db_object, "hobi", "Bahasa");
   //  $x_hobi_bulutangkis_bahasa = $jumlah_hobi_bulutangkis_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_hobi_bulutangkis_pramuka = get_jumlah_sum_atribut($db_object, "hobi", "Pramuka");
   //  $x_hobi_bulutangkis_pramuka = $jumlah_hobi_bulutangkis_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_hobi_basket_wirausaha = get_jumlah_sum_atribut($db_object, "hobi", "Wirausaha");
   //  $x_hobi_basket_wirausaha = $jumlah_hobi_basket_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_hobi_basket_kemanusiaan = get_jumlah_sum_atribut($db_object, "hobi", "Kemanusiaan (ksr, humaniora)");
   //  $x_hobi_basket_kemanusiaan = $jumlah_hobi_basket_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_hobi_basket_senior = get_jumlah_sum_atribut($db_object, "hobi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_hobi_basket_senior = $jumlah_hobi_basket_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_hobi_basket_mapala = get_jumlah_sum_atribut($db_object, "hobi", "Pecinta Alam (MAPALA)");
   //  $x_hobi_basket_mapala = $jumlah_hobi_basket_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_hobi_basket_persma = get_jumlah_sum_atribut($db_object, "hobi", "Persma");
   //  $x_hobi_basket_persma = $jumlah_hobi_basket_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_hobi_basket_bahasa = get_jumlah_sum_atribut($db_object, "hobi", "Bahasa");
   //  $x_hobi_basket_bahasa = $jumlah_hobi_basket_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_hobi_basket_pramuka = get_jumlah_sum_atribut($db_object, "hobi", "Pramuka");
   //  $x_hobi_basket_pramuka = $jumlah_hobi_basket_pramuka/$jumlah_pramuka;
        
   //  //xusia sanguin
   //  $jumlah_hobi_futsal_wirausaha = get_jumlah_sum_atribut($db_object, "hobi", "Wirausaha");
   //  $x_hobi_futsal_wirausaha = $jumlah_hobi_futsal_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_hobi_futsal_kemanusiaan = get_jumlah_sum_atribut($db_object, "hobi", "Kemanusiaan (ksr, humaniora)");
   //  $x_hobi_futsal_kemanusiaan = $jumlah_hobi_futsal_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_hobi_futsal_senior = get_jumlah_sum_atribut($db_object, "hobi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_hobi_futsal_senior = $jumlah_hobi_futsal_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_hobi_futsal_mapala = get_jumlah_sum_atribut($db_object, "hobi", "Pecinta Alam (MAPALA)");
   //  $x_hobi_futsal_mapala = $jumlah_hobi_futsal_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_hobi_futsal_persma = get_jumlah_sum_atribut($db_object, "hobi", "Persma");
   //  $x_hobi_futsal_persma = $jumlah_hobi_futsal_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_hobi_futsal_bahasa = get_jumlah_sum_atribut($db_object, "hobi", "Bahasa");
   //  $x_hobi_futsal_bahasa = $jumlah_hobi_futsal_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_hobi_futsal_pramuka = get_jumlah_sum_atribut($db_object, "hobi", "Pramuka");
   //  $x_hobi_futsal_pramuka = $jumlah_hobi_futsal_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_hobi_volly_wirausaha = get_jumlah_sum_atribut($db_object, "hobi", "Wirausaha");
   //  $x_hobi_volly_wirausaha = $jumlah_hobi_volly_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_hobi_volly_kemanusiaan = get_jumlah_sum_atribut($db_object, "hobi", "Kemanusiaan (ksr, humaniora)");
   //  $x_hobi_volly_kemanusiaan = $jumlah_hobi_volly_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_hobi_volly_senior = get_jumlah_sum_atribut($db_object, "hobi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_hobi_volly_senior = $jumlah_hobi_volly_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_hobi_volly_mapala = get_jumlah_sum_atribut($db_object, "hobi", "Pecinta Alam (MAPALA)");
   //  $x_hobi_volly_mapala = $jumlah_hobi_volly_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_hobi_volly_persma = get_jumlah_sum_atribut($db_object, "hobi", "Persma");
   //  $x_hobi_volly_persma = $jumlah_hobi_volly_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_hobi_volly_bahasa = get_jumlah_sum_atribut($db_object, "hobi", "Bahasa");
   //  $x_hobi_volly_bahasa = $jumlah_hobi_volly_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_hobi_volly_pramuka = get_jumlah_sum_atribut($db_object, "hobi", "Pramuka");
   //  $x_hobi_volly_pramuka = $jumlah_hobi_volly_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_hobi_belajarmtk_wirausaha = get_jumlah_sum_atribut($db_object, "hobi", "Wirausaha");
   //  $x_hobi_belajarmtk_wirausaha = $jumlah_hobi_belajarmtk_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_hobi_belajarmtk_kemanusiaan = get_jumlah_sum_atribut($db_object, "hobi", "Kemanusiaan (ksr, humaniora)");
   //  $x_hobi_belajarmtk_kemanusiaan = $jumlah_hobi_belajarmtk_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_hobi_belajarmtk_senior = get_jumlah_sum_atribut($db_object, "hobi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_hobi_belajarmtk_senior = $jumlah_hobi_belajarmtk_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_hobi_belajarmtk_mapala = get_jumlah_sum_atribut($db_object, "hobi", "Pecinta Alam (MAPALA)");
   //  $x_hobi_belajarmtk_mapala = $jumlah_hobi_belajarmtk_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_hobi_belajarmtk_persma = get_jumlah_sum_atribut($db_object, "hobi", "Persma");
   //  $x_hobi_belajarmtk_persma = $jumlah_hobi_belajarmtk_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_hobi_belajarmtk_bahasa = get_jumlah_sum_atribut($db_object, "hobi", "Bahasa");
   //  $x_hobi_belajarmtk_bahasa = $jumlah_hobi_belajarmtk_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_hobi_belajarmtk_pramuka = get_jumlah_sum_atribut($db_object, "hobi", "Pramuka");
   //  $x_hobi_belajarmtk_pramuka = $jumlah_hobi_belajarmtk_pramuka/$jumlah_pramuka;

   //   //xusia sanguin
   //  $jumlah_hobi_olahraga_wirausaha = get_jumlah_sum_atribut($db_object, "hobi", "Wirausaha");
   //  $x_hobi_olahraga_wirausaha = $jumlah_hobi_olahraga_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_hobi_olahraga_kemanusiaan = get_jumlah_sum_atribut($db_object, "hobi", "Kemanusiaan (ksr, humaniora)");
   //  $x_hobi_olahraga_kemanusiaan = $jumlah_hobi_olahraga_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_hobi_olahraga_senior = get_jumlah_sum_atribut($db_object, "hobi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_hobi_olahraga_senior = $jumlah_hobi_olahraga_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_hobi_olahraga_mapala = get_jumlah_sum_atribut($db_object, "hobi", "Pecinta Alam (MAPALA)");
   //  $x_hobi_olahraga_mapala = $jumlah_hobi_olahraga_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_hobi_olahraga_persma = get_jumlah_sum_atribut($db_object, "hobi", "Persma");
   //  $x_hobi_olahraga_persma = $jumlah_hobi_olahraga_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_hobi_olahraga_bahasa = get_jumlah_sum_atribut($db_object, "hobi", "Bahasa");
   //  $x_hobi_olahraga_bahasa = $jumlah_hobi_olahraga_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_hobi_olahraga_pramuka = get_jumlah_sum_atribut($db_object, "hobi", "Pramuka");
   //  $x_hobi_olahraga_pramuka = $jumlah_hobi_olahraga_pramuka/$jumlah_pramuka;
        
   //  //xusia sanguin
   //  $jumlah_hobi_membaca_wirausaha = get_jumlah_sum_atribut($db_object, "hobi", "Wirausaha");
   //  $x_hobi_membaca_wirausaha = $jumlah_hobi_membaca_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_hobi_membaca_kemanusiaan = get_jumlah_sum_atribut($db_object, "hobi", "Kemanusiaan (ksr, humaniora)");
   //  $x_hobi_membaca_kemanusiaan = $jumlah_hobi_membaca_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_hobi_membaca_senior = get_jumlah_sum_atribut($db_object, "hobi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_hobi_membaca_senior = $jumlah_hobi_membaca_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_hobi_membaca_mapala = get_jumlah_sum_atribut($db_object, "hobi", "Pecinta Alam (MAPALA)");
   //  $x_hobi_membaca_mapala = $jumlah_hobi_membaca_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_hobi_membaca_persma = get_jumlah_sum_atribut($db_object, "hobi", "Persma");
   //  $x_hobi_membaca_persma = $jumlah_hobi_membaca_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_hobi_membaca_bahasa = get_jumlah_sum_atribut($db_object, "hobi", "Bahasa");
   //  $x_hobi_membaca_bahasa = $jumlah_hobi_membaca_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_hobi_membaca_pramuka = get_jumlah_sum_atribut($db_object, "hobi", "Pramuka");
   //  $x_hobi_membaca_pramuka = $jumlah_hobi_membaca_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_hobi_mainmusik_wirausaha = get_jumlah_sum_atribut($db_object, "hobi", "Wirausaha");
   //  $x_hobi_mainmusik_wirausaha = $jumlah_hobi_mainmusik_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_hobi_mainmusik_kemanusiaan = get_jumlah_sum_atribut($db_object, "hobi", "Kemanusiaan (ksr, humaniora)");
   //  $x_hobi_mainmusik_kemanusiaan = $jumlah_hobi_mainmusik_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_hobi_mainmusik_senior = get_jumlah_sum_atribut($db_object, "hobi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_hobi_mainmusik_senior = $jumlah_hobi_mainmusik_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_hobi_mainmusik_mapala = get_jumlah_sum_atribut($db_object, "hobi", "Pecinta Alam (MAPALA)");
   //  $x_hobi_mainmusik_mapala = $jumlah_hobi_mainmusik_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_hobi_mainmusik_persma = get_jumlah_sum_atribut($db_object, "hobi", "Persma");
   //  $x_hobi_mainmusik_persma = $jumlah_hobi_mainmusik_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_hobi_mainmusik_bahasa = get_jumlah_sum_atribut($db_object, "hobi", "Bahasa");
   //  $x_hobi_mainmusik_bahasa = $jumlah_hobi_mainmusik_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_hobi_mainmusik_pramuka = get_jumlah_sum_atribut($db_object, "hobi", "Pramuka");
   //  $x_hobi_mainmusik_pramuka = $jumlah_hobi_mainmusik_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_hobi_dengarmusik_wirausaha = get_jumlah_sum_atribut($db_object, "hobi", "Wirausaha");
   //  $x_hobi_dengarmusik_wirausaha = $jumlah_hobi_dengarmusik_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_hobi_dengarmusik_kemanusiaan = get_jumlah_sum_atribut($db_object, "hobi", "Kemanusiaan (ksr, humaniora)");
   //  $x_hobi_dengarmusik_kemanusiaan = $jumlah_hobi_dengarmusik_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_hobi_dengarmusik_senior = get_jumlah_sum_atribut($db_object, "hobi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_hobi_dengarmusik_senior = $jumlah_hobi_dengarmusik_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_hobi_dengarmusik_mapala = get_jumlah_sum_atribut($db_object, "hobi", "Pecinta Alam (MAPALA)");
   //  $x_hobi_dengarmusik_mapala = $jumlah_hobi_dengarmusik_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_hobi_dengarmusik_persma = get_jumlah_sum_atribut($db_object, "hobi", "Persma");
   //  $x_hobi_dengarmusik_persma = $jumlah_hobi_dengarmusik_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_hobi_dengarmusik_bahasa = get_jumlah_sum_atribut($db_object, "hobi", "Bahasa");
   //  $x_hobi_dengarmusik_bahasa = $jumlah_hobi_dengarmusik_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_hobi_dengarmusik_pramuka = get_jumlah_sum_atribut($db_object, "hobi", "Pramuka");
   //  $x_hobi_dengarmusik_pramuka = $jumlah_hobi_dengarmusik_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_hobi_nonton_wirausaha = get_jumlah_sum_atribut($db_object, "hobi", "Wirausaha");
   //  $x_hobi_nonton_wirausaha = $jumlah_hobi_nonton_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_hobi_nonton_kemanusiaan = get_jumlah_sum_atribut($db_object, "hobi", "Kemanusiaan (ksr, humaniora)");
   //  $x_hobi_nonton_kemanusiaan = $jumlah_hobi_nonton_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_hobi_nonton_senior = get_jumlah_sum_atribut($db_object, "hobi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_hobi_nonton_senior = $jumlah_hobi_nonton_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_hobi_nonton_mapala = get_jumlah_sum_atribut($db_object, "hobi", "Pecinta Alam (MAPALA)");
   //  $x_hobi_nonton_mapala = $jumlah_hobi_nonton_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_hobi_nonton_persma = get_jumlah_sum_atribut($db_object, "hobi", "Persma");
   //  $x_hobi_nonton_persma = $jumlah_hobi_nonton_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_hobi_nonton_bahasa = get_jumlah_sum_atribut($db_object, "hobi", "Bahasa");
   //  $x_hobi_nonton_bahasa = $jumlah_hobi_nonton_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_hobi_nonton_pramuka = get_jumlah_sum_atribut($db_object, "hobi", "Pramuka");
   //  $x_hobi_nonton_pramuka = $jumlah_hobi_nonton_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_hobi_maingame_wirausaha = get_jumlah_sum_atribut($db_object, "hobi", "Wirausaha");
   //  $x_hobi_maingame_wirausaha = $jumlah_hobi_maingame_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_hobi_maingame_kemanusiaan = get_jumlah_sum_atribut($db_object, "hobi", "Kemanusiaan (ksr, humaniora)");
   //  $x_hobi_maingame_kemanusiaan = $jumlah_hobi_maingame_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_hobi_maingame_senior = get_jumlah_sum_atribut($db_object, "hobi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_hobi_maingame_senior = $jumlah_hobi_maingame_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_hobi_maingame_mapala = get_jumlah_sum_atribut($db_object, "hobi", "Pecinta Alam (MAPALA)");
   //  $x_hobi_maingame_mapala = $jumlah_hobi_maingame_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_hobi_maingame_persma = get_jumlah_sum_atribut($db_object, "hobi", "Persma");
   //  $x_hobi_maingame_persma = $jumlah_hobi_maingame_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_hobi_maingame_bahasa = get_jumlah_sum_atribut($db_object, "hobi", "Bahasa");
   //  $x_hobi_maingame_bahasa = $jumlah_hobi_maingame_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_hobi_maingame_pramuka = get_jumlah_sum_atribut($db_object, "hobi", "Pramuka");
   //  $x_hobi_maingame_pramuka = $jumlah_hobi_maingame_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_hobi_jalan2_wirausaha = get_jumlah_sum_atribut($db_object, "hobi", "Wirausaha");
   //  $x_hobi_jalan2_wirausaha = $jumlah_hobi_jalan2_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_hobi_jalan2_kemanusiaan = get_jumlah_sum_atribut($db_object, "hobi", "Kemanusiaan (ksr, humaniora)");
   //  $x_hobi_jalan2_kemanusiaan = $jumlah_hobi_jalan2_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_hobi_jalan2_senior = get_jumlah_sum_atribut($db_object, "hobi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_hobi_jalan2_senior = $jumlah_hobi_jalan2_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_hobi_jalan2_mapala = get_jumlah_sum_atribut($db_object, "hobi", "Pecinta Alam (MAPALA)");
   //  $x_hobi_jalan2_mapala = $jumlah_hobi_jalan2_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_hobi_jalan2_persma = get_jumlah_sum_atribut($db_object, "hobi", "Persma");
   //  $x_hobi_jalan2_persma = $jumlah_hobi_jalan2_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_hobi_jalan2_bahasa = get_jumlah_sum_atribut($db_object, "hobi", "Bahasa");
   //  $x_hobi_jalan2_bahasa = $jumlah_hobi_jalan2bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_hobi_jalan2_pramuka = get_jumlah_sum_atribut($db_object, "hobi", "Pramuka");
   //  $x_hobi_jalan2_pramuka = $jumlah_hobi_jalan2_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_hobi_bhsasing_wirausaha = get_jumlah_sum_atribut($db_object, "hobi", "Wirausaha");
   //  $x_hobi_bhsasing_wirausaha = $jumlah_hobi_bhsasing_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_hobi_bhsasing_kemanusiaan = get_jumlah_sum_atribut($db_object, "hobi", "Kemanusiaan (ksr, humaniora)");
   //  $x_hobi_bhsasing_kemanusiaan = $jumlah_hobi_bhsasing_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_hobi_bhsasing_senior = get_jumlah_sum_atribut($db_object, "hobi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_hobi_bhsasing_senior = $jumlah_hobi_bhsasing_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_hobi_bhsasing_mapala = get_jumlah_sum_atribut($db_object, "hobi", "Pecinta Alam (MAPALA)");
   //  $x_hobi_bhsasing_mapala = $jumlah_hobi_bhsasing_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_hobi_bhsasing_persma = get_jumlah_sum_atribut($db_object, "hobi", "Persma");
   //  $x_hobi_bhsasing_persma = $jumlah_hobi_bhsasing_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_hobi_bhsasing_bahasa = get_jumlah_sum_atribut($db_object, "hobi", "Bahasa");
   //  $x_hobi_bhsasing_bahasa = $jumlah_hobi_bhsasing_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_hobi_bhsasing_pramuka = get_jumlah_sum_atribut($db_object, "hobi", "Pramuka");
   //  $x_hobi_bhsasing_pramuka = $jumlah_hobi_bhsasing_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_hobi_melukis_wirausaha = get_jumlah_sum_atribut($db_object, "hobi", "Wirausaha");
   //  $x_hobi_melukis_wirausaha = $jumlah_hobi_melukis_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_hobi_melukis_kemanusiaan = get_jumlah_sum_atribut($db_object, "hobi", "Kemanusiaan (ksr, humaniora)");
   //  $x_hobi_melukis_kemanusiaan = $jumlah_hobi_melukis_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_hobi_melukis_senior = get_jumlah_sum_atribut($db_object, "hobi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_hobi_melukis_senior = $jumlah_hobi_melukis_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_hobi_melukis_mapala = get_jumlah_sum_atribut($db_object, "hobi", "Pecinta Alam (MAPALA)");
   //  $x_hobi_melukis_mapala = $jumlah_hobi_melukis_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_hobi_melukis_persma = get_jumlah_sum_atribut($db_object, "hobi", "Persma");
   //  $x_hobi_melukis_persma = $jumlah_hobi_melukis_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_hobi_melukis_bahasa = get_jumlah_sum_atribut($db_object, "hobi", "Bahasa");
   //  $x_hobi_melukis_bahasa = $jumlah_hobi_melukis_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_hobi_melukis_pramuka = get_jumlah_sum_atribut($db_object, "hobi", "Pramuka");
   //  $x_hobi_melukis_pramuka = $jumlah_hobi_melukis_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_hobi_berenang_wirausaha = get_jumlah_sum_atribut($db_object, "hobi", "Wirausaha");
   //  $x_hobi_berenang_wirausaha = $jumlah_hobi_berenang_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_hobi_berenang_kemanusiaan = get_jumlah_sum_atribut($db_object, "hobi", "Kemanusiaan (ksr, humaniora)");
   //  $x_hobi_berenang_kemanusiaan = $jumlah_hobi_berenang_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_hobi_berenang_senior = get_jumlah_sum_atribut($db_object, "hobi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_hobi_berenang_senior = $jumlah_hobi_berenang_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_hobi_berenang_mapala = get_jumlah_sum_atribut($db_object, "hobi", "Pecinta Alam (MAPALA)");
   //  $x_hobi_berenang_mapala = $jumlah_hobi_berenang_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_hobi_berenang_persma = get_jumlah_sum_atribut($db_object, "hobi", "Persma");
   //  $x_hobi_berenang_persma = $jumlah_hobi_berenang_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_hobi_berenang_bahasa = get_jumlah_sum_atribut($db_object, "hobi", "Bahasa");
   //  $x_hobi_berenang_bahasa = $jumlah_hobi_berenang_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_hobi_berenang_pramuka = get_jumlah_sum_atribut($db_object, "hobi", "Pramuka");
   //  $x_hobi_berenang_pramuka = $jumlah_hobi_berenang_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_hobi_naikgunung_wirausaha = get_jumlah_sum_atribut($db_object, "hobi", "Wirausaha");
   //  $x_hobi_naikgunung_wirausaha = $jumlah_hobi_naikgunung_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_hobi_naikgunung_kemanusiaan = get_jumlah_sum_atribut($db_object, "hobi", "Kemanusiaan (ksr, humaniora)");
   //  $x_hobi_naikgunung_kemanusiaan = $jumlah_hobi_naikgunung_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_hobi_naikgunung_senior = get_jumlah_sum_atribut($db_object, "hobi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_hobi_naikgunung_senior = $jumlah_hobi_naikgunung_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_hobi_naikgunung_mapala = get_jumlah_sum_atribut($db_object, "hobi", "Pecinta Alam (MAPALA)");
   //  $x_hobi_naikgunung_mapala = $jumlah_hobi_naikgunung_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_hobi_naikgunung_persma = get_jumlah_sum_atribut($db_object, "hobi", "Persma");
   //  $x_hobi_naikgunung_persma = $jumlah_hobi_naikgunung_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_hobi_naikgunung_bahasa = get_jumlah_sum_atribut($db_object, "hobi", "Bahasa");
   //  $x_hobi_naikgunung_bahasa = $jumlah_hobi_naikgunung_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_hobi_naikgunung_pramuka = get_jumlah_sum_atribut($db_object, "hobi", "Pramuka");
   //  $x_hobi_naikgunung_pramuka = $jumlah_hobi_naikgunung_pramuka/$jumlah_pramuka;

   //  //xusia sanguin
   //  $jumlah_hobi_travelling_wirausaha = get_jumlah_sum_atribut($db_object, "hobi", "Wirausaha");
   //  $x_hobi_travelling_wirausaha = $jumlah_hobi_travelling_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_hobi_travelling_kemanusiaan = get_jumlah_sum_atribut($db_object, "hobi", "Kemanusiaan (ksr, humaniora)");
   //  $x_hobi_travelling_kemanusiaan = $jumlah_hobi_travelling_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_hobi_travelling_senior = get_jumlah_sum_atribut($db_object, "hobi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_hobi_travelling_senior = $jumlah_hobi_travelling_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_hobi_travelling_mapala = get_jumlah_sum_atribut($db_object, "hobi", "Pecinta Alam (MAPALA)");
   //  $x_hobi_travelling_mapala = $jumlah_hobi_travelling_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_hobi_travelling_persma = get_jumlah_sum_atribut($db_object, "hobi", "Persma");
   //  $x_hobi_travelling_persma = $jumlah_hobi_travelling_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_hobi_travelling_bahasa = get_jumlah_sum_atribut($db_object, "hobi", "Bahasa");
   //  $x_hobi_travelling_bahasa = $jumlah_hobi_travelling_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_hobi_travelling_pramuka = get_jumlah_sum_atribut($db_object, "hobi", "Pramuka");
   //  $x_hobi_travelling_pramuka = $jumlah_hobi_travelling_pramuka/$jumlah_pramuka;    

   //  //xusia sanguin
   //  $jumlah_hobi_desaingrafis_wirausaha = get_jumlah_sum_atribut($db_object, "hobi", "Wirausaha");
   //  $x_hobi_desaingrafis_wirausaha = $jumlah_hobi_desaingrafis_wirausaha/$jumlah_wirausaha;
   //  //xusia  koleris
   //  $jumlah_hobi_desaingrafis_kemanusiaan = get_jumlah_sum_atribut($db_object, "hobi", "Kemanusiaan (ksr, humaniora)");
   //  $x_hobi_desaingrafis_kemanusiaan = $jumlah_hobi_desaingrafis_kemanusiaan/$jumlah_kemanusiaan;
   //      //xusia  melankolis
   //  $jumlah_hobi_desaingrafis_senior = get_jumlah_sum_atribut($db_object, "hobi", "SENIOR (senior, bola, karate, taekwondo)");
   //  $x_hobi_desaingrafis_senior = $jumlah_hobi_desaingrafis_senior/$jumlah_senior;
   //      //xusia  plegmatis
   //  $jumlah_hobi_desaingrafis_mapala = get_jumlah_sum_atribut($db_object, "hobi", "Pecinta Alam (MAPALA)");
   //  $x_hobi_desaingrafis_mapala = $jumlah_hobi_desaingrafis_mapala/$jumlah_mapala;
   //    //xusia  plegmatis
   //  $jumlah_hobi_desaingrafis_persma = get_jumlah_sum_atribut($db_object, "hobi", "Persma");
   //  $x_hobi_desaingrafis_persma = $jumlah_hobi_desaingrafis_persma/$jumlah_persma;
   //    //xusia  plegmatis
   //  $jumlah_hobi_desaingrafis_bahasa = get_jumlah_sum_atribut($db_object, "hobi", "Bahasa");
   //  $x_hobi_desaingrafis_bahasa = $jumlah_hobi_desaingrafis_bahasa/$jumlah_bahasa;
   //    //xusia  plegmatis
   //  $jumlah_hobi_desaingrafis_pramuka = get_jumlah_sum_atribut($db_object, "hobi", "Pramuka");
   //  $x_hobi_desaingrafis_pramuka = $jumlah_hobi_desaingrafis_pramuka/$jumlah_pramuka;  
        
        
   //      if($show_perhitungan){
   //      echo "<br>";
   //      echo "<strong><u>Atribut Hobi Menari:<br></u></strong>";
   //  echo "X Hobi Menari Wirausaha=".number_format($x_hobi_menari_wirausaha, dec())."<br>";
   //  echo "X Hobi Menari Kemanusiaan=".number_format($x_hobi_menari_kemanusiaan, dec())."<br>";
   //      echo "X Hobi Menari SENIOR=".number_format($x_hobi_menari_senior, dec())."<br>";
   //      echo "X Hobi Menari MAPALA=".number_format($x_hobi_menari_mapala, dec())."<br>";
   //      echo "X Hobi Menari Persma=".number_format($x_hobi_menari_persma, dec())."<br>";
   //      echo "X Hobi Menari Bahasa=".number_format($x_hobi_menari_bahasa, dec())."<br>";
   //      echo "X Hobi Menari Pramuka=".number_format($x_hobi_menari_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Hobi Menyanyi:<br></u></strong>";
   //  echo "X Hobi Menyanyi Wirausaha=".number_format($x_hobi_menyanyi_wirausaha, dec())."<br>";
   //  echo "X Hobi Menyanyi Kemanusiaan=".number_format($x_hobi_menyanyi_kemanusiaan, dec())."<br>";
   //      echo "X Hobi Menyanyi SENIOR=".number_format($x_hobi_menyanyi_senior, dec())."<br>";
   //      echo "X Hobi Menyanyi MAPALA=".number_format($x_hobi_menyanyi_mapala, dec())."<br>";
   //      echo "X Hobi Menyanyi Persma=".number_format($x_hobi_menyanyi_persma, dec())."<br>";
   //      echo "X Hobi Menyanyi Bahasa=".number_format($x_hobi_menyanyi_bahasa, dec())."<br>";
   //      echo "X Hobi Menyanyi Pramuka=".number_format($x_hobi_menyanyi_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Hobi Menulis:<br></u></strong>";
   //  echo "X Hobi Menulis Wirausaha=".number_format($x_hobi_menulis_wirausaha, dec())."<br>";
   //  echo "X Hobi Menulis Kemanusiaan=".number_format($x_hobi_menulis_kemanusiaan, dec())."<br>";
   //      echo "X Hobi Menulis SENIOR=".number_format($x_hobi_menulis_senior, dec())."<br>";
   //      echo "X Hobi Menulis MAPALA=".number_format($x_hobi_menulis_mapala, dec())."<br>";
   //      echo "X Hobi Menulis Persma=".number_format($x_hobi_menulis_persma, dec())."<br>";
   //      echo "X Hobi Menulis Bahasa=".number_format($x_hobi_menulis_bahasa, dec())."<br>";
   //      echo "X Hobi Menulis Pramuka=".number_format($x_hobi_menulis_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Hobi Menggambar:<br></u></strong>";
   //   echo "X Hobi Menggambar Wirausaha=".number_format($x_hobi_menggambar_wirausaha, dec())."<br>";
   //  echo "X Hobi Menggambar Kemanusiaan=".number_format($x_hobi_menggambar_kemanusiaan, dec())."<br>";
   //      echo "X Hobi Menggambar SENIOR=".number_format($x_hobi_menggambar_senior, dec())."<br>";
   //      echo "X Hobi Menggambar MAPALA=".number_format($x_hobi_menggambar_mapala, dec())."<br>";
   //      echo "X Hobi Menggambar Persma=".number_format($x_hobi_menggambar_persma, dec())."<br>";
   //      echo "X Hobi Menggambar Bahasa=".number_format($x_hobi_menggambar_bahasa, dec())."<br>";
   //      echo "X Hobi Menggambar Pramuka=".number_format($x_hobi_menggambar_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Hobi Memasak:<br></u></strong>";
   //   echo "X Hobi Memasak Wirausaha=".number_format($x_hobi_memasak_wirausaha, dec())."<br>";
   //  echo "X Hobi Memasak Kemanusiaan=".number_format($x_hobi_memasak_kemanusiaan, dec())."<br>";
   //      echo "X Hobi Memasak SENIOR=".number_format($x_hobi_memasak_senior, dec())."<br>";
   //      echo "X Hobi Memasak MAPALA=".number_format($x_hobi_memasak_mapala, dec())."<br>";
   //      echo "X Hobi Memasak Persma=".number_format($x_hobi_memasak_persma, dec())."<br>";
   //      echo "X Hobi Memasak Bahasa=".number_format($x_hobi_memasak_bahasa, dec())."<br>";
   //      echo "X Hobi Memasak Pramuka=".number_format($x_hobi_memasak_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Hobi Fotografi:<br></u></strong>";
   //   echo "X Hobi Fotografi Wirausaha=".number_format($x_hobi_fotografi_wirausaha, dec())."<br>";
   //  echo "X Hobi Fotografi Kemanusiaan=".number_format($x_hobi_fotografi_kemanusiaan, dec())."<br>";
   //      echo "X Hobi Fotografi SENIOR=".number_format($x_hobi_fotografi_senior, dec())."<br>";
   //      echo "X Hobi Fotografi MAPALA=".number_format($x_hobi_fotografi_mapala, dec())."<br>";
   //      echo "X Hobi Fotografi Persma=".number_format($x_hobi_fotografi_persma, dec())."<br>";
   //      echo "X Hobi Fotografi Bahasa=".number_format($x_hobi_fotografi_bahasa, dec())."<br>";
   //      echo "X Hobi Fotografi Pramuka=".number_format($x_hobi_fotografi_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Hobi Sepak Bola:<br></u></strong>";
   //   echo "X Hobi Sepak Bola Wirausaha=".number_format($x_hobi_sepakbola_wirausaha, dec())."<br>";
   //  echo "X Hobi Sepak Bola Kemanusiaan=".number_format($x_hobi_sepakbola_kemanusiaan, dec())."<br>";
   //      echo "X Hobi Sepak Bola SENIOR=".number_format($x_hobi_sepakbola_senior, dec())."<br>";
   //      echo "X Hobi Sepak Bola MAPALA=".number_format($x_hobi_sepakbola_mapala, dec())."<br>";
   //      echo "X Hobi Sepak Bola Persma=".number_format($x_hobi_sepakbola_persma, dec())."<br>";
   //      echo "X Hobi Sepak Bola Bahasa=".number_format($x_hobi_sepakbola_bahasa, dec())."<br>";
   //      echo "X Hobi Sepak Bola Pramuka=".number_format($x_hobi_sepakbola_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Hobi Bulu Tangkis:<br></u></strong>";
   //   echo "X Hobi Bulu Tangkis Wirausaha=".number_format($x_hobi_bulutangkis_wirausaha, dec())."<br>";
   //  echo "X Hobi Bulu Tangkis Kemanusiaan=".number_format($x_hobi_bulutangkis_kemanusiaan, dec())."<br>";
   //      echo "X Hobi Bulu Tangkis SENIOR=".number_format($x_hobi_bulutangkis_senior, dec())."<br>";
   //      echo "X Hobi Bulu Tangkis MAPALA=".number_format($x_hobi_bulutangkis_mapala, dec())."<br>";
   //      echo "X Hobi Bulu Tangkis Persma=".number_format($x_hobi_bulutangkis_persma, dec())."<br>";
   //      echo "X Hobi Bulu Tangkis Bahasa=".number_format($x_hobi_bulutangkis_bahasa, dec())."<br>";
   //      echo "X Hobi Bulu Tangkis Pramuka=".number_format($x_hobi_bulutangkis_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Hobi Basket<br></u></strong>";
   //   echo "X Hobi Basket Wirausaha=".number_format($x_hobi_basket_wirausaha, dec())."<br>";
   //  echo "X Hobi Basket Kemanusiaan=".number_format($x_hobi_basket_kemanusiaan, dec())."<br>";
   //      echo "X Hobi Basket SENIOR=".number_format($x_hobi_basket_senior, dec())."<br>";
   //      echo "X Hobi Basket MAPALA=".number_format($x_hobi_basket_mapala, dec())."<br>";
   //      echo "X Hobi Basket Persma=".number_format($x_hobi_basket_persma, dec())."<br>";
   //      echo "X Hobi Basket Bahasa=".number_format($x_hobi_basket_bahasa, dec())."<br>";
   //      echo "X Hobi Basket Pramuka=".number_format($x_hobi_basket_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Hobi Futsal:<br></u></strong>";
   //   echo "X Hobi Futsal Wirausaha=".number_format($x_hobi_futsal_wirausaha, dec())."<br>";
   //  echo "X Hobi Futsal Kemanusiaan=".number_format($x_hobi_futsal_kemanusiaan, dec())."<br>";
   //      echo "X Hobi Futsal SENIOR=".number_format($x_hobi_futsal_senior, dec())."<br>";
   //      echo "X Hobi Futsal MAPALA=".number_format($x_hobi_futsal_mapala, dec())."<br>";
   //      echo "X Hobi Futsal Persma=".number_format($x_hobi_futsal_persma, dec())."<br>";
   //      echo "X Hobi Futsal Bahasa=".number_format($x_hobi_futsal_bahasa, dec())."<br>";
   //      echo "X Hobi Futsal Pramuka=".number_format($x_hobi_futsal_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Hobi Volly:<br></u></strong>";
   //   echo "X Hobi Volly Wirausaha=".number_format($x_hobi_volly_wirausaha, dec())."<br>";
   //  echo "X Hobi Volly Kemanusiaan=".number_format($x_hobi_volly_kemanusiaan, dec())."<br>";
   //      echo "X Hobi Volly SENIOR=".number_format($x_hobi_volly_senior, dec())."<br>";
   //      echo "X Hobi Volly MAPALA=".number_format($x_hobi_volly_mapala, dec())."<br>";
   //      echo "X Hobi Volly Persma=".number_format($x_hobi_volly_persma, dec())."<br>";
   //      echo "X Hobi Volly Bahasa=".number_format($x_hobi_volly_bahasa, dec())."<br>";
   //      echo "X Hobi Volly Pramuka=".number_format($x_hobi_volly_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Hobi Belajar Matematika:<br></u></strong>";
   //   echo "X Hobi Belajar Matematika Wirausaha=".number_format($x_hobi_belajarmtk_wirausaha, dec())."<br>";
   //  echo "X Hobi Belajar Matematika Kemanusiaan=".number_format($x_hobi_belajarmtk_kemanusiaan, dec())."<br>";
   //      echo "X Hobi Belajar Matematika SENIOR=".number_format($x_hobi_belajarmtk_senior, dec())."<br>";
   //      echo "X Hobi Belajar Matematika MAPALA=".number_format($x_hobi_belajarmtk_mapala, dec())."<br>";
   //      echo "X Hobi Belajar Matematika Persma=".number_format($x_hobi_belajarmtk_persma, dec())."<br>";
   //      echo "X Hobi Belajar Matematika Bahasa=".number_format($x_hobi_belajarmtk_bahasa, dec())."<br>";
   //      echo "X Hobi Belajar Matematika Pramuka=".number_format($x_hobi_belajarmtk_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Hobi Olahraga:<br></u></strong>";
   //   echo "X Hobi Olahraga Wirausaha=".number_format($x_hobi_olahraga_wirausaha, dec())."<br>";
   //  echo "X Hobi Olahraga Kemanusiaan=".number_format($x_hobi_olahraga_kemanusiaan, dec())."<br>";
   //      echo "X Hobi Olahraga SENIOR=".number_format($x_hobi_olahraga_senior, dec())."<br>";
   //      echo "X Hobi Olahraga MAPALA=".number_format($x_hobi_olahraga_mapala, dec())."<br>";
   //      echo "X Hobi Olahraga Persma=".number_format($x_hobi_olahraga_persma, dec())."<br>";
   //      echo "X Hobi Olahraga Bahasa=".number_format($x_hobi_olahraga_bahasa, dec())."<br>";
   //      echo "X Hobi Olahraga Pramuka=".number_format($x_hobi_olahraga_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Hobi Membaca:<br></u></strong>";
   //   echo "X Hobi Membaca Wirausaha=".number_format($x_hobi_membaca_wirausaha, dec())."<br>";
   //  echo "X Hobi Membaca Kemanusiaan=".number_format($x_hobi_membaca_kemanusiaan, dec())."<br>";
   //      echo "X Hobi Membaca SENIOR=".number_format($x_hobi_membaca_senior, dec())."<br>";
   //      echo "X Hobi Membaca MAPALA=".number_format($x_hobi_membaca_mapala, dec())."<br>";
   //      echo "X Hobi Membaca Persma=".number_format($x_hobi_membaca_persma, dec())."<br>";
   //      echo "X Hobi Membaca Bahasa=".number_format($x_hobi_membaca_bahasa, dec())."<br>";
   //      echo "X Hobi Membaca Pramuka=".number_format($x_hobi_membaca_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Hobi Bermain Musik:<br></u></strong>";
   //   echo "X  Hobi Bermain Musik Wirausaha=".number_format($x_hobi_mainmusik_wirausaha, dec())."<br>";
   //  echo "X  Hobi Bermain Musik Kemanusiaan=".number_format($x_hobi_mainmusik_kemanusiaan, dec())."<br>";
   //      echo "X  Hobi Bermain Musik SENIOR=".number_format($x_hobi_mainmusik_senior, dec())."<br>";
   //      echo "X  Hobi Bermain Musik MAPALA=".number_format($x_hobi_mainmusik_mapala, dec())."<br>";
   //      echo "X  Hobi Bermain Musik Persma=".number_format($x_hobi_mainmusik_persma, dec())."<br>";
   //      echo "X  Hobi Bermain Musik Bahasa=".number_format($x_hobi_mainmusik_bahasa, dec())."<br>";
   //      echo "X  Hobi Bermain Musik Pramuka=".number_format($x_hobi_mainmusik_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Hobi Mendengar Musik:<br></u></strong>";
   //   echo "X Hobi Mendengar Musik Wirausaha=".number_format($x_hobi_dengarmusik_wirausaha, dec())."<br>";
   //  echo "X Hobi Mendengar Musik Kemanusiaan=".number_format($x_hobi_dengarmusik_kemanusiaan, dec())."<br>";
   //      echo "X Hobi Mendengar Musik SENIOR=".number_format($x_hobi_dengarmusik_senior, dec())."<br>";
   //      echo "X Hobi Mendengar Musik MAPALA=".number_format($x_hobi_dengarmusik_mapala, dec())."<br>";
   //      echo "X Hobi Mendengar Musik Persma=".number_format($x_hobi_dengarmusik_persma, dec())."<br>";
   //      echo "X Hobi Mendengar Musik Bahasa=".number_format($x_hobi_dengarmusik_bahasa, dec())."<br>";
   //      echo "X Hobi Mendengar Musik Pramuka=".number_format($x_hobi_dengarmusik_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Hobi Nonton:<br></u></strong>";
   //   echo "X Hobi Nonton Wirausaha=".number_format($x_hobi_nonton_wirausaha, dec())."<br>";
   //  echo "X Hobi Nonton Kemanusiaan=".number_format($x_hobi_nonton_kemanusiaan, dec())."<br>";
   //      echo "X Hobi Nonton SENIOR=".number_format($x_hobi_nonton_senior, dec())."<br>";
   //      echo "X Hobi Nonton MAPALA=".number_format($x_hobi_nonton_mapala, dec())."<br>";
   //      echo "X Hobi Nonton Persma=".number_format($x_hobi_nonton_persma, dec())."<br>";
   //      echo "X Hobi Nonton Bahasa=".number_format($x_hobi_nonton_bahasa, dec())."<br>";
   //      echo "X Hobi Nonton Pramuka=".number_format($x_hobi_nonton_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Hobi Main Game:<br></u></strong>";
   //   echo "X Hobi Main Game Wirausaha=".number_format($x_hobi_maingame_wirausaha, dec())."<br>";
   //  echo "X Hobi Main Game Kemanusiaan=".number_format($x_hobi_maingame_kemanusiaan, dec())."<br>";
   //      echo "X Hobi Main Game SENIOR=".number_format($x_hobi_maingame_senior, dec())."<br>";
   //      echo "X Hobi Main Game MAPALA=".number_format($x_hobi_maingame_mapala, dec())."<br>";
   //      echo "X Hobi Main Game Persma=".number_format($x_hobi_maingame_persma, dec())."<br>";
   //      echo "X Hobi Main Game Bahasa=".number_format($x_hobi_maingame_bahasa, dec())."<br>";
   //      echo "X Hobi Main Game Pramuka=".number_format($x_hobi_maingame_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Hobi Jalan-Jalan:<br></u></strong>";
   //   echo "X Hobi Jalan-Jalan Wirausaha=".number_format($x_hobi_jalan2_wirausaha, dec())."<br>";
   //  echo "X Hobi Jalan-Jalan Kemanusiaan=".number_format($x_hobi_jalan2_kemanusiaan, dec())."<br>";
   //      echo "X Hobi Jalan-Jalan SENIOR=".number_format($x_hobi_jalan2_senior, dec())."<br>";
   //      echo "X Hobi Jalan-Jalan MAPALA=".number_format($x_hobi_jalan2_mapala, dec())."<br>";
   //      echo "X Hobi Jalan-Jalan Persma=".number_format($x_hobi_jalan2_persma, dec())."<br>";
   //      echo "X Hobi Jalan-Jalan Bahasa=".number_format($x_hobi_jalan2_bahasa, dec())."<br>";
   //      echo "X Hobi Jalan-Jalan Pramuka=".number_format($x_hobi_jalan2_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Hobi Belajar Bahasa Asing Baru:<br></u></strong>";
   //   echo "X Hobi Belajar Bahasa Asing Baru Wirausaha=".number_format($x_hobi_bhsasing_wirausaha, dec())."<br>";
   //  echo "X Hobi Belajar Bahasa Asing Baru Kemanusiaan=".number_format($x_hobi_bhsasing_kemanusiaan, dec())."<br>";
   //      echo "X Hobi Belajar Bahasa Asing Baru SENIOR=".number_format($x_hobi_bhsasing_senior, dec())."<br>";
   //      echo "X Hobi Belajar Bahasa Asing Baru MAPALA=".number_format($x_hobi_bhsasing_mapala, dec())."<br>";
   //      echo "X Hobi Belajar Bahasa Asing Baru Persma=".number_format($x_hobi_bhsasing_persma, dec())."<br>";
   //      echo "X Hobi Belajar Bahasa Asing Baru Bahasa=".number_format($x_hobi_bhsasing_bahasa, dec())."<br>";
   //      echo "X Hobi Belajar Bahasa Asing Baru Pramuka=".number_format($x_hobi_bhsasing_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Hobi Melukis:<br></u></strong>";
   //   echo "X Hobi Melukis Wirausaha=".number_format($x_hobi_melukis_wirausaha, dec())."<br>";
   //  echo "X Hobi Melukis Kemanusiaan=".number_format($x_hobi_melukis_kemanusiaan, dec())."<br>";
   //      echo "X Hobi Melukis SENIOR=".number_format($x_hobi_melukis_senior, dec())."<br>";
   //      echo "X Hobi Melukis MAPALA=".number_format($x_hobi_melukis_mapala, dec())."<br>";
   //      echo "X Hobi Melukis Persma=".number_format($x_hobi_melukis_persma, dec())."<br>";
   //      echo "X Hobi Melukis Bahasa=".number_format($x_hobi_melukis_bahasa, dec())."<br>";
   //      echo "X Hobi Melukis Pramuka=".number_format($x_hobi_melukis_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Hobi Berenang:<br></u></strong>";
   //   echo "X Hobi Berenang Wirausaha=".number_format($x_hobi_berenang_wirausaha, dec())."<br>";
   //  echo "X Hobi Berenang Kemanusiaan=".number_format($x_hobi_berenang_kemanusiaan, dec())."<br>";
   //      echo "X Hobi Berenang SENIOR=".number_format($x_hobi_berenang_senior, dec())."<br>";
   //      echo "X Hobi Berenang MAPALA=".number_format($x_hobi_berenang_mapala, dec())."<br>";
   //      echo "X Hobi Berenang Persma=".number_format($x_hobi_berenang_persma, dec())."<br>";
   //      echo "X Hobi Berenang Bahasa=".number_format($x_hobi_berenang_bahasa, dec())."<br>";
   //      echo "X Hobi Berenang Pramuka=".number_format($x_hobi_berenang_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Hobi Naik Gunung:<br></u></strong>";
   //   echo "X Hobi Naik Gunung Wirausaha=".number_format($x_hobi_naikgunung_wirausaha, dec())."<br>";
   //  echo "X Hobi Naik Gunung Kemanusiaan=".number_format($x_hobi_naikgunung_kemanusiaan, dec())."<br>";
   //      echo "X Hobi Naik Gunung SENIOR=".number_format($x_hobi_naikgunung_senior, dec())."<br>";
   //      echo "X Hobi Naik Gunung MAPALA=".number_format($x_hobi_naikgunung_mapala, dec())."<br>";
   //      echo "X Hobi Naik Gunung Persma=".number_format($x_hobi_naikgunung_persma, dec())."<br>";
   //      echo "X Hobi Naik Gunung Bahasa=".number_format($x_hobi_naikgunung_bahasa, dec())."<br>";
   //      echo "X Hobi Naik Gunung Pramuka=".number_format($x_hobi_naikgunung_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Hobi Travelling:<br></u></strong>";
   //   echo "X Hobi Travelling Wirausaha=".number_format($x_hobi_travelling_wirausaha, dec())."<br>";
   //  echo "X Hobi Travelling Kemanusiaan=".number_format($x_hobi_travelling_kemanusiaan, dec())."<br>";
   //      echo "X Hobi Travelling SENIOR=".number_format($x_hobi_travelling_senior, dec())."<br>";
   //      echo "X Hobi Travelling MAPALA=".number_format($x_hobi_travelling_mapala, dec())."<br>";
   //      echo "X Hobi Travelling Persma=".number_format($x_hobi_travelling_persma, dec())."<br>";
   //      echo "X Hobi Travelling Bahasa=".number_format($x_hobi_travelling_bahasa, dec())."<br>";
   //      echo "X Hobi Travelling Pramuka=".number_format($x_hobi_travelling_pramuka, dec())."<br>";
   //  echo "<br>";
   //  echo "<br>";
   //      echo "<strong><u>Atribut Hobi Desain Grafis:<br></u></strong>";
   //   echo "X Hobi Desain Grafis Wirausaha=".number_format($x_hobi_desaingrafis_wirausaha, dec())."<br>";
   //  echo "X Hobi Desain Grafis Kemanusiaan=".number_format($x_hobi_desaingrafis_kemanusiaan, dec())."<br>";
   //      echo "X Hobi Desain Grafis SENIOR=".number_format($x_hobi_desaingrafis_senior, dec())."<br>";
   //      echo "X Hobi Desain Grafis MAPALA=".number_format($x_hobi_desaingrafis_mapala, dec())."<br>";
   //      echo "X Hobi Desain Grafis Persma=".number_format($x_hobi_desaingrafis_persma, dec())."<br>";
   //      echo "X Hobi Desain Grafis Bahasa=".number_format($x_hobi_desaingrafis_bahasa, dec())."<br>";
   //      echo "X Hobi Desain Grafis Pramuka=".number_format($x_hobi_desaingrafis_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }
   //  //S2 jawaban_d Sanguin
   //  $s2_hobi_menari_wirausaha = get_s2_populasi($db_object, 'hobi', 'Wirausaha', $x_hobi_menari_wirausaha, $jumlah_wirausaha);
   //  //S2 jawaban_d Koleris
   //  $s2_hobi_menari_kemanusiaan = get_s2_populasi($db_object, 'hobi', 'Kemanusiaan (ksr, humaniora)', $x_hobi_menari_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_d Melankolis
   //  $s2_hobi_menari_senior = get_s2_populasi($db_object, 'hobi', 'SENIOR (senior, bola, karate, taekwondo)', $x_hobi_menari_senior, $jumlah_senior);
   //      //S2 jawaban_d Koleris
   //  $s2_hobi_menari_mapala = get_s2_populasi($db_object, 'hobi', 'Pecinta Alam (MAPALA)', $x_hobi_menari_mapala, $jumlah_mapala);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_menari_persma = get_s2_populasi($db_object, 'hobi', 'Persma', $x_hobi_menari_persma, $jumlah_persma);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_menari_bahasa = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_menari_bahasa, $jumlah_bahasa);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_menari_pramuka = get_s2_populasi($db_object, 'hobi', 'Pramuka', $x_hobi_menari_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Hobi Menari Wirausaha=".number_format($s2_hobi_menari_wirausaha, dec())."<br>";
   //  echo "S2 Hobi Menari Kemanusiaan=".number_format($s2_hobi_menari_kemanusiaan, dec())."<br>";
   //      echo "S2 Hobi Menari SENIOR=".number_format($s2_hobi_menari_senior, dec())."<br>";
   //      echo "S2 Hobi Menari MAPALA=".number_format($s2_hobi_menari_mapala, dec())."<br>";
   //      echo "S2 Hobi Menari Persma=".number_format($s2_hobi_menari_persma, dec())."<br>";
   //      echo "S2 Hobi Menari Bahasa=".number_format($s2_hobi_menari_bahasa, dec())."<br>";
   //      echo "S2 Hobi Menari Pramuka=".number_format($s2_hobi_menari_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_d Sanguin
   //  $s2_hobi_menyanyi_wirausaha = get_s2_populasi($db_object, 'hobi', 'Wirausaha', $x_hobi_menyanyi_wirausaha, $jumlah_wirausaha);
   //  //S2 jawaban_d Koleris
   //  $s2_hobi_menyanyi_kemanusiaan = get_s2_populasi($db_object, 'hobi', 'Kemanusiaan (ksr, humaniora)', $x_hobi_menyanyi_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_d Melankolis
   //  $s2_hobi_menyanyi_senior = get_s2_populasi($db_object, 'hobi', 'SENIOR (senior, bola, karate, taekwondo)', $x_hobi_menyanyi_senior, $jumlah_senior);
   //      //S2 jawaban_d Koleris
   //  $s2_hobi_menyanyi_mapala = get_s2_populasi($db_object, 'hobi', 'Pecinta Alam (MAPALA)', $x_hobi_menyanyi_mapala, $jumlah_mapala);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_menyanyi_persma = get_s2_populasi($db_object, 'hobi', 'Persma', $x_hobi_menyanyi_persma, $jumlah_persma);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_menyanyi_bahasa = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_menyanyi_bahasa, $jumlah_bahasa);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_menyanyi_pramuka = get_s2_populasi($db_object, 'hobi', 'Pramuka', $x_hobi_menyanyi_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Hobi Menyanyi Wirausaha=".number_format($s2_hobi_menyanyi_wirausaha, dec())."<br>";
   //  echo "S2 Hobi Menyanyi Kemanusiaan=".number_format($s2_hobi_menyanyi_kemanusiaan, dec())."<br>";
   //      echo "S2 Hobi Menyanyi SENIOR=".number_format($s2_hobi_menyanyi_senior, dec())."<br>";
   //      echo "S2 Hobi Menyanyi MAPALA=".number_format($s2_hobi_menyanyi_mapala, dec())."<br>";
   //      echo "S2 Hobi Menyanyi Persma=".number_format($s2_hobi_menyanyi_persma, dec())."<br>";
   //      echo "S2 Hobi Menyanyi Bahasa=".number_format($s2_hobi_menyanyi_bahasa, dec())."<br>";
   //      echo "S2 Hobi Menyanyi Pramuka=".number_format($s2_hobi_menyanyi_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_d Sanguin
   //  $s2_hobi_menulis_wirausaha = get_s2_populasi($db_object, 'hobi', 'Wirausaha', $x_hobi_menulis_wirausaha, $jumlah_wirausaha);
   //  //S2 jawaban_d Koleris
   //  $s2_hobi_menulis_kemanusiaan = get_s2_populasi($db_object, 'hobi', 'Kemanusiaan (ksr, humaniora)', $x_hobi_menulis_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_d Melankolis
   //  $s2_hobi_menulis_senior = get_s2_populasi($db_object, 'hobi', 'SENIOR (senior, bola, karate, taekwondo)', $x_hobi_menulis_senior, $jumlah_senior);
   //      //S2 jawaban_d Koleris
   //  $s2_hobi_menulis_mapala = get_s2_populasi($db_object, 'hobi', 'Pecinta Alam (MAPALA)', $x_hobi_menulis_mapala, $jumlah_mapala);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_menulis_persma = get_s2_populasi($db_object, 'hobi', 'Persma', $x_hobi_menulis_persma, $jumlah_persma);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_menulis_bahasa = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_menulis_bahasa, $jumlah_bahasa);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_menulis_pramuka = get_s2_populasi($db_object, 'hobi', 'Pramuka', $x_hobi_menulis_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Hobi Menulis Wirausaha=".number_format($s2_hobi_menulis_wirausaha, dec())."<br>";
   //  echo "S2 Hobi Menulis Kemanusiaan=".number_format($s2_hobi_menulis_kemanusiaan, dec())."<br>";
   //      echo "S2 Hobi Menulis SENIOR=".number_format($s2_hobi_menulis_senior, dec())."<br>";
   //      echo "S2 Hobi Menulis MAPALA=".number_format($s2_hobi_menulis_mapala, dec())."<br>";
   //      echo "S2 Hobi Menulis Persma=".number_format($s2_hobi_menulis_persma, dec())."<br>";
   //      echo "S2 Hobi Menulis Bahasa=".number_format($s2_hobi_menulis_bahasa, dec())."<br>";
   //      echo "S2 Hobi Menulis Pramuka=".number_format($s2_hobi_menulis_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_d Sanguin
   //  $s2_hobi_menggambar_wirausaha = get_s2_populasi($db_object, 'hobi', 'Wirausaha', $x_hobi_menggambar_wirausaha, $jumlah_wirausaha);
   //  //S2 jawaban_d Koleris
   //  $s2_hobi_menggambar_kemanusiaan = get_s2_populasi($db_object, 'hobi', 'Kemanusiaan (ksr, humaniora)', $x_hobi_menggambar_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_d Melankolis
   //  $s2_hobi_menggambar_senior = get_s2_populasi($db_object, 'hobi', 'SENIOR (senior, bola, karate, taekwondo)', $x_hobi_menggambar_senior, $jumlah_senior);
   //      //S2 jawaban_d Koleris
   //  $s2_hobi_menggambar_mapala = get_s2_populasi($db_object, 'hobi', 'Pecinta Alam (MAPALA)', $x_hobi_menggambar_mapala, $jumlah_mapala);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_menggambar_persma = get_s2_populasi($db_object, 'hobi', 'Persma', $x_hobi_menggambar_persma, $jumlah_persma);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_menggambar_bahasa = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_menggambar_bahasa, $jumlah_bahasa);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_menggambar_pramuka = get_s2_populasi($db_object, 'hobi', 'Pramuka', $x_hobi_menggambar_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Hobi Menggambar Wirausaha=".number_format($s2_hobi_menggambar_wirausaha, dec())."<br>";
   //  echo "S2 Hobi Menggambar Kemanusiaan=".number_format($s2_hobi_menggambar_kemanusiaan, dec())."<br>";
   //      echo "S2 Hobi Menggambar SENIOR=".number_format($s2_hobi_menggambar_senior, dec())."<br>";
   //      echo "S2 Hobi Menggambar MAPALA=".number_format($s2_hobi_menggambar_mapala, dec())."<br>";
   //      echo "S2 Hobi Menggambar Persma=".number_format($s2_hobi_menggambar_persma, dec())."<br>";
   //      echo "S2 Hobi Menggambar Bahasa=".number_format($s2_hobi_menggambar_bahasa, dec())."<br>";
   //      echo "S2 Hobi Menggambar Pramuka=".number_format($s2_hobi_menggambar_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_d Sanguin
   //  $s2_hobi_memasak_wirausaha = get_s2_populasi($db_object, 'hobi', 'Wirausaha', $x_hobi_memasak_wirausaha, $jumlah_wirausaha);
   //  //S2 jawaban_d Koleris
   //  $s2_hobi_memasak_kemanusiaan = get_s2_populasi($db_object, 'hobi', 'Kemanusiaan (ksr, humaniora)', $x_hobi_memasak_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_d Melankolis
   //  $s2_hobi_memasak_senior = get_s2_populasi($db_object, 'hobi', 'SENIOR (senior, bola, karate, taekwondo)', $x_hobi_memasak_senior, $jumlah_senior);
   //      //S2 jawaban_d Koleris
   //  $s2_hobi_memasak_mapala = get_s2_populasi($db_object, 'hobi', 'Pecinta Alam (MAPALA)', $x_hobi_memasak_mapala, $jumlah_mapala);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_memasak_persma = get_s2_populasi($db_object, 'hobi', 'Persma', $x_hobi_memasak_persma, $jumlah_persma);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_memasak_bahasa = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_memasak_bahasa, $jumlah_bahasa);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_memasak_pramuka = get_s2_populasi($db_object, 'hobi', 'Pramuka', $x_hobi_memasak_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Hobi Memasak Wirausaha=".number_format($s2_hobi_memasak_wirausaha, dec())."<br>";
   //  echo "S2 Hobi Memasak Kemanusiaan=".number_format($s2_hobi_memasak_kemanusiaan, dec())."<br>";
   //      echo "S2 Hobi Memasak SENIOR=".number_format($s2_hobi_memasak_senior, dec())."<br>";
   //      echo "S2 Hobi Memasak MAPALA=".number_format($s2_hobi_memasak_mapala, dec())."<br>";
   //      echo "S2 Hobi Memasak Persma=".number_format($s2_hobi_memasak_persma, dec())."<br>";
   //      echo "S2 Hobi Memasak Bahasa=".number_format($s2_hobi_memasak_bahasa, dec())."<br>";
   //      echo "S2 Hobi Memasak Pramuka=".number_format($s2_hobi_memasak_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_d Sanguin
   //  $s2_hobi_fotografi_wirausaha = get_s2_populasi($db_object, 'hobi', 'Wirausaha', $x_hobi_fotografi_wirausaha, $jumlah_wirausaha);
   //  //S2 jawaban_d Koleris
   //  $s2_hobi_fotografi_kemanusiaan = get_s2_populasi($db_object, 'hobi', 'Kemanusiaan (ksr, humaniora)', $x_hobi_fotografi_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_d Melankolis
   //  $s2_hobi_fotografi_senior = get_s2_populasi($db_object, 'hobi', 'SENIOR (senior, bola, karate, taekwondo)', $x_hobi_fotografi_senior, $jumlah_senior);
   //      //S2 jawaban_d Koleris
   //  $s2_hobi_fotografi_mapala = get_s2_populasi($db_object, 'hobi', 'Pecinta Alam (MAPALA)', $x_hobi_fotografi_mapala, $jumlah_mapala);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_fotografi_persma = get_s2_populasi($db_object, 'hobi', 'Persma', $x_hobi_fotografi_persma, $jumlah_persma);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_fotografi_bahasa = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_fotografi_bahasa, $jumlah_bahasa);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_fotografi_pramuka = get_s2_populasi($db_object, 'hobi', 'Pramuka', $x_hobi_fotografi_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Hobi Fotografi Wirausaha=".number_format($s2_hobi_fotografi_wirausaha, dec())."<br>";
   //  echo "S2 Hobi Fotografi Kemanusiaan=".number_format($s2_hobi_fotografi_kemanusiaan, dec())."<br>";
   //      echo "S2 Hobi Fotografi SENIOR=".number_format($s2_hobi_fotografi_senior, dec())."<br>";
   //      echo "S2 Hobi Fotografi MAPALA=".number_format($s2_hobi_fotografi_mapala, dec())."<br>";
   //      echo "S2 Hobi Fotografi Persma=".number_format($s2_hobi_fotografi_persma, dec())."<br>";
   //      echo "S2 Hobi Fotografi Bahasa=".number_format($s2_hobi_fotografi_bahasa, dec())."<br>";
   //      echo "S2 JHobi Fotografi Pramuka=".number_format($s2_hobi_fotografi_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_d Sanguin
   //  $s2_hobi_sepakbola_wirausaha = get_s2_populasi($db_object, 'hobi', 'Wirausaha', $x_hobi_sepakbola_wirausaha, $jumlah_wirausaha);
   //  //S2 jawaban_d Koleris
   //  $s2_hobi_sepakbola_kemanusiaan = get_s2_populasi($db_object, 'hobi', 'Kemanusiaan (ksr, humaniora)', $x_hobi_sepakbola_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_d Melankolis
   //  $s2_hobi_sepakbola_senior = get_s2_populasi($db_object, 'hobi', 'SENIOR (senior, bola, karate, taekwondo)', $x_hobi_sepakbola_senior, $jumlah_senior);
   //      //S2 jawaban_d Koleris
   //  $s2_hobi_sepakbola_mapala = get_s2_populasi($db_object, 'hobi', 'Pecinta Alam (MAPALA)', $x_hobi_sepakbola_mapala, $jumlah_mapala);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_sepakbola_persma = get_s2_populasi($db_object, 'hobi', 'Persma', $x_hobi_sepakbola_persma, $jumlah_persma);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_sepakbola_bahasa = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_sepakbola_bahasa, $jumlah_bahasa);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_fotografi_pramuka = get_s2_populasi($db_object, 'hobi', 'Pramuka', $x_hobi_fotografi_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Hobi Sepak Bola Wirausaha=".number_format($s2_hobi_sepakbola_wirausaha, dec())."<br>";
   //  echo "S2 Hobi Sepak Bola Kemanusiaan=".number_format($s2_hobi_sepakbola_kemanusiaan, dec())."<br>";
   //      echo "S2 Hobi Sepak Bola SENIOR=".number_format($s2_hobi_sepakbola_senior, dec())."<br>";
   //      echo "S2 Hobi Sepak Bola MAPALA=".number_format($s2_hobi_sepakbola_mapala, dec())."<br>";
   //      echo "S2 Hobi Sepak Bola Persma=".number_format($s2_hobi_sepakbola_persma, dec())."<br>";
   //      echo "S2 Hobi Sepak Bola Bahasa=".number_format($s2_hobi_sepakbola_bahasa, dec())."<br>";
   //      echo "S2 Hobi Sepak Bola Pramuka=".number_format($s2_hobi_sepakbola_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_d Sanguin
   //  $s2_hobi_bulutangkis_wirausaha = get_s2_populasi($db_object, 'hobi', 'Wirausaha', $x_hobi_bulutangkis_wirausaha, $jumlah_wirausaha);
   //  //S2 jawaban_d Koleris
   //  $s2_hobi_bulutangkis_kemanusiaan = get_s2_populasi($db_object, 'hobi', 'Kemanusiaan (ksr, humaniora)', $x_hobi_bulutangkis_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_d Melankolis
   //  $s2_hobi_bulutangkis_senior = get_s2_populasi($db_object, 'hobi', 'SENIOR (senior, bola, karate, taekwondo)', $x_hobi_bulutangkis_senior, $jumlah_senior);
   //      //S2 jawaban_d Koleris
   //  $s2_hobi_bulutangkis_mapala = get_s2_populasi($db_object, 'hobi', 'Pecinta Alam (MAPALA)', $x_hobi_bulutangkis_mapala, $jumlah_mapala);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_bulutangkis_persma = get_s2_populasi($db_object, 'hobi', 'Persma', $x_hobi_bulutangkis_persma, $jumlah_persma);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_bulutangkis_bahasa = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_bulutangkis_bahasa, $jumlah_bahasa);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_bulutangkis_pramuka = get_s2_populasi($db_object, 'hobi', 'Pramuka', $x_hobi_bulutangkis_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Hobi Bulu Tangkis Wirausaha=".number_format($s2_hobi_bulutangkis_wirausaha, dec())."<br>";
   //  echo "S2 Hobi Bulu Tangkis Kemanusiaan=".number_format($s2_hobi_bulutangkis_kemanusiaan, dec())."<br>";
   //      echo "S2 Hobi Bulu Tangkis SENIOR=".number_format($s2_hobi_bulutangkis_senior, dec())."<br>";
   //      echo "S2 Hobi Bulu Tangkis MAPALA=".number_format($s2_hobi_bulutangkis_mapala, dec())."<br>";
   //      echo "S2 Hobi Bulu Tangkis Persma=".number_format($s2_hobi_bulutangkis_persma, dec())."<br>";
   //      echo "S2 Hobi Bulu Tangkis Bahasa=".number_format($s2_hobi_bulutangkis_bahasa, dec())."<br>";
   //      echo "S2 Hobi Bulu Tangkis Pramuka=".number_format($s2_hobi_bulutangkis_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_d Sanguin
   //  $s2_hobi_basket_wirausaha = get_s2_populasi($db_object, 'hobi', 'Wirausaha', $x_hobi_basket_wirausaha, $jumlah_wirausaha);
   //  //S2 jawaban_d Koleris
   //  $s2_hobi_basket_kemanusiaan = get_s2_populasi($db_object, 'hobi', 'Kemanusiaan (ksr, humaniora)', $x_hobi_basket_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_d Melankolis
   //  $s2_hobi_basket_senior = get_s2_populasi($db_object, 'hobi', 'SENIOR (senior, bola, karate, taekwondo)', $x_hobi_basket_senior, $jumlah_senior);
   //      //S2 jawaban_d Koleris
   //  $s2_hobi_basket_mapala = get_s2_populasi($db_object, 'hobi', 'Pecinta Alam (MAPALA)', $x_hobi_basket_mapala, $jumlah_mapala);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_basket_persma = get_s2_populasi($db_object, 'hobi', 'Persma', $x_hobi_basket_persma, $jumlah_persma);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_basket_bahasa = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_basket_bahasa, $jumlah_bahasa);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_basket_pramuka = get_s2_populasi($db_object, 'hobi', 'Pramuka', $x_hobi_basket_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Hobi Basket Wirausaha=".number_format($s2_hobi_basket_wirausaha, dec())."<br>";
   //  echo "S2 Hobi Basket Kemanusiaan=".number_format($s2_hobi_basket_kemanusiaan, dec())."<br>";
   //      echo "S2 Hobi Basket SENIOR=".number_format($s2_hobi_basket_senior, dec())."<br>";
   //      echo "S2 Hobi Basket MAPALA=".number_format($s2_hobi_basket_mapala, dec())."<br>";
   //      echo "S2 Hobi Basket Persma=".number_format($s2_hobi_basket_persma, dec())."<br>";
   //      echo "S2 Hobi Basket Bahasa=".number_format($s2_hobi_basket_bahasa, dec())."<br>";
   //      echo "S2 Hobi Basket Pramuka=".number_format($s2_hobi_basket_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_d Sanguin
   //  $s2_hobi_futsal_wirausaha = get_s2_populasi($db_object, 'hobi', 'Wirausaha', $x_hobi_futsal_wirausaha, $jumlah_wirausaha);
   //  //S2 jawaban_d Koleris
   //  $s2_hobi_futsal_kemanusiaan = get_s2_populasi($db_object, 'hobi', 'Kemanusiaan (ksr, humaniora)', $x_hobi_futsal_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_d Melankolis
   //  $s2_hobi_futsal_senior = get_s2_populasi($db_object, 'hobi', 'SENIOR (senior, bola, karate, taekwondo)', $x_hobi_futsal_senior, $jumlah_senior);
   //      //S2 jawaban_d Koleris
   //  $s2_hobi_futsal_mapala = get_s2_populasi($db_object, 'hobi', 'Pecinta Alam (MAPALA)', $x_hobi_futsal_mapala, $jumlah_mapala);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_futsal_persma = get_s2_populasi($db_object, 'hobi', 'Persma', $x_hobi_futsal_persma, $jumlah_persma);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_futsal_bahasa = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_futsal_bahasa, $jumlah_bahasa);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_futsal_pramuka = get_s2_populasi($db_object, 'hobi', 'Pramuka', $x_hobi_futsal_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Hobi Futsal Wirausaha=".number_format($s2_hobi_futsal_wirausaha, dec())."<br>";
   //  echo "S2 Hobi Futsal Kemanusiaan=".number_format($s2_hobi_futsal_kemanusiaan, dec())."<br>";
   //      echo "S2 Hobi Futsal SENIOR=".number_format($s2_hobi_futsal_senior, dec())."<br>";
   //      echo "S2 Hobi Futsal MAPALA=".number_format($s2_hobi_futsal_mapala, dec())."<br>";
   //      echo "S2 Hobi Futsal Persma=".number_format($s2_hobi_futsal_persma, dec())."<br>";
   //      echo "S2 Hobi Futsal Bahasa=".number_format($s2_hobi_futsal_bahasa, dec())."<br>";
   //      echo "S2 Hobi Futsal Pramuka=".number_format($s2_hobi_futsal_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_d Sanguin
   //  $s2_hobi_volly_wirausaha = get_s2_populasi($db_object, 'hobi', 'Wirausaha', $x_hobi_volly_wirausaha, $jumlah_wirausaha);
   //  //S2 jawaban_d Koleris
   //  $s2_hobi_volly_kemanusiaan = get_s2_populasi($db_object, 'hobi', 'Kemanusiaan (ksr, humaniora)', $x_hobi_volly_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_d Melankolis
   //  $s2_hobi_volly_senior = get_s2_populasi($db_object, 'hobi', 'SENIOR (senior, bola, karate, taekwondo)', $x_hobi_volly_senior, $jumlah_senior);
   //      //S2 jawaban_d Koleris
   //  $s2_hobi_volly_mapala = get_s2_populasi($db_object, 'hobi', 'Pecinta Alam (MAPALA)', $x_hobi_volly_mapala, $jumlah_mapala);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_volly_persma = get_s2_populasi($db_object, 'hobi', 'Persma', $x_hobi_volly_persma, $jumlah_persma);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_volly_bahasa = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_volly_bahasa, $jumlah_bahasa);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_volly_pramuka = get_s2_populasi($db_object, 'hobi', 'Pramuka', $x_hobi_volly_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Hobi Volly Wirausaha=".number_format($s2_hobi_volly_wirausaha, dec())."<br>";
   //  echo "S2 Hobi Volly Kemanusiaan=".number_format($s2_hobi_volly_kemanusiaan, dec())."<br>";
   //      echo "S2 Hobi Volly SENIOR=".number_format($s2_hobi_volly_senior, dec())."<br>";
   //      echo "S2 Hobi Volly MAPALA=".number_format($s2_hobi_volly_mapala, dec())."<br>";
   //      echo "S2 Hobi Volly Persma=".number_format($s2_hobi_volly_persma, dec())."<br>";
   //      echo "S2 Hobi Volly Bahasa=".number_format($s2_hobi_volly_bahasa, dec())."<br>";
   //      echo "S2 Hobi Volly Pramuka=".number_format($s2_hobi_volly_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_d Sanguin
   //  $s2_hobi_belajarmtk_wirausaha = get_s2_populasi($db_object, 'hobi', 'Wirausaha', $x_hobi_belajarmtk_wirausaha, $jumlah_wirausaha);
   //  //S2 jawaban_d Koleris
   //  $s2_hobi_belajarmtk_kemanusiaan = get_s2_populasi($db_object, 'hobi', 'Kemanusiaan (ksr, humaniora)', $x_hobi_belajarmtk_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_d Melankolis
   //  $s2_hobi_belajarmtk_senior = get_s2_populasi($db_object, 'hobi', 'SENIOR (senior, bola, karate, taekwondo)', $x_hobi_belajarmtk_senior, $jumlah_senior);
   //      //S2 jawaban_d Koleris
   //  $s2_hobi_belajarmtk_mapala = get_s2_populasi($db_object, 'hobi', 'Pecinta Alam (MAPALA)', $x_hobi_belajarmtk_mapala, $jumlah_mapala);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_belajarmtk_persma = get_s2_populasi($db_object, 'hobi', 'Persma', $x_hobi_belajarmtk_persma, $jumlah_persma);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_belajarmtk_bahasa = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_belajarmtk_bahasa, $jumlah_bahasa);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_belajarmtk_pramuka = get_s2_populasi($db_object, 'hobi', 'Pramuka', $x_hobi_belajarmtk_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Hobi Belajar Matematika Wirausaha=".number_format($s2_hobi_belajarmtk_wirausaha, dec())."<br>";
   //  echo "S2 Hobi Belajar Matematika Kemanusiaan=".number_format($s2_hobi_belajarmtk_kemanusiaan, dec())."<br>";
   //      echo "S2 Hobi Belajar Matematika SENIOR=".number_format($s2_hobi_belajarmtk_senior, dec())."<br>";
   //      echo "S2 Hobi Belajar Matematika MAPALA=".number_format($s2_hobi_belajarmtk_mapala, dec())."<br>";
   //      echo "S2 Hobi Belajar Matematika Persma=".number_format($s2_hobi_belajarmtk_persma, dec())."<br>";
   //      echo "S2 Hobi Belajar Matematika Bahasa=".number_format($s2_hobi_belajarmtk_bahasa, dec())."<br>";
   //      echo "S2 Hobi Belajar Matematika Pramuka=".number_format($s2_hobi_belajarmtk_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_d Sanguin
   //  $s2_hobi_olahraga_wirausaha = get_s2_populasi($db_object, 'hobi', 'Wirausaha', $x_hobi_olahraga_wirausaha, $jumlah_wirausaha);
   //  //S2 jawaban_d Koleris
   //  $s2_hobi_olahraga_kemanusiaan = get_s2_populasi($db_object, 'hobi', 'Kemanusiaan (ksr, humaniora)', $x_hobi_olahraga_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_d Melankolis
   //  $s2_hobi_olahraga_senior = get_s2_populasi($db_object, 'hobi', 'SENIOR (senior, bola, karate, taekwondo)', $x_hobi_olahraga_senior, $jumlah_senior);
   //      //S2 jawaban_d Koleris
   //  $s2_hobi_olahraga_mapala = get_s2_populasi($db_object, 'hobi', 'Pecinta Alam (MAPALA)', $x_hobi_olahraga_mapala, $jumlah_mapala);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_olahraga_persma = get_s2_populasi($db_object, 'hobi', 'Persma', $x_hobi_olahraga_persma, $jumlah_persma);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_olahraga_bahasa = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_olahraga_bahasa, $jumlah_bahasa);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_olahraga_pramuka = get_s2_populasi($db_object, 'hobi', 'Pramuka', $x_hobi_olahraga_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Hobi Olahraga Wirausaha=".number_format($s2_hobi_olahraga_wirausaha, dec())."<br>";
   //  echo "S2 Hobi Olahraga Kemanusiaan=".number_format($s2_hobi_olahraga_kemanusiaan, dec())."<br>";
   //      echo "S2 Hobi Olahraga SENIOR=".number_format($s2_hobi_olahraga_senior, dec())."<br>";
   //      echo "S2 Hobi Olahraga MAPALA=".number_format($s2_hobi_olahraga_mapala, dec())."<br>";
   //      echo "S2 Hobi Olahraga Persma=".number_format($s2_hobi_olahraga_persma, dec())."<br>";
   //      echo "S2 Hobi Olahraga Bahasa=".number_format($s2_hobi_olahraga_bahasa, dec())."<br>";
   //      echo "S2 Hobi Olahraga Pramuka=".number_format($s2_hobi_olahraga_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_d Sanguin
   //  $s2_hobi_membaca_wirausaha = get_s2_populasi($db_object, 'hobi', 'Wirausaha', $x_hobi_membaca_wirausaha, $jumlah_wirausaha);
   //  //S2 jawaban_d Koleris
   //  $s2_hobi_membaca_kemanusiaan = get_s2_populasi($db_object, 'hobi', 'Kemanusiaan (ksr, humaniora)', $x_hobi_membaca_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_d Melankolis
   //  $s2_hobi_membaca_senior = get_s2_populasi($db_object, 'hobi', 'SENIOR (senior, bola, karate, taekwondo)', $x_hobi_membaca_senior, $jumlah_senior);
   //      //S2 jawaban_d Koleris
   //  $s2_hobi_membaca_mapala = get_s2_populasi($db_object, 'hobi', 'Pecinta Alam (MAPALA)', $x_hobi_membaca_mapala, $jumlah_mapala);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_membaca_persma = get_s2_populasi($db_object, 'hobi', 'Persma', $x_hobi_membaca_persma, $jumlah_persma);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_membaca_bahasa = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_membaca_bahasa, $jumlah_bahasa);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_membaca_pramuka = get_s2_populasi($db_object, 'hobi', 'Pramuka', $x_hobi_membaca_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Hobi Membaca Wirausaha=".number_format($s2_hobi_membaca_wirausaha, dec())."<br>";
   //  echo "S2 Hobi Membaca Kemanusiaan=".number_format($s2_hobi_membaca_kemanusiaan, dec())."<br>";
   //      echo "S2 Hobi Membaca SENIOR=".number_format($s2_hobi_membaca_senior, dec())."<br>";
   //      echo "S2 Hobi Membaca MAPALA=".number_format($s2_hobi_membaca_mapala, dec())."<br>";
   //      echo "S2 Hobi Membaca Persma=".number_format($s2_hobi_membaca_persma, dec())."<br>";
   //      echo "S2 Hobi Membaca Bahasa=".number_format($s2_hobi_membaca_bahasa, dec())."<br>";
   //      echo "S2 Hobi Membaca Pramuka=".number_format($s2_hobi_membaca_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_d Sanguin
   //  $s2_hobi_mainmusik_wirausaha = get_s2_populasi($db_object, 'hobi', 'Wirausaha', $x_hobi_mainmusik_wirausaha, $jumlah_wirausaha);
   //  //S2 jawaban_d Koleris
   //  $s2_hobi_mainmusik_kemanusiaan = get_s2_populasi($db_object, 'hobi', 'Kemanusiaan (ksr, humaniora)', $x_hobi_mainmusik_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_d Melankolis
   //  $s2_hobi_mainmusik_senior = get_s2_populasi($db_object, 'hobi', 'SENIOR (senior, bola, karate, taekwondo)', $x_hobi_membaca_senior, $jumlah_senior);
   //      //S2 jawaban_d Koleris
   //  $s2_hobi_mainmusik_mapala = get_s2_populasi($db_object, 'hobi', 'Pecinta Alam (MAPALA)', $x_hobi_mainmusik_mapala, $jumlah_mapala);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_mainmusik_persma = get_s2_populasi($db_object, 'hobi', 'Persma', $x_hobi_mainmusik_persma, $jumlah_persma);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_mainmusik_bahasa = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_mainmusik_bahasa, $jumlah_bahasa);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_mainmusik_pramuka = get_s2_populasi($db_object, 'hobi', 'Pramuka', $x_hobi_mainmusik_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Hobi Bermain Musik Wirausaha=".number_format($s2_hobi_mainmusik_wirausaha, dec())."<br>";
   //  echo "S2 Hobi Bermain Musik Kemanusiaan=".number_format($s2_hobi_mainmusik_kemanusiaan, dec())."<br>";
   //      echo "S2 Hobi Bermain Musik SENIOR=".number_format($s2_hobi_mainmusik_senior, dec())."<br>";
   //      echo "S2 Hobi Bermain Musik MAPALA=".number_format($s2_hobi_mainmusik_mapala, dec())."<br>";
   //      echo "S2 Hobi Bermain Musik Persma=".number_format($s2_hobi_mainmusik_persma, dec())."<br>";
   //      echo "S2 Hobi Bermain Musik Bahasa=".number_format($s2_hobi_mainmusik_bahasa, dec())."<br>";
   //      echo "S2 Hobi Bermain Musik Pramuka=".number_format($s2_hobi_mainmusik_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_d Sanguin
   //  $s2_hobi_dengarmusik_wirausaha = get_s2_populasi($db_object, 'hobi', 'Wirausaha', $x_hobi_dengarmusik_wirausaha, $jumlah_wirausaha);
   //  //S2 jawaban_d Koleris
   //  $s2_hobi_dengarmusik_kemanusiaan = get_s2_populasi($db_object, 'hobi', 'Kemanusiaan (ksr, humaniora)', $x_hobi_dengarmusik_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_d Melankolis
   //  $s2_hobi_dengarmusik_senior = get_s2_populasi($db_object, 'hobi', 'SENIOR (senior, bola, karate, taekwondo)', $x_hobi_dengarmusik_senior, $jumlah_senior);
   //      //S2 jawaban_d Koleris
   //  $s2_hobi_dengarmusik_mapala = get_s2_populasi($db_object, 'hobi', 'Pecinta Alam (MAPALA)', $x_hobi_dengarmusik_mapala, $jumlah_mapala);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_dengarmusik_persma = get_s2_populasi($db_object, 'hobi', 'Persma', $x_hobi_dengarmusik_persma, $jumlah_persma);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_dengarmusik_bahasa = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_dengarmusik_bahasa, $jumlah_bahasa);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_dengarmusik_pramuka = get_s2_populasi($db_object, 'hobi', 'Pramuka', $x_hobi_dengarmusik_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Hobi Mendengar Musik Wirausaha=".number_format($s2_hobi_dengarmusik_wirausaha, dec())."<br>";
   //  echo "S2 Hobi Mendengar Musik Kemanusiaan=".number_format($s2_hobi_dengarmusik_kemanusiaan, dec())."<br>";
   //      echo "S2 Hobi Mendengar Musik SENIOR=".number_format($s2_hobi_dengarmusik_senior, dec())."<br>";
   //      echo "S2 Hobi Mendengar Musik MAPALA=".number_format($s2_hobi_dengarmusik_mapala, dec())."<br>";
   //      echo "S2 Hobi Mendengar Musik Persma=".number_format($s2_hobi_dengarmusik_persma, dec())."<br>";
   //      echo "S2 Hobi Mendengar Musik Bahasa=".number_format($s2_hobi_dengarmusik_bahasa, dec())."<br>";
   //      echo "S2 Hobi Mendengar Musik Pramuka=".number_format($s2_hobi_dengarmusik_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_d Sanguin
   //  $s2_hobi_nonton_wirausaha = get_s2_populasi($db_object, 'hobi', 'Wirausaha', $x_hobi_nonton_wirausaha, $jumlah_wirausaha);
   //  //S2 jawaban_d Koleris
   //  $s2_hobi_nonton_kemanusiaan = get_s2_populasi($db_object, 'hobi', 'Kemanusiaan (ksr, humaniora)', $x_hobi_nonton_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_d Melankolis
   //  $s2_hobi_nonton_senior = get_s2_populasi($db_object, 'hobi', 'SENIOR (senior, bola, karate, taekwondo)', $x_hobi_nonton_senior, $jumlah_senior);
   //      //S2 jawaban_d Koleris
   //  $s2_hobi_nonton_mapala = get_s2_populasi($db_object, 'hobi', 'Pecinta Alam (MAPALA)', $x_hobi_nonton_mapala, $jumlah_mapala);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_nonton_persma = get_s2_populasi($db_object, 'hobi', 'Persma', $x_hobi_nonton_persma, $jumlah_persma);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_nonton_bahasa = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_nonton_bahasa, $jumlah_bahasa);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_nonton_pramuka = get_s2_populasi($db_object, 'hobi', 'Pramuka', $x_hobi_nonton_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Hobi Nonton Wirausaha=".number_format($s2_hobi_nonton_wirausaha, dec())."<br>";
   //  echo "S2 Hobi Nonton Kemanusiaan=".number_format($s2_hobi_nonton_kemanusiaan, dec())."<br>";
   //      echo "S2 Hobi Nonton SENIOR=".number_format($s2_hobi_nonton_senior, dec())."<br>";
   //      echo "S2 Hobi Nonton MAPALA=".number_format($s2_hobi_nonton_mapala, dec())."<br>";
   //      echo "S2 Hobi Nonton Persma=".number_format($s2_hobi_nonton_persma, dec())."<br>";
   //      echo "S2 Hobi Nonton Bahasa=".number_format($s2_hobi_nonton_bahasa, dec())."<br>";
   //      echo "S2 Hobi Nonton Pramuka=".number_format($s2_hobi_nonton_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_d Sanguin
   //  $s2_hobi_maingame_wirausaha = get_s2_populasi($db_object, 'hobi', 'Wirausaha', $x_hobi_maingame_wirausaha, $jumlah_wirausaha);
   //  //S2 jawaban_d Koleris
   //  $s2_hobi_maingame_kemanusiaan = get_s2_populasi($db_object, 'hobi', 'Kemanusiaan (ksr, humaniora)', $x_hobi_maingame_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_d Melankolis
   //  $s2_hobi_maingame_senior = get_s2_populasi($db_object, 'hobi', 'SENIOR (senior, bola, karate, taekwondo)', $x_hobi_maingame_senior, $jumlah_senior);
   //      //S2 jawaban_d Koleris
   //  $s2_hobi_maingame_mapala = get_s2_populasi($db_object, 'hobi', 'Pecinta Alam (MAPALA)', $x_hobi_maingame_mapala, $jumlah_mapala);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_maingame_persma = get_s2_populasi($db_object, 'hobi', 'Persma', $x_hobi_maingame_persma, $jumlah_persma);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_maingame_bahasa = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_maingame_bahasa, $jumlah_bahasa);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_maingame_pramuka = get_s2_populasi($db_object, 'hobi', 'Pramuka', $x_hobi_maingame_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Hobi Main Game Wirausaha=".number_format($s2_hobi_maingame_wirausaha, dec())."<br>";
   //  echo "S2 Hobi Main Game Kemanusiaan=".number_format($s2_hobi_maingame_kemanusiaan, dec())."<br>";
   //      echo "S2 Hobi Main Game SENIOR=".number_format($s2_hobi_maingame_senior, dec())."<br>";
   //      echo "S2 Hobi Main Game MAPALA=".number_format($s2_hobi_maingame_mapala, dec())."<br>";
   //      echo "S2 Hobi Main Game Persma=".number_format($s2_hobi_maingame_persma, dec())."<br>";
   //      echo "S2 Hobi Main Game Bahasa=".number_format($s2_hobi_maingame_bahasa, dec())."<br>";
   //      echo "S2 Hobi Main Game Pramuka=".number_format($s2_hobi_maingame_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_d Sanguin
   //  $s2_hobi_jalan2_wirausaha = get_s2_populasi($db_object, 'hobi', 'Wirausaha', $x_hobi_jalan2_wirausaha, $jumlah_wirausaha);
   //  //S2 jawaban_d Koleris
   //  $s2_hobi_jalan2_kemanusiaan = get_s2_populasi($db_object, 'hobi', 'Kemanusiaan (ksr, humaniora)', $x_hobi_jalan2_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_d Melankolis
   //  $s2_hobi_jalan2_senior = get_s2_populasi($db_object, 'hobi', 'SENIOR (senior, bola, karate, taekwondo)', $x_hobi_jalan2_senior, $jumlah_senior);
   //      //S2 jawaban_d Koleris
   //  $s2_hobi_jalan2_mapala = get_s2_populasi($db_object, 'hobi', 'Pecinta Alam (MAPALA)', $x_hobi_jalan2_mapala, $jumlah_mapala);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_jalan2_persma = get_s2_populasi($db_object, 'hobi', 'Persma', $x_hobi_jalan2_persma, $jumlah_persma);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_jalan2_bahasa = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_jalan2_bahasa, $jumlah_bahasa);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_jalan2_pramuka = get_s2_populasi($db_object, 'hobi', 'Pramuka', $x_hobi_jalan2_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Hobi Jalan-Jalan Wirausaha=".number_format($s2_hobi_jalan2_wirausaha, dec())."<br>";
   //  echo "S2 Hobi Jalan-Jalan Kemanusiaan=".number_format($s2_hobi_jalan2_kemanusiaan, dec())."<br>";
   //      echo "S2 Hobi Jalan-Jalan SENIOR=".number_format($s2_hobi_jalan2_senior, dec())."<br>";
   //      echo "S2 Hobi Jalan-Jalan MAPALA=".number_format($s2_hobi_jalan2_mapala, dec())."<br>";
   //      echo "S2 Hobi Jalan-Jalan Persma=".number_format($s2_hobi_jalan2_persma, dec())."<br>";
   //      echo "S2 Hobi Jalan-Jalan Bahasa=".number_format($s2_hobi_jalan2_bahasa, dec())."<br>";
   //      echo "S2 Hobi Jalan-Jalan Pramuka=".number_format($s2_hobi_jalan2_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_d Sanguin
   //  $s2_hobi_bhsasing_wirausaha = get_s2_populasi($db_object, 'hobi', 'Wirausaha', $x_hobi_bhsasing_wirausaha, $jumlah_wirausaha);
   //  //S2 jawaban_d Koleris
   //  $s2_hobi_bhsasing_kemanusiaan = get_s2_populasi($db_object, 'hobi', 'Kemanusiaan (ksr, humaniora)', $x_hobi_bhsasing_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_d Melankolis
   //  $s2_hobi_bhsasing_senior = get_s2_populasi($db_object, 'hobi', 'SENIOR (senior, bola, karate, taekwondo)', $x_hobi_bhsasing_senior, $jumlah_senior);
   //      //S2 jawaban_d Koleris
   //  $s2_hobi_bhsasing_mapala = get_s2_populasi($db_object, 'hobi', 'Pecinta Alam (MAPALA)', $x_hobi_bhsasing_mapala, $jumlah_mapala);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_bhsasing_persma = get_s2_populasi($db_object, 'hobi', 'Persma', $x_hobi_bhsasing_persma, $jumlah_persma);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_bhsasing_bahasa = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_bhsasing_bahasa, $jumlah_bahasa);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_bhsasing_pramuka = get_s2_populasi($db_object, 'hobi', 'Pramuka', $x_hobi_bhsasing_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Hobi Belajar Bahasa Asing Baru Wirausaha=".number_format($s2_hobi_bhsasing_wirausaha, dec())."<br>";
   //  echo "S2 Hobi Belajar Bahasa Asing Baru Kemanusiaan=".number_format($s2_hobi_bhsasing_kemanusiaan, dec())."<br>";
   //      echo "S2 Hobi Belajar Bahasa Asing Baru SENIOR=".number_format($s2_hobi_bhsasing_senior, dec())."<br>";
   //      echo "S2 Hobi Belajar Bahasa Asing Baru MAPALA=".number_format($s2_hobi_bhsasing_mapala, dec())."<br>";
   //      echo "S2 Hobi Belajar Bahasa Asing Baru Persma=".number_format($s2_hobi_bhsasing_persma, dec())."<br>";
   //      echo "S2 Hobi Belajar Bahasa Asing Baru Bahasa=".number_format($s2_hobi_bhsasing_bahasa, dec())."<br>";
   //      echo "S2 Hobi Belajar Bahasa Asing Baru Pramuka=".number_format($s2_hobi_bhsasing_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_d Sanguin
   //  $s2_hobi_melukis_wirausaha = get_s2_populasi($db_object, 'hobi', 'Wirausaha', $x_hobi_melukis_wirausaha, $jumlah_wirausaha);
   //  //S2 jawaban_d Koleris
   //  $s2_hobi_melukis_kemanusiaan = get_s2_populasi($db_object, 'hobi', 'Kemanusiaan (ksr, humaniora)', $x_hobi_melukis_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_d Melankolis
   //  $s2_hobi_melukis_senior = get_s2_populasi($db_object, 'hobi', 'SENIOR (senior, bola, karate, taekwondo)', $x_hobi_melukis_senior, $jumlah_senior);
   //      //S2 jawaban_d Koleris
   //  $s2_hobi_melukis_mapala = get_s2_populasi($db_object, 'hobi', 'Pecinta Alam (MAPALA)', $x_hobi_melukis_mapala, $jumlah_mapala);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_melukis_persma = get_s2_populasi($db_object, 'hobi', 'Persma', $x_hobi_melukis_persma, $jumlah_persma);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_melukis_bahasa = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_melukis_bahasa, $jumlah_bahasa);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_melukis_pramuka = get_s2_populasi($db_object, 'jawaban_d', 'Pramuka', $x_hobi_melukis_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Hobi Melukis Wirausaha=".number_format($s2_hobi_melukis_wirausaha, dec())."<br>";
   //  echo "S2 Hobi Melukis Kemanusiaan=".number_format($s2_hobi_melukis_kemanusiaan, dec())."<br>";
   //      echo "S2 Hobi Melukis SENIOR=".number_format($s2_hobi_melukis_senior, dec())."<br>";
   //      echo "S2 Hobi Melukis MAPALA=".number_format($s2_hobi_melukis_mapala, dec())."<br>";
   //      echo "S2 Hobi Melukis Persma=".number_format($s2_hobi_melukis_persma, dec())."<br>";
   //      echo "S2 Hobi Melukis Bahasa=".number_format($s2_hobi_melukis_bahasa, dec())."<br>";
   //      echo "S2 Hobi Melukis Pramuka=".number_format($s2_hobi_melukis_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_d Koleris
   //  $s2_hobi_berenang_wirausaha = get_s2_populasi($db_object, 'hobi', 'Wirausaha', $x_hobi_berenang_wirausaha, $jumlah_wirausaha);
   //  $s2_hobi_berenang_kemanusiaan = get_s2_populasi($db_object, 'hobi', 'Kemanusiaan (ksr, humaniora)', $x_hobi_berenang_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_d Melankolis
   //  $s2_hobi_berenang_senior = get_s2_populasi($db_object, 'hobi', 'SENIOR (senior, bola, karate, taekwondo)', $x_hobi_berenang_senior, $jumlah_senior);
   //      //S2 jawaban_d Koleris
   //  $s2_hobi_berenang_mapala = get_s2_populasi($db_object, 'hobi', 'Pecinta Alam (MAPALA)', $x_hobi_berenang_mapala, $jumlah_mapala);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_berenang_persma = get_s2_populasi($db_object, 'hobi', 'Persma', $x_hobi_berenang_persma, $jumlah_persma);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_berenang_bahasa = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_berenang_bahasa, $jumlah_bahasa);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_berenang_pramuka = get_s2_populasi($db_object, 'hobi', 'Pramuka', $x_hobi_berenang_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Hobi Berenang Wirausaha=".number_format($s2_hobi_berenang_wirausaha, dec())."<br>";
   //  echo "S2 Hobi Berenang Kemanusiaan=".number_format($s2_hobi_berenang_kemanusiaan, dec())."<br>";
   //      echo "S2 Hobi Berenang SENIOR=".number_format($s2_hobi_berenang_senior, dec())."<br>";
   //      echo "S2 Hobi Berenang MAPALA=".number_format($s2_hobi_berenang_mapala, dec())."<br>";
   //      echo "S2 Hobi Berenang Persma=".number_format($s2_hobi_berenang_persma, dec())."<br>";
   //      echo "S2 Hobi Berenang Bahasa=".number_format($s2_hobi_berenang_bahasa, dec())."<br>";
   //      echo "S2 Hobi Berenang Pramuka=".number_format($s2_hobi_berenang_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_d Koleris
   //  $s2_hobi_naikgunung_wirausaha = get_s2_populasi($db_object, 'hobi', 'Wirausaha', $x_hobi_naikgunung_wirausaha, $jumlah_wirausaha);
   //  $s2_hobi_naikgunung_kemanusiaan = get_s2_populasi($db_object, 'hobi', 'Kemanusiaan (ksr, humaniora)', $x_hobi_naikgunung_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_d Melankolis
   //  $s2_hobi_naikgunung_senior = get_s2_populasi($db_object, 'hobi', 'SENIOR (senior, bola, karate, taekwondo)', $x_hobi_naikgunung_senior, $jumlah_senior);
   //      //S2 jawaban_d Koleris
   //  $s2_hobi_naikgunung_mapala = get_s2_populasi($db_object, 'hobi', 'Pecinta Alam (MAPALA)', $x_hobi_naikgunung_mapala, $jumlah_mapala);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_naikgunung_persma = get_s2_populasi($db_object, 'hobi', 'Persma', $x_hobi_naikgunung_persma, $jumlah_persma);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_naikgunung_bahasa = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_naikgunung_bahasa, $jumlah_bahasa);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_naikgunung_pramuka = get_s2_populasi($db_object, 'hobi', 'Pramuka', $x_hobi_naikgunung_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Hobi Naik Gunung Wirausaha=".number_format($s2_hobi_naikgunung_wirausaha, dec())."<br>";
   //  echo "S2 Hobi Naik Gunung Kemanusiaan=".number_format($s2_hobi_naikgunung_kemanusiaan, dec())."<br>";
   //      echo "S2 Hobi Naik Gunung SENIOR=".number_format($s2_hobi_naikgunung_senior, dec())."<br>";
   //      echo "S2 Hobi Naik Gunung MAPALA=".number_format($s2_hobi_naikgunung_mapala, dec())."<br>";
   //      echo "S2 Hobi Naik Gunung Persma=".number_format($s2_hobi_naikgunung_persma, dec())."<br>";
   //      echo "S2 Hobi Naik Gunung Bahasa=".number_format($s2_hobi_naikgunung_bahasa, dec())."<br>";
   //      echo "S2 Hobi Naik Gunung Pramuka=".number_format($s2_hobi_naikgunung_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_d Koleris
   //  $s2_hobi_travelling_wirausaha = get_s2_populasi($db_object, 'hobi', 'Wirausaha', $x_hobi_travelling_wirausaha, $jumlah_wirausaha);
   //  $s2_hobi_travelling_kemanusiaan = get_s2_populasi($db_object, 'hobi', 'Kemanusiaan (ksr, humaniora)', $x_hobi_travelling_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_d Melankolis
   //  $s2_hobi_travelling_senior = get_s2_populasi($db_object, 'hobi', 'SENIOR (senior, bola, karate, taekwondo)', $x_hobi_travelling_senior, $jumlah_senior);
   //      //S2 jawaban_d Koleris
   //  $s2_hobi_travelling_mapala = get_s2_populasi($db_object, 'hobi', 'Pecinta Alam (MAPALA)', $x_hobi_travelling_mapala, $jumlah_mapala);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_travelling_persma = get_s2_populasi($db_object, 'hobi', 'Persma', $x_hobi_travelling_persma, $jumlah_persma);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_travelling_bahasa = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_travelling_bahasa, $jumlah_bahasa);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_travelling_pramuka = get_s2_populasi($db_object, 'hobi', 'Pramuka', $x_hobi_travelling_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Hobi Travelling Wirausaha=".number_format($s2_hobi_travelling_wirausaha, dec())."<br>";
   //  echo "S2 Hobi Travelling Kemanusiaan=".number_format($s2_hobi_travelling_kemanusiaan, dec())."<br>";
   //      echo "S2 Hobi Travelling SENIOR=".number_format($s2_hobi_travelling_senior, dec())."<br>";
   //      echo "S2 Hobi Travelling MAPALA=".number_format($s2_hobi_travelling_mapala, dec())."<br>";
   //      echo "S2 Hobi Travelling Persma=".number_format($s2_hobi_travelling_persma, dec())."<br>";
   //      echo "S2 Hobi Travelling Bahasa=".number_format($s2_hobi_travelling_bahasa, dec())."<br>";
   //      echo "S2 Hobi Travelling Pramuka=".number_format($s2_hobi_travelling_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }

   //  //S2 jawaban_d Koleris
   //  $s2_hobi_desaingrafis_wirausaha = get_s2_populasi($db_object, 'hobi', 'Wirausaha', $x_hobi_desaingrafis_wirausaha, $jumlah_wirausaha);
   //  $s2_hobi_desaingrafis_kemanusiaan = get_s2_populasi($db_object, 'hobi', 'Kemanusiaan (ksr, humaniora)', $x_hobi_desaingrafis_kemanusiaan, $jumlah_kemanusiaan);
   //      //S2 jawaban_d Melankolis
   //  $s2_hobi_desaingrafis_senior = get_s2_populasi($db_object, 'hobi', 'SENIOR (senior, bola, karate, taekwondo)', $x_hobi_desaingrafis_senior, $jumlah_senior);
   //      //S2 jawaban_d Koleris
   //  $s2_hobi_desaingrafis_mapala = get_s2_populasi($db_object, 'hobi', 'Pecinta Alam (MAPALA)', $x_hobi_desaingrafis_mapala, $jumlah_mapala);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_desaingrafis_persma = get_s2_populasi($db_object, 'hobi', 'Persma', $x_hobi_desaingrafis_persma, $jumlah_persma);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_desaingrafis_bahasa = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_desaingrafis_bahasa, $jumlah_bahasa);
   //     //S2 jawaban_d Koleris
   //  $s2_hobi_desaingrafis_pramuka = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_desaingrafis_pramuka, $jumlah_pramuka);
   //      if($show_perhitungan){
   //  echo "S2 Hobi Desain Grafis Wirausaha=".number_format($s2_hobi_desaingrafis_wirausaha, dec())."<br>";
   //  echo "S2 Hobi Desain Grafis Kemanusiaan=".number_format($s2_hobi_desaingrafis_kemanusiaan, dec())."<br>";
   //      echo "S2 Hobi Desain Grafis SENIOR=".number_format($s2_hobi_desaingrafis_senior, dec())."<br>";
   //      echo "S2 Hobi Desain Grafis MAPALA=".number_format($s2_hobi_desaingrafis_mapala, dec())."<br>";
   //      echo "S2 Hobi Desain Grafis Persma=".number_format($s2_hobi_desaingrafis_persma, dec())."<br>";
   //      echo "S2 Hobi Desain Grafis Bahasa=".number_format($s2_hobi_desaingrafis_bahasa, dec())."<br>";
   //      echo "S2 Hobi Desain Grafis Pramuka=".number_format($s2_hobi_desaingrafis_pramuka, dec())."<br>";
   //  echo "<br>";
   //      }
   //  //S jawaban_d Sanguin
   //  $s_hobi_menari_wirausaha = sqrt($s2_hobi_menari_wirausaha);
   //  //S jawaban_d Koleris
   //  $s_hobi_menari_kemanusiaan = sqrt($s2_hobi_menari_kemanusiaan);
   //      //S jawaban_d Melankolis
   //  $s_hobi_menari_senior = sqrt($s2_hobi_menari_senior);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_menari_mapala = sqrt($s2_hobi_menari_mapala);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_menari_persma = sqrt($s2_hobi_menari_persma);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_menari_bahasa = sqrt($s2_hobi_menari_bahasa);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_menari_pramuka = sqrt($s2_hobi_menari_pramuka);
        
   //      //s2 ^2 jawaban_d sanguin
   //      $s2_pangkat2_hobi_menari_wirausaha = pow($s2_hobi_menari_wirausaha, 2);
   //      //s2 ^2 jawaban_d koleris
   //      $s2_pangkat2_hobi_menari_kemanusiaan = pow($s2_hobi_menari_kemanusiaan, 2);
   //      //s2 ^2 jawaban_d melankolis
   //      $s2_pangkat2_hobi_menari_senior = pow($s2_hobi_menari_senior, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_menari_mapala = pow($s2_hobi_menari_mapala, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_menari_persma = pow($s2_hobi_menari_persma, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_menari_bahasa = pow($s2_hobi_menari_bahasa, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_menari_pramuka = pow($s2_hobi_menari_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Hobi Menari Wirausaha=".number_format($s_hobi_menari_wirausaha, dec())."<br>";
   //  echo "S Hobi Menari Kemanusiaan=".number_format($s_hobi_menari_kemanusiaan, dec())."<br>";
   //      echo "S Hobi Menari SENIOR=".number_format($s_hobi_menari_senior, dec())."<br>";
   //      echo "S Hobi Menari MAPALA=".number_format($s_hobi_menari_mapala, dec())."<br>";
   //      echo "S Hobi Menari Persma=".number_format($s_hobi_menari_persma, dec())."<br>";
   //      echo "S Hobi Menari Bahasa=".number_format($s_hobi_menari_bahasa, dec())."<br>";
   //      echo "S Hobi Menari Pramuka=".number_format($s_hobi_menari_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_d Sanguin
   //  $s_hobi_menyanyi_wirausaha = sqrt($s2_hobi_menyanyi_wirausaha);
   //  //S jawaban_d Koleris
   //  $s_hobi_menyanyi_kemanusiaan = sqrt($s2_hobi_menyanyi_kemanusiaan);
   //      //S jawaban_d Melankolis
   //  $s_hobi_menyanyi_senior = sqrt($s2_hobi_menyanyi_senior);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_menyanyi_mapala = sqrt($s2_hobi_menyanyi_mapala);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_menyanyi_persma = sqrt($s2_hobi_menyanyi_persma);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_menyanyi_bahasa = sqrt($s2_hobi_menyanyi_bahasa);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_menyanyi_pramuka = sqrt($s2_hobi_menyanyi_pramuka);
        
   //      //s2 ^2 jawaban_d sanguin
   //      $s2_pangkat2_hobi_menyanyi_wirausaha = pow($s2_hobi_menyanyi_wirausaha, 2);
   //      //s2 ^2 jawaban_d koleris
   //      $s2_pangkat2_hobi_menyanyi_kemanusiaan = pow($s2_hobi_menyanyi_kemanusiaan, 2);
   //      //s2 ^2 jawaban_d melankolis
   //      $s2_pangkat2_hobi_menyanyi_senior = pow($s2_hobi_menyanyi_senior, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_menyanyi_mapala = pow($s2_hobi_menyanyi_mapala, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_menyanyi_persma = pow($s2_hobi_menyanyi_persma, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_menyanyi_bahasa = pow($s2_hobi_menyanyi_bahasa, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_menyanyi_pramuka = pow($s2_hobi_menyanyi_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Hobi Menyanyi Wirausaha=".number_format($s_hobi_menyanyi_wirausaha, dec())."<br>";
   //  echo "S Hobi Menyanyi Kemanusiaan=".number_format($s_hobi_menyanyi_kemanusiaan, dec())."<br>";
   //      echo "S Hobi Menyanyi SENIOR=".number_format($s_hobi_menyanyi_senior, dec())."<br>";
   //      echo "S Hobi Menyanyi MAPALA=".number_format($s_hobi_menyanyi_mapala, dec())."<br>";
   //      echo "S Hobi Menyanyi Persma=".number_format($s_hobi_menyanyi_persma, dec())."<br>";
   //      echo "S Hobi Menyanyi Bahasa=".number_format($s_hobi_menyanyi_bahasa, dec())."<br>";
   //      echo "S Hobi Menyanyi Pramuka=".number_format($s_hobi_menyanyi_pramuka, dec())."<br>";
   //      }

   //   //S jawaban_d Sanguin
   //  $s_hobi_menulis_wirausaha = sqrt($s2_hobi_menulis_wirausaha);
   //  //S jawaban_d Koleris
   //  $s_hobi_menulis_kemanusiaan = sqrt($s2_hobi_menulis_kemanusiaan);
   //      //S jawaban_d Melankolis
   //  $s_hobi_menulis_senior = sqrt($s2_hobi_menulis_senior);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_menulis_mapala = sqrt($s2_hobi_menulis_mapala);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_menulis_persma = sqrt($s2_hobi_menulis_persma);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_menulis_bahasa = sqrt($s2_hobi_menulis_bahasa);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_menulis_pramuka = sqrt($s2_hobi_menulis_pramuka);
        
   //      //s2 ^2 jawaban_d sanguin
   //      $s2_pangkat2_hobi_menulis_wirausaha = pow($s2_hobi_menulis_wirausaha, 2);
   //      //s2 ^2 jawaban_d koleris
   //      $s2_pangkat2_hobi_menulis_kemanusiaan = pow($s2_hobi_menulis_kemanusiaan, 2);
   //      //s2 ^2 jawaban_d melankolis
   //      $s2_pangkat2_hobi_menulis_senior = pow($s2_hobi_menulis_senior, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_menulis_mapala = pow($s2_hobi_menulis_mapala, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_menulis_persma = pow($s2_hobi_menulis_persma, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_menulis_bahasa = pow($s2_hobi_menulis_bahasa, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_menulis_pramuka = pow($s2_hobi_menulis_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Hobi Menulis Wirausaha=".number_format($s_hobi_menulis_wirausaha, dec())."<br>";
   //  echo "S Hobi Menulis Kemanusiaan=".number_format($s_hobi_menulis_kemanusiaan, dec())."<br>";
   //      echo "S Hobi Menulis SENIOR=".number_format($s_hobi_menulis_senior, dec())."<br>";
   //      echo "S Hobi Menulis MAPALA=".number_format($s_hobi_menulis_mapala, dec())."<br>";
   //      echo "S Hobi Menulis Persma=".number_format($s_hobi_menulis_persma, dec())."<br>";
   //      echo "S Hobi Menulis Bahasa=".number_format($s_hobi_menulis_bahasa, dec())."<br>";
   //      echo "S Hobi Menulis Pramuka=".number_format($s_hobi_menulis_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_d Sanguin
   //  $s_hobi_menggambar_wirausaha = sqrt($s2_hobi_menggambar_wirausaha);
   //  //S jawaban_d Koleris
   //  $s_hobi_menggambar_kemanusiaan = sqrt($s2_hobi_menggambar_kemanusiaan);
   //      //S jawaban_d Melankolis
   //  $s_hobi_menggambar_senior = sqrt($s2_hobi_menggambar_senior);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_menggambar_mapala = sqrt($s2_hobi_menggambar_mapala);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_menggambar_persma = sqrt($s2_hobi_menggambar_persma);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_menggambar_bahasa = sqrt($s2_hobi_menggambar_bahasa);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_menggambar_pramuka = sqrt($s2_hobi_menggambar_pramuka);
        
   //      //s2 ^2 jawaban_d sanguin
   //      $s2_pangkat2_hobi_menggambar_wirausaha = pow($s2_hobi_menggambar_wirausaha, 2);
   //      //s2 ^2 jawaban_d koleris
   //      $s2_pangkat2_hobi_menggambar_kemanusiaan = pow($s2_hobi_menggambar_kemanusiaan, 2);
   //      //s2 ^2 jawaban_d melankolis
   //      $s2_pangkat2_hobi_menggambar_senior = pow($s2_hobi_menggambar_senior, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_menggambar_mapala = pow($s2_hobi_menggambar_mapala, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_menggambar_persma = pow($s2_hobi_menggambar_persma, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_menggambar_bahasa = pow($s2_hobi_menggambar_bahasa, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_menggambar_pramuka = pow($s2_hobi_menggambar_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Hobi Menggambar Wirausaha=".number_format($s_hobi_menggambar_wirausaha, dec())."<br>";
   //  echo "S Hobi Menggambar Kemanusiaan=".number_format($s_hobi_menggambar_kemanusiaan, dec())."<br>";
   //      echo "S Hobi Menggambar SENIOR=".number_format($s_hobi_menggambar_senior, dec())."<br>";
   //      echo "S Hobi Menggambar MAPALA=".number_format($s_hobi_menggambar_mapala, dec())."<br>";
   //      echo "S Hobi Menggambar Persma=".number_format($s_hobi_menggambar_persma, dec())."<br>";
   //      echo "S Hobi Menggambar Bahasa=".number_format($s_hobi_menggambar_bahasa, dec())."<br>";
   //      echo "S Hobi Menggambar Pramuka=".number_format($s_hobi_menggambar_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_d Sanguin
   //  $s_hobi_memasak_wirausaha = sqrt($s2_hobi_memasak_wirausaha);
   //  //S jawaban_d Koleris
   //  $s_hobi_memasak_kemanusiaan = sqrt($s2_hobi_memasak_kemanusiaan);
   //      //S jawaban_d Melankolis
   //  $s_hobi_memasak_senior = sqrt($s2_hobi_memasak_senior);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_memasak_mapala = sqrt($s2_hobi_memasak_mapala);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_memasak_persma = sqrt($s2_hobi_memasak_persma);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_memasak_bahasa = sqrt($s2_hobi_memasak_bahasa);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_memasak_pramuka = sqrt($s2_hobi_memasak_pramuka);
        
   //      //s2 ^2 jawaban_d sanguin
   //      $s2_pangkat2_hobi_memasak_wirausaha = pow($s2_hobi_memasak_wirausaha, 2);
   //      //s2 ^2 jawaban_d koleris
   //      $s2_pangkat2_hobi_memasak_kemanusiaan = pow($s2_hobi_memasak_kemanusiaan, 2);
   //      //s2 ^2 jawaban_d melankolis
   //      $s2_pangkat2_hobi_memasak_senior = pow($s2_hobi_memasak_senior, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_memasak_mapala = pow($s2_hobi_memasak_mapala, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_memasak_persma = pow($s2_hobi_memasak_persma, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_memasak_bahasa = pow($s2_hobi_memasak_bahasa, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_memasak_pramuka = pow($s2_hobi_memasak_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Hobi Memasak Wirausaha=".number_format($s_hobi_memasak_wirausaha, dec())."<br>";
   //  echo "S Hobi Memasak Kemanusiaan=".number_format($s_hobi_memasak_kemanusiaan, dec())."<br>";
   //      echo "S Hobi Memasak SENIOR=".number_format($s_hobi_memasak_senior, dec())."<br>";
   //      echo "S Hobi Memasak MAPALA=".number_format($s_hobi_memasak_mapala, dec())."<br>";
   //      echo "S Hobi Memasak Persma=".number_format($s_hobi_memasak_persma, dec())."<br>";
   //      echo "S Hobi Memasak Bahasa=".number_format($s_hobi_memasak_bahasa, dec())."<br>";
   //      echo "S Hobi Memasak Pramuka=".number_format($s_hobi_memasak_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_d Sanguin
   //  $s_hobi_fotografi_wirausaha = sqrt($s2_hobi_fotografi_wirausaha);
   //  //S jawaban_d Koleris
   //  $s_hobi_fotografi_kemanusiaan = sqrt($s2_hobi_fotografi_kemanusiaan);
   //      //S jawaban_d Melankolis
   //  $s_hobi_fotografi_senior = sqrt($s2_hobi_fotografi_senior);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_fotografi_mapala = sqrt($s2_hobi_fotografi_mapala);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_fotografi_persma = sqrt($s2_hobi_fotografi_persma);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_fotografi_bahasa = sqrt($s2_hobi_fotografi_bahasa);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_fotografi_pramuka = sqrt($s2_hobi_fotografi_pramuka);
        
   //      //s2 ^2 jawaban_d sanguin
   //      $s2_pangkat2_hobi_fotografi_wirausaha = pow($s2_hobi_fotografi_wirausaha, 2);
   //      //s2 ^2 jawaban_d koleris
   //      $s2_pangkat2_hobi_fotografi_kemanusiaan = pow($s2_hobi_fotografi_kemanusiaan, 2);
   //      //s2 ^2 jawaban_d melankolis
   //      $s2_pangkat2_hobi_fotografi_senior = pow($s2_hobi_fotografi_senior, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_fotografi_mapala = pow($s2_hobi_fotografi_mapala, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_fotografi_persma = pow($s2_hobi_fotografi_persma, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_fotografi_bahasa = pow($s2_hobi_fotografi_bahasa, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_fotografi_pramuka = pow($s2_hobi_fotografi_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Hobi Fotografi Wirausaha=".number_format($s_hobi_fotografi_wirausaha, dec())."<br>";
   //  echo "S Hobi Fotografi Kemanusiaan=".number_format($s_hobi_fotografi_kemanusiaan, dec())."<br>";
   //      echo "S Hobi Fotografi SENIOR=".number_format($s_hobi_fotografi_senior, dec())."<br>";
   //      echo "S Hobi Fotografi MAPALA=".number_format($s_hobi_fotografi_mapala, dec())."<br>";
   //      echo "S Hobi Fotografi Persma=".number_format($s_hobi_fotografi_persma, dec())."<br>";
   //      echo "S Hobi Fotografi Bahasa=".number_format($s_hobi_fotografi_bahasa, dec())."<br>";
   //      echo "S Hobi Fotografi Pramuka=".number_format($s_hobi_fotografi_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_d Sanguin
   //  $s_hobi_sepakbola_wirausaha = sqrt($s2_hobi_sepakbola_wirausaha);
   //  //S jawaban_d Koleris
   //  $s_hobi_sepakbola_kemanusiaan = sqrt($s2_hobi_sepakbola_kemanusiaan);
   //      //S jawaban_d Melankolis
   //  $s_hobi_sepakbola_senior = sqrt($s2_hobi_sepakbola_senior);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_sepakbola_mapala = sqrt($s2_hobi_sepakbola_mapala);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_sepakbola_persma = sqrt($s2_hobi_sepakbola_persma);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_sepakbola_bahasa = sqrt($s2_hobi_sepakbola_bahasa);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_sepakbola_pramuka = sqrt($s2_hobi_sepakbola_pramuka);
        
   //      //s2 ^2 jawaban_d sanguin
   //      $s2_pangkat2_hobi_sepakbola_wirausaha = pow($s2_hobi_sepakbola_wirausaha, 2);
   //      //s2 ^2 jawaban_d koleris
   //      $s2_pangkat2_hobi_sepakbola_kemanusiaan = pow($s2_hobi_sepakbola_kemanusiaan, 2);
   //      //s2 ^2 jawaban_d melankolis
   //      $s2_pangkat2_hobi_sepakbola_senior = pow($s2_hobi_sepakbola_senior, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_sepakbola_mapala = pow($s2_hobi_sepakbola_mapala, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_sepakbola_persma = pow($s2_hobi_sepakbola_persma, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_sepakbola_bahasa = pow($s2_hobi_sepakbola_bahasa, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_sepakbola_pramuka = pow($s2_hobi_sepakbola_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Hobi Sepak Bola Wirausaha=".number_format($s_hobi_sepakbola_wirausaha, dec())."<br>";
   //  echo "S Hobi Sepak Bola Kemanusiaan=".number_format($s_hobi_sepakbola_kemanusiaan, dec())."<br>";
   //      echo "S Hobi Sepak Bola SENIOR=".number_format($s_hobi_sepakbola_senior, dec())."<br>";
   //      echo "S Hobi Sepak Bola MAPALA=".number_format($s_hobi_sepakbola_mapala, dec())."<br>";
   //      echo "S Hobi Sepak Bola Persma=".number_format($s_hobi_sepakbola_persma, dec())."<br>";
   //      echo "S Hobi Sepak Bola Bahasa=".number_format($s_hobi_sepakbola_bahasa, dec())."<br>";
   //      echo "S Hobi Sepak Bola Pramuka=".number_format($s_hobi_sepakbola_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_d Sanguin
   //  $s_hobi_bulutangkis_wirausaha = sqrt($s2_hobi_bulutangkis_wirausaha);
   //  //S jawaban_d Koleris
   //  $s_hobi_bulutangkis_kemanusiaan = sqrt($s2_hobi_bulutangkis_kemanusiaan);
   //      //S jawaban_d Melankolis
   //  $s_hobi_bulutangkis_senior = sqrt($s2_hobi_bulutangkis_senior);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_bulutangkis_mapala = sqrt($s2_hobi_bulutangkis_mapala);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_bulutangkis_persma = sqrt($s2_hobi_bulutangkis_persma);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_bulutangkis_bahasa = sqrt($s2_hobi_bulutangkis_bahasa);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_bulutangkis_pramuka = sqrt($s2_hobi_bulutangkis_pramuka);
        
   //      //s2 ^2 jawaban_d sanguin
   //      $s2_pangkat2_hobi_bulutangkis_wirausaha = pow($s2_hobi_bulutangkis_wirausaha, 2);
   //      //s2 ^2 jawaban_d koleris
   //      $s2_pangkat2_hobi_bulutangkis_kemanusiaan = pow($s2_hobi_bulutangkis_kemanusiaan, 2);
   //      //s2 ^2 jawaban_d melankolis
   //      $s2_pangkat2_hobi_bulutangkis_senior = pow($s2_hobi_bulutangkis_senior, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_bulutangkis_mapala = pow($s2_hobi_bulutangkis_mapala, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_bulutangkis_persma = pow($s2_hobi_bulutangkis_persma, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_bulutangkis_bahasa = pow($s2_hobi_bulutangkis_bahasa, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_bulutangkis_pramuka = pow($s2_hobi_bulutangkis_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Hobi Bulu Tangkis Wirausaha=".number_format($s_hobi_bulutangkis_wirausaha, dec())."<br>";
   //  echo "S Hobi Bulu Tangkis Kemanusiaan=".number_format($s_hobi_bulutangkis_kemanusiaan, dec())."<br>";
   //      echo "S Hobi Bulu Tangkis SENIOR=".number_format($s_hobi_bulutangkis_senior, dec())."<br>";
   //      echo "S Hobi Bulu Tangkis MAPALA=".number_format($s_hobi_bulutangkis_mapala, dec())."<br>";
   //      echo "S Hobi Bulu Tangkis Persma=".number_format($s_hobi_bulutangkis_persma, dec())."<br>";
   //      echo "S Hobi Bulu Tangkis Bahasa=".number_format($s_hobi_bulutangkis_bahasa, dec())."<br>";
   //      echo "S Hobi Bulu Tangkis Pramuka=".number_format($s_hobi_bulutangkis_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_d Sanguin
   //  $s_hobi_basket_wirausaha = sqrt($s2_hobi_basket_wirausaha);
   //  //S jawaban_d Koleris
   //  $s_hobi_basket_kemanusiaan = sqrt($s2_hobi_basket_kemanusiaan);
   //      //S jawaban_d Melankolis
   //  $s_hobi_basket_senior = sqrt($s2_hobi_basket_senior);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_basket_mapala = sqrt($s2_hobi_basket_mapala);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_basket_persma = sqrt($s2_hobi_basket_persma);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_basket_bahasa = sqrt($s2_hobi_basket_bahasa);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_basket_pramuka = sqrt($s2_hobi_basket_pramuka);
        
   //      //s2 ^2 jawaban_d sanguin
   //      $s2_pangkat2_hobi_basket_wirausaha = pow($s2_hobi_basket_wirausaha, 2);
   //      //s2 ^2 jawaban_d koleris
   //      $s2_pangkat2_hobi_basket_kemanusiaan = pow($s2_hobi_basket_kemanusiaan, 2);
   //      //s2 ^2 jawaban_d melankolis
   //      $s2_pangkat2_hobi_basket_senior = pow($s2_hobi_basket_senior, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_basket_mapala = pow($s2_hobi_basket_mapala, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_basket_persma = pow($s2_hobi_basket_persma, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_basket_bahasa = pow($s2_hobi_basket_bahasa, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_basket_pramuka = pow($s2_hobi_basket_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Hobi Basket Wirausaha=".number_format($s_hobi_basket_wirausaha, dec())."<br>";
   //  echo "S Hobi Basket Kemanusiaan=".number_format($s_hobi_basket_kemanusiaan, dec())."<br>";
   //      echo "S Hobi Basket SENIOR=".number_format($s_hobi_basket_senior, dec())."<br>";
   //      echo "S Hobi Basket MAPALA=".number_format($s_hobi_basket_mapala, dec())."<br>";
   //      echo "S Hobi Basket Persma=".number_format($s_hobi_basket_persma, dec())."<br>";
   //      echo "S Hobi Basket Bahasa=".number_format($s_hobi_basket_bahasa, dec())."<br>";
   //      echo "S Hobi Basket Pramuka=".number_format($s_hobi_basket_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_d Sanguin
   //  $s_hobi_futsal_wirausaha = sqrt($s2_hobi_futsal_wirausaha);
   //  //S jawaban_d Koleris
   //  $s_hobi_futsal_kemanusiaan = sqrt($s2_hobi_futsal_kemanusiaan);
   //      //S jawaban_d Melankolis
   //  $s_hobi_futsal_senior = sqrt($s2_hobi_futsal_senior);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_futsal_mapala = sqrt($s2_hobi_futsal_mapala);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_futsal_persma = sqrt($s2_hobi_futsal_persma);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_futsal_bahasa = sqrt($s2_hobi_futsal_bahasa);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_futsal_pramuka = sqrt($s2_hobi_futsal_pramuka);
        
   //      //s2 ^2 jawaban_d sanguin
   //      $s2_pangkat2_hobi_futsal_wirausaha = pow($s2_hobi_futsal_wirausaha, 2);
   //      //s2 ^2 jawaban_d koleris
   //      $s2_pangkat2_hobi_futsal_kemanusiaan = pow($s2_hobi_futsal_kemanusiaan, 2);
   //      //s2 ^2 jawaban_d melankolis
   //      $s2_pangkat2_hobi_futsal_senior = pow($s2_hobi_futsal_senior, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_futsal_mapala = pow($s2_hobi_futsal_mapala, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_futsal_persma = pow($s2_hobi_futsal_persma, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_futsal_bahasa = pow($s2_hobi_futsal_bahasa, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_futsal_pramuka = pow($s2_hobi_futsal_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Hobi Futsal Wirausaha=".number_format($s_hobi_futsal_wirausaha, dec())."<br>";
   //  echo "S Hobi Futsal Kemanusiaan=".number_format($s_hobi_futsal_kemanusiaan, dec())."<br>";
   //      echo "S Hobi Futsal SENIOR=".number_format($s_hobi_futsal_senior, dec())."<br>";
   //      echo "S Hobi Futsal MAPALA=".number_format($s_hobi_futsal_mapala, dec())."<br>";
   //      echo "S Hobi Futsal Persma=".number_format($s_hobi_futsal_persma, dec())."<br>";
   //      echo "S Hobi Futsal Bahasa=".number_format($s_hobi_futsal_bahasa, dec())."<br>";
   //      echo "S Hobi Futsal Pramuka=".number_format($s_hobi_futsal_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_d Sanguin
   //  $s_hobi_volly_wirausaha = sqrt($s2_hobi_volly_wirausaha);
   //  //S jawaban_d Koleris
   //  $s_hobi_volly_kemanusiaan = sqrt($s2_hobi_volly_kemanusiaan);
   //      //S jawaban_d Melankolis
   //  $s_hobi_volly_senior = sqrt($s2_hobi_volly_senior);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_volly_mapala = sqrt($s2_hobi_volly_mapala);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_volly_persma = sqrt($s2_hobi_volly_persma);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_volly_bahasa = sqrt($s2_hobi_volly_bahasa);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_volly_pramuka = sqrt($s2_hobi_volly_pramuka);
        
   //      //s2 ^2 jawaban_d sanguin
   //      $s2_pangkat2_hobi_volly_wirausaha = pow($s2_hobi_volly_wirausaha, 2);
   //      //s2 ^2 jawaban_d koleris
   //      $s2_pangkat2_hobi_volly_kemanusiaan = pow($s2_hobi_volly_kemanusiaan, 2);
   //      //s2 ^2 jawaban_d melankolis
   //      $s2_pangkat2_hobi_volly_senior = pow($s2_hobi_volly_senior, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_volly_mapala = pow($s2_hobi_volly_mapala, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_volly_persma = pow($s2_hobi_volly_persma, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_volly_bahasa = pow($s2_hobi_volly_bahasa, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_volly_pramuka = pow($s2_hobi_volly_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Hobi Volly Wirausaha=".number_format($s_hobi_volly_wirausaha, dec())."<br>";
   //  echo "S Hobi Volly Kemanusiaan=".number_format($s_hobi_volly_kemanusiaan, dec())."<br>";
   //      echo "S Hobi Volly SENIOR=".number_format($s_hobi_volly_senior, dec())."<br>";
   //      echo "S Hobi Volly MAPALA=".number_format($s_hobi_volly_mapala, dec())."<br>";
   //      echo "S Hobi Volly Persma=".number_format($s_hobi_volly_persma, dec())."<br>";
   //      echo "S Hobi Volly Bahasa=".number_format($s_hobi_volly_bahasa, dec())."<br>";
   //      echo "S Hobi Volly Pramuka=".number_format($s_hobi_volly_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_d Sanguin
   //  $s_hobi_belajarmtk_wirausaha = sqrt($s2_hobi_belajarmtk_wirausaha);
   //  //S jawaban_d Koleris
   //  $s_hobi_belajarmtk_kemanusiaan = sqrt($s2_hobi_belajarmtk_kemanusiaan);
   //      //S jawaban_d Melankolis
   //  $s_hobi_belajarmtk_senior = sqrt($s2_hobi_belajarmtk_senior);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_belajarmtk_mapala = sqrt($s2_hobi_belajarmtk_mapala);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_belajarmtk_persma = sqrt($s2_hobi_belajarmtk_persma);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_belajarmtk_bahasa = sqrt($s2_hobi_belajarmtk_bahasa);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_belajarmtk_pramuka = sqrt($s2_hobi_belajarmtk_pramuka);
        
   //      //s2 ^2 jawaban_d sanguin
   //      $s2_pangkat2_hobi_belajarmtk_wirausaha = pow($s2_hobi_belajarmtk_wirausaha, 2);
   //      //s2 ^2 jawaban_d koleris
   //      $s2_pangkat2_hobi_belajarmtk_kemanusiaan = pow($s2_hobi_belajarmtk_kemanusiaan, 2);
   //      //s2 ^2 jawaban_d melankolis
   //      $s2_pangkat2_hobi_belajarmtk_senior = pow($s2_hobi_belajarmtk_senior, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_belajarmtk_mapala = pow($s2_hobi_belajarmtk_mapala, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_belajarmtk_persma = pow($s2_hobi_belajarmtk_persma, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_belajarmtk_bahasa = pow($s2_hobi_belajarmtk_bahasa, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_belajarmtk_pramuka = pow($s2_hobi_belajarmtk_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Hobi Belajar Matematika Wirausaha=".number_format($s_hobi_belajarmtk_wirausaha, dec())."<br>";
   //  echo "S Hobi Belajar Matematika Kemanusiaan=".number_format($s_hobi_belajarmtk_kemanusiaan, dec())."<br>";
   //      echo "S Hobi Belajar Matematika SENIOR=".number_format($s_hobi_belajarmtk_senior, dec())."<br>";
   //      echo "S Hobi Belajar Matematika MAPALA=".number_format($s_hobi_belajarmtk_mapala, dec())."<br>";
   //      echo "S Hobi Belajar Matematika Persma=".number_format($s_hobi_belajarmtk_persma, dec())."<br>";
   //      echo "S Hobi Belajar Matematika Bahasa=".number_format($s_hobi_belajarmtk_bahasa, dec())."<br>";
   //      echo "S Hobi Belajar Matematika Pramuka=".number_format($s_hobi_belajarmtk_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_d Sanguin
   //  $s_hobi_olahraga_wirausaha = sqrt($s2_hobi_olahraga_wirausaha);
   //  //S jawaban_d Koleris
   //  $s_hobi_olahraga_kemanusiaan = sqrt($s2_hobi_olahraga_kemanusiaan);
   //      //S jawaban_d Melankolis
   //  $s_hobi_olahraga_senior = sqrt($s2_hobi_olahraga_senior);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_olahraga_mapala = sqrt($s2_hobi_olahraga_mapala);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_olahraga_persma = sqrt($s2_hobi_olahraga_persma);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_olahraga_bahasa = sqrt($s2_hobi_olahraga_bahasa);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_olahraga_pramuka = sqrt($s2_hobi_olahraga_pramuka);
        
   //      //s2 ^2 jawaban_d sanguin
   //      $s2_pangkat2_hobi_olahraga_wirausaha = pow($s2_hobi_olahraga_wirausaha, 2);
   //      //s2 ^2 jawaban_d koleris
   //      $s2_pangkat2_hobi_olahraga_kemanusiaan = pow($s2_hobi_olahraga_kemanusiaan, 2);
   //      //s2 ^2 jawaban_d melankolis
   //      $s2_pangkat2_hobi_olahraga_senior = pow($s2_hobi_olahraga_senior, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_olahraga_mapala = pow($s2_hobi_olahraga_mapala, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_olahraga_persma = pow($s2_hobi_olahraga_persma, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_olahraga_bahasa = pow($s2_hobi_olahraga_bahasa, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_olahraga_pramuka = pow($s2_hobi_olahraga_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Hobi Olahraga Wirausaha=".number_format($s_hobi_olahraga_wirausaha, dec())."<br>";
   //  echo "S Hobi Olahraga Kemanusiaan=".number_format($s_hobi_olahraga_kemanusiaan, dec())."<br>";
   //      echo "S Hobi Olahraga SENIOR=".number_format($s_hobi_olahraga_senior, dec())."<br>";
   //      echo "S Hobi Olahraga MAPALA=".number_format($s_hobi_olahraga_mapala, dec())."<br>";
   //      echo "S Hobi Olahraga Persma=".number_format($s_hobi_olahraga_persma, dec())."<br>";
   //      echo "S Hobi Olahraga Bahasa=".number_format($s_hobi_olahraga_bahasa, dec())."<br>";
   //      echo "S Hobi Olahraga Pramuka=".number_format($s_hobi_olahraga_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_d Sanguin
   //  $s_hobi_membaca_wirausaha = sqrt($s2_hobi_membaca_wirausaha);
   //  //S jawaban_d Koleris
   //  $s_hobi_membaca_kemanusiaan = sqrt($s2_hobi_membaca_kemanusiaan);
   //      //S jawaban_d Melankolis
   //  $s_hobi_membaca_senior = sqrt($s2_hobi_membaca_senior);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_membaca_mapala = sqrt($s2_hobi_membaca_mapala);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_membaca_persma = sqrt($s2_hobi_membaca_persma);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_membaca_bahasa = sqrt($s2_hobi_membaca_bahasa);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_membaca_pramuka = sqrt($s2_hobi_membaca_pramuka);
        
   //      //s2 ^2 jawaban_d sanguin
   //      $s2_pangkat2_hobi_membaca_wirausaha = pow($s2_hobi_membaca_wirausaha, 2);
   //      //s2 ^2 jawaban_d koleris
   //      $s2_pangkat2_hobi_membaca_kemanusiaan = pow($s2_hobi_membaca_kemanusiaan, 2);
   //      //s2 ^2 jawaban_d melankolis
   //      $s2_pangkat2_hobi_membaca_senior = pow($s2_hobi_membaca_senior, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_membaca_mapala = pow($s2_hobi_membaca_mapala, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_membaca_persma = pow($s2_hobi_membaca_persma, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_membaca_bahasa = pow($s2_hobi_membaca_bahasa, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_membaca_pramuka = pow($s2_hobi_membaca_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Hobi Membaca Wirausaha=".number_format($s_hobi_membaca_wirausaha, dec())."<br>";
   //  echo "S Hobi Membaca Kemanusiaan=".number_format($s_hobi_membaca_kemanusiaan, dec())."<br>";
   //      echo "S Hobi Membaca SENIOR=".number_format($s_hobi_membaca_senior, dec())."<br>";
   //      echo "S Hobi Membaca MAPALA=".number_format($s_hobi_membaca_mapala, dec())."<br>";
   //      echo "S Hobi Membaca Persma=".number_format($s_hobi_membaca_persma, dec())."<br>";
   //      echo "S Hobi Membaca Bahasa=".number_format($s_hobi_membaca_bahasa, dec())."<br>";
   //      echo "S Hobi Membaca Pramuka=".number_format($s_hobi_membaca_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_d Sanguin
   //  $s_hobi_mainmusik_wirausaha = sqrt($s2_hobi_mainmusik_wirausaha);
   //  //S jawaban_d Koleris
   //  $s_hobi_mainmusik_kemanusiaan = sqrt($s2_hobi_mainmusik_kemanusiaan);
   //      //S jawaban_d Melankolis
   //  $s_hobi_mainmusik_senior = sqrt($s2_hobi_mainmusik_senior);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_mainmusik_mapala = sqrt($s2_hobi_mainmusik_mapala);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_mainmusik_persma = sqrt($s2_hobi_mainmusik_persma);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_mainmusik_bahasa = sqrt($s2_hobi_mainmusik_bahasa);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_mainmusik_pramuka = sqrt($s2_hobi_mainmusik_pramuka);
        
   //      //s2 ^2 jawaban_d sanguin
   //      $s2_pangkat2_hobi_mainmusik_wirausaha = pow($s2_hobi_mainmusik_wirausaha, 2);
   //      //s2 ^2 jawaban_d koleris
   //      $s2_pangkat2_hobi_mainmusik_kemanusiaan = pow($s2_hobi_mainmusik_kemanusiaan, 2);
   //      //s2 ^2 jawaban_d melankolis
   //      $s2_pangkat2_hobi_mainmusik_senior = pow($s2_hobi_mainmusik_senior, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_mainmusik_mapala = pow($s2_hobi_mainmusik_mapala, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_mainmusik_persma = pow($s2_hobi_mainmusik_persma, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_mainmusik_bahasa = pow($s2_hobi_mainmusik_bahasa, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_mainmusik_pramuka = pow($s2_hobi_mainmusik_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Hobi Bermain Musik Wirausaha=".number_format($s_hobi_mainmusik_wirausaha, dec())."<br>";
   //  echo "S Hobi Bermain Musik Kemanusiaan=".number_format($s_hobi_mainmusik_kemanusiaan, dec())."<br>";
   //      echo "S Hobi Bermain Musik SENIOR=".number_format($s_hobi_mainmusik_senior, dec())."<br>";
   //      echo "S Hobi Bermain Musik MAPALA=".number_format($s_hobi_mainmusik_mapala, dec())."<br>";
   //      echo "S Hobi Bermain Musik Persma=".number_format($s_hobi_mainmusik_persma, dec())."<br>";
   //      echo "S Hobi Bermain Musik Bahasa=".number_format($s_hobi_mainmusik_bahasa, dec())."<br>";
   //      echo "S Hobi Bermain Musik Pramuka=".number_format($s_hobi_mainmusik_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_d Sanguin
   //  $s_hobi_dengarmusik_wirausaha = sqrt($s2_hobi_dengarmusik_wirausaha);
   //  //S jawaban_d Koleris
   //  $s_hobi_dengarmusik_kemanusiaan = sqrt($s2_hobi_dengarmusik_kemanusiaan);
   //      //S jawaban_d Melankolis
   //  $s_hobi_dengarmusik_senior = sqrt($s2_hobi_dengarmusik_senior);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_dengarmusik_mapala = sqrt($s2_hobi_dengarmusik_mapala);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_dengarmusik_persma = sqrt($s2_hobi_dengarmusik_persma);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_dengarmusik_bahasa = sqrt($s2_hobi_dengarmusik_bahasa);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_dengarmusik_pramuka = sqrt($s2_hobi_dengarmusik_pramuka);
        
   //      //s2 ^2 jawaban_d sanguin
   //      $s2_pangkat2_hobi_dengarmusik_wirausaha = pow($s2_hobi_dengarmusik_wirausaha, 2);
   //      //s2 ^2 jawaban_d koleris
   //      $s2_pangkat2_hobi_dengarmusik_kemanusiaan = pow($s2_hobi_dengarmusik_kemanusiaan, 2);
   //      //s2 ^2 jawaban_d melankolis
   //      $s2_pangkat2_hobi_dengarmusik_senior = pow($s2_hobi_dengarmusik_senior, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_dengarmusik_mapala = pow($s2_hobi_dengarmusik_mapala, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_dengarmusik_persma = pow($s2_hobi_dengarmusik_persma, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_dengarmusik_bahasa = pow($s2_hobi_dengarmusik_bahasa, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_dengarmusik_pramuka = pow($s2_hobi_dengarmusik_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Hobi Mendengar Musik Wirausaha=".number_format($s_hobi_dengarmusik_wirausaha, dec())."<br>";
   //  echo "S Hobi Mendengar Musik Kemanusiaan=".number_format($s_hobi_dengarmusik_kemanusiaan, dec())."<br>";
   //      echo "S Hobi Mendengar Musik SENIOR=".number_format($s_hobi_dengarmusik_senior, dec())."<br>";
   //      echo "S Hobi Mendengar Musik MAPALA=".number_format($s_hobi_dengarmusik_mapala, dec())."<br>";
   //      echo "S Hobi Mendengar Musik Persma=".number_format($s_hobi_dengarmusik_persma, dec())."<br>";
   //      echo "S Hobi Mendengar Musik Bahasa=".number_format($s_hobi_dengarmusik_bahasa, dec())."<br>";
   //      echo "S Hobi Mendengar Musik Pramuka=".number_format($s_hobi_dengarmusik_pramuka, dec())."<br>";
   //      }

   //   //S jawaban_d Sanguin
   //  $s_hobi_nonton_wirausaha = sqrt($s2_hobi_nonton_wirausaha);
   //  //S jawaban_d Koleris
   //  $s_hobi_nonton_kemanusiaan = sqrt($s2_hobi_nonton_kemanusiaan);
   //      //S jawaban_d Melankolis
   //  $s_hobi_nonton_senior = sqrt($s2_hobi_nonton_senior);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_nonton_mapala = sqrt($s2_hobi_nonton_mapala);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_nonton_persma = sqrt($s2_hobi_nonton_persma);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_nonton_bahasa = sqrt($s2_hobi_nonton_bahasa);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_nonton_pramuka = sqrt($s2_hobi_nonton_pramuka);
        
   //      //s2 ^2 jawaban_d sanguin
   //      $s2_pangkat2_hobi_nonton_wirausaha = pow($s2_hobi_nonton_wirausaha, 2);
   //      //s2 ^2 jawaban_d koleris
   //      $s2_pangkat2_hobi_nonton_kemanusiaan = pow($s2_hobi_nonton_kemanusiaan, 2);
   //      //s2 ^2 jawaban_d melankolis
   //      $s2_pangkat2_hobi_nonton_senior = pow($s2_hobi_nonton_senior, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_nonton_mapala = pow($s2_hobi_nonton_mapala, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_nonton_persma = pow($s2_hobi_nonton_persma, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_nonton_bahasa = pow($s2_hobi_nonton_bahasa, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_nonton_pramuka = pow($s2_hobi_nonton_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Hobi Nonton Wirausaha=".number_format($s_hobi_nonton_wirausaha, dec())."<br>";
   //  echo "S Hobi Nonton Kemanusiaan=".number_format($s_hobi_nonton_kemanusiaan, dec())."<br>";
   //      echo "S Hobi Nonton SENIOR=".number_format($s_hobi_nonton_senior, dec())."<br>";
   //      echo "S Hobi Nonton MAPALA=".number_format($s_hobi_nonton_mapala, dec())."<br>";
   //      echo "S Hobi Nonton Persma=".number_format($s_hobi_nonton_persma, dec())."<br>";
   //      echo "S Hobi Nonton Bahasa=".number_format($s_hobi_nonton_bahasa, dec())."<br>";
   //      echo "S Hobi Nonton Pramuka=".number_format($s_hobi_nonton_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_d Sanguin
   //  $s_hobi_maingame_wirausaha = sqrt($s2_hobi_maingame_wirausaha);
   //  //S jawaban_d Koleris
   //  $s_hobi_maingame_kemanusiaan = sqrt($s2_hobi_maingame_kemanusiaan);
   //      //S jawaban_d Melankolis
   //  $s_hobi_maingame_senior = sqrt($s2_hobi_maingame_senior);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_maingame_mapala = sqrt($s2_hobi_maingame_mapala);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_maingame_persma = sqrt($s2_hobi_maingame_persma);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_maingame_bahasa = sqrt($s2_hobi_maingame_bahasa);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_maingame_pramuka = sqrt($s2_hobi_maingame_pramuka);
        
   //      //s2 ^2 jawaban_d sanguin
   //      $s2_pangkat2_hobi_maingame_wirausaha = pow($s2_hobi_maingame_wirausaha, 2);
   //      //s2 ^2 jawaban_d koleris
   //      $s2_pangkat2_hobi_maingame_kemanusiaan = pow($s2_hobi_maingame_kemanusiaan, 2);
   //      //s2 ^2 jawaban_d melankolis
   //      $s2_pangkat2_hobi_maingame_senior = pow($s2_hobi_maingame_senior, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_maingame_mapala = pow($s2_hobi_maingame_mapala, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_maingame_persma = pow($s2_hobi_maingame_persma, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_maingame_bahasa = pow($s2_hobi_maingame_bahasa, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_maingame_pramuka = pow($s2_hobi_maingame_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Hobi Main Game Wirausaha=".number_format($s_hobi_maingame_wirausaha, dec())."<br>";
   //  echo "S Hobi Main Game Kemanusiaan=".number_format($s_hobi_maingame_kemanusiaan, dec())."<br>";
   //      echo "S Hobi Main Game SENIOR=".number_format($s_hobi_maingame_senior, dec())."<br>";
   //      echo "S Hobi Main Game MAPALA=".number_format($s_hobi_maingame_mapala, dec())."<br>";
   //      echo "S Hobi Main Game Persma=".number_format($s_hobi_maingame_persma, dec())."<br>";
   //      echo "S Hobi Main Game Bahasa=".number_format($s_hobi_maingame_bahasa, dec())."<br>";
   //      echo "S Hobi Main Game Pramuka=".number_format($s_hobi_maingame_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_d Sanguin
   //  $s_hobi_jalan2_wirausaha = sqrt($s2_hobi_jalan2_wirausaha);
   //  //S jawaban_d Koleris
   //  $s_hobi_jalan2_kemanusiaan = sqrt($s2_hobi_jalan2_kemanusiaan);
   //      //S jawaban_d Melankolis
   //  $s_hobi_jalan2_senior = sqrt($s2_hobi_jalan2_senior);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_jalan2_mapala = sqrt($s2_hobi_jalan2_mapala);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_jalan2_persma = sqrt($s2_hobi_jalan2_persma);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_jalan2_bahasa = sqrt($s2_hobi_jalan2_bahasa);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_jalan2_pramuka = sqrt($s2_hobi_jalan2_pramuka);
        
   //      //s2 ^2 jawaban_d sanguin
   //      $s2_pangkat2_hobi_jalan2_wirausaha = pow($s2_hobi_jalan2_wirausaha, 2);
   //      //s2 ^2 jawaban_d koleris
   //      $s2_pangkat2_hobi_jalan2_kemanusiaan = pow($s2_hobi_jalan2_kemanusiaan, 2);
   //      //s2 ^2 jawaban_d melankolis
   //      $s2_pangkat2_hobi_jalan2_senior = pow($s2_hobi_jalan2_senior, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_jalan2_mapala = pow($s2_hobi_jalan2_mapala, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_jalan2_persma = pow($s2_hobi_jalan2_persma, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_jalan2_bahasa = pow($s2_hobi_jalan2_bahasa, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_jalan2_pramuka = pow($s2_hobi_jalan2_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Hobi Jalan-Jalan Wirausaha=".number_format($s_hobi_jalan2_wirausaha, dec())."<br>";
   //  echo "S Hobi Jalan-Jalan Kemanusiaan=".number_format($s_hobi_jalan2_kemanusiaan, dec())."<br>";
   //      echo "S Hobi Jalan-Jalan SENIOR=".number_format($s_hobi_jalan2_senior, dec())."<br>";
   //      echo "S Hobi Jalan-Jalan MAPALA=".number_format($s_hobi_jalan2_mapala, dec())."<br>";
   //      echo "S Hobi Jalan-Jalan Persma=".number_format($s_hobi_jalan2_persma, dec())."<br>";
   //      echo "S Hobi Jalan-Jalan Bahasa=".number_format($s_hobi_jalan2_bahasa, dec())."<br>";
   //      echo "S Hobi Jalan-Jalan Pramuka=".number_format($s_hobi_jalan2_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_d Sanguin
   //  $s_hobi_bhsasing_wirausaha = sqrt($s2_hobi_bhsasing_wirausaha);
   //  //S jawaban_d Koleris
   //  $s_hobi_bhsasing_kemanusiaan = sqrt($s2_hobi_bhsasing_kemanusiaan);
   //      //S jawaban_d Melankolis
   //  $s_hobi_bhsasing_senior = sqrt($s2_hobi_bhsasing_senior);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_bhsasing_mapala = sqrt($s2_hobi_bhsasing_mapala);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_bhsasing_persma = sqrt($s2_hobi_bhsasing_persma);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_bhsasing_bahasa = sqrt($s2_hobi_bhsasing_bahasa);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_bhsasing_pramuka = sqrt($s2_hobi_bhsasing_pramuka);
        
   //      //s2 ^2 jawaban_d sanguin
   //      $s2_pangkat2_hobi_bhsasing_wirausaha = pow($s2_hobi_bhsasing_wirausaha, 2);
   //      //s2 ^2 jawaban_d koleris
   //      $s2_pangkat2_hobi_bhsasing_kemanusiaan = pow($s2_hobi_bhsasing_kemanusiaan, 2);
   //      //s2 ^2 jawaban_d melankolis
   //      $s2_pangkat2_hobi_bhsasing_senior = pow($s2_hobi_bhsasing_senior, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_bhsasing_mapala = pow($s2_hobi_bhsasing_mapala, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_bhsasing_persma = pow($s2_hobi_bhsasing_persma, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_bhsasing_bahasa = pow($s2_hobi_bhsasing_bahasa, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_bhsasing_pramuka = pow($s2_hobi_bhsasing_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Hobi Belajar Bahasa Asing Baru Wirausaha=".number_format($s_hobi_bhsasing_wirausaha, dec())."<br>";
   //  echo "S Hobi Belajar Bahasa Asing Baru Kemanusiaan=".number_format($s_hobi_bhsasing_kemanusiaan, dec())."<br>";
   //      echo "S Hobi Belajar Bahasa Asing Baru SENIOR=".number_format($s_hobi_bhsasing_senior, dec())."<br>";
   //      echo "S Hobi Belajar Bahasa Asing Baru MAPALA=".number_format($s_hobi_bhsasing_mapala, dec())."<br>";
   //      echo "S Hobi Belajar Bahasa Asing Baru Persma=".number_format($s_hobi_bhsasing_persma, dec())."<br>";
   //      echo "S Hobi Belajar Bahasa Asing Baru Bahasa=".number_format($s_hobi_bhsasing_bahasa, dec())."<br>";
   //      echo "S Hobi Belajar Bahasa Asing Baru Pramuka=".number_format($s_hobi_bhsasing_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_d Sanguin
   //  $s_hobi_melukis_wirausaha = sqrt($s2_hobi_melukis_wirausaha);
   //  //S jawaban_d Koleris
   //  $s_hobi_melukis_kemanusiaan = sqrt($s2_hobi_melukis_kemanusiaan);
   //      //S jawaban_d Melankolis
   //  $s_hobi_melukis_senior = sqrt($s2_hobi_melukis_senior);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_melukis_mapala = sqrt($s2_hobi_melukis_mapala);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_melukis_persma = sqrt($s2_hobi_melukis_persma);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_melukis_bahasa = sqrt($s2_hobi_melukis_bahasa);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_melukis_pramuka = sqrt($s2_hobi_melukis_pramuka);
        
   //      //s2 ^2 jawaban_d sanguin
   //      $s2_pangkat2_hobi_melukis_wirausaha = pow($s2_hobi_melukis_wirausaha, 2);
   //      //s2 ^2 jawaban_d koleris
   //      $s2_pangkat2_hobi_melukis_kemanusiaan = pow($s2_hobi_melukis_kemanusiaan, 2);
   //      //s2 ^2 jawaban_d melankolis
   //      $s2_pangkat2_hobi_melukis_senior = pow($s2_hobi_melukis_senior, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_melukis_mapala = pow($s2_hobi_melukis_mapala, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_melukis_persma = pow($s2_hobi_melukis_persma, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_melukis_bahasa = pow($s2_hobi_melukis_bahasa, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_melukis_pramuka = pow($s2_hobi_melukis_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Hobi Melukis Wirausaha=".number_format($s_hobi_melukis_wirausaha, dec())."<br>";
   //  echo "S Hobi Melukis Kemanusiaan=".number_format($s_hobi_melukis_kemanusiaan, dec())."<br>";
   //      echo "S Hobi Melukis SENIOR=".number_format($s_hobi_melukis_senior, dec())."<br>";
   //      echo "S Hobi Melukis MAPALA=".number_format($s_hobi_melukis_mapala, dec())."<br>";
   //      echo "S Hobi Melukis Persma=".number_format($s_hobi_melukis_persma, dec())."<br>";
   //      echo "S Hobi Melukis Bahasa=".number_format($s_hobi_melukis_bahasa, dec())."<br>";
   //      echo "S Hobi Melukis Pramuka=".number_format($s_hobi_melukis_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_d Sanguin
   //  $s_hobi_berenang_wirausaha = sqrt($s2_hobi_berenang_wirausaha);
   //  //S jawaban_d Koleris
   //  $s_hobi_berenang_kemanusiaan = sqrt($s2_hobi_berenang_kemanusiaan);
   //      //S jawaban_d Melankolis
   //  $s_hobi_berenang_senior = sqrt($s2_hobi_berenang_senior);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_berenang_mapala = sqrt($s2_hobi_berenang_mapala);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_berenang_persma = sqrt($s2_hobi_berenang_persma);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_berenang_bahasa = sqrt($s2_hobi_berenang_bahasa);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_berenang_pramuka = sqrt($s2_hobi_berenang_pramuka);
        
   //      //s2 ^2 jawaban_d sanguin
   //      $s2_pangkat2_hobi_berenang_wirausaha = pow($s2_hobi_berenang_wirausaha, 2);
   //      //s2 ^2 jawaban_d koleris
   //      $s2_pangkat2_hobi_berenang_kemanusiaan = pow($s2_hobi_berenang_kemanusiaan, 2);
   //      //s2 ^2 jawaban_d melankolis
   //      $s2_pangkat2_hobi_berenang_senior = pow($s2_hobi_berenang_senior, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_berenang_mapala = pow($s2_hobi_berenang_mapala, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_berenang_persma = pow($s2_hobi_berenang_persma, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_berenang_bahasa = pow($s2_hobi_berenang_bahasa, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_berenang_pramuka = pow($s2_hobi_berenang_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Hobi Berenang Wirausaha=".number_format($s_hobi_berenang_wirausaha, dec())."<br>";
   //  echo "S Hobi Berenang Kemanusiaan=".number_format($s_hobi_berenang_kemanusiaan, dec())."<br>";
   //      echo "S Hobi Berenang SENIOR=".number_format($s_hobi_berenang_senior, dec())."<br>";
   //      echo "S Hobi Berenang MAPALA=".number_format($s_hobi_berenang_mapala, dec())."<br>";
   //      echo "S Hobi Berenang Persma=".number_format($s_hobi_berenang_persma, dec())."<br>";
   //      echo "S Hobi Berenang Bahasa=".number_format($s_hobi_berenang_bahasa, dec())."<br>";
   //      echo "S Hobi Berenang Pramuka=".number_format($s_hobi_berenang_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_d Sanguin
   //  $s_hobi_naikgunung_wirausaha = sqrt($s2_hobi_naikgunung_wirausaha);
   //  //S jawaban_d Koleris
   //  $s_hobi_naikgunung_kemanusiaan = sqrt($s2_hobi_naikgunung_kemanusiaan);
   //      //S jawaban_d Melankolis
   //  $s_hobi_naikgunung_senior = sqrt($s2_hobi_naikgunung_senior);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_naikgunung_mapala = sqrt($s2_hobi_naikgunung_mapala);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_naikgunung_persma = sqrt($s2_hobi_naikgunung_persma);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_naikgunung_bahasa = sqrt($s2_hobi_naikgunung_bahasa);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_naikgunung_pramuka = sqrt($s2_hobi_naikgunung_pramuka);
        
   //      //s2 ^2 jawaban_d sanguin
   //      $s2_pangkat2_hobi_naikgunung_wirausaha = pow($s2_hobi_naikgunung_wirausaha, 2);
   //      //s2 ^2 jawaban_d koleris
   //      $s2_pangkat2_hobi_naikgunung_kemanusiaan = pow($s2_hobi_naikgunung_kemanusiaan, 2);
   //      //s2 ^2 jawaban_d melankolis
   //      $s2_pangkat2_hobi_naikgunung_senior = pow($s2_hobi_naikgunung_senior, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_naikgunung_mapala = pow($s2_hobi_naikgunung_mapala, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_naikgunung_persma = pow($s2_hobi_naikgunung_persma, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_naikgunung_bahasa = pow($s2_hobi_naikgunung_bahasa, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_naikgunung_pramuka = pow($s2_hobi_naikgunung_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Hobi Naik Gunung Wirausaha=".number_format($s_hobi_naikgunung_wirausaha, dec())."<br>";
   //  echo "S Hobi Naik Gunung Kemanusiaan=".number_format($s_hobi_naikgunung_kemanusiaan, dec())."<br>";
   //      echo "S Hobi Naik Gunung SENIOR=".number_format($s_hobi_naikgunung_senior, dec())."<br>";
   //      echo "S Hobi Naik Gunung MAPALA=".number_format($s_hobi_naikgunung_mapala, dec())."<br>";
   //      echo "S Hobi Naik Gunung Persma=".number_format($s_hobi_naikgunung_persma, dec())."<br>";
   //      echo "S Hobi Naik Gunung Bahasa=".number_format($s_hobi_naikgunung_bahasa, dec())."<br>";
   //      echo "S Hobi Naik Gunung Pramuka=".number_format($s_hobi_naikgunung_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_d Sanguin
   //  $s_hobi_travelling_wirausaha = sqrt($s2_hobi_travelling_wirausaha);
   //  //S jawaban_d Koleris
   //  $s_hobi_travelling_kemanusiaan = sqrt($s2_hobi_travelling_kemanusiaan);
   //      //S jawaban_d Melankolis
   //  $s_hobi_travelling_senior = sqrt($s2_hobi_travelling_senior);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_travelling_mapala = sqrt($s2_hobi_travelling_mapala);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_travelling_persma = sqrt($s2_hobi_travelling_persma);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_travelling_bahasa = sqrt($s2_hobi_travelling_bahasa);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_travelling_pramuka = sqrt($s2_hobi_naikgunung_pramuka);
        
   //      //s2 ^2 jawaban_d sanguin
   //      $s2_pangkat2_hobi_travelling_wirausaha = pow($s2_hobi_travelling_wirausaha, 2);
   //      //s2 ^2 jawaban_d koleris
   //      $s2_pangkat2_hobi_travelling_kemanusiaan = pow($s2_hobi_travelling_kemanusiaan, 2);
   //      //s2 ^2 jawaban_d melankolis
   //      $s2_pangkat2_hobi_travelling_senior = pow($s2_hobi_travelling_senior, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_travelling_mapala = pow($s2_hobi_travelling_mapala, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_travelling_persma = pow($s2_hobi_travelling_persma, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_travelling_bahasa = pow($s2_hobi_travelling_bahasa, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_travelling_pramuka = pow($s2_hobi_travelling_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Hobi Travelling Wirausaha=".number_format($s_hobi_travelling_wirausaha, dec())."<br>";
   //  echo "S Hobi Travelling Kemanusiaan=".number_format($s_hobi_travelling_kemanusiaan, dec())."<br>";
   //      echo "S Hobi Travelling SENIOR=".number_format($s_hobi_travelling_senior, dec())."<br>";
   //      echo "S Hobi Travelling MAPALA=".number_format($s_hobi_travelling_mapala, dec())."<br>";
   //      echo "S Hobi Travelling Persma=".number_format($s_hobi_travelling_persma, dec())."<br>";
   //      echo "S Hobi Travelling Bahasa=".number_format($s_hobi_travelling_bahasa, dec())."<br>";
   //      echo "S Hobi Travelling Pramuka=".number_format($s_hobi_travelling_pramuka, dec())."<br>";
   //      }

   //  //S jawaban_d Sanguin
   //  $s_hobi_desaingrafis_wirausaha = sqrt($s2_hobi_desaingrafis_wirausaha);
   //  //S jawaban_d Koleris
   //  $s_hobi_desaingrafis_kemanusiaan = sqrt($s2_hobi_desaingrafis_kemanusiaan);
   //      //S jawaban_d Melankolis
   //  $s_hobi_desaingrafis_senior = sqrt($s2_hobi_desaingrafis_senior);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_desaingrafis_mapala = sqrt($s2_hobi_desaingrafis_mapala);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_desaingrafis_persma = sqrt($s2_hobi_desaingrafis_persma);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_desaingrafis_bahasa = sqrt($s2_hobi_desaingrafis_bahasa);
   //      //S jawaban_d Plegmatis
   //  $s_hobi_desaingrafis_pramuka = sqrt($s2_hobi_desaingrafis_pramuka);
        
   //      //s2 ^2 jawaban_d sanguin
   //      $s2_pangkat2_hobi_desaingrafis_wirausaha = pow($s2_hobi_desaingrafis_wirausaha, 2);
   //      //s2 ^2 jawaban_d koleris
   //      $s2_pangkat2_hobi_desaingrafis_kemanusiaan = pow($s2_hobi_desaingrafis_kemanusiaan, 2);
   //      //s2 ^2 jawaban_d melankolis
   //      $s2_pangkat2_hobi_desaingrafis_senior = pow($s2_hobi_desaingrafis_senior, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_desaingrafis_mapala = pow($s2_hobi_desaingrafis_mapala, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_desaingrafis_persma = pow($s2_hobi_desaingrafis_persma, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_desaingrafis_bahasa = pow($s2_hobi_desaingrafis_bahasa, 2);
   //      //s2 ^2 jawaban_d plegmatis
   //      $s2_pangkat2_hobi_desaingrafis_pramuka = pow($s2_hobi_desaingrafis_pramuka, 2);

   //      if($show_perhitungan){
   //  echo "S Hobi Desain Grafis Wirausaha=".number_format($s_hobi_desaingrafis_wirausaha, dec())."<br>";
   //  echo "S Hobi Desain Grafis Kemanusiaan=".number_format($s_hobi_desaingrafis_kemanusiaan, dec())."<br>";
   //      echo "S Hobi Desain Grafis SENIOR=".number_format($s_hobi_desaingrafis_senior, dec())."<br>";
   //      echo "S Hobi Desain Grafis MAPALA=".number_format($s_hobi_desaingrafis_mapala, dec())."<br>";
   //      echo "S Hobi Desain Grafis Persma=".number_format($s_hobi_desaingrafis_persma, dec())."<br>";
   //      echo "S Hobi Desain Grafis Bahasa=".number_format($s_hobi_desaingrafis_bahasa, dec())."<br>";
   //      echo "S Hobi Desain Grafis Pramuka=".number_format($s_hobi_desaingrafis_pramuka, dec())."<br>";
   //      }
        //======================================================================
        //#HITUNG PROBABILITAS DENGAN DATA UJI
        if($show_perhitungan){
        echo "<strong><h3>Probabilitas<br></h3></strong>";
        }
    // $dua_phi = (2*3.14);
    //     //#usia
    //     //Jurusan jurusan
    // $depan_jurusan_an_wirusaha = sqrt($dua_phi*$s2_jurusan_an_wirusaha);
    // $belakang_jurusan_an_wirusaha = exp( ((pow($jurusan-$x_jurusan_an_wirusaha,2)) / (2*$s2_pangkat2_jurusan_an_wirusaha)));
    // $prob_jurusan_an_wirusaha = 1/($depan_jurusan_an_wirusaha * $belakang_jurusan_an_wirusaha);
    //     //koleris
    // $depan_jurusan_an_kemanusiaan = sqrt($dua_phi*$s2_jurusan_an_kemanusiaan);
    // $belakang_jurusan_an_kemanusiaan = exp( ((pow($jurusan-$x_jurusan_an_kemanusiaan,2)) / (2*$s2_pangkat2_jurusan_an_kemanusiaan)));
    // $prob_jurusan_an_kemanusiaan = 1/($depan_jurusan_an_kemanusiaan * $belakang_jurusan_an_kemanusiaan);
    //     //melankolis
    // $depan_jurusan_an_senior = sqrt($dua_phi*$s2_jurusan_an_senior);
    // $belakang_jurusan_an_senior = exp( ((pow($jurusan-$x_jurusan_an_senior,2)) / (2*$s2_pangkat2_jurusan_an_senior)));
    // $prob_jurusan_an_senior = 1/($depan_jurusan_an_senior * $belakang_jurusan_an_senior);
    //     //koleris
    // $depan_jurusan_an_mapala = sqrt($dua_phi*$s2_jurusan_an_mapala);
    // $belakang_jurusan_an_mapala = exp( ((pow($jurusan-$x_jurusan_an_mapala,2)) / (2*$s2_pangkat2_jurusan_an_mapala)));
    // $prob_jurusan_an_mapala = 1/($depan_jurusan_an_mapala * $belakang_jurusan_an_mapala);
    //     //koleris
    // $depan_jurusan_an_persma = sqrt($dua_phi*$s2_jurusan_an_persma);
    // $belakang_jurusan_an_persma = exp( ((pow($jurusan-$x_jurusan_an_persma,2)) / (2*$s2_pangkat2_jurusan_an_persma)));
    // $prob_jurusan_an_persma = 1/($depan_jurusan_an_persma * $belakang_jurusan_an_persma);
    //     //koleris
    // $depan_jurusan_an_bahasa = sqrt($dua_phi*$s2_jurusan_an_bahasa);
    // $belakang_jurusan_an_bahasa = exp( ((pow($jurusan-$x_jurusan_an_bahasa,2)) / (2*$s2_pangkat2_jurusan_an_bahasa)));
    // $prob_jurusan_an_bahasa = 1/($depan_jurusan_an_bahasa * $belakang_jurusan_an_bahasa);
    //     //koleris
    // $depan_jurusan_an_pramuka = sqrt($dua_phi*$s2_jurusan_an_pramuka);
    // $belakang_jurusan_an_pramuka = exp( ((pow($jurusan-$x_jurusan_an_pramuka,2)) / (2*$s2_pangkat2_jurusan_an_pramuka)));
    // $prob_jurusan_an_pramuka = 1/($depan_jurusan_an_pramuka * $belakang_jurusan_an_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(jurusan|Wirausaha)=".number_format($prob_jurusan_an_wirusaha, dec())."<br>";
    // echo "P(jurusan|Kemanusiaan (ksr, humaniora))=".number_format($prob_jurusan_an_kemanusiaan, dec())."<br>";
    // echo "P(jurusan|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_jurusan_an_senior, dec())."<br>";
    // echo "P(jurusan|Pecinta Alam (MAPALA))=".number_format($prob_jurusan_an_mapala, dec())."<br>";
    // echo "P(jurusan|Persma)=".number_format($prob_jurusan_an_persma, dec())."<br>";
    // echo "P(jurusan|Bahasa)=".number_format($prob_jurusan_an_bahasa, dec())."<br>";
    // echo "P(jurusan|Pramuka))=".number_format($prob_jurusan_an_pramuka, dec())."<br>";
    //     }

    // $depan_jurusan_ak_wirusaha = sqrt($dua_phi*$s2_jurusan_ak_wirusaha);
    // $belakang_jurusan_ak_wirusaha = exp( ((pow($jurusan-$x_jurusan_ak_wirusaha,2)) / (2*$s2_pangkat2_jurusan_ak_wirusaha)));
    // $prob_jurusan_ak_wirusaha = 1/($depan_jurusan_ak_wirusaha * $belakang_jurusan_ak_wirusaha);
    //     //koleris
    // $depan_jurusan_ak_kemanusiaan = sqrt($dua_phi*$s2_jurusan_ak_kemanusiaan);
    // $belakang_jurusan_ak_kemanusiaan = exp( ((pow($jurusan-$x_jurusan_ak_kemanusiaan,2)) / (2*$s2_pangkat2_jurusan_ak_kemanusiaan)));
    // $prob_jurusan_ak_kemanusiaan = 1/($depan_jurusan_ak_kemanusiaan * $belakang_jurusan_ak_kemanusiaan);
    //     //melankolis
    // $depan_jurusan_ak_senior = sqrt($dua_phi*$s2_jurusan_ak_senior);
    // $belakang_jurusan_ak_senior = exp( ((pow($jurusan-$x_jurusan_ak_senior,2)) / (2*$s2_pangkat2_jurusan_ak_senior)));
    // $prob_jurusan_ak_senior = 1/($depan_jurusan_ak_senior * $belakang_jurusan_ak_senior);
    //     //koleris
    // $depan_jurusan_ak_mapala = sqrt($dua_phi*$s2_jurusan_ak_mapala);
    // $belakang_jurusan_ak_mapala = exp( ((pow($jurusan-$x_jurusan_ak_mapala,2)) / (2*$s2_pangkat2_jurusan_ak_mapala)));
    // $prob_jurusan_ak_mapala = 1/($depan_jurusan_ak_mapala * $belakang_jurusan_ak_mapala);
    //     //koleris
    // $depan_jurusan_ak_persma = sqrt($dua_phi*$s2_jurusan_ak_persma);
    // $belakang_jurusan_ak_persma = exp( ((pow($jurusan-$x_jurusan_ak_persma,2)) / (2*$s2_pangkat2_jurusan_ak_persma)));
    // $prob_jurusan_ak_persma = 1/($depan_jurusan_ak_persma * $belakang_jurusan_ak_persma);
    //     //koleris
    // $depan_jurusan_ak_bahasa = sqrt($dua_phi*$s2_jurusan_ak_bahasa);
    // $belakang_jurusan_ak_bahasa = exp( ((pow($jurusan-$x_jurusan_ak_bahasa,2)) / (2*$s2_pangkat2_jurusan_ak_bahasa)));
    // $prob_jurusan_ak_bahasa = 1/($depan_jurusan_ak_bahasa * $belakang_jurusan_ak_bahasa);
    //     //koleris
    // $depan_jurusan_ak_pramuka = sqrt($dua_phi*$s2_jurusan_ak_pramuka);
    // $belakang_jurusan_ak_pramuka = exp( ((pow($jurusan-$x_jurusan_ak_pramuka,2)) / (2*$s2_pangkat2_jurusan_ak_pramuka)));
    // $prob_jurusan_ak_pramuka = 1/($depan_jurusan_ak_pramuka * $belakang_jurusan_ak_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(jurusan|Wirausaha)=".number_format($prob_jurusan_ak_wirusaha, dec())."<br>";
    // echo "P(jurusan|Kemanusiaan (ksr, humaniora))=".number_format($prob_jurusan_ak_kemanusiaan, dec())."<br>";
    // echo "P(jurusan|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_jurusan_ak_senior, dec())."<br>";
    // echo "P(jurusan|Pecinta Alam (MAPALA))=".number_format($prob_jurusan_ak_mapala, dec())."<br>";
    // echo "P(jurusan|Persma)=".number_format($prob_jurusan_ak_persma, dec())."<br>";
    // echo "P(jurusan|Bahasa)=".number_format($prob_jurusan_ak_bahasa, dec())."<br>";
    // echo "P(jurusan|Pramuka))=".number_format($prob_jurusan_ak_pramuka, dec())."<br>";
    //     }

    // $depan_jurusan_elektro_wirusaha = sqrt($dua_phi*$s2_jurusan_elektro_wirusaha);
    // $belakang_jurusan_elektro_wirusaha = exp( ((pow($jurusan-$x_jurusan_elektro_wirusaha,2)) / (2*$s2_pangkat2_jurusan_elektro_wirusaha)));
    // $prob_jurusan_elektro_wirusaha = 1/($depan_jurusan_elektro_wirusaha * $belakang_jurusan_elektro_wirusaha);
    //     //koleris
    // $depan_jurusan_elektro_kemanusiaan = sqrt($dua_phi*$s2_jurusan_elektro_kemanusiaan);
    // $belakang_jurusan_elektro_kemanusiaan = exp( ((pow($jurusan-$x_jurusan_elektro_kemanusiaan,2)) / (2*$s2_pangkat2_jurusan_elektro_kemanusiaan)));
    // $prob_jurusan_elektro_kemanusiaan = 1/($depan_jurusan_elektro_kemanusiaan * $belakang_jurusan_elektro_kemanusiaan);
    //     //melankolis
    // $depan_jurusan_elektro_senior = sqrt($dua_phi*$s2_jurusan_elektro_senior);
    // $belakang_jurusan_elektro_senior = exp( ((pow($jurusan-$x_jurusan_elektro_senior,2)) / (2*$s2_pangkat2_jurusan_elektro_senior)));
    // $prob_jurusan_elektro_senior = 1/($depan_jurusan_elektro_senior * $belakang_jurusan_elektro_senior);
    //     //koleris
    // $depan_jurusan_elektro_mapala = sqrt($dua_phi*$s2_jurusan_elektro_mapala);
    // $belakang_jurusan_elektro_mapala = exp( ((pow($jurusan-$x_jurusan_elektro_mapala,2)) / (2*$s2_pangkat2_jurusan_elektro_mapala)));
    // $prob_jurusan_elektro_mapala = 1/($depan_jurusan_elektro_mapala * $belakang_jurusan_elektro_mapala);
    //     //koleris
    // $depan_jurusan_elektro_persma = sqrt($dua_phi*$s2_jurusan_elektro_persma);
    // $belakang_jurusan_elektro_persma = exp( ((pow($jurusan-$x_jurusan_elektro_persma,2)) / (2*$s2_pangkat2_jurusan_elektro_persma)));
    // $prob_jurusan_elektro_persma = 1/($depan_jurusan_elektro_persma * $belakang_jurusan_elektro_persma);
    //     //koleris
    // $depan_jurusan_elektro_bahasa = sqrt($dua_phi*$s2_jurusan_elektro_bahasa);
    // $belakang_jurusan_elektro_bahasa = exp( ((pow($jurusan-$x_jurusan_elektro_bahasa,2)) / (2*$s2_pangkat2_jurusan_elektro_bahasa)));
    // $prob_jurusan_elektro_bahasa = 1/($depan_jurusan_elektro_bahasa * $belakang_jurusan_elektro_bahasa);
    //     //koleris
    // $depan_jurusan_elektro_pramuka = sqrt($dua_phi*$s2_jurusan_elektro_pramuka);
    // $belakang_jurusan_elektro_pramuka = exp( ((pow($jurusan-$x_jurusan_elektro_pramuka,2)) / (2*$s2_pangkat2_jurusan_elektro_pramuka)));
    // $prob_jurusan_elektro_pramuka = 1/($depan_jurusan_elektro_pramuka * $belakang_jurusan_elektro_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(jurusan|Wirausaha)=".number_format($prob_jurusan_elektro_wirusaha, dec())."<br>";
    // echo "P(jurusan|Kemanusiaan (ksr, humaniora))=".number_format($prob_jurusan_elektro_kemanusiaan, dec())."<br>";
    // echo "P(jurusan|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_jurusan_elektro_senior, dec())."<br>";
    // echo "P(jurusan|Pecinta Alam (MAPALA))=".number_format($prob_jurusan_elektro_mapala, dec())."<br>";
    // echo "P(jurusan|Persma)=".number_format($prob_jurusan_elektro_persma, dec())."<br>";
    // echo "P(jurusan|Bahasa)=".number_format($prob_jurusan_elektro_bahasa, dec())."<br>";
    // echo "P(jurusan|Pramuka))=".number_format($prob_jurusan_elektro_pramuka, dec())."<br>";
    //     }

    // $depan_jurusan_kimia_wirusaha = sqrt($dua_phi*$s2_jurusan_kimia_wirusaha);
    // $belakang_jurusan_kimia_wirusaha = exp( ((pow($jurusan-$x_jurusan_kimia_wirusaha,2)) / (2*$s2_pangkat2_jurusan_kimia_wirusaha)));
    // $prob_jurusan_kimia_wirusaha = 1/($depan_jurusan_kimia_wirusaha * $belakang_jurusan_kimia_wirusaha);
    //     //koleris
    // $depan_jurusan_kimia_kemanusiaan = sqrt($dua_phi*$s2_jurusan_kimia_kemanusiaan);
    // $belakang_jurusan_kimia_kemanusiaan = exp( ((pow($jurusan-$x_jurusan_kimia_kemanusiaan,2)) / (2*$s2_pangkat2_jurusan_kimia_kemanusiaan)));
    // $prob_jurusan_kimia_kemanusiaan = 1/($depan_jurusan_kimia_kemanusiaan * $belakang_jurusan_kimia_kemanusiaan);
    //     //melankolis
    // $depan_jurusan_kimia_senior = sqrt($dua_phi*$s2_jurusan_kimia_senior);
    // $belakang_jurusan_kimia_senior = exp( ((pow($jurusan-$x_jurusan_kimia_senior,2)) / (2*$s2_pangkat2_jurusan_kimia_senior)));
    // $prob_jurusan_kimia_senior = 1/($depan_jurusan_kimia_senior * $belakang_jurusan_kimia_senior);
    //     //koleris
    // $depan_jurusan_kimia_mapala = sqrt($dua_phi*$s2_jurusan_kimia_mapala);
    // $belakang_jurusan_kimia_mapala = exp( ((pow($jurusan-$x_jurusan_kimia_mapala,2)) / (2*$s2_pangkat2_jurusan_kimia_mapala)));
    // $prob_jurusan_kimia_mapala = 1/($depan_jurusan_kimia_mapala * $belakang_jurusan_kimia_mapala);
    //     //koleris
    // $depan_jurusan_kimia_persma = sqrt($dua_phi*$s2_jurusan_kimia_persma);
    // $belakang_jurusan_kimia_persma = exp( ((pow($jurusan-$x_jurusan_kimia_persma,2)) / (2*$s2_pangkat2_jurusan_kimia_persma)));
    // $prob_jurusan_kimia_persma = 1/($depan_jurusan_kimia_persma * $belakang_jurusan_kimia_persma);
    //     //koleris
    // $depan_jurusan_kimia_bahasa = sqrt($dua_phi*$s2_jurusan_kimia_bahasa);
    // $belakang_jurusan_kimia_bahasa = exp( ((pow($jurusan-$x_jurusan_kimia_bahasa,2)) / (2*$s2_pangkat2_jurusan_kimia_bahasa)));
    // $prob_jurusan_kimia_bahasa = 1/($depan_jurusan_kimia_bahasa * $belakang_jurusan_kimia_bahasa);
    //     //koleris
    // $depan_jurusan_kimia_pramuka = sqrt($dua_phi*$s2_jurusan_kimia_pramuka);
    // $belakang_jurusan_kimia_pramuka = exp( ((pow($jurusan-$x_jurusan_kimia_pramuka,2)) / (2*$s2_pangkat2_jurusan_kimia_pramuka)));
    // $prob_jurusan_kimia_pramuka = 1/($depan_jurusan_kimia_pramuka * $belakang_jurusan_kimia_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(jurusan|Wirausaha)=".number_format($prob_jurusan_kimia_wirusaha, dec())."<br>";
    // echo "P(jurusan|Kemanusiaan (ksr, humaniora))=".number_format($prob_jurusan_kimia_kemanusiaan, dec())."<br>";
    // echo "P(jurusan|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_jurusan_kimia_senior, dec())."<br>";
    // echo "P(jurusan|Pecinta Alam (MAPALA))=".number_format($prob_jurusan_kimia_mapala, dec())."<br>";
    // echo "P(jurusan|Persma)=".number_format($prob_jurusan_kimia_persma, dec())."<br>";
    // echo "P(jurusan|Bahasa)=".number_format($prob_jurusan_kimia_bahasa, dec())."<br>";
    // echo "P(jurusan|Pramuka))=".number_format($prob_jurusan_kimia_pramuka, dec())."<br>";
    //     }

    // $depan_jurusan_mesin_wirusaha = sqrt($dua_phi*$s2_jurusan_mesin_wirusaha);
    // $belakang_jurusan_mesin_wirusaha = exp( ((pow($jurusan-$x_jurusan_mesin_wirusaha,2)) / (2*$s2_pangkat2_jurusan_mesin_wirusaha)));
    // $prob_jurusan_mesin_wirusaha = 1/($depan_jurusan_mesin_wirusaha * $belakang_jurusan_mesin_wirusaha);
    //     //koleris
    // $depan_jurusan_mesin_kemanusiaan = sqrt($dua_phi*$s2_jurusan_mesin_kemanusiaan);
    // $belakang_jurusan_mesin_kemanusiaan = exp( ((pow($jurusan-$x_jurusan_mesin_kemanusiaan,2)) / (2*$s2_pangkat2_jurusan_kimia_kemanusiaan)));
    // $prob_jurusan_mesin_kemanusiaan = 1/($depan_jurusan_mesin_kemanusiaan * $belakang_jurusan_mesin_kemanusiaan);
    //     //melankolis
    // $depan_jurusan_mesin_senior = sqrt($dua_phi*$s2_jurusan_mesin_senior);
    // $belakang_jurusan_mesin_senior = exp( ((pow($jurusan-$x_jurusan_mesin_senior,2)) / (2*$s2_pangkat2_jurusan_mesin_senior)));
    // $prob_jurusan_mesin_senior = 1/($depan_jurusan_mesin_senior * $belakang_jurusan_mesin_senior);
    //     //koleris
    // $depan_jurusan_mesin_mapala = sqrt($dua_phi*$s2_jurusan_mesin_mapala);
    // $belakang_jurusan_mesin_mapala = exp( ((pow($jurusan-$x_jurusan_mesin_mapala,2)) / (2*$s2_pangkat2_jurusan_mesin_mapala)));
    // $prob_jurusan_mesin_mapala = 1/($depan_jurusan_mesin_mapala * $belakang_jurusan_mesin_mapala);
    //     //koleris
    // $depan_jurusan_mesin_persma = sqrt($dua_phi*$s2_jurusan_mesin_persma);
    // $belakang_jurusan_mesin_persma = exp( ((pow($jurusan-$x_jurusan_mesin_persma,2)) / (2*$s2_pangkat2_jurusan_mesin_persma)));
    // $prob_jurusan_mesin_persma = 1/($depan_jurusan_mesin_persma * $belakang_jurusan_mesin_persma);
    //     //koleris
    // $depan_jurusan_mesin_bahasa = sqrt($dua_phi*$s2_jurusan_mesin_bahasa);
    // $belakang_jurusan_mesin_bahasa = exp( ((pow($jurusan-$x_jurusan_mesin_bahasa,2)) / (2*$s2_pangkat2_jurusan_mesin_bahasa)));
    // $prob_jurusan_mesin_bahasa = 1/($depan_jurusan_mesin_bahasa * $belakang_jurusan_mesin_bahasa);
    //     //koleris
    // $depan_jurusan_mesin_pramuka = sqrt($dua_phi*$s2_jurusan_mesin_pramuka);
    // $belakang_jurusan_mesin_pramuka = exp( ((pow($jurusan-$x_jurusan_mesin_pramuka,2)) / (2*$s2_pangkat2_jurusan_mesin_pramuka)));
    // $prob_jurusan_mesin_pramuka = 1/($depan_jurusan_mesin_pramuka * $belakang_jurusan_mesin_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(jurusan|Wirausaha)=".number_format($prob_jurusan_mesin_wirusaha, dec())."<br>";
    // echo "P(jurusan|Kemanusiaan (ksr, humaniora))=".number_format($prob_jurusan_mesin_kemanusiaan, dec())."<br>";
    // echo "P(jurusan|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_jurusan_mesin_senior, dec())."<br>";
    // echo "P(jurusan|Pecinta Alam (MAPALA))=".number_format($prob_jurusan_mesin_mapala, dec())."<br>";
    // echo "P(jurusan|Persma)=".number_format($prob_jurusan_mesin_persma, dec())."<br>";
    // echo "P(jurusan|Bahasa)=".number_format($prob_jurusan_mesin_bahasa, dec())."<br>";
    // echo "P(jurusan|Pramuka))=".number_format($prob_jurusan_mesin_pramuka, dec())."<br>";
    //     }

    // $depan_jurusan_sipil_wirusaha = sqrt($dua_phi*$s2_jurusan_sipil_wirusaha);
    // $belakang_jurusan_sipil_wirusaha = exp( ((pow($jurusan-$x_jurusan_sipil_wirusaha,2)) / (2*$s2_pangkat2_jurusan_sipil_wirusaha)));
    // $prob_jurusan_sipil_wirusaha = 1/($depan_jurusan_sipil_wirusaha * $belakang_jurusan_sipil_wirusaha);
    //     //koleris
    // $depan_jurusan_sipil_kemanusiaan = sqrt($dua_phi*$s2_jurusan_sipil_kemanusiaan);
    // $belakang_jurusan_sipil_kemanusiaan = exp( ((pow($jurusan-$x_jurusan_sipil_kemanusiaan,2)) / (2*$s2_pangkat2_jurusan_sipil_kemanusiaan)));
    // $prob_jurusan_sipil_kemanusiaan = 1/($depan_jurusan_sipil_kemanusiaan * $belakang_jurusan_sipil_kemanusiaan);
    //     //melankolis
    // $depan_jurusan_sipil_senior = sqrt($dua_phi*$s2_jurusan_sipil_senior);
    // $belakang_jurusan_sipil_senior = exp( ((pow($jurusan-$x_jurusan_sipil_senior,2)) / (2*$s2_pangkat2_jurusan_sipil_senior)));
    // $prob_jurusan_mesin_senior = 1/($depan_jurusan_sipil_senior * $belakang_jurusan_sipil_senior);
    //     //koleris
    // $depan_jurusan_sipil_mapala = sqrt($dua_phi*$s2_jurusan_sipil_mapala);
    // $belakang_jurusan_sipil_mapala = exp( ((pow($jurusan-$x_jurusan_sipil_mapala,2)) / (2*$s2_pangkat2_jurusan_sipil_mapala)));
    // $prob_jurusan_sipil_mapala = 1/($depan_jurusan_sipil_mapala * $belakang_jurusan_sipil_mapala);
    //     //koleris
    // $depan_jurusan_sipil_persma = sqrt($dua_phi*$s2_jurusan_sipil_persma);
    // $belakang_jurusan_sipil_persma = exp( ((pow($jurusan-$x_jurusan_sipil_persma,2)) / (2*$s2_pangkat2_jurusan_sipil_persma)));
    // $prob_jurusan_sipil_persma = 1/($depan_jurusan_sipil_persma * $belakang_jurusan_sipil_persma);
    //     //koleris
    // $depan_jurusan_sipil_bahasa = sqrt($dua_phi*$s2_jurusan_sipil_bahasa);
    // $belakang_jurusan_sipil_bahasa = exp( ((pow($jurusan-$x_jurusan_sipil_bahasa,2)) / (2*$s2_pangkat2_jurusan_sipil_bahasa)));
    // $prob_jurusan_sipil_bahasa = 1/($depan_jurusan_sipil_bahasa * $belakang_jurusan_sipil_bahasa);
    //     //koleris
    // $depan_jurusan_sipil_pramuka = sqrt($dua_phi*$s2_jurusan_sipil_pramuka);
    // $belakang_jurusan_sipil_pramuka = exp( ((pow($jurusan-$x_jurusan_sipil_pramuka,2)) / (2*$s2_pangkat2_jurusan_sipil_pramuka)));
    // $prob_jurusan_sipil_pramuka = 1/($depan_jurusan_sipil_pramuka * $belakang_jurusan_sipil_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(jurusan|Wirausaha)=".number_format($prob_jurusan_sipil_wirusaha, dec())."<br>";
    // echo "P(jurusan|Kemanusiaan (ksr, humaniora))=".number_format($prob_jurusan_sipil_kemanusiaan, dec())."<br>";
    // echo "P(jurusan|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_jurusan_sipil_senior, dec())."<br>";
    // echo "P(jurusan|Pecinta Alam (MAPALA))=".number_format($prob_jurusan_sipil_mapala, dec())."<br>";
    // echo "P(jurusan|Persma)=".number_format($prob_jurusan_sipil_persma, dec())."<br>";
    // echo "P(jurusan|Bahasa)=".number_format($prob_jurusan_sipil_bahasa, dec())."<br>";
    // echo "P(jurusan|Pramuka))=".number_format($prob_jurusan_sipil_pramuka, dec())."<br>";
    //     }

    // //Prodi prodi
    // $depan_prodi_ab3_wirausaha = sqrt($dua_phi*$s2_prodi_ab3_wirausaha);
    // $belakang_prodi_ab3_wirausaha = exp( ((pow($jurusan-$x_prodi_ab3_wirausaha,2)) / (2*$s2_pangkat2_prodi_ab3_wirausaha)));
    // $prob_prodi_ab3_wirausaha = 1/($depan_prodi_ab3_wirausaha * $belakang_prodi_ab3_wirausaha);
    //     //koleris
    // $depan_prodi_ab3_kemanusiaan = sqrt($dua_phi*$s2_prodi_ab3_kemanusiaan);
    // $belakang_prodi_ab3_kemanusiaan = exp( ((pow($jurusan-$x_prodi_ab3_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_ab3_kemanusiaan)));
    // $prob_prodi_ab3_kemanusiaan = 1/($depan_prodi_ab3_kemanusiaan * $belakang_prodi_ab3_kemanusiaan);
    //     //melankolis
    // $depan_prodi_ab3_senior = sqrt($dua_phi*$s2_prodi_ab3_senior);
    // $belakang_prodi_ab3_senior = exp( ((pow($jurusan-$x_prodi_ab3_senior,2)) / (2*$s2_pangkat2_prodi_ab3_senior)));
    // $prob_prodi_ab3_senior = 1/($depan_prodi_ab3_senior * $belakang_prodi_ab3_senior);
    //     //koleris
    // $depan_prodi_ab3_mapala = sqrt($dua_phi*$s2_prodi_ab3_mapala);
    // $belakang_prodi_ab3_mapala = exp( ((pow($jurusan-$x_prodi_ab3_mapala,2)) / (2*$s2_pangkat2_prodi_ab3_mapala)));
    // $prob_prodi_ab3_mapala = 1/($depan_prodi_ab3_mapala * $belakang_prodi_ab3_mapala);
    //     //koleris
    // $depan_prodi_ab3_persma = sqrt($dua_phi*$s2_prodi_ab3_persma);
    // $belakang_prodi_ab3_persma = exp( ((pow($jurusan-$x_prodi_ab3_persma,2)) / (2*$s2_pangkat2_prodi_ab3_persma)));
    // $prob_prodi_ab3_persma = 1/($depan_prodi_ab3_persma * $belakang_prodi_ab3_persma);
    //     //koleris
    // $depan_prodi_ab3_bahasa = sqrt($dua_phi*$s2_prodi_ab3_bahasa);
    // $belakang_prodi_ab3_bahasa = exp( ((pow($jurusan-$x_prodi_ab3_bahasa,2)) / (2*$s2_pangkat2_prodi_ab3_bahasa)));
    // $prob_prodi_ab3_bahasa = 1/($depan_prodi_ab3_bahasa * $belakang_prodi_ab3_bahasa);
    //     //koleris
    // $depan_prodi_ab3_pramuka = sqrt($dua_phi*$s2_prodi_ab3_pramuka);
    // $belakang_prodi_ab3_pramuka = exp( ((pow($jurusan-$x_prodi_ab3_pramuka,2)) / (2*$s2_pangkat2_prodi_ab3_pramuka)));
    // $prob_prodi_ab3_pramuka = 1/($depan_prodi_ab3_pramuka * $belakang_prodi_ab3_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_ab3_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_ab3_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_ab3_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_ab3_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_ab3_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_ab3_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_ab3_pramuka, dec())."<br>";
    //     }

    // //Prodi prodi
    // $depan_prodi_ak3_wirausaha = sqrt($dua_phi*$s2_prodi_ak3_wirausaha);
    // $belakang_prodi_ak3_wirausaha = exp( ((pow($jurusan-$x_prodi_ak3_wirausaha,2)) / (2*$s2_pangkat2_prodi_ak3_wirausaha)));
    // $prob_prodi_ak3_wirausaha = 1/($depan_prodi_ak3_wirausaha * $belakang_prodi_ak3_wirausaha);
    //     //koleris
    // $depan_prodi_ak3_kemanusiaan = sqrt($dua_phi*$s2_prodi_ak3_kemanusiaan);
    // $belakang_prodi_ak3_kemanusiaan = exp( ((pow($jurusan-$x_prodi_ak3_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_ak3_kemanusiaan)));
    // $prob_prodi_ak3_kemanusiaan = 1/($depan_prodi_ak3_kemanusiaan * $belakang_prodi_ak3_kemanusiaan);
    //     //melankolis
    // $depan_prodi_ak3_senior = sqrt($dua_phi*$s2_prodi_ak3_senior);
    // $belakang_prodi_ak3_senior = exp( ((pow($jurusan-$x_prodi_ak3_senior,2)) / (2*$s2_pangkat2_prodi_ak3_senior)));
    // $prob_prodi_ak3_senior = 1/($depan_prodi_ak3_senior * $belakang_prodi_ak3_senior);
    //     //koleris
    // $depan_prodi_ak3_mapala = sqrt($dua_phi*$s2_prodi_ak3_mapala);
    // $belakang_prodi_ak3_mapala = exp( ((pow($jurusan-$x_prodi_ak3_mapala,2)) / (2*$s2_pangkat2_prodi_ak3_mapala)));
    // $prob_prodi_ak3_mapala = 1/($depan_prodi_ak3_mapala * $belakang_prodi_ak3_mapala);
    //     //koleris
    // $depan_prodi_ak3_persma = sqrt($dua_phi*$s2_prodi_ak3_persma);
    // $belakang_prodi_ak3_persma = exp( ((pow($jurusan-$x_prodi_ak3_persma,2)) / (2*$s2_pangkat2_prodi_ak3_persma)));
    // $prob_prodi_ak3_persma = 1/($depan_prodi_ak3_persma * $belakang_prodi_ak3_persma);
    //     //koleris
    // $depan_prodi_ak3_bahasa = sqrt($dua_phi*$s2_prodi_ak3_bahasa);
    // $belakang_prodi_ak3_bahasa = exp( ((pow($jurusan-$x_prodi_ak3_bahasa,2)) / (2*$s2_pangkat2_prodi_ak3_bahasa)));
    // $prob_prodi_ak3_bahasa = 1/($depan_prodi_ak3_bahasa * $belakang_prodi_ak3_bahasa);
    //     //koleris
    // $depan_prodi_ak3_pramuka = sqrt($dua_phi*$s2_prodi_ak3_pramuka);
    // $belakang_prodi_ak3_pramuka = exp( ((pow($jurusan-$x_prodi_ak3_pramuka,2)) / (2*$s2_pangkat2_prodi_ak3_pramuka)));
    // $prob_prodi_ak3_pramuka = 1/($depan_prodi_ak3_pramuka * $belakang_prodi_ak3_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_ak3_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_ak3_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_ak3_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_ak3_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_ak3_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_ak3_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_ak3_pramuka, dec())."<br>";
    //     }

    // //Prodi prodi
    // $depan_prodi_ank_wirausaha = sqrt($dua_phi*$s2_prodi_ank_wirausaha);
    // $belakang_prodi_ank_wirausaha = exp( ((pow($jurusan-$x_prodi_ank_wirausaha,2)) / (2*$s2_pangkat2_prodi_ank_wirausaha)));
    // $prob_prodi_ank_wirausaha = 1/($depan_prodi_ank_wirausaha * $belakang_prodi_ank_wirausaha);
    //     //koleris
    // $depan_prodi_ank_kemanusiaan = sqrt($dua_phi*$s2_prodi_ank_kemanusiaan);
    // $belakang_prodi_ank_kemanusiaan = exp( ((pow($jurusan-$x_prodi_ank_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_ank_kemanusiaan)));
    // $prob_prodi_ank_kemanusiaan = 1/($depan_prodi_ank_kemanusiaan * $belakang_prodi_ank_kemanusiaan);
    //     //melankolis
    // $depan_prodi_ank_senior = sqrt($dua_phi*$s2_prodi_ank_senior);
    // $belakang_prodi_ank_senior = exp( ((pow($jurusan-$x_prodi_ank_senior,2)) / (2*$s2_pangkat2_prodi_ank_senior)));
    // $prob_prodi_ank_senior = 1/($depan_prodi_ank_senior * $belakang_prodi_ank_senior);
    //     //koleris
    // $depan_prodi_ank_mapala = sqrt($dua_phi*$s2_prodi_ank_mapala);
    // $belakang_prodi_ank_mapala = exp( ((pow($jurusan-$x_prodi_ank_mapala,2)) / (2*$s2_pangkat2_prodi_ank_mapala)));
    // $prob_prodi_ank_mapala = 1/($depan_prodi_ank_mapala * $belakang_prodi_ank_mapala);
    //     //koleris
    // $depan_prodi_ank_persma = sqrt($dua_phi*$s2_prodi_ank_persma);
    // $belakang_prodi_ank_persma = exp( ((pow($jurusan-$x_prodi_ank_persma,2)) / (2*$s2_pangkat2_prodi_ank_persma)));
    // $prob_prodi_ank_persma = 1/($depan_prodi_ank_persma * $belakang_prodi_ank_persma);
    //     //koleris
    // $depan_prodi_ank_bahasa = sqrt($dua_phi*$s2_prodi_ank_bahasa);
    // $belakang_prodi_ank_bahasa = exp( ((pow($jurusan-$x_prodi_ank_bahasa,2)) / (2*$s2_pangkat2_prodi_ank_bahasa)));
    // $prob_prodi_ank_bahasa = 1/($depan_prodi_ank_bahasa * $belakang_prodi_ank_bahasa);
    //     //koleris
    // $depan_prodi_ank_pramuka = sqrt($dua_phi*$s2_prodi_ank_pramuka);
    // $belakang_prodi_ank_pramuka = exp( ((pow($jurusan-$x_prodi_ank_pramuka,2)) / (2*$s2_pangkat2_prodi_ank_pramuka)));
    // $prob_prodi_ank_pramuka = 1/($depan_prodi_ank_pramuka * $belakang_prodi_ank_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_ank_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_ank_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_ank_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_ank_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_ank_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_ank_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_ank_pramuka, dec())."<br>";
    //     }

    // //Prodi prodi
    // $depan_prodi_te_wirausaha = sqrt($dua_phi*$s2_prodi_te_wirausaha);
    // $belakang_prodi_te_wirausaha = exp( ((pow($jurusan-$x_prodi_te_wirausaha,2)) / (2*$s2_pangkat2_prodi_te_wirausaha)));
    // $prob_prodi_te_wirausaha = 1/($depan_prodi_te_wirausaha * $belakang_prodi_te_wirausaha);
    //     //koleris
    // $depan_prodi_te_kemanusiaan = sqrt($dua_phi*$s2_prodi_te_kemanusiaan);
    // $belakang_prodi_te_kemanusiaan = exp( ((pow($jurusan-$x_prodi_te_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_te_kemanusiaan)));
    // $prob_prodi_te_kemanusiaan = 1/($depan_prodi_te_kemanusiaan * $belakang_prodi_te_kemanusiaan);
    //     //melankolis
    // $depan_prodi_te_senior = sqrt($dua_phi*$s2_prodi_te_senior);
    // $belakang_prodi_te_senior = exp( ((pow($jurusan-$x_prodi_te_senior,2)) / (2*$s2_pangkat2_prodi_te_senior)));
    // $prob_prodi_te_senior = 1/($depan_prodi_te_senior * $belakang_prodi_te_senior);
    //     //koleris
    // $depan_prodi_te_mapala = sqrt($dua_phi*$s2_prodi_te_mapala);
    // $belakang_prodi_te_mapala = exp( ((pow($jurusan-$x_prodi_te_mapala,2)) / (2*$s2_pangkat2_prodi_te_mapala)));
    // $prob_prodi_te_mapala = 1/($depan_prodi_te_mapala * $belakang_prodi_te_mapala);
    //     //koleris
    // $depan_prodi_te_persma = sqrt($dua_phi*$s2_prodi_te_persma);
    // $belakang_prodi_te_persma = exp( ((pow($jurusan-$x_prodi_te_persma,2)) / (2*$s2_pangkat2_prodi_te_persma)));
    // $prob_prodi_te_persma = 1/($depan_prodi_te_persma * $belakang_prodi_te_persma);
    //     //koleris
    // $depan_prodi_te_bahasa = sqrt($dua_phi*$s2_prodi_te_bahasa);
    // $belakang_prodi_te_bahasa = exp( ((pow($jurusan-$x_prodi_te_bahasa,2)) / (2*$s2_pangkat2_prodi_te_bahasa)));
    // $prob_prodi_te_bahasa = 1/($depan_prodi_te_bahasa * $belakang_prodi_te_bahasa);
    //     //koleris
    // $depan_prodi_te_pramuka = sqrt($dua_phi*$s2_prodi_te_pramuka);
    // $belakang_prodi_te_pramuka = exp( ((pow($jurusan-$x_prodi_te_pramuka,2)) / (2*$s2_pangkat2_prodi_te_pramuka)));
    // $prob_prodi_te_pramuka = 1/($depan_prodi_te_pramuka * $belakang_prodi_te_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_te_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_te_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_te_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_te_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_te_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_te_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_te_pramuka, dec())."<br>";
    //     }

    // //Prodi prodi
    // $depan_prodi_tk3_wirausaha = sqrt($dua_phi*$s2_prodi_tk3_wirausaha);
    // $belakang_prodi_tk3_wirausaha = exp( ((pow($jurusan-$x_prodi_tk3_wirausaha,2)) / (2*$s2_pangkat2_prodi_tk3_wirausaha)));
    // $prob_prodi_tk3_wirausaha = 1/($depan_prodi_tk3_wirausaha * $belakang_prodi_tk3_wirausaha);
    //     //koleris
    // $depan_prodi_tk3_kemanusiaan = sqrt($dua_phi*$s2_prodi_tk3_kemanusiaan);
    // $belakang_prodi_tk3_kemanusiaan = exp( ((pow($jurusan-$x_prodi_tk3_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_tk3_kemanusiaan)));
    // $prob_prodi_tk3_kemanusiaan = 1/($depan_prodi_tk3_kemanusiaan * $belakang_prodi_tk3_kemanusiaan);
    //     //melankolis
    // $depan_prodi_tk3_senior = sqrt($dua_phi*$s2_prodi_tk3_senior);
    // $belakang_prodi_tk3_senior = exp( ((pow($jurusan-$x_prodi_tk3_senior,2)) / (2*$s2_pangkat2_prodi_tk3_senior)));
    // $prob_prodi_tk3_senior = 1/($depan_prodi_tk3_senior * $belakang_prodi_tk3_senior);
    //     //koleris
    // $depan_prodi_tk3_mapala = sqrt($dua_phi*$s2_prodi_tk3_mapala);
    // $belakang_prodi_tk3_mapala = exp( ((pow($jurusan-$x_prodi_tk3_mapala,2)) / (2*$s2_pangkat2_prodi_tk3_mapala)));
    // $prob_prodi_tk3_mapala = 1/($depan_prodi_tk3_mapala * $belakang_prodi_tk3_mapala);
    //     //koleris
    // $depan_prodi_tk3_persma = sqrt($dua_phi*$s2_prodi_tk3_persma);
    // $belakang_prodi_tk3_persma = exp( ((pow($jurusan-$x_prodi_tk3_persma,2)) / (2*$s2_pangkat2_prodi_tk3_persma)));
    // $prob_prodi_tk3_persma = 1/($depan_prodi_tk3_persma * $belakang_prodi_tk3_persma);
    //     //koleris
    // $depan_prodi_tk3_bahasa = sqrt($dua_phi*$s2_prodi_tk3_bahasa);
    // $belakang_prodi_tk3_bahasa = exp( ((pow($jurusan-$x_prodi_tk3_bahasa,2)) / (2*$s2_pangkat2_prodi_tk3_bahasa)));
    // $prob_prodi_tk3_bahasa = 1/($depan_prodi_tk3_bahasa * $belakang_prodi_tk3_bahasa);
    //     //koleris
    // $depan_prodi_tk3_pramuka = sqrt($dua_phi*$s2_prodi_tk3_pramuka);
    // $belakang_prodi_tk3_pramuka = exp( ((pow($jurusan-$x_prodi_tk3_pramuka,2)) / (2*$s2_pangkat2_prodi_tk3_pramuka)));
    // $prob_prodi_tk3_pramuka = 1/($depan_prodi_tk3_pramuka * $belakang_prodi_tk3_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_tk3_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_tk3_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_tk3_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_tk3_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_tk3_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_tk3_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_tk3_pramuka, dec())."<br>";
    //     }

    // //Prodi prodi
    // $depan_prodi_tkm_wirausaha = sqrt($dua_phi*$s2_prodi_tkm_wirausaha);
    // $belakang_prodi_tkm_wirausaha = exp( ((pow($jurusan-$x_prodi_tkm_wirausaha,2)) / (2*$s2_pangkat2_prodi_tkm_wirausaha)));
    // $prob_prodi_tkm_wirausaha = 1/($depan_prodi_tkm_wirausaha * $belakang_prodi_tkm_wirausaha);
    //     //koleris
    // $depan_prodi_tkm_kemanusiaan = sqrt($dua_phi*$s2_prodi_tkm_kemanusiaan);
    // $belakang_prodi_tkm_kemanusiaan = exp( ((pow($jurusan-$x_prodi_tkm_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_tkm_kemanusiaan)));
    // $prob_prodi_tkm_kemanusiaan = 1/($depan_prodi_tkm_kemanusiaan * $belakang_prodi_tkm_kemanusiaan);
    //     //melankolis
    // $depan_prodi_tkm_senior = sqrt($dua_phi*$s2_prodi_tkm_senior);
    // $belakang_prodi_tkm_senior = exp( ((pow($jurusan-$x_prodi_tkm_senior,2)) / (2*$s2_pangkat2_prodi_tkm_senior)));
    // $prob_prodi_tkm_senior = 1/($depan_prodi_tkm_senior * $belakang_prodi_tkm_senior);
    //     //koleris
    // $depan_prodi_tkm_mapala = sqrt($dua_phi*$s2_prodi_tkm_mapala);
    // $belakang_prodi_tkm_mapala = exp( ((pow($jurusan-$x_prodi_tkm_mapala,2)) / (2*$s2_pangkat2_prodi_tkm_mapala)));
    // $prob_prodi_tkm_mapala = 1/($depan_prodi_tkm_mapala * $belakang_prodi_tkm_mapala);
    //     //koleris
    // $depan_prodi_tkm_persma = sqrt($dua_phi*$s2_prodi_tkm_persma);
    // $belakang_prodi_tkm_persma = exp( ((pow($jurusan-$x_prodi_tkm_persma,2)) / (2*$s2_pangkat2_prodi_tkm_persma)));
    // $prob_prodi_tkm_persma = 1/($depan_prodi_tkm_persma * $belakang_prodi_tkm_persma);
    //     //koleris
    // $depan_prodi_tkm_bahasa = sqrt($dua_phi*$s2_prodi_tkm_bahasa);
    // $belakang_prodi_tkm_bahasa = exp( ((pow($jurusan-$x_prodi_tkm_bahasa,2)) / (2*$s2_pangkat2_prodi_tkm_bahasa)));
    // $prob_prodi_tkm_bahasa = 1/($depan_prodi_tkm_bahasa * $belakang_prodi_tkm_bahasa);
    //     //koleris
    // $depan_prodi_tkm_pramuka = sqrt($dua_phi*$s2_prodi_tkm_pramuka);
    // $belakang_prodi_tkm_pramuka = exp( ((pow($jurusan-$x_prodi_tkm_pramuka,2)) / (2*$s2_pangkat2_prodi_tkm_pramuka)));
    // $prob_prodi_tkm_pramuka = 1/($depan_prodi_tkm_pramuka * $belakang_prodi_tkm_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_tkm_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_tkm_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_tkm_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_tkm_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_tkm_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_tkm_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_tkm_pramuka, dec())."<br>";
    //     }

    // //Prodi prodi
    // $depan_prodi_tks3_wirausaha = sqrt($dua_phi*$s2_prodi_tks3_wirausaha);
    // $belakang_prodi_tks3_wirausaha = exp( ((pow($jurusan-$x_prodi_tks3_wirausaha,2)) / (2*$s2_pangkat2_prodi_tks3_wirausaha)));
    // $prob_prodi_tks3_wirausaha = 1/($depan_prodi_tks3_wirausaha * $belakang_prodi_tks3_wirausaha);
    //     //koleris
    // $depan_prodi_tks3_kemanusiaan = sqrt($dua_phi*$s2_prodi_tks3_kemanusiaan);
    // $belakang_prodi_tks3_kemanusiaan = exp( ((pow($jurusan-$x_prodi_tks3_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_tks3_kemanusiaan)));
    // $prob_prodi_tks3_kemanusiaan = 1/($depan_prodi_tks3_kemanusiaan * $belakang_prodi_tks3_kemanusiaan);
    //     //melankolis
    // $depan_prodi_tks3_senior = sqrt($dua_phi*$s2_prodi_tks3_senior);
    // $belakang_prodi_tks3_senior = exp( ((pow($jurusan-$x_prodi_tks3_senior,2)) / (2*$s2_pangkat2_prodi_tks3_senior)));
    // $prob_prodi_tks3_senior = 1/($depan_prodi_tks3_senior * $belakang_prodi_tks3_senior);
    //     //koleris
    // $depan_prodi_tks3_mapala = sqrt($dua_phi*$s2_prodi_tks3_mapala);
    // $belakang_prodi_tks3_mapala = exp( ((pow($jurusan-$x_prodi_tks3_mapala,2)) / (2*$s2_pangkat2_prodi_tks3_mapala)));
    // $prob_prodi_tks3_mapala = 1/($depan_prodi_tks3_mapala * $belakang_prodi_tks3_mapala);
    //     //koleris
    // $depan_prodi_tks3_persma = sqrt($dua_phi*$s2_prodi_tks3_persma);
    // $belakang_prodi_tks3_persma = exp( ((pow($jurusan-$x_prodi_tks3_persma,2)) / (2*$s2_pangkat2_prodi_tks3_persma)));
    // $prob_prodi_tks3_persma = 1/($depan_prodi_tks3_persma * $belakang_prodi_tks3_persma);
    //     //koleris
    // $depan_prodi_tks3_bahasa = sqrt($dua_phi*$s2_prodi_tks3_bahasa);
    // $belakang_prodi_tks3_bahasa = exp( ((pow($jurusan-$x_prodi_tks3_bahasa,2)) / (2*$s2_pangkat2_prodi_tks3_bahasa)));
    // $prob_prodi_tks3_bahasa = 1/($depan_prodi_tks3_bahasa * $belakang_prodi_tks3_bahasa);
    //     //koleris
    // $depan_prodi_tks3_pramuka = sqrt($dua_phi*$s2_prodi_tks3_pramuka);
    // $belakang_prodi_tks3_pramuka = exp( ((pow($jurusan-$x_prodi_tks3_pramuka,2)) / (2*$s2_pangkat2_prodi_tks3_pramuka)));
    // $prob_prodi_tks3_pramuka = 1/($depan_prodi_tks3_pramuka * $belakang_prodi_tks3_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_tks3_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_tks3_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_tks3_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_tks3_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_tks3_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_tks3_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_tks3_pramuka, dec())."<br>";
    //     }


    // //Prodi prodi
    // $depan_prodi_tkg_wirausaha = sqrt($dua_phi*$s2_prodi_tkg_wirausaha);
    // $belakang_prodi_tkg_wirausaha = exp( ((pow($jurusan-$x_prodi_tkg_wirausaha,2)) / (2*$s2_pangkat2_prodi_tkg_wirausaha)));
    // $prob_prodi_tkg_wirausaha = 1/($depan_prodi_tkg_wirausaha * $belakang_prodi_tkg_wirausaha);
    //     //koleris
    // $depan_prodi_tkg_kemanusiaan = sqrt($dua_phi*$s2_prodi_tkg_kemanusiaan);
    // $belakang_prodi_tkg_kemanusiaan = exp( ((pow($jurusan-$x_prodi_tkg_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_tkg_kemanusiaan)));
    // $prob_prodi_tkg_kemanusiaan = 1/($depan_prodi_tkg_kemanusiaan * $belakang_prodi_tkg_kemanusiaan);
    //     //melankolis
    // $depan_prodi_tkg_senior = sqrt($dua_phi*$s2_prodi_tkg_senior);
    // $belakang_prodi_tkg_senior = exp( ((pow($jurusan-$x_prodi_tkg_senior,2)) / (2*$s2_pangkat2_prodi_tkg_senior)));
    // $prob_prodi_tkg_senior = 1/($depan_prodi_tkg_senior * $belakang_prodi_tkg_senior);
    //     //koleris
    // $depan_prodi_tkg_mapala = sqrt($dua_phi*$s2_prodi_tkg_mapala);
    // $belakang_prodi_tkg_mapala = exp( ((pow($jurusan-$x_prodi_tkg_mapala,2)) / (2*$s2_pangkat2_prodi_tkg_mapala)));
    // $prob_prodi_tkg_mapala = 1/($depan_prodi_tkg_mapala * $belakang_prodi_tkg_mapala);
    //     //koleris
    // $depan_prodi_tkg_persma = sqrt($dua_phi*$s2_prodi_tkg_persma);
    // $belakang_prodi_tkg_persma = exp( ((pow($jurusan-$x_prodi_tkg_persma,2)) / (2*$s2_pangkat2_prodi_tkg_persma)));
    // $prob_prodi_tkg_persma = 1/($depan_prodi_tkg_persma * $belakang_prodi_tkg_persma);
    //     //koleris
    // $depan_prodi_tkg_bahasa = sqrt($dua_phi*$s2_prodi_tkg_bahasa);
    // $belakang_prodi_tkg_bahasa = exp( ((pow($jurusan-$x_prodi_tkg_bahasa,2)) / (2*$s2_pangkat2_prodi_tkg_bahasa)));
    // $prob_prodi_tkg_bahasa = 1/($depan_prodi_tkg_bahasa * $belakang_prodi_tkg_bahasa);
    //     //koleris
    // $depan_prodi_tkg_pramuka = sqrt($dua_phi*$s2_prodi_tkg_pramuka);
    // $belakang_prodi_tkg_pramuka = exp( ((pow($jurusan-$x_prodi_tkg_pramuka,2)) / (2*$s2_pangkat2_prodi_tkg_pramuka)));
    // $prob_prodi_tkg_pramuka = 1/($depan_prodi_tkg_pramuka * $belakang_prodi_tkg_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_tkg_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_tkg_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_tkg_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_tkg_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_tkg_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_tkg_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_tkg_pramuka, dec())."<br>";
    //     }


    // //Prodi prodi
    // $depan_prodi_tkjj_wirausaha = sqrt($dua_phi*$s2_prodi_tkjj_wirausaha);
    // $belakang_prodi_tkjj_wirausaha = exp( ((pow($jurusan-$x_prodi_tkjj_wirausaha,2)) / (2*$s2_pangkat2_prodi_tkjj_wirausaha)));
    // $prob_prodi_tkjj_wirausaha = 1/($depan_prodi_tkjj_wirausaha * $belakang_prodi_tkjj_wirausaha);
    //     //koleris
    // $depan_prodi_tkjj_kemanusiaan = sqrt($dua_phi*$s2_prodi_tkjj_kemanusiaan);
    // $belakang_prodi_tkjj_kemanusiaan = exp( ((pow($jurusan-$x_prodi_tkjj_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_tkjj_kemanusiaan)));
    // $prob_prodi_tkjj_kemanusiaan = 1/($depan_prodi_tkjj_kemanusiaan * $belakang_prodi_tkjj_kemanusiaan);
    //     //melankolis
    // $depan_prodi_tkjj_senior = sqrt($dua_phi*$s2_prodi_tkjj_senior);
    // $belakang_prodi_tkjj_senior = exp( ((pow($jurusan-$x_prodi_tkjj_senior,2)) / (2*$s2_pangkat2_prodi_tkjj_senior)));
    // $prob_prodi_tkjj_senior = 1/($depan_prodi_tkjj_senior * $belakang_prodi_tkjj_senior);
    //     //koleris
    // $depan_prodi_tkjj_mapala = sqrt($dua_phi*$s2_prodi_tkjj_mapala);
    // $belakang_prodi_tkjj_mapala = exp( ((pow($jurusan-$x_prodi_tkjj_mapala,2)) / (2*$s2_pangkat2_prodi_tkjj_mapala)));
    // $prob_prodi_tkjj_mapala = 1/($depan_prodi_tkjj_mapala * $belakang_prodi_tkjj_mapala);
    //     //koleris
    // $depan_prodi_tkjj_persma = sqrt($dua_phi*$s2_prodi_tkjj_persma);
    // $belakang_prodi_tkjj_persma = exp( ((pow($jurusan-$x_prodi_tkjj_persma,2)) / (2*$s2_pangkat2_prodi_tkjj_persma)));
    // $prob_prodi_tkjj_persma = 1/($depan_prodi_tkjj_persma * $belakang_prodi_tkjj_persma);
    //     //koleris
    // $depan_prodi_tkjj_bahasa = sqrt($dua_phi*$s2_prodi_tkjj_bahasa);
    // $belakang_prodi_tkjj_bahasa = exp( ((pow($jurusan-$x_prodi_tkjj_bahasa,2)) / (2*$s2_pangkat2_prodi_tkjj_bahasa)));
    // $prob_prodi_tkjj_bahasa = 1/($depan_prodi_tkjj_bahasa * $belakang_prodi_tkjj_bahasa);
    //     //koleris
    // $depan_prodi_tkjj_pramuka = sqrt($dua_phi*$s2_prodi_tkjj_pramuka);
    // $belakang_prodi_tkjj_pramuka = exp( ((pow($jurusan-$x_prodi_tkjj_pramuka,2)) / (2*$s2_pangkat2_prodi_tkjj_pramuka)));
    // $prob_prodi_tkjj_pramuka = 1/($depan_prodi_tkjj_pramuka * $belakang_prodi_tkjj_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_tkjj_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_tkjj_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_tkjj_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_tkjj_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_tkjj_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_tkjj_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_tkjj_pramuka, dec())."<br>";
    //     }

    // //Prodi prodi
    // $depan_prodi_tke_wirausaha = sqrt($dua_phi*$s2_prodi_tke_wirausaha);
    // $belakang_prodi_tke_wirausaha = exp( ((pow($jurusan-$x_prodi_tke_wirausaha,2)) / (2*$s2_pangkat2_prodi_tke_wirausaha)));
    // $prob_prodi_tke_wirausaha = 1/($depan_prodi_tke_wirausaha * $belakang_prodi_tke_wirausaha);
    //     //koleris
    // $depan_prodi_tke_kemanusiaan = sqrt($dua_phi*$s2_prodi_tke_kemanusiaan);
    // $belakang_prodi_tke_kemanusiaan = exp( ((pow($jurusan-$x_prodi_tke_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_tke_kemanusiaan)));
    // $prob_prodi_tke_kemanusiaan = 1/($depan_prodi_tke_kemanusiaan * $belakang_prodi_tke_kemanusiaan);
    //     //melankolis
    // $depan_prodi_tke_senior = sqrt($dua_phi*$s2_prodi_tke_senior);
    // $belakang_prodi_tke_senior = exp( ((pow($jurusan-$x_prodi_tke_senior,2)) / (2*$s2_pangkat2_prodi_tke_senior)));
    // $prob_prodi_tke_senior = 1/($depan_prodi_tke_senior * $belakang_prodi_tke_senior);
    //     //koleris
    // $depan_prodi_tke_mapala = sqrt($dua_phi*$s2_prodi_tke_mapala);
    // $belakang_prodi_tke_mapala = exp( ((pow($jurusan-$x_prodi_tke_mapala,2)) / (2*$s2_pangkat2_prodi_tke_mapala)));
    // $prob_prodi_tke_mapala = 1/($depan_prodi_tke_mapala * $belakang_prodi_tke_mapala);
    //     //koleris
    // $depan_prodi_tke_persma = sqrt($dua_phi*$s2_prodi_tke_persma);
    // $belakang_prodi_tke_persma = exp( ((pow($jurusan-$x_prodi_tke_persma,2)) / (2*$s2_pangkat2_prodi_tke_persma)));
    // $prob_prodi_tke_persma = 1/($depan_prodi_tke_persma * $belakang_prodi_tke_persma);
    //     //koleris
    // $depan_prodi_tke_bahasa = sqrt($dua_phi*$s2_prodi_tke_bahasa);
    // $belakang_prodi_tke_bahasa = exp( ((pow($jurusan-$x_prodi_tke_bahasa,2)) / (2*$s2_pangkat2_prodi_tke_bahasa)));
    // $prob_prodi_tke_bahasa = 1/($depan_prodi_tke_bahasa * $belakang_prodi_tke_bahasa);
    //     //koleris
    // $depan_prodi_tke_pramuka = sqrt($dua_phi*$s2_prodi_tke_pramuka);
    // $belakang_prodi_tke_pramuka = exp( ((pow($jurusan-$x_prodi_tke_pramuka,2)) / (2*$s2_pangkat2_prodi_tke_pramuka)));
    // $prob_prodi_tke_pramuka = 1/($depan_prodi_tke_pramuka * $belakang_prodi_tke_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_tke_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_tke_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_tke_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_tke_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_tke_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_tke_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_tke_pramuka, dec())."<br>";
    //     }

    // //Prodi prodi
    // $depan_prodi_tl3_wirausaha = sqrt($dua_phi*$s2_prodi_tl3_wirausaha);
    // $belakang_prodi_tl3_wirausaha = exp( ((pow($jurusan-$x_prodi_tl3_wirausaha,2)) / (2*$s2_pangkat2_prodi_tl3_wirausaha)));
    // $prob_prodi_tl3_wirausaha = 1/($depan_prodi_tl3_wirausaha * $belakang_prodi_tl3_wirausaha);
    //     //koleris
    // $depan_prodi_tl3_kemanusiaan = sqrt($dua_phi*$s2_prodi_tl3_kemanusiaan);
    // $belakang_prodi_tl3_kemanusiaan = exp( ((pow($jurusan-$x_prodi_tl3_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_tl3_kemanusiaan)));
    // $prob_prodi_tl3_kemanusiaan = 1/($depan_prodi_tl3_kemanusiaan * $belakang_prodi_tl3_kemanusiaan);
    //     //melankolis
    // $depan_prodi_tl3_senior = sqrt($dua_phi*$s2_prodi_tl3_senior);
    // $belakang_prodi_tl3_senior = exp( ((pow($jurusan-$x_prodi_tl3_senior,2)) / (2*$s2_pangkat2_prodi_tl3_senior)));
    // $prob_prodi_tl3_senior = 1/($depan_prodi_tl3_senior * $belakang_prodi_tl3_senior);
    //     //koleris
    // $depan_prodi_tl3_mapala = sqrt($dua_phi*$s2_prodi_tl3_mapala);
    // $belakang_prodi_tl3_mapala = exp( ((pow($jurusan-$x_prodi_tl3_mapala,2)) / (2*$s2_pangkat2_prodi_tl3_mapala)));
    // $prob_prodi_tl3_mapala = 1/($depan_prodi_tl3_mapala * $belakang_prodi_tl3_mapala);
    //     //koleris
    // $depan_prodi_tl3_persma = sqrt($dua_phi*$s2_prodi_tl3_persma);
    // $belakang_prodi_tl3_persma = exp( ((pow($jurusan-$x_prodi_tl3_persma,2)) / (2*$s2_pangkat2_prodi_tl3_persma)));
    // $prob_prodi_tl3_persma = 1/($depan_prodi_tl3_persma * $belakang_prodi_tl3_persma);
    //     //koleris
    // $depan_prodi_tl3_bahasa = sqrt($dua_phi*$s2_prodi_tl3_bahasa);
    // $belakang_prodi_tl3_bahasa = exp( ((pow($jurusan-$x_prodi_tl3_bahasa,2)) / (2*$s2_pangkat2_prodi_tl3_bahasa)));
    // $prob_prodi_tl3_bahasa = 1/($depan_prodi_tl3_bahasa * $belakang_prodi_tl3_bahasa);
    //     //koleris
    // $depan_prodi_tl3_pramuka = sqrt($dua_phi*$s2_prodi_tl3_pramuka);
    // $belakang_prodi_tl3_pramuka = exp( ((pow($jurusan-$x_prodi_tl3_pramuka,2)) / (2*$s2_pangkat2_prodi_tl3_pramuka)));
    // $prob_prodi_tl3_pramuka = 1/($depan_prodi_tl3_pramuka * $belakang_prodi_tl3_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_tl3_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_tl3_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_tl3_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_tl3_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_tl3_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_tl3_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_tl3_pramuka, dec())."<br>";
    //     }

    // //Prodi prodi
    // $depan_prodi_tmk3_wirausaha = sqrt($dua_phi*$s2_prodi_tmk3_wirausaha);
    // $belakang_prodi_tmk3_wirausaha = exp( ((pow($jurusan-$x_prodi_tmk3_wirausaha,2)) / (2*$s2_pangkat2_prodi_tmk3_wirausaha)));
    // $prob_prodi_tmk3_wirausaha = 1/($depan_prodi_tmk3_wirausaha * $belakang_prodi_tmk3_wirausaha);
    //     //koleris
    // $depan_prodi_tmk3_kemanusiaan = sqrt($dua_phi*$s2_prodi_tmk3_kemanusiaan);
    // $belakang_prodi_tmk3_kemanusiaan = exp( ((pow($jurusan-$x_prodi_tmk3_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_tmk3_kemanusiaan)));
    // $prob_prodi_tmk3_kemanusiaan = 1/($depan_prodi_tmk3_kemanusiaan * $belakang_prodi_tmk3_kemanusiaan);
    //     //melankolis
    // $depan_prodi_tmk3_senior = sqrt($dua_phi*$s2_prodi_tmk3_senior);
    // $belakang_prodi_tmk3_senior = exp( ((pow($jurusan-$x_prodi_tmk3_senior,2)) / (2*$s2_pangkat2_prodi_tmk3_senior)));
    // $prob_prodi_tmk3_senior = 1/($depan_prodi_tmk3_senior * $belakang_prodi_tmk3_senior);
    //     //koleris
    // $depan_prodi_tmk3_mapala = sqrt($dua_phi*$s2_prodi_tmk3_mapala);
    // $belakang_prodi_tmk3_mapala = exp( ((pow($jurusan-$x_prodi_tmk3_mapala,2)) / (2*$s2_pangkat2_prodi_tmk3_mapala)));
    // $prob_prodi_tmk3_mapala = 1/($depan_prodi_tmk3_mapala * $belakang_prodi_tmk3_mapala);
    //     //koleris
    // $depan_prodi_tmk3_persma = sqrt($dua_phi*$s2_prodi_tmk3_persma);
    // $belakang_prodi_tmk3_persma = exp( ((pow($jurusan-$x_prodi_tmk3_persma,2)) / (2*$s2_pangkat2_prodi_tmk3_persma)));
    // $prob_prodi_tmk3_persma = 1/($depan_prodi_tmk3_persma * $belakang_prodi_tmk3_persma);
    //     //koleris
    // $depan_prodi_tmk3_bahasa = sqrt($dua_phi*$s2_prodi_tmk3_bahasa);
    // $belakang_prodi_tmk3_bahasa = exp( ((pow($jurusan-$x_prodi_tmk3_bahasa,2)) / (2*$s2_pangkat2_prodi_tmk3_bahasa)));
    // $prob_prodi_tmk3_bahasa = 1/($depan_prodi_tmk3_bahasa * $belakang_prodi_tmk3_bahasa);
    //     //koleris
    // $depan_prodi_tmk3_pramuka = sqrt($dua_phi*$s2_prodi_tmk3_pramuka);
    // $belakang_prodi_tmk3_pramuka = exp( ((pow($jurusan-$x_prodi_tmk3_pramuka,2)) / (2*$s2_pangkat2_prodi_tmk3_pramuka)));
    // $prob_prodi_tmk3_pramuka = 1/($depan_prodi_tmk3_pramuka * $belakang_prodi_tmk3_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_tmk3_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_tmk3_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_tmk3_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_tmk3_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_tmk3_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_tmk3_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_tmk3_pramuka, dec())."<br>";
    //     }

    // //Prodi prodi
    // $depan_prodi_tm_wirausaha = sqrt($dua_phi*$s2_prodi_tm_wirausaha);
    // $belakang_prodi_tm_wirausaha = exp( ((pow($jurusan-$x_prodi_tm_wirausaha,2)) / (2*$s2_pangkat2_prodi_tm_wirausaha)));
    // $prob_prodi_tm_wirausaha = 1/($depan_prodi_tm_wirausaha * $belakang_prodi_tm_wirausaha);
    //     //koleris
    // $depan_prodi_tm_kemanusiaan = sqrt($dua_phi*$s2_prodi_tm_kemanusiaan);
    // $belakang_prodi_tm_kemanusiaan = exp( ((pow($jurusan-$x_prodi_tm_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_tm_kemanusiaan)));
    // $prob_prodi_tm_kemanusiaan = 1/($depan_prodi_tm_kemanusiaan * $belakang_prodi_tm_kemanusiaan);
    //     //melankolis
    // $depan_prodi_tm_senior = sqrt($dua_phi*$s2_prodi_tm_senior);
    // $belakang_prodi_tm_senior = exp( ((pow($jurusan-$x_prodi_tm_senior,2)) / (2*$s2_pangkat2_prodi_tm_senior)));
    // $prob_prodi_tm_senior = 1/($depan_prodi_tm_senior * $belakang_prodi_tm_senior);
    //     //koleris
    // $depan_prodi_tm_mapala = sqrt($dua_phi*$s2_prodi_tm_mapala);
    // $belakang_prodi_tm_mapala = exp( ((pow($jurusan-$x_prodi_tm_mapala,2)) / (2*$s2_pangkat2_prodi_tm_mapala)));
    // $prob_prodi_tm_mapala = 1/($depan_prodi_tm_mapala * $belakang_prodi_tm_mapala);
    //     //koleris
    // $depan_prodi_tm_persma = sqrt($dua_phi*$s2_prodi_tm_persma);
    // $belakang_prodi_tm_persma = exp( ((pow($jurusan-$x_prodi_tm_persma,2)) / (2*$s2_pangkat2_prodi_tm_persma)));
    // $prob_prodi_tm_persma = 1/($depan_prodi_tm_persma * $belakang_prodi_tm_persma);
    //     //koleris
    // $depan_prodi_tm_bahasa = sqrt($dua_phi*$s2_prodi_tm_bahasa);
    // $belakang_prodi_tm_bahasa = exp( ((pow($jurusan-$x_prodi_tm_bahasa,2)) / (2*$s2_pangkat2_prodi_tm_bahasa)));
    // $prob_prodi_tm_bahasa = 1/($depan_prodi_tm_bahasa * $belakang_prodi_tm_bahasa);
    //     //koleris
    // $depan_prodi_tm_pramuka = sqrt($dua_phi*$s2_prodi_tm_pramuka);
    // $belakang_prodi_tm_pramuka = exp( ((pow($jurusan-$x_prodi_tm_pramuka,2)) / (2*$s2_pangkat2_prodi_tm_pramuka)));
    // $prob_prodi_tm_pramuka = 1/($depan_prodi_tm_pramuka * $belakang_prodi_tm_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_tm_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_tm_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_tm_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_tm_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_tm_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_tm_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_tm_pramuka, dec())."<br>";
    //     }

    // //Prodi prodi
    // $depan_prodi_to_wirausaha = sqrt($dua_phi*$s2_prodi_to_wirausaha);
    // $belakang_prodi_to_wirausaha = exp( ((pow($jurusan-$x_prodi_to_wirausaha,2)) / (2*$s2_pangkat2_prodi_to_wirausaha)));
    // $prob_prodi_to_wirausaha = 1/($depan_prodi_to_wirausaha * $belakang_prodi_to_wirausaha);
    //     //koleris
    // $depan_prodi_to_kemanusiaan = sqrt($dua_phi*$s2_prodi_to_kemanusiaan);
    // $belakang_prodi_to_kemanusiaan = exp( ((pow($jurusan-$x_prodi_to_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_to_kemanusiaan)));
    // $prob_prodi_to_kemanusiaan = 1/($depan_prodi_to_kemanusiaan * $belakang_prodi_to_kemanusiaan);
    //     //melankolis
    // $depan_prodi_to_senior = sqrt($dua_phi*$s2_prodi_to_senior);
    // $belakang_prodi_to_senior = exp( ((pow($jurusan-$x_prodi_to_senior,2)) / (2*$s2_pangkat2_prodi_to_senior)));
    // $prob_prodi_to_senior = 1/($depan_prodi_to_senior * $belakang_prodi_to_senior);
    //     //koleris
    // $depan_prodi_to_mapala = sqrt($dua_phi*$s2_prodi_to_mapala);
    // $belakang_prodi_to_mapala = exp( ((pow($jurusan-$x_prodi_to_mapala,2)) / (2*$s2_pangkat2_prodi_to_mapala)));
    // $prob_prodi_to_mapala = 1/($depan_prodi_to_mapala * $belakang_prodi_to_mapala);
    //     //koleris
    // $depan_prodi_to_persma = sqrt($dua_phi*$s2_prodi_to_persma);
    // $belakang_prodi_to_persma = exp( ((pow($jurusan-$x_prodi_to_persma,2)) / (2*$s2_pangkat2_prodi_to_persma)));
    // $prob_prodi_to_persma = 1/($depan_prodi_to_persma * $belakang_prodi_to_persma);
    //     //koleris
    // $depan_prodi_to_bahasa = sqrt($dua_phi*$s2_prodi_to_bahasa);
    // $belakang_prodi_to_bahasa = exp( ((pow($jurusan-$x_prodi_to_bahasa,2)) / (2*$s2_pangkat2_prodi_to_bahasa)));
    // $prob_prodi_to_bahasa = 1/($depan_prodi_to_bahasa * $belakang_prodi_to_bahasa);
    //     //koleris
    // $depan_prodi_to_pramuka = sqrt($dua_phi*$s2_prodi_to_pramuka);
    // $belakang_prodi_to_pramuka = exp( ((pow($jurusan-$x_prodi_to_pramuka,2)) / (2*$s2_pangkat2_prodi_to_pramuka)));
    // $prob_prodi_to_pramuka = 1/($depan_prodi_to_pramuka * $belakang_prodi_to_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_to_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_to_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_to_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_to_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_to_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_to_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_to_pramuka, dec())."<br>";
    //     }

    // //Prodi prodi
    // $depan_prodi_tpab_wirausaha = sqrt($dua_phi*$s2_prodi_tpab_wirausaha);
    // $belakang_prodi_tpab_wirausaha = exp( ((pow($jurusan-$x_prodi_tpab_wirausaha,2)) / (2*$s2_pangkat2_prodi_tpab_wirausaha)));
    // $prob_prodi_tpab_wirausaha = 1/($depan_prodi_tpab_wirausaha * $belakang_prodi_tpab_wirausaha);
    //     //koleris
    // $depan_prodi_tpab_kemanusiaan = sqrt($dua_phi*$s2_prodi_tpab_kemanusiaan);
    // $belakang_prodi_tpab_kemanusiaan = exp( ((pow($jurusan-$x_prodi_tpab_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_tpab_kemanusiaan)));
    // $prob_prodi_tpab_kemanusiaan = 1/($depan_prodi_tpab_kemanusiaan * $belakang_prodi_tpab_kemanusiaan);
    //     //melankolis
    // $depan_prodi_tpab_senior = sqrt($dua_phi*$s2_prodi_tpab_senior);
    // $belakang_prodi_tpab_senior = exp( ((pow($jurusan-$x_prodi_tpab_senior,2)) / (2*$s2_pangkat2_prodi_tpab_senior)));
    // $prob_prodi_tpab_senior = 1/($depan_prodi_tpab_senior * $belakang_prodi_tpab_senior);
    //     //koleris
    // $depan_prodi_tpab_mapala = sqrt($dua_phi*$s2_prodi_tpab_mapala);
    // $belakang_prodi_tpab_mapala = exp( ((pow($jurusan-$x_prodi_tpab_mapala,2)) / (2*$s2_pangkat2_prodi_tpab_mapala)));
    // $prob_prodi_tpab_mapala = 1/($depan_prodi_tpab_mapala * $belakang_prodi_tpab_mapala);
    //     //koleris
    // $depan_prodi_tpab_persma = sqrt($dua_phi*$s2_prodi_tpab_persma);
    // $belakang_prodi_tpab_persma = exp( ((pow($jurusan-$x_prodi_tpab_persma,2)) / (2*$s2_pangkat2_prodi_tpab_persma)));
    // $prob_prodi_tpab_persma = 1/($depan_prodi_tpab_persma * $belakang_prodi_tpab_persma);
    //     //koleris
    // $depan_prodi_tpab_bahasa = sqrt($dua_phi*$s2_prodi_tpab_bahasa);
    // $belakang_prodi_tpab_bahasa = exp( ((pow($jurusan-$x_prodi_tpab_bahasa,2)) / (2*$s2_pangkat2_prodi_tpab_bahasa)));
    // $prob_prodi_tpab_bahasa = 1/($depan_prodi_tpab_bahasa * $belakang_prodi_tpab_bahasa);
    //     //koleris
    // $depan_prodi_tpab_pramuka = sqrt($dua_phi*$s2_prodi_tpab_pramuka);
    // $belakang_prodi_tpab_pramuka = exp( ((pow($jurusan-$x_prodi_tpab_pramuka,2)) / (2*$s2_pangkat2_prodi_tpab_pramuka)));
    // $prob_prodi_tpab_pramuka = 1/($depan_prodi_tpab_pramuka * $belakang_prodi_tpab_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_tpab_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_tpab_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_tpab_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_tpab_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_tpab_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_tpab_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_tpab_pramuka, dec())."<br>";
    //     }

    // //Prodi prodi
    // $depan_prodi_ts_wirausaha = sqrt($dua_phi*$s2_prodi_ts_wirausaha);
    // $belakang_prodi_ts_wirausaha = exp( ((pow($jurusan-$x_prodi_ts_wirausaha,2)) / (2*$s2_pangkat2_prodi_ts_wirausaha)));
    // $prob_prodi_ts_wirausaha = 1/($depan_prodi_ts_wirausaha * $belakang_prodi_ts_wirausaha);
    //     //koleris
    // $depan_prodi_ts_kemanusiaan = sqrt($dua_phi*$s2_prodi_ts_kemanusiaan);
    // $belakang_prodi_ts_kemanusiaan = exp( ((pow($jurusan-$x_prodi_ts_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_ts_kemanusiaan)));
    // $prob_prodi_ts_kemanusiaan = 1/($depan_prodi_ts_kemanusiaan * $belakang_prodi_ts_kemanusiaan);
    //     //melankolis
    // $depan_prodi_ts_senior = sqrt($dua_phi*$s2_prodi_ts_senior);
    // $belakang_prodi_ts_senior = exp( ((pow($jurusan-$x_prodi_ts_senior,2)) / (2*$s2_pangkat2_prodi_ts_senior)));
    // $prob_prodi_ts_senior = 1/($depan_prodi_ts_senior * $belakang_prodi_ts_senior);
    //     //koleris
    // $depan_prodi_ts_mapala = sqrt($dua_phi*$s2_prodi_ts_mapala);
    // $belakang_prodi_ts_mapala = exp( ((pow($jurusan-$x_prodi_ts_mapala,2)) / (2*$s2_pangkat2_prodi_ts_mapala)));
    // $prob_prodi_ts_mapala = 1/($depan_prodi_ts_mapala * $belakang_prodi_ts_mapala);
    //     //koleris
    // $depan_prodi_ts_persma = sqrt($dua_phi*$s2_prodi_ts_persma);
    // $belakang_prodi_ts_persma = exp( ((pow($jurusan-$x_prodi_ts_persma,2)) / (2*$s2_pangkat2_prodi_ts_persma)));
    // $prob_prodi_ts_persma = 1/($depan_prodi_ts_persma * $belakang_prodi_ts_persma);
    //     //koleris
    // $depan_prodi_ts_bahasa = sqrt($dua_phi*$s2_prodi_ts_bahasa);
    // $belakang_prodi_ts_bahasa = exp( ((pow($jurusan-$x_prodi_ts_bahasa,2)) / (2*$s2_pangkat2_prodi_ts_bahasa)));
    // $prob_prodi_ts_bahasa = 1/($depan_prodi_ts_bahasa * $belakang_prodi_ts_bahasa);
    //     //koleris
    // $depan_prodi_ts_pramuka = sqrt($dua_phi*$s2_prodi_ts_pramuka);
    // $belakang_prodi_ts_pramuka = exp( ((pow($jurusan-$x_prodi_ts_pramuka,2)) / (2*$s2_pangkat2_prodi_ts_pramuka)));
    // $prob_prodi_ts_pramuka = 1/($depan_prodi_ts_pramuka * $belakang_prodi_ts_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_ts_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_ts_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_ts_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_ts_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_ts_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_ts_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_ts_pramuka, dec())."<br>";
    //     }

    // //Prodi prodi
    // $depan_prodi_ttl_wirausaha = sqrt($dua_phi*$s2_prodi_ttl_wirausaha);
    // $belakang_prodi_ttl_wirausaha = exp( ((pow($jurusan-$x_prodi_ttl_wirausaha,2)) / (2*$s2_pangkat2_prodi_ttl_wirausaha)));
    // $prob_prodi_ttl_wirausaha = 1/($depan_prodi_ttl_wirausaha * $belakang_prodi_ttl_wirausaha);
    //     //koleris
    // $depan_prodi_ttl_kemanusiaan = sqrt($dua_phi*$s2_prodi_ttl_kemanusiaan);
    // $belakang_prodi_ttl_kemanusiaan = exp( ((pow($jurusan-$x_prodi_ttl_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_ttl_kemanusiaan)));
    // $prob_prodi_ttl_kemanusiaan = 1/($depan_prodi_ttl_kemanusiaan * $belakang_prodi_ttl_kemanusiaan);
    //     //melankolis
    // $depan_prodi_ttl_senior = sqrt($dua_phi*$s2_prodi_ttl_senior);
    // $belakang_prodi_ttl_senior = exp( ((pow($jurusan-$x_prodi_ttl_senior,2)) / (2*$s2_pangkat2_prodi_ttl_senior)));
    // $prob_prodi_ttl_senior = 1/($depan_prodi_ttl_senior * $belakang_prodi_ttl_senior);
    //     //koleris
    // $depan_prodi_ttl_mapala = sqrt($dua_phi*$s2_prodi_ttl_mapala);
    // $belakang_prodi_ttl_mapala = exp( ((pow($jurusan-$x_prodi_ttl_mapala,2)) / (2*$s2_pangkat2_prodi_ttl_mapala)));
    // $prob_prodi_ttl_mapala = 1/($depan_prodi_ttl_mapala * $belakang_prodi_ttl_mapala);
    //     //koleris
    // $depan_prodi_ttl_persma = sqrt($dua_phi*$s2_prodi_ttl_persma);
    // $belakang_prodi_ttl_persma = exp( ((pow($jurusan-$x_prodi_ttl_persma,2)) / (2*$s2_pangkat2_prodi_ttl_persma)));
    // $prob_prodi_ttl_persma = 1/($depan_prodi_ttl_persma * $belakang_prodi_ttl_persma);
    //     //koleris
    // $depan_prodi_ttl_bahasa = sqrt($dua_phi*$s2_prodi_ttl_bahasa);
    // $belakang_prodi_ttl_bahasa = exp( ((pow($jurusan-$x_prodi_ttl_bahasa,2)) / (2*$s2_pangkat2_prodi_ttl_bahasa)));
    // $prob_prodi_ttl_bahasa = 1/($depan_prodi_ttl_bahasa * $belakang_prodi_ttl_bahasa);
    //     //koleris
    // $depan_prodi_ttl_pramuka = sqrt($dua_phi*$s2_prodi_ttl_pramuka);
    // $belakang_prodi_ttl_pramuka = exp( ((pow($jurusan-$x_prodi_ttl_pramuka,2)) / (2*$s2_pangkat2_prodi_ttl_pramuka)));
    // $prob_prodi_ttl_pramuka = 1/($depan_prodi_ttl_pramuka * $belakang_prodi_ttl_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_ttl_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_ttl_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_ttl_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_ttl_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_ttl_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_ttl_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_ttl_pramuka, dec())."<br>";
    //     }

    // //Prodi prodi
    // $depan_prodi_ab4_wirausaha = sqrt($dua_phi*$s2_prodi_ab4_wirausaha);
    // $belakang_prodi_ab4_wirausaha = exp( ((pow($jurusan-$x_prodi_ab4_wirausaha,2)) / (2*$s2_pangkat2_prodi_ab4_wirausaha)));
    // $prob_prodi_ab4_wirausaha = 1/($depan_prodi_ab4_wirausaha * $belakang_prodi_ab4_wirausaha);
    //     //koleris
    // $depan_prodi_ab4_kemanusiaan = sqrt($dua_phi*$s2_prodi_ab4_kemanusiaan);
    // $belakang_prodi_ab4_kemanusiaan = exp( ((pow($jurusan-$x_prodi_ab4_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_ab4_kemanusiaan)));
    // $prob_prodi_ab4_kemanusiaan = 1/($depan_prodi_ab4_kemanusiaan * $belakang_prodi_ab4_kemanusiaan);
    //     //melankolis
    // $depan_prodi_ab4_senior = sqrt($dua_phi*$s2_prodi_ab4_senior);
    // $belakang_prodi_ab4_senior = exp( ((pow($jurusan-$x_prodi_ab4_senior,2)) / (2*$s2_pangkat2_prodi_ab4_senior)));
    // $prob_prodi_ab4_senior = 1/($depan_prodi_ab4_senior * $belakang_prodi_ab4_senior);
    //     //koleris
    // $depan_prodi_ab4_mapala = sqrt($dua_phi*$s2_prodi_ab4_mapala);
    // $belakang_prodi_ab4_mapala = exp( ((pow($jurusan-$x_prodi_ab4_mapala,2)) / (2*$s2_pangkat2_prodi_ab4_mapala)));
    // $prob_prodi_ab4_mapala = 1/($depan_prodi_ab4_mapala * $belakang_prodi_ab4_mapala);
    //     //koleris
    // $depan_prodi_ab4_persma = sqrt($dua_phi*$s2_prodi_ab4_persma);
    // $belakang_prodi_ab4_persma = exp( ((pow($jurusan-$x_prodi_ab4_persma,2)) / (2*$s2_pangkat2_prodi_ab4_persma)));
    // $prob_prodi_ab4_persma = 1/($depan_prodi_ab4_persma * $belakang_prodi_ab4_persma);
    //     //koleris
    // $depan_prodi_ab4_bahasa = sqrt($dua_phi*$s2_prodi_ab4_bahasa);
    // $belakang_prodi_ab4_bahasa = exp( ((pow($jurusan-$x_prodi_ab4_bahasa,2)) / (2*$s2_pangkat2_prodi_ab4_bahasa)));
    // $prob_prodi_ab4_bahasa = 1/($depan_prodi_ab4_bahasa * $belakang_prodi_ab4_bahasa);
    //     //koleris
    // $depan_prodi_ab4_pramuka = sqrt($dua_phi*$s2_prodi_ab4_pramuka);
    // $belakang_prodi_ab4_pramuka = exp( ((pow($jurusan-$x_prodi_ab4_pramuka,2)) / (2*$s2_pangkat2_prodi_ab4_pramuka)));
    // $prob_prodi_ab4_pramuka = 1/($depan_prodi_ab4_pramuka * $belakang_prodi_ab4_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_ab4_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_ab4_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_ab4_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_ab4_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_ab4_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_ab4_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_ab4_pramuka, dec())."<br>";
    //     }

    // //Prodi prodi
    // $depan_prodi_akm_wirausaha = sqrt($dua_phi*$s2_prodi_akm_wirausaha);
    // $belakang_prodi_akm_wirausaha = exp( ((pow($jurusan-$x_prodi_akm_wirausaha,2)) / (2*$s2_pangkat2_prodi_akm_wirausaha)));
    // $prob_prodi_akm_wirausaha = 1/($depan_prodi_akm_wirausaha * $belakang_prodi_akm_wirausaha);
    //     //koleris
    // $depan_prodi_akm_kemanusiaan = sqrt($dua_phi*$s2_prodi_akm_kemanusiaan);
    // $belakang_prodi_akm_kemanusiaan = exp( ((pow($jurusan-$x_prodi_akm_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_akm_kemanusiaan)));
    // $prob_prodi_akm_kemanusiaan = 1/($depan_prodi_akm_kemanusiaan * $belakang_prodi_akm_kemanusiaan);
    //     //melankolis
    // $depan_prodi_akm_senior = sqrt($dua_phi*$s2_prodi_akm_senior);
    // $belakang_prodi_akm_senior = exp( ((pow($jurusan-$x_prodi_akm_senior,2)) / (2*$s2_pangkat2_prodi_akm_senior)));
    // $prob_prodi_akm_senior = 1/($depan_prodi_akm_senior * $belakang_prodi_akm_senior);
    //     //koleris
    // $depan_prodi_akm_mapala = sqrt($dua_phi*$s2_prodi_akm_mapala);
    // $belakang_prodi_akm_mapala = exp( ((pow($jurusan-$x_prodi_akm_mapala,2)) / (2*$s2_pangkat2_prodi_akm_mapala)));
    // $prob_prodi_akm_mapala = 1/($depan_prodi_akm_mapala * $belakang_prodi_akm_mapala);
    //     //koleris
    // $depan_prodi_akm_persma = sqrt($dua_phi*$s2_prodi_akm_persma);
    // $belakang_prodi_akm_persma = exp( ((pow($jurusan-$x_prodi_akm_persma,2)) / (2*$s2_pangkat2_prodi_akm_persma)));
    // $prob_prodi_akm_persma = 1/($depan_prodi_akm_persma * $belakang_prodi_akm_persma);
    //     //koleris
    // $depan_prodi_akm_bahasa = sqrt($dua_phi*$s2_prodi_akm_bahasa);
    // $belakang_prodi_akm_bahasa = exp( ((pow($jurusan-$x_prodi_akm_bahasa,2)) / (2*$s2_pangkat2_prodi_akm_bahasa)));
    // $prob_prodi_akm_bahasa = 1/($depan_prodi_akm_bahasa * $belakang_prodi_akm_bahasa);
    //     //koleris
    // $depan_prodi_akm_pramuka = sqrt($dua_phi*$s2_prodi_akm_pramuka);
    // $belakang_prodi_akm_pramuka = exp( ((pow($jurusan-$x_prodi_akm_pramuka,2)) / (2*$s2_pangkat2_prodi_akm_pramuka)));
    // $prob_prodi_akm_pramuka = 1/($depan_prodi_akm_pramuka * $belakang_prodi_akm_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_akm_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_akm_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_akm_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_akm_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_akm_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_akm_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_akm_pramuka, dec())."<br>";
    //     }

    // //Prodi prodi
    // $depan_prodi_tk4_wirausaha = sqrt($dua_phi*$s2_prodi_tk4_wirausaha);
    // $belakang_prodi_tk4_wirausaha = exp( ((pow($jurusan-$x_prodi_tk4_wirausaha,2)) / (2*$s2_pangkat2_prodi_tk4_wirausaha)));
    // $prob_prodi_tk4_wirausaha = 1/($depan_prodi_tk4_wirausaha * $belakang_prodi_tk4_wirausaha);
    //     //koleris
    // $depan_prodi_tk4_kemanusiaan = sqrt($dua_phi*$s2_prodi_tk4_kemanusiaan);
    // $belakang_prodi_tk4_kemanusiaan = exp( ((pow($jurusan-$x_prodi_tk4_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_tk4_kemanusiaan)));
    // $prob_prodi_tk4_kemanusiaan = 1/($depan_prodi_tk4_kemanusiaan * $belakang_prodi_tk4_kemanusiaan);
    //     //melankolis
    // $depan_prodi_tk4_senior = sqrt($dua_phi*$s2_prodi_tk4_senior);
    // $belakang_prodi_tk4_senior = exp( ((pow($jurusan-$x_prodi_tk4_senior,2)) / (2*$s2_pangkat2_prodi_tk4_senior)));
    // $prob_prodi_tk4_senior = 1/($depan_prodi_tk4_senior * $belakang_prodi_tk4_senior);
    //     //koleris
    // $depan_prodi_tk4_mapala = sqrt($dua_phi*$s2_prodi_tk4_mapala);
    // $belakang_prodi_tk4_mapala = exp( ((pow($jurusan-$x_prodi_tk4_mapala,2)) / (2*$s2_pangkat2_prodi_tk4_mapala)));
    // $prob_prodi_tk4_mapala = 1/($depan_prodi_tk4_mapala * $belakang_prodi_tk4_mapala);
    //     //koleris
    // $depan_prodi_tk4_persma = sqrt($dua_phi*$s2_prodi_tk4_persma);
    // $belakang_prodi_tk4_persma = exp( ((pow($jurusan-$x_prodi_tk4_persma,2)) / (2*$s2_pangkat2_prodi_tk4_persma)));
    // $prob_prodi_tk4_persma = 1/($depan_prodi_tk4_persma * $belakang_prodi_tk4_persma);
    //     //koleris
    // $depan_prodi_tk4_bahasa = sqrt($dua_phi*$s2_prodi_tk4_bahasa);
    // $belakang_prodi_tk4_bahasa = exp( ((pow($jurusan-$x_prodi_tk4_bahasa,2)) / (2*$s2_pangkat2_prodi_tk4_bahasa)));
    // $prob_prodi_tk4_bahasa = 1/($depan_prodi_tk4_bahasa * $belakang_prodi_tk4_bahasa);
    //     //koleris
    // $depan_prodi_tk4_pramuka = sqrt($dua_phi*$s2_prodi_tk4_pramuka);
    // $belakang_prodi_tk4_pramuka = exp( ((pow($jurusan-$x_prodi_tk4_pramuka,2)) / (2*$s2_pangkat2_prodi_tk4_pramuka)));
    // $prob_prodi_tk4_pramuka = 1/($depan_prodi_tk4_pramuka * $belakang_prodi_tk4_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_tk4_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_tk4_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_tk4_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_tk4_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_tk4_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_tk4_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_tk4_pramuka, dec())."<br>";
    //     }

    // //Prodi prodi
    // $depan_prodi_tkj_wirausaha = sqrt($dua_phi*$s2_prodi_tkj_wirausaha);
    // $belakang_prodi_tkj_wirausaha = exp( ((pow($jurusan-$x_prodi_tkj_wirausaha,2)) / (2*$s2_pangkat2_prodi_tkj_wirausaha)));
    // $prob_prodi_tkj_wirausaha = 1/($depan_prodi_tkj_wirausaha * $belakang_prodi_tkj_wirausaha);
    //     //koleris
    // $depan_prodi_tkj_kemanusiaan = sqrt($dua_phi*$s2_prodi_tkj_kemanusiaan);
    // $belakang_prodi_tkj_kemanusiaan = exp( ((pow($jurusan-$x_prodi_tkj_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_tkj_kemanusiaan)));
    // $prob_prodi_tkj_kemanusiaan = 1/($depan_prodi_tkj_kemanusiaan * $belakang_prodi_tkj_kemanusiaan);
    //     //melankolis
    // $depan_prodi_tkj_senior = sqrt($dua_phi*$s2_prodi_tkj_senior);
    // $belakang_prodi_tkj_senior = exp( ((pow($jurusan-$x_prodi_tkj_senior,2)) / (2*$s2_pangkat2_prodi_tkj_senior)));
    // $prob_prodi_tkj_senior = 1/($depan_prodi_tkj_senior * $belakang_prodi_tkj_senior);
    //     //koleris
    // $depan_prodi_tkj_mapala = sqrt($dua_phi*$s2_prodi_tkj_mapala);
    // $belakang_prodi_tkj_mapala = exp( ((pow($jurusan-$x_prodi_tkj_mapala,2)) / (2*$s2_pangkat2_prodi_tkj_mapala)));
    // $prob_prodi_tkj_mapala = 1/($depan_prodi_tkj_mapala * $belakang_prodi_tkj_mapala);
    //     //koleris
    // $depan_prodi_tkj_persma = sqrt($dua_phi*$s2_prodi_tkj_persma);
    // $belakang_prodi_tkj_persma = exp( ((pow($jurusan-$x_prodi_tkj_persma,2)) / (2*$s2_pangkat2_prodi_tkj_persma)));
    // $prob_prodi_tkj_persma = 1/($depan_prodi_tkj_persma * $belakang_prodi_tkj_persma);
    //     //koleris
    // $depan_prodi_tkj_bahasa = sqrt($dua_phi*$s2_prodi_tkj_bahasa);
    // $belakang_prodi_tkj_bahasa = exp( ((pow($jurusan-$x_prodi_tkj_bahasa,2)) / (2*$s2_pangkat2_prodi_tkj_bahasa)));
    // $prob_prodi_tkj_bahasa = 1/($depan_prodi_tkj_bahasa * $belakang_prodi_tkj_bahasa);
    //     //koleris
    // $depan_prodi_tkj_pramuka = sqrt($dua_phi*$s2_prodi_tkj_pramuka);
    // $belakang_prodi_tkj_pramuka = exp( ((pow($jurusan-$x_prodi_tkj_pramuka,2)) / (2*$s2_pangkat2_prodi_tkj_pramuka)));
    // $prob_prodi_tkj_pramuka = 1/($depan_prodi_tkj_pramuka * $belakang_prodi_tkj_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_tkj_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_tkj_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_tkj_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_tkj_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_tkj_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_tkj_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_tkj_pramuka, dec())."<br>";
    //     }

    // //Prodi prodi
    // $depan_prodi_tks4_wirausaha = sqrt($dua_phi*$s2_prodi_tks4_wirausaha);
    // $belakang_prodi_tks4_wirausaha = exp( ((pow($jurusan-$x_prodi_tks4_wirausaha,2)) / (2*$s2_pangkat2_prodi_tks4_wirausaha)));
    // $prob_prodi_tks4_wirausaha = 1/($depan_prodi_tks4_wirausaha * $belakang_prodi_tks4_wirausaha);
    //     //koleris
    // $depan_prodi_tks4_kemanusiaan = sqrt($dua_phi*$s2_prodi_tks4_kemanusiaan);
    // $belakang_prodi_tks4_kemanusiaan = exp( ((pow($jurusan-$x_prodi_tks4_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_tks4_kemanusiaan)));
    // $prob_prodi_tks4_kemanusiaan = 1/($depan_prodi_tks4_kemanusiaan * $belakang_prodi_tks4_kemanusiaan);
    //     //melankolis
    // $depan_prodi_tks4_senior = sqrt($dua_phi*$s2_prodi_tks4_senior);
    // $belakang_prodi_tks4_senior = exp( ((pow($jurusan-$x_prodi_tks4_senior,2)) / (2*$s2_pangkat2_prodi_tks4_senior)));
    // $prob_prodi_tks4_senior = 1/($depan_prodi_tks4_senior * $belakang_prodi_tks4_senior);
    //     //koleris
    // $depan_prodi_tks4_mapala = sqrt($dua_phi*$s2_prodi_tks4_mapala);
    // $belakang_prodi_tks4_mapala = exp( ((pow($jurusan-$x_prodi_tks4_mapala,2)) / (2*$s2_pangkat2_prodi_tks4_mapala)));
    // $prob_prodi_tks4_mapala = 1/($depan_prodi_tks4_mapala * $belakang_prodi_tks4_mapala);
    //     //koleris
    // $depan_prodi_tks4_persma = sqrt($dua_phi*$s2_prodi_tks4_persma);
    // $belakang_prodi_tks4_persma = exp( ((pow($jurusan-$x_prodi_tks4_persma,2)) / (2*$s2_pangkat2_prodi_tks4_persma)));
    // $prob_prodi_tks4_persma = 1/($depan_prodi_tks4_persma * $belakang_prodi_tks4_persma);
    //     //koleris
    // $depan_prodi_tks4_bahasa = sqrt($dua_phi*$s2_prodi_tks4_bahasa);
    // $belakang_prodi_tks4_bahasa = exp( ((pow($jurusan-$x_prodi_tks4_bahasa,2)) / (2*$s2_pangkat2_prodi_tks4_bahasa)));
    // $prob_prodi_tks4_bahasa = 1/($depan_prodi_tks4_bahasa * $belakang_prodi_tks4_bahasa);
    //     //koleris
    // $depan_prodi_tks4_pramuka = sqrt($dua_phi*$s2_prodi_tks4_pramuka);
    // $belakang_prodi_tks4_pramuka = exp( ((pow($jurusan-$x_prodi_tks4_pramuka,2)) / (2*$s2_pangkat2_prodi_tks4_pramuka)));
    // $prob_prodi_tks4_pramuka = 1/($depan_prodi_tks4_pramuka * $belakang_prodi_tks4_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_tks4_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_tks4_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_tks4_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_tks4_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_tks4_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_tks4_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_tks4_pramuka, dec())."<br>";
    //     }

    // //Prodi prodi
    // $depan_prodi_tl4_wirausaha = sqrt($dua_phi*$s2_prodi_tl4_wirausaha);
    // $belakang_prodi_tl4_wirausaha = exp( ((pow($jurusan-$x_prodi_tl4_wirausaha,2)) / (2*$s2_pangkat2_prodi_tl4_wirausaha)));
    // $prob_prodi_tl4_wirausaha = 1/($depan_prodi_tl4_wirausaha * $belakang_prodi_tl4_wirausaha);
    //     //koleris
    // $depan_prodi_tl4_kemanusiaan = sqrt($dua_phi*$s2_prodi_tl4_kemanusiaan);
    // $belakang_prodi_tl4_kemanusiaan = exp( ((pow($jurusan-$x_prodi_tl4_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_tl4_kemanusiaan)));
    // $prob_prodi_tl4_kemanusiaan = 1/($depan_prodi_tl4_kemanusiaan * $belakang_prodi_tl4_kemanusiaan);
    //     //melankolis
    // $depan_prodi_tl4_senior = sqrt($dua_phi*$s2_prodi_tl4_senior);
    // $belakang_prodi_tl4_senior = exp( ((pow($jurusan-$x_prodi_tl4_senior,2)) / (2*$s2_pangkat2_prodi_tl4_senior)));
    // $prob_prodi_tl4_senior = 1/($depan_prodi_tl4_senior * $belakang_prodi_tl4_senior);
    //     //koleris
    // $depan_prodi_tl4_mapala = sqrt($dua_phi*$s2_prodi_tl4_mapala);
    // $belakang_prodi_tl4_mapala = exp( ((pow($jurusan-$x_prodi_tl4_mapala,2)) / (2*$s2_pangkat2_prodi_tl4_mapala)));
    // $prob_prodi_tl4_mapala = 1/($depan_prodi_tl4_mapala * $belakang_prodi_tl4_mapala);
    //     //koleris
    // $depan_prodi_tl4_persma = sqrt($dua_phi*$s2_prodi_tl4_persma);
    // $belakang_prodi_tl4_persma = exp( ((pow($jurusan-$x_prodi_tl4_persma,2)) / (2*$s2_pangkat2_prodi_tl4_persma)));
    // $prob_prodi_tl4_persma = 1/($depan_prodi_tl4_persma * $belakang_prodi_tl4_persma);
    //     //koleris
    // $depan_prodi_tl4_bahasa = sqrt($dua_phi*$s2_prodi_tl4_bahasa);
    // $belakang_prodi_tl4_bahasa = exp( ((pow($jurusan-$x_prodi_tl4_bahasa,2)) / (2*$s2_pangkat2_prodi_tl4_bahasa)));
    // $prob_prodi_tl4_bahasa = 1/($depan_prodi_tl4_bahasa * $belakang_prodi_tl4_bahasa);
    //     //koleris
    // $depan_prodi_tl4_pramuka = sqrt($dua_phi*$s2_prodi_tl4_pramuka);
    // $belakang_prodi_tl4_pramuka = exp( ((pow($jurusan-$x_prodi_tl4_pramuka,2)) / (2*$s2_pangkat2_prodi_tl4_pramuka)));
    // $prob_prodi_tl4_pramuka = 1/($depan_prodi_tl4_pramuka * $belakang_prodi_tl4_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_tl4_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_tl4_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_tl4_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_tl4_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_tl4_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_tl4_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_tl4_pramuka, dec())."<br>";
    //     }

    // //Prodi prodi
    // $depan_prodi_tmf4_wirausaha = sqrt($dua_phi*$s2_prodi_tmf4_wirausaha);
    // $belakang_prodi_tmf4_wirausaha = exp( ((pow($jurusan-$x_prodi_tmf4_wirausaha,2)) / (2*$s2_pangkat2_prodi_tmf4_wirausaha)));
    // $prob_prodi_tmf4_wirausaha = 1/($depan_prodi_tmf4_wirausaha * $belakang_prodi_tmf4_wirausaha);
    //     //koleris
    // $depan_prodi_tmf4_kemanusiaan = sqrt($dua_phi*$s2_prodi_tmf4_kemanusiaan);
    // $belakang_prodi_tmf4_kemanusiaan = exp( ((pow($jurusan-$x_prodi_tmf4_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_tmf4_kemanusiaan)));
    // $prob_prodi_tmf4_kemanusiaan = 1/($depan_prodi_tmf4_kemanusiaan * $belakang_prodi_tmf4_kemanusiaan);
    //     //melankolis
    // $depan_prodi_tmf4_senior = sqrt($dua_phi*$s2_prodi_tmf4_senior);
    // $belakang_prodi_tmf4_senior = exp( ((pow($jurusan-$x_prodi_tmf4_senior,2)) / (2*$s2_pangkat2_prodi_tmf4_senior)));
    // $prob_prodi_tmf4_senior = 1/($depan_prodi_tmf4_senior * $belakang_prodi_tmf4_senior);
    //     //koleris
    // $depan_prodi_tmf4_mapala = sqrt($dua_phi*$s2_prodi_tmf4_mapala);
    // $belakang_prodi_tmf4_mapala = exp( ((pow($jurusan-$x_prodi_tmf4_mapala,2)) / (2*$s2_pangkat2_prodi_tmf4_mapala)));
    // $prob_prodi_tmf4_mapala = 1/($depan_prodi_tmf4_mapala * $belakang_prodi_tmf4_mapala);
    //     //koleris
    // $depan_prodi_tmf4_persma = sqrt($dua_phi*$s2_prodi_tmf4_persma);
    // $belakang_prodi_tmf4_persma = exp( ((pow($jurusan-$x_prodi_tmf4_persma,2)) / (2*$s2_pangkat2_prodi_tmf4_persma)));
    // $prob_prodi_tmf4_persma = 1/($depan_prodi_tmf4_persma * $belakang_prodi_tmf4_persma);
    //     //koleris
    // $depan_prodi_tmf4_bahasa = sqrt($dua_phi*$s2_prodi_tmf4_bahasa);
    // $belakang_prodi_tmf4_bahasa = exp( ((pow($jurusan-$x_prodi_tmf4_bahasa,2)) / (2*$s2_pangkat2_prodi_tmf4_bahasa)));
    // $prob_prodi_tmf4_bahasa = 1/($depan_prodi_tmf4_bahasa * $belakang_prodi_tmf4_bahasa);
    //     //koleris
    // $depan_prodi_tmf4_pramuka = sqrt($dua_phi*$s2_prodi_tmf4_pramuka);
    // $belakang_prodi_tmf4_pramuka = exp( ((pow($jurusan-$x_prodi_tmf4_pramuka,2)) / (2*$s2_pangkat2_prodi_tmf4_pramuka)));
    // $prob_prodi_tmf4_pramuka = 1/($depan_prodi_tmf4_pramuka * $belakang_prodi_tmf4_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_tmf4_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_tmf4_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_tmf4_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_tmf4_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_tmf4_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_tmf4_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_tmf4_pramuka, dec())."<br>";
    //     }

    // //Prodi prodi
    // $depan_prodi_tmk4_wirausaha = sqrt($dua_phi*$s2_prodi_tmk4_wirausaha);
    // $belakang_prodi_tmk4_wirausaha = exp( ((pow($jurusan-$x_prodi_tmk4_wirausaha,2)) / (2*$s2_pangkat2_prodi_tmk4_wirausaha)));
    // $prob_prodi_tmk4_wirausaha = 1/($depan_prodi_tmk4_wirausaha * $belakang_prodi_tmk4_wirausaha);
    //     //koleris
    // $depan_prodi_tmk4_kemanusiaan = sqrt($dua_phi*$s2_prodi_tmk4_kemanusiaan);
    // $belakang_prodi_tmk4_kemanusiaan = exp( ((pow($jurusan-$x_prodi_tmk4_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_tmk4_kemanusiaan)));
    // $prob_prodi_tmk4_kemanusiaan = 1/($depan_prodi_tmk4_kemanusiaan * $belakang_prodi_tmk4_kemanusiaan);
    //     //melankolis
    // $depan_prodi_tmk4_senior = sqrt($dua_phi*$s2_prodi_tmk4_senior);
    // $belakang_prodi_tmk4_senior = exp( ((pow($jurusan-$x_prodi_tmk4_senior,2)) / (2*$s2_pangkat2_prodi_tmk4_senior)));
    // $prob_prodi_tmk4_senior = 1/($depan_prodi_tmk4_senior * $belakang_prodi_tmk4_senior);
    //     //koleris
    // $depan_prodi_tmk4_mapala = sqrt($dua_phi*$s2_prodi_tmk4_mapala);
    // $belakang_prodi_tmk4_mapala = exp( ((pow($jurusan-$x_prodi_tmk4_mapala,2)) / (2*$s2_pangkat2_prodi_tmk4_mapala)));
    // $prob_prodi_tmk4_mapala = 1/($depan_prodi_tmk4_mapala * $belakang_prodi_tmk4_mapala);
    //     //koleris
    // $depan_prodi_tmk4_persma = sqrt($dua_phi*$s2_prodi_tmk4_persma);
    // $belakang_prodi_tmk4_persma = exp( ((pow($jurusan-$x_prodi_tmk4_persma,2)) / (2*$s2_pangkat2_prodi_tmk4_persma)));
    // $prob_prodi_tmk4_persma = 1/($depan_prodi_tmk4_persma * $belakang_prodi_tmk4_persma);
    //     //koleris
    // $depan_prodi_tmk4_bahasa = sqrt($dua_phi*$s2_prodi_tmk4_bahasa);
    // $belakang_prodi_tmk4_bahasa = exp( ((pow($jurusan-$x_prodi_tmk4_bahasa,2)) / (2*$s2_pangkat2_prodi_tmk4_bahasa)));
    // $prob_prodi_tmk4_bahasa = 1/($depan_prodi_tmk4_bahasa * $belakang_prodi_tmk4_bahasa);
    //     //koleris
    // $depan_prodi_tmk4_pramuka = sqrt($dua_phi*$s2_prodi_tmk4_pramuka);
    // $belakang_prodi_tmk4_pramuka = exp( ((pow($jurusan-$x_prodi_tmk4_pramuka,2)) / (2*$s2_pangkat2_prodi_tmk4_pramuka)));
    // $prob_prodi_tmk4_pramuka = 1/($depan_prodi_tmk4_pramuka * $belakang_prodi_tmk4_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_tmk4_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_tmk4_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_tmk4_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_tmk4_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_tmk4_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_tmk4_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_tmk4_pramuka, dec())."<br>";
    //     }

    // //Prodi prodi
    // $depan_prodi_tmj_wirausaha = sqrt($dua_phi*$s2_prodi_tmj_wirausaha);
    // $belakang_prodi_tmj_wirausaha = exp( ((pow($jurusan-$x_prodi_tmj_wirausaha,2)) / (2*$s2_pangkat2_prodi_tmj_wirausaha)));
    // $prob_prodi_tmj_wirausaha = 1/($depan_prodi_tmj_wirausaha * $belakang_prodi_tmj_wirausaha);
    //     //koleris
    // $depan_prodi_tmj_kemanusiaan = sqrt($dua_phi*$s2_prodi_tmj_kemanusiaan);
    // $belakang_prodi_tmj_kemanusiaan = exp( ((pow($jurusan-$x_prodi_tmj_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_tmj_kemanusiaan)));
    // $prob_prodi_tmj_kemanusiaan = 1/($depan_prodi_tmj_kemanusiaan * $belakang_prodi_tmj_kemanusiaan);
    //     //melankolis
    // $depan_prodi_tmj_senior = sqrt($dua_phi*$s2_prodi_tmj_senior);
    // $belakang_prodi_tmj_senior = exp( ((pow($jurusan-$x_prodi_tmj_senior,2)) / (2*$s2_pangkat2_prodi_tmj_senior)));
    // $prob_prodi_tmj_senior = 1/($depan_prodi_tmj_senior * $belakang_prodi_tmj_senior);
    //     //koleris
    // $depan_prodi_tmj_mapala = sqrt($dua_phi*$s2_prodi_tmj_mapala);
    // $belakang_prodi_tmj_mapala = exp( ((pow($jurusan-$x_prodi_tmj_mapala,2)) / (2*$s2_pangkat2_prodi_tmj_mapala)));
    // $prob_prodi_tmj_mapala = 1/($depan_prodi_tmj_mapala * $belakang_prodi_tmj_mapala);
    //     //koleris
    // $depan_prodi_tmj_persma = sqrt($dua_phi*$s2_prodi_tmj_persma);
    // $belakang_prodi_tmj_persma = exp( ((pow($jurusan-$x_prodi_tmj_persma,2)) / (2*$s2_pangkat2_prodi_tmj_persma)));
    // $prob_prodi_tmj_persma = 1/($depan_prodi_tmj_persma * $belakang_prodi_tmj_persma);
    //     //koleris
    // $depan_prodi_tmj_bahasa = sqrt($dua_phi*$s2_prodi_tmj_bahasa);
    // $belakang_prodi_tmj_bahasa = exp( ((pow($jurusan-$x_prodi_tmj_bahasa,2)) / (2*$s2_pangkat2_prodi_tmj_bahasa)));
    // $prob_prodi_tmj_bahasa = 1/($depan_prodi_tmj_bahasa * $belakang_prodi_tmj_bahasa);
    //     //koleris
    // $depan_prodi_tmj_pramuka = sqrt($dua_phi*$s2_prodi_tmj_pramuka);
    // $belakang_prodi_tmj_pramuka = exp( ((pow($jurusan-$x_prodi_tmj_pramuka,2)) / (2*$s2_pangkat2_prodi_tmj_pramuka)));
    // $prob_prodi_tmj_pramuka = 1/($depan_prodi_tmj_pramuka * $belakang_prodi_tmj_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_tmj_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_tmj_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_tmj_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_tmj_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_tmj_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_tmj_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_tmj_pramuka, dec())."<br>";
    //     }

    // //Prodi prodi
    // $depan_prodi_tpe_wirausaha = sqrt($dua_phi*$s2_prodi_tpe_wirausaha);
    // $belakang_prodi_tpe_wirausaha = exp( ((pow($jurusan-$x_prodi_tpe_wirausaha,2)) / (2*$s2_pangkat2_prodi_tpe_wirausaha)));
    // $prob_prodi_tpe_wirausaha = 1/($depan_prodi_tpe_wirausaha * $belakang_prodi_tpe_wirausaha);
    //     //koleris
    // $depan_prodi_tpe_kemanusiaan = sqrt($dua_phi*$s2_prodi_tpe_kemanusiaan);
    // $belakang_prodi_tpe_kemanusiaan = exp( ((pow($jurusan-$x_prodi_tpe_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_tpe_kemanusiaan)));
    // $prob_prodi_tpe_kemanusiaan = 1/($depan_prodi_tpe_kemanusiaan * $belakang_prodi_tpe_kemanusiaan);
    //     //melankolis
    // $depan_prodi_tpe_senior = sqrt($dua_phi*$s2_prodi_tpe_senior);
    // $belakang_prodi_tpe_senior = exp( ((pow($jurusan-$x_prodi_tpe_senior,2)) / (2*$s2_pangkat2_prodi_tpe_senior)));
    // $prob_prodi_tpe_senior = 1/($depan_prodi_tpe_senior * $belakang_prodi_tpe_senior);
    //     //koleris
    // $depan_prodi_tpe_mapala = sqrt($dua_phi*$s2_prodi_tpe_mapala);
    // $belakang_prodi_tpe_mapala = exp( ((pow($jurusan-$x_prodi_tpe_mapala,2)) / (2*$s2_pangkat2_prodi_tpe_mapala)));
    // $prob_prodi_tpe_mapala = 1/($depan_prodi_tpe_mapala * $belakang_prodi_tpe_mapala);
    //     //koleris
    // $depan_prodi_tpe_persma = sqrt($dua_phi*$s2_prodi_tpe_persma);
    // $belakang_prodi_tpe_persma = exp( ((pow($jurusan-$x_prodi_tpe_persma,2)) / (2*$s2_pangkat2_prodi_tpe_persma)));
    // $prob_prodi_tpe_persma = 1/($depan_prodi_tpe_persma * $belakang_prodi_tpe_persma);
    //     //koleris
    // $depan_prodi_tpe_bahasa = sqrt($dua_phi*$s2_prodi_tpe_bahasa);
    // $belakang_prodi_tpe_bahasa = exp( ((pow($jurusan-$x_prodi_tpe_bahasa,2)) / (2*$s2_pangkat2_prodi_tpe_bahasa)));
    // $prob_prodi_tpe_bahasa = 1/($depan_prodi_tpe_bahasa * $belakang_prodi_tpe_bahasa);
    //     //koleris
    // $depan_prodi_tpe_pramuka = sqrt($dua_phi*$s2_prodi_tpe_pramuka);
    // $belakang_prodi_tpe_pramuka = exp( ((pow($jurusan-$x_prodi_tpe_pramuka,2)) / (2*$s2_pangkat2_prodi_tpe_pramuka)));
    // $prob_prodi_tpe_pramuka = 1/($depan_prodi_tpe_pramuka * $belakang_prodi_tpe_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_tpe_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_tpe_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_tpe_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_tpe_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_tpe_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_tpe_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_tpe_pramuka, dec())."<br>";
    //     }

    // //Prodi prodi
    // $depan_prodi_tki_wirausaha = sqrt($dua_phi*$s2_prodi_tki_wirausaha);
    // $belakang_prodi_tki_wirausaha = exp( ((pow($jurusan-$x_prodi_tki_wirausaha,2)) / (2*$s2_pangkat2_prodi_tki_wirausaha)));
    // $prob_prodi_tki_wirausaha = 1/($depan_prodi_tki_wirausaha * $belakang_prodi_tki_wirausaha);
    //     //koleris
    // $depan_prodi_tki_kemanusiaan = sqrt($dua_phi*$s2_prodi_tki_kemanusiaan);
    // $belakang_prodi_tki_kemanusiaan = exp( ((pow($jurusan-$x_prodi_tki_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_tki_kemanusiaan)));
    // $prob_prodi_tki_kemanusiaan = 1/($depan_prodi_tki_kemanusiaan * $belakang_prodi_tki_kemanusiaan);
    //     //melankolis
    // $depan_prodi_tki_senior = sqrt($dua_phi*$s2_prodi_tki_senior);
    // $belakang_prodi_tki_senior = exp( ((pow($jurusan-$x_prodi_tki_senior,2)) / (2*$s2_pangkat2_prodi_tki_senior)));
    // $prob_prodi_tki_senior = 1/($depan_prodi_tki_senior * $belakang_prodi_tki_senior);
    //     //koleris
    // $depan_prodi_tki_mapala = sqrt($dua_phi*$s2_prodi_tki_mapala);
    // $belakang_prodi_tki_mapala = exp( ((pow($jurusan-$x_prodi_tki_mapala,2)) / (2*$s2_pangkat2_prodi_tki_mapala)));
    // $prob_prodi_tki_mapala = 1/($depan_prodi_tki_mapala * $belakang_prodi_tki_mapala);
    //     //koleris
    // $depan_prodi_tki_persma = sqrt($dua_phi*$s2_prodi_tki_persma);
    // $belakang_prodi_tki_persma = exp( ((pow($jurusan-$x_prodi_tki_persma,2)) / (2*$s2_pangkat2_prodi_tki_persma)));
    // $prob_prodi_tki_persma = 1/($depan_prodi_tki_persma * $belakang_prodi_tki_persma);
    //     //koleris
    // $depan_prodi_tki_bahasa = sqrt($dua_phi*$s2_prodi_tki_bahasa);
    // $belakang_prodi_tki_bahasa = exp( ((pow($jurusan-$x_prodi_tki_bahasa,2)) / (2*$s2_pangkat2_prodi_tki_bahasa)));
    // $prob_prodi_tki_bahasa = 1/($depan_prodi_tki_bahasa * $belakang_prodi_tki_bahasa);
    //     //koleris
    // $depan_prodi_tki_pramuka = sqrt($dua_phi*$s2_prodi_tki_pramuka);
    // $belakang_prodi_tki_pramuka = exp( ((pow($jurusan-$x_prodi_tki_pramuka,2)) / (2*$s2_pangkat2_prodi_tki_pramuka)));
    // $prob_prodi_tki_pramuka = 1/($depan_prodi_tki_pramuka * $belakang_prodi_tki_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(prodi|Wirausaha)=".number_format($prob_prodi_tki_wirausaha, dec())."<br>";
    // echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_tki_kemanusiaan, dec())."<br>";
    // echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_tki_senior, dec())."<br>";
    // echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_tki_mapala, dec())."<br>";
    // echo "P(prodi|Persma)=".number_format($prob_prodi_tki_persma, dec())."<br>";
    // echo "P(prodi|Bahasa)=".number_format($prob_prodi_tki_bahasa, dec())."<br>";
    // echo "P(prodi|Pramuka))=".number_format($prob_prodi_tki_pramuka, dec())."<br>";
    //     }

    // //Minat minat
    // $depan_minat_seni_wirusaha = sqrt($dua_phi*$s2_minat_seni_wirusaha);
    // $belakang_minat_seni_wirusaha = exp( ((pow($jurusan-$x_minat_seni_wirusaha,2)) / (2*$s2_pangkat2_minat_seni_wirusaha)));
    // $prob_minat_seni_wirusaha = 1/($depan_minat_seni_wirusaha * $belakang_minat_seni_wirusaha);
    //     //koleris
    // $depan_minat_seni_kemanusiaan = sqrt($dua_phi*$s2_minat_seni_kemanusiaan);
    // $belakang_minat_seni_kemanusiaan = exp( ((pow($jurusan-$x_minat_seni_kemanusiaan,2)) / (2*$s2_pangkat2_minat_seni_kemanusiaan)));
    // $prob_minat_seni_kemanusiaan = 1/($depan_minat_seni_kemanusiaan * $belakang_minat_seni_kemanusiaan);
    //     //melankolis
    // $depan_minat_seni_senior = sqrt($dua_phi*$s2_minat_seni_senior);
    // $belakang_minat_seni_senior = exp( ((pow($jurusan-$x_minat_seni_senior,2)) / (2*$s2_pangkat2_minat_seni_senior)));
    // $prob_minat_seni_senior = 1/($depan_minat_seni_senior * $belakang_minat_seni_senior);
    //     //koleris
    // $depan_minat_seni_mapala = sqrt($dua_phi*$s2_minat_seni_mapala);
    // $belakang_minat_seni_mapala = exp( ((pow($jurusan-$x_minat_seni_mapala,2)) / (2*$s2_pangkat2_minat_seni_mapala)));
    // $prob_minat_seni_mapala = 1/($depan_minat_seni_mapala * $belakang_minat_seni_mapala);
    //     //koleris
    // $depan_minat_seni_persma = sqrt($dua_phi*$s2_minat_seni_persma);
    // $belakang_minat_seni_persma = exp( ((pow($jurusan-$x_minat_seni_persma,2)) / (2*$s2_pangkat2_minat_seni_persma)));
    // $prob_minat_seni_persma = 1/($depan_minat_seni_persma * $belakang_minat_seni_persma);
    //     //koleris
    // $depan_minat_seni_bahasa = sqrt($dua_phi*$s2_minat_seni_bahasa);
    // $belakang_minat_seni_bahasa = exp( ((pow($jurusan-$x_minat_seni_bahasa,2)) / (2*$s2_pangkat2_minat_seni_bahasa)));
    // $prob_minat_seni_bahasa = 1/($depan_minat_seni_bahasa * $belakang_minat_seni_bahasa);
    //     //koleris
    // $depan_minat_seni_pramuka = sqrt($dua_phi*$s2_minat_seni_pramuka);
    // $belakang_minat_seni_pramuka = exp( ((pow($jurusan-$x_minat_seni_pramuka,2)) / (2*$s2_pangkat2_minat_seni_pramuka)));
    // $prob_minat_seni_pramuka = 1/($depan_minat_seni_pramuka * $belakang_minat_seni_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(minat|Wirausaha)=".number_format($prob_minat_seni_wirusaha, dec())."<br>";
    // echo "P(minat|Kemanusiaan (ksr, humaniora))=".number_format($prob_minat_seni_kemanusiaan, dec())."<br>";
    // echo "P(minat|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_minat_seni_senior, dec())."<br>";
    // echo "P(minat|Pecinta Alam (MAPALA))=".number_format($prob_minat_seni_mapala, dec())."<br>";
    // echo "P(minat|Persma)=".number_format($prob_minat_seni_persma, dec())."<br>";
    // echo "P(minat|Bahasa)=".number_format($prob_minat_seni_bahasa, dec())."<br>";
    // echo "P(minat|Pramuka))=".number_format($prob_minat_seni_pramuka, dec())."<br>";
    //     }

    // //Minat minat
    // $depan_minat_olahraga_wirusaha = sqrt($dua_phi*$s2_minat_olahraga_wirusaha);
    // $belakang_minat_olahraga_wirusaha = exp( ((pow($jurusan-$x_minat_olahraga_wirusaha,2)) / (2*$s2_pangkat2_minat_olahraga_wirusaha)));
    // $prob_minat_olahraga_wirusaha = 1/($depan_minat_olahraga_wirusaha * $belakang_minat_olahraga_wirusaha);
    //     //koleris
    // $depan_minat_olahraga_kemanusiaan = sqrt($dua_phi*$s2_minat_olahraga_kemanusiaan);
    // $belakang_minat_olahraga_kemanusiaan = exp( ((pow($jurusan-$x_minat_olahraga_kemanusiaan,2)) / (2*$s2_pangkat2_minat_olahraga_kemanusiaan)));
    // $prob_minat_olahraga_kemanusiaan = 1/($depan_minat_olahraga_kemanusiaan * $belakang_minat_olahraga_kemanusiaan);
    //     //melankolis
    // $depan_minat_olahraga_senior = sqrt($dua_phi*$s2_minat_olahraga_senior);
    // $belakang_minat_olahraga_senior = exp( ((pow($jurusan-$x_minat_olahraga_senior,2)) / (2*$s2_pangkat2_minat_olahraga_senior)));
    // $prob_minat_olahraga_senior = 1/($depan_minat_olahraga_senior * $belakang_minat_olahraga_senior);
    //     //koleris
    // $depan_minat_olahraga_mapala = sqrt($dua_phi*$s2_minat_olahraga_mapala);
    // $belakang_minat_olahraga_mapala = exp( ((pow($jurusan-$x_minat_olahraga_mapala,2)) / (2*$s2_pangkat2_minat_olahraga_mapala)));
    // $prob_minat_olahraga_mapala = 1/($depan_minat_olahraga_mapala * $belakang_minat_olahraga_mapala);
    //     //koleris
    // $depan_minat_olahraga_persma = sqrt($dua_phi*$s2_minat_olahraga_persma);
    // $belakang_minat_olahraga_persma = exp( ((pow($jurusan-$x_minat_olahraga_persma,2)) / (2*$s2_pangkat2_minat_olahraga_persma)));
    // $prob_minat_olahraga_persma = 1/($depan_minat_olahraga_persma * $belakang_minat_olahraga_persma);
    //     //koleris
    // $depan_minat_olahraga_bahasa = sqrt($dua_phi*$s2_minat_olahraga_bahasa);
    // $belakang_minat_olahraga_bahasa = exp( ((pow($jurusan-$x_minat_olahraga_bahasa,2)) / (2*$s2_pangkat2_minat_olahraga_bahasa)));
    // $prob_minat_olahraga_bahasa = 1/($depan_minat_olahraga_bahasa * $belakang_minat_olahraga_bahasa);
    //     //koleris
    // $depan_minat_olahraga_pramuka = sqrt($dua_phi*$s2_minat_olahraga_pramuka);
    // $belakang_minat_olahraga_pramuka = exp( ((pow($jurusan-$x_minat_olahraga_pramuka,2)) / (2*$s2_pangkat2_minat_olahraga_pramuka)));
    // $prob_minat_olahraga_pramuka = 1/($depan_minat_olahraga_pramuka * $belakang_minat_olahraga_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(minat|Wirausaha)=".number_format($prob_minat_olahraga_wirusaha, dec())."<br>";
    // echo "P(minat|Kemanusiaan (ksr, humaniora))=".number_format($prob_minat_olahraga_kemanusiaan, dec())."<br>";
    // echo "P(minat|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_minat_olahraga_senior, dec())."<br>";
    // echo "P(minat|Pecinta Alam (MAPALA))=".number_format($prob_minat_olahraga_mapala, dec())."<br>";
    // echo "P(minat|Persma)=".number_format($prob_minat_olahraga_persma, dec())."<br>";
    // echo "P(minat|Bahasa)=".number_format($prob_minat_olahraga_bahasa, dec())."<br>";
    // echo "P(minat|Pramuka))=".number_format($prob_minat_olahraga_pramuka, dec())."<br>";
    //     }

    // //Minat minat
    // $depan_minat_mapala_wirusaha = sqrt($dua_phi*$s2_minat_mapala_wirusaha);
    // $belakang_minat_mapala_wirusaha = exp( ((pow($jurusan-$x_minat_mapala_wirusaha,2)) / (2*$s2_pangkat2_minat_mapala_wirusaha)));
    // $prob_minat_mapala_wirusaha = 1/($depan_minat_mapala_wirusaha * $belakang_minat_mapala_wirusaha);
    //     //koleris
    // $depan_minat_mapala_kemanusiaan = sqrt($dua_phi*$s2_minat_mapala_kemanusiaan);
    // $belakang_minat_mapala_kemanusiaan = exp( ((pow($jurusan-$x_minat_mapala_kemanusiaan,2)) / (2*$s2_pangkat2_minat_mapala_kemanusiaan)));
    // $prob_minat_mapala_kemanusiaan = 1/($depan_minat_mapala_kemanusiaan * $belakang_minat_mapala_kemanusiaan);
    //     //melankolis
    // $depan_minat_mapala_senior = sqrt($dua_phi*$s2_minat_mapala_senior);
    // $belakang_minat_mapala_senior = exp( ((pow($jurusan-$x_minat_mapala_senior,2)) / (2*$s2_pangkat2_minat_mapala_senior)));
    // $prob_minat_mapala_senior = 1/($depan_minat_mapala_senior * $belakang_minat_mapala_senior);
    //     //koleris
    // $depan_minat_mapala_mapala = sqrt($dua_phi*$s2_minat_mapala_mapala);
    // $belakang_minat_mapala_mapala = exp( ((pow($jurusan-$x_minat_mapala_mapala,2)) / (2*$s2_pangkat2_minat_mapala_mapala)));
    // $prob_minat_mapala_mapala = 1/($depan_minat_mapala_mapala * $belakang_minat_mapala_mapala);
    //     //koleris
    // $depan_minat_mapala_persma = sqrt($dua_phi*$s2_minat_mapala_persma);
    // $belakang_minat_mapala_persma = exp( ((pow($jurusan-$x_minat_mapala_persma,2)) / (2*$s2_pangkat2_minat_mapala_persma)));
    // $prob_minat_mapala_persma = 1/($depan_minat_mapala_persma * $belakang_minat_mapala_persma);
    //     //koleris
    // $depan_minat_mapala_bahasa = sqrt($dua_phi*$s2_minat_mapala_bahasa);
    // $belakang_minat_mapala_bahasa = exp( ((pow($jurusan-$x_minat_mapala_bahasa,2)) / (2*$s2_pangkat2_minat_mapala_bahasa)));
    // $prob_minat_mapala_bahasa = 1/($depan_minat_mapala_bahasa * $belakang_minat_mapala_bahasa);
    //     //koleris
    // $depan_minat_mapala_pramuka = sqrt($dua_phi*$s2_minat_mapala_pramuka);
    // $belakang_minat_mapala_pramuka = exp( ((pow($jurusan-$x_minat_mapala_pramuka,2)) / (2*$s2_pangkat2_minat_mapala_pramuka)));
    // $prob_minat_mapala_pramuka = 1/($depan_minat_mapala_pramuka * $belakang_minat_mapala_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(minat|Wirausaha)=".number_format($prob_minat_mapala_wirusaha, dec())."<br>";
    // echo "P(minat|Kemanusiaan (ksr, humaniora))=".number_format($prob_minat_mapala_kemanusiaan, dec())."<br>";
    // echo "P(minat|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_minat_mapala_senior, dec())."<br>";
    // echo "P(minat|Pecinta Alam (MAPALA))=".number_format($prob_minat_mapala_mapala, dec())."<br>";
    // echo "P(minat|Persma)=".number_format($prob_minat_mapala_persma, dec())."<br>";
    // echo "P(minat|Bahasa)=".number_format($prob_minat_mapala_bahasa, dec())."<br>";
    // echo "P(minat|Pramuka))=".number_format($prob_minat_mapala_pramuka, dec())."<br>";
    //     }

    // //Minat minat
    // $depan_minat_beladiri_wirusaha = sqrt($dua_phi*$s2_minat_beladiri_wirusaha);
    // $belakang_minat_beladiri_wirusaha = exp( ((pow($jurusan-$x_minat_beladiri_wirusaha,2)) / (2*$s2_pangkat2_minat_beladiri_wirusaha)));
    // $prob_minat_beladiri_wirusaha = 1/($depan_minat_beladiri_wirusaha * $belakang_minat_beladiri_wirusaha);
    //     //koleris
    // $depan_minat_beladiri_kemanusiaan = sqrt($dua_phi*$s2_minat_beladiri_kemanusiaan);
    // $belakang_minat_beladiri_kemanusiaan = exp( ((pow($jurusan-$x_minat_beladiri_kemanusiaan,2)) / (2*$s2_pangkat2_minat_beladiri_kemanusiaan)));
    // $prob_minat_beladiri_kemanusiaan = 1/($depan_minat_beladiri_kemanusiaan * $belakang_minat_beladiri_kemanusiaan);
    //     //melankolis
    // $depan_minat_beladiri_senior = sqrt($dua_phi*$s2_minat_beladiri_senior);
    // $belakang_minat_beladiri_senior = exp( ((pow($jurusan-$x_minat_beladiri_senior,2)) / (2*$s2_pangkat2_minat_beladiri_senior)));
    // $prob_minat_beladiri_senior = 1/($depan_minat_beladiri_senior * $belakang_minat_beladiri_senior);
    //     //koleris
    // $depan_minat_beladiri_mapala = sqrt($dua_phi*$s2_minat_beladiri_mapala);
    // $belakang_minat_beladiri_mapala = exp( ((pow($jurusan-$x_minat_beladiri_mapala,2)) / (2*$s2_pangkat2_minat_beladiri_mapala)));
    // $prob_minat_beladiri_mapala = 1/($depan_minat_beladiri_mapala * $belakang_minat_beladiri_mapala);
    //     //koleris
    // $depan_minat_beladiri_persma = sqrt($dua_phi*$s2_minat_beladiri_persma);
    // $belakang_minat_beladiri_persma = exp( ((pow($jurusan-$x_minat_beladiri_persma,2)) / (2*$s2_pangkat2_minat_beladiri_persma)));
    // $prob_minat_beladiri_persma = 1/($depan_minat_beladiri_persma * $belakang_minat_beladiri_persma);
    //     //koleris
    // $depan_minat_beladiri_bahasa = sqrt($dua_phi*$s2_minat_beladiri_bahasa);
    // $belakang_minat_beladiri_bahasa = exp( ((pow($jurusan-$x_minat_beladiri_bahasa,2)) / (2*$s2_pangkat2_minat_beladiri_bahasa)));
    // $prob_minat_beladiri_bahasa = 1/($depan_minat_beladiri_bahasa * $belakang_minat_beladiri_bahasa);
    //     //koleris
    // $depan_minat_beladiri_pramuka = sqrt($dua_phi*$s2_minat_beladiri_pramuka);
    // $belakang_minat_beladiri_pramuka = exp( ((pow($jurusan-$x_minat_beladiri_pramuka,2)) / (2*$s2_pangkat2_minat_beladiri_pramuka)));
    // $prob_minat_beladiri_pramuka = 1/($depan_minat_beladiri_pramuka * $belakang_minat_beladiri_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(minat|Wirausaha)=".number_format($prob_minat_beladiri_wirusaha, dec())."<br>";
    // echo "P(minat|Kemanusiaan (ksr, humaniora))=".number_format($prob_minat_beladiri_kemanusiaan, dec())."<br>";
    // echo "P(minat|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_minat_beladiri_senior, dec())."<br>";
    // echo "P(minat|Pecinta Alam (MAPALA))=".number_format($prob_minat_beladiri_mapala, dec())."<br>";
    // echo "P(minat|Persma)=".number_format($prob_minat_beladiri_persma, dec())."<br>";
    // echo "P(minat|Bahasa)=".number_format($prob_minat_beladiri_bahasa, dec())."<br>";
    // echo "P(minat|Pramuka))=".number_format($prob_minat_beladiri_pramuka, dec())."<br>";
    //     }

    // //Minat minat
    // $depan_minat_jurnalistik_wirusaha = sqrt($dua_phi*$s2_minat_jurnalistik_wirusaha);
    // $belakang_minat_jurnalistik_wirusaha = exp( ((pow($jurusan-$x_minat_jurnalistik_wirusaha,2)) / (2*$s2_pangkat2_minat_jurnalistik_wirusaha)));
    // $prob_minat_jurnalistik_wirusaha = 1/($depan_minat_jurnalistik_wirusaha * $belakang_minat_jurnalistik_wirusaha);
    //     //koleris
    // $depan_minat_jurnalistik_kemanusiaan = sqrt($dua_phi*$s2_minat_jurnalistik_kemanusiaan);
    // $belakang_minat_jurnalistik_kemanusiaan = exp( ((pow($jurusan-$x_minat_jurnalistik_kemanusiaan,2)) / (2*$s2_pangkat2_minat_jurnalistik_kemanusiaan)));
    // $prob_minat_jurnalistik_kemanusiaan = 1/($depan_minat_jurnalistik_kemanusiaan * $belakang_minat_jurnalistik_kemanusiaan);
    //     //melankolis
    // $depan_minat_jurnalistik_senior = sqrt($dua_phi*$s2_minat_jurnalistik_senior);
    // $belakang_minat_jurnalistik_senior = exp( ((pow($jurusan-$x_minat_jurnalistik_senior,2)) / (2*$s2_pangkat2_minat_jurnalistik_senior)));
    // $prob_minat_jurnalistik_senior = 1/($depan_minat_jurnalistik_senior * $belakang_minat_jurnalistik_senior);
    //     //koleris
    // $depan_minat_jurnalistik_mapala = sqrt($dua_phi*$s2_minat_jurnalistik_mapala);
    // $belakang_minat_jurnalistik_mapala = exp( ((pow($jurusan-$x_minat_jurnalistik_mapala,2)) / (2*$s2_pangkat2_minat_jurnalistik_mapala)));
    // $prob_minat_jurnalistik_mapala = 1/($depan_minat_jurnalistik_mapala * $belakang_minat_jurnalistik_mapala);
    //     //koleris
    // $depan_minat_jurnalistik_persma = sqrt($dua_phi*$s2_minat_jurnalistik_persma);
    // $belakang_minat_jurnalistik_persma = exp( ((pow($jurusan-$x_minat_jurnalistik_persma,2)) / (2*$s2_pangkat2_minat_jurnalistik_persma)));
    // $prob_minat_jurnalistik_persma = 1/($depan_minat_jurnalistik_persma * $belakang_minat_jurnalistiki_persma);
    //     //koleris
    // $depan_minat_jurnalistik_bahasa = sqrt($dua_phi*$s2_minat_jurnalistik_bahasa);
    // $belakang_minat_jurnalistik_bahasa = exp( ((pow($jurusan-$x_minat_jurnalistik_beladiri_bahasa,2)) / (2*$s2_pangkat2_minat_jurnalistik_bahasa)));
    // $prob_minat_jurnalistik_bahasa = 1/($depan_minat_jurnalistik_bahasa * $belakang_minat_jurnalistik_bahasa);
    //     //koleris
    // $depan_minat_jurnalistik_pramuka = sqrt($dua_phi*$s2_minat_jurnalistik_pramuka);
    // $belakang_minat_jurnalistik_pramuka = exp( ((pow($jurusan-$x_minat_jurnalistik_pramuka,2)) / (2*$s2_pangkat2_minat_jurnalistik_pramuka)));
    // $prob_minat_jurnalistik_pramuka = 1/($depan_minat_jurnalistik_pramuka * $belakang_minat_jurnalistik_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(minat|Wirausaha)=".number_format($prob_minat_jurnalistik_wirusaha, dec())."<br>";
    // echo "P(minat|Kemanusiaan (ksr, humaniora))=".number_format($prob_minat_jurnalistik_kemanusiaan, dec())."<br>";
    // echo "P(minat|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_minat_jurnalistik_senior, dec())."<br>";
    // echo "P(minat|Pecinta Alam (MAPALA))=".number_format($prob_minat_jurnalistik_mapala, dec())."<br>";
    // echo "P(minat|Persma)=".number_format($prob_minat_jurnalistik_persma, dec())."<br>";
    // echo "P(minat|Bahasa)=".number_format($prob_minat_jurnalistik_bahasa, dec())."<br>";
    // echo "P(minat|Pramuka))=".number_format($prob_minat_jurnalistik_pramuka, dec())."<br>";
    //     }

    // //Minat minat
    // $depan_minat_kesehatan_wirusaha = sqrt($dua_phi*$s2_minat_kesehatan_wirusaha);
    // $belakang_minat_kesehatan_wirusaha = exp( ((pow($jurusan-$x_minat_kesehatan_wirusaha,2)) / (2*$s2_pangkat2_minat_kesehatan_wirusaha)));
    // $prob_minat_kesehatan_wirusaha = 1/($depan_minat_kesehatan_wirusaha * $belakang_minat_kesehatan_wirusaha);
    //     //koleris
    // $depan_minat_kesehatan_kemanusiaan = sqrt($dua_phi*$s2_minat_kesehatan_kemanusiaan);
    // $belakang_minat_kesehatan_kemanusiaan = exp( ((pow($jurusan-$x_minat_kesehatan_kemanusiaan,2)) / (2*$s2_pangkat2_minat_kesehatan_kemanusiaan)));
    // $prob_minat_kesehatan_kemanusiaan = 1/($depan_minat_kesehatan_kemanusiaan * $belakang_minat_kesehatan_kemanusiaan);
    //     //melankolis
    // $depan_minat_kesehatan_senior = sqrt($dua_phi*$s2_minat_kesehatan_senior);
    // $belakang_minat_kesehatan_senior = exp( ((pow($jurusan-$x_minat_kesehatan_senior,2)) / (2*$s2_pangkat2_minat_kesehatan_senior)));
    // $prob_minat_kesehatan_senior = 1/($depan_minat_kesehatan_senior * $belakang_minat_kesehatan_senior);
    //     //koleris
    // $depan_minat_kesehatan_mapala = sqrt($dua_phi*$s2_minat_kesehatan_mapala);
    // $belakang_minat_kesehatan_mapala = exp( ((pow($jurusan-$x_minat_kesehatan_mapala,2)) / (2*$s2_pangkat2_minat_kesehatan_mapala)));
    // $prob_minat_kesehatan_mapala = 1/($depan_minat_kesehatan_mapala * $belakang_minat_kesehatan_mapala);
    //     //koleris
    // $depan_minat_kesehatan_persma = sqrt($dua_phi*$s2_minat_kesehatan_persma);
    // $belakang_minat_kesehatan_persma = exp( ((pow($jurusan-$x_minat_kesehatan_persma,2)) / (2*$s2_pangkat2_minat_kesehatan_persma)));
    // $prob_minat_kesehatan_persma = 1/($depan_minat_kesehatan_persma * $belakang_minat_kesehatan_persma);
    //     //koleris
    // $depan_minat_kesehatan_bahasa = sqrt($dua_phi*$s2_minat_kesehatan_bahasa);
    // $belakang_minat_kesehatan_bahasa = exp( ((pow($jurusan-$x_minat_kesehatan_bahasa,2)) / (2*$s2_pangkat2_minat_kesehatan_bahasa)));
    // $prob_minat_kesehatan_bahasa = 1/($depan_minat_kesehatan_bahasa * $belakang_minat_kesehatan_bahasa);
    //     //koleris
    // $depan_minat_kesehatan_pramuka = sqrt($dua_phi*$s2_minat_kesehatan_pramuka);
    // $belakang_minat_kesehatan_pramuka = exp( ((pow($jurusan-$x_minat_kesehatan_pramuka,2)) / (2*$s2_pangkat2_minat_kesehatan_pramuka)));
    // $prob_minat_kesehatan_pramuka = 1/($depan_minat_kesehatan_pramuka * $belakang_minat_kesehatan_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(minat|Wirausaha)=".number_format($prob_minat_kesehatan_wirusaha, dec())."<br>";
    // echo "P(minat|Kemanusiaan (ksr, humaniora))=".number_format($prob_minat_kesehatan_kemanusiaan, dec())."<br>";
    // echo "P(minat|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_minat_jurnalistik_senior, dec())."<br>";
    // echo "P(minat|Pecinta Alam (MAPALA))=".number_format($prob_minat_kesehatan_mapala, dec())."<br>";
    // echo "P(minat|Persma)=".number_format($prob_minat_kesehatan_persma, dec())."<br>";
    // echo "P(minat|Bahasa)=".number_format($prob_minat_kesehatan_bahasa, dec())."<br>";
    // echo "P(minat|Pramuka))=".number_format($prob_minat_kesehatan_pramuka, dec())."<br>";
    //     }

    // //Minat minat
    // $depan_minat_wirausaha_wirusaha = sqrt($dua_phi*$s2_minat_wirausaha_wirusaha);
    // $belakang_minat_wirausaha_wirusaha = exp( ((pow($jurusan-$x_minat_wirausaha_wirusaha,2)) / (2*$s2_pangkat2_minat_wirausaha_wirusaha)));
    // $prob_minat_wirausaha_wirusaha = 1/($depan_minat_wirausaha_wirusaha * $belakang_minat_wirausaha_wirusaha);
    //     //koleris
    // $depan_minat_wirausaha_kemanusiaan = sqrt($dua_phi*$s2_minat_wirausaha_kemanusiaan);
    // $belakang_minat_wirausaha_kemanusiaan = exp( ((pow($jurusan-$x_minat_wirausaha_kemanusiaan,2)) / (2*$s2_pangkat2_minat_wirausaha_kemanusiaan)));
    // $prob_minat_wirausaha_kemanusiaan = 1/($depan_minat_wirausaha_kemanusiaan * $belakang_minat_wirausaha_kemanusiaan);
    //     //melankolis
    // $depan_minat_wirausaha_senior = sqrt($dua_phi*$s2_minat_wirausaha_senior);
    // $belakang_minat_wirausaha_senior = exp( ((pow($jurusan-$x_minat_wirausaha_senior,2)) / (2*$s2_pangkat2_minat_wirausaha_senior)));
    // $prob_minat_wirausaha_senior = 1/($depan_minat_wirausaha_senior * $belakang_minat_wirausaha_senior);
    //     //koleris
    // $depan_minat_wirausaha_mapala = sqrt($dua_phi*$s2_minat_wirausaha_mapala);
    // $belakang_minat_wirausaha_mapala = exp( ((pow($jurusan-$x_minat_wirausaha_mapala,2)) / (2*$s2_pangkat2_minat_wirausaha_mapala)));
    // $prob_minat_wirausaha_mapala = 1/($depan_minat_wirausaha_mapala * $belakang_minat_wirausaha_mapala);
    //     //koleris
    // $depan_minat_wirausaha_persma = sqrt($dua_phi*$s2_minat_wirausaha_persma);
    // $belakang_minat_wirausaha_persma = exp( ((pow($jurusan-$x_minat_wirausaha_persma,2)) / (2*$s2_pangkat2_minat_wirausaha_persma)));
    // $prob_minat_wirausaha_persma = 1/($depan_minat_wirausaha_persma * $belakang_minat_wirausaha_persma);
    //     //koleris
    // $depan_minat_wirausaha_bahasa = sqrt($dua_phi*$s2_minat_wirausaha_bahasa);
    // $belakang_minat_wirausaha_bahasa = exp( ((pow($jurusan-$x_minat_wirausaha_bahasa,2)) / (2*$s2_pangkat2_minat_wirausaha_bahasa)));
    // $prob_minat_wirausaha_bahasa = 1/($depan_minat_wirausaha_bahasa * $belakang_minat_wirausaha_bahasa);
    //     //koleris
    // $depan_minat_wirausaha_pramuka = sqrt($dua_phi*$s2_minat_wirausaha_pramuka);
    // $belakang_minat_wirausaha_pramuka = exp( ((pow($jurusan-$x_minat_wirausaha_pramuka,2)) / (2*$s2_pangkat2_minat_wirausaha_pramuka)));
    // $prob_minat_wirausaha_pramuka = 1/($depan_minat_wirausaha_pramuka * $belakang_minat_wirausaha_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(minat|Wirausaha)=".number_format($prob_minat_wirausaha_wirusaha, dec())."<br>";
    // echo "P(minat|Kemanusiaan (ksr, humaniora))=".number_format($prob_minat_wirausaha_kemanusiaan, dec())."<br>";
    // echo "P(minat|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_minat_wirausaha_senior, dec())."<br>";
    // echo "P(minat|Pecinta Alam (MAPALA))=".number_format($prob_minat_wirausaha_mapala, dec())."<br>";
    // echo "P(minat|Persma)=".number_format($prob_minat_wirausaha_persma, dec())."<br>";
    // echo "P(minat|Bahasa)=".number_format($prob_minat_wirausaha_bahasa, dec())."<br>";
    // echo "P(minat|Pramuka))=".number_format($prob_minat_wirausaha_pramuka, dec())."<br>";
    //     }

    // //Minat minat
    // $depan_minat_bahasa_wirusaha = sqrt($dua_phi*$s2_minat_bahasa_wirusaha);
    // $belakang_minat_bahasa_wirusaha = exp( ((pow($jurusan-$x_minat_bahasa_wirusaha,2)) / (2*$s2_pangkat2_minat_bahasa_wirusaha)));
    // $prob_minat_bahasa_wirusaha = 1/($depan_minat_bahasa_wirusaha * $belakang_minat_bahasa_wirusaha);
    //     //koleris
    // $depan_minat_bahasa_kemanusiaan = sqrt($dua_phi*$s2_minat_bahasa_kemanusiaan);
    // $belakang_minat_bahasa_kemanusiaan = exp( ((pow($jurusan-$x_minat_bahasa_kemanusiaan,2)) / (2*$s2_pangkat2_minat_bahasa_kemanusiaan)));
    // $prob_minat_bahasa_kemanusiaan = 1/($depan_minat_bahasa_kemanusiaan * $belakang_minat_bahasa_kemanusiaan);
    //     //melankolis
    // $depan_minat_bahasa_senior = sqrt($dua_phi*$s2_minat_bahasa_senior);
    // $belakang_minat_bahasa_senior = exp( ((pow($jurusan-$x_minat_bahasa_senior,2)) / (2*$s2_pangkat2_minat_bahasa_senior)));
    // $prob_minat_bahasa_senior = 1/($depan_minat_bahasa_senior * $belakang_minat_bahasa_senior);
    //     //koleris
    // $depan_minat_bahasa_mapala = sqrt($dua_phi*$s2_minat_bahasa_mapala);
    // $belakang_minat_bahasa_mapala = exp( ((pow($jurusan-$x_minat_bahasa_mapala,2)) / (2*$s2_pangkat2_minat_bahasa_mapala)));
    // $prob_minat_bahasa_mapala = 1/($depan_minat_bahasa_mapala * $belakang_minat_bahasa_mapala);
    //     //koleris
    // $depan_minat_bahasa_persma = sqrt($dua_phi*$s2_minat_bahasa_persma);
    // $belakang_minat_bahasa_persma = exp( ((pow($jurusan-$x_minat_bahasa_persma,2)) / (2*$s2_pangkat2_minat_bahasa_persma)));
    // $prob_minat_bahasa_persma = 1/($depan_minat_bahasa_persma * $belakang_minat_bahasa_persma);
    //     //koleris
    // $depan_minat_bahasa_bahasa = sqrt($dua_phi*$s2_minat_bahasa_bahasa);
    // $belakang_minat_bahasa_bahasa = exp( ((pow($jurusan-$x_minat_bahasa_bahasa,2)) / (2*$s2_pangkat2_minat_bahasa_bahasa)));
    // $prob_minat_bahasa_bahasa = 1/($depan_minat_bahasa_bahasa * $belakang_minat_bahasa_bahasa);
    //     //koleris
    // $depan_minat_bahasa_pramuka = sqrt($dua_phi*$s2_minat_bahasa_pramuka);
    // $belakang_minat_bahasa_pramuka = exp( ((pow($jurusan-$x_minat_bahasa_pramuka,2)) / (2*$s2_pangkat2_minat_bahasa_pramuka)));
    // $prob_minat_bahasa_pramuka = 1/($depan_minat_bahasa_pramuka * $belakang_minat_bahasa_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(minat|Wirausaha)=".number_format($prob_minat_bahasa_wirusaha, dec())."<br>";
    // echo "P(minat|Kemanusiaan (ksr, humaniora))=".number_format($prob_minat_bahasa_kemanusiaan, dec())."<br>";
    // echo "P(minat|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_minat_bahasa_senior, dec())."<br>";
    // echo "P(minat|Pecinta Alam (MAPALA))=".number_format($prob_minat_bahasa_mapala, dec())."<br>";
    // echo "P(minat|Persma)=".number_format($prob_minat_bahasa_persma, dec())."<br>";
    // echo "P(minat|Bahasa)=".number_format($prob_minat_bahasa_bahasa, dec())."<br>";
    // echo "P(minat|Pramuka))=".number_format($prob_minat_bahasa_pramuka, dec())."<br>";
    //     }

    // //Minat minat
    // $depan_minat_kemanusiaan_wirusaha = sqrt($dua_phi*$s2_minat_kemanusiaan_wirusaha);
    // $belakang_minat_kemanusiaan_wirusaha = exp( ((pow($jurusan-$x_minat_kemanusiaan_wirusaha,2)) / (2*$s2_pangkat2_minat_kemanusiaan_wirusaha)));
    // $prob_minat_kemanusiaan_wirusaha = 1/($depan_minat_kemanusiaan_wirusaha * $belakang_minat_kemanusiaan_wirusaha);
    //     //koleris
    // $depan_minat_kemanusiaan_kemanusiaan = sqrt($dua_phi*$s2_minat_kemanusiaan_kemanusiaan);
    // $belakang_minat_kemanusiaan_kemanusiaan = exp( ((pow($jurusan-$x_minat_kemanusiaan_kemanusiaan,2)) / (2*$s2_pangkat2_minat_kemanusiaan_kemanusiaan)));
    // $prob_minat_kemanusiaan_kemanusiaan = 1/($depan_minat_kemanusiaan_kemanusiaan * $belakang_minat_kemanusiaan_kemanusiaan);
    //     //melankolis
    // $depan_minat_kemanusiaan_senior = sqrt($dua_phi*$s2_minat_kemanusiaan_senior);
    // $belakang_minat_kemanusiaan_senior = exp( ((pow($jurusan-$x_minat_kemanusiaan_senior,2)) / (2*$s2_pangkat2_minat_kemanusiaan_senior)));
    // $prob_minat_kemanusiaan_senior = 1/($depan_minat_kemanusiaan_senior * $belakang_minat_kemanusiaan_senior);
    //     //koleris
    // $depan_minat_kemanusiaan_mapala = sqrt($dua_phi*$s2_minat_kemanusiaan_mapala);
    // $belakang_minat_kemanusiaan_mapala = exp( ((pow($jurusan-$x_minat_kemanusiaan_mapala,2)) / (2*$s2_pangkat2_minat_kemanusiaan_mapala)));
    // $prob_minat_kemanusiaan_mapala = 1/($depan_minat_kemanusiaan_mapala * $belakang_minat_kemanusiaan_mapala);
    //     //koleris
    // $depan_minat_kemanusiaan_persma = sqrt($dua_phi*$s2_minat_kemanusiaan_persma);
    // $belakang_minat_kemanusiaan_persma = exp( ((pow($jurusan-$x_minat_kemanusiaan_persma,2)) / (2*$s2_pangkat2_minat_kemanusiaan_persma)));
    // $prob_minat_kemanusiaan_persma = 1/($depan_minat_kemanusiaan_persma * $belakang_minat_kemanusiaan_persma);
    //     //koleris
    // $depan_minat_kemanusiaan_bahasa = sqrt($dua_phi*$s2_minat_kemanusiaan_bahasa);
    // $belakang_minat_kemanusiaan_bahasa = exp( ((pow($jurusan-$x_minat_kemanusiaan_bahasa,2)) / (2*$s2_pangkat2_minat_kemanusiaan_bahasa)));
    // $prob_minat_kemanusiaan_bahasa = 1/($depan_minat_kemanusiaan_bahasa * $belakang_minat_kemanusiaan_bahasa);
    //     //koleris
    // $depan_minat_kemanusiaan_pramuka = sqrt($dua_phi*$s2_minat_kemanusiaan_pramuka);
    // $belakang_minat_kemanusiaan_pramuka = exp( ((pow($jurusan-$x_minat_kemanusiaan_pramuka,2)) / (2*$s2_pangkat2_minat_kemanusiaan_pramuka)));
    // $prob_minat_kemanusiaan_pramuka = 1/($depan_minat_kemanusiaan_pramuka * $belakang_minat_kemanusiaan_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(minat|Wirausaha)=".number_format($prob_minat_kemanusiaan_wirusaha, dec())."<br>";
    // echo "P(minat|Kemanusiaan (ksr, humaniora))=".number_format($prob_minat_kemanusiaan_kemanusiaan, dec())."<br>";
    // echo "P(minat|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_minat_kemanusiaan_senior, dec())."<br>";
    // echo "P(minat|Pecinta Alam (MAPALA))=".number_format($prob_minat_kemanusiaan_mapala, dec())."<br>";
    // echo "P(minat|Persma)=".number_format($prob_minat_kemanusiaan_persma, dec())."<br>";
    // echo "P(minat|Bahasa)=".number_format($prob_minat_kemanusiaan_bahasa, dec())."<br>";
    // echo "P(minat|Pramuka))=".number_format($prob_minat_kemanusiaan_pramuka, dec())."<br>";
    //     }

    // //Minat minat
    // $depan_minat_pramuka_wirusaha = sqrt($dua_phi*$s2_minat_pramuka_wirusaha);
    // $belakang_minat_pramuka_wirusaha = exp( ((pow($jurusan-$x_minat_pramuka_wirusaha,2)) / (2*$s2_pangkat2_minat_pramuka_wirusaha)));
    // $prob_minat_pramuka_wirusaha = 1/($depan_minat_pramuka_wirusaha * $belakang_minat_pramuka_wirusaha);
    //     //koleris
    // $depan_minat_pramuka_kemanusiaan = sqrt($dua_phi*$s2_minat_pramuka_kemanusiaan);
    // $belakang_minat_pramuka_kemanusiaan = exp( ((pow($jurusan-$x_minat_pramuka_kemanusiaan,2)) / (2*$s2_pangkat2_minat_pramuka_kemanusiaan)));
    // $prob_minat_pramuka_kemanusiaan = 1/($depan_minat_pramuka_kemanusiaan * $belakang_minat_pramuka_kemanusiaan);
    //     //melankolis
    // $depan_minat_pramuka_senior = sqrt($dua_phi*$s2_minat_pramuka_senior);
    // $belakang_minat_pramuka_senior = exp( ((pow($jurusan-$x_minat_pramuka_senior,2)) / (2*$s2_pangkat2_minat_pramuka_senior)));
    // $prob_minat_pramuka_senior = 1/($depan_minat_pramuka_senior * $belakang_minat_pramuka_senior);
    //     //koleris
    // $depan_minat_pramuka_mapala = sqrt($dua_phi*$s2_minat_pramuka_mapala);
    // $belakang_minat_pramuka_mapala = exp( ((pow($jurusan-$x_minat_pramuka_mapala,2)) / (2*$s2_pangkat2_minat_pramuka_mapala)));
    // $prob_minat_pramuka_mapala = 1/($depan_minat_pramuka_mapala * $belakang_minat_pramuka_mapala);
    //     //koleris
    // $depan_minat_pramuka_persma = sqrt($dua_phi*$s2_minat_pramuka_persma);
    // $belakang_minat_pramuka_persma = exp( ((pow($jurusan-$x_minat_pramuka_persma,2)) / (2*$s2_pangkat2_minat_pramuka_persma)));
    // $prob_minat_pramuka_persma = 1/($depan_minat_pramuka_persma * $belakang_minat_pramuka_persma);
    //     //koleris
    // $depan_minat_pramuka_bahasa = sqrt($dua_phi*$s2_minat_pramuka_bahasa);
    // $belakang_minat_pramuka_bahasa = exp( ((pow($jurusan-$x_minat_pramuka_bahasa,2)) / (2*$s2_pangkat2_minat_pramuka_bahasa)));
    // $prob_minat_pramuka_bahasa = 1/($depan_minat_pramuka_bahasa * $belakang_minat_pramuka_bahasa);
    //     //koleris
    // $depan_minat_pramuka_pramuka = sqrt($dua_phi*$s2_minat_pramuka_pramuka);
    // $belakang_minat_pramuka_pramuka = exp( ((pow($jurusan-$x_minat_pramuka_pramuka,2)) / (2*$s2_pangkat2_minat_pramuka_pramuka)));
    // $prob_minat_pramuka_pramuka = 1/($depan_minat_pramuka_pramuka * $belakang_minat_pramuka_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(minat|Wirausaha)=".number_format($prob_minat_pramuka_wirusaha, dec())."<br>";
    // echo "P(minat|Kemanusiaan (ksr, humaniora))=".number_format($prob_minat_pramuka_kemanusiaan, dec())."<br>";
    // echo "P(minat|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_minat_pramuka_senior, dec())."<br>";
    // echo "P(minat|Pecinta Alam (MAPALA))=".number_format($prob_minat_pramuka_mapala, dec())."<br>";
    // echo "P(minat|Persma)=".number_format($prob_minat_pramuka_persma, dec())."<br>";
    // echo "P(minat|Bahasa)=".number_format($prob_minat_pramuka_bahasa, dec())."<br>";
    // echo "P(minat|Pramuka))=".number_format($prob_minat_pramuka_pramuka, dec())."<br>";
    //     }

    // //Bakat bakat
    // $depan_bakat_seni_wirusaha = sqrt($dua_phi*$s2_bakat_seni_wirusaha);
    // $belakang_bakat_seni_wirusaha = exp( ((pow($jurusan-$x_bakat_seni_wirusaha,2)) / (2*$s2_pangkat2_bakat_seni_wirusaha)));
    // $prob_bakat_seni_wirusaha = 1/($depan_bakat_seni_wirusaha * $belakang_bakat_seni_wirusaha);
    //     //koleris
    // $depan_bakat_seni_kemanusiaan = sqrt($dua_phi*$s2_bakat_seni_kemanusiaan);
    // $belakang_bakat_seni_kemanusiaan = exp( ((pow($jurusan-$x_bakat_seni_kemanusiaan,2)) / (2*$s2_pangkat2_bakat_seni_kemanusiaan)));
    // $prob_bakat_seni_kemanusiaan = 1/($depan_bakat_seni_kemanusiaan * $belakang_bakat_seni_kemanusiaan);
    //     //melankolis
    // $depan_bakat_seni_senior = sqrt($dua_phi*$s2_bakat_seni_senior);
    // $belakang_bakat_seni_senior = exp( ((pow($jurusan-$x_bakat_seni_senior,2)) / (2*$s2_pangkat2_bakat_seni_senior)));
    // $prob_bakat_seni_senior = 1/($depan_bakat_seni_senior * $belakang_bakat_seni_senior);
    //     //koleris
    // $depan_bakat_seni_mapala = sqrt($dua_phi*$s2_bakat_seni_mapala);
    // $belakang_bakat_seni_mapala = exp( ((pow($jurusan-$x_bakat_seni_mapala,2)) / (2*$s2_pangkat2_bakat_seni_mapala)));
    // $prob_bakat_seni_mapala = 1/($depan_bakat_seni_mapala * $belakang_bakat_seni_mapala);
    //     //koleris
    // $depan_bakat_seni_persma = sqrt($dua_phi*$s2_bakat_seni_persma);
    // $belakang_bakat_seni_persma = exp( ((pow($jurusan-$x_bakat_seni_persma,2)) / (2*$s2_pangkat2_bakat_seni_persma)));
    // $prob_bakat_seni_persma = 1/($depan_bakat_seni_persma * $belakang_bakat_seni_persma);
    //     //koleris
    // $depan_bakat_seni_bahasa = sqrt($dua_phi*$s2_bakat_seni_bahasa);
    // $belakang_bakat_seni_bahasa = exp( ((pow($jurusan-$x_bakat_seni_bahasa,2)) / (2*$s2_pangkat2_bakat_seni_bahasa)));
    // $prob_bakat_seni_bahasa = 1/($depan_bakat_seni_bahasa * $belakang_bakat_seni_bahasa);
    //     //koleris
    // $depan_bakat_seni_pramuka = sqrt($dua_phi*$s2_bakat_seni_pramuka);
    // $belakang_bakat_seni_pramuka = exp( ((pow($jurusan-$x_bakat_seni_pramuka,2)) / (2*$s2_pangkat2_bakat_seni_pramuka)));
    // $prob_bakat_seni_pramuka = 1/($depan_bakat_seni_pramuka * $belakang_bakat_seni_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(bakat|Wirausaha)=".number_format($prob_bakat_seni_wirusaha, dec())."<br>";
    // echo "P(bakat|Kemanusiaan (ksr, humaniora))=".number_format($prob_bakat_seni_kemanusiaan, dec())."<br>";
    // echo "P(bakat|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_bakat_seni_senior, dec())."<br>";
    // echo "P(bakat|Pecinta Alam (MAPALA))=".number_format($prob_bakat_seni_mapala, dec())."<br>";
    // echo "P(bakat|Persma)=".number_format($prob_bakat_seni_persma, dec())."<br>";
    // echo "P(bakat|Bahasa)=".number_format($prob_bakat_seni_bahasa, dec())."<br>";
    // echo "P(bakat|Pramuka))=".number_format($prob_bakat_seni_pramuka, dec())."<br>";
    //     }

    // //Bakat bakat
    // $depan_bakat_olahraga_wirusaha = sqrt($dua_phi*$s2_bakat_olahraga_wirusaha);
    // $belakang_bakat_olahraga_wirusaha = exp( ((pow($jurusan-$x_bakat_olahraga_wirusaha,2)) / (2*$s2_pangkat2_bakat_olahraga_wirusaha)));
    // $prob_bakat_olahraga_wirusaha = 1/($depan_bakat_olahraga_wirusaha * $belakang_bakat_olahraga_wirusaha);
    //     //koleris
    // $depan_bakat_olahraga_kemanusiaan = sqrt($dua_phi*$s2_bakat_olahraga_kemanusiaan);
    // $belakang_bakat_olahraga_kemanusiaan = exp( ((pow($jurusan-$x_bakat_olahraga_kemanusiaan,2)) / (2*$s2_pangkat2_bakat_olahraga_kemanusiaan)));
    // $prob_bakat_olahraga_kemanusiaan = 1/($depan_bakat_olahraga_kemanusiaan * $belakang_bakat_olahraga_kemanusiaan);
    //     //melankolis
    // $depan_bakat_olahraga_senior = sqrt($dua_phi*$s2_bakat_olahraga_senior);
    // $belakang_bakat_olahraga_senior = exp( ((pow($jurusan-$x_bakat_olahraga_senior,2)) / (2*$s2_pangkat2_bakat_olahraga_senior)));
    // $prob_bakat_olahraga_senior = 1/($depan_bakat_olahraga_senior * $belakang_bakat_olahraga_senior);
    //     //koleris
    // $depan_bakat_olahraga_mapala = sqrt($dua_phi*$s2_bakat_olahraga_mapala);
    // $belakang_bakat_olahraga_mapala = exp( ((pow($jurusan-$x_bakat_olahraga_mapala,2)) / (2*$s2_pangkat2_bakat_olahraga_mapala)));
    // $prob_bakat_olahraga_mapala = 1/($depan_bakat_olahraga_mapala * $belakang_bakat_olahraga_mapala);
    //     //koleris
    // $depan_bakat_olahraga_persma = sqrt($dua_phi*$s2_bakat_olahraga_persma);
    // $belakang_bakat_olahraga_persma = exp( ((pow($jurusan-$x_bakat_olahraga_persma,2)) / (2*$s2_pangkat2_bakat_olahraga_persma)));
    // $prob_bakat_olahraga_persma = 1/($depan_bakat_olahraga_persma * $belakang_bakat_olahraga_persma);
    //     //koleris
    // $depan_bakat_olahraga_bahasa = sqrt($dua_phi*$s2_bakat_olahraga_bahasa);
    // $belakang_bakat_olahraga_bahasa = exp( ((pow($jurusan-$x_bakat_olahraga_bahasa,2)) / (2*$s2_pangkat2_bakat_olahraga_bahasa)));
    // $prob_bakat_olahraga_bahasa = 1/($depan_bakat_olahraga_bahasa * $belakang_bakat_olahraga_bahasa);
    //     //koleris
    // $depan_bakat_olahraga_pramuka = sqrt($dua_phi*$s2_bakat_olahraga_pramuka);
    // $belakang_bakat_olahraga_pramuka = exp( ((pow($jurusan-$x_bakat_olahraga_pramuka,2)) / (2*$s2_pangkat2_bakat_olahraga_pramuka)));
    // $prob_bakat_olahraga_pramuka = 1/($depan_bakat_olahraga_pramuka * $belakang_bakat_olahraga_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(bakat|Wirausaha)=".number_format($prob_bakat_olahraga_wirusaha, dec())."<br>";
    // echo "P(bakat|Kemanusiaan (ksr, humaniora))=".number_format($prob_bakat_olahraga_kemanusiaan, dec())."<br>";
    // echo "P(bakat|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_bakat_olahraga_senior, dec())."<br>";
    // echo "P(bakat|Pecinta Alam (MAPALA))=".number_format($prob_bakat_olahraga_mapala, dec())."<br>";
    // echo "P(bakat|Persma)=".number_format($prob_bakat_olahraga_persma, dec())."<br>";
    // echo "P(bakat|Bahasa)=".number_format($prob_bakat_olahraga_bahasa, dec())."<br>";
    // echo "P(bakat|Pramuka))=".number_format($prob_bakat_olahraga_pramuka, dec())."<br>";
    //     }

    // //Bakat bakat
    // $depan_bakat_bahasa_wirusaha = sqrt($dua_phi*$s2_bakat_bahasa_wirusaha);
    // $belakang_bakat_bahasa_wirusaha = exp( ((pow($jurusan-$x_bakat_bahasa_wirusaha,2)) / (2*$s2_pangkat2_bakat_bahasa_wirusaha)));
    // $prob_bakat_bahasa_wirusaha = 1/($depan_bakat_bahasa_wirusaha * $belakang_bakat_bahasa_wirusaha);
    //     //koleris
    // $depan_bakat_bahasa_kemanusiaan = sqrt($dua_phi*$s2_bakat_bahasa_kemanusiaan);
    // $belakang_bakat_bahasa_kemanusiaan = exp( ((pow($jurusan-$x_bakat_bahasa_kemanusiaan,2)) / (2*$s2_pangkat2_bakat_bahasa_kemanusiaan)));
    // $prob_bakat_bahasa_kemanusiaan = 1/($depan_bakat_bahasa_kemanusiaan * $belakang_bakat_bahasa_kemanusiaan);
    //     //melankolis
    // $depan_bakat_bahasa_senior = sqrt($dua_phi*$s2_bakat_bahasa_senior);
    // $belakang_bakat_bahasa_senior = exp( ((pow($jurusan-$x_bakat_bahasa_senior,2)) / (2*$s2_pangkat2_bakat_bahasa_senior)));
    // $prob_bakat_bahasa_senior = 1/($depan_bakat_bahasa_senior * $belakang_bakat_bahasa_senior);
    //     //koleris
    // $depan_bakat_bahasa_mapala = sqrt($dua_phi*$s2_bakat_bahasa_mapala);
    // $belakang_bakat_bahasa_mapala = exp( ((pow($jurusan-$x_bakat_bahasa_mapala,2)) / (2*$s2_pangkat2_bakat_bahasa_mapala)));
    // $prob_bakat_bahasa_mapala = 1/($depan_bakat_bahasa_mapala * $belakang_bakat_bahasa_mapala);
    //     //koleris
    // $depan_bakat_bahasa_persma = sqrt($dua_phi*$s2_bakat_bahasa_persma);
    // $belakang_bakat_bahasa_persma = exp( ((pow($jurusan-$x_bakat_bahasa_persma,2)) / (2*$s2_pangkat2_bakat_bahasa_persma)));
    // $prob_bakat_bahasa_persma = 1/($depan_bakat_bahasa_persma * $belakang_bakat_bahasa_persma);
    //     //koleris
    // $depan_bakat_bahasa_bahasa = sqrt($dua_phi*$s2_bakat_bahasa_bahasa);
    // $belakang_bakat_bahasa_bahasa = exp( ((pow($jurusan-$x_bakat_bahasa_bahasa,2)) / (2*$s2_pangkat2_bakat_bahasa_bahasa)));
    // $prob_bakat_bahasa_bahasa = 1/($depan_bakat_bahasa_bahasa * $belakang_bakat_bahasa_bahasa);
    //     //koleris
    // $depan_bakat_bahasa_pramuka = sqrt($dua_phi*$s2_bakat_bahasa_pramuka);
    // $belakang_bakat_bahasa_pramuka = exp( ((pow($jurusan-$x_bakat_bahasa_pramuka,2)) / (2*$s2_pangkat2_bakat_bahasa_pramuka)));
    // $prob_bakat_bahasa_pramuka = 1/($depan_bakat_bahasa_pramuka * $belakang_bakat_bahasa_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(bakat|Wirausaha)=".number_format($prob_bakat_bahasa_wirusaha, dec())."<br>";
    // echo "P(bakat|Kemanusiaan (ksr, humaniora))=".number_format($prob_bakat_bahasa_kemanusiaan, dec())."<br>";
    // echo "P(bakat|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_bakat_bahasa_senior, dec())."<br>";
    // echo "P(bakat|Pecinta Alam (MAPALA))=".number_format($prob_bakat_bahasa_mapala, dec())."<br>";
    // echo "P(bakat|Persma)=".number_format($prob_bakat_bahasa_persma, dec())."<br>";
    // echo "P(bakat|Bahasa)=".number_format($prob_bakat_bahasa_bahasa, dec())."<br>";
    // echo "P(bakat|Pramuka))=".number_format($prob_bakat_bahasa_pramuka, dec())."<br>";
    //     }

    // //Bakat bakat
    // $depan_bakat_lainnya_wirusaha = sqrt($dua_phi*$s2_bakat_lainnya_wirusaha);
    // $belakang_bakat_lainnya_wirusaha = exp( ((pow($jurusan-$x_bakat_lainnya_wirusaha,2)) / (2*$s2_pangkat2_bakat_lainnya_wirusaha)));
    // $prob_bakat_lainnya_wirusaha = 1/($depan_bakat_lainnya_wirusaha * $belakang_bakat_lainnya_wirusaha);
    //     //koleris
    // $depan_bakat_lainnya_kemanusiaan = sqrt($dua_phi*$s2_bakat_lainnya_kemanusiaan);
    // $belakang_bakat_lainnya_kemanusiaan = exp( ((pow($jurusan-$x_bakat_lainnya_kemanusiaan,2)) / (2*$s2_pangkat2_bakat_lainnya_kemanusiaan)));
    // $prob_bakat_lainnya_kemanusiaan = 1/($depan_bakat_lainnya_kemanusiaan * $belakang_bakat_lainnya_kemanusiaan);
    //     //melankolis
    // $depan_bakat_lainnya_senior = sqrt($dua_phi*$s2_bakat_lainnya_senior);
    // $belakang_bakat_lainnya_senior = exp( ((pow($jurusan-$x_bakat_lainnya_senior,2)) / (2*$s2_pangkat2_bakat_lainnya_senior)));
    // $prob_bakat_lainnya_senior = 1/($depan_bakat_lainnya_senior * $belakang_bakat_lainnya_senior);
    //     //koleris
    // $depan_bakat_lainnya_mapala = sqrt($dua_phi*$s2_bakat_lainnya_mapala);
    // $belakang_bakat_lainnya_mapala = exp( ((pow($jurusan-$x_bakat_lainnya_mapala,2)) / (2*$s2_pangkat2_bakat_lainnya_mapala)));
    // $prob_bakat_lainnya_mapala = 1/($depan_bakat_lainnya_mapala * $belakang_bakat_lainnya_mapala);
    //     //koleris
    // $depan_bakat_lainnya_persma = sqrt($dua_phi*$s2_bakat_lainnya_persma);
    // $belakang_bakat_lainnya_persma = exp( ((pow($jurusan-$x_bakat_lainnya_persma,2)) / (2*$s2_pangkat2_bakat_lainnya_persma)));
    // $prob_bakat_lainnya_persma = 1/($depan_bakat_lainnya_persma * $belakang_bakat_lainnya_persma);
    //     //koleris
    // $depan_bakat_lainnya_bahasa = sqrt($dua_phi*$s2_bakat_lainnya_bahasa);
    // $belakang_bakat_lainnya_bahasa = exp( ((pow($jurusan-$x_bakat_lainnya_bahasa,2)) / (2*$s2_pangkat2_bakat_lainnya_bahasa)));
    // $prob_bakat_lainnya_bahasa = 1/($depan_bakat_bahasa_bahasa * $belakang_bakat_bahasa_bahasa);
    //     //koleris
    // $depan_bakat_lainnya_pramuka = sqrt($dua_phi*$s2_bakat_lainnya_pramuka);
    // $belakang_bakat_lainnya_pramuka = exp( ((pow($jurusan-$x_bakat_lainnya_pramuka,2)) / (2*$s2_pangkat2_bakat_lainnya_pramuka)));
    // $prob_bakat_lainnya_pramuka = 1/($depan_bakat_lainnya_pramuka * $belakang_bakat_lainnya_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(bakat|Wirausaha)=".number_format($prob_bakat_lainnya_wirusaha, dec())."<br>";
    // echo "P(bakat|Kemanusiaan (ksr, humaniora))=".number_format($prob_bakat_lainnya_kemanusiaan, dec())."<br>";
    // echo "P(bakat|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_bakat_lainnya_senior, dec())."<br>";
    // echo "P(bakat|Pecinta Alam (MAPALA))=".number_format($prob_bakat_lainnya_mapala, dec())."<br>";
    // echo "P(bakat|Persma)=".number_format($prob_bakat_lainnya_persma, dec())."<br>";
    // echo "P(bakat|Bahasa)=".number_format($prob_bakat_lainnya_bahasa, dec())."<br>";
    // echo "P(bakat|Pramuka))=".number_format($prob_bakat_lainnya_pramuka, dec())."<br>";
    //     }


    // //Hobi hobi
    // $depan_hobi_menari_wirausaha = sqrt($dua_phi*$s2_hobi_menari_wirausaha);
    // $belakang_hobi_menari_wirausaha = exp( ((pow($jurusan-$x_hobi_menari_wirausaha,2)) / (2*$s2_pangkat2_hobi_menari_wirausaha)));
    // $prob_hobi_menari_wirausaha = 1/($depan_hobi_menari_wirausaha * $belakang_hobi_menari_wirausaha);
    //     //koleris
    // $depan_hobi_menari_kemanusiaan = sqrt($dua_phi*$s2_hobi_menari_kemanusiaan);
    // $belakang_hobi_menari_kemanusiaan = exp( ((pow($jurusan-$x_hobi_menari_kemanusiaan,2)) / (2*$s2_pangkat2_hobi_menari_kemanusiaan)));
    // $prob_hobi_menari_kemanusiaan = 1/($depan_hobi_menari_kemanusiaan * $belakang_hobi_menari_kemanusiaan);
    //     //melankolis
    // $depan_hobi_menari_senior = sqrt($dua_phi*$s2_hobi_menari_senior);
    // $belakang_hobi_menari_senior = exp( ((pow($jurusan-$x_hobi_menari_senior,2)) / (2*$s2_pangkat2_hobi_menari_senior)));
    // $prob_hobi_menari_senior = 1/($depan_hobi_menari_senior * $belakang_hobi_menari_senior);
    //     //koleris
    // $depan_hobi_menari_mapala = sqrt($dua_phi*$s2_hobi_menari_mapala);
    // $belakang_hobi_menari_mapala = exp( ((pow($jurusan-$x_hobi_menari_mapala,2)) / (2*$s2_pangkat2_hobi_menari_mapala)));
    // $prob_hobi_menari_mapala = 1/($depan_hobi_menari_mapala * $belakang_hobi_menari_mapala);
    //     //koleris
    // $depan_hobi_menari_persma = sqrt($dua_phi*$s2_hobi_menari_persma);
    // $belakang_hobi_menari_persma = exp( ((pow($jurusan-$x_hobi_menari_persma,2)) / (2*$s2_pangkat2_hobi_menari_persma)));
    // $prob_hobi_menari_persma = 1/($depan_hobi_menari_persma * $belakang_hobi_menari_persma);
    //     //koleris
    // $depan_hobi_menari_bahasa = sqrt($dua_phi*$s2_hobi_menari_bahasa);
    // $belakang_hobi_menari_bahasa = exp( ((pow($jurusan-$x_hobi_menari_bahasa,2)) / (2*$s2_pangkat2_hobi_menari_bahasa)));
    // $prob_hobi_menari_bahasa = 1/($depan_hobi_menari_bahasa * $belakang_hobi_menari_bahasa);
    //     //koleris
    // $depan_hobi_menari_pramuka = sqrt($dua_phi*$s2_hobi_menari_pramuka);
    // $belakang_hobi_menari_pramuka = exp( ((pow($jurusan-$x_hobi_menari_pramuka,2)) / (2*$s2_pangkat2_hobi_menari_pramuka)));
    // $prob_hobi_menari_pramuka = 1/($depan_hobi_menari_pramuka * $belakang_hobi_menari_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(hobi|Wirausaha)=".number_format($prob_hobi_menari_wirausaha, dec())."<br>";
    // echo "P(hobi|Kemanusiaan (ksr, humaniora))=".number_format($prob_hobi_menari_kemanusiaan, dec())."<br>";
    // echo "P(hobi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_hobi_menari_senior, dec())."<br>";
    // echo "P(hobi|Pecinta Alam (MAPALA))=".number_format($prob_hobi_menari_mapala, dec())."<br>";
    // echo "P(hobi|Persma)=".number_format($prob_hobi_menari_persma, dec())."<br>";
    // echo "P(hobi|Bahasa)=".number_format($prob_hobi_menari_bahasa, dec())."<br>";
    // echo "P(hobi|Pramuka))=".number_format($prob_hobi_menari_pramuka, dec())."<br>";
    //     }

    // //Hobi hobi
    // $depan_hobi_menyanyi_wirausaha = sqrt($dua_phi*$s2_hobi_menyanyi_wirausaha);
    // $belakang_hobi_menyanyi_wirausaha = exp( ((pow($jurusan-$x_hobi_menyanyi_wirausaha,2)) / (2*$s2_pangkat2_hobi_menyanyi_wirausaha)));
    // $prob_hobi_menyanyi_wirausaha = 1/($depan_hobi_menyanyi_wirausaha * $belakang_hobi_menyanyi_wirausaha);
    //     //koleris
    // $depan_hobi_menyanyi_kemanusiaan = sqrt($dua_phi*$s2_hobi_menyanyi_kemanusiaan);
    // $belakang_hobi_menyanyi_kemanusiaan = exp( ((pow($jurusan-$x_hobi_menyanyi_kemanusiaan,2)) / (2*$s2_pangkat2_hobi_menyanyi_kemanusiaan)));
    // $prob_hobi_menyanyi_kemanusiaan = 1/($depan_hobi_menyanyi_kemanusiaan * $belakang_hobi_menyanyi_kemanusiaan);
    //     //melankolis
    // $depan_hobi_menyanyi_senior = sqrt($dua_phi*$s2_hobi_menyanyi_senior);
    // $belakang_hobi_menyanyi_senior = exp( ((pow($jurusan-$x_hobi_menyanyi_senior,2)) / (2*$s2_pangkat2_hobi_menyanyi_senior)));
    // $prob_hobi_menyanyi_senior = 1/($depan_hobi_menyanyi_senior * $belakang_hobi_menyanyi_senior);
    //     //koleris
    // $depan_hobi_menyanyi_mapala = sqrt($dua_phi*$s2_hobi_menyanyi_mapala);
    // $belakang_hobi_menyanyi_mapala = exp( ((pow($jurusan-$x_hobi_menyanyi_mapala,2)) / (2*$s2_pangkat2_hobi_menyanyi_mapala)));
    // $prob_hobi_menyanyi_mapala = 1/($depan_hobi_menyanyi_mapala * $belakang_hobi_menyanyi_mapala);
    //     //koleris
    // $depan_hobi_menyanyi_persma = sqrt($dua_phi*$s2_hobi_menyanyi_persma);
    // $belakang_hobi_menyanyi_persma = exp( ((pow($jurusan-$x_hobi_menyanyi_persma,2)) / (2*$s2_pangkat2_hobi_menyanyi_persma)));
    // $prob_hobi_menyanyi_persma = 1/($depan_hobi_menyanyi_persma * $belakang_hobi_menyanyi_persma);
    //     //koleris
    // $depan_hobi_menyanyi_bahasa = sqrt($dua_phi*$s2_hobi_menyanyi_bahasa);
    // $belakang_hobi_menyanyi_bahasa = exp( ((pow($jurusan-$x_hobi_menyanyi_bahasa,2)) / (2*$s2_pangkat2_hobi_menyanyi_bahasa)));
    // $prob_hobi_menyanyi_bahasa = 1/($depan_hobi_menyanyi_bahasa * $belakang_hobi_menyanyi_bahasa);
    //     //koleris
    // $depan_hobi_menyanyi_pramuka = sqrt($dua_phi*$s2_hobi_menyanyi_pramuka);
    // $belakang_hobi_menyanyi_pramuka = exp( ((pow($jurusan-$x_hobi_menyanyi_pramuka,2)) / (2*$s2_pangkat2_hobi_menyanyi_pramuka)));
    // $prob_hobi_menyanyi_pramuka = 1/($depan_hobi_menyanyi_pramuka * $belakang_hobi_menyanyi_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(hobi|Wirausaha)=".number_format($prob_hobi_menyanyi_wirausaha, dec())."<br>";
    // echo "P(hobi|Kemanusiaan (ksr, humaniora))=".number_format($prob_hobi_menyanyi_kemanusiaan, dec())."<br>";
    // echo "P(hobi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_hobi_menyanyi_senior, dec())."<br>";
    // echo "P(hobi|Pecinta Alam (MAPALA))=".number_format($prob_hobi_menyanyi_mapala, dec())."<br>";
    // echo "P(hobi|Persma)=".number_format($prob_hobi_menyanyi_persma, dec())."<br>";
    // echo "P(hobi|Bahasa)=".number_format($prob_hobi_menyanyi_bahasa, dec())."<br>";
    // echo "P(hobi|Pramuka))=".number_format($prob_hobi_menyanyi_pramuka, dec())."<br>";
    //     }

    // //Hobi hobi
    // $depan_hobi_menulis_wirausaha = sqrt($dua_phi*$s2_hobi_menulis_wirausaha);
    // $belakang_hobi_menulis_wirausaha = exp( ((pow($jurusan-$x_hobi_menulis_wirausaha,2)) / (2*$s2_pangkat2_hobi_menulis_wirausaha)));
    // $prob_hobi_menulis_wirausaha = 1/($depan_hobi_menulis_wirausaha * $belakang_hobi_menulis_wirausaha);
    //     //koleris
    // $depan_hobi_menulis_kemanusiaan = sqrt($dua_phi*$s2_hobi_menulis_kemanusiaan);
    // $belakang_hobi_menulis_kemanusiaan = exp( ((pow($jurusan-$x_hobi_menulis_kemanusiaan,2)) / (2*$s2_pangkat2_hobi_menulis_kemanusiaan)));
    // $prob_hobi_menulis_kemanusiaan = 1/($depan_hobi_menulis_kemanusiaan * $belakang_hobi_menulis_kemanusiaan);
    //     //melankolis
    // $depan_hobi_menulis_senior = sqrt($dua_phi*$s2_hobi_menulis_senior);
    // $belakang_hobi_menulis_senior = exp( ((pow($jurusan-$x_hobi_menulis_senior,2)) / (2*$s2_pangkat2_hobi_menulis_senior)));
    // $prob_hobi_menulis_senior = 1/($depan_hobi_menulis_senior * $belakang_hobi_menulis_senior);
    //     //koleris
    // $depan_hobi_menulis_mapala = sqrt($dua_phi*$s2_hobi_menulis_mapala);
    // $belakang_hobi_menulis_mapala = exp( ((pow($jurusan-$x_hobi_menulis_mapala,2)) / (2*$s2_pangkat2_hobi_menulis_mapala)));
    // $prob_hobi_menulis_mapala = 1/($depan_hobi_menulis_mapala * $belakang_hobi_menulis_mapala);
    //     //koleris
    // $depan_hobi_menulis_persma = sqrt($dua_phi*$s2_hobi_menulis_persma);
    // $belakang_hobi_menulis_persma = exp( ((pow($jurusan-$x_hobi_menulis_persma,2)) / (2*$s2_pangkat2_hobi_menulis_persma)));
    // $prob_hobi_menulis_persma = 1/($depan_hobi_menulis_persma * $belakang_hobi_menulis_persma);
    //     //koleris
    // $depan_hobi_menulis_bahasa = sqrt($dua_phi*$s2_hobi_menulis_bahasa);
    // $belakang_hobi_menulis_bahasa = exp( ((pow($jurusan-$x_hobi_menulis_bahasa,2)) / (2*$s2_pangkat2_hobi_menulis_bahasa)));
    // $prob_hobi_menulis_bahasa = 1/($depan_hobi_menulis_bahasa * $belakang_hobi_menulis_bahasa);
    //     //koleris
    // $depan_hobi_menulis_pramuka = sqrt($dua_phi*$s2_hobi_menulis_pramuka);
    // $belakang_hobi_menulis_pramuka = exp( ((pow($jurusan-$x_hobi_menulis_pramuka,2)) / (2*$s2_pangkat2_hobi_menulis_pramuka)));
    // $prob_hobi_menulis_pramuka = 1/($depan_hobi_menulis_pramuka * $belakang_hobi_menulis_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(hobi|Wirausaha)=".number_format($prob_hobi_menulis_wirausaha, dec())."<br>";
    // echo "P(hobi|Kemanusiaan (ksr, humaniora))=".number_format($prob_hobi_menulis_kemanusiaan, dec())."<br>";
    // echo "P(hobi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_hobi_menulis_senior, dec())."<br>";
    // echo "P(hobi|Pecinta Alam (MAPALA))=".number_format($prob_hobi_menulis_mapala, dec())."<br>";
    // echo "P(hobi|Persma)=".number_format($prob_hobi_menulis_persma, dec())."<br>";
    // echo "P(hobi|Bahasa)=".number_format($prob_hobi_menulis_bahasa, dec())."<br>";
    // echo "P(hobi|Pramuka))=".number_format($prob_hobi_menulis_pramuka, dec())."<br>";
    //     }

    // //Hobi hobi
    // $depan_hobi_menggambar_wirausaha = sqrt($dua_phi*$s2_hobi_menggambar_wirausaha);
    // $belakang_hobi_menggambar_wirausaha = exp( ((pow($jurusan-$x_hobi_menggambar_wirausaha,2)) / (2*$s2_pangkat2_hobi_menggambar_wirausaha)));
    // $prob_hobi_menggambar_wirausaha = 1/($depan_hobi_menggambar_wirausaha * $belakang_hobi_menggambar_wirausaha);
    //     //koleris
    // $depan_hobi_menggambar_kemanusiaan = sqrt($dua_phi*$s2_hobi_menggambar_kemanusiaan);
    // $belakang_hobi_menggambar_kemanusiaan = exp( ((pow($jurusan-$x_hobi_menggambar_kemanusiaan,2)) / (2*$s2_pangkat2_hobi_menggambar_kemanusiaan)));
    // $prob_hobi_menggambar_kemanusiaan = 1/($depan_hobi_menggambar_kemanusiaan * $belakang_hobi_menggambar_kemanusiaan);
    //     //melankolis
    // $depan_hobi_menggambar_senior = sqrt($dua_phi*$s2_hobi_menggambar_senior);
    // $belakang_hobi_menggambar_senior = exp( ((pow($jurusan-$x_hobi_menggambar_senior,2)) / (2*$s2_pangkat2_hobi_menggambar_senior)));
    // $prob_hobi_menggambar_senior = 1/($depan_hobi_menggambar_senior * $belakang_hobi_menggambar_senior);
    //     //koleris
    // $depan_hobi_menggambar_mapala = sqrt($dua_phi*$s2_hobi_menggambar_mapala);
    // $belakang_hobi_menggambar_mapala = exp( ((pow($jurusan-$x_hobi_menggambar_mapala,2)) / (2*$s2_pangkat2_hobi_menggambar_mapala)));
    // $prob_hobi_menggambar_mapala = 1/($depan_hobi_menggambar_mapala * $belakang_hobi_menggambar_mapala);
    //     //koleris
    // $depan_hobi_menggambar_persma = sqrt($dua_phi*$s2_hobi_menggambar_persma);
    // $belakang_hobi_menggambar_persma = exp( ((pow($jurusan-$x_hobi_menggambar_persma,2)) / (2*$s2_pangkat2_hobi_menggambar_persma)));
    // $prob_hobi_menggambar_persma = 1/($depan_hobi_menggambar_persma * $belakang_hobi_menggambar_persma);
    //     //koleris
    // $depan_hobi_menggambar_bahasa = sqrt($dua_phi*$s2_hobi_menggambar_bahasa);
    // $belakang_hobi_menggambar_bahasa = exp( ((pow($jurusan-$x_hobi_menggambar_bahasa,2)) / (2*$s2_pangkat2_hobi_menggambar_bahasa)));
    // $prob_hobi_menggambar_bahasa = 1/($depan_hobi_menggambar_bahasa * $belakang_hobi_menggambar_bahasa);
    //     //koleris
    // $depan_hobi_menggambar_pramuka = sqrt($dua_phi*$s2_hobi_menggambar_pramuka);
    // $belakang_hobi_menggambar_pramuka = exp( ((pow($jurusan-$x_hobi_menggambar_pramuka,2)) / (2*$s2_pangkat2_hobi_menggambar_pramuka)));
    // $prob_hobi_menggambar_pramuka = 1/($depan_hobi_menggambar_pramuka * $belakang_hobi_menggambar_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(hobi|Wirausaha)=".number_format($prob_hobi_menggambar_wirausaha, dec())."<br>";
    // echo "P(hobi|Kemanusiaan (ksr, humaniora))=".number_format($prob_hobi_menggambar_kemanusiaan, dec())."<br>";
    // echo "P(hobi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_hobi_menggambar_senior, dec())."<br>";
    // echo "P(hobi|Pecinta Alam (MAPALA))=".number_format($prob_hobi_menggambar_mapala, dec())."<br>";
    // echo "P(hobi|Persma)=".number_format($prob_hobi_menggambar_persma, dec())."<br>";
    // echo "P(hobi|Bahasa)=".number_format($prob_hobi_menggambar_bahasa, dec())."<br>";
    // echo "P(hobi|Pramuka))=".number_format($prob_hobi_menggambar_pramuka, dec())."<br>";
    //     }

    // //Hobi hobi
    // $depan_hobi_memasak_wirausaha = sqrt($dua_phi*$s2_hobi_memasak_wirausaha);
    // $belakang_hobi_memasak_wirausaha = exp( ((pow($jurusan-$x_hobi_memasak_wirausaha,2)) / (2*$s2_pangkat2_hobi_memasak_wirausaha)));
    // $prob_hobi_memasak_wirausaha = 1/($depan_hobi_memasak_wirausaha * $belakang_hobi_memasak_wirausaha);
    //     //koleris
    // $depan_hobi_memasak_kemanusiaan = sqrt($dua_phi*$s2_hobi_memasak_kemanusiaan);
    // $belakang_hobi_memasak_kemanusiaan = exp( ((pow($jurusan-$x_hobi_memasak_kemanusiaan,2)) / (2*$s2_pangkat2_hobi_memasak_kemanusiaan)));
    // $prob_hobi_memasak_kemanusiaan = 1/($depan_hobi_memasak_kemanusiaan * $belakang_hobi_memasak_kemanusiaan);
    //     //melankolis
    // $depan_hobi_memasak_senior = sqrt($dua_phi*$s2_hobi_memasak_senior);
    // $belakang_hobi_memasak_senior = exp( ((pow($jurusan-$x_hobi_memasak_senior,2)) / (2*$s2_pangkat2_hobi_memasak_senior)));
    // $prob_hobi_memasak_senior = 1/($depan_hobi_memasak_senior * $belakang_hobi_memasak_senior);
    //     //koleris
    // $depan_hobi_memasak_mapala = sqrt($dua_phi*$s2_hobi_memasak_mapala);
    // $belakang_hobi_memasak_mapala = exp( ((pow($jurusan-$x_hobi_memasak_mapala,2)) / (2*$s2_pangkat2_hobi_memasak_mapala)));
    // $prob_hobi_memasak_mapala = 1/($depan_hobi_memasak_mapala * $belakang_hobi_memasak_mapala);
    //     //koleris
    // $depan_hobi_memasak_persma = sqrt($dua_phi*$s2_hobi_memasak_persma);
    // $belakang_hobi_memasak_persma = exp( ((pow($jurusan-$x_hobi_memasak_persma,2)) / (2*$s2_pangkat2_hobi_memasak_persma)));
    // $prob_hobi_memasak_persma = 1/($depan_hobi_memasak_persma * $belakang_hobi_memasak_persma);
    //     //koleris
    // $depan_hobi_memasak_bahasa = sqrt($dua_phi*$s2_hobi_memasak_bahasa);
    // $belakang_hobi_memasak_bahasa = exp( ((pow($jurusan-$x_hobi_memasak_bahasa,2)) / (2*$s2_pangkat2_hobi_memasak_bahasa)));
    // $prob_hobi_memasak_bahasa = 1/($depan_hobi_memasak_bahasa * $belakang_hobi_memasak_bahasa);
    //     //koleris
    // $depan_hobi_memasak_pramuka = sqrt($dua_phi*$s2_hobi_memasak_pramuka);
    // $belakang_hobi_memasak_pramuka = exp( ((pow($jurusan-$x_hobi_memasak_pramuka,2)) / (2*$s2_pangkat2_hobi_memasak_pramuka)));
    // $prob_hobi_memasak_pramuka = 1/($depan_hobi_memasak_pramuka * $belakang_hobi_memasak_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(hobi|Wirausaha)=".number_format($prob_hobi_memasak_wirausaha, dec())."<br>";
    // echo "P(hobi|Kemanusiaan (ksr, humaniora))=".number_format($prob_hobi_memasak_kemanusiaan, dec())."<br>";
    // echo "P(hobi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_hobi_memasak_senior, dec())."<br>";
    // echo "P(hobi|Pecinta Alam (MAPALA))=".number_format($prob_hobi_memasak_mapala, dec())."<br>";
    // echo "P(hobi|Persma)=".number_format($prob_hobi_memasak_persma, dec())."<br>";
    // echo "P(hobi|Bahasa)=".number_format($prob_hobi_memasak_bahasa, dec())."<br>";
    // echo "P(hobi|Pramuka))=".number_format($prob_hobi_memasak_pramuka, dec())."<br>";
    //     }

    // //Hobi hobi
    // $depan_hobi_fotografi_wirausaha = sqrt($dua_phi*$s2_hobi_fotografi_wirausaha);
    // $belakang_hobi_fotografi_wirausaha = exp( ((pow($jurusan-$x_hobi_fotografi_wirausaha,2)) / (2*$s2_pangkat2_hobi_fotografi_wirausaha)));
    // $prob_hobi_fotografi_wirausaha = 1/($depan_hobi_fotografi_wirausaha * $belakang_hobi_fotografi_wirausaha);
    //     //koleris
    // $depan_hobi_fotografi_kemanusiaan = sqrt($dua_phi*$s2_hobi_fotografi_kemanusiaan);
    // $belakang_hobi_fotografi_kemanusiaan = exp( ((pow($jurusan-$x_hobi_fotografi_kemanusiaan,2)) / (2*$s2_pangkat2_hobi_fotografi_kemanusiaan)));
    // $prob_hobi_fotografi_kemanusiaan = 1/($depan_hobi_fotografi_kemanusiaan * $belakang_hobi_fotografi_kemanusiaan);
    //     //melankolis
    // $depan_hobi_fotografi_senior = sqrt($dua_phi*$s2_hobi_fotografi_senior);
    // $belakang_hobi_fotografi_senior = exp( ((pow($jurusan-$x_hobi_fotografi_senior,2)) / (2*$s2_pangkat2_hobi_fotografi_senior)));
    // $prob_hobi_fotografi_senior = 1/($depan_hobi_fotografi_senior * $belakang_hobi_fotografi_senior);
    //     //koleris
    // $depan_hobi_fotografi_mapala = sqrt($dua_phi*$s2_hobi_fotografi_mapala);
    // $belakang_hobi_fotografi_mapala = exp( ((pow($jurusan-$x_hobi_fotografi_mapala,2)) / (2*$s2_pangkat2_hobi_fotografi_mapala)));
    // $prob_hobi_fotografi_mapala = 1/($depan_hobi_fotografi_mapala * $belakang_hobi_fotografi_mapala);
    //     //koleris
    // $depan_hobi_fotografi_persma = sqrt($dua_phi*$s2_hobi_fotografi_persma);
    // $belakang_hobi_fotografi_persma = exp( ((pow($jurusan-$x_hobi_fotografi_persma,2)) / (2*$s2_pangkat2_hobi_fotografi_persma)));
    // $prob_hobi_fotografi_persma = 1/($depan_hobi_fotografi_persma * $belakang_hobi_fotografi_persma);
    //     //koleris
    // $depan_hobi_fotografi_bahasa = sqrt($dua_phi*$s2_hobi_fotografi_bahasa);
    // $belakang_hobi_fotografi_bahasa = exp( ((pow($jurusan-$x_hobi_fotografi_bahasa,2)) / (2*$s2_pangkat2_hobi_fotografi_bahasa)));
    // $prob_hobi_fotografi_bahasa = 1/($depan_hobi_fotografi_bahasa * $belakang_hobi_fotografi_bahasa);
    //     //koleris
    // $depan_hobi_fotografi_pramuka = sqrt($dua_phi*$s2_hobi_fotografi_pramuka);
    // $belakang_hobi_fotografi_pramuka = exp( ((pow($jurusan-$x_hobi_fotografi_pramuka,2)) / (2*$s2_pangkat2_hobi_fotografi_pramuka)));
    // $prob_hobi_fotografi_pramuka = 1/($depan_hobi_fotografi_pramuka * $belakang_hobi_fotografi_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(hobi|Wirausaha)=".number_format($prob_hobi_fotografi_wirausaha, dec())."<br>";
    // echo "P(hobi|Kemanusiaan (ksr, humaniora))=".number_format($prob_hobi_fotografi_kemanusiaan, dec())."<br>";
    // echo "P(hobi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_hobi_fotografi_senior, dec())."<br>";
    // echo "P(hobi|Pecinta Alam (MAPALA))=".number_format($prob_hobi_fotografi_mapala, dec())."<br>";
    // echo "P(hobi|Persma)=".number_format($prob_hobi_fotografi_persma, dec())."<br>";
    // echo "P(hobi|Bahasa)=".number_format($prob_hobi_fotografi_bahasa, dec())."<br>";
    // echo "P(hobi|Pramuka))=".number_format($prob_hobi_fotografi_pramuka, dec())."<br>";
    //     }

    // //Hobi hobi
    // $depan_hobi_sepakbola_wirausaha = sqrt($dua_phi*$s2_hobi_sepakbola_wirausaha);
    // $belakang_hobi_sepakbola_wirausaha = exp( ((pow($jurusan-$x_hobi_sepakbola_wirausaha,2)) / (2*$s2_pangkat2_hobi_sepakbola_wirausaha)));
    // $prob_hobi_sepakbola_wirausaha = 1/($depan_hobi_sepakbola_wirausaha * $belakang_hobi_sepakbola_wirausaha);
    //     //koleris
    // $depan_hobi_sepakbola_kemanusiaan = sqrt($dua_phi*$s2_hobi_sepakbola_kemanusiaan);
    // $belakang_hobi_sepakbola_kemanusiaan = exp( ((pow($jurusan-$x_hobi_sepakbola_kemanusiaan,2)) / (2*$s2_pangkat2_hobi_sepakbola_kemanusiaan)));
    // $prob_hobi_sepakbola_kemanusiaan = 1/($depan_hobi_sepakbola_kemanusiaan * $belakang_hobi_sepakbola_kemanusiaan);
    //     //melankolis
    // $depan_hobi_sepakbola_senior = sqrt($dua_phi*$s2_hobi_sepakbola_senior);
    // $belakang_hobi_sepakbola_senior = exp( ((pow($jurusan-$x_hobi_sepakbola_senior,2)) / (2*$s2_pangkat2_hobi_sepakbola_senior)));
    // $prob_hobi_sepakbola_senior = 1/($depan_hobi_sepakbola_senior * $belakang_hobi_sepakbola_senior);
    //     //koleris
    // $depan_hobi_sepakbola_mapala = sqrt($dua_phi*$s2_hobi_sepakbola_mapala);
    // $belakang_hobi_sepakbola_mapala = exp( ((pow($jurusan-$x_hobi_sepakbola_mapala,2)) / (2*$s2_pangkat2_hobi_sepakbola_mapala)));
    // $prob_hobi_sepakbola_mapala = 1/($depan_hobi_sepakbola_mapala * $belakang_hobi_sepakbola_mapala);
    //     //koleris
    // $depan_hobi_sepakbola_persma = sqrt($dua_phi*$s2_hobi_sepakbola_persma);
    // $belakang_hobi_sepakbola_persma = exp( ((pow($jurusan-$x_hobi_sepakbola_persma,2)) / (2*$s2_pangkat2_hobi_sepakbola_persma)));
    // $prob_hobi_sepakbola_persma = 1/($depan_hobi_sepakbola_persma * $belakang_hobi_sepakbola_persma);
    //     //koleris
    // $depan_hobi_sepakbola_bahasa = sqrt($dua_phi*$s2_hobi_sepakbola_bahasa);
    // $belakang_hobi_sepakbola_bahasa = exp( ((pow($jurusan-$x_hobi_sepakbola_bahasa,2)) / (2*$s2_pangkat2_hobi_sepakbola_bahasa)));
    // $prob_hobi_sepakbola_bahasa = 1/($depan_hobi_sepakbola_bahasa * $belakang_hobi_sepakbola_bahasa);
    //     //koleris
    // $depan_hobi_sepakbola_pramuka = sqrt($dua_phi*$s2_hobi_sepakbola_pramuka);
    // $belakang_hobi_sepakbola_pramuka = exp( ((pow($jurusan-$x_hobi_sepakbola_pramuka,2)) / (2*$s2_pangkat2_hobi_sepakbola_pramuka)));
    // $prob_hobi_sepakbola_pramuka = 1/($depan_hobi_sepakbola_pramuka * $belakang_hobi_sepakbola_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(hobi|Wirausaha)=".number_format($prob_hobi_sepakbola_wirausaha, dec())."<br>";
    // echo "P(hobi|Kemanusiaan (ksr, humaniora))=".number_format($prob_hobi_sepakbola_kemanusiaan, dec())."<br>";
    // echo "P(hobi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_hobi_sepakbola_senior, dec())."<br>";
    // echo "P(hobi|Pecinta Alam (MAPALA))=".number_format($prob_hobi_sepakbola_mapala, dec())."<br>";
    // echo "P(hobi|Persma)=".number_format($prob_hobi_sepakbola_persma, dec())."<br>";
    // echo "P(hobi|Bahasa)=".number_format($prob_hobi_sepakbola_bahasa, dec())."<br>";
    // echo "P(hobi|Pramuka))=".number_format($prob_hobi_sepakbola_pramuka, dec())."<br>";
    //     }
   

    // //Hobi hobi
    // $depan_hobi_bulutangkis_wirausaha = sqrt($dua_phi*$s2_hobi_bulutangkis_wirausaha);
    // $belakang_hobi_bulutangkis_wirausaha = exp( ((pow($jurusan-$x_hobi_bulutangkis_wirausaha,2)) / (2*$s2_pangkat2_hobi_bulutangkis_wirausaha)));
    // $prob_hobi_bulutangkis_wirausaha = 1/($depan_hobi_bulutangkis_wirausaha * $belakang_hobi_bulutangkis_wirausaha);
    //     //koleris
    // $depan_hobi_bulutangkis_kemanusiaan = sqrt($dua_phi*$s2_hobi_bulutangkis_kemanusiaan);
    // $belakang_hobi_bulutangkis_kemanusiaan = exp( ((pow($jurusan-$x_hobi_bulutangkis_kemanusiaan,2)) / (2*$s2_pangkat2_hobi_bulutangkis_kemanusiaan)));
    // $prob_hobi_bulutangkis_kemanusiaan = 1/($depan_hobi_bulutangkis_kemanusiaan * $belakang_hobi_bulutangkis_kemanusiaan);
    //     //melankolis
    // $depan_hobi_bulutangkis_senior = sqrt($dua_phi*$s2_hobi_bulutangkis_senior);
    // $belakang_hobi_bulutangkis_senior = exp( ((pow($jurusan-$x_hobi_bulutangkis_senior,2)) / (2*$s2_pangkat2_hobi_bulutangkis_senior)));
    // $prob_hobi_bulutangkis_senior = 1/($depan_hobi_bulutangkis_senior * $belakang_hobi_bulutangkis_senior);
    //     //koleris
    // $depan_hobi_bulutangkis_mapala = sqrt($dua_phi*$s2_hobi_bulutangkis_mapala);
    // $belakang_hobi_bulutangkis_mapala = exp( ((pow($jurusan-$x_hobi_bulutangkis_mapala,2)) / (2*$s2_pangkat2_hobi_bulutangkis_mapala)));
    // $prob_hobi_bulutangkis_mapala = 1/($depan_hobi_bulutangkis_mapala * $belakang_hobi_bulutangkis_mapala);
    //     //koleris
    // $depan_hobi_bulutangkis_persma = sqrt($dua_phi*$s2_hobi_bulutangkis_persma);
    // $belakang_hobi_bulutangkis_persma = exp( ((pow($jurusan-$x_hobi_bulutangkis_persma,2)) / (2*$s2_pangkat2_hobi_bulutangkis_persma)));
    // $prob_hobi_bulutangkis_persma = 1/($depan_hobi_bulutangkis_persma * $belakang_hobi_bulutangkis_persma);
    //     //koleris
    // $depan_hobi_bulutangkis_bahasa = sqrt($dua_phi*$s2_hobi_bulutangkis_bahasa);
    // $belakang_hobi_bulutangkis_bahasa = exp( ((pow($jurusan-$x_hobi_bulutangkis_bahasa,2)) / (2*$s2_pangkat2_hobi_bulutangkis_bahasa)));
    // $prob_hobi_bulutangkis_bahasa = 1/($depan_hobi_bulutangkis_bahasa * $belakang_hobi_bulutangkis_bahasa);
    //     //koleris
    // $depan_hobi_bulutangkis_pramuka = sqrt($dua_phi*$s2_hobi_bulutangkis_pramuka);
    // $belakang_hobi_bulutangkis_pramuka = exp( ((pow($jurusan-$x_hobi_bulutangkis_pramuka,2)) / (2*$s2_pangkat2_hobi_bulutangkis_pramuka)));
    // $prob_hobi_bulutangkis_pramuka = 1/($depan_hobi_bulutangkis_pramuka * $belakang_hobi_bulutangkis_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(hobi|Wirausaha)=".number_format($prob_hobi_bulutangkis_wirausaha, dec())."<br>";
    // echo "P(hobi|Kemanusiaan (ksr, humaniora))=".number_format($prob_hobi_bulutangkis_kemanusiaan, dec())."<br>";
    // echo "P(hobi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_hobi_bulutangkis_senior, dec())."<br>";
    // echo "P(hobi|Pecinta Alam (MAPALA))=".number_format($prob_hobi_bulutangkis_mapala, dec())."<br>";
    // echo "P(hobi|Persma)=".number_format($prob_hobi_bulutangkis_persma, dec())."<br>";
    // echo "P(hobi|Bahasa)=".number_format($prob_hobi_bulutangkis_bahasa, dec())."<br>";
    // echo "P(hobi|Pramuka))=".number_format($prob_hobi_bulutangkis_pramuka, dec())."<br>";
    //     }

    // //Hobi hobi
    // $depan_hobi_basket_wirausaha = sqrt($dua_phi*$s2_hobi_basket_wirausaha);
    // $belakang_hobi_basket_wirausaha = exp( ((pow($jurusan-$x_hobi_basket_wirausaha,2)) / (2*$s2_pangkat2_hobi_basket_wirausaha)));
    // $prob_hobi_basket_wirausaha = 1/($depan_hobi_basket_wirausaha * $belakang_hobi_basket_wirausaha);
    //     //koleris
    // $depan_hobi_basket_kemanusiaan = sqrt($dua_phi*$s2_hobi_basket_kemanusiaan);
    // $belakang_hobi_basket_kemanusiaan = exp( ((pow($jurusan-$x_hobi_basket_kemanusiaan,2)) / (2*$s2_pangkat2_hobi_basket_kemanusiaan)));
    // $prob_hobi_basket_kemanusiaan = 1/($depan_hobi_basket_kemanusiaan * $belakang_hobi_basket_kemanusiaan);
    //     //melankolis
    // $depan_hobi_basket_senior = sqrt($dua_phi*$s2_hobi_basket_senior);
    // $belakang_hobi_basket_senior = exp( ((pow($jurusan-$x_hobi_basket_senior,2)) / (2*$s2_pangkat2_hobi_basket_senior)));
    // $prob_hobi_basket_senior = 1/($depan_hobi_basket_senior * $belakang_hobi_basket_senior);
    //     //koleris
    // $depan_hobi_basket_mapala = sqrt($dua_phi*$s2_hobi_basket_mapala);
    // $belakang_hobi_basket_mapala = exp( ((pow($jurusan-$x_hobi_basket_mapala,2)) / (2*$s2_pangkat2_hobi_basket_mapala)));
    // $prob_hobi_basket_mapala = 1/($depan_hobi_basket_mapala * $belakang_hobi_basket_mapala);
    //     //koleris
    // $depan_hobi_basket_persma = sqrt($dua_phi*$s2_hobi_basket_persma);
    // $belakang_hobi_basket_persma = exp( ((pow($jurusan-$x_hobi_basket_persma,2)) / (2*$s2_pangkat2_hobi_basket_persma)));
    // $prob_hobi_basket_persma = 1/($depan_hobi_basket_persma * $belakang_hobi_basket_persma);
    //     //koleris
    // $depan_hobi_basket_bahasa = sqrt($dua_phi*$s2_hobi_basket_bahasa);
    // $belakang_hobi_basket_bahasa = exp( ((pow($jurusan-$x_hobi_basket_bahasa,2)) / (2*$s2_pangkat2_hobi_basket_bahasa)));
    // $prob_hobi_basket_bahasa = 1/($depan_hobi_basket_bahasa * $belakang_hobi_basket_bahasa);
    //     //koleris
    // $depan_hobi_basket_pramuka = sqrt($dua_phi*$s2_hobi_basket_pramuka);
    // $belakang_hobi_basket_pramuka = exp( ((pow($jurusan-$x_hobi_basket_pramuka,2)) / (2*$s2_pangkat2_hobi_basket_pramuka)));
    // $prob_hobi_basket_pramuka = 1/($depan_hobi_basket_pramuka * $belakang_hobi_basket_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(hobi|Wirausaha)=".number_format($prob_hobi_basket_wirausaha, dec())."<br>";
    // echo "P(hobi|Kemanusiaan (ksr, humaniora))=".number_format($prob_hobi_basket_kemanusiaan, dec())."<br>";
    // echo "P(hobi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_hobi_basket_senior, dec())."<br>";
    // echo "P(hobi|Pecinta Alam (MAPALA))=".number_format($prob_hobi_basket_mapala, dec())."<br>";
    // echo "P(hobi|Persma)=".number_format($prob_hobi_basket_persma, dec())."<br>";
    // echo "P(hobi|Bahasa)=".number_format($prob_hobi_basket_bahasa, dec())."<br>";
    // echo "P(hobi|Pramuka))=".number_format($prob_hobi_basket_pramuka, dec())."<br>";
    //     }

    // //Hobi hobi
    // $depan_hobi_futsal_wirausaha = sqrt($dua_phi*$s2_hobi_futsal_wirausaha);
    // $belakang_hobi_futsal_wirausaha = exp( ((pow($jurusan-$x_hobi_futsal_wirausaha,2)) / (2*$s2_pangkat2_hobi_futsal_wirausaha)));
    // $prob_hobi_futsal_wirausaha = 1/($depan_hobi_futsal_wirausaha * $belakang_hobi_futsal_wirausaha);
    //     //koleris
    // $depan_hobi_futsal_kemanusiaan = sqrt($dua_phi*$s2_hobi_futsal_kemanusiaan);
    // $belakang_hobi_futsal_kemanusiaan = exp( ((pow($jurusan-$x_hobi_futsal_kemanusiaan,2)) / (2*$s2_pangkat2_hobi_futsal_kemanusiaan)));
    // $prob_hobi_futsal_kemanusiaan = 1/($depan_hobi_futsal_kemanusiaan * $belakang_hobi_futsal_kemanusiaan);
    //     //melankolis
    // $depan_hobi_futsal_senior = sqrt($dua_phi*$s2_hobi_futsal_senior);
    // $belakang_hobi_futsal_senior = exp( ((pow($jurusan-$x_hobi_futsal_senior,2)) / (2*$s2_pangkat2_hobi_futsal_senior)));
    // $prob_hobi_futsal_senior = 1/($depan_hobi_futsal_senior * $belakang_hobi_futsal_senior);
    //     //koleris
    // $depan_hobi_futsal_mapala = sqrt($dua_phi*$s2_hobi_futsal_mapala);
    // $belakang_hobi_futsal_mapala = exp( ((pow($jurusan-$x_hobi_futsal_mapala,2)) / (2*$s2_pangkat2_hobi_futsal_mapala)));
    // $prob_hobi_futsal_mapala = 1/($depan_hobi_futsal_mapala * $belakang_hobi_futsal_mapala);
    //     //koleris
    // $depan_hobi_futsal_persma = sqrt($dua_phi*$s2_hobi_futsal_persma);
    // $belakang_hobi_futsal_persma = exp( ((pow($jurusan-$x_hobi_futsal_persma,2)) / (2*$s2_pangkat2_hobi_futsal_persma)));
    // $prob_hobi_futsal_persma = 1/($depan_hobi_futsal_persma * $belakang_hobi_futsal_persma);
    //     //koleris
    // $depan_hobi_futsal_bahasa = sqrt($dua_phi*$s2_hobi_futsal_bahasa);
    // $belakang_hobi_futsal_bahasa = exp( ((pow($jurusan-$x_hobi_futsal_bahasa,2)) / (2*$s2_pangkat2_hobi_futsal_bahasa)));
    // $prob_hobi_futsal_bahasa = 1/($depan_hobi_futsal_bahasa * $belakang_hobi_futsal_bahasa);
    //     //koleris
    // $depan_hobi_futsal_pramuka = sqrt($dua_phi*$s2_hobi_futsal_pramuka);
    // $belakang_hobi_futsal_pramuka = exp( ((pow($jurusan-$x_hobi_futsal_pramuka,2)) / (2*$s2_pangkat2_hobi_futsal_pramuka)));
    // $prob_hobi_futsal_pramuka = 1/($depan_hobi_futsal_pramuka * $belakang_hobi_futsal_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(hobi|Wirausaha)=".number_format($prob_hobi_futsal_wirausaha, dec())."<br>";
    // echo "P(hobi|Kemanusiaan (ksr, humaniora))=".number_format($prob_hobi_futsal_kemanusiaan, dec())."<br>";
    // echo "P(hobi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_hobi_futsal_senior, dec())."<br>";
    // echo "P(hobi|Pecinta Alam (MAPALA))=".number_format($prob_hobi_futsal_mapala, dec())."<br>";
    // echo "P(hobi|Persma)=".number_format($prob_hobi_futsal_persma, dec())."<br>";
    // echo "P(hobi|Bahasa)=".number_format($prob_hobi_futsal_bahasa, dec())."<br>";
    // echo "P(hobi|Pramuka))=".number_format($prob_hobi_futsal_pramuka, dec())."<br>";
    //     }

    //  //Hobi hobi
    // $depan_hobi_volly_wirausaha = sqrt($dua_phi*$s2_hobi_volly_wirausaha);
    // $belakang_hobi_volly_wirausaha = exp( ((pow($jurusan-$x_hobi_volly_wirausaha,2)) / (2*$s2_pangkat2_hobi_volly_wirausaha)));
    // $prob_hobi_volly_wirausaha = 1/($depan_hobi_volly_wirausaha * $belakang_hobi_volly_wirausaha);
    //     //koleris
    // $depan_hobi_volly_kemanusiaan = sqrt($dua_phi*$s2_hobi_volly_kemanusiaan);
    // $belakang_hobi_volly_kemanusiaan = exp( ((pow($jurusan-$x_hobi_volly_kemanusiaan,2)) / (2*$s2_pangkat2_hobi_volly_kemanusiaan)));
    // $prob_hobi_volly_kemanusiaan = 1/($depan_hobi_volly_kemanusiaan * $belakang_hobi_volly_kemanusiaan);
    //     //melankolis
    // $depan_hobi_volly_senior = sqrt($dua_phi*$s2_hobi_volly_senior);
    // $belakang_hobi_volly_senior = exp( ((pow($jurusan-$x_hobi_volly_senior,2)) / (2*$s2_pangkat2_hobi_volly_senior)));
    // $prob_hobi_volly_senior = 1/($depan_hobi_volly_senior * $belakang_hobi_volly_senior);
    //     //koleris
    // $depan_hobi_volly_mapala = sqrt($dua_phi*$s2_hobi_volly_mapala);
    // $belakang_hobi_volly_mapala = exp( ((pow($jurusan-$x_hobi_volly_mapala,2)) / (2*$s2_pangkat2_hobi_volly_mapala)));
    // $prob_hobi_volly_mapala = 1/($depan_hobi_volly_mapala * $belakang_hobi_volly_mapala);
    //     //koleris
    // $depan_hobi_volly_persma = sqrt($dua_phi*$s2_hobi_volly_persma);
    // $belakang_hobi_volly_persma = exp( ((pow($jurusan-$x_hobi_volly_persma,2)) / (2*$s2_pangkat2_hobi_volly_persma)));
    // $prob_hobi_volly_persma = 1/($depan_hobi_volly_persma * $belakang_hobi_volly_persma);
    //     //koleris
    // $depan_hobi_volly_bahasa = sqrt($dua_phi*$s2_hobi_volly_bahasa);
    // $belakang_hobi_volly_bahasa = exp( ((pow($jurusan-$x_hobi_volly_bahasa,2)) / (2*$s2_pangkat2_hobi_volly_bahasa)));
    // $prob_hobi_volly_bahasa = 1/($depan_hobi_volly_bahasa * $belakang_hobi_volly_bahasa);
    //     //koleris
    // $depan_hobi_volly_pramuka = sqrt($dua_phi*$s2_hobi_volly_pramuka);
    // $belakang_hobi_volly_pramuka = exp( ((pow($jurusan-$x_hobi_volly_pramuka,2)) / (2*$s2_pangkat2_hobi_volly_pramuka)));
    // $prob_hobi_volly_pramuka = 1/($depan_hobi_volly_pramuka * $belakang_hobi_volly_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(hobi|Wirausaha)=".number_format($prob_hobi_volly_wirausaha, dec())."<br>";
    // echo "P(hobi|Kemanusiaan (ksr, humaniora))=".number_format($prob_hobi_volly_kemanusiaan, dec())."<br>";
    // echo "P(hobi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_hobi_volly_senior, dec())."<br>";
    // echo "P(hobi|Pecinta Alam (MAPALA))=".number_format($prob_hobi_volly_mapala, dec())."<br>";
    // echo "P(hobi|Persma)=".number_format($prob_hobi_volly_persma, dec())."<br>";
    // echo "P(hobi|Bahasa)=".number_format($prob_hobi_volly_bahasa, dec())."<br>";
    // echo "P(hobi|Pramuka))=".number_format($prob_hobi_volly_pramuka, dec())."<br>";
    //     }

    //  //Hobi hobi
    // $depan_hobi_belajarmtk_wirausaha = sqrt($dua_phi*$s2_hobi_belajarmtk_wirausaha);
    // $belakang_hobi_belajarmtk_wirausaha = exp( ((pow($jurusan-$x_hobi_belajarmtk_wirausaha,2)) / (2*$s2_pangkat2_hobi_belajarmtk_wirausaha)));
    // $prob_hobi_belajarmtk_wirausaha = 1/($depan_hobi_belajarmtk_wirausaha * $belakang_hobi_belajarmtk_wirausaha);
    //     //koleris
    // $depan_hobi_belajarmtk_kemanusiaan = sqrt($dua_phi*$s2_hobi_belajarmtk_kemanusiaan);
    // $belakang_hobi_belajarmtk_kemanusiaan = exp( ((pow($jurusan-$x_hobi_belajarmtk_kemanusiaan,2)) / (2*$s2_pangkat2_hobi_belajarmtk_kemanusiaan)));
    // $prob_hobi_belajarmtk_kemanusiaan = 1/($depan_hobi_belajarmtk_kemanusiaan * $belakang_hobi_belajarmtk_kemanusiaan);
    //     //melankolis
    // $depan_hobi_belajarmtk_senior = sqrt($dua_phi*$s2_hobi_belajarmtk_senior);
    // $belakang_hobi_belajarmtk_senior = exp( ((pow($jurusan-$x_hobi_belajarmtk_senior,2)) / (2*$s2_pangkat2_hobi_belajarmtk_senior)));
    // $prob_hobi_belajarmtk_senior = 1/($depan_hobi_belajarmtk_senior * $belakang_hobi_belajarmtk_senior);
    //     //koleris
    // $depan_hobi_belajarmtk_mapala = sqrt($dua_phi*$s2_hobi_belajarmtk_mapala);
    // $belakang_hobi_belajarmtk_mapala = exp( ((pow($jurusan-$x_hobi_belajarmtk_mapala,2)) / (2*$s2_pangkat2_hobi_belajarmtk_mapala)));
    // $prob_hobi_belajarmtk_mapala = 1/($depan_hobi_belajarmtk_mapala * $belakang_hobi_belajarmtk_mapala);
    //     //koleris
    // $depan_hobi_belajarmtk_persma = sqrt($dua_phi*$s2_hobi_belajarmtk_persma);
    // $belakang_hobi_belajarmtk_persma = exp( ((pow($jurusan-$x_hobi_belajarmtk_persma,2)) / (2*$s2_pangkat2_hobi_belajarmtk_persma)));
    // $prob_hobi_belajarmtk_persma = 1/($depan_hobi_belajarmtk_persma * $belakang_hobi_belajarmtk_persma);
    //     //koleris
    // $depan_hobi_belajarmtk_bahasa = sqrt($dua_phi*$s2_hobi_belajarmtk_bahasa);
    // $belakang_hobi_belajarmtk_bahasa = exp( ((pow($jurusan-$x_hobi_belajarmtk_bahasa,2)) / (2*$s2_pangkat2_hobi_belajarmtk_bahasa)));
    // $prob_hobi_belajarmtk_bahasa = 1/($depan_hobi_belajarmtk_bahasa * $belakang_hobi_belajarmtk_bahasa);
    //     //koleris
    // $depan_hobi_belajarmtk_pramuka = sqrt($dua_phi*$s2_hobi_belajarmtk_pramuka);
    // $belakang_hobi_belajarmtk_pramuka = exp( ((pow($jurusan-$x_hobi_belajarmtk_pramuka,2)) / (2*$s2_pangkat2_hobi_belajarmtk_pramuka)));
    // $prob_hobi_belajarmtk_pramuka = 1/($depan_hobi_belajarmtk_pramuka * $belakang_hobi_belajarmtk_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(hobi|Wirausaha)=".number_format($prob_hobi_belajarmtk_wirausaha, dec())."<br>";
    // echo "P(hobi|Kemanusiaan (ksr, humaniora))=".number_format($prob_hobi_belajarmtk_kemanusiaan, dec())."<br>";
    // echo "P(hobi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_hobi_belajarmtk_senior, dec())."<br>";
    // echo "P(hobi|Pecinta Alam (MAPALA))=".number_format($prob_hobi_belajarmtk_mapala, dec())."<br>";
    // echo "P(hobi|Persma)=".number_format($prob_hobi_belajarmtk_persma, dec())."<br>";
    // echo "P(hobi|Bahasa)=".number_format($prob_hobi_belajarmtk_bahasa, dec())."<br>";
    // echo "P(hobi|Pramuka))=".number_format($prob_hobi_belajarmtk_pramuka, dec())."<br>";
    //     }

    // //Hobi hobi
    // $depan_hobi_olahraga_wirausaha = sqrt($dua_phi*$s2_hobi_olahraga_wirausaha);
    // $belakang_hobi_olahraga_wirausaha = exp( ((pow($jurusan-$x_hobi_olahraga_wirausaha,2)) / (2*$s2_pangkat2_hobi_olahraga_wirausaha)));
    // $prob_hobi_olahraga_wirausaha = 1/($depan_hobi_olahraga_wirausaha * $belakang_hobi_olahraga_wirausaha);
    //     //koleris
    // $depan_hobi_olahraga_kemanusiaan = sqrt($dua_phi*$s2_hobi_olahraga_kemanusiaan);
    // $belakang_hobi_olahraga_kemanusiaan = exp( ((pow($jurusan-$x_hobi_olahraga_kemanusiaan,2)) / (2*$s2_pangkat2_hobi_olahraga_kemanusiaan)));
    // $prob_hobi_olahraga_kemanusiaan = 1/($depan_hobi_olahraga_kemanusiaan * $belakang_hobi_olahraga_kemanusiaan);
    //     //melankolis
    // $depan_hobi_olahraga_senior = sqrt($dua_phi*$s2_hobi_olahraga_senior);
    // $belakang_hobi_olahraga_senior = exp( ((pow($jurusan-$x_hobi_olahraga_senior,2)) / (2*$s2_pangkat2_hobi_olahraga_senior)));
    // $prob_hobi_olahraga_senior = 1/($depan_hobi_olahraga_senior * $belakang_hobi_olahraga_senior);
    //     //koleris
    // $depan_hobi_olahraga_mapala = sqrt($dua_phi*$s2_hobi_olahraga_mapala);
    // $belakang_hobi_olahraga_mapala = exp( ((pow($jurusan-$x_hobi_olahraga_mapala,2)) / (2*$s2_pangkat2_hobi_olahraga_mapala)));
    // $prob_hobi_olahraga_mapala = 1/($depan_hobi_olahraga_mapala * $belakang_hobi_olahraga_mapala);
    //     //koleris
    // $depan_hobi_olahraga_persma = sqrt($dua_phi*$s2_hobi_olahraga_persma);
    // $belakang_hobi_olahraga_persma = exp( ((pow($jurusan-$x_hobi_olahraga_persma,2)) / (2*$s2_pangkat2_hobi_olahraga_persma)));
    // $prob_hobi_olahraga_persma = 1/($depan_hobi_olahraga_persma * $belakang_hobi_olahraga_persma);
    //     //koleris
    // $depan_hobi_olahraga_bahasa = sqrt($dua_phi*$s2_hobi_olahraga_bahasa);
    // $belakang_hobi_olahraga_bahasa = exp( ((pow($jurusan-$x_hobi_olahraga_bahasa,2)) / (2*$s2_pangkat2_hobi_olahraga_bahasa)));
    // $prob_hobi_olahraga_bahasa = 1/($depan_hobi_olahraga_bahasa * $belakang_hobi_olahraga_bahasa);
    //     //koleris
    // $depan_hobi_olahraga_pramuka = sqrt($dua_phi*$s2_hobi_olahraga_pramuka);
    // $belakang_hobi_olahraga_pramuka = exp( ((pow($jurusan-$x_hobi_olahraga_pramuka,2)) / (2*$s2_pangkat2_hobi_olahraga_pramuka)));
    // $prob_hobi_olahraga_pramuka = 1/($depan_hobi_olahraga_pramuka * $belakang_hobi_olahraga_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(hobi|Wirausaha)=".number_format($prob_hobi_olahraga_wirausaha, dec())."<br>";
    // echo "P(hobi|Kemanusiaan (ksr, humaniora))=".number_format($prob_hobi_olahraga_kemanusiaan, dec())."<br>";
    // echo "P(hobi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_hobi_olahraga_senior, dec())."<br>";
    // echo "P(hobi|Pecinta Alam (MAPALA))=".number_format($prob_hobi_olahraga_mapala, dec())."<br>";
    // echo "P(hobi|Persma)=".number_format($prob_hobi_olahraga_persma, dec())."<br>";
    // echo "P(hobi|Bahasa)=".number_format($prob_hobi_olahraga_bahasa, dec())."<br>";
    // echo "P(hobi|Pramuka))=".number_format($prob_hobi_olahraga_pramuka, dec())."<br>";
    //     }

    // //Hobi hobi
    // $depan_hobi_membaca_wirausaha = sqrt($dua_phi*$s2_hobi_membaca_wirausaha);
    // $belakang_hobi_membaca_wirausaha = exp( ((pow($jurusan-$x_hobi_membaca_wirausaha,2)) / (2*$s2_pangkat2_hobi_membaca_wirausaha)));
    // $prob_hobi_membaca_wirausaha = 1/($depan_hobi_membaca_wirausaha * $belakang_hobi_membaca_wirausaha);
    //     //koleris
    // $depan_hobi_membaca_kemanusiaan = sqrt($dua_phi*$s2_hobi_membaca_kemanusiaan);
    // $belakang_hobi_membaca_kemanusiaan = exp( ((pow($jurusan-$x_hobi_membaca_kemanusiaan,2)) / (2*$s2_pangkat2_hobi_membaca_kemanusiaan)));
    // $prob_hobi_membaca_kemanusiaan = 1/($depan_hobi_membaca_kemanusiaan * $belakang_hobi_membaca_kemanusiaan);
    //     //melankolis
    // $depan_hobi_membaca_senior = sqrt($dua_phi*$s2_hobi_membaca_senior);
    // $belakang_hobi_membaca_senior = exp( ((pow($jurusan-$x_hobi_membaca_senior,2)) / (2*$s2_pangkat2_hobi_membaca_senior)));
    // $prob_hobi_membaca_senior = 1/($depan_hobi_membaca_senior * $belakang_hobi_membaca_senior);
    //     //koleris
    // $depan_hobi_membaca_mapala = sqrt($dua_phi*$s2_hobi_membaca_mapala);
    // $belakang_hobi_membaca_mapala = exp( ((pow($jurusan-$x_hobi_membaca_mapala,2)) / (2*$s2_pangkat2_hobi_membaca_mapala)));
    // $prob_hobi_membaca_mapala = 1/($depan_hobi_membaca_mapala * $belakang_hobi_membaca_mapala);
    //     //koleris
    // $depan_hobi_membaca_persma = sqrt($dua_phi*$s2_hobi_membaca_persma);
    // $belakang_hobi_membaca_persma = exp( ((pow($jurusan-$x_hobi_membaca_persma,2)) / (2*$s2_pangkat2_hobi_membaca_persma)));
    // $prob_hobi_membaca_persma = 1/($depan_hobi_membaca_persma * $belakang_hobi_membaca_persma);
    //     //koleris
    // $depan_hobi_membaca_bahasa = sqrt($dua_phi*$s2_hobi_membaca_bahasa);
    // $belakang_hobi_membaca_bahasa = exp( ((pow($jurusan-$x_hobi_membaca_bahasa,2)) / (2*$s2_pangkat2_hobi_membaca_bahasa)));
    // $prob_hobi_membaca_bahasa = 1/($depan_hobi_membaca_bahasa * $belakang_hobi_membaca_bahasa);
    //     //koleris
    // $depan_hobi_membaca_pramuka = sqrt($dua_phi*$s2_hobi_membaca_pramuka);
    // $belakang_hobi_membaca_pramuka = exp( ((pow($jurusan-$x_hobi_membaca_pramuka,2)) / (2*$s2_pangkat2_hobi_membaca_pramuka)));
    // $prob_hobi_membaca_pramuka = 1/($depan_hobi_membaca_pramuka * $belakang_hobi_membaca_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(hobi|Wirausaha)=".number_format($prob_hobi_membaca_wirausaha, dec())."<br>";
    // echo "P(hobi|Kemanusiaan (ksr, humaniora))=".number_format($prob_hobi_membaca_kemanusiaan, dec())."<br>";
    // echo "P(hobi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_hobi_membaca_senior, dec())."<br>";
    // echo "P(hobi|Pecinta Alam (MAPALA))=".number_format($prob_hobi_membaca_mapala, dec())."<br>";
    // echo "P(hobi|Persma)=".number_format($prob_hobi_membaca_persma, dec())."<br>";
    // echo "P(hobi|Bahasa)=".number_format($prob_hobi_membaca_bahasa, dec())."<br>";
    // echo "P(hobi|Pramuka))=".number_format($prob_hobi_membaca_pramuka, dec())."<br>";
    //     }

    // //Hobi hobi
    // $depan_hobi_mainmusik_wirausaha = sqrt($dua_phi*$s2_hobi_mainmusik_wirausaha);
    // $belakang_hobi_mainmusik_wirausaha = exp( ((pow($jurusan-$x_hobi_mainmusik_wirausaha,2)) / (2*$s2_pangkat2_hobi_mainmusik_wirausaha)));
    // $prob_hobi_mainmusik_wirausaha = 1/($depan_hobi_mainmusik_wirausaha * $belakang_hobi_mainmusik_wirausaha);
    //     //koleris
    // $depan_hobi_mainmusik_kemanusiaan = sqrt($dua_phi*$s2_hobi_mainmusik_kemanusiaan);
    // $belakang_hobi_mainmusik_kemanusiaan = exp( ((pow($jurusan-$x_hobi_mainmusik_kemanusiaan,2)) / (2*$s2_pangkat2_hobi_mainmusik_kemanusiaan)));
    // $prob_hobi_mainmusik_kemanusiaan = 1/($depan_hobi_mainmusik_kemanusiaan * $belakang_hobi_mainmusik_kemanusiaan);
    //     //melankolis
    // $depan_hobi_mainmusik_senior = sqrt($dua_phi*$s2_hobi_mainmusik_senior);
    // $belakang_hobi_mainmusik_senior = exp( ((pow($jurusan-$x_hobi_mainmusik_senior,2)) / (2*$s2_pangkat2_hobi_mainmusik_senior)));
    // $prob_hobi_mainmusik_senior = 1/($depan_hobi_mainmusik_senior * $belakang_hobi_mainmusik_senior);
    //     //koleris
    // $depan_hobi_mainmusik_mapala = sqrt($dua_phi*$s2_hobi_mainmusik_mapala);
    // $belakang_hobi_mainmusik_mapala = exp( ((pow($jurusan-$x_hobi_mainmusik_mapala,2)) / (2*$s2_pangkat2_hobi_mainmusik_mapala)));
    // $prob_hobi_mainmusik_mapala = 1/($depan_hobi_mainmusik_mapala * $belakang_hobi_mainmusik_mapala);
    //     //koleris
    // $depan_hobi_mainmusik_persma = sqrt($dua_phi*$s2_hobi_mainmusik_persma);
    // $belakang_hobi_mainmusik_persma = exp( ((pow($jurusan-$x_hobi_mainmusik_persma,2)) / (2*$s2_pangkat2_hobi_mainmusik_persma)));
    // $prob_hobi_mainmusik_persma = 1/($depan_hobi_mainmusik_persma * $belakang_hobi_mainmusik_persma);
    //     //koleris
    // $depan_hobi_mainmusik_bahasa = sqrt($dua_phi*$s2_hobi_mainmusik_bahasa);
    // $belakang_hobi_mainmusik_bahasa = exp( ((pow($jurusan-$x_hobi_mainmusik_bahasa,2)) / (2*$s2_pangkat2_hobi_mainmusik_bahasa)));
    // $prob_hobi_mainmusik_bahasa = 1/($depan_hobi_mainmusik_bahasa * $belakang_hobi_mainmusik_bahasa);
    //     //koleris
    // $depan_hobi_mainmusik_pramuka = sqrt($dua_phi*$s2_hobi_mainmusik_pramuka);
    // $belakang_hobi_mainmusik_pramuka = exp( ((pow($jurusan-$x_hobi_mainmusik_pramuka,2)) / (2*$s2_pangkat2_hobi_mainmusik_pramuka)));
    // $prob_hobi_mainmusik_pramuka = 1/($depan_hobi_mainmusik_pramuka * $belakang_hobi_mainmusik_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(hobi|Wirausaha)=".number_format($prob_hobi_mainmusik_wirausaha, dec())."<br>";
    // echo "P(hobi|Kemanusiaan (ksr, humaniora))=".number_format($prob_hobi_mainmusik_kemanusiaan, dec())."<br>";
    // echo "P(hobi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_hobi_mainmusik_senior, dec())."<br>";
    // echo "P(hobi|Pecinta Alam (MAPALA))=".number_format($prob_hobi_mainmusik_mapala, dec())."<br>";
    // echo "P(hobi|Persma)=".number_format($prob_hobi_mainmusik_persma, dec())."<br>";
    // echo "P(hobi|Bahasa)=".number_format($prob_hobi_mainmusik_bahasa, dec())."<br>";
    // echo "P(hobi|Pramuka))=".number_format($prob_hobi_mainmusik_pramuka, dec())."<br>";
    //     }

    // //Hobi hobi
    // $depan_hobi_dengarmusik_wirausaha = sqrt($dua_phi*$s2_hobi_dengarmusik_wirausaha);
    // $belakang_hobi_dengarmusik_wirausaha = exp( ((pow($jurusan-$x_hobi_dengarmusik_wirausaha,2)) / (2*$s2_pangkat2_hobi_dengarmusik_wirausaha)));
    // $prob_hobi_dengarmusik_wirausaha = 1/($depan_hobi_dengarmusik_wirausaha * $belakang_hobi_dengarmusik_wirausaha);
    //     //koleris
    // $depan_hobi_dengarmusik_kemanusiaan = sqrt($dua_phi*$s2_hobi_dengarmusik_kemanusiaan);
    // $belakang_hobi_dengarmusik_kemanusiaan = exp( ((pow($jurusan-$x_hobi_dengarmusik_kemanusiaan,2)) / (2*$s2_pangkat2_hobi_dengarmusik_kemanusiaan)));
    // $prob_hobi_dengarmusik_kemanusiaan = 1/($depan_hobi_dengarmusik_kemanusiaan * $belakang_hobi_dengarmusik_kemanusiaan);
    //     //melankolis
    // $depan_hobi_dengarmusik_senior = sqrt($dua_phi*$s2_hobi_dengarmusik_senior);
    // $belakang_hobi_dengarmusik_senior = exp( ((pow($jurusan-$x_hobi_dengarmusik_senior,2)) / (2*$s2_pangkat2_hobi_dengarmusik_senior)));
    // $prob_hobi_dengarmusik_senior = 1/($depan_hobi_dengarmusik_senior * $belakang_hobi_dengarmusik_senior);
    //     //koleris
    // $depan_hobi_dengarmusik_mapala = sqrt($dua_phi*$s2_hobi_dengarmusik_mapala);
    // $belakang_hobi_dengarmusik_mapala = exp( ((pow($jurusan-$x_hobi_dengarmusik_mapala,2)) / (2*$s2_pangkat2_hobi_dengarmusik_mapala)));
    // $prob_hobi_dengarmusik_mapala = 1/($depan_hobi_dengarmusik_mapala * $belakang_hobi_dengarmusik_mapala);
    //     //koleris
    // $depan_hobi_dengarmusik_persma = sqrt($dua_phi*$s2_hobi_dengarmusik_persma);
    // $belakang_hobi_dengarmusik_persma = exp( ((pow($jurusan-$x_hobi_dengarmusik_persma,2)) / (2*$s2_pangkat2_hobi_dengarmusik_persma)));
    // $prob_hobi_dengarmusik_persma = 1/($depan_hobi_dengarmusik_persma * $belakang_hobi_dengarmusik_persma);
    //     //koleris
    // $depan_hobi_dengarmusik_bahasa = sqrt($dua_phi*$s2_hobi_dengarmusik_bahasa);
    // $belakang_hobi_dengarmusik_bahasa = exp( ((pow($jurusan-$x_hobi_dengarmusik_bahasa,2)) / (2*$s2_pangkat2_hobi_dengarmusik_bahasa)));
    // $prob_hobi_dengarmusik_bahasa = 1/($depan_hobi_dengarmusik_bahasa * $belakang_hobi_dengarmusik_bahasa);
    //     //koleris
    // $depan_hobi_dengarmusik_pramuka = sqrt($dua_phi*$s2_hobi_dengarmusik_pramuka);
    // $belakang_hobi_dengarmusik_pramuka = exp( ((pow($jurusan-$x_hobi_dengarmusik_pramuka,2)) / (2*$s2_pangkat2_hobi_dengarmusik_pramuka)));
    // $prob_hobi_dengarmusik_pramuka = 1/($depan_hobi_dengarmusik_pramuka * $belakang_hobi_dengarmusik_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(hobi|Wirausaha)=".number_format($prob_hobi_dengarmusik_wirausaha, dec())."<br>";
    // echo "P(hobi|Kemanusiaan (ksr, humaniora))=".number_format($prob_hobi_dengarmusik_kemanusiaan, dec())."<br>";
    // echo "P(hobi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_hobi_dengarmusik_senior, dec())."<br>";
    // echo "P(hobi|Pecinta Alam (MAPALA))=".number_format($prob_hobi_dengarmusik_mapala, dec())."<br>";
    // echo "P(hobi|Persma)=".number_format($prob_hobi_dengarmusik_persma, dec())."<br>";
    // echo "P(hobi|Bahasa)=".number_format($prob_hobi_dengarmusik_bahasa, dec())."<br>";
    // echo "P(hobi|Pramuka))=".number_format($prob_hobi_dengarmusik_pramuka, dec())."<br>";
    //     }

    // //Hobi hobi
    // $depan_hobi_nonton_wirausaha = sqrt($dua_phi*$s2_hobi_nonton_wirausaha);
    // $belakang_hobi_nonton_wirausaha = exp( ((pow($jurusan-$x_hobi_nonton_wirausaha,2)) / (2*$s2_pangkat2_hobi_nonton_wirausaha)));
    // $prob_hobi_nonton_wirausaha = 1/($depan_hobi_nonton_wirausaha * $belakang_hobi_nonton_wirausaha);
    //     //koleris
    // $depan_hobi_nonton_kemanusiaan = sqrt($dua_phi*$s2_hobi_nonton_kemanusiaan);
    // $belakang_hobi_nonton_kemanusiaan = exp( ((pow($jurusan-$x_hobi_nonton_kemanusiaan,2)) / (2*$s2_pangkat2_hobi_nonton_kemanusiaan)));
    // $prob_hobi_nonton_kemanusiaan = 1/($depan_hobi_nonton_kemanusiaan * $belakang_hobi_nonton_kemanusiaan);
    //     //melankolis
    // $depan_hobi_nonton_senior = sqrt($dua_phi*$s2_hobi_nonton_senior);
    // $belakang_hobi_nonton_senior = exp( ((pow($jurusan-$x_hobi_nonton_senior,2)) / (2*$s2_pangkat2_hobi_nonton_senior)));
    // $prob_hobi_nonton_senior = 1/($depan_hobi_nonton_senior * $belakang_hobi_nonton_senior);
    //     //koleris
    // $depan_hobi_nonton_mapala = sqrt($dua_phi*$s2_hobi_nonton_mapala);
    // $belakang_hobi_nonton_mapala = exp( ((pow($jurusan-$x_hobi_nonton_mapala,2)) / (2*$s2_pangkat2_hobi_nonton_mapala)));
    // $prob_hobi_nonton_mapala = 1/($depan_hobi_nonton_mapala * $belakang_hobi_nonton_mapala);
    //     //koleris
    // $depan_hobi_nonton_persma = sqrt($dua_phi*$s2_hobi_nonton_persma);
    // $belakang_hobi_nonton_persma = exp( ((pow($jurusan-$x_hobi_nonton_persma,2)) / (2*$s2_pangkat2_hobi_nonton_persma)));
    // $prob_hobi_nonton_persma = 1/($depan_hobi_nonton_persma * $belakang_hobi_nonton_persma);
    //     //koleris
    // $depan_hobi_nonton_bahasa = sqrt($dua_phi*$s2_hobi_nonton_bahasa);
    // $belakang_hobi_nonton_bahasa = exp( ((pow($jurusan-$x_hobi_nonton_bahasa,2)) / (2*$s2_pangkat2_hobi_nonton_bahasa)));
    // $prob_hobi_nonton_bahasa = 1/($depan_hobi_nonton_bahasa * $belakang_hobi_nonton_bahasa);
    //     //koleris
    // $depan_hobi_nonton_pramuka = sqrt($dua_phi*$s2_hobi_nonton_pramuka);
    // $belakang_hobi_nonton_pramuka = exp( ((pow($jurusan-$x_hobi_nonton_pramuka,2)) / (2*$s2_pangkat2_hobi_nonton_pramuka)));
    // $prob_hobi_nonton_pramuka = 1/($depan_hobi_nonton_pramuka * $belakang_hobi_nonton_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(hobi|Wirausaha)=".number_format($prob_hobi_nonton_wirausaha, dec())."<br>";
    // echo "P(hobi|Kemanusiaan (ksr, humaniora))=".number_format($prob_hobi_nonton_kemanusiaan, dec())."<br>";
    // echo "P(hobi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_hobi_nonton_senior, dec())."<br>";
    // echo "P(hobi|Pecinta Alam (MAPALA))=".number_format($prob_hobi_nonton_mapala, dec())."<br>";
    // echo "P(hobi|Persma)=".number_format($prob_hobi_nonton_persma, dec())."<br>";
    // echo "P(hobi|Bahasa)=".number_format($prob_hobi_nonton_bahasa, dec())."<br>";
    // echo "P(hobi|Pramuka))=".number_format($prob_hobi_nonton_pramuka, dec())."<br>";
    //     }

    // //Hobi hobi
    // $depan_hobi_maingame_wirausaha = sqrt($dua_phi*$s2_hobi_maingame_wirausaha);
    // $belakang_hobi_maingame_wirausaha = exp( ((pow($jurusan-$x_hobi_maingame_wirausaha,2)) / (2*$s2_pangkat2_hobi_maingame_wirausaha)));
    // $prob_hobi_maingame_wirausaha = 1/($depan_hobi_maingame_wirausaha * $belakang_hobi_maingame_wirausaha);
    //     //koleris
    // $depan_hobi_maingame_kemanusiaan = sqrt($dua_phi*$s2_hobi_maingame_kemanusiaan);
    // $belakang_hobi_maingame_kemanusiaan = exp( ((pow($jurusan-$x_hobi_maingame_kemanusiaan,2)) / (2*$s2_pangkat2_hobi_maingame_kemanusiaan)));
    // $prob_hobi_maingame_kemanusiaan = 1/($depan_hobi_maingame_kemanusiaan * $belakang_hobi_maingame_kemanusiaan);
    //     //melankolis
    // $depan_hobi_maingame_senior = sqrt($dua_phi*$s2_hobi_maingame_senior);
    // $belakang_hobi_maingame_senior = exp( ((pow($jurusan-$x_hobi_maingame_senior,2)) / (2*$s2_pangkat2_hobi_maingame_senior)));
    // $prob_hobi_maingame_senior = 1/($depan_hobi_maingame_senior * $belakang_hobi_maingame_senior);
    //     //koleris
    // $depan_hobi_maingame_mapala = sqrt($dua_phi*$s2_hobi_maingame_mapala);
    // $belakang_hobi_maingame_mapala = exp( ((pow($jurusan-$x_hobi_maingame_mapala,2)) / (2*$s2_pangkat2_hobi_maingame_mapala)));
    // $prob_hobi_maingame_mapala = 1/($depan_hobi_maingame_mapala * $belakang_hobi_maingame_mapala);
    //     //koleris
    // $depan_hobi_maingame_persma = sqrt($dua_phi*$s2_hobi_maingame_persma);
    // $belakang_hobi_maingame_persma = exp( ((pow($jurusan-$x_hobi_maingame_persma,2)) / (2*$s2_pangkat2_hobi_maingame_persma)));
    // $prob_hobi_maingame_persma = 1/($depan_hobi_maingame_persma * $belakang_hobi_maingame_persma);
    //     //koleris
    // $depan_hobi_maingame_bahasa = sqrt($dua_phi*$s2_hobi_maingame_bahasa);
    // $belakang_hobi_maingame_bahasa = exp( ((pow($jurusan-$x_hobi_maingame_bahasa,2)) / (2*$s2_pangkat2_hobi_maingame_bahasa)));
    // $prob_hobi_maingame_bahasa = 1/($depan_hobi_maingame_bahasa * $belakang_hobi_maingame_bahasa);
    //     //koleris
    // $depan_hobi_maingame_pramuka = sqrt($dua_phi*$s2_hobi_maingame_pramuka);
    // $belakang_hobi_maingame_pramuka = exp( ((pow($jurusan-$x_hobi_maingame_pramuka,2)) / (2*$s2_pangkat2_hobi_maingame_pramuka)));
    // $prob_hobi_maingame_pramuka = 1/($depan_hobi_maingame_pramuka * $belakang_hobi_maingame_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(hobi|Wirausaha)=".number_format($prob_hobi_maingame_wirausaha, dec())."<br>";
    // echo "P(hobi|Kemanusiaan (ksr, humaniora))=".number_format($prob_hobi_maingame_kemanusiaan, dec())."<br>";
    // echo "P(hobi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_hobi_maingame_senior, dec())."<br>";
    // echo "P(hobi|Pecinta Alam (MAPALA))=".number_format($prob_hobi_maingame_mapala, dec())."<br>";
    // echo "P(hobi|Persma)=".number_format($prob_hobi_maingame_persma, dec())."<br>";
    // echo "P(hobi|Bahasa)=".number_format($prob_hobi_maingame_bahasa, dec())."<br>";
    // echo "P(hobi|Pramuka))=".number_format($prob_hobi_maingame_pramuka, dec())."<br>";
    //     }

    // //Hobi hobi
    // $depan_hobi_jalan2_wirausaha = sqrt($dua_phi*$s2_hobi_jalan2_wirausaha);
    // $belakang_hobi_jalan2_wirausaha = exp( ((pow($jurusan-$x_hobi_jalan2_wirausaha,2)) / (2*$s2_pangkat2_hobi_jalan2_wirausaha)));
    // $prob_hobi_jalan2_wirausaha = 1/($depan_hobi_jalan2_wirausaha * $belakang_hobi_jalan2_wirausaha);
    //     //koleris
    // $depan_hobi_jalan2_kemanusiaan = sqrt($dua_phi*$s2_hobi_jalan2_kemanusiaan);
    // $belakang_hobi_jalan2_kemanusiaan = exp( ((pow($jurusan-$x_hobi_jalan2_kemanusiaan,2)) / (2*$s2_pangkat2_hobi_jalan2_kemanusiaan)));
    // $prob_hobi_jalan2_kemanusiaan = 1/($depan_hobi_jalan2_kemanusiaan * $belakang_hobi_jalan2_kemanusiaan);
    //     //melankolis
    // $depan_hobi_jalan2_senior = sqrt($dua_phi*$s2_hobi_jalan2_senior);
    // $belakang_hobi_jalan2_senior = exp( ((pow($jurusan-$x_hobi_jalan2_senior,2)) / (2*$s2_pangkat2_hobi_jalan2_senior)));
    // $prob_hobi_jalan2_senior = 1/($depan_hobi_jalan2_senior * $belakang_hobi_jalan2_senior);
    //     //koleris
    // $depan_hobi_jalan2_mapala = sqrt($dua_phi*$s2_hobi_jalan2_mapala);
    // $belakang_hobi_jalan2_mapala = exp( ((pow($jurusan-$x_hobi_jalan2_mapala,2)) / (2*$s2_pangkat2_hobi_jalan2_mapala)));
    // $prob_hobi_jalan2_mapala = 1/($depan_hobi_jalan2_mapala * $belakang_hobi_jalan2_mapala);
    //     //koleris
    // $depan_hobi_jalan2_persma = sqrt($dua_phi*$s2_hobi_jalan2_persma);
    // $belakang_hobi_jalan2_persma = exp( ((pow($jurusan-$x_hobi_jalan2_persma,2)) / (2*$s2_pangkat2_hobi_jalan2_persma)));
    // $prob_hobi_jalan2_persma = 1/($depan_hobi_jalan2_persma * $belakang_hobi_jalan2_persma);
    //     //koleris
    // $depan_hobi_jalan2_bahasa = sqrt($dua_phi*$s2_hobi_jalan2_bahasa);
    // $belakang_hobi_jalan2_bahasa = exp( ((pow($jurusan-$x_hobi_jalan2_bahasa,2)) / (2*$s2_pangkat2_hobi_jalan2_bahasa)));
    // $prob_hobi_jalan2_bahasa = 1/($depan_hobi_jalan2_bahasa * $belakang_hobi_jalan2_bahasa);
    //     //koleris
    // $depan_hobi_jalan2_pramuka = sqrt($dua_phi*$s2_hobi_jalan2_pramuka);
    // $belakang_hobi_jalan2_pramuka = exp( ((pow($jurusan-$x_hobi_jalan2_pramuka,2)) / (2*$s2_pangkat2_hobi_jalan2_pramuka)));
    // $prob_hobi_jalan2_pramuka = 1/($depan_hobi_jalan2_pramuka * $belakang_hobi_jalan2_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(hobi|Wirausaha)=".number_format($prob_hobi_jalan2_wirausaha, dec())."<br>";
    // echo "P(hobi|Kemanusiaan (ksr, humaniora))=".number_format($prob_hobi_jalan2_kemanusiaan, dec())."<br>";
    // echo "P(hobi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_hobi_jalan2_senior, dec())."<br>";
    // echo "P(hobi|Pecinta Alam (MAPALA))=".number_format($prob_hobi_jalan2_mapala, dec())."<br>";
    // echo "P(hobi|Persma)=".number_format($prob_hobi_jalan2_persma, dec())."<br>";
    // echo "P(hobi|Bahasa)=".number_format($prob_hobi_jalan2_bahasa, dec())."<br>";
    // echo "P(hobi|Pramuka))=".number_format($prob_hobi_jalan2_pramuka, dec())."<br>";
    //     }

    // //Hobi hobi
    // $depan_hobi_bhsasing_wirausaha = sqrt($dua_phi*$s2_hobi_bhsasing_wirausaha);
    // $belakang_hobi_bhsasing_wirausaha = exp( ((pow($jurusan-$x_hobi_bhsasing_wirausaha,2)) / (2*$s2_pangkat2_hobi_bhsasing_wirausaha)));
    // $prob_hobi_bhsasing_wirausaha = 1/($depan_hobi_bhsasing_wirausaha * $belakang_hobi_bhsasing_wirausaha);
    //     //koleris
    // $depan_hobi_bhsasing_kemanusiaan = sqrt($dua_phi*$s2_hobi_bhsasing_kemanusiaan);
    // $belakang_hobi_bhsasing_kemanusiaan = exp( ((pow($jurusan-$x_hobi_bhsasing_kemanusiaan,2)) / (2*$s2_pangkat2_hobi_bhsasing_kemanusiaan)));
    // $prob_hobi_bhsasing_kemanusiaan = 1/($depan_hobi_bhsasing_kemanusiaan * $belakang_hobi_bhsasing_kemanusiaan);
    //     //melankolis
    // $depan_hobi_bhsasing_senior = sqrt($dua_phi*$s2_hobi_bhsasing_senior);
    // $belakang_hobi_bhsasing_senior = exp( ((pow($jurusan-$x_hobi_bhsasing_senior,2)) / (2*$s2_pangkat2_hobi_bhsasing_senior)));
    // $prob_hobi_bhsasing_senior = 1/($depan_hobi_bhsasing_senior * $belakang_hobi_bhsasing_senior);
    //     //koleris
    // $depan_hobi_bhsasing_mapala = sqrt($dua_phi*$s2_hobi_bhsasing_mapala);
    // $belakang_hobi_bhsasing_mapala = exp( ((pow($jurusan-$x_hobi_bhsasing_mapala,2)) / (2*$s2_pangkat2_hobi_bhsasing_mapala)));
    // $prob_hobi_bhsasing_mapala = 1/($depan_hobi_bhsasing_mapala * $belakang_hobi_bhsasing_mapala);
    //     //koleris
    // $depan_hobi_bhsasing_persma = sqrt($dua_phi*$s2_hobi_bhsasing_persma);
    // $belakang_hobi_bhsasing_persma = exp( ((pow($jurusan-$x_hobi_bhsasing_persma,2)) / (2*$s2_pangkat2_hobi_bhsasing_persma)));
    // $prob_hobi_bhsasing_persma = 1/($depan_hobi_bhsasing_persma * $belakang_hobi_bhsasing_persma);
    //     //koleris
    // $depan_hobi_bhsasing_bahasa = sqrt($dua_phi*$s2_hobi_bhsasing_bahasa);
    // $belakang_hobi_bhsasing_bahasa = exp( ((pow($jurusan-$x_hobi_bhsasing_bahasa,2)) / (2*$s2_pangkat2_hobi_bhsasing_bahasa)));
    // $prob_hobi_bhsasing_bahasa = 1/($depan_hobi_bhsasing_bahasa * $belakang_hobi_bhsasing_bahasa);
    //     //koleris
    // $depan_hobi_bhsasing_pramuka = sqrt($dua_phi*$s2_hobi_bhsasing_pramuka);
    // $belakang_hobi_bhsasing_pramuka = exp( ((pow($jurusan-$x_hobi_bhsasing_pramuka,2)) / (2*$s2_pangkat2_hobi_bhsasing_pramuka)));
    // $prob_hobi_bhsasing_pramuka = 1/($depan_hobi_bhsasing_pramuka * $belakang_hobi_bhsasing_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(hobi|Wirausaha)=".number_format($prob_hobi_bhsasing_wirausaha, dec())."<br>";
    // echo "P(hobi|Kemanusiaan (ksr, humaniora))=".number_format($prob_hobi_bhsasing_kemanusiaan, dec())."<br>";
    // echo "P(hobi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_hobi_bhsasing_senior, dec())."<br>";
    // echo "P(hobi|Pecinta Alam (MAPALA))=".number_format($prob_hobi_bhsasing_mapala, dec())."<br>";
    // echo "P(hobi|Persma)=".number_format($prob_hobi_bhsasing_persma, dec())."<br>";
    // echo "P(hobi|Bahasa)=".number_format($prob_hobi_bhsasing_bahasa, dec())."<br>";
    // echo "P(hobi|Pramuka))=".number_format($prob_hobi_bhsasing_pramuka, dec())."<br>";
    //     }

    // //Hobi hobi
    // $depan_hobi_melukis_wirausaha = sqrt($dua_phi*$s2_hobi_melukis_wirausaha);
    // $belakang_hobi_melukis_wirausaha = exp( ((pow($jurusan-$x_hobi_melukis_wirausaha,2)) / (2*$s2_pangkat2_hobi_melukis_wirausaha)));
    // $prob_hobi_melukis_wirausaha = 1/($depan_hobi_melukis_wirausaha * $belakang_hobi_melukis_wirausaha);
    //     //koleris
    // $depan_hobi_melukis_kemanusiaan = sqrt($dua_phi*$s2_hobi_melukis_kemanusiaan);
    // $belakang_hobi_melukis_kemanusiaan = exp( ((pow($jurusan-$x_hobi_melukis_kemanusiaan,2)) / (2*$s2_pangkat2_hobi_melukis_kemanusiaan)));
    // $prob_hobi_melukis_kemanusiaan = 1/($depan_hobi_melukis_kemanusiaan * $belakang_hobi_melukis_kemanusiaan);
    //     //melankolis
    // $depan_hobi_melukis_senior = sqrt($dua_phi*$s2_hobi_melukis_senior);
    // $belakang_hobi_melukis_senior = exp( ((pow($jurusan-$x_hobi_melukis_senior,2)) / (2*$s2_pangkat2_hobi_melukis_senior)));
    // $prob_hobi_melukis_senior = 1/($depan_hobi_melukis_senior * $belakang_hobi_melukis_senior);
    //     //koleris
    // $depan_hobi_melukis_mapala = sqrt($dua_phi*$s2_hobi_melukis_mapala);
    // $belakang_hobi_melukis_mapala = exp( ((pow($jurusan-$x_hobi_melukis_mapala,2)) / (2*$s2_pangkat2_hobi_melukis_mapala)));
    // $prob_hobi_melukis_mapala = 1/($depan_hobi_melukis_mapala * $belakang_hobi_melukis_mapala);
    //     //koleris
    // $depan_hobi_melukis_persma = sqrt($dua_phi*$s2_hobi_melukis_persma);
    // $belakang_hobi_melukis_persma = exp( ((pow($jurusan-$x_hobi_melukis_persma,2)) / (2*$s2_pangkat2_hobi_melukis_persma)));
    // $prob_hobi_melukis_persma = 1/($depan_hobi_melukis_persma * $belakang_hobi_melukis_persma);
    //     //koleris
    // $depan_hobi_melukis_bahasa = sqrt($dua_phi*$s2_hobi_melukis_bahasa);
    // $belakang_hobi_melukis_bahasa = exp( ((pow($jurusan-$x_hobi_melukis_bahasa,2)) / (2*$s2_pangkat2_hobi_melukis_bahasa)));
    // $prob_hobi_melukis_bahasa = 1/($depan_hobi_melukis_bahasa * $belakang_hobi_melukis_bahasa);
    //     //koleris
    // $depan_hobi_melukis_pramuka = sqrt($dua_phi*$s2_hobi_melukis_pramuka);
    // $belakang_hobi_melukis_pramuka = exp( ((pow($jurusan-$x_hobi_melukis_pramuka,2)) / (2*$s2_pangkat2_hobi_melukis_pramuka)));
    // $prob_hobi_melukis_pramuka = 1/($depan_hobi_melukis_pramuka * $belakang_hobi_melukis_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(hobi|Wirausaha)=".number_format($prob_hobi_melukis_wirausaha, dec())."<br>";
    // echo "P(hobi|Kemanusiaan (ksr, humaniora))=".number_format($prob_hobi_melukis_kemanusiaan, dec())."<br>";
    // echo "P(hobi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_hobi_melukis_senior, dec())."<br>";
    // echo "P(hobi|Pecinta Alam (MAPALA))=".number_format($prob_hobi_melukis_mapala, dec())."<br>";
    // echo "P(hobi|Persma)=".number_format($prob_hobi_melukis_persma, dec())."<br>";
    // echo "P(hobi|Bahasa)=".number_format($prob_hobi_melukis_bahasa, dec())."<br>";
    // echo "P(hobi|Pramuka))=".number_format($prob_hobi_melukis_pramuka, dec())."<br>";
    //     }

    // //Hobi hobi
    // $depan_hobi_berenang_wirausaha = sqrt($dua_phi*$s2_hobi_berenang_wirausaha);
    // $belakang_hobi_berenang_wirausaha = exp( ((pow($jurusan-$x_hobi_berenang_wirausaha,2)) / (2*$s2_pangkat2_hobi_berenang_wirausaha)));
    // $prob_hobi_berenang_wirausaha = 1/($depan_hobi_berenang_wirausaha * $belakang_hobi_berenang_wirausaha);
    //     //koleris
    // $depan_hobi_berenang_kemanusiaan = sqrt($dua_phi*$s2_hobi_berenang_kemanusiaan);
    // $belakang_hobi_berenang_kemanusiaan = exp( ((pow($jurusan-$x_hobi_berenang_kemanusiaan,2)) / (2*$s2_pangkat2_hobi_berenang_kemanusiaan)));
    // $prob_hobi_berenang_kemanusiaan = 1/($depan_hobi_berenang_kemanusiaan * $belakang_hobi_berenang_kemanusiaan);
    //     //melankolis
    // $depan_hobi_berenang_senior = sqrt($dua_phi*$s2_hobi_berenang_senior);
    // $belakang_hobi_berenang_senior = exp( ((pow($jurusan-$x_hobi_berenang_senior,2)) / (2*$s2_pangkat2_hobi_berenang_senior)));
    // $prob_hobi_berenang_senior = 1/($depan_hobi_berenang_senior * $belakang_hobi_berenang_senior);
    //     //koleris
    // $depan_hobi_berenang_mapala = sqrt($dua_phi*$s2_hobi_berenang_mapala);
    // $belakang_hobi_berenang_mapala = exp( ((pow($jurusan-$x_hobi_berenang_mapala,2)) / (2*$s2_pangkat2_hobi_berenang_mapala)));
    // $prob_hobi_berenang_mapala = 1/($depan_hobi_berenang_mapala * $belakang_hobi_berenang_mapala);
    //     //koleris
    // $depan_hobi_berenang_persma = sqrt($dua_phi*$s2_hobi_berenang_persma);
    // $belakang_hobi_berenang_persma = exp( ((pow($jurusan-$x_hobi_berenang_persma,2)) / (2*$s2_pangkat2_hobi_berenang_persma)));
    // $prob_hobi_berenang_persma = 1/($depan_hobi_berenang_persma * $belakang_hobi_berenang_persma);
    //     //koleris
    // $depan_hobi_berenang_bahasa = sqrt($dua_phi*$s2_hobi_berenang_bahasa);
    // $belakang_hobi_berenang_bahasa = exp( ((pow($jurusan-$x_hobi_berenang_bahasa,2)) / (2*$s2_pangkat2_hobi_berenang_bahasa)));
    // $prob_hobi_berenang_bahasa = 1/($depan_hobi_berenang_bahasa * $belakang_hobi_berenang_bahasa);
    //     //koleris
    // $depan_hobi_berenang_pramuka = sqrt($dua_phi*$s2_hobi_berenang_pramuka);
    // $belakang_hobi_berenang_pramuka = exp( ((pow($jurusan-$x_hobi_berenang_pramuka,2)) / (2*$s2_pangkat2_hobi_berenang_pramuka)));
    // $prob_hobi_berenang_pramuka = 1/($depan_hobi_berenang_pramuka * $belakang_hobi_berenang_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(hobi|Wirausaha)=".number_format($prob_hobi_berenang_wirausaha, dec())."<br>";
    // echo "P(hobi|Kemanusiaan (ksr, humaniora))=".number_format($prob_hobi_berenang_kemanusiaan, dec())."<br>";
    // echo "P(hobi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_hobi_berenang_senior, dec())."<br>";
    // echo "P(hobi|Pecinta Alam (MAPALA))=".number_format($prob_hobi_berenang_mapala, dec())."<br>";
    // echo "P(hobi|Persma)=".number_format($prob_hobi_berenang_persma, dec())."<br>";
    // echo "P(hobi|Bahasa)=".number_format($prob_hobi_berenang_bahasa, dec())."<br>";
    // echo "P(hobi|Pramuka))=".number_format($prob_hobi_berenang_pramuka, dec())."<br>";
    //     }

    // //Hobi hobi
    // $depan_hobi_naikgunung_wirausaha = sqrt($dua_phi*$s2_hobi_naikgunung_wirausaha);
    // $belakang_hobi_naikgunungwirausaha = exp( ((pow($jurusan-$x_hobi_naikgunung_wirausaha,2)) / (2*$s2_pangkat2_hobi_naikgunung_wirausaha)));
    // $prob_hobi_naikgunung_wirausaha = 1/($depan_hobi_naikgunung_wirausaha * $belakang_hobi_naikgunung_wirausaha);
    //     //koleris
    // $depan_hobi_naikgunung_kemanusiaan = sqrt($dua_phi*$s2_hobi_naikgunung_kemanusiaan);
    // $belakang_hobi_naikgunung_kemanusiaan = exp( ((pow($jurusan-$x_hobi_naikgunung_kemanusiaan,2)) / (2*$s2_pangkat2_hobi_naikgunung_kemanusiaan)));
    // $prob_hobi_naikgunung_kemanusiaan = 1/($depan_hobi_naikgunung_kemanusiaan * $belakang_hobi_naikgunung_kemanusiaan);
    //     //melankolis
    // $depan_hobi_naikgunung_senior = sqrt($dua_phi*$s2_hobi_naikgunung_senior);
    // $belakang_hobi_naikgunung_senior = exp( ((pow($jurusan-$x_hobi_naikgunung_senior,2)) / (2*$s2_pangkat2_hobi_naikgunung_senior)));
    // $prob_hobi_naikgunung_senior = 1/($depan_hobi_naikgunung_senior * $belakang_hobi_naikgunung_senior);
    //     //koleris
    // $depan_hobi_naikgunung_mapala = sqrt($dua_phi*$s2_hobi_naikgunung_mapala);
    // $belakang_hobi_naikgunung_mapala = exp( ((pow($jurusan-$x_hobi_naikgunung_mapala,2)) / (2*$s2_pangkat2_hobi_naikgunung_mapala)));
    // $prob_hobi_naikgunung_mapala = 1/($depan_hobi_naikgunung_mapala * $belakang_hobi_naikgunung_mapala);
    //     //koleris
    // $depan_hobi_naikgunung_persma = sqrt($dua_phi*$s2_hobi_naikgunung_persma);
    // $belakang_hobi_naikgunung_persma = exp( ((pow($jurusan-$x_hobi_naikgunung_persma,2)) / (2*$s2_pangkat2_hobi_naikgunung_persma)));
    // $prob_hobi_naikgunung_persma = 1/($depan_hobi_naikgunung_persma * $belakang_hobi_naikgunung_persma);
    //     //koleris
    // $depan_hobi_naikgunung_bahasa = sqrt($dua_phi*$s2_hobi_naikgunung_bahasa);
    // $belakang_hobi_naikgunung_bahasa = exp( ((pow($jurusan-$x_hobi_naikgunung_bahasa,2)) / (2*$s2_pangkat2_hobi_naikgunung_bahasa)));
    // $prob_hobi_naikgunung_bahasa = 1/($depan_hobi_naikgunung_bahasa * $belakang_hobi_naikgunung_bahasa);
    //     //koleris
    // $depan_hobi_naikgunung_pramuka = sqrt($dua_phi*$s2_hobi_naikgunung_pramuka);
    // $belakang_hobi_naikgunung_pramuka = exp( ((pow($jurusan-$x_hobi_naikgunung_pramuka,2)) / (2*$s2_pangkat2_hobi_naikgunung_pramuka)));
    // $prob_hobi_naikgunung_pramuka = 1/($depan_hobi_naikgunung_pramuka * $belakang_hobi_naikgunung_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(hobi|Wirausaha)=".number_format($prob_hobi_naikgunung_wirausaha, dec())."<br>";
    // echo "P(hobi|Kemanusiaan (ksr, humaniora))=".number_format($prob_hobi_naikgunung_kemanusiaan, dec())."<br>";
    // echo "P(hobi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_hobi_naikgunung_senior, dec())."<br>";
    // echo "P(hobi|Pecinta Alam (MAPALA))=".number_format($prob_hobi_naikgunung_mapala, dec())."<br>";
    // echo "P(hobi|Persma)=".number_format($prob_hobi_naikgunung_persma, dec())."<br>";
    // echo "P(hobi|Bahasa)=".number_format($prob_hobi_naikgunung_bahasa, dec())."<br>";
    // echo "P(hobi|Pramuka))=".number_format($prob_hobi_naikgunung_pramuka, dec())."<br>";
    //     }

    // //Hobi hobi
    // $depan_hobi_travelling_wirausaha = sqrt($dua_phi*$s2_hobi_travelling_wirausaha);
    // $belakang_hobi_travelling_wirausaha = exp( ((pow($jurusan-$x_hobi_travelling_wirausaha,2)) / (2*$s2_pangkat2_hobi_travelling_wirausaha)));
    // $prob_hobi_travelling_wirausaha = 1/($depan_hobi_travelling_wirausaha * $belakang_hobi_travelling_wirausaha);
    //     //koleris
    // $depan_hobi_travelling_kemanusiaan = sqrt($dua_phi*$s2_hobi_travelling_kemanusiaan);
    // $belakang_hobi_travelling_kemanusiaan = exp( ((pow($jurusan-$x_hobi_travelling_kemanusiaan,2)) / (2*$s2_pangkat2_hobi_travelling_kemanusiaan)));
    // $prob_hobi_travelling_kemanusiaan = 1/($depan_hobi_travelling_kemanusiaan * $belakang_hobi_travelling_kemanusiaan);
    //     //melankolis
    // $depan_hobi_travelling_senior = sqrt($dua_phi*$s2_hobi_travelling_senior);
    // $belakang_hobi_travelling_senior = exp( ((pow($jurusan-$x_hobi_travelling_senior,2)) / (2*$s2_pangkat2_hobi_travelling_senior)));
    // $prob_hobi_travelling_senior = 1/($depan_hobi_travelling_senior * $belakang_hobi_travelling_senior);
    //     //koleris
    // $depan_hobi_travellingg_mapala = sqrt($dua_phi*$s2_hobi_travelling_mapala);
    // $belakang_hobi_travelling_mapala = exp( ((pow($jurusan-$x_hobi_travelling_mapala,2)) / (2*$s2_pangkat2_hobi_travelling_mapala)));
    // $prob_hobi_travelling_mapala = 1/($depan_hobi_travelling_mapala * $belakang_hobi_travelling_mapala);
    //     //koleris
    // $depan_hobi_travelling_persma = sqrt($dua_phi*$s2_hobi_travelling_persma);
    // $belakang_hobi_travelling_persma = exp( ((pow($jurusan-$x_hobi_travelling_persma,2)) / (2*$s2_pangkat2_hobi_travelling_persma)));
    // $prob_hobi_travelling_persma = 1/($depan_hobi_travelling_persma * $belakang_hobi_travelling_persma);
    //     //koleris
    // $depan_hobi_travelling_bahasa = sqrt($dua_phi*$s2_hobi_travelling_bahasa);
    // $belakang_hobi_travelling_bahasa = exp( ((pow($jurusan-$x_hobi_travelling_bahasa,2)) / (2*$s2_pangkat2_hobi_travelling_bahasa)));
    // $prob_hobi_travelling_bahasa = 1/($depan_hobi_travelling_bahasa * $belakang_hobi_travelling_bahasa);
    //     //koleris
    // $depan_hobi_travelling_pramuka = sqrt($dua_phi*$s2_hobi_travelling_pramuka);
    // $belakang_hobi_travelling_pramuka = exp( ((pow($jurusan-$x_hobi_travelling_pramuka,2)) / (2*$s2_pangkat2_hobi_travelling_pramuka)));
    // $prob_hobi_travelling_pramuka = 1/($depan_hobi_travelling_pramuka * $belakang_hobi_travelling_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(hobi|Wirausaha)=".number_format($prob_hobi_travelling_wirausaha, dec())."<br>";
    // echo "P(hobi|Kemanusiaan (ksr, humaniora))=".number_format($prob_hobi_travelling_kemanusiaan, dec())."<br>";
    // echo "P(hobi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_hobi_travelling_senior, dec())."<br>";
    // echo "P(hobi|Pecinta Alam (MAPALA))=".number_format($prob_hobi_travelling_mapala, dec())."<br>";
    // echo "P(hobi|Persma)=".number_format($prob_hobi_travelling_persma, dec())."<br>";
    // echo "P(hobi|Bahasa)=".number_format($prob_hobi_travelling_bahasa, dec())."<br>";
    // echo "P(hobi|Pramuka))=".number_format($prob_hobi_travelling_pramuka, dec())."<br>";
    //     }

    // //Hobi hobi
    // $depan_hobi_desaingrafis_wirausaha = sqrt($dua_phi*$s2_hobi_desaingrafis_wirausaha);
    // $belakang_hobi_desaingrafis_wirausaha = exp( ((pow($jurusan-$x_hobi_desaingrafis_wirausaha,2)) / (2*$s2_pangkat2_hobi_desaingrafis_wirausaha)));
    // $prob_hobi_desaingrafis_wirausaha = 1/($depan_hobi_desaingrafis_wirausaha * $belakang_hobi_berenang_wirausaha);
    //     //koleris
    // $depan_hobi_desaingrafis_kemanusiaan = sqrt($dua_phi*$s2_hobi_desaingrafis_kemanusiaan);
    // $belakang_hobi_desaingrafis_kemanusiaan = exp( ((pow($jurusan-$x_hobi_desaingrafis_kemanusiaan,2)) / (2*$s2_pangkat2_hobi_desaingrafis_kemanusiaan)));
    // $prob_hobi_desaingrafis_kemanusiaan = 1/($depan_hobi_desaingrafis_kemanusiaan * $belakang_hobi_desaingrafis_kemanusiaan);
    //     //melankolis
    // $depan_hobi_desaingrafis_senior = sqrt($dua_phi*$s2_hobi_desaingrafis_senior);
    // $belakang_hobi_desaingrafis_senior = exp( ((pow($jurusan-$x_hobi_desaingrafis_senior,2)) / (2*$s2_pangkat2_hobi_desaingrafis_senior)));
    // $prob_hobi_desaingrafis_senior = 1/($depan_hobi_desaingrafis_senior * $belakang_hobi_desaingrafis_senior);
    //     //koleris
    // $depan_hobi_desaingrafis_mapala = sqrt($dua_phi*$s2_hobi_desaingrafis_mapala);
    // $belakang_hobi_desaingrafis_mapala = exp( ((pow($jurusan-$x_hobi_desaingrafis_mapala,2)) / (2*$s2_pangkat2_hobi_desaingrafis_mapala)));
    // $prob_hobi_desaingrafis_mapala = 1/($depan_hobi_desaingrafis_mapala * $belakang_hobi_desaingrafis_mapala);
    //     //koleris
    // $depan_hobi_desaingrafis_persma = sqrt($dua_phi*$s2_hobi_desaingrafis_persma);
    // $belakang_hobi_desaingrafis_persma = exp( ((pow($jurusan-$x_hobi_desaingrafis_persma,2)) / (2*$s2_pangkat2_hobi_desaingrafis_persma)));
    // $prob_hobi_desaingrafis_persma = 1/($depan_hobi_desaingrafis_persma * $belakang_hobi_desaingrafis_persma);
    //     //koleris
    // $depan_hobi_desaingrafis_bahasa = sqrt($dua_phi*$s2_hobi_desaingrafis_bahasa);
    // $belakang_hobi_desaingrafis_bahasa = exp( ((pow($jurusan-$x_hobi_desaingrafis_bahasa,2)) / (2*$s2_pangkat2_hobi_desaingrafis_bahasa)));
    // $prob_hobi_desaingrafis_bahasa = 1/($depan_hobi_desaingrafis_bahasa * $belakang_hobi_desaingrafis_bahasa);
    //     //koleris
    // $depan_hobi_desaingrafis_pramuka = sqrt($dua_phi*$s2_hobi_desaingrafis_pramuka);
    // $belakang_hobi_desaingrafis_pramuka = exp( ((pow($jurusan-$x_hobi_desaingrafis_pramuka,2)) / (2*$s2_pangkat2_hobi_desaingrafis_pramuka)));
    // $prob_hobi_desaingrafis_pramuka = 1/($depan_hobi_desaingrafis_pramuka * $belakang_hobi_desaingrafis_pramuka);
    //     //display
    //    if($show_perhitungan){
    // echo "<br>";
    // echo "P(hobi|Wirausaha)=".number_format($prob_hobi_desaingrafis_wirausaha, dec())."<br>";
    // echo "P(hobi|Kemanusiaan (ksr, humaniora))=".number_format($prob_hobi_desaingrafis_kemanusiaan, dec())."<br>";
    // echo "P(hobi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_hobi_desaingrafis_senior, dec())."<br>";
    // echo "P(hobi|Pecinta Alam (MAPALA))=".number_format($prob_hobi_desaingrafis_mapala, dec())."<br>";
    // echo "P(hobi|Persma)=".number_format($prob_hobi_desaingrafis_persma, dec())."<br>";
    // echo "P(hobi|Bahasa)=".number_format($prob_hobi_desaingrafis_bahasa, dec())."<br>";
    // echo "P(hobi|Pramuka))=".number_format($prob_hobi_desaingrafis_pramuka, dec())."<br>";
    //     }

    //probablitas jurusan
    $prob_jurusan_wirausaha = get_jumlah_atribut($db_object, "jurusan", $jurusan, "Wirausaha") / $jumlah_wirausaha;
    $prob_jurusan_kemanusiaan = get_jumlah_atribut($db_object, "jurusan", $jurusan, "Kemanusiaan (ksr, humaniora)") / $jumlah_kemanusiaan;
    $prob_jurusan_senior = get_jumlah_atribut($db_object, "jurusan", $jurusan, "SENIOR (senior, bola, karate, taekwondo)") / $jumlah_senior;
    $prob_jurusan_mapala = get_jumlah_atribut($db_object, "jurusan", $jurusan, "Pecinta Alam (MAPALA)") / $jumlah_mapala;
    $prob_jurusan_persma = get_jumlah_atribut($db_object, "jurusan", $jurusan, "Persma") / $jumlah_persma;
    $prob_jurusan_bahasa = get_jumlah_atribut($db_object, "jurusan", $jurusan, "Bahasa") / $jumlah_bahasa;
    $prob_jurusan_pramuka = get_jumlah_atribut($db_object, "jurusan", $jurusan, "Pramuka") / $jumlah_pramuka;

    if($show_perhitungan){
    echo "<br>";
    echo "P(jurusan|Wirausaha)=".number_format($prob_jurusan_wirausaha, dec())."<br>";
    echo "P(jurusan|Kemanusiaan (ksr, humaniora))=".number_format($prob_jurusan_kemanusiaan, dec())."<br>";
    echo "P(jurusan|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_jurusan_senior, dec())."<br>";
    echo "P(jurusan|Pecinta Alam (MAPALA))=".number_format($prob_jurusan_mapala, dec())."<br>";
    echo "P(jurusan|Persma)=".number_format($prob_jurusan_persma, dec())."<br>";
    echo "P(jurusan|Bahasa)=".number_format($prob_jurusan_bahasa, dec())."<br>";
    echo "P(jurusan|Pramuka))=".number_format($prob_jurusan_pramuka, dec())."<br>";
        }
    //probablitas prodi
    $prob_prodi_wirausaha = get_jumlah_atribut($db_object, "prodi", $prodi, "Wirausaha") / $jumlah_wirausaha;
    $prob_prodi_kemanusiaan = get_jumlah_atribut($db_object, "prodi", $prodi, "Kemanusiaan (ksr, humaniora)") / $jumlah_kemanusiaan;
    $prob_prodi_senior = get_jumlah_atribut($db_object, "prodi", $prodi, "SENIOR (senior, bola, karate, taekwondo)") / $jumlah_senior;
    $prob_prodi_mapala = get_jumlah_atribut($db_object, "prodi", $prodi, "Pecinta Alam (MAPALA)") / $jumlah_mapala;
    $prob_prodi_persma = get_jumlah_atribut($db_object, "prodi", $prodi, "Persma") / $jumlah_persma;
    $prob_prodi_bahasa = get_jumlah_atribut($db_object, "prodi", $prodi, "Bahasa") / $jumlah_bahasa;
    $prob_prodi_pramuka = get_jumlah_atribut($db_object, "prodi", $prodi, "Pramuka") / $jumlah_pramuka;

    if($show_perhitungan){
    echo "<br>";
    echo "P(prodi|Wirausaha)=".number_format($prob_prodi_wirausaha, dec())."<br>";
    echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_kemanusiaan, dec())."<br>";
    echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodi_senior, dec())."<br>";
    echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_mapala, dec())."<br>";
    echo "P(prodi|Persma)=".number_format($prob_prodi_persma, dec())."<br>";
    echo "P(prodi|Bahasa)=".number_format($prob_prodi_bahasa, dec())."<br>";
    echo "P(prodi|Pramuka))=".number_format($prob_prodi_pramuka, dec())."<br>";
        }

    //probablitas minat
    $prob_minat_wirausaha = get_jumlah_atribut($db_object, "minat", $minat, "Wirausaha") / $jumlah_wirausaha;
    $prob_minat_kemanusiaan = get_jumlah_atribut($db_object, "minat", $minat, "Kemanusiaan (ksr, humaniora)") / $jumlah_kemanusiaan;
    $prob_minat_senior = get_jumlah_atribut($db_object, "minat", $minat, "SENIOR (senior, bola, karate, taekwondo)") / $jumlah_senior;
    $prob_minat_mapala = get_jumlah_atribut($db_object, "minat", $minat, "Pecinta Alam (MAPALA)") / $jumlah_mapala;
    $prob_minat_persma = get_jumlah_atribut($db_object, "minat", $minat, "Persma") / $jumlah_persma;
    $prob_minat_bahasa = get_jumlah_atribut($db_object, "minat", $minat, "Bahasa") / $jumlah_bahasa;
    $prob_minat_pramuka = get_jumlah_atribut($db_object, "minat", $minat, "Pramuka") / $jumlah_pramuka;

    if($show_perhitungan){
    echo "<br>";
    echo "P(minat|Wirausaha)=".number_format($prob_minat_wirausaha, dec())."<br>";
    echo "P(minat|Kemanusiaan (ksr, humaniora))=".number_format($prob_minat_kemanusiaan, dec())."<br>";
    echo "P(minat|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_minat_senior, dec())."<br>";
    echo "P(minat|Pecinta Alam (MAPALA))=".number_format($prob_minat_mapala, dec())."<br>";
    echo "P(minat|Persma)=".number_format($prob_minat_persma, dec())."<br>";
    echo "P(minat|Bahasa)=".number_format($prob_minat_bahasa, dec())."<br>";
    echo "P(minat|Pramuka))=".number_format($prob_minat_pramuka, dec())."<br>";
        }

    //probablitas bakat
    $prob_bakat_wirausaha = get_jumlah_atribut($db_object, "bakat", $bakat, "Wirausaha") / $jumlah_wirausaha;
    $prob_bakat_kemanusiaan = get_jumlah_atribut($db_object, "bakat", $bakat, "Kemanusiaan (ksr, humaniora)") / $jumlah_kemanusiaan;
    $prob_bakat_senior = get_jumlah_atribut($db_object, "bakat", $bakat, "SENIOR (senior, bola, karate, taekwondo)") / $jumlah_senior;
    $prob_bakat_mapala = get_jumlah_atribut($db_object, "bakat", $bakat, "Pecinta Alam (MAPALA)") / $jumlah_mapala;
    $prob_bakat_persma = get_jumlah_atribut($db_object, "bakat", $bakat, "Persma") / $jumlah_persma;
    $prob_bakat_bahasa = get_jumlah_atribut($db_object, "bakat", $bakat, "Bahasa") / $jumlah_bahasa;
    $prob_bakat_pramuka = get_jumlah_atribut($db_object, "bakat", $bakat, "Pramuka") / $jumlah_pramuka;

    if($show_perhitungan){
    echo "<br>";
    echo "P(bakat|Wirausaha)=".number_format($prob_bakat_wirausaha, dec())."<br>";
    echo "P(bakat|Kemanusiaan (ksr, humaniora))=".number_format($prob_bakat_kemanusiaan, dec())."<br>";
    echo "P(bakat|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_bakat_senior, dec())."<br>";
    echo "P(bakat|Pecinta Alam (MAPALA))=".number_format($prob_bakat_mapala, dec())."<br>";
    echo "P(bakat|Persma)=".number_format($prob_bakat_persma, dec())."<br>";
    echo "P(bakat|Bahasa)=".number_format($prob_bakat_bahasa, dec())."<br>";
    echo "P(bakat|Pramuka))=".number_format($prob_bakat_pramuka, dec())."<br>";
        }

    //probablitas hobi
    $prob_hobi_wirausaha = get_jumlah_atribut($db_object, "hobi", $hobi, "Wirausaha") / $jumlah_wirausaha;
    $prob_hobi_kemanusiaan = get_jumlah_atribut($db_object, "hobi", $hobi, "Kemanusiaan (ksr, humaniora)") / $jumlah_kemanusiaan;
    $prob_hobi_senior = get_jumlah_atribut($db_object, "hobi", $hobi, "SENIOR (senior, bola, karate, taekwondo)") / $jumlah_senior;
    $prob_hobi_mapala = get_jumlah_atribut($db_object, "hobi", $hobi, "Pecinta Alam (MAPALA)") / $jumlah_mapala;
    $prob_hobi_persma = get_jumlah_atribut($db_object, "hobi", $hobi, "Persma") / $jumlah_persma;
    $prob_hobi_bahasa = get_jumlah_atribut($db_object, "hobi", $hobi, "Bahasa") / $jumlah_bahasa;
    $prob_hobi_pramuka = get_jumlah_atribut($db_object, "hobi", $hobi, "Pramuka") / $jumlah_pramuka;

    if($show_perhitungan){
    echo "<br>";
    echo "P(hobi|Wirausaha)=".number_format($prob_hobi_wirausaha, dec())."<br>";
    echo "P(hobi|Kemanusiaan (ksr, humaniora))=".number_format($prob_hobi_kemanusiaan, dec())."<br>";
    echo "P(hobi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_hobi_senior, dec())."<br>";
    echo "P(hobi|Pecinta Alam (MAPALA))=".number_format($prob_hobi_mapala, dec())."<br>";
    echo "P(hobi|Persma)=".number_format($prob_hobi_persma, dec())."<br>";
    echo "P(hobi|Bahasa)=".number_format($prob_hobi_bahasa, dec())."<br>";
    echo "P(hobi|Pramuka))=".number_format($prob_hobi_pramuka, dec())."<br>";
        }
       
        //===============================
    $nilai_wirausaha = $p_wirausaha * $prob_jurusan_wirausaha * $prob_prodi_wirausaha *
                    $prob_minat_wirausaha * $prob_bakat_wirausaha * $prob_hobi_wirausaha;
        if($show_perhitungan){
    echo "<br>";
    echo "Nilai Wirausaha = ".number_format($p_wirausaha, dec())
                            ." x ".number_format($prob_jurusan_wirausaha, dec())
                            ." x ".number_format($prob_prodi_wirausaha, dec())
                            ." x ".number_format($prob_minat_wirausaha, dec())
                            ." x ".number_format($prob_bakat_wirausaha, dec())
                            ." x ".number_format($prob_hobi_wirausaha, dec())
                            ." = ".number_format($nilai_wirausaha, 20);
        }
        //===============================
   $nilai_kemanusiaan = $p_kemanusiaan * $prob_jurusan_kemanusiaan * $prob_prodi_kemanusiaan *
                    $prob_minat_kemanusiaan * $prob_bakat_kemanusiaan * $prob_hobi_kemanusiaan;
    if($show_perhitungan){
        echo "<br>";
    echo "Nilai Kemanusiaan (ksr, humaniora) = ".number_format($p_kemanusiaan, dec())
                            ." x ".number_format($prob_jurusan_kemanusiaan, dec())
                            ." x ".number_format($prob_prodi_kemanusiaan, dec())
                            ." x ".number_format($prob_minat_kemanusiaan, dec())
                            ." x ".number_format($prob_bakat_kemanusiaan, dec())
                            ." x ".number_format($prob_hobi_kemanusiaan, dec())
                            ." = ".number_format($nilai_kemanusiaan, 20);
        }
        //===============================
        $nilai_senior = $p_senior * $prob_jurusan_senior * $prob_prodi_senior *
                    $prob_minat_senior * $prob_bakat_senior * $prob_hobi_senior;
    if($show_perhitungan){
        echo "<br>";
    echo "Nilai SENIOR (senior, bola, karate, taekwondo) = ".number_format($p_senior, dec())
                            ." x ".number_format($prob_jurusan_senior, dec())
                            ." x ".number_format($prob_prodi_senior, dec())
                            ." x ".number_format($prob_minat_senior, dec())
                            ." x ".number_format($prob_bakat_senior, dec())
                            ." x ".number_format($prob_hobi_senior, dec())
                            ." = ".number_format($nilai_senior, 20);
        }
        //===============================
         $nilai_mapala = $p_mapala * $prob_jurusan_mapala * $prob_prodi_mapala *
                    $prob_minat_mapala * $prob_bakat_mapala * $prob_hobi_mapala;
        if($show_perhitungan){
        echo "<br>";
        echo "Nilai Pecinta Alam (MAPALA) = ".number_format($p_mapala, dec())
                            ." x ".number_format($prob_jurusan_mapala, dec())
                            ." x ".number_format($prob_prodi_mapala, dec())
                            ." x ".number_format($prob_minat_mapala, dec())
                            ." x ".number_format($prob_bakat_mapala, dec())
                            ." x ".number_format($prob_hobi_mapala, dec())
                            ." = ".number_format($nilai_mapala, 20);
        }

        //===============================
        $nilai_persma = $p_persma * $prob_jurusan_persma * $prob_prodi_persma *
                    $prob_minat_persma * $prob_bakat_persma * $prob_hobi_persma;
        if($show_perhitungan){
        echo "<br>";
        echo "Nilai Persma = ".number_format($p_persma, dec())
                            ." x ".number_format($prob_jurusan_persma, dec())
                            ." x ".number_format($prob_prodi_persma, dec())
                            ." x ".number_format($prob_minat_persma, dec())
                            ." x ".number_format($prob_bakat_persma, dec())
                            ." x ".number_format($prob_hobi_persma, dec())
                            ." = ".number_format($nilai_persma, 20);
        }

        //===============================
        $nilai_bahasa = $p_bahasa * $prob_jurusan_bahasa * $prob_prodi_bahasa *
                    $prob_minat_bahasa * $prob_bakat_bahasa * $prob_hobi_bahasa;
        if($show_perhitungan){
            echo "<br>";
        echo "Nilai Bahasa = ".number_format($p_bahasa, dec())
                            ." x ".number_format($prob_jurusan_bahasa, dec())
                            ." x ".number_format($prob_prodi_bahasa, dec())
                            ." x ".number_format($prob_minat_bahasa, dec())
                            ." x ".number_format($prob_bakat_bahasa, dec())
                            ." x ".number_format($prob_hobi_bahasa, dec())
                            ." = ".number_format($nilai_bahasa, 20);
        }

        //===============================
        $nilai_pramuka = $p_pramuka * $prob_jurusan_pramuka * $prob_prodi_pramuka *
                    $prob_minat_pramuka * $prob_bakat_pramuka * $prob_hobi_pramuka;
    if($show_perhitungan){
        echo "<br>";
    echo "Nilai Pramuka = ".number_format($p_pramuka, dec())
                            ." x ".number_format($prob_jurusan_pramuka, dec())
                            ." x ".number_format($prob_prodi_pramuka, dec())
                            ." x ".number_format($prob_minat_pramuka, dec())
                            ." x ".number_format($prob_bakat_pramuka, dec())
                            ." x ".number_format($prob_hobi_pramuka, dec())
                            ." = ".number_format($nilai_pramuka, 20);


    echo "<br><br>";
        }
    $hasil_rekomendasi = '';
    if($nilai_wirausaha>=$nilai_kemanusiaan && $nilai_wirausaha>=$nilai_senior && $nilai_wirausaha>=$nilai_mapala && $nilai_wirausaha>=$nilai_persma && $nilai_wirausaha>=$nilai_bahasa && $nilai_wirausaha>=$nilai_pramuka){
        $hasil_rekomendasi = 'Wirausaha';
    }
    elseif($nilai_kemanusiaan>=$nilai_wirausaha && $nilai_kemanusiaan=$nilai_senior && $nilai_kemanusiaan>=$nilai_mapala && $nilai_kemanusiaan=$nilai_persma && $nilai_kemanusiaan=$nilai_bahasa && $nilai_kemanusiaan=$nilai_pramuka){
        $hasil_rekomendasi = 'Kemanusiaan';
    }
    elseif($nilai_senior>=$nilai_wirausaha && $nilai_senior>=$nilai_kemanusiaan && $nilai_senior>=$nilai_mapala && $nilai_senior=$nilai_persma && $nilai_senior=$nilai_bahasa && $nilai_senior=$nilai_pramuka){
        $hasil_rekomendasi = 'SENIOR (senior, bola, karate, taekwondo)';
    }
    elseif($nilai_mapala>=$nilai_wirausaha && $nilai_mapala>=$nilai_kemanusiaan && $nilai_mapala>=$nilai_senior && $nilai_mapala>=$nilai_persma && $nilai_mapala>=$nilai_bahasa && $nilai_mapala>=$nilai_pramuka){
        $hasil_rekomendasi = 'Pecinta Alam (MAPALA)';
    }
    elseif($nilai_persma>=$nilai_wirausaha && $nilai_persma>=$nilai_kemanusiaan && $nilai_persma>=$nilai_senior && $nilai_persma>=$nilai_mapala && $nilai_persma>=$nilai_bahasa && $nilai_persma>=$nilai_pramuka){
        $hasil_rekomendasi = 'Persma';
    }
    elseif($nilai_bahasa>=$nilai_wirausaha && $nilai_bahasa>=$nilai_kemanusiaan && $nilai_bahasa>=$nilai_senior && $nilai_bahasa>=$nilai_mapala && $nilai_bahasa>=$nilai_persma && $nilai_bahasa>=$nilai_pramuka){
        $hasil_rekomendasi = 'Bahasa';
    }
    elseif($nilai_pramuka>=$nilai_wirausaha && $nilai_pramuka>=$nilai_kemanusiaan && $nilai_pramuka>=$nilai_senior && $nilai_pramuka>=$nilai_mapala && $nilai_pramuka>=$nilai_persma && $nilai_pramuka>=$nilai_bahasa){
        $hasil_rekomendasi = 'Pramuka';
    }
    echo "<strong>";
    echo "<h2>";
    echo "Hasil prediksi = ".$hasil_rekomendasi;
    echo "</h2>";
    echo "</strong>";
    echo "<br>";

//    $nilai_sanguin = number_format($nilai_sanguin, 50);
//    $nilai_koleris = number_format($nilai_koleris, 50);
    if($id_testing>0){
        $res_hasil = update_hasil_rekomendasi($db_object, $id_esting, $hasil_rekomendasi, 
                $nilai_wirausaha, $nilai_kemanusiaan, $nilai_senior, $nilai_mapala, $nilai_persma, $nilai_bahasa, 
                $nilai_pramuka);
    }
    return array($hasil_rekomendasi, $nilai_wirausaha, $nilai_kemanusiaan, $nilai_senior, $nilai_mapala, $nilai_persma, $nilai_bahasa, $nilai_pramuka);
      
}
    
function update_hasil_rekomendasi($db_object, $id_testing, $hasil, $wirausaha, $kemanusiaan, $senior, $mapala, 
    $persma, $bahasa, $pramuka){
    $sql = "UPDATE tb_data_testing "
                . "SET "
                . "kelas_hasil='$hasil', "
                . "nilai_wirausaha='$wirausaha', "
                . "nilai_kemanusiaan='$kemanusiaan', "
                . "nilai_senior='$senior', "
                . "nilai_mapala='$mapala', "
                . "nilai_persma='$persma', "
                . "nilai_bahasa='$bahasa', "
                . "nilai_pramuka='$pramuka' 
                WHERE id=$id_testing";
    return $db_object->db_query($sql);
}


// function get_jumlah_sum_atribut($db_object, $atribut, $label){
//     $sql = "SELECT SUM($atribut) FROM tb_data_testing WHERE label='$label'";
//     $res = $db_object->db_query($sql);
//     $row = $db_object->db_fetch_array($res);
//     return $row[0];
// }

function get_jumlah_atribut($db_object, $atribut, $nilai, $label){
    $sql = "SELECT COUNT(*) FROM tb_data_training WHERE $atribut='$nilai' AND label='$label'";
    $res = $db_object->db_query($sql);
    $row = $db_object->db_fetch_array($res);
    return $row[0];
}


// function get_s2_populasi($db_object, $atribut, $label, $x_params, $jml_params){
//     $sql = "SELECT $atribut FROM tb_data_training WHERE label='$label'";
//     $res = $db_object->db_query($sql);
//     $sum_power = 0;
//     while($row = $db_object->db_fetch_array($res)){
//         $power = pow($row[0]-$x_params,2);
//         $sum_power += $power;
//     }
//     $s2 = $sum_power/($jml_params-1);
//     return $s2;
// }
?>

