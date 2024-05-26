<!DOCTYPE HTML>
<html>
<?php include 'head.php'; ?>

<body>
    <div class="container">
        <?php include 'flip.php'; ?>
    </div>
    <div class="header-bot">
        <div class="wrap">
            <?php $_SESSION['menu'] = "master";
            include 'menu_pasien.php'; ?>
        </div>
    </div>
    <div class="content">
        <div class="wrap">
            <div class="section group">
                <div class="col span_2_of_3">
                    <div class="contact-form">
                        <h3>Silahkan Jawab Pertanyaan</h3>

                        <?php
                        $username = $_SESSION['username'];

                        ?>
                        <form action="#" method="post">
                            <div>
                                <span><label>Username</label></span>
                                <span><input type="text" name="username" maxlength="30" readonly="" required="" value="<?php echo $username; ?>"></span>
                            </div>
                            <div>
                                <span><input type="submit" name="submit" value="Start" style="width: 100%"></span>
                            </div>
                        </form>
                        <br /><br /><br /><br />
                    </div>
                </div>

                <?php
                if (isset($_POST['submit'])) {
                    $username = $_POST['username'];
                    $nama_dokter = $_POST['nama_dokter'];

                    $sql2 = "DELETE FROM jawab WHERE username='$username'";
                    $koneksi->query($sql2);

                    $sql3 = "DELETE FROM analisa WHERE username='$username' AND selesai='0'";
                    $koneksi->query($sql3);

                    $sql = "INSERT INTO analisa (username, nama_dokter) VALUES ('$username', '$nama_dokter')";
                    $koneksi->query($sql);

                    $url = 'Location: analisa_pertanyaan.php?id_pertanyaan=1';
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
if ($token == md5('baru')) {
    echo '<script type="text/javascript">alert("<br />Anda baru saja melakukan konsultasi!<br />Terima Kasih.")</script>';
}
?>