							<!-- sistem kath -->
							
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