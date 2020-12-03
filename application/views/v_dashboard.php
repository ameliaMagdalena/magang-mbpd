<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Dashboard</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Dashboard</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->


	<?php  if($_SESSION['nama_departemen'] == "Management" && $_SESSION['nama_jabatan'] == "Direktur"){?>
<!-- DIREKTUR ------------------------------------------------------------------------------------------>





<!-- -->
	<?php } else if($_SESSION['nama_departemen'] == "Management" && $_SESSION['nama_jabatan'] == "Manager"){?>
<!-- MANAGER ------------------------------------------------------------------------------------------>



<!-- -->
	<?php } else if($_SESSION['nama_departemen'] == "Purchasing" && $_SESSION['nama_jabatan'] == "Admin"){?>
<!-- ADMIN PURCHASING ------------------------------------------------------------------------------------------>
		<div class="row">
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- surat jalan -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel panel-featured-left panel-featured-danger">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon" style="background-color:#BE2525">
										<i class="fa  fa-cube"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Surat Jalan</h4>
										<div class="info">
											<strong class="amount"><?= $surat_jalan[0]['jumlah_sj'] ?></strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>suratJalan/semua_surat_jalan">(lihat semua)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- invoice -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel panel-featured-left panel-featured-danger">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon" style="background-color:#670B0B">
										<i class="fa  fa-th-list"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Invoice</h4>
										<div class="info">
											<strong class="amount"><?= $invoice[0]['jumlah_invoice'] ?></strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>hasilProduksi/semua_hasil_produksi">(lihat semua)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
<!-- -->
	<?php } else if($_SESSION['nama_departemen'] == "Research & Development" && $_SESSION['nama_jabatan'] == "Admin"){?>
<!-- ADMIN RISDEV ------------------------------------------------------------------------------------------>
			<div class="col-md-6 col-lg-12 col-xl-6">
				<div class="row">
					<div class="col-md-12 col-lg-6 col-xl-6">
						<section class="panel panel-featured-left panel-featured-danger">
							<div class="panel-body">
								<div class="widget-summary">
									<div class="widget-summary-col widget-summary-col-icon">
										<div class="summary-icon" style="background-color:#BE2525">
											<i class="fa  fa-cube"></i>
										</div>
									</div>
									<div class="widget-summary-col">
										<div class="summary">
											<h4 class="title">Produk</h4>
											<div class="info">
												<strong class="amount"><?= $jumlah_produk[0]['jumlah_produk'] ?></strong>
											</div>
										</div>
										<div class="summary-footer">
											<a class="text-muted text-uppercase" href="<?= base_url()?>produk">(lihat semua)</a>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
					<div class="col-md-12 col-lg-6 col-xl-6">
						<section class="panel panel-featured-left panel-featured-danger">
							<div class="panel-body">
								<div class="widget-summary">
									<div class="widget-summary-col widget-summary-col-icon">
										<div class="summary-icon" style="background-color:#670B0B"> 
											<i class="fa  fa-cubes"></i>
										</div>
									</div>
									<div class="widget-summary-col">
										<div class="summary">
											<h4 class="title">Jenis Produk</h4>
											<div class="info">
												<strong class="amount"><?= $jumlah_jenis_produk[0]['jumlah_jenis_produk'] ?></strong>
											</div>
										</div>
										<div class="summary-footer">
											<a class="text-muted text-uppercase" href="<?= base_url()?>jenisProduk">(lihat semua)</a>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
					<div class="col-md-12 col-lg-6 col-xl-6">
						<section class="panel panel-featured-left panel-featured-danger">
							<div class="panel-body">
								<div class="widget-summary">
									<div class="widget-summary-col widget-summary-col-icon">
										<div class="summary-icon" style="background-color:#670B0B"> 
											<i class="fa   fa-delicious"></i>
										</div>
									</div>
									<div class="widget-summary-col">
										<div class="summary">
											<h4 class="title">Warna Produk</h4>
											<div class="info">
												<strong class="amount"><?= $jumlah_warna[0]['jumlah_warna'] ?></strong>
											</div>
										</div>
										<div class="summary-footer">
											<a class="text-muted text-uppercase" href="<?= base_url()?>warna">(lihat semua)</a>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
					<div class="col-md-12 col-lg-6 col-xl-6">
						<section class="panel panel-featured-left panel-featured-danger">
							<div class="panel-body">
								<div class="widget-summary">
									<div class="widget-summary-col widget-summary-col-icon">
										<div class="summary-icon" style="background-color:#BE2525">
											<i class="fa    fa-arrows-alt"></i>
										</div>
									</div>
									<div class="widget-summary-col">
										<div class="summary">
											<h4 class="title">Ukuran Produk</h4>
											<div class="info">
												<strong class="amount"><?= $jumlah_ukuran_produk[0]['jumlah_ukuran_produk'] ?></strong>
											</div>
										</div>
										<div class="summary-footer">
											<a class="text-muted text-uppercase" href="<?= base_url()?>ukuranProduk">(lihat semua)</a>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
<!-- -->
	<?php } else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PPIC"){?>
<!-- PPIC PRODUKSI ------------------------------------------------------------------------------------------>		
		<div class="row">
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- PO -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel panel-featured-left panel-featured-danger">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon" style="background-color:#BE2525">
										<i class="fa  fa-cube"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Purchase Order Customer</h4>
										<sub>(belum di proses)</sub>
										<div class="info">
											<strong class="amount"><?= $po[0]['jumlah_po'] ?></strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>suratJalan/semua_surat_jalan">(lihat semua)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- kalender 
				<div class="col-md-12 col-lg-6 col-xl-6">
					<?= $first_day ?>
					<section class="panel">
						<div class="panel-body panel-featured-left panel-featured-danger">
							<div class="content">
								<div class="table-responsive">
										<table class="table table-hover mb-none">
											<thead>
												<tr>
													<td colspan="7" style="text-align: center;vertical-align: middle;"><h4><b>
														<?php  if($bulan_now == 1){
																	echo "Januari";
															   } else if($bulan_now == 2){
																   echo "Februari";
															   } else if($bulan_now == 3){
																   echo "Maret";
															   } else if($bulan_now == 4){
																   echo "April"; 
															   } else if($bulan_now == 5){
																   echo "Mei";
															   } else if($bulan_now == 6){
																   echo "Juni";
															   } else if($bulan_now == 7){
																   echo "Juli";
															   } else if($bulan_now == 8){
																   echo "Agustus"; 
															   } else if($bulan_now == 9){
																   echo "September";
															   } else if($bulan_now == 10){
																   echo "Oktober";
															   } else if($bulan_now == 11){
																   echo "November";
															   } else{
																   echo "Desember";
															   }
														?>
														</b></h4>
													</td>	
												</tr>
												<tr>
													<th style="text-align: center;vertical-align: middle;">S</th>
													<th style="text-align: center;vertical-align: middle;">S</th>
													<th style="text-align: center;vertical-align: middle;">R</th>
													<th style="text-align: center;vertical-align: middle;">K</th>
													<th style="text-align: center;vertical-align: middle;">J</th>
													<th style="text-align: center;vertical-align: middle;">S</th>
													<th style="text-align: center;vertical-align: middle;">M</th>
												</tr>
											</thead>
											<tbody>
												
											</tbody>

										</table>
								</div>

								<hr class="dotted short">
								<div class="text-right">
									<a class="text-uppercase text-muted" href="<?= base_url()?>perencanaanProduksi/semua_perencanaan_produksi">(lihat perencanaan)</a>
								</div>
							</div>
						</div>
					</section>
				</div>
				-->
			</div>
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- perencanaan cutting kain -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel">
						<header class="panel-heading panel-heading-transparent">
							<h2 class="panel-title">
								<span class="va-middle">Perencanaan Cutting Kain</span>
							</h2>
						</header>
						<div class="panel-body panel-featured-left panel-featured-danger">
							<div class="content">
								<div class="table-responsive">
										<?php if($jm_cutkain > 0){?>
											<table class="table table-hover mb-none">
												<thead>
													<tr>
														<th style="text-align: center;vertical-align: middle;">#</th>
														<th style="text-align: center;vertical-align: middle;">Nama Produk</th>
														<th style="text-align: center;vertical-align: middle;">Target</th>
														<th style="text-align: center;vertical-align: middle;">Tanggal Produksi</th>
													</tr>
												</thead>
												<tbody>
													<?php 
														$no = 1;
														foreach($cutkain as $p){?>
															<tr>
																<td style="text-align: center;vertical-align: middle;">
																	<?= $no?>
																</td>
																<td style="text-align: center;vertical-align: middle;">
																		<center>
																			<!-- memiliki ukuran & warna -->
																			<?php if($p->keterangan == 0){
																				$ukuran_tam = "";
																				$warna_tam  = "";
																				foreach($ukuran as $u){
																					if($u->id_ukuran_produk == $p->id_ukuran_produk){
																						$ukuran_tam = $u->ukuran_produk." ".$u->satuan_ukuran;
																					}
																				}
																				
																				foreach($warna as $w){
																					if($w->id_warna == $p->id_warna){
																						$warna_tam = $w->nama_warna;
																					}
																				}
																			?>
																				<p id="nama_produk<?= $no ?>">
																					<?= $p->nama_produk ?> <?= $ukuran_tam?> (<?= $warna_tam;?>)
																				</p>
																			<!-- memiliki ukuran -->
																			<?php } else if($p->keterangan == 1){
																				$ukuran_tam = "";
																				
																				foreach($ukuran as $u){
																					if($u->id_ukuran_produk == $p->id_ukuran_produk){
																						$ukuran_tam = $u->ukuran_produk ." ".$u->satuan_ukuran;
																					}
																				}
																			?>
																				<p id="nama_produk<?= $no ?>">
																					<?= $p->nama_produk ?> <?= $ukuran_tam?>
																				</p>
																			<?php } else if($p->keterangan == 2){
																				$warna_tam = "";

																				foreach($warna as $w){
																					if($w->id_warna == $p->id_warna){
																						$warna_tam = $w->nama_warna;
																					}
																				}
																			?>
																				<p id="nama_produk<?= $no ?>">
																					<?= $p->nama_produk ?> (<?= $warna_tam;?>)
																				</p>
																			<?php } else{?>
																				<p id="nama_produk<?= $no ?>">
																					<?= $p->nama_produk ?>
																				</p>
																			<?php } ?>
																		</center>
																</td>
																<td style="text-align: center;vertical-align: middle;">
																	<p><?= $p->jumlah_perencanaan; ?></p>
																</td>
																<td style="text-align: center;vertical-align: middle;">
																	Pcs
																</td>
															</tr>
													<?php $no++;} ?>
													
												</tbody>

											</table>
										<?php } else{?>
											<p style="text-align: center;vertical-align: middle;">
												<b style="color: red">Tidak ada perencanaan cutting kain hari ini</b>
											</p>
										<?php } ?>
								</div>

								<hr class="dotted short">
								<div class="text-right">
									<a class="text-uppercase text-muted" href="<?= base_url()?>laporanPerencanaanCutting/semua">(lihat semua)</a>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- laporan perencanaan cutting -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel panel-featured-left panel-featured-danger">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon" style="background-color:#670B0B">
										<i class="fa  fa-th-list"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Laporan Perencanaan Cutting</h4>
										<div class="info">
											<?php if($jm_cutkain > 0){?>
												<strong class="amount"><?= $laporan_percut[0]['jumlah_belum'] ?></strong>
											<?php } else{?>
												<p>
													<b style="color: red">Tidak ada perencanaan cutting kain hari ini</b>
												</p>
											<?php } ?>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>laporanPerencanaanCutting/semua">(lihat semua)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- laporan hasil produksi -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel">
						<header class="panel-heading panel-heading-transparent">
							<h2 class="panel-title">
								<span class="va-middle">Laporan Hasil Produksi</span>
							</h2>
						</header>
						<div class="panel-body panel-featured-left panel-featured-danger">
							<div class="content">
								<div class="table-responsive">
										<table class="table table-hover mb-none">
											<thead>
												<tr>
													<th style="text-align: center;vertical-align: middle;">#</th>
													<th style="text-align: center;vertical-align: middle;">Line</th>
													<th style="text-align: center;vertical-align: middle;">Status</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td style="text-align: center;vertical-align: middle;">
														1
													</td>
													<td style="text-align: center;vertical-align: middle;">
														Line Cutting
													</td>
													<td style="text-align: center;vertical-align: middle;">
														<?php if($jm_hp_cutting > 0){?>
															<?php if($hp_cutting[0]['status_laporan'] == 0){?>
																Belum Ada Laporan
															<?php } else{?>
																Sudah Ada Laporan
															<?php } ?>
														<?php } else{?>
															Tidak Ada Perencanaan Produksi
														<?php } ?>
													</td>
												</tr>
												<tr>
													<td style="text-align: center;vertical-align: middle;">
														2
													</td>
													<td style="text-align: center;vertical-align: middle;">
														Line Bonding
													</td>
													<td style="text-align: center;vertical-align: middle;">
														<?php if($jm_hp_bonding > 0){?>
															<?php if($hp_bonding[0]['status_laporan'] == 0){?>
																Belum Ada Laporan
															<?php } else{?>
																Sudah Ada Laporan
															<?php } ?>
														<?php } else{?>
															Tidak Ada Perencanaan Produksi
														<?php } ?>
													</td>
												</tr>
												<tr>
													<td style="text-align: center;vertical-align: middle;">
														3
													</td>
													<td style="text-align: center;vertical-align: middle;">
														Line Sewing
													</td>
													<td style="text-align: center;vertical-align: middle;">
														<?php if($jm_hp_sewing > 0){?>
															<?php if($hp_sewing[0]['status_laporan'] == 0){?>
																Belum Ada Laporan
															<?php } else{?>
																Sudah Ada Laporan
															<?php } ?>
														<?php } else{?>
															Tidak Ada Perencanaan Produksi
														<?php } ?>
													</td>
												</tr>
												<tr>
													<td style="text-align: center;vertical-align: middle;">
														4
													</td>
													<td style="text-align: center;vertical-align: middle;">
														Line Assy
													</td>
													<td style="text-align: center;vertical-align: middle;">
														<?php if($jm_hp_assy > 0){?>
															<?php if($hp_assy[0]['status_laporan'] == 0){?>
																Belum Ada Laporan
															<?php } else{?>
																Sudah Ada Laporan
															<?php } ?>
														<?php } else{?>
															Tidak Ada Perencanaan Produksi
														<?php } ?>
													</td>
												</tr>
											</tbody>
										</table>
								</div>

								<hr class="dotted short">
								<div class="text-right">
									<a class="text-uppercase text-muted" href="<?= base_url()?>hasilProduksi/semua_hasil_produksi">(LIHAT SEMUA)</a>
								</div>
							</div>
						</div>
					</section>
				</div>

				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel">
						<header class="panel-heading panel-heading-transparent">
							<h2 class="panel-title">
								<span class="va-middle">Produksi Tertunda (<?= $jm_produksi_tertunda ?>)</span>
							</h2>
						</header>
						<div class="panel-body panel-featured-left panel-featured-danger">
							<div class="content">
								<div class="table-responsive" style="height: 175px;overflow: scroll">
										<table class="table table-hover mb-none">
											<thead>
												<tr>
													<th style="text-align: center;vertical-align: middle;">No</th>
													<th style="text-align: center;vertical-align: middle;">Nama Produk</th>
													<th style="text-align: center;vertical-align: middle;">Jumlah Produk</th>
													<th style="text-align: center;vertical-align: middle;">Status</th>
												</tr>
											</thead>
											<tbody>
												<?php 
													$no = 1;
													foreach($produksi_tertunda as $prodtun){?>
													<tr>
														<td style="text-align: center;vertical-align: middle;">
															<?= $no; ?>
														</td>
														<td style="text-align: center;vertical-align: middle;">
															<?= $prodtun->nama_produk ?>
														</td>
														<td style="text-align: center;vertical-align: middle;">
															<?= $prodtun->jumlah_tertunda ?>
														</td>
														<td style="text-align: center;vertical-align: middle;">
															<?php if($prodtun->status_penjadwalan == 0){?>
																Belum Diproses
															<?php } else if($prodtun->status_penjadwalan == 1){?>
																Sedang Diproses
															<?php } ?>
														</td>
													</tr>
												<?php $no++; } ?>
											</tbody>
										</table>
								</div>

								<hr class="dotted short">
								<div class="text-right">
									<a class="text-uppercase text-muted" href="<?= base_url()?>produksiTertunda/semua">(LIHAT SEMUA)</a>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
<!-- -->
	<?php } else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Cutting" ||
					$_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Bonding" ||
					$_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Sewing"  ||
					$_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "PIC Line Assy"){?>
<!-- PIC ------------------------------------------------------------------------------------------>
		<div class="row">
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- inventory line -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel panel-featured-left panel-featured-danger">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon" style="background-color:#BE2525">
										<i class="fa  fa-cube"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Inventory Line</h4>
										<div class="info">
											<strong class="amount"><?= $jumlah_inventory_line[0]['jumlah_inventory_line'] ?></strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>inventoryLine">(lihat semua)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- laporan hasil produksi -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel panel-featured-left panel-featured-danger">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon" style="background-color:#670B0B">
										<i class="fa  fa-th-list"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Laporan Hasil Produksi</h4>
										<div class="info">
											<?php if($jm_hasil_produksi > 0){?>
												<?php if($hasil_produksi[0]['status_laporan'] == 0){?>
													<p style="color:red"><b>Belum ada laporan hasil produksi</b></p>
												<?php } else{?>
													<p style="color:green"><b>Sudah ada laporan hasil produksi</b></p>
												<?php }?>
											<?php } else{?>
												<p style="color:red"><b>Tidak ada perencanaan produksi</b></p>
											<?php } ?>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>hasilProduksi/semua_hasil_produksi">(lihat semua)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- perencanaan produksi hari ini -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel">
						<header class="panel-heading panel-heading-transparent">
							<h2 class="panel-title">
								<span class="va-middle">Perencanaan Produksi Hari Ini</span>
							</h2>
						</header>
						<div class="panel-body panel-featured-left panel-featured-danger">
							<div class="content">
								<div class="table-responsive">
									<?php if($jm_perencanaan_hari_ini > 0){?>
										<table class="table table-hover mb-none">
											<thead>
												<tr>
													<th style="text-align: center;vertical-align: middle;">#</th>
													<th style="text-align: center;vertical-align: middle;">Nama Produk</th>
													<th style="text-align: center;vertical-align: middle;">Jumlah Produk</th>
													<th style="text-align: center;vertical-align: middle;">Satuan Produk</th>
												</tr>
											</thead>
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
										</table>
									<?php } else {?>
										<p style="text-align: center;vertical-align: middle;">
											<b style="color: red">Tidak ada perencanaan produksi</b>
										</p>
									<?php } ?>
								</div>

								<hr class="dotted short">
								<div class="text-right">
									<a class="text-uppercase text-muted" href="<?= base_url()?>perencanaanProduksi/perencanaan_produksi_line">(View All)</a>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- tugas -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel">
						<header class="panel-heading panel-heading-transparent">
							<h2 class="panel-title">
								<span class="va-middle">Tugas</span>
							</h2>
						</header>
						<div>
							<div class="content">
								<ul class="simple-card-list mb-xlg">
									<li style="background-color:#BE2525;color:white">
										<div style="display:inline-block;width:69%">
											<h5><b>Buat Pengambilan Material</b></h5>
										</div>
										<div style="text-align: center;vertical-align: middle;display:inline-block;width:29%">
											<?php if($jumlah_pengambilan_material > 0){?>
												<span class="label" style="background-color:white;color:green">Sudah Dikerjakan</span>
											<?php } else if($jumlah_pengambilan_material == null && $jm_perencanaan_hari_ini > 0){?>
												<span class="label" style="background-color:white;color:red">Belum Dikerjakan</span>
											<?php } ?>
										</div>
										<?php if($jumlah_pengambilan_material > 0){?>
											<p>Anda sudah membuat permintaan pengambilan material</p>
										<?php } else if($jumlah_pengambilan_material == null && $jm_perencanaan_hari_ini > 0){?>
											<p>Anda belum membuat permintaan pengambilan material</p>
										<?php } else if($jm_perencanaan_hari_ini == 0){?>
											<p>Tidak ada perencanaan produksi, anda tidak dapat membuat permintaan pengambilan material</p>
										<?php } ?>
									</li>
									<li style="background-color:#670B0B;color:white">
										<div style="display:inline-block;width:69%">
											<h5><b>Proses Surat Perintah Lembur</b></h5>
										</div>
										<div style="text-align: center;vertical-align: middle;display:inline-block;width:29%">
											<?php if($spl > 0){?>
												<span class="label" style="background-color:white;color:red">Belum Dikerjakan</span>	
											<?php } ?>
										</div>
										<?php if($spl > 0){?>
											<p>Anda memiliki <?= $spl ?> surat perintah lembur yang belum diproses</p>
										<?php } else{?>
											<p>Tidak ada surat perintah lembur yang belum diproses</p>
										<?php } ?>
									</li>
									<li style="background-color:#BE2525;color:white">
										<div style="display:inline-block;width:69%">
											<h5><b>Proses Laporan Lembur</b></h5>
										</div>
										<div style="text-align: center;vertical-align: middle;display:inline-block;width:29%">
											<?php if($ll > 0){?>
												<span class="label" style="background-color:white;color:red">Belum Dikerjakan</span>
											<?php } ?>
										</div>
										<?php if($ll > 0){?>
											<p>Anda memiliki <?= $ll ?> laporan lembur yang belum diproses</p>
										<?php } else{?>
											<p>Tidak ada laporan lembur yang belum diproses</p>
										<?php } ?>
									</li>
								</ul>
							</div>
						</div>
					</section>
				</div>	
			</div>
		</div>
<!-- -->
	<?php } else if($_SESSION['nama_departemen'] == "Finish Good" && $_SESSION['nama_jabatan'] == "Admin"){?>
<!-- FINISH GOOD ------------------------------------------------------------------------------------------>
		<div class="row">
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- bpbd -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel panel-featured-left panel-featured-danger">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon" style="background-color:#BE2525">
										<i class="fa  fa-file-o"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">BPBD</h4>
										<div class="info">
											<strong class="amount"><?= $bpbd[0]['jumlah_bpbd'] ?></strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>inventoryLine">(lihat semua)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- laporan hasil produksi assy -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel panel-featured-left panel-featured-danger">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon" style="background-color:#670B0B">
										<i class="fa  fa-th-list"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Laporan Hasil Produksi Assy</h4>
										<div class="info">
											<?php if($jm_hasil_produksi > 0){?>
												<?php if($hasil_produksi[0]['status_laporan'] == 0){?>
													<p style="color:red"><b>Belum ada laporan hasil produksi</b></p>
												<?php } else{?>
													<p style="color:green"><b>Sudah ada laporan hasil produksi</b></p>
												<?php }?>
											<?php } else{?>
												<p style="color:red"><b>Tidak ada perencanaan produksi</b></p>
											<?php } ?>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>hasilProduksi/semua_hasil_produksi">(lihat semua)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- finish good hari ini -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel">
						<header class="panel-heading panel-heading-transparent">
							<h2 class="panel-title">
								<span class="va-middle">Finish Good Hari Ini</span>
							</h2>
						</header>
						<div class="panel-body panel-featured-left panel-featured-danger">
							<div class="content">
								<div class="table-responsive">
										<table class="table table-hover mb-none">
											<thead>
												<tr>
													<th style="text-align: center;vertical-align: middle;">#</th>
													<th style="text-align: center;vertical-align: middle;">Nama Produk</th>
													<th style="text-align: center;vertical-align: middle;">Target</th>
													<th style="text-align: center;vertical-align: middle;">Satuan Produk</th>
												</tr>
											</thead>
											<tbody>
												<?php 
													$no = 1;
													foreach($produk as $p){
													foreach($pros_prod as $pp){
														if($p->id_detail_produk == $pp->id_detail_produk){
															if($p->urutan_line == $pp->urutan_line){
												?>
																<tr>
																	<td style="text-align: center;vertical-align: middle;">
																		<?= $no?>
																	</td>
																	<td style="text-align: center;vertical-align: middle;">
																			<center>
																				<!-- memiliki ukuran & warna -->
																				<?php if($p->keterangan == 0){
																					$ukuran_tam = "";
																					$warna_tam  = "";
																					foreach($ukuran as $u){
																						if($u->id_ukuran_produk == $p->id_ukuran_produk){
																							$ukuran_tam = $u->ukuran_produk." ".$u->satuan_ukuran;
																						}
																					}
																					
																					foreach($warna as $w){
																						if($w->id_warna == $p->id_warna){
																							$warna_tam = $w->nama_warna;
																						}
																					}
																				?>
																					<p id="nama_produk<?= $no ?>">
																						<?= $p->nama_produk ?> <?= $ukuran_tam?> (<?= $warna_tam;?>)
																					</p>
																				<!-- memiliki ukuran -->
																				<?php } else if($p->keterangan == 1){
																					$ukuran_tam = "";
																					
																					foreach($ukuran as $u){
																						if($u->id_ukuran_produk == $p->id_ukuran_produk){
																							$ukuran_tam = $u->ukuran_produk ." ".$u->satuan_ukuran;
																						}
																					}
																				?>
																					<p id="nama_produk<?= $no ?>">
																						<?= $p->nama_produk ?> <?= $ukuran_tam?>
																					</p>
																				<?php } else if($p->keterangan == 2){
																					$warna_tam = "";

																					foreach($warna as $w){
																						if($w->id_warna == $p->id_warna){
																							$warna_tam = $w->nama_warna;
																						}
																					}
																				?>
																					<p id="nama_produk<?= $no ?>">
																						<?= $p->nama_produk ?> (<?= $warna_tam;?>)
																					</p>
																				<?php } else{?>
																					<p id="nama_produk<?= $no ?>">
																						<?= $p->nama_produk ?>
																					</p>
																				<?php } ?>
																			</center>
																	</td>
																	<td style="text-align: center;vertical-align: middle;">
																		<p id="jumlah_produk<?= $no ?>"><?= $p->total; ?></p>
																	</td>
																	<td style="text-align: center;vertical-align: middle;">
																		Pcs
																	</td>
																</tr>
												<?php $no++; }}}} ?>
											</tbody>

										</table>
								</div>

								<hr class="dotted short">
								<div class="text-right">
									<a class="text-uppercase text-muted" href="<?= base_url()?>bpbj/tambah_bpbj">(View All)</a>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
<!-- -->
	<?php } else if($_SESSION['nama_departemen'] == "Produksi" && $_SESSION['nama_jabatan'] == "Admin"){?>
<!-- ADMIN PRODUKSI ------------------------------------------------------------------------------------------>
		<div class="row">
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- laporan hasil produksi -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel">
						<header class="panel-heading panel-heading-transparent">
							<h2 class="panel-title">
								<span class="va-middle">Laporan Hasil Produksi</span>
							</h2>
						</header>
						<div class="panel-body panel-featured-left panel-featured-danger">
							<div class="content">
								<div class="table-responsive">
										<table class="table table-hover mb-none">
											<thead>
												<tr>
													<th style="text-align: center;vertical-align: middle;">#</th>
													<th style="text-align: center;vertical-align: middle;">Line</th>
													<th style="text-align: center;vertical-align: middle;">Status</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td style="text-align: center;vertical-align: middle;">
														1
													</td>
													<td style="text-align: center;vertical-align: middle;">
														Line Cutting
													</td>
													<td style="text-align: center;vertical-align: middle;">
														<?php if($jm_hp_cutting > 0){?>
															<?php if($hp_cutting[0]['status_laporan'] == 0){?>
																Belum Ada Laporan
															<?php } else{?>
																Sudah Ada Laporan
															<?php } ?>
														<?php } else{?>
															Tidak Ada Perencanaan Produksi
														<?php } ?>
													</td>
												</tr>
												<tr>
													<td style="text-align: center;vertical-align: middle;">
														2
													</td>
													<td style="text-align: center;vertical-align: middle;">
														Line Bonding
													</td>
													<td style="text-align: center;vertical-align: middle;">
														<?php if($jm_hp_bonding > 0){?>
															<?php if($hp_bonding[0]['status_laporan'] == 0){?>
																Belum Ada Laporan
															<?php } else{?>
																Sudah Ada Laporan
															<?php } ?>
														<?php } else{?>
															Tidak Ada Perencanaan Produksi
														<?php } ?>
													</td>
												</tr>
												<tr>
													<td style="text-align: center;vertical-align: middle;">
														3
													</td>
													<td style="text-align: center;vertical-align: middle;">
														Line Sewing
													</td>
													<td style="text-align: center;vertical-align: middle;">
														<?php if($jm_hp_sewing > 0){?>
															<?php if($hp_sewing[0]['status_laporan'] == 0){?>
																Belum Ada Laporan
															<?php } else{?>
																Sudah Ada Laporan
															<?php } ?>
														<?php } else{?>
															Tidak Ada Perencanaan Produksi
														<?php } ?>
													</td>
												</tr>
											</tbody>
										</table>
								</div>

								<hr class="dotted short">
								<div class="text-right">
									<a class="text-uppercase text-muted" href="<?= base_url()?>hasilProduksi/semua_hasil_produksi">(LIHAT SEMUA)</a>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- perencanaan cutting kain -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel">
						<header class="panel-heading panel-heading-transparent">
							<h2 class="panel-title">
								<span class="va-middle">Perencanaan Cutting Kain</span>
							</h2>
						</header>
						<div class="panel-body panel-featured-left panel-featured-danger">
							<div class="content">
								<div class="table-responsive">
										<?php if($jm_cutkain > 0){?>
											<table class="table table-hover mb-none">
												<thead>
													<tr>
														<th style="text-align: center;vertical-align: middle;">#</th>
														<th style="text-align: center;vertical-align: middle;">Nama Produk</th>
														<th style="text-align: center;vertical-align: middle;">Target</th>
														<th style="text-align: center;vertical-align: middle;">Tanggal Produksi</th>
													</tr>
												</thead>
												<tbody>
													<?php 
														$no = 1;
														foreach($cutkain as $p){?>
															<tr>
																<td style="text-align: center;vertical-align: middle;">
																	<?= $no?>
																</td>
																<td style="text-align: center;vertical-align: middle;">
																		<center>
																			<!-- memiliki ukuran & warna -->
																			<?php if($p->keterangan == 0){
																				$ukuran_tam = "";
																				$warna_tam  = "";
																				foreach($ukuran as $u){
																					if($u->id_ukuran_produk == $p->id_ukuran_produk){
																						$ukuran_tam = $u->ukuran_produk." ".$u->satuan_ukuran;
																					}
																				}
																				
																				foreach($warna as $w){
																					if($w->id_warna == $p->id_warna){
																						$warna_tam = $w->nama_warna;
																					}
																				}
																			?>
																				<p id="nama_produk<?= $no ?>">
																					<?= $p->nama_produk ?> <?= $ukuran_tam?> (<?= $warna_tam;?>)
																				</p>
																			<!-- memiliki ukuran -->
																			<?php } else if($p->keterangan == 1){
																				$ukuran_tam = "";
																				
																				foreach($ukuran as $u){
																					if($u->id_ukuran_produk == $p->id_ukuran_produk){
																						$ukuran_tam = $u->ukuran_produk ." ".$u->satuan_ukuran;
																					}
																				}
																			?>
																				<p id="nama_produk<?= $no ?>">
																					<?= $p->nama_produk ?> <?= $ukuran_tam?>
																				</p>
																			<?php } else if($p->keterangan == 2){
																				$warna_tam = "";

																				foreach($warna as $w){
																					if($w->id_warna == $p->id_warna){
																						$warna_tam = $w->nama_warna;
																					}
																				}
																			?>
																				<p id="nama_produk<?= $no ?>">
																					<?= $p->nama_produk ?> (<?= $warna_tam;?>)
																				</p>
																			<?php } else{?>
																				<p id="nama_produk<?= $no ?>">
																					<?= $p->nama_produk ?>
																				</p>
																			<?php } ?>
																		</center>
																</td>
																<td style="text-align: center;vertical-align: middle;">
																	<p><?= $p->jumlah_perencanaan; ?></p>
																</td>
																<td style="text-align: center;vertical-align: middle;">
																	Pcs
																</td>
															</tr>
													<?php $no++;} ?>
													
												</tbody>

											</table>
										<?php } else{?>
											<p>
												<b style="color: red">Tidak ada perencanaan cutting kain hari ini</b>
											</p>
										<?php } ?>
								</div>

								<hr class="dotted short">
								<div class="text-right">
									<a class="text-uppercase text-muted" href="<?= base_url()?>laporanPerencanaanCutting/semua">(lihat semua)</a>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- laporan perencanaan cutting -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel panel-featured-left panel-featured-danger">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon" style="background-color:#670B0B">
										<i class="fa  fa-th-list"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Laporan Perencanaan Cutting</h4>
										<div class="info">
											<?php if($jm_cutkain > 0){?>
												<strong class="amount"><?= $laporan_percut[0]['jumlah_belum'] ?></strong>
											<?php } else{?>
												<p>
													<b style="color: red">Tidak ada perencanaan cutting kain hari ini</b>
												</p>
											<?php } ?>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>laporanPerencanaanCutting/semua">(lihat semua)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
<!-- -->
	<?php } ?>
<!--*****************************-->
<?php include('_endtitle.php'); ?>
<?php include('_js.php'); ?>
<!--*****************************-->
<!--*****************************-->
<?php //include('_rightbar.php');
?>

<script>
    function reload() {
    location.reload();
    }
</script>
    