<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Halaman Anggota</title>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/reset.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
    </head>
    <body>
         <div id="head">
                <h1><a href="<?php echo site_url(); ?>"><?php echo $sitetitle; ?></a></h1>
        </div><!-- #head -->
        <div id="headernav">
                <div id="dalamnavigasi">
                      <ul id="navigasi">
                                <li><a href="<?php echo base_url(); ?>"; ?>Awal</a></li>
                                <li><a href="<?php echo base_url(); ?>sip_anggota/"; ?>Anggota</a></li>
                                <li><a href="<?php echo base_url(); ?>sip_anggota/daftar"; ?>Mendaftar</a></li>
                      </ul>


                 </div>
        </div>
        <div id="sisianggota">
             <?php
                if($rows!=null):

                echo form_open('rute/perbaharui/'.$rows->id_rute); ?>

                <label for="nama_rute">Perbaharui Rute</label>
                <input type="text" name="nama_rute" value="<?php echo $rows->nama_rute;?>" />

                <input type="submit" value="Perbaharui" />

            <?php endif;?>

        </div><!--Akhir dari sisianggota -->
            <div id="footer">
                <div id="dalamfooter">
                    <p>Dibuat Oleh: Job Sofaar - 06/193308/PA/10909
                </div>
            </div>
    </body>
</html>
