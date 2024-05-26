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
				  	<h3>Daftar List Pertanyaan</h3>

                    <?php
                        $cari=$_GET['cari'];
                        $hal=$_GET['hal'];
                    ?>
                    <!-- Search-from -->
                    <form action="pertanyaan_daftar.php?cari=$cari" method="get" class="form-inline mx-auto search-form">
                        <input class="form-control mr-sm-2" type="search" name="cari" value="<?php echo $cari;?>" placeholder="cari pertanyaan ..." aria-label="Search">
                        <button class="btn btn-style my-2 my-sm-0" type="submit" name="search">cari</button>
                    </form>

                   <?php
        $batas=10;

        if($cari==''){
            $sql="SELECT pertanyaan FROM pertanyaan";
        } else {
            $sql="SELECT pertanyaan FROM pertanyaan WHERE pertanyaan like '%".$cari."%'";
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
            $sql="SELECT * FROM pertanyaan ORDER BY id_pertanyaan ASC LIMIT $posisi, $batas";
        } else {
            $sql="SELECT * FROM pertanyaan WHERE pertanyaan like '%".$cari."%' ORDER BY id_pertanyaan ASC LIMIT $posisi, $batas";
        }
        
        ?>
                    <div class="container-fluid">
                        <div class="row">
                            <table id="customers" style="width: 1200px;">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Pertanyaan</th>
                                        <th scope="col">Tipe</th>
                                        <th scope="col">Bobot Pakar</th>
                                        <th scope="col">Aksi</th>
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
                                            echo '<td>'.$hsl['pertanyaan'].'</th>';
                                            echo '<td>'.$hsl['tipe_pertanyaan'].'</th>';
                                            echo '<td>'.$hsl['bobot_pakar'].'</th>';
                                            echo "<td>";
                                            echo "<a href=\"pertanyaan_edit.php?id_pertanyaan=$hsl[id_pertanyaan]\"><img src='images/edit.png' style='width: 24px;' title='edit pertanyaan' /></a> | ";
                                            echo "<a href=\"pertanyaan_hapus.php?id_pertanyaan=$hsl[id_pertanyaan]\"><img src='images/hapus.png' style='width: 24px;' title='hapus pertanyaan' /></a>";
                                            echo "</th>";
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
    if($token==md5('edit')){
        echo '<script type="text/javascript">alert("Data Pertanyaan berhasil diupdate! Terima Kasih.")</script>';
    } else if($token==md5('hapus')){
        echo '<script type="text/javascript">alert("Data Pertanyaan dihapus! Terima Kasih.")</script>';
    } 
?>