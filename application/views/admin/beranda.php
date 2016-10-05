<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Halaman Admin</title>
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

        <h1 class="h1beranda">Selamat datang, '<?php echo $this->session->userdata('username'); ?>'.</h1>
         <div id="dalam_beranda">
                <ul id="beranda_link" class="horizontal_list">
                    <li><a href="<?php echo site_url('/pesan/tambah'); ?>">Tambah Pesan</a></li>
                    <li><?php echo anchor('sip_anggota/logout', 'Logout', array('onclick' => "return confirm('Anda yakin logout?')"));?></li>
                </ul>
            </div><!-- Akrhi dari dalam beranda -->
          <hr class="garis">
        

      
           <?php
                    if ($isi_provinsi) { foreach ($isi_provinsi as $row) {
                ?>
                 <div class="kotakadmin">                      
                       <h2>Provinsi: <?php echo $row->nama_provinsi; ?></h2>
                        <p>
                            <a class="update" href="<?php echo site_url('provinsi/perbaharui/' . $row->id_provinsi); ?>">Perbaharui</a>
                            <a class="delete" href="<?php echo site_url('provinsi/hapus/' . $row->id_provinsi); ?>">Hapus</a>
                       </p>
                      
                </div>
                     <?php
                            }
                        }
                    else {
                            echo '<p>Belum ada satupun provinsi untuk saat ini.</p>';
                    }
                    ?>
                     <p>
                            <a href="<?php echo site_url('/provinsi/tambah'); ?>">Tambah Provinsi</a>
                       </p>
                  

        <hr class="garis">
        <h1 class="h1beranda">Rute yang tersedia:</h1>
         <?php
                    if ($rute) { foreach ($rute as $row) {
                ?>
                 <div class="kotakadmin">
                    <p>
                        <a class="update" href="<?php echo site_url('rute/perbaharui/' . $row->id_rute); ?>">Perbaharui</a>
                        <a class="delete" href="<?php echo site_url('rute/hapus/' . $row->id_rute); ?>">Hapus</a>
                     <?php echo $row->nama_rute; ?>
                    </p>        
                </div>
                     <?php
                            }
                        }
                    else {
                            echo '<p>Belum ada satupun rute untuk saat ini.</p>';
                    }
                    ?>

                    <p class="tambah_pesan"><a href="<?php echo site_url('/rute/tambah'); ?>">Tambah Rute</a></p>
                    <p class="semua_pesan"><a href="<?php echo site_url('/admin_beranda/semua_rute'); ?>">Lihat Semua Rute</a></p>

                <hr class="garis">
        <h1 class="h1beranda"> Anggota terbaru yang terdaftar</h1>
             <?php
                        if ($anggota) { foreach ($anggota as $row) {
                    ?>
                    <div class="kotakadmin">
                    <p>
                        <a class="update" href="<?php echo site_url('admin_beranda/perbaharui_profil_oleh_admin/' . $row->id_anggota); ?>">Perbaharui</a>
                        <a class="delete" href="<?php echo site_url('admin_beranda/hapus_profil_oleh_admin/' . $row->id_anggota); ?>">Hapus</a>
                        <?php echo $row->username; ?>                         
                    </p>
                    </div>
                     <?php
                            }
                        }

                    else {
                            echo '<p>Belum ada satupun anggota untuk saat ini.</p>';
                    }

                    ?>
                    <p class="semua_pesan"><a href="<?php echo site_url('/admin_beranda/semua_anggota'); ?>">Lihat Semua Anggota</a></p>
         <hr class="garis">
        <h1 class="h1beranda"> Pesan terakhir</h1>
            <?php
                    if ($pesan) { foreach ($pesan as $row) {
                ?>
            <div class="kotakadmin">
                <p>
                    <a class="update" href="<?php echo site_url('admin_beranda/perbaharui_oleh_admin/' . $row->id_pesan); ?>">Perbaharui</a>
                    <a class="delete" href="<?php echo site_url('admin_beranda/hapus_oleh_admin/' . $row->id_pesan); ?>">Hapus</a>

                     <?php echo $row->pengantar; ?>
                </p>
            </div>
                 <?php
                        }
                    }

                else {
                        echo '<p>Belum ada satupun pesan untuk saat ini.</p>';
                }

                ?>
                <p class="semua_pesan"><a href="<?php echo site_url('/admin_beranda/semua_pesan'); ?>">Lihat Semua Pesan</a></p>
                 <hr class="garis">
        <h1 class="h1beranda"> Komentar terakhir</h1>
        <?php
                    if ($komentar) { foreach ($komentar as $row) {
                ?>
                <div class="kotakadmin">
                    <p>
                        <a class="update" href="<?php echo site_url('admin_beranda/perbaharui_komentar/' . $row->id_komentar); ?>">Perbaharui</a>
                        <a class="delete" href="<?php echo site_url('admin_beranda/hapus_komentar_oleh_admin/' . $row->id_komentar); ?>">Hapus</a>

                         <?php echo $row->isi_komentar; ?>
                    </p>
                </div>
                 <?php
                        }
                    }

                else {
                        echo '<p>Belum ada satupun pesan untuk saat ini.</p>';
                }

                ?>

                <p class="semua_pesan"><a href="<?php echo site_url('/admin_beranda/semua_komentar'); ?>">Lihat Semua Komentar</a></p>
                 <hr class="garis">
     </div><!--Akhir dari sisianggota -->
            <div id="footer">
                <div id="dalamfooter">
                    <p>Dibuat Oleh: Job Sofaar - 06/193308/PA/10909
                </div>
            </div>
    </body>
</html>