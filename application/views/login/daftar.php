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
            <div id="login_form">
                <fieldset>
                        <legend>Informasi Pribadi</legend>
                            <?php
                                    $message = $this->session->flashdata('message');
                                    echo $message == '' ? '' : '<p id="message">' . $message . '</p>';
                                    echo form_open('sip_anggota/daftar');
                            ?>
                            <p>
                                <label for="namaawal">Nama Depan:</label>
                                <input type="text" name="namaawal" size="20" class="form_field" value="<?php echo set_value('namaawal');?>"/>
                                <?php echo form_error('namaawal', '<p class="field_error">', '</p>');?>
                            </p>
                            <p>
                                <label for="namaakhir">Nama Belakang:</label>
                                <input type="text" name="namaakhir" size="20" class="form_field" value="<?php echo set_value('namaakhir');?>"/>
                                <?php echo form_error('namaakhir', '<p class="field_error">', '</p>');?>
                            </p>
                             <p>
                                <label for="tempat_lahir">Tempat Lahir:</label>
                                <input type="text" name="tempat_lahir" size="20" class="form_field" value="<?php echo set_value('tempat_lahir');?>"/>
                                <?php echo form_error('tempat_lahir', '<p class="field_error">', '</p>');?>
                            </p>
                            <p>
                                <label for="tanggal_lahir">Tanggal Lahir(YYYY-MM-DD):</label>
                                <input type="text" name="tanggal_lahir" size="20" class="form_field" value="<?php echo set_value('tanggal_lahir');?>"/>
                                <?php echo form_error('tanggal_lahir', '<p class="field_error">', '</p>');?>
                            </p>
                            <p>
                                <label for="email">Alamat Email:</label>
                                <input type="text" name="email" size="20" class="form_field" value="<?php echo set_value('email');?>"/>
                                <?php echo form_error('email', '<p class="field_error">', '</p>');?>
                            </p>
                           

                 </fieldset>



                 <fieldset>
                        <legend>Informasi Login</legend>
                            <p>
                                <label for="username">Username:</label>
                                <input type="text" name="username" size="20" class="form_field" value="<?php echo set_value('username');?>"/>
                                 <?php echo form_error('username', '<p class="field_error">', '</p>');?>
                            </p>
                            <p>
                                <label for="password">Password:</label>
                                <input type="password" name="password" size="20" class="form_field" value="<?php echo set_value('password');?>"/>
                                <?php echo form_error('password', '<p class="field_error">', '</p>');?>
                            </p>
                            <p>
                                <label for="password2">Konfirmasi Password:</label>
                                <input type="password" name="password2" size="20" class="form_field" value="<?php echo set_value('password2');?>"/>
                                <?php echo form_error('password2', '<p class="field_error">', '</p>');?>
                            </p>

					</fieldset>
					<fieldset>
                        <legend>Kode Keamanan</legend>
                            <p>
                                <?php echo $captcha?>
                                <input type="text" name="captcha" size="20" class="form_field"/>
                                 <?php echo form_error('captcha', '<p class="field_error">', '</p>');?>
                            </p>

					</fieldset>
             <p>Perhatian, semua field wajib diisi.</p><br />             
            <p>
                <input type="submit" name="Buat Akun" id="Buat Akun" value="Buat Akun" />
            </p>
            </div>
            </div><!--Akhir dari sisianggota -->
            <div id="footer">
                <div id="dalamfooter">
                    <p>Dibuat Oleh: Job Sofaar - 06/193308/PA/10909
                </div>
            </div>
    </body>
</html>