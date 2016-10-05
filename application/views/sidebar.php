	<p class="addlisting"><a href="<?php echo site_url('/pesan/tambah'); ?>">Tambah Pesan</a></p><br /> 
        <h2>Provinsi</h2>
        <?php
			if ($isi_provinsi) {
				$list_provinsi['0'] = 'Pilih Provinsi...';
				foreach ($isi_provinsi as $row) {          
					//$list_provinsi[base_url().'sip/provinsi/'.$row['id_provinsi']] = $row['nama_provinsi'];
					$list_provinsi[$row['id_provinsi']] = $row['nama_provinsi'];
				}
				
				//$attr = 'onChange="document.location.href = this.options[this.selectedIndex].value;" style="width:260px;"';
				$attr = 'onChange="this.form.submit();" style="width:260px;"';
				$current_prov = $this->session->userdata('idprov');
				echo form_open('sip/set_session');
				echo form_dropdown('provinsi', $list_provinsi, $current_prov, $attr);
				echo form_close();
			}
		?>

	<h2>Rute</h2>
    <ul>
    <?php
	if($this->uri->segment(2) == 'provinsi'){

		if ($rute_pesan) {
			foreach ($rute_pesan as $row) {
				$segments = array('sip', 'provinsi', $this->uri->segment(3),$row['id_rute']);
		?>
		<li><a href="<?php echo site_url($segments); ?>"><span>&raquo;</span> <?php echo $row['nama_rute']; ?></a></li>
    <?php
			}
        }
	}
	else
	{
	?>
		<li><a href="<?php echo site_url('sip/konten/'); ?>"><span>»</span> Menyeluruh</a></li>
		<?php
		if ($rute_pesan) {
			foreach ($rute_pesan as $row) {
				$segments = array('sip', 'konten', $row['id_rute']);
		?>
		<li><a href="<?php echo site_url($segments); ?>"><span>&raquo;</span> <?php echo $row['nama_rute']; ?></a></li>
    <?php
			}
        }
	}
	?>
    </ul>
