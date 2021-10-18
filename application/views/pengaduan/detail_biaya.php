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
			<h2>LIST BIAYA</h2>
		</div>

		<!-- Basic Examples -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="font-size: 22px;color:#ad1455;font-weight: bold;">
							<center>List Biaya</center>
						</h2> <br><br>



					</div>

					<div class="body">
						<?php if (isset($detail_biaya)) : ?>
							<div class="table-responsive">
								<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
									<thead>
										<tr>
											<th style="width:30px">No</th>
											<!-- <th>Id Item</th> -->
											<th>Nama item</th>
											<th>Jumlah Item</th>
											<th>Harga Item</th>
										</tr>
									</thead>

									<tbody>

										<?php $i = 1;
										foreach ($detail_biaya as $te) : ?>
											<tr>
												<td><?= $i++; ?></td>
												<!-- <td><?= $te['id_item'] ?></td> -->
												<td><?= $te['nama_item'] ?></td>
												<td><?= $te['jumlah_item'] ?></td>
												<td>Rp. <?= number_format($te['harga_item'], 0, ',', '.'); ?></td>
											</tr>

										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						<?php else : ?>
							<h2 style="font-size: 22px;color:#ad1455;font-weight: bold;">
								<center>Belum ada List Biaya</center>
							</h2>
						<?php endif; ?>
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
