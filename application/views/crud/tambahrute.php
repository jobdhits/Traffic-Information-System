<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $sitetitle;?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/reset.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
    </head>
    <body>

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
                    <h1>Tambah Rute</h1><br /><br />

             <?php echo form_open('rute/tambah/'.$this->uri->segment(3)) ?>
						<?php
						
							//get data provinsi
							$list_provinsi[''] = 'Pilih Provinsi';
							foreach($dataprov as $prov):
								$list_provinsi[base_url().$this->uri->segment(1).'/tambah/'.$prov->id_provinsi] = $prov->nama_provinsi;
							endforeach;
							
							$js = 'onChange="document.location.href=this.options[this.selectedIndex].value;"';
							$curr_url = reduce_double_slashes(base_url().$this->uri->ruri_string());
								
						?>
         				<?php echo form_dropdown('provinsi', $list_provinsi, $curr_url, $js); ?><br />
                        <?php echo form_error('provinsi', '<span class="error">', '</span><br />'); ?><br />
                        <input type="text" name="nama_rute" value="<?php echo set_value('nama_rute');?>" style="margin-bottom:2px;" />
                         <?php echo form_error('nama_rute', '<span class="error">', '</span><br /><br />'); ?><br /><br />

                        <input type="submit" value="Tambah" />
             
                   <?php echo form_close(); ?>

                    </div><!--Akhir dari sisi anggota -->
                 <div id="footer">
                    <div id="dalamfooter">
                        <p>Dibuat Oleh: Job Sofaar - 06/193308/PA/10909
                    </div>
                </div>
</body>
</html>