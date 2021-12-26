<hr class="garis">
<div class="row">
    <div class="col-xs-12">
        <h5><b>Hitung IMT</b></h5>
        <form role="form" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="tb" placeholder="Tinggi cm">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="bb" placeholder="Berat Badan kg">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="lila" placeholder="Lila cm">
            </div>
            <button type="submit" class="btn btn-primary btn-md btn-block tombol" name="cek">Cek</button>

            <br>
        </form>
        <?php
                if (isset($_POST['cek']))
                {
                    
                    $tanggal = date("Y-m-d");
                    $anggota = $_SESSION["admin"]['nama'];
                    


                    $koneksi->query("INSERT INTO imt
                    (tb,bb,lila,anggota)
                    VALUES('$_POST[tb]','$_POST[bb]','$_POST[lila]','$anggota')");
                    echo "<br>";
                    // echo "<script>alert('data berhasil ditambah'); </script>";
                    echo "<div class='alert alert-info wow fadeIn'>Sukses</div>";
                    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=imt'> ";
                }
                ?>
    </div>
    <br>
    <br>
</div>