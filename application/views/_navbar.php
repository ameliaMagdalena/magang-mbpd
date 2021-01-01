<div class="inner-wrapper">
	<!-- start: sidebar -->
	<aside id="sidebar-left" class="sidebar-left">
		<div class="sidebar-header">
			<div class="sidebar-title">

			</div>
				
			<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
				<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
			</div>
		</div>

		<div class="nano">
			<div class="nano-content">
				<nav id="menu" class="nav-main" role="navigation">
					<ul class="nav nav-main">
						<li>
							<a href="<?= base_url()?>dashboard">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Dashboard</span>
							</a>
						</li>

					<!-- Direktur -->
						<?php
							if ($_SESSION['nama_departemen']=="Management" && $_SESSION['nama_jabatan']=="Direktur" || 
							$_SESSION['nama_departemen']=="x" && $_SESSION['nama_jabatan']=="x"){
						?>
							<li class="nav-parent">
								<a>
									<i class="fa fa-database" aria-hidden="true"></i>
									<span>Master Data</span>
								</a>
								<ul class="nav nav-children">
								<li>
										<a href="<?= base_url()?>user">
											User
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>departemen">
											Departemen
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>jabatan">
											Jabatan
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>spesifikasiJabatan">
											Spesifikasi Jabatan
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>karyawan">
											Karyawan
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>tetapan">
											Tetapan
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>bank">
											Bank
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>rekening">
											Rekening
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>line">
											Line
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>produk">
											Produk
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>jenisProduk">
											Jenis Produk
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>ukuranProduk">
											Ukuran Produk
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>warna">
											Warna Produk
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'Customer'?>">
											Customer
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'Supplier'?>">
											Supplier
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'JenisMaterial'?>">
											Jenis Material
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'Material'?>">
											Material
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-parent">
								<a>
									<i class="fa fa-check-circle" aria-hidden="true"></i>
									<span>Persetujuan <span class="badge badge-light">10</span></span> <!-- butuh persetujuan -->
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?php echo base_url() . 'PerubahanHargaMaterial/persetujuan'?>">
											Perubahan Harga <span class="badge badge-light">1</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'PurchaseOrderSupplier/persetujuan'?>">
											Purchase Order Supplier <span class="badge badge-light">4</span>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-parent">
								<a>
									<i class="fa fa-list" aria-hidden="true"></i>
									<span>Purchase Order Customer</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?php echo base_url() . 'PurchaseOrderCustomer/baru'?>">
											Buat Baru
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'PurchaseOrderCustomer/index/0'?>">
											Dalam Proses
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'PurchaseOrderCustomer/index/1'?>">
											Selesai
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'PurchaseOrderCustomer/index/2'?>">
											Batal
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'PurchaseOrderCustomer/index/3'?>">
											Semua
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-parent">
								<a>
									<i class="fa fa-list" aria-hidden="true"></i>
									<span>Purchase Order Supplier</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?php echo base_url() . 'PurchaseOrderSupplier/pilih_baru'?>">
											Buat Baru
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'PurchaseOrderSupplier/index/0'?>">
											Dalam Proses
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'PurchaseOrderSupplier/index/1'?>">
											Selesai
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'PurchaseOrderSupplier/index/2'?>">
											Batal
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'PurchaseOrderSupplier/index/3'?>">
											Semua
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-parent">
								<a>
									<i class="fa fa-file-text" aria-hidden="true"></i>
									<span>Perencanaan Material</span>
								</a>
								<ul class="nav nav-children">
									<li class="nav-parent">
										<a title="Permintaan Material">
											<span>Permintaan Material</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="<?php echo base_url() . 'PermintaanMaterial/baru/produk'?>">
													+ Permintaan Material
												</a>
											</li>
											<li>
												<a href="<?php echo base_url() . 'PermintaanMaterial/index/0'?>">
													Belum Ditinjau <span class="badge badge-light">1</span>
												</a>
											</li>
											<li>
												<a href="<?php echo base_url() . 'PermintaanMaterial/index/1'?>">
													Sedang Proses
													<!-- disetujui / proses beli / belum diambil -->
												</a>
											</li>
											<li>
												<a href="<?php echo base_url() . 'PermintaanMaterial/index/2'?>">
													Selesai
												</a>
											</li>
											<li>
												<a href="<?php echo base_url() . 'PermintaanMaterial/index/3'?>">
													Batal
												</a>
											</li>
											<li>
												<a href="<?php echo base_url() . 'PermintaanMaterial/index/4'?>">
													Semua
												</a>
											</li>
										</ul>
									</li>
									<li class="nav-parent">
										<a title="Permintaan Material">
											<span>Perubahan Permintaan</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="<?php echo base_url() . 'PerubahanPermintaan/index/0'?>">
													Belum Ditinjau <span class="badge badge-light">1</span>
												</a>
											</li>
											<li>
												<a href="<?php echo base_url() . 'PerubahanPermintaan/index/1'?>">
													Disetujui
												</a>
											</li>
											<li>
												<a href="<?php echo base_url() . 'PerubahanPermintaan/index/2'?>">
													Tidak Disetujui
												</a>
											</li>
											<li>
												<a href="<?php echo base_url() . 'PerubahanPermintaan/index/3'?>">
													Batal
												</a>
											</li>
											<li>
												<a href="<?php echo base_url() . 'PermintaanMaterial/index/4'?>">
													Semua
												</a>
											</li>
										</ul>
									</li>
									<li class="nav-parent">
										<a title="Permintaan Material">
											<span>Permintaan Material Tambahan</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="<?php echo base_url() . 'PermintaanTambahan/index/0'?>">
													Belum Ditinjau <span class="badge badge-light">1</span>
												</a>
											</li>
											<li>
												<a href="<?php echo base_url() . 'PermintaanTambahan/index/1'?>">
													Disetujui
												</a>
											</li>
											<li>
												<a href="<?php echo base_url() . 'PermintaanTambahan/index/2'?>">
													Tidak Disetujui
												</a>
											</li>
											<li>
												<a href="<?php echo base_url() . 'PermintaanTambahan/index/3'?>">
													Batal
												</a>
											</li>
											<li>
												<a href="<?php echo base_url() . 'PermintaanTambahan/index/4'?>">
													Semua
												</a>
											</li>
										</ul>
									</li>
									<li class="nav-parent">
										<a title="Pengambilan Material Produksi">
											<span>Pengambilan Material Produksi</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="<?php echo base_url() . 'PerencanaanMaterial/index/1'?>">
													Pengambilan Hari Ini <span class="badge badge-light">2</span>
												</a>
											</li>
											<li>
												<a href="<?php echo base_url() . 'PerencanaanMaterial/index/1'?>">
													Semua Pengambilan <span class="badge badge-light">5</span>
												</a>
											</li>
											<li>
												<a href="<?php echo base_url() . 'PermintaanMaterial/jadwal'?>">
													Jadwal Pengambilan
												</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>

							<li class="nav-parent">
								<a>
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
									<span>Permintaan Pembelian</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?php echo base_url() . 'PermintaanPembelianMaterial/baru'?>">
											+ Request Baru
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'PermintaanPembelianMaterial/index/0'?>">
											Belum Ditindaklanjuti
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'PermintaanPembelianMaterial/index/1'?>">
											Dalam Proses
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'PermintaanPembelianMaterial/index/2'?>">
											Selesai
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'PermintaanPembelianMaterial/index/3'?>">
											Batal
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'PermintaanPembelianMaterial/index/4'?>">
											Semua
										</a>
									</li>
								</ul>
							</li>
							
							<li class="nav-parent">
								<a>
									<i class="fa fa-truck" aria-hidden="true"></i>
									<span>Delivery Note</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?php echo base_url() . 'DeliveryNote/index/0'?>">
											Dalam Proses
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'DeliveryNote/index/1'?>">
											Selesai
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'DeliveryNote/index/2'?>">
											Batal / Ditolak
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'DeliveryNote/index/3'?>">
											Semua
										</a>
									</li>
									<!-- <li>
										<a href="<?php echo base_url() . 'PengambilanMaterial/jadwal'?>">
											Jadwal Pengambilan
										</a>
									</li> -->
								</ul>
							</li>

							<li class="nav-parent">
								<a>
									<i class="fa fa-sign-in" aria-hidden="true"></i>
									<span>Pemasukan Material</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?php echo base_url() . 'PemasukanMaterial/pilih_baru'?>">
											Buat Baru
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'PemasukanMaterial'?>">
											Daftar Material Masuk
										</a>
									</li>
								</ul>
							</li>
							
							<li class="nav-parent">
								<a>
									<i class="fa fa-sign-out" aria-hidden="true"></i>
									<span>Pengeluaran Material</span>
								</a>
								<ul class="nav nav-children">
									<!--<li>
										<a href="<?php echo base_url() . 'PengeluaranMaterial/baru'?>">
											Buat Baru
										</a>
									</li> -->
									<li>
										<a href="<?php echo base_url() . 'PengeluaranMaterial'?>">
											Daftar Material Keluar
											<!-- material yg sudah keluar -->
										</a>
									</li>
								</ul>
							</li>
					
						
							<!-- produksi -->
								<!-- persediaan line -->
								<li>
									<a href="<?= base_url()?>inventoryLine">
										<i class="fa fa-bars" aria-hidden="true"></i>
										<span>Persediaan Line</span>
									</a>
								</li>
								<!-- prencanaan produksi -->
								<li class="nav-parent">
									<a title="Perencanaan Produksi">
										<i class="fa fa-calendar" aria-hidden="true"></i>
										<span>Perencanaan Produksi</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>perencanaanProduksi">
												+ Perencanaan Produksi
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>perencanaanProduksi/semua_perencanaan_produksi">
												Semua Perencanaan Produksi
											</a>
										</li>
									</ul>
								</li>
								<!-- perencanaan produksi line -->
								<li>
									<a href="<?= base_url()?>perencanaanProduksi/perencanaan_produksi_line0">
										<i class="fa fa-calendar-o" aria-hidden="true"></i>
										<span>Perencanaan Produksi Line</span>
									</a>
								</li>
								<!-- produksi tertunda -->
								<li class="nav-parent">
									<a title="Produksi Tertunda">
										<i class="fa fa-cogs" aria-hidden="true"></i>
										<span>Produksi Tertunda</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>produksiTertunda/semua">
												Semua
											</a>
										<li>
											<a href="<?= base_url()?>produksiTertunda/belum_diproses">
												Belum Diproses
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>produksiTertunda/sedang_diproses">
												Sedang Diproses
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>produksiTertunda/selesai">
												Selesai
											</a>
										</li>
									</ul>
								</li>
								<!-- permintaan material -->
								<li class="nav-parent">
									<a title="Permintaan Material">
										<i class="fa  fa-files-o" aria-hidden="true"></i>
										<?php if($jm_permat[0]['jumlah_permat'] == 0){?>
											<span>Permintaan Material</span>
										<?php } else{?>
											<span>Permintaan Material <span class="badge badge-light"><?= $jm_permat[0]['jumlah_permat']?></span></span>
										<?php } ?>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>permintaanMaterialProduksi">
													Semua Permintaan Material
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanMaterialProduksi/belum_ditindaklanjuti">
												<?php if($jm_permat_0[0]['jumlah_0'] == 0){?>
													Belum Ditindaklanjuti
												<?php } else{?>
													<span>Belum Ditindaklanjuti <span class="badge badge-light"><?= $jm_permat_0[0]['jumlah_0']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanMaterialProduksi/sedang_diproses">
												<?php if($jm_permat_1[0]['jumlah_1'] == 0){?>
													Sedang Diproses
												<?php } else{?>
													<span>Sedang Diproses <span class="badge badge-light"><?= $jm_permat_1[0]['jumlah_1']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanMaterialProduksi/material_tersedia">
												<?php if($jm_permat_2[0]['jumlah_2'] == 0){?>
													Material Tersedia
												<?php } else{?>
													<span>Material Tersedia <span class="badge badge-light"><?= $jm_permat_2[0]['jumlah_2']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanMaterialProduksi/selesai">
													Selesai
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanMaterialProduksi/batal">
												<?php if($jm_permat_4[0]['jumlah_4'] == 0){?>
													Batal
												<?php } else{?>
													<span>Batal <span class="badge badge-light"><?= $jm_permat_4[0]['jumlah_4']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanMaterialProduksi/ditolak">
												<?php if($jm_permat_5[0]['jumlah_5'] == 0){?>
													Ditolak
												<?php } else{?>
													<span>Ditolak <span class="badge badge-light"><?= $jm_permat_5[0]['jumlah_5']?></span></span>
												<?php } ?>
											</a>
										</li>
									</ul>
								</li>
								<!-- surat perintah lembur  -->
								<li class="nav-parent">
									<a title="Surat Perintah Lembur">
										<i class="fa  fa-file-text" aria-hidden="true"></i>
										<?php if($jm_spl[0]['jumlah_spl'] == 0){?>
											<span>Surat Perintah Lembur</span>
										<?php } else{?>
											<span>Surat Perintah Lembur <span class="badge badge-light"><?= $jm_spl[0]['jumlah_spl']?></span></span>
										<?php } ?>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>suratPerintahLembur/tambah">
												+ Surat Perintah Lembur
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratPerintahLembur/semua">
												Semua
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratPerintahLembur/belum_diproses">
												<?php if($jm_spl_0[0]['jumlah_spl'] == 0){?>
													<span>Belum Diproses</span>
												<?php } else{?>
													<span>Belum Diproses <span class="badge badge-light"><?= $jm_spl_0[0]['jumlah_spl']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratPerintahLembur/belum_disetujui">
												<?php if($jm_spl_1[0]['jumlah_spl'] == 0){?>
													<span>Belum Disetujui</span>
												<?php } else{?>
													<span>Belum Disetujui <span class="badge badge-light"><?= $jm_spl_1[0]['jumlah_spl']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratPerintahLembur/belum_dikonfirmasi">
												<?php if($jm_spl_2[0]['jumlah_spl'] == 0){?>
													<span>Belum Dikonfirmasi</span>
												<?php } else{?>
													<span>Belum Dikonfirmasi <span class="badge badge-light"><?= $jm_spl_2[0]['jumlah_spl']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratPerintahLembur/terkonfirmasi">
												Terkonfirmasi
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratPerintahLembur/batal">
												Batal
											</a>
										</li>
									</ul>
								</li>
								<!-- laporan lembur -->
								<li class="nav-parent">
									<a>
										<i class="fa fa-file" aria-hidden="true"></i>
										<?php if($jm_ll[0]['jumlah_ll'] == 0){?>
											<span>Laporan Lembur</span>
										<?php } else{?>
											<span>Laporan Lembur <span class="badge badge-light"><?= $jm_ll[0]['jumlah_ll']?></span></span>
										<?php } ?>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>laporanLembur/semua">
												Semua
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanLembur/belum_diproses">
												<?php if($jm_ll_3[0]['jumlah_ll'] == 0){?>
													<span>Belum Diproses</span>
												<?php } else{?>
													<span>Belum Diproses <span class="badge badge-light"><?= $jm_ll_3[0]['jumlah_ll']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanLembur/sudah_diproses">
												<?php if($jm_ll_4[0]['jumlah_ll'] == 0){?>
													<span>Sudah Diproses</span>
												<?php } else{?>
													<span>Sudah Diproses <span class="badge badge-light"><?= $jm_ll_4[0]['jumlah_ll']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanLembur/selesai">
												Selesai
											</a>
										</li>
									</ul>
								</li>
								<!-- laporan hasil produksi -->
								<li class="nav-parent">
									<a>
										<i class="fa fa-paste" aria-hidden="true"></i>
										<?php if($jm_hasprod[0]['jumlah_hasprod'] == 0){?>
											<!--
											<span>Laporan Hasil Produksi</span>
											-->
										<?php } else{?>
											<!--
											<span>Laporan Hasil Produksi <span class="badge badge-light"><?= $jm_hasprod[0]['jumlah_hasprod']?></span></span>
											-->
										<?php } ?>
										<span>Laporan Hasil Produksi</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>hasilProduksi/tambah_hasil_produksi">
												<?php if($jm_hasprod[0]['jumlah_hasprod'] == 0){?>
													<!--
													<span>+ Laporan Hasil Produksi</span>
													-->
												<?php } else{?>
													<!--
													<span>+ Laporan Hasil Produksi <span class="badge badge-light"><?= $jm_hasprod[0]['jumlah_hasprod']?></span></span>
													-->
												<?php } ?>
												<span>+ Laporan Hasil Produksi</span>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>hasilProduksi/semua_hasil_produksi">
												<span>Semua</span>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>hasilProduksi/lengkap_hasil_produksi">
												<span>Lengkap</span>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>hasilProduksi/selesai_hasil_produksi">
												<span>Selesai</span>
											</a>
										</li>
									</ul>
								</li>
								<!-- laporan perencanaan cutting -->
								<li class="nav-parent">
									<a>
										<i class="fa fa-files-o" aria-hidden="true"></i>
										<?php if($jm_percut[0]['jumlah_percut'] == 0){?>
											<span>Laporan Perencanaan Cutting</span>
										<?php } else{?>
											<span>Laporan Perencanaan Cutting <span class="badge badge-light"><?= $jm_percut[0]['jumlah_percut']?></span></span>
										<?php } ?>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>laporanPerencanaanCutting/index">
												<span>+ Laporan Perencanaan Cutting </span>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanPerencanaanCutting/semua">
												<span>Semua</span>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanPerencanaanCutting/belum_ada">
												<?php if($jm_percut_0[0]['jumlah_percut'] == 0){?>
													<span>Belum Ada Laporan</span>
												<?php } else{?>
													<span>Belum Ada Laporan <span class="badge badge-light"><?= $jm_percut_0[0]['jumlah_percut']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanPerencanaanCutting/sudah_ada">
												<?php if($jm_percut_1[0]['jumlah_percut'] == 0){?>
													<span>Sudah Ada Laporan</span>
												<?php } else{?>
													<span>Sudah Ada Laporan <span class="badge badge-light"><?= $jm_percut_1[0]['jumlah_percut']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanPerencanaanCutting/selesai">
												<span>Selesai </span>
											</a>
										</li>
									</ul>
								</li>
								<!-- permohonan akses -->
								<li class="nav-parent">
									<a title="Permohonan Akses">
										<i class="fa   fa-unlock-alt" aria-hidden="true"></i>
										<?php if($jm_peraks[0]['jumlah_peraks'] == 0){?>
											<span>Permohonan Akses</span>
										<?php } else{?>
											<span>Permohonan Akses <span class="badge badge-light"><?= $jm_peraks[0]['jumlah_peraks']?></span></span>
										<?php } ?>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>permohonanAkses/semua">
												Semua
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permohonanAkses/belum_disetujui">
												<?php if($jm_peraks[0]['jumlah_peraks'] == 0){?>
													<span>Belum Disetujui</span>
												<?php } else{?>
													<span>Belum Disetujui <span class="badge badge-light"><?= $jm_peraks[0]['jumlah_peraks']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permohonanAkses/disetujui">
												Disetujui
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permohonanAkses/tidak_disetujui">
												Tidak Disetujui
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permohonanAkses/selesai">
												Selesai
											</a>
										</li>
									</ul>
								</li>
								<!-- pengambilan material -->
								<li class="nav-parent">
									<a>
										<i class="fa fa-plus-square" aria-hidden="true"></i>
										<span>Pengambilan Material</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>pengambilanMaterialProduksi/tambah0">
												+ Pengambilan Material
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>pengambilanMaterialProduksi/semua_pengambilan_material0">
												Semua
											</a>
										</li>
										<li>
										<a href="<?= base_url()?>pengambilanMaterialProduksi/belum_diambil_pengambilan_material0">
											Belum Diambil
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>pengambilanMaterialProduksi/sudah_diambil_pengambilan_material0">
											Sudah Diambil
										</a>
									</li>
									</ul>
								</li>
								<!-- permintaan material tambahan -->
								<li class="nav-parent">
									<a>
										<i class="fa fa-plus-square-o" aria-hidden="true"></i>
											<span>Permintaan Material Tambahan</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>permintaanTambahan/tambah0">
												+ Permintaan Material Tambahan
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanTambahan/semua0">
												Semua 
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanTambahan/belum_diproses0">
												<span>Belum Diproses</span>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanTambahan/diterima0">
													<span>Diterima</span>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanTambahan/ditolak0">
													<span>Ditolak</span>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanTambahan/selesai0">
												Selesai
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanTambahan/batal0">
												Batal
											</a>
										</li>
									</ul>
								</li>
								<!-- bpbj -->
								<li class="nav-parent">
									<a>
										<i class="fa fa-file-text-o" aria-hidden="true"></i>
										<?php if($jm_bpbj[0]['jumlah_bpbj'] == 0){?>
											<span>BPBJ</span>
										<?php } else{?>
											<span>BPBJ <span class="badge badge-light"><?= $jm_bpbj[0]['jumlah_bpbj']?></span></span>
										<?php } ?>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>bpbj/tambah_bpbj">
												+ BPBJ
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>bpbj/semua_bpbj">
												Semua
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>bpbj/bpbj_belum_diproses">
												<?php if($jm_bpbj_0[0]['jumlah_bpbj'] == 0){?>
													<span>Belum Diproses</span>
												<?php } else{?>
													<span>Belum Diproses <span class="badge badge-light"><?= $jm_bpbj_0[0]['jumlah_bpbj']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>bpbj/bpbj_sedang_diproses">
												<?php if($jm_bpbj_1[0]['jumlah_bpbj'] == 0){?>
													<span>Sedang Diproses</span>
												<?php } else{?>
													<span>Sedang Diproses <span class="badge badge-light"><?= $jm_bpbj_1[0]['jumlah_bpbj']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>bpbj/bpbj_selesai">
												Selesai
											</a>
										</li>
									</ul>
								</li>
								<!-- bpbd -->
								<li class="nav-parent">
									<a>
										<i class="fa fa-file-o" aria-hidden="true"></i>
										<?php if($jm_bpbd[0]['jumlah_bpbd'] == 0){?>
											<span>BPDB</span>
										<?php } else{?>
											<span>BPDB <span class="badge badge-light"><?= $jm_bpbd[0]['jumlah_bpbd']?></span></span>
										<?php } ?>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>bpbd/tambah_bpbd">
												+ BPDB
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>bpbd/semua_bpbd">
												Semua
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>bpbd/belum_konfirmasi_bpbd">
												<?php if($jm_bpbd[0]['jumlah_bpbd'] == 0){?>
													<span>Belum Konfirmasi</span>
												<?php } else{?>
													<span>Belum Konfirmasi <span class="badge badge-light"><?= $jm_bpbd[0]['jumlah_bpbd']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>bpbd/terkonfirmasi_bpbd">
												Terkonfirmasi
											</a>
										</li>
									</ul>
								</li>
								<!-- surat jalan -->
								<li class="nav-parent">
									<a>
										<i class="fa fa-envelope" aria-hidden="true"></i>
										<?php if($jm_sj[0]['jumlah_sj'] == 0){?>
											<span>Surat Jalan</span>
										<?php } else{?>
											<span>Surat Jalan <span class="badge badge-light"><?= $jm_sj[0]['jumlah_sj']?></span></span>
										<?php } ?>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>suratJalan">
												+ Surat Jalan
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratJalan/semua_surat_jalan">
												Semua
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratJalan/belum_dikonfirmasi_surat_jalan">
											<?php if($jm_sj_0[0]['jumlah_sj'] == 0){?>
												<span>Belum Dikonfirmasi</span>
											<?php } else{?>
												<span>Belum Dikonfirmasi <span class="badge badge-light"><?= $jm_sj_0[0]['jumlah_sj']?></span></span>
											<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratJalan/terkonfirmasi_surat_jalan">
												<?php if($jm_sj_1[0]['jumlah_sj'] == 0){?>
													<span>Terkonfirmasi</span>
												<?php } else{?>
													<span>Terkonfirmasi <span class="badge badge-light"><?= $jm_sj_1[0]['jumlah_sj']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratJalan/selesai_surat_jalan">
												Selesai
											</a>
										</li>
									</ul>
								</li>
								<!-- invoice -->
								<li class="nav-parent">
									<a>
										<i class="fa fa-file-text" aria-hidden="true"></i>
										<?php if($jm_invoice[0]['jumlah_invoice'] == 0){?>
											<span>Invoice</span>
										<?php } else{?>
											<span>Invoice <span class="badge badge-light"><?= $jm_invoice[0]['jumlah_invoice']?></span></span>
										<?php } ?>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>invoice">
												+ Invoice
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>invoice/semua_invoice">
												Semua
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>invoice/belum_diproses_invoice">
											<?php if($jm_invoice[0]['jumlah_invoice'] == 0){?>
												<span>Belum Diproses</span>
											<?php } else{?>
												<span>Belum Diproses <span class="badge badge-light"><?= $jm_invoice[0]['jumlah_invoice']?></span></span>
											<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>invoice/selesai_invoice">
												Selesai
											</a>
										</li>
									</ul>
								</li>
								<!-- process cost -->
								<li>
									<a href="<?= base_url()?>processCost">
										<i class="fa fa-money" aria-hidden="true"></i>
										<span>Process Cost</span>
									</a>
								</li>
							<!-- -->
						<?php
							}
						?>
					<!-- -->

					<!-- Manager -->
						<?php if(($_SESSION['nama_jabatan'] == "Manager") && ($_SESSION['nama_departemen'] == "Management")){?>
							<li class="nav-parent">
								<a>
									<i class="fa fa-database" aria-hidden="true"></i>
									<span>Master Data</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>produk">
											Produk
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>jenisProduk">
											Jenis Produk
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>ukuranProduk">
											Ukuran Produk
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>warna">
											Warna Produk
										</a>
									</li>
								</ul>
							</li>
							
							<!-- produksi -->
								<!-- persediaan line -->
								<li>
									<a href="<?= base_url()?>inventoryLine">
										<i class="fa fa-bars" aria-hidden="true"></i>
										<span>Persediaan Line</span>
									</a>
								</li>
								<!-- prencanaan produksi -->
								<li class="nav-parent">
									<a title="Perencanaan Produksi">
										<i class="fa fa-calendar" aria-hidden="true"></i>
										<span>Perencanaan Produksi</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>perencanaanProduksi">
												+ Perencanaan Produksi
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>perencanaanProduksi/semua_perencanaan_produksi">
												Semua Perencanaan Produksi
											</a>
										</li>
									</ul>
								</li>
								<!-- perencanaan produksi line -->
								<li>
									<a href="<?= base_url()?>perencanaanProduksi/perencanaan_produksi_line0">
										<i class="fa fa-calendar-o" aria-hidden="true"></i>
										<span>Perencanaan Produksi Line</span>
									</a>
								</li>
								<!-- produksi tertunda -->
								<li class="nav-parent">
									<a title="Produksi Tertunda">
										<i class="fa fa-cogs" aria-hidden="true"></i>
										<span>Produksi Tertunda</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>produksiTertunda/semua">
												Semua
											</a>
										<li>
											<a href="<?= base_url()?>produksiTertunda/belum_diproses">
												Belum Diproses
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>produksiTertunda/sedang_diproses">
												Sedang Diproses
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>produksiTertunda/selesai">
												Selesai
											</a>
										</li>
									</ul>
								</li>
								<!-- permintaan material -->
								<li class="nav-parent">
									<a title="Permintaan Material">
										<i class="fa  fa-files-o" aria-hidden="true"></i>
										<?php if($jm_permat[0]['jumlah_permat'] == 0){?>
											<span>Permintaan Material</span>
										<?php } else{?>
											<span>Permintaan Material <span class="badge badge-light"><?= $jm_permat[0]['jumlah_permat']?></span></span>
										<?php } ?>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>permintaanMaterialProduksi">
													Semua Permintaan Material
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanMaterialProduksi/belum_ditindaklanjuti">
												<?php if($jm_permat_0[0]['jumlah_0'] == 0){?>
													Belum Ditindaklanjuti
												<?php } else{?>
													<span>Belum Ditindaklanjuti <span class="badge badge-light"><?= $jm_permat_0[0]['jumlah_0']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanMaterialProduksi/sedang_diproses">
												<?php if($jm_permat_1[0]['jumlah_1'] == 0){?>
													Sedang Diproses
												<?php } else{?>
													<span>Sedang Diproses <span class="badge badge-light"><?= $jm_permat_1[0]['jumlah_1']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanMaterialProduksi/material_tersedia">
												<?php if($jm_permat_2[0]['jumlah_2'] == 0){?>
													Material Tersedia
												<?php } else{?>
													<span>Material Tersedia <span class="badge badge-light"><?= $jm_permat_2[0]['jumlah_2']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanMaterialProduksi/selesai">
													Selesai
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanMaterialProduksi/batal">
												<?php if($jm_permat_4[0]['jumlah_4'] == 0){?>
													Batal
												<?php } else{?>
													<span>Batal <span class="badge badge-light"><?= $jm_permat_4[0]['jumlah_4']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanMaterialProduksi/ditolak">
												<?php if($jm_permat_5[0]['jumlah_5'] == 0){?>
													Ditolak
												<?php } else{?>
													<span>Ditolak <span class="badge badge-light"><?= $jm_permat_5[0]['jumlah_5']?></span></span>
												<?php } ?>
											</a>
										</li>
									</ul>
								</li>
								<!-- surat perintah lembur  -->
								<li class="nav-parent">
									<a title="Surat Perintah Lembur">
										<i class="fa  fa-file-text" aria-hidden="true"></i>
										<?php if($jm_spl[0]['jumlah_spl'] == 0){?>
											<span>Surat Perintah Lembur</span>
										<?php } else{?>
											<span>Surat Perintah Lembur <span class="badge badge-light"><?= $jm_spl[0]['jumlah_spl']?></span></span>
										<?php } ?>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>suratPerintahLembur/tambah">
												+ Surat Perintah Lembur
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratPerintahLembur/semua">
												Semua
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratPerintahLembur/belum_diproses">
												<?php if($jm_spl_0[0]['jumlah_spl'] == 0){?>
													<span>Belum Diproses</span>
												<?php } else{?>
													<span>Belum Diproses <span class="badge badge-light"><?= $jm_spl_0[0]['jumlah_spl']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratPerintahLembur/belum_disetujui">
												<?php if($jm_spl_1[0]['jumlah_spl'] == 0){?>
													<span>Belum Disetujui</span>
												<?php } else{?>
													<span>Belum Disetujui <span class="badge badge-light"><?= $jm_spl_1[0]['jumlah_spl']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratPerintahLembur/belum_dikonfirmasi">
												<?php if($jm_spl_2[0]['jumlah_spl'] == 0){?>
													<span>Belum Dikonfirmasi</span>
												<?php } else{?>
													<span>Belum Dikonfirmasi <span class="badge badge-light"><?= $jm_spl_2[0]['jumlah_spl']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratPerintahLembur/terkonfirmasi">
												Terkonfirmasi
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratPerintahLembur/batal">
												Batal
											</a>
										</li>
									</ul>
								</li>
								<!-- laporan lembur -->
								<li class="nav-parent">
									<a>
										<i class="fa fa-file" aria-hidden="true"></i>
										<?php if($jm_ll[0]['jumlah_ll'] == 0){?>
											<span>Laporan Lembur</span>
										<?php } else{?>
											<span>Laporan Lembur <span class="badge badge-light"><?= $jm_ll[0]['jumlah_ll']?></span></span>
										<?php } ?>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>laporanLembur/semua">
												Semua
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanLembur/belum_diproses">
												<?php if($jm_ll_3[0]['jumlah_ll'] == 0){?>
													<span>Belum Diproses</span>
												<?php } else{?>
													<span>Belum Diproses <span class="badge badge-light"><?= $jm_ll_3[0]['jumlah_ll']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanLembur/sudah_diproses">
												<?php if($jm_ll_4[0]['jumlah_ll'] == 0){?>
													<span>Sudah Diproses</span>
												<?php } else{?>
													<span>Sudah Diproses <span class="badge badge-light"><?= $jm_ll_4[0]['jumlah_ll']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanLembur/selesai">
												Selesai
											</a>
										</li>
									</ul>
								</li>
								<!-- laporan hasil produksi -->
								<li class="nav-parent">
									<a>
										<i class="fa fa-paste" aria-hidden="true"></i>
										<?php if($jm_hasprod[0]['jumlah_hasprod'] == 0){?>
											<!--
											<span>Laporan Hasil Produksi</span>
											-->
										<?php } else{?>
											<!--
											<span>Laporan Hasil Produksi <span class="badge badge-light"><?= $jm_hasprod[0]['jumlah_hasprod']?></span></span>
											-->
										<?php } ?>
										<span>Laporan Hasil Produksi</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>hasilProduksi/tambah_hasil_produksi">
												<?php if($jm_hasprod[0]['jumlah_hasprod'] == 0){?>
													<!--
													<span>+ Laporan Hasil Produksi</span>
													-->
												<?php } else{?>
													<!--
													<span>+ Laporan Hasil Produksi <span class="badge badge-light"><?= $jm_hasprod[0]['jumlah_hasprod']?></span></span>
													-->
												<?php } ?>
												<span>+ Laporan Hasil Produksi</span>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>hasilProduksi/semua_hasil_produksi">
												<span>Semua</span>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>hasilProduksi/lengkap_hasil_produksi">
												<span>Lengkap</span>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>hasilProduksi/selesai_hasil_produksi">
												<span>Selesai</span>
											</a>
										</li>
									</ul>
								</li>
								<!-- laporan perencanaan cutting -->
								<li class="nav-parent">
									<a>
										<i class="fa fa-files-o" aria-hidden="true"></i>
										<?php if($jm_percut[0]['jumlah_percut'] == 0){?>
											<span>Laporan Perencanaan Cutting</span>
										<?php } else{?>
											<span>Laporan Perencanaan Cutting <span class="badge badge-light"><?= $jm_percut[0]['jumlah_percut']?></span></span>
										<?php } ?>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>laporanPerencanaanCutting/index">
												<span>+ Laporan Perencanaan Cutting </span>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanPerencanaanCutting/semua">
												<span>Semua</span>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanPerencanaanCutting/belum_ada">
												<?php if($jm_percut_0[0]['jumlah_percut'] == 0){?>
													<span>Belum Ada Laporan</span>
												<?php } else{?>
													<span>Belum Ada Laporan <span class="badge badge-light"><?= $jm_percut_0[0]['jumlah_percut']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanPerencanaanCutting/sudah_ada">
												<?php if($jm_percut_1[0]['jumlah_percut'] == 0){?>
													<span>Sudah Ada Laporan</span>
												<?php } else{?>
													<span>Sudah Ada Laporan <span class="badge badge-light"><?= $jm_percut_1[0]['jumlah_percut']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanPerencanaanCutting/selesai">
												<span>Selesai </span>
											</a>
										</li>
									</ul>
								</li>
								<!-- permohonan akses -->
								<li class="nav-parent">
									<a title="Permohonan Akses">
										<i class="fa   fa-unlock-alt" aria-hidden="true"></i>
										<?php if($jm_peraks[0]['jumlah_peraks'] == 0){?>
											<span>Permohonan Akses</span>
										<?php } else{?>
											<span>Permohonan Akses <span class="badge badge-light"><?= $jm_peraks[0]['jumlah_peraks']?></span></span>
										<?php } ?>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>permohonanAkses/semua">
												Semua
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permohonanAkses/belum_disetujui">
												<?php if($jm_peraks[0]['jumlah_peraks'] == 0){?>
													<span>Belum Disetujui</span>
												<?php } else{?>
													<span>Belum Disetujui <span class="badge badge-light"><?= $jm_peraks[0]['jumlah_peraks']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permohonanAkses/disetujui">
												Disetujui
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permohonanAkses/tidak_disetujui">
												Tidak Disetujui
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permohonanAkses/selesai">
												Selesai
											</a>
										</li>
									</ul>
								</li>
								<!-- pengambilan material -->
								<li class="nav-parent">
									<a>
										<i class="fa fa-plus-square" aria-hidden="true"></i>
										<span>Pengambilan Material</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>pengambilanMaterialProduksi/tambah0">
												+ Pengambilan Material
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>pengambilanMaterialProduksi/semua_pengambilan_material0">
												Semua
											</a>
										</li>
										<li>
										<a href="<?= base_url()?>pengambilanMaterialProduksi/belum_diambil_pengambilan_material0">
											Belum Diambil
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>pengambilanMaterialProduksi/sudah_diambil_pengambilan_material0">
											Sudah Diambil
										</a>
									</li>
									</ul>
								</li>
								<!-- permintaan material tambahan -->
								<li class="nav-parent">
									<a>
										<i class="fa fa-plus-square-o" aria-hidden="true"></i>
											<span>Permintaan Material Tambahan</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>permintaanTambahan/tambah0">
												+ Permintaan Material Tambahan
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanTambahan/semua0">
												Semua 
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanTambahan/belum_diproses0">
												<span>Belum Diproses</span>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanTambahan/diterima0">
													<span>Diterima</span>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanTambahan/ditolak0">
													<span>Ditolak</span>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanTambahan/selesai0">
												Selesai
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanTambahan/batal0">
												Batal
											</a>
										</li>
									</ul>
								</li>
								<!-- bpbj -->
								<li class="nav-parent">
									<a>
										<i class="fa fa-file-text-o" aria-hidden="true"></i>
										<?php if($jm_bpbj[0]['jumlah_bpbj'] == 0){?>
											<span>BPBJ</span>
										<?php } else{?>
											<span>BPBJ <span class="badge badge-light"><?= $jm_bpbj[0]['jumlah_bpbj']?></span></span>
										<?php } ?>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>bpbj/tambah_bpbj">
												+ BPBJ
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>bpbj/semua_bpbj">
												Semua
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>bpbj/bpbj_belum_diproses">
												<?php if($jm_bpbj_0[0]['jumlah_bpbj'] == 0){?>
													<span>Belum Diproses</span>
												<?php } else{?>
													<span>Belum Diproses <span class="badge badge-light"><?= $jm_bpbj_0[0]['jumlah_bpbj']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>bpbj/bpbj_sedang_diproses">
												<?php if($jm_bpbj_1[0]['jumlah_bpbj'] == 0){?>
													<span>Sedang Diproses</span>
												<?php } else{?>
													<span>Sedang Diproses <span class="badge badge-light"><?= $jm_bpbj_1[0]['jumlah_bpbj']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>bpbj/bpbj_selesai">
												Selesai
											</a>
										</li>
									</ul>
								</li>
								<!-- bpbd -->
								<li class="nav-parent">
									<a>
										<i class="fa fa-file-o" aria-hidden="true"></i>
										<?php if($jm_bpbd[0]['jumlah_bpbd'] == 0){?>
											<span>BPDB</span>
										<?php } else{?>
											<span>BPDB <span class="badge badge-light"><?= $jm_bpbd[0]['jumlah_bpbd']?></span></span>
										<?php } ?>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>bpbd/tambah_bpbd">
												+ BPDB
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>bpbd/semua_bpbd">
												Semua
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>bpbd/belum_konfirmasi_bpbd">
												<?php if($jm_bpbd[0]['jumlah_bpbd'] == 0){?>
													<span>Belum Konfirmasi</span>
												<?php } else{?>
													<span>Belum Konfirmasi <span class="badge badge-light"><?= $jm_bpbd[0]['jumlah_bpbd']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>bpbd/terkonfirmasi_bpbd">
												Terkonfirmasi
											</a>
										</li>
									</ul>
								</li>
								<!-- surat jalan -->
								<li class="nav-parent">
									<a>
										<i class="fa fa-envelope" aria-hidden="true"></i>
										<?php if($jm_sj[0]['jumlah_sj'] == 0){?>
											<span>Surat Jalan</span>
										<?php } else{?>
											<span>Surat Jalan <span class="badge badge-light"><?= $jm_sj[0]['jumlah_sj']?></span></span>
										<?php } ?>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>suratJalan">
												+ Surat Jalan
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratJalan/semua_surat_jalan">
												Semua
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratJalan/belum_dikonfirmasi_surat_jalan">
											<?php if($jm_sj_0[0]['jumlah_sj'] == 0){?>
												<span>Belum Dikonfirmasi</span>
											<?php } else{?>
												<span>Belum Dikonfirmasi <span class="badge badge-light"><?= $jm_sj_0[0]['jumlah_sj']?></span></span>
											<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratJalan/terkonfirmasi_surat_jalan">
												<?php if($jm_sj_1[0]['jumlah_sj'] == 0){?>
													<span>Terkonfirmasi</span>
												<?php } else{?>
													<span>Terkonfirmasi <span class="badge badge-light"><?= $jm_sj_1[0]['jumlah_sj']?></span></span>
												<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratJalan/selesai_surat_jalan">
												Selesai
											</a>
										</li>
									</ul>
								</li>
								<!-- invoice -->
								<li class="nav-parent">
									<a>
										<i class="fa fa-file-text" aria-hidden="true"></i>
										<?php if($jm_invoice[0]['jumlah_invoice'] == 0){?>
											<span>Invoice</span>
										<?php } else{?>
											<span>Invoice <span class="badge badge-light"><?= $jm_invoice[0]['jumlah_invoice']?></span></span>
										<?php } ?>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>invoice">
												+ Invoice
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>invoice/semua_invoice">
												Semua
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>invoice/belum_diproses_invoice">
											<?php if($jm_invoice[0]['jumlah_invoice'] == 0){?>
												<span>Belum Diproses</span>
											<?php } else{?>
												<span>Belum Diproses <span class="badge badge-light"><?= $jm_invoice[0]['jumlah_invoice']?></span></span>
											<?php } ?>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>invoice/selesai_invoice">
												Selesai
											</a>
										</li>
									</ul>
								</li>
							<!-- -->
						<?php }?>
					<!--  -->

					<!-- PPIC -->
						<?php if(($_SESSION['nama_jabatan'] == "PPIC") && ($_SESSION['nama_departemen'] == "Produksi")){?>
							<!-- produk -->
							<li>
								<a href="<?= base_url()?>produk" title="Produk">
									<i class="fa  fa-cubes" aria-hidden="true"></i>
									<span>Produk</span>
								</a>
							</li>
							<!-- inventory line -->
							<li>
								<a href="<?= base_url()?>inventoryLine">
									<i class="fa  fa-bars" aria-hidden="true"></i>
									<span>Persediaan Line</span>
								</a>
							</li>
							<!-- perencanaan produksi -->
							<li class="nav-parent">
								<a title="Perencanaan Produksi">
									<i class="fa fa-calendar" aria-hidden="true"></i>
									<span>Perencanaan Produksi</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>perencanaanProduksi">
											+ Perencanaan Produksi
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>perencanaanProduksi/semua_perencanaan_produksi">
											Semua Perencanaan Produksi
										</a>
									</li>
								</ul>
							</li>
							<!-- perencanaan produksi line -->
							<li>
								<a href="<?= base_url()?>perencanaanProduksi/perencanaan_produksi_line0">
									<i class="fa fa-calendar-o" aria-hidden="true"></i>
									<span>Perencanaan Produksi Line</span>
								</a>
							</li>
							<!-- produksi tertunda -->
							<li class="nav-parent">
								<a title="Produksi Tertunda">
									<i class="fa fa-cogs" aria-hidden="true"></i>
									<span>Produksi Tertunda</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>produksiTertunda/semua">
											Semua
										</a>
									<li>
										<a href="<?= base_url()?>produksiTertunda/belum_diproses">
											Belum Diproses
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>produksiTertunda/sedang_diproses">
											Sedang Diproses
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>produksiTertunda/selesai">
											Selesai
										</a>
									</li>
								</ul>
							</li>
							<!-- permintaan material -->
							<li class="nav-parent">
								<a title="Permintaan Material">
									<i class="fa fa-files-o" aria-hidden="true"></i>
									<?php if($jm_permat[0]['jumlah_permat'] == 0){?>
										<span>Permintaan Material</span>
									<?php } else{?>
										<span>Permintaan Material <span class="badge badge-light"><?= $jm_permat[0]['jumlah_permat']?></span></span>
									<?php } ?>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>permintaanMaterialProduksi">
												Semua Permintaan Material
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permintaanMaterialProduksi/belum_ditindaklanjuti">
											<?php if($jm_permat_0[0]['jumlah_0'] == 0){?>
												Belum Ditindaklanjuti
											<?php } else{?>
												<span>Belum Ditindaklanjuti <span class="badge badge-light"><?= $jm_permat_0[0]['jumlah_0']?></span></span>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permintaanMaterialProduksi/sedang_diproses">
											<?php if($jm_permat_1[0]['jumlah_1'] == 0){?>
												Sedang Diproses
											<?php } else{?>
												<span>Sedang Diproses <span class="badge badge-light"><?= $jm_permat_1[0]['jumlah_1']?></span></span>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permintaanMaterialProduksi/material_tersedia">
											<?php if($jm_permat_2[0]['jumlah_2'] == 0){?>
												Material Tersedia
											<?php } else{?>
												<span>Material Tersedia <span class="badge badge-light"><?= $jm_permat_2[0]['jumlah_2']?></span></span>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permintaanMaterialProduksi/selesai">
												Selesai
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permintaanMaterialProduksi/batal">
											<?php if($jm_permat_4[0]['jumlah_4'] == 0){?>
												Batal
											<?php } else{?>
												<span>Batal <span class="badge badge-light"><?= $jm_permat_4[0]['jumlah_4']?></span></span>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permintaanMaterialProduksi/ditolak">
											<?php if($jm_permat_5[0]['jumlah_5'] == 0){?>
												Ditolak
											<?php } else{?>
												<span>Ditolak <span class="badge badge-light"><?= $jm_permat_5[0]['jumlah_5']?></span></span>
											<?php } ?>
										</a>
									</li>
								</ul>
							</li>
							<!-- laporan hasil produksi -->
							<li class="nav-parent">
								<a>
									<i class="fa fa-paste" aria-hidden="true"></i>
									<span>Laporan Hasil Produksi</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>hasilProduksi/semua_hasil_produksi">
											<span>Semua</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>hasilProduksi/lengkap_hasil_produksi">
											<span>Lengkap</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>hasilProduksi/selesai_hasil_produksi">
											<span>Selesai</span>
										</a>
									</li>
								</ul>
							</li>
							<!-- laporan perencanaan cutting -->
							<li class="nav-parent">
								<a>
									<i class="fa fa-files-o" aria-hidden="true"></i>
									<span>Laporan Perencanaan Cutting</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>laporanPerencanaanCutting/semua">
											<span>Semua</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>laporanPerencanaanCutting/belum_ada">
											<span>Belum Ada Laporan </span>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>laporanPerencanaanCutting/sudah_ada">
											<span>Sudah Ada Laporan</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>laporanPerencanaanCutting/selesai">
											<span>Selesai </span>
										</a>
									</li>
								</ul>
							</li>
							<!-- surat perintah lembur -->
							<li class="nav-parent">
								<a title="Surat Perintah Lembur">
									<i class="fa  fa-file-text" aria-hidden="true"></i>
									<?php if($jm_spl[0]['jumlah_spl'] == 0){?>
										<span>Surat Perintah Lembur</span>
									<?php } else{?>
										<span>Surat Perintah Lembur<span class="badge badge-light"><?= $jm_spl[0]['jumlah_spl']?></span></span>
									<?php } ?>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>suratPerintahLembur/tambah">
											+ Surat Perintah Lembur
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>suratPerintahLembur/semua">
											Semua
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>suratPerintahLembur/belum_diproses">
											<?php if($jm_spl_0[0]['jumlah_spl'] == 0){?>
												<span>Belum Diproses</span>
											<?php } else{?>
												<span>Belum Diproses <span class="badge badge-light"><?= $jm_spl_0[0]['jumlah_spl']?></span></span>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>suratPerintahLembur/belum_disetujui">
											<?php if($jm_spl_1[0]['jumlah_spl'] == 0){?>
												<span>Belum Disetujui</span>
											<?php } else{?>
												<span>Belum Disetujui <span class="badge badge-light"><?= $jm_spl_1[0]['jumlah_spl']?></span></span>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>suratPerintahLembur/belum_dikonfirmasi">
											<?php if($jm_spl_2[0]['jumlah_spl'] == 0){?>
												<span>Belum Dikonfirmasi</span>
											<?php } else{?>
												<span>Belum Dikonfirmasi <span class="badge badge-light"><?= $jm_spl_2[0]['jumlah_spl']?></span></span>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>suratPerintahLembur/terkonfirmasi">
											Terkonfirmasi
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>suratPerintahLembur/batal">
											Batal
										</a>
									</li>
								</ul>
							</li>
							<!-- laporan lembur -->
							<li class="nav-parent">
								<a>
									<i class="fa fa-file" aria-hidden="true"></i>
									<?php if($jm_ll[0]['jumlah_ll'] == 0){?>
										<span>Laporan Lembur</span>
									<?php } else{?>
										<span>Laporan Lembur <span class="badge badge-light"><?= $jm_ll[0]['jumlah_ll']?></span></span>
									<?php } ?>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>laporanLembur/semua">
											Semua
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>laporanLembur/belum_diproses">
											<?php if($jm_ll_3[0]['jumlah_ll'] == 0){?>
												<span>Belum Diproses</span>
											<?php } else{?>
												<span>Belum Diproses <span class="badge badge-light"><?= $jm_ll_3[0]['jumlah_ll']?></span></span>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>laporanLembur/sudah_diproses">
											<?php if($jm_ll_4[0]['jumlah_ll'] == 0){?>
												<span>Sudah Diproses</span>
											<?php } else{?>
												<span>Sudah Diproses <span class="badge badge-light"><?= $jm_ll_4[0]['jumlah_ll']?></span></span>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>laporanLembur/selesai">
											Selesai
										</a>
									</li>
								</ul>
							</li>
						<?php }?>
					<!--  -->

					<!-- PIC -->
						<?php if(($_SESSION['nama_jabatan'] == "PIC Line Cutting") && ($_SESSION['nama_departemen'] == "Produksi") || 
								($_SESSION['nama_jabatan'] == "PIC Line Bonding") && ($_SESSION['nama_departemen'] == "Produksi") || 
								($_SESSION['nama_jabatan'] == "PIC Line Sewing") && ($_SESSION['nama_departemen'] == "Produksi") || 
								($_SESSION['nama_jabatan'] == "PIC Line Assy") && ($_SESSION['nama_departemen'] == "Produksi")){?>
							<!-- produk -->
							<li>
								<a href="<?= base_url()?>produk" title="Produk">
									<i class="fa  fa-cubes" aria-hidden="true"></i>
									<span>Produk</span>
								</a>
							</li>
							<!-- inventory line -->
							<li>
								<a href="<?= base_url()?>inventoryLine">
									<i class="fa  fa-bars" aria-hidden="true"></i>
									<span>Persediaan Line</span>
								</a>
							</li>
							<!-- perencanaan produksi line -->
							<li>
								<a href="<?= base_url()?>perencanaanProduksi/perencanaan_produksi_line">
									<i class="fa fa-calendar-o" aria-hidden="true"></i>
									<span>Perencanaan Produksi Line</span>
								</a>
							</li>
							<!-- pengambilan material -->
							<li class="nav-parent">
								<a>
									<i class="fa fa-plus-square" aria-hidden="true"></i>
									<?php if($jm_pengmat[0]['jumlah_pengmat'] == 0){?>
										<span>Pengambilan Material</span>
									<?php } else{?>
										<span>Pengambilan Material <span class="badge badge-light"><?= $jm_pengmat[0]['jumlah_pengmat']?></span></span>
									<?php } ?>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>pengambilanMaterialProduksi/tambah">
											+ Pengambilan Material
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>pengambilanMaterialProduksi/semua_pengambilan_material">
											Semua
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>pengambilanMaterialProduksi/belum_diambil_pengambilan_material">
											<?php if($jm_pengmat[0]['jumlah_pengmat'] == 0){?>
												<span>Belum Diambil</span>
											<?php } else{?>
												<span>Belum Diambil <span class="badge badge-light"><?= $jm_pengmat[0]['jumlah_pengmat']?></span></span>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>pengambilanMaterialProduksi/sudah_diambil_pengambilan_material">
											Sudah Diambil
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>pengambilanMaterialProduksi/batal_pengambilan_material">
											Batal
										</a>
									</li>
								</ul>
							</li>
							<!-- permintaan material tambahan -->
							<li class="nav-parent">
								<a>
									<i class="fa fa-plus-square-o" aria-hidden="true"></i>
									<?php if($jm_pertam[0]['jumlah_pertam'] == 0){?>
										<span>Permintaan Material Tambahan</span>
									<?php } else{?>
										<span>Permintaan Material Tambahan <span class="badge badge-light"><?= $jm_pertam[0]['jumlah_pertam']?></span></span>
									<?php } ?>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>permintaanTambahan">
											+ Permintaan Material Tambahan
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permintaanTambahan/semua">
											Semua 
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permintaanTambahan/belum_diproses">
										<?php if($jm_pertam_0[0]['jumlah_pertam'] == 0){?>
											<span>Belum Diproses</span>
										<?php } else{?>
											<span>Belum Diproses <span class="badge badge-light"><?= $jm_pertam_0[0]['jumlah_pertam']?></span></span>
										<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permintaanTambahan/diterima">
											<?php if($jm_pertam_1[0]['jumlah_pertam'] == 0){?>
												<span>Diterima</span>
											<?php } else{?>
												<span>Diterima <span class="badge badge-light"><?= $jm_pertam_1[0]['jumlah_pertam']?></span></span>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permintaanTambahan/ditolak">
											<?php if($jm_pertam_2[0]['jumlah_pertam'] == 0){?>
												<span>Ditolak</span>
											<?php } else{?>
												<span>Ditolak <span class="badge badge-light"><?= $jm_pertam_2[0]['jumlah_pertam']?></span></span>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permintaanTambahan/selesai">
											Selesai
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permintaanTambahan/batal">
											Batal
										</a>
									</li>
								</ul>
							</li>
							<!-- surat perintah lembur -->
							<li class="nav-parent">
								<a title="Surat Perintah Lembur">
									<i class="fa  fa-file-text" aria-hidden="true"></i>
									<?php if($jm_spl[0]['jumlah_spl'] == 0){?>
										<span>Surat Perintah Lembur</span>
									<?php } else{?>
										<span>Surat Perintah Lembur <span class="badge badge-light"><?= $jm_spl[0]['jumlah_spl']?></span></span>
									<?php } ?>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>suratPerintahLembur/semua">
											Semua
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>suratPerintahLembur/belum_diproses">
											<?php if($jm_spl_0[0]['jumlah_spl'] == 0){?>
												<span>Belum Diproses</span>
											<?php } else{?>
												<span>Belum Diproses <span class="badge badge-light"><?= $jm_spl_0[0]['jumlah_spl']?></span></span>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>suratPerintahLembur/belum_disetujui">
											<?php if($jm_spl_1[0]['jumlah_spl'] == 0){?>
												<span>Belum Disetujui</span>
											<?php } else{?>
												<span>Belum Disetujui <span class="badge badge-light"><?= $jm_spl_1[0]['jumlah_spl']?></span></span>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>suratPerintahLembur/belum_dikonfirmasi">
											<?php if($jm_spl_2[0]['jumlah_spl'] == 0){?>
												<span>Belum Dikonfirmasi</span>
											<?php } else{?>
												<span>Belum Dikonfirmasi <span class="badge badge-light"><?= $jm_spl_2[0]['jumlah_spl']?></span></span>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>suratPerintahLembur/terkonfirmasi">
											Terkonfirmasi
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>suratPerintahLembur/batal">
											Batal
										</a>
									</li>
								</ul>
							</li>
							<!-- laporan lembur -->
							<li class="nav-parent">
								<a>
									<i class="fa fa-file" aria-hidden="true"></i>
									<?php if($jm_ll[0]['jumlah_ll'] == 0){?>
										<span>Laporan Lembur</span>
									<?php } else{?>
										<span>Laporan Lembur <span class="badge badge-light"><?= $jm_ll[0]['jumlah_ll']?></span></span>
									<?php } ?>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>laporanLembur/semua">
											Semua
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>laporanLembur/belum_diproses">
											<?php if($jm_ll_3[0]['jumlah_ll'] == 0){?>
												<span>Belum Diproses</span>
											<?php } else{?>
												<span>Belum Diproses <span class="badge badge-light"><?= $jm_ll_3[0]['jumlah_ll']?></span></span>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>laporanLembur/sudah_diproses">
											<?php if($jm_ll_4[0]['jumlah_ll'] == 0){?>
												<span>Sudah Diproses</span>
											<?php } else{?>
												<span>Sudah Diproses <span class="badge badge-light"><?= $jm_ll_4[0]['jumlah_ll']?></span></span>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>laporanLembur/selesai">
											Selesai
										</a>
									</li>
								</ul>
							</li>
							<!-- laporan hasil produksi -->
							<li class="nav-parent">
								<a>
									<i class="fa fa-paste" aria-hidden="true"></i>
									<span>Laporan Hasil Produksi</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>hasilProduksi/semua_hasil_produksi">
											<span>Semua</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>hasilProduksi/lengkap_hasil_produksi">
											<span>Lengkap</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>hasilProduksi/selesai_hasil_produksi">
											<span>Selesai</span>
										</a>
									</li>
								</ul>
							</li>
						<?php }?>
					<!--  -->

					<!-- Admin R & D -->
						<?php if(($_SESSION['nama_jabatan'] == "Admin") && ($_SESSION['nama_departemen'] == "Research & Development")){?>
							<li>
								<a href="<?= base_url()?>produk">
									<i class="fa  fa-cube" aria-hidden="true"></i>
									<span>Produk</span>
								</a>
							</li>
							<li>
								<a href="<?= base_url()?>jenisProduk">
									<i class="fa  fa-cubes" aria-hidden="true"></i>
									<span>Jenis Produk</span>
								</a>
							</li>
							<li>
								<a href="<?= base_url()?>warna">
									<i class="fa   fa-delicious" aria-hidden="true"></i>
									<span>Warna Produk</span>
								</a>
							</li>
							<li>
								<a href="<?= base_url()?>ukuranProduk">
									<i class="fa    fa-arrows-alt" aria-hidden="true"></i>
									<span>Ukuran Produk</span>
								</a>
							</li>
						<?php }?>
					<!--  -->

					<!-- Admin Finish Good -->
						<?php if(($_SESSION['nama_jabatan'] == "Admin") && ($_SESSION['nama_departemen'] == "Finish Good")){?>
							<li>
								<a href="<?= base_url()?>produk" title="Produk">
									<i class="fa  fa-cubes" aria-hidden="true"></i>
									<span>Produk</span>
								</a>
							</li>
							<!-- perencanaan produksi line -->
							<li>
								<a href="<?= base_url()?>perencanaanProduksi/perencanaan_produksi_line0">
									<i class="fa fa-calendar-o" aria-hidden="true"></i>
									<span>Perencanaan Produksi Line</span>
								</a>
							</li>
							<!-- bpbj -->
							<li class="nav-parent">
								<a>
									<i class="fa fa-file-text-o" aria-hidden="true"></i>
									<?php if($jm_bpbj[0]['jumlah_bpbj'] == 0){?>
										<span>BPBJ</span>
									<?php } else{?>
										<span>BPBJ <span class="badge badge-light"><?= $jm_bpbj[0]['jumlah_bpbj']?></span></span>
									<?php } ?>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>bpbj/tambah_bpbj">
											+ BPBJ
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>bpbj/semua_bpbj">
											Semua
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>bpbj/bpbj_belum_diproses">
											<?php if($jm_bpbj_0[0]['jumlah_bpbj'] == 0){?>
												<span>Belum Diproses</span>
											<?php } else{?>
												<span>Belum Diproses <span class="badge badge-light"><?= $jm_bpbj_0[0]['jumlah_bpbj']?></span></span>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>bpbj/bpbj_sedang_diproses">
											<?php if($jm_bpbj_1[0]['jumlah_bpbj'] == 0){?>
												<span>Sedang Diproses</span>
											<?php } else{?>
												<span>Sedang Diproses <span class="badge badge-light"><?= $jm_bpbj_1[0]['jumlah_bpbj']?></span></span>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>bpbj/bpbj_selesai">
											Selesai
										</a>
									</li>
								</ul>
							</li>
							<!-- bpbd -->
							<li class="nav-parent">
								<a>
									<i class="fa fa-file-o" aria-hidden="true"></i>
									<?php if($jm_bpbd[0]['jumlah_bpbd'] == 0){?>
										<span>BPDB</span>
									<?php } else{?>
										<span>BPDB <span class="badge badge-light"><?= $jm_bpbd[0]['jumlah_bpbd']?></span></span>
									<?php } ?>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>bpbd/tambah_bpbd">
											+ BPDB
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>bpbd/semua_bpbd">
											Semua
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>bpbd/belum_konfirmasi_bpbd">
											<?php if($jm_bpbd[0]['jumlah_bpbd'] == 0){?>
												<span>Belum Konfirmasi</span>
											<?php } else{?>
												<span>Belum Konfirmasi <span class="badge badge-light"><?= $jm_bpbd[0]['jumlah_bpbd']?></span></span>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>bpbd/terkonfirmasi_bpbd">
											Terkonfirmasi
										</a>
									</li>
								</ul>
							</li>
							<!-- laporan hasil produksi -->
							<li class="nav-parent">
								<a>
									<i class="fa fa-paste" aria-hidden="true"></i>
									<?php if($jm_hasprod[0]['jumlah_hasprod'] == 0){?>
										<!--
										<span>Laporan Hasil Produksi</span>
										-->
									<?php } else{?>
										<!--
										<span>Laporan Hasil Produksi <span class="badge badge-light"><?= $jm_hasprod[0]['jumlah_hasprod']?></span></span>
										-->
									<?php } ?>
									<span>Laporan Hasil Produksi</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>hasilProduksi/tambah_hasil_produksi">
											<?php if($jm_hasprod[0]['jumlah_hasprod'] == 0){?>
												<!--
												<span>+ Laporan Hasil Produksi</span>
												-->
											<?php } else{?>
												<!--
												<span>+ Laporan Hasil Produksi <span class="badge badge-light"><?= $jm_hasprod[0]['jumlah_hasprod']?></span></span>
												-->
											<?php } ?>
											<span>+ Laporan Hasil Produksi</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>hasilProduksi/semua_hasil_produksi">
											<span>Semua</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>hasilProduksi/lengkap_hasil_produksi">
											<span>Lengkap</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>hasilProduksi/selesai_hasil_produksi">
											<span>Selesai</span>
										</a>
									</li>
								</ul>
							</li>
							<!-- permohonan akses -->
							<li class="nav-parent">
								<a title="Permohonan Akses">
									<i class="fa   fa-unlock-alt" aria-hidden="true"></i>
									<?php if($jm_peraks[0]['jumlah_peraks'] == 0){?>
										<span>Permohonan Akses</span>
									<?php } else{?>
										<span>Permohonan Akses <span class="badge badge-light"><?= $jm_peraks[0]['jumlah_peraks']?></span></span>
									<?php } ?>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>permohonanAkses/semua">
											Semua
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permohonanAkses/belum_disetujui">
											<?php if($jm_peraks[0]['jumlah_peraks'] == 0){?>
												<span>Belum Disetujui</span>
											<?php } else{?>
												<span>Belum Disetujui <span class="badge badge-light"><?= $jm_peraks[0]['jumlah_peraks']?></span></span>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permohonanAkses/disetujui">
											Disetujui
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permohonanAkses/tidak_disetujui">
											Tidak Disetujui
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permohonanAkses/selesai">
											Selesai
										</a>
									</li>
								</ul>
							</li>
						<?php }?>
					<!--  -->

					<!-- Admin Produksi -->
						<?php if(($_SESSION['nama_jabatan'] == "Admin") && ($_SESSION['nama_departemen'] == "Produksi")){?>
							<li>
								<a href="<?= base_url()?>produk" title="Produk">
									<i class="fa  fa-cubes" aria-hidden="true"></i>
									<span>Produk</span>
								</a>
							</li>
							<!-- perencanaan produksi line -->
							<li>
								<a href="<?= base_url()?>perencanaanProduksi/perencanaan_produksi_line0">
									<i class="fa fa-calendar-o" aria-hidden="true"></i>
									<span>Perencanaan Produksi Line</span>
								</a>
							</li>
							<!-- laporan hasil produksi -->
							<li class="nav-parent">
								<a>
									<i class="fa fa-paste" aria-hidden="true"></i>
									<?php if($jm_hasprod[0]['jumlah_hasprod'] == 0){?>
										<!--
										<span>Laporan Hasil Produksi</span>
										-->
									<?php } else{?>
										<!--
										<span>Laporan Hasil Produksi <span class="badge badge-light"><?= $jm_hasprod[0]['jumlah_hasprod']?></span></span>
										-->
									<?php } ?>
									<span>Laporan Hasil Produksi</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>hasilProduksi/tambah_hasil_produksi">
											<?php if($jm_hasprod[0]['jumlah_hasprod'] == 0){?>
												<!--
												<span>+ Laporan Hasil Produksi</span>
												-->
											<?php } else{?>
												<!--
												<span>+ Laporan Hasil Produksi <span class="badge badge-light"><?= $jm_hasprod[0]['jumlah_hasprod']?></span></span>
												-->
											<?php } ?>
											<span>+ Laporan Hasil Produksi</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>hasilProduksi/semua_hasil_produksi">
											<span>Semua</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>hasilProduksi/lengkap_hasil_produksi">
											<span>Lengkap</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>hasilProduksi/selesai_hasil_produksi">
											<span>Selesai</span>
										</a>
									</li>
								</ul>
							</li>
							<!-- laporan perencanaan cutting -->
							<li class="nav-parent">
								<a>
									<i class="fa fa-files-o" aria-hidden="true"></i>
									<?php if($jm_percut[0]['jumlah_percut'] == 0){?>
										<span>Laporan Perencanaan Cutting</span>
									<?php } else{?>
										<span>Laporan Perencanaan Cutting <span class="badge badge-light"><?= $jm_percut[0]['jumlah_percut']?></span></span>
									<?php } ?>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>laporanPerencanaanCutting/index">
											<span>+ Laporan Perencanaan Cutting </span>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>laporanPerencanaanCutting/semua">
											<span>Semua</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>laporanPerencanaanCutting/belum_ada">
											<?php if($jm_percut_0[0]['jumlah_percut'] == 0){?>
												<span>Belum Ada Laporan</span>
											<?php } else{?>
												<span>Belum Ada Laporan <span class="badge badge-light"><?= $jm_percut_0[0]['jumlah_percut']?></span></span>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>laporanPerencanaanCutting/sudah_ada">
											<?php if($jm_percut_1[0]['jumlah_percut'] == 0){?>
												<span>Sudah Ada Laporan</span>
											<?php } else{?>
												<span>Sudah Ada Laporan <span class="badge badge-light"><?= $jm_percut_1[0]['jumlah_percut']?></span></span>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>laporanPerencanaanCutting/selesai">
											<span>Selesai </span>
										</a>
									</li>
								</ul>
							</li>
							<!-- permohonan akses -->
							<li class="nav-parent">
								<a title="Permohonan Akses">
									<i class="fa   fa-unlock-alt" aria-hidden="true"></i>
									<?php if($jm_peraks[0]['jumlah_peraks'] == 0){?>
										<span>Permohonan Akses</span>
									<?php } else{?>
										<span>Permohonan Akses <span class="badge badge-light"><?= $jm_peraks[0]['jumlah_peraks']?></span></span>
									<?php } ?>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>permohonanAkses/semua">
											Semua
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permohonanAkses/belum_disetujui">
											<?php if($jm_peraks[0]['jumlah_peraks'] == 0){?>
												<span>Belum Disetujui</span>
											<?php } else{?>
												<span>Belum Disetujui <span class="badge badge-light"><?= $jm_peraks[0]['jumlah_peraks']?></span></span>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permohonanAkses/disetujui">
											Disetujui
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permohonanAkses/tidak_disetujui">
											Tidak Disetujui
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permohonanAkses/selesai">
											Selesai
										</a>
									</li>
								</ul>
							</li>
						<?php }?>
					<!--  -->

					<!-- Admin Finance -->
						<?php if(($_SESSION['nama_jabatan'] == "Admin") && ($_SESSION['nama_departemen'] == "Purchasing") ){?>
							<!-- rekening -->
							<li>
								<a href="<?= base_url()?>rekening">
								 	<i class="fa fa-bank" aria-hidden="true"></i>
									Rekening
								</a>
							</li>
							<!-- perencanaan produksi 
							<li>
								<a title="Perencanaan Produksi" href="<?= base_url()?>perencanaanProduksi/semua_perencanaan_produksi">
									<i class="fa fa-calendar" aria-hidden="true"></i>
									<span>Perencanaan Produksi</span>
								</a>
							</li>
							-->
							<!-- surat jalan -->
							<li class="nav-parent">
								<a>
									<i class="fa fa-envelope" aria-hidden="true"></i>
									<?php if($jm_sj[0]['jumlah_sj'] == 0){?>
										<span>Surat Jalan</span>
									<?php } else{?>
										<span>Surat Jalan <span class="badge badge-light"><?= $jm_sj[0]['jumlah_sj']?></span></span>
									<?php } ?>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>suratJalan">
											+ Surat Jalan
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>suratJalan/semua_surat_jalan">
											Semua
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>suratJalan/belum_dikonfirmasi_surat_jalan">
										<?php if($jm_sj_0[0]['jumlah_sj'] == 0){?>
											<span>Belum Dikonfirmasi</span>
										<?php } else{?>
											<span>Belum Dikonfirmasi <span class="badge badge-light"><?= $jm_sj_0[0]['jumlah_sj']?></span></span>
										<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>suratJalan/terkonfirmasi_surat_jalan">
											<?php if($jm_sj_1[0]['jumlah_sj'] == 0){?>
												<span>Terkonfirmasi</span>
											<?php } else{?>
												<span>Terkonfirmasi <span class="badge badge-light"><?= $jm_sj_1[0]['jumlah_sj']?></span></span>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>suratJalan/selesai_surat_jalan">
											Selesai
										</a>
									</li>
								</ul>
							</li>
							<!-- invoice -->
							<li class="nav-parent">
								<a>
									<i class="fa fa-file-text" aria-hidden="true"></i>
									<?php if($jm_invoice[0]['jumlah_invoice'] == 0){?>
										<span>Invoice</span>
									<?php } else{?>
										<span>Invoice <span class="badge badge-light"><?= $jm_invoice[0]['jumlah_invoice']?></span></span>
									<?php } ?>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>invoice">
											+ Invoice
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>invoice/semua_invoice">
											Semua
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>invoice/belum_diproses_invoice">
										<?php if($jm_invoice[0]['jumlah_invoice'] == 0){?>
											<span>Belum Diproses</span>
										<?php } else{?>
											<span>Belum Diproses <span class="badge badge-light"><?= $jm_invoice[0]['jumlah_invoice']?></span></span>
										<?php } ?>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>invoice/selesai_invoice">
											Selesai
										</a>
									</li>
								</ul>
							</li>
						<?php }?>
					<!--  -->
					</ul>
				</nav>
			</div>
		</div>
	</aside>
	<!-- end: sidebar -->