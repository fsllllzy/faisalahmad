<nav>
				<ul class="sf-menu">
					<li <?php if($_SESSION['menu']=="home") echo 'class="current"';?>>
						<a href="pasien.php">Home</a>
					</li>
					<li <?php if($_SESSION['menu']=="password") echo 'class="current"';?>>
						<a href="password_pasien.php">Password</a>
					</li>
					<li class="sub-menu">
						<a href="#">Konsultasi</a>
						<ul>
							<li>
								<a href="analisa.php">Analisa Diabetes</a>
							</li>
							<li>
								<a href="analisa_histori.php">Histori Analisa</a>
							</li>
							<li>
								<a href="konsul.php">Konsultasi ke Dokter</a>
							</li>
							<li>
								<a href="konsul_histori.php">Riwayat Konsultasi</a>
							</li>
						</ul>
					</li>
					<li <?php if($_SESSION['menu']=="logout") echo 'class="current"';?>>
						<a href="index.php">Logout</a>
					</li>
				</ul>
				<div class="clear"></div>
			</nav>
			<div class="clear"></div>