<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $sitetitle;?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/reset.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
        <!-- TinyMCE -->
<script type="text/javascript" src="<?php echo base_url(); ?>tinymce/jscripts/tiny_mce/tiny_mce.js"></script>


<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",                
//                plugins: "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
//		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
//		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
//		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
//		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "sipcms",
			staffid : "2374892"
		}
	});
	
</script>
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
                
                    <h1>Tambah pesan</h1>
                    <hr class="garis">
                    <div id="tambah_pesan">
                            <?php echo form_open('pesan/tambah/'.$this->uri->segment(3)) ?>
                            <?php
								//get data provinsi
								$list_provinsi[''] = 'Pilih Provinsi...';
								foreach($dataprov as $prov):
									$list_provinsi[base_url().$this->uri->segment(1).'/tambah/'.$prov->id_provinsi] = $prov->nama_provinsi;
								endforeach;
								
								$js = 'onChange="document.location.href=this.options[this.selectedIndex].value;"';
								$curr_url = reduce_double_slashes(base_url().$this->uri->ruri_string());
								
								//get data pesan
                                $rute_pesan[''] = 'Pilih Rute...';
                                        foreach ($rute as $row) {
                                        $rute_pesan[$row['id_rute']] = $row['nama_rute'];
                                		}

                                $type_options = array(
													  	''	=> 'Pilih Tingkat Layanan...',
                                                        'Tingkat Pelayanan A' => 'Tingkat Pelayanan A',
                                                        'Tingkat Pelayanan B' => 'Tingkat Pelayanan B',
                                                        'Tingkat Pelayanan C' => 'Tingkat Pelayanan C',
                                                        'Tingkat Pelayanan D' => 'Tingkat Pelayanan D',
                                                        'Tingkat Pelayanan E' => 'Tingkat Pelayanan E',
                                                        'Tingkat Pelayanan F' => 'Tingkat Pelayanan F',
                                                        'Informasi Lainnya' => 'Informasi Lainnya'
                                                     );
                            ?>
                            	<h2>Rute: </h2>
                                <?php echo form_error('provinsi', '<span class="error">', '</span>'); ?>
                                <p><?php echo form_dropdown('provinsi', $list_provinsi, $curr_url, $js); ?></p><br />
                                
                                <h2>Rute: </h2>
                                <?php echo form_error('rute_pesan', '<span class="error">', '</span>'); ?>
                                <p><?php echo form_dropdown('rute_pesan', $rute_pesan); ?></p><br />
                                
                                <h2>Tingkat Pelayanan:</h2>
                                <?php echo form_error('status', '<span class="error">', '</span>'); ?>
                                <p><?php echo form_dropdown('status', $type_options); ?></p><br />
                                
                                <h2>Pengantar:</h2>
                                <?php echo form_error('pengantar', '<span class="error">', '</span>'); ?>          
                                <p><input type="text" name="pengantar" style="width:619px;" value="<?php echo set_value('pengantar');?>" /></p><br />
                                <h2>Isi Pesan:</h2>
                                <?php echo form_error('isi', '<span class="error">', '</span>'); ?>
                                <p><textarea name="isi" rows="15" cols="75"><?php echo set_value('isi');?></textarea></p>
                                <input type="submit" value="Tambah" />
                            <?php echo form_close(); ?>
                        </div>
                    </div><!--Akhir dari sisi anggota -->
                 <div id="footer">
                    <div id="dalamfooter">
                        <p>Dibuat Oleh: Job Sofaar - 06/193308/PA/10909
                    </div>
                </div>
</body>
</html>