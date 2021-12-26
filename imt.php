<?php
$anggota = $_SESSION["admin"]['nama'];
$ambil = $koneksi->query("SELECT * FROM imt WHERE anggota='$anggota' ORDER BY id_imt DESC");
$pecah = $ambil->fetch_assoc();
?>
<hr class="garis">
<div class="row">
    <div class="col-xs-12">
        <a href="index.php?halaman=ubah_imt" class="btn btn-success btn-sm" style="float: right;">Update</a>
        <h5><b>Status Gizi Anda</b></h5>
        <table>
            <tr>
                <th>TB :</th>
                <td> <?php echo $pecah['tb'];?> m</td>
            </tr>
            <tr>
                <th>BB :</th>
                <td> <?php echo $pecah['bb'];?> kg</td>
            </tr>
            <tr>
                <th>Lila :</th>
                <td> <?php echo $pecah['lila'];?> cm</td>
            </tr>
        </table>
        <?php  
        
        $tb = $pecah['tb'];
        $bb = $pecah['bb'];
        $lila = $pecah['lila'];

        $total = $bb/($tb*$tb);


        ?>
        <h5><b>Skor = <?php echo $total;?></b></h5>
        <h5>Status Gizi</h5>
        <?php if ($total<=' '):?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <center><strong>Data Belum Di input</strong></center>
        </div>
        <?php endif?>

        <?php if ($total >=' ' AND $total<='18.5'):?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <center><strong>KURUS</strong></center>
        </div>
        <?php endif?>
        <?php if ($total>='18.5' OR $tolat>='24.9'):?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <center><strong>NORMAL</strong></center>
        </div>
        <?php endif?>
        <?php if ($total>='29.9'):?>
        <div class="alert alert-warning alert-dismissible" role="alert">
            <center><strong>GEMUK</strong></center>
        </div>
        <?php endif?>

        <h5>Catatan:</h5>
        <h5>Kenaikan BB minimal 11.5 - 16 Kg</h5>
    </div>
</div>
<br>