<!DOCTYPE HTML>
<html>
<?php include 'head.php'; ?>
<body>
	<div class="container">
		<?php include 'flip.php'; ?>
	</div>
	<div class="header-bot">
		<div class="wrap">
			<?php $_SESSION['menu']="home"; include 'menu_dokter.php'; ?>
		</div>
	</div>
	<div class="content">
	<div class="wrap">
			<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h3>Selamat Datang Dokter</h3>
					
                    <h3>Profil Dokter</h3>
                    <?php
                            $username=$_SESSION['username'];
                        $sql="SELECT * FROM dokter WHERE username='$username'";
                        $hasil=$koneksi->query($sql);
                        while($hsl=$hasil->fetch_assoc()){
                            $nama_dokter=$hsl['nama_dokter'];
                            $praktek_hari=$hsl['praktek_hari'];
                            $praktek_jam=$hsl['praktek_jam'];
                        }
                        ?>
                        <form action="#" method="post">
                            <div>
                                <span><label>Username</label></span>
                                <span><input type="text" name="username" readonly="" maxlength="30" required="" value="<?php echo $username;?>"></span>
                            </div>
                            <div>
                                <span><label>Nama Dokter</label></span>
                                <span><input type="text" name="nama_dokter" maxlength="50" readonly="" required="" value="<?php echo $nama_dokter;?>"></span>
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
                                <span><input type="submit" name="submit" value="UPDATE PROFIL" style="width: 100%"></span>
                          </div>
                        </form>
                        <br /><br /><br /><br />
                  </div>
                </div>

            <?php
            if(isset($_POST['submit'])){
                $username=$_POST['username'];
                $nama_dokter=$_POST['nama_dokter'];
                $praktek_hari=$_POST['praktek_hari'];
                $praktek_jam=$_POST['praktek_jam'];
                
                    $sql2="UPDATE dokter SET praktek_hari='$praktek_hari', praktek_jam='$praktek_jam' WHERE username='$username'";
                    $koneksi->query($sql2);

                    $token=md5('update');
                    $url='Location: dokter.php?token='.$token;
                    header($url);
            }
            ?>
	 			
                <br /><br />
			</div>
	 	</div>
	<!--end-about-->

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
    if($token==md5('update')){
        echo '<script type="text/javascript">alert("<br />Data Profil Berhasil di update!<br />Terima Kasih.")</script>';
    }
?>