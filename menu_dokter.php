<nav>
				<ul class="sf-menu">
					<li <?php if($_SESSION['menu']=="home") echo 'class="current"';?>>
						<a href="dokter.php">Home</a>
					</li>
					<li <?php if($_SESSION['menu']=="password") echo 'class="current"';?>>
						<a href="password_dokter.php">Password</a>
					</li>
					<li class="sub-menu">
						<a href="#">Konsultasi</a>
						<ul>
							<li>
								<a href="konsul_tanggapan.php">Riwayat Konsultasi</a>
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