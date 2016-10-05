<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $sitetitle;?></title>
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
            <div id="sisikiri">
                            <?php
                                if ($konten) { foreach ($konten as $row) {
                            ?>
                <div id="kotakatas">
                          <?php $segments = array ('sip', 'detail', $row->id_pesan); ?>
                    <div id="rute">
                          <p><span class="status"><?php echo $row->nama_rute; ?></span></p>
                    </div>
                    <div id="status">
                                    <p><span class="status"><?php echo $row->status; ?></span></p>
                    </div>
                    <div id="waktu">
                            <?php
                                    $waktu = $row->waktu;
                                    $sekarang = time();
                            ?>
                                   <p>
                                                <?php echo $this->timeword->convert($waktu, $sekarang); ?> yang lalu
                                   </p>
                    </div>

                </div><!-- akhir dari kotak atas -->
              
                                

                <p class="pengantar"><a href="<?php echo site_url($segments); ?>"><?php echo $row->pengantar; ?></a></p>


                                    
                                <hr class="garis" />


                            <?php }
                            }

                            else {
                                    echo '<h2>Belum ada pesan untuk rute ini</h2>';

                            }

                            ?>
               
            </div><!-- akhir dari sisi kiri -->

            <div id="sisikanan">
                <div id="dalamkanan">
            <?php
                $this->load->view('sidebar');
            ?>
                    </div>
            </div>

            <div id="footer">
                <div id="dalamfooter">
                    <p>Dibuat Oleh: Job Sofaar - 06/193308/PA/10909
                </div>
            </div>
     
    </body>
</html>