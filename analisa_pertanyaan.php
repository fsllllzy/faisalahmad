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
				  	<h3>Jawablah Pertanyaan Berikut ini</h3>

                        <?php
                            $username=$_SESSION['username'];
                            
                            $sql="SELECT * FROM pertanyaan";
                            $hasil=$koneksi->query($sql);
                            $jml_pertanyaan=0;
                            while($hsl=$hasil->fetch_assoc()){
                                $jml_pertanyaan++;
                            }
                            $_SESSION['jml_pertanyaan']=$jml_pertanyaan;

                            $id_pertanyaan=$_GET['id_pertanyaan'];
                            $sql="SELECT * FROM pertanyaan WHERE id_pertanyaan='$id_pertanyaan'";
                            $hasil=$koneksi->query($sql);
                            while($hsl=$hasil->fetch_assoc()){
                                $pertanyaan=$hsl['pertanyaan'];
                                $bobot_pakar=$hsl['bobot_pakar'];
                            }
                        ?>
                        <h3>Pertanyaan Nomor: <?php echo $id_pertanyaan;?> dari <?php echo $jml_pertanyaan;?></h3>
                        <form action="#" method="post">
                            <input type="hidden" name="id_pertanyaan" value="<?php echo $id_pertanyaan;?>">
                            <input type="hidden" name="bobot_pakar" value="<?php echo $bobot_pakar;?>">
                            <h2><?php echo $pertanyaan;?></h2>
                            <div>
                                <span><label>Jawab</label></span>
                                <select name="jawab" style="width: 760px;" required="">
                                    <option value="">== Pilih Jawaban Anda ==</option>
                                    <option value="1">Yakin</option>
                                    <option value="0.8">Kemungkinan besar iya</option>
                                    <option value="0.5">Sepertinya iya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                           <div>
                                <span><input type="submit" name="submit" value="JAWAB" style="width: 100%"></span>
                          </div>
                        </form>
                        <br /><br /><br /><br />
                  </div>
                </div>

            <?php
            if(isset($_POST['submit'])){
                $username=$_SESSION['username'];
                $id_pertanyaan=$_POST['id_pertanyaan'];
                $jawab=$_POST['jawab'];
                $bobot_pakar=$_POST['bobot_pakar'];
                    
                    $sql="INSERT INTO jawab (username, id_pertanyaan, jawab, bobot_pakar) VALUES ('$username', '$id_pertanyaan', '$jawab', '$bobot_pakar')";
                    $koneksi->query($sql);

                    $id_pertanyaan++;
                    if($id_pertanyaan>$_SESSION['jml_pertanyaan']) {
                        $url='Location: analisa_final.php';
                        header($url);
                    } else {
                        $url='Location: analisa_pertanyaan.php?id_pertanyaan='.$id_pertanyaan;
                        header($url);
                    }
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