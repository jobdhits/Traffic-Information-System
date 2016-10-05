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
            <h1 class="h1beranda">Masuk Ke Sistem</h1>
            <h1 class="h1beranda">Administrator</h1>
            <?php
                    $attributes = array('name' => 'login_form', 'id' => 'login_form');
                    echo form_open('sip_admin/proses_login', $attributes);
            ?>

                    <?php
                            $message = $this->session->flashdata('message');
                            echo $message == '' ? '' : '<p id="message">' . $message . '</p>';
                    ?>

                    <p>
                            <label for="username">Username:</label>
                            <input type="text" name="username" size="20" class="form_field" value="<?php echo set_value('username');?>"/>
                    </p>
                    <?php echo form_error('username', '<p class="field_error">', '</p>');?>

                    <p>
                            <label for="password">Password:</label>
                            <input type="password" name="password" size="20" class="form_field" value="<?php echo set_value('password');?>"/>
                    </p>
                    <?php echo form_error('password', '<p class="field_error">', '</p>');?>

                    <p>
                            <input type="submit" name="submit" id="submit" value="Login" />
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