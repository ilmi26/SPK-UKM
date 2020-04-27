<?php

require_once"db/database.php";

 $pilih1="ya";
 $pilih2="tidak";
 $pilih3="tidak";
 
 $jumK1=getOut($conn,"Ekonomi");
 $jumK2=getOut($conn,"Bisnis");
 $jumK3=getOut($conn,"Executive");
 $totK=$jumK1+$jumK2+$jumK3;

$jumG1A=getKK($conn,'c1',$pilih1,"Ekonomi");
$jumG1B=getKK($conn,'c1',$pilih1,"Bisnis");
$jumG1C=getKK($conn,'c1',$pilih1,"Executive");

$jumG2A=getKK($conn,'c2',$pilih2,"Ekonomi");
$jumG2B=getKK($conn,'c2',$pilih2,"Bisnis");
$jumG2C=getKK($conn,'c2',$pilih2,"Executive");

$jumG3A=getKK($conn,'c3',$pilih3,"Ekonomi");
$jumG3B=getKK($conn,'c3',$pilih3,"Bisnis");
$jumG3C=getKK($conn,'c3',$pilih3,"Executive");

 
if($jumG1A==0 || $jumG2A==0 || $jumG3A==0){
 $jumK1+=1;
 $totK+=1;
 $jumG1A+=1;$jumG2A+=1;$jumG3A+=1;
 }
if($jumG1B==0 || $jumG2B==0 || $jumG3B==0 ){
 $jumK1+=1;
 $totK+=1;
 $jumG1B+=1;$jumG2B+=1;$jumG3B+=1;
 }
if($jumG1C==0 || $jumG2C==0 || $jumG3C==0){
 $jumK1+=1;
 $totK+=1;
 $jumG1C+=1;$jumG2C+=1;$jumG3C+=1;
 }
 
 
$HA=($jumK1/$totK)*($jumG1A/$jumK1)*($jumG2A/$jumK1)*($jumG3A/$jumK1);
$HB=($jumK2/$totK)*($jumG1B/$jumK2)*($jumG2B/$jumK2)*($jumG3B/$jumK2);
$HC=($jumK3/$totK)*($jumG1C/$jumK3)*($jumG2C/$jumK3)*($jumG3C/$jumK3);

$SHA="($jumK1/$totK) x ($jumG1A/$jumK1) x ($jumG2A/$jumK1) x ($jumG3A/$jumK1)";
$SHB="($jumK2/$totK) x ($jumG1B/$jumK2) x ($jumG2B/$jumK2) x ($jumG3B/$jumK2)";
$SHC="($jumK3/$totK) x ($jumG1C/$jumK3) x ($jumG2C/$jumK3) x ($jumG3C/$jumK3)";




$max=0;
$keterangan="";
$nk1="Ekonomi";
$nk2="Bisnis";
$nk3="Executive";
if($HA>=$HB && $HA>=$HC){
 $max=$HA;
 $index=$nk1;
 }
else if($HB>=$HA && $HB>=$HB){
 $max=$HB;
 $index=$nk2;
}
else if($HC>=$HA && $HC>=$HC){
 $max=$HC;
 $index=$nk3;
  }
         
$gab="<h3>Hasil Analisa</h3>";
$gab.= "<strong>$nk1 => $SHA =$HA</strong><br>";
$gab.= "<strong>$nk2 => $SHB =$HB</strong><br>";
$gab.= "<strong>$nk3 => $SHC =$HC</strong><hr>";

$gab2= "<b>Rekomendasi Bus Anda : $index ($max)<br>";


$rekapitulasi= "$nk1 => $SHA =$HA<br>";
$rekapitulasi.= "$nk2 => $SHB =$HB<br>";
$rekapitulasi.= "$nk3 => $SHC =$HC<hr>";


echo $gab;
echo $gab2;


function getKK($conn,$kolom,$data,$kat){
  $sql="select * from `tb_datalatih` where `$kolom`='$data' and `class`='$kat'";
  $jum=getJum($conn,$sql);
  return $jum;
}

function getOut($conn,$kat){
  $sql="select * from `tb_datalatih` where `class`='$kat'";
  $jum=getJum($conn,$sql);
  return $jum;
}
function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
  $rs->free();
  return $jum;
}

?>