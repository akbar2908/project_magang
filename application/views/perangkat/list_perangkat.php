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
			<h2>LIST PERANGKAT</h2>
		</div>

		<!-- Basic Examples -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="font-size: 22px;color:#ad1455;font-weight: bold;">
							<center>List Perangkat</center>
						</h2> <br><br>

						<a href="<?= base_url(); ?>Perangkat/add">
							<button type="button" class="btn btn-info waves-effect">
								<i class="material-icons">add</i>
								<span>TAMBAH</span>
							</button>
						</a>

					</div>

					<div class="body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
								<thead>
									<tr>
										<th style="width:30px">No</th>
										<th>No Inventaris</th>
										<th>Nama Perangkat</th>
										<th>Jenis Perangkat</th>
										<th style="text-align: center;width:100px">ACTION</th>
									</tr>
								</thead>

								<tbody>

									<?php $i = 1;
									foreach ($perangkat as $te) : ?>
										<tr>
											<td><?= $i++; ?></td>
											<td><?= $te['no_inventaris'] ?></td>
											<td><?= $te['nama_perangkat'] ?></td>
											<td><?= $te['jenis_perangkat'] ?></td>

											<td style="text-align: center;vertical-align: middle;">
												<center>
													<a href="<?= base_url(); ?>Perangkat/edit/<?= $te['id_perangkat']; ?>" data-toggle="tooltip" data-placement="top" title="Edit"><i style="color:#00b0e4;" class="material-icons">description</i></a>&nbsp;

												</center>
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
			<div class="modal-body">Apakah anda yakin ingin menghapus Data Perangkat ini ?</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a id="hapus_nyo" class="btn btn-primary" href="#">Delete</a>
			</div>
		</div>
	</div>
</div>
