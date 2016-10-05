<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Semua pesan oleh <?php echo $this->session->userdata('username'); ?></title>
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
           <h1 class="h1beranda">Semua Rute</h1>
            <hr class="garis">
             <?php
                 if ($rute) { foreach ($rute as $row) {
                //foreach($pesan as $row):
             ?>
            <div class="kotakadmin">
                <p>
                    <a href="<?php echo site_url('rute/perbaharui/' . $row['id_rute']); ?>">Perbaharui</a>
                    <a href="<?php echo site_url('rute/hapus/' . $row['id_rute']); ?>">Hapus</a>

                     <?php echo  $row['nama_rute']; ?>
                </p>
            </div>


                 <?php  }
                        }

                        else {
                                echo '<p>Anda belum mempunyai satupun pesan.</p>';
                        }
                ?>

                <p><?php echo $links;?></p>

                 <p class="tambah_pesan"><a href="<?php echo site_url('/admin_beranda'); ?>">Halaman Admin</a></p>

        </div><!--Akhir dari sisianggota -->
            <div id="footer">
                <div id="dalamfooter">
                    <p>Dibuat Oleh: Job Sofaar - 06/193308/PA/10909
                </div>
            </div>
    </body>
</html>