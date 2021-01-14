<?php
require_once("auth.php");
require_once("config.php");


if ($_SESSION["user"]["hasDaftar"] == 1) header('Location: mhs-listdosen.php');

if (isset($_POST)) {
    //header("Location: logout.php");
    $namaMhs = $_SESSION["user"]["namaMhs"];
    $judul = filter_input(INPUT_POST, 'judul', FILTER_SANITIZE_STRING);
    $kategori = filter_input(INPUT_POST, 'kategori', FILTER_SANITIZE_STRING);
    $idMhs = $_SESSION["user"]["id_mhs"];
    $idDospem = $_POST["id_dospem"];

    $sql = "INSERT INTO judul (id_mhs, id_dospem, penulis, judulprop, kategori, penerimaan, pengesahan) VALUES ('$idMhs', '$idDospem', '$namaMhs', '$judul', '$kategori', '-', '-')";
    $stmt = $db->prepare($sql);
    //$stmt->execute();
    $result=$stmt->execute();
    if($result){
        echo 'Submit Data Berhasil';
    }else{
        echo 'There were erros while saving the data.';
    }
    
    $sql = "UPDATE dospem SET kuota=:kuota, pendaftar=:pendaftar WHERE id_dospem=:id_dospem";
    $stmt = $db->prepare($sql);
    $params = array(
        ":kuota" => ($_POST["kuota"] - 1),
        ":pendaftar" => ($_POST["pendaftar"] + 1),
        ":id_dospem" => $_POST["id_dospem"],
    );
    $stmt->execute($params);

    $sql = "UPDATE mahasiswa SET hasDaftar=1 WHERE id_mhs=$idMhs";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}
else{
    echo 'No data';
    }
?>