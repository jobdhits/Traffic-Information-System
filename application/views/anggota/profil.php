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
                <h1 class="h1beranda">Profil Anda</h1>
                <?php   foreach ($profil as $row) { ?>
                <div id="kotak_profil">
                    <div id="username"><p>Username: </p></div>           <div id="username_kiri"><p><?php echo $row->username; ?></p></div>
                    <div id="nama_awal"><p>Nama Awal: </p></div>          <div id="nama_awal_kiri"><p><?php echo $row->namaawal; ?></p></div>
                    <div id="nama_akhir"><p>Nama Akhir : </p></div>        <div id="nama_akhir_kiri"><p><?php echo $row->namaakhir; ?></p></div>
                    <div id="email"><p>Email Terdaftar : </p></div>   <div id="email_kiri"><p><?php echo $row->email; ?></p></div>
                    <p><a href="<?php echo site_url('anggota_beranda/perbaharui_profil/' . $row->id_anggota); ?>">Perbaharui</a></p>
                <?php } ?>
                </div>
    </div><!--Akhir dari sisianggota -->
            <div id="footer">
                <div id="dalamfooter">
                    <p>Dibuat Oleh: Job Sofaar - 06/193308/PA/10909
                </div>
            </div>
    </body>
</html>