    <!-- Page Loader -->
    <div class="page-loader-wrapper">
    	<div class="loader">
    		<div class="preloader">
    			<div class="spinner-layer pl-red">
    				<div class="circle-clipper left">
    					<div class="circle"></div>
    				</div>
    				<div class="circle-clipper right">
    					<div class="circle"></div>
    				</div>
    			</div>
    		</div>
    		<p>Please wait...</p>
    	</div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Top Bar -->
    <nav class="navbar">
    	<div class="container-fluid">
    		<div class="navbar-header">
    			<a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
    			<a href="javascript:void(0);" class="bars"></a>
    			<a class="navbar-brand" href="<?= base_url('Dashboard') ?>">APLIKASI WEB PENGADUAN PERBAIKAN PERANGKAT KOMPUTER IT SERVICE</a>
    		</div>
    		<div class="collapse navbar-collapse" id="navbar-collapse">
    			<ul class="nav navbar-nav navbar-right">
    				<li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
    			</ul>
    		</div>
    	</div>
    </nav>
    <!-- #Top Bar -->
    <section>
    	<!-- Left Sidebar -->
    	<aside id="leftsidebar" class="sidebar">
    		<!-- User Info -->
    		<div class="user-info">
    			<div class="image">
    				<img src="<?= base_url(); ?>assets/AdminBsb/images/user.png" width="48" height="48" alt="User" />
    			</div>
    			<div class="info-container">
    				<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $this->session->userdata('nama') ?></div>
    				<div class="email"><?= $this->session->userdata('username') ?></div>

    				<div class="btn-group user-helper-dropdown">
    					<i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
    					<ul class="dropdown-menu pull-right">
    						<!-- <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li> -->
    						<li><a href="<?= base_url('auth/logout') ?>"><i class="material-icons">input</i>Sign Out</a></li>
    					</ul>
    				</div>
    			</div>
    		</div>
    		<!-- #User Info -->
    		<!-- Menu -->
    		<div class="menu">
    			<ul class="list">
    				<li class="header">MAIN NAVIGATION</li>
    				<li class="<?php echo ($title == 'dashboard') ? 'active' : ''; ?>">
    					<a href="<?= base_url(); ?>Dashboard">
    						<i class="material-icons">home</i>
    						<span>Home</span>
    					</a>
    				</li>

    				<!-- <li class="<?php echo ($title == 'estimasi') ? 'active' : ''; ?>">
    					<a href="<?= base_url(); ?>Pelaporan/estimasibiaya">
    						<i class="material-icons">home</i>
    						<span>Estimasi biaya</span>
    					</a>
    				</li> -->

    				<?php if ($this->session->userdata('role') == 'SA') : ?>
    					<li class="<?php echo ($title == 'user') ? 'active' : ''; ?>">
    						<a href="<?= base_url(); ?>User">
    							<i class="material-icons">library_add</i>
    							<span>Managment User</span>
    						</a>
    					</li>
    					<li class="<?php echo ($title == 'perangkat') ? 'active' : ''; ?>">
    						<a href="<?= base_url(); ?>Perangkat">
    							<i class="material-icons">library_add</i>
    							<span>Perangkat</span>
    						</a>
    					</li>
    					<li class="<?php echo ($title == 'item') ? 'active' : ''; ?>">
    						<a href="<?= base_url(); ?>Item">
    							<i class="material-icons">library_add</i>
    							<span>Item</span>
    						</a>
    					</li>


    				<?php endif; ?>
    				<?php if ($this->session->userdata('role') == 'K' || $this->session->userdata('role') == 'T') : ?>
    					<li class="<?php echo ($title == 'item') ? 'active' : ''; ?>">
    						<a href="<?= base_url(); ?>Item">
    							<i class="material-icons">library_add</i>
    							<span>Item</span>
    						</a>
    					</li>
    				<?php endif; ?>
    				<li class="<?php echo ($title == 'pengaduan') ? 'active' : ''; ?>">
    					<a href="<?= base_url(); ?>Pengaduan">
    						<i class="material-icons">assignment</i>
    						<span>Pengaduan</span>
    					</a>
    				</li>
    				<li class="<?php echo ($title == 'pelaporan') ? 'active' : ''; ?>">
    					<a href="<?= base_url(); ?>Pelaporan">
    						<i class="material-icons">assignment</i>
    						<span>Pelaporan</span>
    					</a>
    				</li>

    			</ul>
    		</div>
    		<!-- #Menu -->
    		<!-- Footer -->
    		<div class="legal">
    			<div class="copyright">
    				&copy; 2021 <a href="javascript:void(0);">Created By PT. Pusri</a>.
    			</div>
    			<div class="version">
    				<b>Version: </b> 1.0
    			</div>
    		</div>
    		<!-- #Footer -->
    	</aside>
    	<!-- #END# Left Sidebar -->
    	<!-- Right Sidebar -->
    	<aside id="rightsidebar" class="right-sidebar">
    		<ul class="nav nav-tabs tab-nav-right" role="tablist">
    			<li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
    		</ul>
    		<div class="tab-content">
    			<div role="tabpanel" class="tab-pane fade in active in active" id="skins">
    				<ul class="demo-choose-skin">
    					<li data-theme="red" class="active">
    						<div class="red"></div>
    						<span>Red</span>
    					</li>
    					<li data-theme="pink">
    						<div class="pink"></div>
    						<span>Pink</span>
    					</li>
    					<li data-theme="purple">
    						<div class="purple"></div>
    						<span>Purple</span>
    					</li>
    					<li data-theme="deep-purple">
    						<div class="deep-purple"></div>
    						<span>Deep Purple</span>
    					</li>
    					<li data-theme="indigo">
    						<div class="indigo"></div>
    						<span>Indigo</span>
    					</li>
    					<li data-theme="blue">
    						<div class="blue"></div>
    						<span>Blue</span>
    					</li>
    					<li data-theme="light-blue">
    						<div class="light-blue"></div>
    						<span>Light Blue</span>
    					</li>
    					<li data-theme="cyan">
    						<div class="cyan"></div>
    						<span>Cyan</span>
    					</li>
    					<li data-theme="teal">
    						<div class="teal"></div>
    						<span>Teal</span>
    					</li>
    					<li data-theme="green">
    						<div class="green"></div>
    						<span>Green</span>
    					</li>
    					<li data-theme="light-green">
    						<div class="light-green"></div>
    						<span>Light Green</span>
    					</li>
    					<li data-theme="lime">
    						<div class="lime"></div>
    						<span>Lime</span>
    					</li>
    					<li data-theme="yellow">
    						<div class="yellow"></div>
    						<span>Yellow</span>
    					</li>
    					<li data-theme="amber">
    						<div class="amber"></div>
    						<span>Amber</span>
    					</li>
    					<li data-theme="orange">
    						<div class="orange"></div>
    						<span>Orange</span>
    					</li>
    					<li data-theme="deep-orange">
    						<div class="deep-orange"></div>
    						<span>Deep Orange</span>
    					</li>
    					<li data-theme="brown">
    						<div class="brown"></div>
    						<span>Brown</span>
    					</li>
    					<li data-theme="grey">
    						<div class="grey"></div>
    						<span>Grey</span>
    					</li>
    					<li data-theme="blue-grey">
    						<div class="blue-grey"></div>
    						<span>Blue Grey</span>
    					</li>
    					<li data-theme="black">
    						<div class="black"></div>
    						<span>Black</span>
    					</li>
    				</ul>
    			</div>

    		</div>
    	</aside>
    	<!-- #END# Right Sidebar -->
    </section>
