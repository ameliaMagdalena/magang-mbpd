<tbody>
	<?php 
		$no = 1;
		foreach($perencanaan_hari_ini as $phi){?>
		<tr>
			<td style="text-align: center;vertical-align: middle;">
				<?= $no ?>
			</td>
			<td style="text-align: center;vertical-align: middle;">
				<!-- memiliki ukuran & warna -->
				<?php if($phi->keterangan == 0){
					$ukuran_tam = "";
					$warna_tam  = "";
					foreach($ukuran as $u){
						if($u->id_ukuran_produk == $phi->id_ukuran_produk){
							$ukuran_tam = $u->ukuran_produk." ".$u->satuan_ukuran;
						}
					}
					
					foreach($warna as $w){
						if($w->id_warna == $phi->id_warna){
							$warna_tam = $w->nama_warna;
						}
					}
				?>
					<?= $phi->nama_produk ?> <?= $ukuran_tam?> (<?= $warna_tam;?>)
				<!-- memiliki ukuran -->
				<?php } else if($phi->keterangan == 1){
					$ukuran_tam = "";
					
					foreach($ukuran as $u){
						if($u->id_ukuran_produk == $phi->id_ukuran_produk){
							$ukuran_tam = $u->ukuran_produk ." ".$u->satuan_ukuran;
						}
					}
				?>
					<?= $phi->nama_produk ?> <?= $ukuran_tam?>
				<?php } else if($phi->keterangan == 2){
					$warna_tam = "";

					foreach($warna as $w){
						if($w->id_warna == $phi->id_warna){
							$warna_tam = $w->nama_warna;
						}
					}
				?>
					<?= $phi->nama_produk ?> (<?= $warna_tam;?>)
				<?php } else{?>
					<?= $phi->nama_produk ?>
				<?php } ?>
			</td>
			<td style="text-align: center;vertical-align: middle;">
				<?= $phi->jumlah_item_perencanaan ?>
			</td>
			<td style="text-align: center;vertical-align: middle;">
				Pcs
			</td>
		</tr>
	<?php $no++; } ?>
</tbody>