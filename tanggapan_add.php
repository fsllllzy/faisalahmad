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
				  	<h3>Tanggapan Dokter</h3>

                        <?php
                            $id_konsul=$_GET['id_konsul'];
                            $sql="SELECT * FROM konsul WHERE id_konsul='$id_konsul'";
                            $hasil=$koneksi->query($sql);
                            while($hsl=$hasil->fetch_assoc()){
                                $username_pasien=$hsl['username'];
                                $komen_pasien=$hsl['komen_pasien'];
                                $tanggapan_dokter=$hsl['tanggapan_dokter'];
                                $tgl_konsul=$hsl['tgl_konsul'];
                            }
                            $sql="SELECT * FROM pasien WHERE username='$username_pasien'";
                            $hasil=$koneksi->query($sql);
                            while($hsl=$hasil->fetch_assoc()){
                                $nama=$hsl['nama'];
                            }
                        ?>
                        <form action="#" method="post">
                            <input type="hidden" name="id_konsul" value="<?php echo $id_konsul;?>">
                            <div>
                                <span><label>Nama Pasien</label></span>
                                <span><input type="text" name="nama" maxlength="30" readonly="" required="" value="<?php echo $nama;?>"></span>
                            </div>
                            <div>
                                <span><label>Tanggal Konsultasi</label></span>
                                <span><input type="text" name="tgl_konsul" maxlength="30" readonly="" required="" value="<?php echo date('d M Y H:i:s',strtotime($tgl_konsul));?>"></span>
                            </div>
                            <div>
                                <span><label>Pertanyaan</label></span>
                                <span><input type="text" name="komen_pasien" maxlength="300" required="" value="<?php echo $komen_pasien;?>"></span>
                            </div>
                            <div>
                                <span><label>Tanggapan Dokter</label></span>
                                <span><input type="text" name="tanggapan_dokter" maxlength="300" required="" value="<?php echo $tanggapan_dokter;?>"></span>
                            </div>
                           <div>
                                <span><input type="submit" name="submit" value="TANGGAPAN DOKTER" style="width: 100%"></span>
                          </div>
                        </form>
                        <br /><br /><br /><br />
                  </div>
                </div>

            <?php
            if(isset($_POST['submit'])){
                $id_konsul=$_POST['id_konsul'];
                $tanggapan_dokter=$_POST['tanggapan_dokter'];
                $sekarang=date('Y-m-d H:i:s');

                    $sql="UPDATE konsul set tanggapan_dokter='$tanggapan_dokter', tgl_tanggapan='$sekarang' WHERE id_konsul='$id_konsul'";
                    $koneksi->query($sql);

                    $token=md5('tanggapan');
                    $url='Location: konsul_tanggapan.php?token='.$token;
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