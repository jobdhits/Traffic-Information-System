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
                    <h1>Tambah provinsi</h1>

             <?php echo form_open('provinsi/tambah/') ?>
         
                        <?php echo form_error('nama_provinsi', '<span class="error">', '</span>'); ?><br />
                        <input type="text" name="nama_provinsi" value="<?php echo set_value('nama_provinsi');?>" />

                        <input type="submit" value="Tambah" />
             
                   <?php echo form_close(); ?>

                    </div><!--Akhir dari sisi anggota -->
                 <div id="footer">
                    <div id="dalamfooter">
                        <p>Dibuat Oleh: Job Sofaar - 06/193308/PA/10909
                    </div>
                </div>
</body>
</html>