<!DOCTYPE HTML>
<html>
<?php include 'head.php'; ?>
<body>
	<div class="container">
		<?php include 'flip.php'; ?>
	</div>
	<div class="header-bot">
		<div class="wrap">
			<?php $_SESSION['menu']="master"; include 'menu_pasien.php'; ?>
		</div>
	</div>
	<div class="content">
	<div class="wrap">
			<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h3>Konsultasi ke Dokter</h3>

                        <?php
                            $username=$_SESSION['username'];
                            
                        ?>
                        <form action="#" method="post">
                            <div>
                                <span><label>Username</label></span>
                                <span><input type="text" name="username" maxlength="30" readonly="" required="" value="<?php echo $username;?>"></span>
                            </div>
                            <div>
                                <span><label>Nama Dokter</label></span>
                                <select name="nama_dokter" style="width: 760px;">
                                    <?php
                                        $sql="SELECT * FROM dokter ORDER BY nama_dokter ASC";
                                        $hasil=$koneksi->query($sql);
                                        while($hsl=$hasil->fetch_assoc()){
                                            echo '<option value="';
                                            echo $hsl['nama_dokter'].'">';
                                            echo $hsl['nama_dokter'].' ['.$hsl['praktek_hari'].' - '.$hsl['praktek_jam'].']';
                                            echo '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div>
                                <span><label>Pertanyaan</label></span>
                                <span><input type="text" name="komen_pasien" maxlength="300" required="" value="<?php echo $komen_pasien;?>"></span>
                            </div>
                           <div>
                                <span><input type="submit" name="submit" value="KONSULTASI KE DOKTER" style="width: 100%"></span>
                          </div>
                        </form>
                        <br /><br /><br /><br />
                  </div>
                </div>

            <?php
            if(isset($_POST['submit'])){
                $username=$_POST['username'];
                $nama_dokter=$_POST['nama_dokter'];
                $komen_pasien=$_POST['komen_pasien'];
                $sekarang=date('Y-m-d H:i:s');

                    $sql="INSERT INTO konsul (username, nama_dokter, komen_pasien, tgl_konsul) VALUES ('$username', '$nama_dokter', '$komen_pasien', '$sekarang')";
                    $koneksi->query($sql);

                    $token=md5('baru');
                    $url='Location: konsul.php?token='.$token;
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
    if($token==md5('baru')){
        echo '<script type="text/javascript">alert("<br />Anda baru saja melakukan konsultasi!<br />Terima Kasih.")</script>';
    }
?>