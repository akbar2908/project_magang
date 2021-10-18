    <section class="content">
    	<div class="container-fluid">
    		<div class="block-header">
    			<h2>DASHBOARD</h2>
    		</div>
    		<!-- Widgets -->
    		<div class="row clearfix">
    			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    				<div class="info-box bg-pink hover-expand-effect">
    					<div class="icon">
    						<i class="material-icons">equalizer</i>
    					</div>
    					<div class="content">
    						<div class="text">TOTAL PENGADUAN SELESAI</div>
    						<div class="number count-to" data-from="0" data-to="<?= $total_selesai ?>" data-speed="15" data-fresh-interval="20"></div>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    				<div class="info-box bg-cyan hover-expand-effect">
    					<div class="icon">
    						<i class="material-icons">face</i>
    					</div>
    					<div class="content">
    						<div class="text">TOTAL PENGADUAN DITOLAK</div>
    						<div class="number count-to" data-from="0" data-to="<?= $total_tolak ?>" data-speed="1000" data-fresh-interval="20"></div>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    				<div class="info-box bg-light-green hover-expand-effect">
    					<div class="icon">
    						<i class="material-icons">equalizer</i>
    					</div>
    					<div class="content">
    						<div class="text">TOTAL PENGADUAN MASUK</div>
    						<div class="number count-to" data-from="0" data-to="<?= $total_pengguna ?>" data-speed="1000" data-fresh-interval="20"></div>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    				<div class="info-box-2 bg-light-blue hover-zoom-effect">
    					<div class="icon">
    						<i class="material-icons">access_time</i>
    					</div>
    					<div class="content">
    						<div class="text">Today</div>
    						<div class="number"><i style="font-size: 22px;" id="jam"></i><i style="font-size: 22px;"> : </i><i style="font-size: 22px;" id="menit"></i><i style="font-size: 22px;"> : </i><i style="font-size: 22px;" id="detik"></i></div>
    					</div>
    				</div>
    			</div>
    		</div>
    		<!-- #END# Widgets -->
    		<div class="row clearfix">
    			<!-- Line Chart -->
    			<!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    				<div class="card">
    					<div class="header">
    						<h2>LINE CHART</h2>

    					</div>
    					<div class="body">
    						<canvas id="line_chart" height="150"></canvas>
    					</div>
    				</div>
    			</div> -->
    			<!-- #END# Line Chart -->
    			<!-- Pie Chart -->
    			<!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    				<div class="card">
    					<div class="header">
    						<h2>PIE CHART</h2>

    					</div>
    					<div class="body">
    						<canvas id="pie_chart" height="150"></canvas>
    					</div>
    				</div>
    			</div> -->
    			<!-- #END# Pie Chart -->
    		</div>


    	</div>
    </section>
    <script type="text/javascript">
    	window.setTimeout("waktu()", 1000);

    	function waktu() {
    		var waktu = new Date();
    		setTimeout("waktu()", 1000);
    		document.getElementById("jam").innerHTML = waktu.getHours();
    		document.getElementById("menit").innerHTML = waktu.getMinutes();
    		document.getElementById("detik").innerHTML = waktu.getSeconds();
    	}
    </script>
