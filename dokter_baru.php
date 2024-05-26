<!DOCTYPE HTML>
<html>
<?php include 'head.php'; ?>
<body>
	<div class="container">
		<?php include 'flip.php'; ?>
	</div>
	<div class="header-bot">
		<div class="wrap">
			<?php $_SESSION['menu']="master"; include 'menu_admin.php'; ?>
		</div>
	</div>
	<div class="content">
	<div class="wrap">
			<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h3>Input Dokter Baru</h3>

                    <?php
                            $username=$_GET['username'];
                            $password=$_GET['password'];
                            $nama_dokter=$_GET['nama_dokter'];
                            $praktek_hari=$_GET['praktek_hari'];
                            $praktek_jam=$_GET['praktek_jam'];
                        ?>
                        <form action="#" method="post">
                            <div>
                                <span><label>Username</label></span>
                                <span><input type="text" name="username" maxlength="30" required="" value="<?php echo $username;?>"></span>
                            </div>
                            <div>
                                <span><label>Password</label></span>
                                <span><input type="password" name="password" style="width: 760px;" required="" value="<?php echo $password;?>"></span>
                            </div>
                            <div>
                                <span><label>Nama Dokter</label></span>
                                <span><input type="text" name="nama_dokter" maxlength="50" required="" value="<?php echo $nama_dokter;?>"></span>
                            </div>
                            <div>
                                <span><label>Hari Praktek</label></span>
                                <span><input type="text" name="praktek_hari" maxlength="30" required="" value="<?php echo $praktek_hari;?>"></span>
                            </div>
                            <div>
                                <span><label>Jam Praktek</label></span>
                                <span><input type="text" name="praktek_jam" maxlength="30" required="" value="<?php echo $praktek_jam;?>"></span>
                            </div>
                           <div>
                                <span><input type="submit" name="submit" value="DAFTAR DOKTER BARU" style="width: 100%"></span>
                          </div>
                        </form>
                        <br /><br /><br /><br />
                  </div>
                </div>

            <?php
            if(isset($_POST['submit'])){
                $username=$_POST['username'];
                $password=$_POST['password'];
                $nama_dokter=$_POST['nama_dokter'];
                $praktek_hari=$_POST['praktek_hari'];
                $praktek_jam=$_POST['praktek_jam'];
                
                    $sql="INSERT INTO login (username, password, tipe) VALUES ('$username', '$password', 'dokter')";
                    $token=md5('sama');
                    $koneksi->query($sql) or die(header('Location: dokter_baru.php?token='.$token));

                    $sql2="INSERT INTO dokter (username, nama_dokter, praktek_hari, praktek_jam) VALUES ('$username', '$nama_dokter', '$praktek_hari', '$praktek_jam')";
                    $koneksi->query($sql2);

                    $token=md5('baru');
                    $url='Location: dokter_baru.php?token='.$token;
                    header($url);
            }
            ?>
                    
					    <br /><br /><br /><br />
				  </div>
  				</div>
				
				 <div class="clear"></div>
			  </div>
		</div>
</div>
<?php include 'footer.php'; ?>
	<script src="js/jquery.flipster.js"></script>
	<script>
		<!--
			$(function(){ $(".flipster").flipster({ style: 'carousel', start: 0 }); });
		-->
	</script>
</body>
</html>

<?php
    $token = $_GET['token'];
    if($token==md5('sama')){
        echo '<script type="text/javascript">alert("<br />Username Sudah Terdaftar!<br />Silahkan gunakan username lain.<br />Terima Kasih.")</script>';
    } else if($token==md5('baru')){
        echo '<script type="text/javascript">alert("<br />Username Berhasil di daftarkan!<br />Silahkan login untuk menggunakan.<br />Terima Kasih.")</script>';
    }
?>