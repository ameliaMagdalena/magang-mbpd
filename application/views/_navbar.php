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
							<a href="<?= base_url()?>dashboard/coba">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>COBA</span>
							</a>
						</li>
							
<!-- PRODUKSI -->
						<!-- Direktur -->
						<?php if(($_SESSION['nama_jabatan'] == "Direktur") && ($_SESSION['nama_departemen'] == "Management")){?>
							<li class="nav-parent">
								<a title="Master Data">
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
										<a href="">
											Customer
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
								</ul>
							</li>
							<!-- Produksi -->
							<li class="nav-parent">
								<a title="Produksi">
									<i class="fa fa-gears" aria-hidden="true"></i>
									<span>Produksi</span>
								</a>
								<ul class="nav nav-children">
									<li class="nav-parent">
										<a>
											<span>Perencanaan Produksi</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="" >
													+ Perencanaan Produksi
												</a>
											</li>
											<li>
												<a href="" >
													Semua Perencanaan Produksi
												</a>
											</li>
										</ul>
									</li>
									<li class="nav-parent">
										<a title="Laporan Produksi">
											<span>Laporan Produksi</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="">
													Laporan Produksi Hari Ini
												</a>
											</li>
											<li>
												<a href="">
													Semua Laporan Produksi
												</a>
											</li>
										</ul>
									</li>
									<li class="nav-parent">
										<a title="Surat Perintah Lembur">
											<span>Surat Perintah Lembur</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="">
													Semua
												</a>
											</li>
											<li>
												<a href="">
													Belum Diproses
												</a>
											</li>
											<li>
												<a href="">
													Belum Disetujui
												</a>
											</li>
											<li>
												<a href="">
													Belum Dikonfirmasi
												</a>
											</li>
											<li>
												<a href="">
													Terkonfirmasi
												</a>
											</li>
										</ul>
									</li>
									<li class="nav-parent">
										<a title="Laporan Lembur">
											<span>Laporan Lembur</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="">
													+ Laporan Lembur
												</a>
											</li>
											<li>
												<a href="">
													Semua
												</a>
											</li>
											<li>
												<a href="">
													Belum Diproses
												</a>
											</li>
											<li>
												<a href="">
													Selesai
												</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="" title="WIP">
											<span>WIP</span>
										</a>
									</li>
									<li>
										<a href="">
											<span>Inventory Line</span>
										</a>
									</li>




									<li class="nav-parent">
										<a>
											<i class="fa fa-shopping-cart" aria-hidden="true"></i>
											<span>Permintaan Pembelian</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="<?php echo base_url() . 'inventory/PermintaanPembelianMaterial/baru'?>">
													Buat Baru
												</a>
											</li>
										</ul>
									</li>





									<li class="nav-parent">
										<a title="Permintaan Material">
											<span>Permintaan Material</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="">
													+ Permintaan Material
												</a>
											</li>
											<li>
												<a href="">
													Semua
												</a>
											</li>
											<li>
												<a href="">
													Belum Disetujui Gudang Material
												</a>
											</li>
											<li>
												<a href="">
													Disetujui & Belum Diambil
												</a>
											</li>
											<li>
												<a href="">
													Selesai
												</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<!-- Purchasing -->
							<li class="nav-parent">
								<a title="Purchasing">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i>
									<span>Purchasing</span>
								</a>
								<ul class="nav nav-children">
									<li class="nav-parent">
										<a title="Surat Jalan">
											<span>Surat Jalan</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="" >
													+ Surat Jalan
												</a>
											</li>
											<li>
												<a href="">
													Semua
												</a>
											</li>
											<li>
												<a href="">
													Belum Ditagih
												</a>
											</li>
											<li>
												<a href="">
													Sudah Ditagih
												</a>
											</li>
										
										</ul>
							
									</li>
									<li class="nav-parent">
										<a title="Invoice">
											<span>Invoice</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="">
													+ Invoice
												</a>
											</li>
											<li>
												<a href="">
													Semua
												</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<!-- Finish Good -->
							<li class="nav-parent">
								<a title="Finish Good">
									<i class="fa fa-cubes" aria-hidden="true"></i>
									<span>Finish Good</span>
								</a>
								<ul class="nav nav-children">
									<li class="nav-parent">
										<a title="BPBJ">
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
										<a title="Hasil Produksi">
											<span>Hasil Produksi</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="">
													+ Hasil Produksi
												</a>
											</li>
											<li>
												<a href="">
													Semua
												</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>

							<li>
								<a href="<?= base_url()?>processCost">
									<i class="fa fa-money" aria-hidden="true"></i>
									<span>Process Cost</span>
								</a>
							</li>

							<!--
								<li class="nav-parent">
									<a title="Process Cost">
										<i class="fa fa-money" aria-hidden="true"></i>
										<span>Process Cost</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a href="">
												Produk
											</a>
										</li>
										<li>
											<a href="">
												PO
											</a>
										</li>
									</ul>
								</li>
							-->
						<?php }?>
						<!--  -->

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
										<a href="<?= base_url()?>permintaanMaterialPPIC">
											Semua Permintaan Material PPIC
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>perencanaanProduksi/semua_perencanaan_produksi">
											...
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
								<a href="<?= base_url()?>produk">
									<span>Produk Sementara</span>
								</a>
							</li>
							<li>
								<a href="<?= base_url()?>POS">
									<span>PO Sementara</span>
								</a>
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
								<a href="">
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
										<a href="<?= base_url()?>permintaanMaterialProduksi/tambah">
											+ Permintaan Material
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permintaanMaterialProduksi/semua_permintaan_material">
											Semua
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permintaanMaterialProduksi/belum_disetujui_permintaan_material">
											Belum Disetujui Gudang Material
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permintaanMaterialProduksi/belum_diambil_permintaan_material">
											Disetujui & Belum Diambil
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permintaanMaterialProduksi/selesai_permintaan_material">
											Selesai
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>permintaanMaterialProduksi/batal_permintaan_material">
											Batal
										</a>
									</li>
								</ul>
							</li>
							<!--
							<li class="nav-parent">
								<a>
									<span>Overtime</span>
								</a>
								<ul class="nav nav-children">
									<li>
										<a href="">
											+ Permintaan Material
										</a>
									</li>
									<li>
										<a href="">
											Semua
										</a>
									</li>
									<li>
										<a href="">
											Belum Disetujui Gudang Material
										</a>
									</li>
									<li>
										<a href="">
											Disetujui & Belum Diambil
										</a>
									</li>
									<li>
										<a href="">
											Selesai
										</a>
									</li>
								</ul>
							</li>
							-->
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
										<a href="<?= base_url()?>suratJalan/belum_diproses_surat_jalan">
											Belum Diproses
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
								<a href="<?= base_url()?>POS">
									<span>PO Sementara</span>
								</a>
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
						<li>
							<a href="<?= base_url()?>purchaseOrderCustomer/baru">
								+PO Kath
							</a>
						</li>
						<li>
							<a href="<?= base_url()?>purchaseOrderCustomer/index/0">
								PO Kath stat 0
							</a>
						</li>
						<li>
							<a href="<?= base_url()?>purchaseOrderCustomer/index/1">
								PO Kath stat 1
							</a>
						</li>
						<li>
							<a href="<?= base_url()?>purchaseOrderCustomer/index/2">
								PO Kath stat 2
							</a>
						</li>
						<li>
							<a href="<?= base_url()?>purchaseOrderCustomer/index/3">
								PO Kath stat 3
							</a>
						</li>
						<li>
							<a href="<?= base_url()?>purchaseOrderCustomer/index/4">
								PO Kath stat 4
							</a>
						</li>
						<li>
							<a href="<?= base_url()?>purchaseOrderCustomer/index/5">
								PO Kath stat 5
							</a>
						</li>
						<li>
							<a href="<?= base_url()?>material">
								Material Kath
							</a>
						</li>
						<li>
							<a href="<?= base_url()?>jenisMaterial">
								Jenis Material Kath
							</a>
						</li>
						<li>
							<a href="<?= base_url()?>customer">
								Customer Kath
							</a>
						</li>
<!-- PRODUKSI -->
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