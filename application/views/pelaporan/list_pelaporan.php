[
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
			<h2>LIST PELAPORAN</h2>
		</div>

		<!-- Basic Examples -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="font-size: 22px;color:#ad1455;font-weight: bold;">
							<center>List Pelaporan</center>
						</h2> <br><br>



					</div>

					<div class="body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover dataTable invt1">
								<thead>
									<tr>
										<th style="width:30px">No</th>
										<!-- <th>Id</th> -->
										<th>Nomor Pengaduan</th>
										<th>Teknisi</th>
										<th>Tindakan</th>
										<th>Diagnosa Masalah</th>
										<th>Tgl Pengaduan</th>
										<th>Tgl Disposisi</th>
										<th>Total Biaya</th>
										<th>Tgl Diagnosa</th>
										<th>Tgl Tindakan</th>
										<th>Tgl Selesai</th>
										<th>List Biaya</th>
									</tr>
								</thead>

								<tbody>

									<?php $i = 1;
									foreach ($pelaporan as $te) : ?>
										<tr>
											<td><?= $i++; ?></td>
											<td><?= isset($te['pengaduan_id']) ? $te['pengaduan_id'] : '-' ?></td>
											<td><?= isset($te['nama']) ? $te['nama'] : '-' ?></td>

											<td><?= isset($te['tindakan']) ? $te['tindakan'] : '-' ?></td>
											<td><?= isset($te['diagnosa_masalah']) ? $te['diagnosa_masalah'] : '-' ?></td>
											<td><?= isset($te['tgl_pengaduan']) ? $te['tgl_pengaduan'] : '-' ?></td>
											<td><?= isset($te['tgl_disposisi']) ? $te['tgl_disposisi'] : '-' ?></td>
											<td><?= isset($te['total_biaya']) ? 'Rp ' . number_format($te['total_biaya'], 0, ',', '.') : '-' ?></td>
											<td><?= isset($te['tgl_diagnosa']) ? $te['tgl_diagnosa'] : '-' ?></td>
											<td><?= isset($te['tgl_tindakan']) ? $te['tgl_tindakan'] : '-' ?></td>
											<td><?= isset($te['tgl_selesai']) ? $te['tgl_selesai'] : '-' ?></td>
											<td>

												<a href="<?= base_url(); ?>Pengaduan/detail_biaya/<?= $te['id_internal']; ?>">
													<button type="button" class="btn btn-info">
														<!-- <i class="material-icons">add</i> -->
														<span>Detail</span>
													</button>
												</a>

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
