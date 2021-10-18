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
			<h2>LIST ITEM</h2>
		</div>

		<!-- Basic Examples -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="font-size: 22px;color:#ad1455;font-weight: bold;">
							<center>List Item</center>
						</h2> <br><br>
						<?php if ($this->session->userdata('role') == 'SA') : ?>
							<a href="<?= base_url(); ?>Item/add">
								<button type="button" class="btn btn-info waves-effect">
									<i class="material-icons">add</i>
									<span>TAMBAH</span>
								</button>
							</a>
						<?php endif; ?>
					</div>

					<div class="body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
								<thead>
									<tr>
										<th style="width:30px">No</th>
										<th>Nama item</th>
										<th>Jenis Item</th>
										<th>Harga Item</th>
										<?php if ($this->session->userdata('role') == 'SA') : ?>
											<th style="text-align: center;width:100px">ACTION</th>
										<?php endif; ?>
									</tr>
								</thead>

								<tbody>

									<?php $i = 1;
									foreach ($item as $te) : ?>
										<tr>
											<td><?= $i++; ?></td>
											<td><?= $te['nama_item'] ?></td>
											<td><?= $te['jenis_item'] ?></td>
											<td>Rp. <?= number_format($te['harga_item'], 0, ',', '.') ?></td>
											<?php if ($this->session->userdata('role') == 'SA') : ?>
												<td style="text-align: center;vertical-align: middle;">
													<center>
														<a href="<?= base_url(); ?>Item/edit/<?= $te['id_item']; ?>" data-toggle="tooltip" data-placement="top" title="Edit"><i style="color:#00b0e4;" class="material-icons">description</i></a>&nbsp;

													</center>
												</td>
											<?php endif; ?>

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
			<div class="modal-body">Apakah anda yakin ingin menghapus Data Item ini ?</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a id="hapus_nyo" class="btn btn-primary" href="#">Delete</a>
			</div>
		</div>
	</div>
</div>
