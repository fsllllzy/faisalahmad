<!DOCTYPE HTML>
<html>
<?php include 'head.php'; ?>

<body>
	<div class="container">
		<?php include 'flip.php'; ?>
	</div>
	<div class="header-bot">
		<div class="wrap">
			<?php $_SESSION['menu'] = "login";
			include 'menu.php'; ?>
		</div>
	</div>
	<div class="content">
		<div class="wrap">
			<div class="section group">
				<div class="col span_2_of_3">
					<div class="contact-form">
						<h3>Registrasi</h3>
						<?php
						$username = $_GET['username'];
						$password = $_GET['password'];
						$nama = $_GET['nama'];
						$tgl_lahir = $_GET['tgl_lahir'];
						$jenis_kelamin = $_GET['jenis_kelamin'];
						$alamat = $_GET['alamat'];
						$hp = $_GET['hp'];
						?>
						<form action="#" method="post">
							<div>
								<span><label>Username</label></span>
								<span><input type="text" name="username" maxlength="30" required="" value="<?php echo $username; ?>"></span>
							</div>
							<div>
								<span><label>Password</label></span>
								<span><input type="password" name="password" style="width: 760px;" required="" value="<?php echo $password; ?>"></span>
							</div>
							<div>
								<span><label>Nama</label></span>
								<span><input type="text" name="nama" maxlength="50" required="" value="<?php echo $nama; ?>"></span>
							</div>
							<div>
								<span><label>Tanggal Lahir</label></span>
								<span><input type="date" name="tgl_lahir" style="width: 760px;" required="" value="<?php echo $tgl_lahir; ?>"></span>
							</div>
							<div>
								<span><label>Jenis Kelamin</label></span>
								<span>
									<select name="jenis_kelamin" style="width: 760px;" required="">
										<option value="PRIA" <?php if ($jenis_kelamin == "PRIA") echo 'selected'; ?>>PRIA</option>
										<option value="WANITA" <?php if ($jenis_kelamin == "WANITA") echo 'selected'; ?>>WANITA</option>
									</select>
								</span>
							</div>
							<div>
								<span><label>Alamat</label></span>
								<span><input type="text" name="alamat" maxlength="100" required="" value="<?php echo $alamat; ?>"></span>
							</div>
							<div>
								<span><label>HP</label></span>
								<span><input type="text" name="hp" maxlength="15" required="" value="<?php echo $hp; ?>"></span>
							</div>
							<div>
								<span><input type="submit" name="submit" value="DAFTAR PASIEN BARU" style="width: 100%"></span>
							</div>
						</form>
						<br /><br /><br /><br />
					</div>
				</div>

				<?php
				if (isset($_POST['submit'])) {
					$username = $_POST['username'];
					$password = $_POST['password'];
					$nama = $_POST['nama'];
					$tgl_lahir = date('Y-m-d', strtotime($_POST['tgl_lahir']));
					$jenis_kelamin = $_POST['jenis_kelamin'];
					$alamat = $_POST['alamat'];
					$hp = $_POST['hp'];
					$sekarang = date('Y-m-d');


					$sql = "INSERT INTO login (username, password) VALUES ('$username', '$password')";
					$token = md5('sama');
					$koneksi->query($sql) or die(header('Location: registrasi.php?token=' . $token));

					$sql2 = "INSERT INTO pasien (username, nama, alamat, jenis_kelamin, tgl_lahir, hp, tgl_daftar) VALUES ('$username', '$nama', '$alamat', '$jenis_kelamin', '$tgl_lahir', '$hp', '$sekarang')";
					$koneksi->query($sql2);

					$token = md5('baru');
					$url = 'Location: registrasi.php?token=' . $token;
					header($url);
				}
				?>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<?php include 'footer.php'; ?>
	<script src="js/jquery.flipster.js"></script>
	<script>
		<!--
		$(function() {
			$(".flipster").flipster({
				style: 'carousel',
				start: 0
			});
		});
		-->
	</script>
</body>

</html>

<?php
$token = $_GET['token'];
if ($token == md5('sama')) {
	echo '<script type="text/javascript">alert("<br />Username Sudah Terdaftar!<br />Silahkan gunakan username lain.<br />Terima Kasih.")</script>';
} else if ($token == md5('baru')) {
	echo '<script type="text/javascript">alert("<br />Username Berhasil di daftarkan!<br />Silahkan login untuk menggunakan.<br />Terima Kasih.")</script>';
}
?>