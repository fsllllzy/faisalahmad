<!DOCTYPE HTML>
<html>
<?php include 'head.php'; ?>
<body>
	<div class="container">
		<?php include 'flip.php'; ?>
	</div>
	<div class="header-bot">
		<div class="wrap">
			<?php $_SESSION['menu']="password"; include 'menu_dokter.php'; ?>
		</div>
	</div>
	<div class="content">
	<div class="wrap">
			<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h3>Ganti Password</h3>
					
            <?php
                $username=$_SESSION['username'];
                $sandi_lama=$_SESSION['password'];
            ?>

            <!--// main-heading -->
            <div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-100 mx-auto mt-5">
                <form action="#" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" readonly="" value="<?php echo $username;?>" style="background-color: #grey;">
                    </div>
                    <div class="form-group">
                        <label>Password saat ini</label><br />
                        <input type="password" name="sandi_saat_ini" class="form-control" required="" style="background-color: #white; width: 760px;">
                    </div>
                    <div class="form-group">
                        <label>Password baru</label><br />
                        <input type="password" name="sandi_baru" class="form-control" required="" style="background-color: #white; width: 760px;">
                    </div>
                    <div class="form-group">
                        <label>Password konfirmasi</label><br />
                        <input type="password" name="sandi_konfirmasi" class="form-control" required="" style="background-color: #white; width: 760px;">
                    </div> <br /><br />
                    <button type="submit" name="submit" class="btn btn-primary error-w3l-btn mt-sm-5 mt-3 px-4" style="width: 100%;">Update Password</button>
                </form>
            </div>

            <?php
            if(isset($_POST['submit'])){
                $username=$_POST['username'];
                $sandi_saat_ini=$_POST['sandi_saat_ini'];
                $sandi_baru=$_POST['sandi_baru'];
                $sandi_konfirmasi=$_POST['sandi_konfirmasi'];
                
                if($sandi_lama!=$sandi_saat_ini){
                    $token=md5('salah');
                    $url='Location: password_dokter.php?token='.$token;
                    header($url);    
                } else if($sandi_baru!=$sandi_konfirmasi){
                    $token=md5('beda');
                    $url='Location: password_dokter.php?token='.$token;
                    header($url);    
                } else {

                $sql2="UPDATE login SET password='$sandi_baru' WHERE username='$username'";
                $koneksi->query($sql2);
                $_SESSION['password']=$sandi_baru;
                $token=md5('berhasil');
                $url='Location: password_dokter.php?token='.$token;
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
    if($token==md5('berhasil')){
        echo '<script type="text/javascript">alert("Password berhasil diupdate! Terima Kasih.")</script>';
    } else if($token==md5('salah')){
        echo '<script type="text/javascript">alert("Password lama salah! Terima Kasih.")</script>';
    } else if($token==md5('beda')){
        echo '<script type="text/javascript">alert("Password baru dan konfirmasi beda! Terima Kasih.")</script>';
    } 
?>