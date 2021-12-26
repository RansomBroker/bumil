<?php
include 'head.php';
?>
<div class="col-xs-10 col-xs-offset-1">
    <div class="thumbnail konten3">
        <h4>
            <center style="color: orange;"><b>LOGIN</b></center>
        </h4>
        <form role="form" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="user" placeholder="username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="pass" placeholder="password">
            </div>
            <button type="submit" class="btn btn-primary btn-md btn-block tombol" name="save">Login</button><br>
            <center>Belum punya akun <a href="buat_akun.php">klik disini</a></center>
        </form>
        <br>
        <?php

        if (isset($_POST['save'])) {
            $ambil = $koneksi->query("SELECT * FROM user WHERE username ='$_POST[user]'
                        AND pass ='$_POST[pass]'");

            $yangcocok = $ambil->num_rows;
            if ($yangcocok == 1) {
                $_SESSION['admin'] = $ambil->fetch_assoc();
                echo "<div class='alert alert-info wow fadeIn'> login sukses </div>";
                echo "<meta http-equiv='refresh' content='1; url =index.php?halaman=sehati'> ";
            } else {
                echo "<div class='alert alert-danger  wow fadeIn'> login gagal </div>";
            }
        }

        ?>
    </div>
    <center>
        <h5>Developed By : Number 3</h5><br>
    </center>




</div>


<?php include 'footer.php'; ?>