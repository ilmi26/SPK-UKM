
<div class="panel-footer">
    <a href="../index.php?page=sistem&actions=tampil" class="btn btn-primary btn-sm">Kembali </a>
</div>
<marquee scrolldelay="100" style="font-family:arial; font-size:20px; color:#000000;" bgcolor="0288d1"><b>Hasil Perhitungan</marquee> 


<body>
<section id="tes_asma">
<div class="inner_wrapper">
<div class="container">
<table border="3" align="center" width="850" style="border-color:#0288d1; background-color:#000000;">
  <tr>
  </tr>
    <tr>
      <td style="color:#F8F8FF;"> 

<?php

 $input1 = $_POST['input1'];
 $input2 = $_POST['input2'];
 $input3 = $_POST['input3'];
 $input4 = $_POST['input4'];
 $input5 = $_POST['input5'];


  $prob_bahasa = 103/437;
  $prob_kemanusiaan = 56/437;
  $prob_mapala = 6/437;
  $prob_persma = 20/437;
  $prob_pramuka = 14/437;
  $prob_senior = 128/437;
  $prob_wirausaha = 109/437;

  #===========Jurusan==============
  $anb = 10/103;
  $ank = 4/56;
  $anm = 0/6;
  $anp = 2/20;
  $anpr = 0/14;
  $ans = 7/128;
  $anw = 17/109;

  $akb = 20/103;
  $akk = 6/56;
  $akm = 0/6;
  $akp = 2/20;
  $akpr = 1/14;
  $aks = 14/128;
  $akw = 35/109;

  $teb = 46/103;
  $tek = 23/56;
  $tem = 1/6;
  $tep = 8/20;
  $tepr = 2/14;
  $tes = 63/128;
  $tew = 23/109;

  $tkb = 8/103;
  $tkk = 14/56;
  $tkm = 3/6;
  $tkp = 7/20;
  $tkpr = 1/14;
  $tks = 30/128;
  $tkw = 27/109;

  $tmb = 10/103;
  $tmk = 8/56;
  $tmm = 2/6;
  $tmp = 1/20;
  $tmpr = 8/14;
  $tms = 7/128;
  $tmw = 5/109;

  $tsb = 9/103;
  $tsk = 1/56;
  $tsm = 0/6;
  $tsp = 0/20;
  $tspr = 2/14;
  $tss = 7/128;
  $tsw = 2/109;

  #=============Prodi=================

  $ab3b = 3/103;
  $ab3k = 1/56;
  $ab3m = 0/6;
  $ab3p = 1/20;
  $ab3pr = 0/14;
  $ab3s = 1/128;
  $ab3w = 9/109;

  $ak3b = 5/103;
  $ak3k = 0/56;
  $ak3m = 0/6;
  $ak3p = 1/20;
  $ak3pr = 1/14;
  $ak3s = 4/128;
  $ak3w = 22/109;

  $ankb = 1/103;
  $ankk = 6/56;
  $ankm = 0/6;
  $ankp = 0/20;
  $ankpr = 0/14;
  $anks = 1/128;
  $ankw = 2/109;

  $te3b = 1/103;
  $te3k = 1/56;
  $te3m = 0/6;
  $te3p = 0/20;
  $te3pr = 0/14;
  $te3s = 0/128;
  $te3w = 1/109;

  $tk3b = 6/103;
  $tk3k = 5/56;
  $tk3m = 1/6;
  $tk3p = 6/20;
  $tk3pr = 0/14;
  $tk3s = 26/128;
  $tk3w = 20/109;

  $tkm3b = 0/103;
  $tkm3k = 2/56;
  $tkm3m = 1/6;
  $tkm3p = 0/20;
  $tkm3pr = 1/14;
  $tkm3s = 3/128;
  $tkm3w = 2/109;

  $tks3b = 0/103;
  $tks3k = 0/56;
  $tks3m = 0/6;
  $tks3p = 0/20;
  $tks3pr = 1/14;
  $tks3s = 1/128;
  $tks3w = 0/109;

  $tkg3b = 6/103;
  $tkg3k = 1/56;
  $tkg3m = 0/6;
  $tkg3p = 0/20;
  $tkg3pr = 0/14;
  $tkg3s = 2/128;
  $tkg3w = 2/109;

  $tkjj3b = 3/103;
  $tkjj3k = 0/56;
  $tkjj3m = 0/6;
  $tkjj3p = 0/20;
  $tkjj3pr = 0/14;
  $tkjj3s = 1/128;
  $tkjj3w = 0/109;

  $tkeb = 3/103;
  $tkek = 1/56;
  $tkem = 0/6;
  $tkep = 0/20;
  $tkepr = 0/14;
  $tkes = 1/128;
  $tkew = 2/109;

  $tl3b = 4/103;
  $tl3k = 3/56;
  $tl3m = 1/6;
  $tl3p = 2/20;
  $tl3pr = 0/14;
  $tl3s = 8/128;
  $tl3w = 3/109;

  $tmk3b = 0/103;
  $tmk3k = 1/56;
  $tmk3m = 0/6;
  $tmk3p = 0/20;
  $tmk3pr = 0/14;
  $tmk3s = 0/128;
  $tmk3w = 0/109;

  $tm3b = 0/103;
  $tm3k = 1/56;
  $tm3m = 1/6;
  $tm3p = 0/20;
  $tm3pr = 0/14;
  $tm3s = 0/128;
  $tm3w = 0/109;

  $tob = 0/103;
  $tok = 4/56;
  $tom = 0/6;
  $top = 0/20;
  $topr = 0/14;
  $tos = 1/128;
  $tow = 0/109;

  $tpabb = 0/103;
  $tpabk = 0/56;
  $tpabm = 0/6;
  $tpabp = 0/20;
  $tpabpr = 0/14;
  $tpabs = 1/128;
  $tpabw = 0/109;

  $ts3b = 0/103;
  $ts3k = 0/56;
  $ts3m = 0/6;
  $ts3p = 0/20;
  $ts3pr = 0/14;
  $ts3s = 2/128;
  $ts3w = 0/109;

  $ttl3b = 17/103;
  $ttl3k = 8/56;
  $ttl3m = 0/6;
  $ttl3p = 2/20;
  $ttl3pr = 0/14;
  $ttl3s = 5/128;
  $ttl3w = 3/109;

  $ab4b = 7/103;
  $ab4k = 3/56;
  $ab4m = 0/6;
  $ab4p = 1/20;
  $ab4pr = 0/14;
  $ab4s = 6/128;
  $ab4w = 8/109;

  $akm4b = 15/103;
  $akm4k = 6/56;
  $akm4m = 0/6;
  $akm4p = 1/20;
  $akm4pr = 0/14;
  $akm4s = 10/128;
  $akm4w = 13/109;

  $tk4b = 1/103;
  $tk4k = 0/56;
  $tk4m = 1/6;
  $tk4p = 0/20;
  $tk4pr = 0/14;
  $tk4s = 0/128;
  $tk4w = 0/109;

  $tkjb = 20/103;
  $tkjk = 2/56;
  $tkjm = 0/6;
  $tkjp = 2/20;
  $tkjpr = 2/14;
  $tkjs = 33/128;
  $tkjw = 10/109;

  $tks4b = 0/103;
  $tks4k = 0/56;
  $tks4m = 0/6;
  $tks4p = 0/20;
  $tks4pr = 1/14;
  $tks4s = 1/128;
  $tks4w = 0/109;

  $tl4b = 4/103;
  $tl4k = 6/56;
  $tl4m = 0/6;
  $tl4p = 2/20;
  $tl4pr = 0/14;
  $tl4s = 6/128;
  $tl4w = 2/109;

  $tmfb = 4/103;
  $tmfk = 0/56;
  $tmfm = 1/6;
  $tmfp = 0/20;
  $tmfpr = 0/14;
  $tmfs = 1/128;
  $tmfw = 3/109;

  $tmk4b = 1/103;
  $tmk4k = 0/56;
  $tmk4m = 0/6;
  $tmk4p = 1/20;
  $tmk4pr = 6/14;
  $tmk4s = 0/128;
  $tmk4w = 0/109;

  $tmjb = 0/103;
  $tmjk = 3/56;
  $tmjm = 0/6;
  $tmjp = 0/20;
  $tmjpr = 0/14;
  $tmjs = 11/128;
  $tmjw = 4/109;

  $tpeb = 2/103;
  $tpek = 1/56;
  $tpem = 0/6;
  $tpep = 0/20;
  $tpepr = 2/14;
  $tpes = 3/128;
  $tpew = 0/109;

  $tkib = 0/103;
  $tkik = 1/56;
  $tkim = 0/6;
  $tkip = 1/20;
  $tkipr = 0/14;
  $tkis = 0/128;
  $tkiw = 3/109;

  #===========Minat================
  $bb = 63/103;
  $bk = 2/56;
  $bm = 0/6;
  $bp = 2/20;
  $bpr = 0/14;
  $bs = 5/128;
  $bw = 1/109;

  $bdb = 1/103;
  $bdk = 1/56;
  $bdm = 0/6;
  $bdp = 1/20;
  $bdpr = 0/14;
  $bds = 51/128;
  $bdw = 1/109;

  $jb = 3/103;
  $jk = 2/56;
  $jm = 1/6;
  $jp = 11/20;
  $jpr = 1/14;
  $js = 1/128;
  $jw = 1/109;

  $kmb = 3/103;
  $kmk = 17/56;
  $kmm = 0/6;
  $kmp = 0/20;
  $kmpr = 1/14;
  $kms = 1/128;
  $kmw = 1/109;

  $ksb = 3/103;
  $ksk = 2/56;
  $ksm = 1/6;
  $ksp = 11/20;
  $kspr = 1/14;
  $kss = 1/128;
  $ksw = 1/109;

  $ob = 14/103;
  $ok = 15/56;
  $om = 0/6;
  $op = 1/20;
  $opr = 3/14;
  $os = 31/128;
  $ow = 9/109;

  $pab = 1/103;
  $pak = 1/56;
  $pam = 4/6;
  $pap = 1/20;
  $papr = 1/14;
  $pas = 3/128;
  $paw = 0/109;

  $pb = 0/103;
  $pk = 0/56;
  $pm = 0/6;
  $pp = 2/20;
  $ppr = 6/14;
  $ps = 0/128;
  $pw = 0/109;

  $sb = 15/103;
  $sk = 14/56;
  $sm = 1/6;
  $sp = 2/20;
  $spr = 2/14;
  $ss = 31/128;
  $sw = 14/109;

  $wb = 2/103;
  $wk = 1/56;
  $wm = 0/6;
  $wp = 0/20;
  $wpr = 0/14;
  $ws = 4/128;
  $ww = 82/109;

  #===========Bakat================
  $b2b = 32/103;
  $b2k = 3/56;
  $b2m = 0/6;
  $b2p = 2/20;
  $b2pr = 3/14;
  $b2s = 8/128;
  $b2w = 3/109;

  $lb = 15/103;
  $lk = 8/56;
  $lm = 2/6;
  $lp = 3/20;
  $lpr = 2/14;
  $ls = 18/128;
  $lw = 72/109;

  $o2b = 29/103;
  $o2k = 22/56;
  $o2m = 1/6;
  $o2p = 8/20;
  $o2pr = 6/14;
  $o2s = 57/128;
  $o2w = 9/109;

  $s2b = 27/103;
  $s2k = 23/56;
  $s2m = 3/6;
  $s2p = 7/20;
  $s2pr = 3/14;
  $s2s = 45/128;
  $s2w = 25/109;

  #===========Hobi================
  $mnb = 3/103;
  $mnk = 1/56;
  $mnm = 0/6;
  $mnp = 1/20;
  $mnpr = 0/14;
  $mns = 9/128;
  $mnw = 14/109;

  $mnyb = 7/103;
  $mnyk = 5/56;
  $mnym = 1/6;
  $mnyp = 1/20;
  $mnypr = 2/14;
  $mnys = 10/128;
  $mnyw = 6/109;

  $mnlsb = 5/103;
  $mnlsk = 2/56;
  $mnlsm = 1/6;
  $mnlsp = 5/20;
  $mnlspr = 1/14;
  $mnlss = 1/128;
  $mnlsw = 6/109;

  $mgbb = 3/103;
  $mgbk = 1/56;
  $mgbm = 0/6;
  $mgbp = 1/20;
  $mgbpr = 0/14;
  $mgbs = 4/128;
  $mgbw = 5/109;

  $mskb = 3/103;
  $mskk = 1/56;
  $mskm = 0/6;
  $mskp = 0/20;
  $mskpr = 1/14;
  $msks = 1/128;
  $mskw = 19/109;

  $ftb = 0/103;
  $ftk = 0/56;
  $ftm = 0/6;
  $ftp = 2/20;
  $ftpr = 0/14;
  $fts = 1/128;
  $ftw = 1/109;

  $sbb = 1/103;
  $sbk = 0/56;
  $sbm = 0/6;
  $sbp = 0/20;
  $sbpr = 0/14;
  $sbs = 12/128;
  $sbw = 5/109;

  $btb = 6/103;
  $btk = 1/56;
  $btm = 0/6;
  $btp = 0/20;
  $btpr = 0/14;
  $bts = 5/128;
  $btw = 8/109;

  $bsb = 3/103;
  $bsk = 0/56;
  $bsm = 0/6;
  $bsp = 0/20;
  $bspr = 0/14;
  $bss = 2/128;
  $bsw = 0/109;

  $fsb = 2/103;
  $fsk = 2/56;
  $fsm = 0/6;
  $fsp = 0/20;
  $fspr = 1/14;
  $fss = 1/128;
  $fsw = 0/109;

  $vlb = 0/103;
  $vlk = 2/56;
  $vlm = 0/6;
  $vlp = 0/20;
  $vlpr = 0/14;
  $vls = 1/128;
  $vlw = 0/109;

  $bmb = 2/103;
  $bmk = 1/56;
  $bmm = 0/6;
  $bmp = 0/20;
  $bmpr = 0/14;
  $bms = 3/128;
  $bmw = 2/109;

  $o3b = 13/103;
  $o3k = 20/56;
  $o3m = 1/6;
  $o3p = 3/20;
  $o3pr = 5/14;
  $o3s = 32/128;
  $o3w = 11/109;

  $mbcb = 18/103;
  $mbck = 10/56;
  $mbcm = 0/6;
  $mbcp = 3/20;
  $mbcpr = 4/14;
  $mbcs = 16/128;
  $mbcw = 22/109;

  $brmb = 3/103;
  $brmk = 1/56;
  $brmm = 0/6;
  $brmp = 0/20;
  $brmpr = 0/14;
  $brms = 3/128;
  $brmw = 2/109;

  $dmb = 2/103;
  $dmk = 1/56;
  $dmm = 0/6;
  $dmp = 0/20;
  $dmpr = 0/14;
  $dms = 1/128;
  $dmw = 0/109;

  $nb = 7/103;
  $nk = 5/56;
  $nm = 0/6;
  $np = 1/20;
  $npr = 0/14;
  $ns = 8/128;
  $nw = 4/109;

  $mgb = 5/103;
  $mgk = 0/56;
  $mgm = 0/6;
  $mgp = 1/20;
  $mgpr = 0/14;
  $mgs = 5/128;
  $mgw = 1/109;

  $jjb = 2/103;
  $jjk = 1/56;
  $jjm = 0/6;
  $jjp = 2/20;
  $jjpr = 0/14;
  $jjs = 0/128;
  $jjw = 2/109;

  $bbabb = 11/103;
  $bbabk = 0/56;
  $bbabm = 0/6;
  $bbabp = 0/20;
  $bbabpr = 0/14;
  $bbabs = 5/128;
  $bbabw = 0/109;

  $mlsb = 2/103;
  $mlsk = 0/56;
  $mlsm = 0/6;
  $mlsp = 0/20;
  $mlspr = 0/14;
  $mlss = 0/128;
  $mlsw = 1/109;

  $brnb = 1/103;
  $brnk = 0/56;
  $brnm = 0/6;
  $brnp = 0/20;
  $brnpr = 0/14;
  $brns = 4/128;
  $brnw = 1/109;

  $ngb = 2/103;
  $ngk = 1/56;
  $ngm = 3/6;
  $ngp = 0/20;
  $ngpr = 0/14;
  $ngs = 2/128;
  $ngw = 0/109;

  $trb = 4/103;
  $trk = 2/56;
  $trm = 0/6;
  $trp = 0/20;
  $trpr = 0/14;
  $trs = 3/128;
  $trw = 0/109;

  $dgb = 2/103;
  $dgk = 0/56;
  $dgm = 0/6;
  $dgp = 0/20;
  $dgpr = 0/14;
  $dgs = 2/128;
  $dgw = 2/109;


  #===============================
if ($input1 == 'input1a'){
  $temp1 = $input1;
  $bahasa1 = $anb;
  $kemanusiaan1 = $ank;
  $mapala1 = $anm;
  $persma1 = $anp;
  $pramuka1 = $anpr;
  $senior1 = $ans;
  $wirausaha1 = $anw;
}

if ($input1 == 'input1b'){
  $temp1 = $input1;
  $bahasa1 = $akb;
  $kemanusiaan1 = $akk;
  $mapala1 = $akm;
  $persma1 = $akp;
  $pramuka1 = $akpr;
  $senior1 = $aks;
  $wirausaha1 = $akw;
}

if ($input1 == 'input1c'){
  $temp1 = $input1;
  $bahasa1 = $teb;
  $kemanusiaan1 = $tek;
  $mapala1 = $tem;
  $persma1 = $tep;
  $pramuka1 = $tepr;
  $senior1 = $tes;
  $wirausaha1 = $tew;
}

if ($input1 == 'input1d'){
  $temp1 = $input1;
  $bahasa1 = $tkb;
  $kemanusiaan1 = $tkk;
  $mapala1 = $tkm;
  $persma1 = $tkp;
  $pramuka1 = $tkpr;
  $senior1 = $tks;
  $wirausaha1 = $tkw;
}

if ($input1 == 'input1e'){
  $temp1 = $input1;
  $bahasa1 = $tmb;
  $kemanusiaan1 = $tmk;
  $mapala1 = $tmm;
  $persma1 = $tmp;
  $pramuka1 = $tmpr;
  $senior1 = $tms;
  $wirausaha1 = $tmw;
}

if ($input1 == 'input1f'){
  $temp1 = $input1;
  $bahasa1 = $tsb;
  $kemanusiaan1 = $tsk;
  $mapala1 = $tsm;
  $persma1 = $tsp;
  $pramuka1 = $tspr;
  $senior1 = $tss;
  $wirausaha1 = $tsw;
}

  #===============================
if ($input2 == 'input2a'){
  $temp2 = $input2;
  $bahasa2 = $ab3b;
  $kemanusiaan2 = $ab3k;
  $mapala2 = $ab3m;
  $persma2 = $ab3p;
  $pramuka2 = $ab3pr;
  $senior2 = $ab3s;
  $wirausaha2 = $ab3w;
}

if ($input2 == 'input2b'){
  $temp2 = $input2;
  $bahasa2 = $ak3b;
  $kemanusiaan2 = $ak3k;
  $mapala2 = $ak3m;
  $persma2 = $ak3p;
  $pramuka2 = $ak3pr;
  $senior2 = $ak3s;
  $wirausaha2 = $ak3w;
}

if ($input2 == 'input2c'){
  $temp2 = $input2;
  $bahasa2 = $ankb;
  $kemanusiaan2 = $ankk;
  $mapala2 = $ankm;
  $persma2 = $ankp;
  $pramuka2 = $ankpr;
  $senior2 = $anks;
  $wirausaha2 = $ankw;
}

if ($input2 == 'input2d'){
  $temp2 = $input2;
  $bahasa2 = $te3b;
  $kemanusiaan2 = $te3k;
  $mapala2 = $te3m;
  $persma2 = $te3p;
  $pramuka2 = $te3pr;
  $senior2 = $te3s;
  $wirausaha2 = $te3w;
}

if ($input2 == 'input2e'){
  $temp2 = $input2;
  $bahasa2 = $tk3b;
  $kemanusiaan2 = $tk3k;
  $mapala2 = $tk3m;
  $persma2 = $tk3p;
  $pramuka2 = $tk3pr;
  $senior2 = $tk3s;
  $wirausaha2 = $tk3w;
}

if ($input2 == 'input2f'){
  $temp2 = $input2;
  $bahasa2 = $tkm3b;
  $kemanusiaan2 = $tkm3k;
  $mapala2 = $tkm3m;
  $persma2 = $tkm3p;
  $pramuka2 = $tkm3pr;
  $senior2 = $tkm3s;
  $wirausaha2 = $tkm3w;
}

if ($input2 == 'input2g'){
  $temp2 = $input2;
  $bahasa2 = $tks3b;
  $kemanusiaan2 = $tks3k;
  $mapala2 = $tks3m;
  $persma2 = $tks3p;
  $pramuka2 = $tks3pr;
  $senior2 = $tks3s;
  $wirausaha2 = $tks3w;
}

if ($input2 == 'input2h'){
  $temp2 = $input2;
  $bahasa2 = $tkg3b;
  $kemanusiaan2 = $tkg3k;
  $mapala2 = $tkg3m;
  $persma2 = $tkg3p;
  $pramuka2 = $tkg3pr;
  $senior2 = $tkg3s;
  $wirausaha2 = $tkg3w;
}

if ($input2 == 'input2i'){
  $temp2 = $input2;
  $bahasa2 = $tkjj3b;
  $kemanusiaan2 = $tkjj3k;
  $mapala2 = $tkjj3m;
  $persma2 = $tkjj3p;
  $pramuka2 = $tkjj3pr;
  $senior2 = $tkjj3s;
  $wirausaha2 = $tkjj3w;
}

if ($input2 == 'input2j'){
  $temp2 = $input2;
  $bahasa2 = $tkeb;
  $kemanusiaan2 = $tkek;
  $mapala2 = $tkem;
  $persma2 = $tkep;
  $pramuka2 = $tkepr;
  $senior2 = $tkes;
  $wirausaha2 = $tkew;
}

if ($input2 == 'input2k'){
  $temp2 = $input2;
  $bahasa2 = $tl3b;
  $kemanusiaan2 = $tl3k;
  $mapala2 = $tl3m;
  $persma2 = $tl3p;
  $pramuka2 = $tl3pr;
  $senior2 = $tl3s;
  $wirausaha2 = $tl3w;
}

if ($input2 == 'input2l'){
  $temp2 = $input2;
  $bahasa2 = $tmk3b;
  $kemanusiaan2 = $tmk3k;
  $mapala2 = $tmk3m;
  $persma2 = $tmk3p;
  $pramuka2 = $tmk3pr;
  $senior2 = $tmk3s;
  $wirausaha2 = $tmk3w;
}

if ($input2 == 'input2m'){
  $temp2 = $input2;
  $bahasa2 = $tm3b;
  $kemanusiaan2 = $tm3k;
  $mapala2 = $tm3m;
  $persma2 = $tm3p;
  $pramuka2 = $tm3pr;
  $senior2 = $tm3s;
  $wirausaha2 = $tm3w;
}

if ($input2 == 'input2n'){
  $temp2 = $input2;
  $bahasa2 = $tob;
  $kemanusiaan2 = $tok;
  $mapala2 = $tom;
  $persma2 = $top;
  $pramuka2 = $topr;
  $senior2 = $tos;
  $wirausaha2 = $tow;
}

if ($input2 == 'input2o'){
  $temp2 = $input2;
  $bahasa2 = $tpabb;
  $kemanusiaan2 = $tpabk;
  $mapala2 = $tpabm;
  $persma2 = $tpabp;
  $pramuka2 = $tpabpr;
  $senior2 = $tpabs;
  $wirausaha2 = $tpabw;
}

if ($input2 == 'input2p'){
  $temp2 = $input2;
  $bahasa2 = $ts3b;
  $kemanusiaan2 = $ts3k;
  $mapala2 = $ts3m;
  $persma2 = $ts3p;
  $pramuka2 = $ts3pr;
  $senior2 = $ts3s;
  $wirausaha2 = $ts3w;
}

if ($input2 == 'input2q'){
  $temp2 = $input2;
  $bahasa2 = $ttl3b;
  $kemanusiaan2 = $ttl3k;
  $mapala2 = $ttl3m;
  $persma2 = $ttl3p;
  $pramuka2 = $ttl3pr;
  $senior2 = $ttl3s;
  $wirausaha2 = $ttl3w;
}

if ($input2 == 'input2r'){
  $temp2 = $input2;
  $bahasa2 = $ab4b;
  $kemanusiaan2 = $ab4k;
  $mapala2 = $ab4m;
  $persma2 = $ab4p;
  $pramuka2 = $ab4pr;
  $senior2 = $ab4s;
  $wirausaha2 = $ab4w;
}

if ($input2 == 'input2s'){
  $temp2 = $input2;
  $bahasa2 = $akm4b;
  $kemanusiaan2 = $akm4k;
  $mapala2 = $akm4m;
  $persma2 = $akm4p;
  $pramuka2 = $akm4pr;
  $senior2 = $akm4s;
  $wirausaha2 = $akm4w;
}

if ($input2 == 'input2t'){
  $temp2 = $input2;
  $bahasa2 = $tk4b;
  $kemanusiaan2 = $tk4k;
  $mapala2 = $tk4m;
  $persma2 = $tk4p;
  $pramuka2 = $tk4pr;
  $senior2 = $tk4s;
  $wirausaha2 = $tk4w;
}

if ($input2 == 'input2u'){
  $temp2 = $input2;
  $bahasa2 = $tkjb;
  $kemanusiaan2 = $tkjk;
  $mapala2 = $tkjm;
  $persma2 = $tkjp;
  $pramuka2 = $tkjpr;
  $senior2 = $tkjs;
  $wirausaha2 = $tkjw;
}

if ($input2 == 'input2v'){
  $temp2 = $input2;
  $bahasa2 = $tks4b;
  $kemanusiaan2 = $tks4k;
  $mapala2 = $tks4m;
  $persma2 = $tks4p;
  $pramuka2 = $tks4pr;
  $senior2 = $tks4s;
  $wirausaha2 = $tks4w;
}

if ($input2 == 'input2w'){
  $temp2 = $input2;
  $bahasa2 = $tl4b;
  $kemanusiaan2 = $tl4k;
  $mapala2 = $tl4m;
  $persma2 = $tl4p;
  $pramuka2 = $tl4pr;
  $senior2 = $tl4s;
  $wirausaha2 = $tl4w;
}

if ($input2 == 'input2x'){
  $temp2 = $input2;
  $bahasa2 = $tmfb;
  $kemanusiaan2 = $tmfk;
  $mapala2 = $tmfm;
  $persma2 = $tmfp;
  $pramuka2 = $tmfpr;
  $senior2 = $tmfs;
  $wirausaha2 = $tmfw;
}

if ($input2 == 'input2y'){
  $temp2 = $input2;
  $bahasa2 = $tmk4b;
  $kemanusiaan2 = $tmk4k;
  $mapala2 = $tmk4m;
  $persma2 = $tmk4p;
  $pramuka2 = $tmk4pr;
  $senior2 = $tmk4s;
  $wirausaha2 = $tmk4w;
}

if ($input2 == 'input2z'){
  $temp2 = $input2;
  $bahasa2 = $tmjb;
  $kemanusiaan2 = $tmjk;
  $mapala2 = $tmjm;
  $persma2 = $tmjp;
  $pramuka2 = $tmjpr;
  $senior2 = $tmjs;
  $wirausaha2 = $tmjw;
}

if ($input2 == 'input2aa'){
  $temp2 = $input2;
  $bahasa2 = $tpeb;
  $kemanusiaan2 = $tpek;
  $mapala2 = $tpem;
  $persma2 = $tpep;
  $pramuka2 = $tpepr;
  $senior2 = $tpes;
  $wirausaha2 = $tpew;
}

if ($input2 == 'input2bb'){
  $temp2 = $input2;
  $bahasa2 = $tkib;
  $kemanusiaan2 = $tkik;
  $mapala2 = $tkim;
  $persma2 = $tkip;
  $pramuka2 = $tkipr;
  $senior2 = $tkis;
  $wirausaha2 = $tkiw;
}

  #===============================
if ($input3 == 'input3a'){
  $temp3 = $input3;
  $bahasa3 = $bb;
  $kemanusiaan3 = $bk;
  $mapala3 = $bm;
  $persma3 = $bp;
  $pramuka3 = $bpr;
  $senior3 = $bs;
  $wirausaha3 = $bw;
}

if ($input3 == 'input3b'){
  $temp3 = $input3;
  $bahasa3 = $bdb;
  $kemanusiaan3 = $bdk;
  $mapala3 = $bdm;
  $persma3 = $bdp;
  $pramuka3 = $bdpr;
  $senior3 = $bds;
  $wirausaha3 = $bdw;
}

if ($input3 == 'input3c'){
  $temp3 = $input3;
  $bahasa3 = $jb;
  $kemanusiaan3 = $jk;
  $mapala3 = $jm;
  $persma3 = $jp;
  $pramuka3 = $jpr;
  $senior3 = $js;
  $wirausaha3 = $jw;
}

if ($input3 == 'input3d'){
  $temp3 = $input3;
  $bahasa3 = $kmb;
  $kemanusiaan3 = $kmk;
  $mapala3 = $kmm;
  $persma3 = $kmp;
  $pramuka3 = $kmpr;
  $senior3 = $kms;
  $wirausaha3 = $kmw;
}

if ($input3 == 'input3e'){
  $temp3 = $input3;
  $bahasa3 = $ksb;
  $kemanusiaan3 = $ksk;
  $mapala3 = $ksm;
  $persma3 = $ksp;
  $pramuka3 = $kspr;
  $senior3 = $kss;
  $wirausaha3 = $ksw;
}

if ($input3 == 'input3f'){
  $temp3 = $input3;
  $bahasa3 = $ob;
  $kemanusiaan3 = $ok;
  $mapala3 = $om;
  $persma3 = $op;
  $pramuka3 = $opr;
  $senior3 = $os;
  $wirausaha3 = $ow;
}

if ($input3 == 'input3g'){
  $temp3 = $input3;
  $bahasa3 = $pab;
  $kemanusiaan3 = $pak;
  $mapala3 = $pam;
  $persma3 = $pap;
  $pramuka3 = $papr;
  $senior3 = $pas;
  $wirausaha3 = $paw;
}

if ($input3 == 'input3h'){
  $temp3 = $input3;
  $bahasa3 = $pb;
  $kemanusiaan3 = $pk;
  $mapala3 = $pm;
  $persma3 = $pp;
  $pramuka3 = $ppr;
  $senior3 = $ps;
  $wirausaha3 = $pw;
}

if ($input3 == 'input3i'){
  $temp3 = $input3;
  $bahasa3 = $sb;
  $kemanusiaan3 = $sk;
  $mapala3 = $sm;
  $persma3 = $sp;
  $pramuka3 = $spr;
  $senior3 = $ss;
  $wirausaha3 = $sw;
}

if ($input3 == 'input3j'){
  $temp3 = $input3;
  $bahasa3 = $wb;
  $kemanusiaan3 = $wk;
  $mapala3 = $wm;
  $persma3 = $wp;
  $pramuka3 = $wpr;
  $senior3 = $ws;
  $wirausaha3 = $ww;
}

  #===============================
if ($input4 == 'input4a'){
  $temp4 = $input4;
  $bahasa4 = $b2b;
  $kemanusiaan4 = $b2k;
  $mapala4 = $b2m;
  $persma4 = $b2p;
  $pramuka4 = $b2pr;
  $senior4 = $b2s;
  $wirausaha4 = $b2w;
}

if ($input4 == 'input4b'){
  $temp4 = $input4;
  $bahasa4 = $lb;
  $kemanusiaan4 = $lk;
  $mapala4 = $lm;
  $persma4 = $lp;
  $pramuka4 = $lpr;
  $senior4 = $ls;
  $wirausaha4 = $lw;
}

if ($input4 == 'input4c'){
  $temp4 = $input4;
  $bahasa4 = $o2b;
  $kemanusiaan4 = $o2k;
  $mapala4 = $o2m;
  $persma4 = $o2p;
  $pramuka4 = $o2pr;
  $senior4 = $o2s;
  $wirausaha4 = $o2w;
}

if ($input4 == 'input4d'){
  $temp4 = $input4;
  $bahasa4 = $s2b;
  $kemanusiaan4 = $s2k;
  $mapala4 = $s2m;
  $persma4 = $s2p;
  $pramuka4 = $s2pr;
  $senior4 = $s2s;
  $wirausaha4 = $s2w;
}

  #===============================
if ($input5 == 'input5a'){
  $temp5 = $input5;
  $bahasa5 = $mnb;
  $kemanusiaan5 = $mnk;
  $mapala5 = $mnm;
  $persma5 = $mnp;
  $pramuka5 = $mnpr;
  $senior5 = $mns;
  $wirausaha5 = $mnw;
}

if ($input5 == 'input5b'){
  $temp5 = $input5;
  $bahasa5 = $mnyb;
  $kemanusiaan5 = $mnyk;
  $mapala5 = $mnym;
  $persma5 = $mnyp;
  $pramuka5 = $mnypr;
  $senior5 = $mnys;
  $wirausaha5 = $mnyw;
}

if ($input5 == 'input5c'){
  $temp5 = $input5;
  $bahasa5 = $mnlsb;
  $kemanusiaan5 = $mnlsk;
  $mapala5 = $mnlsm;
  $persma5 = $mnlsp;
  $pramuka5 = $mnlspr;
  $senior5 = $mnlss;
  $wirausaha5 = $mnlsw;
}

if ($input5 == 'input5d'){
  $temp5 = $input5;
  $bahasa5 = $mgbb;
  $kemanusiaan5 = $mgbk;
  $mapala5 = $mgbm;
  $persma5 = $mgbp;
  $pramuka5 = $mgbpr;
  $senior5 = $mgbs;
  $wirausaha5 = $mgbw;
}

if ($input5 == 'input5e'){
  $temp5 = $input5;
  $bahasa5 = $mskb;
  $kemanusiaan5 = $mskk;
  $mapala5 = $mskm;
  $persma5 = $mskp;
  $pramuka5 = $mskpr;
  $senior5 = $msks;
  $wirausaha5 = $mskw;
}

if ($input5 == 'input5f'){
  $temp5 = $input5;
  $bahasa5 = $ftb;
  $kemanusiaan5 = $ftk;
  $mapala5 = $ftm;
  $persma5 = $ftp;
  $pramuka5 = $ftpr;
  $senior5 = $fts;
  $wirausaha5 = $ftw;
}

if ($input5 == 'input5g'){
  $temp5 = $input5;
  $bahasa5 = $sbb;
  $kemanusiaan5 = $sbk;
  $mapala5 = $sbm;
  $persma5 = $sbp;
  $pramuka5 = $sbpr;
  $senior5 = $sbs;
  $wirausaha5 = $sbw;
}

if ($input5 == 'input5h'){
  $temp5 = $input5;
  $bahasa5 = $btb;
  $kemanusiaan5 = $btk;
  $mapala5 = $btm;
  $persma5 = $btp;
  $pramuka5 = $btpr;
  $senior5 = $bts;
  $wirausaha5 = $btw;
}

if ($input5 == 'input5i'){
  $temp5 = $input5;
  $bahasa5 = $bsb;
  $kemanusiaan5 = $bsk;
  $mapala5 = $bsm;
  $persma5 = $bsp;
  $pramuka5 = $bspr;
  $senior5 = $bss;
  $wirausaha5 = $bsw;
}

if ($input5 == 'input5j'){
  $temp5 = $input5;
  $bahasa5 = $fsb;
  $kemanusiaan5 = $fsk;
  $mapala5 = $fsm;
  $persma5 = $fsp;
  $pramuka5 = $fspr;
  $senior5 = $fss;
  $wirausaha5 = $fsw;
}

if ($input5 == 'input5k'){
  $temp5 = $input5;
  $bahasa5 = $vlb;
  $kemanusiaan5 = $vlk;
  $mapala5 = $vlm;
  $persma5 = $vlp;
  $pramuka5 = $vlpr;
  $senior5 = $vls;
  $wirausaha5 = $vlw;
}

if ($input5 == 'input5l'){
  $temp5 = $input5;
  $bahasa5 = $bmb;
  $kemanusiaan5 = $bmk;
  $mapala5 = $bmm;
  $persma5 = $bmp;
  $pramuka5 = $bmpr;
  $senior5 = $bms;
  $wirausaha5 = $bmw;
}

if ($input5 == 'input5m'){
  $temp5 = $input5;
  $bahasa5 = $o3b;
  $kemanusiaan5 = $o3k;
  $mapala5 = $o3m;
  $persma5 = $o3p;
  $pramuka5 = $o3pr;
  $senior5 = $o3s;
  $wirausaha5 = $o3w;
}

if ($input5 == 'input5n'){
  $temp5 = $input5;
  $bahasa5 = $mbcb;
  $kemanusiaan5 = $mbck;
  $mapala5 = $mbcm;
  $persma5 = $mbcp;
  $pramuka5 = $mbcpr;
  $senior5 = $mbcs;
  $wirausaha5 = $mbcw;
}

if ($input5 == 'input5o'){
  $temp5 = $input5;
  $bahasa5 = $brmb;
  $kemanusiaan5 = $brmk;
  $mapala5 = $brmm;
  $persma5 = $brmp;
  $pramuka5 = $brmpr;
  $senior5 = $brms;
  $wirausaha5 = $brmw;
}

if ($input5 == 'input5p'){
  $temp5 = $input5;
  $bahasa5 = $dmb;
  $kemanusiaan5 = $dmk;
  $mapala5 = $dmm;
  $persma5 = $dmp;
  $pramuka5 = $dmpr;
  $senior5 = $dms;
  $wirausaha5 = $dmw;
}

if ($input5 == 'input5q'){
  $temp5 = $input5;
  $bahasa5 = $nb;
  $kemanusiaan5 = $nk;
  $mapala5 = $nm;
  $persma5 = $np;
  $pramuka5 = $npr;
  $senior5 = $ns;
  $wirausaha5 = $nw;
}

if ($input5 == 'input5r'){
  $temp5 = $input5;
  $bahasa5 = $mgb;
  $kemanusiaan5 = $mgk;
  $mapala5 = $mgm;
  $persma5 = $mgp;
  $pramuka5 = $mgpr;
  $senior5 = $mgs;
  $wirausaha5 = $mgw;
}

if ($input5 == 'input5s'){
  $temp5 = $input5;
  $bahasa5 = $jjb;
  $kemanusiaan5 = $jjk;
  $mapala5 = $jjm;
  $persma5 = $jjp;
  $pramuka5 = $jjpr;
  $senior5 = $jjs;
  $wirausaha5 = $jjw;
}

if ($input5 == 'input5t'){
  $temp5 = $input5;
  $bahasa5 = $bbabb;
  $kemanusiaan5 = $bbabk;
  $mapala5 = $bbabm;
  $persma5 = $bbabp;
  $pramuka5 = $bbabpr;
  $senior5 = $bbabs;
  $wirausaha5 = $bbabw;
}

if ($input5 == 'input5u'){
  $temp5 = $input5;
  $bahasa5 = $mlsb;
  $kemanusiaan5 = $mlsk;
  $mapala5 = $mlsm;
  $persma5 = $mlsp;
  $pramuka5 = $mlspr;
  $senior5 = $mlss;
  $wirausaha5 = $mlsw;
}

if ($input5 == 'input5v'){
  $temp5 = $input5;
  $bahasa5 = $brnb;
  $kemanusiaan5 = $brnk;
  $mapala5 = $brnm;
  $persma5 = $brnp;
  $pramuka5 = $brnpr;
  $senior5 = $brns;
  $wirausaha5 = $brnw;
}

if ($input5 == 'input5w'){
  $temp5 = $input5;
  $bahasa5 = $ngb;
  $kemanusiaan5 = $ngk;
  $mapala5 = $ngm;
  $persma5 = $ngp;
  $pramuka5 = $ngpr;
  $senior5 = $ngs;
  $wirausaha5 = $ngw;
}

if ($input5 == 'input5x'){
  $temp5 = $input5;
  $bahasa5 = $trb;
  $kemanusiaan5 = $trk;
  $mapala5 = $trm;
  $persma5 = $trp;
  $pramuka5 = $trpr;
  $senior5 = $trs;
  $wirausaha5 = $trw;
}

if ($input5 == 'input5y'){
  $temp5 = $input5;
  $bahasa5 = $dgb;
  $kemanusiaan5 = $dgk;
  $mapala5 = $dgm;
  $persma5 = $dgp;
  $pramuka5 = $dgpr;
  $senior5 = $dgs;
  $wirausaha5 = $dgw;
}

$total_bahasa = $bahasa1 * $bahasa2 * $bahasa3 * $bahasa4 * $bahasa5 * $prob_bahasa;
$total_kemanusiaan = $kemanusiaan1 * $kemanusiaan2 * $kemanusiaan3 * $kemanusiaan4 * $kemanusiaan5 * $prob_kemanusiaan;
$total_mapala = $mapala1 * $mapala2 * $mapala3 * $mapala4 * $mapala5 * $prob_mapala;
$total_persma = $persma1 * $persma2 * $persma3 * $persma4 * $persma5 * $prob_persma;
$total_pramuka = $pramuka1 * $pramuka2 * $pramuka3 * $pramuka4 * $pramuka5 * $prob_pramuka;
$total_senior = $senior1 * $senior2 * $senior3 * $senior4 * $senior5 * $prob_senior;
$total_wirausaha = $wirausaha1 * $wirausaha2 * $wirausaha3 * $wirausaha4 * $wirausaha5 * $prob_wirausaha;

echo "Hasil Probabilitas UKM ( P[ Bahasa ] ) : <br>
$bahasa1 * $bahasa2 * $bahasa3 * $bahasa4 * $bahasa5 * $prob_bahasa = $total_bahasa".'<br/>'.'<br/>';

echo "Hasil Probabilitas UKM ( P[ Kemanusiaan ] ) : <br>
$kemanusiaan1 * $kemanusiaan2 * $kemanusiaan3 * $kemanusiaan4 * $kemanusiaan5 * $prob_kemanusiaan = $total_kemanusiaan".'<br/>'.'<br/>';

echo "Hasil Probabilitas UKM ( P[ MAPALA ] ) : <br> 
$mapala1 * $mapala2 * $mapala3 * $mapala4 * $mapala5 * $prob_mapala = $total_mapala".'<br/>'.'<br/>';

echo "Hasil Probabilitas UKM ( P[ Persma ] ) : <br> 
$persma1 * $persma2 * $persma3 * $persma4 * $persma5 * $prob_persma = $total_persma".'<br/>'.'<br/>';

echo "Hasil Probabilitas UKM ( P[ Pramuka ] ) : <br> 
$pramuka1 * $pramuka1 * $pramuka2 * $pramuka3 * $pramuka4 * $pramuka5 * $prob_pramuka = $total_pramuka".'<br/>'.'<br/>';

echo "Hasil Probabilitas UKM ( P[ SENIOR ] ) : <br> 
$senior1 * $senior2 * $senior3 * $senior4 * $senior5 * $prob_senior = $total_senior".'<br/>'.'<br/>';

echo "Hasil Probabilitas UKM ( P[ Wirausaha ] ) : <br> 
$wirausaha1 * $wirausaha2 * $wirausaha3 * $wirausaha4 * $wirausaha5 * $prob_wirausaha = $total_wirausaha".'<br/>'.'<br/>';

if ($total_bahasa > $total_kemanusiaan) {
echo "Jadi Probabilitas UKM direkomendasikan '.<b><u>Bahasa.'";
}
elseif ($total_kemanusiaan > $total_mapala) {
echo "Jadi Probabilitas UKM direkomendasikan '.<b><u>Kemanusiaan (ksr, humaniora).'";
}
elseif ($total_mapala > $total_persma) {
echo "Jadi Probabilitas UKM direkomendasikan '.<b><u>Pecinta Alam (MAPALA).'";
}
elseif ($total_persma > $total_pramuka) {
echo "Jadi Probabilitas UKM direkomendasikan '.<b><u>Persma.'";
}
elseif ($total_pramuka > $total_senior) {
echo "Jadi Probabilitas UKM direkomendasikan '.<b><u>Pramuka.'";
}
elseif ($total_senior > $total_wirausaha) {
echo "Jadi Probabilitas UKM direkomendasikan '.<b><u>SENIOR (senior, bola, karate, taekwondo).'";
}
else
  echo "Jadi Probabilitas UKM direkomendasikan '.<b><u>Wirausaha.'";

?>
