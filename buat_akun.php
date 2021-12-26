<?php 
include'head.php';
?>
<div class="col-xs-10 col-xs-offset-1">
    <div class="thumbnail konten3">
        <h4>
            <center style="color: orange;"><b>Buat Akun</b></center>
        </h4>
        <form role="form" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="user" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="pass" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary btn-md btn-block tombol" name="daftar">Daftar</button><br>
        </form>
        <?php
                if (isset($_POST['daftar']))
                {
                    
                    $tanggal = date("Y-m-d");
                    
                    $koneksi->query("INSERT INTO user
                    (nama,username,pass,tanggal)
                    VALUES('$_POST[nama]','$_POST[user]','$_POST[pass]','$tanggal')");
                    echo "<br>";
                    // echo "<script>alert('data berhasil ditambah'); </script>";
                    echo "<div class='alert alert-info wow fadeIn'>Sukses</div>";
                    echo "<meta http-equiv='refresh' content='1;url=login.php'> ";
                }
                ?>

    </div>
    <center>
        <h5>Developed By : Number 3</h5><br>
    </center>




</div>


<?php include'footer.php';?>