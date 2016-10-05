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
             <h1 class="h1beranda">Semua Komentar</h1>
                <hr class="garis">
                    <?php
                         if ($komentar) { foreach ($komentar as $row) {
                        //foreach($komentar as $row):
                    ?>
                      <div id="kotaktengahanggota">
                          <div id="waktukomenanggota">
                            <?php
                                $waktu = $row['waktu_komen'];
                                $sekarang = time();
                            ?>
                            <p>
                                    <?php echo $this->timeword->convert($waktu, $sekarang); ?> yang lalu
                           </p>
                        </div>
                          <div id="pesanterkomentari">
                            <p><a href="<?php echo site_url('sip/detail/' . $row['id_pesan_komentar']); ?>">Lihat pesan terkomentari</a></p>
                        </div>

                 </div>
                 <div>
                        <p><?php echo $row['isi_komentar']?></p>
                </div>

                             

                   <?php }
                        }

                        else {
                                echo '<p>Anda belum mempunyai satupun komentar.</p>';
                        }
                ?>

                <p><?php echo $links;?></p>

                 <p class="tambah_pesan"><a href="<?php echo site_url('/anggota_beranda'); ?>">Halaman Anggota</a></p>
        
        </div><!--Akhir dari sisianggota -->
            <div id="footer">
                <div id="dalamfooter">
                    <p>Dibuat Oleh: Job Sofaar - 06/193308/PA/10909
                </div>
            </div>
    </body>
</html>