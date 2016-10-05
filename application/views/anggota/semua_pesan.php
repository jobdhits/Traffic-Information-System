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
            <h1 class="h1beranda">Semua Pesan</h1>
                <hr class="garis">
             <?php
                 if ($pesan) { foreach ($pesan as $row) {
                //foreach($pesan as $row):
             ?>
            <div id="kotakatasanggota">
                   
                <div id="ruteanggota">
                    <p><?php echo $row['nama_rute'] ?></p>
                </div>
                 <div id="statusanggota">
                      <p><?php echo $row['status']?></p>
                </div>
                 <div id="waktuanggota">
                        <?php
                            $waktu = $row['waktu'];
                            $sekarang = time();
                        ?>
                                 <p><?php echo $this->timeword->convert($waktu, $sekarang); ?> yang lalu</p>
                </div>
                <div id="perbaharuianggota">
                        <p><a href="<?php echo site_url('pesan/perbaharui/' . $row['id_pesan']); ?>">Perbaharui</a></p>
                </div>
                <div id="hapusanggota">
                    <p><a href="<?php echo site_url('pesan/hapus/' . $row['id_pesan']); ?>">Hapus</a></p>
                </div>
                <div id="pesananggota">
                    <p><a href="<?php echo site_url('sip/detail/' . $row['id_pesan']); ?>">Lihat</a></p>
                </div>

                   
            </div>
                 <?php  }
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