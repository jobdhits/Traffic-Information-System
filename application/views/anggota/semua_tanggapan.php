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
                    <?php 
                         if ($tanggapan) { foreach ($tanggapan as $row) {
                        //foreach($tanggapan as $row):
                    ?>
            <div id="kotakbawahanggota">
                    <div id="waktubawahanggotabawah">
                         <?php
                            $waktu = $row['waktu_komen'];
                            $sekarang = time();
                        ?>
                                <?php echo $this->timeword->convert($waktu, $sekarang); ?> yang lalu
                        </div>
                        <div id="pesanterkomentaribawah">
                            <span class="perbaharui"><a href="<?php echo site_url('sip/detail/' . $row['id_pesan_komentar']); ?>">Lihat pesan terkomentari</a></span>
                        </div>
                    </div>
                    <div>
                            <p><span class="oleh"><?php echo $row['komentator']; ?></span> Mengatakan: <?php echo $row['isi_komentar']; ?></p>
                    </div>
                

                    <?php }
                        }

                        else {
                                echo '<p>Anda belum mempunyai satupun tanggapan.</p>';
                        }
                ?>

                <p><?php echo $links;?></p>

                 <p class="tambah_pesan"><a href="<?php echo site_url('/anggota_beranda'); ?>">Halaman Anggota</a></p>
             </div>
        </div><!--Akhir dari sisianggota -->
            <div id="footer">
                <div id="dalamfooter">
                    <p>Dibuat Oleh: Job Sofaar - 06/193308/PA/10909
                </div>
            </div>
    </body>
</html>