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
     //jurusan
    $jumlah_jurusan_wirusaha = get_jumlah_sum_atribut($db_object, "jurusan", "Wirausaha");
    $x_jurusan_wirusaha = $jumlah_jurusan_wirusaha/$jumlah_wirausaha;
    //xusia  koleris
    $jumlah_jurusan_kemanusiaan = get_jumlah_sum_atribut($db_object, "jurusan", "Kemanusiaan (ksr, humaniora)");
    $x_jurusan_kemanusiaan = $jumlah_jurusan_kemanusiaan/$jumlah_kemanusiaan;
        //xusia  melankolis
    $jumlah_jurusan_senior = get_jumlah_sum_atribut($db_object, "jurusan", "SENIOR (senior, bola, karate, taekwondo)");
    $x_jurusan_senior = $jumlah_jurusan_senior/$jumlah_senior;
        //xusia  plegmatis
    $jumlah_jurusan_mapala = get_jumlah_sum_atribut($db_object, "jurusan", "Pecinta Alam (MAPALA)");
    $x_jurusan_mapala = $jumlah_jurusan_mapala/$jumlah_mapala;
      //xusia  plegmatis
    $jumlah_jurusan_persma = get_jumlah_sum_atribut($db_object, "jurusan", "Persma");
    $x_jurusan_persma = $jumlah_jurusan_persma/$jumlah_persma;
      //xusia  plegmatis
    $jumlah_jurusan_bahasa = get_jumlah_sum_atribut($db_object, "jurusan", "Bahasa");
    $x_jurusan_bahasa = $jumlah_jurusan_an_bahasa/$jumlah_bahasa;
      //xusia  plegmatis
    $jumlah_jurusan_pramuka = get_jumlah_sum_atribut($db_object, "jurusan", "Pramuka");
    $x_jurusan_pramuka = $jumlah_jurusan_pramuka/$jumlah_pramuka;

    // //xusia sanguin
    // $jumlah_jurusan_ak_wirusaha = get_jumlah_sum_atribut($db_object, "jurusan", "Wirausaha");
    // $x_jurusan_ak_wirusah = $jumlah_jurusan_ak_wirusaha/$jumlah_wirausaha;
    // //xusia  koleris
    // $jumlah_jurusan_ak_kemanusiaan = get_jumlah_sum_atribut($db_object, "jurusan", "Kemanusiaan (ksr, humaniora)");
    // $x_jurusan_ak_kemanusiaan = $jumlah_jurusan_ak_kemanusiaan/$jumlah_kemanusiaan;
    //     //xusia  melankolis
    // $jumlah_jurusan_ak_senior = get_jumlah_sum_atribut($db_object, "jurusan", "SENIOR (senior, bola, karate, taekwondo)");
    // $x_jurusan_ak_senior = $jumlah_jurusan_ak_senior/$jumlah_senior;
    //     //xusia  plegmatis
    // $jumlah_jurusan_ak_mapala = get_jumlah_sum_atribut($db_object, "jurusan", "Pecinta Alam (MAPALA)");
    // $x_jurusan_ak_mapala = $jumlah_jurusan_ak_mapala/$jumlah_mapala;
    //   //xusia  plegmatis
    // $jumlah_jurusan_ak_persma = get_jumlah_sum_atribut($db_object, "jurusan", "Persma");
    // $x_jurusan_ak_persma = $jumlah_jurusan_ak_persma/$jumlah_persma;
    //   //xusia  plegmatis
    // $jumlah_jurusan_ak_bahasa = get_jumlah_sum_atribut($db_object, "jurusan", "Bahasa");
    // $x_jurusan_ak_bahasa = $jumlah_jurusan_ak_bahasa/$jumlah_bahasa;
    //   //xusia  plegmatis
    // $jumlah_jurusan_ak_pramuka = get_jumlah_sum_atribut($db_object, "jurusan", "Pramuka");
    // $x_jurusan_ak_pramuka = $jumlah_jurusan_ak_pramuka/$jumlah_pramuka;

    // //xusia sanguin
    // $jumlah_jurusan_elektro_wirusaha = get_jumlah_sum_atribut($db_object, "jurusan", "Wirausaha");
    // $x_jurusan_elektro_wirusah = $jumlah_jurusan_elektro_wirusaha/$jumlah_wirausaha;
    // //xusia  koleris
    // $jumlah_jurusan_elektro_kemanusiaan = get_jumlah_sum_atribut($db_object, "jurusan", "Kemanusiaan (ksr, humaniora)");
    // $x_jurusan_elektro_kemanusiaan = $jumlah_jurusan_elektro_kemanusiaan/$jumlah_kemanusiaan;
    //     //xusia  melankolis
    // $jumlah_jurusan_elektro_senior = get_jumlah_sum_atribut($db_object, "jurusan", "SENIOR (senior, bola, karate, taekwondo)");
    // $x_jurusan_elektro_senior = $jumlah_jurusan_elektro_senior/$jumlah_senior;
    //     //xusia  plegmatis
    // $jumlah_jurusan_elektro_mapala = get_jumlah_sum_atribut($db_object, "jurusan", "Pecinta Alam (MAPALA)");
    // $x_jurusan_elektro_mapala = $jumlah_jurusan_elektro_mapala/$jumlah_mapala;
    //   //xusia  plegmatis
    // $jumlah_jurusan_elektro_persma = get_jumlah_sum_atribut($db_object, "jurusan", "Persma");
    // $x_jurusan_elektro_persma = $jumlah_jurusan_elektro_persma/$jumlah_persma;
    //   //xusia  plegmatis
    // $jumlah_jurusan_elektro_bahasa = get_jumlah_sum_atribut($db_object, "jurusan", "Bahasa");
    // $x_jurusan_elektro_bahasa = $jumlah_jurusan_elektro_bahasa/$jumlah_bahasa;
    //   //xusia  plegmatis
    // $jumlah_jurusan_elektro_pramuka = get_jumlah_sum_atribut($db_object, "jurusan", "Pramuka");
    // $x_jurusan_elektro_pramuka = $jumlah_jurusan_elektro_pramuka/$jumlah_pramuka;

    // //xusia sanguin
    // $jumlah_jurusan_kimia_wirusaha = get_jumlah_sum_atribut($db_object, "jurusan", "Wirausaha");
    // $x_jurusan_kimia_wirusah = $jumlah_jurusan_kimia_wirusaha/$jumlah_wirausaha;
    // //xusia  koleris
    // $jumlah_jurusan_kimia_kemanusiaan = get_jumlah_sum_atribut($db_object, "jurusan", "Kemanusiaan (ksr, humaniora)");
    // $x_jurusan_kimia_kemanusiaan = $jumlah_jurusan_kimia_kemanusiaan/$jumlah_kemanusiaan;
    //     //xusia  melankolis
    // $jumlah_jurusan_kimia_senior = get_jumlah_sum_atribut($db_object, "jurusan", "SENIOR (senior, bola, karate, taekwondo)");
    // $x_jurusan_kimia_senior = $jumlah_jurusan_kimia_senior/$jumlah_senior;
    //     //xusia  plegmatis
    // $jumlah_jurusan_kimia_mapala = get_jumlah_sum_atribut($db_object, "jurusan", "Pecinta Alam (MAPALA)");
    // $x_jurusan_kimia_mapala = $jumlah_jurusan_kimia_mapala/$jumlah_mapala;
    //   //xusia  plegmatis
    // $jumlah_jurusan_kimia_persma = get_jumlah_sum_atribut($db_object, "jurusan", "Persma");
    // $x_jurusan_kimia_persma = $jumlah_jurusan_kimia_persma/$jumlah_persma;
    //   //xusia  plegmatis
    // $jumlah_jurusan_kimia_bahasa = get_jumlah_sum_atribut($db_object, "jurusan", "Bahasa");
    // $x_jurusan_kimia_bahasa = $jumlah_jurusan_kimia_bahasa/$jumlah_bahasa;
    //   //xusia  plegmatis
    // $jumlah_jurusan_kimia_pramuka = get_jumlah_sum_atribut($db_object, "jurusan", "Pramuka");
    // $x_jurusan_kimia_pramuka = $jumlah_jurusan_kimia_pramuka/$jumlah_pramuka;

    // //xusia sanguin
    // $jumlah_jurusan_mesin_wirusaha = get_jumlah_sum_atribut($db_object, "jurusan", "Wirausaha");
    // $x_jurusan_mesin_wirusah = $jumlah_jurusan_mesin_wirusaha/$jumlah_wirausaha;
    // //xusia  koleris
    // $jumlah_jurusan_mesin_kemanusiaan = get_jumlah_sum_atribut($db_object, "jurusan", "Kemanusiaan (ksr, humaniora)");
    // $x_jurusan_mesin_kemanusiaan = $jumlah_jurusan_mesin_kemanusiaan/$jumlah_kemanusiaan;
    //     //xusia  melankolis
    // $jumlah_jurusan_mesin_senior = get_jumlah_sum_atribut($db_object, "jurusan", "SENIOR (senior, bola, karate, taekwondo)");
    // $x_jurusan_mesin_senior = $jumlah_jurusan_mesin_senior/$jumlah_senior;
    //     //xusia  plegmatis
    // $jumlah_jurusan_mesin_mapala = get_jumlah_sum_atribut($db_object, "jurusan", "Pecinta Alam (MAPALA)");
    // $x_jurusan_mesin_mapala = $jumlah_jurusan_mesin_mapala/$jumlah_mapala;
    //   //xusia  plegmatis
    // $jumlah_jurusan_mesin_persma = get_jumlah_sum_atribut($db_object, "jurusan", "Persma");
    // $x_jurusan_mesin_persma = $jumlah_jurusan_mesin_persma/$jumlah_persma;
    //   //xusia  plegmatis
    // $jumlah_jurusan_mesin_bahasa = get_jumlah_sum_atribut($db_object, "jurusan", "Bahasa");
    // $x_jurusan_mesin_bahasa = $jumlah_jurusan_mesin_bahasa/$jumlah_bahasa;
    //   //xusia  plegmatis
    // $jumlah_jurusan_mesin_pramuka = get_jumlah_sum_atribut($db_object, "jurusan", "Pramuka");
    // $x_jurusan_mesin_pramuka = $jumlah_jurusan_mesin_pramuka/$jumlah_pramuka;

    // //xusia sanguin
    // $jumlah_jurusan_sipil_wirusaha = get_jumlah_sum_atribut($db_object, "jurusan", "Wirausaha");
    // $x_jurusan_sipil_wirusah = $jumlah_jurusan_sipil_wirusaha/$jumlah_wirausaha;
    // //xusia  koleris
    // $jumlah_jurusan_sipil_kemanusiaan = get_jumlah_sum_atribut($db_object, "jurusan", "Kemanusiaan (ksr, humaniora)");
    // $x_jurusan_sipil_kemanusiaan = $jumlah_jurusan_sipil_kemanusiaan/$jumlah_kemanusiaan;
    //     //xusia  melankolis
    // $jumlah_jurusan_sipil_senior = get_jumlah_sum_atribut($db_object, "jurusan", "SENIOR (senior, bola, karate, taekwondo)");
    // $x_jurusan_sipil_senior = $jumlah_jurusan_sipil_senior/$jumlah_senior;
    //     //xusia  plegmatis
    // $jumlah_jurusan_sipil_mapala = get_jumlah_sum_atribut($db_object, "jurusan", "Pecinta Alam (MAPALA)");
    // $x_jurusan_sipil_mapala = $jumlah_jurusan_sipil_mapala/$jumlah_mapala;
    //   //xusia  plegmatis
    // $jumlah_jurusan_sipil_persma = get_jumlah_sum_atribut($db_object, "jurusan", "Persma");
    // $x_jurusan_sipil_persma = $jumlah_jurusan_sipil_persma/$jumlah_persma;
    //   //xusia  plegmatis
    // $jumlah_jurusan_sipil_bahasa = get_jumlah_sum_atribut($db_object, "jurusan", "Bahasa");
    // $x_jurusan_sipil_bahasa = $jumlah_jurusan_sipil_bahasa/$jumlah_bahasa;
    //   //xusia  plegmatis
    // $jumlah_jurusan_sipil_pramuka = get_jumlah_sum_atribut($db_object, "jurusan", "Pramuka");
    // $x_jurusan_sipil_pramuka = $jumlah_jurusan_sipil_pramuka/$jumlah_pramuka;
        
        if($show_perhitungan){
        echo "<br>";
        echo "<strong><u>Atribut Jurusan:<br></u></strong>";
    echo "X Jurusan Wirausaha=".number_format($x_jurusan_wirusaha, dec())."<br>";
    echo "X Jurusan Kemanusiaan=".number_format($x_jurusan_kemanusiaan, dec())."<br>";
        echo "X Jurusan SENIOR=".number_format($x_jurusan_senior, dec())."<br>";
        echo "X Jurusan MAPALA=".number_format($x_jurusan_mapala, dec())."<br>";
        echo "X Jurusan Persma=".number_format($x_jurusan_persma, dec())."<br>";
        echo "X Jurusan Bahasa=".number_format($x_jurusan_bahasa, dec())."<br>";
        echo "X Jurusan Pramuka=".number_format($x_jurusan_pramuka, dec())."<br>";
    echo "<br>";
    // echo "<br>";
    //     echo "<strong><u>Atribut Jurusan Akuntansi:<br></u></strong>";
    // echo "X Jurusan Akuntansi Wirausaha=".number_format($x_jurusan_ak_wirusaha, dec())."<br>";
    // echo "X Jurusan Akuntansi Kemanusiaan=".number_format($x_jurusan_ak_kemanusiaan, dec())."<br>";
    //     echo "X Jurusan Akuntansi SENIOR=".number_format($x_jurusan_ak_senior, dec())."<br>";
    //     echo "X Jurusan Akuntansi MAPALA=".number_format($x_jurusan_ak_mapala, dec())."<br>";
    //     echo "X Jurusan Akuntansi Persma=".number_format($x_jurusan_ak_persma, dec())."<br>";
    //     echo "X Jurusan Akuntansi Bahasa=".number_format($x_jurusan_ak_bahasa, dec())."<br>";
    //     echo "X Jurusan Akuntansi Pramuka=".number_format($x_jurusan_ak_pramuka, dec())."<br>";
    // echo "<br>";
    // echo "<br>";
    //     echo "<strong><u>Atribut Jurusan Teknik Elektro:<br></u></strong>";
    // echo "X Jurusan Teknik Elektro Wirausaha=".number_format($x_jurusan_elektro_wirusaha, dec())."<br>";
    // echo "X Jurusan Teknik Elektro Kemanusiaan=".number_format($x_jurusan_elektro_kemanusiaan, dec())."<br>";
    //     echo "X Jurusan Teknik Elektro SENIOR=".number_format($x_jurusan_elektro_senior, dec())."<br>";
    //     echo "X Jurusan Teknik Elektro MAPALA=".number_format($x_jurusan_elektro_mapala, dec())."<br>";
    //     echo "X Jurusan Teknik Elektro Persma=".number_format($x_jurusan_elektro_persma, dec())."<br>";
    //     echo "X Jurusan Teknik Elektro Bahasa=".number_format($x_jurusan_elektro_bahasa, dec())."<br>";
    //     echo "X Jurusan Teknik Elektro Pramuka=".number_format($x_jurusan_elektro_pramuka, dec())."<br>";
    // echo "<br>";
    // echo "<br>";
    //     echo "<strong><u>Atribut Jurusan Teknik Kimia:<br></u></strong>";
    //  echo "X Jurusan Teknik Kimia Wirausaha=".number_format($x_jurusan_kimia_wirusaha, dec())."<br>";
    // echo "X Jurusan Teknik Kimia Kemanusiaan=".number_format($x_jurusan_kimia_kemanusiaan, dec())."<br>";
    //     echo "X Jurusan Teknik Kimia SENIOR=".number_format($x_jurusan_kimia_senior, dec())."<br>";
    //     echo "X Jurusan Teknik Kimia MAPALA=".number_format($x_jurusan_kimia_mapala, dec())."<br>";
    //     echo "X Jurusan Teknik Kimia Persma=".number_format($x_jurusan_kimia_persma, dec())."<br>";
    //     echo "X Jurusan Teknik Kimia Bahasa=".number_format($x_jurusan_kimia_bahasa, dec())."<br>";
    //     echo "X Jurusan Teknik Kimia Pramuka=".number_format($x_jurusan_kimia_pramuka, dec())."<br>";
    // echo "<br>";
    // echo "<br>";
    //     echo "<strong><u>Atribut Jurusan Teknik Mesin:<br></u></strong>";
    //  echo "X Jurusan Teknik Mesin Wirausaha=".number_format($x_jurusan_mesin_wirusaha, dec())."<br>";
    // echo "X Jurusan Teknik Mesin Kemanusiaan=".number_format($x_jurusan_mesin_kemanusiaan, dec())."<br>";
    //     echo "X Jurusan Teknik Mesin SENIOR=".number_format($x_jurusan_mesin_senior, dec())."<br>";
    //     echo "X Jurusan Teknik Mesin MAPALA=".number_format($x_jurusan_mesin_mapala, dec())."<br>";
    //     echo "X Jurusan Teknik Mesin Persma=".number_format($x_jurusan_mesin_persma, dec())."<br>";
    //     echo "X Jurusan Teknik Mesin Bahasa=".number_format($x_jurusan_mesin_bahasa, dec())."<br>";
    //     echo "X Jurusan Teknik Mesin Pramuka=".number_format($x_jurusan_mesin_pramuka, dec())."<br>";
    // echo "<br>";
    // echo "<br>";
    //     echo "<strong><u>Atribut Jurusan Teknik Sipil:<br></u></strong>";
    //  echo "X Jurusan Teknik Sipil Wirausaha=".number_format($x_jurusan_sipil_wirusaha, dec())."<br>";
    // echo "X Jurusan Teknik Sipil Kemanusiaan=".number_format($x_jurusan_sipil_kemanusiaan, dec())."<br>";
    //     echo "X Jurusan Teknik Sipil SENIOR=".number_format($x_jurusan_sipil_senior, dec())."<br>";
    //     echo "X Jurusan Teknik Sipil MAPALA=".number_format($x_jurusan_sipil_mapala, dec())."<br>";
    //     echo "X Jurusan Teknik Sipil Persma=".number_format($x_jurusan_sipil_persma, dec())."<br>";
    //     echo "X Jurusan Teknik Sipil Bahasa=".number_format($x_jurusan_sipil_bahasa, dec())."<br>";
    //     echo "X Jurusan Teknik Sipil Pramuka=".number_format($x_jurusan_sipil_pramuka, dec())."<br>";
    // echo "<br>";
        }

     //S2usia Sanguin
    $s2_jurusan_wirusaha = get_s2_populasi($db_object, 'jurusan', 'Wirausaha', $x_jurusan_wirusaha, $jumlah_wirausaha);
    //S2usia Koleris
    $s2_jurusan_kemanusiaan = get_s2_populasi($db_object, 'jurusan', 'Kemanusiaan (ksr, humaniora)', $x_jurusan_kemanusiaan, $jumlah_kemanusiaan);
        //S2usia Melankolis
    $s2_jurusan_senior = get_s2_populasi($db_object, 'jurusan', 'SENIOR (senior, bola, karate, taekwondo)', $x_jurusan_senior, $jumlah_senior);
        //S2usia Plegmatis
    $s2_jurusan_mapala = get_s2_populasi($db_object, 'jurusan', 'Pecinta Alam (MAPALA)', $x_jurusan_mapala, $jumlah_mapala);

    $s2_jurusan_persma = get_s2_populasi($db_object, 'jurusan', 'Persma', $x_jurusan_persma, $jumlah_persma);
    $s2_jurusan_bahasa = get_s2_populasi($db_object, 'jurusan', 'Bahasa', $x_jurusan_bahasa, $jumlah_bahasa);
    $s2_jurusan_pramuka = get_s2_populasi($db_object, 'jurusan', 'Pramuka', $x_jurusan_pramuka, $jumlah_pramuka);

        if($show_perhitungan){
    echo "S2 Jurusan Wirausaha=".number_format($s2_jurusan_wirusaha, dec())."<br>";
    echo "S2 Jurusan Kemanusiaan=".number_format($s2_jurusan_kemanusiaan, dec())."<br>";
        echo "S2 Jurusan SENIOR=".number_format($s2_jurusan_senior, dec())."<br>";
        echo "S2 Jurusan MAPALA=".number_format($s2_jurusan_mapala, dec())."<br>";
        echo "S2 Jurusan Persma=".number_format($s2_jurusan_persma, dec())."<br>";
        echo "S2 Jurusan Bahasa=".number_format($s2_jurusan_bahasa, dec())."<br>";
        echo "S2 Jurusan Pramuka=".number_format($s2_jurusan_pramuka, dec())."<br>";
    echo "<br>";
        }
    //S jurusan Sanguin
    $s_jurusan_wirusaha = sqrt($s2_jurusan_wirusaha);
    //S usia Koleris
    $s_jurusan_kemanusiaan = sqrt($s2_jurusan_kemanusiaan);
        //S usia Melankolis
    $s_jurusan_senior = sqrt($s2_jurusan_senior);
        //S usia Plegmatis
    $s_jurusan_mapala = sqrt($s2_jurusan_mapala);
      //S usia Plegmatis
    $s_jurusan_persma = sqrt($s2_jurusan_persma);
      //S usia Plegmatis
    $s_jurusan_bahasa = sqrt($s2_jurusan_bahasa);
      //S usia Plegmatis
    $s_jurusan_pramuka = sqrt($s2_jurusan_pramuka);
        
        //s2 ^2 usia sanguin
        $s2_pangkat2_jurusan_wirusaha = pow($s2_jurusan_wirusaha, 2);
        //s2 ^2 usia koleris
        $s2_pangkat2_jurusan_kemanusiaan = pow($s2_jurusan_kemanusiaan, 2);
        //s2 ^2 usia melankolis
        $s2_pangkat2_jurusan_senior = pow($s2_jurusan_senior, 2);
        //s2 ^2 usia plegmatis
        $s2_pangkat2_jurusan_mapala = pow($s2_jurusan_mapala, 2);
        //s2 ^2 usia plegmatis
        $s2_pangkat2_jurusan_persma = pow($s2_jurusan_persma, 2);
        //s2 ^2 usia plegmatis
        $s2_pangkat2_jurusan_bahasa = pow($s2_jurusan_bahasa, 2);
        //s2 ^2 usia plegmatis
        $s2_pangkat2_jurusan_pramuka = pow($s2_jurusan_pramuka, 2);
        
        if($show_perhitungan){
    echo "S Jurusan Wirausaha=".number_format($s_jurusan_wirusaha, dec())."<br>";
    echo "S Jurusan Kemanusiaan=".number_format($s_jurusan_kemanusiaan, dec())."<br>";
        echo "S Jurusan SENIOR=".number_format($s_jurusan_senior, dec())."<br>";
        echo "S Jurusan MAPALA=".number_format($s_jurusan_mapala, dec())."<br>";
        echo "S Jurusan Persma=".number_format($s_jurusan_persma, dec())."<br>";
        echo "S Jurusan Bahasa=".number_format($s_jurusan_bahasa, dec())."<br>";
        echo "S Jurusan Pramuka=".number_format($s_jurusan_pramuka, dec())."<br>";
        }

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

        //======================================================================
       //xprodi
    $jumlah_prodi_wirausaha = get_jumlah_sum_atribut($db_object, "prodi", "Wirausaha");
    $x_prodi_wirausaha = $jumlah_prodi_wirausaha/$jumlah_wirausaha;
    //xprodi wirausaha
    $jumlah_prodi_kemanusiaan = get_jumlah_sum_atribut($db_object, "prodi", "Kemanusiaan (ksr, humaniora)");
    $x_prodi_kemanusiaan = $jumlah_prodi_wirausaha/$jumlah_kemanusiaan;
      //xprodi kemanusiaan
    $jumlah_prodi_senior = get_jumlah_sum_atribut($db_object, "prodi", "SENIOR (senior, bola, karate, taekwondo)");
    $x_prodi_senior = $jumlah_prodi_senior/$jumlah_senior;
        //xprodi  
    $jumlah_prodi_mapala = get_jumlah_sum_atribut($db_object, "prodi", "Pecinta Alam (MAPALA)");
    $x_prodi_mapala = $jumlah_prodi_mapala/$jumlah_mapala;
      //xprodi
    $jumlah_prodi_persma = get_jumlah_sum_atribut($db_object, "prodi", "Persma");
    $x_prodi_persma = $jumlah_prodi_persma/$jumlah_persma;
     //xprodi
    $jumlah_prodi_bahasa = get_jumlah_sum_atribut($db_object, "prodi", "Bahasa");
    $x_prodi_bahasa = $jumlah_prodi_bahasa/$jumlah_bahasa;
      //xprodi
    $jumlah_prodi_pramuka = get_jumlah_sum_atribut($db_object, "prodi", "Pramuka");
    $x_prodi_pramuka = $jumlah_prodi_pramuka/$jumlah_pramuka;


        if($show_perhitungan){
        echo "<br>";
        echo "<strong><u>Atribut Prodi:<br></u></strong>";
    echo "X Prodi Wirausaha=".number_format($x_prodi_wirusaha, dec())."<br>";
    echo "X Prodi Kemanusiaan=".number_format($x_prodi_kemanusiaan, dec())."<br>";
        echo "X Prodi SENIOR=".number_format($x_prodi_senior, dec())."<br>";
        echo "X Prodi MAPALA=".number_format($x_prodi_mapala, dec())."<br>";
        echo "X Prodi Persma=".number_format($x_prodi_persma, dec())."<br>";
        echo "X Prodi Bahasa=".number_format($x_prodi_bahasa, dec())."<br>";
        echo "X Prodi Pramuka=".number_format($x_prodi_pramuka, dec())."<br>";
    echo "<br>";
    
        }

    //S2 jawaban_a Sanguin
    $s2_prodi_wirausaha = get_s2_populasi($db_object, 'prodi', 'Wirausaha', $x_prodi_wirausaha, $jumlah_wirausaha);
    ///S2 jawaban_a Sanguin
    $s2_prodi_kemanusiaan = get_s2_populasi($db_object, 'prodi', 'Kemanusiaan (ksr, humaniora)', $x_prodi_kemanusiaan, $jumlah_kemanusiaan);
    //S2 jawaban_a Sanguin
    $s2_prodi_senior = get_s2_populasi($db_object, 'prodi', 'SENIOR (senior, bola, karate, taekwondo)', $x_prodi_senior, $jumlah_senior);
    //S2 jawaban_a Sanguin
    $s2_prodi_mapala = get_s2_populasi($db_object, 'prodi', 'Pecinta Alam (MAPALA)', $x_prodi_mapala, $jumlah_mapala);
    //S2 jawaban_a Sanguin
    $s2_prodi_persma = get_s2_populasi($db_object, 'prodi', 'Persma', $x_prodi_persma, $jumlah_persma);
    //S2 jawaban_a Sanguin
    $s2_prodi_bahasa = get_s2_populasi($db_object, 'prodi', 'Bahasa', $x_prodi_bahasa, $jumlah_bahasa);
    //S2 jawaban_a Sanguin
    $s2_prodi_pramuka = get_s2_populasi($db_object, 'prodi', 'Pramuka', $x_prodi_pramuka, $jumlah_pramuka);

        if($show_perhitungan){
    echo "S2 Prodi Wirausaha=".number_format($s2_prodi_ab3_wirausaha, dec())."<br>";
    echo "S2 Prodi Kemanusiaan=".number_format($s2_prodi_ab3_kemanusiaan, dec())."<br>";
        echo "S2 Prodi SENIOR=".number_format($s2_prodi_ab3_senior, dec())."<br>";
        echo "S2 Prodi MAPALA=".number_format($s2_prodi_ab3_mapala, dec())."<br>";
        echo "S2 Prodi Persma=".number_format($s2_prodi_ab3_persma, dec())."<br>";
        echo "S2 Prodi Bahasa=".number_format($s2_prodi_ab3_bahasa, dec())."<br>";
        echo "S2 Prodi Pramuka=".number_format($s2_prodi_ab3_pramuka, dec())."<br>";
    echo "<br>";
        }


    //S jawaban_a Sanguin
    $s_prodi_wirausaha = sqrt($s2_prodi_wirausaha);
    //S jawaban_a Koleris
    $s_prodi_kemanusiaan = sqrt($s2_prodi_kemanusiaan);
        //S jawaban_a Melankolis
    $s_prodi_senior = sqrt($s2_prodi_senior);
        //S jawaban_a Plegmatis
    $s_prodi_mapala = sqrt($s2_prodi_mapala);
    $s_prodi_persma = sqrt($s2_prodi_persma);
    $s_prodi_bahasa = sqrt($s2_prodi_bahasa);
    $s_prodi_pramuka = sqrt($s2_prodi_pramuka);
       
        //s2 ^2 jawaban_a sanguin
        $s2_pangkat2_prodi_wirausaha = pow($s2_prodi_wirausaha, 2);
        //s2 ^2 jawaban_a koleris
        $s2_pangkat2_prodi_kemanusiaan = pow($s2_prodi_kemanusiaan, 2);
        //s2 ^2 jawaban_a melankolis
        $s2_pangkat2_prodi_senior = pow($s2_prodi_senior, 2);
        //s2 ^2 jawaban_a plegmatis
        $s2_pangkat2_prodi_mapala = pow($s2_prodi_mapala, 2);
        //s2 ^2 jawaban_a plegmatis
        $s2_pangkat2_prodi_persma = pow($s2_prodi_persma, 2);
        //s2 ^2 jawaban_a plegmatis
        $s2_pangkat2_prodi_bahasa = pow($s2_prodi_bahasa, 2);
        //s2 ^2 jawaban_a plegmatis
        $s2_pangkat2_prodi_pramuka = pow($s2_prodi_pramuka, 2);

         if($show_perhitungan){
    echo "S Prodi Wirausaha=".number_format($s_prodi_wirausaha, dec())."<br>";
    echo "S Prodi Kemanusiaan=".number_format($s_prodi_kemanusiaan, dec())."<br>";
        echo "S Prodi SENIOR=".number_format($s_prodi_senior, dec())."<br>";
        echo "S Prodi MAPALA=".number_format($s_prodi_mapala, dec())."<br>";
        echo "S Prodi Persma=".number_format($s_prodi_persma, dec())."<br>";
        echo "S Prodi Bahasa=".number_format($s_prodi_bahasa, dec())."<br>";
        echo "S Prodi Pramuka=".number_format($s_prodi_pramuka, dec())."<br>";
        }

       
        //========================================================
         //minat sanguin
    $jumlah_minat_wirusaha = get_jumlah_sum_atribut($db_object, "minat", "Wirausaha");
    $x_minat_wirusaha = $jumlah_minat_wirusaha/$jumlah_wirausaha;
    //xusia  koleris
    $jumlah_minat_kemanusiaan = get_jumlah_sum_atribut($db_object, "minat", "Kemanusiaan (ksr, humaniora)");
    $x_minat_kemanusiaan = $jumlah_minat_kemanusiaan/$jumlah_kemanusiaan;
        //xusia  melankolis
    $jumlah_minat_senior = get_jumlah_sum_atribut($db_object, "minat", "SENIOR (senior, bola, karate, taekwondo)");
    $x_minat_senior = $jumlah_minat_senior/$jumlah_senior;
        //xusia  plegmatis
    $jumlah_minat_mapala = get_jumlah_sum_atribut($db_object, "minat", "Pecinta Alam (MAPALA)");
    $x_minat_mapala = $jumlah_minat_mapala/$jumlah_mapala;
      //xusia  plegmatis
    $jumlah_minat_persma = get_jumlah_sum_atribut($db_object, "minat", "Persma");
    $x_minat_persma = $jumlah_minat_persma/$jumlah_persma;
      //xusia  plegmatis
    $jumlah_minat_bahasa = get_jumlah_sum_atribut($db_object, "minat", "Bahasa");
    $x_minat_bahasa = $jumlah_minat_bahasa/$jumlah_bahasa;
      //xusia  plegmatis
    $jumlah_minat_pramuka = get_jumlah_sum_atribut($db_object, "minat", "Pramuka");
    $x_minat_pramuka = $jumlah_minat_pramuka/$jumlah_pramuka;

        
        if($show_perhitungan){
        echo "<br>";
        echo "<strong><u>Atribut Minat:<br></u></strong>";
    echo "X Minat Wirausaha=".number_format($x_minat_wirusaha, dec())."<br>";
    echo "X Minat Kemanusiaan=".number_format($x_minat_kemanusiaan, dec())."<br>";
        echo "X Minat SENIOR=".number_format($x_minat_senior, dec())."<br>";
        echo "X Minat MAPALA=".number_format($x_minat_mapala, dec())."<br>";
        echo "X Minat Persma=".number_format($x_minat_persma, dec())."<br>";
        echo "X Minat Bahasa=".number_format($x_minat_bahasa, dec())."<br>";
        echo "X Minat Pramuka=".number_format($x_minat_pramuka, dec())."<br>";
    echo "<br>";
    
        }
   
    //S2 jawaban_b Sanguin
    $s2_minat_wirusaha = get_s2_populasi($db_object, 'minat', 'Wirausaha', $x_minat_wirusaha, $jumlah_wirausaha);
    //S2 jawaban_b Koleris
    $s2_minat_kemanusiaan = get_s2_populasi($db_object, 'minat', 'Kemanusiaan (ksr, humaniora)', $x_minat_kemanusiaan, $jumlah_kemanusiaan);
    //S2 jawaban_b Koleris
    $s2_minat_senior = get_s2_populasi($db_object, 'minat', 'SENIOR (senior, bola, karate, taekwondo)', $x_minat_senior, $jumlah_senior);
    //S2 jawaban_b Koleris
    $s2_minat_mapala = get_s2_populasi($db_object, 'minat', 'Pecinta Alam (MAPALA)', $x_minat_mapala, $jumlah_mapala);
    //S2 jawaban_b Koleris
    $s2_minat_persma = get_s2_populasi($db_object, 'minat', 'Persma', $x_minat_persma, $jumlah_persma);
    //S2 jawaban_b Koleris
    $s2_minat_bahasa = get_s2_populasi($db_object, 'minat', 'Bahasa', $x_minat_bahasa, $jumlah_bahasa);
     //S2 jawaban_b Koleris
    $s2_minat_pramuka = get_s2_populasi($db_object, 'minat', 'Pramuka', $x_minat_pramuka, $jumlah_pramuka);
    
        if($show_perhitungan){
    echo "S2 Minat Wirausaha=".number_format($s2_minat_wirusaha, dec())."<br>";
    echo "S2 Minat Seni Kemanusiaan=".number_format($s2_minat_kemanusiaan, dec())."<br>";
        echo "S2 Minat Seni SENIOR=".number_format($s2_minat_senior, dec())."<br>";
        echo "S2 Minat Seni MAPALA=".number_format($s2_minat_mapala, dec())."<br>";
        echo "S2 Minat Seni Persma=".number_format($s2_minat_persma, dec())."<br>";
        echo "S2 Minat Seni Bahasa=".number_format($s2_minat_bahasa, dec())."<br>";
        echo "S2 Minat Seni Pramuka=".number_format($s2_minat_pramuka, dec())."<br>";
    echo "<br>";
        }

    //S jawaban_b Sanguin
    $s_minat_wirusaha = sqrt($s2_minat_wirusaha);
    //S jawaban_b Koleris
    $s_minat_kemanusiaan = sqrt($s2_minat_kemanusiaan);
        //S jawaban_b Melankolis
    $s_minat_senior = sqrt($s2_minat_senior);
        //S jawaban_b Plegmatis
    $s_minat_mapala = sqrt($s2_minat_mapala);
         //S jawaban_b Plegmatis
    $s_minat_persma = sqrt($s2_minat_persma);
         //S jawaban_b Plegmatis
    $s_minat_bahasa = sqrt($s2_minat_bahasa);
         //S jawaban_b Plegmatis
    $s_minat_pramuka = sqrt($s2_minat_pramuka);
        
        //s2 ^2 jawaban_b sanguin
        $s2_pangkat2_minat_wirusaha = pow($s2_minat_wirusaha, 2);
        //s2 ^2 jawaban_b koleris
        $s2_pangkat2_minat_kemanusiaan = pow($s2_minat_kemanusiaan, 2);
        //s2 ^2 jawaban_b melankolis
        $s2_pangkat2_minat_senior = pow($s2_minat_senior, 2);
        //s2 ^2 jawaban_b plegmatis
        $s2_pangkat2_minat_mapala = pow($s2_minat_mapala, 2);
        //s2 ^2 jawaban_b plegmatis
        $s2_pangkat2_minat_persma = pow($s2_minat_persma, 2);
        //s2 ^2 jawaban_b plegmatis
        $s2_pangkat2_minat_bahasa = pow($s2_minat_bahasa, 2);
        //s2 ^2 jawaban_b plegmatis
        $s2_pangkat2_minat_pramuka = pow($s2_minat_pramuka, 2);

         if($show_perhitungan){
    echo "S Minat Wirausaha=".number_format($s_minat_wirusaha, dec())."<br>";
    echo "S Minat Kemanusiaan=".number_format($s_minat_kemanusiaan, dec())."<br>";
        echo "S Minat SENIOR=".number_format($s_minat_senior, dec())."<br>";
        echo "S Minat MAPALA=".number_format($s_minat_mapala, dec())."<br>";
        echo "S Minat Persma=".number_format($s_minat_persma, dec())."<br>";
        echo "S Minat Bahasa=".number_format($s_minat_bahasa, dec())."<br>";
        echo "S Minat Pramuka=".number_format($s_minat_pramuka, dec())."<br>";
        }
      
        //jawaban_c
        //x jawaban_c sanguin
     //bakat sanguin
    $jumlah_bakat_wirusaha = get_jumlah_sum_atribut($db_object, "bakat", "Wirausaha");
    $x_bakat_wirusaha = $jumlah_bakat_wirusaha/$jumlah_wirausaha;
    //xusia  koleris
    $jumlah_bakat_kemanusiaan = get_jumlah_sum_atribut($db_object, "bakat", "Kemanusiaan (ksr, humaniora)");
    $x_bakat_kemanusiaan = $jumlah_bakat_kemanusiaan/$jumlah_kemanusiaan;
        //xusia  melankolis
    $jumlah_bakat_senior = get_jumlah_sum_atribut($db_object, "bakat", "SENIOR (senior, bola, karate, taekwondo)");
    $x_bakat_senior = $jumlah_bakat_senior/$jumlah_senior;
        //xusia  plegmatis
    $jumlah_bakat_mapala = get_jumlah_sum_atribut($db_object, "bakat", "Pecinta Alam (MAPALA)");
    $x_bakat_mapala = $jumlah_bakat_mapala/$jumlah_mapala;
      //xusia  plegmatis
    $jumlah_bakat_persma = get_jumlah_sum_atribut($db_object, "bakat", "Persma");
    $x_bakat_persma = $jumlah_bakat_persma/$jumlah_persma;
      //xusia  plegmatis
    $jumlah_bakat_bahasa = get_jumlah_sum_atribut($db_object, "bakat", "Bahasa");
    $x_bakat_bahasa = $jumlah_bakat_bahasa/$jumlah_bahasa;
      //xusia  plegmatis
    $jumlah_bakat_pramuka = get_jumlah_sum_atribut($db_object, "bakat", "Pramuka");
    $x_bakat_pramuka = $jumlah_bakat_pramuka/$jumlah_pramuka;
        
        if($show_perhitungan){
        echo "<br>";
        echo "<strong><u>Atribut Bakat:<br></u></strong>";
    echo "X Bakat Wirausaha=".number_format($x_bakat_wirusaha, dec())."<br>";
    echo "X Bakat Kemanusiaan=".number_format($x_bakat_kemanusiaan, dec())."<br>";
        echo "X Bakat SENIOR=".number_format($x_bakat_senior, dec())."<br>";
        echo "X Bakat MAPALA=".number_format($x_bakat_mapala, dec())."<br>";
        echo "X Bakat Persma=".number_format($x_bakat_persma, dec())."<br>";
        echo "X Bakat Bahasa=".number_format($x_bakat_bahasa, dec())."<br>";
        echo "X Bakat Pramuka=".number_format($x_bakat_pramuka, dec())."<br>";
    echo "<br>";
        }

    //S2 jawaban_c Sanguin
    $s2_bakat_wirusaha = get_s2_populasi($db_object, 'bakat', 'Wirausaha', $x_bakat_wirusaha, $jumlah_wirausaha);
    //S2 jawaban_c Koleris
    $s2_bakat_kemanusiaan = get_s2_populasi($db_object, 'bakat', 'Kemanusiaan (ksr, humaniora)', $x_bakat_kemanusiaan, $jumlah_kemanusiaan);
        //S2 jawaban_c Melankolis
    $s2_bakat_senior = get_s2_populasi($db_object, 'bakat', 'SENIOR (senior, bola, karate, taekwondo)', $x_bakat_senior, $jumlah_senior);
        //S2 jawaban_c Koleris
    $s2_bakat_mapala = get_s2_populasi($db_object, 'bakat', 'Pecinta Alam (MAPALA)', $x_bakat_mapala, $jumlah_mapala);
        //S2 jawaban_c Koleris
    $s2_bakat_persma = get_s2_populasi($db_object, 'bakat', 'Persma', $x_bakat_persma, $jumlah_persma);
        //S2 jawaban_c Koleris
    $s2_bakat_bahasa = get_s2_populasi($db_object, 'bakat', 'Bahasa', $x_bakat_bahasa, $jumlah_bahasa);
        //S2 jawaban_c Koleris
    $s2_bakat_seni_pramuka = get_s2_populasi($db_object, 'bakat', 'Pramuka', $x_bakat_pramuka, $jumlah_pramuka);
        if($show_perhitungan){
    echo "S2 Bakat Seni Wirausaha=".number_format($s2_bakat_wirusaha, dec())."<br>";
    echo "S2 Bakat Seni Kemanusiaan=".number_format($s2_bakat_kemanusiaan, dec())."<br>";
        echo "S2 Bakat Seni SENIOR=".number_format($s2_bakat_senior, dec())."<br>";
        echo "S2 Bakat Seni MAPALA=".number_format($s2_bakat_mapala, dec())."<br>";
        echo "S2 Bakat Seni Persma=".number_format($s2_bakat_persma, dec())."<br>";
        echo "S2 Bakat Seni Bahasa=".number_format($s2_bakat_bahasa, dec())."<br>";
        echo "S2 Bakat Seni Pramuka=".number_format($s2_bakat_pramuka, dec())."<br>";
    echo "<br>";
        }
    //S jawaban_c Sanguin
    $s_bakat_wirusaha = sqrt($s2_bakat_wirusaha);
    //S jawaban_c Koleris
    $s_bakat_kemanusiaan = sqrt($s2_bakat_kemanusiaan);
        //S jawaban_c Melankolis
    $s_bakat_senior = sqrt($s2_bakat_senior);
        //S jawaban_c Plegmatis
    $s_bakat_mapala = sqrt($s2_bakat_mapala);
       //S jawaban_c Plegmatis
    $s_bakat_persma = sqrt($s2_bakat_persma);
       //S jawaban_c Plegmatis
    $s_bakat_bahasa = sqrt($s2_bakat_bahasa);
       //S jawaban_c Plegmatis
    $s_bakat_pramuka = sqrt($s2_bakat_pramuka);
        
        //s2 ^2 jawaban_c sanguin
        $s2_pangkat2_bakat_wirusaha = pow($s2_bakat_wirusaha, 2);
        //s2 ^2 jawaban_c koleris
        $s2_pangkat2_bakat_kemanusiaan = pow($s2_bakat_kemanusiaan, 2);
        //s2 ^2 jawaban_c melankolis
        $s2_pangkat2_bakat_senior = pow($s2_bakat_senior, 2);
        //s2 ^2 jawaban_c plegmatis
        $s2_pangkat2_bakat_mapala = pow($s2_bakat_mapala, 2);
        //s2 ^2 jawaban_c plegmatis
        $s2_pangkat2_bakat_persma = pow($s2_bakat_persma, 2);
        //s2 ^2 jawaban_c plegmatis
        $s2_pangkat2_bakat_bahasa = pow($s2_bakat_bahasa, 2);
        //s2 ^2 jawaban_c plegmatis
        $s2_pangkat2_bakat_pramuka = pow($s2_bakat_pramuka, 2);

        if($show_perhitungan){
    echo "S Bakat Seni Wirausaha=".number_format($s_bakat_wirusaha, dec())."<br>";
    echo "S Bakat Seni Kemanusiaan=".number_format($s_bakat_kemanusiaan, dec())."<br>";
        echo "S Bakat Seni SENIOR=".number_format($s_bakat_senior, dec())."<br>";
        echo "S Bakat Seni MAPALA=".number_format($s_bakat_mapala, dec())."<br>";
        echo "S Bakat Seni Persma=".number_format($s_bakat_persma, dec())."<br>";
        echo "S Bakat Seni Bahasa=".number_format($s_bakat_bahasa, dec())."<br>";
        echo "S Bakat Seni Pramuka=".number_format($s_bakat_pramuka, dec())."<br>";
        }
        

        //===============================================================

    //hobi sanguin
    $jumlah_hobi_wirausaha = get_jumlah_sum_atribut($db_object, "hobi", "Wirausaha");
    $x_hobi_wirausaha = $jumlah_hobi_wirausaha/$jumlah_wirausaha;
    //xusia  koleris
    $jumlah_hobi_kemanusiaan = get_jumlah_sum_atribut($db_object, "hobi", "Kemanusiaan (ksr, humaniora)");
    $x_hobi_kemanusiaan = $jumlah_hobi_wirausaha/$jumlah_kemanusiaan;
        //xusia  melankolis
    $jumlah_hobi_senior = get_jumlah_sum_atribut($db_object, "hobi", "SENIOR (senior, bola, karate, taekwondo)");
    $x_hobi_senior = $jumlah_hobi_senior/$jumlah_senior;
        //xusia  plegmatis
    $jumlah_hobi_mapala = get_jumlah_sum_atribut($db_object, "hobi", "Pecinta Alam (MAPALA)");
    $x_hobi_mapala = $jumlah_hobi_mapala/$jumlah_mapala;
      //xusia  plegmatis
    $jumlah_hobi_persma = get_jumlah_sum_atribut($db_object, "hobi", "Persma");
    $x_hobi_persma = $jumlah_hobi_persma/$jumlah_persma;
      //xusia  plegmatis
    $jumlah_hobi_bahasa = get_jumlah_sum_atribut($db_object, "hobi", "Bahasa");
    $x_hobi_bahasa = $jumlah_hobi_bahasa/$jumlah_bahasa;
      //xusia  plegmatis
    $jumlah_hobi_pramuka = get_jumlah_sum_atribut($db_object, "hobi", "Pramuka");
    $x_hobi_pramuka = $jumlah_hobi_pramuka/$jumlah_pramuka;
        
        if($show_perhitungan){
        echo "<br>";
        echo "<strong><u>Atribut Hobi :<br></u></strong>";
    echo "X Hobi Wirausaha=".number_format($x_hobi_wirausaha, dec())."<br>";
    echo "X Hobi Kemanusiaan=".number_format($x_hobi_kemanusiaan, dec())."<br>";
        echo "X Hobi SENIOR=".number_format($x_hobi_senior, dec())."<br>";
        echo "X Hobi MAPALA=".number_format($x_hobi_mapala, dec())."<br>";
        echo "X Hobi Persma=".number_format($x_hobi_persma, dec())."<br>";
        echo "X Hobi Bahasa=".number_format($x_hobi_bahasa, dec())."<br>";
        echo "X Hobi Pramuka=".number_format($x_hobi_pramuka, dec())."<br>";
    echo "<br>";

        }
    //S2 jawaban_d Sanguin
    $s2_hobi_wirausaha = get_s2_populasi($db_object, 'hobi', 'Wirausaha', $x_hobi_wirausaha, $jumlah_wirausaha);
    //S2 jawaban_d Koleris
    $s2_hobi_kemanusiaan = get_s2_populasi($db_object, 'hobi', 'Kemanusiaan (ksr, humaniora)', $x_hobi_kemanusiaan, $jumlah_kemanusiaan);
        //S2 jawaban_d Melankolis
    $s2_hobi_senior = get_s2_populasi($db_object, 'hobi', 'SENIOR (senior, bola, karate, taekwondo)', $x_hobi_senior, $jumlah_senior);
        //S2 jawaban_d Koleris
    $s2_hobi_mapala = get_s2_populasi($db_object, 'hobi', 'Pecinta Alam (MAPALA)', $x_hobi_mapala, $jumlah_mapala);
       //S2 jawaban_d Koleris
    $s2_hobi_persma = get_s2_populasi($db_object, 'hobi', 'Persma', $x_hobi_persma, $jumlah_persma);
       //S2 jawaban_d Koleris
    $s2_hobi_bahasa = get_s2_populasi($db_object, 'hobi', 'Bahasa', $x_hobi_bahasa, $jumlah_bahasa);
       //S2 jawaban_d Koleris
    $s2_hobi_pramuka = get_s2_populasi($db_object, 'hobi', 'Pramuka', $x_hobi_pramuka, $jumlah_pramuka);
        if($show_perhitungan){
    echo "S2 Hobi Wirausaha=".number_format($s2_hobi_wirausaha, dec())."<br>";
    echo "S2 Hobi Kemanusiaan=".number_format($s2_hobi_kemanusiaan, dec())."<br>";
        echo "S2 Hobi SENIOR=".number_format($s2_hobi_senior, dec())."<br>";
        echo "S2 Hobi MAPALA=".number_format($s2_hobi_mapala, dec())."<br>";
        echo "S2 Hobi Persma=".number_format($s2_hobi_persma, dec())."<br>";
        echo "S2 Hobi Bahasa=".number_format($s2_hobi_bahasa, dec())."<br>";
        echo "S2 Hobi Pramuka=".number_format($s2_hobi_pramuka, dec())."<br>";
    echo "<br>";
        }

    //S jawaban_d Sanguin
    $s_hobi_wirausaha = sqrt($s2_hobi_wirausaha);
    //S jawaban_d Koleris
    $s_hobi_kemanusiaan = sqrt($s2_hobi_kemanusiaan);
        //S jawaban_d Melankolis
    $s_hobi_senior = sqrt($s2_hobi_senior);
        //S jawaban_d Plegmatis
    $s_hobi_mapala = sqrt($s2_hobi_mapala);
        //S jawaban_d Plegmatis
    $s_hobi_persma = sqrt($s2_hobi_persma);
        //S jawaban_d Plegmatis
    $s_hobi_bahasa = sqrt($s2_hobi_bahasa);
        //S jawaban_d Plegmatis
    $s_hobi_pramuka = sqrt($s2_hobi_pramuka);
        
        //s2 ^2 jawaban_d sanguin
        $s2_pangkat2_hobi_wirausaha = pow($s2_hobi_wirausaha, 2);
        //s2 ^2 jawaban_d koleris
        $s2_pangkat2_hobi_kemanusiaan = pow($s2_hobi_kemanusiaan, 2);
        //s2 ^2 jawaban_d melankolis
        $s2_pangkat2_hobi_senior = pow($s2_hobi_senior, 2);
        //s2 ^2 jawaban_d plegmatis
        $s2_pangkat2_hobi_mapala = pow($s2_hobi_mapala, 2);
        //s2 ^2 jawaban_d plegmatis
        $s2_pangkat2_hobi_persma = pow($s2_hobi_persma, 2);
        //s2 ^2 jawaban_d plegmatis
        $s2_pangkat2_hobi_bahasa = pow($s2_hobi_bahasa, 2);
        //s2 ^2 jawaban_d plegmatis
        $s2_pangkat2_hobi_pramuka = pow($s2_hobi_pramuka, 2);

        if($show_perhitungan){
    echo "S Hobi Wirausaha=".number_format($s_hobi_wirausaha, dec())."<br>";
    echo "S Hobi Kemanusiaan=".number_format($s_hobi_kemanusiaan, dec())."<br>";
        echo "S Hobi SENIOR=".number_format($s_hobi_senior, dec())."<br>";
        echo "S Hobi MAPALA=".number_format($s_hobi_mapala, dec())."<br>";
        echo "S Hobi Persma=".number_format($s_hobi_persma, dec())."<br>";
        echo "S Hobi Bahasa=".number_format($s_hobi_bahasa, dec())."<br>";
        echo "S Hobi Pramuka=".number_format($s_hobi_pramuka, dec())."<br>";
        }

        //======================================================================
        //#HITUNG PROBABILITAS DENGAN DATA UJI
        if($show_perhitungan){
        echo "<strong><h3>Probabilitas<br></h3></strong>";
        }
    $dua_phi = (2*3.14);
        //#usia
        //Jurusan jurusan
    $depan_jurusan_wirusaha = sqrt($dua_phi*$s2_jurusan_wirusaha);
    $belakang_jurusan_wirusaha = exp( ((pow($jurusan-$x_jurusan_wirusaha,2)) / (2*$s2_pangkat2_jurusan_wirusaha)));
    $prob_jurusan_wirusaha = 1/($depan_jurusan_wirusaha * $belakang_jurusan_wirusaha);
        //koleris
    $depan_jurusan_kemanusiaan = sqrt($dua_phi*$s2_jurusan_kemanusiaan);
    $belakang_jurusan_kemanusiaan = exp( ((pow($jurusan-$x_jurusan_kemanusiaan,2)) / (2*$s2_pangkat2_jurusan_kemanusiaan)));
    $prob_jurusan_kemanusiaan = 1/($depan_jurusan_kemanusiaan * $belakang_jurusan_kemanusiaan);
        //melankolis
    $depan_jurusan_senior = sqrt($dua_phi*$s2_jurusan_senior);
    $belakang_jurusan_senior = exp( ((pow($jurusan-$x_jurusan_senior,2)) / (2*$s2_pangkat2_jurusan_senior)));
    $prob_jurusan_senior = 1/($depan_jurusan_senior * $belakang_jurusan_senior);
        //koleris
    $depan_jurusan_mapala = sqrt($dua_phi*$s2_jurusan_mapala);
    $belakang_jurusan_mapala = exp( ((pow($jurusan-$x_jurusan_mapala,2)) / (2*$s2_pangkat2_jurusan_mapala)));
    $prob_jurusan_mapala = 1/($depan_jurusan_mapala * $belakang_jurusan_mapala);
        //koleris
    $depan_jurusan_persma = sqrt($dua_phi*$s2_jurusan_persma);
    $belakang_jurusan_persma = exp( ((pow($jurusan-$x_jurusan_persma,2)) / (2*$s2_pangkat2_jurusan_persma)));
    $prob_jurusan_persma = 1/($depan_jurusan_persma * $belakang_jurusan_persma);
        //koleris
    $depan_jurusan_bahasa = sqrt($dua_phi*$s2_jurusan_bahasa);
    $belakang_jurusan_bahasa = exp( ((pow($jurusan-$x_jurusan_bahasa,2)) / (2*$s2_pangkat2_jurusan_bahasa)));
    $prob_jurusan_bahasa = 1/($depan_jurusan_bahasa * $belakang_jurusan_bahasa);
        //koleris
    $depan_jurusan_pramuka = sqrt($dua_phi*$s2_jurusan_pramuka);
    $belakang_jurusan_pramuka = exp( ((pow($jurusan-$x_jurusan_pramuka,2)) / (2*$s2_pangkat2_jurusan_pramuka)));
    $prob_jurusan_pramuka = 1/($depan_jurusan_pramuka * $belakang_jurusan_pramuka);
        //display
       if($show_perhitungan){
    echo "<br>";
    echo "P(jurusan|Wirausaha)=".number_format($prob_jurusan_wirusaha, dec())."<br>";
    echo "P(jurusan|Kemanusiaan (ksr, humaniora))=".number_format($prob_jurusan_kemanusiaan, dec())."<br>";
    echo "P(jurusan|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_jurusan_senior, dec())."<br>";
    echo "P(jurusan|Pecinta Alam (MAPALA))=".number_format($prob_jurusan_mapala, dec())."<br>";
    echo "P(jurusan|Persma)=".number_format($prob_jurusan_persma, dec())."<br>";
    echo "P(jurusan|Bahasa)=".number_format($prob_jurusan_bahasa, dec())."<br>";
    echo "P(jurusan|Pramuka))=".number_format($prob_jurusan_pramuka, dec())."<br>";
        }


    //Prodi prodi
    $depan_prodi_wirausaha = sqrt($dua_phi*$s2_prodi_wirausaha);
    $belakang_prodi_wirausaha = exp( ((pow($jurusan-$x_prodi_wirausaha,2)) / (2*$s2_pangkat2_prodi_wirausaha)));
    $prob_prodi_wirausaha = 1/($depan_prodi_wirausaha * $belakang_prodi_wirausaha);
        //koleris
    $depan_prodi_kemanusiaan = sqrt($dua_phi*$s2_prodi_kemanusiaan);
    $belakang_prodi_kemanusiaan = exp( ((pow($jurusan-$x_prodi_kemanusiaan,2)) / (2*$s2_pangkat2_prodi_kemanusiaan)));
    $prob_prodi_kemanusiaan = 1/($depan_prodi_kemanusiaan * $belakang_prodi_kemanusiaan);
        //melankolis
    $depan_prodi_senior = sqrt($dua_phi*$s2_prodi_senior);
    $belakang_prodi_senior = exp( ((pow($jurusan-$x_prodi_senior,2)) / (2*$s2_pangkat2_prodi_senior)));
    $prob_prodi_senior = 1/($depan_prodi_senior * $belakang_prodi_senior);
        //koleris
    $depan_prodi_mapala = sqrt($dua_phi*$s2_prodi_mapala);
    $belakang_prodi_mapala = exp( ((pow($jurusan-$x_prodi_mapala,2)) / (2*$s2_pangkat2_prodi_mapala)));
    $prob_prodi_mapala = 1/($depan_prodi_mapala * $belakang_prodi_mapala);
        //koleris
    $depan_prodi_persma = sqrt($dua_phi*$s2_prodi_persma);
    $belakang_prodi_persma = exp( ((pow($jurusan-$x_prodi_persma,2)) / (2*$s2_pangkat2_prodi_persma)));
    $prob_prodi_persma = 1/($depan_prodi_persma * $belakang_prodi_persma);
        //koleris
    $depan_prodi_bahasa = sqrt($dua_phi*$s2_prodi_bahasa);
    $belakang_prodi_bahasa = exp( ((pow($jurusan-$x_prodi_bahasa,2)) / (2*$s2_pangkat2_prodi_bahasa)));
    $prob_prodi_bahasa = 1/($depan_prodi_bahasa * $belakang_prodi_bahasa);
        //koleris
    $depan_prodi_pramuka = sqrt($dua_phi*$s2_prodi_pramuka);
    $belakang_prodi_pramuka = exp( ((pow($jurusan-$x_prodi_pramuka,2)) / (2*$s2_pangkat2_prodi_pramuka)));
    $prob_prodi_pramuka = 1/($depan_prodi_pramuka * $belakang_prodi_pramuka);
        //display
       if($show_perhitungan){
    echo "<br>";
    echo "P(prodi|Wirausaha)=".number_format($prob_prodi_wirausaha, dec())."<br>";
    echo "P(prodi|Kemanusiaan (ksr, humaniora))=".number_format($prob_prodi_kemanusiaan, dec())."<br>";
    echo "P(prodi|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_prodisenior, dec())."<br>";
    echo "P(prodi|Pecinta Alam (MAPALA))=".number_format($prob_prodi_mapala, dec())."<br>";
    echo "P(prodi|Persma)=".number_format($prob_prodi_persma, dec())."<br>";
    echo "P(prodi|Bahasa)=".number_format($prob_prodi_bahasa, dec())."<br>";
    echo "P(prodi|Pramuka))=".number_format($prob_prodi_pramuka, dec())."<br>";
        }

    //Minat minat
    $depan_minat_wirusaha = sqrt($dua_phi*$s2_minat_wirusaha);
    $belakang_minat_wirusaha = exp( ((pow($jurusan-$x_minat_wirusaha,2)) / (2*$s2_pangkat2_minat_wirusaha)));
    $prob_minat_wirusaha = 1/($depan_minat_wirusaha * $belakang_minat_wirusaha);
        //koleris
    $depan_minat_kemanusiaan = sqrt($dua_phi*$s2_minat_kemanusiaan);
    $belakang_minat_kemanusiaan = exp( ((pow($jurusan-$x_minat_kemanusiaan,2)) / (2*$s2_pangkat2_minat_kemanusiaan)));
    $prob_minat_kemanusiaan = 1/($depan_minat_kemanusiaan * $belakang_minat_kemanusiaan);
        //melankolis
    $depan_minat_senior = sqrt($dua_phi*$s2_minat_senior);
    $belakang_minat_senior = exp( ((pow($jurusan-$x_minat_senior,2)) / (2*$s2_pangkat2_minat_senior)));
    $prob_minat_senior = 1/($depan_minat_senior * $belakang_minat_senior);
        //koleris
    $depan_minat_mapala = sqrt($dua_phi*$s2_minat_mapala);
    $belakang_minat_mapala = exp( ((pow($jurusan-$x_minat_mapala,2)) / (2*$s2_pangkat2_minat_mapala)));
    $prob_minat_mapala = 1/($depan_minat_mapala * $belakang_minat_mapala);
        //koleris
    $depan_minat_persma = sqrt($dua_phi*$s2_minat_persma);
    $belakang_minat_persma = exp( ((pow($jurusan-$x_minat_persma,2)) / (2*$s2_pangkat2_minat_persma)));
    $prob_minat_persma = 1/($depan_minat_persma * $belakang_minat_persma);
        //koleris
    $depan_minat_bahasa = sqrt($dua_phi*$s2_minat_bahasa);
    $belakang_minat_bahasa = exp( ((pow($jurusan-$x_minat_bahasa,2)) / (2*$s2_pangkat2_minat_seni_bahasa)));
    $prob_minat_bahasa = 1/($depan_minat_bahasa * $belakang_minat_bahasa);
        //koleris
    $depan_minat_pramuka = sqrt($dua_phi*$s2_minat_pramuka);
    $belakang_minat_pramuka = exp( ((pow($jurusan-$x_minat_pramuka,2)) / (2*$s2_pangkat2_minat_pramuka)));
    $prob_minat_pramuka = 1/($depan_minat_pramuka * $belakang_minat_pramuka);
        //display
       if($show_perhitungan){
    echo "<br>";
    echo "P(minat|Wirausaha)=".number_format($prob_minat_wirusaha, dec())."<br>";
    echo "P(minat|Kemanusiaan (ksr, humaniora))=".number_format($prob_minat_kemanusiaan, dec())."<br>";
    echo "P(minat|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_minat_senior, dec())."<br>";
    echo "P(minat|Pecinta Alam (MAPALA))=".number_format($prob_minat_mapala, dec())."<br>";
    echo "P(minat|Persma)=".number_format($prob_minat_persma, dec())."<br>";
    echo "P(minat|Bahasa)=".number_format($prob_minat_bahasa, dec())."<br>";
    echo "P(minat|Pramuka))=".number_format($prob_minat_pramuka, dec())."<br>";
        }


    //Bakat bakat
    $depan_bakat_wirusaha = sqrt($dua_phi*$s2_bakat_wirusaha);
    $belakang_bakat_wirusaha = exp( ((pow($jurusan-$x_bakat_wirusaha,2)) / (2*$s2_pangkat2_bakat_wirusaha)));
    $prob_bakat_wirusaha = 1/($depan_bakat_wirusaha * $belakang_bakat_wirusaha);
        //koleris
    $depan_bakat_kemanusiaan = sqrt($dua_phi*$s2_bakat_kemanusiaan);
    $belakang_bakat_kemanusiaan = exp( ((pow($jurusan-$x_bakat_kemanusiaan,2)) / (2*$s2_pangkat2_bakat_kemanusiaan)));
    $prob_bakat_kemanusiaan = 1/($depan_bakat_kemanusiaan * $belakang_bakat_kemanusiaan);
        //melankolis
    $depan_bakat_senior = sqrt($dua_phi*$s2_bakat_senior);
    $belakang_bakat_senior = exp( ((pow($jurusan-$x_bakat_senior,2)) / (2*$s2_pangkat2_bakat_senior)));
    $prob_bakat_senior = 1/($depan_bakat_senior * $belakang_bakat_senior);
        //koleris
    $depan_bakat_mapala = sqrt($dua_phi*$s2_bakat_mapala);
    $belakang_bakat_mapala = exp( ((pow($jurusan-$x_bakat_mapala,2)) / (2*$s2_pangkat2_bakat_seni_mapala)));
    $prob_bakat_mapala = 1/($depan_bakat_mapala * $belakang_bakat_mapala);
        //koleris
    $depan_bakat_persma = sqrt($dua_phi*$s2_bakat_seni_persma);
    $belakang_bakat_persma = exp( ((pow($jurusan-$x_bakat_persma,2)) / (2*$s2_pangkat2_bakat_persma)));
    $prob_bakat_persma = 1/($depan_bakat_persma * $belakang_bakat_persma);
        //koleris
    $depan_bakat_bahasa = sqrt($dua_phi*$s2_bakat_bahasa);
    $belakang_bakat_bahasa = exp( ((pow($jurusan-$x_bakat_bahasa,2)) / (2*$s2_pangkat2_bakat_bahasa)));
    $prob_bakat_bahasa = 1/($depan_bakat_bahasa * $belakang_bakat_bahasa);
        //koleris
    $depan_bakat_pramuka = sqrt($dua_phi*$s2_bakat_pramuka);
    $belakang_bakat_pramuka = exp( ((pow($jurusan-$x_bakat_pramuka,2)) / (2*$s2_pangkat2_bakat_pramuka)));
    $prob_bakat_pramuka = 1/($depan_bakat_pramuka * $belakang_bakat_pramuka);
        //display
       if($show_perhitungan){
    echo "<br>";
    echo "P(bakat|Wirausaha)=".number_format($prob_bakat_wirusaha, dec())."<br>";
    echo "P(bakat|Kemanusiaan (ksr, humaniora))=".number_format($prob_bakat_kemanusiaan, dec())."<br>";
    echo "P(bakat|SENIOR (senior, bola, karate, taekwondo))=".number_format($prob_bakat_senior, dec())."<br>";
    echo "P(bakat|Pecinta Alam (MAPALA))=".number_format($prob_bakat_mapala, dec())."<br>";
    echo "P(bakat|Persma)=".number_format($prob_bakat_persma, dec())."<br>";
    echo "P(bakat|Bahasa)=".number_format($prob_bakat_bahasa, dec())."<br>";
    echo "P(bakat|Pramuka))=".number_format($prob_bakat_pramuka, dec())."<br>";
        }

    
    //Hobi hobi
    $depan_hobi_wirausaha = sqrt($dua_phi*$s2_hobi_wirausaha);
    $belakang_hobi_wirausaha = exp( ((pow($jurusan-$x_hobi_wirausaha,2)) / (2*$s2_pangkat2_hobi_wirausaha)));
    $prob_hobi_wirausaha = 1/($depan_hobi_wirausaha * $belakang_hobi_wirausaha);
        //koleris
    $depan_hobi_kemanusiaan = sqrt($dua_phi*$s2_hobi_kemanusiaan);
    $belakang_hobi_kemanusiaan = exp( ((pow($jurusan-$x_hobi_kemanusiaan,2)) / (2*$s2_pangkat2_hobi_kemanusiaan)));
    $prob_hobi_kemanusiaan = 1/($depan_hobi_kemanusiaan * $belakang_hobi_kemanusiaan);
        //melankolis
    $depan_hobi_senior = sqrt($dua_phi*$s2_hobi_senior);
    $belakang_hobi_senior = exp( ((pow($jurusan-$x_hobi_senior,2)) / (2*$s2_pangkat2_hobi_senior)));
    $prob_hobi_senior = 1/($depan_hobi_senior * $belakang_hobi_menari_senior);
        //koleris
    $depan_hobi_mapala = sqrt($dua_phi*$s2_hobi_mapala);
    $belakang_hobi_mapala = exp( ((pow($jurusan-$x_hobi_mapala,2)) / (2*$s2_pangkat2_hobi_mapala)));
    $prob_hobi_mapala = 1/($depan_hobi_mapala * $belakang_hobi_mapala);
        //koleris
    $depan_hobi_persma = sqrt($dua_phi*$s2_hobi_persma);
    $belakang_hobi_persma = exp( ((pow($jurusan-$x_hobi_persma,2)) / (2*$s2_pangkat2_hobi_persma)));
    $prob_hobi_persma = 1/($depan_hobi_persma * $belakang_hobi_persma);
        //koleris
    $depan_hobi_bahasa = sqrt($dua_phi*$s2_hobi_bahasa);
    $belakang_hobi_bahasa = exp( ((pow($jurusan-$x_hobi_bahasa,2)) / (2*$s2_pangkat2_hobi_bahasa)));
    $prob_hobi_bahasa = 1/($depan_hobi_bahasa * $belakang_hobi_menari_bahasa);
        //koleris
    $depan_hobi_pramuka = sqrt($dua_phi*$s2_hobi_pramuka);
    $belakang_hobi_pramuka = exp( ((pow($jurusan-$x_hobi_pramuka,2)) / (2*$s2_pangkat2_hobi_pramuka)));
    $prob_hobi_pramuka = 1/($depan_hobi_pramuka * $belakang_hobi_pramuka);
        //display
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
        $res_hasil = update_hasil_rekomendasi($db_object, $id_data_testing, $hasil_rekomendasi, 
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


function get_jumlah_sum_atribut($db_object, $atribut, $label){
    $sql = "SELECT SUM($atribut) FROM tb_data_training WHERE label='$label'";
    $res = $db_object->db_query($sql);
    $row = $db_object->db_fetch_array($res);
    return $row[0];
}

function get_jumlah_atribut($db_object, $atribut, $nilai, $label){
    $sql = "SELECT * FROM tb_data_training WHERE $atribut='$nilai' AND label='$label'";
    $res = $db_object->db_query($sql);
    $row = $db_object->db_fetch_array($res);
    return $row[0];
}


function get_s2_populasi($db_object, $atribut, $label, $x_params, $jml_params){
    $sql = "SELECT $atribut FROM tb_data_training WHERE label='$label'";
    $res = $db_object->db_query($sql);
    $sum_power = 0;
    while($row = $db_object->db_fetch_array($res)){
        $power = pow($row[0]-$x_params,2);
        $sum_power += $power;
    }
    $s2 = $sum_power/($jml_params-1);
    return $s2;
}
?>

