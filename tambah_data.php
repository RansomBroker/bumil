<?
    include 'history_function.php';
    // ambil id user dari session 
    $getId = $_SESSION['admin']["id_user"];
    // ambil jumlah row data jika < 1 maka data tidak ada
    $dataExist = isDataExist($getId);
?>

<hr class="garis">
<div class="row">
    <div class="col-xs-12">
        <h4><b>Tambah Data Screening Kehamilan</b></h4>
        <h4 class="mb-2 danger-text"><strong>Pilih yang diperlukan</strong></h4>
        <form role="form-inline" method="POST">
            <?foreach (getRiskFactors() as $key => $value):?>
            <!-- jika parent_id pada tabel risk_facors == 9 dan == 14 merupakan sub dari penyakit/ gejala -->
            <!-- ubah tampilan sub penyakit -->
            <?if(($value[0] == 11)|| ($value[0] == 16 )):?>
            <h4 class="mb-2 mt-2 "><?=$value[2]?></h4>
            <?else:?>
            <div
                class="<?=$value[1]==11 || $value[1]==16 ? " pl-2 p-1" : "p-1" ?> <?=$value[0]==15 ? " danger-bg text-white " : "" ?> <?=$value[0]>26 && $value[0]<=30 ? " danger-bg text-white " : "" ?>  <?=$value[0]>=16 && $value[0]<=26 ? " warning-bg text-gray " : "" ?>  ">
                <label for="<?=$value[0]?>"><?=$value[2]?></label>
                <input type="checkbox" id=<?=$value[0]?> name="<?=$value[0]?>" value="<?=$value[3]?>" class="pull-right"
                    <?=$value[0]==1? "disabled":""?> <?=$value[0]==1? "checked":""?>>
            </div>
            <?endif?>
            <?endforeach?>
            <button type="submit" class="btn btn-primary btn-md btn-block tombol mt-2"
                name="submit"><?=$dataExist >= 1 ? "Update Data Screening":"Tambah Data Screening"?></button>
            <br>
        </form>
        <?
            // jika data ada maka update data, jika tidak buat data baru
            if($dataExist >= 1){
                if(isset($_POST["submit"])){
                    $score = 2;
                    foreach ($_POST as $key => $value) {
                        $score += $value;
                    }
                    updateData($getId, $score);
                    echo "<div class='alert alert-info wow fadeIn'>Sukses</div>";
                    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=sehati'> ";
                }
            }else{
                if(isset($_POST["submit"])){
                    $score = 2;
                    foreach ($_POST as $key => $value) {
                        $score += $value;
                    }
                    insertNewData($getId, $score);
                    echo "<div class='alert alert-info wow fadeIn'>Sukses</div>";
                    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=sehati'> ";
                }
            }
        ?>
    </div>
</div>