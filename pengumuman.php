<?php
require_once('auth.php');
require_once('config.php');
//if($_SESSION["user"]["hasDaftar"] == '0') header('Location: mhs-listdosen.php');
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mhsform.css">
    <title>Dashboard Mahasiswa - Informasi Proposal</title>
    <style>
        .btn {
            margin-left: 50px;
            margin-top: -10px;
        }

        .status {
            margin-top: 100px;
            margin-bottom: 100px;
        }

        .judul4 {
            margin-top: 50px;
            margin-bottom: 50px;
            font-size: small;
            text-align: center;
        }

        .judprop {
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="mhs-listdosen.php">
            <img src="asset/icon/mhs.png" width="35" height="35" class="d-inline-block align-top" alt="" loading="lazy">
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
                        &emsp;&emsp;&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
                        Informasi Status Proposal
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
                            <img src="asset/icon/ic_log.png" alt="" width="65" height="30"></a>
                    </li>
                </ul>
            </li>
        </div>
    </nav>

    <?php
    $idMhs = $_SESSION["user"]["id_mhs"];
    $sql = "SELECT kategori, judulprop, penerimaan, pengesahan FROM judul WHERE judul.id_mhs = $idMhs ORDER BY id_judul DESC LIMIT 0, 1";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $status = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>

    <div class="container">
        <div class="row right ">
            <div class="mt-5 col-md-12">
                <div class=" col-12">
                    <h3>Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <span class="ml-5"><?php echo $_SESSION["user"]["namaMhs"] ?></span> </h3>
                </div>
                <div class=" col-12">
                    <h3>Kategori Proposal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <span class="ml-5"><?php echo $status["kategori"] ?></span></h3>
                </div>
                <div class="judprop col-md-12 text-center">
                    <h3>Judul Proposal:</h3> <br>
                    <h2><?php echo $status["judulprop"] ?>
                    </h2>
                </div>
                <div class="status col-md-12">
                    <?php
                    if ($status["penerimaan"] == '1') {
                        if ($status["pengesahan"] == '-') {
                            echo    "<h3> Status Proposal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp : 
                                        <button class='ml-5 badge badge-pill badge-primary'>Pending</button>
                                    </h3>";
                        } elseif ($status["pengesahan"] == '0') {
                            echo    "<h3> Status Proposal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp :
                                        <button class='badge badge-pill badge-danger'>Ditolak</button><br><br>
                                    </h3>";
                        } elseif ($status["pengesahan"] == '1') {
                            echo    "<h3> Status Proposal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp : 
                                        <button class='badge badge-pill badge-success'>Diterima</button>
                                    </h3>";
                        }
                    } elseif ($status["penerimaan"] == '-') {
                        echo    "<h3> Status Proposal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp : 
                                    <button class='ml-5 badge badge-pill badge-primary'>Pending</button>
                                </h3>";
                    } elseif ($status["penerimaan"] == '0') {
                        echo    "<h3> Status Proposal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp :
                                    <button class='badge badge-pill badge-danger'>Ditolak</button><br><br>
                                </h3>";
                    }
                    ?>
                </div>
                <h4 class="judul4">Copyright &copy; 2020 || Developed By Team 7</h4>
                <!-- <script type="text/javascript">
                    document.getElementById("daftarLagi").onclick = function(){
                        location.href = "mhs-listdosen.php";
                        
                        // $sql = "UPDATE mahasiswa SET hasDaftar='0' WHERE id_mhs = $idMhs";
                        // $stmt = $db->prepare($sql);
                        // $stmt->execute();
                        
                    };
                </script> -->




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