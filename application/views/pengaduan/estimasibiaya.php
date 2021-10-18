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
			<h2>DIAGNOSA DAN ESTIMASI BIAYA</h2>
		</div>

		<!-- Input -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2 style="font-weight: bold;color: #ad1455;font-size: 22px;">
							<center>FORM DIAGNOSA DAN ESTIMASI BIAYA</center>
							<br>
						</h2>
					</div>

					<div class="body">

						<?php $attribute = array('method' => 'post'); ?>
						<?php echo form_open('pengaduan/input_diagnosa/' . $id_pengaduan, $attribute); ?>


						<div class="table-responsive">
							<div id="anak" style="display:block">
								<table border="1" class="table table-bordered" id="tblAddRow">
									<thead class="table-danger" style="background-color: #dd4b39; color: white;">
										<tr>
											<th style="font-size: 14px;">
												<center>Nama Item</center>
											</th>
											<th style="font-size: 14px;">
												<center>Jumlah Item</center>
											</th>
											<th style="font-size: 14px;">
												<center>Harga Item</center>
											</th>
											<th style="font-size: 14px;">
												<center>Action</center>
											</th>
										</tr>
									</thead>
									<tbody id="estimate">
										<tr>
											<!-- <td><input style="font-size: 14px;" id="item1" class="form-control" type="text" name="nama_item[]" placeholder="Contoh : Barang " autocomplete="off"></td> -->
											<td><select name="item[]" id="item1" class="form-control"></select></td>
											<td><input style="font-size: 14px;" id="item2" class="form-control" type="number" oninput="maxLengthCheck(this)" maxlength="16" min="1" max="9999999999999999" name="jumlah_item[]" placeholder="Contoh : 10" autocomplete="off"></td>
											<td><input style="font-size: 14px;" id="item3" class="form-control" type="number" oninput="maxLengthCheck(this)" maxlength="16" min="1" max="9999999999999999" name="harga_item[]" placeholder="Contoh : 11.000.000" autocomplete="off"></td>

										</tr>
									</tbody>

								</table>
							</div>
							<button id="btnAddRow" style="display:block" class="btn btn-primary" type="button" style="color:white; min-width: 100px;max-width: 150px; font-size: 14px;">
								Tambah Item</i>
							</button>
						</div>
						<br><br>

						<div class="row clearfix">
							<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
								<h4 style="font-size: 17.1px;">Diagnosa Masalah</h4>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<div class="form-group">
									<div class="form-line">
										<!-- <input class="form-control" type="text" name="jenis_item" placeholder="Contoh : Komputer">
									 -->
										<textarea name="diagnosa_masalah" id="diagnosa_masalah" class="form-control"><?= isset($diagnosa) ? $diagnosa : '' ?></textarea>
									</div>
								</div>
							</div>

						</div>

						<!-- <div class="row clearfix">
							<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
								<h4 style="font-size: 17.1px;">Total Biaya</h4>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<div class="form-group">
									<div class="form-line">
										<input class="form-control" type="number" name="total_biaya" placeholder="Contoh : 11.000.000">
									</div>
								</div>
							</div>

						</div> -->


						<div class="row clearfix">
							<input type="submit" class="btn btn-primary pull-right" style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;" value="SIMPAN" name="submit">
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
