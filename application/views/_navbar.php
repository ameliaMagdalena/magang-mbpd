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
							if ($_SESSION['nama_departemen']=="Management" && $_SESSION['nama_jabatan']=="Direktur"){
						?>
							<li class="nav-parent">
								<a>
									<i class="fa fa-copy" aria-hidden="true"></i>
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
											Warna
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>inventoryLine">
											Inventory Line
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
										<a href="<?php echo base_url() . 'PurchaseOrderSupplier/Baru'?>">
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
							<!-- <li class="nav-parent">
								<a>
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
									<span>Pembelian Material</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?php echo base_url() . 'PembelianMaterial/baru'?>">
											Beli Baru
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'PembelianMaterial/index/0'?>">
											Dalam Proses
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'PembelianMaterial/index/1'?>">
											Selesai
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'PembelianMaterial/index/2'?>">
											Batal
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'PembelianMaterial'?>">
											Semua
										</a>
									</li>
								</ul>
							</li> -->
							<li class="nav-parent">
								<a>
									<i class="fa fa-file-text" aria-hidden="true"></i>
									<span>Perencanaan Material <span class="badge badge-light">3</span></span>
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
													Perencanaan Pengambilan <span class="badge badge-light">2</span>
												</a>
											</li>
											<li>
												<a href="<?php echo base_url() . 'PermintaanMaterial/jadwal'?>">
													Jadwal Pengambilan
												</a>
											</li>
										</ul>
									</li>
									<li class="nav-parent">
										<a title="Pengambilan Material Supplier">
											<span>Pengambilan Material Supplier</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="<?php echo base_url() . 'DeliveryNote'?>">
													Delivery Note
												</a>
											</li>
											<li>
												<a href="<?php echo base_url() . 'PengambilanMaterial/jadwal'?>">
													Jadwal Pengambilan
												</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							
							<!-- <li class="nav-parent">
								<a>
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
									<span>Permintaan Pembelian</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?php echo base_url() . 'PermintaanPembelianMaterial/baru'?>">
											Buat Baru
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'PermintaanPembelianMaterial/index/0'?>">
											Pending
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'PermintaanPembelianMaterial/index/1'?>">
											Proses
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'PermintaanPembelianMaterial/index/2'?>">
											Selesai
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'PermintaanPembelianMaterial'?>">
											Semua
										</a>
									</li>
								</ul>
							</li> -->
							<li class="nav-parent">
								<a>
									<i class="fa fa-sign-in" aria-hidden="true"></i>
									<span>Pemasukan Material</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?php echo base_url() . 'PemasukanMaterial/baru'?>">
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
									<li>
										<a href="<?php echo base_url() . 'PengeluaranMaterial/baru'?>">
											Buat Baru
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'PengeluaranMaterial/jadwal'?>">
											Jadwal Pengeluaran Material
											<!-- mis. hari ini ada yg mau dikeluarkan.
											tunggu dari produksi kirim form pengambilan
											baru bisa edit material sudah keluar -->
										</a>
									</li>
									<li>
										<a href="<?php echo base_url() . 'PengeluaranMaterial'?>">
											Daftar Material Keluar
											<!-- material yg sudah keluar -->
										</a>
									</li>
								</ul>
							</li>
							
							<!-- produksi -->
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
								<li class="nav-parent">
									<a title="Permintaan Material">
										<i class="fa fa-calendar" aria-hidden="true"></i>
										<span>Permintaan Material</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>permintaanMaterialProduksi">
												Semua Permintaan Material
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanMaterialProduksi/belum_ditindaklanjuti">
												Belum Ditindaklanjuti
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanMaterialProduksi/sedang_diproses">
												Sedang Diproses
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanMaterialProduksi/selesai">
												Selesai
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanMaterialProduksi/batal">
												Batal
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanMaterialProduksi/ditolak">
												Ditolak
											</a>
										</li>
									</ul>
								</li>
								<li class="nav-parent">
									<a>
										<i class="fa fa-th-list" aria-hidden="true"></i>
										<span>Laporan Hasil Produksi</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>hasilProduksi/tambah_hasil_produksi">
												<span>+ Laporan Hasil Produksi </span>
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
								<li class="nav-parent">
									<a>
										<i class="fa fa-th-list" aria-hidden="true"></i>
										<span>Laporan Perencanaan Cutting</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>laporanPerencanaanCutting/semua">
												<span>Semua</span>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanPerencanaanCutting/index">
												<span>Belum Ada Laporan </span>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanPerencanaanCutting/index">
												<span>Sudah Ada Laporan</span>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanPerencanaanCutting/index">
												<span>Selesai </span>
											</a>
										</li>
									</ul>
								</li>
								<li class="nav-parent">
									<a title="Surat Perintah Lembur">
										<i class="fa  fa-file-text" aria-hidden="true"></i>
										<span>Surat Perintah Lembur</span>
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
												Belum Diproses
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratPerintahLembur/belum_disetujui">
												Belum Disetujui
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratPerintahLembur/belum_dikonfirmasi">
												Belum Dikonfirmasi
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
								<li class="nav-parent">
									<a>
										<i class="fa fa-file" aria-hidden="true"></i>
										<span>Laporan Lembur</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>laporanLembur/semua">
												Semua
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanLembur/belum_diproses">
												Belum Diproses
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanLembur/sudah_diproses">
												Sudah Diproses
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanLembur/selesai">
												Selesai
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="<?= base_url()?>perencanaanProduksi/perencanaan_produksi_line">
										<i class="fa fa-calendar" aria-hidden="true"></i>
										<span>Perencanaan Produksi Line</span>
									</a>
								</li>
								<li class="nav-parent">
									<a>
										<i class="fa fa-plus-square-o" aria-hidden="true"></i>
										<span>Pengambilan Material</span>
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
											<a href="<?= base_url()?>pengambilanMaterialProduksi/belum_disetujui_pengambilan_material">
												Belum Disetujui Gudang Material
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>pengambilanMaterialProduksi/belum_diambil_pengambilan_material">
												Disetujui & Belum Diambil
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>pengambilanMaterialProduksi/selesai_pengambilan_material">
												Selesai
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>pengambilanMaterialProduksi/batal_pengambilan_material">
												Batal
											</a>
										</li>
									</ul>
								</li>
								<li class="nav-parent">
									<a>
										<i class="fa fa-file-text-o" aria-hidden="true"></i>
										<span>BPBJ</span>
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
												Belum Diproses
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>bpbj/bpbj_sedang_diproses">
												Sedang Diproses
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>bpbj/bpbj_selesai">
												Selesai
											</a>
										</li>
									</ul>
								</li>
								<li class="nav-parent">
									<a>
										<i class="fa fa-file-o" aria-hidden="true"></i>
										<span>BPBD</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>bpbd/tambah_bpbd">
												+ BPBD
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>bpbd/semua_bpbd">
												Semua
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>bpbd/belum_konfirmasi_bpbd">
												Belum Konfirmasi
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>bpbd/terkonfirmasi_bpbd">
												Terkonfirmasi
											</a>
										</li>
									</ul>
								</li>
								<li class="nav-parent">
									<a>
										<i class="fa fa-th-list" aria-hidden="true"></i>
										<span>Laporan Hasil Produksi</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>hasilProduksi/tambah_hasil_produksi">
												<span>+ Laporan Hasil Produksi </span>
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
								<li class="nav-parent">
									<a>
										<i class="fa fa-th-list" aria-hidden="true"></i>
										<span>Laporan Perencanaan Cutting</span>
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
											<a href="<?= base_url()?>laporanPerencanaanCutting/index">
												<span>Belum Ada Laporan </span>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanPerencanaanCutting/index">
												<span>Sudah Ada Laporan</span>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanPerencanaanCutting/index">
												<span>Selesai </span>
											</a>
										</li>
									</ul>
								</li>
								<li class="nav-parent">
									<a title="Permohonan Akses">
										<i class="fa   fa-unlock-alt" aria-hidden="true"></i>
										<span>Permohonan Akses</span>
										<span class="label" style="background-color:#BE2525;border-radius:50px;">1</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>permohonanAkses/semua">
												Semua
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permohonanAkses/belum_disetujui">
												Belum Disetujui
												<span class="pull-right label" style="background-color:#BE2525;border-radius:50px;">1</span>
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
								<li class="nav-parent">
									<a>
										<i class="fa fa-envelope" aria-hidden="true"></i>
										<span>Surat Jalan</span>
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
												Belum Dikonfirmasi
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratJalan/terkonfirmasi_surat_jalan">
												Terkonfirmasi
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratJalan/selesai_surat_jalan">
												Selesai
											</a>
										</li>
									</ul>
								</li>
								<li class="nav-parent">
									<a>
										<i class="fa fa-file-text-o" aria-hidden="true"></i>
										<span>Invoice</span>
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
												Belum Diproses
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>invoice/selesai_invoice">
												Selesai
											</a>
										</li>
									</ul>
								</li>
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
								<a title="Permohonan Akses">
									<i class="fa   fa-unlock-alt" aria-hidden="true"></i>
									<span>Permohonan Akses</span>
									<span class="label" style="background-color:#BE2525;border-radius:50px;">1</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>permohonanAkses/semua">
											Semua
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permohonanAkses/belum_disetujui">
											Belum Disetujui
											<span class="pull-right label" style="background-color:#BE2525;border-radius:50px;">1</span>
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
							<li class="nav-parent">
								<a title="Surat Perintah Lembur">
									<i class="fa  fa-file-text" aria-hidden="true"></i>
									<span>Surat Perintah Lembur</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>suratPerintahLembur/semua">
											Semua
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>suratPerintahLembur/belum_diproses">
											Belum Diproses
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>suratPerintahLembur/belum_disetujui">
											Belum Disetujui
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>suratPerintahLembur/belum_dikonfirmasi">
											Belum Dikonfirmasi
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
							<!-- produksi -->
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
								<li class="nav-parent">
									<a title="Permintaan Material">
										<i class="fa fa-calendar" aria-hidden="true"></i>
										<span>Permintaan Material</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>permintaanMaterialProduksi">
												Semua Permintaan Material
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanMaterialProduksi/belum_ditindaklanjuti">
												Belum Ditindaklanjuti
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanMaterialProduksi/sedang_diproses">
												Sedang Diproses
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanMaterialProduksi/selesai">
												Selesai
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanMaterialProduksi/batal">
												Batal
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permintaanMaterialProduksi/ditolak">
												Ditolak
											</a>
										</li>
									</ul>
								</li>
								<li class="nav-parent">
									<a>
										<i class="fa fa-th-list" aria-hidden="true"></i>
										<span>Laporan Hasil Produksi</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>hasilProduksi/tambah_hasil_produksi">
												<span>+ Laporan Hasil Produksi </span>
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
								<li class="nav-parent">
									<a>
										<i class="fa fa-th-list" aria-hidden="true"></i>
										<span>Laporan Perencanaan Cutting</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>laporanPerencanaanCutting/semua">
												<span>Semua</span>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanPerencanaanCutting/index">
												<span>Belum Ada Laporan </span>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanPerencanaanCutting/index">
												<span>Sudah Ada Laporan</span>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanPerencanaanCutting/index">
												<span>Selesai </span>
											</a>
										</li>
									</ul>
								</li>
								<li class="nav-parent">
									<a title="Surat Perintah Lembur">
										<i class="fa  fa-file-text" aria-hidden="true"></i>
										<span>Surat Perintah Lembur</span>
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
												Belum Diproses
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratPerintahLembur/belum_disetujui">
												Belum Disetujui
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratPerintahLembur/belum_dikonfirmasi">
												Belum Dikonfirmasi
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
								<li class="nav-parent">
									<a>
										<i class="fa fa-file" aria-hidden="true"></i>
										<span>Laporan Lembur</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>laporanLembur/semua">
												Semua
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanLembur/belum_diproses">
												Belum Diproses
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanLembur/sudah_diproses">
												Sudah Diproses
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanLembur/selesai">
												Selesai
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="<?= base_url()?>perencanaanProduksi/perencanaan_produksi_line">
										<i class="fa fa-calendar" aria-hidden="true"></i>
										<span>Perencanaan Produksi Line</span>
									</a>
								</li>
								<li class="nav-parent">
									<a>
										<i class="fa fa-plus-square-o" aria-hidden="true"></i>
										<span>Pengambilan Material</span>
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
											<a href="<?= base_url()?>pengambilanMaterialProduksi/belum_disetujui_pengambilan_material">
												Belum Disetujui Gudang Material
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>pengambilanMaterialProduksi/belum_diambil_pengambilan_material">
												Disetujui & Belum Diambil
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>pengambilanMaterialProduksi/selesai_pengambilan_material">
												Selesai
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>pengambilanMaterialProduksi/batal_pengambilan_material">
												Batal
											</a>
										</li>
									</ul>
								</li>
								<li class="nav-parent">
									<a>
										<i class="fa fa-file-text-o" aria-hidden="true"></i>
										<span>BPBJ</span>
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
												Belum Diproses
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>bpbj/bpbj_sedang_diproses">
												Sedang Diproses
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>bpbj/bpbj_selesai">
												Selesai
											</a>
										</li>
									</ul>
								</li>
								<li class="nav-parent">
									<a>
										<i class="fa fa-file-o" aria-hidden="true"></i>
										<span>BPBD</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>bpbd/tambah_bpbd">
												+ BPBD
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>bpbd/semua_bpbd">
												Semua
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>bpbd/belum_konfirmasi_bpbd">
												Belum Konfirmasi
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>bpbd/terkonfirmasi_bpbd">
												Terkonfirmasi
											</a>
										</li>
									</ul>
								</li>
								<li class="nav-parent">
									<a>
										<i class="fa fa-th-list" aria-hidden="true"></i>
										<span>Laporan Hasil Produksi</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>hasilProduksi/tambah_hasil_produksi">
												<span>+ Laporan Hasil Produksi </span>
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
								<li class="nav-parent">
									<a>
										<i class="fa fa-th-list" aria-hidden="true"></i>
										<span>Laporan Perencanaan Cutting</span>
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
											<a href="<?= base_url()?>laporanPerencanaanCutting/index">
												<span>Belum Ada Laporan </span>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanPerencanaanCutting/index">
												<span>Sudah Ada Laporan</span>
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>laporanPerencanaanCutting/index">
												<span>Selesai </span>
											</a>
										</li>
									</ul>
								</li>
								<li class="nav-parent">
									<a title="Permohonan Akses">
										<i class="fa   fa-unlock-alt" aria-hidden="true"></i>
										<span>Permohonan Akses</span>
										<span class="label" style="background-color:#BE2525;border-radius:50px;">1</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="<?= base_url()?>permohonanAkses/semua">
												Semua
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>permohonanAkses/belum_disetujui">
												Belum Disetujui
												<span class="pull-right label" style="background-color:#BE2525;border-radius:50px;">1</span>
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
								<li class="nav-parent">
									<a>
										<i class="fa fa-envelope" aria-hidden="true"></i>
										<span>Surat Jalan</span>
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
												Belum Dikonfirmasi
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratJalan/terkonfirmasi_surat_jalan">
												Terkonfirmasi
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>suratJalan/selesai_surat_jalan">
												Selesai
											</a>
										</li>
									</ul>
								</li>
								<li class="nav-parent">
									<a>
										<i class="fa fa-file-text-o" aria-hidden="true"></i>
										<span>Invoice</span>
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
												Belum Diproses
											</a>
										</li>
										<li>
											<a href="<?= base_url()?>invoice/selesai_invoice">
												Selesai
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="<?= base_url()?>processCost">
										<i class="fa fa-money" aria-hidden="true"></i>
										<span>Process Cost</span>
									</a>
								</li>
							<!-- -->
						<?php }?>
					<!--  -->

					<!-- PPIC -->
						<?php if(($_SESSION['nama_jabatan'] == "PPIC") && ($_SESSION['nama_departemen'] == "Produksi")){?>
							<li>
								<a href="<?= base_url()?>produk" title="Produk">
									<i class="fa  fa-cubes" aria-hidden="true"></i>
									<span>Produk</span>
								</a>
							</li>
							<li class="nav-parent">
								<a title="Purchase Order">
									<i class="fa  fa-list" aria-hidden="true"></i>
									<span>PO/SO</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="">
											Semua
										</a>
									</li>
									<li>
										<a href="">
											Belum Memiliki Perencanaan Produksi
										</a>
									</li>
									<li>
										<a href="">
											Dalam Proses Produksi
										</a>
									</li>
									<li>
										<a href="">
											Selesai Produksi
										</a>
									</li>
								</ul>
							</li>
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
							<li class="nav-parent">
								<a title="Permintaan Material">
									<i class="fa fa-calendar" aria-hidden="true"></i>
									<span>Permintaan Material</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>permintaanMaterialProduksi">
											Semua Permintaan Material
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permintaanMaterialProduksi/belum_ditindaklanjuti">
											Belum Ditindaklanjuti
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permintaanMaterialProduksi/sedang_diproses">
											Sedang Diproses
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permintaanMaterialProduksi/selesai">
											Selesai
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permintaanMaterialProduksi/batal">
											Batal
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permintaanMaterialProduksi/ditolak">
											Ditolak
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-parent">
								<a>
									<i class="fa fa-th-list" aria-hidden="true"></i>
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
							<li class="nav-parent">
								<a>
									<i class="fa fa-th-list" aria-hidden="true"></i>
									<span>Laporan Perencanaan Cutting</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>laporanPerencanaanCutting/semua">
											<span>Semua</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>laporanPerencanaanCutting/index">
											<span>Belum Ada Laporan </span>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>laporanPerencanaanCutting/index">
											<span>Sudah Ada Laporan</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>laporanPerencanaanCutting/index">
											<span>Selesai </span>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-parent">
								<a title="Surat Perintah Lembur">
									<i class="fa  fa-file-text" aria-hidden="true"></i>
									<span>Surat Perintah Lembur</span>
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
											Belum Diproses
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>suratPerintahLembur/belum_disetujui">
											Belum Disetujui
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>suratPerintahLembur/belum_dikonfirmasi">
											Belum Dikonfirmasi
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
							<li class="nav-parent">
								<a>
									<i class="fa fa-file" aria-hidden="true"></i>
									<span>Laporan Lembur</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>laporanLembur/semua">
											Semua
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>laporanLembur/belum_diproses">
											Belum Diproses
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>laporanLembur/sudah_diproses">
											Sudah Diproses
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
						<?php if(($_SESSION['nama_jabatan'] == "PIC Line Cutting") && ($_SESSION['nama_departemen'] == "Produksi") || ($_SESSION['nama_jabatan'] == "PIC Line Bonding") && ($_SESSION['nama_departemen'] == "Produksi") || ($_SESSION['nama_jabatan'] == "PIC Line Sewing") && ($_SESSION['nama_departemen'] == "Produksi") || ($_SESSION['nama_jabatan'] == "PIC Line Assy") && ($_SESSION['nama_departemen'] == "Produksi")){?>
							<li>
								<a href="">
									<i class="fa  fa-cubes" aria-hidden="true"></i>
									<span>Produk</span>
								</a>
							</li>
							<li>
								<a href="">
									<i class="fa  fa-cog" aria-hidden="true"></i>
									<span>WIP</span>
								</a>
							</li>
							<li>
								<a href="<?= base_url()?>inventoryLine">
									<i class="fa  fa-building" aria-hidden="true"></i>
									<span>Inventory Line</span>
								</a>
							</li>
							<li>
								<a href="<?= base_url()?>perencanaanProduksi/perencanaan_produksi_line">
									<i class="fa fa-calendar" aria-hidden="true"></i>
									<span>Perencanaan Produksi Line</span>
								</a>
							</li>
							<li class="nav-parent">
								<a>
									<i class="fa fa-plus-square-o" aria-hidden="true"></i>
									<span>Pengambilan Material</span>
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
										<a href="<?= base_url()?>pengambilanMaterialProduksi/belum_disetujui_pengambilan_material">
											Belum Diambil
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>pengambilanMaterialProduksi/belum_diambil_pengambilan_material">
											Sudah Diambil
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-parent">
								<a title="Surat Perintah Lembur">
									<i class="fa  fa-file-text" aria-hidden="true"></i>
									<span>Surat Perintah Lembur</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>suratPerintahLembur/semua">
											Semua
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>suratPerintahLembur/belum_diproses">
											Belum Diproses
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>suratPerintahLembur/belum_disetujui">
											Belum Disetujui
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>suratPerintahLembur/belum_dikonfirmasi">
											Belum Dikonfirmasi
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
							<li class="nav-parent">
								<a>
									<i class="fa fa-file" aria-hidden="true"></i>
									<span>Laporan Lembur</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>laporanLembur/semua">
											Semua
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>laporanLembur/belum_diproses">
											Belum Diproses
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>laporanLembur/sudah_diproses">
											Sudah Diproses
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

					<!-- Admin R & D -->
						<?php if(($_SESSION['nama_jabatan'] == "Admin") && ($_SESSION['nama_departemen'] == "Research and Development")){?>
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
									<span>Warna</span>
								</a>
							</li>
						<?php }?>
					<!--  -->

					<!-- Admin Finish Good -->
						<?php if(($_SESSION['nama_jabatan'] == "Admin") && ($_SESSION['nama_departemen'] == "Finish Good")){?>
							<li class="nav-parent">
								<a>
									<i class="fa fa-file-text-o" aria-hidden="true"></i>
									<span>BPBJ</span>
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
											Belum Diproses
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>bpbj/bpbj_sedang_diproses">
											Sedang Diproses
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>bpbj/bpbj_selesai">
											Selesai
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-parent">
								<a>
									<i class="fa fa-file-o" aria-hidden="true"></i>
									<span>BPBD</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>bpbd/tambah_bpbd">
											+ BPBD
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>bpbd/semua_bpbd">
											Semua
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>bpbd/belum_konfirmasi_bpbd">
											Belum Konfirmasi
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>bpbd/terkonfirmasi_bpbd">
											Terkonfirmasi
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-parent">
								<a>
									<i class="fa fa-th-list" aria-hidden="true"></i>
									<span>Laporan Hasil Produksi</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>hasilProduksi/tambah_hasil_produksi">
											<span>+ Laporan Hasil Produksi </span>
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
							<li class="nav-parent">
								<a title="Permohonan Akses">
									<i class="fa   fa-unlock-alt" aria-hidden="true"></i>
									<span>Permohonan Akses</span>
									<span class="label" style="background-color:#BE2525;border-radius:50px;">1</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>permohonanAkses/semua">
											Semua
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permohonanAkses/belum_disetujui">
											Belum Disetujui
											<span class="pull-right label" style="background-color:#BE2525;border-radius:50px;">1</span>
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
							<li class="nav-parent">
								<a>
									<i class="fa fa-th-list" aria-hidden="true"></i>
									<span>Laporan Hasil Produksi</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>hasilProduksi/tambah_hasil_produksi">
											<span>+ Laporan Hasil Produksi </span>
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
							<li class="nav-parent">
								<a>
									<i class="fa fa-th-list" aria-hidden="true"></i>
									<span>Laporan Perencanaan Cutting</span>
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
										<a href="<?= base_url()?>laporanPerencanaanCutting/index">
											<span>Belum Ada Laporan </span>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>laporanPerencanaanCutting/index">
											<span>Sudah Ada Laporan</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>laporanPerencanaanCutting/index">
											<span>Selesai </span>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-parent">
								<a title="Permohonan Akses">
									<i class="fa   fa-unlock-alt" aria-hidden="true"></i>
									<span>Permohonan Akses</span>
									<span class="label" style="background-color:#BE2525;border-radius:50px;">1</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="<?= base_url()?>permohonanAkses/semua">
											Semua
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permohonanAkses/belum_disetujui">
											Belum Disetujui
											<span class="pull-right label" style="background-color:#BE2525;border-radius:50px;">1</span>
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
							<li class="nav-parent">
								<a>
									<i class="fa fa-envelope" aria-hidden="true"></i>
									<span>Surat Jalan</span>
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
											Belum Dikonfirmasi
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>suratJalan/terkonfirmasi_surat_jalan">
											Terkonfirmasi
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>suratJalan/selesai_surat_jalan">
											Selesai
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-parent">
								<a>
									<i class="fa fa-file-text-o" aria-hidden="true"></i>
									<span>Invoice</span>
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
											Belum Diproses
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

						<li>
							<br><br>
							<hr>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</aside>
	<!-- end: sidebar -->