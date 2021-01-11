<?php
require_once("auth.php");
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/listdosen.css">
    <title>Dashboard Mahasiswa - List Dosen</title>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <img src="../STI-Apps/asset/icon/mhs.png" width="35" height="35" class="d-inline-block align-top" alt="" loading="lazy">
            &nbsp; Dashboard Mahasiswa
        </a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <!-- <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a> -->
                </li>
                <li class="nav-item">
                </li>
                <li class="nav-item">
                    <span class="navbar-text">
                        &emsp;&emsp;&emsp;&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
                        List Dosen Pembimbing
                    </span>
                    <!-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
                </li>
            </ul>
            <h6 class="mr-3"><?php echo $_SESSION["user"]["namaMhs"] ?></h6>
            <li class="dropdown">
                <a href="#">
                    <img src="asset/Profile.png" alt="" width="40" height="40">
                </a>
                <ul class="isi-dropdown">
                    <li>
                        <a href="logout.php">
                            <img src="asset/icon/ic_log.png" alt="" width="66" height="30"></a>
                    </li>
                </ul>
            </li>
            <!-- <button type="button" class="btn btn-danger my-2">Keluar</button> -->
        </div>
    </nav>
    <?php
    include 'config.php';
    if ($_SESSION["user"]["hasDaftar"] == 1) {
        echo '<div class="alert alert-warning" role="alert" align="center">
            Maaf Anda tidak dapat mengisi Form. Form hanya berlaku untuk sekali pendaftaran !!
            </div>';
    } else {
        $sql = "SELECT id_dospem, namaDospem, kuota, pendaftar FROM dospem WHERE kuota !=0";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        while ($listdospem = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo    '<div class="list">
                    <table width="100%">
                        <tr>
                            <td>
                                <img src="../STI-Apps/asset/Profile.png" alt="" width="40" height="40">&emsp;
                            </td>
                            <td> ' . $listdospem["namaDospem"] . ' &emsp;&emsp;&emsp;&emsp;&emsp;</td>
                            <td>Kuota Tersedia : ' . $listdospem["kuota"] . ' </td>
                            <td>Terisi Mahasiswa : ' . $listdospem["pendaftar"] . ' </td>
                            <td><a href="mhs-form.php?namaDospem=' . $listdospem["namaDospem"] . '&id_dospem=' . $listdospem["id_dospem"] . '&kuota=' . $listdospem["kuota"] . '&pendaftar=' . $listdospem["pendaftar"] . '" class="btn btn-primary btn-sm">Daftar Form</a></td>
                        </tr>
                    </table>
                </div>';
        }
    }
    ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>