<hr class="garis">
<div class="row">
    <div class="col-xs-12">
        <h5><b>Perbarui Profil</b></h5>
        <form role="form" method="POST">
            <h5>A. Data Istri</h5>
            <div class="form-group">
                <h6>Nama Lengkap</h6>
                <input type="text" class="form-control" name="nama" placeholder="Ketikan Nama Lengkap">
            </div>
            <div class="form-group">
                <h6>NIK</h6>
                <input type="text" class="form-control" name="nik" placeholder="Ketikan NIK">
            </div>
            <div class="form-group">
                <h6>Tanggal Lahir</h6>
                <input type="date" class="form-control" name="ttl">
            </div>
            <div class="form-group">
                <h6>Alamat</h6>
                <input type="text" class="form-control" name="alamat" placeholder="ketikan alamat">
            </div>
            <div class="form-group">
                <h6>Hp</h6>
                <input type="text" class="form-control" name="hp" placeholder="Ketikan no hp">
            </div>
            <div class="form-group">
                <h6>Agama</h6>
                <input type="text" class="form-control" name="agama" placeholder="Ketikan agama">
            </div>
            <div class="form-group">
                <h6>Pendidikan</h6>
                <input type="text" class="form-control" name="pendidikan" placeholder="Ketikan pendidikan">
            </div>
            <div class="form-group">
                <h6>Pekerjaan</h6>
                <input type="text" class="form-control" name="kerja" placeholder="Ketikan pekerjaan">
            </div>
            <div class="form-group">
                <h6>Golongan Darah</h6>
                <input type="text" class="form-control" name="darah" placeholder="Ketikan gol darah">
            </div>

            <h5>B. Data Suami</h5>
            <div class="form-group">
                <h6>Nama Suami</h6>
                <input type="text" class="form-control" name="suami" placeholder="Ketikan nama suami">
            </div>
            <div class="form-group">
                <h6>Tanggal Lahir</h6>
                <input type="date" class="form-control" name="ttl2">
            </div>
            <div class="form-group">
                <h6>Pendidikan</h6>
                <input type="text" class="form-control" name="pendidikan2" placeholder="Ketikan pendidikan">
            </div>
            <div class="form-group">
                <h6>Golongan Darah</h6>
                <input type="text" class="form-control" name="darah2" placeholder="Ketikan gol darah">
            </div>

            <button type="submit" class="btn btn-primary btn-md btn-block tombol" name="simpan">Simpan</button>
            <br>
        </form>
        <?php
                if (isset($_POST['simpan']))
                {
                    
                    $tanggal = date("Y-m-d");
                    $anggota = $_SESSION["admin"]['nama'];
                    


                    $koneksi->query("INSERT INTO profil
                    (nama,nik,ttl,alamat,hp,agama,pendidikan,kerja,darah,suami,ttl2,pendidikan2,darah2,anggota)
                    VALUES('$_POST[nama]','$_POST[nik]','$_POST[ttl]','$_POST[alamat]','$_POST[hp]','$_POST[agama]'
                    ,'$_POST[pendidikan]','$_POST[kerja]','$_POST[darah]'
                    ,'$_POST[suami]','$_POST[ttl2]','$_POST[pendidikan2]','$_POST[darah2]','$anggota')");
                    echo "<br>";
                    // echo "<script>alert('data berhasil ditambah'); </script>";
                    echo "<div class='alert alert-info wow fadeIn'>Sukses</div>";
                    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=profil'> ";
                }
                ?>


    </div>
</div>