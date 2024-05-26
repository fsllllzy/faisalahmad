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
				  	<h3>Terima Kasih sudah menjawab <?php echo $_SESSION['jml_pertanyaan'];?> Pertanyaan</h3>

                        <?php
                            $username=$_SESSION['username'];
                            $sql="SELECT * FROM analisa WHERE username='$username' ORDER BY id_analisa ASC";
                            $hasil=$koneksi->query($sql);
                            while($hsl=$hasil->fetch_assoc()){
                            	$id_analisa=$hsl['id_analisa'];
                            }
                            
                            $sql="UPDATE jawab SET cf=bobot_pakar*jawab WHERE username='$username'";
                            $koneksi->query($sql);

                            $sql="SELECT * FROM jawab WHERE username='$username' ORDER BY id_pertanyaan ASC";
                            $hasil=$koneksi->query($sql);
                            $nomor_ke=0;
                            while($hsl=$hasil->fetch_assoc()){
                                $nomor_ke++;
                                $id_jawab=$hsl['id_jawab'];
                                $cf=$hsl['cf'];
                                if($nomor_ke>1){
                                    $cf_gabung=$cf_gabung+$cf*(1-$cf_gabung);
                                    $sql="UPDATE jawab SET cf_gabung='$cf_gabung' WHERE id_jawab='$id_jawab'";
                                    $koneksi->query($sql);
                                } else {
                                    $cf_gabung=$hsl['cf'];
                                }
                            }
                            $hasil=$cf_gabung*100;
                            $sql="UPDATE analisa SET hasil='$hasil' WHERE id_analisa='$id_analisa'";
                            $koneksi->query($sql);
                        ?>
                        <h3>Hasil dari Analisa Diabetes Melitus adalah : <?php echo $hasil;?>%</h3>

                        <br /><br /><br /><br />
                  </div>
                </div>

                    
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
