<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<!-- Jquery Core Js -->
<script src="<?= base_url(); ?>assets/AdminBsb/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="<?= base_url(); ?>assets/AdminBsb/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<!-- <script src="<?= base_url(); ?>assets/AdminBsb/plugins/bootstrap-select/js/bootstrap-select.js"></script> -->

<!-- Slimscroll Plugin Js -->
<script src="<?= base_url(); ?>assets/AdminBsb/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?= base_url(); ?>assets/AdminBsb/plugins/node-waves/waves.js"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="<?= base_url(); ?>assets/AdminBsb/plugins/jquery-countto/jquery.countTo.js"></script>

<!-- Morris Plugin Js -->
<script src="<?= base_url(); ?>assets/AdminBsb/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url(); ?>assets/AdminBsb/plugins/morrisjs/morris.js"></script>

<!-- ChartJs -->
<script src="<?= base_url(); ?>assets/AdminBsb/plugins/chartjs/Chart.bundle.js"></script>


<!-- Flot Charts Plugin Js -->
<script src="<?= base_url(); ?>assets/AdminBsb/plugins/flot-charts/jquery.flot.js"></script>
<script src="<?= base_url(); ?>assets/AdminBsb/plugins/flot-charts/jquery.flot.resize.js"></script>
<script src="<?= base_url(); ?>assets/AdminBsb/plugins/flot-charts/jquery.flot.pie.js"></script>
<script src="<?= base_url(); ?>assets/AdminBsb/plugins/flot-charts/jquery.flot.categories.js"></script>
<script src="<?= base_url(); ?>assets/AdminBsb/plugins/flot-charts/jquery.flot.time.js"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="<?= base_url(); ?>assets/AdminBsb/plugins/jquery-sparkline/jquery.sparkline.js"></script>

<!-- Custom Js -->
<script src="<?= base_url(); ?>assets/AdminBsb/js/admin.js"></script>
<script src="<?= base_url(); ?>assets/AdminBsb/js/pages/index.js"></script>
<script src="<?= base_url(); ?>assets/AdminBsb/js/pages/tables/jquery-datatable.js"></script>

<!-- Demo Js -->
<script src="<?= base_url(); ?>assets/AdminBsb/js/demo.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="<?= base_url(); ?>assets/AdminBsb/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?= base_url(); ?>assets/AdminBsb/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url(); ?>assets/AdminBsb/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/AdminBsb/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="<?= base_url(); ?>assets/AdminBsb/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/AdminBsb/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/AdminBsb/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>assets/AdminBsb/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/AdminBsb/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

<script type="text/javascript">
	// Add button Delete in row
	$('#estimate tr')
		.find('td')
		//.append('<input type="button" value="Delete" class="del"/>')
		.parent() //traversing to 'tr' Element
		.append('<td><a href="#" class="delrow"> <center><button id="btnDelLastRow" style="font-size: 14px;" class="btn btn-danger" type="button"><i class="material-icons">delete</i></button></center> </a></td>');

	// Add row the table
	$('#btnAddRow').on('click', function() {
		var lastRow = $('#tblAddRow tbody tr:last').html();
		//alert(lastRow);
		$('#tblAddRow tbody').append('<tr>' + lastRow + '</tr>');
		$('#tblAddRow tbody tr:last input').val('');

	});

	// Delete last row in the table
	$('#btnDelLastRow').on('click', function() {
		var lenRow = $('#tblAddRow tbody tr').length;
		//alert(lenRow);
		if (lenRow == 1 || lenRow <= 1) {
			alert("Tidak bisa menghapus semua kolom!");
		} else {
			$('#tblAddRow tbody tr:last').remove();
		}
	});

	// Delete row on click in the table
	$('#tblAddRow').on('click', 'tr a', function(e) {
		var lenRow = $('#tblAddRow tbody tr').length;
		e.preventDefault();
		if (lenRow == 1 || lenRow <= 1) {
			//alert("Can't remove all row!");
		} else {
			$(this).parents('tr').remove();
		}

	});

	$.ajax({
		url: "<?php echo base_url(); ?>/Pengaduan/get_item",
		type: 'get',
		dataType: 'json',
		success: function(res) {

			if (res) {
				// $('#item1').empty().append('<option selected="true" disabled="disabled">--Pilih Item--</option>');
				$.each(res, function(index, data) {
					$("#item1").append('<option value="' + data.id_item + '">' + data.nama_item + '</option>');
				});
			} else {
				$("#item1").empty();
			}

			// $("#item3").val(res[0].harga_item);

		}
	})
	$('#modalBagian').modal('show');
</script>





<script>
	$(document).ready(function() {
		$('#lapor').DataTable({
			dom: 'Bfrtip',
			buttons: [{
					extend: 'copyHtml5',
					footer: true
				},
				{
					extend: 'excelHtml5',
					footer: true
				},
				{
					extend: 'csvHtml5',
					footer: true
				},
				{
					extend: 'pdfHtml5',
					footer: true
				},

			]
		});
	});
</script>
<!-- Bootstrap Datepicker Plugin Js -->
<script src="<?= base_url(); ?>assets/AdminBsb/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?= base_url(); ?>assets/AdminBsb/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<script>
	$(function() {

		$(".datepicker").datepicker({
			format: 'yyyy-mm-dd',
			orientation: 'bottom auto',
			autoclose: true,
			todayHighlight: true,
		});

		$('#datepicker').on('change', function() {

			var date = $(this).datepicker("getDate");
			var today = new Date();
			var d = date.setDate(date.getDate());
			var t = today.setDate(today.getDate() - 1);
			var seven = today.setDate(today.getDate() + 7);

			if (d < t) {
				swal({
					title: "Opps !!!",
					text: "Tanggal tidak boleh sebelum dari hari ini",
					showConfirmButton: false,
					type: 'error',
				});
				$('#datepicker').val('');

			} else if (d > seven) {
				swal({
					title: "Opps !!!",
					text: "Tanggal tidak boleh lebih seminggu dari hari ini",
					showConfirmButton: false,
					type: 'error',
				});
				$('#datepicker').val('');
			} else {
				$('#datepicker').val(date);
			}

		});

	});

	$(function() {

		$(".datepicker").datepicker({
			format: 'yyyy-mm-dd',
			orientation: 'bottom auto',
			autoclose: true,
			todayHighlight: true,
		});

		$('#tanggal_mulai').on('change', function() {

			var mulai = new Date(this.value);
			var selesai = new Date($('#tanggal_selesai').val());

			console.log(mulai);
			if (selesai != '') {
				if (mulai >= selesai) {
					swal({
						title: "Opps !!!",
						text: "Tanggal selesai tidak boleh lebih rendah dari tanggal mulai",
						showConfirmButton: false,
						type: 'error',
					});
					$('#tanggal_mulai').val('');

				} else {
					$('#tanggal_mulai').val(mulai);
				}
			}

		});


	});

	$(function() {

		$(".datepicker").datepicker({
			format: 'yyyy-mm-dd',
			orientation: 'bottom auto',
			autoclose: true,
			todayHighlight: true,
		});

		$('#tanggal_selesai').on('change', function() {


			var selesai = new Date(this.value);
			var mulai = new Date($('#tanggal_mulai').val());

			if (mulai != '') {
				if (selesai <= mulai) {
					swal({
						title: "Opps !!!",
						text: "Tanggal selesai tidak boleh lebih rendah dari tanggal mulai",
						showConfirmButton: false,
						type: 'error',
					});
					$('#tanggal_selesai').val('');

				} else {
					$('#tanggal_selesai').val(selesai);
				}
			}

		});


	});



	$('#waktu_mulai').on('change', function() {
		var mulai = document.getElementById("waktu_mulai").value;
		var selesai = document.getElementById("waktu_selesai").value;

		if (selesai != '') {
			if (mulai >= selesai) {
				swal({
					title: "Opps !!!",
					text: "Waktu mulai harus lebih kecil dari waktu selesai",
					showConfirmButton: false,
					type: 'error',
				});
				$('#waktu_mulai').val('');
			} else {
				$('#waktu_mulai').val(mulai);
			}
		}

	});


	$('#waktu_selesai').on('change', function() {
		var mulai = document.getElementById("waktu_mulai").value;
		var selesai = document.getElementById("waktu_selesai").value;

		if (mulai != '') {
			if (selesai <= mulai) {
				swal({
					title: "Opps !!!",
					text: "Waktu selesai harus lebih besar daripada waktu mulai",
					showConfirmButton: false,
					type: 'error',
				});
				$('#waktu_selesai').val('');
			} else {
				$('#waktu_selesai').val(selesai);
			}
		}

	});

	$('#tes').change(function() {

		var m = $(this).val();
		$.ajax({
			type: "GET", // Method pengiriman data bisa dengan GET atau POST
			url: '<?php echo base_url(); ?>dosen/Pertemuan/get_list', // Isi dengan url/path file php yang dituju
			data: {
				"id_kelas": m
			}, // data yang akan dikirim ke file yang dituju
			dataType: "json",
			beforeSend: function(e) {
				if (e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(ajaxData) {

				var obj = ajaxData;

				rows = "";

				for (i = 0; i < obj.length; i++) {
					rows += "<option value=" + obj[i].nomor_pertemuan + ">" + obj[i].nama_pertemuan + "</option>";
				}
				// console.log(rows);
				$("#id_sesi").html(rows);
			},
			error: function(request, status, error) {
				console.log(error);
			}
		})
	})

	$(function() {
		$('#stok').on('change', function() {

			var x = document.getElementById("stok").value;
			console.log(x);
			if (x <= 0) {
				swal({
					title: "Opps !!!",
					text: "SKS tidak boleh kurang dari 0",
					showConfirmButton: false,
					type: 'error',
				});
				$('#stok').val('');
			} else if (x > 4) {
				swal({
					title: "Opps !!!",
					text: "SKS tidak boleh lebih dari  4",
					showConfirmButton: false,
					type: 'error',
				});
				$('#stok').val('');
			}
		});
	});
</script>

<script type="text/javascript">
	$(document).on("click", "#btn_posisi", function() {
		var id = $(this).data('id');
		var url = '<?= site_url('admin/dosen/delete/') ?>';
		$("#hapus_nyo").attr('href', url + id);

	})

	$(document).on("click", "#btn_posisi1", function() {
		var id = $(this).data('id');
		var url = '<?= site_url('admin/siswa/delete/') ?>';
		$("#hapus_nyo").attr('href', url + id);

	})


	$(document).on("click", "#btn_posisi2", function() {
		var id = $(this).data('id');
		var url = '<?= site_url('admin/kelas/delete/') ?>';
		$("#hapus_nyo").attr('href', url + id);

	})
</script>

<!-- 
<script type="text/javascript">
	$(document).on("click", "#btn_posisi1", function() {
		var id = $(this).data('id');
		var url = '<?= site_url('satuan/delete/') ?>';
		$("#hapus_nyo").attr('href', url + id);

	})
</script> -->
<script>
	function cekJpg(file) {
		var sFileName = file.files[0].name;
		var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();
		var iFileSize = file.size;
		var iConvert = (file.files[0].size / 1048576).toFixed(2);
		var FileSize = file.files[0].size / 1024 / 1024; // in MB

		/// OR together the accepted extensions and NOT it. Then OR the size cond.
		/// It's easier to see this way, but just a suggestion - no requirement.
		if (!(sFileExtension === "JPG" ||
				sFileExtension === "JPEG" ||
				sFileExtension === "GIF" ||
				sFileExtension === "PNG" ||
				sFileExtension === "jpg" ||
				sFileExtension === "jpeg" ||
				sFileExtension === "gif" ||
				sFileExtension === "png") || FileSize > 0.5) { /// 10 mb
			txt = "Tipe File :   '" + sFileExtension + "'\n\n";
			txt += "Size:  " + iConvert + " MB \n\n";
			txt += "Tidak Diperbolehkan Karna Bukan Format File Yang Diperbolehkan JPG,JPEG,PNG dan tidak lebih dari 500 KB.\n\n" + sFileExtension + FileSize;
			console.log(txt);
			swal({
				title: "ERROR !!!",
				text: txt,
				showConfirmButton: true,
				type: 'error'
			});
			$(file).val('');
			return false;
		} else {
			console.log('ini salah');
		}
	}
</script>

<!-- hide password -->
<script type="text/javascript">
	$(".toggle-password").click(function() {

		$(this).toggleClass("fa-eye fa-eye-slash");
		var input = $($(this).attr("toggle"));
		if (input.attr("type") == "password") {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}
	});

	$(".toggle-password1").click(function() {

		$(this).toggleClass("fa-eye fa-eye-slash");
		var input = $($(this).attr("toggle"));
		if (input.attr("type") == "password") {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}
	});

	$(".toggle-password2").click(function() {

		$(this).toggleClass("fa-eye fa-eye-slash");
		var input = $($(this).attr("toggle"));
		if (input.attr("type") == "password") {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}
	});
</script>
<!-- tutup hide password  -->

<!-- validasi password -->
<script type="text/javascript">
	function CheckPassword(input) {
		var pass = /^[A-Za-z]\w{8,15}$/;
		if (input.value.match(pass)) {
			return true;
		} else {
			swal({
				title: "Opps !!!",
				text: "Password tidak sesuai ketentuan",
				showConfirmButton: false,
				showCancelButton: true,
				closeOnConfirm: false,
				type: 'error',
			});
			return false;
		}
	}

	function passwordOld() {
		var passOld = document.getElementById("password-field").value
		var pass = document.getElementById("password-field1").value

		if (passOld == '')

		{
			$('#password-field').focus();
			swal({
				title: "Opps !!!",
				text: "Password Lama Tidak Boleh Kosong",
				showConfirmButton: false,
				showCancelButton: true,
				closeOnConfirm: false,
				type: 'error',
			});
			document.getElementById('errorOld').innerHTML = 'Nothing Password';
		} else {
			document.getElementById('errorOld').innerHTML = '';
		}

		if (passOld == pass && passOld !== '') {
			$('#password-field1').focus();
			swal({
				title: "Opps !!!",
				text: "Password baru tidak boleh sama dengan password lama",
				showConfirmButton: false,
				showCancelButton: true,
				closeOnConfirm: false,
				type: 'error',
			});

			document.getElementById('errorOld').innerHTML = '';
			document.getElementById('password-field1').value = '';
		} else {
			document.getElementById('errorOld').innerHTML = '';
		}

	}

	function confirmPass() {
		var pass = document.getElementById("password-field1").value
		var confPass = document.getElementById("password-field2").value
		if (pass != confPass) {
			$('#password-field2').focus();
			swal({
				title: "Opps !!!",
				text: "Confirm Password Tidak Sama dengan password baru",
				showConfirmButton: false,
				showCancelButton: true,
				closeOnConfirm: false,
				type: 'error',
			});
			document.getElementById('password-field2').value = '';
		} else {
			document.getElementById('errorOld').innerHTML = '';
		}
	}

	function confirmPass1() {

		var passOld = document.getElementById("password-field").value
		var pass = document.getElementById("password-field1").value

		if (passOld == '')

		{
			$('#password-field').focus();
			swal({
				title: "Opps !!!",
				text: "Password Lama Tidak Boleh Kosong",
				showConfirmButton: false,
				showCancelButton: true,
				closeOnConfirm: false,
				type: 'error',
			});
			document.getElementById('errorOld').innerHTML = 'Nothing Password';
		} else {
			document.getElementById('errorOld').innerHTML = '';
		}

		if (pass == '' & passOld !== '') {
			$('#password-field1').focus();
			swal({
				title: "Opps !!!",
				text: "Password baru tidak boleh kosong",
				showConfirmButton: false,
				showCancelButton: true,
				closeOnConfirm: false,
				type: 'error',
			});

			document.getElementById('errorOld').innerHTML = '';
			document.getElementById('password-field2').value = '';
		} else {
			document.getElementById('errorOld').innerHTML = '';
		}
	}

	function passConfim() {

		var password = document.getElementById("password-field1").value
		if (password == "") {
			$('#password-field1').focus();
			swal({
				title: "Opps !!!",
				text: "Password tidak boleh kosong!!",
				showConfirmButton: false,
				showCancelButton: true,
				closeOnConfirm: false,
				type: 'error',
			});
		}
	}
</script>
<!-- tutup validasi password -->


<link href="<?= base_url(); ?>assets/AdminBsb/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
<link href="<?= base_url(); ?>assets/AdminBsb/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.4/dist/sweetalert2.all.min.js"></script>
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
<?php endif; ?>


<script>
	$('.invt').DataTable({
			dom: '<"html5buttons">Blfrtip',
			buttons: [{
					extend: 'excelHtml5',
					title: 'Laporan Pengaduan',
					footer: true,
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
					},
					customize: function(xlsx) {
						var sheet = xlsx.xl.worksheets['sheet1.xml'];
						// jQuery selector to add a border
						$('row c[r*="1"]', sheet).attr('s', '2');
						var sheet = xlsx.xl.worksheets['sheet1.xml'];
						var col = $('col', sheet);
						col.each(function() {
							$(this).attr('width', 30);
						});
					},

				},
				

			]
		});
</script>


<script>
	$('.invt1').DataTable({
			dom: '<"html5buttons">Blfrtip',
			buttons: [{
					extend: 'excelHtml5',
					title: 'Laporan',
					footer: true,
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
					},
					customize: function(xlsx) {
						var sheet = xlsx.xl.worksheets['sheet1.xml'];
						// jQuery selector to add a border
						$('row c[r*="1"]', sheet).attr('s', '2');
						var sheet = xlsx.xl.worksheets['sheet1.xml'];
						var col = $('col', sheet);
						col.each(function() {
							$(this).attr('width', 30);
						});
					},

				},
				

			]
		});
</script>
