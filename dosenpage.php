<?php
require_once("auth.php");
require_once("config.php");

if (isset($_POST['terima'])) {
    header("Location: dosenpage.php");
    $sql = "UPDATE judul SET penerimaan = '1'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}

if (isset($_POST['tolak'])) {
    header("Location: dosenpage.php");
    $sql = "UPDATE judul SET penerimaan = '0'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dosenpage.css">
    <title>Dashboard Dosen</title>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <img src="../STI-Apps/asset/icon/dosen.png" width="35" height="35" class="d-inline-block align-top" alt="" loading="lazy">
            &nbsp; Dashboard Dosen
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
                        List Pendaftar Proposal
                    </span>
                    <!-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
                </li>
            </ul>
            <h6 class="mr-3"><?php echo $_SESSION["user"]["namaDospem"] ?></h6>
            <li class="dropdown">
                <a href="#">
                    <img src="asset/Profile.png" alt="" width="40" height="40">
                </a>
                <ul class="isi-dropdown">
                    <li>
                        <a href="logout.php">
                            <img src="asset/icon/ic_log.png" alt="" width="75" height="30"></a>
                    </li>
                </ul>
            </li>
        </div>
    </nav>

    <?php
    //include 'config.php';
    $idDospem = $_SESSION["user"]["id_dospem"];
    $sql = "SELECT DISTINCT penulis, judulprop FROM judul, dospem WHERE judul.id_dospem = $idDospem AND penerimaan = '-'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() == 0) {
        echo '<div class="alert alert-warning" role="alert" align="center">
            List Pendaftar Kosong!
            </div>';
    } else {
        while ($listjudul = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo    '<div class="list">
                        <table width="100%">
                        <tr>
                            <td>
                                <img src="../STI-Apps/asset/mhs.jpg" alt="" width="40" height="40">&emsp;
                            </td>
                            <td> ' . $listjudul["penulis"] . ' &emsp;&emsp;&emsp;&emsp;</td>
                            <td> ' . $listjudul["judulprop"] . ' &emsp;&emsp;&emsp;</td>
                            <td id="td-btn">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
                                    Detail Informasi
                                </button>
                            </td>
                        </tr>
                        </table>
                    </div>';
        }
    }
    ?>


    <!-- Modal -->
    <?php
    //include 'config.php';
    $sql = "SELECT penulis, noInduk, judulprop FROM mahasiswa, judul WHERE judul.id_mhs = mahasiswa.id_mhs";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $detail = $stmt->fetch(PDO::FETCH_ASSOC);
    echo    '<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form action="" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Informasi Mahasiswa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <ul class="detailInfo text-center">
                                    <li>
                                    <img src="../STI-Apps/asset/Profile.png" alt="Foto Mahasiswa" width="200" height="200">
                                    </li>
                                    <li>
                                    Nama : ' . $detail["penulis"] . '
                                    </li><br>
                                    <li>
                                    NIM : ' . $detail["noInduk"] . '
                                    </li><br>
                                    <li>
                                    Judul Proposal : ' . $detail["judulprop"] . '
                                    </li>
                                </ul>
                            </div> <br><br><br>
                            <div class="modal-footer">
                            <input type="submit" class="btn btn-danger btn-lg" name="tolak" value="TOLAK">
                            <input type="submit" class="btn btn-success btn-lg" name="terima" value="TERIMA">
                            </div>
                        </form>
                    </div>
                </div>
            </div>';
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