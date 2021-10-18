	<style>
		@media screen and (max-width: 576px) {
			.hp {
				height: 250px !important;
				min-width: 290px !important;
				max-width: 290px !important;
			}
		}
	</style>

	<section class="content">
		<div class="container-fluid">
			<div class="block-header">
				<h2>DETAIL Pelaporan</h2>
			</div>

			<!-- Input -->
			<div class="row clearfix">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="card">
						<div class="header">
							<h2 style="font-weight: bold;color: #ad1455;font-size: 22px;">
								<center>Detail Pelaporan</center>
								<br>
							</h2>
						</div>
						<div class="body">

							<!-- 
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<center><img style="width:300px;height:250px;" src="<?= base_url(); ?>assets/Foto/siswa/3.png"></center>
								</div>
							</div> -->


							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
									<label style="font-size: 18px;font-weight: normal; padding-left: 0px;">Nomor Pengaduan</label>
								</div>
								<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
									<label class="pull-right" style="font-size: 18px;font-weight: normal; padding-left: 0px;">:</label>
								</div>
								<div class="col-xs-5 col-sm-5 col-md-9 col-lg-9">
									<label style="font-size: 18px;font-weight: normal;padding-left: 0px;"><?= isset($pengaduan['pengaduan_id']) ? $pengaduan['pengaduan_id'] : '-' ?></label>
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
									<label style="font-size: 18px;font-weight: normal; padding-left: 0px;">Nama Teknisi</label>
								</div>
								<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
									<label class="pull-right" style="font-size: 18px;font-weight: normal; padding-left: 0px;">:</label>
								</div>
								<div class="col-xs-5 col-sm-5 col-md-9 col-lg-9">
									<label style="font-size: 18px;font-weight: normal;padding-left: 0px;"><?= isset($pengaduan['nama']) ? $pengaduan['nama'] : '-' ?></label>
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
									<label style="font-size: 18px;font-weight: normal; padding-left: 0px;">Tanggal Pengaduan</label>
								</div>
								<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
									<label class="pull-right" style="font-size: 18px;font-weight: normal; padding-left: 0px;">:</label>
								</div>
								<div class="col-xs-5 col-sm-5 col-md-9 col-lg-9">
									<label style="font-size: 18px;font-weight: normal;padding-left: 0px;"><?= isset($pengaduan['tgl_pengaduan']) ? $pengaduan['tgl_pengaduan'] : '-' ?></label>
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
									<label style="font-size: 18px;font-weight: normal; padding-left: 0px;">Tanggal Disposisi</label>
								</div>
								<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
									<label class="pull-right" style="font-size: 18px;font-weight: normal; padding-left: 0px;">:</label>
								</div>
								<div class="col-xs-5 col-sm-5 col-md-9 col-lg-9">
									<label style="font-size: 18px;font-weight: normal;padding-left: 0px;"><?= isset($pengaduan['tgl_disposisi']) ? $pengaduan['tgl_disposisi'] : '-' ?></label>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
									<label style="font-size: 18px;font-weight: normal; padding-left: 0px;">Tanggal Diagnosa</label>
								</div>
								<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
									<label class="pull-right" style="font-size: 18px;font-weight: normal; padding-left: 0px;">:</label>
								</div>
								<div class="col-xs-5 col-sm-5 col-md-9 col-lg-9">
									<label style="font-size: 18px;font-weight: normal;padding-left: 0px;"><?= isset($pengaduan['tgl_diagnosa']) ? $pengaduan['tgl_diagnosa'] : '-' ?></label>
								</div>
							</div>


							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
									<label style="font-size: 18px;font-weight: normal; padding-left: 0px;"> Diagnosa Masalah</label>
								</div>
								<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
									<label class="pull-right" style="font-size: 18px;font-weight: normal; padding-left: 0px;">:</label>
								</div>
								<div class="col-xs-5 col-sm-5 col-md-9 col-lg-9">
									<label style="font-size: 18px;font-weight: normal;padding-left: 0px;"><?= isset($pengaduan['diagnosa_masalah']) ? $pengaduan['diagnosa_masalah'] : '-' ?></label>
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
									<label style="font-size: 18px;font-weight: normal; padding-left: 0px;"> Total Biaya</label>
								</div>
								<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
									<label class="pull-right" style="font-size: 18px;font-weight: normal; padding-left: 0px;">:</label>
								</div>
								<div class="col-xs-5 col-sm-5 col-md-9 col-lg-9">
									<label style="font-size: 18px;font-weight: normal;padding-left: 0px;"><?= isset($pengaduan['total_biaya']) ? 'Rp ' . number_format($pengaduan['total_biaya'], 0, ',', '.') : '-' ?></label>
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
									<label style="font-size: 18px;font-weight: normal; padding-left: 0px;"> List Item</label>
								</div>
								<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
									<label class="pull-right" style="font-size: 18px;font-weight: normal; padding-left: 0px;">:</label>
								</div>
								<?php if (isset($pengaduan['id_internal'])) : ?>
									<div class="col-xs-5 col-sm-5 col-md-9 col-lg-9">
										<a href="<?= base_url(); ?>Pengaduan/detail_biaya/<?= $pengaduan['id_internal']; ?>">
											<button type="button" class="btn btn-info">
												<!-- <i class="material-icons">add</i> -->
												<span>Detail</span>
											</button>
										</a>

									</div>
								<?php endif; ?>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
									<label style="font-size: 18px;font-weight: normal; padding-left: 0px;">Tanggal Tindakan</label>
								</div>
								<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
									<label class="pull-right" style="font-size: 18px;font-weight: normal; padding-left: 0px;">:</label>
								</div>
								<div class="col-xs-5 col-sm-5 col-md-9 col-lg-9">
									<label style="font-size: 18px;font-weight: normal;padding-left: 0px;"><?= isset($pengaduan['tgl_tindakan']) ? $pengaduan['tgl_tindakan'] : '-' ?></label>
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
									<label style="font-size: 18px;font-weight: normal; padding-left: 0px;">Tindakan</label>
								</div>
								<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
									<label class="pull-right" style="font-size: 18px;font-weight: normal; padding-left: 0px;">:</label>
								</div>
								<div class="col-xs-5 col-sm-5 col-md-9 col-lg-9">
									<label style="font-size: 18px;font-weight: normal;padding-left: 0px;"><?= isset($pengaduan['tindakan']) ? $pengaduan['tindakan'] : '-' ?></label>
								</div>
							</div>


							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
									<label style="font-size: 18px;font-weight: normal; padding-left: 0px;"> Lampiran Tindakan</label>
								</div>
								<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
									<label class="pull-right" style="font-size: 18px;font-weight: normal; padding-left: 0px;">:</label>
								</div>
								<?php if (isset($pengaduan['file'])) : ?>
									<div class="col-xs-5 col-sm-5 col-md-9 col-lg-9">
										<a href="<?= base_url(); ?>assets/tindakan/<?= $pengaduan['file']; ?>" target="_blank">
											<button type="button" class="btn btn-info">
												<!-- <i class="material-icons">add</i> -->
												<span>File</span>
											</button>
										</a>

									</div>
								<?php endif; ?>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
									<label style="font-size: 18px;font-weight: normal; padding-left: 0px;">Tanggal Selesai</label>
								</div>
								<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
									<label class="pull-right" style="font-size: 18px;font-weight: normal; padding-left: 0px;">:</label>
								</div>
								<div class="col-xs-5 col-sm-5 col-md-9 col-lg-9">
									<label style="font-size: 18px;font-weight: normal;padding-left: 0px;"><?= isset($pengaduan['tgl_selesai']) ? $pengaduan['tgl_selesai'] : '-' ?></label>
								</div>
							</div>


							<div class="row clearfix">

								<!-- <a class="btn btn-primary pull-right" style="margin-right: 20px;font-size: 16px;height: 40px;width: 200px;" href="#">Reset Password</a> -->

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
