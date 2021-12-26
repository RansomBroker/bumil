<?
include 'history_function.php';
// ambil id user dari session 
$getId = $_SESSION['admin']["id_user"];
$isExists = isHistoriesExist($getId);
?>

<?if($isExists < 1):?>
<div class="panel panel-default mt-1">
    <div class="panel-body">
        <h4 class="text-center">Riwayat Kesehatan Ibu Sekarang</h4>
        <p class="text-center"><Strong>Moms belum memasukan data</Strong></p>
    </div>
</div>
<?endif?>

<?if($isExists >= 1):?>
<div class="panel panel-default mt-1">
    <div class="panel-body">
        <h4 class="text-center">Riwayat Kesehatan Ibu Sekarang</h4>
        <?foreach (getHistoriesData($getId) as $key => $value):?>
        <p class="text-center"><strong><?=$value[2]?></strong></p>
        <?endforeach?>
    </div>
</div>
<?endif?>

<H3>Riwayat Penyakit</H3>
<form method="POST">
    <div class="form-group">
        <input type="checkbox" id="hipertensi" name="penyakit[]" value="Hipertensi">
        <label for="hipertensi"> Hipertensi</label><br>
    </div>
    <div class="form-group">
        <input type="checkbox" id="Asma" name="penyakit[]" value="Asma">
        <label for="Asma"> Asma</label><br>
    </div>
    <div class="form-group">
        <input type="checkbox" id="Jantung" name="penyakit[]" value="Jantung">
        <label for="Jantung"> Jantung</label><br>
    </div>
    <div class="form-group">
        <input type="checkbox" id="TB" name="penyakit[]" value="TB">
        <label for="TB"> TB</label><br>
    </div>
    <div class="form-group">
        <input type="checkbox" id="Tyroid" name="penyakit[]" value="Tyroid">
        <label for="Tyroid"> Tyroid</label><br>
    </div>
    <div class="form-group">
        <input type="checkbox" id="Hepatitis B" name="penyakit[]" value="Hepatitis B">
        <label for="Hepatitis B"> Hepatitis B</label><br>
    </div>
    <div class="form-group">
        <input type="checkbox" id="Alergi" name="penyakit[]" value="Alergi">
        <label for="Alergi"> Alergi</label><br>
    </div>
    <div class="form-group">
        <input type="checkbox" id="Jiwa" name="penyakit[]" value="Jiwa">
        <label for="Jiwa"> Jiwa</label><br>
    </div>
    <div class="form-group">
        <input type="checkbox" id="Autoimun" name="penyakit[]" value="Autoimun">
        <label for="Autoimun"> Hepatitis B</label><br>
    </div>
    <div class="form-group">
        <input type="checkbox" id="Sifilis" name="penyakit[]" value="Sifilis">
        <label for="Sifilis"> Sifilis</label><br>
    </div>
    <div class="form-group">
        <input type="checkbox" id="Diabetes" name="penyakit[]" value="Diabetes">
        <label for="Diabetes"> Diabetes</label><br>
    </div>
    <div class="form-group">
        <h6>Lainnya:</h6>
        <input type="text" class="form-control" name="penyakit[]" placeholder="ketikan nama penyakit">
    </div>
    <button type="submit" name="submit" class="btn btn-primary mb-1"><?= $isExists >= 1 ? "simpan":"tambah"?></button>
</form>

<?
    if($isExists >=1){
        if (isset($_POST["penyakit"])) {
            // update data
            deleteHistoriesData($getId);
            insertNewDataHistory($getId, $_POST["penyakit"]);
            echo "<div class='alert alert-info wow fadeIn'>Sukses</div>";
            echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=riwayat'> ";
        }
    }else{
        if (isset($_POST["penyakit"])) {
            insertNewDataHistory($getId, $_POST["penyakit"]);
            echo "<div class='alert alert-info wow fadeIn'>Sukses</div>";
                    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=riwayat'> ";
        }
    }
?>