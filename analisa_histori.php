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
				  	<h3>Histori Analisa</h3>

                    <?php
                        $username=$_SESSION['username'];

                        $sql="SELECT * FROM pasien WHERE username='$username'";
                        $hasil=$koneksi->query($sql);
                        while($hsl=$hasil->fetch_assoc()){
                            $tgl_daftar=date('Y-m-d',strtotime($hsl['tgl_daftar']));
                        }
                        $sekarang=date('Y-m-d');
                        $tgl1 = new DateTime($tgl_daftar);
                        $tgl2 = new DateTime($sekarang);
                        $d = $tgl2->diff($tgl1)->days + 1;
                        if($d>=180){
                            $status_pasien='Pasien Tetap';
                        } else {
                            $status_pasien='Pasien Baru';
                        }

                        $cari=$_GET['cari'];
                        $hal=$_GET['hal'];
                    ?>
                    <!-- Search-from -->
                    <form action="analisa_histori.php?cari=$cari" method="get" class="form-inline mx-auto search-form">
                        <input class="form-control mr-sm-2" type="search" name="cari" value="<?php echo $cari;?>" placeholder="cari dokter ..." aria-label="Search">
                        <button class="btn btn-style my-2 my-sm-0" type="submit" name="search">cari</button>
                    </form>

                   <?php
        $batas=10;

        if($cari==''){
            $sql="SELECT id_analisa FROM analisa WHERE username='$username'";
        } else {
            $sql="SELECT id_analisa FROM analisa WHERE username='$username' AND nama_dokter like '%".$cari."%'";
        }
        $hasil=$koneksi->query($sql);
        $jml_data=0;
        while($hsl=$hasil->fetch_assoc()){
            $jml_data++;
        }
        $hal_akhir=ceil($jml_data/$batas);

        if($hal=='' or $hal=='1') {
            $hal=1;
            $prev=1;
            $posisi=0;
            $next=2;
        } else {
            $posisi=($hal-1)*$batas;
            $prev=$hal-1;
            if($hal<$hal_akhir) {
                $next=$hal+1;
            } else {
                $next=$hal_akhir;
            }
        }

        if($cari==''){
            $sql="SELECT * FROM analisa WHERE username='$username' ORDER BY id_analisa ASC LIMIT $posisi, $batas";
        } else {
            $sql="SELECT * FROM analisa WHERE username='$username' AND nama_dokter like '%".$cari."%' ORDER BY id_analisa ASC LIMIT $posisi, $batas";
        }
        
        ?>
                    <div class="container-fluid">
                        <div class="row">
                            <table id="customers" style="width: 1200px;">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tgl Analisa</th>
                                        <th scope="col">Hasil</th>
                                        <th scope="col">Nama Dokter</th>
                                        <th scope="col">Resep Obat</th>
                                        <th scope="col">Cetak Resep</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $cntA=0;
                                        $hasil=$koneksi->query($sql);
                                        while($hsl=$hasil->fetch_assoc()){
                                            $cntA++;
                                            $cntB=$cntA%2;
                                            if($cntB==1){
                                                echo '<tr class="table-success">';
                                            } else {
                                                echo '<tr>';
                                            }
                                            echo '<td>'.(($hal-1)*$batas+$cntA).'</th>';
                                            echo '<td>'.date('d M Y H:i:s',strtotime($hsl['tgl_analisa'])).'</th>';
                                            echo '<td>'.$hsl['hasil'].' %</th>';
                                            echo '<td>'.$hsl['nama_dokter'].'</th>';
                                        if($status_pasien=="Pasien Tetap"){
                                            echo '<td>'.$hsl['resep_obat'].'</th>';
                                            echo "<td>";
                                            if($hsl['resep_obat']==''){
                                                echo '&nbsp;';
                                            } else {
                                            echo "<a href=\"cetak_resep.php?id_analisa=$hsl[id_analisa]\"><img src='images/print.png' style='width: 24px;' title='cetak resep' /></a>";
                                            }
                                            echo "</th>";
                                        } else {
                                            echo "<td></td><td></td>";
                                        }
                                            echo '</tr>';
                                        }
                                        echo '</tbody></table>';
                                    ?>
                                </div>                  
                            </div>                

<div align='center'>
    Data ke: <?php if($cntA==0) { echo '0'; } else { echo $posisi+1; } ?> dari <?php echo $jml_data; ?> | Halaman ke: <?php echo $hal; ?> dari <?php echo $hal_akhir; ?>
</div>
    <div class="paginate" align='center'>
        <?php echo "<a href = \"$_PHP_SELF?hal=1&cari=$cari\">"; ?>
        <img src='images/first.png' style='width: 24px;' /></a> &nbsp;
        <?php echo "<a href = \"$_PHP_SELF?hal=$prev&cari=$cari\">"; ?>
        <img src='images/prev.png' style='width: 24px;' /></a> &nbsp;
        <?php echo "<a href = \"$_PHP_SELF?hal=$next&cari=$cari\">"; ?>
        <img src='images/next.png' style='width: 24px;' /></a> &nbsp;
        <?php echo "<a href = \"$_PHP_SELF?hal=$hal_akhir&cari=$cari\">"; ?>
        <img src='images/last.png' style='width: 24px;' /></a>
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