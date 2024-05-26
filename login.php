<!DOCTYPE HTML>
<html>
<?php include 'head.php'; ?>

<body>
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
						<h3>Login / <u><a href="registrasi.php">Registrasi</a></u></h3>
						<form action="#" method="post">
							<div>
								<span><label>username</label></span>
								<span><input type="text" name="username" required=""></span>
							</div>
							<div>
								<span><label>Password</label></span>
								<span><input type="password" name="password" required="" style="width: 730px;"></span>
							</div>
							<div>
								<span><input type="submit" name="submit" value="LOGIN" style="width: 100%"></span>
							</div>
						</form>
						<br /><br /><br /><br />
					</div>
				</div>
				<?php
				if (isset($_POST['submit'])) {
					$username = $_POST['username'];
					$password = $_POST['password'];
					$sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
					$hasil = $koneksi->query($sql);
					if ($hasil->num_rows > 0) {
						while ($hsl = $hasil->fetch_assoc()) {
							$_SESSION['username'] = $hsl['username'];
							$_SESSION['password'] = $hsl['password'];
							$_SESSION['tipe'] = $hsl['tipe'];
							if ($_SESSION['tipe'] == 'admin') {
								header('Location: admin.php');
							} else if ($_SESSION['tipe'] == 'dokter') {
								header('Location: dokter.php');
							} else {
								header('Location: pasien.php');
							}
						}
					} else {
						$token = md5('salah');
						$url = 'Location: login.php?token=' . $token;
						header($url);
					}
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
if ($token == md5('salah')) {
	echo '<script type="text/javascript">alert("Username / Password Salah!")</script>';
}
?>