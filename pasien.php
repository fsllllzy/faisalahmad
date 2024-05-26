<!DOCTYPE HTML>
<html>
<?php include 'head.php'; ?>

<body>
    <div class="container">
        <?php include 'flip.php'; ?>
    </div>
    <div class="header-bot">
        <div class="wrap">
            <?php $_SESSION['menu'] = "home";
            include 'menu_pasien.php'; ?>
        </div>
    </div>
    <div class="content">
        <div class="wrap">
            <div class="section group">
                <div class="col span_2_of_3">
                    <div class="contact-form">
                        <h3>Selamat Datang</h3>

                        <h3>Profil</h3>
                        <?php
                        $username = $_SESSION['username'];
                        $sql = "SELECT * FROM pasien WHERE username='$username'";
                        $hasil = $koneksi->query($sql);
                        while ($hsl = $hasil->fetch_assoc()) {
                            $nama = $hsl['nama'];
                            $tgl_lahir = $hsl['tgl_lahir'];
                            $jenis_kelamin = $hsl['jenis_kelamin'];
                            $alamat = $hsl['alamat'];
                            $hp = $hsl['hp'];
                            $tgl_daftar = date('Y-m-d', strtotime($hsl['tgl_daftar']));
                        }
                        $sekarang = date('Y-m-d');
                        $tgl1 = new DateTime($tgl_daftar);
                        $tgl2 = new DateTime($sekarang);
                        $d = $tgl2->diff($tgl1)->days + 1;
                        if ($d >= 180) {
                            $status_pasien = 'Pasien Tetap';
                        } else {
                            $status_pasien = 'Pasien Baru';
                        }
                        ?>
                        <form action="#" method="post">
                            <div>
                                <span><label>Tanggal Daftar</label></span>
                                <span><input type="text" readonly="" maxlength="30" required="" value="<?php echo date('d M Y', strtotime($tgl_daftar)); ?>"></span>
                            </div>
                            <div>
                                <span><label>Username</label></span>
                                <span><input type="text" name="username" readonly="" maxlength="30" required="" value="<?php echo $username; ?>"></span>
                            </div>
                            <div>
                                <span><label>Nama</label></span>
                                <span><input type="text" name="nama" maxlength="50" required="" value="<?php echo $nama; ?>"></span>
                            </div>
                            <div>
                                <span><label>Tanggal Lahir</label></span>
                                <span><input type="date" name="tgl_lahir" style="width: 760px;" required="" value="<?php echo $tgl_lahir; ?>"></span>
                            </div>
                            <div>
                                <span><label>Jenis Kelamin</label></span>
                                <span>
                                    <select name="jenis_kelamin" style="width: 760px;" required="">
                                        <option value="PRIA" <?php if ($jenis_kelamin == "PRIA") echo 'selected'; ?>>PRIA</option>
                                        <option value="WANITA" <?php if ($jenis_kelamin == "WANITA") echo 'selected'; ?>>WANITA</option>
                                    </select>
                                </span>
                            </div>
                            <div>
                                <span><label>Alamat</label></span>
                                <span><input type="text" name="alamat" maxlength="100" required="" value="<?php echo $alamat; ?>"></span>
                            </div>
                            <div>
                                <span><label>HP</label></span>
                                <span><input type="text" name="hp" maxlength="15" required="" value="<?php echo $hp; ?>"></span>
                            </div>
                            <div>
                                <span><input type="submit" name="submit" value="UPDATE PROFIL" style="width: 100%"></span>
                            </div>
                        </form>
                        <br /><br /><br /><br />
                    </div>
                </div>

                <?php
                if (isset($_POST['submit'])) {
                    $username = $_POST['username'];
                    $nama = $_POST['nama'];
                    $tgl_lahir = date('Y-m-d', strtotime($_POST['tgl_lahir']));
                    $jenis_kelamin = $_POST['jenis_kelamin'];
                    $alamat = $_POST['alamat'];
                    $hp = $_POST['hp'];

                    $sql2 = "UPDATE pasien SET nama='$nama', tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', alamat='$alamat', hp='$hp' WHERE username='$username'";
                    $koneksi->query($sql2);

                    $token = md5('update');
                    $url = 'Location: pasien.php?token=' . $token;
                    header($url);
                }
                ?>

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
        $(function() {
            $(".flipster").flipster({
                style: 'carousel',
                start: 0
            });
        });
        -->
    </script>
</body>

</html>

<?php
$token = $_GET['token'];
if ($token == md5('update')) {
    echo '<script type="text/javascript">alert("<br />Data Profil Berhasil di update!<br />Terima Kasih.")</script>';
}
?>