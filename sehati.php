<?
include 'history_function.php';
// ambil id user dari session 
$getId = $_SESSION['admin']["id_user"];
// ambil jumlah row data jika < 1 maka data tidak ada
$dataExist = isDataExist($getId);
?>

<!-- jikat data tidak ada -->
<? if ($dataExist < 1): ?>
<div class="panel panel-default mt-1 mb-1">
    <div class="panel-body">
        <p class="text-center">Semoga Kehamilan serta Selamat ketika Persalinan & Bayi sehat..</p>
    </div>
</div>
<a href="index.php?halaman=tambah_data" class="btn btn-primary btn-block mt-5">Tambah Data Baru</a>
<? endif;?>

<!-- jika data ada di check dari apakah ada row atau tidak, jika ada tampilkan -->
<? if ($dataExist >=1): ?>
<?foreach (getData($getId) as $value):?>
<?if($value[0]== "KRR"):?>
<div class="panel mt-1 ">
    <div class="panel-body success-bg border-radius-md text-white">
        <h4 class="text-center">Selamat Moms</h4>
        <p class="text-center">Kehamilan moms dengan <strong><?= $value[1]?></strong></p>
    </div>
</div>
<?endif;?>
<?if($value[0]== "KRT"):?>
<div class="panel mt-1 ">
    <div class="panel-body warning-bg border-radius-md text-white">
        <p class="capitalize text-gray">moms kehamilan saat ini dengan <strong><?= $value[1]?></strong> silahkan
            hubungi bidan anda</p>
    </div>
</div>
<?endif;?>
<?if($value[0]== "KRST"):?>
<div class="panel mt-1">
    <div class="panel-body danger-bg  border-radius-md ">
        <p class="capitalize text-white">Moms... Kehamilan saat ini dengan <strong><?=$value[1]?></strong> silahkan
            konsultasi ke dokter
            kandungan
            anda</p>
    </div>
</div>
<?endif;?>
<? endforeach;?>

<div class="panel mt-1">
    <div class="panel-body bg-primary text-white border-radius-md">
        <p class="text-center">Semoga Kehamilan serta Selamat ketika Persalinan & Bayi sehat..</p>
    </div>
</div>

<!-- jika sudah membuat data/histori -->
<?php foreach (getData($getId) as $value):?>
<div class="panel panel-default mt-1">
    <div class="panel-body">
        <h4 class="">Riwayat Pengecekan Kehamilan<?= $i?></h4>
        <div class="">
            <p class="">Resiko: <?= $value[0]?></p>
            <p class="">Perawatan: <?= $value[1]?></p>
            <p class="">Rujukan: <?= $value[2]?></p>
            <p class="">Tempat: <?= $value[3]?></p>
            <p class="">Penolong: <?= $value[4]?></p>
            <a href="index.php?halaman=tambah_data" class="card-link">Edit Data</a>
        </div>
    </div>
</div>
<? endforeach;?>
<?endif;?>