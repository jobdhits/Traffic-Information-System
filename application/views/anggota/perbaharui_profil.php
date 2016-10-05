<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $sitetitle;?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/reset.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
    </head>
    <body>

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

                echo form_open('anggota_beranda/perbaharui_profil/'.$rows->id_anggota); ?>

                <p style="margin-bottom: 10px;">Username : <?php echo $rows->username;?></p>
                <?php echo form_error('username', '<span class="error">', '</span>'); ?>
                <p>Nama Awal : <input type="text" name="nama_awal" value="<?php echo $rows->namaawal;?>" /></p>
                <?php echo form_error('nama_awal', '<span class="error">', '</span>'); ?>
                <p>Nama Akhir : <input type="text" name="nama_akhir" value="<?php echo $rows->namaakhir;?>" /></p>
                <?php echo form_error('nama_akhir', '<span class="error">', '</span>'); ?>
                <p>Email : <input type="text" name="email" value="<?php echo $rows->email;?>" /></p>
                <?php endif;?>

                <input type="submit" value="Perbaharui" />

                
    </div><!--Akhir dari sisianggota -->
            <div id="footer">
                <div id="dalamfooter">
                    <p>Dibuat Oleh: Job Sofaar - 06/193308/PA/10909
                </div>
            </div>
    </body>
</html>