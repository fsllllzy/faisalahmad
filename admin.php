<!DOCTYPE HTML>
<html>
<?php include 'head.php'; ?>
<body>
	<div class="container">
		<?php include 'flip.php'; ?>
	</div>
	<div class="header-bot">
		<div class="wrap">
			<?php $_SESSION['menu']="home"; include 'menu_admin.php'; ?>
		</div>
	</div>
	<div class="content">
	<div class="wrap">
			<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h3>Selamat Datang</h3>
					<?php
						$sql="SELECT * FROM dokter";
            			$hasil=$koneksi->query($sql);
            			$jml_dokter=0;
            			while($hsl=$hasil->fetch_assoc()){
                			$jml_dokter++;
            			}
            			$sql="SELECT * FROM pasien";
            			$hasil=$koneksi->query($sql);
            			$jml_pasien=0;
            			while($hsl=$hasil->fetch_assoc()){
                			$jml_pasien++;
            			}
					?>
				  	Jumlah Dokter : <?php echo $jml_dokter;?> dokter<br />
				  	Jumlah Pasien : <?php echo $jml_pasien;?> pasien<br />


		<?php
        $sql="SELECT * FROM pasien";
        $hasil=$koneksi->query($sql);
        $wanita=0;
        $pria=0;
        while($hsl=$hasil->fetch_assoc()){
        	if($hsl['jenis_kelamin']=="PRIA") {
        		$pria++;
        	} else {
        		$wanita++;
        	}
        }

        $sumbu_x="'PRIA','WANITA'";
        $sumbu_y=$pria.','.$wanita;
    ?>
        
    <script language="javascript" type="text/javascript">
        $(function grafik(){
            var chart;
            $(document).ready(function(){
                chart = new Highcharts.Chart({
                    //Type: line / bar / column
                    chart: {renderTo: 'container2', type: 'column'},
                    title: {text: <?php echo "'GRAFIK JUMLAH PASIEN'"; ?>},
                    xAxis: {categories: [<?php echo $sumbu_x; ?>]},
                    yAxis: {title: {text: '<?php echo 'Jumlah Orang '; ?>'}, plotLines: [{ value: 0, width: 1, color: '#808080'}]},
                    //fungsi tooltip untuk menampikan data di titik tertentu
                    tooltip: {formatter: function() {return 'Keterangan : <b>'+ '</b><br/>'+ this.series.name + ' ' + this.x + ' adalah <b>'+ this.y  +' orang </b>';}},    
                    //isi datanya
                    series: [{name: 'Jumlah', data: [<?php echo $sumbu_y; ?>]},
                ]});
            });
        });
    </script>
    <br />
    <div id="container2" style="min-width: 50px; height: 350px; margin: 0 auto"></div>


	 			
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