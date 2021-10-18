<link href="<?= base_url(); ?>assets/subbagumumBsb/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
<link href="<?= base_url(); ?>assets/subbagumumBsb/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" />

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
			<h2>LAPORKAN PENGADUAN</h2>
		</div>

		<!-- Input -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="font-weight: bold;color: #ad1455;font-size: 22px;">
							<center>FORM REVISI PENGADUAN</center>
							<br>
						</h2>
					</div>

					<div class="body">
						<?php $attribute = array('method' => 'post'); ?>
						<?php echo form_open('pengaduan/revisi_kepala/' . $pengaduan['id_pengaduan'], $attribute); ?>

						<div class="row clearfix">
							<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
								<h4 style="font-size: 17.1px;">Catatan Revisi</h4>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<div class="form-group">
									<div class="form-line">
										<textarea name="revisi" class="form-control"></textarea>

									</div>
								</div>
							</div>

						</div>

						<div class="row clearfix">
							<input type="submit" class="btn btn-primary pull-right" style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;" value="SIMPAN" name="submit">
							<!-- <button class="btn btn-primary pull-right" style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;">SIMPAN</button> -->
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- #END# Input -->

	</div>
	</div>
</section>
