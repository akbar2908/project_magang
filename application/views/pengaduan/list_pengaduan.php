<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.4/dist/sweetalert2.all.min.js"></script>
    <?php if ($this->session->flashdata('message')) : ?>
    	<script type="text/javascript">
    		swal({
    			title: "BERHASIL !!!",
    			text: "<?php echo $this->session->flashdata('message'); ?>",
    			showConfirmButton: true,
    			type: 'success'
    		});
    	</script>
    <?php endif; ?>
    <?php if ($this->session->flashdata('abort')) : ?>
    	<script type="text/javascript">
    		swal({
    			title: "ERROR !!!",
    			text: "<?php echo $this->session->flashdata('abort'); ?>",
    			showConfirmButton: true,
    			type: 'error'
    		});
    	</script>
    <?php endif; ?> -->
<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>LIST PENGADUAN</h2>
		</div>

		<!-- Basic Examples -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="font-size: 22px;color:#ad1455;font-weight: bold;">
							<center>List Pengaduan</center>
						</h2> <br><br>



					</div>

					<div class="body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover dataTable invt">
								<thead>
									<tr>
										<th style="width:30px">Tiket ID</th>

										<th>Nama User</th>
										<th>Telepon</th>
										<th>Jenis Perangkat</th>
										<th>Nama Perangkat</th>
										<th>No Inventaris</th>
										<th>Aduan Kerusakan</th>
										<th>Catatan</th>
										<th>Penerima</th>
										<th>Status</th>
										<th>Keterangan</th>
										<th>Tgl Masuk</th>
										<th>Aksi Pengaduan</th>
									</tr>
								</thead>

								<tbody>

									<?php $i = 1;
									foreach ($pengaduan as $te) : ?>
										<tr>
											<!-- <td><?= $i++; ?></td> -->
											<td><?= $te['id_pengaduan'] ?></td>
											<td><?= $te['nama_user'] ?></td>
											<td><?= $te['telepon'] ?></td>
											<td><?= $te['jenis_perangkat'] ?></td>
											<td><?= $te['nama_perangkat'] ?></td>
											<td><?= $te['no_inventaris'] ?></td>
											<td><?= $te['keluhan'] ?></td>
											<td><?= $te['note'] ?></td>
											<td><?= $te['penerima_pengembalian'] ?></td>
											<td><?= $te['status'] ?></td>
											<td style="text-align: center;vertical-align: middle;">
												<?php if ($te['keterangan'] == 'p') : ?>
													<center>
														<a href="#" data-toggle="tooltip" data-placement="top" title="#"><button disabled>Menunggu persetujuan kepala</button></a>&nbsp;
													</center>
												<?php elseif ($te['keterangan'] == 'tp') : ?>
													<center>
														<a href="#" data-toggle="tooltip" data-placement="top" title="#"><button disabled>Pengaduan diterima kepala</button></a>&nbsp;

													</center>
												<?php elseif ($te['keterangan'] == 'tr') : ?>
													<center>
														<a href="#" data-toggle="tooltip" data-placement="top" title="#"><button disabled>Laporan diterima kepala</button></a>&nbsp;

													</center>
												<?php elseif ($te['keterangan'] == 'l') : ?>
													<center>
														<a href="#" data-toggle="tooltip" data-placement="top" title="#"><button disabled>Pengaduan dilaporkan Admin</button></a>&nbsp;

													</center>
												<?php elseif ($te['keterangan'] == 'rr') : ?>
													<center>
														<a href="#" data-toggle="tooltip" data-placement="top" title="#"><button disabled>Laporan direvisi kepala</button></a>&nbsp;

													</center>

												<?php elseif ($te['keterangan'] == 'ie') : ?>
													<center>
														<a href="#" data-toggle="tooltip" data-placement="top" title="#"><button disabled>Teknisi input diagnosa dan estimasi biaya</button></a>&nbsp;

													</center>

												<?php elseif ($te['keterangan'] == 'ri') : ?>
													<center>
														<a href="#" data-toggle="tooltip" data-placement="top" title="#"><button disabled>Kepala revisi diagnosa dan estimasi biaya</button></a>&nbsp;

													</center>

												<?php elseif ($te['keterangan'] == 'ti') : ?>
													<center>
														<a href="#" data-toggle="tooltip" data-placement="top" title="#"><button disabled>Kepala terima diagnosa dan estimasi biaya</button></a>&nbsp;

													</center>
												<?php elseif ($te['keterangan'] == 'it') : ?>
													<center>
														<a href="#" data-toggle="tooltip" data-placement="top" title="#"><button disabled>Teknisi input tindakan</button></a>&nbsp;

													</center>
												<?php elseif ($te['keterangan'] == 'c') : ?>
													<center>
														<a href="#" data-toggle="tooltip" data-placement="top" title="#"><button disabled>Closing Teknisi</button></a>&nbsp;

													</center>
												<?php elseif ($te['keterangan'] == 's') : ?>
													<center>
														<a href="#" data-toggle="tooltip" data-placement="top" title="#"><button disabled>Pengaduan Selesai</button></a>&nbsp;

													</center>
												<?php elseif ($te['keterangan'] == 'tl') : ?>
													<center>
														<a href="#" data-toggle="tooltip" data-placement="top" title="#"><button disabled>Pengaduan ditolak</button></a>&nbsp;

													</center>
												<?php else : ?>
													<center>
														<a href="#" data-toggle="tooltip" data-placement="top" title="#"><button disabled>Terdapat kesalahan sistem</button></a>&nbsp;

													</center>
												<?php endif; ?>
											</td>

											<td><?= $te['tgl_masuk'] ?></td>
											<td style="text-align: center;vertical-align: middle;">
												<!-- //proses acc kepala -->
												<?php if ($te['keterangan'] == 'p') : ?>
													<?php if (($this->session->userdata('role') == 'K')) : ?>
														<a href="<?= base_url(); ?>Pengaduan/acc_kepala/<?= $te['id_pengaduan']; ?>">
															<button type="button" class="btn btn-success">
																<!-- <i class="material-icons">add</i> -->
																<span>Terima</span>
															</button>
														</a>
														<a href="<?= base_url(); ?>Pengaduan/cancel_kepala/<?= $te['id_pengaduan']; ?>">
															<button type="button" class="btn btn-danger">
																<!-- <i class="material-icons">add</i> -->
																<span>Tolak</span>
															</button>
														</a>
													<?php elseif (!($this->session->userdata('role') == 'K')) : ?>
														<center>
															<a href="#" data-toggle="tooltip" data-placement="top" title="#"><button disabled>-</button></a>&nbsp;

														</center>
													<?php endif; ?>
													<!-- //Acc laporan dari kepala -->
												<?php elseif ($te['keterangan'] == 'l') : ?>
													<?php if ($this->session->userdata('role') == 'K') : ?>
														<center>
															<a href="<?= base_url(); ?>Pengaduan/acc_kepala/<?= $te['id_pengaduan']; ?>">
																<button type="button" class="btn btn-success">
																	<!-- <i class="material-icons">add</i> -->
																	<span>Terima</span>
																</button>
															</a>
															<a href="<?= base_url(); ?>Pengaduan/cancel_kepala/<?= $te['id_pengaduan']; ?>">
																<button type="button" class="btn btn-danger">
																	<!-- <i class="material-icons">add</i> -->
																	<span>Tolak</span>
																</button>
															</a>
															<a href="<?= base_url(); ?>Pengaduan/revisi_kepala/<?= $te['id_pengaduan']; ?>">
																<button type="button" class="btn btn-warning">
																	<!-- <i class="material-icons">add</i> -->
																	<span>Revisi</span>
																</button>
															</a>
															<a href="<?= base_url(); ?>Pengaduan/detail/<?= $te['id_pengaduan']; ?>">
																<button type="button" class="btn btn-info">
																	<!-- <i class="material-icons">add</i> -->
																	<span>Detail</span>
																</button>
															</a>
														</center>
													<?php elseif (!($this->session->userdata('role') == 'K')) : ?>
														<center>
															<a href="<?= base_url(); ?>Pengaduan/detail/<?= $te['id_pengaduan']; ?>">
																<button type="button" class="btn btn-info">
																	<!-- <i class="material-icons">add</i> -->
																	<span>Detail</span>
																</button>
															</a>

														</center>
													<?php endif; ?>
													<!-- //terima/revisi proses kepala input laporan -->
												<?php elseif ($te['keterangan'] == 'tp' || $te['keterangan'] == 'rr') : ?>
													<?php if ($this->session->userdata('role') == 'A') : ?>
														<center>
															<a href="<?= base_url(); ?>Pengaduan/add/<?= $te['id_pengaduan']; ?>">
																<button type="button" class="btn btn-success">
																	<!-- <i class="material-icons">add</i> -->
																	<span>Buat Laporan</span>
																</button>
															</a>
															<a href="<?= base_url(); ?>Pengaduan/detail/<?= $te['id_pengaduan']; ?>">
																<button type="button" class="btn btn-info">
																	<!-- <i class="material-icons">add</i> -->
																	<span>Detail</span>
																</button>
															</a>
														</center>
													<?php elseif (!($this->session->userdata('role') == 'A')) : ?>
														<center>
															<a href="<?= base_url(); ?>Pengaduan/detail/<?= $te['id_pengaduan']; ?>">
																<button type="button" class="btn btn-info">
																	<!-- <i class="material-icons">add</i> -->
																	<span>Detail</span>
																</button>
															</a>

														</center>
													<?php endif; ?>

													<!-- //teknisi input estimasi -->
												<?php elseif ($te['keterangan'] == 'tr' || $te['keterangan'] == 'ri') : ?>
													<?php if ($this->session->userdata('role') == 'T') : ?>
														<?php if ($this->session->userdata('id_user') == $te['disposisi_teknisi']) : ?>
															<center>
																<a href="<?= base_url(); ?>Pengaduan/input_diagnosa/<?= $te['id_pengaduan']; ?>">
																	<button type="button" class="btn btn-success">
																		<!-- <i class="material-icons">add</i> -->
																		<span>Input Diagnosa dan Estimasi</span>
																	</button>
																</a>

																<a href="<?= base_url(); ?>Pengaduan/detail/<?= $te['id_pengaduan']; ?>">
																	<button type="button" class="btn btn-info">
																		<!-- <i class="material-icons">add</i> -->
																		<span>Detail</span>
																	</button>
																</a>
															</center>
														<?php else : ?>
															<center>
																<a href="<?= base_url(); ?>Pengaduan/detail/<?= $te['id_pengaduan']; ?>">
																	<button type="button" class="btn btn-info">
																		<!-- <i class="material-icons">add</i> -->
																		<span>Detail</span>
																	</button>
																</a>
															</center>
														<?php endif; ?>
													<?php elseif (!($this->session->userdata('role') == 'T')) : ?>
														<center>
															<a href="<?= base_url(); ?>Pengaduan/detail/<?= $te['id_pengaduan']; ?>">
																<button type="button" class="btn btn-info">
																	<!-- <i class="material-icons">add</i> -->
																	<span>Detail</span>
																</button>
															</a>

														</center>
													<?php endif; ?>
													<!-- //input estimasi biaya kepala acc/tolak/revisi -->
												<?php elseif ($te['keterangan'] == 'ie') : ?>
													<?php if ($this->session->userdata('role') == 'K') : ?>
														<center>
															<a href="<?= base_url(); ?>Pengaduan/acc_kepala/<?= $te['id_pengaduan']; ?>">
																<button type="button" class="btn btn-success">
																	<!-- <i class="material-icons">add</i> -->
																	<span>Terima</span>
																</button>
															</a>
															<a href="<?= base_url(); ?>Pengaduan/cancel_kepala/<?= $te['id_pengaduan']; ?>">
																<button type="button" class="btn btn-danger">
																	<!-- <i class="material-icons">add</i> -->
																	<span>Tolak</span>
																</button>
															</a>
															<a href="<?= base_url(); ?>Pengaduan/revisi_kepala/<?= $te['id_pengaduan']; ?>">
																<button type="button" class="btn btn-warning">
																	<!-- <i class="material-icons">add</i> -->
																	<span>Revisi</span>
																</button>
															</a>

															<a href="<?= base_url(); ?>Pengaduan/detail/<?= $te['id_pengaduan']; ?>">
																<button type="button" class="btn btn-info">
																	<!-- <i class="material-icons">add</i> -->
																	<span>Detail</span>
																</button>
															</a>
														</center>
													<?php elseif (!($this->session->userdata('role') == 'K')) : ?>
														<center>
															<a href="<?= base_url(); ?>Pengaduan/detail/<?= $te['id_pengaduan']; ?>">
																<button type="button" class="btn btn-info">
																	<!-- <i class="material-icons">add</i> -->
																	<span>Detail</span>
																</button>
															</a>

														</center>
													<?php endif; ?>

													<!-- //terima estimasi biaya teknisi buat tindakan -->
												<?php elseif ($te['keterangan'] == 'ti') : ?>
													<?php if ($this->session->userdata('role') == 'T') : ?>
														<?php if ($this->session->userdata('id_user') == $te['disposisi_teknisi']) : ?>
														<center>
															<a href="<?= base_url(); ?>Pengaduan/tindakan/<?= $te['id_pengaduan']; ?>">
																<button type="button" class="btn btn-success">
																	<!-- <i class="material-icons">add</i> -->
																	<span>Tindakan</span>
																</button>
															</a>

															<a href="<?= base_url(); ?>Pengaduan/detail/<?= $te['id_pengaduan']; ?>">
																<button type="button" class="btn btn-info">
																	<!-- <i class="material-icons">add</i> -->
																	<span>Detail</span>
																</button>
															</a>
														</center>
														<?php else : ?>
															<center>
	<a href="<?= base_url(); ?>Pengaduan/detail/<?= $te['id_pengaduan']; ?>">
																<button type="button" class="btn btn-info">
																	<!-- <i class="material-icons">add</i> -->
																	<span>Detail</span>
																</button>
															</a>
														</center>
														<?php endif; ?>
													<?php elseif (!($this->session->userdata('role') == 'T')) : ?>
														<center>
															<a href="<?= base_url(); ?>Pengaduan/detail/<?= $te['id_pengaduan']; ?>">
																<button type="button" class="btn btn-info">
																	<!-- <i class="material-icons">add</i> -->
																	<span>Detail</span>
																</button>
															</a>

														</center>
													<?php endif; ?>

													<!-- //input tindakan dan teknisi closing -->
												<?php elseif ($te['keterangan'] == 's') : ?>
													<?php if ($this->session->userdata('role') == 'T') : ?>
														<center>
															<a href="<?= base_url(); ?>Pengaduan/closing/<?= $te['id_pengaduan']; ?>">
																<button type="button" class="btn btn-success">
																	<!-- <i class="material-icons">add</i> -->
																	<span>Closing</span>
																</button>
															</a>

															<a href="<?= base_url(); ?>Pengaduan/detail/<?= $te['id_pengaduan']; ?>">
																<button type="button" class="btn btn-info">
																	<!-- <i class="material-icons">add</i> -->
																	<span>Detail</span>
																</button>
															</a>
														</center>
													<?php elseif (!($this->session->userdata('role') == 'T')) : ?>
														<center>
															<a href="<?= base_url(); ?>Pengaduan/detail/<?= $te['id_pengaduan']; ?>">
																<button type="button" class="btn btn-info">
																	<!-- <i class="material-icons">add</i> -->
																	<span>Detail</span>
																</button>
															</a>

														</center>
													<?php endif; ?>

													<!-- //terima estimasi biaya teknisi selesai -->
												<?php elseif ($te['keterangan'] == 'it') : ?>
													<?php if ($this->session->userdata('role') == 'T') : ?>
														<center>
															<a href="<?= base_url(); ?>Pengaduan/selesai_pengaduan/<?= $te['id_pengaduan']; ?>">
																<button type="button" class="btn btn-success">
																	<!-- <i class="material-icons">add</i> -->
																	<span>Selesai Pengaduan</span>
																</button>
															</a>

															<a href="<?= base_url(); ?>Pengaduan/detail/<?= $te['id_pengaduan']; ?>">
																<button type="button" class="btn btn-info">
																	<!-- <i class="material-icons">add</i> -->
																	<span>Detail</span>
																</button>
															</a>
														</center>
													<?php elseif (!($this->session->userdata('role') == 'T')) : ?>
														<center>
															<a href="<?= base_url(); ?>Pengaduan/detail/<?= $te['id_pengaduan']; ?>">
																<button type="button" class="btn btn-info">
																	<!-- <i class="material-icons">add</i> -->
																	<span>Detail</span>
																</button>
															</a>

														</center>
													<?php endif; ?>

												<?php elseif ($te['keterangan'] == 'c') : ?>
													<center>
														<a href="<?= base_url(); ?>Pengaduan/detail/<?= $te['id_pengaduan']; ?>">
															<button type="button" class="btn btn-info">
																<!-- <i class="material-icons">add</i> -->
																<span>Detail</span>
															</button>
														</a>

													</center>

												<?php else : ?>
													<center>
														<a href="<?= base_url(); ?>Pengaduan/detail/<?= $te['id_pengaduan']; ?>">
															<button type="button" class="btn btn-info">
																<!-- <i class="material-icons">add</i> -->
																<span>Detail</span>
															</button>
														</a>

													</center>
												<?php endif; ?>


											</td>
										</tr>

									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- #END# Basic Examples -->
	</div>
	</div>
</section>

<!-- Logout Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Apakah anda yakin ingin menghapus Data Pengaduan ini ?</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a id="hapus_nyo" class="btn btn-primary" href="#">Delete</a>
			</div>
		</div>
	</div>
</div>
