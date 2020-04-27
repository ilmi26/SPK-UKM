<?php 

require 'db/database.php'; 
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-file"></span> Data UKM</h3>
                </div>

<div class="panel panel-primary filterable">
    <div class="panel-heading">
        <div class="row">
        <div id="main" class="col-sm-12 col-md-12">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <?php
                    $db_object = new database();
                    $sql = "SELECT *FROM tb_data_ukm";
                    $query = $db_object->db_query($sql);
                     while ($data = $db_object->db_fetch_array($query)) 
            {

                        echo '<h4 class="box-title">'.$data['nama_ukm'].'</h4>
                    </div>
                  
    
            <div class="box-body">
                <div class="pull-left image">
                    <img src="images/'.$data['foto'].'" style="height: 150px; width: 150px; border-radius: 100px">
                </div>
                <div class="col-sm-12 invoice-col">
                    <span style="padding-left:5em"><p>'.$data['about'].'</p></span>
                    <a href="?page=ukm&actions=detail&id='.$data['id'].'"class="btn btn-default btn-xs btn-baru"><span style="padding-left:0.1em"></span>Lihat Selengkapnya</a>';

                     }?>

                </div>

               
            </div>

            <!-- /.box-body -->
          </div>
         

