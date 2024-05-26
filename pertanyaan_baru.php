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
				  	<h3>Pertanyaan Baru</h3>

                        <?php
                            $username=$_SESSION['username'];
                            
                        ?>
                        <form action="#" method="post">
                            <div>
                                <span><label>Pertanyaan</label></span>
                                <span><input type="text" name="pertanyaan" maxlength="100" required="" value="<?php echo $pertanyaan;?>"></span>
                            </div>
                            <div>
                                <span><label>Tipe Pertanyaan</label></span>
                                <span>
                                    <select name="tipe_pertanyaan" style="width: 760px;">
                                        <option value="gejala">gejala</option>
                                        <option value="pendukung">pendukung</option>
                                    </select>
                                </span>
                            </div>
                            <div>
                                <span><label>Bobot Pakar</label></span>
                                <span><input type="number" name="bobot_pakar" min="0" max="1.0" step="0.1" value="0"  style="width: 760px;"></span>
                            </div>
                           <div>
                                <span><input type="submit" name="submit" value="INPUT PERTANYAAN BARU" style="width: 100%"></span>
                          </div>
                        </form>
                        <br /><br /><br /><br />
                  </div>
                </div>

            <?php
            if(isset($_POST['submit'])){
                $username=$_SESSION['username'];
                $pertanyaan=$_POST['pertanyaan'];
                $tipe_pertanyaan=$_POST['tipe_pertanyaan'];
                $bobot_pakar=$_POST['bobot_pakar'];
                
                    $sql="INSERT INTO pertanyaan (username, pertanyaan, tipe_pertanyaan, bobot_pakar) VALUES ('$username', '$pertanyaan', '$tipe_pertanyaan', '$bobot_pakar')";
                    $koneksi->query($sql);

                    $token=md5('baru');
                    $url='Location: pertanyaan_baru.php?token='.$token;
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
        echo '<script type="text/javascript">alert("<br />Anda baru saja melakukan input Pertanyaan Baru!<br />Terima Kasih.")</script>';
    }
?>