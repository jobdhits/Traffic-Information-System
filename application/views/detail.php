<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $detail['pengantar']; ?></title>

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
                        if ($detail) {
                                ?>
                                
                <?php
                    $waktu = $detail['waktu'];
                    $sekarang = time();
                ?>
                <div id="kotakatas">
                    <div id="rute">
                        <p><?php echo $detail['nama_rute']; ?></p>
                    </div>
                    <div id="status">
                        <p><?php echo $detail['status']; ?></p>
                    </div>
                    <div id="waktu">
                        <p><?php echo $this->timeword->convert($waktu, $sekarang); ?> yang lalu</p>
                            </div>
                </div><!-- akhir dari kotak atas -->
                        <h2 class="pengantar_detail"><?php echo $detail['pengantar']; ?> </h2>
                        <p class="isidetail"><?php echo $detail['isi']; ?> </p>
                        <p class="oleh">Oleh: <?php echo $detail['penulis']; ?> </p>

                        <?php }
                            else {
                             echo '<p>Pesan tidak dapat ditampilkan</p>';
                            }
                        ?>
                         <hr class="garis" />
            
                         <?php
                            if ($komen) { foreach ($komen as $row) {
                        ?>
                         <div id="komentar">
                            <?php
                                $waktu = $row['waktu_komen'];
                                $sekarang = time();
                                ?>
                            <p><cite class="oleh"><?php echo $row['komentator'] . ' '; ?></cite><?php echo $this->timeword->convert($waktu, $sekarang); ?> yang lalu mengatakan: <?php echo $row['isi_komentar']; ?></p>
                         </div>
                          <?php }
                            }

                            else {
                                    echo '<p>Belum ada komentar.</p>';
                            }

                            ?>


                         <p class="berikankomen">Berikan Komentar:</p>
                             <?php echo form_open('anggota_beranda/kirim_komentar/') ?>
                                    <?php echo form_error('isi_komentar', '<span class="error">', '</span>'); ?>
                                    <p><textarea name="isi_komentar" rows="15" cols="65"><?php echo set_value('isi_komentar');?></textarea></p>
                                    <input type="hidden" name="id_pesan" value="<?php echo $detail['id_pesan']; ?>" />
                                    <input type="submit" value="Kirim Komentar" />
                             <?php echo form_close(); ?>
            </div>

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
        </div>
    </body>
</html>