<?php
$anggota = $_SESSION["admin"]['nama'];
$ambil = $koneksi->query("SELECT * FROM profil WHERE anggota='$anggota' ORDER BY id_profil DESC");
$pecah = $ambil->fetch_assoc();
?>
<hr class="garis">
<div class="row">
    <div class="col-xs-12">
        <a href="index.php?halaman=ubah_profil" class="btn btn-success btn-sm" style="float: right;">Update</a>
        <h5><b>My Profil</b></h5>
        <h5>A. Data Istri</h5>
        <table>
            <tr>
                <th>Nama :</th>
                <td> <?php echo $pecah['nama'];?></td>
            </tr>
            <tr>
                <th>Nik :</th>
                <td> <?php echo $pecah['nik'];?></td>
            </tr>
            <tr>
                <th>TTL:</th>
                <td> <?php echo $pecah['ttl'];?></td>
            </tr>
            <tr>
                <th>Alamat:</th>
                <td> <?php echo $pecah['alamat'];?></td>
            </tr>
            <tr>
                <th>No Hp:</th>
                <td> <?php echo $pecah['hp'];?></td>
            </tr>
            <tr>
                <th>Agama:</th>
                <td> <?php echo $pecah['agama'];?></td>
            </tr>
            <tr>
                <th>Pendidikan :</th>
                <td> <?php echo $pecah['pendidikan'];?></td>
            </tr>
            <tr>
                <th>Pekerjaan :</th>
                <td> <?php echo $pecah['kerja'];?></td>
            </tr>
            <tr>
                <th>Gol-darah:</th>
                <td> <?php echo $pecah['darah'];?></td>
            </tr>
        </table>

        <h5>B. Data Suami</h5>
        <table>
            <tr>
                <th>Nama :</th>
                <td> <?php echo $pecah['suami'];?></td>
            </tr>
            <tr>
                <th>TTL :</th>
                <td> <?php echo $pecah['ttl2'];?></td>
            </tr>
            <tr>
                <th>Penididikan :</th>
                <td> <?php echo $pecah['pendidikan'];?></td>
            </tr>
            <tr>
                <th>Gol darah:</th>
                <td> <?php echo $pecah['darah2'];?></td>
            </tr>


        </table>
    </div>
</div>
<br>