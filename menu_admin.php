<nav>
				<ul class="sf-menu">
					<li <?php if($_SESSION['menu']=="home") echo 'class="current"';?>>
						<a href="admin.php">Home</a>
					</li>
					<li <?php if($_SESSION['menu']=="password") echo 'class="current"';?>>
						<a href="password_admin.php">Password</a>
					</li>
					<li class="sub-menu">
						<a href="#">Master</a>
						<ul>
							<li>
								<a href="dokter_baru.php">Input Dokter Baru</a>
							</li>
							<li>
								<a href="dokter_daftar.php">Daftar List Dokter</a>
							</li>
							<li>
								<a href="pasien_daftar.php">Daftar List Pasien</a>
							</li>
							<li>
								<a href="pertanyaan_baru.php">Pertanyaan Baru</a>
							</li>
							<li>
								<a href="pertanyaan_daftar.php">Daftar List Pertanyaan</a>
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