<?php
include 'head.php';
if (!isset($_SESSION['admin'])) {
    echo "<script> location ='login.php' ;</script>";
    exit();
}
?>


<script type="text/javascript">
window.onload = function() {
    jam();
}

function jam() {
    var e = document.getElementById('jam'),
        d = new Date(),
        h, m, s;
    h = d.getHours();
    m = set(d.getMinutes());
    s = set(d.getSeconds());

    e.innerHTML = h + ':' + m + ':' + s;

    setTimeout('jam()', 1000);
}

function set(e) {
    e = e < 10 ? '0' + e : e;
    return e;
}
</script>

<!-- <nav class="navbar navbar-inverse navbar-fixed-top menu_atas col-md-4 col-md-offset-4">
    <center>
        <b style="font-family: arial; color: #fff; font-size: 16px; font-weight: bold;" id="jam" class="jam"></b>
    </center>
</nav> -->

<!-- <nav class="navbar navbar-default navbar-fixed-bottom menu_data col-md-4 col-md-offset-4">
    <center>
        <div class="col-md-3 col-xs-3 entri">
            <a href="index.php?halaman=tampil" class="src"><i class="fa fa-home fa-2x" aria-hidden="true"></i><br>
                <center>Sehatiku</center>
            </a>
        </div>
        <div class="col-md-3 col-xs-3 entri2">
            <a href="index.php?halaman=video" class="src"><i class="fa fa-search fa-2x" aria-hidden="true"></i><br>
                <center>IMT</center>
            </a>
        </div>
        <div class="col-md-3 col-xs-3 entri2">
            <a href="index.php?halaman=keranjang" class="src"><i class="fa fa-shopping-cart fa-2x"
                    aria-hidden="true"></i><br>
                <center>Riwayatku</center>
            </a>
        </div>
        <div class="col-md-3 col-xs-3 entri2">
            <a href="index.php?halaman=akun" class="src"><i class="fa fa-user fa-2x" aria-hidden="true"></i><br>
                <center>Profilku</center>
            </a>
        </div>
    </center>
</nav> -->

<div class="col-md-4 col-md-offset-4 jumbotron head wow fadeIn">
    <h4 style="color:#fff; font-weight: bold;" class="wow fadeIn">

    </h4>
</div>

<div class="col-md-4 col-md-offset-4 container tepian">
    <div class="thumbnail konten wow fadeInUp">
        <hr class="garis">
        <div class="row">
            <center>
                <h5>
                    <b>Hallo Mom : <?php echo $_SESSION['admin']['nama']; ?></b><br>
                    <b style="font-family: arial; color: #000; font-size: 16px; font-weight: bold;" id="jam"
                        class="jam"></b><br><br>
                    <a href="index.php?halaman=logout"><i class="fa fa-power-off" aria-hidden="true"></i> Logout</a>
                </h5>
            </center>
        </div>
    </div>
</div>

<div class="col-md-4 col-md-offset-4 container tepian">
    <div class="thumbnail konten2 wow fadeInUp">
        <hr class="garis">
        <div class="row">
            <h5><b>
                    <center>MENU UTAMA</center><br>
                </b></h5>
            <div class="col-xs-3">
                <center>
                    <div class="thumbnail bulat">
                        <i class="fa fa-heart-o fa-2x" aria-hidden="true"></i>
                    </div>
                    <a href="index.php?halaman=sehati" class="bulat">Sehatiku</a>
                </center>
            </div>
            <div class="col-xs-3">
                <center>
                    <div class="thumbnail bulat2">
                        <i class="fa fa-thermometer-empty fa-2x" aria-hidden="true"></i>
                    </div>
                    <a href="index.php?halaman=riwayat" class="bulat2">Riwayatku</a>
                </center>
            </div>
            <div class="col-xs-3">
                <center>
                    <div class="thumbnail bulat3">
                        <i class="fa fa-balance-scale fa-2x" aria-hidden="true"></i>
                    </div>

                    <a href="index.php?halaman=imt" class="bulat3">IMTKu</a>
                </center>
            </div>
            <div class="col-xs-3">
                <center>
                    <div class="thumbnail bulat4">
                        <i class="fa fa-user-o fa-2x" aria-hidden="true"></i>
                    </div>

                    <a href="index.php?halaman=profil" class="bulat4">Profilku</a>
                </center>
            </div>
            <br>
            <br>

        </div>
        <br>
    </div>
</div>

<div class="col-md-4 col-md-offset-4 container tepian">



    <div class="thumbnail konten2 wow fadeInUp">
        <!--<div class="container">-->
        <?php
        if (isset($_GET['halaman'])) {
            if ($_GET['halaman'] == "imt") {
                include 'imt.php';
            } elseif ($_GET['halaman'] == "sehati") {
                include 'sehati.php';
            } elseif ($_GET['halaman'] == "riwayat") {
                include 'riwayat.php';
            } elseif ($_GET['halaman'] == "profil") {
                include 'profil.php';
            } elseif ($_GET['halaman'] == "logout") {
                include 'logout.php';
            } elseif ($_GET['halaman'] == "ubah_imt") {
                include 'ubah_imt.php';
            } elseif ($_GET['halaman'] == "logout") {
                include 'logout.php';
            } elseif ($_GET['halaman'] == "ubah_profil") {
                include 'ubah_profil.php';
            }elseif ($_GET['halaman'] == "tambah_data") {
                include 'tambah_data.php';
            }
        } else {
            include 'tampil.php';
        }
        ?>
        <!--</div>-->
    </div>
</div>




<?php include 'footer.php'; ?>