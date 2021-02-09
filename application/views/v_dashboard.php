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
<!------------------------------------------------------ DASHBOARD PRODUKSI ------------------------------------------------------->
		<?php  if($_SESSION['nama_departemen'] == "Management" && $_SESSION['nama_jabatan'] == "Direktur"){?>
	<!-- DIREKTUR ------------------------------------------------------------------------------------------>
		<div class="row">
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- produk -->
				<div class="col-md-4">
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
										<sub>(total semua)</sub>
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
				<!-- PO -->
				<div class="col-md-4">
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
										<h4 class="title">PO Customer</h4>
										<sub>(belum diproses)</sub>
										<div class="info">
											<strong class="amount"><?= $po[0]['jumlah_po'] ?></strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>perencanaanProduksi">(proses)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- Produksi Tertunda -->
				<div class="col-md-4">
					<section class="panel panel-featured-left panel-featured-danger">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon" style="background-color:#BE2525">
										<i class="fa  fa-cogs"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Tertunda</h4>
										<sub>(belum selesai diproses)</sub>
										<div class="info">
											<strong class="amount"><?= $jm_produksi_tertunda ?></strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>produksiTertunda/semua">(Lihat Semua)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- bpbd -->
				<div class="col-md-4">
					<section class="panel panel-featured-left panel-featured-danger">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon" style="background-color:#670B0B">
										<i class="fa  fa-file-o"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">BPBD</h4>
										<sub>(belum dikonfirmasi)</sub>
										<div class="info">
											<strong class="amount"><?= $bpbd[0]['jumlah_bpbd'] ?></strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>bpbd/belum_konfirmasi_bpbd">(lihat semua)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- surat jalan -->
				<div class="col-md-4">
					<section class="panel panel-featured-left panel-featured-danger">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon" style="background-color:#BE2525">
										<i class="fa  fa-envelope"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Surat Jalan</h4>
										<sub>(belum selesai)</sub>
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
				<div class="col-md-4">
					<section class="panel panel-featured-left panel-featured-danger">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon" style="background-color:#670B0B">
										<i class="fa  fa-file-text-o"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Invoice</h4>
										<sub>(belum diproses)</sub>
										<div class="info">
											<strong class="amount"><?= $invoice[0]['jumlah_invoice'] ?></strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>invoice/belum_diproses_invoice">(lihat semua)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- perencanaan produksi -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel">
						<div class="panel-body panel-featured-left panel-featured-danger">
							<div class="content">
								<div style="height:250px;overflow:scroll">
									<table class="table-responsive table table-hover mb-none">
										<thead>
											<tr>
												<th colspan="4" style="text-align: center;vertical-align: middle;"><?php 
														$waktu = $now;
														$bulan_array = array(
															1 => 'Januari',
															2 => 'Februari',
															3 => 'Maret',
															4 => 'April',
															5 => 'Mei',
															6 => 'Juni',
															7 => 'Juli',
															8 => 'Agustus',
															9 => 'September',
															10 => 'Oktober',
															11 => 'November',
															12 => 'Desember',
														);
														$bl = date('n', strtotime($waktu));
														$bulan_now = $bulan_array[$bl];
														$tahun_now = date('Y', strtotime($waktu));
													?>
														<h4><b><span class="va-middle"><?= $bulan_now ?>  <?= $tahun_now ?></span></b></h4>
												</th>
											</tr>
											<tr>
												<th style="text-align: center;vertical-align: middle;">No</th>
												<th style="text-align: center;vertical-align: middle;">Tanggal Awal</th>
												<th style="text-align: center;vertical-align: middle;">Tanggal Akhir</th>
												<th style="text-align: center;vertical-align: middle;">Status</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$no = 1;
												foreach($monday as $x){
														$waktu = $x->tanggal_mulai;

														$bulan_array = array(
															1 => 'Januari',
															2 => 'Februari',
															3 => 'Maret',
															4 => 'April',
															5 => 'Mei',
															6 => 'Juni',
															7 => 'Juli',
															8 => 'Agustus',
															9 => 'September',
															10 => 'Oktober',
															11 => 'November',
															12 => 'Desember',
														);
														$bl    = date('n', strtotime($waktu));
														$bulan = $bulan_array[$bl];
														$tahun = date('Y', strtotime($waktu));
														
														if($bulan == $bulan_now && $tahun == $tahun_now){
											?>
												<tr>
													<td style="text-align: center;vertical-align: middle;"><?= $no; ?></td>
													<td style="text-align: center;vertical-align: middle;">
														<?php 
															$waktu = $x->tanggal_mulai;

															$hari_array = array(
																'Minggu',
																'Senin',
																'Selasa',
																'Rabu',
																'Kamis',
																'Jumat',
																'Sabtu'
															);
															$hr = date('w', strtotime($waktu));
															$hari = $hari_array[$hr];
															$tanggal = date('j', strtotime($waktu));
															$bulan_array = array(
																1 => 'Januari',
																2 => 'Februari',
																3 => 'Maret',
																4 => 'April',
																5 => 'Mei',
																6 => 'Juni',
																7 => 'Juli',
																8 => 'Agustus',
																9 => 'September',
																10 => 'Oktober',
																11 => 'November',
																12 => 'Desember',
															);
															$bl = date('n', strtotime($waktu));
															$bulan = $bulan_array[$bl];
															$tahun = date('Y', strtotime($waktu));
															
															echo "$hari, $tanggal $bulan $tahun";
														?>
														<input type="hidden" id="s<?= $no;?>" value="<?php 
																$waktu = $x->tanggal_mulai;

																$hari_array = array(
																	'Minggu',
																	'Senin',
																	'Selasa',
																	'Rabu',
																	'Kamis',
																	'Jumat',
																	'Sabtu'
																);
																$hr = date('w', strtotime($waktu));
																$hari = $hari_array[$hr];
																$tanggal = date('j', strtotime($waktu));
																$bulan_array = array(
																	1 => 'Januari',
																	2 => 'Februari',
																	3 => 'Maret',
																	4 => 'April',
																	5 => 'Mei',
																	6 => 'Juni',
																	7 => 'Juli',
																	8 => 'Agustus',
																	9 => 'September',
																	10 => 'Oktober',
																	11 => 'November',
																	12 => 'Desember',
																);
																$bl = date('n', strtotime($waktu));
																$bulan = $bulan_array[$bl];
																$tahun = date('Y', strtotime($waktu));
																
																echo "$hari, $tanggal $bulan $tahun";
															?>"
														>
														<input type="hidden" id="id_produksi<?= $no;?>" value="<?= $x->id_produksi;?>">
													</td>
													<td style="text-align: center;vertical-align: middle;">
														<?php 
															$waktu = $x->tanggal_selesai;

															$hari_array = array(
																'Minggu',
																'Senin',
																'Selasa',
																'Rabu',
																'Kamis',
																'Jumat',
																'Sabtu'
															);
															$hr = date('w', strtotime($waktu));
															$hari = $hari_array[$hr];
															$tanggal = date('j', strtotime($waktu));
															$bulan_array = array(
																1 => 'Januari',
																2 => 'Februari',
																3 => 'Maret',
																4 => 'April',
																5 => 'Mei',
																6 => 'Juni',
																7 => 'Juli',
																8 => 'Agustus',
																9 => 'September',
																10 => 'Oktober',
																11 => 'November',
																12 => 'Desember',
															);
															$bl = date('n', strtotime($waktu));
															$bulan = $bulan_array[$bl];
															$tahun = date('Y', strtotime($waktu));
															
															echo "$hari, $tanggal $bulan $tahun";
														?>
														<input type="hidden" id="e<?= $no;?>" value="<?php 
																$waktu = $x->tanggal_selesai;

																$hari_array = array(
																	'Minggu',
																	'Senin',
																	'Selasa',
																	'Rabu',
																	'Kamis',
																	'Jumat',
																	'Sabtu'
																);
																$hr = date('w', strtotime($waktu));
																$hari = $hari_array[$hr];
																$tanggal = date('j', strtotime($waktu));
																$bulan_array = array(
																	1 => 'Januari',
																	2 => 'Februari',
																	3 => 'Maret',
																	4 => 'April',
																	5 => 'Mei',
																	6 => 'Juni',
																	7 => 'Juli',
																	8 => 'Agustus',
																	9 => 'September',
																	10 => 'Oktober',
																	11 => 'November',
																	12 => 'Desember',
																);
																$bl = date('n', strtotime($waktu));
																$bulan = $bulan_array[$bl];
																$tahun = date('Y', strtotime($waktu));
																
																echo "$hari, $tanggal $bulan $tahun";
															?>">
													</td>
													<td style="text-align: center;vertical-align: middle;">
														<?php if($x->start > $now){?>
															Belum Produksi
														<?php }  else if($x->start <= $now && $x->end >= $now){ ?>
															Sedang Produksi
														<?php } else if($x->end < $now){?>
															Selesai
														<?php } ?> 
													</td>
												</tr>

											<?php $no++; }}?>
										</tbody>
									</table>
								</div>

								<hr class="dotted short">
								<div class="text-right">
									<a class="text-uppercase text-muted" href="<?= base_url()?>perencanaanProduksi/semua_perencanaan_produksi">(Lihat Semua)</a>
								</div>
							</div>
						</div>
					</section>
				</div>
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
								<div class="table-responsive" style="height:195px;overflow:scroll">
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
									<a class="text-uppercase text-muted" href="<?= base_url()?>bpbj/tambah_bpbj">(Lihat Semua)</a>
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
								<div class="table-responsive" style="height:175px;overflow: scroll">
									<?php if($jm_perencanaan_hari_ini > 0){?>
										<table class="table table-hover mb-none">
											<thead>
												<tr>
													<th style="text-align: center;vertical-align: middle;">#</th>
													<th style="text-align: center;vertical-align: middle;">Nama Produk</th>
													<th style="text-align: center;vertical-align: middle;">Jumlah Produk</th>
													<th style="text-align: center;vertical-align: middle;">Nama Line</th>
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
															<?= $phi->nama_line ?>
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
									<a class="text-uppercase text-muted" href="<?= base_url()?>perencanaanProduksi/perencanaan_produksi_line">(Lihat Semua)</a>
								</div>
							</div>
						</div>
					</section>
				</div>
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
			</div>
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- perencanaan cutting kain -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel panel-featured-left panel-featured-danger">
						<div class="panel-body" style="height:150px">
							<div class="widget-summary">
								<div class="widget-summary-col">
									<div class="summary" style="height: 100px;overflow: scroll">
										<h4 class="title">Perencanaan Cutting Kain</h4>
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
									<div class="summary-footer">
										<a class="text-uppercase text-muted" href="<?= base_url()?>laporanPerencanaanCutting/semua">(lihat semua)</a>
									</div>
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
										<i class="fa  fa-file-text-o"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Laporan Perencanaan Cutting Kain</h4>
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
		<?php } else if($_SESSION['nama_departemen'] == "Management" && $_SESSION['nama_jabatan'] == "Manager"){?>
	<!-- MANAGER ------------------------------------------------------------------------------------------>
		<div class="row">
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- produk -->
				<div class="col-md-4">
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
										<sub>(total semua)</sub>
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
				<!-- PO -->
				<div class="col-md-4">
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
										<h4 class="title">PO Customer</h4>
										<sub>(belum diproses)</sub>
										<div class="info">
											<strong class="amount"><?= $po[0]['jumlah_po'] ?></strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>perencanaanProduksi">(proses)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- Produksi Tertunda -->
				<div class="col-md-4">
					<section class="panel panel-featured-left panel-featured-danger">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon" style="background-color:#BE2525">
										<i class="fa  fa-cogs"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Tertunda</h4>
										<sub>(belum selesai diproses)</sub>
										<div class="info">
											<strong class="amount"><?= $jm_produksi_tertunda ?></strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>produksiTertunda/semua">(Lihat Semua)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- bpbd -->
				<div class="col-md-4">
					<section class="panel panel-featured-left panel-featured-danger">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon" style="background-color:#670B0B">
										<i class="fa  fa-file-o"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">BPBD</h4>
										<sub>(belum dikonfirmasi)</sub>
										<div class="info">
											<strong class="amount"><?= $bpbd[0]['jumlah_bpbd'] ?></strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>bpbd/belum_konfirmasi_bpbd">(lihat semua)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- surat jalan -->
				<div class="col-md-4">
					<section class="panel panel-featured-left panel-featured-danger">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon" style="background-color:#BE2525">
										<i class="fa  fa-envelope"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Surat Jalan</h4>
										<sub>(belum selesai)</sub>
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
				<div class="col-md-4">
					<section class="panel panel-featured-left panel-featured-danger">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon" style="background-color:#670B0B">
										<i class="fa  fa-file-text-o"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Invoice</h4>
										<sub>(belum diproses)</sub>
										<div class="info">
											<strong class="amount"><?= $invoice[0]['jumlah_invoice'] ?></strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>invoice/belum_diproses_invoice">(lihat semua)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- perencanaan produksi -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel">
						<div class="panel-body panel-featured-left panel-featured-danger">
							<div class="content">
								<div style="height:250px;overflow:scroll">
									<table class="table-responsive table table-hover mb-none">
										<thead>
											<tr>
												<th colspan="4" style="text-align: center;vertical-align: middle;"><?php 
														$waktu = $now;
														$bulan_array = array(
															1 => 'Januari',
															2 => 'Februari',
															3 => 'Maret',
															4 => 'April',
															5 => 'Mei',
															6 => 'Juni',
															7 => 'Juli',
															8 => 'Agustus',
															9 => 'September',
															10 => 'Oktober',
															11 => 'November',
															12 => 'Desember',
														);
														$bl = date('n', strtotime($waktu));
														$bulan_now = $bulan_array[$bl];
														$tahun_now = date('Y', strtotime($waktu));
													?>
														<h4><b><span class="va-middle"><?= $bulan_now ?>  <?= $tahun_now ?></span></b></h4>
												</th>
											</tr>
											<tr>
												<th style="text-align: center;vertical-align: middle;">No</th>
												<th style="text-align: center;vertical-align: middle;">Tanggal Awal</th>
												<th style="text-align: center;vertical-align: middle;">Tanggal Akhir</th>
												<th style="text-align: center;vertical-align: middle;">Status</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$no = 1;
												foreach($monday as $x){
														$waktu = $x->tanggal_mulai;

														$bulan_array = array(
															1 => 'Januari',
															2 => 'Februari',
															3 => 'Maret',
															4 => 'April',
															5 => 'Mei',
															6 => 'Juni',
															7 => 'Juli',
															8 => 'Agustus',
															9 => 'September',
															10 => 'Oktober',
															11 => 'November',
															12 => 'Desember',
														);
														$bl    = date('n', strtotime($waktu));
														$bulan = $bulan_array[$bl];
														$tahun = date('Y', strtotime($waktu));
														
														if($bulan == $bulan_now && $tahun == $tahun_now){
											?>
												<tr>
													<td style="text-align: center;vertical-align: middle;"><?= $no; ?></td>
													<td style="text-align: center;vertical-align: middle;">
														<?php 
															$waktu = $x->tanggal_mulai;

															$hari_array = array(
																'Minggu',
																'Senin',
																'Selasa',
																'Rabu',
																'Kamis',
																'Jumat',
																'Sabtu'
															);
															$hr = date('w', strtotime($waktu));
															$hari = $hari_array[$hr];
															$tanggal = date('j', strtotime($waktu));
															$bulan_array = array(
																1 => 'Januari',
																2 => 'Februari',
																3 => 'Maret',
																4 => 'April',
																5 => 'Mei',
																6 => 'Juni',
																7 => 'Juli',
																8 => 'Agustus',
																9 => 'September',
																10 => 'Oktober',
																11 => 'November',
																12 => 'Desember',
															);
															$bl = date('n', strtotime($waktu));
															$bulan = $bulan_array[$bl];
															$tahun = date('Y', strtotime($waktu));
															
															echo "$hari, $tanggal $bulan $tahun";
														?>
														<input type="hidden" id="s<?= $no;?>" value="<?php 
																$waktu = $x->tanggal_mulai;

																$hari_array = array(
																	'Minggu',
																	'Senin',
																	'Selasa',
																	'Rabu',
																	'Kamis',
																	'Jumat',
																	'Sabtu'
																);
																$hr = date('w', strtotime($waktu));
																$hari = $hari_array[$hr];
																$tanggal = date('j', strtotime($waktu));
																$bulan_array = array(
																	1 => 'Januari',
																	2 => 'Februari',
																	3 => 'Maret',
																	4 => 'April',
																	5 => 'Mei',
																	6 => 'Juni',
																	7 => 'Juli',
																	8 => 'Agustus',
																	9 => 'September',
																	10 => 'Oktober',
																	11 => 'November',
																	12 => 'Desember',
																);
																$bl = date('n', strtotime($waktu));
																$bulan = $bulan_array[$bl];
																$tahun = date('Y', strtotime($waktu));
																
																echo "$hari, $tanggal $bulan $tahun";
															?>"
														>
														<input type="hidden" id="id_produksi<?= $no;?>" value="<?= $x->id_produksi;?>">
													</td>
													<td style="text-align: center;vertical-align: middle;">
														<?php 
															$waktu = $x->tanggal_selesai;

															$hari_array = array(
																'Minggu',
																'Senin',
																'Selasa',
																'Rabu',
																'Kamis',
																'Jumat',
																'Sabtu'
															);
															$hr = date('w', strtotime($waktu));
															$hari = $hari_array[$hr];
															$tanggal = date('j', strtotime($waktu));
															$bulan_array = array(
																1 => 'Januari',
																2 => 'Februari',
																3 => 'Maret',
																4 => 'April',
																5 => 'Mei',
																6 => 'Juni',
																7 => 'Juli',
																8 => 'Agustus',
																9 => 'September',
																10 => 'Oktober',
																11 => 'November',
																12 => 'Desember',
															);
															$bl = date('n', strtotime($waktu));
															$bulan = $bulan_array[$bl];
															$tahun = date('Y', strtotime($waktu));
															
															echo "$hari, $tanggal $bulan $tahun";
														?>
														<input type="hidden" id="e<?= $no;?>" value="<?php 
																$waktu = $x->tanggal_selesai;

																$hari_array = array(
																	'Minggu',
																	'Senin',
																	'Selasa',
																	'Rabu',
																	'Kamis',
																	'Jumat',
																	'Sabtu'
																);
																$hr = date('w', strtotime($waktu));
																$hari = $hari_array[$hr];
																$tanggal = date('j', strtotime($waktu));
																$bulan_array = array(
																	1 => 'Januari',
																	2 => 'Februari',
																	3 => 'Maret',
																	4 => 'April',
																	5 => 'Mei',
																	6 => 'Juni',
																	7 => 'Juli',
																	8 => 'Agustus',
																	9 => 'September',
																	10 => 'Oktober',
																	11 => 'November',
																	12 => 'Desember',
																);
																$bl = date('n', strtotime($waktu));
																$bulan = $bulan_array[$bl];
																$tahun = date('Y', strtotime($waktu));
																
																echo "$hari, $tanggal $bulan $tahun";
															?>">
													</td>
													<td style="text-align: center;vertical-align: middle;">
														<?php if($x->start > $now){?>
															Belum Produksi
														<?php }  else if($x->start <= $now && $x->end >= $now){ ?>
															Sedang Produksi
														<?php } else if($x->end < $now){?>
															Selesai
														<?php } ?> 
													</td>
												</tr>

											<?php $no++; }}?>
										</tbody>
									</table>
								</div>

								<hr class="dotted short">
								<div class="text-right">
									<a class="text-uppercase text-muted" href="<?= base_url()?>perencanaanProduksi/semua_perencanaan_produksi">(Lihat Semua)</a>
								</div>
							</div>
						</div>
					</section>
				</div>
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
								<div class="table-responsive" style="height:195px;overflow:scroll">
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
									<a class="text-uppercase text-muted" href="<?= base_url()?>bpbj/tambah_bpbj">(Lihat Semua)</a>
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
								<div class="table-responsive" style="height:175px;overflow: scroll">
									<?php if($jm_perencanaan_hari_ini > 0){?>
										<table class="table table-hover mb-none">
											<thead>
												<tr>
													<th style="text-align: center;vertical-align: middle;">#</th>
													<th style="text-align: center;vertical-align: middle;">Nama Produk</th>
													<th style="text-align: center;vertical-align: middle;">Jumlah Produk</th>
													<th style="text-align: center;vertical-align: middle;">Nama Line</th>
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
															<?= $phi->nama_line ?>
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
									<a class="text-uppercase text-muted" href="<?= base_url()?>perencanaanProduksi/perencanaan_produksi_line">(Lihat Semua)</a>
								</div>
							</div>
						</div>
					</section>
				</div>
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
			</div>
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- perencanaan cutting kain -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel panel-featured-left panel-featured-danger">
						<div class="panel-body" style="height:150px">
							<div class="widget-summary">
								<div class="widget-summary-col">
									<div class="summary" style="height: 100px;overflow: scroll">
										<h4 class="title">Perencanaan Cutting Kain</h4>
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
									<div class="summary-footer">
										<a class="text-uppercase text-muted" href="<?= base_url()?>laporanPerencanaanCutting/semua">(lihat semua)</a>
									</div>
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
										<i class="fa  fa-file-text-o"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Laporan Perencanaan Cutting Kain</h4>
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
											<i class="fa  fa-envelope"></i>
										</div>
									</div>
									<div class="widget-summary-col">
										<div class="summary">
											<h4 class="title">Surat Jalan</h4>
											<sub>(belum selesai)</sub>
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
											<i class="fa  fa-file-text-o"></i>
										</div>
									</div>
									<div class="widget-summary-col">
										<div class="summary">
											<h4 class="title">Invoice</h4>
											<sub>(belum ditagih)</sub>
											<div class="info">
												<strong class="amount"><?= $invoice[0]['jumlah_invoice'] ?></strong>
											</div>
										</div>
										<div class="summary-footer">
											<a class="text-muted text-uppercase" href="<?= base_url()?>invoice/belum_diproses_invoice">(lihat semua)</a>
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
											<sub>(total semua)</sub>
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
											<sub>(total semua)</sub>
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
											<sub>(total semua)</sub>
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
											<sub>(total semua)</sub>
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
					<!-- PO, produksi tertunda -->
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
											<h4 class="title">PO Customer</h4>
											<sub>(belum selesai diproses)</sub>
											<div class="info">
												<strong class="amount"><?= $po[0]['jumlah_po'] ?></strong>
											</div>
										</div>
										<div class="summary-footer">
											<a class="text-muted text-uppercase" href="<?= base_url()?>perencanaanProduksi">(proses)</a>
										</div>
									</div>
								</div>
							</div>
						</section>

						<section class="panel panel-featured-left panel-featured-danger">
							<div class="panel-body">
								<div class="widget-summary">
									<div class="widget-summary-col widget-summary-col-icon">
										<div class="summary-icon" style="background-color:#BE2525">
											<i class="fa  fa-cogs"></i>
										</div>
									</div>
									<div class="widget-summary-col">
										<div class="summary">
											<h4 class="title">Produksi Tertunda</h4>
											<sub>(belum selesai diproses)</sub>
											<div class="info">
												<strong class="amount"><?= $jm_produksi_tertunda ?></strong>
											</div>
										</div>
										<div class="summary-footer">
											<a class="text-muted text-uppercase" href="<?= base_url()?>produksiTertunda/semua">(Lihat Semua)</a>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
					<!-- Perencanaan Produksi -->
					<div class="col-md-12 col-lg-6 col-xl-6">
						<section class="panel">
							<div class="panel-body panel-featured-left panel-featured-danger">
								<div class="content">
									<div style="height:215px;overflow: scroll">
										<table class="table-responsive table table-hover mb-none" >
											<thead>
												<tr>
													<th colspan="4" style="text-align: center;vertical-align: middle;"><?php 
															$waktu = $now;
															$bulan_array = array(
																1 => 'Januari',
																2 => 'Februari',
																3 => 'Maret',
																4 => 'April',
																5 => 'Mei',
																6 => 'Juni',
																7 => 'Juli',
																8 => 'Agustus',
																9 => 'September',
																10 => 'Oktober',
																11 => 'November',
																12 => 'Desember',
															);
															$bl = date('n', strtotime($waktu));
															$bulan_now = $bulan_array[$bl];
															$tahun_now = date('Y', strtotime($waktu));
														?>
															<h4><b><span class="va-middle"><?= $bulan_now ?>  <?= $tahun_now ?></span></b></h4>
													</th>
												</tr>
												<tr>
													<th style="text-align: center;vertical-align: middle;">No</th>
													<th style="text-align: center;vertical-align: middle;">Tanggal Awal</th>
													<th style="text-align: center;vertical-align: middle;">Tanggal Akhir</th>
													<th style="text-align: center;vertical-align: middle;">Status</th>
												</tr>
											</thead>
											<tbody>
												<?php 
													$no = 1;
													foreach($monday as $x){
															$waktu = $x->tanggal_mulai;

															$bulan_array = array(
																1 => 'Januari',
																2 => 'Februari',
																3 => 'Maret',
																4 => 'April',
																5 => 'Mei',
																6 => 'Juni',
																7 => 'Juli',
																8 => 'Agustus',
																9 => 'September',
																10 => 'Oktober',
																11 => 'November',
																12 => 'Desember',
															);
															$bl    = date('n', strtotime($waktu));
															$bulan = $bulan_array[$bl];
															$tahun = date('Y', strtotime($waktu));
															
															if($bulan == $bulan_now && $tahun == $tahun_now){
												?>
													<tr>
														<td style="text-align: center;vertical-align: middle;"><?= $no; ?></td>
														<td style="text-align: center;vertical-align: middle;">
															<?php 
																$waktu = $x->tanggal_mulai;

																$hari_array = array(
																	'Minggu',
																	'Senin',
																	'Selasa',
																	'Rabu',
																	'Kamis',
																	'Jumat',
																	'Sabtu'
																);
																$hr = date('w', strtotime($waktu));
																$hari = $hari_array[$hr];
																$tanggal = date('j', strtotime($waktu));
																$bulan_array = array(
																	1 => 'Januari',
																	2 => 'Februari',
																	3 => 'Maret',
																	4 => 'April',
																	5 => 'Mei',
																	6 => 'Juni',
																	7 => 'Juli',
																	8 => 'Agustus',
																	9 => 'September',
																	10 => 'Oktober',
																	11 => 'November',
																	12 => 'Desember',
																);
																$bl = date('n', strtotime($waktu));
																$bulan = $bulan_array[$bl];
																$tahun = date('Y', strtotime($waktu));
																
																echo "$hari, $tanggal $bulan $tahun";
															?>
															<input type="hidden" id="s<?= $no;?>" value="<?php 
																	$waktu = $x->tanggal_mulai;

																	$hari_array = array(
																		'Minggu',
																		'Senin',
																		'Selasa',
																		'Rabu',
																		'Kamis',
																		'Jumat',
																		'Sabtu'
																	);
																	$hr = date('w', strtotime($waktu));
																	$hari = $hari_array[$hr];
																	$tanggal = date('j', strtotime($waktu));
																	$bulan_array = array(
																		1 => 'Januari',
																		2 => 'Februari',
																		3 => 'Maret',
																		4 => 'April',
																		5 => 'Mei',
																		6 => 'Juni',
																		7 => 'Juli',
																		8 => 'Agustus',
																		9 => 'September',
																		10 => 'Oktober',
																		11 => 'November',
																		12 => 'Desember',
																	);
																	$bl = date('n', strtotime($waktu));
																	$bulan = $bulan_array[$bl];
																	$tahun = date('Y', strtotime($waktu));
																	
																	echo "$hari, $tanggal $bulan $tahun";
																?>"
															>
															<input type="hidden" id="id_produksi<?= $no;?>" value="<?= $x->id_produksi;?>">
														</td>
														<td style="text-align: center;vertical-align: middle;">
															<?php 
																$waktu = $x->tanggal_selesai;

																$hari_array = array(
																	'Minggu',
																	'Senin',
																	'Selasa',
																	'Rabu',
																	'Kamis',
																	'Jumat',
																	'Sabtu'
																);
																$hr = date('w', strtotime($waktu));
																$hari = $hari_array[$hr];
																$tanggal = date('j', strtotime($waktu));
																$bulan_array = array(
																	1 => 'Januari',
																	2 => 'Februari',
																	3 => 'Maret',
																	4 => 'April',
																	5 => 'Mei',
																	6 => 'Juni',
																	7 => 'Juli',
																	8 => 'Agustus',
																	9 => 'September',
																	10 => 'Oktober',
																	11 => 'November',
																	12 => 'Desember',
																);
																$bl = date('n', strtotime($waktu));
																$bulan = $bulan_array[$bl];
																$tahun = date('Y', strtotime($waktu));
																
																echo "$hari, $tanggal $bulan $tahun";
															?>
															<input type="hidden" id="e<?= $no;?>" value="<?php 
																	$waktu = $x->tanggal_selesai;

																	$hari_array = array(
																		'Minggu',
																		'Senin',
																		'Selasa',
																		'Rabu',
																		'Kamis',
																		'Jumat',
																		'Sabtu'
																	);
																	$hr = date('w', strtotime($waktu));
																	$hari = $hari_array[$hr];
																	$tanggal = date('j', strtotime($waktu));
																	$bulan_array = array(
																		1 => 'Januari',
																		2 => 'Februari',
																		3 => 'Maret',
																		4 => 'April',
																		5 => 'Mei',
																		6 => 'Juni',
																		7 => 'Juli',
																		8 => 'Agustus',
																		9 => 'September',
																		10 => 'Oktober',
																		11 => 'November',
																		12 => 'Desember',
																	);
																	$bl = date('n', strtotime($waktu));
																	$bulan = $bulan_array[$bl];
																	$tahun = date('Y', strtotime($waktu));
																	
																	echo "$hari, $tanggal $bulan $tahun";
																?>">
														</td>
														<td style="text-align: center;vertical-align: middle;">
															<?php if($x->start > $now){?>
																Belum Produksi
															<?php }  else if($x->start <= $now && $x->end >= $now){ ?>
																Sedang Produksi
															<?php } else if($x->end < $now){?>
																Selesai
															<?php } ?> 
														</td>
													</tr>

												<?php $no++; }}?>
											</tbody>
										</table>
									</div>

									<hr class="dotted short">
									<div class="text-right">
										<a class="text-uppercase text-muted" href="<?= base_url()?>perencanaanProduksi/semua_perencanaan_produksi">(Lihat Semua)</a>
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
									<div class="table-responsive" style="height:175px;overflow: scroll">
										<?php if($jm_perencanaan_hari_ini > 0){?>
											<table class="table table-hover mb-none">
												<thead>
													<tr>
														<th style="text-align: center;vertical-align: middle;">#</th>
														<th style="text-align: center;vertical-align: middle;">Nama Produk</th>
														<th style="text-align: center;vertical-align: middle;">Jumlah Produk</th>
														<th style="text-align: center;vertical-align: middle;">Nama Line</th>
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
																<?= $phi->nama_line ?>
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
										<a class="text-uppercase text-muted" href="<?= base_url()?>perencanaanProduksi/perencanaan_produksi_line">(Lihat Semua)</a>
									</div>
								</div>
							</div>
						</section>
					</div>
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
				</div>
				<div class="col-md-6 col-lg-12 col-xl-6">
					<!-- perencanaan cutting kain -->
					<div class="col-md-12 col-lg-6 col-xl-6">
						<section class="panel panel-featured-left panel-featured-danger">
							<div class="panel-body" style="height:150px">
								<div class="widget-summary">
									<div class="widget-summary-col">
										<div class="summary" style="height: 100px;overflow: scroll">
											<h4 class="title">Perencanaan Cutting Kain</h4>
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
										<div class="summary-footer">
											<a class="text-uppercase text-muted" href="<?= base_url()?>laporanPerencanaanCutting/semua">(lihat semua)</a>
										</div>
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
											<i class="fa  fa-file-text-o"></i>
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
				<!--
				<div class="col-md-6 col-lg-12 col-xl-6">
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
				-->
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
									<div  style="height:200px;overflow: scroll">
										<div class="table-responsive">
											<?php if($jm_perencanaan_hari_ini > 0){?>
												<table class="table table-hover mb-none">
													<thead>
														<tr>
															<th style="text-align: center;vertical-align: middle;">#</th>
															<th style="text-align: center;vertical-align: middle;">Nama Produk</th>
															<th style="text-align: center;vertical-align: middle;">Jumlah</th>
															<th style="text-align: center;vertical-align: middle;">Satuan</th>
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
									</div>

									<hr class="dotted short">
									<div class="text-right">
										<a class="text-uppercase text-muted" href="<?= base_url()?>perencanaanProduksi/perencanaan_produksi_line">(Lihat Semua)</a>
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
											<a class="text-muted text-uppercase" href="<?= base_url()?>bpbd/belum_konfirmasi_bpbd">(lihat semua)</a>
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
											<i class="fa  fa-file-text-o"></i>
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
									<div style="height:200px;overflow: scroll">
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
									</div>

									<hr class="dotted short">
									<div class="text-right">
										<a class="text-uppercase text-muted" href="<?= base_url()?>bpbj/tambah_bpbj">(Lihat Semua)</a>
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
					<!-- perencanaan cutting kain -->
					<div class="col-md-12 col-lg-6 col-xl-6">
						<section class="panel panel-featured-left panel-featured-danger">
							<div class="panel-body" style="height:200px">
								<div class="widget-summary">
									<div class="widget-summary-col">
										<div class="summary" style="height:140px;overflow: scroll">
											<h4 class="title">Perencanaan Cutting Kain</h4>
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
										<div class="summary-footer">
											<a class="text-uppercase text-muted" href="<?= base_url()?>laporanPerencanaanCutting/semua">(lihat semua)</a>
										</div>
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
											<i class="fa  fa-file-text-o"></i>
										</div>
									</div>
									<div class="widget-summary-col">
										<div class="summary">
											<h4 class="title">Laporan Perencanaan Cutting Kain</h4>
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
				</div>
			</div>
	<!-- -->
		<?php } ?>
<!------------------------------------------------------ DASHBOARD PRODUKSI ------------------------------------------------------->


<!------------------------------------------------------ DASHBOARD MATERIAL ------------------------------------------------------->
<?php  if($_SESSION['nama_departemen'] == "Management" && $_SESSION['nama_jabatan'] == "Direktur"){?>
	<!-- DIREKTUR ------------------------------------------------------------------------------------------>
		<div class="row">
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- PO Cust -->
				<div class="col-md-4">
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
										<h4 class="title">PO Customer</h4>
										<sub>(sedang diproses)</sub>
										<div class="info">
											<strong class="amount"><?= count($pocustnya) ?></strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>PurchaseOrderCustomer/index/0">(Lihat Semua)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- PO Supp -->
				<div class="col-md-4">
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
										<h4 class="title">PO Supplier</h4>
										<sub>(belum disetujui)</sub>
										<div class="info">
											<strong class="amount"><?= count($posupnya) ?></strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>PurchaseOrderSupplier/persetujuan">(Lihat Semua)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- invoice -->
				<div class="col-md-4">
					<section class="panel panel-featured-left panel-featured-danger">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon" style="background-color:#670B0B">
										<i class="fa  fa-file-text-o"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Invoice In</h4>
										<sub>(belum lunas)</sub>
										<div class="info">
											<strong class="amount"><?= count($invoiceinnya) ?></strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>PurchaseOrderSupplier/invoice/0">(lihat semua)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- sub jenis material -->
				<div class="col-md-4">
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
										<h4 class="title">Sub Jenis <br>Material</h4>
										<sub>(total semua)</sub>
										<div class="info">
											<strong class="amount"><?= count($subjenisnya) ?></strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>JenisMaterial">(lihat semua)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- Perubahan Harga -->
				<div class="col-md-4">
					<section class="panel panel-featured-left panel-featured-danger">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon" style="background-color:#670B0B">
										<i class="fa  fa-file-text-o"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Perubahan <br>Harga</h4>
										<sub>(belum ditinjau)</sub>
										<div class="info">
											<strong class="amount"><?= count($ubahharganya) ?></strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>PerubahanHargaMaterial/persetujuan">(lihat semua)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- Pengeluaran Uang untuk Material -->
				<div class="col-md-4">
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
										<h4 class="title">Pengeluaran <br>Bulan Ini</h4>
										<sub>(untuk material)</sub>
										<div class="info">
											<strong class="amount">
												<?php $pengeluaran = 0;
												// HITUNG DARI DN
													/* for($ddn=0; $ddn<count($pengeluarannya); $ddn++){
														$jlhnya = $pengeluarannya[$ddn]['jumlah_aktual'];
														$hargaaa = $pengeluarannya[$ddn]['harga_satuan'];
														$total = $jlhnya*$hargaaa;
														$pengeluaran = $pengeluaran+$total;
													}
													echo $pengeluaran; */

												//HITUNG DARI INVOICE IN LUNAS
													for($inn=0; $inn<count($pengeluarannya); $ddn++){
														$pengeluaran = $pengeluaran+$pengeluarannya[$inn]['total_bayar'];
													}
													echo $pengeluaran;
												?>
											</strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>perencanaanProduksi">(proses)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- permintaan material -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel">
						<header class="panel-heading panel-heading-transparent">
							<h2 class="panel-title">
								<span class="va-middle">Permintaan Material</span>
							</h2>
						</header>
						<div class="panel-body panel-featured-left panel-featured-danger">
							<div class="content">
								<div style="height:250px;overflow:scroll">
									<table class="table-responsive table table-hover mb-none">
										<thead>
											<tr>
												<th colspan="4" style="text-align: center;vertical-align: middle;">
														<h4><b><span class="va-middle">HARI INI</span></b></h4>
												</th>
											</tr>
											<tr>
												<th style="text-align: center;vertical-align: middle;">No</th>
												<th style="text-align: center;vertical-align: middle;">Produk</th>
												<th style="text-align: center;vertical-align: middle;">Line</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td style="text-align: center;vertical-align: middle;">1</td>
												<td style="text-align: center;vertical-align: middle;"> Boa Rug Floor Mat145</td>
												<td style="text-align: center;vertical-align: middle;">Cutting</td>
											</tr>
										</tbody>
										
									</table>
								</div>

								<hr class="dotted short">
								<div class="text-right">
									<a class="text-uppercase text-muted" href="<?= base_url()?>perencanaanProduksi/semua_perencanaan_produksi">(Lihat Semua)</a>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- pengambilan material -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel">
						<header class="panel-heading panel-heading-transparent">
							<h2 class="panel-title">
								<span class="va-middle">Pengambilan Material</span>
							</h2>
						</header>
						<div class="panel-body panel-featured-left panel-featured-danger">
							<div class="content">
								<div style="height:250px;overflow:scroll">
									<table class="table-responsive table table-hover mb-none">
										<thead>
											<tr>
												<th colspan="4" style="text-align: center;vertical-align: middle;">
														<h4><b><span class="va-middle">HARI INI</span></b></h4>
												</th>
											</tr>
											<tr>
												<th style="text-align: center;vertical-align: middle;">No</th>
												<th style="text-align: center;vertical-align: middle;">Material</th>
												<th style="text-align: center;vertical-align: middle;">Line</th>
											</tr>
										</thead>
										<tbody>
											
												<tr>
													<td style="text-align: center;vertical-align: middle;">1</td>
													<td style="text-align: center;vertical-align: middle;"> REB55
														
														<input type="hidden" id="id_produksi">Sewing
													</td>
													</td>
												</tr>

										</tbody>
									</table>
								</div>

								<hr class="dotted short">
								<div class="text-right">
									<a class="text-uppercase text-muted" href="<?= base_url()?>perencanaanProduksi/semua_perencanaan_produksi">(Lihat Semua)</a>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	<!-- -->
		<?php } else if($_SESSION['nama_departemen'] == "Management" && $_SESSION['nama_jabatan'] == "Manager"){?>
	<!-- MANAGER ------------------------------------------------------------------------------------------>
		<div class="row">
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- PO Cust -->
				<div class="col-md-4">
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
										<h4 class="title">PO Customer</h4>
										<sub>(belum diproses)</sub>
										<div class="info">
											<strong class="amount"><?= $po[0]['jumlah_po'] ?></strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>perencanaanProduksi">(proses)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- PO Supp -->
				<div class="col-md-4">
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
										<h4 class="title">PO Supplier</h4>
										<sub>(belum disetujui)</sub>
										<div class="info">
											<strong class="amount"><?= $po[0]['jumlah_po'] ?></strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>perencanaanProduksi">(proses)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- delivery note -->
				<div class="col-md-4">
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
										<h4 class="title">Delivery <br>Note</h4>
										<sub>(belum disetujui)</sub>
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
			</div>
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- Pengeluaran Uang untuk Material -->
				<div class="col-md-4">
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
										<h4 class="title">Pengeluaran <br>Bulan Ini</h4>
										<sub>(untuk material)</sub>
										<div class="info">
											<strong class="amount"><?= $po[0]['jumlah_po'] ?></strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>perencanaanProduksi">(proses)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- invoice -->
				<div class="col-md-4">
					<section class="panel panel-featured-left panel-featured-danger">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon" style="background-color:#670B0B">
										<i class="fa  fa-file-text-o"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Invoice Out</h4>
										<sub>(belum diproses)</sub>
										<div class="info">
											<strong class="amount"><?= $invoice[0]['jumlah_invoice'] ?></strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>invoice/belum_diproses_invoice">(lihat semua)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- permintaan material -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel">
						<header class="panel-heading panel-heading-transparent">
							<h2 class="panel-title">
								<span class="va-middle">Permintaan Material</span>
							</h2>
						</header>
						<div class="panel-body panel-featured-left panel-featured-danger">
							<div class="content">
								<div style="height:250px;overflow:scroll">
									<table class="table-responsive table table-hover mb-none">
										<?php 
											$no = 1;
											foreach($monday as $x){
													$waktu = $x->tanggal_mulai;

													$bulan_array = array(
														1 => 'Januari',
														2 => 'Februari',
														3 => 'Maret',
														4 => 'April',
														5 => 'Mei',
														6 => 'Juni',
														7 => 'Juli',
														8 => 'Agustus',
														9 => 'September',
														10 => 'Oktober',
														11 => 'November',
														12 => 'Desember',
													);
													$bl    = date('n', strtotime($waktu));
													$bulan = $bulan_array[$bl];
													$tahun = date('Y', strtotime($waktu));
													
													if($bulan == $bulan_now && $tahun == $tahun_now){
											?>
										<thead>
											<tr>
												<th colspan="4" style="text-align: center;vertical-align: middle;">
														<h4><b><span class="va-middle">HARI INI</span></b></h4>
												</th>
											</tr>
											<tr>
												<th style="text-align: center;vertical-align: middle;">No</th>
												<th style="text-align: center;vertical-align: middle;">Produk</th>
												<th style="text-align: center;vertical-align: middle;">Line</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td style="text-align: center;vertical-align: middle;"><?= $no; ?></td>
												<td style="text-align: center;vertical-align: middle;">
													<?php 
														$waktu = $x->tanggal_mulai;

														$hari_array = array(
															'Minggu',
															'Senin',
															'Selasa',
															'Rabu',
															'Kamis',
															'Jumat',
															'Sabtu'
														);
														$hr = date('w', strtotime($waktu));
														$hari = $hari_array[$hr];
														$tanggal = date('j', strtotime($waktu));
														$bulan_array = array(
															1 => 'Januari',
															2 => 'Februari',
															3 => 'Maret',
															4 => 'April',
															5 => 'Mei',
															6 => 'Juni',
															7 => 'Juli',
															8 => 'Agustus',
															9 => 'September',
															10 => 'Oktober',
															11 => 'November',
															12 => 'Desember',
														);
														$bl = date('n', strtotime($waktu));
														$bulan = $bulan_array[$bl];
														$tahun = date('Y', strtotime($waktu));
														
														echo "$hari, $tanggal $bulan $tahun";
													?>
													<input type="hidden" id="s<?= $no;?>" value="<?php 
															$waktu = $x->tanggal_mulai;

															$hari_array = array(
																'Minggu',
																'Senin',
																'Selasa',
																'Rabu',
																'Kamis',
																'Jumat',
																'Sabtu'
															);
															$hr = date('w', strtotime($waktu));
															$hari = $hari_array[$hr];
															$tanggal = date('j', strtotime($waktu));
															$bulan_array = array(
																1 => 'Januari',
																2 => 'Februari',
																3 => 'Maret',
																4 => 'April',
																5 => 'Mei',
																6 => 'Juni',
																7 => 'Juli',
																8 => 'Agustus',
																9 => 'September',
																10 => 'Oktober',
																11 => 'November',
																12 => 'Desember',
															);
															$bl = date('n', strtotime($waktu));
															$bulan = $bulan_array[$bl];
															$tahun = date('Y', strtotime($waktu));
															
															echo "$hari, $tanggal $bulan $tahun";
														?>"
													>
													<input type="hidden" id="id_produksi<?= $no;?>" value="<?= $x->id_produksi;?>">
												</td>
												</td>
											</tr>
										</tbody>
										
										<?php $no++; } else {?>
											<p style="text-align: center;vertical-align: middle;">
												<b style="color: red">Tidak ada permintaan material</b>
											</p>
										<?php }} ?>
									</table>
								</div>

								<hr class="dotted short">
								<div class="text-right">
									<a class="text-uppercase text-muted" href="<?= base_url()?>perencanaanProduksi/semua_perencanaan_produksi">(Lihat Semua)</a>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- pengambilan material -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel">
						<header class="panel-heading panel-heading-transparent">
							<h2 class="panel-title">
								<span class="va-middle">Pengambilan Material</span>
							</h2>
						</header>
						<div class="panel-body panel-featured-left panel-featured-danger">
							<div class="content">
								<div style="height:250px;overflow:scroll">
									<table class="table-responsive table table-hover mb-none">
									<?php 
										$no = 1;
										foreach($monday as $x){
												$waktu = $x->tanggal_mulai;

												$bulan_array = array(
													1 => 'Januari',
													2 => 'Februari',
													3 => 'Maret',
													4 => 'April',
													5 => 'Mei',
													6 => 'Juni',
													7 => 'Juli',
													8 => 'Agustus',
													9 => 'September',
													10 => 'Oktober',
													11 => 'November',
													12 => 'Desember',
												);
												$bl    = date('n', strtotime($waktu));
												$bulan = $bulan_array[$bl];
												$tahun = date('Y', strtotime($waktu));
												
												if($bulan == $bulan_now && $tahun == $tahun_now){
										?>
										<thead>
											<tr>
												<th colspan="4" style="text-align: center;vertical-align: middle;">
														<h4><b><span class="va-middle">HARI INI</span></b></h4>
												</th>
											</tr>
											<tr>
												<th style="text-align: center;vertical-align: middle;">No</th>
												<th style="text-align: center;vertical-align: middle;">Material</th>
												<th style="text-align: center;vertical-align: middle;">Line</th>
											</tr>
										</thead>
										<tbody>
											
												<tr>
													<td style="text-align: center;vertical-align: middle;"><?= $no; ?></td>
													<td style="text-align: center;vertical-align: middle;">
														<?php 
															$waktu = $x->tanggal_mulai;

															$hari_array = array(
																'Minggu',
																'Senin',
																'Selasa',
																'Rabu',
																'Kamis',
																'Jumat',
																'Sabtu'
															);
															$hr = date('w', strtotime($waktu));
															$hari = $hari_array[$hr];
															$tanggal = date('j', strtotime($waktu));
															$bulan_array = array(
																1 => 'Januari',
																2 => 'Februari',
																3 => 'Maret',
																4 => 'April',
																5 => 'Mei',
																6 => 'Juni',
																7 => 'Juli',
																8 => 'Agustus',
																9 => 'September',
																10 => 'Oktober',
																11 => 'November',
																12 => 'Desember',
															);
															$bl = date('n', strtotime($waktu));
															$bulan = $bulan_array[$bl];
															$tahun = date('Y', strtotime($waktu));
															
															echo "$hari, $tanggal $bulan $tahun";
														?>
														<input type="hidden" id="s<?= $no;?>" value="<?php 
																$waktu = $x->tanggal_mulai;

																$hari_array = array(
																	'Minggu',
																	'Senin',
																	'Selasa',
																	'Rabu',
																	'Kamis',
																	'Jumat',
																	'Sabtu'
																);
																$hr = date('w', strtotime($waktu));
																$hari = $hari_array[$hr];
																$tanggal = date('j', strtotime($waktu));
																$bulan_array = array(
																	1 => 'Januari',
																	2 => 'Februari',
																	3 => 'Maret',
																	4 => 'April',
																	5 => 'Mei',
																	6 => 'Juni',
																	7 => 'Juli',
																	8 => 'Agustus',
																	9 => 'September',
																	10 => 'Oktober',
																	11 => 'November',
																	12 => 'Desember',
																);
																$bl = date('n', strtotime($waktu));
																$bulan = $bulan_array[$bl];
																$tahun = date('Y', strtotime($waktu));
																
																echo "$hari, $tanggal $bulan $tahun";
															?>"
														>
														<input type="hidden" id="id_produksi<?= $no;?>" value="<?= $x->id_produksi;?>">
													</td>
													</td>
												</tr>

										</tbody>
										<?php $no++; } else {?>
											<p style="text-align: center;vertical-align: middle;">
												<b style="color: red">Belum ada pengambilan material</b>
											</p>
										<?php }} ?>
									</table>
								</div>

								<hr class="dotted short">
								<div class="text-right">
									<a class="text-uppercase text-muted" href="<?= base_url()?>perencanaanProduksi/semua_perencanaan_produksi">(Lihat Semua)</a>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
			<div class="col-md-12 col-lg-12 col-xl-12">
				<!-- MATERIAL COST -->
				<div class="col-md-12 col-lg-12 col-xl-12">
					<section class="panel">
						<header class="panel-heading panel-heading-transparent">
							<h2 class="panel-title">
								<span class="va-middle">Laporan Material Cost Hari Ini</span>
							</h2>
						</header>
						<div class="panel-body panel-featured-left panel-featured-danger">
							<div class="content">
								<div class="table-responsive" style="height:175px;overflow: scroll">
									<?php if($jm_perencanaan_hari_ini > 0){?>
										<table class="table table-hover mb-none">
											<thead>
												<tr>
													<th style="text-align: center;vertical-align: middle;">No.</th>
													<th style="text-align: center;vertical-align: middle;">Nama Produk</th>
													<th style="text-align: center;vertical-align: middle;">Material Cost</th>
													<th style="text-align: center;vertical-align: middle;">Detail</th>
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
														</td>
														<td style="text-align: center;vertical-align: middle;">
														</td>
														<td style="text-align: center;vertical-align: middle;">
															<!-- button aksi detail -->
														</td>
													</tr>
												<?php $no++; } ?>
											</tbody>
										</table>
									<?php } else {?>
										<p style="text-align: center;vertical-align: middle;">
											<b style="color: red">Belum ada laporan</b>
										</p>
									<?php } ?>
								</div>

								<hr class="dotted short">
								<div class="text-right">
									<a class="text-uppercase text-muted" href="<?= base_url()?>perencanaanProduksi/perencanaan_produksi_line">(Lihat Semua)</a>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	<!-- -->
		<?php } else if($_SESSION['nama_departemen'] == "Purchasing" && $_SESSION['nama_jabatan'] == "Admin"){?>
	<!-- ADMIN PURCHASING ------------------------------------------------------------------------------------------>
		<div class="row">
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- PO Cust -->
				<div class="col-md-4">
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
										<h4 class="title">PO Customer</h4>
										<sub>(belum diproses)</sub>
										<div class="info">
											<strong class="amount">3</strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>perencanaanProduksi">(proses)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- PO Supp -->
				<div class="col-md-4">
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
										<h4 class="title">PO Supplier</h4>
										<sub>(belum disetujui)</sub>
										<div class="info">
											<strong class="amount">2</strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>perencanaanProduksi">(proses)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- permintaan pembelian -->
				<div class="col-md-4">
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
										<h4 class="title">Permintaan <br>Pembelian</h4>
										<sub>(belum ditinjau)</sub>
										<div class="info">
											<strong class="amount">12</strong>
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
			</div>
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- Pengeluaran Uang untuk Material -->
				<div class="col-md-4">
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
										<h4 class="title">Pengeluaran <br>Bulan Ini</h4>
										<sub>(untuk material)</sub>
										<div class="info">
											<strong class="amount">150000</strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>perencanaanProduksi">(proses)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- invoice -->
				<div class="col-md-4">
					<section class="panel panel-featured-left panel-featured-danger">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon" style="background-color:#670B0B">
										<i class="fa  fa-file-text-o"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Invoice In</h4>
										<sub>(belum lunas)</sub>
										<div class="info">
											<strong class="amount">5</strong>
										</div>
									</div>
									<div class="summary-footer">
										<a class="text-muted text-uppercase" href="<?= base_url()?>invoice/belum_diproses_invoice">(lihat semua)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
			<div class="col-md-12 col-lg-12 col-xl-12">
				<!-- MATERIAL COST -->
				<div class="col-md-12 col-lg-12 col-xl-12">
					<section class="panel">
						<header class="panel-heading panel-heading-transparent">
							<h2 class="panel-title">
								<span class="va-middle">Laporan Material Cost Hari Ini</span>
							</h2>
						</header>
						<div class="panel-body panel-featured-left panel-featured-danger">
							<div class="content">
								<div class="table-responsive" style="height:175px;overflow: scroll">
										<table class="table table-hover mb-none">
											<thead>
												<tr>
													<th style="text-align: center;vertical-align: middle;">No.</th>
													<th style="text-align: center;vertical-align: middle;">Nama Produk</th>
													<th style="text-align: center;vertical-align: middle;">Material Cost</th>
													<th style="text-align: center;vertical-align: middle;">Detail</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
								</div>

								<hr class="dotted short">
								<div class="text-right">
									<a class="text-uppercase text-muted" href="<?= base_url()?>perencanaanProduksi/perencanaan_produksi_line">(Lihat Semua)</a>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	<!-- -->
		<?php } else if($_SESSION['nama_departemen'] == "Material" && $_SESSION['nama_jabatan'] == "PPIC"){?>
	<!-- PPIC Material ------------------------------------------------------------------------------------------>
		<div class="row">
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- sub jenis material -->
				<div class="col-md-4">
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
										<h4 class="title">Sub Jenis Material</h4>
										<sub>(total semua)</sub>
										<div class="info">
											<strong class="amount">4</strong>
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
				<!-- delivery note -->
				<div class="col-md-4">
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
										<h4 class="title">Delivery Note</h4>
										<sub>(belum disetujui)</sub>
										<div class="info">
											<strong class="amount">5</strong>
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
			</div>
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- permintaan material -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel">
						<header class="panel-heading panel-heading-transparent">
							<h2 class="panel-title">
								<span class="va-middle">Permintaan Material</span>
							</h2>
						</header>
						<div class="panel-body panel-featured-left panel-featured-danger">
							<div class="content">
								<div style="height:250px;overflow:scroll">
									<table class="table-responsive table table-hover mb-none">
										<thead>
											<tr>
												<th colspan="4" style="text-align: center;vertical-align: middle;">
														<h4><b><span class="va-middle">HARI INI</span></b></h4>
												</th>
											</tr>
											<tr>
												<th style="text-align: center;vertical-align: middle;">No</th>
												<th style="text-align: center;vertical-align: middle;">Material</th>
												<th style="text-align: center;vertical-align: middle;">Line</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td style="text-align: center;vertical-align: middle;"></td>
												<td style="text-align: center;vertical-align: middle;">
												</td>
												</td>
											</tr>
										</tbody>
										
									</table>
								</div>

								<hr class="dotted short">
								<div class="text-right">
									<a class="text-uppercase text-muted" href="<?= base_url()?>perencanaanProduksi/semua_perencanaan_produksi">(Lihat Semua)</a>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- pengambilan material -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel">
						<header class="panel-heading panel-heading-transparent">
							<h2 class="panel-title">
								<span class="va-middle">Pengambilan Material</span>
							</h2>
						</header>
						<div class="panel-body panel-featured-left panel-featured-danger">
							<div class="content">
								<div style="height:250px;overflow:scroll">
									<table class="table-responsive table table-hover mb-none">
										<thead>
											<tr>
												<th colspan="4" style="text-align: center;vertical-align: middle;">
														<h4><b><span class="va-middle">HARI INI</span></b></h4>
												</th>
											</tr>
											<tr>
												<th style="text-align: center;vertical-align: middle;">No</th>
												<th style="text-align: center;vertical-align: middle;">Material</th>
												<th style="text-align: center;vertical-align: middle;">Line</th>
												<th style="text-align: center;vertical-align: middle;">Jumlah</th>
											</tr>
										</thead>
										<tbody>
											
												<tr>
													<td style="text-align: center;vertical-align: middle;"></td>
													<td style="text-align: center;vertical-align: middle;">
													</td>
													</td>
												</tr>

										</tbody>
									</table>
								</div>

								<hr class="dotted short">
								<div class="text-right">
									<a class="text-uppercase text-muted" href="<?= base_url()?>perencanaanProduksi/semua_perencanaan_produksi">(Lihat Semua)</a>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	<!-- -->
		<?php } else if($_SESSION['nama_departemen'] == "Material" && $_SESSION['nama_jabatan'] == "Operator Gudang"){?>
	<!-- OPERATOR GUDANG ------------------------------------------------------------------------------------------>
		<div class="row">
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- material masuk -->
				<div class="col-md-4">
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
										<h4 class="title">Material Masuk</h4>
										<sub>(hari ini)</sub>
										<div class="info">
											<strong class="amount">0</strong>
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
				<!-- material keluar -->
				<div class="col-md-4">
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
										<h4 class="title">Material Keluar</h4>
										<sub>(hari ini)</sub>
										<div class="info">
											<strong class="amount">0</strong>
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
				<!-- delivery note -->
				<div class="col-md-4">
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
										<h4 class="title">Delivery Note</h4>
										<sub>(sedang proses)</sub>
										<div class="info">
											<strong class="amount">7</strong>
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
			</div>
			<div class="col-md-6 col-lg-12 col-xl-6">
				<!-- pemasukan material -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel">
						<header class="panel-heading panel-heading-transparent">
							<h2 class="panel-title">
								<span class="va-middle">Pemasukan Material</span>
							</h2>
						</header>
						<div class="panel-body panel-featured-left panel-featured-danger">
							<div class="content">
								<div style="height:250px;overflow:scroll">
									<table class="table-responsive table table-hover mb-none">
										<thead>
											<tr>
												<th colspan="4" style="text-align: center;vertical-align: middle;">
														<h4><b><span class="va-middle">HARI INI</span></b></h4>
												</th>
											</tr>
											<tr>
												<th style="text-align: center;vertical-align: middle;">No</th>
												<th style="text-align: center;vertical-align: middle;">Material</th>
												<th style="text-align: center;vertical-align: middle;">Jumlah</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td style="text-align: center;vertical-align: middle;"></td>
												<td style="text-align: center;vertical-align: middle;">
												</td>
												</td>
											</tr>
										</tbody>
									</table>
								</div>

								<hr class="dotted short">
								<div class="text-right">
									<a class="text-uppercase text-muted" href="<?= base_url()?>perencanaanProduksi/semua_perencanaan_produksi">(Lihat Semua)</a>
								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- pengeluaran material -->
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel">
						<header class="panel-heading panel-heading-transparent">
							<h2 class="panel-title">
								<span class="va-middle">Pengeluaran Material</span>
							</h2>
						</header>
						<div class="panel-body panel-featured-left panel-featured-danger">
							<div class="content">
								<div style="height:250px;overflow:scroll">
									<table class="table-responsive table table-hover mb-none">
										<thead>
											<tr>
												<th colspan="4" style="text-align: center;vertical-align: middle;">
														<h4><b><span class="va-middle">HARI INI</span></b></h4>
												</th>
											</tr>
											<tr>
												<th style="text-align: center;vertical-align: middle;">No</th>
												<th style="text-align: center;vertical-align: middle;">Material</th>
												<th style="text-align: center;vertical-align: middle;">Jumlah</th>
											</tr>
										</thead>
										<tbody>
											
												<tr>
													<td style="text-align: center;vertical-align: middle;"></td>
													<td style="text-align: center;vertical-align: middle;">
													</td>
													</td>
												</tr>

										</tbody>
									</table>
								</div>

								<hr class="dotted short">
								<div class="text-right">
									<a class="text-uppercase text-muted" href="<?= base_url()?>perencanaanProduksi/semua_perencanaan_produksi">(Lihat Semua)</a>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	<!-- -->
		<?php } ?>
<!------------------------------------------------------ DASHBOARD PRODUKSI ------------------------------------------------------->

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
    