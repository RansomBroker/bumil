<?
// Semua fungsi terkati riwayat tersimpan disini 
include 'koneksi.php';

$koneksi;

// fungsi check data di tabel screens // mengembalikan banyak row
function isDataExist ($userId){
    global $koneksi;
    return $koneksi->query("SELECT screens.* FROM screens WHERE screens.id_user = '$userId' ")->num_rows;
}

// ambil data di dalam tabel untuk tiap user
function getData ($userId){
    global $koneksi;
    $data = $koneksi->query("SELECT
		risks.risk,
		risks.risk_text,
		medical_staffs.medical_staff AS care_staff,
		`references`.reference,
		places.place,
		medical_staffs.medical_staff 
	FROM
		pregnancies
		INNER JOIN medical_staffs ON pregnancies.medic_staff_id = medical_staffs.medical_staff_id
		INNER JOIN childbirths ON pregnancies.childbirth_id = childbirths.childbirth_id 
		AND medical_staffs.medical_staff_id = childbirths.medical_staff_id
		INNER JOIN places ON childbirths.place_id = places.place_id
		INNER JOIN risks ON pregnancies.risk_id = risks.risk_id
		INNER JOIN `references` ON pregnancies.reference_id = `references`.reference_id,
		screens 
	WHERE
		screens.id_user = '$userId'
		AND CASE
			WHEN `screens`.`total_score` BETWEEN 2 AND 4 THEN
				pregnancies.score = 2 
			WHEN `screens`.`total_score` BETWEEN 6 AND 11 THEN
				pregnancies.score = 6 
			WHEN `screens`.total_score >= 12 THEN
				pregnancies.score = 12 
		END 
");
return $data->fetch_all();
}   

// megambil gejala untuk screening pada ibu hamil
function getRiskFactors(){
	global $koneksi;
	$data = $koneksi->query("SELECT
	risk_factors.id, 
	risk_factors.parent_id,
	risk_factors.`name`, 
	risk_factors.score
	FROM
	risk_factors");
	return $data->fetch_all();
}

// membuat data baru di sehatiku
function insertNewData($userId, $totalScore){
	global $koneksi;
	$data = $koneksi->query("INSERT INTO 
	`bumil`.`screens` (`id_user`, `total_score`)
	 VALUES ($userId, $totalScore)"
	 );

	 return mysqli_affected_rows($koneksi);
}

// update data di sehatiku
function updateData($userId, $totalScore){
	global $koneksi;
	$data = $koneksi->query("UPDATE 
	`bumil`.`screens` 
	SET `total_score` = $totalScore 
	WHERE `id_user` = $userId");
}

// membuat data baru di menu riwayatku
function insertNewDataHistory($userId, $data){
	global $koneksi;
	foreach ($data as $key => $value) {
		if($value !=""){
			if($key == 0){
				$data = $koneksi->query("INSERT 
				INTO `bumil`.`disease_histories` 
				(`id_user`, `parent_id`, `disease_history`)
				VALUES ($userId, $userId, '$value')");
			}else{
				$data = $koneksi->query("INSERT INTO 
				`bumil`.`disease_histories` 
				(`parent_id`, `disease_history`) 
				VALUES ($userId, '$value')
				");
			}
		}
	}
}
// check apakah data ada
function isHistoriesExist($userId){
	global $koneksi;
	$data = $koneksi->query("SELECT
	a.id, 
	b.parent_id,
	a.disease_history as gejala,
	b.disease_history as gejala_lain
	FROM
	disease_histories a
	INNER JOIN disease_histories b ON
	b.parent_id = a.id_user AND b.parent_id = $userId");

	return $data->num_rows;
}

// Hapus Penyakit
function deleteHistoriesData($userId){
	global $koneksi;
	$data = $koneksi->query("DELETE 
	FROM disease_histories 
	WHERE parent_id = $userId
	");
}

// menampilkan data ke dalam riwayatku
function getHistoriesData($userId){
	global $koneksi;
	$data = $koneksi->query("SELECT
	a.id_user,
	a.parent_id,
	a.disease_history 
	FROM
	disease_histories AS a 
	WHERE 
	a.parent_id = $userId
	UNION
	SELECT
	b.id_user,
	b.parent_id,
	b.disease_history 
	FROM
	disease_histories AS b
	WHERE 
	b.parent_id = $userId");

	return $data->fetch_all();
}
?>