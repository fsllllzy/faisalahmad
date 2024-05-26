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
				  	<h3>Edit Pertanyaan</h3>
                    <?php
                        $id_pertanyaan=$_GET['id_pertanyaan'];
                        $sql="SELECT * FROM pertanyaan WHERE id_pertanyaan='$id_pertanyaan'";
                        $hasil=$koneksi->query($sql);
                        while($hsl=$hasil->fetch_assoc()){
                            $pertanyaan=$hsl['pertanyaan'];
                            $tipe_pertanyaan=$hsl['tipe_pertanyaan'];
                            $bobot_pakar=$hsl['bobot_pakar'];
                        }
                    ?>
                    <form action="#" method="post">
                            <input type="hidden" name="id_pertanyaan" value="<?php echo $id_pertanyaan;?>">
                            <div>
                                <span><label>Pertanyaan</label></span>
                                <span><input type="text" name="pertanyaan" maxlength="100" required="" value="<?php echo $pertanyaan;?>"></span>
                            </div>
                            <div>
                                <span><label>Tipe Pertanyaan</label></span>
                                <span><input type="text" name="tipe_pertanyaan" readonly="" maxlength="100" required="" value="<?php echo $tipe_pertanyaan;?>"></span>
                            </div>
                            <div>
                                <span><label>Bobot Pakar</label></span>
                                <span><input type="number" name="bobot_pakar" min="0" max="1" step="0.1" required="" value="<?php echo $bobot_pakar;?>"></span>
                            </div>
                           <div>
                                <span><input type="submit" name="submit" value="EDIT PERTANYAAN" style="width: 100%"></span>
                          </div>
                        </form>
                        <br /><br /><br /><br />
                  </div>
                </div>

            <?php
            if(isset($_POST['submit'])){
                $pertanyaan=$_POST['pertanyaan'];
                $id_pertanyaan=$_POST['id_pertanyaan'];
                $bobot_pakar=$_POST['bobot_pakar'];
                
                    $sql="UPDATE pertanyaan SET pertanyaan='$pertanyaan', bobot_pakar='$bobot_pakar' WHERE id_pertanyaan='$id_pertanyaan'";
                    $koneksi->query($sql);

                    $token=md5('edit');
                    $url='Location: pertanyaan_daftar.php?token='.$token;
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
