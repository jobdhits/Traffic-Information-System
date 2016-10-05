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

            <h1 class="h1beranda">Selamat datang, <?php echo $this->session->userdata('username'); ?>.</h1>
            <div id="dalam_beranda">
                <ul id="beranda_link" class="horizontal_list">
                    <li><a href="<?php echo site_url('/pesan/tambah'); ?>">Tambah Pesan</a></li>
                    <li><a href="<?php echo site_url('/anggota_beranda/profil'); ?>">Profil</a></li>
                        <?php   foreach ($profil as $row) { ?>
                    <li><a href="<?php echo site_url('anggota_beranda/perbaharui_password/' . $row->id_anggota); ?>">Perbaharui Password</a></li>
                         <?php } ?>
                    <li><?php echo anchor('sip_anggota/logout', 'Logout', array('onclick' => "return confirm('Anda yakin logout?')"));?></li>
                </ul>
            </div><!-- Akrhi dari dalam beranda -->
            <hr class="garis">
            
            <h1 class="h1beranda"> Pesan terbaru anda</h1>

                 <?php
                    if ($pesan) { foreach ($pesan as $row) {
                ?>
                <div id="kotakatasanggota">
                    <div id="ruteanggota">
                        <p><?php echo $row->nama_rute; ?></p>
                    </div>

                    <div id="statusanggota">
                      <p><?php echo $row->status; ?></p>
                    </div>

                    <div id="waktuanggota">
                        <?php
                            $waktu = $row->waktu;
                            $sekarang = time();
                        ?>
                                 <p><?php echo $this->timeword->convert($waktu, $sekarang); ?> yang lalu</p>
                    </div>
                    <div id="perbaharuianggota">
                        <p><a class="update" href="<?php echo site_url('pesan/perbaharui/' . $row->id_pesan); ?>">Perbaharui</a></p>
                    </div>
                    <div id="hapusanggota">
                        <p><a class="delet" href="<?php echo site_url('pesan/hapus/' . $row->id_pesan); ?>">Hapus</a></p>
                    </div>
                    <div id="pesananggota">
                        <p><a href="<?php echo site_url('sip/detail/' . $row->id_pesan); ?>">Lihat</a></p>
                    </div>

                </div>

            <br />

                 <?php }
                }

                else {
                        echo '<p>Anda belum mempunyai satupun pesan.</p>';
                }

                ?>
                <p class="semua_pesan"><a href="<?php echo site_url('/anggota_beranda/semua_pesan'); ?>">Lihat semua pesan</a></p>
                <hr class="garis">

                <h1 class="h1beranda"> Komentar terbaru anda</h1>
                    <?php
                    if ($komen) { foreach ($komen as $row) {
                ?>
                <div id="kotaktengahanggota">
                   
                    <div id="waktukomenanggota">
                        <?php
                            $waktu = $row->waktu_komen;
                            $sekarang = time();
                        ?>
                        <p>
                                <?php echo $this->timeword->convert($waktu, $sekarang); ?> yang lalu
                       </p>
                    </div>
                    <div id="pesanterkomentari">
                        <p><a href="<?php echo site_url('sip/detail/' . $row->id_pesan_komentar); ?>">Lihat pesan terkomentari</a></p>
                    </div>
                   
                 </div>
                 <div>
                        <p><?php echo $row->isi_komentar; ?></p>
                    </div>
                <br />

                     <?php }
                    }

                    else {
                            echo '<p>Anda belum mempunyai satupun komentar.</p>';
                    }

                    ?>
                <p class="semua_pesan"><a href="<?php echo site_url('/anggota_beranda/semua_komentar'); ?>">Lihat semua komentar Anda</a></p>
                <hr class="garis">

               
                    <h1 class="h1beranda"> Komentar terbaru terhadap pesan anda</h1>
                      <?php
                        if ($tanggapan) { foreach ($tanggapan as $row) {
                    ?>
                    <div id="kotakbawahanggota">
                    <?php
                            $waktu = $row->waktu_komen;
                            $sekarang = time();
                        ?>
                        <div id="waktubawahanggotabawah">
                                <?php echo $this->timeword->convert($waktu, $sekarang); ?> yang lalu
                        </div>
                        <div id="pesanterkomentaribawah">
                            <span class="perbaharui"><a href="<?php echo site_url('sip/detail/' . $row->id_pesan_komentar); ?>">Lihat pesan terkomentari</a></span>
                        </div>
                    </div>

                        <div>
                                <p><span class="oleh"><?php echo $row->komentator; ?></span> Mengatakan: <?php echo $row->isi_komentar; ?></p>
                        </div>
                <br />
                 <?php }
                }

                else {
                        echo '<p>Anda belum mempunyai satupun komentar.</p>';
                }

                ?>
                <p class="semua_pesan"><a href="<?php echo site_url('/anggota_beranda/semua_tanggapan'); ?>">Lihat semua komentar terhadap pesan anda</a></p>
                 <hr class="garis">
            </div><!--Akhir dari sisianggota -->
            <div id="footer">
                <div id="dalamfooter">
                    <p>Dibuat Oleh: Job Sofaar - 06/193308/PA/10909
                </div>
            </div>
    </body>
</html>